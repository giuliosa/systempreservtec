<section class="conteudo">
  <div class="container">
    <section class="secao-funcionario">

      <div class="descricao-funcionario">
        <?php foreach ($funcionarios as $funcionario): ?>
          <label>Nome: </label><span> <?php echo $funcionario->nome; ?></span><br>
          <label>Cargo: </label><span> <?php echo $funcionario->cargo; ?></span><br>
          <label>CPF: </label><span> <?php echo $funcionario->cpf; ?></span><br>
          <label>Data Nascimento: </label><span> <?php echo date("d/m/Y", strtotime($funcionario->data_nascimento));?></span>
        <?php endforeach; ?>

      </div>
    </section>

  </div>
</section>
</div>

</div>
