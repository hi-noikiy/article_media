<?
include("../config/conn.php");
include("../config/function.php");
$mot=$_POST[mot];
if(empty($mot)){echo "err1";exit;}

$yzm=$_POST[txyzm];
if(empty($yzm)){echo "err2";exit;}
if(strtolower($_SESSION["authnum_session"])!=strtolower($yzm)){echo "err2";exit;}

if(panduan("mot,ifmot","epzhu_user where mot='".$mot."' and ifmot=1")==1){echo "err1";exit;}

while1("*","epzhu_smsmb where mybh='000'");
if($row1=mysql_fetch_array($res1)){$txt=$row1[txt];}else{$txt="��֤�룺${yzm},������Ǳ��˲���������Դ���Ϣ��";}
$yz=MakePass(6);
if(empty($rowcontrol[smsmode])){
 include("../config/mobphp/mysendsms.php");
 $str=str_replace("\${yzm}",$yz,$txt);
 yjsendsms($mot,$str);
}else{
 $sms_txt="{yzm:'".$yz."'}";
 $sms_mot=$mot;
 $sms_id=$row1[mbid];
 @include("../config/mobphp/mysendsms.php");
}

$_SESSION["REGMOT"]=$mot;
$_SESSION["REGMOTYZ"]=$yz;echo "ok";exit;

?>