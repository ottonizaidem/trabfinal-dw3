<?php

class LoginController extends DefaultController {

    public function login() {
        $visao = $this->getVisao(__CLASS__,"login", "Login");
        $visao->exibir();
    }
    
    public function logar(){
        $username = $this->getPOST("username");
        $password = $this->getPOST("password");
        
        $userDAO = new UsuarioDAO();
        $usuario = $userDAO->autenticacao($username, $password);
        
        if($usuario){
            session_start();
            //session_register("usuarioSession", $usuario);
            $_SESSION["usuarioSession"] = $usuario;
            $this->sendRedirect("../Atividade/nova.html");
        }
    }

}