<!--[if IE 6]>
 <script src="../js/DD_belatedPNG_0.0.8a-min.js" type="text/javascript"></script> 
 <script type="text/javascript"> 
 DD_belatedPNG.fix('*'); 
 </script> 
 <![endif]-->
 
 <?
include("../config/conn.php");//二次-开发-联系QQ:1200-36745
include("../config/function.php");
$id=intval($_GET[id]);
$_SESSION["tzURL"]=weburl."code/view".$id.".html";
$sqlmb="select * from epzhu_pro where zt<>99 and id=".$id;mysql_query("SET NAMES 'GBK'");$resmb=mysql_query($sqlmb);
if(!$rowmb=mysql_fetch_array($resmb)){php_toheader("../");}
if(empty($rowmb[txtmb])){include("viewmb.php");}
else{include($rowmb[txtmb]."/viewmb.php");}
?>