<?
include("../config/conn.php");//二次开发联系QQ:120036745//二次开发联系QQ:120036745
include("../config/function.php");//二-次开-发-联-系Q-Q:12-00-3674-5
sesCheck();
$ddbh=$_GET[ddbh];
?>
<html>
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


<div class="bfb bfbuser">
<!--积分E-->
<div class="yjcode">


<ul class="dqwz">
<li class="l1">您的位置：<a href="../" class="acy">首页</a> > <a href="./" class="acy">会员中心</a> > 微信结算</li>
</ul>
<? $leftid=5;include("left.php");?>

<!--RB-->
<div class="right" style="height:700px;">
 <ul class="wz">
 <li class="l0">请选择：</li>
 <li class="g_ac0_h g_bc0_h" id="rcap1">微信结算</li>
 </ul>
 
<div id="wxpay_t1">
<iframe name="wxpay_f" id="wxpay_f" marginwidth="1" marginheight="1" frameborder="0" height="100%" width="100%" border="0" src="wxpay/example/buy_native.php?ddbh=<?=$ddbh?>"></iframe>
</div>
 
</div>
<!--RE-->

</div>
</div>
<div class="yizhanw"> <div class="yizhanw2"><? include("../tem/bottom.html");?></div> </div>
</body>
</html>