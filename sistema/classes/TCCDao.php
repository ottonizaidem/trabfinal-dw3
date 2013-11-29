<?php

class TCCDao {

    private $lista = null;

    public function __construct() {
        $conexao = mysql_connect("localhost", "root", "");

        if (!$conexao) {
            throw new Exception("Ops! Erro ao conectar no servidor!");
        }

        $database = mysql_select_db("dw3_tcc");

        if (!$database) {
            throw new Exception("Ops! Erro ao selecionar o banco de dados!");
        }
    }

    function listarTodos() {
        $lista = array();
        $resultado = mysql_query("SELECT * FROM tcc");

        while ($registro = mysql_fetch_array($resultado)) {
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

