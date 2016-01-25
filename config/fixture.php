<?php

  require 'connect.php';

  //TABELA HOME

  //LIMPANDO TABELA
  $conn->query("DROP TABLE IF EXISTS home;");

  //CRIAR TABELA
  $conn->query("CREATE TABLE home (
    id INT NOT NULL AUTO_INCREMENT,
    titulo VARCHAR(10) NOT NULL,
    conteudo VARCHAR(500) NOT NULL,
    PRIMARY KEY (id));"
  );

  //INSERIR DADOS

  $titulo = "Home";
  $conteudo = "Conteudo pagina home";

  $stmt = $conn->prepare("INSERT INTO home (titulo, conteudo) VALUES (:titulo, :conteudo);");
  $stmt->bindValue(":titulo", $titulo);
  $stmt->bindValue(":conteudo", $conteudo);
  $stmt->execute();


  //TABELA EMPRESA

  //LIMPANDO TABELA
  $conn->query("DROP TABLE IF EXISTS empresa;");

  //CRIAR TABELA
  $conn->query("CREATE TABLE empresa (
    id INT NOT NULL AUTO_INCREMENT,
    titulo VARCHAR(10) NOT NULL,
    conteudo VARCHAR(500) NOT NULL,
    PRIMARY KEY (id));"
  );

  //INSERIR DADOS

  $titulo = "Empresa";
  $conteudo = "Conteudo pagina empresa";

  $stmt = $conn->prepare("INSERT INTO empresa (titulo, conteudo) VALUES (:titulo, :conteudo);");
  $stmt->bindValue(":titulo", $titulo);
  $stmt->bindValue(":conteudo", $conteudo);
  $stmt->execute();


  //TABELA PRODUTOS

  //LIMPANDO TABELA
  $conn->query("DROP TABLE IF EXISTS produtos;");

  //CRIAR TABELA
  $conn->query("CREATE TABLE produtos (
    id INT NOT NULL AUTO_INCREMENT,
    titulo VARCHAR(10) NOT NULL,
    conteudo VARCHAR(500) NOT NULL,
    PRIMARY KEY (id));"
  );

  //INSERIR DADOS

  $titulo = "Produtos";
  $conteudo = "Conteudo pagina produtos";

  $stmt = $conn->prepare("INSERT INTO produtos (titulo, conteudo) VALUES (:titulo, :conteudo);");
  $stmt->bindValue(":titulo", $titulo);
  $stmt->bindValue(":conteudo", $conteudo);
  $stmt->execute();


  //TABELA SERVICOS

  //LIMPANDO TABELA
  $conn->query("DROP TABLE IF EXISTS servicos;");

  //CRIAR TABELA
  $conn->query("CREATE TABLE servicos (
    id INT NOT NULL AUTO_INCREMENT,
    titulo VARCHAR(10) NOT NULL,
    conteudo VARCHAR(500) NOT NULL,
    PRIMARY KEY (id));"
  );

  //INSERIR DADOS

  $titulo = "Servicos";
  $conteudo = "Conteudo pagina servicos";

  $stmt = $conn->prepare("INSERT INTO servicos (titulo, conteudo) VALUES (:titulo, :conteudo);");
  $stmt->bindValue(":titulo", $titulo);
  $stmt->bindValue(":conteudo", $conteudo);
  $stmt->execute();


  //TABELA CONTATO

  //LIMPANDO TABELA
  $conn->query("DROP TABLE IF EXISTS contato;");

  //CRIAR TABELA
  $conn->query("CREATE TABLE contato (
    id INT NOT NULL AUTO_INCREMENT,
    nome VARCHAR(20) NOT NULL,
    email VARCHAR(20) NOT NULL,
    assunto VARCHAR(20) NOT NULL,
    mensagem VARCHAR(200) NOT NULL,
    PRIMARY KEY (id));"
  );

  //INSERIR DADOS
  for($x=1; $x <= 5; $x++){

    $nome = "nome {$x}";
    $email = "email {$x}";
    $assunto = "assunto {$x}";
    $mensagem = "mensagem {$x}";

    $stmt = $conn->prepare("INSERT INTO contato (nome, email, assunto, mensagem) VALUES (:nome, :email, :assunto, :mensagem)");
    $stmt->bindValue(":nome", $nome);
    $stmt->bindValue(":email", $email);
    $stmt->bindValue(":assunto", $assunto);
    $stmt->bindValue(":mensagem", $mensagem);
    $stmt->execute();

  }

?>
