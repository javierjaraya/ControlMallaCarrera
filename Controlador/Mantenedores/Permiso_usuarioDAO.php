<?php
include_once 'Nucleo/ConexionMySQL.php';
include_once '../../Modelo/Permiso_usuarioDTO.php';

class Permiso_usuarioDAO{
    private $conexion;

    public function Permiso_usuarioDAO() {
        $this->conexion = new ConexionMySQL();
    }

    public function delete($usu_rut) {
        $this->conexion->conectar();
        $query = "DELETE FROM permiso_usuario WHERE  usu_rut =  ".$usu_rut." ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function findAll() {
        $this->conexion->conectar();
        $query = "SELECT * FROM permiso_usuario";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $permiso_usuarios = array();
        while ($fila = $result->fetch_row()) {
            $permiso_usuario = new Permiso_usuarioDTO();
            $permiso_usuario->setUsu_rut($fila[0]);
            $permiso_usuario->setPer_id($fila[1]);
            $permiso_usuarios[$i] = $permiso_usuario;
            $i++;
        }
        $this->conexion->desconectar();
        return $permiso_usuarios;
    }

    public function findByID($usu_rut) {
        $this->conexion->conectar();
        $query = "SELECT * FROM permiso_usuario WHERE  usu_rut =  ".$usu_rut." ";
        $result = $this->conexion->ejecutar($query);
        $permiso_usuario = new Permiso_usuarioDTO();
        while ($fila = $result->fetch_row()) {
            $permiso_usuario->setUsu_rut($fila[0]);
            $permiso_usuario->setPer_id($fila[1]);
        }
        $this->conexion->desconectar();
        return $permiso_usuario;
    }

    public function findLikeAtrr($cadena) {
        $this->conexion->conectar();
        $query = "SELECT * FROM permiso_usuario WHERE  upper(usu_rut) LIKE upper(".$cadena.")  OR  upper(per_id) LIKE upper(".$cadena.") ";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $permiso_usuarios = array();
        while ($fila = $result->fetch_row()) {
            $permiso_usuario = new Permiso_usuarioDTO();
            $permiso_usuario->setUsu_rut($fila[0]);
            $permiso_usuario->setPer_id($fila[1]);
            $permiso_usuarios[$i] = $permiso_usuario;
            $i++;
        }
        $this->conexion->desconectar();
        return $permiso_usuarios;
    }

    public function save($permiso_usuario) {
        $this->conexion->conectar();
        $query = "INSERT INTO permiso_usuario (usu_rut,per_id)"
                . " VALUES ( ".$permiso_usuario->getUsu_rut()." ,  ".$permiso_usuario->getPer_id()." )";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function update($permiso_usuario) {
        $this->conexion->conectar();
        $query = "UPDATE permiso_usuario SET "
                . "  per_id =  ".$permiso_usuario->getPer_id()." "
                . " WHERE  usu_rut =  ".$permiso_usuario->getUsu_rut()." ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }
}