$(function(){

	var browserX;
	var browserY;

	$(window).resize(function(){
		init();
		initAdapt();
	})

	$(document).ready(function(){
		init();
		initAdapt();
		
	});


	function init(){
		 browserX=document.documentElement.clientWidth || document.body.clientWidth;
		 browserY=document.documentElement.clientHeight || document.body.clientWidth;
	}

	function initAdapt(){
		var wrapBoxX;
		var outBoxX = 300;

		if(browserX >= 990){
			wrapBoxX = 990;
		}else if (660 <=browserX && browserX<990){
			wrapBoxX = 660;
		}else if(460<=browserX && browserX<660){
			wrapBoxX = 660;
			outBoxX = 430;
		}else{
			wrapBoxX = 360;
			outBoxX = 330;
		}

		$('.wrapBox').width(wrapBoxX);
		$('.outBox').width(outBoxX);
	}
});