<?php

include_once '../../Controlador/Contenedor.php';
$control = Contenedor::getInstancia();

$usu_run = $_POST['usu_rut'];
$usu_password = $_POST['usu_password'];
$success = true;
$mensajes;
$pagina = "";
if (($usu_run != null || $usu_run != "") && ($usu_password != null || $usu_password != "")) {
    $usuario = $control->getUsuarioByID($usu_run);
    if ($usuario->getUsu_rut() == $usu_run) {
        if ($usuario->getUsu_password() == md5($usu_password)) {//$usuario->getUsu_password() == sha1(base64_encode($usu_password))
        //var_dump(sha1(base64_encode($usu_password)));
        //if ($usuario->getUsu_password() == sha1(base64_encode($usu_password))) {//$usuario->getUsu_password() == sha1(base64_encode($usu_password))
            $permiso = $control->getPermiso_usuarioByID($usu_run);
            $perfil = $control->getPerfilByID($permiso->getPer_id());
            session_start();
            $_SESSION["autentificado"] = "SI";
            $_SESSION["per_id"] = $permiso->getPer_id();
            $_SESSION["per_nombre"] = $perfil->getPer_nombre();
            $_SESSION["usu_run"] = $permiso->getUsu_rut();
            $_SESSION["usu_nombre"] = $usuario->getUsu_nombres();

            if ($permiso->getPer_id() == 1) {//Docente
                $pagina = "Vista/Layout/home.php";
            } else if ($permiso->getPer_id() == 2) {//Directiva
                $pagina = "Vista/Layout/administrarMallaCurricular.php";
            } else if ($permiso->getPer_id() == 3) {//Secretaria
                $pagina = "Vista/Layout/home.php";
            } else {
                $pagina = "index.php"; //DEFAULT
            }
            $success = true;
            $mensajes = "Iniciando... = ";
        } else {
            $success = false;
            $mensajes = "La clave ingresada es incorrecta. ";
        }
    } else {
        $success = false;
        $mensajes = "Usuario no existe.";
    }
} else {
    $success = false;
    $mensajes = "Ninguna casilla puede estar vacia.";
}
echo json_encode(array(
    'success' => $success,
    'mensaje' => $mensajes,
    'pagina' => $pagina
));
?>