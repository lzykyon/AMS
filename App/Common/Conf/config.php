<?php
return array(
	//'配置项'=>'配置值'
	//'LOAD_EXT_CONFIG' => 'data',
		
	//设置允许模块和默认模块
	'MODULE_ALLOW_LIST'	   =>	 array('Home','Admin'),
	'DEFAULT_MODULE'       =>    'Home',
	
	//url模式设置
	'URL_MODEL'				=>	2, // 0 (普通模式); 1 (PATHINFO 模式); 2 (REWRITE  模式); 3 (兼容模式)  默认为PATHINFO 模式
	
	
	'LOG_RECORD' => true, // 开启日志记录
	
	'LOG_LEVEL'  =>'EMERG,ALERT,CRIT,ERR', // 只记录EMERG ALERT CRIT ERR 错误
	
	//让页面显示追踪日志信息
	'SHOW_PAGE_TRACE'		=>	false,
	
	//url地址大小写不敏感设置
	'URL_CASE_INSENSITIVE'	=>	false,
	
	//设置时区
	'DEFAULT_TIMEZONE'	=>'Asia/Shanghai',	//上海时区
	
	
	//数据库连接配置
	'DB_TYPE'               =>  'mysqli',     // 数据库类型
	'DB_HOST'               =>  'localhost', // 服务器地址
	'DB_NAME'               =>  'ams_server',          // 数据库名
	'DB_USER'               =>  'root',      // 用户名
	'DB_PWD'                =>  'jiushimima',          // 密码
	'DB_PORT'               =>  '3306',        // 端口
	'DB_PREFIX'             =>  '',    // 数据库表前缀
	'DB_FIELDTYPE_CHECK'    =>  false,       // 是否进行字段类型检查
	'DB_FIELDS_CACHE'       =>  false,        // 启用字段缓存
	'DB_CHARSET'            =>  'utf8',      // 数据库编码默认采用utf8
	
	//以下字段缓存没有其作用
	//1.如果是调试模式就不起作用
	//2.false 也是不起作用
	// 'DB_FIELDS_CACHE'       =>  true,        // 启用字段缓存
	// 'DB_CHARSET'            =>  'utf8',      // 数据库编码默认采用utf8
	
	/* 数据缓存设置 */
	'DATA_CACHE_TIME'       =>  60*60*4,      // 数据缓存有效期 0表示永久缓存
	// 		'DATA_CACHE_TYPE'       =>  'Memcache',  // 数据缓存类型,支持:File|Db|Apc|Memcache|Shmop|Sqlite|Xcache|Apachenote|Eaccelerator
	// 		'MEMCACHED_HOST'		=>	'120.24.81.181',//memcache服务器，可为数组
	// 		'MEMCACHED_PORT'		=>	'11211',		//me1mcache端口，可为数组
	//修改模板引擎为smarty
	'TMPL_ENGINE_TYPE'      =>  'Think',	//可以在ThinkPHP\Conf\convention.php中找到配置箱
	
	//多语言支持
	// 'LANG_SWITCH_ON'		=>  true,		//默认关闭语言包功能
	// 'LANG_AUTO_DETECT'		=>  true,		//自动怎侧语言  开启多语言功能后有效、
	// 'LANG_LIST'				=>  'zh-cn,zh-tw,en-us',	//允许切换的语言列表 用逗号分隔
	// 'VAR_LANGUAGE'			=>	'h1',		//默认语言切换变量

	'SESSION_AUTO_START' => TRUE, //启动session

	'DEFAULT_FILTER'        => 'strip_tags,htmlspecialchars',//变量过滤

	//'URL_HTML_SUFFIX'       => '',
	// 'LAYOUT_ON'=>true,
	// 'LAYOUT_NAME'=>'m',
	
	'MAP_ATTRIBUTE_NAME'	=> 'perms_map',	//权限控制标签属性
);