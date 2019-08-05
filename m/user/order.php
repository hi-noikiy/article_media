<?
include("../../config/conn.php");
include("../../config/function.php");
sesCheck_m();
$userid=returnuserid($_SESSION["SHOPUSER"]);
$ses=" where userid=".$userid;
$ddzt=$_GET[ddzt];if($ddzt!=""){$ses=$ses." and ddzt='".$ddzt."'";}
if($_GET[page]!=""){$page=$_GET[page];}else{$page=1;}
?>
<html>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
<title>会员中心 <?=webname?></title>
<link rel="stylesheet" href="../css/basic.css">
<link rel="stylesheet" href="index.css">
<script src="../js/jquery-1.9.1.min.js" type="text/javascript"></script>
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="index.js"></script>
<script language="javascript" src="../js/layer.js"></script>
</head>
<body>
<!--订单通知B-->
<? if(returncount("epzhu_smsmail where userid=".$userid." and tyid=1")>0){?>
<div class="bghui"></div>
<script language="javascript">
var nowsms=1; //当前执行的顺序号
var allsms; //最大的SMS顺序号
function timeset(){
location.href="order.php";
}

function userChecksms(){
 $.get("../../user/sms_sell_chk.php",{id:document.getElementById("smsid"+nowsms).innerHTML},function(result){
  if(result!=""){
   a=parseInt(nowsms/allsms*100);
   document.getElementById("s2").innerHTML=a+"%";
   if(allsms>nowsms){nowsms=nowsms+1;setTimeout("userChecksms()",4000);}else{timeset();}
  }
 });
}
</script>
<div class="smsmain box">
 <div class="d1">
 <span class="s1">您有订单数据正在同步中</span>
 <span id="s2">0%</span>
 <span class="s3">(请不要刷新或关闭页面)</span>
 </div>
</div>
<? $i=1;while1("*","epzhu_smsmail where userid=".$userid." and tyid=1 order by id asc");while($row1=mysql_fetch_array($res1)){?>
<span id="smsid<?=$i?>" style="display:none"><?=$row1[id]?></span>
<? $i++;}?>
<script language="javascript">
allsms=<?=$i-1?>;
if(allsms<=0){timeset();}else{userChecksms();}
</script>
<? }?>
<!--订单通知E-->

<? include("topuser.php");?>
<div class="ordertopfd">
<div class="ordertop box">
 <div class="d1" onClick="gourl('./')"><img src="img/topleft1.png" height="21" /></div>
 <div class="d2">我的订单</div>
 <div class="d3"></div>
</div>
<div class="ordertop1 box">
 <div class="d1<? if(empty($ddzt)){?> d11<? }?>" onClick="gourl('order.php')">全部</div>
 <div class="d1<? if($ddzt=="wait"){?> d11<? }?>" onClick="gourl('order.php?ddzt=wait')">待发货</div>
 <div class="d1<? if($ddzt=="db"){?> d11<? }?>" onClick="gourl('order.php?ddzt=db')">待收货</div>
 <div class="d1<? if($ddzt=="back"){?> d11<? }?>" onClick="gourl('order.php?ddzt=back')">退款处理</div>
 <div class="d1<? if($ddzt=="jf"){?> d11<? }?>" onClick="gourl('order.php?ddzt=jf')">交易纠纷</div>
</div>
</div>
<div class="ordertopfdv"></div>

 <!--列表开始-->
 <?
 pagef($ses,10,"epzhu_order","order by sj desc");while($row=mysql_fetch_array($res)){
 $tp="../../".returntp("bh='".$row[probh]."' order by iffm desc","-2");
 $proid=returnproid($row[probh]);
 $cz="";
 if($row[ddzt]=="suc"){ //交易成功
  if(panduan("userid,orderbh","epzhu_propj where orderbh='".$row[orderbh]."' and userid=".$userid)==0){
  $cz="<a href='orderpj.php?orderbh=".$row[orderbh]."' class='a1'>进行评价</a>";
  }else{
  $cz="<a href='orderpj.php?orderbh=".$row[orderbh]."'>已评价</a>";
  }
  $cz=$cz."<a href='../product/view".returnproid($row[probh]).".html'>再次购买</a>";
 
 }elseif($row[ddzt]=="wait"){ //等待发货
  $cz="<a href='orderclose.php?orderbh=".$row[orderbh]."'>取消订单</a>";
 
 }elseif($row[ddzt]=="backsuc"){ //退款成功
  $cz="<a href='../product/view".returnproid($row[probh]).".html'>重新购买</a>";
 
 }elseif($row[ddzt]=="backerr"){ //退款失败，不同意退款
  $cz="<a href='shouhuo.php?orderbh=".$row[orderbh]."' class='a1'>确认收货</a>";
  $cz=$cz."<a href='ordertk.php?orderbh=".$row[orderbh]."'>再次退款</a>";

 }elseif($row[ddzt]=="db"){ //担保中
  $cz="<a href='shouhuo.php?orderbh=".$row[orderbh]."' class='a1'>确认收货</a>";
  $cz=$cz."<a href='ordertk.php?orderbh=".$row[orderbh]."'>申请退款</a>";

 }elseif($row[ddzt]=="close"){ //订单取消
  $cz="<a href='../product/view".$proid.".html'>重新购买</a>";
  
 }
 $sqlu="select * from epzhu_user where id=".$row[selluserid];mysql_query("SET NAMES 'GBK'");$resu=mysql_query($sqlu);$rowu=mysql_fetch_array($resu);
 ?>
 <div class="orderlist box">
  <div class="d1"><img src="img/shop.png" height="15" /></div>
  <div class="d2"><?=$rowu[shopname]?></div>
  <div class="d3 feng"><?=strip_tags(returnorderzt($row[ddzt]))?></div>
 </div>
 <div class="orderlist1 box" onClick="gourl('orderview.php?orderbh=<?=$row[orderbh]?>')">
  <div class="d1"><img src="<?=returntppd($tp,"img/none60x60.gif")?>" width="70" height="70" /></div>
  <div class="d2"><?=$row["tit"]?><br><? if(!empty($row[tcv])){echo "<span class='hui'>".$row[tcv]."</span>";}?></div>
  <div class="d3">￥<?=$row[money1]?><br><span class="hui">x<?=$row[num]?></span></div>
 </div>
 <div class="orderlist2 box">
  <div class="d1">编号 <?=$row[orderbh]?><br>时间 <?=$row[sj]?></div>
  <div class="d2">共<span class="feng">￥<?=returnjgdian($row[money1]*$row[num]+$row[yunfei])?></span>(运费￥<?=$row[yunfei]?>)<br>共<?=$row[num]?>件商品</div>
 </div>
 <div class="orderlist4 box">
  <div class="d1">
  <?=$cz?>
  </div>
 </div>
 <? }?>
 <!--列表结束-->
 <div class="npa">
 <?
 $nowurl="order.php";
 $nowwd="ddzt=".$_GET[ddzt];
 require("page.html");
 ?>
 </div>
<? include("../tem/bottom.php");?>
</body>
</html>