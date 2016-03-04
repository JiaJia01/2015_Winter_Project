<!DOCTYPE HTML>
<HTML>
<script type="text/javascript">
</script>
<?php
session_start();
include'fw.php';
include'picture.php';
class Form{
    private $action;
    private $shape;
    private $web2;
    private $number;
    private $page;
    private $kind;
function __construct($action=" "){
    $this->action=$action;
    $this->shape=isset($_GET['action'])?$_GET['action']:"article";
    $this->page=$_GET['page1'];
    if(!empty($_GET['kind'])){
    $this->kind=$_GET['kind'];
    switch ($this->kind) {
      case '1':
        $this->kind='新闻';
        break;
      case '2':
        $this->kind='项目';
        break;
      case '3':
        $this->kind='情感';
      default:
        break;
    }
    }
    $this->page=($this->page-1)*5;
    }
function __tostring(){
       $shape=$this->shape;
       $form=$this->$shape();
       return $form;
    }
function prepare(){
    $name=$_SESSION['name'];
    if(empty($_GET['kind']))
    $sql2="select * from t_wz where author='{$name}' limit $this->page,5";
    else
    $sql2="select * from t_wz where author='{$name}' and kind='{$this->kind}'";
    $message2=$GLOBALS['dbk']->prepare($sql2);
    $message2->execute();
    $this->number=$message2->rowCount();
    $this->web2=$message2->fetchALL(PDO::FETCH_ASSOC);
    }
private function article(){
  if($this->number==0){
    $input.='<font color="red">该用户暂无文章发表</font>';
  }
  else{
        foreach($this->web2 as $value2){
        $sql="select * from t_wz";
        $f=new check($sql);   
        $input.="<div class='post' id='post-001'>";
        $input.="<h1>".$value2['title']."</h1>";
        $input.="<small>".$value2['sj']."|</small> <a>分类：".$value2['kind']."</a>";
        $input.="<div id='rensheng'><img src='../img/".$value2['id'].".jpg'></div>";
        $input.=" <div id='comments'><a href='blog_main.php?action=article2&id=".$value2['id']."'>readermore</a> <a>|</a><a>comments(".$f->check1($value2['id']).")</a></div>";
        $input.=" </div>";
    }
  }
    return $input;
    }
private function article2(){
    $sql="select* from t_wz where id='{$_GET['id']}'";
    $sql2="select*from t_pl where wzid='{$_GET['id']}'";
    $info=$GLOBALS['dbk']->query($sql);
    $input.="<div class='post' id='post-005'>";
    foreach ($info as $value) {
       $author=$value['author'];
       $input.="<h1>".$value['title']."</h1>";
       $input.="<small>".$value['sj']."|"; 
       $input.="<a>分类：".$value['kind']."</a>|<a>作者:".$value['author']."</a></small><br/><br/>";  
       $input.="<div id='meiguo'>".$value['content']."</div><hr/>";
       $sql="select * from t_wz ";
       $f=new check($sql);
       $input.="<div id='comments'><h1 >".$f->check1($value['id'])."  Comments</h1></div><br/>";
       $id=$value['id'];
       if($_SESSION['name']==$author){
        $info='wz';
        $input.="<div id='comments'><a href=\"del.php?id=$id&info=$info\" onclick=\"if(confirm('确实要删除此条记录吗？')) return true;else return false; \">删除文章</a></div>"; 
        $input.="<div id='comments'><a href=\"mod.php?id=$id&info=$info\" onclick=\"if(confirm('确实要修改此条记录吗？')) return true;else return false; \">修改文章</a></div><br/><br/><br/>";
    }
    }
    if($info2=$GLOBALS['dbk']->query($sql2))
    {
        if($info2->rowCount()==0)
        $input.="暂无评论";
        else
        {
            $input.="<ol class='commentlist'>";
            foreach($info2 as $value){
             $input.="<li class='alt' id='comment-7796'>";  
             $input.="From <cite><a >".$value['name']."</a></cite>";      
             $input.="<div class='commentdata'>";     
             $input.="<p>".$value['content']."</p>";
             $input.="<div class='clear'></div></div>";
             $id=$value['id'];
                if($_SESSION['name']==$author||$_SESSION['name']==$value['name']){
                $info='pl';
                $input.="<p><a href=\"del.php?id=$id&info=$info\" onclick=\"if(confirm('确实要删除此条记录吗？')) return true;else return false; \">删除评论</a></p>";
                $input.="<p><a href=\"mod.php?id=$id&info=$info\" onclick=\"if(confirm('确实要修改此条记录吗？')) return true;else return false; \">修改评论</a></p>";
                $input.="</li>";
            }
            $input.="<hr/>";
            $input.="</ol>";

        }
        }

    $input.="<div id='respond'><h1 >Add a comment</h1></div>
    <form action='' method='post' id='commentform'>
    <fieldset>
    <label for='comment'>Comment:</label>

    <textarea name='comment' id='comment' cols='100%' rows='10' tabindex='4'></textarea>
    <script type='text/javascript'>CKEDITOR.replace('comment');</script>
    </fieldset>
    <fieldset>
    <input name='submit2' type='submit' id='submit' tabindex='5' value='Post Comment' />
    <input type='hidden' name='comment_post_ID' value='308' />
    </fieldset>

    </form>";
    $input.="</div>";

    if((!empty($_SESSION['name'])&&isset($_POST['submit2'])))
    {
        $sql="insert into t_pl(name,content,wzid)values('{$_SESSION['name']}','{$_POST['comment']}','{$_GET['id']}')";
        if($GLOBALS['dbk']->exec($sql))
            $input.="<script>alert('插入成功');;history.back();</script>";
    }
    else if(isset($_POST['submit2']))
    {
      $sql="insert into t_pl(name,content,wzid)values('游客','{$_POST['comment']}','{$_GET['id']}')";
      if($GLOBALS['dbk']->exec($sql))
      $input.="<script>alert('插入成功');</script>";
    }
    return $input;
    }
}
private function warticle(){
    if(empty($_SESSION['name']))
        $input.="<p align='center'> 对不起，请先登录</p>";
    else{
      $input.="<form action='' method='POST' id='commentform' enctype='multipart/form-data'>";
      $input.="<fieldset>";
      $input.="<center><label for='comment'>标题:</label>";
      $input.="<input type='text' name='title' size=20></center><br/>
      <select name='kind'>
          <option value='1'>情感</option>
          <option value='2'>项目</option>
          <option value='3'>新闻</option>
      </select>
      <textarea name='comment' id='comment' cols='70%' rows='20' tabindex='4'></textarea>
      <script type='text/javascript'>CKEDITOR.replace('comment');</script>
      </fieldset>
      <fieldset>
      选择图片:<input type='file' name='file'>
      <input name='submit' type='submit' id='submit' tabindex='5' value='提交文章' />
      <input type='hidden' name='comment_post_ID' value='1000000' />
      </fieldset></form>";
        if(isset($_POST['submit']))
        {
            switch ($_POST['kind']) {
                case 1:
                    $kind="情感";
                    break;
                case 2:
                    $kind="项目";
                    break;
                case 3:
                    $kind="新闻";
                default:
                    exit();
        }
            $date=date("Y-m-d H:i:s",time());
            $sql="insert into t_wz(title,content,author,kind,sj)values('{$_POST['title']}','{$_POST['comment']}','{$_SESSION['name']}','{$kind}','{$date}')";
            if(isset($_FILES['file'])){
            if($f=new picture_upload($_FILES['file'])){
            if($GLOBALS['dbk']->exec($sql))
                $input.="<script>alert('插入成功!');history.go(-2);</script>";
            }
            else
                $input.="<script>alert('插入失败');history.back();</script>";
       }
     }
    }
        return $input;
    }
private function zhuxiao(){
    $input2="<script>if(confirm('确认退出登陆吗'))
    </script>;";
    if($input2){
    $input.=session_destroy();
    $input.="<script>location.href='blog.php';</script>";
}
    return $input;
}
private function firstblog(){
    $input.="<script>location.href='blog.php';</script>";
    return $input;
}

}
?>
  </HTML>