<?php
//���ļ���UC���õģ����������UC�����ļ�����ɾ��

define('UC_CONNECT', 'mysql');				// ���� UCenter �ķ�ʽ: mysql/NULL, Ĭ��Ϊ��ʱΪ fscoketopen()
							// mysql ��ֱ�����ӵ����ݿ�, Ϊ��Ч��, ������� mysql

//���ݿ���� (mysql ����ʱ, ����û������ UC_DBLINK ʱ, ��Ҫ�������±���)
define('UC_DBHOST', bdm682330632.my3w.com);			// UCenter ���ݿ�����
define('UC_DBUSER', bdm682330632);				// UCenter ���ݿ��û���
define('UC_DBPW', Fangmeijuan520);					// UCenter ���ݿ�����
define('UC_DBNAME', bdm682330632_db);				// UCenter ���ݿ�����
define('UC_DBCHARSET', 'gbk');				// UCenter ���ݿ��ַ���
define('UC_DBTABLEPRE','epzhu_');		// UCenter ���ݿ��ǰ׺

//ͨ�����
define('UC_KEY', 'dzeNaWad8U6h1v4Y0X5h0L356ucm070t6i3Y1O8Vbx9S8lfC9p7q1I0Q670u5Z8U');				// �� UCenter ��ͨ����Կ, Ҫ�� UCenter ����һ��
define('UC_API', 'http://byu6964610001.my3w.com/ucenter');	// UCenter �� URL ��ַ, �ڵ���ͷ��ʱ�����˳���
define('UC_CHARSET', 'gbk');				// UCenter ���ַ���
define('UC_IP', '101.200.62.122');					// UCenter �� IP, �� UC_CONNECT Ϊ�� mysql ��ʽʱ, ���ҵ�ǰӦ�÷�������������������ʱ, �����ô�ֵ
define('UC_APPID', 7);					// ��ǰӦ�õ� ID

//ucexample_2.php �õ���Ӧ�ó������ݿ����Ӳ���
$dbhost = bdm682330632.my3w.com;			// ���ݿ������
$dbuser = bdm682330632;			// ���ݿ��û���
$dbpw = Fangmeijuan520;				// ���ݿ�����
$dbname = bdm682330632_db;			// ���ݿ���
$pconnect = 0;				// ���ݿ�־����� 0=�ر�, 1=��
$tablepre = 'epzhu_';   		// ����ǰ׺, ͬһ���ݿⰲװ�����̳���޸Ĵ˴�
$dbcharset = 'gbk';			// MySQL �ַ���, ��ѡ 'gbk', 'big5', 'utf8', 'latin1', ����Ϊ������̳�ַ����趨

//ͬ����¼ Cookie ����
$cookiedomain = 'byu6964610001.my3w.com'; 			// cookie ������
$cookiepath = '/';			// cookie ����·��