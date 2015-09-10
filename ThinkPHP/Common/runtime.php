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

/**
 * ThinkPHP 运行时文件 编译后不再加载
 * @category   Think
 * @package  Common
 * @author   liu21st <liu21st@gmail.com>
 */
defined('THINK_PATH') or exit();//exit — 输出一个消息并且退出当前脚本 
if(version_compare(PHP_VERSION,'5.2.0','<'))  die('require PHP > 5.2.0 !');//version_compare()  用于对比两个「PHP 规范化」的版本数字字符串。 这对于编写仅能兼容某些版本 PHP 的程序很有帮助。 || die等同于exit

//  版本信息
define('THINK_VERSION', '3.1.3');

//   系统信息
if(version_compare(PHP_VERSION,'5.4.0','<')) {
    ini_set('magic_quotes_runtime',0);//如果启用了 magic_quotes_runtime，大多数返回任何形式外部数据的函数，包括数据库和文本段将会用反斜线转义引号。 如 || 本特性已自 PHP 5.3.0 起废弃并将自 PHP 5.4.0 起移除。
    define('MAGIC_QUOTES_GPC',get_magic_quotes_gpc()?True:False);
}else{
    define('MAGIC_QUOTES_GPC',false);
}
define('IS_CGI',substr(PHP_SAPI, 0,3)=='cgi' ? 1 : 0 );
define('IS_WIN',strstr(PHP_OS, 'WIN') ? 1 : 0 );
define('IS_CLI',PHP_SAPI=='cli'? 1   :   0);

// 项目名称
defined('APP_NAME') or define('APP_NAME', basename(dirname($_SERVER['SCRIPT_FILENAME'])));

if(!IS_CLI) {
    // 当前文件名
    if(!defined('_PHP_FILE_')) {
        if(IS_CGI) {
            //CGI/FASTCGI模式下
            $_temp  = explode('.php',$_SERVER['PHP_SELF']);
            define('_PHP_FILE_',    rtrim(str_replace($_SERVER['HTTP_HOST'],'',$_temp[0].'.php'),'/'));
        }else {
            define('_PHP_FILE_',    rtrim($_SERVER['SCRIPT_NAME'],'/'));
        }
    }
    if(!defined('__ROOT__')) {
        // 网站URL根目录
        //basename — 返回路径中的文件名部分 
        //将 string 中所有的字母字符转换为大写并返回。 
        //给出一个包含有指向一个文件的全路径的字符串，本函数返回去掉文件名后的目录名。 
        if( strtoupper(APP_NAME) == strtoupper(basename(dirname(_PHP_FILE_))) ) {
            $_root = dirname(dirname(_PHP_FILE_));
        }else {
            $_root = dirname(_PHP_FILE_);
        }
        define('__ROOT__',   (($_root=='/' || $_root=='\\')?'':$_root));
    }

    //支持的URL模式
    define('URL_COMMON',      0);   //普通模式
    define('URL_PATHINFO',    1);   //PATHINFO模式
    define('URL_REWRITE',     2);   //REWRITE模式
    define('URL_COMPAT',      3);   // 兼容模式
}
//echo basename(dirname(__FILE__));
// 路径设置 可在入口文件中重新定义 所有路径常量都必须以/ 结尾
defined('CORE_PATH')    or define('CORE_PATH',      THINK_PATH.'Lib/'); // 系统核心类库目录
defined('EXTEND_PATH')  or define('EXTEND_PATH',    THINK_PATH.'Extend/'); // 系统扩展目录
defined('MODE_PATH')    or define('MODE_PATH',      EXTEND_PATH.'Mode/'); // 模式扩展目录
defined('ENGINE_PATH')  or define('ENGINE_PATH',    EXTEND_PATH.'Engine/'); // 引擎扩展目录
defined('VENDOR_PATH')  or define('VENDOR_PATH',    EXTEND_PATH.'Vendor/'); // 第三方类库目录
defined('LIBRARY_PATH') or define('LIBRARY_PATH',   EXTEND_PATH.'Library/'); // 扩展类库目录
defined('COMMON_PATH')  or define('COMMON_PATH',    APP_PATH.'Common/'); // 项目公共目录
defined('LIB_PATH')     or define('LIB_PATH',       APP_PATH.'Lib/'); // 项目类库目录
defined('CONF_PATH')    or define('CONF_PATH',      APP_PATH.'Conf/'); // 项目配置目录
defined('LANG_PATH')    or define('LANG_PATH',      APP_PATH.'Lang/'); // 项目语言包目录
defined('TMPL_PATH')    or define('TMPL_PATH',      APP_PATH.'Tpl/'); // 项目模板目录
defined('HTML_PATH')    or define('HTML_PATH',      APP_PATH.'Html/'); // 项目静态目录
defined('LOG_PATH')     or define('LOG_PATH',       RUNTIME_PATH.'Logs/'); // 项目日志目录
defined('TEMP_PATH')    or define('TEMP_PATH',      RUNTIME_PATH.'Temp/'); // 项目缓存目录
defined('DATA_PATH')    or define('DATA_PATH',      RUNTIME_PATH.'Data/'); // 项目数据目录
defined('CACHE_PATH')   or define('CACHE_PATH',     RUNTIME_PATH.'Cache/'); // 项目模板缓存目录

// 为了方便导入第三方类库 设置Vendor目录到include_path
//set_include_path 为当前脚本设置 include_path 运行时的配置选项。 
/*比如你有一个文件夹：命名为include，里面有 
数据库连接文件：conn.php……, 
你这样设置：set_include_path("/include") 
那么以后你就直接可以在其他页面中使用 
include("conn.php") 
这不是经常见到吗？它参数就字符串，当然你也可以设置多个路径，中间用;分开，

而你那句：
set_include_path(get_include_path() . PATH_SEPARATOR . 
__TYPECHO_ROOT_DIR__ . '/var' . PATH_SEPARATOR . 
__TYPECHO_ROOT_DIR__ . __TYPECHO_PLUGIN_DIR__); 
什意思呢，举个例子：
你的一个页面有这样的语句：
include('/inc/sql.php');
include('/inc/conn.php');
;
;
而你突然发现我把这些要包含的文件放在inc目录下不安全，怎么办，要改，我想放到include目录中，好的，这么多页面不累死才怪：有没有好的方法！有！！！！！！！

我在config.inc.php中写着么一句：
set_include_path(get_include_path() .'/include')就这么简单，对，就这么简单！动态的修改！*/
set_include_path(get_include_path() . PATH_SEPARATOR . VENDOR_PATH);

// 加载运行时所需要的文件 并负责自动目录生成
function load_runtime_file() {
    // 加载系统基础函数库
    require THINK_PATH.'Common/common.php';
    // 读取核心文件列表
    $list = array(
        CORE_PATH.'Core/Think.class.php',
        CORE_PATH.'Core/ThinkException.class.php',  // 异常处理类
        CORE_PATH.'Core/Behavior.class.php',
    );
    // 加载模式文件列表
    foreach ($list as $key=>$file){
        if(is_file($file))  require_cache($file);
    }
    // 加载系统类库别名定义
    alias_import(include THINK_PATH.'Conf/alias.php');

    // 检查项目目录结构 如果不存在则自动创建
    if(!is_dir(LIB_PATH)) {
        // 创建项目目录结构
        build_app_dir();
    }elseif(!is_dir(CACHE_PATH)){
        // 检查缓存目录
        check_runtime();
    }elseif(APP_DEBUG){
        // 调试模式切换删除编译缓存
        if(is_file(RUNTIME_FILE))   unlink(RUNTIME_FILE);
    }
}

// 检查缓存目录(Runtime) 如果不存在则自动创建
function check_runtime() {
    if(!is_dir(RUNTIME_PATH)) {
        mkdir(RUNTIME_PATH);
    }elseif(!is_writeable(RUNTIME_PATH)) {
        header('Content-Type:text/html; charset=utf-8');
        exit('目录 [ '.RUNTIME_PATH.' ] 不可写！');
    }
    mkdir(CACHE_PATH);  // 模板缓存目录
    if(!is_dir(LOG_PATH))   mkdir(LOG_PATH);    // 日志目录
    if(!is_dir(TEMP_PATH))  mkdir(TEMP_PATH);   // 数据缓存目录
    if(!is_dir(DATA_PATH))  mkdir(DATA_PATH);   // 数据文件目录
    return true;
}

// 创建编译缓存
function build_runtime_cache($append='') {
    // 生成编译文件
    //返回当前所有已定义的常量名和值。这包含 define()函数所创建的，也包含了所有扩展所创建的。
    $defs           = get_defined_constants(TRUE);
    $content        =  '$GLOBALS[\'_beginTime\'] = microtime(TRUE);';
    if(defined('RUNTIME_DEF_FILE')) { // 编译后的常量文件外部引入
        file_put_contents(RUNTIME_DEF_FILE,'<?php '.array_define($defs['user']));
        $content   .=  'require \''.RUNTIME_DEF_FILE.'\';';
    }else{
        $content   .= array_define($defs['user']);
    }
    $content       .= 'set_include_path(get_include_path() . PATH_SEPARATOR . VENDOR_PATH);';
    // 读取核心编译文件列表
    $list = array(
        THINK_PATH.'Common/common.php',
        CORE_PATH.'Core/Think.class.php',
        CORE_PATH.'Core/ThinkException.class.php',
        CORE_PATH.'Core/Behavior.class.php',
    );
    foreach ($list as $file){
        $content .= compile($file);
    }
    // 系统行为扩展文件统一编译
    $content .= build_tags_cache();
    
    $alias      = include THINK_PATH.'Conf/alias.php';
    $content   .= 'alias_import('.var_export($alias,true).');';
    // 编译框架默认语言包和配置参数
    $content   .= $append."\nL(".var_export(L(),true).");C(".var_export(C(),true).');G(\'loadTime\');Think::Start();';
    file_put_contents(RUNTIME_FILE,strip_whitespace('<?php '.str_replace("defined('THINK_PATH') or exit();",' ',$content)));
}

// 编译系统行为扩展类库
function build_tags_cache() {
    $tags = C('extends');
    $content = '';
    foreach ($tags as $tag=>$item){
        foreach ($item as $key=>$name) {
            $content .= is_int($key)?compile(CORE_PATH.'Behavior/'.$name.'Behavior.class.php'):compile($name);
        }
    }
    return $content;
}

// 创建项目目录结构
function build_app_dir() {
    // 没有创建项目目录的话自动创建
    if(!is_dir(APP_PATH)) mkdir(APP_PATH,0755,true);
    if(is_writeable(APP_PATH)) {
        $dirs  = array(
            LIB_PATH,
            RUNTIME_PATH,
            CONF_PATH,
            COMMON_PATH,
            LANG_PATH,
            CACHE_PATH,
            TMPL_PATH,
            TMPL_PATH.C('DEFAULT_THEME').'/',
            LOG_PATH,
            TEMP_PATH,
            DATA_PATH,
            LIB_PATH.'Model/',
            LIB_PATH.'Action/',
            LIB_PATH.'Behavior/',
            LIB_PATH.'Widget/',
            );
        foreach ($dirs as $dir){
            if(!is_dir($dir))  mkdir($dir,0755,true);
        }
        // 写入目录安全文件
        build_dir_secure($dirs);
        // 写入初始配置文件
        if(!is_file(CONF_PATH.'config.php'))
            file_put_contents(CONF_PATH.'config.php',"<?php\nreturn array(\n\t//'配置项'=>'配置值'\n);\n?>");
        // 写入测试Action
        if(!is_file(LIB_PATH.'Action/IndexAction.class.php'))
            build_first_action();
    }else{
        header('Content-Type:text/html; charset=utf-8');
        exit('项目目录不可写，目录无法自动生成！<BR>请使用项目生成器或者手动生成项目目录~');
    }
}

// 创建测试Action
function build_first_action() {
    $content = file_get_contents(THINK_PATH.'Tpl/default_index.tpl');
    file_put_contents(LIB_PATH.'Action/IndexAction.class.php',$content);
}

// 生成目录安全文件
function build_dir_secure($dirs=array()) {
    // 目录安全写入
    if(defined('BUILD_DIR_SECURE') && BUILD_DIR_SECURE) {
        defined('DIR_SECURE_FILENAME')  or define('DIR_SECURE_FILENAME',    'index.html');
        defined('DIR_SECURE_CONTENT')   or define('DIR_SECURE_CONTENT',     ' ');
        // 自动写入目录安全文件
        $content = DIR_SECURE_CONTENT;

        $files = explode(',', DIR_SECURE_FILENAME);
        foreach ($files as $filename){
            foreach ($dirs as $dir)
                //file_put_contents — 将一个字符串写入文件 
                //If filename does not exist, the file is created. Otherwise, the existing file is overwritten, unless the FILE_APPEND  flag is set. 
                file_put_contents($dir.$filename,$content);
        }
    }
}

// 加载运行时所需文件
load_runtime_file();
// 记录加载文件时间
G('loadTime');
// 执行入口
Think::Start();