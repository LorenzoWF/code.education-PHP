<?php

    function fazerRota(){

      require("pages/carrega.php");

      if (isset($_GET['pesquisa'])){

        $pesquisa = $_GET['pesquisa'];

        pesquisaConteudo($pesquisa);

      } else {

        $rota = parse_url("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);

        $path = str_replace("/code_education/PHP/","",$rota['path']);

        $rotasValidas = array('','home', 'empresa', 'produtos', 'servicos', 'contato', 'recebe_contato');

        if (in_array($path,$rotasValidas)){

          if ($path == ''){
            $path = 'home';
          }

          carregaConteudo($path);

        } else{

            require("pages/404.php");

        }

      }

    }

?>

<!DOCTYPE html>
<html>
<head>
	<title>Code Education</title>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

</head>
<body>

	<div class="container">

		<div class="col-md-12">

			<div class="row cabecalho">

				<h1>Code Education - PHP Foundation</h1>

			</div>

			<div class="row menu">

        <div class="col-md-8">

          <?php require_once('pages/menu.php'); ?>

        </div>

        <div class="col-md-4">

          <form class="form-inline" action="" method="get">
            <button type="submit" class="btn btn-default">Pesquisar</button>
            <input type="text" class="form-control" name="pesquisa">
          </form>

        </div>

			</div>

			<div class="row conteudo">

				<?php fazerRota();?>

			</div>

		</div>

		<div class="navbar navbar-inverse navbar-fixed-bottom" role="navigation">
			<div class="container">
				<div class="navbar-text">

					<p>
						Todos os direitos reservados - <?php $ano=date('Y'); echo $ano;?>
					</p>

				</div>
			</div>

		</div>

	</div>

</body>
</html>
