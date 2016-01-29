<?php

  require_once 'connect.php';

  //LIMPANDO TABELAS
  $conn->query("DROP TABLE IF EXISTS usuarios;");
  $conn->query("DROP TABLE IF EXISTS conteudo;");
  $conn->query("DROP TABLE IF EXISTS paginas;");
  $conn->query("DROP TABLE IF EXISTS cadastro_contato;");


  //TABELA usuarios

  //CRIAR TABELA
  $conn->query("CREATE TABLE usuarios (
  	id_usuario INT NOT NULL AUTO_INCREMENT,
  	nome VARCHAR(20) NOT NULL,
    senha VARCHAR(32) NOT NULL,
    permissao INT NOT NULL
  	PRIMARY KEY (id_usuario)
    );"
  );

  //INSERINDO OS DADOS

  $stmt = $conn->prepare("INSERT INTO usuarios (nome, senha, permissao) VALUES (:nome, :senha, :permissao)");
  $stmt->bindValue(":nome", "admin");
  $stmt->bindValue(":senha", md5("admin"));
  $stmt->bindValue(":permissao", 1);
  $stmt->execute();


  //TABELA paginas

  //CRIAR TABELA
  $conn->query("CREATE TABLE paginas (
  	id_pagina INT NOT NULL AUTO_INCREMENT,
  	nome_pagina VARCHAR(20) NOT NULL,
    edicao INT NOT NULL,
  	PRIMARY KEY (id_pagina)
    );"
  );

  //INSERINDO DADOS
  $pagina = array('home','empresa','produtos','servicos','contato', 'edicao', 'recebe_contato');

  for ($x=0; $x<4; $x++){
    $stmt = $conn->prepare("INSERT INTO paginas (nome_pagina, edicao) VALUES (:pagina, :edicao)");
    $stmt->bindValue(":pagina", $pagina[$x]);
    $stmt->bindValue(":edicao", 1);
    $stmt->execute();
  }

  for ($x=$x; $x<7; $x++){
    $stmt = $conn->prepare("INSERT INTO paginas (nome_pagina, edicao) VALUES (:pagina, :edicao)");
    $stmt->bindValue(":pagina", $pagina[$x]);
    $stmt->bindValue(":edicao", 0);
    $stmt->execute();
  }



  //TABELA conteudo

  //CRIAR TABELA
  $conn->query("CREATE TABLE conteudo (
  	id_conteudo INT NOT NULL AUTO_INCREMENT,
  	titulo VARCHAR(15) NOT NULL,
  	conteudo VARCHAR(3600) NOT NULL,
  	pagina INT NOT NULL,
  	PRIMARY KEY (id_conteudo),
  	FOREIGN KEY (pagina) REFERENCES paginas(id_pagina));"
  );

  //INSERINDO DADOS

  $titulo = array('Home','Empresa','Produtos','Servicos','Contato', 'Edição de conteúdo', 'Recebe_contato');

  for ($x=0; $x<5; $x++){
    $stmt = $conn->prepare("INSERT INTO conteudo (titulo, conteudo, pagina) VALUES (:titulo, :conteudo, :pagina)");
    $stmt->bindValue(":titulo", $titulo[$x]);
    $stmt->bindValue(":conteudo", "Conteudo teste da página ".$pagina[$x]);
    $stmt->bindValue(":pagina", $x + 1);
    $stmt->execute();
  }

  $x++;

  $stmt = $conn->prepare("INSERT INTO conteudo (titulo, conteudo, pagina) VALUES (:titulo, :conteudo, :pagina)");
  $stmt->bindValue(":titulo", $titulo[$x]);
  $stmt->bindValue(":conteudo", "Nome;Email;Assunto;Mensagem");
  $stmt->bindValue(":pagina", $x + 1);
  $stmt->execute();


  //TABELA cadastro_contato

  //CRIAR TABELA
  $conn->query("CREATE TABLE cadastro_contato (
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
