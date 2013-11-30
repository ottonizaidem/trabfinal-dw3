<?php

class UsuarioDAO {

    //put your code here

    public function __construct() {
        $this->conexao = new mysqli("localhost", "root", "", "db_tomato");

        if (!$this->conexao) {
            throw new Exception("Ops! Erro ao conectar no servidor!");
        }
    }

    function autenticacao($username, $password) {

        $resultado = $this->conexao->query("SELECT * FROM tb_usuario where user = '$username' and senha = '$password'");

        if ($registro = $resultado->fetch_assoc()) {
            $user = new Usuario($registro["id_usuario"], $registro["nome"], $registro["empresa"], $registro["user"]);
            return $user;
        } else {
            throw new Exception("Usuario não encontrado!");
        }
    }

}

?>
