<?
include("../config/conn.php");//二次开发联系QQ:120036745//二次开发联系QQ:12-0036-745
include("../config/function.php");
AdminSes_audit();

if(!strstr($adminqx,",0,") && !strstr($adminqx,",0201,")){Audit_alert("权限不够","default.php");}
$sj=date("Y-m-d H:i:s");
$uip=$_SERVER["REMOTE_ADDR"];
$bh=time()."g".rnd_num(100);
$djl=rnd_num(10);
intotable("epzhu_gg","bh,sj,djl,uip,zt","'".$bh."','".$sj."',".$djl.",'".$uip."',99");
php_toheader("gg.php?bh=".$bh);
?>
