<?
include("../config/conn.php");//二次开发联系QQ:120036745//二次开发联系QQ:120036745
include("../config/functionzh.php");
sesCheck();

$userid=returnuserid($_SESSION[SHOPUSER]);
$sj=date("Y-m-d H:i:s");
$bh=time()."p".$userid;
deletetable("epzhu_protype where userid=".$userid." and zt=99");
$nxh=returnxh("epzhu_protype"," and userid=".$userid." and admin=1 and zt=0");
intotable("epzhu_protype","bh,userid,admin,xh,sj,zt","'".$bh."',".$userid.",1,".$nxh.",'".$sj."',99");
php_toheader("protype1zh.php?bh=".$bh);
?>
