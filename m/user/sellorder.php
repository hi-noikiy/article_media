<?
include("../../config/conn.php");
include("../../config/function.php");
sesCheck_m();
$userid=returnuserid($_SESSION["SHOPUSER"]);
$ses=" where selluserid=".$userid;
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
</head>
<body>
<? include("topuser.php");?>
<div class="sellordertopfd">
<div class="sellordertop box">
 <div class="d1" onClick="gourl('sell.php')"><img src="img/topleft1.png" height="21" /></div>
 <div class="d2">�ҵĶ���</div>
 <div class="d3"></div>
</div>
<div class="sellordertop1 box">
 <div class="d1<? if(empty($ddzt)){?> d11<? }?>" onClick="gourl('sellorder.php')">ȫ��</div>
 <div class="d1<? if($ddzt=="wait"){?> d11<? }?>" onClick="gourl('sellorder.php?ddzt=wait')">������</div>
 <div class="d1<? if($ddzt=="db"){?> d11<? }?>" onClick="gourl('sellorder.php?ddzt=db')">���ջ�</div>
 <div class="d1<? if($ddzt=="back"){?> d11<? }?>" onClick="gourl('sellorder.php?ddzt=back')">�˿��</div>
 <div class="d1<? if($ddzt=="jf"){?> d11<? }?>" onClick="gourl('sellorder.php?ddzt=jf')">���׾���</div>
</div>
</div>
<div class="sellordertopfdv"></div>


 <!--�б�ʼ-->
 <?
 pagef($ses,10,"epzhu_order","order by sj desc");while($row=mysql_fetch_array($res)){
 $au="sellorderview.php?orderbh=".$row[orderbh];
 $tp="../../".returntp("bh='".$row[probh]."' order by iffm desc","-2");
 $cz="";
 if($row[ddzt]=="suc"){ //���׳ɹ�
 
 }elseif($row[ddzt]=="wait"){ //�ȴ�����
 $cz="<a href='fahuo.php?orderbh=".$row[orderbh]."' class='a1'>����</a>";
 $cz=$cz."<a href='sellclose.php?orderbh=".$row[orderbh]."'>ȡ������</a>";
 
 }elseif($row[ddzt]=="back"){ //�˿����
 $cz="<a href='selltk.php?orderbh=".$row[orderbh]."'>�����˿�</a>";
 
 }elseif($row[ddzt]=="backsuc"){ //�˿�ɹ�
 $cz="";

 }elseif($row[ddzt]=="db"){ //������

 }elseif($row1[ddzt]=="wpay"){ //�ȴ���Ҹ���
  
 }
 ?>
 <div class="sellorderlist box">
  <div class="d1"><img src="img/user.png" height="18" /></div>
  <div class="d2"><?=returnnc($row[userid])?></div>
  <div class="d3 feng"><?=strip_tags(returnorderzt($row[ddzt]))?></div>
 </div>
 <div class="sellorderlist1 box" onClick="gourl('sellorderview.php?orderbh=<?=$row[orderbh]?>')">
  <div class="d1"><img src="<?=returntppd($tp,"img/none60x60.gif")?>" width="70" height="70" /></div>
  <div class="d2"><?=$row["tit"]?><br><? if(!empty($row[tcv])){echo "<span class='hui'>".$row[tcv]."</span>";}?></div>
  <div class="d3">��<?=$row[money1]?><br><span class="hui">x<?=$row[num]?></span></div>
 </div>
 <div class="sellorderlist2 box">
  <div class="d1">��� <?=$row[orderbh]?><br><?=$row[sj]?></div>
  <div class="d2">��<span class="feng">��<?=returnjgdian($row[money1]*$row[num]+$row[yunfei])?></span>(�˷ѣ�<?=$row[yunfei]?>)<br>��<?=$row[num]?>����Ʒ</div>
 </div>
 <div class="sellorderlist4 box">
  <div class="d1">
  <?=$cz?>
  </div>
 </div>
 <? }?>
 <!--�б����-->
 <div class="npa">
 <?
 $nowurl="sellorder.php";
 $nowwd="ddzt=".$_GET[ddzt];
 require("page.html");
 ?>
 </div>
 <? include("bottom.php");?>
</body>
</html>