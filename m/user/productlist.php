<?
include("../../config/conn.php");
include("../../config/function.php");
sesCheck_m();
$sj=date("Y-m-d H:i:s");
$sqluser="select * from epzhu_user where uid='".$_SESSION[SHOPUSER]."' and shopzt=2";mysql_query("SET NAMES 'GBK'");$resuser=mysql_query($sqluser);
if(!$rowuser=mysql_fetch_array($resuser)){php_toheader("openshop3.php");}

$ses=" where zt<>99 and userid=".$rowuser[id];
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
<script language="javascript" src="../js/layer.js"></script>
<script language="javascript" src="index.js"></script>
<script language="javascript">
function shuaxin(x){
document.getElementById("chk"+x).checked=true;
NcheckDEL(7,'epzhu_pro');
}
function del(x){
document.getElementById("chk"+x).checked=true;
NcheckDEL(2,'epzhu_pro');
}
</script>
</head>
<body>
<? include("topuser.php");?>

<div class="bfbtop2 box">
 <div class="d1" onClick="gourl('sell.php')"><img src="img/topleft1.png" height="21" /></div>
 <div class="d2">�ҵ���Ʒ(<?=returncount("epzhu_pro".$ses)?>��)</div>
 <div class="d4" onClick="gourl('productlx.php')">����</div>
</div>

<div class="prots box"><div class="d1">ˢ��һ����Ʒ������<strong class="feng"><?=$rowcontrol[sxjf]?></strong>�֣���ʣ��<strong class="blue"><?=$rowuser[jf]?></strong>��</div></div>

 <!--�б�ʼ-->
 <?
 pagef($ses,10,"epzhu_pro","order by lastsj desc");while($row=mysql_fetch_array($res)){
 $au1="product.php?bh=".$row[bh];
 $au2="../product/view".$row[id].".html";
 if(0==$row[ifxj]){$xjv="&nbsp;";}else{$xjv="<span class='red'>���¼�</span>";}
 ?>
 <div class="productlist0 box">
  <div class="d0"><input name="C1" id="chk<?=$row[id]?>" type="checkbox" value="<?=$row[bh]?>" /></div>
  <div class="d1">��ƷID:<?=$row[id]?></div>
  <div class="d2"><?=$row[lastsj]?></div>
 </div>
 <div class="productlist1 box" onClick="gourl('<?=$au1?>')">
  <div class="d1"><img src="<?=returntppd("../../".returntp("bh='".$row[bh]."' order by xh asc","-2"),"../img/none70x70.gif")?>" width="70" height="70" /></div>
  <div class="d2">
   <span class="s0"><?=$row["tit"]?></span>
   <span class="s1">����<?=$row[xsnum]?></span><span class="s2">���<?=$row[kcnum]?></span>
   <span class="s3"><?=returnztv($row[zt],$row[ztsm])?></span>
  </div>
  <div class="d3">��<?=returnyhmoney($row[yhxs],$row[money2],$row[money3],$sj,$row[yhsj1],$row[yhsj2],$row[id])?></div>
 </div>
 <div class="productlist2 box">
  <div class="d1">
  <a href="<?=$au2?>">Ԥ��</a>
  <a href="javascript:void(0);" onClick="del(<?=$row[id]?>)">ɾ��</a>
  <a href="<?=$au1?>">�޸�</a>
  <a href="javascript:void(0);" onClick="shuaxin(<?=$row[id]?>)">ˢ��</a>
  </div>
 </div>
 <? }?>
 <!--�б����-->
 <div class="npa">
 <?
 $nowurl="productlist.php";
 $nowwd="";
 require("page.html");
 ?>
 </div>
 
</body>
</html>