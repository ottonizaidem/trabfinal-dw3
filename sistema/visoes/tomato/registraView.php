<?php
$datainicio = $this->getDado("data_inicio");
echo $datainicio;
?>

<script type="text/javascript">
    var progresso = new Number();
    var maximo = new Number();
    var progresso = 0;
    var maximo = 1500;
    function starts() {
        if ((progresso + 1) < maximo) {
            progresso = progresso + 1;
            document.getElementById("pg").value = progresso;
            setTimeout("starts()", 1000);
        }
    }

</script>
<center>
    <h3>Concentrado</h3>
    <form name="crono" role="form">
        <input id="formReg" size="2" name="face" title="Cronómetro">
        <script language="JavaScript">
            var timeCrono;
            var min = 0;
            var seg = 0;
            var start = (<?php echo $datainicio; ?>);
            //var start = startTime.getTime();
            StartCrono();
            function StartCrono() {
                var time = new Date();
                if (time.getTime() >= start) {
                    seg = Math.round(time.getTime() / 1000) - start;
                    var min2 = Math.round(seg / 60);
                    var seg2 = seg - min2 * 60;
                    var time2 = new Date();
                    
                }
                else {
                    seg = 60 + (time.getSeconds() - start);
                }

                if (min > 25) {
                    location.href = '../Tomato/status.html?id=<?php echo $this->getDado("id_tomato"); ?>';
                }
                var time = new Date().getTime();
                var date = new Date(time);
                console.dir(date.getTime());

                timeCrono = ((min < 10) ? "0" : "") + min;
                timeCrono += ((seg < 10) ? ":0" : ":") + seg;
                document.crono.face.value = min2 + ": " + seg2;
                setTimeout("StartCrono()", 1000);
            }
        </script>
    </form>
    <progress id="pg" max="1500"></progress>

</center>