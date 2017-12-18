<section class="conteudo">
  <div class="corpo">
    <h2><?php echo $titulo ?></h2>

    <table class="table table-hover">

      <tr>
        <th>Ano</th>
        <th>Mês</th>
        <th>Cliques</th>
        <th>Imagens</th>
      </tr>

      <?php foreach ($relatorios as $relatorio) {  ?>

        <tr data-table='tabela'>
          <td data-month-relatorio='<?php echo $relatorio->mes ?>' data-func-relatorio='<?php echo $relatorio->funcionario ?>' ><?php echo $relatorio->ano?></td>
          <td data-month-relatorio='<?php echo $relatorio->mes ?>' data-func-relatorio='<?php echo $relatorio->funcionario ?>' ><?php echo mostrarMes($relatorio->mes) ?></td>
          <td data-month-relatorio='<?php echo $relatorio->mes ?>' data-func-relatorio='<?php echo $relatorio->funcionario ?>' ><?php echo $relatorio->cliques ?></td>
          <td data-month-relatorio='<?php echo $relatorio->mes ?>' data-func-relatorio='<?php echo $relatorio->funcionario ?>' ><?php echo $relatorio->imagens ?></td>
        </tr>

      <?php } ?>

    </table>
  </div>
</section>
</div>

</div>
