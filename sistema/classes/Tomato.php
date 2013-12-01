<?php

/**
 * Description of Tomato
 *
 * @author Willian
 */
class Tomato {
    //put your code here
    private $id_tomato;
    private $dt_inicio;
    private $dt_fim;
    private $status;
    private $id_atividade;
    
    function __construct($dt_inicio, $dt_fim, $status, $id_atividade) {
        $this->dt_inicio = $dt_inicio;
        $this->dt_fim = $dt_fim;
        $this->status = $status;
        $this->id_atividade = $id_atividade;
    }

    
    public function getId_tomato() {
        return $this->id_tomato;
    }

    public function getDt_inicio() {
        return $this->dt_inicio;
    }

    public function getDt_fim() {
        return $this->dt_fim;
    }

    public function getStatus() {
        return $this->status;
    }

    public function getId_atividade() {
        return $this->id_atividade;
    }

    public function setId_tomato($id_tomato) {
        $this->id_tomato = $id_tomato;
    }

    public function setDt_inicio($dt_inicio) {
        $this->dt_inicio = $dt_inicio;
    }

    public function setDt_fim($dt_fim) {
        $this->dt_fim = $dt_fim;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function setId_atividade($id_atividade) {
        $this->id_atividade = $id_atividade;
    }


    
    
}
