<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<!-- 必须加这句话 
width – viewport的宽度
height – viewport的高度
initial-scale – 初始的缩放比例
minimum-scale – 允许用户缩放到的最小比例
maximum-scale – 允许用户缩放到的最大比例
user-scalable – 用户是否可以手动缩放
-->
<meta name="keywords" content="WEB,PHP,HTML,CSS,wuliaonimei">
<meta name="viewport" content="width=device-width; initial-scale=1.0">
<meta charset="utf-8">
<title>wuliaonimei项目网站</title>
</head>
<link rel="stylesheet" type="text/css" href="__PUBLICC__/css/resert.css">
<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/main.css">
<style type="text/css">
	
	
</style>
<script type="text/javascript" src="__PUBLICC__/js/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/common.js"></script>
<body>
	<div class="wrap">
		<div class="topBar">
			<div class="topBar_content">
				<!-- <div class="left">
						<img src="__PUBLIC__/images/1.jpg"/>
						<a href="#"><strong>Skilly</strong></a>
				</div> -->
				<!-- <div class="right"> -->
					<ul>
						<li>
							<a href="http://<?php echo ($_SERVER['SERVER_NAME']); ?>" target="_blank">BLOG</a>
						</li>
						<li class="<?php echo ($madClass); ?>">
							<a href="__APP__/Project/MAD?type=mad">MAD</a>
						</li>
						<li class="<?php echo ($csClass); ?>">
							<a href="#">CS</a>
						</li>
						<li class="<?php echo ($webClass); ?>">
							<a href="__APP__/Project/WEB?type=web">WEB</a>
						</li>
						<li class="<?php echo ($indexClass); ?>">
							<a href="__APP__/Project?type=index">INDEX</a>
						</li>
					</ul>
				<!-- </div> -->
				<div class="mark"></div>
			</div>
		</div>

<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/index.css">
<script type="text/javascript" src="__PUBLIC__/js/index.js"></script>

		<div class="focus">
			<div class="wrapf">
				<div class="center">
					<div class="pic pic_1">
						<img src="__PUBLIC__/images/focus_1.jpg"/>
					</div>
					<div class="pic pic_2">
						<img src="__PUBLIC__/images/focus_2.jpg"/>
					</div>
					<div class="pic pic_3">
						<img src="__PUBLIC__/images/focus_3.jpg"/>
					</div>
					<div class="pic pic_4">
						<img src="__PUBLIC__/images/focus_4.jpg"/>
					</div>
					<input id="pic_val" type="hidden" value="0">
				</div>


				<div class="title">
					<a class="current">1</a>
					<a>2</a>
					<a>3</a>
					<a>4</a>
				</div>
			</div>
		</div>
		<div class="content">
			<div class="content_nav">
				<div class="content_nav_simple">
					<h1>About Project</h1>
					<p>项目介绍</p>
					<p>cs中包括android项目,bs项目包括ASP.NET Mad则是视频制作相关,BLOG正在建设中</p>
					<span class="abt_trng"></span>
				</div>
				<div class="content_nav_pic">
					<a class="content_nav_all " href="__APP__/Project/WEB?type=web">
						<img src="__PUBLIC__/images/web.png" />
					</a>
					<a class="content_nav_all " href="#">
						<img src="__PUBLIC__/images/cs.png" />
					</a>
					<a class="content_nav_all " href="__APP__/Project/MAD?type=mad">
						<img src="__PUBLIC__/images/mad.png" />
					</a>
				</div>
			</div>
		</div>


		<div class="bottom"></div>
	</div>
</body>
</html>