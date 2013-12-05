<?php

class UsuarioController extends DefaultController {

    //put your code here

    public function nova() {
        ob_start();
        session_start();
        $visao = $this->getVisao(__CLASS__, "cadUsuario", "Cadastro de Usuario");
        $dao = new UsuarioDAO();
        $usuario = $dao->listarTodos();

        $visao->setDado("usuario", $usuario);

        $visao->exibir();
    }

    public function salvar() {
        session_start();
        $nome = $this->getPOST("cpNome");
        $empresa = $this->getPOST("cpEmpresa");
        $user = $this->getPOST("cpUser");
        $senha = $this->getPOST("cpSenha");

        $usuario = new Usuario();
        $usuario->setNome($nome);
        $usuario->setEmpresa($empresa);
        $usuario->setUser($user);
        $usuario->setSenha($senha);



        $daoUsuario = new UsuarioDAO();
        $daoUsuario->salvar($usuario);

     if ($usuario) {
            $_SESSION['user'] = serialize($usuario);
            $this->sendRedirect("../Login/login.html");
        }
    }

}

?>
