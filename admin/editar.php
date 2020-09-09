<?php
$PDO = new PDO("sqlite:../dados/banco.db"); 

$id=$_POST['id'];
$titulo=$_POST['titulo'];
$descricao=$_POST['descricao'];
$categoria=$_POST['categoria'];
$autor=$_POST['autor'];

$sql = $PDO->prepare("UPDATE noticias SET titulo=?,descricao=?,categoria=?,autor=? WHERE id=?");

$sqlExec = $sql->execute(array($titulo,$descricao,$categoria,$autor,$id));

?>
<script>

if(confirm("Deseja alterar a imagem?"))
{
	document.location.href="frmFoto.php?id=<?=$id?>&confirma=1";
}
else
{
	document.location.href="index.php";
}
</script>