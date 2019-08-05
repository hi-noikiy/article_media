<?
include("../config/conn.php");//二次开发联系QQ:120036745//二次开发联系QQ:120036745
include("../config/functionym.php");
sesCheck();
$userid=returnuserid($_SESSION["SHOPUSER"]);
$ses=" where userid=".$userid;
if($_GET[ddzt]!=""){$ses=$ses." and ddzt='".$_GET[ddzt]."'";}
if($_GET[t1v]!=""){$ses=$ses." and tit like '%".$_GET[t1v]."%'";}
if($_GET[t2v]!=""){$ses=$ses." and sj>='".$_GET[t2v]."'";}
if($_GET[t3v]!=""){$ses=$ses." and sj<='".$_GET[t3v]."'";}
if($_GET[t4v]!=""){$ses=$ses." and orderbh='".$_GET[t4v]."'";}
if($_GET[page]!=""){$page=$_GET[page];}else{$page=1;}
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
<script type="text/javascript" src="js/adddate.js" ></script> 
<script language="javascript" src="../js/layer.js"></script>
<script language="javascript" src="../js/layui.js"></script>
<script language="javascript" src="../js/common.js"></script>
<script language="javascript">
function psel(){
 str="t1v="+document.getElementById("t1").value;
 str=str+"&t2v="+document.getElementById("t2").value;
 str=str+"&t3v="+document.getElementById("t3").value;
 str=str+"&t4v="+document.getElementById("t4").value;
 str=str+"&ddzt="+document.getElementById("ddztv").value;
 location.href="orderym.php?"+str;
}
</script>
</head>
<body>
<? include("../tem/top.html");?>
<? include("../tem/userepzhucom.html");?>

<? if(returncount("epzhu_smsmail where userid=".$userid." and tyid=1")>0){?>
<script language="javascript">
layer.open({
  type: 2,
  area: ['300px', '180px'],
  title:["订单同步","text-align:left"],
  skin: 'layui-layer-rim', //加上边框
  content:['sms_sell.php', 'no'] 
});
</script>
<? }?>

<div class="bfb bfbuser">
<div class="yjcode">
<ul class="dqwz">
<li class="l1">您的位置：<a href="../" class="acy">首页</a> > <a href="./" class="acy">会员中心</a> > 我的订单</li>
</ul>
<? $leftid=2;include("leftym.php");?>

<!--RB-->
<div class="right">

 <!--搜索B-->
 <ul class="ordersel">
 <li class="l1">订单标题：</li>
 <li class="l2"><input type="text" value="<?=$_GET[t1v]?>" id="t1" style="width:150px;" /></li>
 <li class="l1">订单编号：</li>
 <li class="l2"><input type="text" value="<?=$_GET[t4v]?>" id="t4" style="width:150px;" /></li>
 <li class="l1">交易状态：</li>
 <li class="l2">
 <select id="ddztv">
 <option value="">不限</option>
 <option value="wait"<? if($_GET[ddzt]=="wait"){?> selected="selected"<? }?>>等待发货</option>
 <option value="db"<? if($_GET[ddzt]=="db"){?> selected="selected"<? }?>>等待买家确认</option>
 <option value="suc"<? if($_GET[ddzt]=="suc"){?> selected="selected"<? }?>>交易成功</option>
 <option value="back"<? if($_GET[ddzt]=="back"){?> selected="selected"<? }?>>退款申请中</option>
 <option value="backerr"<? if($_GET[ddzt]=="backerr"){?> selected="selected"<? }?>>不同意的退款</option>
 <option value="backsuc"<? if($_GET[ddzt]=="backsuc"){?> selected="selected"<? }?>>退款成功</option>
 </select>
 </li>
 <li class="l1">成交时间：</li>
 <li class="l3">
 <input type="text" value="<?=$_GET[t2v]?>" style="width:130px;" id="t2" readonly="readonly" onclick="SelectDate(this,'yyyy-MM-dd hh:mm:ss')" />
 <span class="fd"> 到 </span>
 <input type="text" value="<?=$_GET[t3v]?>" style="width:130px;" id="t3"readonly="readonly" onclick="SelectDate(this,'yyyy-MM-dd hh:mm:ss')" />
 </li>
 <li class="ltj"><input type="button" onclick="psel()" value="搜索" /> <input type="button" onclick="gourl('orderym.php')" value="重置" /></li>
 </ul>
 <!--搜索E-->

 <ul class="typecap">
 <li class="l1">商品名称</li>
 <li class="l2">订单总额</li>
 <li class="l5">数量</li>
 <li class="l3">订单状态</li>
 <li class="l4">操作</li>
 </ul>
 <ul class="listcap1">
 <li class="l1"><input name="C2" onclick="xuan()" type="checkbox" /> 全选</li>
 <li class="l2">
 </li>
 </ul>
 <!--列表开始-->
 <?
 pagef($ses,10,"epzhu_orderym","order by sj desc");while($row=mysql_fetch_array($res)){
 $tp="../".returntp("bh='".$row[probh]."' order by iffm desc","-2");
 $cz="";
 if($row[ddzt]=="suc"){ //交易成功
  if(panduan("userid,orderbh","epzhu_propjym where orderbh='".$row[orderbh]."' and userid=".$userid)==0){
  $cz="<a href='orderpjym.php?orderbh=".$row[orderbh]."' class='btn feng'>评价</a>";
  }else{
  //开始判断是否是默认评价
  $sqlpj="select * from epzhu_propjym where orderbh='".$row[orderbh]."' and userid=".$userid;mysql_query("SET NAMES 'GBK'");$respj=mysql_query($sqlpj);
  $rowpj=mysql_fetch_array($respj);
  if($rowpj['txt']!='暂未评价'){
	$cz="<a href='orderpjym.php?orderbh=".$row[orderbh]."' class='blue'>已评价</a><br>";
  }else{
	$cz="<a href='orderpjym.php?orderbh=".$row[orderbh]."' class='btn feng'>评价</a>";
  }
  }
  $cz=$cz."<a href='../productym/view".returnproid($row[probh]).".html' target=_blank>再次购买</a>";
 
 }elseif($row[ddzt]=="wait"){ //等待发货
  $cz="<a href='http://wpa.qq.com/msgrd?v=1&uin=".returnqq($row[selluserid])."&site=".weburl."&menu=yes' target=_blank class='blue'>提醒卖家发货</a>";
  $cz=$cz."<br><a href='ordercloseym.php?orderbh=".$row[orderbh]."' class='hui'>取消订单</a>";
 
 }elseif($row[ddzt]=="backsuc"){ //退款成功
  $cz="<a href='../productym/view".returnproid($row[probh]).".html' target=_blank>重新购买</a>";
 
 }elseif($row[ddzt]=="backerr"){ //退款失败，不同意退款
  $cz="<a href='shouhuoym.php?orderbh=".$row[orderbh]."' class='btn'>收货</a>";
  $cz=$cz."<br><a href='ordertkym.php?orderbh=".$row[orderbh]."' class='blue'>再次申请退款</a>";
  $cz=$cz."<br><a href='orderjfym.php?orderbh=".$row[orderbh]."' class='hui'>申请客服介入</a>";

 }elseif($row[ddzt]=="db"){ //担保中
  $cz="<a href='shouhuoym.php?orderbh=".$row[orderbh]."' class='btn'>收货</a>";
  $cz=$cz."<br><a href='ordertkym.php?orderbh=".$row[orderbh]."' class='hui'>退款</a>";

 }elseif($row[ddzt]=="close"){ //订单取消
  $cz="<a href='../productym/view".returnproid($row[probh]).".html' target=_blank>重新购买</a>";

 }elseif($row[ddzt]=="jf"){ //纠纷处理中
  $cz="<a href='orderjf1ym.php?orderbh=".$row[orderbh]."' class='btn'>沟通</a>";

 }elseif($row[ddzt]=="jfbuy"){ //买家胜诉
  $cz="<a href='orderjf1ym.php?orderbh=".$row[orderbh]."' class='btn'>沟通</a>";

 }elseif($row[ddzt]=="jfsell"){ //卖家胜诉
  $cz="<a href='orderjf1ym.php?orderbh=".$row[orderbh]."' class='btn'>沟通</a>";
  
 }
 ?>
 <ul class="listcap">
 <? if($row[ddzt]=="wpay"){?><li class="l1"><input name="C1" id="ck<?=$row[id]?>" type="checkbox" value="<?=$row[id]?>" /></li><? }?>
 <li class="l2">订单编号：<?=$row[orderbh]?>  |  时间：<?=$row[sj]?></li>
 <li class="l3"><a href="orderviewym.php?orderbh=<?=$row[orderbh]?>" class="lookdd">查看订单</a></li>
 </ul>
 <ul class="typelist">
 <li class="l1">
 <a href="orderviewym.php?orderbh=<?=$row[orderbh]?>"><img class="tp" src="<?=returntppd($tp,"img/none60x60.gif")?>" width="50" height="50" align="left" /></a>
 <a title="<?=$row["tit"]?>" href="orderviewym.php?orderbh=<?=$row[orderbh]?>" class="a1"><?=returntitdian($row["tit"],100)?></a><br>
 </li>
 <li class="l0"></li>
 <li class="l2 hui"><strong class="feng"><?=returnjgdian($row[money1]*$row[num]+$row[yunfei])?></strong><br>(单价:<?=returnjgdian($row[money1])?>)</li>
 <li class="l5"><?=$row[num]?></li>
 <li class="l3"><?=returnorderzt($row[ddzt])?></li>
 <li class="l4"><?=$cz?></li>
 </ul>
 <? }?>
 <!--列表结束-->
 <div class="npa">
 <?
 $nowurl="orderym.php";
 $nowwd="ddzt=".$_GET[ddzt]."&t1v=".$_GET[t1v]."&t2v=".$_GET[t2v]."&t3v=".$_GET[t3v]."&t4v=".$_GET[t4];
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