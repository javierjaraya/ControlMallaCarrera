<?php

include_once '../../Controlador/Contenedor.php';

$control = Contenedor::getInstancia();

$accion = htmlspecialchars($_REQUEST['accion']);
if ($accion != null) {
    if ($accion == "LISTADO") {
        $programa_didacticos = $control->getAllPrograma_didacticos();
        $json = json_encode($programa_didacticos);
        echo $json;
    } else if ($accion == "AGREGAR") {
        $pd_id = htmlspecialchars($_REQUEST['pd_id']);
        $pe_id = htmlspecialchars($_REQUEST['pe_id']);
        $pd_fecha_modificacion = htmlspecialchars($_REQUEST['pd_fecha_modificacion']);
        $usu_rut = htmlspecialchars($_REQUEST['usu_rut']);
        $pd_borrador = htmlspecialchars($_REQUEST['pd_borrador']);

        $object = $control->getPrograma_didacticoByID($pd_id);
        if (($object->getPd_id() == null || $object->getPd_id() == "")) {
            $programa_didactico = new Programa_didacticoDTO();
            $programa_didactico->setPd_id($pd_id);
            $programa_didactico->setPe_id($pe_id);
            $programa_didactico->setPd_fecha_modificacion($pd_fecha_modificacion);
            $programa_didactico->setUsu_rut($usu_rut);
            $programa_didactico->setPd_borrador($pd_borrador);

            $result = $control->addPrograma_didactico($programa_didactico);

            if ($result) {
                echo json_encode(array(
                    'success' => true,
                    'mensaje' => "Programa_didactico ingresada correctamente"
                ));
            } else {
                echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
            }
        } else {
            echo json_encode(array('errorMsg' => 'El o la programa_didactico ya existe, intento nuevamente.'));
        }
    } else if ($accion == "BORRAR") {
        $pd_id = htmlspecialchars($_REQUEST['pd_id']);

        $result = $control->removePrograma_didactico($pd_id);
        if ($result) {
            echo json_encode(array('success' => true, 'mensaje' => "Programa_didactico borrado correctamente"));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    } else if ($accion == "BUSCAR") {
        $cadena = htmlspecialchars($_REQUEST['cadena']);
        $programa_didacticos = $control->getPrograma_didacticoLikeAtrr($cadena);
        $json = json_encode($programa_didacticos);
        echo $json;
    } else if ($accion == "BUSCAR_BY_ID") {
        $pd_id = htmlspecialchars($_REQUEST['pd_id']);

        $programa_didactico = $control->getPrograma_didacticoByID($pd_id);
        $json = json_encode($programa_didactico);
        echo $json;
    } else if ($accion == "ACTUALIZAR") {
        $pd_id = htmlspecialchars($_REQUEST['pd_id']);
        $pe_id = htmlspecialchars($_REQUEST['pe_id']);
        $pd_fecha_modificacion = htmlspecialchars($_REQUEST['pd_fecha_modificacion']);
        $usu_rut = htmlspecialchars($_REQUEST['usu_rut']);
        $pd_borrador = htmlspecialchars($_REQUEST['pd_borrador']);

            $programa_didactico = new Programa_didacticoDTO();
            $programa_didactico->setPd_id($pd_id);
            $programa_didactico->setPe_id($pe_id);
            $programa_didactico->setPd_fecha_modificacion($pd_fecha_modificacion);
            $programa_didactico->setUsu_rut($usu_rut);
            $programa_didactico->setPd_borrador($pd_borrador);

        $result = $control->updatePrograma_didactico($programa_didactico);
        if ($result) {
            echo json_encode(array(
                'success' => true,
                'mensaje' => "Programa_didactico actualizada correctamente"
            ));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    }
}
