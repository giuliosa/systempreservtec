<section class="conteudo">
  <div class="corpo">
    <h2><?php echo $titulo ?></h2>

    <div class="row corpo">

      <div class="col-70">

        <?php if (($this->session->userdata('userLogado')->nivel_acesso)=='G'||($this->session->userdata('userLogado')->nivel_acesso)=='C') { ?>
          <form enctype="multipart/form-data" action="financeiro/guardarArquivo" method="post">
            <label >Descrição</label><br>
            <input type="text" name="titulo" size="30"><br>
            <label >Tipo de arquivo</label><br>
            <select name="tipo">
              <option value="contracheque">Contracheque</option>
              <option value="contrato">Contrato</option>
              <option value="contrato">Outros</option>
            </select><br>

            <label >Funcionário</label><br>
            <select name="id">

              <?php foreach ($funcionarios as $funcionario) { ?>
                <option value="<?php echo $funcionario->id?>"><?php echo $funcionario->nome ?></option>
              <?php } ?>
            </select><br>
            <label >Arquivo</label> <input class="input-arquivo" type="file" name="arquivo">

            <p>Data: <input type="text" name="data" id="datepicker"></p>

            <input class="btn" type="submit" value="Enviar arquivo">

          </form>
        <?php } else{ ?>
          <form enctype="multipart/form-data" action="financeiro/enviarAtestado" method="post">
            <label >Atestado Médico</label><br>
            <label >Descrição</label><br>
            <input type="text" name="titulo" size="30"><br>
            <select hidden name="tipo">
              <option value="atestado"></option>
            </select><br>
            <label >Arquivo</label> <input type="file" name="arquivo"><br>

            <input ctype="text"name="id" value="<?php echo $this->session->userdata('userLogado')->id?>" hidden>

            <input class="btn" type="submit" value="Enviar arquivo">

          </form>
        <?php } ?>


      </div>

      <div class="col-30">
        <label>Memorando Interno</label>

        <div class="table-responsive">

          <table class="table table-hover">

            <tr>
              <th>Data</th>
            </tr>

            <tr>
              <td><a href="https://drive.google.com/file/d/0B_HNQ-mD0IBXSUJHQXhWNThSOGc/view?usp=sharing"  target="_blank">31/05/2017</a></td>
            </tr>

            <tr>
              <td><a href="https://drive.google.com/file/d/0B_HNQ-mD0IBXUVhOeWt5d3JXLXM/view?usp=sharing"  target="_blank">18/05/2017</a></td>
            </tr>

          </table>

        </div>
      </div>

    </div>

    <?php if (($this->session->userdata('userLogado')->nivel_acesso)=='O') { ?>
      <div class="table-responsive">

        <table class="table table-hover">

          <tr>
            <th>Titulo</th>
            <th>Data</th>
            <th>Download</th>
          </tr>
          <?php foreach ($arquivos as $arquivo) { ?>

            <tr>
              <td><?php echo $arquivo->titulo ?></td>
              <td><?php echo $arquivo->data ?></td>
              <td>
                <a href="downloadArquivo/<?php echo $arquivo->id ?>"  target="_blank">
                  Download <i class="fa fa-download" aria-hidden="true"></i>
                </a>
              </td>
            </tr>
          <?php }    ?>

        </table>

      </div>
    <?php } ?>










  </div>
</section>
</div>

</div>
