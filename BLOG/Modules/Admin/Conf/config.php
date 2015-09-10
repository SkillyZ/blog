<?php

return array(
	//自定义 __PUBLIC__路径
	'TMPL_PARSE_STRING' => array(
		'__PUBLIC__' => __ROOT__.'/'.APP_NAME.'/Modules/'.GROUP_NAME.'/Tpl/Public',
		'__PUBLICC__' =>'/Public'
	),

	//'URL_HTML_SUFFIX' => '',

	//加载自定义标签
	/*'APP_AUTOLOAD_PATH' => '@.TagLib',
	'TAGLIB_BUILD_IN' => 'Cx,Hd',*/

	//开启静态缓存
	/*'HTML_CACHE_ON' =>true,
	'HTML_CACHE_RULES' => array(
		'Show:index' => array('{:module}_{:action}_{id}', 3600),
	),*/

);