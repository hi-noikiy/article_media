<?
include("../config/conn.php");//二次开发联系QQ:120036745//二次开发联系QQ:120036745
include("../config/function.php");//二-次开-发-联-系Q-Q:12-00-3674-5
$userid=returnuserid($_SESSION[SHOPUSER]);
$id=$_GET[id];
if(!is_numeric($id)){exit;}
while1("*","epzhu_tp where userid=".$userid." and id=".$id);if($row1=mysql_fetch_array($res1)){
 if(!empty($row1[tp])){
  delFile("../".str_replace(".","-1.",$row1[tp]));
  delFile("../".str_replace(".","-2.",$row1[tp]));
  delFile("../".$row1[tp]);
 }
 deletetable("epzhu_tp where id=".$id);
}
?>
