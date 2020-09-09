<?php
$PDO = new PDO("sqlite:dados/banco.db"); 
$titulo=$_POST['titulo'];

$sql = $PDO->prepare("SELECT * FROM noticias where titulo LIKE ? ORDER BY id DESC");
$sql->execute(array('%'.$_POST["titulo"].'%'));
$noticias = $sql->fetchAll();	

?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta name="viewport" content="width=device-width, user-scalable=no">
        <title>K-Pop News</title>
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
		<link rel="stylesheet" href="css/normalize.css">
		<link rel="stylesheet" href="css/unsemantic-grid-responsive-no-ie7.css">
        <link rel="stylesheet" href="css/estilo.css">
	</head>
    
	<body>
		<div class="grid-container">
			<div class="grid-100 mobile-grid-100" style="background-color:#c3c3c3">
			<div class="grid-30 mobile-grid-50">
				<img src="img/logo-horizontal.jpg" width="50%" alt="logotipo kpop news">
				<p>
				<?php
				$diasemana = array('Domingo', 'Segunda-Feira', 'Terça-Feira', 'Quarta-Feira', 'Quinta-Feira', 'Sexta-Feira', 'Sabado');
				$d = date("w");
				echo $diasemana[$d];
				?>, <?=date("d/m/Y")?></p>
			</div>
			
			<div class="grid-70 mobile-grid-50">
				<h1>Notícias de K-Pop</h1>
			</div>
			</div>
			<div class="grid-100 mobile-grid-100" style="background-color:#000079">
				<div class="grid-50 mobile-grid-50">
				<p id="barra"><b><a href="index.php">Página Inicial</a></b></p>
				</div>
				<div class="grid-50 mobile-grid-50">
					<form action="pesquisa.php" method="post">
					<p id="barra" style="float:right">Pesquisar: <input type="search" name="titulo" value="<?=$_POST["titulo"]?>"> <input type="submit" value="OK"></p>
					</form>
				</div>
			</div>
			<div class="grid-100 mobile-grid-100">
			<?php
				foreach($noticias as $noti)
				{
				?>
					<p><?=date("d/m/Y",$noti["data_add"])?> | <?=$noti['categoria']?> | <a href="noticia.php?id=<?=$noti['id']?>"><b><?=$noti['titulo']?></b></a></p>
			<?php
				}
			?>
			</div>