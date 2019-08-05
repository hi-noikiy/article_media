<?
include("../config/conn.php");//二次开发联系QQ:120036745//二次开发联系QQ:120036745
include("../config/function.php");//二-次开-发-联-系Q-Q:12-00-3674-5
if(empty($_SESSION["SHOPUSER"])){echo "ok";exit;}
$mob=$_GET[mob];
if(empty($mob)){echo "True";exit;}
if(panduan("uid,mot,ifmot","epzhu_user where mot='".$_GET[mob]."' and ifmot=1")==1){echo "True";exit;}
if(strtolower($_SESSION["authnum_session"])!=strtolower($_GET[yzm])){echo "err1";exit;}

while1("*","epzhu_smsmb where mybh='003'");
if($row1=mysql_fetch_array($res1)){$txt=$row1[txt];}else{$txt="验证码：${yzm},您正在进行手机绑定，如果不是本人操作，请忽略此信息。";}
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
updatetable("epzhu_user","bdmot='".$yz."',mot='".$_GET[mob]."' where uid='".$_SESSION[SHOPUSER]."'");echo "ok";exit;

?>