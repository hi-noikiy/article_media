<?php
include("../config/conn.php");//二次开发联系QQ:120036745//二次开发联系QQ:120036745
include("../config/function.php");//二-次开-发-联-系Q-Q:12-00-3674-5
sesCheck();
$sj=date("Y-m-d H:i:s");
$bh=$_GET[bh];
$userid=returnuserid($_SESSION[SHOPUSER]);
while0("*","epzhu_pro where userid=".$userid." and bh='".$bh."'");if(!$row=mysql_fetch_array($res)){php_toheader("productlist.php");}

$nxh=returnxh("epzhu_taocan"," and admin is null and probh='".$bh."' and zt<>99");
intotable("epzhu_taocan","xh,probh,userid,zt","".$nxh.",'".$bh."',".$row[userid].",99");
$id=mysql_insert_id();
php_toheader("taocan.php?bh=".$bh."&id=".$id);

?>
