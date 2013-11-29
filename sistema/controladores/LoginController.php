<?php

class LoginController extends DefaultController {

    public function login() {
        $visao = $this->getVisao(__CLASS__,"login", "Login");
        $visao->exibir();
    }

}