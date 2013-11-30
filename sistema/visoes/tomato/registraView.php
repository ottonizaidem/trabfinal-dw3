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
    <h3>Registra Tomato</h3>
    <form name="crono">
        <input type="text" size="7" name="face" title="Cronómetro">
        <script language="JavaScript">
            var timeCrono;
            var min = 24;
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

                if (min === 25) {
                    location.href = '../Home/index.html';
                }

                timeCrono = ((min < 10) ? "0" : "") + min;
                timeCrono += ((seg < 10) ? ":0" : ":") + seg;
                document.crono.face.value = timeCrono;
                setTimeout("StartCrono()", 1000);
            }
        </script>
    </form>
    <progress id="pg" max="1500"></progress>
</center>