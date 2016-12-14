<?php

include_once '../../Controlador/Contenedor.php';

$control = Contenedor::getInstancia();

$accion = htmlspecialchars($_REQUEST['accion']);
if ($accion != null) {
    if ($accion == "LISTADO") {
        $resultado_aprendizajes = $control->getAllResultado_aprendizajes();
        $json = json_encode($resultado_aprendizajes);
        echo $json;
    } else if ($accion == "LISTADO_BY_PE_ID") {
        $pe_id = htmlspecialchars($_REQUEST['pe_id']);
        $resultado_aprendizajes = $control->getAllResultado_aprendizajes_By_pe_id($pe_id);
        $json = json_encode($resultado_aprendizajes);
        echo $json;
    } else if ($accion == "AGREGAR") {
        $ra_id = htmlspecialchars($_REQUEST['ra_id']);
        $ra_resultado_aprendizaje = $_REQUEST['ra_resultado_aprendizaje'];
        $ra_metodologia = $_REQUEST['ra_metodologia'];
        $ra_criterios_evaluacion = $_REQUEST['ra_criterios_evaluacion'];
        $ra_contenido_con_pro_act = $_REQUEST['ra_contenido_con_pro_act'];
        $ra_ht_presenciales = htmlspecialchars($_REQUEST['ra_ht_presenciales']);
        $ra_hp_presenciales = htmlspecialchars($_REQUEST['ra_hp_presenciales']);
        $ra_ht_autonomas = htmlspecialchars($_REQUEST['ra_ht_autonomas']);
        $ra_hp_autonomas = htmlspecialchars($_REQUEST['ra_hp_autonomas']);
        $ra_evidencia_aprendizaje = $_REQUEST['ra_evidencia_aprendizaje'];
        $pe_id = htmlspecialchars($_REQUEST['pe_id']);

        $object = $control->getResultado_aprendizajeByID($ra_id);
        if (($object->getRa_id() == null || $object->getRa_id() == "")) {
            $resultado_aprendizaje = new Resultado_aprendizajeDTO();
            $resultado_aprendizaje->setRa_id($ra_id);
            $resultado_aprendizaje->setRa_resultado_aprendizaje($ra_resultado_aprendizaje);
            $resultado_aprendizaje->setRa_metodologia($ra_metodologia);
            $resultado_aprendizaje->setRa_criterios_evaluacion($ra_criterios_evaluacion);
            $resultado_aprendizaje->setRa_contenido_con_pro_act($ra_contenido_con_pro_act);
            $resultado_aprendizaje->setRa_ht_presenciales($ra_ht_presenciales);
            $resultado_aprendizaje->setRa_hp_presenciales($ra_hp_presenciales);
            $resultado_aprendizaje->setRa_ht_autonomas($ra_ht_autonomas);
            $resultado_aprendizaje->setRa_hp_autonomas($ra_hp_autonomas);
            $resultado_aprendizaje->setRa_evidencia_aprendizaje($ra_evidencia_aprendizaje);
            $resultado_aprendizaje->setPe_id($pe_id);

            $result = $control->addResultado_aprendizaje($resultado_aprendizaje);

            if ($result) {
                echo json_encode(array(
                    'success' => true,
                    'mensaje' => "Resultado_aprendizaje ingresada correctamente"
                ));
            } else {
                echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
            }
        } else {
            echo json_encode(array('errorMsg' => 'El o la resultado_aprendizaje ya existe, intento nuevamente.'));
        }
    } else if ($accion == "BORRAR") {
        $ra_id = htmlspecialchars($_REQUEST['ra_id']);

        $result = $control->removeResultado_aprendizaje($ra_id);
        if ($result) {
            echo json_encode(array('success' => true, 'mensaje' => "Resultado_aprendizaje borrado correctamente"));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    } else if ($accion == "BUSCAR") {
        $cadena = htmlspecialchars($_REQUEST['cadena']);
        $resultado_aprendizajes = $control->getResultado_aprendizajeLikeAtrr($cadena);
        $json = json_encode($resultado_aprendizajes);
        echo $json;
    } else if ($accion == "BUSCAR_BY_ID") {
        $ra_id = htmlspecialchars($_REQUEST['ra_id']);

        $resultado_aprendizaje = $control->getResultado_aprendizajeByID($ra_id);
        $json = json_encode($resultado_aprendizaje);
        echo $json;
    } else if ($accion == "ACTUALIZAR") {
        $ra_id = htmlspecialchars($_REQUEST['ra_id']);
        $ra_resultado_aprendizaje = $_REQUEST['ra_resultado_aprendizaje'];
        $ra_metodologia = $_REQUEST['ra_metodologia'];
        $ra_criterios_evaluacion = $_REQUEST['ra_criterios_evaluacion'];
        $ra_contenido_con_pro_act = $_REQUEST['ra_contenido_con_pro_act'];
        $ra_ht_presenciales = htmlspecialchars($_REQUEST['ra_ht_presenciales']);
        $ra_hp_presenciales = htmlspecialchars($_REQUEST['ra_hp_presenciales']);
        $ra_ht_autonomas = htmlspecialchars($_REQUEST['ra_ht_autonomas']);
        $ra_hp_autonomas = htmlspecialchars($_REQUEST['ra_hp_autonomas']);
        $ra_evidencia_aprendizaje = $_REQUEST['ra_evidencia_aprendizaje'];
        $pe_id = htmlspecialchars($_REQUEST['pe_id']);

        $resultado_aprendizaje = new Resultado_aprendizajeDTO();
        $resultado_aprendizaje->setRa_id($ra_id);
        $resultado_aprendizaje->setRa_resultado_aprendizaje($ra_resultado_aprendizaje);
        $resultado_aprendizaje->setRa_metodologia($ra_metodologia);
        $resultado_aprendizaje->setRa_criterios_evaluacion($ra_criterios_evaluacion);
        $resultado_aprendizaje->setRa_contenido_con_pro_act($ra_contenido_con_pro_act);
        $resultado_aprendizaje->setRa_ht_presenciales($ra_ht_presenciales);
        $resultado_aprendizaje->setRa_hp_presenciales($ra_hp_presenciales);
        $resultado_aprendizaje->setRa_ht_autonomas($ra_ht_autonomas);
        $resultado_aprendizaje->setRa_hp_autonomas($ra_hp_autonomas);
        $resultado_aprendizaje->setRa_evidencia_aprendizaje($ra_evidencia_aprendizaje);
        $resultado_aprendizaje->setPe_id($pe_id);

        $result = $control->updateResultado_aprendizaje($resultado_aprendizaje);
        if ($result) {
            echo json_encode(array(
                'success' => true,
                'mensaje' => "Resultado_aprendizaje actualizada correctamente"
            ));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    }
}
