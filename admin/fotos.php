<?php
var_dump($_POST);
	require_once("SimpleImage.php");
	
	//var_dump($_FILES);
	$id=$_POST['id'];
	
	$image = new \claviska\SimpleImage();
	
	$image->fromFile($_FILES["imagens"]["tmp_name"]);
	if ( ($image->getHeight() >=480) && ($image->getWidth()>=640) && ($image->getOrientation() == 'landscape') )
	{
	$image->resize(640, 480);
	$image->overlay("img/logo.png", "top left", 0.6);
	$image->toFile("../img/$id.jpg","",90);
	header("Location:index.php");
	}
	else
	{
		header("Location:erro.html");
	}
?>