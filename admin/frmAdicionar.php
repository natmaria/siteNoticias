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
				<a href="index.php"><img src="../img/logo-horizontal.jpg" width="50%" alt="logotipo de kpop news"></a>
			</div>
			<div class="grid-70 mobile-grid-50">
				<h1>Cadastro de Notícias</h1>
			</div>
			</div>
			
			<div  class="grid-100" style="height:10px">
			<p></p>
			</div>
			<div class="grid-100">
	
				<form name="frmAdicionar" id ="frmAdicionar" action="adicionar.php" method="post">
				<div class="grid-50">
					<label for="titulo">Título:</label>
					<input type="text" name="titulo" maxlength="300" placeholder="Digite o título" autofocus="autofocus"required="required">
					<label for="descricao">Descrição:</label>
					<textarea name="descricao" maxlength="4000" placeholder="Digite a descrição"required="required"></textarea>
					<label for="categoria">Categoria:</label>
					<select form="frmAdicionar" name="categoria" required="required">
					<option value="Girl Groups">Girl Groups</option>
					<option value="Boy Groups">Boy Groups</option>
					<option value="Mulheres Solo">Mulheres Solo</option>
					<option value="Homens Solo">Homens Solo</option>
					</select>
					<input type="text" name="autor" maxlength="150" placeholder="Digite o autor" required="required">	
				
				<div class="grid-50 mobile-grid-100">
					<input type="submit" value="Enviar"/>
				</div>
				</div>
				</form>
			</div>
		
		</div>
		
	</body>
</html>