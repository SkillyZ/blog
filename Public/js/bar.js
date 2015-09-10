$(document).ready(function(){
		$('.leftBar-menu li').bind('mouseover', function(){
			$(this).children('a').css({
				'color':'#85CCCB'
			})
			$(this).children('span').stop(true);
			$(this).children('span').animate({
				'right':'0'
			}, 150)
		})
		$('.leftBar-menu li').bind('mouseout', function(){
			$(this).children('a').css({
				'color':'#FFF'
			})
			$(this).children('span').stop(true);
			$(this).children('span').animate({
				'right':'-100%'
			}, 150)
		})
	})