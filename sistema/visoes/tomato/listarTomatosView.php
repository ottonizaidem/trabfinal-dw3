    
<?php
$tomatos = $this->getDado("tomatos");
$atividade = $this->getDado("atividade");
$qtdTomato = 0;
$qtdPodre = 0;
?>


<h3 class="text-center">Detalhes do Tomato - Atividade : <?php echo $atividade->getDescricao() ?></h3>

<table class="table table-condensed">
    <thead>
        <tr>
            <th>ID</th>
            <th>Inicio</th>
            <th>Fim</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <?php foreach ($tomatos as $tomato) {
                ?>

                <td><?php echo $tomato->getId_tomato() ?></td>
                <td><?php echo $tomato->getDt_inicio() ?></td>
                <td><?php echo $tomato->getDt_fim() ?></td>
                <td><?php
                    if ($tomato->getStatus() === "T") {
                        echo "Tomate";
                        $qtdTomato++;
                    } else if ($tomato->getStatus() === "P"){
                        echo "Podre";
                        $qtdPodre++;
                    } else {
                        echo "Em Andamento";
                    }
                    ?></td>
                </td>
            </tr>
            <?php
        }
        
        ?>
    </tbody>
</table>

<blockquote><p class="text-danger">Tomatos: <?php echo $qtdTomato ?></p></blockquote>
<blockquote><p class="">Podres: <?php echo $qtdPodre ?></p></blockquote>
<blockquote><p class="text-success">Media: <?php
        if ($qtdTomato > $qtdPodre) {
            $media = $qtdTomato - $qtdPodre;
            echo $media . " Tomatos";
        }else if($qtdPodre > $qtdTomato) {
            $media = $qtdPodre - $qtdTomato;
            echo $media. " Podres";
        }else{
            echo "Mesmo Número de Podres e Tomatos";
        }
        ?></h2></blockquote>

<a href="../Atividade/nova.html" class="btn btn-primary" >Voltar para Atividades</a>