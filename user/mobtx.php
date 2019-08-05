<?
include("../config/conn.php");//二次开发联系QQ:120036745//二次开发联系QQ:120036745
include("../config/function.php");//二-次开-发-联-系Q-Q:12-00-3674-5
while1("uid,email,ifemail","epzhu_user where uid='".$_SESSION[SHOPUSER]."'");$row1=mysql_fetch_array($res1);
if(empty($row1[email]) || $row1[ifemail]==0){echo "err";exit;}

require("../config/mailphp/sendmail.php");
$yz=MakePass(6);
$str="验证码：<font color='red' style='font-size:18px;'>".$yz."</font>,如果不是本人操作，请忽略此信息。【".webname."】<hr>该邮件为系统发出，请勿回复";
yjsendmail("安全码修改【".webname."】",$row1[email],$str);
updatetable("epzhu_user","getpwd='".$yz."' where uid='".$_SESSION[SHOPUSER]."'");
?>