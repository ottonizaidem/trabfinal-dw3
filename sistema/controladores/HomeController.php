<?php

class HomeController extends DefaultController {

    public function index() {
        $visao = $this->getVisao(__CLASS__,"index", "Home");
        $visao->exibir();
    }

    public function horaAtual() {
        $agora = new DateTime ();
        $visao = $this->getVisao("horaAtual", "Hora e Data");
        $visao->setTitulo("Hora e Data");
        $visao->setDado("agora", $agora);
        $visao->exibir();
    }


}
