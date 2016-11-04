<?php
include_once 'Nucleo/ConexionMySQL.php';
include_once '../../Modelo/DocenteDTO.php';

class DocenteDAO{
    private $conexion;

    public function DocenteDAO() {
        $this->conexion = new ConexionMySQL();
    }

    public function delete($doc_id) {
        $this->conexion->conectar();
        $query = "DELETE FROM docente WHERE  doc_id =  ".$doc_id." ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function findAll() {
        $this->conexion->conectar();
        $query = "SELECT * FROM docente";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $docentes = array();
        while ($fila = $result->fetch_row()) {
            $docente = new DocenteDTO();
            $docente->setDoc_id($fila[0]);
            $docente->setUsu_rut($fila[1]);
            $docente->setAsig_codigo($fila[2]);
            $docentes[$i] = $docente;
            $i++;
        }
        $this->conexion->desconectar();
        return $docentes;
    }

    public function findByID($doc_id) {
        $this->conexion->conectar();
        $query = "SELECT * FROM docente WHERE  doc_id =  ".$doc_id." ";
        $result = $this->conexion->ejecutar($query);
        $docente = new DocenteDTO();
        while ($fila = $result->fetch_row()) {
            $docente->setDoc_id($fila[0]);
            $docente->setUsu_rut($fila[1]);
            $docente->setAsig_codigo($fila[2]);
        }
        $this->conexion->desconectar();
        return $docente;
    }

    public function findLikeAtrr($cadena) {
        $this->conexion->conectar();
        $query = "SELECT * FROM docente WHERE  upper(doc_id) LIKE upper(".$cadena.")  OR  upper(usu_rut) LIKE upper(".$cadena.")  OR  upper(asig_codigo) LIKE upper(".$cadena.") ";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $docentes = array();
        while ($fila = $result->fetch_row()) {
            $docente = new DocenteDTO();
            $docente->setDoc_id($fila[0]);
            $docente->setUsu_rut($fila[1]);
            $docente->setAsig_codigo($fila[2]);
            $docentes[$i] = $docente;
            $i++;
        }
        $this->conexion->desconectar();
        return $docentes;
    }

    public function save($docente) {
        $this->conexion->conectar();
        $query = "INSERT INTO docente (doc_id,usu_rut,asig_codigo)"
                . " VALUES ( ".$docente->getDoc_id()." ,  ".$docente->getUsu_rut()." ,  ".$docente->getAsig_codigo()." )";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function update($docente) {
        $this->conexion->conectar();
        $query = "UPDATE docente SET "
                . "  usu_rut =  ".$docente->getUsu_rut()." ,"
                . "  asig_codigo =  ".$docente->getAsig_codigo()." "
                . " WHERE  doc_id =  ".$docente->getDoc_id()." ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }
}