<?php
class Programa_extensoDTO {
    public $pe_id;
    public $pe_tipo_curso;
    public $pe_carrera;
    public $pe_departamento;
    public $pe_facultad;
    public $pe_nro_creditos;
    public $pe_horas_cronologicas;
    public $pe_horas_pedagogicas;
    public $pe_anio;
    public $pe_semestre;
    public $pe_hrs_presenciales;
    public $pe_ht_presenciales;
    public $pe_hp_presenciales;
    public $pe_hl_presenciales;
    public $pe_hrs_autonomas;
    public $pe_ht_autonomas;
    public $pe_hp_autonomas;
    public $pe_hl_autonomas;
    public $pe_presentacion;
    public $pe_descriptor_competencias;
    public $pe_aprendizajes_previos;
    public $pe_fecha_inicio;
    public $pe_fecha_fin;
    public $pe_observacion;
    public $pe_biblio_fundamental;
    public $pe_biblio_complementaria;
    public $asig_codigo;
    public $pe_fecha_modificacion;
    public $usu_rut;
    public $pe_borrador;
    
    public $m_id;
    public $asig_nombre;
    public $usu_nombres;
    public $usu_apellidos;

    public function Programa_extensoDTO(){
    }

    function getPe_id() {
        return $this->pe_id;
    }

    function setPe_id($pe_id) {
        return $this->pe_id = $pe_id;
    }

    function getPe_tipo_curso() {
        return $this->pe_tipo_curso;
    }

    function setPe_tipo_curso($pe_tipo_curso) {
        return $this->pe_tipo_curso = $pe_tipo_curso;
    }

    function getPe_carrera() {
        return $this->pe_carrera;
    }

    function setPe_carrera($pe_carrera) {
        return $this->pe_carrera = $pe_carrera;
    }

    function getPe_departamento() {
        return $this->pe_departamento;
    }

    function setPe_departamento($pe_departamento) {
        return $this->pe_departamento = $pe_departamento;
    }

    function getPe_facultad() {
        return $this->pe_facultad;
    }

    function setPe_facultad($pe_facultad) {
        return $this->pe_facultad = $pe_facultad;
    }

    function getPe_nro_creditos() {
        return $this->pe_nro_creditos;
    }

    function setPe_nro_creditos($pe_nro_creditos) {
        return $this->pe_nro_creditos = $pe_nro_creditos;
    }

    function getPe_horas_cronologicas() {
        return $this->pe_horas_cronologicas;
    }

    function setPe_horas_cronologicas($pe_horas_cronologicas) {
        return $this->pe_horas_cronologicas = $pe_horas_cronologicas;
    }

    function getPe_horas_pedagogicas() {
        return $this->pe_horas_pedagogicas;
    }

    function setPe_horas_pedagogicas($pe_horas_pedagogicas) {
        return $this->pe_horas_pedagogicas = $pe_horas_pedagogicas;
    }

    function getPe_anio() {
        return $this->pe_anio;
    }

    function setPe_anio($pe_anio) {
        return $this->pe_anio = $pe_anio;
    }

    function getPe_semestre() {
        return $this->pe_semestre;
    }

    function setPe_semestre($pe_semestre) {
        return $this->pe_semestre = $pe_semestre;
    }

    function getPe_hrs_presenciales() {
        return $this->pe_hrs_presenciales;
    }

    function setPe_hrs_presenciales($pe_hrs_presenciales) {
        return $this->pe_hrs_presenciales = $pe_hrs_presenciales;
    }

    function getPe_ht_presenciales() {
        return $this->pe_ht_presenciales;
    }

    function setPe_ht_presenciales($pe_ht_presenciales) {
        return $this->pe_ht_presenciales = $pe_ht_presenciales;
    }

    function getPe_hp_presenciales() {
        return $this->pe_hp_presenciales;
    }

    function setPe_hp_presenciales($pe_hp_presenciales) {
        return $this->pe_hp_presenciales = $pe_hp_presenciales;
    }

    function getPe_hl_presenciales() {
        return $this->pe_hl_presenciales;
    }

    function setPe_hl_presenciales($pe_hl_presenciales) {
        return $this->pe_hl_presenciales = $pe_hl_presenciales;
    }

    function getPe_hrs_autonomas() {
        return $this->pe_hrs_autonomas;
    }

    function setPe_hrs_autonomas($pe_hrs_autonomas) {
        return $this->pe_hrs_autonomas = $pe_hrs_autonomas;
    }

    function getPe_ht_autonomas() {
        return $this->pe_ht_autonomas;
    }

    function setPe_ht_autonomas($pe_ht_autonomas) {
        return $this->pe_ht_autonomas = $pe_ht_autonomas;
    }

    function getPe_hp_autonomas() {
        return $this->pe_hp_autonomas;
    }

    function setPe_hp_autonomas($pe_hp_autonomas) {
        return $this->pe_hp_autonomas = $pe_hp_autonomas;
    }

    function getPe_hl_autonomas() {
        return $this->pe_hl_autonomas;
    }

    function setPe_hl_autonomas($pe_hl_autonomas) {
        return $this->pe_hl_autonomas = $pe_hl_autonomas;
    }

    function getPe_presentacion() {
        return $this->pe_presentacion;
    }

    function setPe_presentacion($pe_presentacion) {
        return $this->pe_presentacion = $pe_presentacion;
    }

    function getPe_descriptor_competencias() {
        return $this->pe_descriptor_competencias;
    }

    function setPe_descriptor_competencias($pe_descriptor_competencias) {
        return $this->pe_descriptor_competencias = $pe_descriptor_competencias;
    }

    function getPe_aprendizajes_previos() {
        return $this->pe_aprendizajes_previos;
    }

    function setPe_aprendizajes_previos($pe_aprendizajes_previos) {
        return $this->pe_aprendizajes_previos = $pe_aprendizajes_previos;
    }

    function getPe_fecha_inicio() {
        return $this->pe_fecha_inicio;
    }

    function setPe_fecha_inicio($pe_fecha_inicio) {
        return $this->pe_fecha_inicio = $pe_fecha_inicio;
    }

    function getPe_fecha_fin() {
        return $this->pe_fecha_fin;
    }

    function setPe_fecha_fin($pe_fecha_fin) {
        return $this->pe_fecha_fin = $pe_fecha_fin;
    }

    function getPe_observacion() {
        return $this->pe_observacion;
    }

    function setPe_observacion($pe_observacion) {
        return $this->pe_observacion = $pe_observacion;
    }

    function getPe_biblio_fundamental() {
        return $this->pe_biblio_fundamental;
    }

    function setPe_biblio_fundamental($pe_biblio_fundamental) {
        return $this->pe_biblio_fundamental = $pe_biblio_fundamental;
    }

    function getPe_biblio_complementaria() {
        return $this->pe_biblio_complementaria;
    }

    function setPe_biblio_complementaria($pe_biblio_complementaria) {
        return $this->pe_biblio_complementaria = $pe_biblio_complementaria;
    }

    function getAsig_codigo() {
        return $this->asig_codigo;
    }

    function setAsig_codigo($asig_codigo) {
        return $this->asig_codigo = $asig_codigo;
    }

    function getPe_fecha_modificacion() {
        return $this->pe_fecha_modificacion;
    }

    function setPe_fecha_modificacion($pe_fecha_modificacion) {
        return $this->pe_fecha_modificacion = $pe_fecha_modificacion;
    }

    function getUsu_rut() {
        return $this->usu_rut;
    }

    function setUsu_rut($usu_rut) {
        return $this->usu_rut = $usu_rut;
    }

    function getPe_borrador() {
        return $this->pe_borrador;
    }

    function setPe_borrador($pe_borrador) {
        return $this->pe_borrador = $pe_borrador;
    }

    function getM_id() {
        return $this->m_id;
    }

    function getAsig_nombre() {
        return $this->asig_nombre;
    }

    function getUsu_nombres() {
        return $this->usu_nombres;
    }

    function getUsu_apellidos() {
        return $this->usu_apellidos;
    }

    function setM_id($m_id) {
        $this->m_id = $m_id;
    }

    function setAsig_nombre($asig_nombre) {
        $this->asig_nombre = $asig_nombre;
    }

    function setUsu_nombres($usu_nombres) {
        $this->usu_nombres = $usu_nombres;
    }

    function setUsu_apellidos($usu_apellidos) {
        $this->usu_apellidos = $usu_apellidos;
    }
}