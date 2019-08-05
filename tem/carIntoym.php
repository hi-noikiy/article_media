<?
include("../config/conn.php");//二次开发联系QQ:120036745//二-次开-发-联-系QQ:12-00-36-745
include("../config/functionym.php");
$bh=$_GET[bh];
if(empty($bh)){exit;}
$tcid=$_GET[tcid];
if(empty($_SESSION["SHOPUSER"])){echo "err1";exit;}
while1("bh,userid","epzhu_proym where bh='".$bh."' and zt=0");if(!$row1=mysql_fetch_array($res1)){exit;}
$userid=returnuserid($_SESSION["SHOPUSER"]);
if($userid==$row1[userid]){echo "err2";exit;}
if(panduan("*","epzhu_carym where probh='".$bh."' and tcid=".$tcid." and userid=".$userid)==1){echo "ok";exit;}
$sj=date("Y-m-d H:i:s");
intotable("epzhu_carym","probh,userid,selluserid,sj,num,tcid","'".$bh."',".$userid.",".$row1[userid].",'".$sj."',".$_GET[kcnum].",".$tcid."");
echo "ok";exit;
?>
