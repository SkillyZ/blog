<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
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
	<link rel="shortcut icon" type="image/x-icon" href="__PUBLIC__/images/sign240x90.png">
	<script type="text/javascript" src="__PUBLIC__/js/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="__PUBLIC__/js/bar.js"></script>
	<script type="text/javascript" src="__PUBLIC__/js/index.js"></script>
	<style type="text/css">
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
								<input type="text" name="word" class="search-input" value="">
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
			
			<?php if($_GET['word'] != null): ?><div class="search-reault">
					<h3>搜索结果</h3>
				</div><?php endif; ?>

<link rel="stylesheet" type="text/css" href="__PUBLIC__/ueditor/third-party/SyntaxHighlighter/shCoreDefault.css">
<script type="text/javascript" src="__PUBLIC__/ueditor/third-party/SyntaxHighlighter/shCore.js"></script>
<script type="text/javascript">
SyntaxHighlighter.all();
</script>

<div class="mskeLayBg"></div>
<div class="mskelayBox">
  <img class="mskeClaose" src="__PUBLIC__/images/mke_close.png" width="27" height="27" />
  <div class="mske_html">
  	<img src="__PUBLIC__/images/2.jpg"/>
  </div>
</div>

<link rel="stylesheet" href="__PUBLIC__/css/blog.css">

			<div class="rightBar-bottom">
				<div class="rightBar-artice">

					<h1><?php echo ($article["title"]); ?></h1>
					<p>
					<span>时间：<?php echo ($article["real_date"]); ?> </span>
					<span>&nbsp;分类：<?php echo ($article["catename"]); ?> </span>
					<span>&nbsp;标签：<?php echo ($article["tag_name"]); ?> </span>
					<span>&nbsp;评论：<?php echo ($article["num_comment"]); ?></span>
					</p>
					<span class="rightBar-artice-content">
						<?php echo ($article["content"]); ?>
					</span>
					<br>
				</div>
				
			</div>
				<!-你更喜欢->
				<div class="random-love">
					<h3>你可能也喜欢</h3>
					<div class="random-split">
						<ul>
							<!-- <li>
								<a href="http://www.blog.com/blog_24.html">
								<img src="__PUBLIC__/images/2.jpg"/>
								<span>
									jQuery实现评论者网站链接新标签打开
								</span>
								</a>
							</li> -->
							<?php if(is_array($likeList)): foreach($likeList as $key=>$like): echo ($like); endforeach; endif; ?>
						</ul>
					</div>
				</div>
				
				<!-评论->
				<div class="review" >
					<h3>评论列表</h3>
					<div class="review-people">
						<div class="review-people-detail">

						<?php if(is_array($commentList)): foreach($commentList as $key=>$comment): ?><div class="review-people-comments">
								<div class="review-people-detail-left">
									<img src="__PUBLIC__/user_head/<?php echo ($comment["user_img"]); ?>"/>
								</div>
								<div class="review-people-detail-right">
									<p class="author"><?php echo ($comment["nickname"]); ?></p>
									<span class="date"><?php echo ($comment["date"]); ?></span>
									<a clas="return" href="#">回复</a>
								</div>

								<div class="review-people-content">
									<?php echo ($comment["content"]); ?>
								</div>
							</div><?php endforeach; endif; ?>
							
						<div class="rightBar-page" >
							<?php echo ($page); ?>
						</div>
						
						</div>		
					</div>
				</div>
				<!-填写回复->
				<div class="reply">
					<h3>回复</h3>
					<div class="reply-content">
						<h3 style="border:0">你正在以游客身份访问网站，请输入你的昵称和 E-mail</h3>
						<input type="text" name="nickname" value="" tabindex="1" placeholder="昵称(必填)">
						<input type="text" name="email" value="" tabindex="2" placeholder="邮箱(必填)">
						<input type="text" name="web" value="" tabindex="3" placeholder="网址(选填)">

						<div class="reply-content-textarea">
							<textarea placeholder="输入回复内容" name="content" tabindex="4"></textarea>
							
							<div class="comment-tool ">
								<input name="addComment" type="submit" id="submit"   tabindex="5" value="评论" >
							</div>
						</div>

						<input type="hidden" name="article_id" value="<?php echo ($article["id"]); ?>">
					</div>
				</div>
				

				<div class="foot">
					Copyright ©2014-2015	Develop by Skilly.	Go to the Top
				</div>
		</div>
	</div>
</body>
</html>
<script type="text/javascript" src="__PUBLIC__/js/ajax-comment.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/ajax-randomArticle.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$('.rightBar-bottom img').bind('click', function(){
		console.log($(this));
		//$('.mske_html').append($(this).html());
		$('.mske_html>img').attr('src',$(this).attr('src'));


		$('.mskeLayBg').css({
			'display': 'block',
			'width' : $(document).width(),
			'height' : $(document).height()
		}).animate({
			'opacity' : .5
		}, 300);


		$('.mskelayBox').css({
			'display': 'block',
			'left': $(window).width() / 2 - $('.mskelayBox').width() / 2,
			'top' : $(window).height() / 2 + $(document).scrollTop() - $('.mskelayBox').height() / 2
		}).animate({
			'opacity' : 1
		},300);

	});

	$('.mskelayBox>img').bind('click', function(){


		$('.mskeLayBg').animate({
			'opacity' : 0
		}, 300, function(){
			$(this).css('display', 'none')
		});


		$('.mskelayBox').animate({
			'opacity' : 0,
			'left' : 0,
			'top' : 0
		},300, function(){
			$(this).css('display', 'none');
			//$('.mske_html').html('')
		});


	});
	/*alert($(window).height()); //浏览器时下窗口可视区域高度
	alert($(window).width()); //浏览器时下窗口可视区域宽度
	alert($(document).scrollTop()); //获取滚动条到顶部的垂直高度
	alert($(document).scrollLeft()); //获取滚动条到左边的垂直宽度

	alert($(document).height()); //浏览器时下窗口文档的高度
	alert($(document.body).height());//浏览器时下窗口文档body的高度
	alert($(document.body).outerHeight(true));//浏览器时下窗口文档body的总高度 包括border padding margin
	alert($(document).width());//浏览器时下窗口文档对于象宽度
	alert($(document.body).width());//浏览器时下窗口文档body的高度
	alert($(document.body).outerWidth(true));//浏览器时下窗口文档body的总宽度 包括border padding margin
	  */

})
</script>