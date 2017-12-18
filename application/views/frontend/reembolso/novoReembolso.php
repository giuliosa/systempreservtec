<section class="conteudo">
  <div class="corpo">
    <h2><?php echo $titulo; ?></h2>

    <?php      
      echo form_open('reembolso/addReembolso');
    ?>
      <input type="hidden" name="txt-id" value="<?php echo $this->session->userdata('userLogado')->id; ?>">
      <label for="tipo">Tipo</label> <br>
      <select name="tipo">
       <option value="gasolina-c">Gasolina - Carro</option>
       <option value="gasolina-m">Gasolina - Moto</option>
       <option value="hospedagem">Hospedagem</option>
       <option value="alimentacao">Alimentação</option>
       <option value="equipamento">Equipamento</option>
       <option value="transporte">Transporte</option>
       <option value="outros">Outros</option>
      </select><br><br>

      <label for="valor">Valor</label> <br>
      <div class="input-group">
        <span class="input-group-addon"> R$ </span>
        <input type="number" name="valor">
      </div>
      <br>
      <label for="quantidade">Quilometragem/Quantidade</label> <br>
      <input type="number" name="quantidade">

      <div class="botoes">
        <button type="submit" name="button" >Adicionar</button>
        <button class="btn-branco" type="reset" name="button">Cancelar</button>
      </div>

      <?php echo form_close(); ?>

  </div>
</section>
</div>

</div>
