<?php $datainicio = $this->getDado("data_inicio"); ?>

<center>
    <?php if($datainicio===0 || $datainicio < 25){?>
    <h2>Concentrado</h2>  
    <?php } else  { ?>
        <h2>Seu Tempo Ultrapassou, Atualize seu Tomato</h2>  
    <?php }?>
    <form name="crono">
        <input type="text" id="formReg" size="4" name="face" title="Cronómetro">
        <script language="JavaScript">
            var timeCrono;
            var hor = 0;
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
                timeCrono = ((min < 10) ? "0" : ":") + min.toFixed(0);
                timeCrono += ((seg < 10) ? ":0" : ":") + seg.toFixed(0);
                document.crono.face.value = timeCrono;
                setTimeout("StartCrono()", 1000);
            }
        </script>
    </form>
    <br/>

    <form method="POST" action="valida.html?id=<?php echo $this->getDado("id_tomato");?>">
        <input type=submit name="P" class="btn" value="Tomato">
        <input type=submit name="P" class="btn" value="Podre">
        <input type=submit class="btn" name="P" value="Pausa">
    </form>
    
</center>