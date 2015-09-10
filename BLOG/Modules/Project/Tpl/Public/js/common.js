$(function(){
	
	$('.topBar .topBar_content a').bind('mouseover', function(){
		$(this).addClass('current');
	});
	$('.topBar .topBar_content a').bind('mouseout', function(){
		$(this).removeClass('current');	
	});
});
