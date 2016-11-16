<?php

include_once '../../Controlador/Contenedor.php';

$control = Contenedor::getInstancia();

$accion = htmlspecialchars($_REQUEST['accion']);
if ($accion != null) {
    if ($accion == "LISTADO") {
        $docentes = $control->getAllDocentes();
        $json = json_encode($docentes);
        echo $json;
    } else if ($accion == "AGREGAR") {
        $asig_codigo = htmlspecialchars($_REQUEST['asig_codigo']);
        $n_docentes = 0;
        if (isset($_REQUEST['n_docentes'])) {
            $n_docentes = htmlspecialchars($_REQUEST['n_docentes']);
        }

        $result;
        for ($i = 0; $i <= $n_docentes; $i++) {
            if (isset($_REQUEST['usu_rut_' . $i])) {
                $usu_rut = htmlspecialchars($_REQUEST['usu_rut_' . $i]);
                $docente = new DocenteDTO();
                $docente->setAsig_codigo($asig_codigo);
                $docente->setUsu_rut($usu_rut);

                $result = $control->addDocente($docente);
            }
        }
        if ($result) {
            echo json_encode(array(
                'success' => true,
                'mensaje' => "Docente ingresada correctamente"
            ));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    } else if ($accion == "BORRAR") {
        $doc_id = htmlspecialchars($_REQUEST['doc_id']);

        $result = $control->removeDocente($doc_id);
        if ($result) {
            echo json_encode(array('success' => true, 'mensaje' => "Docente borrado correctamente"));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    } else if ($accion == "BORRAR_BY_ASIG_CODIGO_USU_RUT") {
        $asig_codigo = htmlspecialchars($_REQUEST['asig_codigo']);
        $usu_rut = htmlspecialchars($_REQUEST['usu_rut']);

        $result = $control->removeDocenteByUsu_Rut_Asig_Codigo($usu_rut, $asig_codigo);
        if ($result) {
            echo json_encode(array('success' => true, 'mensaje' => "Docente borrado correctamente"));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    } else if ($accion == "BUSCAR") {
        $cadena = htmlspecialchars($_REQUEST['cadena']);
        $docentes = $control->getDocenteLikeAtrr($cadena);
        $json = json_encode($docentes);
        echo $json;
    } else if ($accion == "BUSCAR_BY_ID") {
        $doc_id = htmlspecialchars($_REQUEST['doc_id']);

        $docente = $control->getDocenteByID($doc_id);
        $json = json_encode($docente);
        echo $json;
    } else if ($accion == "BUSCAR_BY_ASIG_CODIGO") {
        $asig_codigo = htmlspecialchars($_REQUEST['asig_codigo']);

        $docentes = $control->getDocenteByAsig_codigo($asig_codigo);
        $json = json_encode($docentes);
        echo $json;
    } else if ($accion == "ACTUALIZAR") {
        $doc_id = htmlspecialchars($_REQUEST['doc_id']);
        $usu_rut = htmlspecialchars($_REQUEST['usu_rut']);
        $asig_codigo = htmlspecialchars($_REQUEST['asig_codigo']);

        $docente = new DocenteDTO();
        $docente->setDoc_id($doc_id);
        $docente->setUsu_rut($usu_rut);
        $docente->setAsig_codigo($asig_codigo);

        $result = $control->updateDocente($docente);
        if ($result) {
            echo json_encode(array(
                'success' => true,
                'mensaje' => "Docente actualizada correctamente"
            ));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    }
}
