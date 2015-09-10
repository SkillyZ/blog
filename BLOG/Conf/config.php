<?php
return array(
	//'配置项'=>'配置值'
	'DB_HOST' => '127.0.0.1',
	'DB_USER' => 'root',
	'DB_PWD' => '',
	'DB_NAME' => 'blog',
	'DB_PREFIX' => 'wl_',
	//'DB_TYPE' => 'mysql'
	//'DB_PORT' => '3306'
	
	//使用分组模式
	'APP_GROUP_LIST'=> 'Index,Admin,Project',
	'DEFAULT_GROUP' =>'Index',
	'APP_GROUP_MODE'=> 1,
	'APP_GROUP_PATH' =>'Modules',
	//自动加载配置文件
	//'LOAD_EXT_CONFIG' => 'verify,water'
	
	//启动调试模式
	'SHOW_PAGE_TRACE' =>true,

	//配置简单路由
	/*//限制伪静态的后缀
	'URL_ROUTER_ON' => true,
	'URL_ROUTE_RULES'=>array(//路由规则  
	    'my'=>'/Index/index',//静态地址路由，加/直接跳到网站根目录下。  
	    ':id/:num'=>'Index/index',//动态地址路由，可以$_GET接收地址栏参数  
	    'year/:year/:month/:date'=>'Index/index',//动态和静态混合地址路由  
	    'year/:year\d/:month\d/:date\d'=>'Index/index',//动态和静态混合地址路由加上 \d代表类型只能是数字  
	    'my/:id$'=>'Index/index',// 加上$说明地址中只能是 my/1000 后面不能有其他内容了
		
		'news/:year/:month/:day' => array('News/archive', 'status=1'),
    	'news/:id'               => 'Blog',
    	'news/read/:id'          => '/news/:1',
	),*/
	'URL_MODEL' =>2,
	'URL_HTML_SUFFIX'=>'html|shmtl|xml',
	'URL_ROUTER_ON' => true,
	'URL_ROUTE_RULES' => array(
		'/^blog_(\d+)$/' => 'Index/Blog/index?id=:1',
		'/^blog_(\d+)\Q-\Epage_(\d+)$/' => 'Index/Blog/index?id=:1',
		'/^randomArticle$/' =>'Index/Index/randomArticle?id=:1',
		'/^page\Q_\E(\d+)$/' => 'index?p=:1'
	),
	//\Q \E中间放转义字符
	'MAIL_ADDRESS'=>'drawmad@163.com', // 邮箱地址
    'MAIL_SMTP'=>'smtp.163.com', // 邮箱SMTP服务器
    'MAIL_LOGINNAME'=>'drawmad@163.com', // 邮箱登录帐号
    'MAIL_PASSWORD'=>'1qaz2wsx', // 邮箱密码
);
?>