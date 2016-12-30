<?php
include_once 'Nucleo/ConexionMySQL.php';
include_once '../../Modelo/UsuarioDTO.php';

class UsuarioDAO{
    private $conexion;

    public function UsuarioDAO() {
        $this->conexion = new ConexionMySQL();
    }

    public function delete($usu_rut) {
        $this->conexion->conectar();
        $query = "DELETE FROM usuario WHERE  usu_rut =  ".$usu_rut." ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function findAll() {
        $this->conexion->conectar();
        $query = "SELECT U.usu_rut, U.usu_nombres, U.usu_apellidos, U.usu_email, U.usu_password, U.usu_docente, P.per_id, P.per_nombre FROM usuario U LEFT JOIN permiso_usuario PU ON U.usu_rut = PU.usu_rut LEFT JOIN perfil P ON P.per_id = PU.per_id";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $usuarios = array();
        while ($fila = $result->fetch_row()) {
            $usuario = new UsuarioDTO();
            $usuario->setUsu_rut($fila[0]);
            $usuario->setUsu_nombres(utf8_decode($fila[1]));
            $usuario->setUsu_apellidos(utf8_decode($fila[2]));
            $usuario->setUsu_email($fila[3]);
            $usuario->setUsu_password($fila[4]);
            $usuario->setUsu_docente($fila[5]);
            $usuario->setPer_id($fila[6]);
            $usuario->setPer_nombre($fila[7]);
            $usuarios[$i] = $usuario;
            $i++;
        }
        $this->conexion->desconectar();
        return $usuarios;
    }

    public function findByID($usu_rut) {
        $this->conexion->conectar();
        $query = "SELECT U.usu_rut, U.usu_nombres, U.usu_apellidos, U.usu_email, U.usu_password, U.usu_docente, P.per_id, P.per_nombre FROM usuario U LEFT JOIN permiso_usuario PU ON U.usu_rut = PU.usu_rut LEFT JOIN perfil P ON P.per_id = PU.per_id WHERE  U.usu_rut =  ".$usu_rut." ";
        $result = $this->conexion->ejecutar($query);
        $usuario = new UsuarioDTO();
        while ($fila = $result->fetch_row()) {
            $usuario->setUsu_rut($fila[0]);
            $usuario->setUsu_nombres(utf8_decode($fila[1]));
            $usuario->setUsu_apellidos(utf8_decode($fila[2]));
            $usuario->setUsu_email($fila[3]);
            $usuario->setUsu_password($fila[4]);
            $usuario->setUsu_docente($fila[5]);
            $usuario->setPer_id($fila[6]);
            $usuario->setPer_nombre($fila[7]);
        }
        $this->conexion->desconectar();
        return $usuario;
    }

    public function findLikeAtrr($cadena) {
        $this->conexion->conectar();
        $query = "SELECT U.usu_rut, U.usu_nombres, U.usu_apellidos, U.usu_email, U.usu_password, U.usu_docente, P.per_id, P.per_nombre FROM usuario U LEFT JOIN permiso_usuario PU ON U.usu_rut = PU.usu_rut LEFT JOIN perfil P ON P.per_id = PU.per_id WHERE  upper(U.usu_rut) LIKE upper(".$cadena.")  OR  upper(U.usu_nombres) LIKE upper('".$cadena."')  OR  upper(U.usu_apellidos) LIKE upper('".$cadena."')  OR  upper(U.usu_email) LIKE upper('".$cadena."')  OR  upper(U.usu_password) LIKE upper('".$cadena."')  OR  upper(U.usu_docente) LIKE upper(".$cadena.") ";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $usuarios = array();
        while ($fila = $result->fetch_row()) {
            $usuario = new UsuarioDTO();
            $usuario->setUsu_rut($fila[0]);
            $usuario->setUsu_nombres(utf8_decode($fila[1]));
            $usuario->setUsu_apellidos(utf8_decode($fila[2]));
            $usuario->setUsu_email($fila[3]);
            $usuario->setUsu_password($fila[4]);
            $usuario->setUsu_docente($fila[5]);
            $usuario->setPer_id($fila[6]);
            $usuario->setPer_nombre($fila[7]);
            $usuarios[$i] = $usuario;
            $i++;
        }
        $this->conexion->desconectar();
        return $usuarios;
    }

    public function save($usuario) {
        $this->conexion->conectar();
        $query = "INSERT INTO usuario (usu_rut,usu_nombres,usu_apellidos,usu_email,usu_password,usu_docente)"
                . " VALUES ( ".$usuario->getUsu_rut()." , '".$usuario->getUsu_nombres()."' , '".$usuario->getUsu_apellidos()."' , '".$usuario->getUsu_email()."' , '".$usuario->getUsu_password()."' , ".$usuario->getUsu_docente()." )";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function update($usuario) {
        $this->conexion->conectar();
        $query = "UPDATE usuario SET "
                . "  usu_nombres = '".$usuario->getUsu_nombres()."' ,"
                . "  usu_apellidos = '".$usuario->getUsu_apellidos()."' ,"
                . "  usu_email = '".$usuario->getUsu_email()."' ,"
                . "  usu_password = '".$usuario->getUsu_password()."' ,"
                . "  usu_docente = ".$usuario->getUsu_docente()." "
                . " WHERE  usu_rut =  ".$usuario->getUsu_rut()." ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }
}