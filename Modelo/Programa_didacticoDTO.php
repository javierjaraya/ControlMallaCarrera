<?php
class Programa_didacticoDTO {
    public $pd_id;
    public $pe_id;
    public $pd_fecha_modificacion;
    public $usu_rut;
    public $pd_borrador;

    public function Programa_didacticoDTO(){
    }

    function getPd_id() {
        return $this->pd_id;
    }

    function setPd_id($pd_id) {
        return $this->pd_id = $pd_id;
    }

    function getPe_id() {
        return $this->pe_id;
    }

    function setPe_id($pe_id) {
        return $this->pe_id = $pe_id;
    }

    function getPd_fecha_modificacion() {
        return $this->pd_fecha_modificacion;
    }

    function setPd_fecha_modificacion($pd_fecha_modificacion) {
        return $this->pd_fecha_modificacion = $pd_fecha_modificacion;
    }

    function getUsu_rut() {
        return $this->usu_rut;
    }

    function setUsu_rut($usu_rut) {
        return $this->usu_rut = $usu_rut;
    }

    function getPd_borrador() {
        return $this->pd_borrador;
    }

    function setPd_borrador($pd_borrador) {
        return $this->pd_borrador = $pd_borrador;
    }

}