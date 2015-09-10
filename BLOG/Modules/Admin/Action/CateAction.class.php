<?php
class CateAction extends Action {

	public function index(){
		import('ORG.Util.Page');
		$count = M('cate')->count();
		$page = new Page($count, 10);
		$limit = $page->firstRow.','.$page->listRows;

		$this->cateList = M('cate')->order('date desc')->limit($limit)->select();
		$this->page = $page->show();

		$this->display();

	}

	public function addCate(){

		if($_GET['id']){
			$id = $_GET['id'];
			$this->name = M('cate')->where('id='.$id)->find()['name'];
			$act = 0;
		}else{
			$id = M('cate')->order('id desc')->limit('1')->find()['id']+1;;
			$act = 1;
		}
		$this->id = $id;
		$this->act = $act;
		$this->display();
	}

	public function saveCate(){
		//$create = M('cate')->create();

		if(!$_POST){
			$this->error('保存失败！');
		}
		$data = array(
			'date' => date('Y-m-d H:i:s', time()),
			'name' => $_POST['name']
		);

		if($_POST['act'] == 1){
			$state  = M('cate')->add($data);
		}else{
			$data['id'] = $_POST['id'];
			$state  = M('cate')->save($data);
		}

		if($state){
			$this->success('保存成功！', '__APP__/Admin/Cate');
		}else{
			$this->error('保存失败！');
		}
	}

	
	public function delCate(){

		//if(M('notice')->where('id='.$id)->delete()){
		if($_REQUEST['id']){
			$id = $_REQUEST['id'];
			
			if(M('cate')->where('id='.$id)->delete()){
				$this->success('删除成功！', '__APP__/Admin/Cate');
			}else{
				$this->error('删除失败');
			}
		}else{
			$this->error('不允许非法访问!');
		}
	}
}