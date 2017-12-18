<section class="conteudo">
  <div class="corpo">
    <h2><?php echo $titulo ?></h2>

    <table class="table table-hover">
        <tr>
          <th>Tipo</th>
          <th>Data</th>
          <th>Quilometragem/Quantidade</th>
          <th>Valor</th>
          <th>Valor Informado</th>
        </tr>

        <?php foreach ($reembolsos as $reembolso) {  ?>
          <tr>
            <td><?php echo date("d/m/Y", strtotime($reembolso->data));  ?></td>
            <td><?php echo ucfirst($reembolso->tipo); ?></td>
            <td><?php echo $reembolso->quantidade; ?></td>
            <td>R$ <?php echo number_format($reembolso->valor, 2, ',', '.'); ?></td>

            <?php if ($reembolso->valor_informado == 0) { ?>
              <td><?php echo '-'; ?></td>
            <?php } else{ ?>
              <td>R$ <?php echo number_format($reembolso->valor_informado, 2, ',', '.'); ?></td>
            <?php }?>
          </tr>
        <?php } ?>

    </table>
  </div>
</section>
</div>

</div>
