<?php

include_once '../../Controlador/Contenedor.php';

$control = Contenedor::getInstancia();

$accion = htmlspecialchars($_REQUEST['accion']);
if ($accion != null) {
    if ($accion == "LISTADO") {
        $mallas = $control->getAllMallas();
        $json = json_encode($mallas);
        echo $json;
    } else if ($accion == "AGREGAR") {
        $m_id = htmlspecialchars($_REQUEST['m_id']);
        $m_fechaInicio = htmlspecialchars($_REQUEST['m_fechaInicio']);
        $m_fechaFin = htmlspecialchars($_REQUEST['m_fechaFin']);
        $m_cantidadSemestres = htmlspecialchars($_REQUEST['m_cantidadSemestres']);

        $object = $control->getMallaByID($m_id);
        if (($object->getM_id() == null || $object->getM_id() == "")) {
            $malla = new MallaDTO();
            $malla->setM_id($m_id);
            $malla->setM_fechaInicio($m_fechaInicio);
            $malla->setM_fechaFin($m_fechaFin);
            $malla->setM_cantidadSemestres($m_cantidadSemestres);

            $result = $control->addMalla($malla);

            if ($result) {
                echo json_encode(array(
                    'success' => true,
                    'mensaje' => "Malla creada correctamente"
                ));
            } else {
                echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
            }
        } else {
            echo json_encode(array('errorMsg' => 'El código ingresado ya esta asociado a una malla, intente nuevamente.'));
        }
    } else if ($accion == "BORRAR") {
        $m_id = htmlspecialchars($_REQUEST['m_id']);

        $result = $control->removeMalla($m_id);
        if ($result) {
            echo json_encode(array('success' => true, 'mensaje' => "Malla borrado correctamente"));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    } else if ($accion == "BUSCAR") {
        $cadena = htmlspecialchars($_REQUEST['cadena']);
        $mallas = $control->getMallaLikeAtrr($cadena);
        $json = json_encode($mallas);
        echo $json;
    } else if ($accion == "BUSCAR_BY_ID") {
        $m_id = htmlspecialchars($_REQUEST['m_id']);
        $malla = $control->getMallaByID($m_id);
        $m_cantidadSemestres = $malla->getM_cantidadSemestres();
        $n_max_asignatuas = $control->cantidadMaximaAsignaturasEnSemestreByMalla($m_id);

        //CREAMOS LA MATRIZ PARA LA MALLA 
        $asignaturas_malla = array();
        for ($i = 1; $i <= $m_cantidadSemestres; $i ++) {
            $asignaturas_malla[$i] = array();
        }
        //ASIGNATURAS
        $asignaturas = $control->getAsignaturasByM_Id($m_id);
        foreach ($asignaturas as $asignatura) {
            array_push($asignaturas_malla[$asignatura->getAsig_periodo()], $asignatura);
        }
        //ELECTIVOS
        $electivos = $control->getGrupo_electivoByM_Id($m_id);
        foreach ($electivos as $electivo) {
            array_push($asignaturas_malla[$electivo->getGe_periodo()], $electivo);
        }

        $json = json_encode(array("malla" => $malla, "asignatuas_malla" => $asignaturas_malla, "n_max_asignatuas" => $n_max_asignatuas));
        echo $json;
    } else if ($accion == "ACTUALIZAR") {
        $m_id = htmlspecialchars($_REQUEST['m_id']);
        $m_fechaInicio = htmlspecialchars($_REQUEST['m_fechaInicio']);
        $m_fechaFin = htmlspecialchars($_REQUEST['m_fechaFin']);
        $m_cantidadSemestres = htmlspecialchars($_REQUEST['m_cantidadSemestres']);

        $maxPerido = $control->maxPeriodoUtilizadoByM_Id($m_id);

        if ($m_cantidadSemestres >= $maxPerido) {
            $malla = new MallaDTO();
            $malla->setM_id($m_id);
            $malla->setM_fechaInicio($m_fechaInicio);
            $malla->setM_fechaFin($m_fechaFin);
            $malla->setM_cantidadSemestres($m_cantidadSemestres);

            $result = $control->updateMalla($malla);
            if ($result) {
                echo json_encode(array(
                    'success' => true,
                    'mensaje' => "Malla actualizada correctamente"
                ));
            } else {
                echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
            }
        } else {
            echo json_encode(array('errorMsg' => 'No puede eliminar un semestre utilizado.'));
        }
    } else if ($accion == "OBTENER_PROGRAMAS_APROBADOS_PERIODO") {
        $m_id = htmlspecialchars($_REQUEST['m_id']);
        $m_fechaInicio = htmlspecialchars($_REQUEST['m_fechaInicio']);
        $m_fechaFin = htmlspecialchars($_REQUEST['m_fechaFin']);

        $programa_basicos = $control->getPrograma_basicos_aprobados_By_m_id_and_periodo($m_id, $m_fechaInicio, $m_fechaFin);
        $programa_extenso = $control->getPrograma_extensos_aprobados_By_m_id_and_periodo($m_id, $m_fechaInicio, $m_fechaFin);
        $programa_didactico = $control->getPrograma_didacticos_aprobados_By_m_id_and_periodo($m_id, $m_fechaInicio, $m_fechaFin);

        $asignaturas = $control->getAllAsignaturasBy_m_id($m_id);

        $programas_asignaturas = array();

        $i = 0;
        foreach ($asignaturas as $asignatura) {
            $codigo = $asignatura->getAsig_codigo();
            
            foreach ($programa_basicos as $basico) {
                if ($codigo == $basico->getAsig_codigo()) {
                    $programas_asignaturas[$i] = array("pb" => true, "pe" => false, "pd" => false, "programa" => $basico);
                    $i++;
                }
            }
            
            foreach ($programa_extenso as $extenso) {
                if ($codigo == $extenso->getAsig_codigo()) {
                    $programas_asignaturas[$i] = array("pb" => false, "pe" => true, "pd" => false, "programa" => $extenso);
                    $i++;
                }
            }
            
            foreach ($programa_didactico as $didactico) {
                $asignatura_p_didactico = $didactico->getAsignatura();
                if ($codigo == $asignatura_p_didactico->getAsig_codigo()) {
                    $programas_asignaturas[$i] = array("pb" => false, "pe" => false, "pd" => true, "programa" => $didactico);
                    $i++;
                }
            }
        }
        
        echo json_encode($programas_asignaturas);
    } else if ($accion == "OBTENER_PROGRAMAS_POR_VENCER") {
        
        $hoy = getdate();
        $dia = $hoy['mday'];
        $mes = $hoy['mon'];
        $anio = $hoy['year'];
        
        $fechaActual = $anio."-".$mes."-".$dia;
        
        /*PRIMER SEMESTRE AÑO ACUTAL*/
        $inicioPrimerSemestre = $anio."-01-01";
        $finPrimerSemestre = $anio."-06-30";
        /*SEGUNDO SEMESTRE AÑO ACUTAL*/
        $inicioSegundoSemestre = $anio."-07-01";
        $finSegundoSemestre = $anio."-12-31";
        /*PRIMER SEMESTRE PROXIMO AÑO*/
        $inicioPrimerSemestreProximoAnio = ($anio+1)."-01-01";
        $finPrimerSemestreProximoAnio = ($anio+1)."-06-30";
        
        $fecha_actual = strtotime($fechaActual);
        
        $fechaInicio;
        $fechaFin;
        if($fechaActual >= $inicioPrimerSemestre && $fechaActual <= $finPrimerSemestre) {
            $fechaInicio = $inicioSegundoSemestre;
            $fechaFin = $finSegundoSemestre;
        }else if($fechaActual >= $inicioSegundoSemestre && $fechaActual <= $finSegundoSemestre) {
            $fechaInicio = $inicioPrimerSemestreProximoAnio;
            $fechaFin = $finPrimerSemestreProximoAnio;
        }
        
        $programa_basicos = $control->getPrograma_basicos_por_vencer_en_periodo($fechaInicio, $fechaFin);
        $programa_extenso = $control->getPrograma_extensos_por_vencer_en_periodo($fechaInicio, $fechaFin);
        $programa_didactico = $control->getPrograma_didacticos_por_vencer_en_periodo($fechaInicio, $fechaFin);
        
        $asignaturas = $control->getAllAsignaturas();

        $programas_asignaturas = array();

        $countPB = 0;
        $countPE = 0;
        $countPD = 0;
        
        $i = 0;
        foreach ($asignaturas as $asignatura) {
            $codigo = $asignatura->getAsig_codigo();
            
            foreach ($programa_basicos as $basico) {
                if ($codigo == $basico->getAsig_codigo()) {
                    $programas_asignaturas[$i] = array("pb" => true, "pe" => false, "pd" => false, "programa" => $basico);
                    $i++;
                    $countPB++;
                }
            }
            
            foreach ($programa_extenso as $extenso) {
                if ($codigo == $extenso->getAsig_codigo()) {
                    $programas_asignaturas[$i] = array("pb" => false, "pe" => true, "pd" => false, "programa" => $extenso);
                    $i++;
                    $countPE++;
                }
            }
            
            foreach ($programa_didactico as $didactico) {
                $asignatura_p_didactico = $didactico->getAsignatura();
                if ($codigo == $asignatura_p_didactico->getAsig_codigo()) {
                    $programas_asignaturas[$i] = array("pb" => false, "pe" => false, "pd" => true, "programa" => $didactico);
                    $i++;
                    $countPD++;
                }
            }
        }
        
        echo json_encode($programas_asignaturas);  
    }
}

