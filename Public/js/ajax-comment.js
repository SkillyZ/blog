$(function(){
	//videodetail关注
	$("input[name='addComment']").click(function(){

		var nickname=$("input[name='nickname']").val();
		var email=$("input[name='email']").val();
		var web=$("input[name='web']").val();
		var content=$("textarea[name='content']").val();
		var article_id=$("input[name='article_id']").val();
		var url ="http://"+ window.location.host;//window.location.pathname;
		$.post(url+"/index.php/Blog/addComment",
			{nickname:nickname,email:email,web:web,content:content,article_id:article_id},
			function(res){
			
			//window.open("http://"+ window.location.host+"/index.php/Regist");  
			if(res.status == 0){
				alert(res.data);
			}else if(res.status == 1){
				alert(res.data);
				
			}
			
		},"json");
	});
	
});


$(function(){

	
})