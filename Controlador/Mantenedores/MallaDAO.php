<?php

include_once 'Nucleo/ConexionMySQL.php';
include_once '../../Modelo/MallaDTO.php';

class MallaDAO {

    private $conexion;

    public function MallaDAO() {
        $this->conexion = new ConexionMySQL();
    }

    public function delete($m_id) {
        $this->conexion->conectar();
        $query = "DELETE FROM malla WHERE  m_id =  " . $m_id . " ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function findAll() {
        $this->conexion->conectar();
        $query = "SELECT * FROM malla";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $mallas = array();
        while ($fila = $result->fetch_row()) {
            $malla = new MallaDTO();
            $malla->setM_id($fila[0]);
            $malla->setM_fechaModificacion($fila[1]);
            $malla->setM_fechaInicio($fila[2]);
            $malla->setM_fechaFin($fila[3]);
            $malla->setM_cantidadSemestres($fila[4]);
            $mallas[$i] = $malla;
            $i++;
        }
        $this->conexion->desconectar();
        return $mallas;
    }

    public function findByID($m_id) {
        $this->conexion->conectar();
        $query = "SELECT * FROM malla WHERE  m_id =  " . $m_id . " ";
        $result = $this->conexion->ejecutar($query);
        $malla = new MallaDTO();
        while ($fila = $result->fetch_row()) {
            $malla->setM_id($fila[0]);
            $malla->setM_fechaModificacion($fila[1]);
            $malla->setM_fechaInicio($fila[2]);
            $malla->setM_fechaFin($fila[3]);
            $malla->setM_cantidadSemestres($fila[4]);
        }
        $this->conexion->desconectar();
        return $malla;
    }

    public function findLikeAtrr($cadena) {
        $this->conexion->conectar();
        $query = "SELECT * FROM malla WHERE  upper(m_id) LIKE upper(" . $cadena . ")  OR  upper(m_fechaModificacion) LIKE upper('" . $cadena . "')  OR  upper(m_fechaInicio) LIKE upper('" . $cadena . "')  OR  upper(m_fechaFin) LIKE upper('" . $cadena . "') ";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $mallas = array();
        while ($fila = $result->fetch_row()) {
            $malla = new MallaDTO();
            $malla->setM_id($fila[0]);
            $malla->setM_fechaModificacion($fila[1]);
            $malla->setM_fechaInicio($fila[2]);
            $malla->setM_fechaFin($fila[3]);
            $malla->setM_cantidadSemestres($fila[4]);
            $mallas[$i] = $malla;
            $i++;
        }
        $this->conexion->desconectar();
        return $mallas;
    }

    public function save($malla) {
        $this->conexion->conectar();
        $query = "INSERT INTO malla (m_fechaModificacion,m_fechaInicio,m_fechaFin,m_cantidadSemestres)"
                . " VALUES ( now() , '" . $malla->getM_fechaInicio() . "' , '" . $malla->getM_fechaFin() . "' , " . $malla->getM_cantidadSemestres() . " )";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function update($malla) {
        $this->conexion->conectar();
        $query = "UPDATE malla SET "
                . "  m_fechaModificacion = now() ,"
                . "  m_fechaInicio = '" . $malla->getM_fechaInicio() . "' ,"
                . "  m_fechaFin = '" . $malla->getM_fechaFin() . "' ,"
                . "  m_cantidadSemestres = " . $malla->getM_cantidadSemestres()
                . " WHERE  m_id =  " . $malla->getM_id() . " ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function cantidadMaximaAsignaturasEnSemestre($m_id) {
        $this->conexion->conectar();
        $query = "SELECT count(*) as n_asignaturas FROM asignatura WHERE ta_id != 3 AND m_id = " . $m_id . " GROUP BY asig_periodo ORDER BY n_asignaturas DESC LIMIT 0,1 ";
        $result = $this->conexion->ejecutar($query);
        $n_asignaturas = 0;
        while ($fila = $result->fetch_row()) {
            $n_asignaturas = $fila[0];
        }
        $this->conexion->desconectar();
        return $n_asignaturas;
    }

    public function maxPeriodoUtilizadoByM_Id($m_id) {
        $this->conexion->conectar();
        $query = "SELECT (SELECT max(ge_periodo) FROM grupo_electivo WHERE  m_id =  " . $m_id . ") as ge_periodo, (SELECT max(asig_periodo) FROM asignatura WHERE  m_id =  " . $m_id . ") as asig_periodo";
        $result = $this->conexion->ejecutar($query);
        $ge_periodo = 0;
        $asig_periodo = 0;
        while ($fila = $result->fetch_row()) {
            $ge_periodo = $fila[0];
            $asig_periodo = $fila[1];
        }
        $this->conexion->desconectar();
        
        $max = 0;
        if($ge_periodo > $asig_periodo){
            $max = $ge_periodo;
        }else{
            $max = $asig_periodo;
        }
        return $max;
    }

}
