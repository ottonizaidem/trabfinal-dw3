<?php

class AtividadeController extends DefaultController {

    //put your code here

    public function nova() {
        session_start();
        $visao = $this->getVisao(__CLASS__, "formAtividade", "Cadastro de Atividade");
        $usuario = $this->getSESSION("usuarioSession");
        $visao->setDado("u", $usuario);
        $visao->exibir();
    }
    
    public function cadastrar(){
        $id_usuario = 1;
        $descricao = $this->getPOST("cpDescricao");
        
        $atividade = new Atividade();
        $atividade->setDescricao($descricao);
        $atividade->setUsuario($id_usuario);
        
        $daoAtividade = new AtividadeDAO();
        $daoAtividade->salvar($atividade);
        $visao->setDado("id_atividade");
        
        $this->sendRedirect("../Tomato/registra.html");
    }

}

?>
