<?php $datainicio = $this->getDado("data_inicio"); ?>

<center>
    <h2>Concentrado</h2>  
    <form name="crono">
        <input type="text" id="formReg" size="1" name="face" title="Cronómetro">
        <script language="JavaScript">
            var timeCrono;
            var min = <?php echo $datainicio / 60; ?>;
            var seg = <?php echo $datainicio; ?>;
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
//                if (min > 25) {
//                    location.href = '../Tomato/status.html?id=<?php echo $this->getDado("id_tomato"); ?>';
//                }

                timeCrono = ((min < 10) ? "0" : "") + min.toFixed(0);
                timeCrono += ((seg < 10) ? ":0" : ":") + seg.toFixed(0);
                document.crono.face.value = timeCrono;
                setTimeout("StartCrono()", 1000);
            }
        </script>
    </form>

    <form method="POST" action="valida.html">
        <input type=submit class="btn" value="Pausa">

    </form>
    <form method="POST" action="podre.html">

        <input type=submit class="btn" value="Pausa">

    </form>
    <form method="POST" action="pausa.html">
        <input type=submit class="btn" name="I" value="Pausa">

    </form>
</center>