<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../css/meu_style.css" />
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> 
        <title>Php Tcc: <?php $this->imprimeTitulo() ?></title>
    </head>
    <body>
        <h1>Php Tcc: <?php $this->imprimeTitulo() ?></h1>
        <?php
        $this->exibirArquivoDeVisao();
        ?>

        <ul>
            <li><a href="<?=$this->link("Home")?>">HOME</a></li>
            <li><a href="<?=$this->link("TCC", "index")?>">TCC</a></li>
            <li><a href="<?=$this->link("TCC", "novo")?>">NOVO TCC</a></li>
        </ul>
    </body>
</html>
