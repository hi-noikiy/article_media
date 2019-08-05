<?
include("../config/conn.php");//二次-开发-联系QQ:1200-36745
include("../config/functionwz.php");
include("../config/xy.php");
$sj=date("Y-m-d H:i:s");
$getstr=$_GET[str];
//已有标签 a b c d e f g h i j k l m p s
$tit="商品列表";
$ses=" where zt=0 and ifxj=0";
$ty1id=returnsx("j");if($ty1id!=-1){
 $sqlty1="select * from epzhu_typewz where admin=1 and id=".$ty1id;mysql_query("SET NAMES 'GBK'");$resty1=mysql_query($sqlty1);$rowty1=mysql_fetch_array($resty1);
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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="keywords" content="<?=$seokey?>">
<meta name="description" content="<?=$seodes?>">
<title><?=$tit?> - <?=webname?></title>
<link href="static/css/basic.css" rel="stylesheet" type="text/css" /><script language="javascript" src="static/js/jquery.m.js"></script><script language="javascript" src="static/js/layui.js"></script><script language="javascript" src="static/js/common.js"></script><script language="javascript" src="static/js/market.js"></script><link href="static/css/market.css" rel="stylesheet" type="text/css" /><script language="javascript" src="static/js/tipso.min.js"></script></head>
<body>
<div class="header">





<? include("../tem/top---.html");?>

<script language="javascript">topjconc(1,'商品');document.getElementById("topt").value="<?=$skey?>";</script>
	<div class="general">
		<div class="main">
					<a class="logo" href="/">
				<img src="static/picture/t_l.png" class="top-zl">
			</a>
			<li class="search Search-box" onmouseover="topover()" onmouseout="topout()">
	<span class="searchtype">搜源码</span><i></i>
	<form name="topf1" method="post" onsubmit="return topftj()">
	<input  name="topt" id="topt" type="text" class="searchval Search-inp"/>
	<input type="image" src="<?=weburl?>homeimg/so.png" class="searchbtn Search-btn">
	<ul class="searchlist" style="display:none;"> 
	<li data='serve'>  <a href="javascript:void();" onclick="topjconc(1,'搜源码')">搜源码</a></li>
	<li data='domain'> <a href="javascript:void();" onclick="topjconc(2,'搜开发')">搜开发</a></li> 
   <li data='domain1'> <a href="javascript:void();" onclick="topjconc(10,'搜美工')">搜美工</a></li> 
	

    </ul>
    </form>
    </li>	
			
			  <li class="t_ads">
    <? adread("ADI05",235,60)?>
    </li>
		</div>
	</div>
<style>
</style>
	<div class="head-nav">

	
	
	
		<div class="main">
					<div class="nav-link">
					<li class="left">
						<a href="/">首页</a><a href="/code/search_j37v.html" class="bold ">源码集市</a><a href="/serve/search_j208v.html" class="bold  ">服务市场</a><a href="/web/search_j213v.html" class="bold  cur">网站寄售</a><a href="/productym/search_j236v.html" class="">域名交易</a><a href="/task/" class="">任务大厅</a>					</li>
					<li class='right'>
						<a href="<?=weburl?>shop/">商家</a> <a href="<?=weburl?>#">排行</a> <a href="<?=weburl?>#">品牌</a>  <a href="#" target="_blank">博客</a>  <a href="http://www.epzhu.com" target="_blank">社区</a> 
						 <div class="clear"></div>
					</li>
				</div>
		</div>
	</div>
</div>
<div class="main rowElem">
<!--列表开始-->
<div class="list_left">
<!--左边开始-->
<style>

</style>
	<div class="screen_box">
		<div class="screen_switch">
			<div class='screen_alink'>
				<a class="curr">
					<i class='web'></i>
					<span>网站出售</span>
				</a>
				<div class='line'></div>
				<a href="#/">
					<i class='web'></i>
					<span>官方代售</span>
				</a>
				<div class='line'></div>
				<a href='#'>
					<i></i>
					<span>网站求购</span>
				</a>
			</div>
			<div class='screen_count'>
				当前共有<span id="jgcount"></span>个网站
			</div>
		</div>	
		<? if($ty1id!=-1){?>
		<div class="screen_on"><h3>筛选条件：</h3><cite>
		
		<? if($ty1id!=-1){?>
<a href="./" class=""><?=$ty1name?></a>
 <? }?>
 
 <? if($ty2id!=-1){?>
<a href="search_j<?=$ty1id?>v.html" class=""><?=$ty2name?></a>
 <? }?>
 
 <? if($ty3id!=-1){?>
<a href="search_j<?=$ty1id?>v_k<?=$ty2id?>v.html" class=""><?=$ty3name?></a>
 <? }?>
 
 <? if($ty4id!=-1){?>
<a href="search_j<?=$ty1id?>v_k<?=$ty2id?>v_m<?=$ty3id?>v.html" class=""><?=$ty4name?></a>
 <? }?>
 
 <? if($ty5id!=-1){?>
<a href="search_j<?=$ty1id?>v_k<?=$ty2id?>v_m<?=$ty3id?>v_i<?=$ty4id?>v.html" class=""><?=$ty5name?></a>
 <? }?>
 
 <? 
 for($si=0;$si<count($sbarr);$si++){
  $tsx=returnsx($sbarr[$si]);
  if($tsx!=-1){
   while1("*","epzhu_typesxwz where id=".$tsx);if($row1=mysql_fetch_array($res1)){
   if($row1[admin]==2){
 ?>
<a href="<?=rentser($sbarr[$si],'','','','search');?>" class=""><?=$row1[name1]."：".$row1[name2]?></a>
 <? }}}}?>
 
 <? 
 if(returnsx("b")!=-1 || returnsx("c")!=-1){ 
  if(returnsx("c")!=-1 && returnsx("b")!=-1){$tjv=returnsx("b")."-".returnsx("c")."元";}
  elseif(returnsx("c")==-1){$tjv=returnsx("b")."元以上";}
  elseif(returnsx("b")==-1){$tjv=returnsx("c")."元以下";}
 ?>
<a href="<?=rentser('b','','c','','search');?>" class=""><?=$tjv?></a>
 <? }?>
 
 <? if($skey!=""){?>
<a href="<?=rentser('s','','','','search');?>" class=""><?=$skey?></a>
 <? }?>
 
 <? if($ifys==1){?>
<a href="<?=rentser('a','','','','search');?>" class="">有演示站</a>
 <? }?>
 
 <? if($ifzdfh==1){?>
<a href="<?=rentser('d','','','','search');?>" class="">自动发货</a>
 <? }?>
		
		</cite><a href="/web/" class="icons del_screen">清除筛选</a></div> <? }?>
				<div class="screen_lists">
				
				
				
		<div class='screen_list'>
		
		<div class='screen_name'><i id='isx-151'></i><span>类型</span>：</div>
		<div class='screen_con'>
		 <? while1("*","epzhu_typewz where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
		
		 <a href="search_j<?=$row1[id]?>v.html" <? if(check_in("_j".$row1[id]."v",$getstr)){?> class="screen_default"<? }else{?> class=""<? }?>><?=$row1[type1]?></a>
		 <? }?>
		
		</div></div>
		
		 
 <? if($ty1id!=-1){if(panduan("*","epzhu_typewz where admin=2 and type1='".$ty1name."'")==1){?>
<div class='screen_list'>
<div class='screen_name'><i id='isx-154'></i><span>分类</span>：</div>

<div class='screen_con'>
 <? while1("*","epzhu_typewz where admin=2 and type1='".$ty1name."' order by xh asc");while($row1=mysql_fetch_array($res1)){?>
 <a href="search_j<?=$ty1id?>v_k<?=$row1[id]?>v.html" <? if(check_in("_k".$row1[id]."v",$getstr) && check_in("_k".$row1[id]."v",$getstr)){?> class="screen_default"<? }else{?> class=""<? }?>><?=$row1[type2]?></a>
 <? }?>
 </div></div>
 <? }}?>
		
		
		
		 <? 
 $si=0;
 $sbarr=array();
 while1("*","epzhu_typesxwz where admin=1 and typeid=".$ty1id." and ifsel=1 order by xh asc");while($row1=mysql_fetch_array($res1)){
 $ev="e".$row1[id]."_";
 $sbarr[$si]=$ev;
 ?>
		
		<div class='screen_list'><div class='screen_name'><i id='isx-154'></i><span><?=$row1[name1]?></span>：</div><div class='screen_con'>
		
		
		<? while2("*","epzhu_typesxwz where admin=2 and name1='".$row1[name1]."' and typeid=".$row1[typeid]." order by xh asc");while($row2=mysql_fetch_array($res2)){?> <a href="<?=rentser($ev,$row2[id],'','');?>" <? if(check_in("_".$ev.$row2[id]."v",$getstr)){?> class="screen_default"<? }else{?> class=""<? }?>><?=$row2[name2]?></a>
 <? }?></div></div><? 
 $si++;
 }
 for($si=0;$si<count($sbarr);$si++){if(returnsx($sbarr[$si])!=-1){$nsx="xcf".returnsx($sbarr[$si])."xcf";$ses=$ses." and tysx like '%".$nsx."%'";}}
 ?>
		
		

		</div>
	</div>

	<div class="sort_box left" id='layer_top'>
		<dl class='sort_top'>
			<div class="sort_order left">
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
  <a href="<?=rentser('f',$p1s,'','');?>"<? if($pxv==-1 || $pxv==1){?> class="curr"<? }?>>综合</a>
  <a href="<?=rentser('f',$p2s,'','');?>"<? if($pxv==2 || $pxv==3){?> class="curr"<? }?>>销量</a>
  <a href="<?=rentser('f',$p3s,'','');?>"<? if($pxv==4 || $pxv==5){?> class="curr"<? }?>>人气</a>
  <a href="<?=rentser('f',$p4s,'','');?>"<? if($pxv==6 || $pxv==7){?> class="curr"<? }?>>价格</a>
							</div>
			<div class="sort_input left">
			<form name="f1" method="post" onSubmit="return psear('_j<?=$ty1id?>v_k<?=$ty2id?>v_m<?=$ty3id?>v_i<?=$ty4id?>v_l<?=$ty5id?>v')">
				<div class="sort_money">
					<ul>
						<li>
							<input name="money1" id="money1" value="<?=$mon1?>" type="text" />
						</li>
						<li class="sep">-</li>
						<li>
							<input name="money2" id="money2" value="<?=$mon2?>" type="text" />
						</li>
						<li>
							<button class="submit shopso" type="submit">确定</button>
						</li>
					</ul>
				</div>
				<div class="sort_search">
					<input name="ink1" value="<?=$skey?>" id="ink1" type="text" />
					<button class="submit shopso" type="submit">确定</button>
				</div>
				</div>
  </form>
			</div>
			
		</dl>
	
<? pagef($ses,20,"epzhu_prowz",$px);?>
  <? if(0==$rowcontrol[propx]){?>
	<div class="wlist">
		
		<div class="list_items">
		
		 <?
  $i=1;
  while($row=mysql_fetch_array($res)){
  $au="goods".$row[id].".html";
  while1("id,uqq,shopname","epzhu_user where id=".$row[userid]);$row1=mysql_fetch_array($res1);
  $tit=strgb2312($row[tit],0,60);
  if(!empty($skey)){$tit=str_replace($skey,"<span class='red'>".$skey."</span>",$tit);}
  $tp="../".returntp("bh='".$row[bh]."' order by xh asc","-1");
  ?>
		
		
								<dl>
					<dt>
								<em>￥<?=returnjgdian(returnyhmoney($row[yhxs],$row[money2],$row[money3],$sj,$row[yhsj1],$row[yhsj2],$row[id]))?></em>
								<span>
					<?=$row[ysweb]?></span>
					</dt>
						<dd>
						<div class="pic">
							<a href="<?=$au?>" target="_blank">
								<img src="<?=returntppd($tp,"../img/none180x220.gif")?>">
							</a>
							<div class='ly'>
								<span></span>
								<span class='cdes'><?=$row[tit]?></span>
								<cite>
									<a class='webinfo' href='<?=$au?>' target="_blank" title='直接浏览网站'><em>&#xe664;</em>查看详情</a>
									<? if(!empty($row[ysweb])){?><a href="<?=$row[ysweb]?>" target="_blank" class="weburl"><i></i>浏览网站</a><? }else{?><a  target="_blank" class="weburl"><i></i>无演示站<? }?></a>
									
								
								</cite>
							</div>
						</div><a class="tit" href="<?=$au?>" target="_blank">								<?=$row[tit]?>							</a>
						<?
  $a1="";
  $a2="none";
  if(!empty($myuserid)){
   if(panduan("*","epzhu_carwz where userid=".$myuserid." and probh='".$row[bh]."'")==1){$a1="none";$a2="";}
  }
  ?>
  <? while1("*","epzhu_user where id=".$row[userid]);$row1=mysql_fetch_array($res1);$xy=returnjgdw($row1[xinyong],"",returnxy($row[userid],1));?>
						<div class="info">
						
								<img class="pic_Layer tips" target="_blank"  T-fc='#333' T-bg='#fff' T-cr='#333' T-pos='right' T-bc='#ddd'  T-bw='3px' T-w='126'  title="<img src='../upload/<?=$row[userid]?>/shop.jpg' width=100 height=100><p style='line-height:16px;padding:8px 0 0 0'><b><?=returntitdian($row1[shopname],20)?></b></p>"  src="../upload/<?=$row[userid]?>/shop.jpg"/>
								 <cite class="left">信用值<?=$xy?> </cite>
								
								<cite class='right'>
								<em class="see_stats tips links" id="" title="点击查看该网站第三方统计" t-bg="#71a3f5">&#xe6b1;</em>		<cite class="note_icon left">
								<? if($row1[baomoney]){?><a class="tips" href="javascript:;" title='已加入消保，商家已缴纳保证金 <b style=color:#FCF302><?=$row1[baomoney]?>.00</b> 元' color="#FF7E00"><i class="protect">保</i></a><? }else{?><a class="tips"  href="javascript:;" _title='该商家没有加入保证金计划<br> &lt;b&gt;&lt;/b&gt;详细测试再下单' color="#FF7E00"><i>保</i></a><? }?>
					</cite>										
								</cite>
						</div>
					</dd>
				 </dl>
				   <? $i++;}?>
				 
				 
		</div>	
		
	</div>
 
	<? }?> 
  <div class="npa">
  <?
  $nowurl="search";
  $nowwd="";
  require("../tem/page.html");
  ?>	</div>	</div>
	<div class='list_right'>
		<div class="lrtop">
			<div class="lrtop_help">
				<dl class='tit'>
					<cite>
					<a class="curr">买家帮助</a>
					<a class="">卖家帮助</a>
					</cite>
				</dl>
				<dl class="post">
					<div>
						<a class="curr"><em><i class='iconfont'>&#xe6de;</i></em><p>如何购买</p></a>
						<a class=""><em><i class='iconfont'>&#xe6df;</i></em><p>如何收货</p></a>
						<a class=""><em><i class='iconfont' style='font-size: 28px;line-height: 33px;'>&#xe818;</i></em><p>交易流程</p></a>
					</div>
					<div class='hide'>
							<a class="curr"><em><i class='iconfont'>&#xe6de;</i></em><p>如何出售</p></a>
							<a class=""><em><i class='iconfont'>&#xe6df;</i></em><p>如何发货</p></a>
							<a class=""><em><i class='iconfont' style='font-size: 28px;line-height: 33px;'>&#xe818;</i></em><p>交易规则</p></a>
					</div>
				</dl>	
			</div>
			<div class='lrtop_help' style='padding:18px 0;'>
				<a href='#' target='_blank'><img src='static/picture/ds.gif'></a>
			</div>
			<div class='lrtop_xu'>
				<dl class='tit'>
					<em></em> <span>网站需求</span>
				</dl>
				<dl class="box scroll-box" times='3000' items='3'>
					<ul>
					<? 
 $i=1;
 while0("*","epzhu_prowz where ifxj=0 and zt=0 order by lastsj desc limit 5");while($row=mysql_fetch_array($res)){
 if($i % 5==0){$nc=" u0";}else{$nc="";}
 $au="/web/goods".$row[id].".html";
 $money1=returnjgdian(returnyhmoney($row[yhxs],$row[money2],$row[money3],$sj,$row[yhsj1],$row[yhsj2],$row[id]));
 $tp="../".returntp("bh='".$row[bh]."' order by xh asc","-1");
 ?>
 <li>
								<a href="<?=$au?>" target="_blank" title='<?=strgb2312($row[tit],0,30)?>'>
									<i><?=$row2[shopname]?></i><b>￥<?=$money1?></b> 
									<div><?=strgb2312($row[tit],0,30)?></div>
								</a>
						</li>
						<? $i++;}?>
						
					</ul>
				</dl>
				<dl class='post'><a href='/reg/reg.php' target="_blank"><i class='icons i-post'></i><span>发布网站</span></a><a href='#' target="_blank"><i class='icons i-all'></i><span>全部网站</span></a></dl>
			 </div>
		</div>
	</div>	
</div><? include("../tem/bottom--.html");?>
<div class="fixed-right">
	<div class="fixed-main">
		<div class="fixed-right-bg"></div>
		<div class="fixed-tab">
			<div class="fixed-tab-top">
				<cite data-click="my" data-rtime="0" class="click-cite curr">
					<a class="i"><i class="fi-my"></i><p>我的</p></a>
					<div class="i-bg"></div><div class="i-bgy"></div>
				</cite>
				<cite data-click="pay" data-rtime="0" class="click-cite">
					<a class="i" href="/user/pay.php"><i class="fi-message"></i><p>充值</p>
						<span class="message-count">
													</span>
					</a>
					<div class="i-bg"></div><div class="i-bgy"></div>
				</cite>
				<cite data-click="browse" data-rtime="0" class="click-cite">
					<a class="i" href="/user/paylog.php"><i class="fi-browse"></i><p>账目</p></a>
					<div class="i-bg"></div><div class="i-bgy"></div>
				</cite>
				<cite data-click="cart" data-rtime="0" class="click-cite">
					<a class="i" href="/user/car.php"><i class="fi-cart"></i><p>购<br>物<br>车</p>
						<span class="cart-count">
													</span>
					</a>
					<div class="i-bg"></div><div class="i-bgy"></div>
				</cite>
				<!--
				<cite data-click="message" data-rtime="0" class="click-cite">
					<a class="i"><i class="fi-message"></i><p>消息</p>
						<span class="message-count">
													</span>
					</a>
					<div class="i-bg"></div><div class="i-bgy"></div>
				</cite>
				<cite data-click="browse" data-rtime="0" class="click-cite">
					<a class="i"><i class="fi-browse"></i><p>足迹</p></a>
					<div class="i-bg"></div><div class="i-bgy"></div>
				</cite>
				<cite data-click="cart" data-rtime="0" class="click-cite">
					<a class="i"><i class="fi-cart"></i><p>购<br>物<br>车</p>
						<span class="cart-count">
													</span>
					</a>
					<div class="i-bg"></div><div class="i-bgy"></div>
				</cite>-->
				</div><div class="fixed-tab-bottom simple-box">				<cite hover="1">
					<a class="i"><i class="fi-service"></i><p>客服</p></a>
					<div class="i-bg"></div>
					<div class="i-bgy"></div>
					<div class="fixed-hover-box fixed-service-box">
						<h3><b>源站官方客服</b></h3>
						<div class="fixed-service-list">
							<p><span>客服QQ：</span><a class="service-qq" href="http://wpa.qq.com/msgrd?v=3&uin=1-20036-745&site=http://www.yuanz.net/&menu=yes" target="_blank" title="联系客服QQ" rel="nofollow">
							1-20036-745</a></p>
							
							<p>
							<span>客服电话：</span>15080318771
							</p>
							<p>
							<span>客服邮箱：</span>hzywljs@163.com
							</p>
							<p class="gray">管理仅处理交易投诉、举报、帐号、资金等平台使用问题；<br>
							商品问题请咨询各商品详情页面中显示的商家客服QQ。</p>
						</div>
					</div>	
				</cite>
				<cite hover="1">
					<a class="i fixed-stretch"><i class="fi-stretch"></i></a>
					<div class="i-bg"></div>
					<div class="i-bgy"></div>
					<div class="fixed-hover-box fixed-stretch-box">
						<h3><em>正常模式</em><span>精简模式</span></h3>
					</div>	
				</cite>
							</div>			<div class="fixed-tab-gotop">
				<cite class="gotop" hover="1" style="display: none;">
					<a class="i"><i class="fi-gotop"></i></a>
					<div class="i-bg"></div>
					<div class="i-bgy"></div>
					<div class="fixed-hover-box fixed-gotop-box">
						<h3>返回顶部</h3>
					</div>
				</cite>
			</div>
		</div>
		<div class="fixed-click">
		 	
					
				
			
			<?
while0("*","epzhu_user where uid='".$_SESSION[SHOPUSER]."'");if(!$row=mysql_fetch_array($res))
createDir("../upload/".$row[id]."/");
if(empty($userdj)){
while1("*","epzhu_userdj where zt=0 order by xh asc");if($row1=mysql_fetch_array($res1)){$userdj=$row1[name1];}
}
$usertx="../upload/".$row[id]."/user.jpg";if(!is_file($usertx)){$usertx="img/nonetx.gif";}
?>
			<div class="fixed-click-box fixed-my-box  curr">
				<h3>
					<strong>我的信息</strong>
					<a class="refresh" data-time="" title="刷新（首页）"><i></i></a>
					<div class="action">
						<a class="logout" href="<?=weburl?>user/un.php">退出登录</a>
					</div>
				</h3>
				<div class="fixed-my fixed-list">
					<div class="fixed-list-bt"></div>
					<dt>
						<div id="sign"></div>
						<a href="<?=weburl?>user/" id="avatar"><img class="pic_Layer" id="idltx" src="/upload/<?=$row[id]?>/shop.jpg"></a>
						
					<span>
						<p id="name"><?=$row[nc]?></p>
						<p><em>余额：<a id="money" href="/user/paylog.php"><?=str_replace("-0.00","0",sprintf("%.2f",$row[money1]))?></a> 元</em></p>
						<p><em>积分：<a id="jifen" href="#"><?=$row[jf]?></a> 积分</em></p>
						</span>
					</dt>
					<dd>
						<a>
							<b>等待付款</b>
							<em id="buy-info-number"><?=returncount("epzhu_order where selluserid=".$row[id]." and ddzt='wpay'")?></em>
						</a>
						<a>
							<b>等待发货</b>
							<em id="buy-deal-number"><?=returncount("epzhu_order where selluserid=".$row[id]." and ddzt='wait'")?></em>
						</a>
						<a>
							<b>正在担保</b>
							<em id="sale-info-number"><?=returncount("epzhu_order where selluserid=".$row[id]." and ddzt='db'")?></em>
						</a>
						<a>
							<b>交易成功</b>
							<em id="sale-deal-number"><?=returncount("epzhu_order where selluserid=".$row[id]." and ddzt='suc'")?></em>
						</a>
					</dd>
					<nav>
						<a href="/user/pay.php" class="first"><i class="a-1"></i><p>充值</p>  </a>
						<a href="/user/tixian.php" class="first"><i class="a-2"></i><p>提现</p>  </a>
						<a href="/user/paylog.php" class="first"><i class="a-3"></i><p>账目</p> </a>
						<a href="/user/favpro.php" class="first"><i class="a-4"></i><p>收藏</p> </a>
						<a href="/user/zfmm.php"><i class="a-5"></i><p>安全</p> </a>
						<a href="/user/mobbd.php"><i class="a-6"></i><p>认证</p></a>
						<a href="/user/adlx1.php"><i class="a-7"></i><p>需求</p></a>
						<a href="/user/tasklist.php"><i class="a-8"></i><p>自助</p></a>
					</nav>
					<div class="fixed-list-bt"></div>
				</div>
			</div>
		</div>	
		<div class="fixed-loading" style="display: none;">
			<span><i></i></span>
		</div>	
	</div>
</div>
</body>
</html>