<?
include("../config/conn.php");//二次开发联系QQ:120036745//二次开发联系QQ:12-0036-745
include("../config/function.php");
AdminSes_audit();
while1("*","epzhu_tp where id=".$_GET[id]);if($row1=mysql_fetch_array($res1)){
 if(!empty($row1[tp])){
  delFile("../".str_replace(".","-1.",$row1[tp]));
  delFile("../".$row1[tp]);
 }
 deletetable("epzhu_tp where id=".$_GET[id]);
}
?>
