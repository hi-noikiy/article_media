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
<title>会员中心 <?=webname?></title>
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
 <div class="d2">资金明细</div>
 <div class="d3"></div>
</div>

<? 
$ses=" where moneynum<>0 and userid=".$rowuser[id];
$page=$_GET["page"];if($page==""){$page=1;}else{$page=intval($_GET["page"]);}
if(1==$page){
$m1=returnsum("moneynum","epzhu_moneyrecord where moneynum>0 and userid=".$rowuser[id]);
$m2=returnsum("moneynum","epzhu_moneyrecord where moneynum<0 and userid=".$rowuser[id]);
?>
<div class="paytj box">
 <div class="d1">收入<br><?=round($m1,2)?></div>
 <div class="d2">支出<br><?=round($m2,2)?></div>
 <div class="d3">剩余<br><?=round($m1+$m2,2)?></div>
</div>
<? }?>

 <?
 $ses=" where userid=".$rowuser[id];
 $page=$_GET["page"];if($page==""){$page=1;}else{$page=intval($_GET["page"]);}
 pagef($ses,30,"epzhu_moneyrecord","order by sj desc");while($row=mysql_fetch_array($res)){
 ?>
 <div class="paylog box">
 <div class="d1"><?=$row[tit]?><br><span class="hui"><?=$row[sj]?></span></div>
 <div class="d2"><?=$row[moneynum]?></div>
 </div>
 <? }?>

 <div class="npa">
 <?
 $nowurl="paylog.php";
 $nowwd="";
 require("page.html");
 ?>
 </div>

</body>
</html>