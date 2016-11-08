<?php
class Grupo_electivoDTO {
    public $ge_codigo;
    public $ge_nombre;
    public $ge_periodo;
    public $ge_creditos;
    public $m_id;
    public $ta_id;

    public function Grupo_electivoDTO(){
    }

    function getGe_codigo() {
        return $this->ge_codigo;
    }

    function setGe_codigo($ge_codigo) {
        return $this->ge_codigo = $ge_codigo;
    }

    function getGe_nombre() {
        return $this->ge_nombre;
    }

    function setGe_nombre($ge_nombre) {
        return $this->ge_nombre = $ge_nombre;
    }

    function getGe_periodo() {
        return $this->ge_periodo;
    }

    function setGe_periodo($ge_periodo) {
        return $this->ge_periodo = $ge_periodo;
    }

    function getGe_creditos() {
        return $this->ge_creditos;
    }

    function setGe_creditos($ge_creditos) {
        return $this->ge_creditos = $ge_creditos;
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
        $this->ta_id = $ta_id;
    }
}