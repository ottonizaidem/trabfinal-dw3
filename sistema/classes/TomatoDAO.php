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
            VALUES (CURRENT_TIMESTAMP, NULL, '{$tomato->getStatus()}', {$tomato->getId_atividade()})");

        if (!$query) {
            throw new Exception("Erro ao Inserir o Tomato");
        }
        $tomato->setId_tomato($this->conexao->insert_id);
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

    function listarUltimoRegistro($id_atividade) {
        $lista = array();
        $resultado = $this->conexao->query("SELECT MAX(id_tomato) FROM tb_reg_tomato "
                . "WHERE tb_atividade_tomato_id_atividade_tomato = {$id_atividade}");

        while ($registro = $resultado->fetch_assoc()) {
            $a = $registro["MAX(id_tomato)"];
        }
        return $a;
    }

    function listarUltimaDataInicio($id_atividade) {
        $resultado = $this->conexao->query("SELECT MAX(id_tomato) FROM tb_reg_tomato "
                . "WHERE tb_atividade_tomato_id_atividade_tomato = {$id_atividade}");

        while ($registro = $resultado->fetch_assoc()) {
            $a = $registro["MAX(id_tomato)"];
        }

        $result = $this->conexao->query("SELECT dt_inicio FROM tb_reg_tomato "
                . "WHERE id_tomato = {$a}");

        while ($registro = $result->fetch_assoc()) {
            $dt_inicio = $registro["dt_inicio"];
            return $dt_inicio;
        }
    }

    function listarUltimaDataFim($id_atividade) {
        $resultado = $this->conexao->query("SELECT * FROM tb_reg_tomato "
                . "WHERE tb_atividade_tomato_id_atividade_tomato = {$id_atividade} AND dt_fim is null");

        while ($registro = $resultado->fetch_assoc()) {
            $a = new Tomato($registro["id_tomato"], $registro["dt_inicio"], $registro["dt_fim"], $registro["status"], $registro["tb_atividade_tomato_id_atividade_tomato"]);
          
            return $a;
        }
    }
    
    function editar($status, $id_tomato) {
        $query = $this->conexao->query("
            UPDATE tb_reg_tomato SET dt_fim = CURRENT_TIMESTAMP, status = '{$status}' WHERE id_tomato = {$id_tomato}");

        if (!$query) {
            throw new Exception("Erro ao Editar o Tomato");
        }
    }
    
    

}

?>
