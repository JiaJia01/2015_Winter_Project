<?php
//session_start();
include'common.php';
//include'fw.php';
class checkone{
	private $key;
	private $sql;
	private $info;
	private $number;
	function __construct($key=" "){
        $this->key=$key;
        $this->sql="select * from t_wz where title LIKE '%{$this->key}%'";
	    $s=$GLOBALS['dbk']->query($this->sql);
	    $this->number=$s->rowCount();
	    $message=$GLOBALS['dbk']->prepare($this->sql);
	    $message->execute();
	    $this->info=$message->fetchALL(PDO::FETCH_ASSOC);
	}
	function __tostring(){
		$input1="";
		if($this->number==0)
			$input1.="<script>alert('查不到');history.back();</script>";
	    else{
        foreach($this->info as $value){
        $sql="select * from t_wz";
        $f=new check($sql);   
        $input1.="<div class='post' id='post-001'>";
        $input1.="<h1>".$value['title']."</h1>";
        $input1.="<small>".$value['sj']."|</small> <a>分类：".$value['kind']."</a>";
        $input1.="<div id='rensheng'><img src='../img/".$value['id'].".jpg'></div>";
        $input1.="<div id='comments'><a href='blog_main.php?action=article2&id=".$value['id']."'>readermore</a> <a>|</a><a>comments(".$f->check1($value['id']).")</a></div>";
        $input1.=" </div>";
	    }
        }
        return $input1;
}
}
class checktwo{
	private $key;
	private $sql;
	private $info;
	private $number;
	function __construct($key=" "){
        $this->key=$key;
        switch ($this->key) {
        	case '1':
        		$key='新闻';
        		break;
            case '2':
        	    $key='项目';
        		break;
        	case '3':
        	     $key='情感';
        }
        $this->sql="select * from t_wz where kind='{$key}'";
	    $s=$GLOBALS['dbk']->query($this->sql);
	    $this->number=$s->rowCount();
	    $message=$GLOBALS['dbk']->prepare($this->sql);
	    $message->execute();
	    $this->info=$message->fetchALL(PDO::FETCH_ASSOC);
	}
	function __tostring(){
		$input1="";
		if($this->number==0)
			$input1.="<script>alert('查不到');history.back();</script>";
	    else{
        foreach($this->info as $value){
        $sql="select * from t_wz";
        $f=new check($sql);   
        $input1.="<div class='post' id='post-001'>";
        $input1.="<h1>".$value['title']."</h1>";
        $input1.="<small>".$value['sj']."|</small> <a>分类：".$value['kind']."</a>";
        $input1.="<div id='rensheng'><img src='../img/".$value['id'].".jpg'></div>";
        $input1.="<div id='comments'><a href='blog_main.php?action=article2&id=".$value['id']."'>readermore</a> <a>|</a><a>comments(".$f->check1($value['id']).")</a></div>";
        $input1.=" </div>";
	    }
        }
        return $input1;
}
}