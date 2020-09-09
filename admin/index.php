<?php
$PDO = new PDO("sqlite:../dados/banco.db"); 
error_reporting(0);
if ($_POST["titulo"])
{
$sql = $PDO->prepare("SELECT * FROM noticias where titulo LIKE ? ORDER BY id DESC");
$sql->execute(array('%'.$_POST["titulo"].'%'));
$noticias = $sql->fetchAll();	
}
else
{
$sql = $PDO->prepare("SELECT * FROM noticias order by id DESC");
$sql->execute();
$noticias = $sql->fetchAll();
}

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
				<a href="index.php"><img src="../img/logo-horizontal.jpg" width="50%" alt="logotipo kpop news"></a>
			</div>
			<div class="grid-70 mobile-grid-50">
				<h1>Cadastro de Notícias</h1>
			</div>
			</div>
			
			<div class="grid-100">
				<h2>Lista de Notícias</h2>
				<p><a href="frmAdicionar.php">+ Adicionar</a></p>
				<p><a href="index.php">Limpar Pesquisa</a></p>
				<form action="index.php" method="post">
				<p>Pesquisar por: <input type="search" name="titulo" value="<?=$_POST["titulo"]?>"> <input type="submit" value="OK"></p>
				</form>
			</div>

			<div class="grid-100">
				<table width="100%" border="1">
				<tr>
					<th class="black">ID</th>
					<th class="black">Título</th>
					<th class="black">Data Adicionada</th>
					<th class="black">Categoria</th>
					<th class="black">Acessos</th>
					<th class="black">Autor</th>
					<th class="black">Excluir?</th>
				</tr>
				<?php
					foreach($noticias as $noti)
					{
						?>
						<tr>
							<td class="black"><?=$noti["id"]?></td>
							<td><a href="frmEditar.php?id=<?=$noti["id"]?>"><?=$noti["titulo"]?></td>
							<td class="black"><?=date("d/m/Y H:i",$noti["data_add"])?></td>
							<td class="black"><?=$noti["categoria"]?></td>
							<td class="black"><?=$noti["acessos"]?></td>
							<td class="black"><?=$noti["autor"]?></td>
							<td><a href="excluir.php?id=<?=$noti["id"]?>">Excluir</a></td>
						</tr>
						<?php
					}
				?>
				</table>
			</div>
		</div>
	</body>
</html>