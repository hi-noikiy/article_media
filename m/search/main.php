<?
include("../../config/conn.php");
include("../../config/function.php");
?>
<html>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="viewport" content="initial-scale=1, width=device-width, maximum-scale=1, user-scalable=no" />
<title>��Ʒ���� - �ֻ���<?=webname?></title>
<link rel="stylesheet" href="../css/basic.css">
<link rel="stylesheet" href="index.css">
<script src="../js/jquery-1.9.1.min.js" type="text/javascript"></script>
<script language="javascript" src="../js/basic.js"></script>
</head>
<body>
<!--ͷ��B-->
<div class="glotop1 box">
 <div class="d1" onClick="javascript:history.go(-1);"><img src="../img/back.png" /></div>
 <div class="d2">��Ʒ����</div>
 <div class="d3"></div>
</div>
<!--ͷ��E-->

<form name="f1" method="post" action="index.php?admin=1">
<div class="uk box">
 <div class="d1"><input placeholder="��������Ʒ�ؼ���" type="text" name="topt" /></div>
</div>

<div class="tjbutton box">
 <div class="d0"></div>
 <div class="d1"><input type="submit" class="tjinput" value="��ʼ����" /></div>
 <div class="d0"></div>
</div>

</form>

<? include("../tem/bottom.php");?>
</body>
</html>