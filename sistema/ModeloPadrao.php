<!DOCTYPE html>

<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../css/meu_style.css" />
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
        <meta name="author" content="">
        <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
        <!--[if lt IE 9]>
            <script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.6.1/html5shiv.js"></script>
        <![endif]-->
        <!--[if lt IE 9]>
            <script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.6.1/html5shiv.js"></script>
        <![endif]-->
        <title>Php Tcc: <?php $this->imprimeTitulo() ?></title>
    </head>
    <body class="">

        <div class="navbar navbar-default navbar-inverse navbar-static-top">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span>
                    <span class="icon-bar"></span><span class="icon-bar"></span>
                </button><a class="navbar-brand" href="index.php">Tomato</a>
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="<?= $this->link("TCC", "index") ?>">Login</a></li>
                    <li><a href="#">Registre-se</a>
                    </li>
                </ul>
            </div>
        </div>
        <?php
        $this->exibirArquivoDeVisao();
        ?>

<!--        <ul>
            <li><a href="<?= $this->link("Home") ?>">HOME</a></li>
            <li><a href="<?= $this->link("TCC", "index") ?>">TCC</a></li>
            <li><a href="<?= $this->link("TCC", "novo") ?>">NOVO TCC</a></li>
        </ul>-->
    </body>
</html>

