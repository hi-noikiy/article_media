<?
include("../config/conn.php");
include("../config/functionym.php");
include("../config/xy.php");
$sj=date("Y-m-d H:i:s");
$getstr=$_GET[str];
//���б�ǩ a b c d e f g h i j k l m p s
$tit="��Ʒ�б�";
$ses=" where zt=0 and ifxj=0";
$ty1id=returnsx("j");if($ty1id!=-1){
 $sqlty1="select * from epzhu_typeym where admin=1 and id=".$ty1id;mysql_query("SET NAMES 'GBK'");$resty1=mysql_query($sqlty1);$rowty1=mysql_fetch_array($resty1);
 $ty1name=$rowty1[type1];$ses=$ses." and ty1id=".$ty1id;
 if(empty($rowty1[seotit])){$tit=$ty1name;}else{$tit=$rowty1[seotit];}
 $seokey=$rowty1[seokey];
 $seodes=$rowty1[seodes];

}
$ty2id=returnsx("k");if($ty2id!=-1){$ty2name=returntype(2,$ty2id);$ses=$ses." and ty2id=".$ty2id;$tit=$tit."/".$ty2name;}
$ty3id=returnsx("m");if($ty3id!=-1){$ty3name=returntype(3,$ty3id);$ses=$ses." and ty3id=".$ty3id;$tit=$tit."/".$ty3name;}
$ty4id=returnsx("i");if($ty4id!=-1){$ty4name=returntype(4,$ty4id);$ses=$ses." and ty4id=".$ty4id;$tit=$tit."/".$ty4name;}
$ty5id=returnsx("l");if($ty5id!=-1){$ty5name=returntype(5,$ty5id);$ses=$ses." and ty5id=".$ty5id;$tit=$tit."/".$ty5name;}
if(returnsx("s")!=-1){
 $skey=safeEncoding(returnsx("s"));
 $a=preg_split("/\s/",$skey);
 $bs="(";
 for($i=0;$i<=count($a);$i++){
 if(!empty($a[$i])){$bs=$bs."tit like '%".$a[$i]."%' and ";}
 }
 $ses=$ses." and ".$bs." tit<>'')";
 $tit=$tit."/".$skey;
}
if(returnsx("b")!=-1){$mon1=returnsx("b");$ses=$ses." and money2>=".$mon1;}
if(returnsx("c")!=-1){$mon2=returnsx("c");$ses=$ses." and money2<=".$mon2;}
if(returnsx("a")!=-1){$ifys=returnsx("a");$ses=$ses." and ysweb<>''";}
if(returnsx("d")!=-1){$ifzdfh=returnsx("d");$ses=$ses." and (fhxs=2 or fhxs=3 or fhxs=4)";}
if(returnsx("g")!=-1){$ifuserdj=returnsx("g");$ses=$ses." and ifuserdj=1";}

if(returnsx("p")!=-1){$page=returnsx("p");}else{$page=1;}
$px="order by lastsj desc";
$pxv=returnsx("f");
if($pxv==1){$px="order by lastsj asc";}
elseif($pxv==2){$px="order by xsnum desc";}
elseif($pxv==3){$px="order by xsnum asc";}
elseif($pxv==4){$px="order by djl desc";}
elseif($pxv==5){$px="order by djl asc";}
elseif($pxv==6){$px="order by money2 desc";}
elseif($pxv==7){$px="order by money2 asc";}

if(!empty($_SESSION[SHOPUSER])){$myuserid=returnuserid($_SESSION[SHOPUSER]);}
?>
<html>
<div class="yjcode"><? adwhile("ADTOP");?></div>
<head>
 <meta http-equiv="x-ua-compatible" content="ie=7" />
 <meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
 <meta name="keywords" content="<?=$seokey?>">
 <meta name="description" content="<?=$seodes?>">
 <title><?=$tit?> - <?=webname?></title> 
 <link href="../css/basic.css" rel="stylesheet" type="text/css" />
 <link href="css/layer.css" rel="stylesheet" type="text/css" />
 <link href="index.css" rel="stylesheet" type="text/css" />
 <link href="css/market.css" rel="stylesheet" type="text/css" />
 <script language="javascript" src="../js/basic.js"></script> 
<script language="javascript" src="index.js"></script> 
<script language="javascript" src="../js/jquery.m.js"></script>
<script language="javascript" src="./jquery.min.js"></script>
<script language="javascript" src="js/layui.js"></script>
<script language="javascript" src="js/common.js"></script>
<script language="javascript" src="js/js/market.js"></script>
<script language="javascript" src="js/tipso.min.js"></script>
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/me.css" rel="stylesheet" type="text/css">
<script language="javascript" src="js/layer.js"></script>
<script language="javascript" src="js/all.js"></script>
 <!--ͷ��-->
 <!--[if IE 6]>
 <script src="../js/DD_belatedPNG_0.0.8a-min.js" type="text/javascript"></script> 
 <script type="text/javascript"> 
 DD_belatedPNG.fix('*'); 
 </script> 
 <![endif]-->
 

</head>
<body>


<? include("../tem/top--.html");?><? include("../tem/tongepzhu.html");?>
<script language="javascript">topjconc(1,'��Ʒ');document.getElementById("topt").value="<?=$skey?>";</script>

<div class="bfb bfblist fontyh">
<div class="yjcode">

 <div class="jieguo">
 ȫ����� > 
 <? if($ty1id!=-1){?><a href="search_j<?=$ty1id?>v.html" class="g_ac0">"<?=$ty1name?>"</a> > <? }?>
 <? if($ty2id!=-1){?><a href="search_j<?=$ty1id?>v_k<?=$ty2id?>v.html" class="g_ac0">"<?=$ty2name?>"</a> > <? }?>
 <? if($ty3id!=-1){?><a href="search_j<?=$ty1id?>v_k<?=$ty2id?>v_m<?=$ty3id?>v.html" class="g_ac0">"<?=$ty3name?>"</a> > <? }?>
 ��������<span id="jgcount"></span>����Ʒ
 </div>

 <div class="ad122"><a><img   border="0" src="\img\3432.png"style="padding-top: 15px;"></a></div>
 
 <!--selB-->
 <div class="psel">
 
 <ul class="u2">
 <li class="l1">��Ʒ���ࣺ</li>
 <li class="l2">
 <a href="./"<? if($ty1id==-1){?> class="g_ac0_h"<? }else{?> class="g_ac0"<? }?>>����</a>
 </li>
 <li class="l3">
 <? while1("*","epzhu_typeym where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
 <a href="search_j<?=$row1[id]?>v.html" <? if(check_in("_j".$row1[id]."v",$getstr)){?> class="g_ac0_h"<? }else{?> class="g_ac0"<? }?>><?=$row1[type1]?></a>
 <? }?>
 </li>
 </ul>
 
 <? if($ty1id!=-1){if(panduan("*","epzhu_typeym where admin=2 and type1='".$ty1name."'")==1){?>
 <ul class="u2">
 <li class="l1"><?=$ty1name?>��</li>
 <li class="l2">
 <a href="search_j<?=$ty1id?>v.html"<? if($ty2id==-1){?> class="g_ac0_h"<? }else{?> class="g_ac0"<? }?>>����</a>
 </li>
 <li class="l3">
 <? while1("*","epzhu_typeym where admin=2 and type1='".$ty1name."' order by xh asc");while($row1=mysql_fetch_array($res1)){?>
 <a href="search_j<?=$ty1id?>v_k<?=$row1[id]?>v.html" <? if(check_in("_k".$row1[id]."v",$getstr) && check_in("_k".$row1[id]."v",$getstr)){?> class="g_ac0_h"<? }else{?> class="g_ac0"<? }?>><?=$row1[type2]?></a>
 <? }?>
 </li>
 </ul>
 <? }}?>
 
 <? if($ty2id!=-1){if(panduan("*","epzhu_typeym where admin=3 and type1='".$ty1name."' and type2='".$ty2name."'")==1){?>
 <ul class="u2">
 <li class="l1"><?=$ty2name?>��</li>
 <li class="l2">
 <a href="search_j<?=$ty1id?>v_k<?=$ty2id?>v.html"<? if($ty3id==-1){?> class="g_ac0_h"<? }else{?> class="g_ac0"<? }?>>����</a>
 </li>
 <li class="l3">
 <? while3("*","epzhu_typeym where admin=3 and type1='".$ty1name."' and type2='".$ty2name."' order by xh asc");while($row3=mysql_fetch_array($res3)){?>
 <a href="search_j<?=$ty1id?>v_k<?=$ty2id?>v_m<?=$row3[id]?>v.html" <? if(check_in("_m".$row3[id]."v",$getstr)){?> class="g_ac0_h"<? }else{?> class="g_ac0"<? }?>><?=$row3[type3]?></a>
 <? }?>
 </li>
 </ul>
 <? }}?>
 
 <? if($ty3id!=-1){if(panduan("*","epzhu_typeym where admin=4 and type1='".$ty1name."' and type2='".$ty2name."' and type3='".$ty3name."'")==1){?>
 <ul class="u2">
 <li class="l1"><?=$ty3name?>��</li>
 <li class="l2">
 <a href="search_j<?=$ty1id?>v_k<?=$ty2id?>v_m<?=$ty3id?>v.html"<? if($ty4id==-1){?> class="g_ac0_h"<? }else{?> class="g_ac0"<? }?>>����</a>
 </li>
 <li class="l3">
 <? while3("*","epzhu_typeym where admin=4 and type1='".$ty1name."' and type2='".$ty2name."' and type3='".$ty3name."' order by xh asc");while($row3=mysql_fetch_array($res3)){?>
 <a href="search_j<?=$ty1id?>v_k<?=$ty2id?>v_m<?=$ty3id?>v_i<?=$row3[id]?>v.html" <? if(check_in("_i".$row3[id]."v",$getstr)){?> class="g_ac0_h"<? }else{?> class="g_ac0"<? }?>><?=$row3[type4]?></a>
 <? }?>
 </li>
 </ul>
 <? }}?>
 
 <? if($ty4id!=-1){if(panduan("*","epzhu_typeym where admin=5 and type1='".$ty1name."' and type2='".$ty2name."' and type3='".$ty3name."' and type4='".$ty4name."'")==1){?>
 <ul class="u2">
 <li class="l1"><?=$ty4name?>��</li>
 <li class="l2">
 <a href="search_j<?=$ty1id?>v_k<?=$ty2id?>v_m<?=$ty3id?>v_i<?=$ty4id?>v.html"<? if($ty5id==-1){?> class="g_ac0_h"<? }else{?> class="g_ac0"<? }?>>����</a>
 </li>
 <li class="l3">
 <? while3("*","epzhu_typeym where admin=5 and type1='".$ty1name."' and type2='".$ty2name."' and type3='".$ty3name."' and type4='".$ty4name."' order by xh asc");while($row3=mysql_fetch_array($res3)){?>
 <a href="search_j<?=$ty1id?>v_k<?=$ty2id?>v_m<?=$ty3id?>v_i<?=$ty4id?>v_l<?=$row3[id]?>v.html" <? if(check_in("_l".$row3[id]."v",$getstr)){?> class="g_ac0_h"<? }else{?> class="g_ac0"<? }?>><?=$row3[type5]?></a>
 <? }?>
 </li>
 </ul>
 <? }}?>

 <? 
 $si=0;
 $sbarr=array();
 while1("*","epzhu_typesxym where admin=1 and typeid=".$ty1id." and ifsel=1 order by xh asc");while($row1=mysql_fetch_array($res1)){
 $ev="e".$row1[id]."_";
 $sbarr[$si]=$ev;
 ?>
 <ul class="u2">
 <li class="l1"><?=$row1[name1]?>��</li>
 <li class="l2">
 <a href="<?=rentser($ev,'','','');?>" <? if(check_in("_".$ev."_v",$getstr) || !check_in("_".$ev,$getstr)){?> class="g_ac0_h"<? }else{?> class="g_ac0"<? }?>>����</a>
 </li>
 <li class="l3">
 <? while2("*","epzhu_typesxym where admin=2 and name1='".$row1[name1]."' and typeid=".$row1[typeid]." order by xh asc");while($row2=mysql_fetch_array($res2)){?>
 <a href="<?=rentser($ev,$row2[id],'','');?>" <? if(check_in("_".$ev.$row2[id]."v",$getstr)){?> class="g_ac0_h"<? }else{?> class="g_ac0"<? }?>><?=$row2[name2]?></a>
 <? }?>
 </li>
 </ul>
 <? 
 $si++;
 }
 for($si=0;$si<count($sbarr);$si++){if(returnsx($sbarr[$si])!=-1){$nsx="xcf".returnsx($sbarr[$si])."xcf";$ses=$ses." and tysx like '%".$nsx."%'";}}
 ?>
 <!--selE-->
</div>
 <div class="list_nav">
 <li class="type"><a href="/user/productlxym.php" class="cur">��Ʒչʾ</a></li>
 <li class="ipost"><a href="/user/productlxym.php" class="ipost">��ҲҪ��������</a></li>
</div>
 <!--����B-->
 <div class="paixu">
  <div class="d1">
  <? 
  $pxv=returnsx("f");
  $p1s=-1;
  $p2s=2;
  $p3s=4;
  $p4s=6;
  if($pxv==-1){$p1a="a1";$p1s="1";}elseif($pxv==1){$p1a="a2";$p1s="-1";}
  if($pxv==2){$p2a="a1";$p2s="3";}elseif($pxv==3){$p2a="a2";$p2s="2";}
  if($pxv==4){$p3a="a1";$p3s="5";}elseif($pxv==5){$p3a="a2";$p3s="4";}
  if($pxv==6){$p4a="a1";$p4s="7";}elseif($pxv==7){$p4a="a2";$p4s="6";}
  ?>
  <a href="<?=rentser('f',$p1s,'','');?>"<? if($pxv==-1 || $pxv==1){?> class="<?=$p1a?> g_ac1_h"<? }?>>�ۺ�����</a>
  <a href="<?=rentser('f',$p2s,'','');?>"<? if($pxv==2 || $pxv==3){?> class="<?=$p2a?> g_ac1_h"<? }?>>�����ߵ�</a>
  <a href="<?=rentser('f',$p3s,'','');?>"<? if($pxv==4 || $pxv==5){?> class="<?=$p3a?> g_ac1_h"<? }?>>��������</a>
  <a href="<?=rentser('f',$p4s,'','');?>"<? if($pxv==6 || $pxv==7){?> class="<?=$p4a?> g_ac1_h"<? }?>>�۸�����</a>
  </div>
  <form name="f1" method="post" onSubmit="return psear('_j<?=$ty1id?>v_k<?=$ty2id?>v_m<?=$ty3id?>v_i<?=$ty4id?>v_l<?=$ty5id?>v')">
  <div class="d2">
  <ul class="u2">
  <li class="l2"><label><input id="C1" type="checkbox" value="1"<? if($ifys==1){?> checked<? }?>> <span>����ʾվ</span></label></li>
  <li class="l2"><label><input id="C2" type="checkbox" value="1"<? if($ifzdfh==1){?> checked<? }?>> <span>�Զ�����</span></label></li>
  <li class="l2"><label><input id="C3" type="checkbox" value="1"<? if($ifuserdj==1){?> checked<? }?>> <span>��Ա�ۿ�</span></label></li>
  <li class="l4">�۸�</li>
  <li class="l5"><input name="money1" id="money1" value="<?=$mon1?>" type="text" /></li>
  <li class="l6">-</li>
  <li class="l5"><input name="money2" id="money2" value="<?=$mon2?>" type="text" /></li>
  <li class="l7">�ؼ��֣�</li>
  <li class="l8"><input name="ink1" value="<?=$skey?>" id="ink1" type="text" /></li>
  <li class="l9"><input name="" value="����" type="submit" /></li>
  </ul>
  </div>
  </form>
 </div>
 <!--����E-->

 <!--��ѡ����B-->
 <div class="nser g_bc0_h">
 <ul class="u1">
 <li class="l1">��ѡ������</li>
 <li class="l2">
 <? if($ty1id!=-1){?>
 <span><a href="./" class="g_ac0"><?=$ty1name?></a></span>
 <? }?>
 
 <? if($ty2id!=-1){?>
 <span><a href="search_j<?=$ty1id?>v.html" class="g_ac0"><?=$ty2name?></a></span>
 <? }?>
 
 <? if($ty3id!=-1){?>
 <span><a href="search_j<?=$ty1id?>v_k<?=$ty2id?>v.html" class="g_ac0"><?=$ty3name?></a></span>
 <? }?>
 
 <? if($ty4id!=-1){?>
 <span><a href="search_j<?=$ty1id?>v_k<?=$ty2id?>v_m<?=$ty3id?>v.html" class="g_ac0"><?=$ty4name?></a></span>
 <? }?>
 
 <? if($ty5id!=-1){?>
 <span><a href="search_j<?=$ty1id?>v_k<?=$ty2id?>v_m<?=$ty3id?>v_i<?=$ty4id?>v.html" class="g_ac0"><?=$ty5name?></a></span>
 <? }?>
 
 <? 
 for($si=0;$si<count($sbarr);$si++){
  $tsx=returnsx($sbarr[$si]);
  if($tsx!=-1){
   while1("*","epzhu_typesxym where id=".$tsx);if($row1=mysql_fetch_array($res1)){
   if($row1[admin]==2){
 ?>
 <span><a href="<?=rentser($sbarr[$si],'','','','search');?>" class="g_ac0"><?=$row1[name1]."��".$row1[name2]?></a></span>
 <? }}}}?>
 
 <? 
 if(returnsx("b")!=-1 || returnsx("c")!=-1){ 
  if(returnsx("c")!=-1 && returnsx("b")!=-1){$tjv=returnsx("b")."-".returnsx("c")."Ԫ";}
  elseif(returnsx("c")==-1){$tjv=returnsx("b")."Ԫ����";}
  elseif(returnsx("b")==-1){$tjv=returnsx("c")."Ԫ����";}
 ?>
 <span><a href="<?=rentser('b','','c','','search');?>" class="g_ac0"><?=$tjv?></a></span>
 <? }?>
 
 <? if($skey!=""){?>
 <span><a href="<?=rentser('s','','','','search');?>" class="g_ac0"><?=$skey?></a></span>
 <? }?>
 
 <? if($ifys==1){?>
 <span><a href="<?=rentser('a','','','','search');?>" class="g_ac0">����ʾվ</a></span>
 <? }?>
 
 <? if($ifzdfh==1){?>
 <span><a href="<?=rentser('d','','','','search');?>" class="g_ac0">�Զ�����</a></span>
 <? }?>
  
 </li>
 </ul>
 </div>
  <!--��ѡ����E-->
  <? pagef($ses,20,"epzhu_proym",$px);?>
  <? if(0==$rowcontrol[propx]){?>
  </li>
  </div>
  <div class="list">
  <div>
  <?
  $i=1;
  while($row=mysql_fetch_array($res)){
  $au="view".$row[id].".html";
  while1("id,uqq,shopname","epzhu_user where id=".$row[userid]);$row1=mysql_fetch_array($res1);
  $tit=strgb2312($row[tit],0,60);
  if(!empty($skey)){$tit=str_replace($skey,"<span class='red'>".$skey."</span>",$tit);}
  $tp="../".returntp("bh='".$row[bh]."' order by xh asc","-1");
  ?>
  <ul class="dlist">
  <!--<li class="l1"><img src="<?=returntppd($tp,"../img/none180x220.gif")?>"><div class="Layer">
  <span></span>
  <span class="cdes"><a href="<?=$au?>" title="<?=$row[tit]?>" target="_blank"><?=$tit?></span>
  <p class="info2"><a href="<?=$au?>" class="xq" target="_blank"><i></i>�鿴����</a><? if(!empty($row[ysweb])){?><a href="<?=$row[ysweb]?>" target="_blank" class="ys"><i></i>�鿴��ʾ</a><? }else{?><a  target="_blank" class="ys"><i></i>����ʾվ<? }?></a></p>
  </div></li>--></a><ul class="c_g_spe">
   <? 
   $a=preg_split("/xcf/",$row[tysx]);
   $sx1arr=array();
   $sxall="xcf";
   $m=0;
   for($i=0;$i<=count($a);$i++){
	$ai=$a[$i];
    if($ai!=""){
	if(!is_numeric($ai)){$z1=preg_split("/:/",$ai);$ai=$z1[0];}
    while1("*","epzhu_typesxym where id=".$ai);if($row1=mysql_fetch_array($res1)){
    if(!in_array($row1[name1],$sx1arr)){$sx1arr[$m]=$row1[name1];$m++;}
	if(!is_numeric($a[$i])){$z1=preg_split("/:/",$a[$i]);$v=$z1[1];}else{$v=$row1[name2];}
	$sxall=$sxall.$row1[name1].":".$v."xcf";
	}
	}
   }
   for($i=0;$i<count($sx1arr);$i++){
   ?>
<li>
<cite><?=$sx1arr[$i]?>��</cite> <? $b=preg_split("/xcf/",$sxall);for($j=0;$j<=count($b);$j++){if(check_in($sx1arr[$i],$b[$j])){echo str_replace($sx1arr[$i].":","",$b[$j])." ";}}?> 
</li>
<? }?>
<!--<li class="l1">�����£�<?=dateYMD($row[lastsj])?>
</li>-->
<li>
<!--
<cite>������ַ��</cite>
<? if(!empty($row[ysweb])){?>
<a href="../tem/gotourl.php?u=<?=$row[ysweb]?>" style="color:#00a1ec;" target="_blank" rel="nofollow"><i class="iconfont">&#x3433;</i>�鿴</strong></a><? }else{?><a style="color:#999"><strong>����ʾ</strong></a><? }?></li>
-->

</ul>
  <li class="l4"><em>��<strong><?=returnjgdian(returnyhmoney($row[yhxs],$row[money2],$row[money3],$sj,$row[yhsj1],$row[yhsj2],$row[id]))?></strong></em>

  <li class="l2"><a href="<?=$au?>" title="<?=$row[tit]?>" target="_blank"><?=$tit?></a></li> 
  <?
  $a1="";
  $a2="none";
  if(!empty($myuserid)){
   if(panduan("*","epzhu_carym where userid=".$myuserid." and probh='".$row[bh]."'")==1){$a1="none";$a2="";}
  }
  ?>
  <? while1("*","epzhu_user where id=".$row[userid]);$row1=mysql_fetch_array($res1);$xy=returnjgdw($row1[xinyong],"",returnxy($row[userid],1));?>
  <li class="l3">
  <a href="../shop/view<?=$row1[id]?>.html" class="list_seller tips" target="_blank" t-fc="#333" t-bg="#fff" t-cr="#333" t-bc="#ddd" t-bw="3px" t-w="126" title="<img src='../upload/<?=$row[userid]?>/shop.jpg'width='100px' height='100px'>
<p style='line-height:16px;padding:8px 0 0 0'><b><?=returntitdian($row1[shopname],18)?></b></p>">

  
  <img class="pic_Layer" title="<?=returntitdian($row1[shopname],18)?>" src="../upload/<?=$row[userid]?>/shop.jpg"onerror="javascript:this.src='../img/snone.jpg'" />
  
  <span class="c_s_name"><p><?=$rowsell[shopname]?></p>
<img title="����ֵ<?=$xy?>" src="../img/dj/<?=returnxytp($xy)?>" /></span>
  <div class="pull-right smgray text-right mt5 ">
    <? while1("*","epzhu_user where id=".$row[userid]);$row1=mysql_fetch_array($res1);$xy=returnjgdw($row1[xinyong],"",returnxy($row[userid],1));?>
	<? if($row[yysweb]){?><a class="btn btn-info btn-dijia  btn-diy" href="javascript:;" _title="<?=$row[yysweb]?>" color="#FF0303"><span class="m1">��</span></a><? }?>
	 
	<? if($row1[baomoney]){?><a class="btn btn-warning btn-bao btn-diy" href="javascript:;" _title='���̼��Ѽ��뱣֤��ƻ�<br>�ѽ��� &lt;b&gt;<?=$row1[baomoney]?>&lt;/b&gt; Ԫ��֤��' color="#FF7E00"><span class="m1">��</span></a><? }else{?><a class="btn btn-warning btn-bao btn-diy" href="javascript:;" _title='���̼�û�м��뱣֤��ƻ�<br> &lt;b&gt;&lt;/b&gt;��ϸ�������µ�' color="#FF7E00"><span class="m1">��</span></a><? }?>
	
	<? if($row[fhxs]==1){?> <a class="btn btn-success btn-auto btn-diy" href="javascript:;" _title="�ֶ�������Ʒ�����º����һ��յ����������ʼ�����������" color="#4cae4c"><span class="m1">��</span></a><? }?>
	
	<? if($row[fhxs]==2){?><a class="btn btn-successs btn-autoo btn-diy" href="javascript:;" _title="�Զ�������Ʒ�����º󣬼����յ����Ը���Ʒ�ķ��������أ�����" color="#ffa800"><span class="m1">Զ</span></a><? }?>
	
	<? if($row[fhxs]==3){?><a class="btn btn-default btn-nolocal btn-diy" href="javascript:;" _title="�Զ�������Ʒ�����º󣬼����յ����Ը���Ʒ�Ľ�ѹ��" color="#999"><span class="m1">��</span></a><? }?>
	
	<? if($row[fhxs]==4){?><a class="btn btn-default btn-nolocal btn-diy" href="javascript:;" _title="�Զ�������Ʒ�����º󣬼����յ����Ը���Ʒ�ĵ㿨�˺�����" color="#999"><span class="m1">��</span></a><? }?>					
    
	<? if($row[fhxs]==5){?><a class="btn btn-innfo btn-dijjia btn-diy"  href="javascript:;" _title="����������Ʒ�����º�����3��4���ڣ����յ��ö����Ŀ�ݰ���<p>��ע��ǩ��" color="#286090"><span class="m1">��</span></a><? }?>
	
   <? if($row[ifuserdj]==1){?><a class="btn btn-info btn-dijia btn-diy" href="javascript:;" _title="VIP�û��������ܲ�ͬ���Ż��ۿ�" color="#46b8da"><span class="m1">��</span></a><? }?>
   
  <!--<a class="btn btn-iinfo btn-dijiia btn-diy" href="javascript:;" _title="���� <?=$row[xsnum]?> ��" color="#e40231"><span class="m1">��</span></a>-->

  </ul>
  <? $i++;}?>
 </div>
  <!--ͼƬE-->
  <? }else{?> 
  <!--�б�B-->
  <ul class="listcap">
  <li class="l0">����ͼ</li>
  <li class="l1">��Ʒ��Ϣ</li>
  <li class="l2">�۸�</li>
  <li class="l3">���</li>
  <li class="l4">����</li>
  </ul>
  <?
  $i=1;
  while($row=mysql_fetch_array($res)){
  $au="view".$row[id].".html";
  while1("id,uqq,shopname,xinyong","epzhu_user where id=".$row[userid]);$row1=mysql_fetch_array($res1);
  $tit=strgb2312($row[tit],0,50);
  if(!empty($skey)){$tit=str_replace($skey,"<span class='red'>".$skey."</span>",$tit);}
  $tp="../".returntp("bh='".$row[bh]."' order by xh asc","-2");
  $xy=returnjgdw($row1[xinyong],"",returnxy($row[userid],1));
  ?>
  <ul class="list" onMouseOver="this.className='list list1';" onMouseOut="this.className='list';">
  <li class="l0"><a href="<?=$au?>" target="_blank"><img alt="<?=$row[tit]?>" border="0" src="<?=returntppd($tp,"../img/none180x180.gif")?>" width="100" height="100" /></a></li>
  <li class="l1">
  <a href="view<?=$row[id]?>.html" target="_blank" class="a1 g_ac3" title="<?=$row[tit]?>"><?=returntitdian($row[tit],90)?></a><br>
  <? if($row[fhxs]==2 || $row[fhxs]==3 || $row[fhxs]==4){?><img src="../img/auto.gif" width="81" style="margin:6px 0 5px 0;" height="17" /><br><? }?>
  �������ã�<img src="../img/dj/<?=returnxytp($xy)?>" /><br>
  <a href="../shop/view<?=$row1[id]?>.html" target="_blank" class="hui"><?=returntitdian($row1[shopname],20)?></a>
  </li>
  <li class="l2">
  <strong>��<?=returnjgdian(returnyhmoney($row[yhxs],$row[money2],$row[money3],$sj,$row[yhsj1],$row[yhsj2],$row[id]))?></strong><br>
  <s class="hui"><?=$row[money1]?>Ԫ</s>
  </li>
  <li class="l3"><?=$row[kcnum]?></li>
  <li class="l4">
  <input type="button" value="�鿴����" onClick="javascript:location.href='<?=$au?>';" class="inp1 g_ac3" onMouseOver="this.className='inp1 inp11 g_ac3';" onMouseOut="this.className='inp1';" />
  </li>
  </ul>
  <? }?>
  <!--�б�B-->
  <? }?> 
  <div class="npa">
  <?
  $nowurl="search";
  $nowwd="";
  require("../tem/page.html");
  ?>
  </div> 
  <div class="dlistyizhan"><? adwhile("ADTT1");?> </div>
 </div>
 </div> 
 
<div class="yizhanw"> <div class="yizhanw2"><? include("../tem/bottom.html");?></div> </div>
<script language="javascript">
document.getElementById("jgcount").innerHTML=<?=$count?>;
</script>
</body>
</html>