<?
include("../../config/conn.php");
include("../../config/function.php");
sesCheck_m();
$sj=date("Y-m-d H:i:s");
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
<? include("top_sell.php");?>

<div class="indexpro box" onClick="gourl('productlist.php')">
 <div class="d1"><img src="img/infcap6.png" /></div>
 <div class="d2">我的商品(共<?=returncount("epzhu_pro where zt<>99 and userid=".$rowuser[id]."")?>件)</div>
 <div class="d3"><img src="img/jianright.png" /></div>
</div>
<div class="indexplist box">
 <div class="d1">
 <? while1("*","epzhu_pro where userid=".$rowuser[id]." and zt<>99 order by lastsj desc limit 4");while($row1=mysql_fetch_array($res1)){?>
 <div class="dtp" onClick="gourl('product.php?bh=<?=$row1[bh]?>')">
  <div class="tp"><img src="<?="../../".returntp("bh='".$row1[bh]."' order by xh asc","-1")?>" /></div>
  <div class="t"><?=$row1["tit"]?></div>
  <div class="m">￥<?=returnyhmoney($row1[yhxs],$row1[money2],$row1[money3],$sj,$row1[yhsj1],$row1[yhsj2],$row1[id])?></div>
 </div>
 <? }?>
 </div>
</div>
<div class="indexpfb box">
 <div class="d1" onClick="gourl('productlx.php')">发布新商品</div>
</div>
<? include("../tem/bottom.php");?>
</body>
</html>