<?php

class TCCController extends DefaultController {

    public function index() {
        $this->todos();
    }

    public function novo() {

        $novo_tcc = new TCC(
                $titulo = $this->getPOST("titulo"), $autor = $this->getPOST("autor"), $defesa = $this->getPOST("defesa"), $resumo = $this->getPOST("resumo")
        );

        // var_dump($_SERVER);



        $titulo = $this->getPOST("titulo");
        $autor = $this->getPOST("autor");
        $defesa = $this->getPOST("defesa");
        $resumo = $this->getPOST("resumo");

        $visao = $this->getVisao(__CLASS__, "formulario", "Cadastro de Novo TCC");

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $visao = $this->getVisao(__CLASS__, "resultado", "Resultado do POST");
            $visao->setDado("tcc", $novo_tcc);
        }
        $dao = new TCCDao();
        $dao->salvar($novo_tcc);
        $visao->exibir();
    }

    function todos() {
        $visao = $this->getVisao(__CLASS__, "listar", "Lista de TCCs");
        $dao = new TCCDaoMySqli();
        $tccs = $dao->listarTodos();

        $visao->setDado("tccs", $tccs);

        $visao->exibir();
    }

    function detalhes() {
        $id = $this->getGET("id");
        $dao = new TCCDao();
        $tccEncontrado = $dao->getById($id);

        $visao = $this->getVisao(__CLASS__, "resultado", "Detalhes do TCC");

        $visao->setDado("tcc", $tccEncontrado);

        $visao->exibir();
    }

    function excluir() {
        $id = $this->getGET("id");
        $dao = new TCCDao();
        $tcc = $dao->getById($id);
        $dao->excluir($tcc);
        $this->sendRedirect("todos.html");

        $this->todos();
    }

    function falso() {
        $this->sendRedirect("todos.html");
    }

    function editar() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = $this->getPOST("id");
            $dao = new TCCDao();
            $tcc = $dao->getById($id);
            $tcc->set_titulo($this->getPOST("titulo"));
            $tcc->set_autor($this->getPOST("autor"));
            $tcc->set_defesa($this->getPOST("defesa"));
            $tcc->set_resumo($this->getPOST("resumo"));
        } else {
            $id = $this->getGET("id");
            $dao = new TCCDao();
            $tcc = $dao->getById($id);
            $visao = $this->getVisao(__CLASS__, "formEditar", "Editar TCC de ID: {$tcc->get_id()}");
            $visao->setDado("tcc", $tcc);
            $visao->exibir();
        }
    }

}

