<?php
class Tipo_asignaturaDTO {
    public $ta_id;
    public $ta_nombre;

    public function Tipo_asignaturaDTO(){
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
        return $this->ta_nombre = $ta_nombre;
    }

}