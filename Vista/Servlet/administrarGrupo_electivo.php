<?php

include_once '../../Controlador/Contenedor.php';

$control = Contenedor::getInstancia();

$accion = htmlspecialchars($_REQUEST['accion']);
if ($accion != null) {
    if ($accion == "LISTADO") {
        $grupo_electivos = $control->getAllGrupo_electivos();
        $json = json_encode($grupo_electivos);
        echo $json;
    } else if ($accion == "AGREGAR") {
        $ge_codigo = htmlspecialchars($_REQUEST['ge_codigo']);
        $ge_nombre = htmlspecialchars($_REQUEST['ge_nombre']);
        $ge_periodo = htmlspecialchars($_REQUEST['ge_periodo']);
        $ge_creditos = htmlspecialchars($_REQUEST['ge_creditos']);
        $m_id = htmlspecialchars($_REQUEST['m_id']);

        $object = $control->getGrupo_electivoByID($ge_codigo);
        if (($object->getGe_codigo() == null || $object->getGe_codigo() == "")) {
            $grupo_electivo = new Grupo_electivoDTO();
            $grupo_electivo->setGe_codigo($ge_codigo);
            $grupo_electivo->setGe_nombre($ge_nombre);
            $grupo_electivo->setGe_periodo($ge_periodo);
            $grupo_electivo->setGe_creditos($ge_creditos);
            $grupo_electivo->setM_id($m_id);

            $result = $control->addGrupo_electivo($grupo_electivo);

            if ($result) {
                echo json_encode(array(
                    'success' => true,
                    'mensaje' => "Grupo_electivo ingresada correctamente"
                ));
            } else {
                echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
            }
        } else {
            echo json_encode(array('errorMsg' => 'El o la grupo_electivo ya existe, intento nuevamente.'));
        }
    } else if ($accion == "BORRAR") {
        $ge_codigo = htmlspecialchars($_REQUEST['ge_codigo']);

        $result = $control->removeGrupo_electivo($ge_codigo);
        if ($result) {
            echo json_encode(array('success' => true, 'mensaje' => "Grupo_electivo borrado correctamente"));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    } else if ($accion == "BUSCAR") {
        $cadena = htmlspecialchars($_REQUEST['cadena']);
        $grupo_electivos = $control->getGrupo_electivoLikeAtrr($cadena);
        $json = json_encode($grupo_electivos);
        echo $json;
    } else if ($accion == "BUSCAR_BY_ID") {
        $ge_codigo = htmlspecialchars($_REQUEST['ge_codigo']);

        $grupo_electivo = $control->getGrupo_electivoByID($ge_codigo);
        $json = json_encode($grupo_electivo);
        echo $json;
    } else if ($accion == "ACTUALIZAR") {
        $ge_codigo = htmlspecialchars($_REQUEST['ge_codigo']);
        $ge_nombre = htmlspecialchars($_REQUEST['ge_nombre']);
        $ge_periodo = htmlspecialchars($_REQUEST['ge_periodo']);
        $ge_creditos = htmlspecialchars($_REQUEST['ge_creditos']);
        $m_id = htmlspecialchars($_REQUEST['m_id']);

            $grupo_electivo = new Grupo_electivoDTO();
            $grupo_electivo->setGe_codigo($ge_codigo);
            $grupo_electivo->setGe_nombre($ge_nombre);
            $grupo_electivo->setGe_periodo($ge_periodo);
            $grupo_electivo->setGe_creditos($ge_creditos);
            $grupo_electivo->setM_id($m_id);

        $result = $control->updateGrupo_electivo($grupo_electivo);
        if ($result) {
            echo json_encode(array(
                'success' => true,
                'mensaje' => "Grupo_electivo actualizada correctamente"
            ));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    }
}
