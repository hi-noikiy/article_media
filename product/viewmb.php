<?
include("../config/xy.php");
$sj=date("Y-m-d H:i:s");
$id=$_GET[id];
while0("*","epzhu_pro where zt<>99 and id=".$id);if(!$row=mysql_fetch_array($res)){php_toheader("../");}
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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta name="Pg-Type" content="code">
<meta name="keywords" content="<?=returnjgdw($row[wkey],"",$row[tit])?>">
<meta name="description" content="<?=returnjgdw($row[wdes],"",strgb2312(strip_tags($row[txt]),0,250))?>">
<title><?=$row[tit]?> - <?=webname?></title>



<script language="javascript" src="static/js/tipso.min.js"></script>
<script language="javascript" src="<?=weburl?>js/basic.js"></script>
<script language="javascript" src="<?=weburl?>product/view.js"></script>
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script language="javascript" src="../js/layer.js"></script>
<script language="javascript" src="js/layui.js"></script>
<script language="javascript" src="js/jquery.m.js"></script>   
<script language="javascript" src="js/common.js"></script>

<script language="javascript" src="js/market.js"></script>
<script language="javascript" src="js/com.js"></script>

<link href="static/css/basic.css" rel="stylesheet" type="text/css" /><link href="static/css/market.css" rel="stylesheet" type="text/css" /><link href="static/css/layui.css" rel="stylesheet" type="text/css" />


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

</head>
<body><div class="header">
	<? include("../tem/top---.html");?>
	
	
	<div class="general main">
		<li class="logo s-logo">
			<a href="/"></a>
		</li>
		<li class="top_sinfo">
			<p class='u_t_i'>				<strong><?=$rowsell[shopname]?></strong><img class='xy' src='../img/dj/<?=returnxytp($xy)?>' title='<?=$xy?>分'>			</p>
			<p>
				<a class="toggle_center">
					<span style='color:#cccccc;padding-left:0'>[</span>服务：<em><?=returnjgdian($rowsell[pf1])?></em><span>|</span>效率：<em><?=returnjgdian($rowsell[pf2])?></em><span>|</span>质量：<em><?=returnjgdian($rowsell[pf3])?></em> <span style='color:#cccccc'>]</span>
				</a>
			</p>
			<ul class="rev_pop" style="display:none;">
				<table class='pop_pf'>
					<thead>
						<tr>
							<th style="width: 60%;text-align:left">店铺综合评分</th>
							<th>与同行相比</th>
						</tr>
					</thead>
					<tbody>
						<tr><td>服务态度： <?=returnjgdian($rowsell[pf1])?></td><td><i>高于</i> <span><?=returnjgdian($rowsell[pf1])?>%</span></td></tr>
						<tr><td>工作效率： <?=returnjgdian($rowsell[pf2])?></td><td><i>高于</i> <span><?=returnjgdian($rowsell[pf2])?>%</span></td></tr>
						<tr><td>完成质量： <?=returnjgdian($rowsell[pf3])?></td><td><i>高于</i> <span><?=returnjgdian($rowsell[pf3])?>%</span></td></tr>
					</tbody>
				</table>
				<table class='pop_info' style='width:200px;'>
					<thead>
						<tr>
							<th>&nbsp;</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td  style="width: 35%;">
								开店时间：<?=dateYMD($rowsell[sj])?>							</td>
						</tr>
						<tr>
							<td>
								宝贝数量：<?=returncount("epzhu_pro where userid=".$rowsell[id]." and zt=0")?> 个
							</td>
						</tr>
						<tr>
							<td class="certification">商家认证：
							 <? if(1==$rowsell[ifemail]){?><img title="已完成邮箱认证" src="../img/yx1.png"style="
    margin-bottom: -5;
" /><? }else{?><img src="../img/yx1.png" title="邮箱未认证 "style=" padding-right: 3px; " /><? }?>
  <? if(1==$rowsell[ifmot]){?><img title="已完成手机认证" src="../img/sj1.png"style="
    margin-bottom: -5;
" /><? }else{?><img src="../img/sj0.png" title="手机未认证 "style=" padding-right: 3px; " /><? }?>
  <? if(1==$rowsell[sfzrz]){?><img title="已完成身份证认证" src="../img/shen1.png" style="
    margin-bottom: -5;
" /><? }else{?><img src="../img/shen0.png" title="身份证未认证 "style=" padding-right: 3px; " /><? }?>
								</i>
							</td>
						</tr>
					</tbody>
				</table>
				<div class="t_p_bottom">
					<a href="/shop/view<?=$row[userid]?>.html">商家店铺》</a>
				</div>
			</ul>
		</li>
				<li class="search Search-box s">
			<span class="searchtype">
				<cite>源码&nbsp;&nbsp;</cite>
				<em class="arrow"></em>
				<ul class="searchlist"> 
				<li data-link="" class="cur">源码&nbsp;&nbsp;</li><li data-link="" >服务&nbsp;&nbsp;</li><li data-link="" >网站&nbsp;&nbsp;</li><li data-link="" >域名&nbsp;&nbsp;</li><li data-link="" >任务&nbsp;&nbsp;</li><li data-link="" >商家&nbsp;&nbsp;</li><li data-link="" >品牌&nbsp;&nbsp;</li>				</ul>
			</span>
			<input name="" class="searchval Search-inp" type="text" placeholder='' x-webkit-speech x-webkit-grammar="bUIltin:search"/>
			<a class="searchbtn Search-btn" />
			搜 索
			</a>
		</li>
	</div>
	<div class="shop_banner">
		<div class="main" style="background:url(../upload/<?=$row[userid]?>/bannar.jpg) center top no-repeat;>
		<img class="main" t-bg="#fff" title="" style="background:url(../upload/<?=$row[userid]?>/bannar.jpg) center top no-repeat;">
				</div>
	</div>
	<div class="shop_nav">
		<div class="main">
			<li class='gs'>
				<span>店铺商品<em></em></span>
				<div class="gsbox">
					<a href='/shop/prolist_i<?=$rowsell[id]?>v.html'>源码<em>(<?=returncount("epzhu_pro where userid=".$rowsell[id]." and zt=0")?>)</em></a>			</div>
			</li>
			<li>
				<a href="/shop/view<?=$row[userid]?>.html">首页</a>
			</li>
						
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
		});
	});
</script> <div class="dqwz">当前位置：<a href="<?=weburl?>">首页</a> <span>></span> <a href="search_j<?=$row[ty1id]?>v.html"><?=returntype(1,$row[ty1id])?></a> <span>></span> <? if(0!=$row[ty2id]){?> > <a href="search_j<?=$row[ty1id]?>v_k<?=$row[ty2id]?>v.html"><?=returntype(2,$row[ty2id])?></a><? }?>
 <? if(0!=$row[ty3id]){?> > <a href="search_j<?=$row[ty1id]?>v_k<?=$row[ty2id]?>v_m<?=$row[ty3id]?>v.html"><?=returntype(3,$row[ty3id])?></a><? }?></a> <span>></span> </div>
<div class="main">	
	<!--左边-->
	<div class="g_main left">	
		<div class="g_top g_box">
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
					<img class='G-image' src="<?=returntppd($tp,"../img/none300x300.gif")?>" style="width:350px;height:280px;"/>
				</a>
  <? for($j=0;$j<$i;$j++){?>
  <? }?> <? 
  $a1="none";$a2="none";
  if($_SESSION["SHOPUSER"]==""){$a1="";}else{
   $nuid=returnuserid($_SESSION["SHOPUSER"]);
   if(panduan("probh,userid","epzhu_profav where probh='".$row[bh]."' and userid=".$nuid)==1){$a2="";}else{$a1="";}
  }
  ?>
				<div class="c_g_ihd" > <span class="sc"  id="favpno" style="display:<?=$a1?>;" ><i class="iconfont"></i><a href="javascript:profavInto('<?=$row[bh]?>')" class="imfav">收藏商品</a></span>
  <span class="sc" id="favpyes" style="display:<?=$a2?>;"><i class="iconfont"></i><a href="../user/favpro.php">已收藏</a></span>
					
					<span class="l2">
						<span class="fx-title icons" >
							<div>分享：</div>
						</span>
						<!--share start-->
						<div class="G-share">
							<a class="share-a G-weixin" data="weixin" title="分享到微信"></a>
							<a class="share-a G-qzone" data="qzone"  title="分享到QQ空间"></a>
							<a class="share-a G-sqq" data="qq" title="分享到QQ好友"></a>
							<a class="share-a G-tsina" data="sina" title="分享到新浪微博"></a>
						</div>
						<!--share end-->
						丨数量：
   <input type="text" onChange="moneycha()" id="tkcnum" style="width:20px;" value="1" />
   <a href="javascript:void(0);" onClick="shujia()" class="a1">+</a>
   <a href="javascript:void(0);" onClick="shujian()" class="a2">-</a>
 
					</span>
					
					
					
					<!--
					
					<span class="jb report" good='code' number='154347808788'>举报</span>-->
				</div>
							</div>
			<div class="c_g_det">
				<div class="c_g_tit">
					<?=$row[tit]?>				</div>
				<div class="c_g_att">
					<ul class="c_g_moy g_m">
						<li class="l1">
						售&nbsp;价：
						</li>
						
<li class="l2"><div class="price"> <strong><b class="lighten">￥</b><span id="nowmoney"><?=$nowmoney?>.00</span><span id="nowmoneyY" style="display:none;"><?=$nowmoney?>.00</span></strong></div> <div class="jf">

 <? 
   if(2==$row[yhxs] && $sj<=$row[yhsj2]){
   if($sj<$row[yhsj1]){$a=1;}else{$a=2;}
   ?>
   <span id="nyhsj1" style="display:none;"><?=str_replace("-","/",$row[yhsj1])?></span>
   <span id="nyhsj2" style="display:none;"><?=str_replace("-","/",$row[yhsj2])?></span>
   <span id="nmoney2" style="display:none;"><?=returnjgdian($row[money2])?></span>
   <span id="nmoney3" style="display:none;"><?=returnjgdian($row[money3])?></span>
   <span id="nowsj" style="display:none;"><?=str_replace("-","/",$sj)?></span>
   <a href="" target="_blank"><?=$row[yhsm]?><strong style="color:#ff4400"></strong><span id="yhsjv"></a>  <? }?></div></li>
					</ul>
				
<script language="javascript" src="yhsj.js"></script>
   <script language="javascript">yhsj(<?=$a?>);</script>
 
					<ul class="c_g_spe">
						
						<li>
							<cite>演示网站：</cite><? if(!empty($row[ysweb])){?>
<a href="../tem/gotourl.php?u=<?=$row[ysweb]?>" style="color:#00a1ec;" target="_blank" rel="nofollow"><i class="iconfont">&#x3433;</i>查看演示</strong></a><? }else{?><a style="color:#999"><strong>无演示</strong></a><? }?>						</li>

						<li>
							<cite>安装服务：</cite><? if($row[azsf]==0){?><em style='color:#008000;'>免费</em><? }?>
<? if($row[azsf]==1){?><em style='color:#f00;letter-spacing:1px;'>￥<?=$row[anzhuang]?></em><font color='#999999' style='letter-spacing:0;'>（需额外支付）</font><? }?><a class="installing red" href="javascript:void();" onclick="anzhuang(1,<?=$row[id]?>)"  style='letter-spacing:0;'>【要求说明】</a>
						</li>
						<li>
							<cite>最后刷新：</cite><font style="color:#999;letter-spacing:1px;"> <?=dateYMD($row[lastsj])?></font> <i class='icons tips' title='该时间为商品最后排序刷新时间，<br>不一定为出品或发布上架时间！'></i>
						</li>	
					</ul>

   
   <ul class="c_g_but">
  <li class="l2"><a class="cartadd"  id="bcar" href="javascript:buyInto('<?=$row[bh]?>')"><i class="iconfont"></i> <b>立即购买</b></a>
   <? 
   $a1="none";$a2="none";
   if($_SESSION["SHOPUSER"]==""){$a1="";}else{
	if(panduan("probh,userid","epzhu_car where probh='".$row[bh]."' and userid=".$nuid)==1){$a2="";}else{$a1="";}
   }
   ?>
   <a href="javascript:carInto('<?=$row[bh]?>')" id="cara1" style="display:<?=$a1?>;" class="car" title="添加购物车" ><img src="img/che.png" width="50" height="40" border="0" /></a>
   <a href="../user/car.php" id="cara2" style="display:<?=$a2?>;" class="carok" title="已在购物车"><img src="img/cheok.png" width="50" height="40" border="0" /></a></li></ul>
					
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
				</div>
			</div>
		</div>
		<div class="g_box">	
			<div class="c_r_menu" id="layer_top">
				<em class="c_aa cur"><i class="iconfont va-1">&#xe627;</i> 商品详情</em>
				<em class="c_bb"><i class="iconfont va-1">&#xe602;</i> 交易评价</em>
				<em class="c_cc"><i class="iconfont va-1">&#xe628;</i> 交易规则</em>
				<em class="c_dd"><i class='iconfont va-1'>&#xe719;</i> <a href="<?=weburl?>help/aboutview8.html"  target=_blank> 防骗指南</a></em>
				<ul class="layer_uim">
					<li class='tit'><i class="iconfont va-1">&#xe62f;</i> 联系卖家</li>
					<li class='uim' uinfo='<?=$rowsell[shopname]?>|../upload/<?=$row[userid]?>/shop.jpg'><span class="uim" data-info="<?=$rowsell[shopname]?>|"><div class="qq" title="联系QQ"><p><?=returnqq($row[userid])?></p></div></span></ul>
					</ul>
				<ul><a class="buys cartadd" id="bcar" data='buy' href="javascript:buyInto('<?=$row[bh]?>')"><b>立即购买</b></a></ul>
			</div>
		
		
		

			<style>

.c_r_des p img{display:flex;}

</style>
			<div class="c_r_des lazyload" id="c_aa">
				<div class='c_r_tit'>
					<i class='iconfont'>&#xe630;</i><b>商品属性</b>
				</div>
				<ul class="c_r_par">
					<ul>
						
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
<cite><?=$sx1arr[$i]?>：</cite><em> <? $b=preg_split("/xcf/",$sxall);for($j=0;$j<=count($b);$j++){if(check_in($sx1arr[$i],$b[$j])){echo str_replace($sx1arr[$i].":","",$b[$j])." ";}}?> </em>
</li>
<? }?>
					
					
					
						<li style="width:34%">
							<cite>移动端</cite><em><? if($row[mobile]==0){?>无<? }?><? if($row[mobile]==1){?>Wap<? }?><? if($row[mobile]==2){?>App<? }?><? if($row[mobile]==3){?>Wap+App<? }?><? if($row[mobile]==4){?>自适应<? }?></em>
						</li>
						<li>
							<cite>大小</cite><em><?=$row[sizes]?>MB</em>
						</li>
						<li>
							<cite>刷新</cite><em><?=dateYMD($row[lastsj])?></em>
						</li>
						<li>
							<cite>授权</cite><em>互买宝担保</em>
						</li>
						<li style="width:34%">
							<cite>源文件</cite><em>卖家主动说明</em>
						</li>
					</ul>
				</ul>
				
				<div class="c_r_tit">
					<i class="iconfont"></i><b>安装环境</b>
				</div>
				<ul class="c_r_par">
					<ul>
						<li style="width:43.9%">
							<cite>安装服务</cite><em><? if($row[azsf]==0){?><font style='color:#008000;'>免费</font><? }?>
<? if($row[azsf]==1){?><font style='color:#f00;letter-spacing:1px;'>￥<?=$row[anzhuang]?></font><font color='#999999' style='letter-spacing:0;'>（需额外支付）<? }?></font><a class="installing red" href="javascript:void();" onclick="anzhuang(1,<?=$row[id]?>)"  style='letter-spacing:0;'>【安装说明】</a></em></em>
						</li>
						<li style="width:56.1%">
							<cite>主机类型</cite><em><?=$row[azzj]?></em>
						</li>
						<li style="width:43.9%">
							<cite>伪静态</cite><em><? if($row[azwjt]==1){?>不需要<? }?><? if($row[azwjt]==2){?>需要<? }?></em>
						</li>
						<li style="width:56.1%">
							<cite>操作系统</cite><em><?=$row[azxt]?></em>
						</li>
						<li style="width:43.9%">
							<cite>安装方式</cite><em><?=$row[azfs]?></em>
						</li><li style="width:56.1%">
							<cite>web服务</cite><em><?=$row[azhj]?></em>
						</li>
			
											</ul>
				</ul>
				<div class='c_r_tit cdes'>
					<i class='iconfont'>&#xe6aa;</i><b>商品介绍</b>
								</div>

				
				
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
				
				
				</p>			</div>
		</div>
		<!--正文结束-->
	<div class="g_box">	
<div class="c_r_cap dan" id="c_bb">
<em>&nbsp;&nbsp;&nbsp;交易评价</em>
<ul class="c_r_page s_ajax_page">
<a class="gopage">商品综合评分<strong class="g_ac0_h"><?=round(($row[pf1]+$row[pf2]+$row[pf3])/3,2)?></strong>分</a>
 </ul>
 </div>
 <div class="c_r_rev" id="code_pg_scTop">
 

 <? 
 while1("*","epzhu_propj where probh='".$row[bh]."' order by sj desc limit 10");while($row1=mysql_fetch_array($res1)){
 $usertx="../upload/".$row1[userid]."/user.jpg";
 if(!is_file($usertx)){$usertx="../user/img/nonetx.gif";}else{$usertx=$usertx."?id=".rnd_num(1000);} 
 $sqlpro="select * from epzhu_pro where bh='".$row1[probh]."'";
 mysql_query("SET NAMES 'GBK'");
 $respro=mysql_query($sqlpro);
 $rowpro=mysql_fetch_array($respro);
 $sj=date("Y-m-d H:i:s");
 $nowmoney=returnyhmoney($rowpro[yhxs],$rowpro[money2],$rowpro[money3],$sj,$rowpro[yhsj1],$rowpro[yhsj2],$rowpro[id]);
 if($row1[pjlx]==1){$ico='good';}elseif($row1[pjlx]==2){$ico='normal';}elseif($row1[pjlx]==3){$ico='bad';}
 ?>
 <ul>
 
 

 
<li class="l1"><img class="avatar" src="<?=$usertx?>"><br><?=mb_substr(returnnc($row1[userid]),0,2);?>***<?=mb_substr(returnnc($row1[userid]),-2,2);?><br><? $pf=round(($row1[pf1]+$row1[pf2]+$row1[pf3])/3,2);$userxy1=returnxy($row1[userid],2);?><img title="买家信用值<?=$userxy1?>" src="../img/dj/<?=returnxytp($userxy1)?>" /></li>
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
<? while2("*","epzhu_tp where bh='".$row1[orderbh]."' order by xh asc");while($rowt=mysql_fetch_array($res2)){$tp="../".str_replace(".","-1.",$rowt[tp]);?>
<a href="../<?=$rowt[tp]?>" target="_blank"><img src="<?=$tp?>" width="50" height="50" /></a>&nbsp;&nbsp;<? }?><br><?=$row1[sj]?>
<? while2("*","epzhu_tp where bh='".$row1[orderbh]."' order by xh asc");while($rowt=mysql_fetch_array($res2)){$tp="../".str_replace(".","-1.",$rowt[tp]);?>&nbsp;&nbsp;<? }?>	
<? if(!empty($row1[hf])){?><div class="hfcon"> <div class="j-border"></div>
<div class="j-background"></div><span><p class="tit" style="color:#e74851">卖家回复：</p><?=$row1[hf]?><p class="gray"></p></span></p></div><? }?>
</span>
	</div>
		</div>
		</li>
		</ul>					
<? }?>					
</div></div>

		<!--评价结束-->
		<div class='g_box'>
			<div class="c_r_cap dan" style="margin-top:-1px;" id="c_cc">&nbsp;&nbsp;&nbsp;交易规则</div>
			<div class="s_flow">
				<dl>
					<dt><span>交易流程</span></dt>
					<dd><img src="static/picture/code_flow1.png" /></dd>
				</dl>
				<dl>
					<dt><span>发货方式</span></dt>
					<dd>
						<p>1、<strong>自动：</strong>在上方保障服务中标有自动发货的商品，拍下后，将会自动收到来自卖家的商品获取（下载）链接；</p>
						<p>2、<strong>手动：</strong>未标有自动发货的的商品，拍下后，卖家会收到邮件、短信提醒，也可通过QQ或订单中的电话联系对方。</p>
					</dd>
				</dl>
				<dl>
					<dt><span>交易周期</span></dt>
					<dd>
						<p>1、源码默认交易周期：自动发货商品为1天，手动发货商品为3天，买家有1次额外延长3天交易周期的权利；</p>
						<p>2、若上述交易周期双方依然无法完成交易，任意一方可发起追加周期（1~60天）的请求，对方同意即可延长。</p>
					</dd>
				</dl>
				<dl>
					<dt><span>退款说明</span></dt>
					<dd>
						<p>1、<strong>描述：</strong>源码描述(含标题)与实际源码不一致的（例：描述PHP实际为ASP、描述的功能实际缺少、版本不符等）；</p>
						<p>2、<strong>演示：</strong>有演示站时，与实际源码小于95%一致的（但描述中有"不保证完全一样、有变化的可能性"类似显著声明的除外）；</p>
						<p>3、<strong>发货：</strong>手动发货源码，在卖家未发货前，已申请退款的；</p>
						<p>4、<strong>安装：</strong>免费提供安装服务的源码但卖家不履行的；</p>
						<p>5、<strong>收费：</strong>额外收取其他费用的（但描述中有显著声明或双方交易前有商定的除外）；</p>
						<p>6、<strong>其他：</strong>如质量方面的硬性常规问题等。</p>
						<p><strong style='color:#f60'>注：经核实符合上述任一，均支持退款，但卖家予以积极解决问题则除外。</strong></p>
					</dd>
				</dl>
				<dl>
					<dt><span>注意事项</span></dt>
					<dd>
						<p>1、源站会对双方交易的过程及交易商品的快照进行永久存档，以确保交易的真实、有效、安全！</p>
						<p>2、源站无法对如“永久包更新”、“永久技术支持”等类似交易之后的商家承诺做担保，请买家自行鉴别；</p>
						<p>3、在源码同时有网站演示与图片演示，且站演与图演不一致时，默认按图演作为纠纷评判依据（特别声明或有商定除外）；</p>
						<p>4、在没有"无任何正当退款依据"的前提下，商品写有"一旦售出，概不支持退款"等类似的声明，视为无效声明；</p>
						<p>5、在未拍下前，双方在QQ上所商定的交易内容，亦可成为纠纷评判依据（商定与描述冲突时，商定为准）；</p>
						<p>5、因聊天记录可作为纠纷评判依据，故双方联系时，只与对方在源站上所留的QQ、手机号沟通，以防对方不承认自我承诺。</p>
						<p>7、虽然交易产生纠纷的几率很小，但一定要保留如聊天记录、手机短信等这样的重要信息，以防产生纠纷时便于源站介入快速处理。</p>
					</dd>
				</dl>
				<dl>
					<dt><span>源站声明</span></dt>
					<dd>
						<p>1、源站作为第三方中介平台，依据交易合同（商品描述、交易前商定的内容）来保障交易的安全及买卖双方的权益；</p>
						<p>2、非平台线上交易的项目，出现任何后果均与源站无关；无论卖家以何理由要求线下交易的，请联系管理举报。</p>
					</dd>
				</dl>
			</div>
		</div>
	</div>
	<!--右边--><? $xy=returnjgdw($rowsell[xinyong],"",returnxy($row[userid],1));?>
	<div class="g_side right">
		<div class="c_g_inf g_box">
			<ul class="c_g_sell">
				<img class="c_s_tx tipss" t-bg='#fff' title='<?=$rowsell[shopname]?>' src="../upload/<?=$row[userid]?>/shop.jpg" width="35" height="35" />
				<span class="c_s_name"><p ><?=$rowsell[shopname]?></p><img class='xy' src='../img/dj/<?=returnxytp($xy)?>' title='信用值<?=$xy?>'></span>
			</ul>
			<ul class="c_s_info">
		
				<li class="certification"><span>商家认证：</span>
				<? if(1==$rowsell[ifmot]){?><i class="phone success" title="已通过手机认证"></i><? }else{?><i class="phone successs" title="未通过手机认证"></i><? }?>
<? if(1==$rowsell[ifemail]){?><i class="success" title="已通过邮箱认证"></i><? }else{?><i class="successs" title="未通过邮箱认证"></i><? }?>
<? if(1==$rowsell[sfzrz]){?><i class="idcard success" title="已通过身份认证"></i><? }else{?><i class="idcard successs" title="未通过身份认证"></i><? }?>
<!--<? if($rowsell[baomoney]>0){?><i class="company" title="已缴纳保证金"></i></li><? }?>-->	</li>
			</ul>
			<ul class="tit">
				<i class="iconfont" style='font-size:18px;font-weight:normal;'>&#xe62f;</i> 联系卖家
			</ul>
			
			
			
			<ul class="c_s_cont" >
<span class="uim">
<div class="qq" title="联系QQ"><p><?=returnqq($row[userid])?></p></div>
<? if($rowsell[weixin]){?><div class="wechat" title="联系微信"><p><?=$rowsell[weixin]?></p></div><? }?>
<? if($rowsell[mot]){?><div class="phone" title="联系电话"><p><?=$rowsell[mot]?></p></div><? }?></span></ul>
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
							<a href="../shop/view<?=$rowsell[id]?>.html">
							  <i class="iconfont va-1">&#xe61d;</i><span>进店逛逛</span>
							</a>
							<a  href="../user/favshop.php" class="collection imfav">
							  <i class="iconfont">&#xe61c;</i><span>收藏店铺</span>
							</a>
			</ul>
		<ul>
<? if($rowsell[baomoney]>0){?>
<a class="bond_info" target="_blank" href="<?=weburl?>user/baomoney1.php"><i class="iconfont va-1"></i>商家已缴纳保证金<em class="orange va-1"><strong><?=sprintf("%.2f",$rowsell[baomoney])?></strong></em>元</a>
</ul>
<? }?>
		</div>

		<div class='g_box'>
			<div class="c_l_cap">&nbsp;&nbsp;&nbsp;	店内搜索</div>
			<div class="shop_search Search-box">
				<li class='gradio'>商品：<label class='tips' T-bg='#ff8400' title='本店共有<b>源码</b>(6)个'><input checked type='radio' name='good_type' value='/ishop19941/code/'>源码</label><label class='tips' T-bg='#ff8400' title='本店共有<b>域名</b>(1)个'><input  type='radio' name='good_type' value='/ishop19941/domain/'>域名</label></li>
				<li>搜索：<input type="text" class='inp Search-inp' value id='shop_key' placeholder="店内搜索" name="key" style='width:125px;'/> </li>
				<li>价格：<input name="am" class='inp Search-inp' placeholder='￥' type="text" /> - <input name="dm" class='inp Search-inp' placeholder='￥' type="text" /> </li>
				<li><input type="button" id='shop_search' class='Search-btn btn' value="搜 索" /> </li>
			</div>
		</div>
		<div class='g_box'>
			<div class="c_l_cap">&nbsp;&nbsp;&nbsp;本店销量榜</div>
			<DIV class="c_l_hol" id="code_hot">
			 <dl class="dropList-hover">
			 <? 
	 $i=1;
	 while1("*","epzhu_type where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1));
     while1("*","epzhu_pro where userid=".$row[userid]." and zt=0 and ifxj=0 order by xsnum desc limit 10");while($row1=mysql_fetch_array($res1)){$tp="../".returntp("bh='".$row1[bh]."' order by xh asc","-2");
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
			
			
			
			  			  </DIV>
			  


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
<div class="yizhanw"> <div class="yizhanw2"><? include("../tem/bottom--.html");?></div> </div>


</body> 
</html>