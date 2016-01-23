<?php

  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $assunto = $_POST['assunto'];
  $mensagem = $_POST['mensagem'];

  echo "</br>"."<label>"."Dados enviados com sucesso, abaixo seguem os dados que voce enviou"."</label>"."</br>";

  echo "Nome:"." ".$nome."</br>";
  echo "E-mail:"." ".$email."</br>";
  echo "Assunto:"." ".$assunto."</br>";
  echo "Mensagem:"." ".$mensagem."</br>";

?>
