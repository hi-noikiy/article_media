<?
include("../config/conn.php");//二次开发联系QQ:120036745//二次开发联系QQ:120036745
include("../config/function.php");//二-次开-发-联-系Q-Q:12-00-3674-5
sesCheck();
$userid=returnuserid($_SESSION[SHOPUSER]);
while1("id,bh,userid,zt","epzhu_yunfei where userid=".$userid." and zt=99");if($row1=mysql_fetch_array($res1)){
$bh=$row1[bh];
}else{
$sj=date("Y-m-d H:i:s");
$bh=time()."y".$userid;
intotable("epzhu_yunfei","bh,userid,sj,zt","'".$bh."',".$userid.",'".$sj."',99");
}
php_toheader("yunfei.php?bh=".$bh);
?>
