<?
include("../../config/conn.php");
include("../../config/function.php");
sesCheck_m();
?>
<html>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
<title>��Ա���� <?=webname?></title>
<link rel="stylesheet" href="../css/basic.css">
<link rel="stylesheet" href="index.css">
<script src="../js/jquery-1.9.1.min.js" type="text/javascript"></script>
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="index.js"></script>
</head>
<body>
<? include("topuser.php");?>

<div class="bfbtop1 box">
 <div class="d1" onClick="gourl('index.php')"><img src="img/topleft.png" height="21" /></div>
 <div class="d2">���ּ�¼</div>
 <div class="d3"></div>
</div>

<? 
$ses=" where jfnum<>0 and userid=".$rowuser[id];
$page=$_GET["page"];if($page==""){$page=1;}else{$page=intval($_GET["page"]);}
if(1==$page){
$jf1=returnsum("jfnum","epzhu_jfrecord where jfnum>0 and userid=".$rowuser[id]);
$jf2=returnsum("jfnum","epzhu_jfrecord where jfnum<0 and userid=".$rowuser[id]);
?>
<div class="jftj box">
 <div class="d1">����<br><?=$jf1?></div>
 <div class="d2">֧��<br><?=$jf2?></div>
 <div class="d3">ʣ��<br><?=$jf1+$jf2?></div>
</div>
<? }?>

 <?
 pagef($ses,30,"epzhu_jfrecord","order by sj desc");while($row=mysql_fetch_array($res)){
 if($row[jfnum]>0){$jf="+".abs($row[jfnum]);}
 elseif($row[jfnum]<0){$jf="-".abs($row[jfnum]);}
 ?>
 <div class="jflog box">
 <div class="d1"><?=$row[tit]?><br><span class="hui"><?=$row[sj]?></span></div>
 <div class="d2"><?=$jf?></div>
 </div>
 <? }?>

 <div class="npa">
 <?
 $nowurl="jflog.php";
 $nowwd="";
 require("page.html");
 ?>
 </div>

</body>
</html>