<!DOCTYPE HTML>
<HTML>
<meta charset="utf-8">
	<head><title></title>
    <link type="text/css"rel="stylesheet"href="../css/bg.css"/>
	<link type="text/css"rel="stylesheet"href="../css/pro.css"/>
	<link type="text/css"rel="stylesheet"href="../css/reset.css"/>
	<script type='text/javascript' src='../js/jquery-1.7.2.min.js'></script>
	<script type='text/javascript' src='../js/01.js'></script>
    <script type="text/javascript" src='../js/ckeditor/ckeditor.js'></script>
	</head>

<?php
header("content-type:text/html;charset=utf-8");
include'common.php';
if(isset($_GET['id'])&&isset($_GET['info'])){
$id=$_GET['id'];
$info=$_GET['info'];
$f=new mod($id,$info);
}
class mod{
	private $id;
	private $info;
	function __construct($id,$info){
		$this->id=$id;
		$this->info=$info;
		if($this->info=='wz'){
			$this->moda();
		}
		else
			$this->modv();
	}
	private function moda(){
		if(isset($_POST['submit'])){
            $title=$_POST['title'];
            $comment=$_POST['comment'];
			$sql="update t_wz set title='{$title}',content='{$comment}' where id='{$this->id}'";
		    $info=$GLOBALS['dbk']->query($sql);
		    if($info)
		    	echo"<script>alert('更新成功');history.go(-2);</script>";
		    else
		    	echo"<script>alert('更新失败');history.back();</script>";
		}
		$sql="select * from t_wz where id='{$this->id}'";
		$message=$GLOBALS['dbk']->prepare($sql);
		$message->execute();
		$info=$message->fetchALL(PDO::FETCH_ASSOC);
		foreach($info as $value){
			echo"<form action='' method='POST'>";
			echo"标题<input type='text' name='title' value='".$value['title']."'><br/>";
			echo"内容<textarea name='comment' id='comment' cols='100%' rows='10' tabindex='4'>".$value['content']."</textarea>
            <script type='text/javascript'>CKEDITOR.replace('comment');</script>";
			echo"<input type='submit' name='submit' value='提交'>";
			echo"</form>";
		}
	}
	private function modv(){
		if(isset($_POST['submit2'])){
			$content=$_POST['comment'];
			$sql="update t_pl set content='{$content}' where id='{$this->id}'";
			$info=$GLOBALS['dbk']->query($sql);
		    if($info)
		    	echo"<script>alert('更新成功');history.go(-2);</script>";
		    else
		    	echo"<script>alert('更新失败');history.back();</script>";
		}
		$sql="select* from t_pl where id='{$this->id}'";
		$message=$GLOBALS['dbk']->prepare($sql);
		$message->execute();
		$info=$message->fetchALL(PDO::FETCH_ASSOC);
		foreach($info as $value){
			echo"<form action='' method='POST'>内容";
			echo"<textarea name='comment' id='comment' cols='100%' rows='10' tabindex='4'>".$value['content']."</textarea>
            <script type='text/javascript'>CKEDITOR.replace('comment');</script>";
			echo"<input type='submit' name='submit2' value='提交'>";
			echo"</form>";
		}
	}
}