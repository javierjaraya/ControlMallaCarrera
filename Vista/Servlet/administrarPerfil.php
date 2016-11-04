<?php

include_once '../../Controlador/Contenedor.php';

$control = Contenedor::getInstancia();

$accion = htmlspecialchars($_REQUEST['accion']);
if ($accion != null) {
    if ($accion == "LISTADO") {
        $perfils = $control->getAllPerfils();
        $json = json_encode($perfils);
        echo $json;
    } else if ($accion == "AGREGAR") {
        $per_id = htmlspecialchars($_REQUEST['per_id']);
        $per_nombre = htmlspecialchars($_REQUEST['per_nombre']);

        $object = $control->getPerfilByID($per_id);
        if (($object->getPer_id() == null || $object->getPer_id() == "")) {
            $perfil = new PerfilDTO();
            $perfil->setPer_id($per_id);
            $perfil->setPer_nombre($per_nombre);

            $result = $control->addPerfil($perfil);

            if ($result) {
                echo json_encode(array(
                    'success' => true,
                    'mensaje' => "Perfil ingresada correctamente"
                ));
            } else {
                echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
            }
        } else {
            echo json_encode(array('errorMsg' => 'El o la perfil ya existe, intento nuevamente.'));
        }
    } else if ($accion == "BORRAR") {
        $per_id = htmlspecialchars($_REQUEST['per_id']);

        $result = $control->removePerfil($per_id);
        if ($result) {
            echo json_encode(array('success' => true, 'mensaje' => "Perfil borrado correctamente"));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    } else if ($accion == "BUSCAR") {
        $cadena = htmlspecialchars($_REQUEST['cadena']);
        $perfils = $control->getPerfilLikeAtrr($cadena);
        $json = json_encode($perfils);
        echo $json;
    } else if ($accion == "BUSCAR_BY_ID") {
        $per_id = htmlspecialchars($_REQUEST['per_id']);

        $perfil = $control->getPerfilByID($per_id);
        $json = json_encode($perfil);
        echo $json;
    } else if ($accion == "ACTUALIZAR") {
        $per_id = htmlspecialchars($_REQUEST['per_id']);
        $per_nombre = htmlspecialchars($_REQUEST['per_nombre']);

            $perfil = new PerfilDTO();
            $perfil->setPer_id($per_id);
            $perfil->setPer_nombre($per_nombre);

        $result = $control->updatePerfil($perfil);
        if ($result) {
            echo json_encode(array(
                'success' => true,
                'mensaje' => "Perfil actualizada correctamente"
            ));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    }
}
