<?php
include'picture.php';
if(isset($_POST['submit'])){
	$f=new picture_upload($_FILES['file2']);
	echo "<img src='../img/18.jpeg'>";
}
echo"<form action='' method='POST' enctype='multipart/form-data'>";
echo"<input type='file' name='file2'>";
echo"<input type='submit' name='submit' value='GO'>";
echo"</form>";
?> 