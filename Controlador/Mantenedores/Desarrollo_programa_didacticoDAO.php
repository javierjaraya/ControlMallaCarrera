<?php
include_once 'Nucleo/ConexionMySQL.php';
include_once '../../Modelo/Desarrollo_programa_didacticoDTO.php';

class Desarrollo_programa_didacticoDAO{
    private $conexion;

    public function Desarrollo_programa_didacticoDAO() {
        $this->conexion = new ConexionMySQL();
    }

    public function delete($dpd_id) {
        $this->conexion->conectar();
        $query = "DELETE FROM desarrollo_programa_didactico WHERE dpd_id =  ".$dpd_id." ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }
    
    public function delete_BorradorBy_pe_id($pe_id) {
        $this->conexion->conectar();
        $query = "DELETE FROM desarrollo_programa_didactico WHERE pe_id = ".$pe_id." ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function findAll() {
        $this->conexion->conectar();
        $query = "SELECT * FROM desarrollo_programa_didactico";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $desarrollo_programa_didacticos = array();
        while ($fila = $result->fetch_row()) {
            $desarrollo_programa_didactico = new Desarrollo_programa_didacticoDTO();
            $desarrollo_programa_didactico->setDpd_id($fila[0]);
            $desarrollo_programa_didactico->setDpd_actividad_aprendizaje($fila[1]);
            $desarrollo_programa_didactico->setDpd_mediacion_ensenianza($fila[2]);
            $desarrollo_programa_didactico->setDpd_actividad_evaluacion($fila[3]);
            $desarrollo_programa_didactico->setDpd_recurso_didactivo($fila[4]);
            $desarrollo_programa_didactico->setDpd_hp_ht($fila[5]);
            $desarrollo_programa_didactico->setDpd_hp_hp($fila[6]);
            $desarrollo_programa_didactico->setDpd_hp_hl($fila[7]);
            $desarrollo_programa_didactico->setDpd_hp_ha($fila[8]);
            $desarrollo_programa_didactico->setDpd_ha_ht($fila[9]);
            $desarrollo_programa_didactico->setDpd_ha_hp($fila[10]);
            $desarrollo_programa_didactico->setDpd_ha_hl($fila[11]);
            $desarrollo_programa_didactico->setDpd_ha_ha($fila[12]);
            $desarrollo_programa_didactico->setRa_id($fila[13]);
            $desarrollo_programa_didactico->setPd_id($fila[14]);
            $desarrollo_programa_didacticos[$i] = $desarrollo_programa_didactico;
            $i++;
        }
        $this->conexion->desconectar();
        return $desarrollo_programa_didacticos;
    }

    public function findByID($dpd_id) {
        $this->conexion->conectar();
        $query = "SELECT * FROM desarrollo_programa_didactico WHERE  dpd_id =  ".$dpd_id." ";
        $result = $this->conexion->ejecutar($query);
        $desarrollo_programa_didactico = new Desarrollo_programa_didacticoDTO();
        while ($fila = $result->fetch_row()) {
            $desarrollo_programa_didactico->setDpd_id($fila[0]);
            $desarrollo_programa_didactico->setDpd_actividad_aprendizaje($fila[1]);
            $desarrollo_programa_didactico->setDpd_mediacion_ensenianza($fila[2]);
            $desarrollo_programa_didactico->setDpd_actividad_evaluacion($fila[3]);
            $desarrollo_programa_didactico->setDpd_recurso_didactivo($fila[4]);
            $desarrollo_programa_didactico->setDpd_hp_ht($fila[5]);
            $desarrollo_programa_didactico->setDpd_hp_hp($fila[6]);
            $desarrollo_programa_didactico->setDpd_hp_hl($fila[7]);
            $desarrollo_programa_didactico->setDpd_hp_ha($fila[8]);
            $desarrollo_programa_didactico->setDpd_ha_ht($fila[9]);
            $desarrollo_programa_didactico->setDpd_ha_hp($fila[10]);
            $desarrollo_programa_didactico->setDpd_ha_hl($fila[11]);
            $desarrollo_programa_didactico->setDpd_ha_ha($fila[12]);
            $desarrollo_programa_didactico->setRa_id($fila[13]);
            $desarrollo_programa_didactico->setPd_id($fila[14]);
        }
        $this->conexion->desconectar();
        return $desarrollo_programa_didactico;
    }
    
    public function findBy_pd_id($pd_id) {
        $this->conexion->conectar();
        $query = "SELECT * FROM desarrollo_programa_didactico WHERE  pd_id =  ".$pd_id." ";
        $result = $this->conexion->ejecutar($query);
        $desarrollo_programa_didactico = new Desarrollo_programa_didacticoDTO();
        while ($fila = $result->fetch_row()) {
            $desarrollo_programa_didactico->setDpd_id($fila[0]);
            $desarrollo_programa_didactico->setDpd_actividad_aprendizaje($fila[1]);
            $desarrollo_programa_didactico->setDpd_mediacion_ensenianza($fila[2]);
            $desarrollo_programa_didactico->setDpd_actividad_evaluacion($fila[3]);
            $desarrollo_programa_didactico->setDpd_recurso_didactivo($fila[4]);
            $desarrollo_programa_didactico->setDpd_hp_ht($fila[5]);
            $desarrollo_programa_didactico->setDpd_hp_hp($fila[6]);
            $desarrollo_programa_didactico->setDpd_hp_hl($fila[7]);
            $desarrollo_programa_didactico->setDpd_hp_ha($fila[8]);
            $desarrollo_programa_didactico->setDpd_ha_ht($fila[9]);
            $desarrollo_programa_didactico->setDpd_ha_hp($fila[10]);
            $desarrollo_programa_didactico->setDpd_ha_hl($fila[11]);
            $desarrollo_programa_didactico->setDpd_ha_ha($fila[12]);
            $desarrollo_programa_didactico->setRa_id($fila[13]);
            $desarrollo_programa_didactico->setPd_id($fila[14]);
        }
        $this->conexion->desconectar();
        return $desarrollo_programa_didactico;
    }

    public function findLikeAtrr($cadena) {
        $this->conexion->conectar();
        $query = "SELECT * FROM desarrollo_programa_didactico WHERE  upper(dpd_id) LIKE upper('%".$cadena."%')  OR  upper(dpd_actividad_aprendizaje) LIKE upper('%".$cadena."%')  OR  upper(dpd_mediacion_enseñanza) LIKE upper('%".$cadena."%')  OR  upper(dpd_actividad_evaluacion) LIKE upper('%".$cadena."%')  OR  upper(dpd_recurso_didactivo) LIKE upper('%".$cadena."%')  OR  upper(dpd_hp_ht) LIKE upper('%".$cadena."%')  OR  upper(dpd_hp_hp) LIKE upper('%".$cadena."%')  OR  upper(dpd_hp_hl) LIKE upper('%".$cadena."%')  OR  upper(dpd_ha_ht) LIKE upper('%".$cadena."%')  OR  upper(dpd_ha_hp) LIKE upper('%".$cadena."%')  OR  upper(dpd_ha_hl) LIKE upper('%".$cadena."%')  OR  upper(ra_id) LIKE upper('%".$cadena."%')  OR  upper(pd_id) LIKE upper('%".$cadena."%') ";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $desarrollo_programa_didacticos = array();
        while ($fila = $result->fetch_row()) {
            $desarrollo_programa_didactico = new Desarrollo_programa_didacticoDTO();
            $desarrollo_programa_didactico->setDpd_id($fila[0]);
            $desarrollo_programa_didactico->setDpd_actividad_aprendizaje($fila[1]);
            $desarrollo_programa_didactico->setDpd_mediacion_ensenianza($fila[2]);
            $desarrollo_programa_didactico->setDpd_actividad_evaluacion($fila[3]);
            $desarrollo_programa_didactico->setDpd_recurso_didactivo($fila[4]);
            $desarrollo_programa_didactico->setDpd_hp_ht($fila[5]);
            $desarrollo_programa_didactico->setDpd_hp_hp($fila[6]);
            $desarrollo_programa_didactico->setDpd_hp_hl($fila[7]);
            $desarrollo_programa_didactico->setDpd_hp_ha($fila[8]);
            $desarrollo_programa_didactico->setDpd_ha_ht($fila[9]);
            $desarrollo_programa_didactico->setDpd_ha_hp($fila[10]);
            $desarrollo_programa_didactico->setDpd_ha_hl($fila[11]);
            $desarrollo_programa_didactico->setDpd_ha_ha($fila[12]);
            $desarrollo_programa_didactico->setRa_id($fila[13]);
            $desarrollo_programa_didactico->setPd_id($fila[14]);
            $desarrollo_programa_didacticos[$i] = $desarrollo_programa_didactico;
            $i++;
        }
        $this->conexion->desconectar();
        return $desarrollo_programa_didacticos;
    }

    public function save($desarrollo_programa_didactico) {
        $this->conexion->conectar();
        $query = "INSERT INTO desarrollo_programa_didactico (dpd_actividad_aprendizaje,dpd_mediacion_ensenianza,dpd_actividad_evaluacion,dpd_recurso_didactivo,dpd_hp_ht,dpd_hp_hp,dpd_hp_hl,dpd_hp_ha,dpd_ha_ht,dpd_ha_hp,dpd_ha_hl,dpd_ha_ha,ra_id,pd_id)"
                . " VALUES ('".$desarrollo_programa_didactico->getDpd_actividad_aprendizaje()."' , '".$desarrollo_programa_didactico->getDpd_mediacion_ensenianza()."' , '".$desarrollo_programa_didactico->getDpd_actividad_evaluacion()."' , '".$desarrollo_programa_didactico->getDpd_recurso_didactivo()."' ,  ".$desarrollo_programa_didactico->getDpd_hp_ht()." ,  ".$desarrollo_programa_didactico->getDpd_hp_hp()." ,  ".$desarrollo_programa_didactico->getDpd_hp_hl()." ,  ".$desarrollo_programa_didactico->getDpd_hp_ha()." ,  ".$desarrollo_programa_didactico->getDpd_ha_ht()." ,  ".$desarrollo_programa_didactico->getDpd_ha_hp()." ,  ".$desarrollo_programa_didactico->getDpd_ha_hl()." ,  ".$desarrollo_programa_didactico->getDpd_ha_ha()." ,  ".$desarrollo_programa_didactico->getRa_id()." ,  ".$desarrollo_programa_didactico->getPd_id()." )";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function update($desarrollo_programa_didactico) {
        $this->conexion->conectar();
        $query = "UPDATE desarrollo_programa_didactico SET "
                . "  dpd_actividad_aprendizaje = '".$desarrollo_programa_didactico->getDpd_actividad_aprendizaje()."' ,"
                . "  dpd_mediacion_ensenianza = '".$desarrollo_programa_didactico->getDpd_mediacion_ensenianza()."' ,"
                . "  dpd_actividad_evaluacion = '".$desarrollo_programa_didactico->getDpd_actividad_evaluacion()."' ,"
                . "  dpd_recurso_didactivo = '".$desarrollo_programa_didactico->getDpd_recurso_didactivo()."' ,"
                . "  dpd_hp_ht =  ".$desarrollo_programa_didactico->getDpd_hp_ht()." ,"
                . "  dpd_hp_hp =  ".$desarrollo_programa_didactico->getDpd_hp_hp()." ,"
                . "  dpd_hp_hl =  ".$desarrollo_programa_didactico->getDpd_hp_hl()." ,"
                . "  dpd_hp_ha =  ".$desarrollo_programa_didactico->getDpd_hp_ha()." ,"
                . "  dpd_ha_ht =  ".$desarrollo_programa_didactico->getDpd_ha_ht()." ,"
                . "  dpd_ha_hp =  ".$desarrollo_programa_didactico->getDpd_ha_hp()." ,"
                . "  dpd_ha_hl =  ".$desarrollo_programa_didactico->getDpd_ha_hl()." ,"
                . "  dpd_ha_ha =  ".$desarrollo_programa_didactico->getDpd_ha_ha()." ,"
                . "  ra_id =  ".$desarrollo_programa_didactico->getRa_id()." ,"
                . "  pd_id =  ".$desarrollo_programa_didactico->getPd_id()." "
                . " WHERE  dpd_id =  ".$desarrollo_programa_didactico->getDpd_id()." ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }
}