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
<script language="javascript" src="../js/layer.js"></script>
<script language="javascript" src="index.js"></script>
</head>
<body>
<? 
include("topuser.php");
$rz=0;
if($rowcontrol[ifsell]=="off"){
if(strstr($rowcontrol[shoprz],"xcf1xcf")){if($rowuser[ifmot]!=1){$rz=1;}}
if(strstr($rowcontrol[shoprz],"xcf2xcf")){if($rowuser[ifemail]!=1){$rz=1;}}
if(strstr($rowcontrol[shoprz],"xcf3xcf")){if($rowuser[sfzrz]!=1 && $rowuser[sfzrz]!=0){$rz=1;}}
}
if(empty($rz)){php_toheader("openshop1.php");}
?>

<div class="bfbtop1 box">
 <div class="d1" onClick="gourl('index.php')"><img src="img/topleft.png" height="21" /></div>
 <div class="d2">������֤</div>
 <div class="d3"></div>
</div>

 <? if($rowuser[sfzrz]!=0 && $rowuser[sfzrz]!=1 && strstr($rowcontrol[shoprz],"xcf3xcf")){?>
 <div class="rzcap box" onClick="gourl('smrz.php')">
  <div class="d2"><strong>ʵ����֤</strong><br>������������Ϊ���ṩ���õķ���</div>
  <div class="d3">ȥ��֤</div>
  <div class="d4"><img src="img/jianright.png" height="15" /></div>
 </div>
 <? }?>

 <? if(1!=$rowuser[ifmot] && strstr($rowcontrol[shoprz],"xcf1xcf")){?>
 <div class="rzcap box" onClick="gourl('mobbd.php')">
  <div class="d2"><strong>�ֻ���֤</strong><br>����ʻ����ʽ�ȫ��</div>
  <div class="d3">ȥ��֤</div>
  <div class="d4"><img src="img/jianright.png" height="15" /></div>
 </div>
 <? }?>
 
 <? if(1!=$rowuser[ifemail] && strstr($rowcontrol[shoprz],"xcf2xcf")){?>
 <div class="rzcap box" onClick="gourl('emailbd.php')">
  <div class="d2"><strong>�����</strong><br>����ͨ�������һ�����</div>
  <div class="d3">ȥ��</div>
  <div class="d4"><img src="img/jianright.png" height="15" /></div>
 </div>
 <? }?>

</body>
</html>