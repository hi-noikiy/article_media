<?
include("../config/conn.php");//二次开发联系QQ:120036745//二次开发联系QQ:120036745
include("../config/functionmg.php");
sesCheck();
$userid=returnuserid($_SESSION["SHOPUSER"]);
$ses=" where selluserid=".$userid;
$sestj=$ses;
if($_GET[t1v]!=""){$ses=$ses." and tit like '%".$_GET[t1v]."%'";$sestj=$ses;}
if($_GET[t2v]!=""){$ses=$ses." and sj>='".$_GET[t2v]."'";$sestj=$ses;}
if($_GET[t3v]!=""){$ses=$ses." and sj<='".$_GET[t3v]."'";$sestj=$ses;}
if($_GET[t4v]!=""){$ses=$ses." and orderbh='".$_GET[t4v]."'";$sestj=$ses;}
if($_GET[ddzt]!=""){$ses=$ses." and ddzt='".$_GET[ddzt]."'";}
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
<script language="javascript" src="../js/layer.js"></script>
<script type="text/javascript" src="js/adddate.js" ></script> 
<script language="javascript" src="../js/layui.js"></script>
<script language="javascript" src="../js/common.js"></script>
<script language="javascript">
function psel(){
 str="t1v="+document.getElementById("t1").value;
 str=str+"&t2v="+document.getElementById("t2").value;
 str=str+"&t3v="+document.getElementById("t3").value;
 str=str+"&t4v="+document.getElementById("t4").value;
 str=str+"&ddzt="+document.getElementById("ddztv").value;
 location.href="sellordermg.php?"+str;
}
</script>
</head>
<body>
<? include("../tem/top.html");?>
<? include("../tem/userepzhucom.html");?>

<div class="bfb bfbuser">
<div class="yjcode">
<ul class="dqwz">
<li class="l1">您的位置：<a href="../" class="acy">首页</a> > <a href="./" class="acy">会员中心</a> > 订单管理</li>
</ul>
<? $leftid=1;include("leftmg.php");?>

<!--RB-->
<div class="right">
 <? include("sellzfmg.php");?>
 <? include("rcap6mg.php");?>
 <script language="javascript">
 document.getElementById("rcap<?=$_GET[ddzt]?>").className="g_ac0_h g_bc0_h";
 </script>

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
 <li class="ltj"><input type="button" onclick="psel()" value="搜索" /> <input type="button" onclick="gourl('sellordermg.php')" value="重置" /></li>
 </ul>
 <!--搜索E-->

 <div class="upfile">
 <ul class="uk">
 <li class="l1">交易统计：</li>
 <li class="l21">
 <?
 $sqlq="select sum(money1*num+yunfei) as orderall from epzhu_ordermg".$sestj." and ddzt='suc'";mysql_query("SET NAMES 'GBK'");$resq=mysql_query($sqlq);$rowq=mysql_fetch_array($resq);
 $money1=sprintf("%.2f",$rowq[orderall]);
 ?>
 交易成功（<strong class="green"><?=$money1?>元</strong>）&nbsp;&nbsp;&nbsp;&nbsp;
 <?
 $sqlq="select sum(money1*num+yunfei) as orderall from epzhu_ordermg".$sestj." and ddzt='db'";mysql_query("SET NAMES 'GBK'");$resq=mysql_query($sqlq);$rowq=mysql_fetch_array($resq);
 $money1=sprintf("%.2f",$rowq[orderall]);
 ?>
 正在担保（<strong class="blue"><?=$money1?>元</strong>）&nbsp;&nbsp;&nbsp;&nbsp;
 <?
 $sqlq="select sum(money1*num+yunfei) as orderall from epzhu_ordermg".$sestj." and ddzt='back'";mysql_query("SET NAMES 'GBK'");$resq=mysql_query($sqlq);$rowq=mysql_fetch_array($resq);
 $money1=sprintf("%.2f",$rowq[orderall]);
 ?>
 退款处理中（<strong class="red"><?=$money1?>元</strong>）&nbsp;&nbsp;&nbsp;&nbsp;
 </li>
 </ul> 
 </div>


 <ul class="typecap">
 <li class="l1">商品信息</li>
 <li class="l2">订单价格</li>
 <li class="l5">发货形式</li>
 <li class="l3">买家信息</li>
 <li class="l4">状态/操作</li>
 </ul>
 <ul class="listcap1">
 <li class="l1"><input name="C2" onclick="xuan()" type="checkbox" /> 全选</li>
 <li class="l2">
 <a href="javascript:codecheckDEL(3,'code_down')" class="a1">删除订单</a>
 </li>
 </ul>
 <!--列表开始-->
 <?
 pagef($ses,10,"epzhu_ordermg","order by sj desc");while($row=mysql_fetch_array($res)){
 $au="sellorderviewmg.php?orderbh=".$row[orderbh];
 $tp="../".returntp("bh='".$row[probh]."' order by iffm desc","-2");
 $cz="";
 if($row[ddzt]=="suc"){ //交易成功
 
 }elseif($row[ddzt]=="wait"){ //等待发货
 $cz="<a href='fahuomg.php?orderbh=".$row[orderbh]."' class='btn'>发货</a>";
 $cz=$cz."<br><a href='sellclosemg.php?orderbh=".$row[orderbh]."' class='hui'>取消订单</a>";
 
 }elseif($row[ddzt]=="back"){ //退款处理中
 $cz="<a href='selltkmg.php?orderbh=".$row[orderbh]."' class='hui'>处理退款</a>";
 
 }elseif($row[ddzt]=="backsuc"){ //退款成功
 $cz="";

 }elseif($row[ddzt]=="db"){ //担保中

 }elseif($row[ddzt]=="wpay"){ //等待买家付款

 }elseif($row[ddzt]=="jf"){ //纠纷处理中 
 $cz="<a href='orderjf2mg.php?orderbh=".$row[orderbh]."' class='btn'>沟通</a>";

 }elseif($row[ddzt]=="jfbuy"){ //买家胜诉 
 $cz="<a href='orderjf2mg.php?orderbh=".$row[orderbh]."' class='btn'>沟通</a>";

 }elseif($row[ddzt]=="jfsell"){ //卖家胜诉 
 $cz="<a href='orderjf2mg.php?orderbh=".$row[orderbh]."' class='btn'>沟通</a>";
  
 }
 ?>
 <ul class="listcap">
 <? if($row[ddzt]=="wpay"){?><li class="l1"><input name="C1" id="ck<?=$row[id]?>" type="checkbox" value="<?=$row[id]?>" /></li><? }?>
 <li class="l2">
 订单编号：<?=$row[orderbh]?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 下单时间：<?=$row[sj]?>
 </li>
 <li class="l3"><a href="<?=$au?>" class="lookdd">查看订单</a></li>
 </ul>
 <ul class="typelist">
 <li class="l1">
 <a href="<?=$au?>"><img class="tp" src="<?=returntppd($tp,"img/none60x60.gif")?>" width="50" height="50" align="left" /></a>
 <a title="<?=$row["tit"]?>" href="<?=$au?>" class="a1"><?=returntitdian($row["tit"],102)?></a><br>
 </li>
 <li class="l0"></li>
 <li class="l2 hui"><strong class="feng"><?=returnjgdian($row[money1]*$row[num]+$row[yunfei])?></strong><br>数量:<?=$row[num]?><br>单价:<?=returnjgdian($row[money1])?></li>
 <li class="l5"></li>
 <li class="l3 hui"><?=returnnc($row[userid])?><br><a href="http://wpa.qq.com/msgrd?v=3&uin=<?=returnqq($row[userid])?>&site=<?=weburl?>&menu=yes" target="_blank"><img src="../img/qq2.gif" width="25" height="25" border="0" /></a></li>
 <li class="l4"><?=returnorderzt($row[ddzt])?><br><?=$cz?></li>
 </ul>
 <? }?>
 <!--列表结束-->
 <div class="npa">
 <?
 $nowurl="sellordermg.php";
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