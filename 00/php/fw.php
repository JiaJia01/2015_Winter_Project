<?php
include'common.php';
class check{
    private $sql1;
    private $web;
    function __construct($sql)
    {
        $sql3="select * from t_wz";
        $info=$GLOBALS['dbk']->query($sql3);
        $number=$info->rowCount();
        $_SESSION['number']=($number/5)+1;
        $this->sql1=$sql;
        $message=$GLOBALS['dbk']->prepare($this->sql1);
        $message->execute();
        $this->web=$message->fetchALL(PDO::FETCH_ASSOC);
    }
    function check1($id){
        $result=0;
        $sql="select * from t_pl where wzid='{$id}'";
        $num=$GLOBALS['dbk']->query($sql);
        foreach($num as $value){
        $result++;
        }
        return $result;
    }
    function check2(){
        foreach ($this->web as $value) {
        echo "<div class='post' id='post-001'>";
        echo "<h1>".$value['title']."</h1>";
        echo "<small>".$value['sj']."|</small> <a>分类：".$value['kind']."</a>";
        echo "<div id='rensheng'><img src='../img/".$value['id'].".jpg'></div>";
        echo" <div id='comments'><a href='blog_main.php?action=article2&id=".$value['id']."'>readermore</a> <a>|</a><a>comments(".$this->check1($value['id']).")</a></div>";
        echo" </div>";
        //$value['id']."<a href='calnder.php?action=article2&id=".$value['id']."'>".$value['title']."</a>".$value['author']."<br/>";  
    }
}
   function check3(){
        $sql="select * from t_wz limit 0,3";
        $num=$GLOBALS['dbk']->query($sql);
        foreach($num as $value){
            echo"<li><a href='blog_main.php?action=article2&id=".$value['id']."' rel='bookmark' >".$value['title']."</a></li>";
        }
   }
}

?>