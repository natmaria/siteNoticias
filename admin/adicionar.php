<?php
$PDO = new PDO("sqlite:../dados/banco.db"); 

$titulo=$_POST['titulo'];
$descricao=$_POST['descricao'];
$data_add=time();
$categoria=$_POST['categoria'];
$acessos=0;
$autor=$_POST['autor'];
$sql = $PDO->prepare("INSERT INTO noticias (titulo, descricao, data_add, categoria, acessos, autor) VALUES (?,?,?,?,?,?)");
//var_dump($PDO->errorInfo());

$sqlExec = $sql->execute(array($titulo,$descricao,$data_add,$categoria,$acessos,$autor));

$id = $PDO->lastInsertId();
?>

//var_dump($id);
<script>

if(confirm("Deseja adicionar a imagem?"))
{
	document.location.href="frmFoto.php?id=<?=$id?>&confirma=1";
}
else
{
	document.location.href="index.php";
}
</script>
//header("Location:index.php");
?>

