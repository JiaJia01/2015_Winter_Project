<?php
session_start();
include'checkone.class.php';
include'fw.php';
if(!isset($_GET['page'])||$_GET['page']==1){
$sql3="select * from t_wz limit 0,5";}
else if($_GET['page']>1){
$number=$_GET['page']-1;
$number=$number*5;
$sql3="select * from t_wz limit ".$number.",5";	
}
else
$sql3="select * from t_wz limit 0,5";
$f=new check($sql3);
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
<script type="text/javascript">
	function newcode(obj,url){
		obj.src=url+'?nowtime'+ new Date().getTime();
	}
</script></head>
<body>
	<div id="all">
	<?php
	    if(empty($_SESSION['name'])){
	    	echo"<a class='first'>欢迎您:游客</a>";
		    echo"<a href='zhuce_02.php' class='first'>博客注册</a>";
		    echo"<a href='' class='first'>管理员登陆</a>";
	      }
	      else{
	      	echo"<a class='first'>欢迎您:".$_SESSION['name']."</a>";
	      	echo"<a href='blog_main.php' class='first'>我的博客</a>";
	      	echo"<a href='zhuce_02.php' class='first'>博客注册</a>";
	      }
    ?>
		<div id="tree">
	 		<div id="header">
  	  			<div id="logo">
    				<h1><a title="John.Blog" href=" "><strong>
      				John.Blog    </a></h1>
  				</div>
			</div>
			<div id="content_border">
			<?php
			if(empty($_SESSION['name'])){
				echo"<p>&nbsp请登录:</p>";
				echo"&nbsp<form action='resign.php' method='POST'>";
				echo"&nbsp用户名:<input type='text' name='name' size=25><br/><br/>";
				echo"&nbsp密&nbsp码:<input type='text' name='psd' size=25><br/><br/>";
				echo"&nbsp;验证码:<input type='text' name='yzm' size=5>";
				echo'<img src="yzm.php" alt="看不清，换一张" style="curson:pointer;" onclick="javascript:newgdcode(this,this.src);"/><br/><input type="submit" name="submit" value="提交">';
				echo"</form>";
			}
			?>
      			<div id="content">
        			<div id="content_main">
        			<?php
        			if(!isset($_GET['submit4'])&&(empty($_GET['s']))&&!isset($_GET['kind']))
                     $f->check2();
                     else if(!isset($_GET['kind']))
                     echo new checkone($_GET['s']);
                 else
                 	echo new checktwo($_GET['kind']);
        			?>
						<div id="yi">
							<ul>
							<?php
							for($i=1;$i<=$_SESSION['number'];$i++)
                            echo"<li><a href='blog.php?page=".$i."'>".$i."</a>"
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
							<input type="submit" name="submit4" value="Go" class="sgo" />
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
								<li class="page_item page-item-01"><a href="about_me.php" title="About me">About me</a></li>
							</ul>
						</li>
						<li id="categories" class="widget widget_categories">
						<h3 class="categories"><span></span>文章分类</h3>		
							<ul>
								<li class="cat-item cat-item-01"><a href="blog.php?kind=1" title="新闻">新闻</a>
								</li>
								<li class="cat-item cat-item-02"><a href="blog.php?kind=2" title="项目">项目</a>
								</li>
								<li class="cat-item cat-item-03"><a href="blog.php?kind=3" title="项目">情感</a>
								</li>
							</ul>
							</li>
							<li id="recent-posts" class="widget widget_rrm_recent_posts">
							<h3 class="recent_entries"><span></span>最近的文章</h3>
								<ul>
									<?php 
									$f->check3();
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