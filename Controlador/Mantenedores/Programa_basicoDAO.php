<?php

include_once 'Nucleo/ConexionMySQL.php';
include_once '../../Modelo/Programa_basicoDTO.php';

class Programa_basicoDAO {

    private $conexion;

    public function Programa_basicoDAO() {
        $this->conexion = new ConexionMySQL();
    }

    public function delete($pb_id) {
        $this->conexion->conectar();
        $query = "DELETE FROM programa_basico WHERE  pb_id =  " . $pb_id . " ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function deleteBorradorByAsigCodigo($asig_codigo) {
        $this->conexion->conectar();
        $query = "DELETE FROM programa_basico WHERE pb_borrador = 1 AND asig_codigo =  " . $asig_codigo . " ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function getIdDisponible() {
        $this->conexion->conectar();
        $query = "SELECT ((max(pb_id)+1) as id FROM programa_basico";
        $result = $this->conexion->ejecutar($query);
        $id = 1;
        if ($result) {
            while ($fila = $result->fetch_row()) {
                $id = $fila[0];
            }
        }
        $this->conexion->desconectar();
        return $id;
    }

    public function findAll() {
        $this->conexion->conectar();
        $query = "SELECT * FROM programa_basico";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $programa_basicos = array();
        while ($fila = $result->fetch_row()) {
            $programa_basico = new Programa_basicoDTO();
            $programa_basico->setPb_id($fila[0]);
            $programa_basico->setPb_tipo_curso(utf8_encode($fila[1]));
            $programa_basico->setPb_carrera(utf8_encode($fila[2]));
            $programa_basico->setPb_departamento(utf8_encode($fila[3]));
            $programa_basico->setPb_facultad(utf8_encode($fila[4]));
            $programa_basico->setPb_nro_creditos($fila[5]);
            $programa_basico->setPb_horas_cronologicas($fila[6]);
            $programa_basico->setPb_horas_pedagogicas($fila[7]);
            $programa_basico->setPb_anio($fila[8]);
            $programa_basico->setPb_semestre($fila[9]);
            $programa_basico->setPb_hrs_presenciales($fila[10]);
            $programa_basico->setPb_ht_presenciales($fila[11]);
            $programa_basico->setPb_hp_presenciales($fila[12]);
            $programa_basico->setPb_hl_presenciales($fila[13]);
            $programa_basico->setPb_hrs_autonomas($fila[14]);
            $programa_basico->setPb_ht_autonomas($fila[15]);
            $programa_basico->setPb_hp_autonomas($fila[16]);
            $programa_basico->setPb_hl_autonomas($fila[17]);
            $programa_basico->setPb_presentacion($fila[18]);
            $programa_basico->setPb_descriptor_competencias($fila[19]);
            $programa_basico->setPb_aprendizajes_previos($fila[20]);
            $programa_basico->setPb_biblio_fundamental($fila[21]);
            $programa_basico->setPb_biblio_complementaria($fila[22]);
            $programa_basico->setAsig_codigo($fila[23]);
            $programa_basico->setPb_fecha_modificacion($fila[24]);
            $programa_basico->setUsu_rut($fila[25]);
            $programa_basico->setPb_borrador($fila[26]);
            $programa_basicos[$i] = $programa_basico;
            $i++;
        }
        $this->conexion->desconectar();
        return $programa_basicos;
    }

    public function findByID($pb_id) {
        $this->conexion->conectar();
        $query = "SELECT * FROM programa_basico WHERE  pb_id =  " . $pb_id . " ";
        $result = $this->conexion->ejecutar($query);
        $programa_basico = new Programa_basicoDTO();
        while ($fila = $result->fetch_row()) {
            $programa_basico->setPb_id($fila[0]);
            $programa_basico->setPb_tipo_curso($fila[1]);
            $programa_basico->setPb_carrera($fila[2]);
            $programa_basico->setPb_departamento($fila[3]);
            $programa_basico->setPb_facultad($fila[4]);
            $programa_basico->setPb_nro_creditos($fila[5]);
            $programa_basico->setPb_horas_cronologicas($fila[6]);
            $programa_basico->setPb_horas_pedagogicas($fila[7]);
            $programa_basico->setPb_anio($fila[8]);
            $programa_basico->setPb_semestre($fila[9]);
            $programa_basico->setPb_hrs_presenciales($fila[10]);
            $programa_basico->setPb_ht_presenciales($fila[11]);
            $programa_basico->setPb_hp_presenciales($fila[12]);
            $programa_basico->setPb_hl_presenciales($fila[13]);
            $programa_basico->setPb_hrs_autonomas($fila[14]);
            $programa_basico->setPb_ht_autonomas($fila[15]);
            $programa_basico->setPb_hp_autonomas($fila[16]);
            $programa_basico->setPb_hl_autonomas($fila[17]);
            $programa_basico->setPb_presentacion($fila[18]);
            $programa_basico->setPb_descriptor_competencias($fila[19]);
            $programa_basico->setPb_aprendizajes_previos($fila[20]);
            $programa_basico->setPb_biblio_fundamental($fila[21]);
            $programa_basico->setPb_biblio_complementaria($fila[22]);
            $programa_basico->setAsig_codigo($fila[23]);
            $programa_basico->setPb_fecha_modificacion($fila[24]);
            $programa_basico->setUsu_rut($fila[25]);
            $programa_basico->setPb_borrador($fila[26]);
        }
        $this->conexion->desconectar();
        return $programa_basico;
    }

    public function findByAsig_Codigo($asig_codigo) {
        $this->conexion->conectar();
        $query = "SELECT pb.*, u.usu_nombres, u.usu_apellidos, a.m_id, a.asig_nombre FROM programa_basico pb JOIN asignatura a ON pb.asig_codigo = a.asig_codigo JOIN usuario u ON u.usu_rut = pb.usu_rut WHERE pb.asig_codigo =  " . $asig_codigo . " ORDER BY pb.pb_fecha_modificacion DESC";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $programa_basicos = array();
        if ($result) {
            while ($fila = $result->fetch_row()) {
                $programa_basico = new Programa_basicoDTO();
                $programa_basico->setPb_id($fila[0]);
                $programa_basico->setPb_tipo_curso(utf8_encode($fila[1]));
                $programa_basico->setPb_carrera(utf8_encode($fila[2]));
                $programa_basico->setPb_departamento(utf8_encode($fila[3]));
                $programa_basico->setPb_facultad(utf8_encode($fila[4]));
                $programa_basico->setPb_nro_creditos($fila[5]);
                $programa_basico->setPb_horas_cronologicas($fila[6]);
                $programa_basico->setPb_horas_pedagogicas($fila[7]);
                $programa_basico->setPb_anio($fila[8]);
                $programa_basico->setPb_semestre($fila[9]);
                $programa_basico->setPb_hrs_presenciales($fila[10]);
                $programa_basico->setPb_ht_presenciales($fila[11]);
                $programa_basico->setPb_hp_presenciales($fila[12]);
                $programa_basico->setPb_hl_presenciales($fila[13]);
                $programa_basico->setPb_hrs_autonomas($fila[14]);
                $programa_basico->setPb_ht_autonomas($fila[15]);
                $programa_basico->setPb_hp_autonomas($fila[16]);
                $programa_basico->setPb_hl_autonomas($fila[17]);
                $programa_basico->setPb_presentacion($fila[18]);
                $programa_basico->setPb_descriptor_competencias($fila[19]);
                $programa_basico->setPb_aprendizajes_previos($fila[20]);
                $programa_basico->setPb_biblio_fundamental($fila[21]);
                $programa_basico->setPb_biblio_complementaria($fila[22]);
                $programa_basico->setAsig_codigo($fila[23]);
                $programa_basico->setPb_fecha_modificacion($fila[24]);
                $programa_basico->setUsu_rut($fila[25]);
                $programa_basico->setPb_borrador($fila[26]);

                $programa_basico->setUsu_nombres(utf8_encode($fila[27]));
                $programa_basico->setUsu_apellidos(utf8_encode($fila[28]));
                $programa_basico->setM_id($fila[29]);
                $programa_basico->setAsig_nombre($fila[30]);

                $programa_basicos[$i] = $programa_basico;
                $i++;
            }
        }
        $this->conexion->desconectar();
        return $programa_basicos;
    }

    public function findByM_id_And_Periodo_Aprobados($m_id, $fechaInicio, $fechaTermino) {
        $this->conexion->conectar();
        $query = "SELECT pb.*, u.usu_nombres, u.usu_apellidos, a.m_id, a.asig_nombre  FROM programa_basico pb "
                . " JOIN  asignatura a ON a.asig_codigo = pb.asig_codigo "
                . " JOIN usuario u ON u.usu_rut = pb.usu_rut "
                . " WHERE a.m_id = '$m_id' AND pb.pb_borrador = 0 AND pb.pb_fecha_modificacion >= '$fechaInicio' AND pb.pb_fecha_modificacion <= '$fechaTermino'";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $programa_basicos = array();
        if ($result) {
            while ($fila = $result->fetch_row()) {
                $programa_basico = new Programa_basicoDTO();
                $programa_basico->setPb_id($fila[0]);
                $programa_basico->setPb_tipo_curso(utf8_encode($fila[1]));
                $programa_basico->setPb_carrera(utf8_encode($fila[2]));
                $programa_basico->setPb_departamento(utf8_encode($fila[3]));
                $programa_basico->setPb_facultad(utf8_encode($fila[4]));
                $programa_basico->setPb_nro_creditos($fila[5]);
                $programa_basico->setPb_horas_cronologicas($fila[6]);
                $programa_basico->setPb_horas_pedagogicas($fila[7]);
                $programa_basico->setPb_anio($fila[8]);
                $programa_basico->setPb_semestre($fila[9]);
                $programa_basico->setPb_hrs_presenciales($fila[10]);
                $programa_basico->setPb_ht_presenciales($fila[11]);
                $programa_basico->setPb_hp_presenciales($fila[12]);
                $programa_basico->setPb_hl_presenciales($fila[13]);
                $programa_basico->setPb_hrs_autonomas($fila[14]);
                $programa_basico->setPb_ht_autonomas($fila[15]);
                $programa_basico->setPb_hp_autonomas($fila[16]);
                $programa_basico->setPb_hl_autonomas($fila[17]);
                $programa_basico->setPb_presentacion($fila[18]);
                $programa_basico->setPb_descriptor_competencias($fila[19]);
                $programa_basico->setPb_aprendizajes_previos($fila[20]);
                $programa_basico->setPb_biblio_fundamental($fila[21]);
                $programa_basico->setPb_biblio_complementaria($fila[22]);
                $programa_basico->setAsig_codigo($fila[23]);
                $programa_basico->setPb_fecha_modificacion($fila[24]);
                $programa_basico->setUsu_rut($fila[25]);
                $programa_basico->setPb_borrador($fila[26]);

                $programa_basico->setUsu_nombres(utf8_encode($fila[27]));
                $programa_basico->setUsu_apellidos(utf8_encode($fila[28]));
                $programa_basico->setM_id($fila[29]);
                $programa_basico->setAsig_nombre($fila[30]);

                $programa_basicos[$i] = $programa_basico;
                $i++;
            }
        }
        $this->conexion->desconectar();
        return $programa_basicos;
    }

    public function find_version_final_ByAsig_Codigo($asig_codigo) {
        $this->conexion->conectar();
        $query = "SELECT pb.*, u.usu_nombres, u.usu_apellidos, a.m_id, a.asig_nombre FROM programa_basico pb JOIN asignatura a ON pb.asig_codigo = a.asig_codigo JOIN usuario u ON u.usu_rut = pb.usu_rut WHERE pb.pb_borrador = 0 AND pb.asig_codigo =  " . $asig_codigo . " ORDER BY pb.pb_id DESC LIMIT 0,1";
        $result = $this->conexion->ejecutar($query);
        $programa_basico = null;
        while ($fila = $result->fetch_row()) {
            $programa_basico = new Programa_basicoDTO();
            $programa_basico->setPb_id($fila[0]);
            $programa_basico->setPb_tipo_curso(utf8_encode($fila[1]));
            $programa_basico->setPb_carrera(utf8_encode($fila[2]));
            $programa_basico->setPb_departamento(utf8_encode($fila[3]));
            $programa_basico->setPb_facultad(utf8_encode($fila[4]));
            $programa_basico->setPb_nro_creditos($fila[5]);
            $programa_basico->setPb_horas_cronologicas($fila[6]);
            $programa_basico->setPb_horas_pedagogicas($fila[7]);
            $programa_basico->setPb_anio($fila[8]);
            $programa_basico->setPb_semestre($fila[9]);
            $programa_basico->setPb_hrs_presenciales($fila[10]);
            $programa_basico->setPb_ht_presenciales($fila[11]);
            $programa_basico->setPb_hp_presenciales($fila[12]);
            $programa_basico->setPb_hl_presenciales($fila[13]);
            $programa_basico->setPb_hrs_autonomas($fila[14]);
            $programa_basico->setPb_ht_autonomas($fila[15]);
            $programa_basico->setPb_hp_autonomas($fila[16]);
            $programa_basico->setPb_hl_autonomas($fila[17]);
            $programa_basico->setPb_presentacion($fila[18]);
            $programa_basico->setPb_descriptor_competencias($fila[19]);
            $programa_basico->setPb_aprendizajes_previos($fila[20]);
            $programa_basico->setPb_biblio_fundamental($fila[21]);
            $programa_basico->setPb_biblio_complementaria($fila[22]);
            $programa_basico->setAsig_codigo($fila[23]);
            $programa_basico->setPb_fecha_modificacion($fila[24]);
            $programa_basico->setUsu_rut($fila[25]);
            $programa_basico->setPb_borrador($fila[26]);

            $programa_basico->setUsu_nombres(utf8_encode($fila[27]));
            $programa_basico->setUsu_apellidos(utf8_encode($fila[28]));
            $programa_basico->setM_id($fila[29]);
            $programa_basico->setAsig_nombre($fila[30]);
        }
        $this->conexion->desconectar();
        return $programa_basico;
    }

    public function findLikeAtrr($cadena) {
        $this->conexion->conectar();
        $query = "SELECT * FROM programa_basico WHERE  upper(pb_id) LIKE upper('%" . $cadena . "%')  OR  upper(pb_tipo_curso) LIKE upper('%" . $cadena . "%')  OR  upper(pb_carrera) LIKE upper('%" . $cadena . "%')  OR  upper(pb_departamento) LIKE upper('%" . $cadena . "%')  OR  upper(pb_facultad) LIKE upper('%" . $cadena . "%')  OR  upper(pb_nro_creditos) LIKE upper('%" . $cadena . "%')  OR  upper(pb_horas_cronologicas) LIKE upper('%" . $cadena . "%')  OR  upper(pb_horas_pedagogicas) LIKE upper('%" . $cadena . "%')  OR  upper(pb_anio) LIKE upper('%" . $cadena . "%')  OR  upper(pb_semestre) LIKE upper('%" . $cadena . "%')  OR  upper(pb_hrs_presenciales) LIKE upper('%" . $cadena . "%')  OR  upper(pb_ht_presenciales) LIKE upper('%" . $cadena . "%')  OR  upper(pb_hp_presenciales) LIKE upper('%" . $cadena . "%')  OR  upper(pb_hl_presenciales) LIKE upper('%" . $cadena . "%')  OR  upper(pb_hrs_autonomas) LIKE upper('%" . $cadena . "%')  OR  upper(pb_ht_autonomas) LIKE upper('%" . $cadena . "%')  OR  upper(pb_hp_autonomas) LIKE upper('%" . $cadena . "%')  OR  upper(pb_hl_autonomas) LIKE upper('%" . $cadena . "%')  OR  upper(pb_presentacion) LIKE upper('%" . $cadena . "%')  OR  upper(pb_descriptor_competencias) LIKE upper('%" . $cadena . "%')  OR  upper(pb_aprendizajes_previos) LIKE upper('%" . $cadena . "%')  OR  upper(pb_biblio_fundamental) LIKE upper('%" . $cadena . "%')  OR  upper(pb_biblio_complementaria) LIKE upper('%" . $cadena . "%')  OR  upper(asig_codigo) LIKE upper('%" . $cadena . "%')  OR  upper(pb_fecha_modificacion) LIKE upper('%" . $cadena . "%')  OR  upper(usu_rut) LIKE upper('%" . $cadena . "%')  OR  upper(pb_borrador) LIKE upper('%" . $cadena . "%') ";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $programa_basicos = array();
        while ($fila = $result->fetch_row()) {
            $programa_basico = new Programa_basicoDTO();
            $programa_basico->setPb_id($fila[0]);
            $programa_basico->setPb_tipo_curso(utf8_encode($fila[1]));
            $programa_basico->setPb_carrera(utf8_encode($fila[2]));
            $programa_basico->setPb_departamento(utf8_encode($fila[3]));
            $programa_basico->setPb_facultad(utf8_encode($fila[4]));
            $programa_basico->setPb_nro_creditos($fila[5]);
            $programa_basico->setPb_horas_cronologicas($fila[6]);
            $programa_basico->setPb_horas_pedagogicas($fila[7]);
            $programa_basico->setPb_anio($fila[8]);
            $programa_basico->setPb_semestre($fila[9]);
            $programa_basico->setPb_hrs_presenciales($fila[10]);
            $programa_basico->setPb_ht_presenciales($fila[11]);
            $programa_basico->setPb_hp_presenciales($fila[12]);
            $programa_basico->setPb_hl_presenciales($fila[13]);
            $programa_basico->setPb_hrs_autonomas($fila[14]);
            $programa_basico->setPb_ht_autonomas($fila[15]);
            $programa_basico->setPb_hp_autonomas($fila[16]);
            $programa_basico->setPb_hl_autonomas($fila[17]);
            $programa_basico->setPb_presentacion($fila[18]);
            $programa_basico->setPb_descriptor_competencias($fila[19]);
            $programa_basico->setPb_aprendizajes_previos($fila[20]);
            $programa_basico->setPb_biblio_fundamental($fila[21]);
            $programa_basico->setPb_biblio_complementaria($fila[22]);
            $programa_basico->setAsig_codigo($fila[23]);
            $programa_basico->setPb_fecha_modificacion($fila[24]);
            $programa_basico->setUsu_rut($fila[25]);
            $programa_basico->setPb_borrador($fila[26]);
            $programa_basicos[$i] = $programa_basico;
            $i++;
        }
        $this->conexion->desconectar();
        return $programa_basicos;
    }

    public function save($programa_basico) {
        $pb_nro_creditos = $programa_basico->getPb_nro_creditos();
        if ($pb_nro_creditos == "") {
            $pb_nro_creditos = 'null';
        }
        $pb_horas_cronologicas = $programa_basico->getPb_horas_cronologicas();
        if ($pb_horas_cronologicas == "") {
            $pb_horas_cronologicas = 'null';
        }
        $pb_horas_pedagogicas = $programa_basico->getPb_horas_pedagogicas();
        if ($pb_horas_pedagogicas == "") {
            $pb_horas_pedagogicas = 'null';
        }
        $pb_anio = $programa_basico->getPb_anio();
        if ($pb_anio == "") {
            $pb_anio = 'null';
        }
        $pb_semestre = $programa_basico->getPb_semestre();
        if ($pb_semestre == "") {
            $pb_semestre = 'null';
        }
        $pb_hrs_presenciales = $programa_basico->getPb_hrs_presenciales();
        if ($pb_hrs_presenciales == "") {
            $pb_hrs_presenciales = 'null';
        }
        $pb_ht_presenciales = $programa_basico->getPb_ht_presenciales();
        if ($pb_ht_presenciales == "") {
            $pb_ht_presenciales = 'null';
        }
        $pb_hp_presenciales = $programa_basico->getPb_hp_presenciales();
        if ($pb_hp_presenciales == "") {
            $pb_hp_presenciales = 'null';
        }
        $pb_hl_presenciales = $programa_basico->getPb_hl_presenciales();
        if ($pb_hl_presenciales == "") {
            $pb_hl_presenciales = 'null';
        }
        $pb_hrs_autonomas = $programa_basico->getPb_hrs_autonomas();
        if ($pb_hrs_autonomas == "") {
            $pb_hrs_autonomas = 'null';
        }
        $pb_ht_autonomas = $programa_basico->getPb_ht_autonomas();
        if ($pb_ht_autonomas == "") {
            $pb_ht_autonomas = 'null';
        }
        $pb_hp_autonomas = $programa_basico->getPb_hp_autonomas();
        if ($pb_hp_autonomas == "") {
            $pb_hp_autonomas = 'null';
        }
        $pb_hl_autonomas = $programa_basico->getPb_hl_autonomas();
        if ($pb_hl_autonomas == "") {
            $pb_hl_autonomas = 'null';
        }

        $this->conexion->conectar();
        $query = "INSERT INTO programa_basico (pb_tipo_curso,pb_carrera,pb_departamento,pb_facultad,pb_nro_creditos,pb_horas_cronologicas,pb_horas_pedagogicas,pb_anio,pb_semestre,pb_hrs_presenciales,pb_ht_presenciales,pb_hp_presenciales,pb_hl_presenciales,pb_hrs_autonomas,pb_ht_autonomas,pb_hp_autonomas,pb_hl_autonomas,pb_presentacion,pb_descriptor_competencias,pb_aprendizajes_previos,pb_biblio_fundamental,pb_biblio_complementaria,asig_codigo,pb_fecha_modificacion,usu_rut,pb_borrador)"
                . " VALUES ('" . $programa_basico->getPb_tipo_curso() . "' , '" . $programa_basico->getPb_carrera() . "' , '" . $programa_basico->getPb_departamento() . "' , '" . $programa_basico->getPb_facultad() . "' , " . $pb_nro_creditos . " , " . $pb_horas_cronologicas . " , " . $pb_horas_pedagogicas . " , " . $pb_anio . " , " . $pb_semestre . " , " . $pb_hrs_presenciales . " , " . $pb_ht_presenciales . " , " . $pb_hp_presenciales . " , " . $pb_hl_presenciales . " , " . $pb_hrs_autonomas . " ,  " . $pb_ht_autonomas . " ,  " . $pb_hp_autonomas . " ,  " . $pb_hl_autonomas . " , '" . $programa_basico->getPb_presentacion() . "' , '" . $programa_basico->getPb_descriptor_competencias() . "' , '" . $programa_basico->getPb_aprendizajes_previos() . "' , '" . $programa_basico->getPb_biblio_fundamental() . "' , '" . $programa_basico->getPb_biblio_complementaria() . "' ,  " . $programa_basico->getAsig_codigo() . " , now() ,  " . $programa_basico->getUsu_rut() . " ,  " . $programa_basico->getPb_borrador() . " )";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function update($programa_basico) {
        $pb_nro_creditos = $programa_basico->getPb_nro_creditos();
        if ($pb_nro_creditos == "") {
            $pb_nro_creditos = 'null';
        }
        $pb_horas_cronologicas = $programa_basico->getPb_horas_cronologicas();
        if ($pb_horas_cronologicas == "") {
            $pb_horas_cronologicas = 'null';
        }
        $pb_horas_pedagogicas = $programa_basico->getPb_horas_pedagogicas();
        if ($pb_horas_pedagogicas == "") {
            $pb_horas_pedagogicas = 'null';
        }
        $pb_anio = $programa_basico->getPb_anio();
        if ($pb_anio == "") {
            $pb_anio = 'null';
        }
        $pb_semestre = $programa_basico->getPb_semestre();
        if ($pb_semestre == "") {
            $pb_semestre = 'null';
        }
        $pb_hrs_presenciales = $programa_basico->getPb_hrs_presenciales();
        if ($pb_hrs_presenciales == "") {
            $pb_hrs_presenciales = 'null';
        }
        $pb_ht_presenciales = $programa_basico->getPb_ht_presenciales();
        if ($pb_ht_presenciales == "") {
            $pb_ht_presenciales = 'null';
        }
        $pb_hp_presenciales = $programa_basico->getPb_hp_presenciales();
        if ($pb_hp_presenciales == "") {
            $pb_hp_presenciales = 'null';
        }
        $pb_hl_presenciales = $programa_basico->getPb_hl_presenciales();
        if ($pb_hl_presenciales == "") {
            $pb_hl_presenciales = 'null';
        }
        $pb_hrs_autonomas = $programa_basico->getPb_hrs_autonomas();
        if ($pb_hrs_autonomas == "") {
            $pb_hrs_autonomas = 'null';
        }
        $pb_ht_autonomas = $programa_basico->getPb_ht_autonomas();
        if ($pb_ht_autonomas == "") {
            $pb_ht_autonomas = 'null';
        }
        $pb_hp_autonomas = $programa_basico->getPb_hp_autonomas();
        if ($pb_hp_autonomas == "") {
            $pb_hp_autonomas = 'null';
        }
        $pb_hl_autonomas = $programa_basico->getPb_hl_autonomas();
        if ($pb_hl_autonomas == "") {
            $pb_hl_autonomas = 'null';
        }

        $this->conexion->conectar();
        $query = "UPDATE programa_basico SET "
                . "  pb_tipo_curso = '" . $programa_basico->getPb_tipo_curso() . "' ,"
                . "  pb_carrera = '" . $programa_basico->getPb_carrera() . "' ,"
                . "  pb_departamento = '" . $programa_basico->getPb_departamento() . "' ,"
                . "  pb_facultad = '" . $programa_basico->getPb_facultad() . "' ,"
                . "  pb_nro_creditos =  " . $pb_nro_creditos . " ,"
                . "  pb_horas_cronologicas =  " . $pb_horas_cronologicas . " ,"
                . "  pb_horas_pedagogicas =  " . $pb_horas_pedagogicas . " ,"
                . "  pb_anio =  " . $pb_anio . " ,"
                . "  pb_semestre =  " . $pb_semestre . " ,"
                . "  pb_hrs_presenciales =  " . $pb_hrs_presenciales . " ,"
                . "  pb_ht_presenciales =  " . $pb_ht_presenciales . " ,"
                . "  pb_hp_presenciales =  " . $pb_hp_presenciales . " ,"
                . "  pb_hl_presenciales =  " . $pb_hl_presenciales . " ,"
                . "  pb_hrs_autonomas =  " . $pb_hrs_autonomas . " ,"
                . "  pb_ht_autonomas =  " . $pb_ht_autonomas . " ,"
                . "  pb_hp_autonomas =  " . $pb_hp_autonomas . " ,"
                . "  pb_hl_autonomas =  " . $pb_hl_autonomas . " ,"
                . "  pb_presentacion = '" . $programa_basico->getPb_presentacion() . "' ,"
                . "  pb_descriptor_competencias = '" . $programa_basico->getPb_descriptor_competencias() . "' ,"
                . "  pb_aprendizajes_previos = '" . $programa_basico->getPb_aprendizajes_previos() . "' ,"
                . "  pb_biblio_fundamental = '" . $programa_basico->getPb_biblio_fundamental() . "' ,"
                . "  pb_biblio_complementaria = '" . $programa_basico->getPb_biblio_complementaria() . "' ,"
                . "  asig_codigo =  " . $programa_basico->getAsig_codigo() . " ,"
                . "  pb_fecha_modificacion = now() ,"
                . "  usu_rut =  " . $programa_basico->getUsu_rut() . " ,"
                . "  pb_borrador =  " . $programa_basico->getPb_borrador() . " "
                . " WHERE  pb_id =  " . $programa_basico->getPb_id() . " ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

}
