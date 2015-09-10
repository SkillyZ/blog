<?php

Class CommonProjectAction extends Action{

	public function _initialize(){
		if($_GET['type'] == 'index' || $_GET['type'] == null){
			$this->indexClass = 'current';
		}else if($_GET['type'] == 'web'){
			$this->webClass = 'current';
		}else if($_GET['type'] == 'mad'){
			$this->madClass = 'current';
		}
	}
}