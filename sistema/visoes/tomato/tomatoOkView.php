<?php
$tomato = $this->getDado("tomato");
?>

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
            <td><?php echo $tomato->getDt_fim() ?></td>
            <td><?php
                if ($tomato->getStatus() === "T") {
                    echo "Tomate";
                }else{
                    echo "Podre";
                }
                ?></td>
            <td><?php echo $tomato->getId_atividade() ?></td>

            </td>
        </tr>
    </tbody>
</table>

<a href="../Atividade/nova.html" class="btn btn-primary" >Voltar para Atividades</a>
