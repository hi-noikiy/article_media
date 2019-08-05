<?
$sqluser="select * from epzhu_user where uid='".$_SESSION[SHOPUSER]."'";mysql_query("SET NAMES 'GBK'");$resuser=mysql_query($sqluser);
if(!$rowuser=mysql_fetch_array($resuser)){php_toheader("../reg/");}
$usertx="../../upload/".$rowuser[id]."/user.jpg";if(!is_file($usertx)){$usertx="../../user/img/nonetx.gif";}
$shoplogo="../../upload/".$rowuser[id]."/shop.jpg";if(!is_file($shoplogo)){$shoplogo="img/shoplogo.png";}
if(empty($pdpwd)){if(strcmp(sha1("123456"),$rowuser[pwd])==0){Audit_alert("您的密码为123456，请立即修改","pwd.php");}}
?>
<span id="webhttp" style="display:none"><?=weburl?></span>