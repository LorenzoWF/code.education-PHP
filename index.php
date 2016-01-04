<!DOCTYPE html>
<html>
<head>
	<title>Index</title>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

</head>
<body>

	<div class="container">

		<div class="col-md-12">

			<div class="row cabecalho">

				<h1>SITE TESTE</h1>

			</div>

			<div class="row menu">

				<?php require_once('menu.php'); ?>

			</div>

			<div class="row conteudo">

				<?php

					$paginas = array('home', 'empresa', 'produtos', 'servicos', 'contato', 'recebe_contato');


					if(isset($_GET["arquivo"])){
						if(in_array($_GET["arquivo"], $paginas)){
								require_once($_GET["arquivo"]).".php";
						} else {
							echo "</br>"."A PAGINA SOLICITADA NAO EXISTE";
						}
      				}

		        ?>

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
