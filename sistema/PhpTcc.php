<?php

class PHPTcc {

    private $controladorNome = null;
    private $controladorAcao = null;
    private $controlador = null;
    
    public function __construct() {
        require_once 'sistema/View.php';
        require_once 'sistema/DefaultController.php';
        require_once 'sistema/classes/Usuario.php';
        require_once 'sistema/classes/UsuarioDAO.php';
        require_once 'sistema/classes/Atividade.php';
        require_once 'sistema/classes/AtividadeDAO.php';
        require_once 'sistema/classes/Tomato.php';
        require_once 'sistema/classes/TomatoDAO.php';
        require_once 'sistema/classes/TCCDao.php';
        require_once 'sistema/classes/TCCDaoMySqli.php';
    }

    public function executar() {
        $this->lerParametros();
        $this->carregarControlador();
        $this->executarAcaoDoControlador(); 
    }

    //Saber qual controlador acessar e qual ação o controlador vai executar, recebe por get
    protected function lerParametros() {
        
        //pegar os dados de entrada e filtra os dados que não estão no contexto
        //pega do get a variavel 'controlador'
        $this->controladorNome = filter_input(INPUT_GET, 'controlador', FILTER_SANITIZE_SPECIAL_CHARS); //pegando o parametro na URL 
        if (!$this->controladorNome) {
            $this->controladorNome = "Home"; //Padrão o controlador Home
        }

        $this->controladorAcao = filter_input(INPUT_GET, 'acao', FILTER_SANITIZE_SPECIAL_CHARS); //pegando o parametro na URL 
        if (!$this->controladorAcao) {
            $this->controladorAcao = "index"; //Padrão acao index
        }
    }

    //Varear o disco, encontrar a pasta, instaciar o controlador
    protected function carregarControlador() {
        $controladorArquivo = "sistema/controladores/{$this->controladorNome}Controller.php"; // procurando um arquivo
        if (file_exists($controladorArquivo)) {//se achar o arquivo
            require_once $controladorArquivo;
        } else {
            throw new Exception("O controlador '$this->controladorNome' não foi encontrada!");
        }
        $controladorClasse = "{$this->controladorNome}Controller";
        if (class_exists($controladorClasse)) {
            $this->controlador = new $controladorClasse (); //está estanciando se achar essa classe
        } else {
            throw new Exception("A classe '$controladorClasse' não foi encontrada   !");
        }
    }
    
    
    
    protected function executarAcaoDoControlador() {
        if (method_exists($this->controlador, $this->controladorAcao)) { // Verifica se contem a acao dentro deste objeto
            //call_user_method($this->controladorAcao,  $this->controlador); //chamando o metodo depois o objeto
            
            $acao = $this->controladorAcao;
            $this->controlador->$acao();
        } else {
            throw new Exception("A ação '$this->controladorAcao' não está definida em '{$this->controladorNome}Controller'");
        }
    }

    
    
}
