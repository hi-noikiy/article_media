<?
include("../config/conn.php");//二次开发联系QQ:120036745//二次开发联系QQ:120036745
include("../config/function.php");//二-次开-发-联-系Q-Q:12-00-3674-5
sesCheck();
$userid=returnuserid($_SESSION[SHOPUSER]);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><div class="yjcode"><? adwhile("ADTOP");?></div>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>用户管理面板 - <?=webname?></title>
<link href="../css/basic.css" rel="stylesheet" type="text/css" />
<link href="css/index.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="js/index.js"></script>
<script language="javascript" src="../js/jquery.min.js"></script>
<script language="javascript" src="../js/layer.js"></script>
<script language="javascript" src="../js/layui.js"></script>
<script language="javascript" src="../js/common.js"></script>
</head>
<body>
<? include("../tem/top.html");?>
<? include("../tem/userepzhucom.html");?>

<div class="bfb bfbuser">
<div class="yjcode">
<ul class="dqwz">
<li class="l1">您的位置：<a href="../" class="acy">首页</a> > <a href="./" class="acy">会员中心</a> > 资金记录</li>
</ul>
<? $leftid=5;include("left.php");?>

<!--RB-->
<div class="right">
 <? include("rcap2.php");?>
 <script language="javascript">
 document.getElementById("rcap1").className="g_ac0_h g_bc0_h";
 </script>

 <ul class="typecap">
 <li class="l4">时间</li>
 <li class="l4">金额</li>
 <li class="l4">收支</li>
 <li class="l1">说明</li>
 </ul>
   
 <?
 $ses=" where userid=".$userid;
 $page=$_GET["page"];if($page==""){$page=1;}else{$page=intval($_GET["page"]);}
 pagef($ses,30,"epzhu_moneyrecord","order by sj desc");while($row=mysql_fetch_array($res)){
 ?>
 <ul class="typelist3" onmouseover="this.className='typelist3 typelist31';" onmouseout="this.className='typelist3';">
 <li class="l4"><?=$row[sj]?></li>
 <li class="l4"><?=$row[moneynum]?></li>
 <li class="l4"><? if($row[moneynum]>0){?><span class="blue">收入</span><? }else{?><span class="red">支出</span><? }?></li>
 <li class="l1">&nbsp;&nbsp;&nbsp;<?=$row[tit]?></li>
 <li class="l0"></li>
 </ul>
 <? }?>

 <div class="npa">
 <?
 $nowurl="paylog.php";
 $nowwd="";
 require("page.html");
 ?>
 </div>

</div> 
<!--RE-->

</div>
</div>
<div class="yizhanw"> <div class="yizhanw2"><? include("../tem/bottom.html");?></div> </div>
</body>
</html>