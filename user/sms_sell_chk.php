<?
include("../config/conn.php");//二次开发联系QQ:120036745//二次开发联系QQ:120036745
include("../config/function.php");//二-次开-发-联-系Q-Q:12-00-3674-5
if($_GET[id]=="" || empty($_SESSION[SHOPUSER])){echo "err1";exit;}
$id=intval($_GET[id]);
$userid=returnuserid($_SESSION["SHOPUSER"]);
while0("*","epzhu_smsmail where userid=".$userid." and id=".$id);if(!$row=mysql_fetch_array($res)){echo "err1";exit;}

if($row[admin]==1){ //发送邮件
 require("../config/mailphp/sendmail.php");
 @yjsendmail($row[tit],$row[fa],$row[txt]);

}elseif($row[admin]==2){ //发送手机短信
 
 while3("*","epzhu_smsmb where mybh='004'");
 if($row3=mysql_fetch_array($res3)){$txt=$row3[txt];}else{$txt=$row[txt];}
 if(empty($rowcontrol[smsmode])){
  include("../config/mobphp/mysendsms.php");
  $str=str_replace("\${tit}",$row[tit],$txt);
  yjsendsms($row[fa],$str);
 }else{
  $sms_txt="{tit:'".$row[tit]."'}";
  if(1==$rowcontrol[smsmode]){$sms_txt="{tit:'".$row[tit]."'}";}else{$sms_txt="{\"tit\":\"".$row[tit]."\"}";}
  $sms_mot=$row[fa];
  $sms_id=$row3[mbid];
  @include("../config/mobphp/mysendsms.php");
 }
 
 updatetable("epzhu_control","smskc=smskc-1");

}

deletetable("epzhu_smsmail where id=".$id);

echo "ok";
?>