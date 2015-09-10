<?php

class AdminUserAction extends CommonAdminAction{
	
	public function index(){
		import('ORG.Util.Page');
		$count = M('user_admin')->count();
		$page = new Page(($count), 10);
		$limit = $page->firstRow.','.$page->listRows;

		$this->adminList = M('user_admin')->limit($limit)->select();
		$this->page = $page->show();
		$this->display();
	}

	public function addAdmin(){

		if($_GET['id']){
			$id = $_GET['id'];
			$act = 0;
		}else{
			$id = M('user_admin')->order('id desc')->limit('1')->find()['id']+1;;
			$act = 1;
		}

		$this->id = $id;
		$this->act = $act;
		$this->display();
	}

	public function saveAdmin(){

		if(!$_POST){
			$this->error('保存失败！');
		}
		$validate = array(
			array('username', '6,20', '帐号长度必须为6-20位', 0, 'length', 3),
			array('username', '', '帐号已经存在', 0, 'unique', 1),
			array('nickname', '2,20', '昵称长度必须为2-20', 0, 'length', 3),
			array('nickname', '', '昵称已经存在', 0, 'unique', 1),
		    array('password', '6,20', '密码限制长度为6-20位！', 0, 'length', 3),
		    array('rpassword', 'require', '确认密码必须'),
		    array('newPassword','password','确认密码不相同',0,'confirm'), // 验证确认密码是否和密码一致
	    );

		$dbUser =M('user_admin'); 
		if($dbUser ->validate($validate)->create($_POST)){

			$_POST['password'] = md5($_POST['password']);
			if($dbUser ->add($_POST)){
				$this->success('保存成功！', __URL__);
			}else{
				$this->error('保存失败！');
			}
		}else{
			$this->error($dbUser->getError());
		}


	}

	public function delAdmin(){
		if($_REQUEST['id']){
			$id = $_REQUEST['id'];
			
			if(M('user_admin')->where('id='.$id)->delete()){
				$this->success('删除成功！', '__APP__/Admin/AdminUser');
			}else{
				$this->error('删除失败');
			}
		}else{
			$this->error('不允许非法访问!');
		}
	}


	public function updatePassword(){
		if($_GET){
			$this->adminId = $_GET['id'];
			$this->display();

		}else{
			$this->error('参数错误');
		}
	}

	public function updatePwd(){
		//p($_POST);
		$validate = array(
		    array('oldPassword', '6,20', '密码限制长度为6-20位！', 0, 'length', 3),
		    array('password', '6,20', '新密码限制长度为6-20位！', 0, 'length', 3),
		    array('newPassword','password','确认密码不相同',0,'confirm'), // 验证确认密码是否和密码一致
	    );
	  	

		$dbUser = M('user_admin');
		if($dbUser->validate($validate)->create($_POST)){
			$password = md5($_POST['oldpassword']);

			$where = array(
				'id'=>$_POST['adminId'],
				'password'=>$password
			);
			$data = array('password'=>md5($_POST['password']));

			if(M('user_admin')->where($where)->count()){
				
				if(M('user_admin')->where('id='.$_POST['adminId'])->save($data)){
					$this->success('修改密码成功', __URL__);
				}
			}else{
				$this->error('旧密码输入错误！');
			}
		}else{
			$this->error($dbUser->getError());
		}

	}
}