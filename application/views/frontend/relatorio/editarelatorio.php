<section class="conteudo">
  <div class="corpo">
    <h2><?php echo $titulo ?></h2>

    <?php
    echo validation_errors();
    echo form_open('relatorios/editarMudancasRelatorio');
    ?>

    <?php foreach ($relatorio as $rel ){ ?>

      <input type="text"name="id" value="<?php echo $rel->id; ?>" hidden>

      <label for="projeto">Projeto</label>
      <input type="text" class="form-control" name="projeto" value="<?php echo $rel->projeto; ?>">

      <label for="projeto">Mídia</label>
      <input type="text" class="form-control" name="midia" value="<?php echo $rel->midia; ?>">

      <label for="projeto">Imagens</label>
      <input type="number" class="form-control" name="imagens" value="<?php echo $rel->imagens; ?>">

      <label for="projeto">Cliques</label>
      <input type="number" class="form-control" name="cliques" value="<?php echo $rel->cliques; ?>">

      <label for="projeto">Imagens de Retoma</label>
      <input type="number" class="form-control" name="imagens-retoma" value="<?php echo $rel->imagemretoma; ?>">

      <label for="projeto">Cliques de Retoma</label>
      <input type="number" class="form-control" name="cliques-retoma" value="<?php echo $rel->cliqueretoma; ?>">



      <label for="projeto">No HD?</label><br>

      <?php if ($rel->no_hd == 1){ ?>
        <input type="radio" name="nohd" value="1" checked> Sim
        <input type="radio" name="nohd" value="0" > Não <br>
      <?php } else{ ?>
        <input type="radio" name="nohd" value="1" > Sim
        <input type="radio" name="nohd" value="0" checked> Não <br>
      <?php } ?>
    <?php } ?>


      <div class="botoes">
        <button type="submit" name="button" >Enviar</button>
        <button class="btn-branco" type="button" name="button" onClick="location.href='<?php echo base_url('relatorios');?>'">Cancelar</button>
      </div>

<?php echo form_close(); ?>


  </div>
</section>
</div>

</div>
