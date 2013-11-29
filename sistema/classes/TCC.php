<?php

class TCC {
    private $id;
    private $titulo;
    private $autor;
    private $defesa;
    private $resumo;
    
    function __construct($titulo = null, $autor = null, $defesa = null, $resumo = null) {
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->defesa = $defesa;
        $this->resumo = $resumo;
    }

    
    public function get_titulo() {
        return $this->titulo;
    }

    public function set_titulo($titulo) {
        $this->titulo = $titulo;
    }

    public function get_autor() {
        return $this->autor;
    }

    public function set_autor($autor) {
        $this->autor = $autor;
    }

    public function get_defesa() {
        return $this->defesa;
    }

    public function set_defesa($defesa) {
        $this->defesa = $defesa;
    }

    public function get_resumo() {
        return $this->resumo;
    }

    public function set_resumo($resumo) {
        $this->resumo = $resumo;
    }
    public function get_id() {
        return $this->id;
    }

    public function set_id($id) {
        $this->id = $id;
    }




    
}

