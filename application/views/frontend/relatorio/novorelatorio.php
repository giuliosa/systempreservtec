<section class="conteudo">
  <div class="container">
    <h2><?php echo $titulo ?></h2>

    <?php
    echo validation_errors();
    echo form_open('relatorios/addRelatorio');
    ?>
      <label for="projeto">Projeto</label>
      <input type="text" class="form-control" name="projeto">

      <label for="projeto">Mídia</label>
      <input type="text" class="form-control" name="midia">


      <label for="projeto">Imagens</label>
      <input type="number" class="form-control" name="imagens">

      <label for="projeto">Cliques</label>
      <input type="number" class="form-control" name="cliques">

      <label for="projeto">Imagens de Retoma</label>
      <input type="number" class="form-control" name="imagens-retoma">

      <label for="projeto">Cliques de Retoma</label>
      <input type="number" class="form-control" name="cliques-retoma">


      <label for="projeto">No HD?</label><br>
      <input type="radio" name="nohd" value="1" > Sim
      <input type="radio" name="nohd" value="0" checked> Não <br>



      <div class="botoes">
        <button type="submit" name="button" >Enviar</button>
        <button class="btn-branco" type="submit" name="button" onClick="location.href='novoform.html'">Cancelar</button>
      </div>

<?php echo form_close(); ?>




  </div>
</section>
</div>

</div>
