<?php

class HomeController extends DefaultController {

    public function index() {
        $visao = $this->getVisao(__CLASS__,"index", "Home");
        $visao->exibir();
    }


}
