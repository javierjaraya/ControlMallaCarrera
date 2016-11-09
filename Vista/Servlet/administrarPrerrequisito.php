<?php

include_once '../../Controlador/Contenedor.php';

$control = Contenedor::getInstancia();

$accion = htmlspecialchars($_REQUEST['accion']);
if ($accion != null) {
    if ($accion == "LISTADO") {
        $prerrequisitos = $control->getAllPrerrequisitos();
        $json = json_encode($prerrequisitos);
        echo $json;
    } else if ($accion == "AGREGAR") {
        $pre_id = htmlspecialchars($_REQUEST['pre_id']);
        $asig_codigo = htmlspecialchars($_REQUEST['asig_codigo']);
        $asig_codigo_prerrequisito = htmlspecialchars($_REQUEST['asig_codigo_prerrequisito']);

        $object = $control->getPrerrequisitoByID($pre_id);
        if (($object->getPre_id() == null || $object->getPre_id() == "")) {
            $prerrequisito = new PrerrequisitoDTO();
            $prerrequisito->setPre_id($pre_id);
            $prerrequisito->setAsig_codigo($asig_codigo);
            $prerrequisito->setAsig_codigo_prerrequisito($asig_codigo_prerrequisito);

            $result = $control->addPrerrequisito($prerrequisito);

            if ($result) {
                echo json_encode(array(
                    'success' => true,
                    'mensaje' => "Prerrequisito ingresada correctamente"
                ));
            } else {
                echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
            }
        } else {
            echo json_encode(array('errorMsg' => 'El o la prerrequisito ya existe, intento nuevamente.'));
        }
    } else if ($accion == "BORRAR") {
        $pre_id = htmlspecialchars($_REQUEST['pre_id']);

        $result = $control->removePrerrequisito($pre_id);
        if ($result) {
            echo json_encode(array('success' => true, 'mensaje' => "Prerrequisito borrado correctamente"));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    } else if ($accion == "BUSCAR") {
        $cadena = htmlspecialchars($_REQUEST['cadena']);
        $prerrequisitos = $control->getPrerrequisitoLikeAtrr($cadena);
        $json = json_encode($prerrequisitos);
        echo $json;
    } else if ($accion == "BUSCAR_BY_ID") {
        $pre_id = htmlspecialchars($_REQUEST['pre_id']);

        $prerrequisito = $control->getPrerrequisitoByID($pre_id);
        $json = json_encode($prerrequisito);
        echo $json;
    } else if ($accion == "ACTUALIZAR") {
        $pre_id = htmlspecialchars($_REQUEST['pre_id']);
        $asig_codigo = htmlspecialchars($_REQUEST['asig_codigo']);
        $asig_codigo_prerrequisito = htmlspecialchars($_REQUEST['asig_codigo_prerrequisito']);

            $prerrequisito = new PrerrequisitoDTO();
            $prerrequisito->setPre_id($pre_id);
            $prerrequisito->setAsig_codigo($asig_codigo);
            $prerrequisito->setAsig_codigo_prerrequisito($asig_codigo_prerrequisito);

        $result = $control->updatePrerrequisito($prerrequisito);
        if ($result) {
            echo json_encode(array(
                'success' => true,
                'mensaje' => "Prerrequisito actualizada correctamente"
            ));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    } else if ($accion == "OBTENER_PRERREQUISITOS") {
        $asig_codigo = htmlspecialchars($_REQUEST['asig_codigo']);
        
        $prerrequisitos = $control->getAllPrerrequisitosByAsig_Codigo($asig_codigo);
        $json = json_encode($prerrequisitos);
        echo $json;
    }
}
