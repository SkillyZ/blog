var browserX;
var browserY;
$(function(){
	init();
	initAdapt();
	likeMobile();
});

function likeMobile(){
	$('.leftBar-random-mobile').bind('click', function(){

		if($(this).next().css('display') == 'none'){
			$(this).next().css({
			'display': 'block',
			'height' : 0,
			'bottom' : 0
			}).animate({
				'height' : 188,
				'bottom' : -210
			}, 200)
		}else{
			$(this).next().css({
			'display': 'block'
			}).animate({
				'height' : 0,
				'bottom' : 0
			}, 200, function(){
				$(this).css({
					'display': 'none',
					'height' : 0,
					'bottom' : 0
				});
			});
		}
		
	});
}

$(window).resize(function(){
	
	init();
	initAdapt();
})

function init(){
	 browserX=document.documentElement.clientWidth || document.body.clientWidth;
	 browserY=document.documentElement.clientHeight || document.body.clientWidth;
}

function initAdapt(){
	if(browserX >= 990){
		$('.rightBar').css('margin-left', '450px');
	}else if (724 <=browserX && browserX<990){
		$('.leftBar-bg').css('display', 'block');
		$('.leftBar-random').css('display', 'block');
		$('.leftBar-friend').css('display', 'block');
		$('.rightBar-top>ul').css('display', 'block');

		$('.leftBar').css({
			'float': 'left',
			'background' : 'transparent',
			'width' : 300
		});

		$('.rightBar').css({
			'margin-left':'370px',
			'padding' : '0'
		});

		$('.rightBar-bottom').css({
			'max-width' : '740px',
			'margin-right' : '80px'
		});

		$('.leftBar-random-artice-wrap').css({
			'display': 'block',
			'height' : 188,
			'bottom' : -210
		})
	}else{
		$('.leftBar-bg').css('display', 'none');
		$('.leftBar-friend').css('display', 'none');
		$('.rightBar-top>ul').css('display', 'none');

		$('.leftBar').css({
			'float': 'none',
			'background' : '#52B8CB',
			'width' : '100%'
		});

		$('.rightBar').css({
			'margin-left':0,
			'float': 'none',
			'padding' : 30
		});

		$('.rightBar-bottom').css({
			'max-width' : 'none',
			'margin-right' : 0
		});

		$('.leftBar-random-artice-wrap').css({
			'display': 'none',
			'height' : 0,
			'bottom' : 0
		})
		/*$('.leftBar-random').css({
			'margin' : 0,
		});
		$('.leftBar-random-mobile').css({
			'display' : 'block',
		});*/

		/*$('.leftBar-random-mobile').css({
			'margin': '25px auto',
			'text-align': 'center',
			'font-size': '15px',
			'font-weight': 'bold',
			'border-radius': '8px',
			'cursor': 'pointer',
			'padding': '10px',
			'width': '95px',
			'background': '#2fabc2',
			'-webkit-box-shadow': 'inset 0 0 10px rgba(0,0,0,.1)',
			'box-shadow': 'inset 0 0 10px rgba(0,0,0,.1)'

		});*/

		/*$('.leftBar-random-artice-wrap').css({
			'display': 'none',
			'position': 'absolute',
			'background': '#2fabc2',
			'left': '50%',
			'bottom' : '-210px',
			'margin-left': '-130px',
			'padding':'20px',
			'border-radius': '8px',
			'-webkit-box-shadow': 'inset 0 0 10px rgba(0,0,0,.1)',
			'box-shadow': 'inset 0 0 10px rgba(0,0,0,.1)'
		});*/

	}
}