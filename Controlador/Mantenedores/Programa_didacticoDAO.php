<?php

include_once 'Nucleo/ConexionMySQL.php';
include_once '../../Modelo/Programa_didacticoDTO.php';

class Programa_didacticoDAO {

    private $conexion;

    public function Programa_didacticoDAO() {
        $this->conexion = new ConexionMySQL();
    }

    public function getId_disponible() {
        $this->conexion->conectar();
        $query = "SELECT (max(pd_id)+1) as id FROM programa_didactico";
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

    public function delete($pd_id) {
        $this->conexion->conectar();
        $query = "DELETE FROM programa_didactico WHERE  pd_id =  " . $pd_id . " ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function findAll() {
        $this->conexion->conectar();
        $query = "SELECT * FROM programa_didactico";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $programa_didacticos = array();
        while ($fila = $result->fetch_row()) {
            $programa_didactico = new Programa_didacticoDTO();
            $programa_didactico->setPd_id($fila[0]);
            $programa_didactico->setPe_id($fila[1]);
            $programa_didactico->setPd_fecha_modificacion($fila[2]);
            $programa_didactico->setUsu_rut($fila[3]);
            $programa_didactico->setPd_borrador($fila[4]);
            $programa_didacticos[$i] = $programa_didactico;
            $i++;
        }
        $this->conexion->desconectar();
        return $programa_didacticos;
    }

    public function findByID($pd_id) {
        $this->conexion->conectar();
        $query = "SELECT * FROM programa_didactico WHERE  pd_id =  " . $pd_id . " ";
        $result = $this->conexion->ejecutar($query);
        $programa_didactico = new Programa_didacticoDTO();
        while ($fila = $result->fetch_row()) {
            $programa_didactico->setPd_id($fila[0]);
            $programa_didactico->setPe_id($fila[1]);
            $programa_didactico->setPd_fecha_modificacion($fila[2]);
            $programa_didactico->setUsu_rut($fila[3]);
            $programa_didactico->setPd_borrador($fila[4]);
        }
        $this->conexion->desconectar();
        return $programa_didactico;
    }

    public function findByPE_ID($pe_id) {
        $this->conexion->conectar();
        $query = "SELECT * FROM programa_didactico pd JOIN programa_extenso pe ON pd.pe_id = pe.pe_id JOIN asignatura a ON pe.asig_codigo = a.asig_codigo JOIN usuario u ON pe.usu_rut = u.usu_rut WHERE pe.pe_id = " . $pe_id . " ";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $programa_didacticos = array();
        while ($fila = $result->fetch_row()) {
            $programa_didactico = new Programa_didacticoDTO();
            $programa_didactico->setPd_id($fila[0]);
            $programa_didactico->setPe_id($fila[1]);
            $programa_didactico->setPd_fecha_modificacion($fila[2]);
            $programa_didactico->setUsu_rut($fila[3]);
            $programa_didactico->setPd_borrador($fila[4]);

            $programa_extenso = new Programa_extensoDTO();
            $programa_extenso->setPe_id($fila[5]);
            $programa_extenso->setPe_tipo_curso($fila[6]);
            $programa_extenso->setPe_carrera($fila[7]);
            $programa_extenso->setPe_departamento($fila[8]);
            $programa_extenso->setPe_facultad($fila[9]);
            $programa_extenso->setPe_nro_creditos($fila[10]);
            $programa_extenso->setPe_horas_cronologicas($fila[11]);
            $programa_extenso->setPe_horas_pedagogicas($fila[12]);
            $programa_extenso->setPe_anio($fila[13]);
            $programa_extenso->setPe_semestre($fila[14]);
            $programa_extenso->setPe_hrs_presenciales($fila[15]);
            $programa_extenso->setPe_ht_presenciales($fila[16]);
            $programa_extenso->setPe_hp_presenciales($fila[17]);
            $programa_extenso->setPe_hl_presenciales($fila[18]);
            $programa_extenso->setPe_hrs_autonomas($fila[19]);
            $programa_extenso->setPe_ht_autonomas($fila[20]);
            $programa_extenso->setPe_hp_autonomas($fila[21]);
            $programa_extenso->setPe_hl_autonomas($fila[22]);
            $programa_extenso->setPe_presentacion($fila[23]);
            $programa_extenso->setPe_descriptor_competencias($fila[24]);
            $programa_extenso->setPe_aprendizajes_previos($fila[25]);
            $programa_extenso->setPe_fecha_inicio($fila[26]);
            $programa_extenso->setPe_fecha_fin($fila[27]);
            $programa_extenso->setPe_observacion($fila[28]);
            $programa_extenso->setPe_biblio_fundamental($fila[29]);
            $programa_extenso->setPe_biblio_complementaria($fila[30]);
            $programa_extenso->setAsig_codigo($fila[31]);
            $programa_extenso->setPe_fecha_modificacion($fila[32]);
            $programa_extenso->setUsu_rut($fila[33]);
            $programa_extenso->setPe_borrador($fila[34]);
            $programa_extenso->setPe_sistema_evaluacion($fila[35]);

            $asignatura = new AsignaturaDTO();
            $asignatura->setAsig_codigo($fila[36]);
            $asignatura->setAsig_nombre($fila[37]);
            $asignatura->setAsig_periodo($fila[38]);
            $asignatura->setAsig_creditos($fila[39]);
            $asignatura->setM_id($fila[40]);
            $asignatura->setTa_id($fila[41]);

            $autor = utf8_encode($fila[43]) . " " . utf8_encode($fila[44]);

            $programa_didactico->setPrograma_extenso($programa_extenso);
            $programa_didactico->setAsignatura($asignatura);
            $programa_didactico->setAutor($autor);

            $programa_didacticos[$i] = $programa_didactico;
            $i++;
        }
        $this->conexion->desconectar();
        return $programa_didacticos;
    }

    public function findByPE_ID_AND_ESTADO($pe_id, $estado) {
        $this->conexion->conectar();
        $query = "SELECT * FROM programa_didactico pd JOIN programa_extenso pe ON pd.pe_id = pe.pe_id JOIN asignatura a ON pe.asig_codigo = a.asig_codigo JOIN usuario u ON pe.usu_rut = u.usu_rut WHERE pe.pe_id = " . $pe_id . " AND pd.pd_borrador = ".$estado;
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $programa_didacticos = array();
        while ($fila = $result->fetch_row()) {
            $programa_didactico = new Programa_didacticoDTO();
            $programa_didactico->setPd_id($fila[0]);
            $programa_didactico->setPe_id($fila[1]);
            $programa_didactico->setPd_fecha_modificacion($fila[2]);
            $programa_didactico->setUsu_rut($fila[3]);
            $programa_didactico->setPd_borrador($fila[4]);

            $programa_extenso = new Programa_extensoDTO();
            $programa_extenso->setPe_id($fila[5]);
            $programa_extenso->setPe_tipo_curso($fila[6]);
            $programa_extenso->setPe_carrera($fila[7]);
            $programa_extenso->setPe_departamento($fila[8]);
            $programa_extenso->setPe_facultad($fila[9]);
            $programa_extenso->setPe_nro_creditos($fila[10]);
            $programa_extenso->setPe_horas_cronologicas($fila[11]);
            $programa_extenso->setPe_horas_pedagogicas($fila[12]);
            $programa_extenso->setPe_anio($fila[13]);
            $programa_extenso->setPe_semestre($fila[14]);
            $programa_extenso->setPe_hrs_presenciales($fila[15]);
            $programa_extenso->setPe_ht_presenciales($fila[16]);
            $programa_extenso->setPe_hp_presenciales($fila[17]);
            $programa_extenso->setPe_hl_presenciales($fila[18]);
            $programa_extenso->setPe_hrs_autonomas($fila[19]);
            $programa_extenso->setPe_ht_autonomas($fila[20]);
            $programa_extenso->setPe_hp_autonomas($fila[21]);
            $programa_extenso->setPe_hl_autonomas($fila[22]);
            $programa_extenso->setPe_presentacion($fila[23]);
            $programa_extenso->setPe_descriptor_competencias($fila[24]);
            $programa_extenso->setPe_aprendizajes_previos($fila[25]);
            $programa_extenso->setPe_fecha_inicio($fila[26]);
            $programa_extenso->setPe_fecha_fin($fila[27]);
            $programa_extenso->setPe_observacion($fila[28]);
            $programa_extenso->setPe_biblio_fundamental($fila[29]);
            $programa_extenso->setPe_biblio_complementaria($fila[30]);
            $programa_extenso->setAsig_codigo($fila[31]);
            $programa_extenso->setPe_fecha_modificacion($fila[32]);
            $programa_extenso->setUsu_rut($fila[33]);
            $programa_extenso->setPe_borrador($fila[34]);
            $programa_extenso->setPe_sistema_evaluacion($fila[35]);

            $asignatura = new AsignaturaDTO();
            $asignatura->setAsig_codigo($fila[36]);
            $asignatura->setAsig_nombre($fila[37]);
            $asignatura->setAsig_periodo($fila[38]);
            $asignatura->setAsig_creditos($fila[39]);
            $asignatura->setM_id($fila[40]);
            $asignatura->setTa_id($fila[41]);

            $autor = utf8_encode($fila[43]) . " " . utf8_encode($fila[44]);

            $programa_didactico->setPrograma_extenso($programa_extenso);
            $programa_didactico->setAsignatura($asignatura);
            $programa_didactico->setAutor($autor);

            $programa_didacticos[$i] = $programa_didactico;
            $i++;
        }
        $this->conexion->desconectar();
        return $programa_didacticos;
    }

    public function find_version_final_ByAsig_Codigo($asig_codigo) {
        $this->conexion->conectar();
        $query = "SELECT * FROM programa_didactico pd JOIN programa_extenso pe ON pd.pe_id = pe.pe_id JOIN asignatura a ON pe.asig_codigo = a.asig_codigo  JOIN usuario u ON pe.usu_rut = u.usu_rut WHERE a.asig_codigo  = " . $asig_codigo . " ORDER BY pd.pd_id DESC LIMIT 0,1";
        $result = $this->conexion->ejecutar($query);
        $programa_didactico = null;
        while ($fila = $result->fetch_row()) {
            $programa_didactico = new Programa_didacticoDTO();
            $programa_didactico->setPd_id($fila[0]);
            $programa_didactico->setPe_id($fila[1]);
            $programa_didactico->setPd_fecha_modificacion($fila[2]);
            $programa_didactico->setUsu_rut($fila[3]);
            $programa_didactico->setPd_borrador($fila[4]);

            $programa_extenso = new Programa_extensoDTO();
            $programa_extenso->setPe_id($fila[5]);
            $programa_extenso->setPe_tipo_curso($fila[6]);
            $programa_extenso->setPe_carrera($fila[7]);
            $programa_extenso->setPe_departamento($fila[8]);
            $programa_extenso->setPe_facultad($fila[9]);
            $programa_extenso->setPe_nro_creditos($fila[10]);
            $programa_extenso->setPe_horas_cronologicas($fila[11]);
            $programa_extenso->setPe_horas_pedagogicas($fila[12]);
            $programa_extenso->setPe_anio($fila[13]);
            $programa_extenso->setPe_semestre($fila[14]);
            $programa_extenso->setPe_hrs_presenciales($fila[15]);
            $programa_extenso->setPe_ht_presenciales($fila[16]);
            $programa_extenso->setPe_hp_presenciales($fila[17]);
            $programa_extenso->setPe_hl_presenciales($fila[18]);
            $programa_extenso->setPe_hrs_autonomas($fila[19]);
            $programa_extenso->setPe_ht_autonomas($fila[20]);
            $programa_extenso->setPe_hp_autonomas($fila[21]);
            $programa_extenso->setPe_hl_autonomas($fila[22]);
            $programa_extenso->setPe_presentacion($fila[23]);
            $programa_extenso->setPe_descriptor_competencias($fila[24]);
            $programa_extenso->setPe_aprendizajes_previos($fila[25]);
            $programa_extenso->setPe_fecha_inicio($fila[26]);
            $programa_extenso->setPe_fecha_fin($fila[27]);
            $programa_extenso->setPe_observacion($fila[28]);
            $programa_extenso->setPe_biblio_fundamental($fila[29]);
            $programa_extenso->setPe_biblio_complementaria($fila[30]);
            $programa_extenso->setAsig_codigo($fila[31]);
            $programa_extenso->setPe_fecha_modificacion($fila[32]);
            $programa_extenso->setUsu_rut($fila[33]);
            $programa_extenso->setPe_borrador($fila[34]);
            $programa_extenso->setPe_sistema_evaluacion($fila[35]);

            $asignatura = new AsignaturaDTO();
            $asignatura->setAsig_codigo($fila[36]);
            $asignatura->setAsig_nombre($fila[37]);
            $asignatura->setAsig_periodo($fila[38]);
            $asignatura->setAsig_creditos($fila[39]);
            $asignatura->setM_id($fila[40]);
            $asignatura->setTa_id($fila[41]);

            $autor = utf8_encode($fila[43]) . " " . utf8_encode($fila[44]);

            $programa_didactico->setPrograma_extenso($programa_extenso);
            $programa_didactico->setAsignatura($asignatura);
            $programa_didactico->setAutor($autor);
        }
        $this->conexion->desconectar();
        return $programa_didactico;
    }

    public function findLikeAtrr($cadena) {
        $this->conexion->conectar();
        $query = "SELECT * FROM programa_didactico WHERE  upper(pd_id) LIKE upper('%" . $cadena . "%')  OR  upper(pe_id) LIKE upper('%" . $cadena . "%')  OR  upper(pd_fecha_modificacion) LIKE upper('%" . $cadena . "%')  OR  upper(usu_rut) LIKE upper('%" . $cadena . "%')  OR  upper(pd_borrador) LIKE upper('%" . $cadena . "%') ";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $programa_didacticos = array();
        while ($fila = $result->fetch_row()) {
            $programa_didactico = new Programa_didacticoDTO();
            $programa_didactico->setPd_id($fila[0]);
            $programa_didactico->setPe_id($fila[1]);
            $programa_didactico->setPd_fecha_modificacion($fila[2]);
            $programa_didactico->setUsu_rut($fila[3]);
            $programa_didactico->setPd_borrador($fila[4]);
            $programa_didacticos[$i] = $programa_didactico;
            $i++;
        }
        $this->conexion->desconectar();
        return $programa_didacticos;
    }

    public function save($programa_didactico) {
        $this->conexion->conectar();
        $query = "INSERT INTO programa_didactico (pd_id,pe_id,pd_fecha_modificacion,usu_rut,pd_borrador)"
                . " VALUES ( " . $programa_didactico->getPd_id() . " ,  " . $programa_didactico->getPe_id() . " , now() ,  " . $programa_didactico->getUsu_rut() . " ,  " . $programa_didactico->getPd_borrador() . " )";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function update($programa_didactico) {
        $this->conexion->conectar();
        $query = "UPDATE programa_didactico SET "
                . "  pe_id =  " . $programa_didactico->getPe_id() . " ,"
                . "  pd_fecha_modificacion = " . $programa_didactico->getPd_fecha_modificacion() . " ,"
                . "  usu_rut =  " . $programa_didactico->getUsu_rut() . " ,"
                . "  pd_borrador =  " . $programa_didactico->getPd_borrador() . " "
                . " WHERE  pd_id =  " . $programa_didactico->getPd_id() . " ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

}
