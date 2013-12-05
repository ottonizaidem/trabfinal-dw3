    
<?php
$atividades = $this->getDado("atividades");
?>


<section id ="form">

    <h1 class="text-center text-danger">Painel de Atividades</h1>
    <form class="form" method="POST" action="cadastrar.html">
        <label for="cpDescricaoAtv">Descrição da Atividade:</label>
        <input class="form-control input-required" type="text" name="cpDescricao" value="" /> 

        <button class="btn" type="submit">Cadastrar</button>
    </form>




    <h3 class="text-center">Lista de Atividades</h3>

    <table class="table table-condensed">
        <thead>
            <tr>
                <th>ID</th>
                <th>Descrição</th>
                <th>Start</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($atividades as $item) {
                ?>
                <tr>
                    <td><?php echo $item->getId_atividade() ?></td>
                    <td><?php echo $item->getDescricao() ?></td>
                    <td><a href="../Tomato/start.html?id=<?php echo $item->getId_atividade() ?>"><img src="../img/starticon.png" class="img-responsive"/></a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

</section>
