<?php

include_once 'Nucleo/ConexionMySQL.php';
include_once '../../Modelo/PerfilDTO.php';

class PerfilDAO {

    private $conexion;

    public function PerfilDAO() {
        $this->conexion = new ConexionMySQL();
    }

    public function delete($per_id) {
        $this->conexion->conectar();
        $query = "DELETE FROM perfil WHERE  per_id =  " . $per_id . " ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function findAll() {
        $this->conexion->conectar();
        $query = "SELECT * FROM perfil";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $perfils = array();
        while ($fila = $result->fetch_row()) {
            $perfil = new PerfilDTO();
            $perfil->setPer_id($fila[0]);
            $perfil->setPer_nombre($fila[1]);
            $perfils[$i] = $perfil;
            $i++;
        }
        $this->conexion->desconectar();
        return $perfils;
    }

    public function findByID($per_id) {
        $this->conexion->conectar();
        $query = "SELECT * FROM perfil WHERE  per_id =  " . $per_id . " ";
        $result = $this->conexion->ejecutar($query);
        $perfil = new PerfilDTO();
        if ($result) {
            while ($fila = $result->fetch_row()) {
                $perfil->setPer_id($fila[0]);
                $perfil->setPer_nombre($fila[1]);
            }
        }
        $this->conexion->desconectar();
        return $perfil;
    }

    public function findLikeAtrr($cadena) {
        $this->conexion->conectar();
        $query = "SELECT * FROM perfil WHERE  upper(per_id) LIKE upper(" . $cadena . ")  OR  upper(per_nombre) LIKE upper('" . $cadena . "') ";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $perfils = array();
        while ($fila = $result->fetch_row()) {
            $perfil = new PerfilDTO();
            $perfil->setPer_id($fila[0]);
            $perfil->setPer_nombre($fila[1]);
            $perfils[$i] = $perfil;
            $i++;
        }
        $this->conexion->desconectar();
        return $perfils;
    }

    public function save($perfil) {
        $this->conexion->conectar();
        $query = "INSERT INTO perfil (per_id,per_nombre)"
                . " VALUES ( " . $perfil->getPer_id() . " , '" . $perfil->getPer_nombre() . "' )";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function update($perfil) {
        $this->conexion->conectar();
        $query = "UPDATE perfil SET "
                . "  per_nombre = '" . $perfil->getPer_nombre() . "' "
                . " WHERE  per_id =  " . $perfil->getPer_id() . " ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

}
