<?php
class MallaDTO {
    public $m_id;
    public $m_fechaModificacion;
    public $m_fechaInicio;
    public $m_fechaFin;
    public $m_cantidadSemestres;

    public function MallaDTO(){
    }

    function getM_id() {
        return $this->m_id;
    }

    function setM_id($m_id) {
        return $this->m_id = $m_id;
    }

    function getM_fechaModificacion() {
        return $this->m_fechaModificacion;
    }

    function setM_fechaModificacion($m_fechaModificacion) {
        return $this->m_fechaModificacion = $m_fechaModificacion;
    }

    function getM_fechaInicio() {
        return $this->m_fechaInicio;
    }

    function setM_fechaInicio($m_fechaInicio) {
        return $this->m_fechaInicio = $m_fechaInicio;
    }

    function getM_fechaFin() {
        return $this->m_fechaFin;
    }

    function setM_fechaFin($m_fechaFin) {
        return $this->m_fechaFin = $m_fechaFin;
    }

    function getM_cantidadSemestres() {
        return $this->m_cantidadSemestres;
    }

    function setM_cantidadSemestres($m_cantidadSemestres) {
        $this->m_cantidadSemestres = $m_cantidadSemestres;
    }
}