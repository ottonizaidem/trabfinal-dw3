<?php
$tcc = $this->getDado("tcc");
var_dump($tcc);
?>

<h2>Dados Enviados</h2>
<label>Titulo: <output><?php echo $tcc->get_titulo() ?></output></label>
<label>Autor: <output><?php echo $tcc->get_autor() ?></output></label>
<label>Defesa: <output><?php echo $tcc->get_defesa() ?></output></label>
<label>Resumo: <output><?php echo $tcc->get_resumo() ?></output></label>
