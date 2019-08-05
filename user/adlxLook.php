<?
include("../config/conn.php");//二次开发联系QQ:120036745//二次开发联系QQ:120036745
include("../config/function.php");//二-次开-发-联-系Q-Q:12-00-3674-5
sesCheck();
$userid=returnuserid($_SESSION["SHOPUSER"]);
while0("*","epzhu_ad where id=".$_GET[id]." and userid=".$userid);if(!$row=mysql_fetch_array($res)){php_toheader("../");}
adreadID($row[id],0,0);
?>
