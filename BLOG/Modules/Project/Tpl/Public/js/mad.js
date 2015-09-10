var browserX;
	var browserY;

	$(window).resize(function(){
		init();
		initAdapt();
		showMadMask();
	})

	$(window).scroll(function(){
		init();
		initAdapt();
		showMadMask();
	});

	$(document).keydown(function(e){
		if(e.keyCode == 27){
			$('.dialog').css('display', 'block');
			$('.madVideoMask').css('display','none');
			$('.madVideoMask iframe').remove();
		}
	});

	$(document).ready(function(){
		init();
		initAdapt();
		initMadVideo();
		showMadMask();

		//window.location.href 跳转
		// 在新窗口中打开链接：
		// window.open('http://www.baidu.com');
	});

	function showMadMask(){
		$('.madVideoMask').css({
			'left' : ($(window).width()-$('.madVideoMask').width())/2,
			'top' : ($(window).height()-$('.madVideoMask').height())/2
		});
		/*$('.madVideoMask').animate({
			'left' : ($(window).width()-$('.madVideoMask').width())/2,
			'top' : ($(window).height()-$('.madVideoMask').height())/2 + $(window).scrollTop()
		}, 100) //使用这种方法移动的时候不流畅*/
	};

	function initMadVideo(){
		$('.madVideo').bind('mouseover', function(){

			$(this).children('.madMask').animate({
				'opacity' : 1
			}, 200,function(){
				//这里是回调函数
			});
		});
		$('.madVideo').bind('mouseout', function(){
			$(this).children('.madMask').animate({
				'opacity' : 0
			}, 200);

		});

		$('.madVideo').bind('click', function(){

			var width = $('.madContent').width();
			$('.madVideoMask').width(width);

			showMadMask();

			$('.dialog').css('display', 'block');
			if($(this).data('type') == 'tudou' ){
				$('.madVideoMask').css('display','block').append(
				'<iframe src="http://www.tudou.com/programs/view/html5embed.action?type=0&code='
				+$(this).data('url')
				+'&lcode=&resourceId=66169331_06_05_99" allowtransparency="true" allowfullscreen="true" allowfullscreenInteractive="true" scrolling="no" border="0" frameborder="0" style="width:'
				+width+'px;height:480px;"></iframe>'
				);
			}else if($(this).data('type') == 'acfun'){
				$('.madVideoMask').css('display','block').append(
				'<iframe style="width:'+width+'px;height:480px;" src="https://ssl.acfun.tv/block-player-homura.html#vid='
				+$(this).data('url')+';from=http://www.acfun.tv" id="ACFlashPlayer-re" frameborder="0"></iframe>'
				);
			}
			
			//<iframe src="http://www.tudou.com/programs/view/html5embed.action?type=0&code=Y0_yW52TN50&lcode=&resourceId=66169331_06_05_99" allowtransparency="true" allowfullscreen="true" allowfullscreenInteractive="true" scrolling="no" border="0" frameborder="0" style="width:850px;height:480px;"></iframe>
		});

		$('.madVideoMaskClose').bind('click', function(){
			$('.dialog').css('display', 'none');
			$('.madVideoMask').css('display','none');
			$('.madVideoMask iframe').remove();
		});
		

	};

	function init(){
		 browserX=document.documentElement.clientWidth || document.body.clientWidth;
		 browserY=document.documentElement.clientHeight || document.body.clientWidth;
		 //console.log($(window).height()+'-------'+browserY)
	}

	function initAdapt(){
		var wrapBoxX;
		var outBoxX = 300;

		if(browserX >= 960){
			wrapBoxX = 930;
			$('.madReason').css('display','inline-block');
		}else if (660 <=browserX && browserX<960){
			wrapBoxX = 660;
			$('.madReason').css('display','none');
		}else if(460<=browserX && browserX<660){
			wrapBoxX = 430;
			outBoxX = 430;
			$('.madReason').css('display','none');
		}else{
			wrapBoxX = 330;
			outBoxX = 330;
			$('.madReason').css('display','none');
		}
		$('.madContent').width(wrapBoxX);
		$('.madMask').width(wrapBoxX);

	}
