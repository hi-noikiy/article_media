<?php
include("../config/conn.php");//二次开发联系QQ:120036745//二次开发联系QQ:12-0036-745
include("../config/function.php");
AdminSes_audit();
$ht1=preg_split("/\//",$_SERVER['PHP_SELF']);
if($_GET[control]=="ret"){deletetable("epzhu_update");php_toheader("default.php");}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?=webname?>管理系统</title>
<link rel="stylesheet" href="layui/css/layui.css">
<link href="css/basic.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script language="javascript" src="js/basic.js"></script>
<script language="javascript" src="js/layer.js"></script>
<script language="javascript" src="js/gx.js"></script>
<script language="javascript">
function retgx(){
if(confirm("建议在升级失败的情况下才提交重新升级，确定吗？")){location.href="default.php?control=ret";}else{return false;}	
}
</script>
</head>
<body>
<? include("top.php");?>
<script language="javascript">
document.getElementById("menu1").className="a1";
</script>

<div class="yjcode">
 <? $leftid=1;include("menu_quan.php");?>

<div class="right">

<div class="bqu1">
<a class="a1" href="default.php">全局管理</a>
</div>
  
<!--B-->
<div class="rkuang">
 
<!--更新B-->
<!--更新E-->


<!--统计B-->
<div class="tongji">
 <ul class="u1">
 <li class="l1">用户信息统计</li>
 <li class="l2">
 <a href="userlist.php?shopzt=1"><strong class="red"><?=returncount("epzhu_user where shopzt=1")?></strong><br>开店审核</a>
 <a href="baomoneylist.php?zt=1"><strong class="red"><?=returncount("epzhu_baomoneyrecord where zt=1")?></strong><br>解冻保证金</a>
 <a href="txlist.php?zt=4"><strong class="red"><?=returncount("epzhu_tixian where zt=4")?></strong><br>需要处理提现</a>
 <a href="userlist.php?rz=xy"><strong class="red"><?=returncount("epzhu_user where sfzrz=0")?></strong><br>实名认证审核</a>
 <a href="renglist.php?zt=1"><strong class="red"><?=returncount("epzhu_payreng where ifok=1")?></strong><br>人工对账审核</a>
 <a href="userlist.php?zt=0"><strong><?=returncount("epzhu_user where zt=0")?></strong><br>禁用会员</a>
 <a href="userlist.php"><strong><?=returncount("epzhu_user")?></strong><br>总用户数</a>
 </li>
 </ul>

 <ul class="u1">
 <li class="l1">商品/订单信息统计</li>
 <li class="l2">
 <a href="productlist.php?zt=1"><strong class="red"><?=returncount("epzhu_pro where zt=1")?></strong><br>需要审核商品</a>
 <a href="productlist.php"><strong><?=returncount("epzhu_pro where zt<>99")?></strong><br>所有商品</a>
 <? $ddztarr=array("wpay","wait","db","back","backsuc","backerr","suc","close");for($i=0;$i<count($ddztarr);$i++){?>
 <a href="orderlist.php?ddzt=<?=$ddztarr[$i]?>"><strong><?=returncount("epzhu_order where ddzt='".$ddztarr[$i]."'")?></strong><br><?=returnorderzt($ddztarr[$i])?></a>
 <? }?>
 </li>
 </ul>

 <ul class="u1">
 <li class="l1">互动信息统计</li>
 <li class="l2">
 <a href="newslist.php?zt=1"><strong class="red"><?=returncount("epzhu_news where zt=1")?></strong><br>需要审核稿件</a>
 <a href="tasklist.php?zt=1"><strong class="red"><?=returncount("epzhu_task where zt=1")?></strong><br>需要审核任务</a>
 <a href="tasklist.php?zt=8"><strong class="red"><?=returncount("epzhu_task where zt=8")?></strong><br>有纠纷的任务</a>
 <a href="gdlist.php?gdzt=1"><strong class="red"><?=returncount("epzhu_gd where gdzt=1 and zt<>99")?></strong><br>等待受理工单</a>
 <a href="newspjlist.php?zt=1"><strong class="red"><?=returncount("epzhu_newspj where zt=1")?></strong><br>审核资讯评价</a>
 <a href="inf2.php"><strong<? if($rowcontrol[smskc]<=50){?> class="red"<? }?>><?=$rowcontrol[smskc]?></strong><br>可用短信数量</a>
 <a href="tasklist.php"><strong><?=returncount("epzhu_task where zt<>99")?></strong><br>所有任务</a>
 <a href="taskhflist.php"><strong><?=returncount("epzhu_taskhf")?></strong><br>所有任务回复</a>
 </li>
 </ul>

</div>
<!--统计E-->


</div>
<!--E-->

</div>
</div>
<? include("bottom.php");?>
</body>
</html>