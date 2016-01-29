<script src="ckeditor/ckeditor.js"></script>

<?php

  require('./config/connect.php');

  if(isset($_POST['x']) and isset($_POST['y'])){

    $x = $_POST['x'];
    $y = $_POST['y'];

    if (isset($_POST['editor'.$x.$y])){

      $textarea = $_POST['editor'.$x.$y];
      $id_conteudo = $_POST['id_conteudo'];

      $stmt3 = $conn->prepare("UPDATE conteudo SET conteudo = :textarea WHERE id_conteudo = :id_conteudo");
      $stmt3->bindValue(":textarea", $textarea);
      $stmt3->bindValue(":id_conteudo", $id_conteudo);
      $stmt3->execute();

    }

  }

  $stmt = $conn->prepare("SELECT * FROM paginas WHERE edicao = 1;");
  $stmt->execute();

  echo '</br></br>';

  for($x=0; $row = $stmt->fetch(); $x++) {

    $stmt2 = $conn->prepare("SELECT * FROM conteudo WHERE pagina = :num_pagina");
    $stmt2->bindValue(":num_pagina", $row['id_pagina']);
    $stmt2->execute();

    for($y=0; $row2 = $stmt2->fetch(); $y++){

      $id_conteudo = $row2['id_conteudo'];

    ?>

      <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        <div class="panel panel-default">
          <div class="panel-heading" role="tab" id="headingOne">
            <h4 class="panel-title">
              <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $x.$y?>" aria-expanded="true" aria-controls="collapseOne">
                <?php

                  echo "Página: ".$row['nome_pagina']." Titulo do Post: ".$row2['titulo'];

                ?>
              </a>
            </h4>
          </div>
          <div id="collapse<?php echo $x.$y?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
            <div class="panel-body">

              <form name="ckeditor" method="post" action="edicao">
                  <textarea name="editor<?php echo $x.$y?>" id="editor<?php echo $x?>" rows="10" cols="80">
                      <?php echo $row2['conteudo']; ?>
                  </textarea>
                  <br>
                  <button type="submit" class="btn btn-default" name="salva_edicao">Salvar Edição</button>
                  <input type="number" name="x" autocomplete="off" value="<?php echo $x?>">
                  <input type="number" name="y" autocomplete="off" value="<?php echo $y?>">
                  <input type="number" name="id_conteudo" autocomplete="off" value="<?php echo $id_conteudo?>">
                  <script>
                      CKEDITOR.replace( 'editor<?php echo $x.$y?>' );
                  </script>
              </form>

            </div>
          </div>
        </div>
      </div>

    <?php

    }

  }

?>
