<?php

include_once '../../Controlador/Contenedor.php';

$control = Contenedor::getInstancia();

$accion = htmlspecialchars($_REQUEST['accion']);
if ($accion != null) {
    if ($accion == "LISTADO") {
        $desarrollo_programa_didacticos = $control->getAllDesarrollo_programa_didacticos();
        $json = json_encode($desarrollo_programa_didacticos);
        echo $json;
    } else if ($accion == "AGREGAR") {
        $dpd_id = htmlspecialchars($_REQUEST['dpd_id']);
        $dpd_actividad_aprendizaje = htmlspecialchars($_REQUEST['dpd_actividad_aprendizaje']);
        $dpd_mediacion_enseñanza = htmlspecialchars($_REQUEST['dpd_mediacion_enseñanza']);
        $dpd_actividad_evaluacion = htmlspecialchars($_REQUEST['dpd_actividad_evaluacion']);
        $dpd_recurso_didactivo = htmlspecialchars($_REQUEST['dpd_recurso_didactivo']);
        $dpd_hp_ht = htmlspecialchars($_REQUEST['dpd_hp_ht']);
        $dpd_hp_hp = htmlspecialchars($_REQUEST['dpd_hp_hp']);
        $dpd_hp_hl = htmlspecialchars($_REQUEST['dpd_hp_hl']);
        $dpd_ha_ht = htmlspecialchars($_REQUEST['dpd_ha_ht']);
        $dpd_ha_hp = htmlspecialchars($_REQUEST['dpd_ha_hp']);
        $dpd_ha_hl = htmlspecialchars($_REQUEST['dpd_ha_hl']);
        $ra_id = htmlspecialchars($_REQUEST['ra_id']);
        $pd_id = htmlspecialchars($_REQUEST['pd_id']);

        $object = $control->getDesarrollo_programa_didacticoByID($dpd_id);
        if (($object->getDpd_id() == null || $object->getDpd_id() == "")) {
            $desarrollo_programa_didactico = new Desarrollo_programa_didacticoDTO();
            $desarrollo_programa_didactico->setDpd_id($dpd_id);
            $desarrollo_programa_didactico->setDpd_actividad_aprendizaje($dpd_actividad_aprendizaje);
            $desarrollo_programa_didactico->setDpd_mediacion_ensenianza($dpd_mediacion_enseñanza);
            $desarrollo_programa_didactico->setDpd_actividad_evaluacion($dpd_actividad_evaluacion);
            $desarrollo_programa_didactico->setDpd_recurso_didactivo($dpd_recurso_didactivo);
            $desarrollo_programa_didactico->setDpd_hp_ht($dpd_hp_ht);
            $desarrollo_programa_didactico->setDpd_hp_hp($dpd_hp_hp);
            $desarrollo_programa_didactico->setDpd_hp_hl($dpd_hp_hl);
            $desarrollo_programa_didactico->setDpd_ha_ht($dpd_ha_ht);
            $desarrollo_programa_didactico->setDpd_ha_hp($dpd_ha_hp);
            $desarrollo_programa_didactico->setDpd_ha_hl($dpd_ha_hl);
            $desarrollo_programa_didactico->setRa_id($ra_id);
            $desarrollo_programa_didactico->setPd_id($pd_id);

            $result = $control->addDesarrollo_programa_didactico($desarrollo_programa_didactico);

            if ($result) {
                echo json_encode(array(
                    'success' => true,
                    'mensaje' => "Desarrollo_programa_didactico ingresada correctamente"
                ));
            } else {
                echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
            }
        } else {
            echo json_encode(array('errorMsg' => 'El o la desarrollo_programa_didactico ya existe, intento nuevamente.'));
        }
    } else if ($accion == "BORRAR") {
        $dpd_id = htmlspecialchars($_REQUEST['dpd_id']);

        $result = $control->removeDesarrollo_programa_didactico($dpd_id);
        if ($result) {
            echo json_encode(array('success' => true, 'mensaje' => "Desarrollo_programa_didactico borrado correctamente"));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    } else if ($accion == "BUSCAR") {
        $cadena = htmlspecialchars($_REQUEST['cadena']);
        $desarrollo_programa_didacticos = $control->getDesarrollo_programa_didacticoLikeAtrr($cadena);
        $json = json_encode($desarrollo_programa_didacticos);
        echo $json;
    } else if ($accion == "BUSCAR_BY_ID") {
        $dpd_id = htmlspecialchars($_REQUEST['dpd_id']);

        $desarrollo_programa_didactico = $control->getDesarrollo_programa_didacticoByID($dpd_id);
        $json = json_encode($desarrollo_programa_didactico);
        echo $json;
    } else if ($accion == "ACTUALIZAR") {
        $dpd_id = htmlspecialchars($_REQUEST['dpd_id']);
        $dpd_actividad_aprendizaje = htmlspecialchars($_REQUEST['dpd_actividad_aprendizaje']);
        $dpd_mediacion_enseñanza = htmlspecialchars($_REQUEST['dpd_mediacion_enseñanza']);
        $dpd_actividad_evaluacion = htmlspecialchars($_REQUEST['dpd_actividad_evaluacion']);
        $dpd_recurso_didactivo = htmlspecialchars($_REQUEST['dpd_recurso_didactivo']);
        $dpd_hp_ht = htmlspecialchars($_REQUEST['dpd_hp_ht']);
        $dpd_hp_hp = htmlspecialchars($_REQUEST['dpd_hp_hp']);
        $dpd_hp_hl = htmlspecialchars($_REQUEST['dpd_hp_hl']);
        $dpd_ha_ht = htmlspecialchars($_REQUEST['dpd_ha_ht']);
        $dpd_ha_hp = htmlspecialchars($_REQUEST['dpd_ha_hp']);
        $dpd_ha_hl = htmlspecialchars($_REQUEST['dpd_ha_hl']);
        $ra_id = htmlspecialchars($_REQUEST['ra_id']);
        $pd_id = htmlspecialchars($_REQUEST['pd_id']);

            $desarrollo_programa_didactico = new Desarrollo_programa_didacticoDTO();
            $desarrollo_programa_didactico->setDpd_id($dpd_id);
            $desarrollo_programa_didactico->setDpd_actividad_aprendizaje($dpd_actividad_aprendizaje);
            $desarrollo_programa_didactico->setDpd_mediacion_ensenianza($dpd_mediacion_enseñanza);
            $desarrollo_programa_didactico->setDpd_actividad_evaluacion($dpd_actividad_evaluacion);
            $desarrollo_programa_didactico->setDpd_recurso_didactivo($dpd_recurso_didactivo);
            $desarrollo_programa_didactico->setDpd_hp_ht($dpd_hp_ht);
            $desarrollo_programa_didactico->setDpd_hp_hp($dpd_hp_hp);
            $desarrollo_programa_didactico->setDpd_hp_hl($dpd_hp_hl);
            $desarrollo_programa_didactico->setDpd_ha_ht($dpd_ha_ht);
            $desarrollo_programa_didactico->setDpd_ha_hp($dpd_ha_hp);
            $desarrollo_programa_didactico->setDpd_ha_hl($dpd_ha_hl);
            $desarrollo_programa_didactico->setRa_id($ra_id);
            $desarrollo_programa_didactico->setPd_id($pd_id);

        $result = $control->updateDesarrollo_programa_didactico($desarrollo_programa_didactico);
        if ($result) {
            echo json_encode(array(
                'success' => true,
                'mensaje' => "Desarrollo_programa_didactico actualizada correctamente"
            ));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    }
}
