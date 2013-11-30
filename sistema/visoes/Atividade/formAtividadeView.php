<section id ="form">

    <h1>Atividade</h1>
    <form class="form" method="POST" action="cadastrar.html">
        <label for="cpDescricaoAtv">Descrição da Atividade:</label>
        <input class="form-control input-required" type="text" name="cpDescricao" value="" /> 

        <button class="btn" type="submit">Cadastrar</button>
    </form>

    <hr>
    
    <?php
    $atividades = $this->getDado("atividades");
    ?>
    
  
    

    <table class="table table-condensed">
        <thead>
            <tr>
                <th>ID</th>
                <th>Descrição</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($atividades as $item) {
                ?>
                <tr>
                    <td><?php echo $item->getId_atividade() ?></td>
                    <td><?php echo $item->getDescricao() ?></td>
                    <td><a href="excluir.html?id=<?php echo $item->getId_atividade() ?>">X
                        </a>
                    <a href="editar.html?id=<?php echo $item->getId_atividade() ?>"> E
                        </a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

</section>
