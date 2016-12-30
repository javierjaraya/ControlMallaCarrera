<?php

include_once 'Nucleo/ConexionMySQL.php';
include_once '../../Modelo/AsignaturaDTO.php';

class AsignaturaDAO {

    private $conexion;

    public function AsignaturaDAO() {
        $this->conexion = new ConexionMySQL();
    }

    public function delete($asig_codigo) {
        $this->conexion->conectar();
        $query = "DELETE FROM asignatura WHERE asig_codigo =  " . $asig_codigo . " ";
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
            $asignatura->setAsig_creditos($fila[3]);
            $asignatura->setM_id($fila[4]);
            $asignatura->setTa_id($fila[5]);
            $asignaturas[$i] = $asignatura;
            $i++;
        }
        $this->conexion->desconectar();
        return $asignaturas;
    }

    public function findAllBy_m_id($m_id) {
        $this->conexion->conectar();
        $query = "SELECT A.asig_codigo,A.asig_nombre,A.asig_periodo,A.asig_creditos,A.m_id,A.ta_id,T.ta_nombre FROM asignatura A JOIN tipo_asignatura T ON A.ta_id = T.ta_id WHERE A.m_id = '" . $m_id . "' ";
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
            $asignatura->setTa_nombre($fila[6]);
            $asignaturas[$i] = $asignatura;
            $i++;
        }
        $this->conexion->desconectar();
        return $asignaturas;
    }

    public function findAllBy_usu_rut($usu_rut) {
        $this->conexion->conectar();
        $query = "SELECT A.asig_codigo,A.asig_nombre,A.asig_periodo,A.asig_creditos,A.m_id,A.ta_id,T.ta_nombre FROM asignatura A JOIN tipo_asignatura T ON A.ta_id = T.ta_id JOIN docente D ON A.asig_codigo = D.asig_codigo WHERE D.usu_rut = " . $usu_rut . " ";        
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
            $asignatura->setTa_nombre($fila[6]);
            $asignaturas[$i] = $asignatura;
            $i++;
        }
        $this->conexion->desconectar();
        return $asignaturas;
    }

    public function findAllElectivosBy_m_id($m_id) {
        $this->conexion->conectar();
        $query = "SELECT * FROM asignatura WHERE ta_id = 3 AND m_id = '" . $m_id . "' ";
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

    public function findAllElectivosBy_usu_rut($usu_rut) {
        $this->conexion->conectar();
        $query = "SELECT A.asig_codigo,A.asig_nombre,A.asig_periodo,A.asig_creditos,A.m_id,A.ta_id,T.ta_nombre FROM asignatura A JOIN tipo_asignatura T ON A.ta_id = T.ta_id JOIN docente D ON A.asig_codigo = D.asig_codigo WHERE D.usu_rut = " . $usu_rut;
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
            $asignatura->setTa_nombre($fila[6]);
            $asignaturas[$i] = $asignatura;
            $i++;
        }
        $this->conexion->desconectar();
        return $asignaturas;
    }

    public function findAllPosiblesPrerrequisitos($m_id, $asig_periodo) {
        $this->conexion->conectar();
        $query = "SELECT * FROM asignatura WHERE m_id = '" . $m_id . "' AND asig_periodo < " . $asig_periodo;
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

    public function findByID($asig_codigo) {
        $this->conexion->conectar();
        $query = "SELECT * FROM asignatura WHERE  asig_codigo =  " . $asig_codigo . " ";
        $result = $this->conexion->ejecutar($query);
        $asignatura = new AsignaturaDTO();
        if ($result) {
            while ($fila = $result->fetch_row()) {
                $asignatura->setAsig_codigo($fila[0]);
                $asignatura->setAsig_nombre($fila[1]);
                $asignatura->setAsig_periodo($fila[2]);
                $asignatura->setAsig_creditos($fila[3]);
                $asignatura->setM_id($fila[4]);
                $asignatura->setTa_id($fila[5]);
            }
        }
        $this->conexion->desconectar();
        return $asignatura;
    }

    public function findByM_ID($m_id) {
        $this->conexion->conectar();
        $query = "SELECT * FROM asignatura WHERE ta_id != 3 AND m_id =  '" . $m_id . "' ";
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
        $query = "SELECT * FROM asignatura WHERE  upper(asig_codigo) LIKE upper(" . $cadena . ")  OR  upper(asig_nombre) LIKE upper('" . $cadena . "')  OR  upper(m_id) LIKE upper('" . $cadena . "')  OR  upper(ta_id) LIKE upper(" . $cadena . ") ";
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

    public function findAsigAndProgBasicoByM_id_And_asig_periodo($m_id, $asig_periodo) {
        $this->conexion->conectar();
        $query = "SELECT * FROM asignatura a LEFT JOIN programa_basico pb ON a.asig_codigo = pb.asig_codigo WHERE a.ta_id = 1 AND a.m_id = '$m_id' AND asig_periodo = $asig_periodo ";
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

            $programa_basico = new Programa_basicoDTO();
            $programa_basico->setPb_id($fila[6]);
            $programa_basico->setPb_tipo_curso($fila[7]);
            $programa_basico->setPb_carrera($fila[8]);
            $programa_basico->setPb_departamento($fila[9]);
            $programa_basico->setPb_facultad($fila[10]);
            $programa_basico->setPb_nro_creditos($fila[11]);
            $programa_basico->setPb_horas_cronologicas($fila[12]);
            $programa_basico->setPb_horas_pedagogicas($fila[13]);
            $programa_basico->setPb_anio($fila[14]);
            $programa_basico->setPb_semestre($fila[15]);
            $programa_basico->setPb_hrs_presenciales($fila[16]);
            $programa_basico->setPb_ht_presenciales($fila[17]);
            $programa_basico->setPb_hp_presenciales($fila[18]);
            $programa_basico->setPb_hl_presenciales($fila[19]);
            $programa_basico->setPb_hrs_autonomas($fila[20]);
            $programa_basico->setPb_ht_autonomas($fila[21]);
            $programa_basico->setPb_hp_autonomas($fila[22]);
            $programa_basico->setPb_hl_autonomas($fila[23]);
            $programa_basico->setPb_presentacion($fila[24]);
            $programa_basico->setPb_descriptor_competencias($fila[25]);
            $programa_basico->setPb_aprendizajes_previos($fila[26]);
            $programa_basico->setPb_biblio_fundamental($fila[27]);
            $programa_basico->setPb_biblio_complementaria($fila[28]);
            $programa_basico->setAsig_codigo($fila[29]);
            $programa_basico->setPb_fecha_modificacion($fila[30]);
            $programa_basico->setUsu_rut($fila[31]);
            $programa_basico->setPb_borrador($fila[32]);

            $asignatura->setPrograma_basico($programa_basico);

            $asignaturas[$i] = $asignatura;
            $i++;
        }
        $this->conexion->desconectar();
        return $asignaturas;
    }

    public function save($asignatura) {
        $this->conexion->conectar();
        $query = "INSERT INTO asignatura (asig_codigo,asig_nombre,asig_periodo, asig_creditos, m_id,ta_id)"
                . " VALUES ( " . $asignatura->getAsig_codigo() . " , '" . $asignatura->getAsig_nombre() . "' ,  " . $asignatura->getAsig_periodo() . ", " . $asignatura->getAsig_creditos() . " ,  '" . $asignatura->getM_id() . "' ,  " . $asignatura->getTa_id() . " )";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function update($asignatura) {
        $this->conexion->conectar();
        $query = "UPDATE asignatura SET "
                . "  asig_nombre = '" . $asignatura->getAsig_nombre() . "' ,"
                . "  asig_periodo =  " . $asignatura->getAsig_periodo() . " ,"
                . "  asig_creditos =  " . $asignatura->getAsig_creditos() . " ,"
                . "  m_id =  '" . $asignatura->getM_id() . "' ,"
                . "  ta_id =  " . $asignatura->getTa_id() . " "
                . " WHERE  asig_codigo =  " . $asignatura->getAsig_codigo() . " ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

}
