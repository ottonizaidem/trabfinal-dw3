<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <script type="text/javascript">
            var progresso = new Number();
            var maximo = new Number();
            var progresso = 0;
            var maximo = 1500;
            function start(){
                if((progresso + 1) < maximo){
                     progresso=progresso+1;
                     document.getElementById("pg").value=progresso;
                     setTimeout("start()", 1000);
                }
            }
            
        </script>
        <title></title>
    </head>
    <body onload="start();">
        <progress id="pg" max="1500"></progress>
    </body>
</html>
