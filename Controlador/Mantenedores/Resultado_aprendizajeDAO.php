<?php

include_once 'Nucleo/ConexionMySQL.php';
include_once '../../Modelo/Resultado_aprendizajeDTO.php';

class Resultado_aprendizajeDAO {

    private $conexion;

    public function Resultado_aprendizajeDAO() {
        $this->conexion = new ConexionMySQL();
    }

    public function delete($ra_id) {
        $this->conexion->conectar();
        $query = "DELETE FROM resultado_aprendizaje WHERE  ra_id =  " . $ra_id . " ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function findAll() {
        $this->conexion->conectar();
        $query = "SELECT * FROM resultado_aprendizaje";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $resultado_aprendizajes = array();
        while ($fila = $result->fetch_row()) {
            $resultado_aprendizaje = new Resultado_aprendizajeDTO();
            $resultado_aprendizaje->setRa_id($fila[0]);
            $resultado_aprendizaje->setRa_resultado_aprendizaje($fila[1]);
            $resultado_aprendizaje->setRa_metodologia($fila[2]);
            $resultado_aprendizaje->setRa_criterios_evaluacion($fila[3]);
            $resultado_aprendizaje->setRa_contenido_con_pro_act($fila[4]);
            $resultado_aprendizaje->setRa_ht_presenciales($fila[5]);
            $resultado_aprendizaje->setRa_hp_presenciales($fila[6]);
            $resultado_aprendizaje->setRa_ht_autonomas($fila[7]);
            $resultado_aprendizaje->setRa_hp_autonomas($fila[8]);
            $resultado_aprendizaje->setRa_evidencia_aprendizaje($fila[9]);
            $resultado_aprendizaje->setPe_id($fila[10]);
            $resultado_aprendizajes[$i] = $resultado_aprendizaje;
            $i++;
        }
        $this->conexion->desconectar();
        return $resultado_aprendizajes;
    }
    
    public function findAllBy_pe_id($pe_id) {
        $this->conexion->conectar();
        $query = "SELECT * FROM resultado_aprendizaje WHERE pe_id = ".$pe_id;
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $resultado_aprendizajes = array();
        while ($fila = $result->fetch_row()) {
            $resultado_aprendizaje = new Resultado_aprendizajeDTO();
            $resultado_aprendizaje->setRa_id($fila[0]);
            $resultado_aprendizaje->setRa_resultado_aprendizaje($fila[1]);
            $resultado_aprendizaje->setRa_metodologia($fila[2]);
            $resultado_aprendizaje->setRa_criterios_evaluacion($fila[3]);
            $resultado_aprendizaje->setRa_contenido_con_pro_act($fila[4]);
            $resultado_aprendizaje->setRa_ht_presenciales($fila[5]);
            $resultado_aprendizaje->setRa_hp_presenciales($fila[6]);
            $resultado_aprendizaje->setRa_ht_autonomas($fila[7]);
            $resultado_aprendizaje->setRa_hp_autonomas($fila[8]);
            $resultado_aprendizaje->setRa_evidencia_aprendizaje($fila[9]);
            $resultado_aprendizaje->setPe_id($fila[10]);
            $resultado_aprendizajes[$i] = $resultado_aprendizaje;
            $i++;
        }
        $this->conexion->desconectar();
        return $resultado_aprendizajes;
    }

    public function findByID($ra_id) {
        $this->conexion->conectar();
        $query = "SELECT * FROM resultado_aprendizaje WHERE  ra_id =  " . $ra_id . " ";
        $result = $this->conexion->ejecutar($query);
        $resultado_aprendizaje = new Resultado_aprendizajeDTO();
        while ($fila = $result->fetch_row()) {
            $resultado_aprendizaje->setRa_id($fila[0]);
            $resultado_aprendizaje->setRa_resultado_aprendizaje($fila[1]);
            $resultado_aprendizaje->setRa_metodologia($fila[2]);
            $resultado_aprendizaje->setRa_criterios_evaluacion($fila[3]);
            $resultado_aprendizaje->setRa_contenido_con_pro_act($fila[4]);
            $resultado_aprendizaje->setRa_ht_presenciales($fila[5]);
            $resultado_aprendizaje->setRa_hp_presenciales($fila[6]);
            $resultado_aprendizaje->setRa_ht_autonomas($fila[7]);
            $resultado_aprendizaje->setRa_hp_autonomas($fila[8]);
            $resultado_aprendizaje->setRa_evidencia_aprendizaje($fila[9]);
            $resultado_aprendizaje->setPe_id($fila[10]);
        }
        $this->conexion->desconectar();
        return $resultado_aprendizaje;
    }

    public function findLikeAtrr($cadena) {
        $this->conexion->conectar();
        $query = "SELECT * FROM resultado_aprendizaje WHERE  upper(ra_id) LIKE upper('%" . $cadena . "%')  OR  upper(ra_resultado_aprendizaje) LIKE upper('%" . $cadena . "%')  OR  upper(ra_metodologia) LIKE upper('%" . $cadena . "%')  OR  upper(ra_criterios_evaluacion) LIKE upper('%" . $cadena . "%')  OR  upper(ra_contenido_con_pro_act) LIKE upper('%" . $cadena . "%')  OR  upper(ra_ht_presenciales) LIKE upper('%" . $cadena . "%')  OR  upper(ra_hp_presenciales) LIKE upper('%" . $cadena . "%')  OR  upper(ra_ht_autonomas) LIKE upper('%" . $cadena . "%')  OR  upper(ra_hp_autonomas) LIKE upper('%" . $cadena . "%')  OR  upper(ra_evidencia_aprendizaje) LIKE upper('%" . $cadena . "%')  OR  upper(pe_id) LIKE upper('%" . $cadena . "%') ";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $resultado_aprendizajes = array();
        while ($fila = $result->fetch_row()) {
            $resultado_aprendizaje = new Resultado_aprendizajeDTO();
            $resultado_aprendizaje->setRa_id($fila[0]);
            $resultado_aprendizaje->setRa_resultado_aprendizaje($fila[1]);
            $resultado_aprendizaje->setRa_metodologia($fila[2]);
            $resultado_aprendizaje->setRa_criterios_evaluacion($fila[3]);
            $resultado_aprendizaje->setRa_contenido_con_pro_act($fila[4]);
            $resultado_aprendizaje->setRa_ht_presenciales($fila[5]);
            $resultado_aprendizaje->setRa_hp_presenciales($fila[6]);
            $resultado_aprendizaje->setRa_ht_autonomas($fila[7]);
            $resultado_aprendizaje->setRa_hp_autonomas($fila[8]);
            $resultado_aprendizaje->setRa_evidencia_aprendizaje($fila[9]);
            $resultado_aprendizaje->setPe_id($fila[10]);
            $resultado_aprendizajes[$i] = $resultado_aprendizaje;
            $i++;
        }
        $this->conexion->desconectar();
        return $resultado_aprendizajes;
    }

    public function save($resultado_aprendizaje) {
        $ra_ht_presenciales = $resultado_aprendizaje->getRa_ht_presenciales();
        if ($ra_ht_presenciales == "") {
            $ra_ht_presenciales = 'null';
        }
        $ra_hp_presenciales = $resultado_aprendizaje->getRa_hp_presenciales();
        if ($ra_hp_presenciales == "") {
            $ra_hp_presenciales = 'null';
        }
        $ra_ht_autonomas = $resultado_aprendizaje->getRa_ht_autonomas();
        if ($ra_ht_autonomas == "") {
            $ra_ht_autonomas = 'null';
        }
        $ra_hp_autonomas = $resultado_aprendizaje->getRa_hp_autonomas();
        if ($ra_hp_autonomas == "") {
            $ra_hp_autonomas = 'null';
        }

        $this->conexion->conectar();
        $query = "INSERT INTO resultado_aprendizaje (ra_resultado_aprendizaje,ra_metodologia,ra_criterios_evaluacion,ra_contenido_con_pro_act,ra_ht_presenciales,ra_hp_presenciales,ra_ht_autonomas,ra_hp_autonomas,ra_evidencia_aprendizaje,pe_id)"
                . " VALUES ('" . $resultado_aprendizaje->getRa_resultado_aprendizaje() . "' , '" . $resultado_aprendizaje->getRa_metodologia() . "' , '" . $resultado_aprendizaje->getRa_criterios_evaluacion() . "' , '" . $resultado_aprendizaje->getRa_contenido_con_pro_act() . "' ,  " . $ra_ht_presenciales . " ,  " . $ra_hp_presenciales . " ,  " . $ra_ht_autonomas . " ,  " . $ra_hp_autonomas . " , '" . $resultado_aprendizaje->getRa_evidencia_aprendizaje() . "' ,  " . $resultado_aprendizaje->getPe_id() . " )";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function update($resultado_aprendizaje) {
        $ra_ht_presenciales = $resultado_aprendizaje->getRa_ht_presenciales();
        if ($ra_ht_presenciales == "") {
            $ra_ht_presenciales = 'null';
        }
        $ra_hp_presenciales = $resultado_aprendizaje->getRa_hp_presenciales();
        if ($ra_hp_presenciales == "") {
            $ra_hp_presenciales = 'null';
        }
        $ra_ht_autonomas = $resultado_aprendizaje->getRa_ht_autonomas();
        if ($ra_ht_autonomas == "") {
            $ra_ht_autonomas = 'null';
        }
        $ra_hp_autonomas = $resultado_aprendizaje->getRa_hp_autonomas();
        if ($ra_hp_autonomas == "") {
            $ra_hp_autonomas = 'null';
        }

        $this->conexion->conectar();
        $query = "UPDATE resultado_aprendizaje SET "
                . "  ra_resultado_aprendizaje = '" . $resultado_aprendizaje->getRa_resultado_aprendizaje() . "' ,"
                . "  ra_metodologia = '" . $resultado_aprendizaje->getRa_metodologia() . "' ,"
                . "  ra_criterios_evaluacion = '" . $resultado_aprendizaje->getRa_criterios_evaluacion() . "' ,"
                . "  ra_contenido_con_pro_act = '" . $resultado_aprendizaje->getRa_contenido_con_pro_act() . "' ,"
                . "  ra_ht_presenciales =  " . $ra_ht_presenciales . " ,"
                . "  ra_hp_presenciales =  " . $ra_hp_presenciales . " ,"
                . "  ra_ht_autonomas =  " . $ra_ht_autonomas . " ,"
                . "  ra_hp_autonomas =  " . $ra_hp_autonomas . " ,"
                . "  ra_evidencia_aprendizaje = '" . $resultado_aprendizaje->getRa_evidencia_aprendizaje() . "' ,"
                . "  pe_id =  " . $resultado_aprendizaje->getPe_id() . " "
                . " WHERE  ra_id =  " . $resultado_aprendizaje->getRa_id() . " ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

}
