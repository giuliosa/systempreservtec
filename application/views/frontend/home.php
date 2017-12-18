<section class="conteudo">
  <div class="corpo">
    <?php if (($this->session->userdata('userLogado')->nivel_acesso)=='G' || ($this->session->userdata('userLogado')->nivel_acesso)=='C') { ?>
    <h2>Produção do mês de <?php echo mostrarMes(date('n')) ?></h2><br>
    <?php foreach ($relatorio_total as $key): ?>
      <div class="caixas">
        <div class="caixa caixa-usuarios">
          <h4><?php echo $key->operadores ?></h4>
          <span>Funcionários</span>
        </div>
        <div class="caixa caixa-cliques">
          <h4><?php echo $key->cliques_soma ?></h4>
          <span>Cliques Totais</span>
        </div>
        <div class="caixa caixa-imagens">
          <h4><?php echo $key->imagens_soma ?></h4>
          <span>Imagens Totais</span>
        </div>
      </div>
    <?php endforeach; ?>
      

    <?php }else{?>
      <?php foreach ($relatorio_mes as $key): ?>
        <h2>Produção do mês de <?php echo mostrarMes(date('n')) ?></h2><br>
        <span>Cliques</span>
        <div class="progress">
          <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo ($key->cliques * 100/30000).'%' ?>;">
            <?php echo $key->cliques; ?>
          </div>
        </div>
        <span>Imagens</span>
        <div class="progress">
          <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo ($key->imagens * 100/60000).'%' ?>;">
            <?php echo $key->imagens; (sucess)?>
          </div>
        </div>
      <?php endforeach; ?>
    <?php } ?>
    
    


  </div>
</section>
</div>

</div>
