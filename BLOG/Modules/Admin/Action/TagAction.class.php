<?php 

class TagAction extends CommonAdminAction{

	public function index(){
		import('ORG.Util.Page');
		$count = M('tag')->count();
		$page = new Page($count, 10);
		$limit = $page->firstRow.','.$page->listRows;

		$this->tagList = M('tag')->order('date desc')->select();
		$this->page = $page->show();
		$this->display();

	}

	public function addTag(){
		if($_GET['id']){
			$id = $_GET['id'];
			$this->name = M('tag')->where('id='.$id)->find()['name'];
			$act = 0;
		}else{
			$id = M('tag')->order('id desc')->limit('1')->find()['id']+1;;
			$act = 1;
		}
		$this->id = $id;
		$this->act = $act;
		$this->display();
	}

	public function saveTag(){
		if(!$_POST){
			$this->error('保存失败！');
		}
		$data = array(
			'date' => date('Y-m-d H:i:s', time()),
			'name' => $_POST['name']
		);

		if($_POST['act'] == 1){
			$state  = M('Tag')->add($data);
		}else{
			$data['id'] = $_POST['id'];
			$state  = M('Tag')->save($data);
		}

		if($state){
			$this->success('保存成功！', '__APP__/Admin/Tag');
		}else{
			$this->error('保存失败！');
		}
	}

	public function delTag(){
		if($_GET['id']){

			if(M('tag')->where('id='.$_GET['id'])->delete()){
				$this->success('删除成功！', '__APP__/Admin/Tag');
			}else{
				$this->error('删除失败');
			}

		}else{
			$this->error('不允许非法访问!');
		}
	}
}