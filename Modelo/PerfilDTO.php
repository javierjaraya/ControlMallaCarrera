<?php
class PerfilDTO {
    public $per_id;
    public $per_nombre;

    public function PerfilDTO(){
    }

    function getPer_id() {
        return $this->per_id;
    }

    function setPer_id($per_id) {
        return $this->per_id = $per_id;
    }

    function getPer_nombre() {
        return $this->per_nombre;
    }

    function setPer_nombre($per_nombre) {
        return $this->per_nombre = $per_nombre;
    }

}