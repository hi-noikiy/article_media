<?
include("../../config/conn.php");
include("../../config/function.php");
sesCheck_m();
$bh=$_GET[bh];
$id=$_GET[id];
?>
<html>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
<title>会员中心 <?=webname?></title>
<link rel="stylesheet" href="../css/basic.css">
<link rel="stylesheet" href="index.css">
<script type="text/javascript" src="js/adddate.js" ></script> 
<script src="../js/jquery-1.9.1.min.js" type="text/javascript"></script>
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="../js/layer.js"></script>
<script language="javascript" src="index.js"></script>
</head>
<body>
<? include("topuser.php");?>

<div class="bfbtop2 box">
 <div class="d1" onClick="gourl('productlist.php')"><img src="img/topleft1.png" height="21" /></div>
 <div class="d2">恭喜您，编辑成功</div>
 <div class="d3"></div>
</div>

<div class="czts box">
 <div class="d1">
 <a href="productlist.php">返回列表</a>
 <a href="productlx.php">发布新商品</a>
 <a href="product.php?bh=<?=$bh?>">返回编辑</a>
 <a href="../product/view<?=$id?>.html">预览刚发布的商品</a>
 </div>
</div>
<? include("bottom.php");?>
</body>
</html>