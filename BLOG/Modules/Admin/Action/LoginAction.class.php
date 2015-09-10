<?php

class LoginAction extends Action {

	public function index(){

		$this->display();
	}

	public function login(){

		if($_POST){

			$where = array(
				'username' => $_POST['username'],
				'password' => md5($_POST['password'])
			);

			$user = M('user_admin')->where($where)->find();
			if($user){

				$time = 60 * 60 * 24;
				cookie('id', $user['id'], $time);
				cookie('logintime', time(), $time);
				cookie('loginip', get_client_ip(), $time);
				cookie('username', $user['username'], $time);
				cookie('nickname', $user['nickname'], $time);

				$data = array(
					'last_date' => date('Y-m-d H:i:s', time()),
					'last_ip' => get_client_ip()
				);
				M('user_admin')->where($where)->setField($data);

				$this->success('登录成功!', '__APP__/Admin');
			}else{
				$this->error('登录失败,帐号或者密码错误');
			}

		}else{
			$this->error('请不要非法访问');
		}
	}
}