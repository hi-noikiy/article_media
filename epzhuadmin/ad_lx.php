<?
include("../config/conn.php");//二次开发联系QQ:120036745//二次开发联系QQ:12-0036-745
include("../config/function.php");
AdminSes_audit();

if(!strstr($adminqx,",0,") && !strstr($adminqx,",0601,")){Audit_alert("权限不够","default.php");}
$sj=date("Y-m-d H:i:s");
$mbh=time()."ad".rnd_num(100);
$adbh=$_GET[bh];
$nxh=returnxh("epzhu_ad"," and adbh='".$adbh."' and zt<>99");
intotable("epzhu_ad","bh,adbh,sj,xh,zt,aw,ah","'".$mbh."','".$adbh."','".$sj."',".$nxh.",99,0,0");
php_toheader("ad.php?bh=".$mbh."&sm=".urlencode($_GET[sm])."&must=".$_GET[must]);
?>
