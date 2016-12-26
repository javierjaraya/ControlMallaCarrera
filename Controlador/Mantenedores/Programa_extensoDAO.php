<?php

include_once 'Nucleo/ConexionMySQL.php';
include_once '../../Modelo/Programa_extensoDTO.php';

class Programa_extensoDAO {

    private $conexion;

    public function Programa_extensoDAO() {
        $this->conexion = new ConexionMySQL();
    }

    public function id_disponible() {
        $this->conexion->conectar();
        $query = "SELECT MAX(pe_id)+1 as pe_id FROM programa_extenso";
        $result = $this->conexion->ejecutar($query);
        $id = 1;
        if ($result) {
            while ($fila = $result->fetch_row()) {
                if ($fila[0] != null) {
                    $id = $fila[0];
                }
            }
        }
        $this->conexion->desconectar();
        return $id;
    }

    public function delete($pe_id) {
        $this->conexion->conectar();
        $query = "DELETE FROM programa_extenso WHERE  pe_id =  " . $pe_id . " ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function deleteBorradorByAsigCodigo($asig_codigo) {
        $this->conexion->conectar();
        $query = "DELETE FROM programa_extenso WHERE pe_borrador = 1 AND asig_codigo =  " . $asig_codigo . " ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function findAll() {
        $this->conexion->conectar();
        $query = "SELECT * FROM programa_extenso";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $programa_extensos = array();
        while ($fila = $result->fetch_row()) {
            $programa_extenso = new Programa_extensoDTO();
            $programa_extenso->setPe_id($fila[0]);
            $programa_extenso->setPe_tipo_curso(utf8_encode($fila[1]));
            $programa_extenso->setPe_carrera(utf8_encode($fila[2]));
            $programa_extenso->setPe_departamento(utf8_encode($fila[3]));
            $programa_extenso->setPe_facultad(utf8_encode($fila[4]));
            $programa_extenso->setPe_nro_creditos($fila[5]);
            $programa_extenso->setPe_horas_cronologicas($fila[6]);
            $programa_extenso->setPe_horas_pedagogicas($fila[7]);
            $programa_extenso->setPe_anio($fila[8]);
            $programa_extenso->setPe_semestre($fila[9]);
            $programa_extenso->setPe_hrs_presenciales($fila[10]);
            $programa_extenso->setPe_ht_presenciales($fila[11]);
            $programa_extenso->setPe_hp_presenciales($fila[12]);
            $programa_extenso->setPe_hl_presenciales($fila[13]);
            $programa_extenso->setPe_hrs_autonomas($fila[14]);
            $programa_extenso->setPe_ht_autonomas($fila[15]);
            $programa_extenso->setPe_hp_autonomas($fila[16]);
            $programa_extenso->setPe_hl_autonomas($fila[17]);
            $programa_extenso->setPe_presentacion($fila[18]);
            $programa_extenso->setPe_descriptor_competencias($fila[19]);
            $programa_extenso->setPe_aprendizajes_previos($fila[20]);
            $programa_extenso->setPe_fecha_inicio($fila[21]);
            $programa_extenso->setPe_fecha_fin($fila[22]);
            $programa_extenso->setPe_observacion($fila[23]);
            $programa_extenso->setPe_biblio_fundamental($fila[24]);
            $programa_extenso->setPe_biblio_complementaria($fila[25]);
            $programa_extenso->setAsig_codigo($fila[26]);
            $programa_extenso->setPe_fecha_modificacion($fila[27]);
            $programa_extenso->setUsu_rut($fila[28]);
            $programa_extenso->setPe_borrador($fila[29]);
            $programa_extenso->setPe_sistema_evaluacion($fila[30]);
            $programa_extensos[$i] = $programa_extenso;
            $i++;
        }
        $this->conexion->desconectar();
        return $programa_extensos;
    }

    public function findAll_by_estado($estado) {
        $this->conexion->conectar();
        $query = "SELECT pe.*, u.usu_nombres, u.usu_apellidos, a.m_id, a.asig_nombre FROM programa_extenso pe JOIN asignatura a ON pe.asig_codigo = a.asig_codigo JOIN usuario u ON u.usu_rut = pe.usu_rut WHERE pe.pe_borrador =  " . $estado . " ORDER BY pe.pe_fecha_modificacion DESC ";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $programa_extensos = array();
        while ($fila = $result->fetch_row()) {
            $programa_extenso = new Programa_extensoDTO();
            $programa_extenso->setPe_id($fila[0]);
            $programa_extenso->setPe_tipo_curso(utf8_encode($fila[1]));
            $programa_extenso->setPe_carrera(utf8_encode($fila[2]));
            $programa_extenso->setPe_departamento(utf8_encode($fila[3]));
            $programa_extenso->setPe_facultad(utf8_encode($fila[4]));
            $programa_extenso->setPe_nro_creditos($fila[5]);
            $programa_extenso->setPe_horas_cronologicas($fila[6]);
            $programa_extenso->setPe_horas_pedagogicas($fila[7]);
            $programa_extenso->setPe_anio($fila[8]);
            $programa_extenso->setPe_semestre($fila[9]);
            $programa_extenso->setPe_hrs_presenciales($fila[10]);
            $programa_extenso->setPe_ht_presenciales($fila[11]);
            $programa_extenso->setPe_hp_presenciales($fila[12]);
            $programa_extenso->setPe_hl_presenciales($fila[13]);
            $programa_extenso->setPe_hrs_autonomas($fila[14]);
            $programa_extenso->setPe_ht_autonomas($fila[15]);
            $programa_extenso->setPe_hp_autonomas($fila[16]);
            $programa_extenso->setPe_hl_autonomas($fila[17]);
            $programa_extenso->setPe_presentacion($fila[18]);
            $programa_extenso->setPe_descriptor_competencias($fila[19]);
            $programa_extenso->setPe_aprendizajes_previos($fila[20]);
            $programa_extenso->setPe_fecha_inicio($fila[21]);
            $programa_extenso->setPe_fecha_fin($fila[22]);
            $programa_extenso->setPe_observacion($fila[23]);
            $programa_extenso->setPe_biblio_fundamental($fila[24]);
            $programa_extenso->setPe_biblio_complementaria($fila[25]);
            $programa_extenso->setAsig_codigo($fila[26]);
            $programa_extenso->setPe_fecha_modificacion($fila[27]);
            $programa_extenso->setUsu_rut($fila[28]);
            $programa_extenso->setPe_borrador($fila[29]);
            $programa_extenso->setPe_sistema_evaluacion($fila[30]);

            $programa_extenso->setUsu_nombres(utf8_encode($fila[31]));
            $programa_extenso->setUsu_apellidos(utf8_encode($fila[32]));
            $programa_extenso->setM_id($fila[33]);
            $programa_extenso->setAsig_nombre($fila[34]);
            $programa_extensos[$i] = $programa_extenso;
            $i++;
        }
        $this->conexion->desconectar();
        return $programa_extensos;
    }

    public function findByID($pe_id) {
        $this->conexion->conectar();
        $query = "SELECT * FROM programa_extenso WHERE pe_id =  " . $pe_id . " ";
        $result = $this->conexion->ejecutar($query);
        $programa_extenso = new Programa_extensoDTO();
        while ($fila = $result->fetch_row()) {
            $programa_extenso->setPe_id($fila[0]);
            $programa_extenso->setPe_tipo_curso(utf8_decode($fila[1]));
            $programa_extenso->setPe_carrera(utf8_encode($fila[2]));
            $programa_extenso->setPe_departamento(utf8_decode($fila[3]));
            $programa_extenso->setPe_facultad(utf8_decode($fila[4]));
            $programa_extenso->setPe_nro_creditos($fila[5]);
            $programa_extenso->setPe_horas_cronologicas($fila[6]);
            $programa_extenso->setPe_horas_pedagogicas($fila[7]);
            $programa_extenso->setPe_anio($fila[8]);
            $programa_extenso->setPe_semestre($fila[9]);
            $programa_extenso->setPe_hrs_presenciales($fila[10]);
            $programa_extenso->setPe_ht_presenciales($fila[11]);
            $programa_extenso->setPe_hp_presenciales($fila[12]);
            $programa_extenso->setPe_hl_presenciales($fila[13]);
            $programa_extenso->setPe_hrs_autonomas($fila[14]);
            $programa_extenso->setPe_ht_autonomas($fila[15]);
            $programa_extenso->setPe_hp_autonomas($fila[16]);
            $programa_extenso->setPe_hl_autonomas($fila[17]);
            $programa_extenso->setPe_presentacion($fila[18]);
            $programa_extenso->setPe_descriptor_competencias($fila[19]);
            $programa_extenso->setPe_aprendizajes_previos($fila[20]);
            $programa_extenso->setPe_fecha_inicio($fila[21]);
            $programa_extenso->setPe_fecha_fin($fila[22]);
            $programa_extenso->setPe_observacion($fila[23]);
            $programa_extenso->setPe_biblio_fundamental($fila[24]);
            $programa_extenso->setPe_biblio_complementaria($fila[25]);
            $programa_extenso->setAsig_codigo($fila[26]);
            $programa_extenso->setPe_fecha_modificacion($fila[27]);
            $programa_extenso->setUsu_rut($fila[28]);
            $programa_extenso->setPe_borrador($fila[29]);
            $programa_extenso->setPe_sistema_evaluacion($fila[30]);
        }
        $this->conexion->desconectar();
        return $programa_extenso;
    }

    public function findByAsig_Codigo($asig_codigo) {
        $this->conexion->conectar();
        $query = "SELECT pe.*, u.usu_nombres, u.usu_apellidos, a.m_id, a.asig_nombre FROM programa_extenso pe JOIN asignatura a ON pe.asig_codigo = a.asig_codigo JOIN usuario u ON u.usu_rut = pe.usu_rut WHERE pe.asig_codigo =  " . $asig_codigo . " ORDER BY pe.pe_fecha_modificacion DESC";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $programa_extensos = array();
        if ($result) {
            while ($fila = $result->fetch_row()) {
                $programa_extenso = new Programa_extensoDTO();
                $programa_extenso->setPe_id($fila[0]);
                $programa_extenso->setPe_tipo_curso(utf8_encode($fila[1]));
                $programa_extenso->setPe_carrera(utf8_encode($fila[2]));
                $programa_extenso->setPe_departamento(utf8_encode($fila[3]));
                $programa_extenso->setPe_facultad(utf8_encode($fila[4]));
                $programa_extenso->setPe_nro_creditos($fila[5]);
                $programa_extenso->setPe_horas_cronologicas($fila[6]);
                $programa_extenso->setPe_horas_pedagogicas($fila[7]);
                $programa_extenso->setPe_anio($fila[8]);
                $programa_extenso->setPe_semestre($fila[9]);
                $programa_extenso->setPe_hrs_presenciales($fila[10]);
                $programa_extenso->setPe_ht_presenciales($fila[11]);
                $programa_extenso->setPe_hp_presenciales($fila[12]);
                $programa_extenso->setPe_hl_presenciales($fila[13]);
                $programa_extenso->setPe_hrs_autonomas($fila[14]);
                $programa_extenso->setPe_ht_autonomas($fila[15]);
                $programa_extenso->setPe_hp_autonomas($fila[16]);
                $programa_extenso->setPe_hl_autonomas($fila[17]);
                $programa_extenso->setPe_presentacion($fila[18]);
                $programa_extenso->setPe_descriptor_competencias($fila[19]);
                $programa_extenso->setPe_aprendizajes_previos($fila[20]);
                $programa_extenso->setPe_fecha_inicio($fila[21]);
                $programa_extenso->setPe_fecha_fin($fila[22]);
                $programa_extenso->setPe_observacion($fila[23]);
                $programa_extenso->setPe_biblio_fundamental($fila[24]);
                $programa_extenso->setPe_biblio_complementaria($fila[25]);
                $programa_extenso->setAsig_codigo($fila[26]);
                $programa_extenso->setPe_fecha_modificacion($fila[27]);
                $programa_extenso->setUsu_rut($fila[28]);
                $programa_extenso->setPe_borrador($fila[29]);
                $programa_extenso->setPe_sistema_evaluacion($fila[30]);

                $programa_extenso->setUsu_nombres(utf8_encode($fila[31]));
                $programa_extenso->setUsu_apellidos(utf8_encode($fila[32]));
                $programa_extenso->setM_id($fila[33]);
                $programa_extenso->setAsig_nombre($fila[34]);

                $programa_extensos[$i] = $programa_extenso;
                $i++;
            }
        }
        $this->conexion->desconectar();

        return $programa_extensos;
    }

    public function findByAsig_Codigo_And_Estado($asig_codigo, $estado) {
        $this->conexion->conectar();
        $query = "SELECT pe.*, u.usu_nombres, u.usu_apellidos, a.m_id, a.asig_nombre FROM programa_extenso pe JOIN asignatura a ON pe.asig_codigo = a.asig_codigo JOIN usuario u ON u.usu_rut = pe.usu_rut WHERE pe.asig_codigo =  " . $asig_codigo . " AND pe.pe_borrador = " . $estado . " ORDER BY pe.pe_fecha_modificacion DESC";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $programa_extensos = array();
        if ($result) {
            while ($fila = $result->fetch_row()) {
                $programa_extenso = new Programa_extensoDTO();
                $programa_extenso->setPe_id($fila[0]);
                $programa_extenso->setPe_tipo_curso(utf8_encode($fila[1]));
                $programa_extenso->setPe_carrera(utf8_encode($fila[2]));
                $programa_extenso->setPe_departamento(utf8_encode($fila[3]));
                $programa_extenso->setPe_facultad(utf8_encode($fila[4]));
                $programa_extenso->setPe_nro_creditos($fila[5]);
                $programa_extenso->setPe_horas_cronologicas($fila[6]);
                $programa_extenso->setPe_horas_pedagogicas($fila[7]);
                $programa_extenso->setPe_anio($fila[8]);
                $programa_extenso->setPe_semestre($fila[9]);
                $programa_extenso->setPe_hrs_presenciales($fila[10]);
                $programa_extenso->setPe_ht_presenciales($fila[11]);
                $programa_extenso->setPe_hp_presenciales($fila[12]);
                $programa_extenso->setPe_hl_presenciales($fila[13]);
                $programa_extenso->setPe_hrs_autonomas($fila[14]);
                $programa_extenso->setPe_ht_autonomas($fila[15]);
                $programa_extenso->setPe_hp_autonomas($fila[16]);
                $programa_extenso->setPe_hl_autonomas($fila[17]);
                $programa_extenso->setPe_presentacion($fila[18]);
                $programa_extenso->setPe_descriptor_competencias($fila[19]);
                $programa_extenso->setPe_aprendizajes_previos($fila[20]);
                $programa_extenso->setPe_fecha_inicio($fila[21]);
                $programa_extenso->setPe_fecha_fin($fila[22]);
                $programa_extenso->setPe_observacion($fila[23]);
                $programa_extenso->setPe_biblio_fundamental($fila[24]);
                $programa_extenso->setPe_biblio_complementaria($fila[25]);
                $programa_extenso->setAsig_codigo($fila[26]);
                $programa_extenso->setPe_fecha_modificacion($fila[27]);
                $programa_extenso->setUsu_rut($fila[28]);
                $programa_extenso->setPe_borrador($fila[29]);
                $programa_extenso->setPe_sistema_evaluacion($fila[30]);

                $programa_extenso->setUsu_nombres(utf8_encode($fila[31]));
                $programa_extenso->setUsu_apellidos(utf8_encode($fila[32]));
                $programa_extenso->setM_id($fila[33]);
                $programa_extenso->setAsig_nombre($fila[34]);

                $programa_extensos[$i] = $programa_extenso;
                $i++;
            }
        }
        $this->conexion->desconectar();

        return $programa_extensos;
    }

    public function find_aprobados_By_M_id_and_periodo($m_id, $m_fechaInicio, $m_fechaFin) {
        $this->conexion->conectar();
        $query = "SELECT pe.*, u.usu_nombres, u.usu_apellidos, a.m_id, a.asig_nombre "
                . " FROM programa_extenso pe "
                . " JOIN asignatura a ON pe.asig_codigo = a.asig_codigo "
                . " JOIN usuario u ON u.usu_rut = pe.usu_rut "
                . " WHERE a.m_id = '$m_id' AND pe.pe_borrador = 0 AND pe.pe_fecha_modificacion >= '$m_fechaInicio' AND pe.pe_fecha_modificacion <= '$m_fechaFin' ";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $programa_extensos = array();
        if ($result) {
            while ($fila = $result->fetch_row()) {
                $programa_extenso = new Programa_extensoDTO();
                $programa_extenso->setPe_id($fila[0]);
                $programa_extenso->setPe_tipo_curso(utf8_encode($fila[1]));
                $programa_extenso->setPe_carrera(utf8_encode($fila[2]));
                $programa_extenso->setPe_departamento(utf8_encode($fila[3]));
                $programa_extenso->setPe_facultad(utf8_encode($fila[4]));
                $programa_extenso->setPe_nro_creditos($fila[5]);
                $programa_extenso->setPe_horas_cronologicas($fila[6]);
                $programa_extenso->setPe_horas_pedagogicas($fila[7]);
                $programa_extenso->setPe_anio($fila[8]);
                $programa_extenso->setPe_semestre($fila[9]);
                $programa_extenso->setPe_hrs_presenciales($fila[10]);
                $programa_extenso->setPe_ht_presenciales($fila[11]);
                $programa_extenso->setPe_hp_presenciales($fila[12]);
                $programa_extenso->setPe_hl_presenciales($fila[13]);
                $programa_extenso->setPe_hrs_autonomas($fila[14]);
                $programa_extenso->setPe_ht_autonomas($fila[15]);
                $programa_extenso->setPe_hp_autonomas($fila[16]);
                $programa_extenso->setPe_hl_autonomas($fila[17]);
                $programa_extenso->setPe_presentacion($fila[18]);
                $programa_extenso->setPe_descriptor_competencias($fila[19]);
                $programa_extenso->setPe_aprendizajes_previos($fila[20]);
                $programa_extenso->setPe_fecha_inicio($fila[21]);
                $programa_extenso->setPe_fecha_fin($fila[22]);
                $programa_extenso->setPe_observacion($fila[23]);
                $programa_extenso->setPe_biblio_fundamental($fila[24]);
                $programa_extenso->setPe_biblio_complementaria($fila[25]);
                $programa_extenso->setAsig_codigo($fila[26]);
                $programa_extenso->setPe_fecha_modificacion($fila[27]);
                $programa_extenso->setUsu_rut($fila[28]);
                $programa_extenso->setPe_borrador($fila[29]);
                $programa_extenso->setPe_sistema_evaluacion($fila[30]);

                $programa_extenso->setUsu_nombres(utf8_encode($fila[31]));
                $programa_extenso->setUsu_apellidos(utf8_encode($fila[32]));
                $programa_extenso->setM_id($fila[33]);
                $programa_extenso->setAsig_nombre($fila[34]);

                $programa_extensos[$i] = $programa_extenso;
                $i++;
            }
        }
        $this->conexion->desconectar();

        return $programa_extensos;
    }

    public function findPorVencer_by_periodo($fechaInicio, $fechaFin) {
        $this->conexion->conectar();
        $query = "SELECT pe.*, u.usu_nombres, u.usu_apellidos, a.m_id, a.asig_nombre "
                . " FROM programa_extenso pe "
                . " JOIN asignatura a ON pe.asig_codigo = a.asig_codigo "
                . " JOIN usuario u ON u.usu_rut = pe.usu_rut "
                . " WHERE pe.pe_borrador = 0 AND pe.pe_fecha_fin >= '$fechaInicio' AND pe.pe_fecha_fin <= '$fechaFin';";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $programa_extensos = array();
        if ($result) {
            while ($fila = $result->fetch_row()) {
                $programa_extenso = new Programa_extensoDTO();
                $programa_extenso->setPe_id($fila[0]);
                $programa_extenso->setPe_tipo_curso(utf8_encode($fila[1]));
                $programa_extenso->setPe_carrera(utf8_encode($fila[2]));
                $programa_extenso->setPe_departamento(utf8_encode($fila[3]));
                $programa_extenso->setPe_facultad(utf8_encode($fila[4]));
                $programa_extenso->setPe_nro_creditos($fila[5]);
                $programa_extenso->setPe_horas_cronologicas($fila[6]);
                $programa_extenso->setPe_horas_pedagogicas($fila[7]);
                $programa_extenso->setPe_anio($fila[8]);
                $programa_extenso->setPe_semestre($fila[9]);
                $programa_extenso->setPe_hrs_presenciales($fila[10]);
                $programa_extenso->setPe_ht_presenciales($fila[11]);
                $programa_extenso->setPe_hp_presenciales($fila[12]);
                $programa_extenso->setPe_hl_presenciales($fila[13]);
                $programa_extenso->setPe_hrs_autonomas($fila[14]);
                $programa_extenso->setPe_ht_autonomas($fila[15]);
                $programa_extenso->setPe_hp_autonomas($fila[16]);
                $programa_extenso->setPe_hl_autonomas($fila[17]);
                $programa_extenso->setPe_presentacion($fila[18]);
                $programa_extenso->setPe_descriptor_competencias($fila[19]);
                $programa_extenso->setPe_aprendizajes_previos($fila[20]);
                $programa_extenso->setPe_fecha_inicio($fila[21]);
                $programa_extenso->setPe_fecha_fin($fila[22]);
                $programa_extenso->setPe_observacion($fila[23]);
                $programa_extenso->setPe_biblio_fundamental($fila[24]);
                $programa_extenso->setPe_biblio_complementaria($fila[25]);
                $programa_extenso->setAsig_codigo($fila[26]);
                $programa_extenso->setPe_fecha_modificacion($fila[27]);
                $programa_extenso->setUsu_rut($fila[28]);
                $programa_extenso->setPe_borrador($fila[29]);
                $programa_extenso->setPe_sistema_evaluacion($fila[30]);

                $programa_extenso->setUsu_nombres(utf8_encode($fila[31]));
                $programa_extenso->setUsu_apellidos(utf8_encode($fila[32]));
                $programa_extenso->setM_id($fila[33]);
                $programa_extenso->setAsig_nombre($fila[34]);

                $programa_extensos[$i] = $programa_extenso;
                $i++;
            }
        }
        $this->conexion->desconectar();

        return $programa_extensos;
    }

    public function find_version_final_ByAsig_Codigo($asig_codigo) {
        $this->conexion->conectar();
        $query = "SELECT pe.*, u.usu_nombres, u.usu_apellidos, a.m_id, a.asig_nombre FROM programa_extenso pe JOIN asignatura a ON pe.asig_codigo = a.asig_codigo JOIN usuario u ON u.usu_rut = pe.usu_rut WHERE pe.pe_borrador = 0 AND pe.asig_codigo =  " . $asig_codigo . " ORDER BY pe.pe_id DESC LIMIT 0,1";
        $result = $this->conexion->ejecutar($query);
        $programa_extenso = null;
        if ($result) {
            while ($fila = $result->fetch_row()) {
                $programa_extenso = new Programa_extensoDTO();
                $programa_extenso->setPe_id($fila[0]);
                $programa_extenso->setPe_tipo_curso(utf8_encode($fila[1]));
                $programa_extenso->setPe_carrera(utf8_encode($fila[2]));
                $programa_extenso->setPe_departamento(utf8_encode($fila[3]));
                $programa_extenso->setPe_facultad(utf8_encode($fila[4]));
                $programa_extenso->setPe_nro_creditos($fila[5]);
                $programa_extenso->setPe_horas_cronologicas($fila[6]);
                $programa_extenso->setPe_horas_pedagogicas($fila[7]);
                $programa_extenso->setPe_anio($fila[8]);
                $programa_extenso->setPe_semestre($fila[9]);
                $programa_extenso->setPe_hrs_presenciales($fila[10]);
                $programa_extenso->setPe_ht_presenciales($fila[11]);
                $programa_extenso->setPe_hp_presenciales($fila[12]);
                $programa_extenso->setPe_hl_presenciales($fila[13]);
                $programa_extenso->setPe_hrs_autonomas($fila[14]);
                $programa_extenso->setPe_ht_autonomas($fila[15]);
                $programa_extenso->setPe_hp_autonomas($fila[16]);
                $programa_extenso->setPe_hl_autonomas($fila[17]);
                $programa_extenso->setPe_presentacion($fila[18]);
                $programa_extenso->setPe_descriptor_competencias($fila[19]);
                $programa_extenso->setPe_aprendizajes_previos($fila[20]);
                $programa_extenso->setPe_fecha_inicio($fila[21]);
                $programa_extenso->setPe_fecha_fin($fila[22]);
                $programa_extenso->setPe_observacion($fila[23]);
                $programa_extenso->setPe_biblio_fundamental($fila[24]);
                $programa_extenso->setPe_biblio_complementaria($fila[25]);
                $programa_extenso->setAsig_codigo($fila[26]);
                $programa_extenso->setPe_fecha_modificacion($fila[27]);
                $programa_extenso->setUsu_rut($fila[28]);
                $programa_extenso->setPe_borrador($fila[29]);
                $programa_extenso->setPe_sistema_evaluacion($fila[30]);

                $programa_extenso->setUsu_nombres(utf8_encode($fila[31]));
                $programa_extenso->setUsu_apellidos(utf8_encode($fila[32]));
                $programa_extenso->setM_id($fila[33]);
                $programa_extenso->setAsig_nombre($fila[34]);
            }
        }
        $this->conexion->desconectar();

        return $programa_extenso;
    }

    public function findLikeAtrr($cadena) {
        $this->conexion->conectar();
        $query = "SELECT * FROM programa_extenso WHERE  upper(pe_id) LIKE upper(" . $cadena . ")  OR  upper(pe_tipo_curso) LIKE upper('" . $cadena . "')  OR  upper(pe_carrera) LIKE upper('" . $cadena . "')  OR  upper(pe_departamento) LIKE upper('" . $cadena . "')  OR  upper(pe_facultad) LIKE upper('" . $cadena . "')  OR  upper(pe_nro_creditos) LIKE upper(" . $cadena . ")  OR  upper(pe_horas_cronologicas) LIKE upper(" . $cadena . ")  OR  upper(pe_horas_pedagogicas) LIKE upper(" . $cadena . ")  OR  upper(pe_anio) LIKE upper(" . $cadena . ")  OR  upper(pe_semestre) LIKE upper(" . $cadena . ")  OR  upper(pe_hrs_presenciales) LIKE upper(" . $cadena . ")  OR  upper(pe_ht_presenciales) LIKE upper(" . $cadena . ")  OR  upper(pe_hp_presenciales) LIKE upper(" . $cadena . ")  OR  upper(pe_hl_presenciales) LIKE upper(" . $cadena . ")  OR  upper(pe_hrs_autonomas) LIKE upper(" . $cadena . ")  OR  upper(pe_ht_autonomas) LIKE upper(" . $cadena . ")  OR  upper(pe_hp_autonomas) LIKE upper(" . $cadena . ")  OR  upper(pe_hl_autonomas) LIKE upper(" . $cadena . ")  OR  upper(pe_presentacion) LIKE upper('" . $cadena . "')  OR  upper(pe_descriptor_competencias) LIKE upper('" . $cadena . "')  OR  upper(pe_aprendizajes_previos) LIKE upper('" . $cadena . "')  OR  upper(pe_fecha_inicio) LIKE upper('" . $cadena . "')  OR  upper(pe_fecha_fin) LIKE upper('" . $cadena . "')  OR  upper(pe_observacion) LIKE upper('" . $cadena . "')  OR  upper(pe_biblio_fundamental) LIKE upper(" . $cadena . ")  OR  upper(pe_biblio_complementaria) LIKE upper(" . $cadena . ")  OR  upper(asig_codigo) LIKE upper(" . $cadena . ")  OR  upper(pe_fecha_modificacion) LIKE upper(" . $cadena . ")  OR  upper(usu_rut) LIKE upper(" . $cadena . ")  OR  upper(pe_borrador) LIKE upper(" . $cadena . ") ";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $programa_extensos = array();
        while ($fila = $result->fetch_row()) {
            $programa_extenso = new Programa_extensoDTO();
            $programa_extenso->setPe_id($fila[0]);
            $programa_extenso->setPe_tipo_curso(utf8_encode($fila[1]));
            $programa_extenso->setPe_carrera(utf8_encode($fila[2]));
            $programa_extenso->setPe_departamento(utf8_encode($fila[3]));
            $programa_extenso->setPe_facultad(utf8_encode($fila[4]));
            $programa_extenso->setPe_nro_creditos($fila[5]);
            $programa_extenso->setPe_horas_cronologicas($fila[6]);
            $programa_extenso->setPe_horas_pedagogicas($fila[7]);
            $programa_extenso->setPe_anio($fila[8]);
            $programa_extenso->setPe_semestre($fila[9]);
            $programa_extenso->setPe_hrs_presenciales($fila[10]);
            $programa_extenso->setPe_ht_presenciales($fila[11]);
            $programa_extenso->setPe_hp_presenciales($fila[12]);
            $programa_extenso->setPe_hl_presenciales($fila[13]);
            $programa_extenso->setPe_hrs_autonomas($fila[14]);
            $programa_extenso->setPe_ht_autonomas($fila[15]);
            $programa_extenso->setPe_hp_autonomas($fila[16]);
            $programa_extenso->setPe_hl_autonomas($fila[17]);
            $programa_extenso->setPe_presentacion($fila[18]);
            $programa_extenso->setPe_descriptor_competencias($fila[19]);
            $programa_extenso->setPe_aprendizajes_previos($fila[20]);
            $programa_extenso->setPe_fecha_inicio($fila[21]);
            $programa_extenso->setPe_fecha_fin($fila[22]);
            $programa_extenso->setPe_observacion($fila[23]);
            $programa_extenso->setPe_biblio_fundamental($fila[24]);
            $programa_extenso->setPe_biblio_complementaria($fila[25]);
            $programa_extenso->setAsig_codigo($fila[26]);
            $programa_extenso->setPe_fecha_modificacion($fila[27]);
            $programa_extenso->setUsu_rut($fila[28]);
            $programa_extenso->setPe_borrador($fila[29]);
            $programa_extenso->setPe_sistema_evaluacion($fila[30]);
            $programa_extensos[$i] = $programa_extenso;
            $i++;
        }
        $this->conexion->desconectar();

        return

                $programa_extensos;
    }

    public function save($programa_extenso) {
        $pe_nro_creditos = $programa_extenso->getPe_nro_creditos();
        if ($pe_nro_creditos == "") {
            $pe_nro_creditos = 'null';
        }
        $pe_horas_cronologicas = $programa_extenso->getPe_horas_cronologicas();
        if ($pe_horas_cronologicas == "") {
            $pe_horas_cronologicas = 'null';
        }
        $pe_horas_pedagogicas = $programa_extenso->getPe_horas_pedagogicas();
        if ($pe_horas_pedagogicas == "") {
            $pe_horas_pedagogicas = 'null';
        }
        $pe_anio = $programa_extenso->getPe_anio();
        if ($pe_anio == "") {
            $pe_anio = 'null';
        }
        $pe_semestre = $programa_extenso->getPe_semestre();
        if ($pe_semestre == "") {
            $pe_semestre = 'null';
        }
        $pe_hrs_presenciales = $programa_extenso->getPe_hrs_presenciales();
        if ($pe_hrs_presenciales == "") {
            $pe_hrs_presenciales = 'null';
        }
        $pe_ht_presenciales = $programa_extenso->getPe_ht_presenciales();
        if ($pe_ht_presenciales == "") {
            $pe_ht_presenciales = 'null';
        }
        $pe_hp_presenciales = $programa_extenso->getPe_hp_presenciales();
        if ($pe_hp_presenciales == "") {
            $pe_hp_presenciales = 'null';
        }
        $pe_hl_presenciales = $programa_extenso->getPe_hl_presenciales();
        if ($pe_hl_presenciales == "") {
            $pe_hl_presenciales = 'null';
        }
        $pe_hrs_autonomas = $programa_extenso->getPe_hrs_autonomas();
        if ($pe_hrs_autonomas == "") {
            $pe_hrs_autonomas = 'null';
        }
        $pe_ht_autonomas = $programa_extenso->getPe_ht_autonomas();
        if ($pe_ht_autonomas == "") {
            $pe_ht_autonomas = 'null';
        }
        $pe_hp_autonomas = $programa_extenso->getPe_hp_autonomas();
        if ($pe_hp_autonomas == "") {
            $pe_hp_autonomas = 'null';
        }
        $pe_hl_autonomas = $programa_extenso->getPe_hl_autonomas();
        if ($pe_hl_autonomas == "") {
            $pe_hl_autonomas = 'null';
        }

        $this->conexion->conectar();
        $query = "INSERT INTO programa_extenso (pe_id,pe_tipo_curso,pe_carrera,pe_departamento,pe_facultad,pe_nro_creditos,pe_horas_cronologicas,pe_horas_pedagogicas,pe_anio,pe_semestre,pe_hrs_presenciales,pe_ht_presenciales,pe_hp_presenciales,pe_hl_presenciales,pe_hrs_autonomas,pe_ht_autonomas,pe_hp_autonomas,pe_hl_autonomas,pe_presentacion,pe_descriptor_competencias,pe_aprendizajes_previos,pe_fecha_inicio,pe_fecha_fin,pe_observacion,pe_biblio_fundamental,pe_biblio_complementaria,asig_codigo,pe_fecha_modificacion,usu_rut,pe_borrador,pe_sistema_evaluacion)"
                . " VALUES ( " . $programa_extenso->getPe_id() . ",'" . $programa_extenso->getPe_tipo_curso() . "' , '" . $programa_extenso->getPe_carrera() . "' , '" . $programa_extenso->getPe_departamento() . "' , '" . $programa_extenso->getPe_facultad() . "' ,  " . $pe_nro_creditos . " ,  " . $pe_horas_cronologicas . " ,  " . $pe_horas_pedagogicas . " ,  " . $pe_anio . " ,  " . $pe_semestre . " ,  " . $pe_hrs_presenciales . " ,  " . $pe_ht_presenciales . " ,  " . $pe_hp_presenciales . " ,  " . $pe_hl_presenciales . " ,  " . $pe_hrs_autonomas . " ,  " . $pe_ht_autonomas . " ,  " . $pe_hp_autonomas . " ,  " . $pe_hl_autonomas . " , '" . $programa_extenso->getPe_presentacion() . "' , '" . $programa_extenso->getPe_descriptor_competencias() . "' , '" . $programa_extenso->getPe_aprendizajes_previos() . "' , '" . $programa_extenso->getPe_fecha_inicio() . "' , '" . $programa_extenso->getPe_fecha_fin() . "' , '" . $programa_extenso->getPe_observacion() . "' ,  '" . $programa_extenso->getPe_biblio_fundamental() . "' ,  '" . $programa_extenso->getPe_biblio_complementaria() . "' ,  " . $programa_extenso->getAsig_codigo() . " , now() ,  " . $programa_extenso->getUsu_rut() . " ,  " . $programa_extenso->getPe_borrador() . ", '" . $programa_extenso->getPe_sistema_evaluacion() . "' )";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();

        return $result;
    }

    public function update($programa_extenso) {
        $this->conexion->conectar();
        $query = "UPDATE programa_extenso SET "
                . "  pe_tipo_curso = '" . $programa_extenso->getPe_tipo_curso() . "' ,"
                . "  pe_carrera = '" . $programa_extenso->getPe_carrera() . "' ,"
                . "  pe_departamento = '" . $programa_extenso->getPe_departamento() . "' ,"
                . "  pe_facultad = '" . $programa_extenso->getPe_facultad() . "' ,"
                . "  pe_nro_creditos =  " . $programa_extenso->getPe_nro_creditos() . " ,"
                . "  pe_horas_cronologicas =  " . $programa_extenso->getPe_horas_cronologicas() . " ,"
                . "  pe_horas_pedagogicas =  " . $programa_extenso->getPe_horas_pedagogicas() . " ,"
                . "  pe_anio =  " . $programa_extenso->getPe_anio() . " ,"
                . "  pe_semestre =  " . $programa_extenso->getPe_semestre() . " ,"
                . "  pe_hrs_presenciales =  " . $programa_extenso->getPe_hrs_presenciales() . " ,"
                . "  pe_ht_presenciales =  " . $programa_extenso->getPe_ht_presenciales() . " ,"
                . "  pe_hp_presenciales =  " . $programa_extenso->getPe_hp_presenciales() . " ,"
                . "  pe_hl_presenciales =  " . $programa_extenso->getPe_hl_presenciales() . " ,"
                . "  pe_hrs_autonomas =  " . $programa_extenso->getPe_hrs_autonomas() . " ,"
                . "  pe_ht_autonomas =  " . $programa_extenso->getPe_ht_autonomas() . " ,"
                . "  pe_hp_autonomas =  " . $programa_extenso->getPe_hp_autonomas() . " ,"
                . "  pe_hl_autonomas =  " . $programa_extenso->getPe_hl_autonomas() . " ,"
                . "  pe_presentacion = '" . $programa_extenso->getPe_presentacion() . "' ,"
                . "  pe_descriptor_competencias = '" . $programa_extenso->getPe_descriptor_competencias() . "' ,"
                . "  pe_aprendizajes_previos = '" . $programa_extenso->getPe_aprendizajes_previos() . "' ,"
                . "  pe_fecha_inicio = '" . $programa_extenso->getPe_fecha_inicio() . "' ,"
                . "  pe_fecha_fin = '" . $programa_extenso->getPe_fecha_fin() . "' ,"
                . "  pe_observacion = '" . $programa_extenso->getPe_observacion() . "' ,"
                . "  pe_biblio_fundamental =  '" . $programa_extenso->getPe_biblio_fundamental() . "' ,"
                . "  pe_biblio_complementaria =  '" . $programa_extenso->getPe_biblio_complementaria() . "' ,"
                . "  asig_codigo =  " . $programa_extenso->getAsig_codigo() . " ,"
                . "  pe_fecha_modificacion = now() ,"
                . "  usu_rut =  " . $programa_extenso->getUsu_rut() . " ,"
                . "  pe_borrador =  " . $programa_extenso->getPe_borrador() . ", "
                . "  pe_sistema_evaluacion =  '" . $programa_extenso->getPe_sistema_evaluacion() . "' "
                . " WHERE  pe_id =  " . $programa_extenso->getPe_id() . " ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

}
