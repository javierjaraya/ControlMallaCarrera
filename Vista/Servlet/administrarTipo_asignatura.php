<?php

include_once '../../Controlador/Contenedor.php';

$control = Contenedor::getInstancia();

$accion = htmlspecialchars($_REQUEST['accion']);
if ($accion != null) {
    if ($accion == "LISTADO") {
        $tipo_asignaturas = $control->getAllTipo_asignaturas();
        $json = json_encode($tipo_asignaturas);
        echo $json;
    } else if ($accion == "AGREGAR") {
        $ta_id = htmlspecialchars($_REQUEST['ta_id']);
        $ta_nombre = htmlspecialchars($_REQUEST['ta_nombre']);

        $object = $control->getTipo_asignaturaByID($ta_id);
        if (($object->getTa_id() == null || $object->getTa_id() == "")) {
            $tipo_asignatura = new Tipo_asignaturaDTO();
            $tipo_asignatura->setTa_id($ta_id);
            $tipo_asignatura->setTa_nombre($ta_nombre);

            $result = $control->addTipo_asignatura($tipo_asignatura);

            if ($result) {
                echo json_encode(array(
                    'success' => true,
                    'mensaje' => "Tipo_asignatura ingresada correctamente"
                ));
            } else {
                echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
            }
        } else {
            echo json_encode(array('errorMsg' => 'El o la tipo_asignatura ya existe, intento nuevamente.'));
        }
    } else if ($accion == "BORRAR") {
        $ta_id = htmlspecialchars($_REQUEST['ta_id']);

        $result = $control->removeTipo_asignatura($ta_id);
        if ($result) {
            echo json_encode(array('success' => true, 'mensaje' => "Tipo_asignatura borrado correctamente"));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    } else if ($accion == "BUSCAR") {
        $cadena = htmlspecialchars($_REQUEST['cadena']);
        $tipo_asignaturas = $control->getTipo_asignaturaLikeAtrr($cadena);
        $json = json_encode($tipo_asignaturas);
        echo $json;
    } else if ($accion == "BUSCAR_BY_ID") {
        $ta_id = htmlspecialchars($_REQUEST['ta_id']);

        $tipo_asignatura = $control->getTipo_asignaturaByID($ta_id);
        $json = json_encode($tipo_asignatura);
        echo $json;
    } else if ($accion == "ACTUALIZAR") {
        $ta_id = htmlspecialchars($_REQUEST['ta_id']);
        $ta_nombre = htmlspecialchars($_REQUEST['ta_nombre']);

            $tipo_asignatura = new Tipo_asignaturaDTO();
            $tipo_asignatura->setTa_id($ta_id);
            $tipo_asignatura->setTa_nombre($ta_nombre);

        $result = $control->updateTipo_asignatura($tipo_asignatura);
        if ($result) {
            echo json_encode(array(
                'success' => true,
                'mensaje' => "Tipo_asignatura actualizada correctamente"
            ));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    }
}
