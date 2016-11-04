<?php
class DocenteDTO {
    public $doc_id;
    public $usu_rut;
    public $asig_codigo;

    public function DocenteDTO(){
    }

    function getDoc_id() {
        return $this->doc_id;
    }

    function setDoc_id($doc_id) {
        return $this->doc_id = $doc_id;
    }

    function getUsu_rut() {
        return $this->usu_rut;
    }

    function setUsu_rut($usu_rut) {
        return $this->usu_rut = $usu_rut;
    }

    function getAsig_codigo() {
        return $this->asig_codigo;
    }

    function setAsig_codigo($asig_codigo) {
        return $this->asig_codigo = $asig_codigo;
    }

}