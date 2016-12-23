<?php

include_once '../../Controlador/Contenedor.php';

$control = Contenedor::getInstancia();

$accion = htmlspecialchars($_REQUEST['accion']);
if ($accion != null) {
    if ($accion == "LISTADO") {
        $programa_didacticos = $control->getAllPrograma_didacticos();
        $json = json_encode($programa_didacticos);
        echo $json;
    } else if ($accion == "LISTADO_BY_ESTADO") {
        $estado = htmlspecialchars($_REQUEST['estado']);
        $programa_didacticos = $control->getAllPrograma_didacticos_by_estado($estado);
        $json = json_encode($programa_didacticos);
        echo $json;
    } else if ($accion == "AGREGAR") {
        $pd_id = $control->getId_disponible_programa_didatico();

        $pe_id = htmlspecialchars($_REQUEST['pe_id']);
        $cantidad_resultados_aprendizaje = htmlspecialchars($_REQUEST['cantidad-resultados-aprendizaje']);

        session_start();
        $usu_rut = $_SESSION["usu_run"];

        $programa_didactico = new Programa_didacticoDTO();
        $programa_didactico->setPd_id($pd_id);
        $programa_didactico->setPe_id($pe_id);
        $programa_didactico->setUsu_rut($usu_rut);
        $programa_didactico->setPd_borrador(2);

        $result = $control->addPrograma_didactico($programa_didactico);

        //Guardar desarrollo propuesta didactica
        for ($i = 0; $i <= $cantidad_resultados_aprendizaje; $i++) {
            $dpd_actividad_aprendizaje = $_REQUEST['dpd_actividad_aprendizaje_' . $i];
            $dpd_mediacion_ensenianza = $_REQUEST['dpd_mediacion_ensenianza_' . $i];
            $dpd_actividad_evaluacion = $_REQUEST['dpd_actividad_evaluacion_' . $i];
            $dpd_recurso_didactivo = $_REQUEST['dpd_recurso_didactivo_' . $i];
            $dpd_hp_ht = htmlspecialchars($_REQUEST['dpd_hp_ht_' . $i]);
            $dpd_hp_hp = htmlspecialchars($_REQUEST['dpd_hp_hp_' . $i]);
            $dpd_hp_hl = htmlspecialchars($_REQUEST['dpd_hp_hl_' . $i]);
            $dpd_hp_ha = htmlspecialchars($_REQUEST['dpd_hp_ha_' . $i]);
            $dpd_ha_ht = htmlspecialchars($_REQUEST['dpd_ha_ht_' . $i]);
            $dpd_ha_hp = htmlspecialchars($_REQUEST['dpd_ha_hp_' . $i]);
            $dpd_ha_hl = htmlspecialchars($_REQUEST['dpd_ha_hl_' . $i]);
            $dpd_ha_ha = htmlspecialchars($_REQUEST['dpd_ha_ha_' . $i]);

            $ra_id = htmlspecialchars($_REQUEST['ra_id_' . $i]);
            
            $desarrollo_pd = new Desarrollo_programa_didacticoDTO();
            $desarrollo_pd->setDpd_actividad_aprendizaje($dpd_actividad_aprendizaje);
            $desarrollo_pd->setDpd_mediacion_ensenianza($dpd_mediacion_ensenianza);
            $desarrollo_pd->setDpd_actividad_evaluacion($dpd_actividad_evaluacion);
            $desarrollo_pd->setDpd_recurso_didactivo($dpd_recurso_didactivo);
            $desarrollo_pd->setDpd_hp_ht($dpd_hp_ht);
            $desarrollo_pd->setDpd_hp_hp($dpd_hp_hp);
            $desarrollo_pd->setDpd_hp_hl($dpd_hp_hl);
            $desarrollo_pd->setDpd_hp_ha($dpd_hp_ha);
            $desarrollo_pd->setDpd_ha_ht($dpd_ha_ht);
            $desarrollo_pd->setDpd_ha_hp($dpd_ha_hp);
            $desarrollo_pd->setDpd_ha_hl($dpd_ha_hl);
            $desarrollo_pd->setDpd_ha_ha($dpd_ha_ha);
            $desarrollo_pd->setRa_id($ra_id);
            $desarrollo_pd->setPd_id($pd_id);
            
            $resutl_desarrollo_pd = $control->addDesarrollo_programa_didactico($desarrollo_pd);
        }

        if ($result) {
            $control->removePrograma_didacticoBorradorBy_pe_id($pe_id);
            echo json_encode(array(
                'success' => true,
                'mensaje' => "Programa didactico ingresada correctamente"
            ));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    } else if ($accion == "AGREGAR_BORRADOR") {
        $pd_id = $control->getId_disponible_programa_didatico();

        $pe_id = htmlspecialchars($_REQUEST['pe_id']);
        $cantidad_resultados_aprendizaje = htmlspecialchars($_REQUEST['cantidad-resultados-aprendizaje']);

        session_start();
        $usu_rut = $_SESSION["usu_run"];

        $programa_didactico = new Programa_didacticoDTO();
        $programa_didactico->setPd_id($pd_id);
        $programa_didactico->setPe_id($pe_id);
        $programa_didactico->setUsu_rut($usu_rut);
        $programa_didactico->setPd_borrador(1);

        $result = $control->addPrograma_didactico($programa_didactico);

        //Guardar desarrollo propuesta didactica
        for ($i = 0; $i <= $cantidad_resultados_aprendizaje; $i++) {            
            $dpd_actividad_aprendizaje = $_REQUEST['dpd_actividad_aprendizaje_' . $i];
            $dpd_mediacion_ensenianza = $_REQUEST['dpd_mediacion_ensenianza_' . $i];
            $dpd_actividad_evaluacion = $_REQUEST['dpd_actividad_evaluacion_' . $i];
            $dpd_recurso_didactivo = $_REQUEST['dpd_recurso_didactivo_' . $i];
            $dpd_hp_ht = htmlspecialchars($_REQUEST['dpd_hp_ht_' . $i]);
            $dpd_hp_hp = htmlspecialchars($_REQUEST['dpd_hp_hp_' . $i]);
            $dpd_hp_hl = htmlspecialchars($_REQUEST['dpd_hp_hl_' . $i]);
            $dpd_hp_ha = htmlspecialchars($_REQUEST['dpd_hp_ha_' . $i]);
            $dpd_ha_ht = htmlspecialchars($_REQUEST['dpd_ha_ht_' . $i]);
            $dpd_ha_hp = htmlspecialchars($_REQUEST['dpd_ha_hp_' . $i]);
            $dpd_ha_hl = htmlspecialchars($_REQUEST['dpd_ha_hl_' . $i]);
            $dpd_ha_ha = htmlspecialchars($_REQUEST['dpd_ha_ha_' . $i]);

            $ra_id = htmlspecialchars($_REQUEST['ra_id_' . $i]);
            
            $desarrollo_pd = new Desarrollo_programa_didacticoDTO();
            $desarrollo_pd->setDpd_actividad_aprendizaje($dpd_actividad_aprendizaje);
            $desarrollo_pd->setDpd_mediacion_ensenianza($dpd_mediacion_ensenianza);
            $desarrollo_pd->setDpd_actividad_evaluacion($dpd_actividad_evaluacion);
            $desarrollo_pd->setDpd_recurso_didactivo($dpd_recurso_didactivo);
            $desarrollo_pd->setDpd_hp_ht($dpd_hp_ht);
            $desarrollo_pd->setDpd_hp_hp($dpd_hp_hp);
            $desarrollo_pd->setDpd_hp_hl($dpd_hp_hl);
            $desarrollo_pd->setDpd_hp_ha($dpd_hp_ha);
            $desarrollo_pd->setDpd_ha_ht($dpd_ha_ht);
            $desarrollo_pd->setDpd_ha_hp($dpd_ha_hp);
            $desarrollo_pd->setDpd_ha_hl($dpd_ha_hl);
            $desarrollo_pd->setDpd_ha_ha($dpd_ha_ha);
            $desarrollo_pd->setRa_id($ra_id);
            $desarrollo_pd->setPd_id($pd_id);
            
            $resutl_desarrollo_pd = $control->addDesarrollo_programa_didactico($desarrollo_pd);
        }


        if ($result) {
            echo json_encode(array(
                'success' => true,
                'mensaje' => "Programa didactico ingresada correctamente"
            ));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    }  else if ($accion == "BORRAR") {
        $pd_id = htmlspecialchars($_REQUEST['pd_id']);

        $result = $control->removePrograma_didactico($pd_id);
        if ($result) {
            echo json_encode(array('success' => true, 'mensaje' => "Programa_didactico borrado correctamente"));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    } else if ($accion == "BUSCAR") {
        $cadena = htmlspecialchars($_REQUEST['cadena']);
        $programa_didacticos = $control->getPrograma_didacticoLikeAtrr($cadena);
        $json = json_encode($programa_didacticos);
        echo $json;
    } else if ($accion == "BUSCAR_BY_ID") {
        $pd_id = htmlspecialchars($_REQUEST['pd_id']);

        $programa_didactico = $control->getPrograma_didacticoByID($pd_id);
        $json = json_encode($programa_didactico);
        echo $json;
    } else if ($accion == "BUSCAR_BY_PE_ID") {
        $pe_id = htmlspecialchars($_REQUEST['pe_id']);

        $programa_didactico = $control->getPrograma_didacticoByPE_ID($pe_id);
        $json = json_encode($programa_didactico);
        echo $json;
    } else if ($accion == "BUSCAR_BY_PE_ID_AND_ESTADO") {
        $pe_id = htmlspecialchars($_REQUEST['pe_id']);
        $estado = htmlspecialchars($_REQUEST['estado']);

        $programa_didactico = $control->getPrograma_didacticoByPE_ID_AND_ESTADO($pe_id,$estado);
        $json = json_encode($programa_didactico);
        echo $json;
    } else if ($accion == "BUSCAR_VERSION_FINAL_BY_ASIG_CODIGO") {
        $asig_codigo = htmlspecialchars($_REQUEST['asig_codigo']);

        $programa_didactico = $control->getPrograma_didactico_version_final_ByAsig_Codigo($asig_codigo);
        if($programa_didactico == null){
            $json = json_encode(array('errorMsg' => 'No hay un programa didactico creado para esta asignatura.'));
        }else{
            $json = json_encode($programa_didactico);
        }
        echo $json;
    } else if ($accion == "ACTUALIZAR") {
        $pd_id = htmlspecialchars($_REQUEST['pd_id']);
        $pe_id = htmlspecialchars($_REQUEST['pe_id']);
        $pd_fecha_modificacion = htmlspecialchars($_REQUEST['pd_fecha_modificacion']);
        $usu_rut = htmlspecialchars($_REQUEST['usu_rut']);
        $pd_borrador = htmlspecialchars($_REQUEST['pd_borrador']);

        $programa_didactico = new Programa_didacticoDTO();
        $programa_didactico->setPd_id($pd_id);
        $programa_didactico->setPe_id($pe_id);
        $programa_didactico->setPd_fecha_modificacion($pd_fecha_modificacion);
        $programa_didactico->setUsu_rut($usu_rut);
        $programa_didactico->setPd_borrador($pd_borrador);

        $result = $control->updatePrograma_didactico($programa_didactico);
        if ($result) {
            echo json_encode(array(
                'success' => true,
                'mensaje' => "Programa_didactico actualizada correctamente"
            ));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    } else if ($accion == "APROBAR") {
        $pd_id = htmlspecialchars($_REQUEST['pd_id']);
        
        $programa_didactico = $control->getPrograma_didacticoByID($pd_id);
        $programa_didactico->setPd_borrador(0);
        
         $result = $control->updatePrograma_didactico($programa_didactico);
         
        if ($result) {
            echo json_encode(array(
                'success' => true,
                'mensaje' => "Programa didactico aprobada correctamente"
            ));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    } else if ($accion == "RECHAZAR") {
        $pd_id = htmlspecialchars($_REQUEST['pd_id']);
        
        $programa_didactico = $control->getPrograma_didacticoByID($pd_id);
        $programa_didactico->setPd_borrador(3);
        
         $result = $control->updatePrograma_didactico($programa_didactico);
         
        if ($result) {
            echo json_encode(array(
                'success' => true,
                'mensaje' => "Programa didactico rechazado correctamente"
            ));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    }
}
