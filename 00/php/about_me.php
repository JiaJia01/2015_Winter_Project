<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>博客首页</title>
	<link type="text/css"rel="stylesheet"href="../css/bg_01.css"/>
	<link type="text/css"rel="stylesheet"href="../css/pro.css"/>
	<link type="text/css"rel="stylesheet"href="../css/reset.css"/>
	<script type='text/javascript' src='../js/jquery-1.12.0.min.js'></script>
	<script type='text/javascript' src='../js/01.js'></script>
</head>
<body>
	<div id="all">
		<div id="tree">
	 		<div id="header">
  	  			<div id="logo">
    				<h1><a title="John.Blog" href="../html/shouye.html"><strong>
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
      				  	<a href="calnder.php?action=firstblog" >博客首页</a>
      				            <?php if(isset($_SESSION['name'])) echo '  

      				               <a href="calnder.php?action=article" >我的文章</a>
      				               <a href="calnder.php?action=warticle">写文章</a>
      				               <a href="calnder.php?action=zhuxiao">退出登陆</a> '
      				            ?>
      				               
      				            
      				</div>
      				</div>
        			<div id="content_main">
						<div class="post" id="post-001_01">
							<h2>About me</h2>
										<div class="entry">
											<h3>I&#8217;m on the web</h3>
							<p><a href="http://www.behance.net">http://www.behance.net</a></p>
							<p><a href="http://www.linkedin.com">http://www.linkedin.com</a></p>
							<p><a href="http://www.facebook.com">http://www.facebook.com</a></p>
							<p><a href="http://twitter.com">http://twitter.com</a></p>
							<p><a href="http://www.thefwa.com">http://www.thefwa.com</a></p>
							<p><a href="http://www.krop.com">http://www.krop.com</a></p>
							<p><a href="http://www.coroflot.com">http://www.coroflot.com</a></p>
							<p>-</p>
							<h3>Contacts</h3>
							<p>Skype: olegnax<br />
							 E-mail: <a href="mailto:mail@John.com">mail@John.com</a><br />
							 Website: <a href="http://John.com">http://John.com</a></p>
							<p>-</p>
							<h3>Friends</h3>
							<p><a href="http://cult-f.net" target="_blank">http://cult-f.net</a></p>
							<p><a href="http://vectormonk.com" target="_blank">http://vectormonk.com (Vitaliy Onishenko)<br />
							 </a></p>
							<p><a href="http://www.mentals.com" target="_blank">http://www.mentals.com (Serge Romanyuk)</a></p>
							<p><a href="http://flashtec.net" target="_blank">http://flashtec.net (Russo &amp; Andrew)<br />
							 </a></p>
							<p><a href="http://xata33.com" target="_blank">http://xata33.com</a></p>
							<p>-</p>
							<h3>Awards</h3>
							<p>3x The FWA – SOTD</p>
							<p>Dope - Site of the month, 2x Site of the day</p>
							<p>Annual “Russian Flash Awards” 2008 category commercial</p>
							<p>Also Design licks, FcukStar, E-creative, NewWebPick, Flash Forward shortlist.</p>
							<div class="wp-pagenavi">
											
							</div>
					
					
						
					
							</div>
						</div>
					</div>

				</div>
				<div id="sidebar">
					<ul>
						<li id="search" class="widget widget_search">       
						<div class="w_search">
							<form id="searchform" method="get" action="">
							<input class="stxt" type="text" value="Search" name="s" id="s" onfocus="if(this.value=='Search')this.value=''" onblur="if(this.value=='')this.value='Search'" />
							<input type="submit" value="Go" class="sgo" />
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
								<li class="page_item page-item-01"><a href="http://localhost/php/about_me.php" title="About me">About me</a></li>
							</ul>
						</li>
						<li id="categories" class="widget widget_categories">
						<h3 class="categories"><span></span>文章分类</h3>		
							<ul>
								<li class="cat-item cat-item-01"><a href="" title="新闻">新闻</a>
								</li>
								<li class="cat-item cat-item-02"><a href="" title="项目">项目</a>
								</li>
								<li class="cat-item cat-item-03"><a href="" title="项目">情感</a>
								</li>
							</ul>
							</li>
							<li id="recent-posts" class="widget widget_rrm_recent_posts">
							<h3 class="recent_entries"><span></span>最近的文章</h3>
								<ul>
									<li><a href="http://localhost/php/rensheng.php" rel="bookmark" title="September 10, 2015">人生若只如初见</a></li>
									<li><a href="http://localhost/php/ruoshui.php" rel="bookmark" title="May 1, 2015">弱水三千，只为一人苍凉</a>
									</li>
									<li><a href="" rel="bookmark" title="March 7, 2015">Happy Women&#8217;s Day! C 8 Марта!</a></li>
									<li><a href="http://localhost/php/nanfang.php" rel="bookmark" title="March 4, 2015">​生活在南方的冬天，到底是怎样一种体验..... </a></li>
									<li><a href="http://localhost/php/meiguo.php" rel="bookmark" title="January 16, 2015">实拍：亲历美国超级风暴</a></li>
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