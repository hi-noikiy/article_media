<?
include("../config/conn.php");
include("../config/functionkf.php");
include("../config/xy.php");
$sj=date("Y-m-d H:i:s");
$getstr=$_GET[str];
//已有标签 a b c d e f g h i j k l m p s
$tit="商品列表";
$ses=" where zt=0 and ifxj=0";
$ty1id=returnsx("j");if($ty1id!=-1){
 $sqlty1="select * from epzhu_typekf where admin=1 and id=".$ty1id;mysql_query("SET NAMES 'GBK'");$resty1=mysql_query($sqlty1);$rowty1=mysql_fetch_array($resty1);
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
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="keywords" content="<?=$seokey?>">
<meta name="description" content="<?=$seodes?>">
<title><?=$tit?> - <?=webname?></title>
<link href="static/css/basic.css" rel="stylesheet" type="text/css" /><script language="javascript" src="static/js/jquery.m.js"></script><script language="javascript" src="static/js/layui.js"></script><script language="javascript" src="static/js/common.js"></script><script language="javascript" src="static/js/market.js"></script><link href="static/css/market.css" rel="stylesheet" type="text/css" /><script language="javascript" src="static/js/tipso.min.js"></script></head>
<body>
<!--头部-->
<div class="header">

		<? include("../tem/top---.html");?>
		
		<div class="general">
		<div class="main">
					<a class="logo" href="/">
				<img src="/picture/t_l.png" class="top-zl">
			</a>
					<li class="search Search-box" onmouseover="topover()" onmouseout="topout()">
	<span class="searchtype">搜源码</span><i></i>
	<form name="topf1" method="post" onsubmit="return topftj()">
	<input  name="topt" id="topt" type="text" class="searchval Search-inp"/>
	<input type="image" src="<?=weburl?>homeimg/so.png">
	<ul class="searchlist" style="display:none;"> 
	<li data='serve'>  <a href="javascript:void();" onclick="topjconc(1,'搜源码')">搜源码</a></li>
	<li data='domain'> <a href="javascript:void();" onclick="topjconc(2,'搜开发')">搜开发</a></li> 
   <li data='domain1'> <a href="javascript:void();" onclick="topjconc(10,'搜美工')">搜美工</a></li> 
	

    </ul>
    </form>
    </li>	
			
			
			
					
	<li class="Quick-link" style="
    left: 0px;
">
                <a href="javascript:released('buy');" class="button">
                    <span>免费发布需求</span>
                    <i class="arrow"></i>
                </a>
                <p class="release_hover">
                    <a href="/task/taskadd.php">免费发布任务</a>
                    <a href="/user/productlx.php">源码交易发布<i class="rec-icon">荐</i></a>
                    <a href="/user/productlxkf.php">交易服务发布</a>
                </p>
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
						<a href="/">首页</a><a href="/product/" class="bold">源码集市</a><a href="/productkf/" class="bold cur">服务市场</a><a href="/productwz/" class="bold ">网站寄售</a><a href="/productym/" class="">域名交易</a><a href="/task/" class="">任务大厅</a>					</li>
					<li class="right">
						<a href="/shop/">商家</a> <a href="/">排行</a> <a href="/">品牌</a>  <a href="//" target="_blank">博客</a>  <a href="/" target="_blank">社区</a> 
						 <div class="clear"></div>
					</li>
				</div>
		</div>
	</div>
</div>
<script language="javascript">topjconc(1,'商品');document.getElementById("topt").value="<?=$skey?>";</script>

	
<style>
</style>
	


		
	
<div class="main rowElem">
<!--列表开始-->
<div class="list_left">
<!--左边开始-->
	<div class="screen_box">
		<div class="screen_switch">
			<div class='screen_alink'>
				<a class='curr'>
					<i class='serve'></i>
					<span>服务市场</span>
				</a>
				<div class='line'></div>
				<a href='/task/'>
					<i class='task'></i>
					<span>任务大厅</span>
				</a>
			</div>
			<div class='screen_count'>
				当前共有<em><span id="jgcount"></span></em>项服务
			</div>
		</div><? if($ty1id!=-1){?>
		<div class="screen_on"><h3>筛选条件：</h3>
		
		
		<cite>
		
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
   while1("*","epzhu_typesxkf where id=".$tsx);if($row1=mysql_fetch_array($res1)){
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
 <? }?></cite>
		
		
		<a href="/productkf/search_j208v.html" class="icons del_screen">清除筛选</a></div> <? }?>
				<div class="screen_lists">
				
				
		<div class='screen_list'>
		
		
		<div class='screen_name'><i id='isx-253'></i><span>类型</span>：</div><div class='screen_con'>
		<? while1("*","epzhu_typekf where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
		<a href="search_j<?=$row1[id]?>v.html" <? if(check_in("_j".$row1[id]."v",$getstr)){?> class="screen_default"<? }else{?> class=""<? }?>><?=$row1[type1]?></a>
 <? }?>
		</div>
		
		 <? if($ty1id!=-1){if(panduan("*","epzhu_typekf where admin=2 and type1='".$ty1name."'")==1){?>
		
			<div class='screen_name'><i id='isx-253'></i><span><?=$ty1name?></span>：</div><div class='screen_con'>
	 <? while1("*","epzhu_typekf where admin=2 and type1='".$ty1name."' order by xh asc");while($row1=mysql_fetch_array($res1)){?>
		<a href="search_j<?=$ty1id?>v_k<?=$row1[id]?>v.html" <? if(check_in("_k".$row1[id]."v",$getstr) && check_in("_k".$row1[id]."v",$getstr)){?>  class="screen_default"<? }else{?> class=""<? }?>><?=$row1[type2]?></a>
 <? }?>
		</div> <? }}?>
		
		<? if($ty2id!=-1){if(panduan("*","epzhu_typekf where admin=3 and type1='".$ty1name."' and type2='".$ty2name."'")==1){?>
		
			<div class='screen_name'><i id='isx-253'></i><span><?=$ty2name?></span>：</div><div class='screen_con'>
	 <? while3("*","epzhu_typekf where admin=3 and type1='".$ty1name."' and type2='".$ty2name."' order by xh asc");while($row3=mysql_fetch_array($res3)){?>
		<a href="search_j<?=$ty1id?>v_k<?=$ty2id?>v_m<?=$row3[id]?>v.html" <? if(check_in("_m".$row3[id]."v",$getstr)){?>  class="screen_default"<? }else{?> class=""<? }?>><?=$row3[type3]?></a>
 <? }?>
		</div> <? }}?>
		
				
	 <? if($ty3id!=-1){if(panduan("*","epzhu_typekf where admin=4 and type1='".$ty1name."' and type2='".$ty2name."' and type3='".$ty3name."'")==1){?>
		
			<div class='screen_name'><i id='isx-253'></i><span><?=$ty3name?></span>：</div><div class='screen_con'>
	<? while3("*","epzhu_typekf where admin=4 and type1='".$ty1name."' and type2='".$ty2name."' and type3='".$ty3name."' order by xh asc");while($row3=mysql_fetch_array($res3)){?>
		<a href="search_j<?=$ty1id?>v_k<?=$ty2id?>v_m<?=$ty3id?>v_i<?=$row3[id]?>v.html" <? if(check_in("_i".$row3[id]."v",$getstr)){?>  class="screen_default"<? }else{?> class=""<? }?>><?=$row3[type4]?></a>
 <? }?>
		</div> <? }}?>
		
			 <? if($ty4id!=-1){if(panduan("*","epzhu_typekf where admin=5 and type1='".$ty1name."' and type2='".$ty2name."' and type3='".$ty3name."' and type4='".$ty4name."'")==1){?>
		
			<div class='screen_name'><i id='isx-253'></i><span><?=$ty4name?></span>：</div><div class='screen_con'>
	<? while3("*","epzhu_typekf where admin=5 and type1='".$ty1name."' and type2='".$ty2name."' and type3='".$ty3name."' and type4='".$ty4name."' order by xh asc");while($row3=mysql_fetch_array($res3)){?>
		<a href="search_j<?=$ty1id?>v_k<?=$ty2id?>v_m<?=$ty3id?>v_i<?=$ty4id?>v_l<?=$row3[id]?>v.html" <? if(check_in("_l".$row3[id]."v",$getstr)){?>  class="screen_default"<? }else{?> class=""<? }?>><?=$row3[type5]?></a>
 <? }?>
 
 
 
		</div> <? }?>
		
		
		 <? 
 $si=0;
 $sbarr=array();
 while1("*","epzhu_typesxkf where admin=1 and typeid=".$ty1id." and ifsel=1 order by xh asc");while($row1=mysql_fetch_array($res1)){
 $ev="e".$row1[id]."_";
 $sbarr[$si]=$ev;
 ?>
		
			<div class='screen_name'><i id='isx-253'></i><span><?=$row1[name1]?></span>：</div><div class='screen_con'>
	<? while2("*","epzhu_typesxkf where admin=2 and name1='".$row1[name1]."' and typeid=".$row1[typeid]." order by xh asc");while($row2=mysql_fetch_array($res2)){?>
		<a href="<?=rentser($ev,$row2[id],'','');?>" <? if(check_in("_".$ev.$row2[id]."v",$getstr)){?>  class="screen_default"<? }else{?> class=""<? }?>><?=$row2[name2]?></a>
 <? }?>
 
 
 
		</div> <? }}?>
		
		
		
		</div>		</div>
	</div>

	<div class="sort_box left" id='layer_top'>
		<dl class='sort_top'>
		
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
			<div class="sort_order left">
			 <a href="<?=rentser('f',$p1s,'','');?>"<? if($pxv==-1 || $pxv==1){?> class="curr"<? }?>>
				综合</a>
				 <a href="<?=rentser('f',$p3s,'','');?>"<? if($pxv==4 || $pxv==5){?> class="curr"<? }?>>人气</a>
				 <a href="<?=rentser('f',$p2s,'','');?>"<? if($pxv==2 || $pxv==3){?> class="curr"<? }?>>销量</a>
				 
  <a href="<?=rentser('f',$p4s,'','');?>"<? if($pxv==6 || $pxv==7){?> class="curr"<? }?>>价格</a>
						
							</div>
			<div class="sort_input left">
				<div class="sort_money">
					<ul>
						<li>
							<input data='am' placeholder="￥" type="text" value="">
						</li>
						<li class="sep">-</li>
						<li>
							<input data='dm' placeholder="￥" type="text" value="">
						</li>
						<li>
							<button class="submit shopso" type="button">确定</button>
						</li>
					</ul>
				</div>
				<div class="sort_search">
					<input data="key" type="text" value="" id="keys">
					<button class="submit shopso" type="button">确定</button>
				</div>
			</div>
			<div class="sort_page right">
				<a href="javascript:void(0);" id='l'><i class="icons"></i></a>
				<span class="b">1</span>
				<span>/ 112</span>
				<a href="javascript:void(0);" id="r" ><i class="icons"></i></a>
			 </div>
			<div class="sort_checkbox"  style='padding:12px;'>
					<a onclick="location.href='#'" href="javascript:void(0);"><i class='icons'></i>消保赔付</a>
			</div>
		</dl>
	</div>   <? pagef($ses,20,"epzhu_prokf",$px);?>
  <? if(0==$rowcontrol[propx]){?>
	<div class="slist">
	
	
	  <?
  $i=1;
  while($row=mysql_fetch_array($res)){
  $au="view".$row[id].".html";
  while1("id,uqq,shopname","epzhu_user where id=".$row[userid]);$row1=mysql_fetch_array($res1);
  $tit=strgb2312($row[tit],0,60);
  if(!empty($skey)){$tit=str_replace($skey,"<span class='red'>".$skey."</span>",$tit);}
  $tp="../".returntp("bh='".$row[bh]."' order by xh asc","-1");
  ?>
								<ul> 
					<a href="<?=$au?>" class="imgOut_1" target="_blank">
						<img src="<?=returntppd($tp,"../img/none180x220.gif")?>">
					</a>
					<div class="fl">
						<li class='tit'>
							<a href="<?=$au?>" target="_blank" title="<?=$tit?>">
								<h3><?=$tit?></h3>
							</a>
							<span>付款人数 <?=$row[xsnum]?> 人</span>
						</li>
						 <?
  $a1="";
  $a2="none";
  if(!empty($myuserid)){
   if(panduan("*","epzhu_car where userid=".$myuserid." and probh='".$row[bh]."'")==1){$a1="none";$a2="";}
  }
  ?><? while1("*","epzhu_user where id=".$row[userid]);$row1=mysql_fetch_array($res1);$xy=returnjgdw($row1[xinyong],"",returnxy($row[userid],1));?>
						<li class='info'>
							<span>
							<a href="../shop/view<?=$row1[id]?>.html" class="list_seller tips tipso_style" target="_blank" t-fc="#333" t-bg="#fff" t-bc="#fff" t-bs="0 0 16px 0 rgba(53,53,53,.2)" t-w="246px"><img title="<?=returntitdian($row1[shopname],18)?>" src="../upload/<?=$row[userid]?>/shop.jpg" height="18" width="18"><img class="xy" src="../img/dj/<?=returnxytp($xy)?>" title="信用值<?=$xy?>"></a>
							</span>
						
						</li>
						<li class="pre">
							价格：<strong>￥<?=returnjgdian(returnyhmoney($row[yhxs],$row[money2],$row[money3],$sj,$row[yhsj1],$row[yhsj2],$row[id]))?></strong> 
						</li>
						<li>
							<a href='<?=$au?>' class="listBtn2" target="_blank">查看详情</a>
							<? if(!empty($row[ysweb])){?><a href="<?=$row[ysweb]?>" target="_blank" class="listBtn imfav"><i></i>查看演示</a><? }else{?><a  target="_blank" class="listBtn imfav"><i></i>无演示站<? }?></a>
						</li>
												<span class="note_icon">
												<? if($row1[baomoney]){?><a class="btn btn-warning btn-bao btn-diy" href="javascript:;" _title='该商家已加入保证金计划<br>已缴纳 &lt;b&gt;<?=$row1[baomoney]?>&lt;/b&gt; 元保证金' color="#FF7E00"><i class="protect">保</i></a><? }else{?>	<a href='javascript:;' class='tips' T-w='300' T-bg='#999' title='未加入消保，若交易失败（退款），无消保赔付' target=_blank><i>保</i></a>						<? }?>
												
												

					</div>

				</ul> 
				
				  <? $i++;}?>
				
				
				
			 
	</div>	  <? }?> 
 <div class="npa">
  <?
  $nowurl="search";
  $nowwd="";
  require("../tem/page.html");
  ?>
  </div> 	</div>
	<div class='list_right'>
		<div class="lrtop_adv"> <span></span>
		  <div>
			<h2></h2>
			<dl>
			  <dt>实名认证</dt>
			  <dd>商家实名验证，放心可靠！</dd>
			</dl>
			<dl class="ico1">
			  <dt>安全交易</dt>
			  <dd>互站全程担保，安全保障！
			</dl>
			<dl class="ico3">
			  <dt>全额退款</dt>
			  <dd>服务不能完成，全额退款！</dd>
			</dl>
			<dl class="ico2">
			  <dt>免交易费</dt>
			  <dd>买方无需支付交易手续费！</dd>
			</dl>
		  </div>
		</div>
		<div class="lrtop_settle">
			<cite>
				<div class="text">
					<em>服务商入驻</em>
					<div class="des">您的服务也想出现在这里？</div>
				</div>

				<a href="/reg/reg.php" class="btn J_widget-ruzhu" target="_blank"><span class='icons'></span><p>免费入驻</p></a>
			</cite>
			<dl>
				<em>找不到您需要的服务？</em>
				<ul>
					<li><span>1、</span>发布任务招标信息</li>
					<li><span>2、</span>商家主动参与竞标</li>
					<li><span>3、</span>自由选择最佳投标</li>
				</ul>
				<a href="#" class="ui-btn ui-btn-block ui-btn-large" target="_blank">立即发布任务</a>
			</dl>
		</div>

		<div class='right_rec'>
			<h3><span>掌柜推荐</span> <i class="ad_tips" title="广告推广信息">AD</i></h3>
			
			
 <? 
 $i=1;
 while0("*","epzhu_pro where ifxj=0 and zt=0 order by lastsj desc limit 5");while($row=mysql_fetch_array($res)){
 if($i % 5==0){$nc=" u0";}else{$nc="";}
 $au="/product/view".$row[id].".html";
 $money1=returnjgdian(returnyhmoney($row[yhxs],$row[money2],$row[money3],$sj,$row[yhsj1],$row[yhsj2],$row[id]));
 $tp="../".returntp("bh='".$row[bh]."' order by xh asc","-1");
 ?>
						
							<dl class='s'>
					<dt>
							<a href="<?=$au?>" target="_blank" class="pic">
								<img src="<?=returntppd($tp,"../img/none60x60.gif")?>">
							</a>
							<div class='ly'>
								<a href="<?=$au?>" target="_blank" >
									<span></span>
									<span class='cdes'><?=strgb2312($row[tit],0,30)?></span>
								</a>
								<cite>
									<a href="<?=$au?>" class="xq" target="_blank"><i class='icons'></i>查看详情</a><a href='<?=$au?>' target=_blank class='ys'><i class='icons'></i>无演示站</a>								</cite>
							</div>
						</dt>
						<dd>
						<a class='title' href="<?=$au?>" title="<?=strgb2312($row[tit],0,30)?>" target="_blank"><?=strgb2312($row[tit],0,36)?></a>
						<div class="info">
							<em>￥<strong><?=$money1?></strong></em>
							<p class="note_icon">
								<? if($row[fhxs]==1){?> <a class="tips tipso_style" t-bg="#999" href="javascript:;" title="手动发货商品，拍下后，卖家会收到待发货的邮件、短信提醒"><i>手</i></a><? }?>
					
	
	<? if($row[fhxs]==2){?><a  class='tips' href="javascript:;"  T-bg='#b68571' title="自动发货商品，拍下后，即可收到来自该商品的发货（下载）链接" color="#ffa800"><i class=send>自</i></a><? }?>
						    							
														
														
														    <? while1("*","epzhu_user where id=".$row[userid]);$row1=mysql_fetch_array($res1);$xy=returnjgdw($row1[xinyong],"",returnxy($row[userid],1));?>
	<? if($row[yysweb]){?><a T-bg='#999' title='收费安装(<?=$row[yysweb]?>),点击查看详细安装要求' class='installing tips'"><i class='install200'>安</i></a><? }?>
														
														<? while1("*","epzhu_user where id=".$row[userid]);$row1=mysql_fetch_array($res1);$xy=returnjgdw($row1[xinyong],"",returnxy($row[userid],1));?>
	<? if($row[yysweb]==0){?><a T-bg='#999' title='免费安装,点击查看详细安装要求' class='installing tips'"><i class='install200'>安</i></a><? }?>
														
														<? if($row1[baomoney]){?><a class='tips' T-w='300' title='已加入消保，商家已缴纳保证金 <b style=color:#FCF302><?=$row1[baomoney]?></b> 元保证金'><i class=protect>保</i></a><? }else{?><a cclass="tips tipso_style" t-w="300" t-bg="#999" target="_blank"><i>保</i></a><? }?>							</p>
						</div>
					</dd>
				</dl>     <? $i++;}?>
				
				
			
				</div>
	</div>	
</div><? include("../tem/bottom--.html");?>
</body>
</html>