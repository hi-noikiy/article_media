<?
include("../config/conn.php");//二次-开发-联系QQ:1200-36745//二-次开-发-联-系QQ:12-00-36-745
include("../config/function.php");
include("../config/xy.php");
$sj=date("Y-m-d H:i:s");
$getstr=$_GET[str];

$uid=returnsx("i");
$sqluser="select * from epzhu_user where zt=1 and shopzt=2 and id=".$uid;mysql_query("SET NAMES 'GBK'");$resuser=mysql_query($sqluser);
if(!$rowuser=mysql_fetch_array($resuser)){php_toheader("./");}

$ses=" where zt=0 and ifxj=0 and userid=".$uid;
$ty1id=returnsx("j");
$ty2id=returnsx("k");
if($ty1id!=-1){$ses=$ses." and myty1id=".$ty1id;$name1=returntypem(1,$ty1id);}
if($ty2id!=-1){$ses=$ses." and myty2id=".$ty2id;}

if(returnsx("s")!=-1){
 $skey=safeEncoding(returnsx("s"));
 $a=preg_split("/\s/",$skey);
 $bs="(";
 for($i=0;$i<=count($a);$i++){
 if(!empty($a[$i])){$bs=$bs."tit like '%".$a[$i]."%' and ";}
 }
 $ses=$ses." and ".$bs." tit<>'')";
}

if(returnsx("p")!=-1){$page=returnsx("p");}else{$page=1;}

$orderpx="order by lastsj desc";
$f=intval(returnsx("f"));
if($f==1){$orderpx="order by xsnum asc";}
elseif($f==11){$orderpx="order by xsnum desc";}
elseif($f==2){$orderpx="order by pf1 asc";}
elseif($f==21){$orderpx="order by pf1 desc";}
elseif($f==3){$orderpx="order by money2 asc";}
elseif($f==31){$orderpx="order by money2 desc";}
elseif($f==4){$orderpx="order by lastsj asc";}
elseif($f==41){$orderpx="order by lastsj desc";}

$nserU="prolist";
?>
<html>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?=$rowuser[shopname]?>的网上店铺 - <?=webname?></title>

<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="index.js"></script>


<link href="css/market.css" rel="stylesheet" type="text/css" />
<link href="css/basic.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="js/jquery.m.js"></script>
<script language="javascript" src="js/layui/layui.js"></script>
<script language="javascript" src="js/common.js"></script>
<script language="javascript" src="js/market.js"></script>
<script language="javascript" src="js/index.js"></script>
<script language="javascript" src="js/tipso.min.js"></script>
<div class="yjcode"><? adwhile("ADTOP");?></div>
</head>
<body>
<? include("../tem/top--.html");?>
<? include("top.php");?>
<script language="javascript">
//document.getElementById("shopmenu2").className="a1";
</script>
<div class="shop_class">    
 <div class="list_nav" style="padding-top:14px;">

</div>

<div class="list_eve" style="margin:0;border-bottom:0">
<div class="tipnav"><div class="tkey"><strong>筛选条件：</strong>
 <? if($ty1id!=-1){?>
 <span class="s1" onMouseOver="this.className='s2';" onMouseOut="this.className='s1';"><a title="取消" href="<?=rentser('j','','k','',$nserU);?>"><?=$name1?></a></span>
 <? }?>
 
 <? if($ty2id!=-1){?>
 <span class="s1" onMouseOver="this.className='s2';" onMouseOut="this.className='s1';"><a title="取消" href="<?=rentser('k','','','',$nserU);?>"><?=$name2?></a></span>
 <? }?>
</div>
<strong class="num">共有<font color="#ff6600" id="list_count">47</font>个宝贝供你选购</strong></div>



  <ul><li class="l1" style="letter-spacing:2px;">源码类型:</li>
  <li class="l3"><a href="prolist_i<?=$rowuser[id]?>v.html"<? if($ty1id==-1){?> class="ax"<? }?>>不限</a></li>
  <li class="l2">
  <? while1("*","epzhu_protype where admin=1 and zt=0 and userid=".$rowuser[id]." order by xh asc");while($row1=mysql_fetch_array($res1)){?>
 <a href="prolist_i<?=$rowuser[id]?>v_j<?=$row1[id]?>v.html" <? if(check_in("_j".$row1[id]."v",$getstr)){?> class="ax"<? }?>><?=$row1[name1]?></a>
  <? }?>
 
  </li>

  </ul>   <? if($ty1id!=-1){?>
  <ul><li class="l1" style="letter-spacing:2px;"><?=$name1?>:</li>
  <li class="l3"><a href="<?=rentser('k','','','',$nserU);?>"<? if($ty2id==-1){?> class="ax"<? }?>>不限</a></li>
  <li class="l2">
   <? while1("*","epzhu_protype where admin=2 and name1='".$name1."' and zt=0 and userid=".$rowuser[id]." order by xh asc");while($row1=mysql_fetch_array($res1)){?>
 <a href="prolist_i<?=$rowuser[id]?>v_j<?=$ty1id?>v_k<?=$row1[id]?>v.html" <? if(check_in("_k".$row1[id]."v",$getstr)){$name2=$row1[name2];?> class="ax"<? }?>><?=$row1[name2]?></a>
  <? }?>
  </li></ul> <? }?>
</div>




  <div class="list_tab" id="pagetop">
   <li class="l1">
       <a class="cur" href="<?=rentser("f",'','','',$nserU);?>" <? if(returnsx("f")==-1){?> class="a4"<? }?>>综合</a>
        <? if(returnsx("f")==1){?>
  <a href="<?=rentser("f",11,'','',$nserU);?>" class="a1">成交量</a>
  <? }elseif(returnsx("f")==11){?>
  <a href="<?=rentser("f",1,'','',$nserU);?>" class="a2">成交量</a>
  <? }else{?>
  <a href="<?=rentser("f",1,'','',$nserU);?>" class="a3">成交量</a>
  <? }?>
  
  <? if(returnsx("f")==2){?>
  <a href="<?=rentser("f",21,'','',$nserU);?>" class="a1">评分</a>
  <? }elseif(returnsx("f")==21){?>
  <a href="<?=rentser("f",2,'','',$nserU);?>" class="a2">评分</a>
  <? }else{?>
  <a href="<?=rentser("f",2,'','',$nserU);?>" class="a3">评分</a>
  <? }?>
  
  <? if(returnsx("f")==3){?>
  <a href="<?=rentser("f",31,'','',$nserU);?>" class="a1">价格</a>
  <? }elseif(returnsx("f")==31){?>
  <a href="<?=rentser("f",3,'','',$nserU);?>" class="a2">价格</a>
  <? }else{?>
  <a href="<?=rentser("f",3,'','',$nserU);?>" class="a3">价格</a>
  <? }?>
  
  <? if(returnsx("f")==4){?>
  <a href="<?=rentser("f",41,'','',$nserU);?>" class="a1">最新</a>
  <? }elseif(returnsx("f")==41){?>
  <a href="<?=rentser("f",4,'','',$nserU);?>" class="a2">最新</a>
  <? }else{?>
  <a href="<?=rentser("f",4,'','',$nserU);?>" class="a3">最新</a>
  <? }?>
     </li>
  <li class="l3 Search-box">
    <form name="f1" onsubmit="return ser(<?=$rowuser[id]?>)" method="post">
  <ul class="slistsea"> 
  <li class="l1"><input name="t1" type="text"  autocomplete="off" disableautocomplete value="<?=$skey?>" /></li>
  <li class="l2"><input type="image" src="<?=weburl?>shop/img/ser.gif" /></li>
  </ul>
  </form>
 </li>

</div>
<div class="shop_igoods igoods_list" style="margin-top:12px;"> 

 <? 
 $i=1;
 pagef($ses,20,"epzhu_pro",$orderpx);while($row=mysql_fetch_array($res)){
 $au="../product/view".$row[id].".html";
 $tp="../".returntp("bh='".$row[bh]."' order by iffm desc","-2");
 ?>
   <ul>
   <a href="<?=$au?>" class="pic" target="_blank">
   <img src="<?=returntppd($tp,"../img/none180x180.gif")?>">
   </a>
   <li class="sinfo">
    <a href="<?=$au?>" class="sname"title="<?=$row[tit]?>"><?=strgb2312($row[tit],0,50)?></a>
	<p class="sprice"><em><b>￥<?=returnjgdian(returnyhmoney($row[yhxs],$row[money2],$row[money3],$sj,$row[yhsj1],$row[yhsj2],$row[id]))?>元</b></em>
     <span class="note_icon">
	 <? if($row[fhxs]==2 || $row[fhxs]==3 || $row[fhxs]==4){?>
	<a href='https://www.huzhan.com/help/list/26' T-bg='#b68571' class='tips' title='自动发货商品，拍下后，即可收到来自该商品的发货（下载）链接' target=_blank><i class=send>自</i></a><? }else{?>
	
	<a href='https://www.huzhan.com/help/list/26' class='tips' T-bg='#999' title='手动发货商品，拍下后，卖家会收到待发货的邮件、短信提醒' target=_blank><i>手</i><? }?></a>
	 
	<a href='../shop/view<?=$row1[id]?>.html' class='tips' T-w='300' title='已加入消保，商家已缴纳保证金 <b style=color:#FCF302><? if($rowuser[baomoney]>0){?></b> <?=$rowuser[baomoney]?>元<? }?><br>若交易失败（退款），需额外向您支付消保赔付金' target=_blank><i class=protect>保</i></a>
	
</a><a t-bg="#71a3f5" title="本站VIP用户可以免费下载该产品，该商家设置了VIP免费下载" class="installing tips" data_d="134125" data_m="0" data_t="" data_i=",17,44,39,43,84,,72,69,75,78,82," data_b="">
    <? if(1==$row[ifuserdj]){?><i class="install0">免</i><? }?></a> </span></li>
                            </li>
</ul>
 <? $i++;}?>
</div> 
 <div id="page" total="3"><ul>
 <?
 $nowurl="prolist";
 $nowwd="";
 require("../tem/page.html");
 ?>
 </ul></div>

</div>
<div class="yizhanw"> <div class="yizhanw2"><? include("../tem/bottom.html");?></div> </div>
</body>
</html>