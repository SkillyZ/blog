<?php
class ArticleAction extends CommonAdminAction{

	public function index(){

		$sql=
		<<<SQL
select a.*, b.name as catename, c.nickname, d.tag_name
from wl_article a
left join wl_cate b on a.cid = b.id
left join wl_user c on a.user_id = c.id
left join wl_article_tag d on a.id = d.article_id 
order by a.create_date desc 
SQL;
		$articleList = M()->query($sql);
		
		$this->articleList = $articleList;
		$this->display();
	}

	public function addArticle(){

		$cateList = M('cate')->order('id')->select();
		if($_GET['id']){
			$id = $_GET['id'];
			$tagNow = M('article_tag')->where('article_id='.$id)->find();
			$articeNow = M('article')->where('id='.$id)->find();
			$this->tagNow = $tagNow;
			$this->articeNow = $articeNow;
			$act = 0;

			$cateList[$articeNow['cid'] - 1]['cid'] = 1;
		}else{
			$id = M('article')->order('id desc')->limit('1')->find()['id']+1;
			$act = 1;
		}

		$this->act = $act;
		$this->id = $id;
		$this->cateList = $cateList;
		$this->display();
	}

	public function delArticle(){
		if($_REQUEST['id']){
			$id = $_REQUEST['id'];
			
			if(M('article')->where('id='.$id)->delete()){
				M('article_tag')->where('article_id='.$id)->delete();

				$this->success('删除成功！', '__APP__/Admin/Article');
			}else{
				$this->error('删除失败');
			}
		}else{
			$this->error('不允许非法访问!');
		}
	}

	public function saveArticle(){
		if(!$_POST){
			$this->error('保存失败！');
		}
		
		if($_POST['act'] == 1){

			$_POST['id']='';
			$_POST['create_date'] = date('Y-m-d H:i:s', time());
			$state  = M('article')->add($_POST);
		}else{
			
			$_POST['edit_date'] = date('Y-m-d H:i:s', time());
			$state  = M('article')->save($_POST);
		}

		if($state){
			$data = array(
				'tag_name' => $_POST['tag']
			);

			if($_POST['act'] == 1){
				$data['article_id'] = $state;
				M('article_tag')->add($data);
			}else{
				$data['id'] = $_POST['tid'];
				M('article_tag')->save($data);
			}
			
			$this->success('保存成功！', '__APP__/Admin/Article');
		}else{
			$this->error('保存失败！');
		}
	}

}