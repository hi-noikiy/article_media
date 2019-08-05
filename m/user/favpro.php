<?
include("../../config/conn.php");
include("../../config/function.php");
sesCheck_m();
$userid=returnuserid($_SESSION[SHOPUSER]);
$sj=date("Y-m-d H:i:s");
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
<script language="javascript" src="../js/layer.js"></script>
<script language="javascript" src="index.js"></script>
<script language="javascript">
function favprodel(x){
 if(!confirm("确认移除？")){return false;}
 layer.open({type: 2,content: '正在移除'});
 $.get("favprodel.php",{id:x},function(result){
 location.reload();
 });
}
</script>
</head>
<body>
<? include("topuser.php");?>

<div class="bfbtop1 box">
 <div class="d1" onClick="gourl('index.php')"><img src="img/topleft.png" height="21" /></div>
 <div class="d2">我收藏的商品</div>
 <div class="d3"></div>
</div>

<? if(panduan("*","epzhu_profav where userid=".$rowuser[id])==1){?>

 <?
 if($_GET[page]!=""){$page=$_GET[page];}else{$page=1;}
 pagef(" where userid=".$userid,10,"epzhu_profav","order by sj desc");while($row=mysql_fetch_array($res)){
 while1("*","epzhu_pro where bh='".$row[probh]."'");$row1=mysql_fetch_array($res1);
 ?>
 <div class="favpro box">
 <div class="d1"><a href="../product/view<?=$row1[id]?>.html"><img border="0" src="../../<?=returntp("bh='".$row1[bh]."' order by iffm desc limit 1","-2")?>" width="50" height="50" /></a></div>
 <div class="d2">
 <a href="../product/view<?=$row1[id]?>.html"><?=returntitdian($row1["tit"],70)?></a><br>
 <strong class="feng">￥<?=returnjgdian(returnyhmoney($row1[yhxs],$row1[money2],$row1[money3],$sj,$row1[yhsj1],$row1[yhsj2],$row1[id]))?></strong>
 </div>
 <div class="d3"><img src="img/cardel.png" onClick="favprodel(<?=$row[id]?>)" height="14" /></div>
 </div>
 <? }?>
 <div class="npa">
 <?
 $nowurl="favpro.php";
 $nowwd="";
 require("page.html");
 ?>
 </div>
 
<? }else{?>
<div class="wait box" onClick="gourl('../')">
 <div class="d1">
  <span class="s0"><img src="img/fav.png" width="70" /></span>
  <span class="s1">您暂无收藏的商品</span>
  <span class="s2">去逛逛~</span>
 </div>
</div>
<? }?>
 
</body>
</html>