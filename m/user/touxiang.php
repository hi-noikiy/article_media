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
 <div class="d2">头像设置</div>
 <div class="d3"></div>
</div>

<!--效果图B-->
<div class="uk box">
 <div class="d1">头像图片<span class="s1"></span></div>
 <div class="d2"><iframe style="float:left;" src="tpupload.php?admin=2" width="100" scrolling="no" height="23" frameborder="0"></iframe></div>
</div>
<div class="xgtp box">
<div class="xgtpm">
 <div id="xgtp1" style="display:none;">正在处理</div>
 <div id="xgtp2"></div>
</div>
</div>
<!--效果图E-->

<script language="javascript">
function xgtread(a,b){
 $.get("readtp.php",{admin:a},function(result){
  $("#xgtp2").html(result);
 });
}
function deltp(x){
 document.getElementById("xgtp1").style.display="";
 $.get("tpdel.php",{admin:2},function(result){
  xgtread(2,'');
  document.getElementById("xgtp1").style.display="none";
 });
}
xgtread(2,'');
</script>
</body>
</html>

<? include("../tem/bottom.php");?>