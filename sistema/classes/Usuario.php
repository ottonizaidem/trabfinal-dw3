<?php

class Usuario {

    private $id_usuario;
    private $nome;
    private $empresa;
    private $user;
    private $senha;
    
    public function getId_usuario() {
        return $this->id_usuario;
    }

    public function setId_usuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getEmpresa() {
        return $this->empresa;
    }

    public function setEmpresa($empresa) {
        $this->empresa = $empresa;
    }

    public function getUser() {
        return $this->user;
    }

    public function setUser($user) {
        $this->user = $user;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }

<<<<<<< HEAD
function __construct() {
       
   }
=======
    function __construct($id_usuario, $nome, $empresa, $user,$senha) {
        $this->id_usuario = $id_usuario;
        $this->nome = $nome;
        $this->empresa = $empresa;
        $this->user = $user;
        $this->senha = $senha;
    }
>>>>>>> 4ed2ba7baca981e1990a8606f68088f6d5713739

    
}

?>
