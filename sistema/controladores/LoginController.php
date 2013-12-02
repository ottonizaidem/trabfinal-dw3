<?php

class LoginController extends DefaultController {

    public function login() {
        $visao = $this->getVisao(__CLASS__, "login", "Login");
        $visao->exibir();
    }

    public function logar() {
        ob_start();
        session_start();
        $username = $this->getPOST("username");
        $password = $this->getPOST("password");

        $userDAO = new UsuarioDAO();
        $usuario = $userDAO->autenticacao($username, $password);

        if ($usuario) {
            $_SESSION['user'] = serialize($usuario);
            $this->sendRedirect("../Atividade/nova.html");
        }
    }

}