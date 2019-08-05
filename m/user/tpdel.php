<?
include("../../config/conn.php");
include("../../config/function.php");

$admin=intval($_GET[admin]);
$sqluser="select * from epzhu_user where uid='".$_SESSION[SHOPUSER]."'";mysql_query("SET NAMES 'GBK'");$resuser=mysql_query($sqluser);
if(!$rowuser=mysql_fetch_array($resuser)){Audit_alert("登录超时","../reg/","parent.");}
$userid=$rowuser[id];

if($admin==1){
delFile("../../upload/".$userid."/shop.jpg");

}elseif($admin==2){
delFile("../../upload/".$userid."/user.jpg");

}elseif($admin==3){
$mbh=strgb2312($rowuser[sfz],0,15)."-1";
delFile("../../upload/".$userid."/".$mbh.".jpg");

}elseif($admin==4){
$mbh=strgb2312($rowuser[sfz],0,15)."-2";
delFile("../../upload/".$userid."/".$mbh.".jpg");

}elseif($admin==5){
$mbh=strgb2312($rowuser[sfz],0,15)."-3";
delFile("../../upload/".$userid."/".$mbh.".jpg");

}elseif($admin==6){
$id=$_GET[id];
if(!is_numeric($id)){exit;}
while1("*","epzhu_tp where userid=".$userid." and id=".$id);if($row1=mysql_fetch_array($res1)){
 if(!empty($row1[tp])){
  delFile("../../".str_replace(".","-1.",$row1[tp]));
  delFile("../../".str_replace(".","-2.",$row1[tp]));
  delFile("../../".$row1[tp]);
 }
 deletetable("epzhu_tp where id=".$id);
}
	
}
?>
