<?php

class CommonAdminAction extends Action {

	public function _initialize(){
		if(!isset($_COOKIE['id'])){
			$this->error('请先登录', '__APP__/Admin/Login');
		}
	}

	public function loginout(){
		cookie('id', null);
		//p($_COOKIE);die;
		//session_unset();
		//session_destroy();
		//echo __APP__;die;
		//redirect (__GROUP__);
		$this->success('注销成功！', '__APP__/Admin/Login');
	}

}