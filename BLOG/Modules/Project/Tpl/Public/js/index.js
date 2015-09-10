
	$(window).resize(function(){
		focusInit();
	});

	$(document).ready(function(){
		init();
		topBarInit();
		focusInit();

		setInterval(showFocusInitTo,2000);
		/*$('.topBar .content .right a').mouseover(function(){
			alert('sd'); $('<div>')创建标签
		})//.fadeTo(3000,0.2);

			$('.content .mark').css({
				'position':'absolute',
				'left':$(this).position().left,
				'top':$(this).position().top,
				'width':$(this).width(),
				'height':$(this).height(),
				'opacity':0.2,
				'background': '#5A5757'
		}).fadeTo(1000,0.6);//.appendTo($('.content')) 遮罩实现*/
	});
	function init(){
		$('#pic_val').val(1);

		$('.focus .center').css({
			'width':$(window).width() * 4
		})
		$('.focus .wrapf').css({
			'width':$(window).width()
		})
		$('.focus .center .pic img').css({
			'width':$(window).width()
		});
	}

	function topBarInit(){
		$('.topBar .topBar_content .right a').bind('mouseover', function(){
			$(this).addClass('current');
		});
		$('.topBar .topBar_content .right a').bind('mouseout', function(){
			$(this).removeClass('current');	
		});

	}

	function focusInit(){

		$('.focus .title a').mouseover(function(){

			if(!$(this).hasClass('current')){
				$(this).css({
					'opacity': 1
				})
			}
		});

		$('.focus .title a').mouseout(function(){
			if(!$(this).hasClass('current')){
				$(this).css({
					'opacity':0.6
				})
			}
		});

		$('.focus .title a').click(function(){
			
			focusInitTo($(this).html());
			//$(this).addClass('current');
		})
	}

	function focusInitTo(aThisVal){
		$('.focus .title a').removeClass('current').removeAttr("style");
		$('.focus .title a:eq('+(parseInt(aThisVal)-1)+')').addClass('current');

		$(".focus .pic_1").animate({
        		left: "-="+$(window).width() * (aThisVal - $('#pic_val').val())+"px"
        	}, 1000);

			$(".focus .pic_2").animate({
        		left: "-="+$(window).width() * (aThisVal - $('#pic_val').val())+"px"
        	}, 1000);

			$(".focus .pic_3").animate({
        		left: "-="+$(window).width() * (aThisVal - $('#pic_val').val())+"px"
        	}, 1000);
        	
			$(".focus .pic_4").animate({
        		left: "-="+$(window).width() * (aThisVal - $('#pic_val').val())+"px"
        	}, 1000);

			$('#pic_val').val(aThisVal);
	}

	function showFocusInitTo(){
		/*我要知道当前被选中的是哪个标签*/
	   if($('#pic_val').val() == 4){
	  	 focusInitTo(1);
	   }else{
	  	 focusInitTo(parseInt($('#pic_val').val(),10) + 1);
	   }

	}