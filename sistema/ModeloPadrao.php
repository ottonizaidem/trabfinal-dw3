<?php
if (session_start()) {
    $user = $_SESSION['user'];
}
?>
<!DOCTYPE html>

<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../css/mycss.css" />
        <link rel="stylesheet" href="../css/bootstrap.css" />
        <link rel="stylesheet" href="../css/bootstrap.min.css" />
        <script src="../js/jquery.min.js"></script> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <link href="../css/login.css" rel="stylesheet">
        <!--[if lt IE 9]>
            <script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.6.1/html5shiv.js"></script>
        <![endif]-->
        <!--[if lt IE 9]>
            <script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.6.1/html5shiv.js"></script>
        <![endif]-->
        <title>Tomato | <?php $this->imprimeTitulo() ?></title>
    </head>
    <body class="" onload="starts();">
        <div class="container-narrow">
            <div class="masthead">
                <ul class="nav nav-pills pull-right">
                    <li><a href="../Home/index.html">Home</a></li>
                    <?php if ($user === null) { ?> 
                        <li><a href="../Login/login.html">Login</a></li>
                    <?php } else { ?>

                        <li><a href="../Login/logout.html">Logout</a></li>
                    <?php } ?>
                    <li><a href="#">Sobre</a></li>
                </ul>
                <h3 class="muted">Projeto Tomato</h3>
            </div>
            <hr>
            <?php
            $this->exibirArquivoDeVisao();
            ?>
            <hr>
            <div class="footer">
                <p>&copy; Company OttoniZaidem 2013</p>
            </div>
        </div> <!-- /container -->

    </body>

</html>