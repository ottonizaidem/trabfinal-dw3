<?php
$tccs = $this->getDado("tccs");
?>


<table border="1">
    <thead>
        <tr>
            <th>Defesa</th>
            <th>Autor</th>
            <th>Titulo</th>
            <th>Resumo</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($tccs as $item) {
            ?>
            <tr>
                <td><?php echo $item->get_defesa()?></td>
                <td><?php echo $item->get_autor()?></td>
                <td><?php echo $item->get_resumo()?></td>
                <td><a href="detalhes.html?id=<?php echo $item->get_id()?>">
                        <?php echo $item->get_titulo()?>
                </td>
                <td><a href="excluir.html?id=<?php echo $item->get_id()?>">X
                    </a>
                <td><a href="editar.html?id=<?php echo $item->get_id()?>">E
                    </a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
