<?
include("../config/conn.php");
include("../config/function.php");
$nc=$_GET["nc"];
if(empty($nc)){echo "True";exit;}
if(panduan("*","epzhu_user where nc='".$nc."'")==1){echo "True";}else{echo "False";exit;}
?>