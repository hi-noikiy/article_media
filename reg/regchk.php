<?
include("../config/conn.php");
include("../config/function.php");
$mob=$_GET[mob];
if(strtolower($_SESSION["authnum_session"])!=strtolower($_GET[tpicyzm])){echo "err1";exit;}
if(empty($mob)){echo "True";exit;}
if(panduan("mot,ifmot","epzhu_user where mot='".$mob."' and ifmot=1")==0){echo "True";exit;}

while1("*","epzhu_smsmb where mybh='006'");
if($row1=mysql_fetch_array($res1)){$txt=$row1[txt];}else{$txt="��֤�룺${yzm},������ͨ���ֻ���ֱ֤�ӵ�¼��������Ǳ��˲���������Դ���Ϣ��";}
$yz=MakePass(6);
if(empty($rowcontrol[smsmode])){
 include("../config/mobphp/mysendsms.php");
 $str=str_replace("\${yzm}",$yz,$txt);
 yjsendsms($mob,$str);
}else{
 if(1==$rowcontrol[smsmode]){$sms_txt="{yzm:'".$yz."'}";}else{$sms_txt="{\"yzm\":\"".$yz."\"}";}
 $sms_mot=$mob;
 $sms_id=$row1[mbid];
 @include("../config/mobphp/mysendsms.php");
}

updatetable("epzhu_control","smskc=smskc-1");
updatetable("epzhu_user","bdmot='".$yz."' where mot='".$mob."' and ifmot=1");echo "ok";exit;

?>