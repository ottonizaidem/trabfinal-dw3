<?php

class Atividade {
    //put your code here
    private $id_atividade;
    private $descricao;
    private $usuario;
 
    public function getId_atividade() {
        return $this->id_atividade;
    }

    public function setId_atividade($id_atividade) {
        $this->id_atividade = $id_atividade;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }


}

?>
