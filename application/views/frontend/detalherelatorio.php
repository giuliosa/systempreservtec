<section class="conteudo">
  <div class="container">
    <h2><?php echo $titulo ?></h2>

    <table class="table table-hover">
      <tr>
        <th>Data</th>
        <th>Projeto</th>
        <th>Mídia</th>
        <th>Imagens</th>
        <th>Cliques</th>
        <th>Imagens Retoma</th>
        <th>Cliques Retoma</th>
        <th>No HD?</th>
        <th>Editar</th>
        <th>Remover</th>
      </tr>

      <?php foreach ($relatorios as $relatorio) {  ?>
        <tr>
          <td><?php echo date("d/m/Y", strtotime($relatorio->data));  ?></td>
          <td><?php echo ucfirst($relatorio->projeto); ?></td>
          <td><?php echo $relatorio->midia; ?></td>
          <td><?php echo $relatorio->imagens; ?></td>
          <td><?php echo $relatorio->cliques; ?></td>
          <td><?php echo $relatorio->imagemretoma; ?></td>
          <td><?php echo $relatorio->cliqueretoma; ?></td>
          <td>
            <?php if($relatorio->no_hd == 1){
              echo "Sim";
            } else if($relatorio->no_hd == 0){
              echo "Não";
            } else {
              echo "-";
            }?>
          </td>
          <td >
            <a href="relatorios/<?php echo $relatorio->id ?>">
              Editar <i class="fa fa-pencil" aria-hidden="true"></i>
            </a>
          </td>
          <td data-target='excluir'>
            <a href="#" id="excluir-form" data-click='<?php echo $relatorio->id; ?>' data-type='relatorio'>
              Excluir <i class="fa fa-trash" aria-hidden="true"></i>
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
        <p>Tem certeza que deseja excluir esse formulário?</p>
      </section>
      <div class="botoes">
        <button type="button" name="button" id="cancelar-excluir">Cancelar</button>
        <button class="btn-branco" type="button" name="button" id="confirmar-excluir">Excluir</button>
      </div>

    </div>
  </div>
</section>
</div>

</div>
