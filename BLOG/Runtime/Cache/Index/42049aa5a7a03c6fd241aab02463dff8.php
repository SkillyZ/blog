<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="keywords" content="WEB,PHP,HTML,CSS,JS,LINUX">
	<meta name="description" content="无聊你妹博客专注与分享,php,html,css,js,linux等最新前沿技术。">

	<meta name="viewport" content="width=device-width; initial-scale=1.0">
	<meta name="baidu-site-verification" content="aENMtpfXQM" />
	<title>wuliaonimei博客</title>

	<link rel="stylesheet" href="__PUBLIC__/css/resert.css"/>
	<link rel="stylesheet" href="__PUBLIC__/css/bar.css"/>
	<link rel="shortcut icon" type="image/x-icon" href="__PUBLIC__/images/favicon.ico">
	<script type="text/javascript" src="__PUBLIC__/js/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="__PUBLIC__/js/bar.js"></script>
	<script type="text/javascript" src="__PUBLIC__/js/index.js"></script>
	<style type="text/css">
	
	@media screen and (max-width: 740px)  {
		.search-content:hover{
			display:block;
		}
		.search-content{
			
			background-color:#efede9;
			border-radius: 3px;
			text-align:left;
			margin-bottom: 20px;
		}
		.search-form{
			font-size:0;
		}
		.search-form>button{
			display: inline-block;
			width: 32px;
			padding: 8px 0;
			border: 0;
			background: url(__PUBLIC__/images/icon-sprite.png) no-repeat -76px 0;
			text-indent: -9999em;
			cursor: pointer;
		}
		.search-input{
			width: 85%;
			padding: 8px 0 8px 8px;
			color: #999;
			background-color:#efede9;

		}
		.search-reault{
			color:grey;
			background-color:#efede9;
			max-width:740px;
			height: 35px;
			line-height: 35px;
			text-align: left;
			padding:0 12px;
			font-size:12px;
		}
	}
	@media screen and (min-width: 740px)  {
			.rightBar-top li{
			position:relative;
		}
		.rightBar-link:hover+.search-content{
			display: block;
		}
		.search-content:hover{
			display:block;
		}
		.search-content{
			position:absolute;
			top: 13px;
			left: -238px;
			z-index: 100;
			background-color:#e0e0dd;
			width: 238px;
			height: 52px;
			border-radius: 3px;
			display: none;
			-webkit-animation: searchInDown .5s ease both;
			-moz-animation: searchInDown .5s ease both;
			animation: searchInDown .5s ease both;
			/* -webkit-transition:transform .3s ease-in-out;
			-moz-transition:transform .3s ease-in-out;
			-o-transition:transform .3s ease-in-out;
			-ms-transition:transform .3s ease-in-out;
			transition:transform .3s all ease-in-out; */
		}
		.search-form>button{
			display: none;
		}
		.search-input{
			border: 1px solid #c5c5c2;
			width:200px;
			height: 15px;
			padding: 7px 0 8px 8px;
			margin-top: 10px;
			color: #999;

		}
		.search-reault{
			color:grey;
			background-color:#efede9;
			max-width:740px;
			height: 35px;
			line-height: 35px;
			text-align: left;
			padding:0 12px;
			font-size:14px;
		}
		@keyframes searchInDown
		{
		from {left:-270px;opacity:0;}
		to {left:-238px;opacity:1;}
		}

		@-moz-keyframes searchInDown /* Firefox */
		{
		from {left:-270px;opacity:0;}
		to {left:-238px;opacity:1;}
		}

		@-webkit-keyframes searchInDown /* Safari and Chrome */
		{
		from {left:-270px;opacity:0;}
		to {left:-238px;opacity:1;}
		}

		@-o-keyframes searchInDown /* Opera */
		{
		from {left:-270px;opacity:0;}
		to {left:-238px;opacity:1;}
		}
	}
	</style>
	
</head>
<body>
	<div class="wrap">
		<div class="leftBar-bg"></div>
		<div class="leftBar">
			<a class="leftBar-logo" href="http://<?php echo ($_SERVER['SERVER_NAME']); ?>" >
				<img src="__PUBLIC__/images/sign240x90.png"/>
			</a>
			<div class="leftBar-menu">
				<ul>
					<li>
						<a href="http://<?php echo ($_SERVER['SERVER_NAME']); ?>">首页</a>
						<span></span>
					</li>
					<!-- <li>
						<a href="#">文章</a>
						<span></span>
					</li> -->
					<li>
						<a href="#">链接</a>
						<span></span>
					</li>
					<li>
						<a href="#">关于</a>
						<span></span>
					</li>
					<li>
						<a href="#">简历与作品</a>
						<span></span>
					</li>
					<li>
						<a href="__APP__/Project" target="_blank">项目</a>
						<span></span>
					</li>
				</ul>
			</div>

			<div class="leftBar-random">
				<div class="leftBar-random-mobile">
					随机文章
				</div>
				<div class="leftBar-random-artice-wrap">
					<div class="leftBar-random-artice">
					随机文章
					<div class="leftBar-random-split"></div>
					<a class="leftBar-random-img"></a>
					</div>
					<div class="leftBar-random-loading">
						<img src="__PUBLIC__/images/loading.gif" alt="">
					</div>
					<input type="hidden" name="loadingSrc" value='<?php echo U(GROUP_NAME."/randomArticle", "");?>'>
					
					<ul>
						<!-- <li><a href="#">HTML5离线存储</a></li>
						<li><a href="#">position详解</a></li>
						<li><a href="#">几种对其方式</a></li>
						<li><a href="#">inline-block间距</a></li> -->
					</ul>
				</div>
				
			</div>
			<div class="leftBar-friend">
				<div class="leftBar-friend-artice">
					友情链接
					<div class="leftBar-friend-split"></div>
				</div>
				<ul>
					<li><a href="http://tieba.baidu.com/f?kw=mad" target="_blank">MAD吧</a></li>
					<li><a href="http://www.drawmad.com/" target="_blank">dramMAD</a></li>
					<li><a href="http://www.lenrinfvck.cn/" target="_blank">lenrinfvck</a></li>
					<li><a href="http://xifengzui.com" target="_blank">惜风醉</a></li>
				</ul>
			</div>
		</div>
		<div class="rightBar">
			<div class="rightBar-top">
				<ul>
					<li class="rightBar-search">
						<a class="rightBar-link" href="#"></a>
						<div class="search-content">
							<form action="__APP__" method="GET" class="search-form">
								
								<input type="text" name="word" class="search-input" value=""  tabindex="1" autocomplete="off" aria-autocomplete="none">
								<button type="submit">搜索</button>
							</form>
						</div>
					</li>
					<li class="rightBar-rss">
						<a class="rightBar-link" href="#"></a>
					</li>
					<li class="rightBar-weibo">
						<a class="rightBar-link" href="http://weibo.com/576771140" target="_blank"></a>
					</li>
					<li class="rightBar-tx">
						<a class="rightBar-link" href="#"></a>
					</li>
				</ul>
				
			</div>
			
			<div class="search-content">
				<form action="__APP__" method="GET" class="search-form">
					
					<input type="text" name="word" class="search-input" value=""  tabindex="1" autocomplete="off" aria-autocomplete="none">
					<button type="submit">搜索</button>
				</form>
			</div>
			<?php if($_GET['word'] != null): if($articleList == null): ?><div class="search-reault">
						<h3>对不起，没有找到与&nbsp;[<?php echo ($_GET["word"]); ?>]&nbsp;相关的搜索结果</h3>
					</div>
					<?php else: ?>
					<div class="search-reault">
						<h3>[<?php echo ($_GET["word"]); ?>]&nbsp;的搜索结果</h3>
					</div><?php endif; endif; ?>



<link rel="stylesheet" href="__PUBLIC__/css/main.css"/>

	<div class="rightBar-bottom">
		<?php if(is_array($articleList)): foreach($articleList as $key=>$article): ?><div class="rightBar-artice">
				<h1>
				<!-- __APP__/Blog?id=<?php echo ($article["id"]); ?> -->
					<a href="<?php echo U('/blog_'.$article['id']);?>"><?php echo ($article["title"]); ?></a>
				</h1>
				<p>
				<span>时间：<?php echo ($article["real_date"]); ?> </span>
				<span>分类：<?php echo ($article["catename"]); ?> </span>
				<span>标签：<?php echo ($article["tag_name"]); ?> </span>
				<span>评论：<?php echo ($article["num_comment"]); ?></span>
				</p>
				<span><?php echo ($article["short_content"]); ?>...</span>
				<br>
				<a href="<?php echo U('/blog_'.$article['id']);?>">Read More –></a>
			</div><?php endforeach; endif; ?>
	

		<div class="rightBar-page" >
			<?php echo ($page); ?>
		</div>
	</div>


				<div class="foot">
					Copyright ©2014-2015	Develop by Skilly.	Go to the Top
				</div>
		</div>
	</div>
</body>
</html>
<script type="text/javascript" src="__PUBLIC__/js/ajax-randomArticle.js"></script>