<?php
include("../config/conn.php");//二次开发联系QQ:120036745//二次开发联系QQ:12-0036-745
include("../config/function.php");
AdminSes_audit();
$sj=date("Y-m-d H:i:s");
$bh=$_GET[bh];
while0("*","epzhu_pro where bh='".$bh."'");if(!$row=mysql_fetch_array($res)){php_toheader("productlist.php");}

if(!strstr($adminqx,",0,") && !strstr($adminqx,",0101,")){Audit_alert("权限不够","default.php");}
$nxh=returnxh("epzhu_taocan"," and admin is null and probh='".$bh."' and zt<>99");
intotable("epzhu_taocan","xh,probh,userid,zt","".$nxh.",'".$bh."',".$row[userid].",99");
$id=mysql_insert_id();
php_toheader("taocan.php?bh=".$bh."&id=".$id);

?>
