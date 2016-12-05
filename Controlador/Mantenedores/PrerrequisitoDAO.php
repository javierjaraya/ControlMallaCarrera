<?php
include_once 'Nucleo/ConexionMySQL.php';
include_once '../../Modelo/PrerrequisitoDTO.php';
include_once '../../Modelo/AsignaturaDTO.php';

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
    
    public function deleteByAsig_Codigo($asig_codigo) {
        $this->conexion->conectar();
        $query = "DELETE FROM prerrequisito WHERE asig_codigo =  ".$asig_codigo;
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }
    
    public function deleteByAsig_Codigo_Asig_Codigo_Prerrequisito($asig_codigo,$asig_codigo_prerrequisito) {
        $this->conexion->conectar();
        $query = "DELETE FROM prerrequisito WHERE  asig_codigo =  ".$asig_codigo." AND asig_codigo_prerrequisito = ".$asig_codigo_prerrequisito;
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
    
    public function findAllbyAsig_codigo($asig_codigo) {
        $this->conexion->conectar();
        $query = "SELECT * FROM prerrequisito WHERE asig_codigo =  ".$asig_codigo." ";
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
    
    public function findAllbyAsig_codigo_prerrequisito($asig_codigo_prerrequisito) {
        $this->conexion->conectar();
        $query = "SELECT * FROM prerrequisito WHERE asig_codigo_prerrequisito =  ".$asig_codigo_prerrequisito." ";
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
    
    public function findAllPrerrequisitos_ByAsig_Codigo($asig_codigo) {
        $this->conexion->conectar();
        $query = "SELECT a.* FROM prerrequisito p JOIN asignatura a ON p.asig_codigo_prerrequisito = a.asig_codigo WHERE p.asig_codigo = ".$asig_codigo." ";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $asignaturas = array();
        while ($fila = $result->fetch_row()) {
            $asignatura = new AsignaturaDTO();
            $asignatura->setAsig_codigo($fila[0]);
            $asignatura->setAsig_nombre($fila[1]);
            $asignatura->setAsig_periodo($fila[2]);
            $asignatura->setAsig_creditos($fila[3]);
            $asignatura->setM_id($fila[4]);
            $asignatura->setTa_id($fila[5]);
            $asignaturas[$i] = $asignatura;
            $i++;
        }
        $this->conexion->desconectar();
        return $asignaturas;
    }
    
    public function findAllCorrequisitos_ByAsig_Codigo($asig_codigo) {
        $this->conexion->conectar();
        $query = "SELECT a.* FROM prerrequisito p JOIN asignatura a ON p.asig_codigo = a.asig_codigo WHERE p.asig_codigo_prerrequisito = ".$asig_codigo." ";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $asignaturas = array();
        while ($fila = $result->fetch_row()) {
            $asignatura = new AsignaturaDTO();
            $asignatura->setAsig_codigo($fila[0]);
            $asignatura->setAsig_nombre($fila[1]);
            $asignatura->setAsig_periodo($fila[2]);
            $asignatura->setAsig_creditos($fila[3]);
            $asignatura->setM_id($fila[4]);
            $asignatura->setTa_id($fila[5]);
            $asignaturas[$i] = $asignatura;
            $i++;
        }
        $this->conexion->desconectar();
        return $asignaturas;
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
        $query = "INSERT INTO prerrequisito (asig_codigo,asig_codigo_prerrequisito)"
                . " VALUES (".$prerrequisito->getAsig_codigo()." ,  ".$prerrequisito->getAsig_codigo_prerrequisito()." )";
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