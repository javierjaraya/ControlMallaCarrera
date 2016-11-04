<?php
class PrerrequisitoDTO {
    public $pre_id;
    public $asig_codigo;
    public $asig_codigo_prerrequisito;

    public function PrerrequisitoDTO(){
    }

    function getPre_id() {
        return $this->pre_id;
    }

    function setPre_id($pre_id) {
        return $this->pre_id = $pre_id;
    }

    function getAsig_codigo() {
        return $this->asig_codigo;
    }

    function setAsig_codigo($asig_codigo) {
        return $this->asig_codigo = $asig_codigo;
    }

    function getAsig_codigo_prerrequisito() {
        return $this->asig_codigo_prerrequisito;
    }

    function setAsig_codigo_prerrequisito($asig_codigo_prerrequisito) {
        return $this->asig_codigo_prerrequisito = $asig_codigo_prerrequisito;
    }

}