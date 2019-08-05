<?php
include("../config/conn.php");//二次开发联系QQ:120036745//二次开发联系QQ:12-0036-745
include("../config/function.php");
AdminSes_audit();
if(!strstr($adminqx,",0,") && !strstr($adminqx,",0701,")){Audit_alert("权限不够","default.php");}
$sql="select id,uid,pwd from epzhu_user where uid='".$_GET[uid]."'";mysql_query("SET NAMES 'GBK'");$res=mysql_query($sql,$conn);$row=mysql_fetch_array($res);
$_SESSION["SHOPUSER"]=$row[uid];
$_SESSION["SHOPUSERPWD"]=$row[pwd];
php_toheader("../user/");
?>