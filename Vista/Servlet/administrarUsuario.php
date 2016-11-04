<?php

include_once '../../Controlador/Contenedor.php';

$control = Contenedor::getInstancia();

$accion = htmlspecialchars($_REQUEST['accion']);
if ($accion != null) {
    if ($accion == "LISTADO") {
        $usuarios = $control->getAllUsuarios();
        $json = json_encode($usuarios);
        echo $json;
        echo ";";
    } else if ($accion == "AGREGAR") {
        $usu_rut = htmlspecialchars($_REQUEST['usu_rut']);
        $usu_nombres = htmlspecialchars($_REQUEST['usu_nombres']);
        $usu_apellidos = htmlspecialchars($_REQUEST['usu_apellidos']);
        $usu_email = htmlspecialchars($_REQUEST['usu_email']);
        $usu_password = htmlspecialchars($_REQUEST['usu_password']);
        $usu_docente = htmlspecialchars($_REQUEST['usu_docente']);

        $object = $control->getUsuarioByID($usu_rut);
        if (($object->getUsu_rut() == null || $object->getUsu_rut() == "")) {
            $usuario = new UsuarioDTO();
            $usuario->setUsu_rut($usu_rut);
            $usuario->setUsu_nombres($usu_nombres);
            $usuario->setUsu_apellidos($usu_apellidos);
            $usuario->setUsu_email($usu_email);
            $usuario->setUsu_password($usu_password);
            $usuario->setUsu_docente($usu_docente);

            $result = $control->addUsuario($usuario);

            if ($result) {
                echo json_encode(array(
                    'success' => true,
                    'mensaje' => "Usuario ingresada correctamente"
                ));
            } else {
                echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
            }
        } else {
            echo json_encode(array('errorMsg' => 'El o la usuario ya existe, intento nuevamente.'));
        }
    } else if ($accion == "BORRAR") {
        $usu_rut = htmlspecialchars($_REQUEST['usu_rut']);

        $result = $control->removeUsuario($usu_rut);
        if ($result) {
            echo json_encode(array('success' => true, 'mensaje' => "Usuario borrado correctamente"));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    } else if ($accion == "BUSCAR") {
        $cadena = htmlspecialchars($_REQUEST['cadena']);
        $usuarios = $control->getUsuarioLikeAtrr($cadena);
        $json = json_encode($usuarios);
        echo $json;
    } else if ($accion == "BUSCAR_BY_ID") {
        $usu_rut = htmlspecialchars($_REQUEST['usu_rut']);

        $usuario = $control->getUsuarioByID($usu_rut);
        $json = json_encode($usuario);
        echo $json;
    } else if ($accion == "ACTUALIZAR") {
        $usu_rut = htmlspecialchars($_REQUEST['usu_rut']);
        $usu_nombres = htmlspecialchars($_REQUEST['usu_nombres']);
        $usu_apellidos = htmlspecialchars($_REQUEST['usu_apellidos']);
        $usu_email = htmlspecialchars($_REQUEST['usu_email']);
        $usu_password = htmlspecialchars($_REQUEST['usu_password']);
        $usu_docente = htmlspecialchars($_REQUEST['usu_docente']);

            $usuario = new UsuarioDTO();
            $usuario->setUsu_rut($usu_rut);
            $usuario->setUsu_nombres($usu_nombres);
            $usuario->setUsu_apellidos($usu_apellidos);
            $usuario->setUsu_email($usu_email);
            $usuario->setUsu_password($usu_password);
            $usuario->setUsu_docente($usu_docente);

        $result = $control->updateUsuario($usuario);
        if ($result) {
            echo json_encode(array(
                'success' => true,
                'mensaje' => "Usuario actualizada correctamente"
            ));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    }
}
