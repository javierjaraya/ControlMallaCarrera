<?php

include_once '../../Controlador/Contenedor.php';

$control = Contenedor::getInstancia();

$accion = htmlspecialchars($_REQUEST['accion']);
if ($accion != null) {
    if ($accion == "LISTADO") {
        $programa_basicos = $control->getAllPrograma_basicos();
        $json = json_encode($programa_basicos);
        echo $json;
    } else if ($accion == "AGREGAR") {
        $pb_tipo_curso = htmlspecialchars($_REQUEST['pb_tipo_curso']);
        $pb_carrera = htmlspecialchars($_REQUEST['pb_carrera']);
        $pb_departamento = htmlspecialchars($_REQUEST['pb_departamento']);
        $pb_facultad = htmlspecialchars($_REQUEST['pb_facultad']);
        $pb_nro_creditos = htmlspecialchars($_REQUEST['pb_nro_creditos']);
        $pb_horas_cronologicas = htmlspecialchars($_REQUEST['pb_horas_cronologicas']);
        $pb_horas_pedagogicas = htmlspecialchars($_REQUEST['pb_horas_pedagogicas']);
        $pb_anio = htmlspecialchars($_REQUEST['pb_anio']);
        $pb_semestre = htmlspecialchars($_REQUEST['pb_semestre']);
        $pb_hrs_presenciales = htmlspecialchars($_REQUEST['pb_hrs_presenciales']);
        $pb_ht_presenciales = htmlspecialchars($_REQUEST['pb_ht_presenciales']);
        $pb_hp_presenciales = htmlspecialchars($_REQUEST['pb_hp_presenciales']);
        $pb_hl_presenciales = htmlspecialchars($_REQUEST['pb_hl_presenciales']);
        $pb_hrs_autonomas = htmlspecialchars($_REQUEST['pb_hrs_autonomas']);
        $pb_ht_autonomas = htmlspecialchars($_REQUEST['pb_ht_autonomas']);
        $pb_hp_autonomas = htmlspecialchars($_REQUEST['pb_hp_autonomas']);
        $pb_hl_autonomas = htmlspecialchars($_REQUEST['pb_hl_autonomas']);
        $pb_presentacion = $_REQUEST['pb_presentacion'];
        $pb_descriptor_competencias = $_REQUEST['pb_descriptor_competencias'];
        $pb_aprendizajes_previos = $_REQUEST['pb_aprendizajes_previos'];
        $pb_biblio_fundamental = $_REQUEST['pb_biblio_fundamental'];
        $pb_biblio_complementaria = $_REQUEST['pb_biblio_complementaria'];
        $asig_codigo = htmlspecialchars($_REQUEST['asig_codigo']);

        session_start();
        $usu_rut = $_SESSION["usu_run"];

        $programa_extenso = new Programa_basicoDTO();
        $programa_extenso->setPb_tipo_curso($pb_tipo_curso);
        $programa_extenso->setPb_carrera($pb_carrera);
        $programa_extenso->setPb_departamento($pb_departamento);
        $programa_extenso->setPb_facultad($pb_facultad);
        $programa_extenso->setPb_nro_creditos($pb_nro_creditos);
        $programa_extenso->setPb_horas_cronologicas($pb_horas_cronologicas);
        $programa_extenso->setPb_horas_pedagogicas($pb_horas_pedagogicas);
        $programa_extenso->setPb_anio($pb_anio);
        $programa_extenso->setPb_semestre($pb_semestre);
        $programa_extenso->setPb_hrs_presenciales($pb_hrs_presenciales);
        $programa_extenso->setPb_ht_presenciales($pb_ht_presenciales);
        $programa_extenso->setPb_hp_presenciales($pb_hp_presenciales);
        $programa_extenso->setPb_hl_presenciales($pb_hl_presenciales);
        $programa_extenso->setPb_hrs_autonomas($pb_hrs_autonomas);
        $programa_extenso->setPb_ht_autonomas($pb_ht_autonomas);
        $programa_extenso->setPb_hp_autonomas($pb_hp_autonomas);
        $programa_extenso->setPb_hl_autonomas($pb_hl_autonomas);
        $programa_extenso->setPb_presentacion($pb_presentacion);
        $programa_extenso->setPb_descriptor_competencias($pb_descriptor_competencias);
        $programa_extenso->setPb_aprendizajes_previos($pb_aprendizajes_previos);
        $programa_extenso->setPb_biblio_fundamental($pb_biblio_fundamental);
        $programa_extenso->setPb_biblio_complementaria($pb_biblio_complementaria);
        $programa_extenso->setAsig_codigo($asig_codigo);
        $programa_extenso->setUsu_rut($usu_rut);
        $programa_extenso->setPb_borrador(0);

        $result = $control->addPrograma_basico($programa_extenso);

        if ($result) {
            $control->removePrograma_basicoBorradorByAsigCodigo($asig_codigo);
            echo json_encode(array(
                'success' => true,
                'mensaje' => "Programa basico registrado correctamente"
            ));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    } else if ($accion == "AGREGAR_BORRADOR") {
        $pb_id = htmlspecialchars($_REQUEST['pb_id']);
        $pb_tipo_curso = htmlspecialchars($_REQUEST['pb_tipo_curso']);
        $pb_carrera = htmlspecialchars($_REQUEST['pb_carrera']);
        $pb_departamento = htmlspecialchars($_REQUEST['pb_departamento']);
        $pb_facultad = htmlspecialchars($_REQUEST['pb_facultad']);
        $pb_nro_creditos = htmlspecialchars($_REQUEST['pb_nro_creditos']);
        $pb_horas_cronologicas = htmlspecialchars($_REQUEST['pb_horas_cronologicas']);
        $pb_horas_pedagogicas = htmlspecialchars($_REQUEST['pb_horas_pedagogicas']);
        $pb_anio = htmlspecialchars($_REQUEST['pb_anio']);
        $pb_semestre = htmlspecialchars($_REQUEST['pb_semestre']);
        $pb_hrs_presenciales = htmlspecialchars($_REQUEST['pb_hrs_presenciales']);
        $pb_ht_presenciales = htmlspecialchars($_REQUEST['pb_ht_presenciales']);
        $pb_hp_presenciales = htmlspecialchars($_REQUEST['pb_hp_presenciales']);
        $pb_hl_presenciales = htmlspecialchars($_REQUEST['pb_hl_presenciales']);
        $pb_hrs_autonomas = htmlspecialchars($_REQUEST['pb_hrs_autonomas']);
        $pb_ht_autonomas = htmlspecialchars($_REQUEST['pb_ht_autonomas']);
        $pb_hp_autonomas = htmlspecialchars($_REQUEST['pb_hp_autonomas']);
        $pb_hl_autonomas = htmlspecialchars($_REQUEST['pb_hl_autonomas']);
        
        $pb_presentacion = $_REQUEST['pb_presentacion'];
        $pb_descriptor_competencias = $_REQUEST['pb_descriptor_competencias'];
        $pb_aprendizajes_previos = $_REQUEST['pb_aprendizajes_previos'];
        $pb_biblio_fundamental = $_REQUEST['pb_biblio_fundamental'];
        $pb_biblio_complementaria = $_REQUEST['pb_biblio_complementaria'];
        $asig_codigo = htmlspecialchars($_REQUEST['asig_codigo']);

        session_start();
        $usu_rut = $_SESSION["usu_run"];

        $programa_basico = new Programa_basicoDTO();
        $programa_basico->setPb_id($pb_id);
        $programa_basico->setPb_tipo_curso($pb_tipo_curso);
        $programa_basico->setPb_carrera($pb_carrera);
        $programa_basico->setPb_departamento($pb_departamento);
        $programa_basico->setPb_facultad($pb_facultad);
        $programa_basico->setPb_nro_creditos($pb_nro_creditos);
        $programa_basico->setPb_horas_cronologicas($pb_horas_cronologicas);
        $programa_basico->setPb_horas_pedagogicas($pb_horas_pedagogicas);
        $programa_basico->setPb_anio($pb_anio);
        $programa_basico->setPb_semestre($pb_semestre);
        $programa_basico->setPb_hrs_presenciales($pb_hrs_presenciales);
        $programa_basico->setPb_ht_presenciales($pb_ht_presenciales);
        $programa_basico->setPb_hp_presenciales($pb_hp_presenciales);
        $programa_basico->setPb_hl_presenciales($pb_hl_presenciales);
        $programa_basico->setPb_hrs_autonomas($pb_hrs_autonomas);
        $programa_basico->setPb_ht_autonomas($pb_ht_autonomas);
        $programa_basico->setPb_hp_autonomas($pb_hp_autonomas);
        $programa_basico->setPb_hl_autonomas($pb_hl_autonomas);
        $programa_basico->setPb_presentacion($pb_presentacion);
        $programa_basico->setPb_descriptor_competencias($pb_descriptor_competencias);
        $programa_basico->setPb_aprendizajes_previos($pb_aprendizajes_previos);
        $programa_basico->setPb_biblio_fundamental($pb_biblio_fundamental);
        $programa_basico->setPb_biblio_complementaria($pb_biblio_complementaria);
        $programa_basico->setAsig_codigo($asig_codigo);
        $programa_basico->setUsu_rut($usu_rut);
        $programa_basico->setPb_borrador(1);

        $result = $control->updatePrograma_basico($programa_basico);

        if ($result) {
            echo json_encode(array(
                'success' => true,
                'mensaje' => "Programa basico guardado correctamente"
            ));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    } else if ($accion == "BORRAR") {
        $pb_id = htmlspecialchars($_REQUEST['pb_id']);

        $result = $control->removePrograma_basico($pb_id);
        if ($result) {
            echo json_encode(array('success' => true, 'mensaje' => "Programa_basico borrado correctamente"));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    } else if ($accion == "BUSCAR") {
        $cadena = htmlspecialchars($_REQUEST['cadena']);
        $programa_basicos = $control->getPrograma_basicoLikeAtrr($cadena);
        $json = json_encode($programa_basicos);
        echo $json;
    } else if ($accion == "BUSCAR_BY_ID") {
        $pb_id = htmlspecialchars($_REQUEST['pb_id']);

        $programa_extenso = $control->getPrograma_basicoByID($pb_id);
        $json = json_encode($programa_extenso);
        echo $json;
    } else if ($accion == "BUSCAR_BY_ASIG_CODIGO") {
        $asig_codigo = htmlspecialchars($_REQUEST['asig_codigo']);

        $programa_basicos = $control->getPrograma_basicosByAsig_Codigo($asig_codigo);
        $json = json_encode($programa_basicos);
        echo $json;
    } else if ($accion == "BUSCAR_VERSION_FINAL_BY_ASIG_CODIGO") {
        $asig_codigo = htmlspecialchars($_REQUEST['asig_codigo']);

        $programa_basico = $control->getPrograma_basicos_version_final_ByAsig_Codigo($asig_codigo);
        if($programa_basico == null){
            $json = json_encode(array('errorMsg' => 'No hay un programa basico creado para esta asignatura.'));
        }else{
            $json = json_encode($programa_basico);
        }
        
        echo $json;
    } else if ($accion == "ACTUALIZAR") {
        $pb_id = htmlspecialchars($_REQUEST['pb_id']);
        $pb_tipo_curso = htmlspecialchars($_REQUEST['pb_tipo_curso']);
        $pb_carrera = htmlspecialchars($_REQUEST['pb_carrera']);
        $pb_departamento = htmlspecialchars($_REQUEST['pb_departamento']);
        $pb_facultad = htmlspecialchars($_REQUEST['pb_facultad']);
        $pb_nro_creditos = htmlspecialchars($_REQUEST['pb_nro_creditos']);
        $pb_horas_cronologicas = htmlspecialchars($_REQUEST['pb_horas_cronologicas']);
        $pb_horas_pedagogicas = htmlspecialchars($_REQUEST['pb_horas_pedagogicas']);
        $pb_anio = htmlspecialchars($_REQUEST['pb_anio']);
        $pb_semestre = htmlspecialchars($_REQUEST['pb_semestre']);
        $pb_hrs_presenciales = htmlspecialchars($_REQUEST['pb_hrs_presenciales']);
        $pb_ht_presenciales = htmlspecialchars($_REQUEST['pb_ht_presenciales']);
        $pb_hp_presenciales = htmlspecialchars($_REQUEST['pb_hp_presenciales']);
        $pb_hl_presenciales = htmlspecialchars($_REQUEST['pb_hl_presenciales']);
        $pb_hrs_autonomas = htmlspecialchars($_REQUEST['pb_hrs_autonomas']);
        $pb_ht_autonomas = htmlspecialchars($_REQUEST['pb_ht_autonomas']);
        $pb_hp_autonomas = htmlspecialchars($_REQUEST['pb_hp_autonomas']);
        $pb_hl_autonomas = htmlspecialchars($_REQUEST['pb_hl_autonomas']);
        $pb_presentacion = $_REQUEST['pb_presentacion'];
        $pb_descriptor_competencias = $_REQUEST['pb_descriptor_competencias'];
        $pb_aprendizajes_previos = $_REQUEST['pb_aprendizajes_previos'];
        $pb_biblio_fundamental = $_REQUEST['pb_biblio_fundamental'];
        $pb_biblio_complementaria = $_REQUEST['pb_biblio_complementaria'];
        $asig_codigo = htmlspecialchars($_REQUEST['asig_codigo']);
        $pb_fecha_modificacion = htmlspecialchars($_REQUEST['pb_fecha_modificacion']);
        $usu_rut = htmlspecialchars($_REQUEST['usu_rut']);
        $pb_borrador = htmlspecialchars($_REQUEST['pb_borrador']);

        $programa_extenso = new Programa_basicoDTO();
        $programa_extenso->setPb_id($pb_id);
        $programa_extenso->setPb_tipo_curso($pb_tipo_curso);
        $programa_extenso->setPb_carrera($pb_carrera);
        $programa_extenso->setPb_departamento($pb_departamento);
        $programa_extenso->setPb_facultad($pb_facultad);
        $programa_extenso->setPb_nro_creditos($pb_nro_creditos);
        $programa_extenso->setPb_horas_cronologicas($pb_horas_cronologicas);
        $programa_extenso->setPb_horas_pedagogicas($pb_horas_pedagogicas);
        $programa_extenso->setPb_anio($pb_anio);
        $programa_extenso->setPb_semestre($pb_semestre);
        $programa_extenso->setPb_hrs_presenciales($pb_hrs_presenciales);
        $programa_extenso->setPb_ht_presenciales($pb_ht_presenciales);
        $programa_extenso->setPb_hp_presenciales($pb_hp_presenciales);
        $programa_extenso->setPb_hl_presenciales($pb_hl_presenciales);
        $programa_extenso->setPb_hrs_autonomas($pb_hrs_autonomas);
        $programa_extenso->setPb_ht_autonomas($pb_ht_autonomas);
        $programa_extenso->setPb_hp_autonomas($pb_hp_autonomas);
        $programa_extenso->setPb_hl_autonomas($pb_hl_autonomas);
        $programa_extenso->setPb_presentacion($pb_presentacion);
        $programa_extenso->setPb_descriptor_competencias($pb_descriptor_competencias);
        $programa_extenso->setPb_aprendizajes_previos($pb_aprendizajes_previos);
        $programa_extenso->setPb_biblio_fundamental($pb_biblio_fundamental);
        $programa_extenso->setPb_biblio_complementaria($pb_biblio_complementaria);
        $programa_extenso->setAsig_codigo($asig_codigo);
        $programa_extenso->setPb_fecha_modificacion($pb_fecha_modificacion);
        $programa_extenso->setUsu_rut($usu_rut);
        $programa_extenso->setPb_borrador($pb_borrador);

        $result = $control->updatePrograma_basico($programa_extenso);
        if ($result) {
            echo json_encode(array(
                'success' => true,
                'mensaje' => "Programa_basico actualizada correctamente"
            ));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    }
}
