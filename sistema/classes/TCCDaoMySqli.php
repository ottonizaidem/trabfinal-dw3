<?php

class TCCDaoMySqli {

    private $lista = null;
    private $conexao;

    public function __construct() {
        $this->conexao = new mysqli("localhost", "root", "", "dw3_tcc");

        if (!$this->conexao) {
            throw new Exception("Ops! Erro ao conectar no servidor!");
        }
    }

    function listarTodos() {
        $lista = array();
        $resultado = $this->conexao->query("SELECT * FROM tcc");

        while ($registro = $resultado->fetch_assoc()) {
            $o = new TCC($registro["titulo"], $registro["autor"], $registro["defesa"], $registro["resumo"]
            );
            $o->set_id($registro["id"]);
            $lista[] = $o;
        }
        return $lista;
    }

    function salvar($novo_tcc) {
        $query = mysql_query("
            INSERT INTO TCC(
            titulo, autor, defesa, resumo)
            VALUES (
            '{$novo_tcc->get_titulo()}',
            '{$novo_tcc->get_autor()}',
            'CURRENT_TIMESTAMP',
            '{$novo_tcc->get_resumo()}')");

        if (!$query) {
            throw new Exception("Erro ao Inserir o TCC");
        }
    }

    function atualizar($tcc) {
        $resultado = mysql_query("
            UPDATE TCC SET(
            titulo = '{$novo_tcc->get_titulo()}',
            autor = '{$novo_tcc->get_autor()}',
            'CURRENT_TIMESTAMP',
            resumo = '{$novo_tcc->get_resumo()}')
            WHERE id = {$tcc->get_id()};");
           if(!$resultado){
               throw new Exception("Erro ao atualizar o tcc");
           } 
    }

    function getById($id) {

        $resultado = mysql_query("SELECT * FROM tcc where id = $id");

        if ($registro = mysql_fetch_array($resultado)) {
            $o = new TCC($registro["id"], $registro["titulo"], $registro["autor"], $registro["defesa"], $registro["resumo"]
            );
            $o->set_id($registro["id"]);
            return $o;
        } else {
            throw new Exception("Trabalho com $id não encontrado!");
        }
    }

    function excluir($tcc) {
        $resultado = mysql_query("DELETE FROM tcc WHERE id = {$tcc->get_id()}");

        if (!$resultado) {
            throw new Exception("Erro ao excluir o TCC");
        }
    }

}

