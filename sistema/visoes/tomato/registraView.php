<?php $datainicio = $this->getDado("data_inicio"); ?>

<!--<script type="text/javascript">
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
                        seg = Math.round(time.getTime()/1000) - start;
                        var min2 = Math.round(seg/60);
                        var seg2 = seg - min2*60;
                        console.dir(seg);
                        console.dir(min2);
                        console.dir(seg2);
                    }
                    else {
                        seg = 60 + (time.getSeconds() - start);
                    }

                    if (min > 25) {
                        location.href = '../Tomato/status.html?id=<?php echo $this->getDado("id_tomato"); ?>';
                    }

                    timeCrono = ((min < 10) ? "0" : "") + min;
                    timeCrono += ((seg < 10) ? ":0" : ":") + seg;
                    document.crono.face.value = min2 + ": " + seg2;
                    setTimeout("StartCrono()", 1000);
                }
            </script>
        </form>
        <progress id="pg" max="1500"></progress>
        
</center>-->
<center>
    <form name="crono">
        <input type="text" id="formReg" size="1" name="face" title="Cronómetro">
        <script language="JavaScript">
            var timeCrono;
            var min = <?php echo $datainicio / 60; ?>;
            var seg =  <?php echo $datainicio; ?>;
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

                if (min === 25) {
                    location.href = 'index.php';
                }

                timeCrono = ((min < 10) ? "0" : "") + min.toFixed(0);
                timeCrono += ((seg < 10) ? ":0" : ":") + seg.toFixed(0);
                document.crono.face.value = timeCrono;
                setTimeout("StartCrono()", 1000);
            }
        </script>
    </form>
</center>