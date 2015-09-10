$(document).ready(function(){

		$('.topbar-right-user').bind('click', function(){

			$(this).children('.dropdown-content').stop();
			if($(this).children('.dropdown-content').height()>0){
				$(this).children('.dropdown-content').css({
				'overflow':'block',
				}).animate({
					'height':0
				}, 200);
			}else{
				$(this).children('.dropdown-content').css({
				'overflow':'none',
				}).animate({
					/*'opacity':1,
					'top':50*/
					'height':105
				}, 200);

			}
		});

		$('.admin-parent>a').bind('click', function(){
				if($(this).next('.admin-sidebar-sub').height() == 0){
					$(this).next('.admin-sidebar-sub').animate({
						height: 200
					}, 200)
				}else{
					$(this).next('.admin-sidebar-sub').animate({
						height: 0
					}, 200)
				}
			})

});