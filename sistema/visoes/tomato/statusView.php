<script type="text/javascript">
    var progresso = new Number();
    var maximo = new Number();
    var progresso = 0;
    var maximo = 300;
    function starts() {
        if ((progresso + 1) < maximo) {
            progresso = progresso + 1;
            document.getElementById("pg").value = progresso;
            setTimeout("starts()", 1000);
        }
    }

</script>
<center>
    <h3>Pausa</h3>
        <form name="crono" role="form">
            <input id="formReg" size="2" name="face" title="Cronómetro">
            <script language="JavaScript">
                var timeCrono;
                var min = 4;
                var seg = 0;
                var startTime = new Date();
                var start = startTime.getSeconds();
                StartCrono();
                function StartCrono() {
                    if (seg + 1 > 59) {
                        min += 1;
                    }
                    if (min > 59) {
                        min = 0;
                        hor += 1;
                    }
                    var time = new Date();
                    if (time.getSeconds() >= start) {
                        seg = time.getSeconds() - start;
                    }
                    else {
                        seg = 60 + (time.getSeconds() - start);
                    }

                    if (min === 5) {
                        location.href = '../Tomato/status.html?id=<?php echo $this->getDado("id_tomato"); ?>';
                    }

                    timeCrono = ((min < 10) ? "0" : "") + min;
                    timeCrono += ((seg < 10) ? ":0" : ":") + seg;
                    document.crono.face.value = timeCrono;
                    setTimeout("StartCrono()", 1000);
                }
                min;
            </script>
        </form>
        <progress id="pg" max="300"></progress>
</center>

<h4>Status do Tomato</h4>
<form class="form" action="" method="post">
    <label class="radio">
        <input type="radio" name="optionsRadios" id="optionsRadios1" value="tomato" checked>
        Tomato - Se concluido com sucesso.
    </label>
    <label class="radio">
        <input type="radio" name="optionsRadios" id="optionsRadios2" value="podre">
        Podre - Se ocorreu interrupções.
    </label>
    <button class="btn btn-primary" type="submit">Registrar</button>
</form>
