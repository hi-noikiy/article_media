<?
include("../config/conn.php");//二次开发联系QQ:120036745//二-次开-发-联-系QQ:12-00-36-745
include("../config/function.php");
$id=$_GET[id];
if(empty($_SESSION["SHOPUSER"])){echo "err1";exit;}
$userid=returnuserid($_SESSION["SHOPUSER"]);
if($userid==$id){echo "err2";exit;}
if(panduan("shopid,userid","epzhu_shopfav where shopid=".$id." and userid=".$userid)==1){echo "ok";exit;}
$sj=date("Y-m-d H:i:s");
intotable("epzhu_shopfav","shopid,userid,sj","".$id.",".$userid.",'".$sj."'");
echo "ok";exit;
?>
