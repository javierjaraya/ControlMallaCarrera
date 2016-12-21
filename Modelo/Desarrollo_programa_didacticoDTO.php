<?php
class Desarrollo_programa_didacticoDTO {
    public $dpd_id;
    public $dpd_actividad_aprendizaje;
    public $dpd_mediacion_ensenianza;
    public $dpd_actividad_evaluacion;
    public $dpd_recurso_didactivo;
    public $dpd_hp_ht;
    public $dpd_hp_hp;
    public $dpd_hp_hl;
    public $dpd_hp_ha;
    public $dpd_ha_ht;
    public $dpd_ha_hp;
    public $dpd_ha_hl;
    public $dpd_ha_ha;
    public $ra_id;
    public $pd_id;

    public function Desarrollo_programa_didacticoDTO(){
    }

    function getDpd_id() {
        return $this->dpd_id;
    }

    function setDpd_id($dpd_id) {
        return $this->dpd_id = $dpd_id;
    }

    function getDpd_actividad_aprendizaje() {
        return $this->dpd_actividad_aprendizaje;
    }

    function setDpd_actividad_aprendizaje($dpd_actividad_aprendizaje) {
        return $this->dpd_actividad_aprendizaje = $dpd_actividad_aprendizaje;
    }

    function getDpd_mediacion_ensenianza() {
        return $this->dpd_mediacion_ensenianza;
    }

    function setDpd_mediacion_ensenianza($dpd_mediacion_ensenianza) {
        return $this->dpd_mediacion_ensenianza = $dpd_mediacion_ensenianza;
    }

    function getDpd_actividad_evaluacion() {
        return $this->dpd_actividad_evaluacion;
    }

    function setDpd_actividad_evaluacion($dpd_actividad_evaluacion) {
        return $this->dpd_actividad_evaluacion = $dpd_actividad_evaluacion;
    }

    function getDpd_recurso_didactivo() {
        return $this->dpd_recurso_didactivo;
    }

    function setDpd_recurso_didactivo($dpd_recurso_didactivo) {
        return $this->dpd_recurso_didactivo = $dpd_recurso_didactivo;
    }

    function getDpd_hp_ht() {
        return $this->dpd_hp_ht;
    }

    function setDpd_hp_ht($dpd_hp_ht) {
        return $this->dpd_hp_ht = $dpd_hp_ht;
    }

    function getDpd_hp_hp() {
        return $this->dpd_hp_hp;
    }

    function setDpd_hp_hp($dpd_hp_hp) {
        return $this->dpd_hp_hp = $dpd_hp_hp;
    }

    function getDpd_hp_hl() {
        return $this->dpd_hp_hl;
    }

    function setDpd_hp_hl($dpd_hp_hl) {
        return $this->dpd_hp_hl = $dpd_hp_hl;
    }

    function getDpd_ha_ht() {
        return $this->dpd_ha_ht;
    }

    function setDpd_ha_ht($dpd_ha_ht) {
        return $this->dpd_ha_ht = $dpd_ha_ht;
    }

    function getDpd_ha_hp() {
        return $this->dpd_ha_hp;
    }

    function setDpd_ha_hp($dpd_ha_hp) {
        return $this->dpd_ha_hp = $dpd_ha_hp;
    }

    function getDpd_ha_hl() {
        return $this->dpd_ha_hl;
    }

    function setDpd_ha_hl($dpd_ha_hl) {
        return $this->dpd_ha_hl = $dpd_ha_hl;
    }

    function getRa_id() {
        return $this->ra_id;
    }

    function setRa_id($ra_id) {
        return $this->ra_id = $ra_id;
    }

    function getPd_id() {
        return $this->pd_id;
    }

    function setPd_id($pd_id) {
        return $this->pd_id = $pd_id;
    }
    
    function getDpd_hp_ha() {
        return $this->dpd_hp_ha;
    }

    function getDpd_ha_ha() {
        return $this->dpd_ha_ha;
    }

    function setDpd_hp_ha($dpd_hp_ha) {
        $this->dpd_hp_ha = $dpd_hp_ha;
    }

    function setDpd_ha_ha($dpd_ha_ha) {
        $this->dpd_ha_ha = $dpd_ha_ha;
    }

}