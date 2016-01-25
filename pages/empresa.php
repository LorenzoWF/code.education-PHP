<?php

  require('config/connect.php');

  $stmt = $conn->prepare("SELECT * FROM empresa;");
  $stmt->execute();
  $count = $stmt->rowCount();
  $array = $stmt->fetchAll(PDO::FETCH_ASSOC);

  //print_r($conteudo);

  for ($x=0; $x < $count; $x++){
      echo "<h1>".$array[$x]['titulo']."</h1></br>";
      echo "<p>".$array[$x]['conteudo']."</p></br></br>";
  }

?>
