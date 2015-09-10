<?php

return array(
	'TMPL_PARSE_STRING' => array(
		'__PUBLIC__' => '/Public'
		),


		//开启静态缓存
		'HTML_CACHE_ON' =>true,
		'HTML_CACHE_RULES' => array(
			//'Index:index' => array('{:module}_{:action}_{id}', 0),
			//'Blog:index' => array('{:module}_{:action}_{id}', 60 * 60),
		),

		//动态缓存方式 默认文件缓存File 内存缓存Memcache Redis
		/*'DATA_CACHE_TYPE' =>'File',
		'MEMCACHE_HOST' => '127.0.0.1',
		'MEMCACHE_PORT' => 11211,*/

		// 'REDIS_HOST' => '127.0.0.1'
		// 'REDIS_PORT' => 6379,
	);

?>