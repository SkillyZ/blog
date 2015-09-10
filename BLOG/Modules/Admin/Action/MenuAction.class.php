<?php

class MenuAction extends CommonAdminAction {

	public function index(){


		//$menuList = M('menu')->select();
		//P($this->getMenu2($menuList));
		$this->display();
	}

	public function getMenu($parent = 0){
		$menu = array();

		$menuList = M('menu')->select();
		foreach($menuList as $key => $value){
			
			if($parent == $value['parent']){
				$menu[$key] = $value;
				$menu[$key][] = self::getMenu($value['id']);
			}
		}

		return $menu;
	}

	public function getMenu2($menuList, $parent = 0, $suffix = '--'){
		$menu = array();

		foreach($menuList as $key => $value){
			if($parent == $value['parent']){
				$value['name'] .= $suffix;
				$menu[] = $value;
				$menu[] = array_merge(self::getMenu2($menuList,$value['id']));
				
			}
		}

		return $menu;
	}
}