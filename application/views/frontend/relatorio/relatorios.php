<section class="conteudo">
  <div class="corpo">
    <h2><?php echo $titulo ?></h2>


    <?php if (($this->session->userdata('userLogado')->nivel_acesso)=='G') { ?>

      <table class="table table-hover">
        <tr>
          <th>Funcionário</th>
        </tr>

        <?php foreach ($funcionarios as $funcionario) {  ?>

          <tr data-table='tabela'>
            <td data-num-relatorio='<?php echo $funcionario->id ?>' data-funcionario-relatorio='<?php echo limpar($funcionario->nome) ?>'><?php echo $funcionario->nome ?></td>
          </tr>

        <?php } ?>
      </table>

    <?php } else { ?>
      <button type="button" name="button" onClick="location.href='relatorios/novoRelatorio'">Adicionar novo</button>
      <table class="table table-hover">

        <tr>
          <th>Ano</th>
          <th>Mês</th>
          <th>Cliques</th>
          <th>Imagens</th>
        </tr>

        <?php foreach ($relatorio_funcionario as $relatorio) {  ?>

          <tr data-table='tabela'>
            <td data-mes-relatorio='<?php echo $relatorio->mes ?>'><?php echo $relatorio->ano?></td>
            <td data-mes-relatorio='<?php echo $relatorio->mes ?>'><?php echo mostrarMes($relatorio->mes) ?></td>
            <td data-mes-relatorio='<?php echo $relatorio->mes ?>'><?php echo $relatorio->cliques ?></td>
            <td data-mes-relatorio='<?php echo $relatorio->mes ?>'><?php echo $relatorio->imagens ?></td>
          </tr>

        <?php } ?>

      </table>
    <?php } ?>
  </div>
</section>
</div>

</div>
