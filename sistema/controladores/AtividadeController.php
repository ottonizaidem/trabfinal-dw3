<?php

class AtividadeController extends DefaultController {

    //put your code here

    public function nova() {
        ob_start();
        session_start();
        $user = unserialize($_SESSION['user']);
        $visao = $this->getVisao(__CLASS__, "formAtividade", "Cadastro de Atividade");
        $dao = new AtividadeDAO();
        $atividades = $dao->listarPorUser($user->getId_usuario());

        $visao->setDado("atividades", $atividades);

        $visao->exibir();
    }

    public function cadastrar() {
        ob_start();
        session_start();
        $user = unserialize($_SESSION['user']);
        $descricao = $this->getPOST("cpDescricao");

        $atividade = new Atividade();
        $atividade->setDescricao($descricao);
        $atividade->setUsuario($user->getId_usuario());

        $daoAtividade = new AtividadeDAO();
        $daoAtividade->salvar($atividade);

        $this->sendRedirect("../Atividade/nova.html");
    }

}

?>
