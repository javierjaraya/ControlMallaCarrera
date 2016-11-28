<?php
class Programa_basicoDTO {
    public $pb_id;
    public $pb_tipo_curso;
    public $pb_carrera;
    public $pb_departamento;
    public $pb_facultad;
    public $pb_nro_creditos;
    public $pb_horas_cronologicas;
    public $pb_horas_pedagogicas;
    public $pb_anio;
    public $pb_semestre;
    public $pb_hrs_presenciales;
    public $pb_ht_presenciales;
    public $pb_hp_presenciales;
    public $pb_hl_presenciales;
    public $pb_hrs_autonomas;
    public $pb_ht_autonomas;
    public $pb_hp_autonomas;
    public $pb_hl_autonomas;
    public $pb_presentacion;
    public $pb_descriptor_competencias;
    public $pb_aprendizajes_previos;
    public $pb_biblio_fundamental;
    public $pb_biblio_complementaria;
    public $asig_codigo;
    public $pb_fecha_modificacion;
    public $usu_rut;
    public $pb_borrador;
    
    public $m_id;
    public $asig_nombre;
    public $usu_nombres;
    public $usu_apellidos;

    public function Programa_basicoDTO(){
    }

    function getPb_id() {
        return $this->pb_id;
    }

    function setPb_id($pb_id) {
        return $this->pb_id = $pb_id;
    }

    function getPb_tipo_curso() {
        return $this->pb_tipo_curso;
    }

    function setPb_tipo_curso($pb_tipo_curso) {
        return $this->pb_tipo_curso = $pb_tipo_curso;
    }

    function getPb_carrera() {
        return $this->pb_carrera;
    }

    function setPb_carrera($pb_carrera) {
        return $this->pb_carrera = $pb_carrera;
    }

    function getPb_departamento() {
        return $this->pb_departamento;
    }

    function setPb_departamento($pb_departamento) {
        return $this->pb_departamento = $pb_departamento;
    }

    function getPb_facultad() {
        return $this->pb_facultad;
    }

    function setPb_facultad($pb_facultad) {
        return $this->pb_facultad = $pb_facultad;
    }

    function getPb_nro_creditos() {
        return $this->pb_nro_creditos;
    }

    function setPb_nro_creditos($pb_nro_creditos) {
        return $this->pb_nro_creditos = $pb_nro_creditos;
    }

    function getPb_horas_cronologicas() {
        return $this->pb_horas_cronologicas;
    }

    function setPb_horas_cronologicas($pb_horas_cronologicas) {
        return $this->pb_horas_cronologicas = $pb_horas_cronologicas;
    }

    function getPb_horas_pedagogicas() {
        return $this->pb_horas_pedagogicas;
    }

    function setPb_horas_pedagogicas($pb_horas_pedagogicas) {
        return $this->pb_horas_pedagogicas = $pb_horas_pedagogicas;
    }

    function getPb_anio() {
        return $this->pb_anio;
    }

    function setPb_anio($pb_anio) {
        return $this->pb_anio = $pb_anio;
    }

    function getPb_semestre() {
        return $this->pb_semestre;
    }

    function setPb_semestre($pb_semestre) {
        return $this->pb_semestre = $pb_semestre;
    }

    function getPb_hrs_presenciales() {
        return $this->pb_hrs_presenciales;
    }

    function setPb_hrs_presenciales($pb_hrs_presenciales) {
        return $this->pb_hrs_presenciales = $pb_hrs_presenciales;
    }

    function getPb_ht_presenciales() {
        return $this->pb_ht_presenciales;
    }

    function setPb_ht_presenciales($pb_ht_presenciales) {
        return $this->pb_ht_presenciales = $pb_ht_presenciales;
    }

    function getPb_hp_presenciales() {
        return $this->pb_hp_presenciales;
    }

    function setPb_hp_presenciales($pb_hp_presenciales) {
        return $this->pb_hp_presenciales = $pb_hp_presenciales;
    }

    function getPb_hl_presenciales() {
        return $this->pb_hl_presenciales;
    }

    function setPb_hl_presenciales($pb_hl_presenciales) {
        return $this->pb_hl_presenciales = $pb_hl_presenciales;
    }

    function getPb_hrs_autonomas() {
        return $this->pb_hrs_autonomas;
    }

    function setPb_hrs_autonomas($pb_hrs_autonomas) {
        return $this->pb_hrs_autonomas = $pb_hrs_autonomas;
    }

    function getPb_ht_autonomas() {
        return $this->pb_ht_autonomas;
    }

    function setPb_ht_autonomas($pb_ht_autonomas) {
        return $this->pb_ht_autonomas = $pb_ht_autonomas;
    }

    function getPb_hp_autonomas() {
        return $this->pb_hp_autonomas;
    }

    function setPb_hp_autonomas($pb_hp_autonomas) {
        return $this->pb_hp_autonomas = $pb_hp_autonomas;
    }

    function getPb_hl_autonomas() {
        return $this->pb_hl_autonomas;
    }

    function setPb_hl_autonomas($pb_hl_autonomas) {
        return $this->pb_hl_autonomas = $pb_hl_autonomas;
    }

    function getPb_presentacion() {
        return $this->pb_presentacion;
    }

    function setPb_presentacion($pb_presentacion) {
        return $this->pb_presentacion = $pb_presentacion;
    }

    function getPb_descriptor_competencias() {
        return $this->pb_descriptor_competencias;
    }

    function setPb_descriptor_competencias($pb_descriptor_competencias) {
        return $this->pb_descriptor_competencias = $pb_descriptor_competencias;
    }

    function getPb_aprendizajes_previos() {
        return $this->pb_aprendizajes_previos;
    }

    function setPb_aprendizajes_previos($pb_aprendizajes_previos) {
        return $this->pb_aprendizajes_previos = $pb_aprendizajes_previos;
    }

    function getPb_biblio_fundamental() {
        return $this->pb_biblio_fundamental;
    }

    function setPb_biblio_fundamental($pb_biblio_fundamental) {
        return $this->pb_biblio_fundamental = $pb_biblio_fundamental;
    }

    function getPb_biblio_complementaria() {
        return $this->pb_biblio_complementaria;
    }

    function setPb_biblio_complementaria($pb_biblio_complementaria) {
        return $this->pb_biblio_complementaria = $pb_biblio_complementaria;
    }

    function getAsig_codigo() {
        return $this->asig_codigo;
    }

    function setAsig_codigo($asig_codigo) {
        return $this->asig_codigo = $asig_codigo;
    }

    function getPb_fecha_modificacion() {
        return $this->pb_fecha_modificacion;
    }

    function setPb_fecha_modificacion($pb_fecha_modificacion) {
        return $this->pb_fecha_modificacion = $pb_fecha_modificacion;
    }

    function getUsu_rut() {
        return $this->usu_rut;
    }

    function setUsu_rut($usu_rut) {
        return $this->usu_rut = $usu_rut;
    }

    function getPb_borrador() {
        return $this->pb_borrador;
    }

    function setPb_borrador($pb_borrador) {
        return $this->pb_borrador = $pb_borrador;
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