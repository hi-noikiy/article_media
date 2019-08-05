<?
include("../config/conn.php");//二次-开发-联系QQ:1200-36745//二-次开-发-联-系QQ:12-00-36-745
include("../config/function.php");
include("../config/xy.php");
$sj=date("Y-m-d H:i:s");
$uid=$_GET[id];
$sqluser="select * from epzhu_user where zt=1 and shopzt=2 and id=".$uid;mysql_query("SET NAMES 'GBK'");$resuser=mysql_query($sqluser);
if(!$rowuser=mysql_fetch_array($resuser)){php_toheader("./");}
?>
<html>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?=$rowuser[shopname]?>好不好？<?=$rowuser[shopname]?>怎么样，<?=$rowuser[shopname]?>是做什么的 - <?=webname?></title>
<link href="../css/basic.css" rel="stylesheet" type="text/css" />
<link href="shop.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="index.js"></script>
<script language="javascript" src="../js/jquery.min.js"></script>
<script language="javascript" src="../js/layer.js"></script>
<div class="yjcode"><? adwhile("ADTOP");?></div>
</head>
<body>
<? include("top.php");?>
<script language="javascript">
document.getElementById("shopmenu3").className="a1";
</script>

<div class="yjcode">
 <!--左B-->
 <? include("left.php");?>
 <!--左E-->

 <!--右B-->
 <div class="right">
 
  <div class="about">
  <ul class="rcap"><li class="l1">关于我们</li><li class="l2"></li></ul>
  <div class="txt"><?=$rowuser[txt]?></div>
  </div>

 </div>
 <!--右E-->

</div>
<div class="yizhanw"> <div class="yizhanw2"><? include("../tem/bottom.html");?></div> </div>
</body>
</html>