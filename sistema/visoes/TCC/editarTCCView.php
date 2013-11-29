<?php
    $tcc = $this->getDado("tcc");
?>


<form method="POST">
    <label>Titulo: <input type="hidden" name="id" value="<?php echo $tcc->get_id()?>"></label>
    <label>Titulo: <input type="text" name="titulo" value="<?php echo $tcc->get_titulo()?>"></label>
    <label>Autor: <input type="text" name="autor" value="<?php echo $tcc->get_autor()?>"></label>
    <label>Data Defesa: <input type="text" name="defesa" value="<?php echo $tcc->get_defesa()?>"></label>
    <label>Resumo: <textarea type="text" name="resumo" value="<?php echo $tcc->get_resumo()?>" ></textarea></label>
    <input type="submit" value="Editar">
</form>
