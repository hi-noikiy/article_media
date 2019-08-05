<?php
include("../config/conn.php");//二次开发联系QQ:120036745//二次开发联系QQ:12-0036-745
include("../config/function.php");
AdminSes_audit();
$sj=date("Y-m-d H:i:s");
$bh=$_GET[bh];
$ty1id=$_GET[ty1id];
while0("*","epzhu_pro where bh='".$bh."'");if(!$row=mysql_fetch_array($res)){php_toheader("productlist.php");}

if(!strstr($adminqx,",0,") && !strstr($adminqx,",0101,")){Audit_alert("权限不够","default.php");}
while1("*","epzhu_taocan where id=".$ty1id);if(!$row1=mysql_fetch_array($res1)){php_toheader("productlist.php");}
$nxh=returnxh("epzhu_taocan"," and admin=2 and tit='".$row1[tit]."' and probh='".$bh."'");
intotable("epzhu_taocan","tit,xh,admin,probh,userid,zt","'".$row1[tit]."',".$nxh.",2,'".$bh."',".$row[userid].",99");
$id=mysql_insert_id();
php_toheader("taocan1.php?ty1id=".$_GET[ty1id]."&bh=".$bh."&id=".$id);
?>
