<?php

class View {

    private $nomeVisao;
    private $arquivoVisao;
    private $dados;
    private $titulo;
    public function __construct($nomeVisao) { 
        $this->nomeVisao = $nomeVisao;
        $this->arquivoVisao = "sistema/visoes/{$nomeVisao}View.php";

        if (!file_exists($this->arquivoVisao)) {
            throw new Exception("Arquivo de visão {$this->nomeVisao} não existe");
        }
        $this->dados = array();
    }

    public function exibir() {
        require_once 'ModeloPadrao.php'; // Chama modelo padrão 
        exit(); // sai do programa
    }
    
    public function exibirArquivoDeVisao(){
        require_once $this->arquivoVisao;
    }

    public function setDado($chave, $valor = null) {
        $this->dados[$chave] = $valor; //setParameter do JAVA
    }
    public function getDado($chave) {
        return $this->dados [$chave];
    }
    
    public function imprimeDado ($chave){
        echo $this->dados[$chave];
    }
    
    public function getTitulo() {
        return $this->titulo;
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function imprimeTitulo() {
        echo $this->titulo;
    }
    
    protected function link($controlador, $action='index'){
        $url = "/Php-TCC/$controlador/$action.html";
        return $url;
        
    }
}
