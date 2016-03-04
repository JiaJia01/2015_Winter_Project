<?php
session_start();
include'common.php';
class resign{
	private $user;
	private $psd;
	private $yz;
	private $i=0;
	function __construct($name=" ",$psd_two=" ",$yz=" ")
	{
		$this->user=trim($name);
		$this->psd=trim($psd_two);
		$this->yz=trim($yz);
	}
    function check()
   {
   	   if(empty($this->user)||empty($this->psd)||empty($this->yz)||strtoupper($this->yz)!=$_SESSION['code'])
		{ 
			echo"<script>alert('输入错误');location.href='http://localhost/demo/de/html/blog.php';</script>";
		}
   else{
      foreach($GLOBALS['mess'] as $value)
      {
      	if($value['resignname']==$this->user)
      	{
      		$this->i=1;
      		if($value['resignpsd']==$this->psd)
      		{
      			$_SESSION['name']=$this->user;
               echo"<script>alert('登陆成功，正在为您跳转');location.href='http://localhost/demo/de/html/blog.php';</script>";
      		}
      		else
      			echo"<script>alert('密码错误');history.back();</script>";	
      	}
      }
                if($this->i==0)
      		    echo "<script>alert('账号不存在');history.back();</script>";
   }
}
}
$f=new resign($_POST['name'],$_POST['psd'],$_POST['yzm']);
$f->check();
?>