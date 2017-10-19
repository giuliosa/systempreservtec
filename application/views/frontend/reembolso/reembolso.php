<section class="conteudo">
  <div class="container">
    <h2><?php echo $titulo ?></h2>


    <?php if (($this->session->userdata('userLogado')->nivel_acesso)=='G'||($this->session->userdata('userLogado')->nivel_acesso)=='C') { ?>


          <table class="table table-hover">
            <tr>
              <th>Funcionário</th>
            </tr>

            <?php foreach ($funcionarios as $funcionario) {  ?>

              <tr data-table='tabela'>
                <td data-num='<?php echo $funcionario->id ?>' data-funcionario='<?php echo limpar($funcionario->nome) ?>'><?php echo $funcionario->nome ?></td>
              </tr>

            <?php } ?>
          </table>
    <?php } else { ?>
    <button type="button" name="button" onClick="location.href='reembolso/novoReembolso'">Adicionar novo</button>

    <table class="table table-hover">
      <tr>
        <th>Mês</th>
        <th>Ano</th>
        <th>Valor</th>
      </tr>

      <?php foreach ($reembolso_funcionario as $reembolso) {  ?>

      <tr data-table='tabela'>
        <td data-mes='<?php echo $reembolso->mes ?>'><?php echo mostrarMes($reembolso->mes) ?></td>
        <td data-mes='<?php echo $reembolso->mes ?>'><?php echo $reembolso->ano?></td>
        <td data-mes='<?php echo $reembolso->mes ?>'><?php echo $reembolso->total ?></td>
      </tr>
      <?php } ?>
      <!-- <tr>
        <th>Total Do Reembolso</th>
        <th >5992,3</th>
      </tr> -->

    </table>
    <?php } ?>
  </div>
</section>
</div>

</div>
