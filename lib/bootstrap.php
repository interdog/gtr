<?php
/**
 * init procedure and global vars funs
 */
@session_start();

//gloabl var--os based
if(strtoupper(substr(PHP_OS,0,3))=='WIN'){
	define('__OS__','WIN');
	define('__APP_ROOT__','c:\\workspace\\gtr\\');
	define('__CLASS_ROOT__','c:\\workspace\\gtr\\lib\\cls\\');
	define('__BIZ_ROOT__','c:\\workspace\\gtr\\biz\\');
	define('__TEMPLATE_ROOT__','c:\\workspace\\gtr\\tpl\\');
}else{
	define('__OS__',"UNX");
	define('__APP_ROOT__','/workspace/gtr');
	define('__CLASS_ROOT__','/workspace/gtr/lib/cls/');
	define('__BIZ_ROOT__','/workspace/gtr/biz');
	define('__TEMPLATE_ROOT__','/workspace/gtr/tpl/');
}
//global var
define('__TKT_ELEMENT_CNT__',5);
define('__CHARTSET__',"utf-8");
define('__DATEFORMAT__',"Y-m-j");

//global functions
function __autoload($classname)
{
	if(stripos($classname, 'biz'))
	{
		require_once __BIZ_ROOT__.'.php';
	}
	else
	{
		require_once __CLASS_ROOT__.$classname.'.cls.php';
	}
}

//require libs
require_once 'conf.php';