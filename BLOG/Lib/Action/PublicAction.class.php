<?php 
class PublicAction extends Action{

	public function _initialize(){
		//p($_GET);
		if($_GET['word']){
			$word = $_GET['word'];
			$where = "and a.title like '%$word%' or a.content like '%$word%' or d.tag_name like '%$word%'";
			self::showIndex($where);
		}
	}

	public function showIndex($where = ''){
		import('Class.Page', APP_PATH);
		$sql=
		<<<SQL
select a.*, b.name as catename, c.nickname, d.tag_name
from wl_article a
left join wl_cate b on a.cid = b.id
left join wl_user c on a.user_id = c.id
left join wl_article_tag d on a.id = d.article_id 
where 1 = 1 $where
SQL;
		$articleList = M()->query($sql);
		$count = count($articleList);
		$page = new Page($count, 10);
		$limit = $page->firstRow.','.$page->listRows;
		$sql=
		<<<SQL
select a.*, b.name as catename, c.nickname, d.tag_name, 
ifnull(e.num_comment, 0) as num_comment,
date_format(a.create_date,'%Y年%m月%d日') as real_date
from wl_article a
left join wl_cate b on a.cid = b.id
left join wl_user c on a.user_id = c.id
left join wl_article_tag d on a.id = d.article_id
left join (
select article_id, count(article_id) as num_comment
from wl_article_comment
GROUP BY article_id
) e on a.id = e.article_id
where 1 = 1 $where
order by a.create_date desc
limit $limit
SQL;
		
		
		$articleList = M()->query($sql);
		
		$this->page = $page->show();
		$this->articleList = $articleList;
		$this->display('Index:index');
	}

	//这是ob_gzip压缩机
	function ob_gzip($content)
	{   
	    if(!headers_sent() &&
	        extension_loaded("zlib") &&
	        strstr($_SERVER["HTTP_ACCEPT_ENCODING"],"gzip"))
	    {
	        $content = gzencode($content." \n//此页已压缩",9);
	       
	        header("Content-Encoding: gzip");
	        header("Vary: Accept-Encoding");
	        header("Content-Length: ".strlen($content));
	    }
	    return $content;
	}

	public function randomArticle(){
		/*if(!$_POST['random']){
			$this->ajaxReturn("请不要非法访问","Error",0);
		}*/

		$count = M('article')->count();
		
		do {
			$random = rand(0,$count);
		}while(($count - $random)< 5);
		$limit = $random.' , 5';
		
		$sql=
		<<<SQL
select a.id, a.title, a.create_date, b.name as catename, c.nickname, d.tag_name
from wl_article a
left join wl_cate b on a.cid = b.id
left join wl_user c on a.user_id = c.id
left join wl_article_tag d on a.id = d.article_id 
limit $limit
SQL;

		$articleList = M()->query($sql);
		$html = array();
		foreach ($articleList as $key => $value) {
			
			$html[] = 
			'<li><a href="/blog_'.$value['id'].'.html">'.$value['title'].'</a></li>';
		};
		$this->ajaxReturn($html,"Error",1);

	}

	public function check(){
		$dbuser = M('user_mad');
		
		$username = $_GET['username'];
		$nicheng = $_GET['nicheng'];
		$email = $_GET['email'];
		$password = $_GET['password'];
		$rpassword = $_GET['rpassword'];
		$oldpassword = $_GET['oldpassword'];

		if($username){
			if(strlen($username) >=6 && strlen($username)<=20){
				
				if(!$dbuser->where(array('username'=>$username))->count()){
					echo '可用';
				}else{
					echo '该账号已经存在';
				}
				
			}else{
				echo '账号长度必须为6-20位!';
			}
		}
		if($nicheng){
			if(strlen($nicheng) >=2 && strlen($nicheng)<=20){
				if(!$dbuser->where(array('nicheng'=>$nicheng))->count()){
					echo '可用';
				}else{
					echo '该昵称已经存在';
				}
			}else{
				echo '昵称长度必须为2-20！';
			}
		}
		if($email){
			if(eregi("^[_\.0-9a-z-]+@([0-9a-z][0-9a-z-]+\.)+[a-z]{2,3}$",$email) ==1){
				if(!$dbuser->where(array('email'=>$email))->count()){
					echo '可用';
				}else{
					echo '该邮箱已经存在';
				}
			}else{
				echo '邮箱格式不正确!';
			}
		}

		if($password){
			if(strlen($password) >5 && strlen($password) <=20){
				session('password', $password);
				echo '格式正确';
			}else{
				echo '密码长度限制在6-20位！';
			}
		}

		if($rpassword){
			if(strlen($rpassword) >5 && strlen($rpassword) <=20){
				
				if($rpassword == session('password')){
					echo '正确';
				}else{
					echo '两次输入密码不同';
				}
			}else{
				echo '密码长度限制在6-20位！';
			}
		}

		if($oldpassword){
			if(strlen($oldpassword) >5 && strlen($oldpassword) <=20){
				$where = array(
					'id'=>$_SESSION['id'],
					'password'=> md5($oldpassword)
				);
				if($dbuser->where($where)->find()){
					echo '正确';
				}else{
					echo '密码错误';
				}
			}else{
				echo '密码长度限制在6-20位！';
			}
		}
	}
}