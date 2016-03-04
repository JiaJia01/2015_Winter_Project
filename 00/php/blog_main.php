<?php
include'common.php';
include'triangle.class.php';
include'checkone.class.php';
if(!isset($_GET['page1'])&&!isset($_GET['kind'])){
$_GET['page1']=1;}
else if(!isset($_GET['kind']))
$page=$_GET['page1'];
else{
	$kind=$_GET['kind'];
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>博客首页</title>
	<link type="text/css"rel="stylesheet"href="../css/bg.css"/>
	<link type="text/css"rel="stylesheet"href="../css/pro.css"/>
	<link type="text/css"rel="stylesheet"href="../css/reset.css"/>
	<script type='text/javascript' src='../js/jquery-1.7.2.min.js'></script>
	<script type='text/javascript' src='../js/01.js'></script>
    <script type="text/javascript" src='../js/ckeditor/ckeditor.js'></script>
</head>
<body>
	<div id="all">
		<div id="tree">
	 		<div id="header">
  	  			<div id="logo">
    				<h1><a title="John.Blog"><strong>
      				John.Blog    </a></h1>
  				</div>
			</div>
			<div id="content_border">
      			<div id="content">
      			<div id="daohang">
      				<div id="daohang_01">
      					<a>欢迎您：<?php if(empty($_SESSION['name']))echo"游客";else echo $_SESSION['name'];?>
      					</a>
      				</div>
      				<div id="daohang_02">
      				  <a href="blog_main.php?action=firstblog" >博客首页</a>
      				   <?php 
      				   if(isset($_SESSION['name'])) 
      				   	echo'  
      				    <a href="blog_main.php?action=article" >我的文章</a>
      				     <a href="blog_main.php?action=warticle">写文章</a>
      				     <a href="blog_main.php?action=zhuxiao">退出登陆</a>'
      				    ?>       
      				</div>
      		     	</div>
        			<div id="content_main">
                     <?php
                     if(empty($_GET['s'])&&(!isset($_GET['submit3']))){
                     error_reporting(E_ALL & ~E_NOTICE);
                     $f=new Form("blog_main.php?page1=".$page."&kind=".$kind);
                     $f->prepare();
                     echo $f;}
                     else
                     echo new checkone($_GET['s']);
				      ?> 
                     <div id="yi">
							<ul>
						   <?php
							for($i=1;$i<=$_SESSION['number'];$i++)
                            echo"<li><a href='blog.php?page=".$i."'>".$i."</a>";
							?>
							</ul>
						</div>
					</div>
				</div>
				<div id="sidebar">
					<ul>
						<li id="search" class="widget widget_search">       
						<div class="w_search">
							<form id="searchform" method="get" action="">
							<input class="stxt" type="text" value="Search" name="s" id="s" onfocus="if(this.value=='Search')this.value=''" onblur="if(this.value=='')this.value='Search'" />
							<input type="submit" name="submit3" value="Go" class="sgo" />
							</form>
            			</div>
						</li>		
						<li id="text" class="widget widget_text">			
							<strong>Who is there?</strong>			
						<div class="textwidget">Ah! A visitor! How did you get here? Well, nvm... Welcome to my blog!</div>
						</li>	
						<li id="pages" class="widget widget_pages"> 
							<h3 class="pages"><span></span>说明</h3>		
							<ul>
								<li class="page_item page-item-01"><a href="../html/about_me.html" title="About me">About me</a></li>
							</ul>
						</li>
						<li id="categories" class="widget widget_categories">
						<h3 class="categories"><span></span>文章分类</h3>		
							<ul>
								<li class="cat-item cat-item-01"><a href="blog_main.php?kind=1" title="新闻">新闻</a>
								</li>
								<li class="cat-item cat-item-02"><a href="blog_main.php?kind=2" title="项目">项目</a>
								</li>
								<li class="cat-item cat-item-03"><a href="blog_main.php?kind=3" title="项目">情感</a>
								</li>
							</ul>
							</li>
							<li id="recent-posts" class="widget widget_rrm_recent_posts">
							<h3 class="recent_entries"><span></span>最近的文章</h3>
								<ul>
								<?php
								    $sql="select * from t_wz";
								    $m=new check($sql);
									$m->check3();
								?>
								</ul>
							</li>
							<li id="linkcat-2" class="widget widget_links"><h3 class="links"><span></span>链接</h3>
								<ul>
									<li><a href="http://www.baidu.com/" title="主流搜索系统之一" target="_blank">百度搜索</a></li>
									<li><a href="http://www.1688.com/" rel="" title="主流电子商务网站" target="_blank">阿里巴巴</a></li>
									<li><a href="http://www.qq.com/" rel="" title="腾讯控股有限公司（腾讯）是一家民营IT企业，成立于1998年11月......" target="_blank">腾讯</a></li>
									<li><a href="http://www.jd.com/?cu=true&utm_source=sogou-pinzhuan&utm_medium=cpc&utm_campaign=t_288551095_sogoupinzhuan&utm_term=72c3e74a359c48598c6fabe6c1169112_0_4f12fcc297154bd183752cf7bb83645d" rel="friend co-worker colleague" title="京东[1]（JD.com）是中国最大的自营式电商企业" target="_blank">京东商城</a></li>
									<li><a href="http://hongyan.cqupt.edu.cn/" rel="friend co-worker colleague" title="　重庆邮电大学红岩网校是党委领导下的由学生自己管理的网上思想政治工作阵地。" target="_blank">红岩网校</a></li>
								</ul>
							</li>
					</ul>
				</div>
				</div>
        	</div>	
	</div>
	<div id="footer">
 		<div id="footer_inner"> 
   			<p><strong>John.Blog</strong> <span>|</span> &copy; 2016 </p>
  		</div>
	</div>
</body>
</html>