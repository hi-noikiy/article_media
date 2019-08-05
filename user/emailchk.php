<?
include("../config/conn.php");//二次开发联系QQ:120036745//二次开发联系QQ:120036745
include("../config/function.php");//二-次开-发-联-系Q-Q:12-00-3674-5
if(empty($_SESSION[SHOPUSER])){echo "ok";exit;}
$email=$_GET[email];
if(empty($email)){echo "True";exit;}
if(panduan("uid,email,ifemail","epzhu_user where email='".$email."' and ifemail=1")==1){echo "True";exit;}

require("../config/mailphp/sendmail.php");
$yz=MakePass(6);
$str="验证码：<font color='red' style='font-size:18px;'>".$yz."</font>,您正在进行邮箱绑定，如果不是本人操作，请忽略此信息。【".webname."】<hr>该邮件为系统发出，请勿回复";
yjsendmail("邮箱绑定【".webname."】",$email,$str);
updatetable("epzhu_user","bdemail='".$yz."',email='".$email."' where uid='".$_SESSION[SHOPUSER]."'");echo "ok";exit;

?>