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
<title>��Ա���� <?=webname?></title>
<link rel="stylesheet" href="../css/basic.css">
<link rel="stylesheet" href="index.css">
<script src="../js/jquery-1.9.1.min.js" type="text/javascript"></script>
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="index.js"></script>
<script language="javascript" src="../js/layer.js"></script>
</head>
<body>
<!--����֪ͨB-->
<? if(returncount("epzhu_smsmail where userid=".$userid." and tyid=1")>0){?>
<div class="bghui"></div>
<script language="javascript">
var nowsms=1; //��ǰִ�е�˳���
var allsms; //����SMS˳���
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
 <span class="s1">���ж�����������ͬ����</span>
 <span id="s2">0%</span>
 <span class="s3">(�벻Ҫˢ�»�ر�ҳ��)</span>
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
<!--����֪ͨE-->

<? include("topuser.php");?>
<div class="ordertopfd">
<div class="ordertop box">
 <div class="d1" onClick="gourl('./')"><img src="img/topleft1.png" height="21" /></div>
 <div class="d2">�ҵĶ���</div>
 <div class="d3"></div>
</div>
<div class="ordertop1 box">
 <div class="d1<? if(empty($ddzt)){?> d11<? }?>" onClick="gourl('order.php')">ȫ��</div>
 <div class="d1<? if($ddzt=="wait"){?> d11<? }?>" onClick="gourl('order.php?ddzt=wait')">������</div>
 <div class="d1<? if($ddzt=="db"){?> d11<? }?>" onClick="gourl('order.php?ddzt=db')">���ջ�</div>
 <div class="d1<? if($ddzt=="back"){?> d11<? }?>" onClick="gourl('order.php?ddzt=back')">�˿��</div>
 <div class="d1<? if($ddzt=="jf"){?> d11<? }?>" onClick="gourl('order.php?ddzt=jf')">���׾���</div>
</div>
</div>
<div class="ordertopfdv"></div>

 <!--�б�ʼ-->
 <?
 pagef($ses,10,"epzhu_order","order by sj desc");while($row=mysql_fetch_array($res)){
 $tp="../../".returntp("bh='".$row[probh]."' order by iffm desc","-2");
 $proid=returnproid($row[probh]);
 $cz="";
 if($row[ddzt]=="suc"){ //���׳ɹ�
  if(panduan("userid,orderbh","epzhu_propj where orderbh='".$row[orderbh]."' and userid=".$userid)==0){
  $cz="<a href='orderpj.php?orderbh=".$row[orderbh]."' class='a1'>��������</a>";
  }else{
  $cz="<a href='orderpj.php?orderbh=".$row[orderbh]."'>������</a>";
  }
  $cz=$cz."<a href='../product/view".returnproid($row[probh]).".html'>�ٴι���</a>";
 
 }elseif($row[ddzt]=="wait"){ //�ȴ�����
  $cz="<a href='orderclose.php?orderbh=".$row[orderbh]."'>ȡ������</a>";
 
 }elseif($row[ddzt]=="backsuc"){ //�˿�ɹ�
  $cz="<a href='../product/view".returnproid($row[probh]).".html'>���¹���</a>";
 
 }elseif($row[ddzt]=="backerr"){ //�˿�ʧ�ܣ���ͬ���˿�
  $cz="<a href='shouhuo.php?orderbh=".$row[orderbh]."' class='a1'>ȷ���ջ�</a>";
  $cz=$cz."<a href='ordertk.php?orderbh=".$row[orderbh]."'>�ٴ��˿�</a>";

 }elseif($row[ddzt]=="db"){ //������
  $cz="<a href='shouhuo.php?orderbh=".$row[orderbh]."' class='a1'>ȷ���ջ�</a>";
  $cz=$cz."<a href='ordertk.php?orderbh=".$row[orderbh]."'>�����˿�</a>";

 }elseif($row[ddzt]=="close"){ //����ȡ��
  $cz="<a href='../product/view".$proid.".html'>���¹���</a>";
  
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
  <div class="d3">��<?=$row[money1]?><br><span class="hui">x<?=$row[num]?></span></div>
 </div>
 <div class="orderlist2 box">
  <div class="d1">��� <?=$row[orderbh]?><br>ʱ�� <?=$row[sj]?></div>
  <div class="d2">��<span class="feng">��<?=returnjgdian($row[money1]*$row[num]+$row[yunfei])?></span>(�˷ѣ�<?=$row[yunfei]?>)<br>��<?=$row[num]?>����Ʒ</div>
 </div>
 <div class="orderlist4 box">
  <div class="d1">
  <?=$cz?>
  </div>
 </div>
 <? }?>
 <!--�б����-->
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