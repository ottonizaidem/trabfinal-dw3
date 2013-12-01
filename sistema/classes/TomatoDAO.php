<?php

class TomatoDAO {

    //put your code here

    public function __construct() {
        $this->conexao = new mysqli("localhost", "root", "", "db_tomato");

        if (!$this->conexao) {
            throw new Exception("Ops! Erro ao conectar no servidor!");
        }
    }

    function salvar($tomato) {
        $query = $this->conexao->query("
            INSERT INTO tb_reg_tomato(dt_inicio, dt_fim, status, tb_atividade_tomato_id_atividade_tomato)
            VALUES ('{$tomato->getDt_inicio()}', '{$tomato->getDt_fim()}', '{$tomato->getStatus()}', {$tomato->getId_atividade()})");

        echo "sucesso";
        if (!$query) {
            throw new Exception("Erro ao Inserir o Tomato");
        }
    }

    function listarTodos() {
        $lista = array();
        $resultado = $this->conexao->query("SELECT * FROM tb_reg_tomato");

        while ($registro = $resultado->fetch_assoc()) {
            $a = new Tomato($registro["id_atividade_tomato"], $registro["descricao"], $registro["tb_usuario_id_usuario"]);
            $lista[] = $a;
        }
        return $lista;
    }

}

?>
