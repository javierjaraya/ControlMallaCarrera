<?php
include_once 'Nucleo/ConexionMySQL.php';
include_once '../../Modelo/AsignaturaDTO.php';

class AsignaturaDAO{
    private $conexion;

    public function AsignaturaDAO() {
        $this->conexion = new ConexionMySQL();
    }

    public function delete($asig_codigo) {
        $this->conexion->conectar();
        $query = "DELETE FROM asignatura WHERE asig_codigo =  ".$asig_codigo." ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function findAll() {
        $this->conexion->conectar();
        $query = "SELECT * FROM asignatura";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $asignaturas = array();
        while ($fila = $result->fetch_row()) {
            $asignatura = new AsignaturaDTO();
            $asignatura->setAsig_codigo($fila[0]);
            $asignatura->setAsig_nombre($fila[1]);
            $asignatura->setAsig_periodo($fila[2]);
            $asignatura->setM_id($fila[3]);
            $asignatura->setTa_id($fila[4]);
            $asignaturas[$i] = $asignatura;
            $i++;
        }
        $this->conexion->desconectar();
        return $asignaturas;
    }

    public function findByID($asig_codigo) {
        $this->conexion->conectar();
        $query = "SELECT * FROM asignatura WHERE  asig_codigo =  ".$asig_codigo." ";
        $result = $this->conexion->ejecutar($query);
        $asignatura = new AsignaturaDTO();
        while ($fila = $result->fetch_row()) {
            $asignatura->setAsig_codigo($fila[0]);
            $asignatura->setAsig_nombre($fila[1]);
            $asignatura->setAsig_periodo($fila[2]);
            $asignatura->setM_id($fila[3]);
            $asignatura->setTa_id($fila[4]);
        }
        $this->conexion->desconectar();
        return $asignatura;
    }

    public function findLikeAtrr($cadena) {
        $this->conexion->conectar();
        $query = "SELECT * FROM asignatura WHERE  upper(asig_codigo) LIKE upper(".$cadena.")  OR  upper(asig_nombre) LIKE upper('".$cadena."')  OR  upper(m_id) LIKE upper(".$cadena.")  OR  upper(ta_id) LIKE upper(".$cadena.") ";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $asignaturas = array();
        while ($fila = $result->fetch_row()) {
            $asignatura = new AsignaturaDTO();
            $asignatura->setAsig_codigo($fila[0]);
            $asignatura->setAsig_nombre($fila[1]);
            $asignatura->setAsig_periodo($fila[2]);
            $asignatura->setM_id($fila[3]);
            $asignatura->setTa_id($fila[4]);
            $asignaturas[$i] = $asignatura;
            $i++;
        }
        $this->conexion->desconectar();
        return $asignaturas;
    }

    public function save($asignatura) {
        $this->conexion->conectar();
        $query = "INSERT INTO asignatura (asig_codigo,asig_nombre,asig_periodo, m_id,ta_id)"
                . " VALUES ( ".$asignatura->getAsig_codigo()." , '".$asignatura->getAsig_nombre()."' ,  ".$asignatura->getAsig_periodo()." ,  ".$asignatura->getM_id()." ,  ".$asignatura->getTa_id()." )";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function update($asignatura) {
        $this->conexion->conectar();
        $query = "UPDATE asignatura SET "
                . "  asig_nombre = '".$asignatura->getAsig_nombre()."' ,"
                . "  asig_periodo =  ".$asignatura->getAsig_periodo()." ,"
                . "  m_id =  ".$asignatura->getM_id()." ,"
                . "  ta_id =  ".$asignatura->getTa_id()." "
                . " WHERE  asig_codigo =  ".$asignatura->getAsig_codigo()." ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }
}