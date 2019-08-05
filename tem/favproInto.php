<?
include("../config/conn.php");//二次开发联系QQ:120036745//二-次开-发-联-系QQ:12-00-36-745
include("../config/function.php");
$bh=$_GET[bh];
if(empty($bh)){exit;}
if(empty($_SESSION["SHOPUSER"])){echo "err1";exit;}
while1("bh,userid","epzhu_pro where bh='".$bh."' and zt=0 and ifxj=0");if(!$row1=mysql_fetch_array($res1)){exit;}
$userid=returnuserid($_SESSION["SHOPUSER"]);
if($userid==$row1[userid]){echo "err2";exit;}
if(panduan("probh,userid","epzhu_profav where probh='".$bh."' and userid=".$userid)==1){echo "ok";exit;}
$sj=date("Y-m-d H:i:s");
intotable("epzhu_profav","probh,userid,selluserid,sj","'".$bh."',".$userid.",".$row1[userid].",'".$sj."'");
echo "ok";exit;
?>
