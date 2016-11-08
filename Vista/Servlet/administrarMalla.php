<?php

include_once '../../Controlador/Contenedor.php';

$control = Contenedor::getInstancia();

$accion = htmlspecialchars($_REQUEST['accion']);
if ($accion != null) {
    if ($accion == "LISTADO") {
        $mallas = $control->getAllMallas();
        $json = json_encode($mallas);
        echo $json;
    } else if ($accion == "AGREGAR") {
        $m_fechaInicio = htmlspecialchars($_REQUEST['m_fechaInicio']);
        $m_fechaFin = htmlspecialchars($_REQUEST['m_fechaFin']);
        $m_cantidadSemestres = htmlspecialchars($_REQUEST['m_cantidadSemestres']);

        $malla = new MallaDTO();
        $malla->setM_fechaInicio($m_fechaInicio);
        $malla->setM_fechaFin($m_fechaFin);
        $malla->setM_cantidadSemestres($m_cantidadSemestres);

        $result = $control->addMalla($malla);

        if ($result) {
            echo json_encode(array(
                'success' => true,
                'mensaje' => "Malla creada correctamente"
            ));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    } else if ($accion == "BORRAR") {
        $m_id = htmlspecialchars($_REQUEST['m_id']);

        $result = $control->removeMalla($m_id);
        if ($result) {
            echo json_encode(array('success' => true, 'mensaje' => "Malla borrado correctamente"));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    } else if ($accion == "BUSCAR") {
        $cadena = htmlspecialchars($_REQUEST['cadena']);
        $mallas = $control->getMallaLikeAtrr($cadena);
        $json = json_encode($mallas);
        echo $json;
    } else if ($accion == "BUSCAR_BY_ID") {
        $m_id = htmlspecialchars($_REQUEST['m_id']);
        $malla = $control->getMallaByID($m_id);
        $m_cantidadSemestres = $malla->getM_cantidadSemestres();
        $n_max_asignatuas = $control->cantidadMaximaAsignaturasEnSemestreByMalla($m_id);
        
        //CREAMOS LA MATRIZ PARA LA MALLA 
        $asignaturas_malla = array();
        for ($i = 1; $i <= $m_cantidadSemestres; $i ++) {
            $asignaturas_malla[$i] = array();
        }
        //ASIGNATURAS
        $asignaturas = $control->getAsignaturasByM_Id($m_id);
        foreach ($asignaturas as $asignatura){
            array_push($asignaturas_malla[$asignatura->getAsig_periodo()], $asignatura);
        }
        //ELECTIVOS
        $electivos = $control->getGrupo_electivoByM_Id($m_id);
        foreach ($electivos as $electivo){
            array_push($asignaturas_malla[$electivo->getGe_periodo()], $electivo);
        }
            
        $json = json_encode(array("malla" => $malla,"asignatuas_malla" => $asignaturas_malla, "n_max_asignatuas" => $n_max_asignatuas));
        echo $json;
    } else if ($accion == "ACTUALIZAR") {
        $m_id = htmlspecialchars($_REQUEST['m_id']);
        $m_fechaInicio = htmlspecialchars($_REQUEST['m_fechaInicio']);
        $m_fechaFin = htmlspecialchars($_REQUEST['m_fechaFin']);
        $m_fechaFin = htmlspecialchars($_REQUEST['m_fechaFin']);
        $m_cantidadSemestres = htmlspecialchars($_REQUEST['m_cantidadSemestres']);

        $malla = new MallaDTO();
        $malla->setM_id($m_id);
        $malla->setM_fechaInicio($m_fechaInicio);
        $malla->setM_fechaFin($m_fechaFin);
        $malla->setM_cantidadSemestres($m_cantidadSemestres);

        $result = $control->updateMalla($malla);
        if ($result) {
            echo json_encode(array(
                'success' => true,
                'mensaje' => "Malla actualizada correctamente"
            ));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    }
}
