<div class="real-body">
  <div class="left">
    <header class="left-header">
      <img class = "big-logo" src="<?php echo base_url('assets/img/logo-branco.png')?>" alt="Logo Preservtec">
      <img class = "small-logo" src="<?php echo base_url('assets/img/minibiglogo.png')?>" alt="Logo Preservtec">
    </header>

    <nav class="left-menu">

      <div>
        <a class="list-group" href="<?php echo base_url('home')?>"><i class="fa fa-home fa-fw" aria-hidden="true"></i>&nbsp; <span>Início</span></a>
        <?php if (($this->session->userdata('userLogado')->nivel_acesso)=='G') { ?>
          <a class="list-group" href="<?php echo base_url('funcionarios')?>"><i class="fa fa-user fa-fw" aria-hidden="true"></i>&nbsp; <span>Funcionários</span></a>
          <?php } ?>
        <a class="list-group" href="<?php echo base_url('financeiro')?>"><i class="fa fa-book fa-fw" aria-hidden="true"></i>&nbsp; <span>Financeiro e RH</span></a>
        <a class="list-group" href="<?php echo base_url('reembolso')?>"><i class="fa fa-usd fa-fw" aria-hidden="true"></i>&nbsp; <span>Reembolso</span></a>
        <a class="list-group" href="<?php echo base_url('relatorios')?>"><i class="fa fa-bar-chart fa-fw" aria-hidden="true"></i>&nbsp; <span>Relatórios</span></a>
        <a class="list-group" href="<?php echo base_url('formularios')?>"><i class="fa fa-list fa-fw" aria-hidden="true"></i>&nbsp; <span>Formulários</span></a>
      </div>

    </nav>

  </div>
  <div class="center">
    <!-- gambiarra -->
  </div>
