<?php
  session_start();
  session_destroy();

  unset($_COOKIE["edicao"]);
  setcookie("edicao","edicao",time()-1);

  header('Location: edicao');
 ?>
