<?php
$PDO = new PDO("sqlite:dados/banco.db"); 
$id=$_GET['id'];
$sqlu = $PDO->prepare("UPDATE noticias SET acessos=(acessos+1) WHERE id=?");
$sqlExec = $sqlu->execute(array($id));

$sqls = $PDO->prepare("SELECT * FROM noticias WHERE id=?");
$sqlExec = $sqls->execute(array($id));
$dados = $sqls->fetch();

$sqlc = $PDO->prepare("SELECT no.* FROM noticias no WHERE no.categoria IN (SELECT n.categoria FROM noticias n WHERE n.id=?) AND no.id<>?");
$sqlExec = $sqlc->execute(array($id,$id));
$categoria = $sqlc->fetchAll();
//var_dump($dados);
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
			<div class="grid-100 mobile-grid-100" style="height:60px;background-color:#000079">
				<div class="grid-50 mobile-grid-50">
				<p id="barra"><b><a href="index.php">Página Inicial</a></b></p>
				</div>
			</div>
			
			<div class="grid-100 mobile-grid-100" align="center">
				<h1><?=$dados['titulo']?></h1>
			</div>
			<div class="grid-100 mobile-grid-100">
				<p><?=date("d/m/Y", $dados["data_add"])?> | Autor: <?=$dados['autor']?> | Acessos: <?=$dados['acessos']?></p>
				<p><a href="impressao.php?id=<?=$id?>" target="_blank">Imprimir Notícia</a></p>
			</div>
			<div class="grid-100 mobile-grid-100" align="center">
				<img src="img/<?=$dados['id']?>.jpg" width="100%" alt="imagem noticia <?=$dados['id']?>">
			</div>
			<div class="grid-100 mobile-grid-100">
				<p><?=$dados['descricao']?></p>
			</div>
			
			<div class="grid-100 mobile-grid-100">
				<p></p>
				<p></p>
			</div>
			
			<div class="grid-100 mobile-grid-100">
			<h3>Leia Mais Notícias</h3>
			</div>
			<div class="grid-100 mobile-grid-100">
			<?php
				foreach($categoria as $cat)
				{
				?>
					<p><?=date("d/m/Y",$cat["data_add"])?> | <?=$cat['categoria']?> | <a href="noticia.php?id=<?=$cat['id']?>"><b><?=$cat['titulo']?></b></a></p>
			<?php
				}
			?>
			</div>