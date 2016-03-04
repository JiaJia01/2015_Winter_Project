<?php
header("content-type:text/html;charset=utf-8");
try{
	$link="mysql:host=localhost;dbname=text";
	$root="root";
	$psd="";
	$dbk=new PDO($link,$root,$psd);
	$dbk->setAttribute(PDO::ATTR_ERRMODE,
	PDO::ERRMODE_EXCEPTION);
	$dbk->exec('set names utf8');
}
catch(PDOException $e){
	echo $e->getMessage();
}
$sql_one='select * from t_user';
$mess=$dbk->prepare($sql_one);
$mess->execute();

?>