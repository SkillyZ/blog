<?php

class BlogAction extends PublicAction {

	public function index(){
		if($_GET['id']){
			//import('ORG.Util.Page');
			import('Class.Page', APP_PATH);

			$id = $_GET['id'];
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
where a.id = $id
SQL;
			
			$sqlMyBeLike=
			<<<SQL
select id,title from 
wl_article 
where cid in (
select cid from wl_article where id = $id
)
limit 0,4
SQL;
			$likeList = M()->query($sqlMyBeLike);
			$html = array();
			foreach ($likeList as $key => $value) {
				$html[] = 
				'<li><a href="__APP__/blog_'.$value['id'].'.html"><img src="/Public/images/1.jpg"><span>'.$value['title'].'</span></a></li>';
			}
			
			M('article')->where('id='.$id)->setInc('click');//点击次数

			$commentList = M('article_comment')->where('article_id='.$id)->order('date desc')->select();
			$count = count($commentList);
			$page = new Page($count, 10);
			$limit = $page->firstRow.','.$page->listRows;
			$commentList = M('article_comment')->where('article_id='.$id)->order('date desc')->limit($limit)->select();

			$this->likeList = $html;
			$this->commentList = $commentList;
			$this->page = $page->show();
			$this->article = M()->query($sql)[0];
			$this->display();


			/*$User->where('id=5')->setInc('score',3); // 用户的积分加3
			$User->where('id=5')->setInc('score'); // 用户的积分加1
			$User->where('id=5')->setDec('score',5); // 用户的积分减5
			$User->where('id=5')->setDec('score'); // 用户的积分减1*/
		}else{
			$this->error('不允许非法访问!');
		}

	}

	public function refreshLike($id){
		
	}

	public function addComment(){
		
		/*if(!session('id')){
    		$this->ajaxReturn("请先登录","Error",2);
    	}*/

		if(!$_POST){
			$this->ajaxReturn("请不要非法访问","Error",0);
		}

		$validate = array(
		    array('content','require','内容必须'), //默认情况下用正则进行验证
		    array('nickname','require','昵称必须'), //默认情况下用正则进行验证
		    array('nickname', '2,20', '昵称长度必须为2-20！', 0, 'length', 3),
		    array('email','email','email格式错误')  //就这!
	    );

		$dbComment = M('article_comment');
		if($dbComment->validate($validate)->create($_POST)){
			$_POST['user_img'] = 'nohead.png';
			$_POST['date'] = date('Y-m-d H:i:s', time());

			if($dbComment->add($_POST)){
				$this->ajaxReturn("评论成功,刷新后显示","Error",1);
			}else{
				$this->ajaxReturn("评论失败","Error",0);
			}
		}else{
			$this->ajaxReturn($dbComment->getError(),"Error",0);
		}
		/*if($_POST['email']){
			if(eregi("^[_\.0-9a-z-]+@([0-9a-z][0-9a-z-]+\.)+[a-z]{2,3}$",$email) ==1){
				if(!$dbuser->where(array('email'=>$email))->count()){
					echo '可用';
				}else{
					echo '该邮箱已经存在';
				}
			}else{
				echo '邮箱格式不正确!';
			}
		}*/

	}


}