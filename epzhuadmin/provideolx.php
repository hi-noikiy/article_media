<?
include("../config/conn.php");//二次开发联系QQ:120036745//二次开发联系QQ:12-0036-745
include("../config/function.php");
AdminSes_audit();

if(!strstr($adminqx,",0,") && !strstr($adminqx,",0101,")){Audit_alert("权限不够","default.php");}
$bh=$_GET[bh];
while0("*","epzhu_pro where bh='".$bh."'");if(!$row=mysql_fetch_array($res)){php_toheader("productlist.php");}
deletetable("epzhu_provideo where probh='".$bh."' and zt=99");

$mbh=time()."v".$row[userid];
$sj=date("Y-m-d H:i:s");
intotable("epzhu_provideo","userid,probh,sj,djl,bh,iftj,zt","".$row[userid].",'".$bh."','".$sj."',1,'".$mbh."',0,99");

php_toheader("provideo.php?mybh=".$mbh."&bh=".$bh);
?>
