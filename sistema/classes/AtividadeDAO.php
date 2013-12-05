<?php

class AtividadeDAO {

    //put your code here

    public function __construct() {
        $this->conexao = new mysqli("localhost", "root", "", "db_tomato");

        if (!$this->conexao) {
            throw new Exception("Ops! Erro ao conectar no servidor!");
        }
    }

    function salvar($atividade) {
        $query = $this->conexao->query("
            INSERT INTO tb_atividade_tomato(descricao, tb_usuario_id_usuario)
            VALUES ('{$atividade->getDescricao()}', {$atividade->getUsuario()})");

        if (!$query) {

            throw new Exception("Erro ao Inserir o Atividade");
        }
    }

    function listarTodos() {
        $lista = array();
        $resultado = $this->conexao->query("SELECT * FROM tb_atividade_tomato");

        while ($registro = $resultado->fetch_assoc()) {
            $a = new Atividade($registro["id_atividade_tomato"], $registro["descricao"], $registro["tb_usuario_id_usuario"]);
            $lista[] = $a;
        }
        return $lista;
    }
    
    function listarPorUser($id) {
        $lista = array();
        $resultado = $this->conexao->query("SELECT * FROM tb_atividade_tomato WHERE tb_usuario_id_usuario = {$id}");

        while ($registro = $resultado->fetch_assoc()) {
            $a = new Atividade($registro["id_atividade_tomato"], $registro["descricao"], $registro["tb_usuario_id_usuario"]);
            $lista[] = $a;
        }
        return $lista;
    }
    
    function getById($id) {
        $resultado = $this->conexao->query("SELECT * FROM tb_atividade_tomato WHERE id_atividade_tomato = {$id} ");

        while ($registro = $resultado->fetch_assoc()) {
            return $a = new Atividade($registro["id_atividade_tomato"], $registro["descricao"], $registro["tb_usuario_id_usuario"]);
        }
        return null;
    }

}

?>
