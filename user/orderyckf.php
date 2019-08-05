<?
include("../config/conn.php");//二次开发联系QQ:120036745//二次开发联系QQ:120036745
include("../config/function.php");//二-次开-发-联-系Q-Q:12-00-3674-5
sesCheck();
$userid=returnuserid($_SESSION["SHOPUSER"]);
$orderbh=$_GET[orderbh];
while0("*","epzhu_orderkf where orderbh='".$orderbh."' and userid=".$userid);if(!$row=mysql_fetch_array($res)){php_toheader("orderkf.php");}


if(sqlzhuru($_POST[jvs])=="yc" && empty($row[ycshsj]) && $row[ddzt]=="db"){
 zwzr();
 while1("*","epzhu_dbkf where orderbh='".$orderbh."'");$row1=mysql_fetch_array($res1);
 $sj=date('Y-m-d H:i:s');
 $sjv=$row1[dboksj];
 $oksj=date('Y-m-d H:i:s',strtotime ("+".$rowcontrol[ycsj]." day",strtotime($sjv)));
 updatetable("epzhu_dbkf","dboksj='".$oksj."' where id=".$row1[id]);
 updatetable("epzhu_orderkf","ycshsj='".$sj."' where id=".$row[id]);
 php_toheader("orderviewkf.php?orderbh=".$orderbh); 

}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><div class="yjcode"><? adwhile("ADTOP");?></div>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>用户管理面板 - <?=webname?></title>
<link href="../css/basic.css" rel="stylesheet" type="text/css" />
<link href="css/index.css" rel="stylesheet" type="text/css" />
<link href="css/order.css" rel="stylesheet" type="text/css" />
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
<li class="l1">您的位置：<a href="../" class="acy">首页</a> > <a href="./" class="acy">会员中心</a> > 延长操作时间</li>
</ul>
<? $leftid=2;include("leftkf.php");?>

<!--RB-->
<div class="right">
 <ul class="wz">
 <li class="l0">请选择：</li>
 <li class="g_ac0_h g_bc0_h">订单详情</li>
 <li class="l1"><a href="orderkf.php">我的订单</a></li>
 </ul>
 <? include("ordervkf.php");?>
 
 <? if(empty($row[ycshsj])){?>
 <script language="javascript">
 function tj(){
 layer.msg('正在操作，请稍候', {icon: 16  ,time: 0,shade :0.25});
 f1.action="orderyckf.php?orderbh=<?=$orderbh?>";
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()">
 <ul class="ordercz">
 <li class="l1"><strong>延长操作时间</strong></li>
 <li class="l2">您可以延长<strong class="red"><?=$rowcontrol[ycsj]?></strong>天资金担保时间，且只能延长一次，如确认需要延长，请点击以下按钮操作</li>
 <li class="l4"><?=tjbtnr("延长时间")?></li>
 </ul>
 <input type="hidden" value="yc" name="jvs" />
 <input type="hidden" value="<?=$orderbh?>" name="orderbh" />
 </form>
 <? }else{?>
 <ul class="ordercz">
 <li class="l1"><strong>延长操作时间</strong></li>
 <li class="l2">您在 <?=$row[ycshsj]?> 已经进行过延长担保时间操作，不能再进行该操作。</li>
 </ul>
 <? }?>

</div> 
<!--RE-->

</div>
</div>
<div class="yizhanw"> <div class="yizhanw2"><? include("../tem/bottom.html");?></div> </div>
</body>
</html>