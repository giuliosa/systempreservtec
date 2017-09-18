<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">

        <title>
          Novo usuário

        </title>

        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="<?php base_url('assets/img/favicon.ico') ?>">

        <!-- Bootstrap Core CSS -->
        <link href="<?php echo base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet">

        <!-- Estilo Principal -->
        <link rel="stylesheet" href="<?php echo base_url('assets/css/main.css')?>">


    </head>
    <body>



      <section class="email">
        <div class="container">
          <header>
            <h1><?php echo $nome ?> sua conta foi cadastrada com sucesso</h1>
          </header>

          <p>Acesse agora o <a href="https://sistema.preservtec.com.br">sistema</a></p>

          <p>Login: <?php echo $login ?></p>
          <p>Senha: <?php echo $senha ?></p>

        </div>
      </section>


    </body>
    </html>
