<?php
class UsuarioDTO {
    public $usu_rut;
    public $usu_nombres;
    public $usu_apellidos;
    public $usu_email;
    public $usu_password;
    public $usu_docente;
    
    public $per_id;
    public $per_nombre;

    public function UsuarioDTO(){
    }

    function getUsu_rut() {
        return $this->usu_rut;
    }

    function setUsu_rut($usu_rut) {
        return $this->usu_rut = $usu_rut;
    }

    function getUsu_nombres() {
        return $this->usu_nombres;
    }

    function setUsu_nombres($usu_nombres) {
        return $this->usu_nombres = $usu_nombres;
    }

    function getUsu_apellidos() {
        return $this->usu_apellidos;
    }

    function setUsu_apellidos($usu_apellidos) {
        return $this->usu_apellidos = $usu_apellidos;
    }

    function getUsu_email() {
        return $this->usu_email;
    }

    function setUsu_email($usu_email) {
        return $this->usu_email = $usu_email;
    }

    function getUsu_password() {
        return $this->usu_password;
    }

    function setUsu_password($usu_password) {
        return $this->usu_password = $usu_password;
    }

    function getUsu_docente() {
        return $this->usu_docente;
    }

    function setUsu_docente($usu_docente) {
        return $this->usu_docente = $usu_docente;
    }
    
    function getPer_id() {
        return $this->per_id;
    }

    function getPer_nombre() {
        return $this->per_nombre;
    }

    function setPer_id($per_id) {
        $this->per_id = $per_id;
    }

    function setPer_nombre($per_nombre) {
        $this->per_nombre = $per_nombre;
    }
}