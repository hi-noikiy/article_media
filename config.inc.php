<?php
//该文件是UC调用的，如果不启用UC，该文件可以删除

define('UC_CONNECT', 'mysql');				// 连接 UCenter 的方式: mysql/NULL, 默认为空时为 fscoketopen()
							// mysql 是直接连接的数据库, 为了效率, 建议采用 mysql

//数据库相关 (mysql 连接时, 并且没有设置 UC_DBLINK 时, 需要配置以下变量)
define('UC_DBHOST', bdm682330632.my3w.com);			// UCenter 数据库主机
define('UC_DBUSER', bdm682330632);				// UCenter 数据库用户名
define('UC_DBPW', Fangmeijuan520);					// UCenter 数据库密码
define('UC_DBNAME', bdm682330632_db);				// UCenter 数据库名称
define('UC_DBCHARSET', 'gbk');				// UCenter 数据库字符集
define('UC_DBTABLEPRE','epzhu_');		// UCenter 数据库表前缀

//通信相关
define('UC_KEY', 'dzeNaWad8U6h1v4Y0X5h0L356ucm070t6i3Y1O8Vbx9S8lfC9p7q1I0Q670u5Z8U');				// 与 UCenter 的通信密钥, 要与 UCenter 保持一致
define('UC_API', 'http://byu6964610001.my3w.com/ucenter');	// UCenter 的 URL 地址, 在调用头像时依赖此常量
define('UC_CHARSET', 'gbk');				// UCenter 的字符集
define('UC_IP', '101.200.62.122');					// UCenter 的 IP, 当 UC_CONNECT 为非 mysql 方式时, 并且当前应用服务器解析域名有问题时, 请设置此值
define('UC_APPID', 7);					// 当前应用的 ID

//ucexample_2.php 用到的应用程序数据库连接参数
$dbhost = bdm682330632.my3w.com;			// 数据库服务器
$dbuser = bdm682330632;			// 数据库用户名
$dbpw = Fangmeijuan520;				// 数据库密码
$dbname = bdm682330632_db;			// 数据库名
$pconnect = 0;				// 数据库持久连接 0=关闭, 1=打开
$tablepre = 'epzhu_';   		// 表名前缀, 同一数据库安装多个论坛请修改此处
$dbcharset = 'gbk';			// MySQL 字符集, 可选 'gbk', 'big5', 'utf8', 'latin1', 留空为按照论坛字符集设定

//同步登录 Cookie 设置
$cookiedomain = 'byu6964610001.my3w.com'; 			// cookie 作用域
$cookiepath = '/';			// cookie 作用路径