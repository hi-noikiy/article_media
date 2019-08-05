<?
include("../config/conn.php");//二次开发联系QQ:120036745//二次开发联系QQ:120036745
include("../config/function.php");//二-次开-发-联-系Q-Q:12-00-3674-5
sesCheck();

$userid=returnuserid($_SESSION[SHOPUSER]);
$sj=date("Y-m-d H:i:s");
$bh=time()."p".$userid;
$id1=$_GET[id1];
deletetable("epzhu_shopmenu where userid=".$userid." and zt=99");
while1("*","epzhu_shopmenu where id=".$id1." and userid=".$userid." and admin=1");
if(!$row1=mysql_fetch_array($res1)){Audit_alert("来源错误","shopmenulist.php","parent.");}

$nxh=returnxh("epzhu_shopmenu"," and userid=".$userid." and admin=2 and tit1='".$row1[tit1]."' and zt=0");

intotable("epzhu_shopmenu","bh,userid,tit1,targ,admin,xh,sj,zt","'".$bh."',".$userid.",'".$row1[tit1]."',1,2,".$nxh.",'".$sj."',99");

php_toheader("shopmenu2.php?bh=".$bh);
?>
