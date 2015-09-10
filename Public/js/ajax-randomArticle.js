$(function(){
	
		refresh();
	$('.leftBar-random-img').bind('click', function(){
		refresh();
	});
	

	function getRandom(n){
		return Math.floor(Math.random()*n+1)
	}

	function refresh(){
		$('.leftBar-random-artice-wrap>ul').html('');
		$('.leftBar-random-loading').css('display', 'block');

		//var url = $('input[name="loadingSrc"]').val();window.location.pathname+
		var random=getRandom(10000);
		var url ="http://"+ window.location.host+"/randomArticle";
		console.log(url);
		$.post(url,
			{random:random},
			function(res){
			
			if(res.status == 0){
				alert(res.data);
			}else if(res.status == 1){
			$('.leftBar-random-loading').css('display', 'none');
				$('.leftBar-random-artice-wrap>ul').append(res.data);
			}
			
	},"json");
	}
});
