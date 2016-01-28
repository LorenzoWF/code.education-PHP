<?php

  require('./config/connect.php');

  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $assunto = $_POST['assunto'];
  $mensagem = $_POST['mensagem'];

  $stmt = $conn->prepare("INSERT INTO cadastro_contato (nome, email, assunto, mensagem) VALUES (:nome, :email, :assunto, :mensagem);");
  $stmt->bindValue(":nome", $nome);
  $stmt->bindValue(":email", $email);
  $stmt->bindValue(":assunto", $assunto);
  $stmt->bindValue(":mensagem", $mensagem);
  $stmt->execute();

  echo "</br>"."<label>"."Dados enviados com sucesso, abaixo seguem os dados que voce enviou"."</label>"."</br>";

  echo "Nome:"." ".$nome."</br>";
  echo "E-mail:"." ".$email."</br>";
  echo "Assunto:"." ".$assunto."</br>";
  echo "Mensagem:"." ".$mensagem."</br>";

?>
