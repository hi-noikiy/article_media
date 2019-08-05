<?
include("../config/conn.php");//二次开发联系QQ:120036745//二次开发联系QQ:120036745
include("../config/function.php");//二-次开-发-联-系Q-Q:12-00-3674-5
sesCheck();

$userid=returnuserid($_SESSION[SHOPUSER]);
$sj=date("Y-m-d H:i:s");
$uip=$_SERVER["REMOTE_ADDR"];
$bh=time()."n".$userid;
intotable("epzhu_news","type1id,type2id,djl,sj,lastsj,uip,bh,ifjc,zt,iftp,indextop,userid","0,0,0,'".$sj."','".$sj."','".$uip."','".$bh."',0,99,0,0,".$userid."");
php_toheader("news.php?bh=".$bh);
?>
