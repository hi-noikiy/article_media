<?
include("../../config/conn.php");
include("../../config/function.php");
$sj=date("Y-m-d H:i:s");
if(empty($_SESSION["SHOPUSER"])){Audit_alert("��¼��ʱ!","./","parent.");}

$userid=returnuserid($_SESSION["SHOPUSER"]);
$sj=date("Y-m-d H:i:s");
$bh=time();
$uip=$_SERVER["REMOTE_ADDR"];
$money1=$_GET[m];
$ddbh=time().$userid.rnd_num(1000);	
intotable("epzhu_dingdang","bh,ddbh,userid,sj,uip,money1,ddzt,alipayzt,bz,ifok","'".$bh."','".$ddbh."',".$userid.",'".$sj."','".$uip."',".$money1.",'�ȴ���Ҹ���','','΢��֧��',0");
php_toheader("example/native.php?ddbh=".$ddbh."&ifwap=".$_GET[ifwap]);
?>
