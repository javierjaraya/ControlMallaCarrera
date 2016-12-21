<?php

include_once '../../Controlador/Contenedor.php';

$control = Contenedor::getInstancia();

$accion = htmlspecialchars($_REQUEST['accion']);
if ($accion != null) {
    if ($accion == "LISTADO") {
        $programa_extensos = $control->getAllPrograma_extensos();
        $json = json_encode($programa_extensos);
        echo $json;
    } else if ($accion == "AGREGAR") {
        $pe_tipo_curso = htmlspecialchars($_REQUEST['pe_tipo_curso']);
        $pe_carrera = htmlspecialchars($_REQUEST['pe_carrera']);
        $pe_departamento = htmlspecialchars($_REQUEST['pe_departamento']);
        $pe_facultad = htmlspecialchars($_REQUEST['pe_facultad']);
        $pe_nro_creditos = htmlspecialchars($_REQUEST['pe_nro_creditos']);
        $pe_horas_cronologicas = htmlspecialchars($_REQUEST['pe_horas_cronologicas']);
        $pe_horas_pedagogicas = htmlspecialchars($_REQUEST['pe_horas_pedagogicas']);
        $pe_anio = htmlspecialchars($_REQUEST['pe_anio']);
        $pe_semestre = htmlspecialchars($_REQUEST['pe_semestre']);
        $pe_hrs_presenciales = htmlspecialchars($_REQUEST['pe_hrs_presenciales']);
        $pe_ht_presenciales = htmlspecialchars($_REQUEST['pe_ht_presenciales']);
        $pe_hp_presenciales = htmlspecialchars($_REQUEST['pe_hp_presenciales']);
        $pe_hl_presenciales = htmlspecialchars($_REQUEST['pe_hl_presenciales']);
        $pe_hrs_autonomas = htmlspecialchars($_REQUEST['pe_hrs_autonomas']);
        $pe_ht_autonomas = htmlspecialchars($_REQUEST['pe_ht_autonomas']);
        $pe_hp_autonomas = htmlspecialchars($_REQUEST['pe_hp_autonomas']);
        $pe_hl_autonomas = htmlspecialchars($_REQUEST['pe_hl_autonomas']);
        $pe_presentacion = $_REQUEST['pe_presentacion'];
        $pe_descriptor_competencias = $_REQUEST['pe_descriptor_competencias'];
        $pe_aprendizajes_previos = $_REQUEST['pe_aprendizajes_previos'];
        $pe_fecha_inicio = htmlspecialchars($_REQUEST['pe_fecha_inicio']);
        $pe_fecha_fin = htmlspecialchars($_REQUEST['pe_fecha_fin']);
        $pe_observacion = $_REQUEST['pe_observacion'];
        $pe_biblio_fundamental = $_REQUEST['pe_biblio_fundamental'];
        $pe_biblio_complementaria = $_REQUEST['pe_biblio_complementaria'];
        $asig_codigo = htmlspecialchars($_REQUEST['asig_codigo']);
        $cantidad_resultados_aprendizaje = htmlspecialchars($_REQUEST['cantidad-resultados-aprendizaje']);
        $pe_sistema_evaluacion = $_REQUEST['pe_sistema_evaluacion'];

        session_start();
        $usu_rut = $_SESSION["usu_run"];

        $pe_id = $control->getId_disponible_programa_extenso();

        $programa_extenso = new Programa_extensoDTO();
        $programa_extenso->setPe_id($pe_id);
        $programa_extenso->setPe_tipo_curso($pe_tipo_curso);
        $programa_extenso->setPe_carrera($pe_carrera);
        $programa_extenso->setPe_departamento($pe_departamento);
        $programa_extenso->setPe_facultad($pe_facultad);
        $programa_extenso->setPe_nro_creditos($pe_nro_creditos);
        $programa_extenso->setPe_horas_cronologicas($pe_horas_cronologicas);
        $programa_extenso->setPe_horas_pedagogicas($pe_horas_pedagogicas);
        $programa_extenso->setPe_anio($pe_anio);
        $programa_extenso->setPe_semestre($pe_semestre);
        $programa_extenso->setPe_hrs_presenciales($pe_hrs_presenciales);
        $programa_extenso->setPe_ht_presenciales($pe_ht_presenciales);
        $programa_extenso->setPe_hp_presenciales($pe_hp_presenciales);
        $programa_extenso->setPe_hl_presenciales($pe_hl_presenciales);
        $programa_extenso->setPe_hrs_autonomas($pe_hrs_autonomas);
        $programa_extenso->setPe_ht_autonomas($pe_ht_autonomas);
        $programa_extenso->setPe_hp_autonomas($pe_hp_autonomas);
        $programa_extenso->setPe_hl_autonomas($pe_hl_autonomas);
        $programa_extenso->setPe_presentacion($pe_presentacion);
        $programa_extenso->setPe_descriptor_competencias($pe_descriptor_competencias);
        $programa_extenso->setPe_aprendizajes_previos($pe_aprendizajes_previos);
        $programa_extenso->setPe_fecha_inicio($pe_fecha_inicio);
        $programa_extenso->setPe_fecha_fin($pe_fecha_fin);
        $programa_extenso->setPe_observacion($pe_observacion);
        $programa_extenso->setPe_biblio_fundamental($pe_biblio_fundamental);
        $programa_extenso->setPe_biblio_complementaria($pe_biblio_complementaria);
        $programa_extenso->setAsig_codigo($asig_codigo);
        $programa_extenso->setUsu_rut($usu_rut);
        $programa_extenso->setPe_borrador(0);
        $programa_extenso->setPe_sistema_evaluacion($pe_sistema_evaluacion);

        $result = $control->addPrograma_extenso($programa_extenso);

        //Guardar Resultados de Aprendizaje
        for ($i = 0; $i <= $cantidad_resultados_aprendizaje; $i++) {
            if (isset($_REQUEST['ra_resultado_aprendizaje_' . $i])) {
                $ra_resultado_aprendizaje = $_REQUEST['ra_resultado_aprendizaje_' . $i];
                $ra_metodologia = $_REQUEST['ra_metodologia_' . $i];
                $ra_criterios_evaluacion = $_REQUEST['ra_criterios_evaluacion_' . $i];
                $ra_contenido_con_pro_act = $_REQUEST['ra_contenido_con_pro_act_' . $i];
                $ra_evidencia_aprendizaje = $_REQUEST['ra_evidencia_aprendizaje_' . $i];
                $ra_ht_presenciales = htmlspecialchars($_REQUEST['ra_ht_presenciales_' . $i]);
                $ra_hp_presenciales = htmlspecialchars($_REQUEST['ra_hp_presenciales_' . $i]);
                $ra_ht_autonomas = htmlspecialchars($_REQUEST['ra_ht_autonomas_' . $i]);
                $ra_hp_autonomas = htmlspecialchars($_REQUEST['ra_hp_autonomas_' . $i]);

                $resultado_aprendizaje = new Resultado_aprendizajeDTO();
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

                $control->addResultado_aprendizaje($resultado_aprendizaje);
            }
        }

        if ($result) {
            $control->removePrograma_extensoBorradorByAsigCodigo($asig_codigo);
            echo json_encode(array(
                'success' => true,
                'mensaje' => "Programa extenso registrado correctamente"
            ));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    } else if ($accion == "AGREGAR_BORRADOR") {
        $pe_tipo_curso = htmlspecialchars($_REQUEST['pe_tipo_curso']);
        $pe_carrera = htmlspecialchars($_REQUEST['pe_carrera']);
        $pe_departamento = htmlspecialchars($_REQUEST['pe_departamento']);
        $pe_facultad = htmlspecialchars($_REQUEST['pe_facultad']);
        $pe_nro_creditos = htmlspecialchars($_REQUEST['pe_nro_creditos']);
        $pe_horas_cronologicas = htmlspecialchars($_REQUEST['pe_horas_cronologicas']);
        $pe_horas_pedagogicas = htmlspecialchars($_REQUEST['pe_horas_pedagogicas']);
        $pe_anio = htmlspecialchars($_REQUEST['pe_anio']);
        $pe_semestre = htmlspecialchars($_REQUEST['pe_semestre']);
        $pe_hrs_presenciales = htmlspecialchars($_REQUEST['pe_hrs_presenciales']);
        $pe_ht_presenciales = htmlspecialchars($_REQUEST['pe_ht_presenciales']);
        $pe_hp_presenciales = htmlspecialchars($_REQUEST['pe_hp_presenciales']);
        $pe_hl_presenciales = htmlspecialchars($_REQUEST['pe_hl_presenciales']);
        $pe_hrs_autonomas = htmlspecialchars($_REQUEST['pe_hrs_autonomas']);
        $pe_ht_autonomas = htmlspecialchars($_REQUEST['pe_ht_autonomas']);
        $pe_hp_autonomas = htmlspecialchars($_REQUEST['pe_hp_autonomas']);
        $pe_hl_autonomas = htmlspecialchars($_REQUEST['pe_hl_autonomas']);
        $pe_presentacion = $_REQUEST['pe_presentacion'];
        $pe_descriptor_competencias = $_REQUEST['pe_descriptor_competencias'];
        $pe_aprendizajes_previos = $_REQUEST['pe_aprendizajes_previos'];
        $pe_fecha_inicio = htmlspecialchars($_REQUEST['pe_fecha_inicio']);
        $pe_fecha_fin = htmlspecialchars($_REQUEST['pe_fecha_fin']);
        $pe_observacion = $_REQUEST['pe_observacion'];
        $pe_biblio_fundamental = $_REQUEST['pe_biblio_fundamental'];
        $pe_biblio_complementaria = $_REQUEST['pe_biblio_complementaria'];
        $asig_codigo = htmlspecialchars($_REQUEST['asig_codigo']);
        $cantidad_resultados_aprendizaje = htmlspecialchars($_REQUEST['cantidad-resultados-aprendizaje']);
        $pe_sistema_evaluacion = $_REQUEST['pe_sistema_evaluacion'];

        session_start();
        $usu_rut = $_SESSION["usu_run"];

        $pe_id = $control->getId_disponible_programa_extenso();
        
        $programa_extenso = new Programa_extensoDTO();
        $programa_extenso->setPe_id($pe_id);
        $programa_extenso->setPe_tipo_curso($pe_tipo_curso);
        $programa_extenso->setPe_carrera($pe_carrera);
        $programa_extenso->setPe_departamento($pe_departamento);
        $programa_extenso->setPe_facultad($pe_facultad);
        $programa_extenso->setPe_nro_creditos($pe_nro_creditos);
        $programa_extenso->setPe_horas_cronologicas($pe_horas_cronologicas);
        $programa_extenso->setPe_horas_pedagogicas($pe_horas_pedagogicas);
        $programa_extenso->setPe_anio($pe_anio);
        $programa_extenso->setPe_semestre($pe_semestre);
        $programa_extenso->setPe_hrs_presenciales($pe_hrs_presenciales);
        $programa_extenso->setPe_ht_presenciales($pe_ht_presenciales);
        $programa_extenso->setPe_hp_presenciales($pe_hp_presenciales);
        $programa_extenso->setPe_hl_presenciales($pe_hl_presenciales);
        $programa_extenso->setPe_hrs_autonomas($pe_hrs_autonomas);
        $programa_extenso->setPe_ht_autonomas($pe_ht_autonomas);
        $programa_extenso->setPe_hp_autonomas($pe_hp_autonomas);
        $programa_extenso->setPe_hl_autonomas($pe_hl_autonomas);
        $programa_extenso->setPe_presentacion($pe_presentacion);
        $programa_extenso->setPe_descriptor_competencias($pe_descriptor_competencias);
        $programa_extenso->setPe_aprendizajes_previos($pe_aprendizajes_previos);
        $programa_extenso->setPe_fecha_inicio($pe_fecha_inicio);
        $programa_extenso->setPe_fecha_fin($pe_fecha_fin);
        $programa_extenso->setPe_observacion($pe_observacion);
        $programa_extenso->setPe_biblio_fundamental($pe_biblio_fundamental);
        $programa_extenso->setPe_biblio_complementaria($pe_biblio_complementaria);
        $programa_extenso->setAsig_codigo($asig_codigo);
        $programa_extenso->setUsu_rut($usu_rut);
        $programa_extenso->setPe_borrador(1);
        $programa_extenso->setPe_sistema_evaluacion($pe_sistema_evaluacion);

        $result = $control->addPrograma_extenso($programa_extenso);
        
        //Guardar Resultados de Aprendizaje
        for ($i = 0; $i <= $cantidad_resultados_aprendizaje; $i++) {
            if (isset($_REQUEST['ra_resultado_aprendizaje_' . $i])) {
                $ra_resultado_aprendizaje = $_REQUEST['ra_resultado_aprendizaje_' . $i];
                $ra_metodologia = $_REQUEST['ra_metodologia_' . $i];
                $ra_criterios_evaluacion = $_REQUEST['ra_criterios_evaluacion_' . $i];
                $ra_contenido_con_pro_act = $_REQUEST['ra_contenido_con_pro_act_' . $i];
                $ra_evidencia_aprendizaje = $_REQUEST['ra_evidencia_aprendizaje_' . $i];
                $ra_ht_presenciales = htmlspecialchars($_REQUEST['ra_ht_presenciales_' . $i]);
                $ra_hp_presenciales = htmlspecialchars($_REQUEST['ra_hp_presenciales_' . $i]);
                $ra_ht_autonomas = htmlspecialchars($_REQUEST['ra_ht_autonomas_' . $i]);
                $ra_hp_autonomas = htmlspecialchars($_REQUEST['ra_hp_autonomas_' . $i]);

                $resultado_aprendizaje = new Resultado_aprendizajeDTO();
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

                $control->addResultado_aprendizaje($resultado_aprendizaje);
            }
        }
        if ($result) {
            echo json_encode(array(
                'success' => true,
                'mensaje' => "Programa extenso guardado correctamente"
            ));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    } else if ($accion == "BORRAR") {
        $pe_id = htmlspecialchars($_REQUEST['pe_id']);

        $result = $control->removePrograma_extenso($pe_id);
        if ($result) {
            echo json_encode(array('success' => true, 'mensaje' => "Programa_extenso borrado correctamente"));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    } else if ($accion == "BUSCAR") {
        $cadena = htmlspecialchars($_REQUEST['cadena']);
        $programa_extensos = $control->getPrograma_extensoLikeAtrr($cadena);
        $json = json_encode($programa_extensos);
        echo $json;
    } else if ($accion == "BUSCAR_BY_ID") {
        $pe_id = htmlspecialchars($_REQUEST['pe_id']);

        $programa_extenso = $control->getPrograma_extensoByID($pe_id);
        $json = json_encode($programa_extenso);
        echo $json;
    } else if ($accion == "BUSCAR_BY_ASIG_CODIGO") {
        $asig_codigo = htmlspecialchars($_REQUEST['asig_codigo']);

        $programa_extensos = $control->getPrograma_extensosByAsig_Codigo($asig_codigo);
        $json = json_encode($programa_extensos);
        echo $json;
    } else if ($accion == "BUSCAR_VERSION_FINAL_BY_ASIG_CODIGO") {
        $asig_codigo = htmlspecialchars($_REQUEST['asig_codigo']);

        $programa_extensos = $control->getPrograma_extensos_version_final_ByAsig_Codigo($asig_codigo);
        if($programa_extensos == null){
            $json = json_encode(array('errorMsg' => 'No hay un programa extenso creado para esta asignatura.'));
        }else{
            $json = json_encode($programa_extensos);
        }
        
        echo $json;
    } else if ($accion == "ACTUALIZAR") {
        $pe_id = htmlspecialchars($_REQUEST['pe_id']);
        $pe_tipo_curso = htmlspecialchars($_REQUEST['pe_tipo_curso']);
        $pe_carrera = htmlspecialchars($_REQUEST['pe_carrera']);
        $pe_departamento = htmlspecialchars($_REQUEST['pe_departamento']);
        $pe_facultad = htmlspecialchars($_REQUEST['pe_facultad']);
        $pe_nro_creditos = htmlspecialchars($_REQUEST['pe_nro_creditos']);
        $pe_horas_cronologicas = htmlspecialchars($_REQUEST['pe_horas_cronologicas']);
        $pe_horas_pedagogicas = htmlspecialchars($_REQUEST['pe_horas_pedagogicas']);
        $pe_anio = htmlspecialchars($_REQUEST['pe_anio']);
        $pe_semestre = htmlspecialchars($_REQUEST['pe_semestre']);
        $pe_hrs_presenciales = htmlspecialchars($_REQUEST['pe_hrs_presenciales']);
        $pe_ht_presenciales = htmlspecialchars($_REQUEST['pe_ht_presenciales']);
        $pe_hp_presenciales = htmlspecialchars($_REQUEST['pe_hp_presenciales']);
        $pe_hl_presenciales = htmlspecialchars($_REQUEST['pe_hl_presenciales']);
        $pe_hrs_autonomas = htmlspecialchars($_REQUEST['pe_hrs_autonomas']);
        $pe_ht_autonomas = htmlspecialchars($_REQUEST['pe_ht_autonomas']);
        $pe_hp_autonomas = htmlspecialchars($_REQUEST['pe_hp_autonomas']);
        $pe_hl_autonomas = htmlspecialchars($_REQUEST['pe_hl_autonomas']);
        $pe_presentacion = $_REQUEST['pe_presentacion'];
        $pe_descriptor_competencias = $_REQUEST['pe_descriptor_competencias'];
        $pe_aprendizajes_previos = $_REQUEST['pe_aprendizajes_previos'];
        $pe_fecha_inicio = htmlspecialchars($_REQUEST['pe_fecha_inicio']);
        $pe_fecha_fin = htmlspecialchars($_REQUEST['pe_fecha_fin']);
        $pe_observacion = $_REQUEST['pe_observacion'];
        $pe_biblio_fundamental = $_REQUEST['pe_biblio_fundamental'];
        $pe_biblio_complementaria = $_REQUEST['pe_biblio_complementaria'];
        $asig_codigo = htmlspecialchars($_REQUEST['asig_codigo']);
        $pe_fecha_modificacion = htmlspecialchars($_REQUEST['pe_fecha_modificacion']);
        $usu_rut = htmlspecialchars($_REQUEST['usu_rut']);
        $pe_borrador = htmlspecialchars($_REQUEST['pe_borrador']);

        $programa_extenso = new Programa_extensoDTO();
        $programa_extenso->setPe_id($pe_id);
        $programa_extenso->setPe_tipo_curso($pe_tipo_curso);
        $programa_extenso->setPe_carrera($pe_carrera);
        $programa_extenso->setPe_departamento($pe_departamento);
        $programa_extenso->setPe_facultad($pe_facultad);
        $programa_extenso->setPe_nro_creditos($pe_nro_creditos);
        $programa_extenso->setPe_horas_cronologicas($pe_horas_cronologicas);
        $programa_extenso->setPe_horas_pedagogicas($pe_horas_pedagogicas);
        $programa_extenso->setPe_anio($pe_anio);
        $programa_extenso->setPe_semestre($pe_semestre);
        $programa_extenso->setPe_hrs_presenciales($pe_hrs_presenciales);
        $programa_extenso->setPe_ht_presenciales($pe_ht_presenciales);
        $programa_extenso->setPe_hp_presenciales($pe_hp_presenciales);
        $programa_extenso->setPe_hl_presenciales($pe_hl_presenciales);
        $programa_extenso->setPe_hrs_autonomas($pe_hrs_autonomas);
        $programa_extenso->setPe_ht_autonomas($pe_ht_autonomas);
        $programa_extenso->setPe_hp_autonomas($pe_hp_autonomas);
        $programa_extenso->setPe_hl_autonomas($pe_hl_autonomas);
        $programa_extenso->setPe_presentacion($pe_presentacion);
        $programa_extenso->setPe_descriptor_competencias($pe_descriptor_competencias);
        $programa_extenso->setPe_aprendizajes_previos($pe_aprendizajes_previos);
        $programa_extenso->setPe_fecha_inicio($pe_fecha_inicio);
        $programa_extenso->setPe_fecha_fin($pe_fecha_fin);
        $programa_extenso->setPe_observacion($pe_observacion);
        $programa_extenso->setPe_biblio_fundamental($pe_biblio_fundamental);
        $programa_extenso->setPe_biblio_complementaria($pe_biblio_complementaria);
        $programa_extenso->setAsig_codigo($asig_codigo);
        $programa_extenso->setPe_fecha_modificacion($pe_fecha_modificacion);
        $programa_extenso->setUsu_rut($usu_rut);
        $programa_extenso->setPe_borrador($pe_borrador);

        $result = $control->updatePrograma_extenso($programa_extenso);
        if ($result) {
            echo json_encode(array(
                'success' => true,
                'mensaje' => "Programa_extenso actualizada correctamente"
            ));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    }
}
