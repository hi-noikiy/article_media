<?
include("../config/conn.php");//二次开发联系QQ:120036745//二次开发联系QQ:120036745
include("../config/functionkf.php");
sesCheck();

$userid=returnuserid($_SESSION[SHOPUSER]);
$bh=$_GET[bh];
while0("*","epzhu_prokf where bh='".$bh."' and userid=".$userid."");if(!$row=mysql_fetch_array($res)){php_toheader("productlistkf.php");}
deletetable("epzhu_provideo where probh='".$bh."' and zt=99 and userid=".$userid."");

$mbh=time()."v".$row[userid];
$sj=date("Y-m-d H:i:s");
intotable("epzhu_provideo","userid,probh,sj,djl,bh,iftj,zt","".$row[userid].",'".$bh."','".$sj."',1,'".$mbh."',0,99");

php_toheader("provideokf.php?mybh=".$mbh."&bh=".$bh);
?>
