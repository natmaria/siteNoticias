<?php 
$id=$_GET['id'];
//var_dump($dados);
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta name="viewport" content="width=device-width, user-scalable=no">
        <title>Cadastro de Notícias</title>
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
		<link rel="stylesheet" href="css/normalize.css">
		<link rel="stylesheet" href="css/unsemantic-grid-responsive-no-ie7.css">
        <link rel="stylesheet" href="css/estilo.css">
	</head>
    
	<body>
		<div class="grid-container">
			<div class="grid-100" style="background-color:#c3c3c3">
			<div class="grid-30 mobile-grid-50">
				<a href="index.php"><img src="../img/logo-horizontal.jpg" width="50%" alt="logotipo da kpop news"></a>
			</div>
			<div class="grid-70 mobile-grid-50">
				<h1>Cadastro de Notícias</h1>
			</div>
			</div>
			
			<div  class="grid-100" style="height:10px">
			<p></p>
			</div>

			<div class="grid-100 mobile-grid-100">
				<form name="frmFoto" action="fotos.php" enctype="multipart/form-data" method="post">
					<label for="imagem">Escolha a imagem:</label>
					<p> </p>
					<input type="file" name="imagens" required="required" accept=".jpg, .jpeg">
					<input type="submit">
					<input type="hidden" name="id" value="<?=$id?>">
				</form>
				
				<input type="hidden" name="id" value="<?=$id?>">

				</form>
			</div>
		
		</div>
		
	</body>
</html>