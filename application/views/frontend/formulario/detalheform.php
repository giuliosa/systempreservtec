<section class="conteudo">
  <div class="corpo">
    <h2><?php echo $titulo ?></h2>

    <?php
      foreach ($formularios as $formulario) {

      ?>

      <label>Nome</label> <br>
      <p><?php echo $formulario->nome ?></p>

      <label>Data</label> <br>
      <p><?php echo $formulario->data ?></p>


      <?php if (!(($this->session->userdata('userLogado')->nivel_acesso)=='O') || $formulario->contador==2 ) { ?>

        <label>Descrição</label> <br>
        <p><?php echo $formulario->descricao ?></p><br>

      <?php } else{  ?>

        <?php echo form_open('formularios/editarForm');?>

          <label for="">Descrição</label> <br>
          <input type="hidden" name="txt-id-user" value="<?php echo $this->session->userdata('userLogado')->id; ?>">
          <input type="hidden" name="txt-id-form" value="<?php echo $formulario->id; ?>">

          <textarea type="text" name="txt-requisicao">
            <?php echo $formulario->descricao; ?>
          </textarea>
          <div class="botoes">
            <button type="submit" name="button" >Editar</button>
            <button class="btn-branco" type="reset" name="button">Cancelar</button>
          </div>
        <?php echo form_close(); ?>
      <?php }?>

      <?php if (($this->session->userdata('userLogado')->nivel_acesso)=='G' || ($this->session->userdata('userLogado')->nivel_acesso)=='C') { ?>
        <?php echo form_open('formularios/atualizaForm');
        if ($formulario->tipo=='solicitacao') { ?>
          <label>Aprovado</label> <br>
          <?php if ($formulario->aprovado==1 && $formulario->contador==2) {  ?>
            <input type="radio" name="aprova" value="1" disabled  checked> Sim
            <input type="radio" name="aprova" value="0" disabled> Não <br><br>
          <?php } else if($formulario->aprovado==0 && $formulario->contador==2){ ?>
            <input type="radio" name="aprova" value="1" disabled > Sim
            <input type="radio" name="aprova" value="0" disabled checked> Não <br><br>
          <?php } else{  ?>
            <input type="radio" name="aprova" value="1" > Sim
            <input type="radio" name="aprova" value="0" checked> Não <br><br>
          <?php }

          ?>


          <label>Justificativa</label> <br>
          <?php if ($formulario->contador==2 || $aprovou == 1) {  ?>
            <?php foreach ($justificativas as $just) { ?>
              <p><?php echo $just->justificativa ?></p><br>
            <?php } ?>

        <?php } else{  ?>
          <textarea class="justificativa" type="text" name="justificativa"></textarea>
          <div class="botoes">
            <button class="btn-justificativa" type="submit" name="button">Enviar</button>
            <button class="btn-branco" type="reset" name="button">Cancelar</button>
          </div>
        <?php }?>
        <input type="hidden" name="txt-id" value="<?php echo $formulario->id ?>">
        <input type="hidden" name="txt-contador" value="<?php echo $formulario->contador ?>">
        <?php } echo form_close();?>

      <?php }else { ?>

        <?php if ($formulario->tipo=='solicitacao') { ?>
        <label>Aprovado</label> <br>
        <?php if ($formulario->aprovado==1 && $formulario->contador==2) {  ?>
          <p>Sim</p>
          <!-- <input type="radio" name="aprova" value="1" disabled checked>
          <input type="radio" name="aprova" value="0" disabled> Não <br><br> -->
        <?php } else { ?>
          <p>Não</p>
          <!-- <input type="radio" name="aprova" value="1" disabled > Sim
          <input type="radio" name="aprova" value="0" disabled checked> Não <br><br> -->
        <?php } ?>


        <label>Justificativa</label> <br>
        <?php if ($formulario->contador<2){  ?>
          <p>Esperando aprovação</p><br>
        <?php } else {  ?>
          <?php foreach ($justificativas as $just) { ?>
            <p><?php echo $just->justificativa ?></p><br>
          <?php } ?>
        <?php }?>
      <?php } ?>
      <?php }?>
    <?php } ?>
  </div>
</section>
</div>

</div>
