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
 <div class="d1" onClick="javascript:window.history.go(-1);"><img src="img/topleft.png" height="21" /></div>
 <div class="d2">ʵ����֤</div>
 <div class="d3"></div>
</div>

<div class="tishi box">
<div class="d1">
��֤���裺<br>
һ����д��ʵ���������֤����<br>
<strong class="blue">�����ϴ����֤������Ƭ</strong><br>
�����ϴ����֤������Ƭ<br>
�ġ��ϴ��ֳ����֤����������Ƭ<br>
</div>
</div>

<!--Ч��ͼB-->
<div class="uk box">
 <div class="d1">�� �� ֤<span class="s1"></span></div>
 <div class="d2"><iframe style="float:left;" src="tpupload.php?admin=3" width="100" scrolling="no" height="23" frameborder="0"></iframe></div>
</div>
<div class="xgtp box">
<div class="xgtpm">
 <div id="xgtp1" style="display:none;">���ڴ���</div>
 <div id="xgtp2"></div>
</div>
</div>
<!--Ч��ͼE-->

<div class="fbbtn box" onClick="gourl('smrz3.php')">
 <div class="d1"><input type="button" class="tjinput" value="��һ��" /></div>
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