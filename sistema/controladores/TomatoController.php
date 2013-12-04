<?php

class TomatoController extends DefaultController {

    public function grava() {
        ob_start();
        session_start();
        $user = unserialize($_SESSION['user']);
        $descricao = $this->getPOST("cpDescricao");

        $atividade = new Atividade();
        $atividade->setDescricao($descricao);
        $atividade->setUsuario($user->getId_usuario());

        $daoAtividade = new AtividadeDAO();
        $daoAtividade->salvar($atividade);

        $this->sendRedirect("../Tomato/registra.html");
    }

    public function start() {
        $id_atividade = $this->getGET("id");

        $tomatoDAO = new TomatoDAO();

        //$tomatoDAO->listarUltimaDataInicio($id_atividade);
        $tomato = $tomatoDAO->listarUltimaDataFim($id_atividade);
        if ($tomato != null) {
            $tz = $timezone = new DateTimeZone("America/Sao_Paulo");
            $dataInicio = new DateTime($tomato->getDt_inicio(), $tz);
            $dataInicio->setTimezone($tz);
            $agora = new DateTime();

            $agora->setTimezone($tz);
            $diferenca = $agora->diff($dataInicio);
            $segundos = $diferenca->format('%i') * 60 + $diferenca->format('%s');
        } else {
            $tomato = new Tomato(null, null, null, 'T', $id_atividade);
            $segundos = 0;
            $tomatoDAO->salvar($tomato);
        }
        $id_ultimo_tomato = $tomatoDAO->listarUltimoRegistro($id_atividade);

        $visao = $this->getVisao(__CLASS__, "registra", "Registro de Tomato");
        $visao->setDado("id_tomato", $id_ultimo_tomato);
        $visao->setDado("data_inicio", $segundos);
        $visao->exibir();
    }

    public function status() {
        $visao = $this->getVisao(__CLASS__, "status", "Registro de Tomato");
        $visao->exibir();
    }

    //Valida o Tomato;
    public function valida() {
        $dao = new TomatoDAO();
        $id_tomato = $this->getGET("id");
        $valida = $this->getPOST("P");

        if ($valida === "Tomato") {
            $status = "T";
            $dao->editar($status, $id_tomato);
        } else if ($valida === "Podre") {
            $status = "P";
            $dao->editar($status, $id_tomato);
        } else {
            $visao = $this->getVisao(__CLASS__, "pausa", "Pausa");
            $visao->exibir();
        }
    }

}

?>
