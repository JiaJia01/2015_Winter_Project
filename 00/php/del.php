<?php
session_start();
include'common.php';
class del{
	private $info;
	private $id;
	function __construct($info="",$id="")
	{
		$this->info=$info;
		$this->id=$id;

		if($this->info=='wz'){
			$this->delwz();
		}
		else
		{
			$this->delpl();
		}
	}
	private  function delwz(){
		$sql="delete from t_wz where id={$this->id}";
        $sql2="delete from t_pl where wzid={$this->id}";
		if($GLOBALS['dbk']->query($sql)&&$GLOBALS['dbk']->query($sql2))
		echo "<script>alert('删除成功');history.go(-2);</script>";
	}
	private function delpl(){
		$sql="delete from t_pl where id={$this->id}";
		if($GLOBALS['dbk']->query($sql))
		echo "<script>alert('删除成功');history.back();</script>";
	}
}
 $f4=new del($_GET['info'],$_GET['id']);
?>