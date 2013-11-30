
<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TomatoController
 *
 * @author Aparecida
 */
class TomatoController extends DefaultController{
    //put your code here
        public function registra() {
        session_start();
        $visao = $this->getVisao(__CLASS__, "registra", "Registro de Tomato");
        $visao->exibir();
    }
    
    public function grava(){
        $id_usuario = 1;
        $descricao = $this->getPOST("cpDescricao");
        
        $atividade = new Atividade();
        $atividade->setDescricao($descricao);
        $atividade->setUsuario($id_usuario);
        
        $daoAtividade = new AtividadeDAO();
        $daoAtividade->salvar($atividade);
        
        $this->sendRedirect("../Tomato/registra.html");
    }


}

?>
