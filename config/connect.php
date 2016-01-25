<?php

  try {

    $config = parse_ini_file('config.ini');

    $driver = $config['driver'];
    $host = $config['host'];
    $port = $config['port'];
    $dbname = $config['dbname'];
    $user = $config['user'];
    $pass = $config['pass'];

    $conn = new PDO($driver.':host='.$host.';port='.$port.';dbname='.$dbname, $user, $pass);

  } catch (\PDOException $e){

    die("Erro Código: ".$e->getCode().":" .$e->getMessage());

  }

?>
