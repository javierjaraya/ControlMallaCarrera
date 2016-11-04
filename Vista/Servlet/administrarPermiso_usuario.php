<?php

include_once '../../Controlador/Contenedor.php';

$control = Contenedor::getInstancia();

$accion = htmlspecialchars($_REQUEST['accion']);
if ($accion != null) {
    if ($accion == "LISTADO") {
        $permiso_usuarios = $control->getAllPermiso_usuarios();
        $json = json_encode($permiso_usuarios);
        echo $json;
    } else if ($accion == "AGREGAR") {
        $usu_rut = htmlspecialchars($_REQUEST['usu_rut']);
        $per_id = htmlspecialchars($_REQUEST['per_id']);

        $object = $control->getPermiso_usuarioByID($usu_rut);
        if (($object->getUsu_rut() != null || $object->getUsu_rut() != "")) {
            $control->removePermiso_usuario($usu_rut);
        }
        $permiso_usuario = new Permiso_usuarioDTO();
        $permiso_usuario->setUsu_rut($usu_rut);
        $permiso_usuario->setPer_id($per_id);

        $result = $control->addPermiso_usuario($permiso_usuario);

        if ($result) {
            echo json_encode(array(
                'success' => true,
                'mensaje' => "Permiso actualizado correctamente"
            ));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    } else if ($accion == "BORRAR") {
        $usu_rut = htmlspecialchars($_REQUEST['usu_rut']);

        $result = $control->removePermiso_usuario($usu_rut);
        if ($result) {
            echo json_encode(array('success' => true, 'mensaje' => "Permiso_usuario borrado correctamente"));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    } else if ($accion == "BUSCAR") {
        $cadena = htmlspecialchars($_REQUEST['cadena']);
        $permiso_usuarios = $control->getPermiso_usuarioLikeAtrr($cadena);
        $json = json_encode($permiso_usuarios);
        echo $json;
    } else if ($accion == "BUSCAR_BY_ID") {
        $usu_rut = htmlspecialchars($_REQUEST['usu_rut']);

        $permiso_usuario = $control->getPermiso_usuarioByID($usu_rut);
        $json = json_encode($permiso_usuario);
        echo $json;
    } else if ($accion == "ACTUALIZAR") {
        $usu_rut = htmlspecialchars($_REQUEST['usu_rut']);
        $per_id = htmlspecialchars($_REQUEST['per_id']);

        $object = $control->getPermiso_usuarioByID($usu_rut);

        if (($object->getUsu_rut() != null || $object->getUsu_rut() != "")) {
            $control->removePermiso_usuario($usu_rut);
        }

        $permiso_usuario = new Permiso_usuarioDTO();
        $permiso_usuario->setUsu_rut($usu_rut);
        $permiso_usuario->setPer_id($per_id);

        $result = $control->updatePermiso_usuario($permiso_usuario);
        if ($result) {
            echo json_encode(array(
                'success' => true,
                'mensaje' => "Permiso_usuario actualizada correctamente"
            ));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    }
}
