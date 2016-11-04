<?php
class Permiso_usuarioDTO {
    public $usu_rut;
    public $per_id;

    public function Permiso_usuarioDTO(){
    }

    function getUsu_rut() {
        return $this->usu_rut;
    }

    function setUsu_rut($usu_rut) {
        return $this->usu_rut = $usu_rut;
    }

    function getPer_id() {
        return $this->per_id;
    }

    function setPer_id($per_id) {
        return $this->per_id = $per_id;
    }

}