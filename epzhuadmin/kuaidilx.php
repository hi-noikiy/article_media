<?
include("../config/conn.php");//二次开发联系QQ:120036745//二次开发联系QQ:12-0036-745
include("../config/function.php");
AdminSes_audit();

if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){Audit_alert("权限不够","default.php");}
$sj=date("Y-m-d H:i:s");
$bh=time();
$nxh=returnxh("epzhu_kuaidi"," and zt<>99");
deletetable("epzhu_kuaidi where zt=99");
intotable("epzhu_kuaidi","xh,sj,zt,bh","".$nxh.",'".$sj."',99,'".$bh."'");

php_toheader("kuaidi.php?bh=".$bh);
?>
