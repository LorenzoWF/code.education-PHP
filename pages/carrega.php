<?php

  function carregaConteudo($pagina) {

    if (file_exists('pages/'.$pagina.'.php')){

      require('pages/'.$pagina.".php");

    } else {

      require('./config/connect.php');

      $stmt = $conn->prepare("SELECT id_pagina FROM paginas WHERE nome_pagina = (:pagina);");
      $stmt->bindValue(":pagina", $pagina);
      $stmt->execute();

      $id = $stmt->fetch();

      $stmt = $conn->prepare("SELECT titulo, conteudo FROM conteudo WHERE pagina = :id_pagina;");
      $stmt->bindValue(":id_pagina", $id['id_pagina']);
      $stmt->execute();

      while($row = $stmt->fetch()) {
          echo "<h1>".$row['titulo']."</h1></br>";
          echo "<p>".$row['conteudo']."</p></br></br>";
      }

    }

  }

  function pesquisaConteudo($pesquisa){

    require('./config/connect.php');

    $stmt = $conn->prepare("SELECT pagina, titulo, conteudo FROM conteudo WHERE titulo LIKE :pesquisa OR conteudo LIKE :pesquisa;");
    $stmt->bindValue(":pesquisa", '%'.$pesquisa.'%');
    $stmt->execute();

    $linhas = $stmt->rowCount();

    if ($linhas == 0) {

      echo "<h1>"."Não foi possível localizar ".$pesquisa."</h1>";

    } else {

      $stmt2 = $conn->prepare("SELECT nome_pagina FROM paginas;");
      $stmt2->execute();

      $paginas = array();

      for($x=0; $row2 = $stmt2->fetch(); $x++) {

          $paginas[$x] = $row2['nome_pagina'];

      }

      echo '</br></br>';

      while($row = $stmt->fetch()) {

        echo "<a href=".$paginas[$row['pagina'] - 1].">".$row['titulo']."</a> - ".$row['conteudo'].'</br> </br>';

      }

    }

  }

?>
