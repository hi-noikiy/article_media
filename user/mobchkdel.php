<?
include("../config/conn.php");//���ο�����ϵQQ:120036745//���ο�����ϵQQ:120036745
include("../config/function.php");//��-�ο�-��-��-ϵQ-Q:12-00-3674-5
if(empty($_SESSION["SHOPUSER"])){echo "ok";exit;}

while1("uid,mot","epzhu_user where uid='".$_SESSION[SHOPUSER]."'");$row1=mysql_fetch_array($res1);if(empty($row1[mot])){echo "ok";exit;}
if(strtolower($_SESSION["authnum_session"])!=strtolower($_GET[yzm])){echo "err1";exit;}

$mob=$row1[mot];
while1("*","epzhu_smsmb where mybh='002'");
if($row1=mysql_fetch_array($res1)){$txt=$row1[txt];}else{$txt="��֤�룺${yzm},�����ڽ����ֻ�����󶨣�������Ǳ��˲���������Դ���Ϣ��";}
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
updatetable("epzhu_user","bdmot='".$yz."' where uid='".$_SESSION[SHOPUSER]."'");echo "ok";exit;
?>