<section class="conteudo">
  <div class="container">
    <h2><?php echo $titulo; ?></h2>

    <?php
    echo validation_errors();
    echo form_open('funcionarios/addFuncionario');
    ?>

      <label for="tipo">Nome</label> <br>
      <input type="text" name="nome"  value=""><br>

      <label for="tipo">Login</label> <br>
      <input type="text" name="login" value=""><br>

      <label for="tipo">Senha</label> <br>
      <input type="text" name="senha" value=""><br>

      <label for="tipo">Cargo</label> <br>
      <input type="text" name="cargo" value=""><br>

      <label for="tipo">E-mail</label> <br>
      <input type="email" name="email" value=""><br>

      <label for="tipo">Nível de Acesso</label> <br>
      <select name="nivel_acesso">
       <option value="O">Operador</option>
       <option value="G">Gerência</option>
      </select><br><br>

      <label for="tipo">CPF</label> <br>
      <input type="text" name="cpf" id="cpf" value=""><br>

      <label for="tipo">Data de Nascimento</label> <br>
      <input type="text" name="data" id="data" value=""><br>





      <div class="botoes">
        <button type="submit" name="button" >Adicionar</button>
        <button class="btn-branco" type="reset" name="button">Cancelar</button>
      </div>

      <?php echo form_close(); ?>

  </div>
</section>
</div>

</div>
