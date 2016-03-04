<?php
include'common.php';
header("content-type:text/html;charset=utf-8");
if(isset($_POST['sbt'])){
    $user=$_POST['user'];
    $psd1=$_POST['psd1'];
    $psd2=$_POST['psd2'];
	$f=new sign($user,$psd1,$psd2);
    echo $f;
}
class sign{
	private $user;
	private $psd1;
	private $psd2;
	private $errornum=1;

	function __construct($user,$psd1,$psd2){
		if(empty(trim($user))||empty(trim($psd1))||empty(trim($psd2))){
			echo"<script>alert('请输入完整');history.back();</script>";
			$this->errornum=0;
		}
		
        else if(trim($psd1)!=trim($psd2)){
        	echo"<script>alert('两次密码输入不一致');history.back();</script>";
            $this->errornum=0;
        }
		else{
		$this->user=$user;
		$this->psd1=$psd1;
		$this->psd2=$psd2;
	        }
		}
	function __tostring(){
		if($this->errornum){
		$sql="select * from t_user where resignname='{$this->user}'";
		$info=$GLOBALS['dbk']->query($sql);
		if($info->rowCount()){
			echo"<script>alert('改用户名已经被注册');history.back();</script>";
		}
		else{
			$sql="insert into t_user(resignname,resignpsd)VALUES('{$this->user}','{$this->psd1}')";
			$info=$GLOBALS['dbk']->query($sql);
			if($info)
				echo"<script>alert('注册成功');location.href='blog.php';</script>";
			else
				echo "<script>alert('注册失败');history.back();</script>";
		}
	}
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>注册页面</title>
    <meta charset="utf-8">
</head>
<body>
        
        <form action="" method="post">
            <p><input id="user" name="user" type="text" placeholder="用户名"/></p>
            <p><input id="psd1" name="psd1" type="password" placeholder="密码"/></p>
            <p><input id="psd2" name="psd2" type="password" placeholder="验证密码"/></p>
            <!--<p><input id="eml" name="eml" type="email" placeholder="邮箱"/></p>-->
            <p><input id="sbt" name="sbt" type="submit" placeholder="提交"/></p>
        </form>
</body>
</html>
