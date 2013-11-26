<!DOCTYPE html>
<?php
try {
    $tempo_atual = mktime(date("m-d-Y H:i:s"));
    $tempo_permitido = 30; // tempo em segundos até redirecionar 
    if ($_COOKIE['Cookie_countdown'] == "") {
        $tempo_entrada = mktime(date("m-d-Y H:i:s"));
        $tempo_cookie = '3600'; // em segundos 
        setcookie("Cookie_countdown", "$tempo_entrada", time() + ($tempo_cookie));
    } else {
        $tempo_gravado = $_COOKIE['Cookie_countdown'];
        $tempo_gerado = $tempo_atual - $tempo_gravado;
        $fim = $tempo_permitido - $tempo_gerado;
        if ($fim <= 0) {
            echo "tempo esgotado";
        } else {
            //echo $fim; 
        }
    }
} catch (Exception $e) {
    echo "ERRO";
}
?> 

<script language="JavaScript">
    var contador = '<?php
if ($fim == "") {
    echo $tempo_permitido + 1;
} else {
    echo "$fim";
}
?>';
    function conta() {
        if (contador <= 0) {
            location.href = 'limpacookie.php';
            return false;
        }
        contador = contador - 1;
        setTimeout("conta()", 1000);
        document.getElementById("valor").innerHTML = contador;
    }
</script> 


<html>
    <head>
        <meta charset="UTF-8">
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

        <title></title>
    </head>
    <body onLoad="conta()"> 
        <div id="valor"></div> 
</html>