<?php
include_once 'Nucleo/ConexionMySQL.php';
include_once '../../Modelo/Programa_didacticoDTO.php';

class Programa_didacticoDAO{
    private $conexion;

    public function Programa_didacticoDAO() {
        $this->conexion = new ConexionMySQL();
    }

    public function delete($pd_id) {
        $this->conexion->conectar();
        $query = "DELETE FROM programa_didactico WHERE  pd_id =  ".$pd_id." ";
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
        $query = "SELECT * FROM programa_didactico WHERE  pd_id =  ".$pd_id." ";
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

    public function findLikeAtrr($cadena) {
        $this->conexion->conectar();
        $query = "SELECT * FROM programa_didactico WHERE  upper(pd_id) LIKE upper('%".$cadena."%')  OR  upper(pe_id) LIKE upper('%".$cadena."%')  OR  upper(pd_fecha_modificacion) LIKE upper('%".$cadena."%')  OR  upper(usu_rut) LIKE upper('%".$cadena."%')  OR  upper(pd_borrador) LIKE upper('%".$cadena."%') ";
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
                . " VALUES ( ".$programa_didactico->getPd_id()." ,  ".$programa_didactico->getPe_id()." , ".$programa_didactico->getPd_fecha_modificacion()." ,  ".$programa_didactico->getUsu_rut()." ,  ".$programa_didactico->getPd_borrador()." )";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function update($programa_didactico) {
        $this->conexion->conectar();
        $query = "UPDATE programa_didactico SET "
                . "  pe_id =  ".$programa_didactico->getPe_id()." ,"
                . "  pd_fecha_modificacion = ".$programa_didactico->getPd_fecha_modificacion()." ,"
                . "  usu_rut =  ".$programa_didactico->getUsu_rut()." ,"
                . "  pd_borrador =  ".$programa_didactico->getPd_borrador()." "
                . " WHERE  pd_id =  ".$programa_didactico->getPd_id()." ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }
}