<?
include("../../config/conn.php");
include("../../config/function.php");
sesCheck_m();
$sqluser="select * from epzhu_user where uid='".$_SESSION[SHOPUSER]."'";mysql_query("SET NAMES 'GBK'");$resuser=mysql_query($sqluser);
$rowuser=mysql_fetch_array($resuser);if($rowuser[sfzrz]!=2 && $rowuser[sfzrz]!=3){php_toheader("smrz.php"); }
$sfz1="../../upload/".$rowuser[id]."/".strgb2312($rowuser[sfz],0,15)."-1.jpg";
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
 <div class="d1" onClick="javascript:window.history.go(-1);"><img src="img/topleft.png" height="21" /></div>
 <div class="d2">实名认证</div>
 <div class="d3"></div>
</div>

<div class="tishi box">
<div class="d1">
认证步骤：<br>
一、填写真实姓名和身份证号码<br>
<strong class="blue">二、上传身份证正面照片</strong><br>
三、上传身份证反面照片<br>
四、上传手持身份证半身人像照片<br>
</div>
</div>

<!--效果图B-->
<div class="uk box">
 <div class="d1">身 份 证<span class="s1"></span></div>
 <div class="d2"><iframe style="float:left;" src="tpupload.php?admin=3" width="100" scrolling="no" height="23" frameborder="0"></iframe></div>
</div>
<div class="xgtp box">
<div class="xgtpm">
 <div id="xgtp1" style="display:none;">正在处理</div>
 <div id="xgtp2"></div>
</div>
</div>
<!--效果图E-->

<div class="fbbtn box" onClick="gourl('smrz3.php')">
 <div class="d1"><input type="button" class="tjinput" value="下一步" /></div>
</div>

<script language="javascript">
function xgtread(a,b){
 $.get("readtp.php",{admin:a},function(result){
  $("#xgtp2").html(result);
 });
}
function deltp(x){
 document.getElementById("xgtp1").style.display="";
 $.get("tpdel.php",{admin:3},function(result){
  xgtread(3,'');
  document.getElementById("xgtp1").style.display="none";
 });
}
xgtread(3,'');
</script>

<? include("bottom.php");?>
</body>
</html>