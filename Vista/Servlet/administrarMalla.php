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
        $json = json_encode($malla);
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
