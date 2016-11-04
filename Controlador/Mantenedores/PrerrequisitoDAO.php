<?php
include_once 'Nucleo/ConexionMySQL.php';
include_once '../../Modelo/PrerrequisitoDTO.php';

class PrerrequisitoDAO{
    private $conexion;

    public function PrerrequisitoDAO() {
        $this->conexion = new ConexionMySQL();
    }

    public function delete($pre_id) {
        $this->conexion->conectar();
        $query = "DELETE FROM prerrequisito WHERE  pre_id =  ".$pre_id." ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function findAll() {
        $this->conexion->conectar();
        $query = "SELECT * FROM prerrequisito";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $prerrequisitos = array();
        while ($fila = $result->fetch_row()) {
            $prerrequisito = new PrerrequisitoDTO();
            $prerrequisito->setPre_id($fila[0]);
            $prerrequisito->setAsig_codigo($fila[1]);
            $prerrequisito->setAsig_codigo_prerrequisito($fila[2]);
            $prerrequisitos[$i] = $prerrequisito;
            $i++;
        }
        $this->conexion->desconectar();
        return $prerrequisitos;
    }

    public function findByID($pre_id) {
        $this->conexion->conectar();
        $query = "SELECT * FROM prerrequisito WHERE  pre_id =  ".$pre_id." ";
        $result = $this->conexion->ejecutar($query);
        $prerrequisito = new PrerrequisitoDTO();
        while ($fila = $result->fetch_row()) {
            $prerrequisito->setPre_id($fila[0]);
            $prerrequisito->setAsig_codigo($fila[1]);
            $prerrequisito->setAsig_codigo_prerrequisito($fila[2]);
        }
        $this->conexion->desconectar();
        return $prerrequisito;
    }

    public function findLikeAtrr($cadena) {
        $this->conexion->conectar();
        $query = "SELECT * FROM prerrequisito WHERE  upper(pre_id) LIKE upper(".$cadena.")  OR  upper(asig_codigo) LIKE upper(".$cadena.")  OR  upper(asig_codigo_prerrequisito) LIKE upper(".$cadena.") ";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $prerrequisitos = array();
        while ($fila = $result->fetch_row()) {
            $prerrequisito = new PrerrequisitoDTO();
            $prerrequisito->setPre_id($fila[0]);
            $prerrequisito->setAsig_codigo($fila[1]);
            $prerrequisito->setAsig_codigo_prerrequisito($fila[2]);
            $prerrequisitos[$i] = $prerrequisito;
            $i++;
        }
        $this->conexion->desconectar();
        return $prerrequisitos;
    }

    public function save($prerrequisito) {
        $this->conexion->conectar();
        $query = "INSERT INTO prerrequisito (pre_id,asig_codigo,asig_codigo_prerrequisito)"
                . " VALUES ( ".$prerrequisito->getPre_id()." ,  ".$prerrequisito->getAsig_codigo()." ,  ".$prerrequisito->getAsig_codigo_prerrequisito()." )";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function update($prerrequisito) {
        $this->conexion->conectar();
        $query = "UPDATE prerrequisito SET "
                . "  asig_codigo =  ".$prerrequisito->getAsig_codigo()." ,"
                . "  asig_codigo_prerrequisito =  ".$prerrequisito->getAsig_codigo_prerrequisito()." "
                . " WHERE  pre_id =  ".$prerrequisito->getPre_id()." ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }
}