<?php

error_reporting(0);

$PDO = new PDO("sqlite:../dados/banco.db"); 

$id=$_GET['id'];

if ($_GET["confirma"] == 1)
{
$sql = $PDO->prepare("DELETE FROM noticias WHERE id=?");

$sqlExec = $sql->execute(array($id));

header("Location:index.php");
}

?>
		
<script>

if(confirm("Tem certeza que deseja excluir?"))
{
	document.location.href="excluir.php?id=<?=$id?>&confirma=1";
}
else
{
	document.location.href="index.php";
}
</script>
