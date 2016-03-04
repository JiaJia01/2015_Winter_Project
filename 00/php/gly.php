<?php
header("content-type:text/html;charset=utf-8");
include'common.php';
?>
<!DOCTYPE HTML>
<html>
<meta charset='utf-8'>
<head><title>mypage</title>
<style type="text/css">
<link type="text/css"rel="stylesheet"href="../css/bg.css"/>
	<link type="text/css"rel="stylesheet"href="../css/pro.css"/>
	<link type="text/css"rel="stylesheet"href="../css/reset.css"/>
	<script type='text/javascript' src='../js/jquery-1.7.2.min.js'></script>
	<script type='text/javascript' src='../js/01.js'></script>
    <script type="text/javascript" src='../js/ckeditor/ckeditor.js'></script>
#div1{
	width: 100%;
	float: left;
	height: 50px;
}	
#div_interval{
	width: 100%;
	height: 15px;
	float: left;
}
#div2{
	width: 25%;
	min-height:800px;
	float: left; 
}
#div3{
	width: 70%;
	min-height: 800px;
	float: right;
}
#div4{
	width: 60%;
    min-height: 800px;
    float: left;
}
table{
	width: 100%;
}
tr,th,td{
	text-align: center;
	line-height: 25px;
}
</style>
</head>
<body>
	<div id="div1"></div>
	<div id="div_interval"></div>
	<div id="div2"></div>
	<div id="div3">
	<div id="div4">
	<?php
    $sql="select * from t_wz";
    $message=$GLOBALS['dbk']->prepare($sql);
    $message->execute();
    $info=$message->fetchALL(PDO::FETCH_ASSOC);
    foreach ($info as $value) {
    	$info='wz';
    	$id=$value['id'];
    	echo"<table><tr><th colspan='2'>".$value['title']."</th><th>".$value['id']."</th></tr>";
    	echo"<tr><td>".$value['author']."</td><td><a href=\"del.php?id=$id&info=$info\" onclick=\"if(confirm('确实要删除此条记录吗？')) return true;else return false; \">删除文章</a></td><td><a href=\"mod.php?id=$id&info=$info\" onclick=\"if(confirm('确实要修改此条记录吗？')) return true;else return false; \">修改文章</a></td></tr>";
    	echo"</table>";
    	echo"<div id='div_interval'>";
    }
	?>
	</div>
	</div>
</body>

