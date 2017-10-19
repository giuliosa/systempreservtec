<section class="conteudo">
  <div class="container">
    <h2><?php echo $titulo ?></h2>

    <?php echo form_open('formularios/addForm');?>

      <label for="">Descrição</label> <br>
      <input type="hidden" name="txt-id" value="<?php echo $this->session->userdata('userLogado')->id; ?>">
      <select name="tipo_formulario">
       <option value="solicitacao">Solicitação</option>
       <option value="comunicacao">Comunicação</option>
      </select><br>
      <textarea type="text" name="txt-requisicao"></textarea>
      <div class="botoes">
        <button type="submit" name="button" >Enviar</button>
        <button class="btn-branco" type="reset" name="button">Cancelar</button>
      </div>
    <?php echo form_close(); ?>
  </div>
</section>
</div>

</div>
