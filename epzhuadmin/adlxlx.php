<?
include("../config/conn.php");//���ο�����ϵQQ:120036745//���ο�����ϵQQ:12-0036-745
include("../config/function.php");
AdminSes_audit();

if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){Audit_alert("Ȩ�޲���","default.php");}
$sj=date("Y-m-d H:i:s");
$bh=time()."a".rnd_num(100);
intotable("epzhu_adlx","bh,maxnum,adw,adh,fflx,admin,sj,zt","'".$bh."',0,0,0,1,1,'".$sj."',99");

php_toheader("adlx.php?bh=".$bh);
?>
