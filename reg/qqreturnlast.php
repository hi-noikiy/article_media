<?
require_once("../config/qq/API/qqConnectAPI.php");
include("../config/conn.php");
include("../config/function.php");
$qc = new QC();
$acs = $qc->qq_callback();
$openid = $qc->get_openid();
if($_SESSION[TZPCWAP]=="wap"){$nlj="m/";}

//��ʾ�ѵ�¼��ʼ ���а�
if(!empty($_SESSION["SHOPUSER"])){
 if(panduan("uid,openid,ifqq","epzhu_user where openid='".$openid."' and ifqq=1")==1){Audit_alert("��ʧ�ܣ���QQ�Ѿ��󶨹������ʺ�","../".$nlj."user/");}
 updatetable("epzhu_user","openid='',ifqq=0 where openid='".$openid."'");
 updatetable("epzhu_user","openid='".$openid."',ifqq=1 where uid='".$_SESSION[SHOPUSER]."'");	
 php_toheader("../".$nlj."user/");
}
//��ʾ�ѵ�¼���� ���а�

//��ʾδ��¼��ʼ
while0("uid,openid","epzhu_user where openid='".$openid."'");if($row=mysql_fetch_array($res)){ //��ʾ��QQ�Ѿ�����
 $_SESSION["SHOPUSER"]=$row[uid];
 php_toheader("../".$nlj."user/");
 exit;
}

//�޸ĸ��ļ���Ҫͬ���޸���reg/reg.php��reg/qqreturnlast.php 

$qc = new QC($acs,$openid);
$arr = $qc->get_user_info();

$bh=time();
$sj=date("Y-m-d H:i:s");
$uip=$_SERVER["REMOTE_ADDR"];
$uid="qq".$bh.rnd_num(300);
$pwd=sha1("123456");
$nc=iconv('UTF-8', 'GB2312',$arr["nickname"]);
$email=$uid."@qq.com";
include("reg_tem.php");
php_toheader("../".$nlj."user/");

//��ʾδ��¼����
?>