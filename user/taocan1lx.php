<?php
include("../config/conn.php");//二次开发联系QQ:120036745//二次开发联系QQ:120036745
include("../config/function.php");//二-次开-发-联-系Q-Q:12-00-3674-5
sesCheck();
$sj=date("Y-m-d H:i:s");
$bh=$_GET[bh];
$ty1id=$_GET[ty1id];
$userid=returnuserid($_SESSION[SHOPUSER]);
while0("*","epzhu_pro where userid=".$userid." and bh='".$bh."'");if(!$row=mysql_fetch_array($res)){php_toheader("productlist.php");}

while1("*","epzhu_taocan where userid=".$userid." and id=".$ty1id);if(!$row1=mysql_fetch_array($res1)){php_toheader("productlist.php");}
$nxh=returnxh("epzhu_taocan"," and admin=2 and tit='".$row1[tit]."' and probh='".$bh."'");
intotable("epzhu_taocan","tit,xh,admin,probh,userid,zt","'".$row1[tit]."',".$nxh.",2,'".$bh."',".$row[userid].",99");
$id=mysql_insert_id();
php_toheader("taocan1.php?ty1id=".$_GET[ty1id]."&bh=".$bh."&id=".$id);
?>
