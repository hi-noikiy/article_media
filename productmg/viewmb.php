<?
include("../config/xy.php");
$sj=date("Y-m-d H:i:s");
$id=$_GET[id];
while0("*","epzhu_promg where zt<>99 and id=".$id);if(!$row=mysql_fetch_array($res)){php_toheader("../");}
$nowmoney=returnyhmoney($row[yhxs],$row[money2],$row[money3],$sj,$row[yhsj1],$row[yhsj2],$row[id]);

$sqlsell="select * from epzhu_user where id=".$row[userid];mysql_query("SET NAMES 'GBK'");$ressell=mysql_query($sqlsell);
if(!$rowsell=mysql_fetch_array($ressell)){php_toheader("../");}

$nuid=returnuserid($_SESSION["SHOPUSER"]);

$nch="";
if(isset($_COOKIE['prohistoy'])){
$nch=$_COOKIE['prohistoy'];
if(check_in($row[id]."xcf",$nch)){$nch=str_replace($row[id]."xcf","",$nch);}
$a=preg_split("/xcf/",$nch);
if(count($a)>6){$ni=6;}else{$ni=count($a);}
 $nch="";
 for($i=0;$i<=$ni;$i++){
 $nch=$nch.$a[$i]."xcf";
 }
}

$Month = 864000 + time();
setcookie(prohistoy,$row[id]."xcf".$nch, $Month,'/');
$nch=$_COOKIE['prohistoy'];
?>
<html>
<div class="yjcode"><? adwhile("ADTOP");?></div>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="keywords" content="<?=returnjgdw($row[wkey],"",$row[tit])?>">
<meta name="description" content="<?=returnjgdw($row[wdes],"",strgb2312(strip_tags($row[txt]),0,250))?>">
<title><?=$row[tit]?> - <?=webname?></title>
<link href="<?=weburl?>css/basic.css" rel="stylesheet" type="text/css" />
<link href="<?=weburl?>productkf/view.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/common.css" type="text/css">
<script language="javascript" src="<?=weburl?>js/basic.js"></script>
<script language="javascript" src="<?=weburl?>productmg/view.js"></script>
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script language="javascript" src="../js/layer.js"></script>
<script language="javascript" src="js/layui.js"></script>
<script language="javascript" src="js/jquery.m.js"></script>   
<script language="javascript" src="js/common.js"></script>
<script language="javascript" src="js/market.js"></script>
<script language="javascript" src="js/com.js"></script>
<link href="css/css/market.css" rel="stylesheet" type="text/css" />

<script>
window.onload = function(){
$('.c_r_des').find('img').each(function(){
var picWidth = parseInt($(this).width());
if(picWidth > 758)
{
var pW = $(this).width();
var pH = $(this).height();
var BL = pH / pW;
var outH = 758 * BL;
$(this).width(758);
$(this).height(outH);
}
})
};
</script>
<body>
 <div class="header">
<? include("../tem/top--.html");?>
<div class="general main">
<li class="logo"><a href="/"></li>
<li class="top_sinfo">
<? $xy=returnjgdw($rowsell[xinyong],"",returnxy($row[userid],1));?>
<p class="u_t_i"><strong><?=$rowsell[shopname]?></strong><img class="xy" src="../img/dj/<?=returnxytp($xy)?>" title="<?=$xy?>分"></p>
<p><a class="toggle_center"><span style="color:#cccccc;padding-left:0">[</span>服务：<em><?=returnjgdian($rowsell[pf1])?></em><span>|</span>效率：<em><?=returnjgdian($rowsell[pf2])?></em><span>|</span>质量：<em><?=returnjgdian($rowsell[pf3])?></em> <span style="color:#cccccc">]</span></a></p>

<ul class="rev_pop" style="display:none;">
<table class="pop_pf">
<thead>
<tr><th style="width: 50%;text-align:left">店铺综合评分</th>
<th>与同行业相比</th></tr>
</thead>
<tbody>
<tr><td>服务态度： </td><td><i>高于</i> <span><?=returnjgdian($rowsell[pf1])?>%</span></td></tr>
<tr><td>工作效率： </td><td><i>高于</i> <span><?=returnjgdian($rowsell[pf2])?>%</span></td></tr>
<tr><td>完成质量： </td><td><i>高于</i> <span><?=returnjgdian($rowsell[pf3])?>%</span></td></tr>
</tbody>
</table>
<table class="pop_info">
<thead>
<tr><th>&nbsp;</th></tr>
</thead>
<tbody>
<tr><td style="width: 35%;">开店时间：<?=dateYMD($rowsell[sj])?></td></tr>
<tr><td>宝贝数量：<?=returncount("epzhu_promg where userid=".$rowsell[id]." and zt=0")?> 个</td></tr>
<tr><td class="certification">商家认证：
  <? if(1==$rowsell[ifemail]){?><img title="已完成邮箱认证" src="../img/yx1.png"style="
    margin-bottom: -5;
" /><? }else{?><img src="../img/yx1.png" title="邮箱未认证 "style=" padding-right: 3px; " /><? }?>
  <? if(1==$rowsell[ifmot]){?><img title="已完成手机认证" src="../img/sj1.png"style="
    margin-bottom: -5;
" /><? }else{?><img src="../img/sj0.png" title="手机未认证 "style=" padding-right: 3px; " /><? }?>
  <? if(1==$rowsell[sfzrz]){?><img title="已完成身份证认证" src="../img/shen1.png" style="
    margin-bottom: -5;
" /><? }else{?><img src="../img/shen0.png" title="身份证未认证 "style=" padding-right: 3px; " /><? }?>
  </li></ul>
</tbody>
</table>
<div class="t_p_bottom"><a href="/shop/view<?=$row[userid]?>.html">商家店铺》</a></div>
</ul>
</li>

<li class="search Search-box" onmouseover="topover()" onmouseout="topout()">
						<span class="searchtype">搜源码</span><i></i>
			<form name="topf1" method="post" onsubmit="return topftj()">
			
			<input  name="topt" id="topt" type="text" class="searchval Search-inp"/>
			<input type="image" src="<?=weburl?>homeimg/so.png">
			<ul class="searchlist" style="display:none;"> 
			<li data='serve'>  <a href="javascript:void();" onclick="topjconc(1,'搜源码')">搜源码</a></li>

			<li data='domain'> <a href="javascript:void();" onclick="topjconc(2,'搜开发')">搜开发</a></li> 
			
			

  </ul>
</li>
</div>

<div class="shop_banner">



<!--<img class="main" t-bg="#fff" title="店铺：<?=returnqq($row[userid])?>"  src="../upload/<?=$row[userid]?>/bannar.jpg " >-->
<img class="main" t-bg="#fff" title="店铺ID：<?=($row[userid])?>" style="background:url(../upload/<?=$row[userid]?>/bannar.jpg) center top no-repeat;">


</div>
<div class="shop_nav n_bk_we">
<div class="main">
<li class="gs">
<span>店铺商品<em></em></span>
<div class="gsbox">
<a href="/shop/prolist_i<?=$rowsell[id]?>v.html">源码<em>(<?=returncount("epzhu_promg where userid=".$rowsell[id]." and zt=0")?>)</em></em></a></div>
</li>
<li><a href="/shop/view<?=$row[userid]?>.html">首页</a></li>
</div>
</div>
</div>
<script type="text/javascript"> 
$(document).ready(function() {
$(".shop_nav .gs").hover(
                 function() {
					 $(this).addClass('hzcur');
                     $(this).children("div").show();;
                 },
                 function(){ 
					   $this=$(this);
					   $this.removeClass('hzcur');
					   setTimeout(function(){ 
					   if(!$this.hasClass('hzcur')) {
					   $this.children("div").hide();
					   }
				  },1); 
})
})
</script> <div class="dqwz">
 当前位置：<a href="<?=weburl?>">首页</a> > <a href="search_j<?=$row[ty1id]?>v.html"><?=returntype(1,$row[ty1id])?></a>
 <? if(0!=$row[ty2id]){?> > <a href="search_j<?=$row[ty1id]?>v_k<?=$row[ty2id]?>v.html"><?=returntype(2,$row[ty2id])?></a><? }?>
 <? if(0!=$row[ty3id]){?> > <a href="search_j<?=$row[ty1id]?>v_k<?=$row[ty2id]?>v_m<?=$row[ty3id]?>v.html"><?=returntype(3,$row[ty3id])?></a><? }?>
</a> <span>&gt;</span> </div>

 <div class="gmain">
 <!--1-->
 <div class="c_g_top">
 <!--2-->
 <div class="c_g_l">
 <div class="c_g_show">
   <?
  $tparr=array("","","","","");
  $i=0;
  while1("*","epzhu_tp where bh='".$row[bh]."' order by xh asc limit 5");while($row1=mysql_fetch_array($res1)){
  $tpa=preg_split("/\//",$row1[tp]);
  $ti=preg_split("/\./",$tpa[3]);
  $tparr[$i]=$ti[0];
  $i++;
  }
  $lj="../upload/".$row[userid]."/".$row[bh]."/";
  $tp=$lj.$tparr[0]."-1.jpg";
  ?>
<a href="../tp/showpic.php?bh=<?=$row[bh]?>" target="_blank" rel="nofollow" class="c_g_img">
<img src="<?=returntppd($tp,"../img/none300x300.gif")?>">
</a>

  <? for($j=0;$j<$i;$j++){?>
  <? }?>




 <div class="c_g_ihd">
   <? 
  $a1="none";$a2="none";
  if($_SESSION["SHOPUSER"]==""){$a1="";}else{
   $nuid=returnuserid($_SESSION["SHOPUSER"]);
   if(panduan("probh,userid","epzhu_profav where probh='".$row[bh]."' and userid=".$nuid)==1){$a2="";}else{$a1="";}
  }
  ?>
 <span class="sc"  id="favpno" style="display:<?=$a1?>;" ><i class="iconfont"></i><a href="javascript:profavInto('<?=$row[bh]?>')" class="imfav">收藏商品</a></span>
  <span class="sc" id="favpyes" style="display:<?=$a2?>;"><i class="iconfont"></i><a href="../user/favpro.php">已收藏</a></span>
  

 
 
  <span class="l2">
 <span class="fx">分享：</span>
<div class="bdsharebuttonbox left" style="margin-top: -5px;">
<div class="bdsharebuttonbox"><a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a></div>
<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"16"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>

</div>

丨数量：
   <input type="text" onChange="moneycha()" id="tkcnum" style="width:20px;" value="1" />
   <a href="javascript:void(0);" onClick="shujia()" class="a1">+</a>
   <a href="javascript:void(0);" onClick="shujian()" class="a2">-</a>
 


</span>

</div>
</div>

<!---->
<div class="c_g_det">
<!---->
<div class="c_g_tit"><?=$row[tit]?></div>
<!---->
<div class="c_g_att">
<!---->
<ul class="c_g_moy g_m">
<li class="l1">
售&nbsp;价：
</li>

<li class="l2"><div class="price"> <strong><b class="lighten">￥</b><span id="nowmoney"><?=$nowmoney?></span><span id="nowmoneyY" style="display:none;"><?=$nowmoney?></span></strong></div> <div class="jf">

 <? 
   if(2==$row[yhxs] && $sj<=$row[yhsj2]){
   if($sj<$row[yhsj1]){$a=1;}else{$a=2;}
   ?>
   <span id="nyhsj1" style="display:none;"><?=str_replace("-","/",$row[yhsj1])?></span>
   <span id="nyhsj2" style="display:none;"><?=str_replace("-","/",$row[yhsj2])?></span>
   <span id="nmoney2" style="display:none;"><?=returnjgdian($row[money2])?></span>
   <span id="nmoney3" style="display:none;"><?=returnjgdian($row[money3])?></span>
   <span id="nowsj" style="display:none;"><?=str_replace("-","/",$sj)?></span>
   <a href="" target="_blank"><?=$row[yhsm]?><strong style="color:#ff4400"></strong><span id="yhsjv"></a></div></li>
   </ul>
   <script language="javascript" src="yhsj.js"></script>
   <script language="javascript">yhsj(<?=$a?>);</script>
   <? }?>
</ul>
<!---->

<!---->
<ul class="c_g_spe">
   <? 
   $a=preg_split("/xcf/",$row[tysx]);
   $sx1arr=array();
   $sxall="xcf";
   $m=0;
   for($i=0;$i<=count($a);$i++){
	$ai=$a[$i];
    if($ai!=""){
	if(!is_numeric($ai)){$z1=preg_split("/:/",$ai);$ai=$z1[0];}
    while1("*","epzhu_typesx where id=".$ai);if($row1=mysql_fetch_array($res1)){
    if(!in_array($row1[name1],$sx1arr)){$sx1arr[$m]=$row1[name1];$m++;}
	if(!is_numeric($a[$i])){$z1=preg_split("/:/",$a[$i]);$v=$z1[1];}else{$v=$row1[name2];}
	$sxall=$sxall.$row1[name1].":".$v."xcf";
	}
	}
   }
   for($i=0;$i<count($sx1arr);$i++){
   ?>
<li>
<cite><?=$sx1arr[$i]?>：</cite> <? $b=preg_split("/xcf/",$sxall);for($j=0;$j<=count($b);$j++){if(check_in($sx1arr[$i],$b[$j])){echo str_replace($sx1arr[$i].":","",$b[$j])." ";}}?> 
</li>
<? }?>
<li class="l1">最后更新：<?=dateYMD($row[lastsj])?>
</li>
<li>
<!--
<cite>案例网址：</cite>
<? if(!empty($row[ysweb])){?>
<a href="../tem/gotourl.php?u=<?=$row[ysweb]?>" style="color:#00a1ec;" target="_blank" rel="nofollow"><i class="iconfont">&#x3433;</i>查看</strong></a><? }else{?><a style="color:#999"><strong>无演示</strong></a><? }?></li>

-->
</ul>
</li>
</ul>
<ul class="c_g_but">
  <li class="l2"><a class="cartadd"  id="bcar" href="javascript:buyInto('<?=$row[bh]?>')"><i class="iconfont"></i> <b>立即购买</b></a>
   <? 
   $a1="none";$a2="none";
   if($_SESSION["SHOPUSER"]==""){$a1="";}else{
	if(panduan("probh,userid","epzhu_carmg where probh='".$row[bh]."' and userid=".$nuid)==1){$a2="";}else{$a1="";}
   }
   ?>
   <a href="javascript:carInto('<?=$row[bh]?>')" id="cara1" style="display:<?=$a1?>;" class="car" title="添加购物车" ><img src="img/che.png" width="50" height="40" border="0" /></a>
   <a href="../user/carmg.php" id="cara2" style="display:<?=$a2?>;" class="carok" title="已在购物车"><img src="img/cheok.png" width="50" height="40" border="0" /></a></li></ul>
<UL class="c_g_ser">
		<DIV class=fw_name>
					<LABEL class="l1">保&nbsp;障：</LABEL> 
						<? if($row[fhxs]==2 || $row[fhxs]==3 || $row[fhxs]==4){?><a class="fw_a fw_on"><i class='iconfont'>&#xe652;</i><em>自动发货</em></a><? }?>
						<? if(1==$row[ifuserdj]){?><a class="fw_a "><i class='iconfont'>&#xe652;</i><em>会员折扣</em></a><? }?>
						<a class="fw_a "><i class='iconfont'>&#xe652;</i><em>担保交易</em></a>
						<A class="fw_a tpay"><em>支付方式</em><i class=iconfont style='line-height:15px;font-size:13px;color:#666'>&#xe658;</i></A>
		</DIV>
		<DIV class='fw_txt'>
			<? if($row[fhxs]==2 || $row[fhxs]==3 || $row[fhxs]==4){?><cite style="DISPLAY:block;">自动发货商品，随时可以购买，零等待。</cite><? }?><? if(1==$row[ifuserdj]){?><cite >不同会员等级尊享不同购买折扣。和最高级别VIP免费下载。</cite><? }?><cite >担保交易，有问题不解决24小时内可申请退款，安全保证。</cite>			<cite class='fw_pay'>
			<p><a><i class=iconfont style='color:#00aaef'>&#xe654;</i>支付宝</a><a><i class=iconfont style='color:#1ea838'>&#xe657;</i>微信支付</a></p>
			<p><a><i class=iconfont style='color:#ff8500'>&#xe655;</i>财付通</a><a><i class=iconfont style='color:#082f67'>&#xe656;</i>网上银行</a></p>
			</cite>
		</DIV>
</UL>
<!---->
</div>
  </div>
   </div>
<? $xy=returnjgdw($rowsell[xinyong],"",returnxy($row[userid],1));?>
<div class="c_g_inf">
<ul class="c_g_sell">
<img class="c_s_tx tipss" t-bg="#fff" style="background:url(/images/yizhanwcom.png) center top no-repeat;" src="../upload/<?=$row[userid]?>/shop.jpg" width="45" height="45">
<span class="c_s_name"><p><?=$rowsell[shopname]?></p>
<img title="信用值<?=$xy?>" src="../img/dj/<?=returnxytp($xy)?>" /></span>
</ul>
<ul class="c_s_info">
<li class="certification"><span>商家认证：</span>
<? if(1==$rowsell[ifmot]){?><i class="phone success" title="已通过手机认证"></i><? }else{?><i class="phone successs" title="未通过手机认证"></i><? }?>
<? if(1==$rowsell[ifemail]){?><i class="success" title="已通过邮箱认证"></i><? }else{?><i class="successs" title="未通过邮箱认证"></i><? }?>
<? if(1==$rowsell[sfzrz]){?><i class="idcard success" title="已通过身份认证"></i><? }else{?><i class="idcard successs" title="未通过身份认证"></i><? }?>
<!--<? if($rowsell[baomoney]>0){?><i class="company" title="已缴纳保证金"></i></li><? }?>-->
</ul>
<ul class="tit">
<i class="iconfont" style="font-size:18px;font-weight:normal;"></i> 联系卖家</ul>
<ul class="c_s_cont" >
<div class="uim">
<div class="qq" title="联系QQ"><a href="http://wpa.qq.com/msgrd?v=3&uin=<?=returnqq($row[userid])?>&site=<?=weburl?>&menu=yes" target=_blank><?=returnqq($row[userid])?></a></div>
<? if($rowsell[weixin]){?><div class="wechat" title="联系微信"><p><?=$rowsell[weixin]?></p></div><? }?>
<? if($rowsell[mot]){?><div class="phone" title="联系电话"><p><?=$rowsell[mot]?></p></div><? }?></span></div></ul>
<ul class="shop_score">
   <div>
   <cite>
   <p><span>描述</span></p> 
   <p class="up"><?=returnjgdian($rowsell[pf1])?><i class="iconfont"></i></p>   </cite>
   <cite> 
   <p><span>发货</span></p>
   <p class="up"><?=returnjgdian($rowsell[pf2])?><i class="iconfont"></i></p>   </cite> 
   <cite> 
   <p><span>售后</span></p>
   <p class="up"><?=returnjgdian($rowsell[pf3])?><i class="iconfont"></i></p>   </cite> 
   </div>
</ul>
<ul class="shop_btns">
  <a href="../shop/view<?=$rowsell[id]?>.html"><i class="iconfont va-1"></i><span>进店逛逛</span>
  <? 
  $a1="none";$a2="none";
  if($_SESSION["SHOPUSER"]==""){$a1="";}else{
  if(panduan("*","epzhu_shopfav where shopid=".$rowsell[id]." and userid=".$nuid."")==1){$a2="";}else{$a1="";}
  }
  ?>
  </a>
    <li class="l2" id="favsno" style="display:<?=$a1?>;"><a  href="javascript:shopfavInto(<?=$rowsell[id]?>)" class="collection imfav">
  <i class="iconfont"></i><span>收藏店铺</span>
  </a></li>
  <li class="l2" id="favsyes" style="display:<?=$a2?>;"><a  href="../user/favshop.php" class="collection imfav">
  <i class="iconfont"></i><span>已经收藏</span>
   </a>
</ul>
<ul>
<? if($rowsell[baomoney]>0){?>
<a class="bond_info" target="_blank" href="<?=weburl?>user/baomoney1.php"><i class="iconfont va-1"></i>商家已缴纳保证金<em class="orange va-1"><strong><?=sprintf("%.2f",$rowsell[baomoney])?></strong></em>元</a>
</ul>
<? }?>
</div>
 </div>
<div class="main" style="float:left;overflow:hidden;width:102%;">	
<!--右边-->
<div class="c_g_info">	
<div class="c_r_menu" id="layer_top">
	<em class="c_aa cur"><i class="iconfont va-1"></i> 商品详情</em>
	    <em class="c_bb"><i class="iconfont va-1"></i> 交易评价</em>
		<em class="c_cc"><i class="iconfont va-1"></i> 交易规则</em>
		<em class="c_dd"><i class="iconfont va-1"></i> <a href="<?=weburl?>help/aboutview8.html" target="_blank">防骗指南</a></em>
		<ul><a href="javascript:buyInto('<?=$row[bh]?>')" class="buys cartadd"><i class="iconfont"></i> <b>立即购买</b></a></ul>
        <ul class="layer_uim"><li><i class="iconfont va-1"></i> 联系卖家</li><span class="uim" uinfo=""><div class="qq" title="联系QQ"><p><b>总客服：</b><?=returnqq($row[userid])?></p></div></span></li></ul>
        <ul class="layer_uim"><li></li>
		<li class="uim" >
		</span></li></ul>
</div>
<div class="c_r_des" id="c_aa">
<p>
 <!--正文介绍B-->
 <ul class="probq">
 <? 
 $a=preg_split("/xcf/",$row[tysx]);
 $sx1arr=array();
 $sxall="xcf";
 $m=0;
 for($i=0;$i<=count($a);$i++){
  $ai=$a[$i];
  if($ai!=""){
   if(!is_numeric($ai)){$z1=preg_split("/:/",$ai);$ai=$z1[0];}
   while1("*","epzhu_typesx where id=".$ai);if($row1=mysql_fetch_array($res1)){
    while2("*","epzhu_typesx where name1='".$row1[name1]."' and admin=1 and ifjd=1");if($row2=mysql_fetch_array($res2)){
     if(!in_array($row1[name1],$sx1arr)){$sx1arr[$m]=$row1[name1];$m++;}
     if(!is_numeric($a[$i])){$z1=preg_split("/:/",$a[$i]);$v=$z1[1];}else{$v=$row1[name2];}
     $sxall=$sxall.$row1[name1].":".$v."xcf";
    }
   }
  }
 }
 for($i=0;$i<count($sx1arr);$i++){
 ?>
 <li class="l1"><?=$sx1arr[$i]?>：</li><li class="l2"><? $b=preg_split("/xcf/",$sxall);for($j=0;$j<=count($b);$j++){if(check_in($sx1arr[$i],$b[$j])){echo str_replace($sx1arr[$i].":","",$b[$j])." ";}}?></li>
 <? }?>
 </ul>
 <? $protxt=$row[txt];?>
 <? if(check_in("video",$row[txt])){?>
 <link href="../config/ueditor/third-party/video-js/video-js.min.css" rel="stylesheet" type="text/css" />
 <script language="javascript" src="../config/ueditor/third-party/video-js/video.dev.js"></script>
 <? }?>
 <?=$protxt?>
 <!--正文介绍E-->
 </div>
<div class="c_r_cap dan" id="c_bb">
<em>&nbsp;&nbsp;&nbsp;交易评价</em>
<ul class="c_r_page s_ajax_page">
<a class="gopage">商品综合评分<strong class="g_ac0_h"><?=round(($row[pf1]+$row[pf2]+$row[pf3])/3,2)?></strong>分</a>
 </ul>
 </div>
 <div class="c_r_rev" id="code_pg_scTop">
 <? 
 while1("*","epzhu_propjmg where probh='".$row[bh]."' order by sj desc limit 10");while($row1=mysql_fetch_array($res1)){
 $usertx="../upload/".$row1[userid]."/user.jpg";
 if(!is_file($usertx)){$usertx="../user/img/nonetx.gif";}else{$usertx=$usertx."?id=".rnd_num(1000);} 
 $sqlpro="select * from epzhu_promg where bh='".$row1[probh]."'";
 mysql_query("SET NAMES 'GBK'");
 $respro=mysql_query($sqlpro);
 $rowpro=mysql_fetch_array($respro);
 $sj=date("Y-m-d H:i:s");
 $nowmoney=returnyhmoney($rowpro[yhxs],$rowpro[money2],$rowpro[money3],$sj,$rowpro[yhsj1],$rowpro[yhsj2],$rowpro[id]);
 if($row1[pjlx]==1){$ico='good';}elseif($row1[pjlx]==2){$ico='normal';}elseif($row1[pjlx]==3){$ico='bad';}
 ?>
 <ul>
<li class="l1"><img class="avatar" src="<?=$usertx?>"><br><?=mb_substr(returnnc($row1[userid]),0,2);?>***<?=mb_substr(returnnc($row1[userid]),-2,2);?><br><? $pf=round(($row1[pf1]+$row1[pf2]+$row1[pf3])/3,2);$userxy1=returnxy($row1[userid],2);?><img title="买家信用值<?=$userxy1?>" src="../img/dj/<?=returnxytp($userxy1)?>" /></span>
<li class="l2"><div class="t"><strong>成交金额：</strong><span style="color:#f60"><?=$row[money2]?>.00元</span>&nbsp;&nbsp;  
<div class="pingfen_btn">
<span style="color:#999"><? if($row1[txt]!='暂未评价'){?>本次综合评分：</span><span><?=$pf?>.00</span><? }?><div class="pingfen_box"><? 	$star = $pf;?>						
<dl>
<dd>服务态度</dd><s><div style="width:78px;"><img src="/img/pf<?=$row1[pf1]?>.png"  title="<?=$mspf?>分"></div></s><dd><em><?=$row1[pf1]?>分</em></dd>
</dl>
<dl>
<dd>工作效率</dd><s><div style="width:78px;"><img src="/img/pf<?=$row1[pf2]?>.png" title="<?=$fhpf?>分"></div></s><dd><em><?=$row1[pf2]?>分</em></dd>
</dl>
<dl>
<dd>商品质量</dd><s><div style="width:78px;"><img src="/img/pf<?=$row1[pf3]?>.png" title="<?=$shpf?>分"></div></s><dd><em><?=$row1[pf3]?>分</em></dd>
</dl>
</div>
</div>
</div>    
<div class="rev_c"<?=$color?>>
<div class="rev_b"><div class="xy">
<? if($row1[txt]!='暂未评价'){?></div><i class="ico-<?= $ico?>" style="margin:0 3px 0 -3px;vertical-align:middle" id="eval"></i><? }?>
<i class="eval ico-<?= $ico?>"></i><? if($row1[txt]!='暂未评价'){?><? }?><?=$row1[txt]?><br>	
<? while2("*","epzhu_tpkf where bh='".$row1[orderbh]."' order by xh asc");while($rowt=mysql_fetch_array($res2)){$tp="../".str_replace(".","-1.",$rowt[tp]);?>
<a href="../<?=$rowt[tp]?>" target="_blank"><img src="<?=$tp?>" width="50" height="50" /></a>&nbsp;&nbsp;<? }?><br><?=$row1[sj]?>
<? while2("*","epzhu_tpkf where bh='".$row1[orderbh]."' order by xh asc");while($rowt=mysql_fetch_array($res2)){$tp="../".str_replace(".","-1.",$rowt[tp]);?>&nbsp;&nbsp;<? }?>	
<? if(!empty($row1[hf])){?><div class="hfcon"> <div class="j-border"></div>
<div class="j-background"></div><span><p class="tit" style="color:#e74851">卖家回复：</p><?=$row1[hf]?><p class="gray"></p></span></p></div><? }?>
</span>
	</div>
		</div>
		</li>
		</ul>					
<? }?>					
</div>

<SCRIPT type="text/javascript">
<style>
.xy {
    float: left;
    margin-top: 30px;
}
</style>
function get_list(str){
  $(".c_r_rev").empty();
  $.each(str,function(key,val){  
	   	  $("."+key).html(val);
  });
}
$('#code_hot').AdAdvance();$().layer_top();
$(window).load(function(){$('.c_r_menu').menu_layer();});
 $(function(){
	getData();
});
</SCRIPT>
 <!--评价结束-->
<div class="c_r_cap dan" style="margin-top:-1px;" id="c_cc">&nbsp;&nbsp;&nbsp;交易规则
</div><div class="s_flow"><dl><dd><? while1("*","epzhu_onecontrol where tyid=9");if($row1=mysql_fetch_array($res1)){echo $row1[txt];}?></dd></dl>
</div>
</div>
<div class="c_g_right">


<div class="c_l_cap">&nbsp;&nbsp;&nbsp;本店设计销量榜！</div>
  <div class="c_l_hol" id="code_hot">
 <dl class="dropList-hover">
     <? 
	 $i=1;
	 while1("*","epzhu_typemg where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1));
     while1("*","epzhu_promg where userid=".$row[userid]." and zt=0 and ifxj=0 order by xsnum desc limit 10");while($row1=mysql_fetch_array($res1)){$tp="../".returntp("bh='".$row1[bh]."' order by xh asc","-2");
	 ?>
  <dt><p><em class="no<?=$i?>"><?=$i?></em><span><a href="../productmg/view<?=$row1[id]?>.html"target="_blank"><?=returntitdian($row1[tit],37)?></a></span></p></dt>
  <dd><a class="track" href="view<?=$row1[id]?>.html" target="_blank"><img src="<?=returntppd($tp,"../img/none60x60.gif")?>" class="pic_Layer"></a> 
  </dd>
  </dl>
   <dl class="">
	  <? 
	  $i++;
	  }
	  ?>
    </div>

<div class="c_l_cap">&nbsp;&nbsp;&nbsp;本店源码销量榜！</div>
  <div class="c_l_hol" id="code_hot">
 <dl class="dropList-hover">
     <? 
	 $i=1;
	 while1("*","epzhu_type where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1));
     while1("*","epzhu_pro where userid=".$row[userid]." and zt=0 and ifxj=0 order by xsnum desc limit 10");while($row1=mysql_fetch_array($res1)){$tp="../".returntp("bh='".$row1[bh]."' order by xh asc","-2");
	 ?>
  <dt><p><em class="no<?=$i?>"><?=$i?></em><span><a href="../product/view<?=$row1[id]?>.html"target="_blank"><?=returntitdian($row1[tit],37)?></a></span></p></dt>
  <dd><a class="track" href="view<?=$row1[id]?>.html" target="_blank"><img src="<?=returntppd($tp,"../img/none60x60.gif")?>" class="pic_Layer"></a> 
  </dd>
  </dl>
   <dl class="">
	  <? 
	  $i++;
	  }
	  ?>
    </div>

	
	
	
	
	<div class="c_g_right">
<div class="c_l_cap">&nbsp;&nbsp;&nbsp;本店服务销量榜！</div>
  <div class="c_l_hol" id="code_hot">
 <dl class="dropList-hover">
     <? 
	 $i=1;
	 while1("*","epzhu_typekf where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1));
     while1("*","epzhu_prokf where userid=".$row[userid]." and zt=0 and ifxj=0 order by xsnum desc limit 10");while($row1=mysql_fetch_array($res1)){$tp="../".returntp("bh='".$row1[bh]."' order by xh asc","-2");
	 ?>
  <dt><p><em class="no<?=$i?>"><?=$i?></em><span><a href="view<?=$row1[id]?>.html"target="_blank"><?=returntitdian($row1[tit],37)?></a></span></p></dt>
  <dd><a class="track" href="view<?=$row1[id]?>.html" target="_blank"><img src="<?=returntppd($tp,"../img/none60x60.gif")?>" class="pic_Layer"></a> 
  </dd>
  </dl>
   <dl class="">
	  <? 
	  $i++;
	  }
	  ?>
    </div>
	<div class="c_l_cap">&nbsp;&nbsp;&nbsp;平台推送广告！</div>
<div style="float:left;width:200px;height:200px;overflow:hidden;border-top:#e5e5e5 solid 1px;padding:15px;">
 <? adwhile("ADP01",0,200,200)?>
    </div>
	
	
	
	
	
	
	
	
    </div>
    </div>
    </div>
</div>
 </div>
 <SCRIPT type="text/javascript">
function get_list(str){
  $(".c_r_rev").empty();
  $.each(str,function(key,val){  
	   	  $("."+key).html(val);
  });
}
$('#code_hot').AdAdvance();$().layer_top();
$(window).load(function(){$('.c_r_menu').menu_layer();});
 //$(function(){
//	getData();
//});
</SCRIPT>
<div class="yizhanw"> <div class="yizhanw2"><? include("../tem/bottom.html");?></div> </div>
<div id="warp">
<script type="text/javascript" src="js/tipswindown.js"></script>
<div style="display:none;">
<div id="simTestContent">
<div id="" class="layui-layer-content">
<div class="ly_ins">
<table class="table1">
<tbody><tr>
	<td class="tyn">商品<br>信息
	</td>
	<td>
		<table class="table2">
	<tbody><tr>
		<td class="nm1">商品名称</td>
		<td><span><a href="<?=$au?>" style="color:#247FBD" target="_blank"><?=$row[tit]?></a></span></td>
	</tr>
		<tr>
		<td class="nm1">安装服务</td>
		  <? if($row[azsf]==0){?><td class="ly_aztisp"><font color="#008000">免费提供</font><? }?>	</td>
		  <? if($row[azsf]==1){?><td class="ly_aztisp"><font color="#ff0000">￥<?=$row[anzhuang]?></font>（<font class="ly_azzt" color="#999999">需额外支付费用，可选服务</font>）<? }?></td>
	</tr>
	</tbody>
	</table>
	</td>
</tr>
<tr>
		<td class="tyn">运行<br>环境
	</td>
	<td>
<table class="table2">
   <?
   $a=preg_split("/xcf/",$row[tysx]);$sx1arr=array();$sxall="xcf";$m=0;for($i=0;$i<=count($a);$i++){
	$ai=$a[$i];if($ai!=""){if(!is_numeric($ai)){$z1=preg_split("/:/",$ai);$ai=$z1[0];}
    while1("*","epzhu_typesx where id=".$ai);if($row1=mysql_fetch_array($res1)){if(!in_array($row1[name1],$sx1arr)){$sx1arr[$m]=$row1[name1];$m++;}
	if(!is_numeric($a[$i])){$z1=preg_split("/:/",$a[$i]);$v=$z1[1];}else{$v=$row1[name2];}$sxall=$sxall.$row1[name1].":".$v."xcf";}}}for($i=0;$i<count($sx1arr);$i++){
    ?>
<tbody><tr><td class="nm1"><?=$sx1arr[$i]?></td><td> <? $b=preg_split("/xcf/",$sxall);for($j=0;$j<=count($b);$j++){if(check_in($sx1arr[$i],$b[$j])){echo str_replace($sx1arr[$i].":","",$b[$j])." ";}}?></td></tr>
  <? }?>

<td class="nm1">伪静态</td><? if($row[azwjt]==1){?><td>不需要</td></tr><? }?><? if($row[azwjt]==2){?><td>需要</td></tr><? }?>
</tbody>
</table>
</td></tr><tr>
    <td class="tyn">主机<br>环境
	</td><td><table class="table2"><tbody>
	<td class="nm1">主机类型 </td><td><?=$row[azzj]?></td></tr>
	<td class="nm1">操作系统</td><td><?=$row[azxt]?></td></tr>
	<td class="nm1">web服务</td><td><?=$row[azhj]?></td></tr>
	</tbody>
	</table>
	</td>
</tr>
<tr>
	<td class="tyn">其他<br>说明
	</td>
	<td>
		<table class="table2">
	    <tbody><tr><td class="nm1">卖家附言</td><td style="color:#000"><?=$row[azbz]?></td></tr><tr>
		<td class="nm1">安装方式</td><td><?=$row[azfs]?></td></tr>
	</tbody>
	</table>
	</td>
</tr>
</tbody>
</table>
  <div class="ins_notes">
	<li> <h3>注意事项及说明：</h3></li>
<li><b>1.</b>【安装服务】需收费时，可在购物车结算中，自行选择是否需要购买该服务；</li>
<li><b>2.</b>【主机环境】非该商品仅支持的环境，而是卖家技术能力范围内可提供安装服务的环境；</li>
<li><b>3.</b> 对于未购买安装服务的交易，可在交易中追加购买安装服务；</li>
<li><b>4.</b> 免费或购买收费安装，而无法提供上述要求环境，即代表自愿放弃安装服务。</li>
	 </div>
  </div>
</div>

</body>
</html>