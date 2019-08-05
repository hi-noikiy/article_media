<?
include("../../config/conn.php");
include("../../config/function.php");
sesCheck_m();

$userid=returnuserid($_SESSION[SHOPUSER]);
if($_GET[e]=="back"){
 $id=$_GET[id];
 while0("*","epzhu_tixian where id=".$id." and userid=".$userid." and zt=4");if($row=mysql_fetch_array($res)){
  updatetable("epzhu_tixian","zt=3,sm='用户撤销' where id=".$id);
  PointUpdateM($userid,$row[money1]);
  PointIntoM($userid,"撤消提现申请",$row[money1]);
 }
 php_toheader("tixianlog.php");
}

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
 <div class="d2">提现记录</div>
 <div class="d4" onClick="gourl('tixian.php')">提现</div>
</div>

 <?
 $ses=" where userid=".$userid;
 $page=$_GET["page"];if($page==""){$page=1;}else{$page=intval($_GET["page"]);}
 pagef($ses,30,"epzhu_tixian","order by sj desc");while($row=mysql_fetch_array($res)){
 $cz="";
 if($row[zt]==4){$cz="<a href='tixianlog.php?e=back&id=".$row[id]."'>撤消</a>";}
 ?>
 <div class="txlog box">
 <div class="d1"><?=$row[txname]?>,<?=$row[txyh]?>(<?=$row[txzh]?>)<br><span class="hui"><?=$row[sj]?></span></div>
 <div class="d2"><?=$row[money1]?><br><?=returntxzt($row[zt],$row[sm])?></div>
 </div>
 <? }?>

 <div class="npa">
 <?
 $nowurl="tixianlog.php";
 $nowwd="";
 require("page.html");
 ?>
 </div>
<? include("../tem/bottom.php");?>
</body>
</html>