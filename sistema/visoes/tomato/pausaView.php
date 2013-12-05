<?php $pausa = 0; $tomato = $this->getDado("tomato"); ?>

<h3 class="text-center">Detalhes do Tomato</h3>

<table class="table table-condensed">
    <thead>
        <tr>
            <th>ID</th>
            <th>Inicio</th>
            <th>Fim</th>
            <th>Status</th>
            <th>Atividade</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?php echo $tomato->getId_tomato() ?></td>
            <td><?php echo $tomato->getDt_inicio() ?></td>
            <td><?php echo "-" ?></td>
            <td><?php 
                if ($tomato->getStatus() === "T") {
                    echo "Tomate";
                }else if($tomato->getStatus() === "P"){
                    echo "Podre";
                }else{
                    echo "Em Pausa";
                }
                ?></td>
            <td><?php echo $tomato->getId_atividade() ?></td>

            </td>
        </tr>
    </tbody>
</table>

<center>
    <h1>Pausa</h1>
    <form name="crono">
        <input type="text" id="formReg" size="1" name="face" title="Cronómetro">
        <script language="JavaScript">
            var timeCrono;
            var hor = 0;
            var min = <?php echo $pausa?>;
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
    </form>
    
</center>