<?php
$PDO = new PDO("sqlite:../dados/banco.db"); 
$id=$_GET['id'];
$sql = $PDO->prepare("SELECT * FROM noticias WHERE id=?");
$sqlExec = $sql->execute(array($id));
$dados = $sql->fetch();

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

			<div class="grid-100">
				<div  class="grid-100" style="height:10px">
					<p></p>
				</div>
				<form name="frmEditar" id="frmEditar" action="editar.php" method="post">
				<div class="grid-50">
					<label for="titulo">Título:</label>
					<input type="text" name="titulo" maxlength="300" value="<?=$dados['titulo']?>" autofocus="autofocus"required="required">
					<label for="descricao">Descrição:</label>
					<textarea name="descricao" maxlength="4000" required="required"><?=$dados['descricao']?></textarea>
					<label for="categoria">Categoria:</label>
					<select name="categoria" id="categoria" required="required">
					<option value="Girl Groups">Girl Groups</option>
					<option value="Boy Groups">Boy Groups</option>
					<option value="Mulheres Solo">Mulheres Solo</option>
					<option value="Homens Solo">Homens Solo</option>
					</select>
					<input type="text" name="autor" maxlength="150" value="<?=$dados['autor']?>" required="required">
				<div class="grid-50 mobile-grid-100">
					<input type="submit" value="Enviar"/>
				</div>
				</div>
				
				<input type="hidden" name="id" value="<?=$dados["id"]?>">

				</form>
			</div>
		
		</div>
		
		<script src="js/jquery-3.2.1.min.js"></script>
		<script src="js/jquery.mask.min.js"></script>
		<script>
		$(document).ready(function()
		{
			
			$('#categoria').val('<?=$dados["categoria"]?>');
		});
		</script>
	</body>
</html>