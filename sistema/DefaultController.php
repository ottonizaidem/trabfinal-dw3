<?php

class DefaultController {

    public function getVisao($nomeDoControler, $nomeVisao, $titulo = "") {
        //$nomeDoControler = str_replace("Controller", "", __CLASS__);
        $nomeDoControler = str_replace("Controller", "", $nomeDoControler); //Troque Controller por "", onde $nomeControler
        $visao = new View("$nomeDoControler/$nomeVisao");
        $visao->setTitulo($titulo);
        return $visao;
    }

    public function getPOST($var) {
        return filter_input(INPUT_POST, $var);
    }
    
    public function getGET($var) {
        return filter_input(INPUT_GET, $var);
    }
    public function getREQUEST($var) {
        return filter_input(INPUT_REQUEST, $var);
    }
    public function getSESSION($var) {
        return $_SESSION[$var];
    }
    public function getCOOKIE($var) {
        return filter_input(INPUT_COOKIE, $var);
    }
    public function sendRedirect($destino) {
        header("Location: $destino");
        exit();
    }

}

?>
