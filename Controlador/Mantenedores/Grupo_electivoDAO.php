<?php
include_once 'Nucleo/ConexionMySQL.php';
include_once '../../Modelo/Grupo_electivoDTO.php';

class Grupo_electivoDAO{
    private $conexion;

    public function Grupo_electivoDAO() {
        $this->conexion = new ConexionMySQL();
    }

    public function delete($ge_codigo) {
        $this->conexion->conectar();
        $query = "DELETE FROM grupo_electivo WHERE  ge_codigo =  ".$ge_codigo." ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function findAll() {
        $this->conexion->conectar();
        $query = "SELECT * FROM grupo_electivo";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $grupo_electivos = array();
        while ($fila = $result->fetch_row()) {
            $grupo_electivo = new Grupo_electivoDTO();
            $grupo_electivo->setGe_codigo($fila[0]);
            $grupo_electivo->setGe_nombre($fila[1]);
            $grupo_electivo->setGe_periodo($fila[2]);
            $grupo_electivo->setGe_creditos($fila[3]);
            $grupo_electivo->setM_id($fila[4]);
            $grupo_electivo->setTa_id($fila[5]);
            $grupo_electivos[$i] = $grupo_electivo;
            $i++;
        }
        $this->conexion->desconectar();
        return $grupo_electivos;
    }

    public function findByID($ge_codigo) {
        $this->conexion->conectar();
        $query = "SELECT * FROM grupo_electivo WHERE  ge_codigo =  ".$ge_codigo." ";
        $result = $this->conexion->ejecutar($query);
        $grupo_electivo = new Grupo_electivoDTO();
        while ($fila = $result->fetch_row()) {
            $grupo_electivo->setGe_codigo($fila[0]);
            $grupo_electivo->setGe_nombre($fila[1]);
            $grupo_electivo->setGe_periodo($fila[2]);
            $grupo_electivo->setGe_creditos($fila[3]);
            $grupo_electivo->setM_id($fila[4]);
            $grupo_electivo->setTa_id($fila[5]);
        }
        $this->conexion->desconectar();
        return $grupo_electivo;
    }
    
    public function findByM_ID($m_id) {
        $this->conexion->conectar();
        $query = "SELECT * FROM grupo_electivo WHERE  m_id =  '" . $m_id . "' ";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $grupo_electivos = array();
        while ($fila = $result->fetch_row()) {
            $grupo_electivo = new Grupo_electivoDTO();
            $grupo_electivo->setGe_codigo($fila[0]);
            $grupo_electivo->setGe_nombre($fila[1]);
            $grupo_electivo->setGe_periodo($fila[2]);
            $grupo_electivo->setGe_creditos($fila[3]);
            $grupo_electivo->setM_id($fila[4]);
            $grupo_electivo->setTa_id($fila[5]);
            $grupo_electivos[$i] = $grupo_electivo;
            $i++;
        }
        $this->conexion->desconectar();
        return $grupo_electivos;
    }

    public function findLikeAtrr($cadena) {
        $this->conexion->conectar();
        $query = "SELECT * FROM grupo_electivo WHERE  upper(ge_codigo) LIKE upper(".$cadena.")  OR  upper(ge_nombre) LIKE upper('".$cadena."')  OR  upper(ge_periodo) LIKE upper(".$cadena.")  OR  upper(ge_creditos) LIKE upper(".$cadena.")  OR  upper(m_id) LIKE upper('".$cadena."') ";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $grupo_electivos = array();
        while ($fila = $result->fetch_row()) {
            $grupo_electivo = new Grupo_electivoDTO();
            $grupo_electivo->setGe_codigo($fila[0]);
            $grupo_electivo->setGe_nombre($fila[1]);
            $grupo_electivo->setGe_periodo($fila[2]);
            $grupo_electivo->setGe_creditos($fila[3]);
            $grupo_electivo->setM_id($fila[4]);
            $grupo_electivo->setTa_id($fila[5]);
            $grupo_electivos[$i] = $grupo_electivo;
            $i++;
        }
        $this->conexion->desconectar();
        return $grupo_electivos;
    }

    public function save($grupo_electivo) {
        $this->conexion->conectar();
        $query = "INSERT INTO grupo_electivo (ge_codigo,ge_nombre,ge_periodo,ge_creditos,m_id,ta_id)"
                . " VALUES ( ".$grupo_electivo->getGe_codigo()." , '".$grupo_electivo->getGe_nombre()."' ,  ".$grupo_electivo->getGe_periodo()." ,  ".$grupo_electivo->getGe_creditos()." ,  '".$grupo_electivo->getM_id()."',  ".$grupo_electivo->getTa_id()." )";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function update($grupo_electivo) {
        $this->conexion->conectar();
        $query = "UPDATE grupo_electivo SET "
                . "  ge_nombre = '".$grupo_electivo->getGe_nombre()."' ,"
                . "  ge_periodo =  ".$grupo_electivo->getGe_periodo()." ,"
                . "  ge_creditos =  ".$grupo_electivo->getGe_creditos()." ,"
                . "  m_id =  '".$grupo_electivo->getM_id()."', "
                . "  ta_id =  ".$grupo_electivo->getTa_id()." "
                . " WHERE ge_codigo =  ".$grupo_electivo->getGe_codigo()." ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }
}