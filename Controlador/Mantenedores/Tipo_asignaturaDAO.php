<?php
include_once 'Nucleo/ConexionMySQL.php';
include_once '../../Modelo/Tipo_asignaturaDTO.php';

class Tipo_asignaturaDAO{
    private $conexion;

    public function Tipo_asignaturaDAO() {
        $this->conexion = new ConexionMySQL();
    }

    public function delete($ta_id) {
        $this->conexion->conectar();
        $query = "DELETE FROM tipo_asignatura WHERE  ta_id =  ".$ta_id." ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function findAll() {
        $this->conexion->conectar();
        $query = "SELECT * FROM tipo_asignatura";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $tipo_asignaturas = array();
        while ($fila = $result->fetch_row()) {
            $tipo_asignatura = new Tipo_asignaturaDTO();
            $tipo_asignatura->setTa_id($fila[0]);
            $tipo_asignatura->setTa_nombre(utf8_encode($fila[1]));
            $tipo_asignaturas[$i] = $tipo_asignatura;
            $i++;
        }
        $this->conexion->desconectar();
        return $tipo_asignaturas;
    }

    public function findByID($ta_id) {
        $this->conexion->conectar();
        $query = "SELECT * FROM tipo_asignatura WHERE  ta_id =  ".$ta_id." ";
        $result = $this->conexion->ejecutar($query);
        $tipo_asignatura = new Tipo_asignaturaDTO();
        while ($fila = $result->fetch_row()) {
            $tipo_asignatura->setTa_id($fila[0]);
            $tipo_asignatura->setTa_nombre(utf8_encode($fila[1]));
        }
        $this->conexion->desconectar();
        return $tipo_asignatura;
    }

    public function findLikeAtrr($cadena) {
        $this->conexion->conectar();
        $query = "SELECT * FROM tipo_asignatura WHERE  upper(ta_id) LIKE upper(".$cadena.")  OR  upper(ta_nombre) LIKE upper('".$cadena."') ";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $tipo_asignaturas = array();
        while ($fila = $result->fetch_row()) {
            $tipo_asignatura = new Tipo_asignaturaDTO();
            $tipo_asignatura->setTa_id($fila[0]);
            $tipo_asignatura->setTa_nombre(utf8_encode($fila[1]));
            $tipo_asignaturas[$i] = $tipo_asignatura;
            $i++;
        }
        $this->conexion->desconectar();
        return $tipo_asignaturas;
    }

    public function save($tipo_asignatura) {
        $this->conexion->conectar();
        $query = "INSERT INTO tipo_asignatura (ta_id,ta_nombre)"
                . " VALUES ( ".$tipo_asignatura->getTa_id()." , '".$tipo_asignatura->getTa_nombre()."' )";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function update($tipo_asignatura) {
        $this->conexion->conectar();
        $query = "UPDATE tipo_asignatura SET "
                . "  ta_nombre = '".$tipo_asignatura->getTa_nombre()."' "
                . " WHERE  ta_id =  ".$tipo_asignatura->getTa_id()." ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }
}