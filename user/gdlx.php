<?
include("../config/conn.php");//二次开发联系QQ:120036745//二次开发联系QQ:120036745
include("../config/function.php");//二-次开-发-联-系Q-Q:12-00-3674-5
sesCheck();
$userid=returnuserid($_SESSION[SHOPUSER]);
$sj=date("Y-m-d H:i:s");
$uip=$_SERVER["REMOTE_ADDR"];
$bh=time()."-".$userid;
intotable("epzhu_gd","bh,userid,sj,uip,zt,gdzt","'".$bh."',".$userid.",'".$sj."','".$uip."',99,1");
php_toheader("gd.php?bh=".$bh); 
?>
