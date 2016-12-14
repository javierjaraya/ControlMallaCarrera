<?php
class Resultado_aprendizajeDTO {
    public $ra_id;
    public $ra_resultado_aprendizaje;
    public $ra_metodologia;
    public $ra_criterios_evaluacion;
    public $ra_contenido_con_pro_act;
    public $ra_ht_presenciales;
    public $ra_hp_presenciales;
    public $ra_ht_autonomas;
    public $ra_hp_autonomas;
    public $ra_evidencia_aprendizaje;
    public $pe_id;

    public function Resultado_aprendizajeDTO(){
    }

    function getRa_id() {
        return $this->ra_id;
    }

    function setRa_id($ra_id) {
        return $this->ra_id = $ra_id;
    }

    function getRa_resultado_aprendizaje() {
        return $this->ra_resultado_aprendizaje;
    }

    function setRa_resultado_aprendizaje($ra_resultado_aprendizaje) {
        return $this->ra_resultado_aprendizaje = $ra_resultado_aprendizaje;
    }

    function getRa_metodologia() {
        return $this->ra_metodologia;
    }

    function setRa_metodologia($ra_metodologia) {
        return $this->ra_metodologia = $ra_metodologia;
    }

    function getRa_criterios_evaluacion() {
        return $this->ra_criterios_evaluacion;
    }

    function setRa_criterios_evaluacion($ra_criterios_evaluacion) {
        return $this->ra_criterios_evaluacion = $ra_criterios_evaluacion;
    }

    function getRa_contenido_con_pro_act() {
        return $this->ra_contenido_con_pro_act;
    }

    function setRa_contenido_con_pro_act($ra_contenido_con_pro_act) {
        return $this->ra_contenido_con_pro_act = $ra_contenido_con_pro_act;
    }

    function getRa_ht_presenciales() {
        return $this->ra_ht_presenciales;
    }

    function setRa_ht_presenciales($ra_ht_presenciales) {
        return $this->ra_ht_presenciales = $ra_ht_presenciales;
    }

    function getRa_hp_presenciales() {
        return $this->ra_hp_presenciales;
    }

    function setRa_hp_presenciales($ra_hp_presenciales) {
        return $this->ra_hp_presenciales = $ra_hp_presenciales;
    }

    function getRa_ht_autonomas() {
        return $this->ra_ht_autonomas;
    }

    function setRa_ht_autonomas($ra_ht_autonomas) {
        return $this->ra_ht_autonomas = $ra_ht_autonomas;
    }

    function getRa_hp_autonomas() {
        return $this->ra_hp_autonomas;
    }

    function setRa_hp_autonomas($ra_hp_autonomas) {
        return $this->ra_hp_autonomas = $ra_hp_autonomas;
    }

    function getRa_evidencia_aprendizaje() {
        return $this->ra_evidencia_aprendizaje;
    }

    function setRa_evidencia_aprendizaje($ra_evidencia_aprendizaje) {
        return $this->ra_evidencia_aprendizaje = $ra_evidencia_aprendizaje;
    }

    function getPe_id() {
        return $this->pe_id;
    }

    function setPe_id($pe_id) {
        return $this->pe_id = $pe_id;
    }

}