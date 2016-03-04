<?php
//session_start();
//include'common.php';
//include'fw.php';
header("content-type:text/html;charset=utf-8");
include'gly.php';
?>
<!DOCTYPE HTML>
<meta charset="utf-8">
<HTML>
     <head>
     <title>blog
     </title>
     <style type="text/css">
     *{
          border-radius: 30px;
     }
     body{
          margin: 0px;
          padding: 0px;
          background-color: #f5f5f5;
     }
     #div1{
          float: left;
          width: 100%;
          height: 200px;
     }
     #div2{
          float: left;
          margin-left: auto;
          margin-right: auto;
          width: 100%;
          height: 20px;
          background-color: #f5e456;
     }
     #div3{
      float: left;
      width: 20%;
      height: 800px;
     }
     #div4{
      float:right;
      width: 20%;
      height: 800px;
     }
     #div5{
      float: left;
      width: 58%;
      height: 800px;
     }
     #img1{
          float: left;
          width: 100%;
          height: 88%;
     }
     a{
        margin-left: 78px;
        text-decoration: none;
        display: inline-block;
        width:13%;
        vertical-align:middle;
        height:20px;
        text-align: center;
        background-color: #dddddd;
        color: black;
        font-size: 15px;
    }
    a:hover{
       background-color: #f5f5f5;
       color: red;
    }
    table,tr,td{
      border-radius: 0px;
    }
    tr{
      width: 800px;
      height: 20px;
    }
    th{
    border-radius: 0px;
    background-color: #00c896;
    width: 200px;
    text-align: center;
    vertical-align: center;
    }
    td{
      background-color: #89a3c8;
      width: 550px;
      text-align: center;
      vertical-align: center;
    }
    #div_one{
      width: 100%;
      height: 20px;
      text-align: center;
      vertical-align: center;
      font-size: 15px;
      background-color: red;
      color: white;
    }
    #div_two{
      width: 100%;
      height: 350px;
      color: red;
      background-color: #f5f5f5;
      text-align: center;
      background-color: blue;
      color: white;
      overflow-y:scroll;
    }
    input[type="text"]{
      width: 100%;
      height: 20px;
      font-size: 15px;
    }
    textarea{
      
    }
     </style>
     </head>
     <body>
     <div id="div1">
     <img id='img1' src="./file/333.jpg">
     <div id="div2">
          <a>欢迎您:管理员</a>
          <a href="calnder.php?action=article" >所有文章</a>
          <a href="calnder.php?action=zhuxiao">退出登陆</a> 
     </div>
     </div>
     <div id="div3"></div>
     <div id="div4"></div>
     <div id="div5">
     <?php
     $f=new Form2("calnder.php");
     $f->prepare();
     echo $f;
     ?>
     </div>
     </body>
     </HTML>