<?php

//Ponto de Acesso Central
require_once 'sistema/PhpTomato.php'; // importando o pacote. 

$PhpTomato = new PhpTomato(); //cria um objeto main   

$PhpTomato->executar(); //executa o sistema
