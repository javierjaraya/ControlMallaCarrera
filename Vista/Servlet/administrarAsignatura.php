<?php

include_once '../../Controlador/Contenedor.php';

$control = Contenedor::getInstancia();

$accion = htmlspecialchars($_REQUEST['accion']);
if ($accion != null) {
    if ($accion == "LISTADO") {
        $asignaturas = $control->getAllAsignaturas();
        $json = json_encode($asignaturas);
        echo $json;
    } else if ($accion == "AGREGAR") {
        $asig_codigo = htmlspecialchars($_REQUEST['asig_codigo']);
        $asig_nombre = htmlspecialchars($_REQUEST['asig_nombre']);
        $m_id = htmlspecialchars($_REQUEST['m_id']);
        $ta_id = htmlspecialchars($_REQUEST['ta_id']);

        $object = $control->getAsignaturaByID($asig_codigo);
        if (($object->getAsig_codigo() == null || $object->getAsig_codigo() == "")) {
            $asignatura = new AsignaturaDTO();
            $asignatura->setAsig_codigo($asig_codigo);
            $asignatura->setAsig_nombre($asig_nombre);
            $asignatura->setM_id($m_id);
            $asignatura->setTa_id($ta_id);

            $result = $control->addAsignatura($asignatura);

            if ($result) {
                echo json_encode(array(
                    'success' => true,
                    'mensaje' => "Asignatura ingresada correctamente"
                ));
            } else {
                echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
            }
        } else {
            echo json_encode(array('errorMsg' => 'El o la asignatura ya existe, intento nuevamente.'));
        }
    } else if ($accion == "BORRAR") {
        $asig_codigo = htmlspecialchars($_REQUEST['asig_codigo']);

        $result = $control->removeAsignatura($asig_codigo);
        if ($result) {
            echo json_encode(array('success' => true, 'mensaje' => "Asignatura borrado correctamente"));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    } else if ($accion == "BUSCAR") {
        $cadena = htmlspecialchars($_REQUEST['cadena']);
        $asignaturas = $control->getAsignaturaLikeAtrr($cadena);
        $json = json_encode($asignaturas);
        echo $json;
    } else if ($accion == "BUSCAR_BY_ID") {
        $asig_codigo = htmlspecialchars($_REQUEST['asig_codigo']);

        $asignatura = $control->getAsignaturaByID($asig_codigo);
        $json = json_encode($asignatura);
        echo $json;
    } else if ($accion == "ACTUALIZAR") {
        $asig_codigo = htmlspecialchars($_REQUEST['asig_codigo']);
        $asig_nombre = htmlspecialchars($_REQUEST['asig_nombre']);
        $m_id = htmlspecialchars($_REQUEST['m_id']);
        $ta_id = htmlspecialchars($_REQUEST['ta_id']);

            $asignatura = new AsignaturaDTO();
            $asignatura->setAsig_codigo($asig_codigo);
            $asignatura->setAsig_nombre($asig_nombre);
            $asignatura->setM_id($m_id);
            $asignatura->setTa_id($ta_id);

        $result = $control->updateAsignatura($asignatura);
        if ($result) {
            echo json_encode(array(
                'success' => true,
                'mensaje' => "Asignatura actualizada correctamente"
            ));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    }
}
