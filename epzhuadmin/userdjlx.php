<?
include("../config/conn.php");//二次开发联系QQ:120036745//二次开发联系QQ:12-0036-745
include("../config/function.php");
AdminSes_audit();

if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){Audit_alert("权限不够","default.php");}
$sj=date("Y-m-d H:i:s");
$bh=time()."d".rnd_num(100);
$xh=returnxh("epzhu_userdj"," and zt=0");
intotable("epzhu_userdj","bh,xh,sj,zt","'".$bh."',".$xh.",'".$sj."',99");
php_toheader("userdj.php?bh=".$bh);
?>
