<?php

    function fazerRota(){

        $rota = parse_url("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);

        $path = str_replace("/code_education/PHP/","",$rota['path']);

        $rotasValidas = array('home', 'empresa', 'produtos', 'servicos', 'contato', 'pesquisa', 'recebe_contato');

        if (in_array($path,$rotasValidas)){
			       require("pages/".$path.".php");
        } else if($path == ""){
            $path = "home";
            require("pages/".$path.".php");
        } else{
			       require("pages/404.php");
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

          <form class="form-inline" action="pages/pesquisa.php" method="post">

            <button type="submit" class="btn btn-default" name="button">Pesquisar</button>
            <input type="text" class="form-control" name="name" value="">

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
						Todos os direitos reservados -
						<?php

						$ano=date('Y');
						echo $ano;
						?>
					</p>

				</div>
			</div>

		</div>

	</div>

</body>
</html>
