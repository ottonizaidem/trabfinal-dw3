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
    
<<<<<<< HEAD
    function salvar($usuario) {        
       
       $query = $this->conexao->query("
           INSERT INTO tb_usuario( nome, empresa, user, senha)
           VALUES ('{$usuario->getNome()}', '{$usuario->getEmpresa()}', '{$usuario->getUser()}','{$usuario->getSenha()}')");
              if (!$query) {

           throw new Exception("Erro ao Inserir Usuario!");
       }
   }
   
=======
    function salvar($usuario) {
        $query = $this->conexao->query("
            INSERT INTO tb_usuario( nome, empresa, user, senha)
            VALUES ('{$usuario->getNome()}', {$usuario->getEmpresa()}', {$usuario->getUser()}',{$usuario->getSenha()}'");

        if (!$query) {

            throw new Exception("Erro ao Inserir Usuario!");
        }
    }

>>>>>>> 4ed2ba7baca981e1990a8606f68088f6d5713739
    function listarTodos() {
        $lista = array();
        $resultado = $this->conexao->query("SELECT * FROM tb_usuario");

        while ($registro = $resultado->fetch_assoc()) {
            $u = new Usuario($registro["id_usuario"],
                             $registro["nome"],
                             $registro["empresa"],
                             $registro["user"],
                             $registro["senha"]);
            $lista[] = $u;
        }
        return $lista;
    }


}

?>
