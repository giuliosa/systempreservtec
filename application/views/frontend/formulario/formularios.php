<section class="conteudo">
  <div class="container">
    <h2><?php echo $titulo ?></h2>

    <!-- Verificar qual o tipo de usuário está logado no momento -->
    <?php if (($this->session->userdata('userLogado')->nivel_acesso)=='G') { ?>
      <!-- Criação de tabela que será visualizada apenas por quem tem o nível de gerência -->
      <table class="table table-hover">
        <tr>
          <th>Nome</th>
          <th>Resumo Descrição</th>
          <th>Data e Hora</th>
          <th>Autorizado</th>
          <th>Visualizar</th>
        </tr>


        <?php foreach ($formularios as $form) {  ?>
          <tr data-table='tabela'>
            <td data-id='<?php echo $form->id ?>'><?php echo $form->nome ?></td>
            <td data-id='<?php echo $form->id ?>'><?php echo substr($form->descricao, 0 , 40) ?></td>
            <td data-id='<?php echo $form->id ?>'><?php echo date("d/m/Y", strtotime($form->data)); ?></td>
            <?php if ($form->aprovado==1 && $form->contador==2) { ?>
              <td data-id='<?php echo $form->id ?>'>Sim</td>
            <?php } else if ($form->aprovado==0 && $form->contador==2){  ?>
              <td data-id='<?php echo $form->id ?>'>Não</td>
            <?php }else {  ?>
              <td data-id='<?php echo $form->id ?>'>-</td>
            <?php }?>
            <td >
              <a href="formularios/<?php echo $form->id ?>">
                Visualizar <i class="fa fa-pencil" aria-hidden="true"></i>
              </a>
            </td>
          </tr>
        <?php } ?>

      </table>
    <?php } else if(($this->session->userdata('userLogado')->nivel_acesso)=='C'){ ?>

      <!-- Criação de tabela que será visualizada apenas por quem tem o nível de gerência -->
      <table class="table table-hover">
        <tr>
          <th>Nome</th>
          <th>Resumo Descrição</th>
          <th>Data e Hora</th>
          <th>Autorizado</th>
          <th>Visualizar</th>
        </tr>


        <?php foreach ($form_time as $form) {  ?>
          <tr data-table='tabela'>
            <td data-id='<?php echo $form->id ?>'><?php echo $form->nome ?></td>
            <td data-id='<?php echo $form->id ?>'><?php echo substr($form->descricao, 0 , 40) ?></td>
            <td data-id='<?php echo $form->id ?>'><?php echo date("d/m/Y", strtotime($form->data)); ?></td>
            <?php if ($form->aprovado==1 && $form->contador==2) { ?>
              <td data-id='<?php echo $form->id ?>'>Sim</td>
            <?php } else if ($form->aprovado==0 && $form->contador==2){  ?>
              <td data-id='<?php echo $form->id ?>'>Não</td>
            <?php }else {  ?>
              <td data-id='<?php echo $form->id ?>'>-</td>
            <?php }?>
            <td >
              <a href="formularios/<?php echo $form->id ?>">
                Visualizar <i class="fa fa-pencil" aria-hidden="true"></i>
              </a>
            </td>
          </tr>
        <?php } ?>

      </table>
    <?php } else{ ?>
      <!-- Quem não é Gerente, vê essa tabela -->
      <button type="button" name="button" onClick="location.href='formularios/novoForm'">Adicionar novo</button>
      <table class="table">
        <tr>
          <th>Resumo Descrição</th>
          <th>Data e Hora</th>
          <th>Autorizado</th>
          <th>Visualizar</th>
          <th>Excluir</th>
        </tr>

        <?php foreach ($form_funcionario as $form) {  ?>
          <tr data-table='tabela'>
            <td ><?php echo substr($form->descricao, 0 , 40) ?></td>
            <td ><?php echo date("d/m/Y H:i:s", strtotime($form->data)); ?></td>
            <?php if ($form->aprovado==1 && $form->contador==2) { ?>
              <td >Sim</td>
            <?php } else if ($form->aprovado==0 && $form->contador==2){  ?>
              <td >Não</td>
            <?php }else {  ?>
              <td >-</td>
            <?php }?>
            <td >
              <a href="formularios/<?php echo $form->id ?>">
                Visualizar <i class="fa fa-pencil" aria-hidden="true"></i>
              </a>
            </td>
            <td data-target='excluir'>
              <a href="#" id="excluir-form" data-click='<?php echo $form->id ?>' data-type='form'>
                Excluir <i class="fa fa-trash" aria-hidden="true"></i>
              </a>
            </td>

          </tr>
        <?php } ?>


      </table>
      <?php } ?>

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
