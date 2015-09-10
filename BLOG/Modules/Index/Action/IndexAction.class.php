<?php


Class IndexAction extends PublicAction{

	public function index(){

		
		if(!$_GET['word']){
			parent::showIndex();
		}
		/*
		正则表达式替换全部
		var test = '你好,asdas,asdas,asd,as,';
		var re = new RegExp(",", "g");
		test = test.replace(re, '');*/
		/*$data = $this->getCate(M('cate')->select());
		p($data);*/

		//S('index_list', $articleList, 60);
		//echo microtime().'</br>';
		//echo time();
		//p(include C());

		/*$city   =  "San Francisco" ;
		$state  =  "CA" ;
		$event  =  "SIGGRAPH" ;

		$location_vars  = array( "city" ,  "state" );

		$result  =  compact ( "event" ,  "nothing_here" ,  $location_vars );
		var_dump( $result );*/

	}

	//无限级分类
	public function getCate($data, $pid = 0){
		$tree = array();
		foreach($data as $key => $val){
			if($val['parent'] == $pid){
				$tree[$key] = $val;
		
				$tree[$key]['cate_parent'] = self::getCate($data, $val['id']);//array_merge
			}
		}

		return $tree;
	}

}