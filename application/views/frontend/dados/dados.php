<section class="conteudo">
  <div class="corpo">
    <section class="secao-funcionario">
      <!-- <div class="foto-funcionario">
        <img class="funcionario" src="<?php// echo base_url('assets/img/indice.png')?>" alt="">
      </div> -->
      <div class="descricao-funcionario">
        <label>Nome: </label><span> <?php echo $this->session->userdata('userLogado')->nome; ?></span><br>
        <label>Cargo: </label><span> <?php echo $this->session->userdata('userLogado')->cargo; ?></span><br>
        <label>CPF: </label><span> <?php echo $this->session->userdata('userLogado')->cpf; ?></span><br>
        <label>Data Nascimento: </label><span> <?php echo date("d/m/Y", strtotime($this->session->userdata('userLogado')->data_nascimento));?></span>
      </div>
    </section>

    <!-- <canvas id="myChart" width="150" height="150"></canvas> -->
    <!-- <div class="chart-container" style=" height:40vh; width:50vw">
        <canvas id="myChart"></canvas>
    </div> -->

  </div>
</section>
</div>

</div>
