<section class="conteudo">
  <div class="corpo">
    <h2><?php echo $titulo ?></h2>

      <button type="button" name="button" onClick="location.href='funcionarios/novoFuncionario'">Adicionar novo</button>
      <div class="table-responsive">
        <table class="table table-hover">
          <tr>
            <th>Nome</th>
            <th>Cargo</th>
            <th>Excluir</th>
          </tr>

          <?php foreach ($funcionarios as $funcionario) {  ?>
            <tr data-table='tabela'>

              <td data-func='<?php echo $funcionario->id ?>' data-nome='<?php echo limpar($funcionario->nome) ?>'><?php echo $funcionario->nome ?></td>
              <td data-func='<?php echo $funcionario->id ?>' data-nome='<?php echo limpar($funcionario->nome) ?>'><?php echo $funcionario->cargo ?></td>
              <td data-target='excluir'>
                <a href="#" id="excluir-form" data-click='<?php echo md5($funcionario->id) ?>' data-type='func'>
                  Excluir <i class="fa fa-trash"> </i>
                </a>
              </td>

            </tr>
          <?php } ?>

        </table>

        <div class="modal-excluir">
          <header>
            <h4>Excluir</h4>
          </header>
          <section>
            <p>Tem certeza que deseja excluir esse funcionário?</p>
          </section>
          <div class="botoes">
            <button type="button" name="button" id="cancelar-excluir">Cancelar</button>
            <button class="btn-branco" type="button" name="button" id="confirmar-excluir" >Excluir</button>
          </div>

        </div>
      </div>

  </div>
</section>
</div>

</div>
