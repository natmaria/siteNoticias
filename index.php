<?php
$PDO = new PDO("sqlite:dados/banco.db"); 
error_reporting(0);

$sql = $PDO->prepare("SELECT * FROM noticias order by id DESC LIMIT 1");
$sql->execute();
$destaque = $sql->fetchAll();

$sql1 = $PDO->prepare("SELECT * FROM noticias order by id DESC LIMIT 3 OFFSET 1");
$sql1->execute();
$grupo = $sql1->fetchAll();

$sql2 = $PDO->prepare("SELECT * FROM noticias order by id DESC LIMIT 5 OFFSET 4");
$sql2->execute();
$lista = $sql2->fetchAll();

//phpinfo();
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
				<p id="barra"><b>Página Inicial</b></p>
				</div>
				<div class="grid-50 mobile-grid-50">
					<form action="pesquisa.php" method="post">
					<p id="barra" style="float:right">Pesquisar: <input type="search" name="titulo"> <input type="submit" value="OK"></p>
					</form>
				</div>
			</div>
			<div class="grid-100 mobile-grid-100">
			<p>Em Destaque</p>
			</div>
			<?php
				foreach($destaque as $des)
				{
					?>
					<div class="grid-100 mobile-grid-100">
						<div class="grid-30 mobile-grid-100">
						<img src="img/<?=$des['id']?>.jpg" width="100%" alt="imagem noticia <?=$des['id']?>">
						</div>
						<div class="grid-70 mobile-grid-100">
						<p><?=date("d/m/Y",$des["data_add"])?> | <?=$des['categoria']?></p>
						<h1 id="noticia"><?=$des['titulo']?></h1>
						<p><?=substr($des['descricao'],0,200)?>(...)</p>
						<p><a href="noticia.php?id=<?=$des['id']?>"><b>+ Leia Mais</b></a></p>
						</div>
					</div>
			<?php
				}
			?>
			<div class="grid-100 mobile-grid-100">
			<h2>Outras Notícias</h2>
			</div>
			<div class="grid-100 mobile-grid-100">
				<?php
				foreach($grupo as $gru)
				{
					?>
						<div class="grid-33 mobile-grid-30">
						<img src="img/<?=$gru['id']?>.jpg" width="100%" alt="imagem noticia <?=$gru['id']?>">
						<p><?=date("d/m/Y",$gru["data_add"])?> | <?=$gru['categoria']?></p>
						<h3 id="noticia"><?=$gru['titulo']?></h3>
						<p><a href="noticia.php?id=<?=$gru['id']?>"><b>+ Leia Mais</b></a></p>
						</div>
			<?php
				}
			?>
			</div>
			<div class="grid-100 mobile-grid-100">
			<p></p>
			</div>
			
			<div class="grid-100 mobile-grid-100" align="center">
			<iframe allowtransparency="true" align="center" marginwidth="0" marginheight="0" hspace="0" vspace="0" frameborder="0" scrolling="no" src="https://www.cptec.inpe.br/widget/widget.php?p=2922&w=n&c=909090&f=ffffff" height="46px" width="312px"></iframe><noscript>Previs&atilde;o de <a href="http://www.cptec.inpe.br/cidades/tempo/2922">Lajeado/RS</a> oferecido por <a href="http://www.cptec.inpe.br">CPTEC/INPE</a></noscript>
			</div>
			<div class="grid-100 mobile-grid-100">
			<h2>Mais Notícias</h2>
			</div>
			<div class="grid-100 mobile-grid-100">
				<?php
				foreach($lista as $lis)
				{
					?>
						<p><?=date("d/m/Y",$lis["data_add"])?> | <?=$lis['categoria']?> | <a href="noticia.php?id=<?=$lis['id']?>"><b><?=$lis['titulo']?></b></a></p>
			<?php
				}
			?>
			</div>