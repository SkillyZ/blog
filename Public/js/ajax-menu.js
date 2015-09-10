$(function(){
	
	var url = "http://"+window.location.host;
	$.post(url, canshu, function(res){
		alert(1111);
	});
});