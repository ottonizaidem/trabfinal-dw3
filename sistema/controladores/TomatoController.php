
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
class TomatoController extends DefaultController {

//    //put your code here
//    public function registra() {
//        session_start();
//        $visao = $this->getVisao(__CLASS__, "registra", "Registro de Tomato");
//        $visao->exibir();
//    }

    public function grava() {
        $id_usuario = 1;
        $descricao = $this->getPOST("cpDescricao");

        $atividade = new Atividade();
        $atividade->setDescricao($descricao);
        $atividade->setUsuario($id_usuario);

        $daoAtividade = new AtividadeDAO();
        $daoAtividade->salvar($atividade);

        $this->sendRedirect("../Tomato/registra.html");
    }

    public function start() {
        $id_atividade = $this->getGET("id");
        $dt_inicio = date("Y-m-d H:i:s");

        $hora = date("H:i:s");

        // Somo 5 minutos (resultado em int)
        $horaNova = strtotime("$hora + 25 minutes");
        // Formato o resultado
        $horaNovaFormatada = date("H:i:s", $horaNova);
        // Mostro na tela
        //echo $horaNovaFormatada;
        echo $horaNovaFormatada;

        $dt_fim = date("Y-m-d " . "$horaNovaFormatada");
        $status = "T";

        $tomato = new Tomato($dt_inicio, $dt_fim, $status, $id_atividade);

        $tomatoDAO = new TomatoDAO();
        $tomatoDAO->salvar($tomato);
        
       $id_ultimo_tomato =  $tomatoDAO->listarUltimoRegistro($id_atividade);
        
        $visao = $this->getVisao(__CLASS__, "registra", "Registro de Tomato");
        $visao->setDado("id_tomato", $id_ultimo_tomato);
        $visao->exibir();

        //$this->sendRedirect("../Tomato/registra.html");
    }

    public function status() {
        $visao = $this->getVisao(__CLASS__, "status", "Registro de Tomato");
        $visao->exibir();
    }

}

?>
