<?
//获取总运费
include("../config/conn.php");//二次开发联系QQ:120036745//二-次开-发-联-系QQ:12-00-36-745
include("../config/functionmg.php");
$u=$_GET["u"];$s=$_GET["s"];$sl=$_GET["sl"];$p=$_GET["p"];
echo returnyunfei($u,$s,$sl,$p);
?>