<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2012 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// ThinkPHP 入口文件
// 记录开始运行时间
$GLOBALS['_beginTime'] = microtime(TRUE);//microtime — 返回当前 Unix 时间戳和微秒数 
// 记录内存初始使用
define('MEMORY_LIMIT_ON',function_exists('memory_get_usage'));//在已经定义的函数列表（包括系统自带的函数和用户自定义的函数）中查找 function_name。 
if(MEMORY_LIMIT_ON) $GLOBALS['_startUseMems'] = memory_get_usage();//返回当前分配给你的 PHP 脚本的内存量，单位是字节（byte）。  如果设置为 TRUE ，获取系统分配的真实内存尺寸。如果未设置或者设置为 FALSE ，将是 emalloc() 报告使用的内存量。 

// 系统目录定义
defined('THINK_PATH') 	or define('THINK_PATH', dirname(__FILE__).'/');//给出一个包含有指向一个文件的全路径的字符串，本函数返回去掉文件名后的目录名。 defined 检查该名称的常量是否已定义。 

defined('APP_PATH') 	or define('APP_PATH', dirname($_SERVER['SCRIPT_FILENAME']).'/');//当前执行脚本的绝对路径。 
defined('APP_DEBUG') 	or define('APP_DEBUG',false); // 是否调试模式
if(defined('ENGINE_NAME')) {
    defined('ENGINE_PATH') or define('ENGINE_PATH',THINK_PATH.'Extend/Engine/');
	require ENGINE_PATH.strtolower(ENGINE_NAME).'.php';
}else{
    defined('RUNTIME_PATH') or define('RUNTIME_PATH',APP_PATH.'Runtime/');
	$runtime = defined('MODE_NAME')?'~'.strtolower(MODE_NAME).'_runtime.php':'~runtime.php';
	defined('RUNTIME_FILE') or define('RUNTIME_FILE',RUNTIME_PATH.$runtime);
	if(!APP_DEBUG && is_file(RUNTIME_FILE)) {//is_file — 判断给定文件名是否为一个正常的文件 
	    // 部署模式直接载入运行缓存
	    require RUNTIME_FILE;
	}else{
	    // 加载运行时文件
	    require THINK_PATH.'Common/runtime.php';
	}
}
