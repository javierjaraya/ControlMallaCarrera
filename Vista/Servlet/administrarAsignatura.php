<?php

include_once '../../Controlador/Contenedor.php';

$control = Contenedor::getInstancia();

$accion = htmlspecialchars($_REQUEST['accion']);
if ($accion != null) {
    if ($accion == "LISTADO") {
        $asignaturas = $control->getAllAsignaturas();
        $json = json_encode($asignaturas);
        echo $json;
    } else if ($accion == "AGREGAR") {
        $asig_codigo = htmlspecialchars($_REQUEST['asig_codigo']);
        $asig_nombre = htmlspecialchars($_REQUEST['asig_nombre']);
        $asig_periodo = htmlspecialchars($_REQUEST['asig_periodo']);
        $asig_creditos = htmlspecialchars($_REQUEST['asig_creditos']);
        $m_id = htmlspecialchars($_REQUEST['m_id']);
        $ta_id = htmlspecialchars($_REQUEST['ta_id']);
        $n_prerrequisito = 0;
        if (isset($_REQUEST['n_prerrequisito'])) {
            $n_prerrequisito = htmlspecialchars($_REQUEST['n_prerrequisito']);
        }

        $bandera = true;
        $object = $control->getAsignaturaByID($asig_codigo);
        if (($object->getAsig_codigo() == null || $object->getAsig_codigo() == "")) {
            $result;
            if ($ta_id == 1) {//Normal
                $asignatura = new AsignaturaDTO();
                $asignatura->setAsig_codigo($asig_codigo);
                $asignatura->setAsig_nombre($asig_nombre);
                $asignatura->setAsig_periodo($asig_periodo);
                $asignatura->setAsig_creditos($asig_creditos);
                $asignatura->setM_id($m_id);
                $asignatura->setTa_id($ta_id);

                $result = $control->addAsignatura($asignatura);

                if ($result) {
                    for ($i = 0; $i <= $n_prerrequisito; $i++) {
                        if (isset($_REQUEST['cod_prerrequisito_' . $i])) {
                            $asig_codigo_prerrequisito = htmlspecialchars($_REQUEST['cod_prerrequisito_' . $i]);
                            $prerrequisito = new PrerrequisitoDTO();
                            $prerrequisito->setAsig_codigo($asig_codigo);
                            $prerrequisito->setAsig_codigo_prerrequisito($asig_codigo_prerrequisito);

                            $control->addPrerrequisito($prerrequisito);
                        }
                    }
                }
            } else if ($ta_id == 2) {//Formacion Integral
                $asignatura = new AsignaturaDTO();
                $asignatura->setAsig_codigo($asig_codigo);
                $asignatura->setAsig_nombre($asig_nombre);
                $asignatura->setAsig_periodo($asig_periodo);
                $asignatura->setAsig_creditos($asig_creditos);
                $asignatura->setM_id($m_id);
                $asignatura->setTa_id($ta_id);

                $result = $control->addAsignatura($asignatura);
            } else if ($ta_id == 3) {//Electivo
                $object = $control->getGrupo_electivoByID($asig_codigo);
                if (($object->getGe_codigo() == null || $object->getGe_codigo() == "")) {
                    $grupo_electivo = new Grupo_electivoDTO();
                    $grupo_electivo->setGe_codigo($asig_codigo);
                    $grupo_electivo->setGe_nombre($asig_nombre);
                    $grupo_electivo->setGe_periodo($asig_periodo);
                    $grupo_electivo->setGe_creditos($asig_creditos);
                    $grupo_electivo->setTa_id($ta_id);
                    $grupo_electivo->setM_id($m_id);

                    $result = $control->addGrupo_electivo($grupo_electivo);
                } else {
                    $bandera = false;
                    echo json_encode(array('errorMsg' => 'Ya existe una asignatura con el código ingresado, intente nuevamente.'));
                }
            }

            if ($bandera) {
                if ($result) {
                    echo json_encode(array(
                        'success' => true,
                        'mensaje' => "Asignatura ingresada correctamente"
                    ));
                } else {
                    echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
                }
            }
        } else {
            echo json_encode(array('errorMsg' => 'Ya existe una asignatura con el código ingresado, intente nuevamente.'));
        }
    } else if ($accion == "BORRAR") {
        $asig_codigo = htmlspecialchars($_REQUEST['asig_codigo']);

        $result = $control->removeAsignatura($asig_codigo);
        if ($result) {
            echo json_encode(array('success' => true, 'mensaje' => "Asignatura borrado correctamente"));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    } else if ($accion == "BUSCAR") {
        $cadena = htmlspecialchars($_REQUEST['cadena']);
        $asignaturas = $control->getAsignaturaLikeAtrr($cadena);
        $json = json_encode($asignaturas);
        echo $json;
    } else if ($accion == "BUSCAR_BY_ID") {
        $asig_codigo = htmlspecialchars($_REQUEST['asig_codigo']);

        $asignatura = $control->getAsignaturaByID($asig_codigo);
        $json = json_encode($asignatura);
        echo $json;
    } else if ($accion == "ACTUALIZAR") {
        $asig_codigo = htmlspecialchars($_REQUEST['asig_codigo']);
        $asig_nombre = htmlspecialchars($_REQUEST['asig_nombre']);
        $asig_periodo = htmlspecialchars($_REQUEST['asig_periodo']);
        $asig_creditos = htmlspecialchars($_REQUEST['asig_creditos']);
        $m_id = htmlspecialchars($_REQUEST['m_id']);
        $ta_id = htmlspecialchars($_REQUEST['ta_id']);
        $n_prerrequisito = 0;
        if (isset($_REQUEST['n_prerrequisito'])) {
            $n_prerrequisito = htmlspecialchars($_REQUEST['n_prerrequisito']);
        }

        $result;
        if ($ta_id == 1) {//Normal
            $asignatura = new AsignaturaDTO();
            $asignatura->setAsig_codigo($asig_codigo);
            $asignatura->setAsig_nombre($asig_nombre);
            $asignatura->setAsig_periodo($asig_periodo);
            $asignatura->setAsig_creditos($asig_creditos);
            $asignatura->setM_id($m_id);
            $asignatura->setTa_id($ta_id);

            $result = $control->updateAsignatura($asignatura);

            if ($result) {
                for ($i = 0; $i <= $n_prerrequisito; $i++) {
                    if (isset($_REQUEST['cod_prerrequisito_' . $i])) {
                        $asig_codigo_prerrequisito = htmlspecialchars($_REQUEST['cod_prerrequisito_' . $i]);
                        $prerrequisito = new PrerrequisitoDTO();
                        $prerrequisito->setAsig_codigo($asig_codigo);
                        $prerrequisito->setAsig_codigo_prerrequisito($asig_codigo_prerrequisito);

                        $control->addPrerrequisito($prerrequisito);
                    }
                }
            }
        } else if ($ta_id == 2) {//Formacion Integral
            $asignatura = new AsignaturaDTO();
            $asignatura->setAsig_codigo($asig_codigo);
            $asignatura->setAsig_nombre($asig_nombre);
            $asignatura->setAsig_periodo($asig_periodo);
            $asignatura->setAsig_creditos($asig_creditos);
            $asignatura->setM_id($m_id);
            $asignatura->setTa_id($ta_id);

            $result = $control->updateAsignatura($asignatura);
        } else if ($ta_id == 3) {//Electivo
            $grupo_electivo = new Grupo_electivoDTO();
            $grupo_electivo->setGe_codigo($asig_codigo);
            $grupo_electivo->setGe_nombre($asig_nombre);
            $grupo_electivo->setGe_periodo($asig_periodo);
            $grupo_electivo->setGe_creditos($asig_creditos);
            $grupo_electivo->setTa_id($ta_id);
            $grupo_electivo->setM_id($m_id);

            $result = $control->updateGrupo_electivo($grupo_electivo);
        }

        if ($result) {
            echo json_encode(array(
                'success' => true,
                'mensaje' => "Asignatura actualizada correctamente"
            ));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    } else if ($accion == "OBTENER_POSIBLES_PRERREQUISITOS") {
        $asig_periodo = htmlspecialchars($_REQUEST['asig_periodo']);
        $m_id = htmlspecialchars($_REQUEST['m_id']);
        $asignaturas = $control->getAllPosiblesPrerrequisitos($m_id, $asig_periodo);
        $json = json_encode($asignaturas);
        echo $json;
    }
}
