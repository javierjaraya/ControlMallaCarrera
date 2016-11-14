<?php
class AsignaturaDTO {
    public $asig_codigo;
    public $asig_nombre;
    public $asig_periodo;
    public $asig_creditos;
    public $m_id;
    public $ta_id;
    
    public $ta_nombre;

    public function AsignaturaDTO(){
    }

    function getAsig_codigo() {
        return $this->asig_codigo;
    }

    function setAsig_codigo($asig_codigo) {
        return $this->asig_codigo = $asig_codigo;
    }

    function getAsig_nombre() {
        return $this->asig_nombre;
    }

    function setAsig_nombre($asig_nombre) {
        return $this->asig_nombre = $asig_nombre;
    }

    function getAsig_periodo() {
        return $this->asig_periodo;
    }

    function setAsig_periodo($asig_periodo) {
        $this->asig_periodo = $asig_periodo;
    }
    
    function getAsig_creditos() {
        return $this->asig_creditos;
    }

    function setAsig_creditos($asig_creditos) {
        $this->asig_creditos = $asig_creditos;
    }
   
    function getM_id() {
        return $this->m_id;
    }

    function setM_id($m_id) {
        return $this->m_id = $m_id;
    }

    function getTa_id() {
        return $this->ta_id;
    }

    function setTa_id($ta_id) {
        return $this->ta_id = $ta_id;
    }
    
    function getTa_nombre() {
        return $this->ta_nombre;
    }

    function setTa_nombre($ta_nombre) {
        $this->ta_nombre = $ta_nombre;
    }
}