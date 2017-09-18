<section class="login-secao">
  <div class="modal-login">
    <img src="<?php echo base_url('assets/img/minibiglogo.png')?>" alt="logo">
    <?php      
      echo form_open('systempreserv/validar');
    ?>
      <label for="login">Login</label><br>
      <?php echo form_error('login');?>
      <input type="text" name="login" placeholder="ex.: joaodasneves"><br>
      <label for="senha">Senha</label><br>
      <?php echo form_error('senha');?>
      <input type="password" name="senha" placeholder="**********"><br>
      <button type="submit" class="botao-login" name="button">Entrar</button>
    <?php echo form_close(); ?>
  </div>
  <div class="foto-background foto-<?php echo rand(1,4);?>">

  </div>
</section>
