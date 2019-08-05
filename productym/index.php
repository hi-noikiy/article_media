<?
include("../config/conn.php");
include("../config/functionym.php");
include("../config/xy.php");
$sj=date("Y-m-d H:i:s");
$getstr=$_GET[str];
//已有标签 a b c d e f g h i j k l m p s
$tit="商品列表";
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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<div class="yjcode"><? adwhile("ADTOP");?></div>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="Pg-Type" content="domain">
<title><?=$tit?> - <?=webname?></title>
<meta name="keywords" content="<?=$seokey?>" />
<meta name="description" content="<?=$seodes?>" />
<link href="static/css/basic.css" rel="stylesheet" type="text/css" /><script language="javascript" src="static/js/jquery.m.js"></script><script language="javascript" src="static/js/layui.js"></script><script language="javascript" src="static/js/common.js"></script><script language="javascript" src="static/js/market.js"></script><link href="static/css/market.css" rel="stylesheet" type="text/css" /><script language="javascript" src="static/js/tipso.min.js"></script></head>
<body>
<div class="header">
<? include("../tem/top---.html");?>
<script language="javascript">topjconc(1,'商品');document.getElementById("topt").value="<?=$skey?>";</script>




<div class="general">
		<div class="main">
					<a class="logo" href="/">
				<img src="/picture/t_l.png" class="top-zl">
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
						<a href="/">首页</a><a href="/code/search_j37v.html" class="bold">源码集市</a><a href="/serve/search_j208v.html" class="bold ">服务市场</a><a href="/web/search_j213v.html" class="bold ">网站寄售</a><a href="/productym/search_j236v.html" class="bold cur">域名交易</a><a href="/task/" class="">任务大厅</a>					</li>
					<li class="right">
						<a href="/shop/">商家</a> <a href="/">排行</a> <a href="/">品牌</a>  <a href="//" target="_blank">博客</a>  <a href="/" target="_blank">社区</a> 
						 <div class="clear"></div>
					</li>
				</div>
		</div>
	</div>
</div>
<div class="main rowElem">
<!--列表开始-->
<!--左边开始-->
	<div class="screen_box">
		<div class="screen_switch">
			<div class='screen_alink'>
				<a class='curr'>
					<i class='domain'></i>
					<span>域名出售</span>
				</a>
				<div class='line'></div>
				<a href='/productym/search_j236v.html'>
					<i></i>
					<span>域名求购</span>
				</a>
			</div>
			<div class='screen_count'>
				当前共有<em id="jgcount"></em>个域名
			</div>
		</div>	<? if($ty1id!=-1){?>
		<div class="screen_on"><h3>筛选条件：</h3><cite>
		
		<? if($ty1id!=-1){?>
 <a href="./" class="g_ac0"><?=$ty1name?></a>
 <? }?>
 
 <? if($ty2id!=-1){?>
 <a href="search_j<?=$ty1id?>v.html" class="g_ac0"><?=$ty2name?></a>
 <? }?>
 
 <? if($ty3id!=-1){?>
 <a href="search_j<?=$ty1id?>v_k<?=$ty2id?>v.html" class="g_ac0"><?=$ty3name?></a>
 <? }?>
 
 <? if($ty4id!=-1){?>
 <a href="search_j<?=$ty1id?>v_k<?=$ty2id?>v_m<?=$ty3id?>v.html" class="g_ac0"><?=$ty4name?></a>
 <? }?>
 
 <? if($ty5id!=-1){?>
<a href="search_j<?=$ty1id?>v_k<?=$ty2id?>v_m<?=$ty3id?>v_i<?=$ty4id?>v.html" class="g_ac0"><?=$ty5name?></a>
 <? }?>
 
 <? 
 for($si=0;$si<count($sbarr);$si++){
  $tsx=returnsx($sbarr[$si]);
  if($tsx!=-1){
   while1("*","epzhu_typesxym where id=".$tsx);if($row1=mysql_fetch_array($res1)){
   if($row1[admin]==2){
 ?>
<a href="<?=rentser($sbarr[$si],'','','','search');?>" class="g_ac0"><?=$row1[name1]."：".$row1[name2]?></a>
 <? }}}}?>
 
 <? 
 if(returnsx("b")!=-1 || returnsx("c")!=-1){ 
  if(returnsx("c")!=-1 && returnsx("b")!=-1){$tjv=returnsx("b")."-".returnsx("c")."元";}
  elseif(returnsx("c")==-1){$tjv=returnsx("b")."元以上";}
  elseif(returnsx("b")==-1){$tjv=returnsx("c")."元以下";}
 ?>
<a href="<?=rentser('b','','c','','search');?>" class="g_ac0"><?=$tjv?></a>
 <? }?>
 
 <? if($skey!=""){?>
<a href="<?=rentser('s','','','','search');?>" class="g_ac0"><?=$skey?></a>
 <? }?>
 
 <? if($ifys==1){?>
<a href="<?=rentser('a','','','','search');?>" class="g_ac0">有演示站</a>
 <? }?>
 
 <? if($ifzdfh==1){?>
<a href="<?=rentser('d','','','','search');?>" class="g_ac0">自动发货</a>
 <? }?>
		
		
	</cite><a href="/domain/" class="icons del_screen">清除筛选</a></div><? }?>
				<div class="screen_lists">
				
				
				
		<div class='screen_list'><div class='screen_name'><i id='isx-67'></i><span>类型</span>：</div><div class='screen_con'>
		<? while1("*","epzhu_typeym where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
		<a href="search_j<?=$row1[id]?>v.html" <? if(check_in("_j".$row1[id]."v",$getstr)){?> class="screen_default"<? }else{?> class=""<? }?>><?=$row1[type1]?></a>
 <? }?>
		</div></div>
		
		
		<? if($ty1id!=-1){if(panduan("*","epzhu_typeym where admin=2 and type1='".$ty1name."'")==1){?>
		<div class='screen_list'><div class='screen_name'><i id='isx-75'></i><span><?=$ty1name?></span>：</div><div class='screen_con'>
		 <? while1("*","epzhu_typeym where admin=2 and type1='".$ty1name."' order by xh asc");while($row1=mysql_fetch_array($res1)){?>
 <a href="search_j<?=$ty1id?>v_k<?=$row1[id]?>v.html" <? if(check_in("_k".$row1[id]."v",$getstr) && check_in("_k".$row1[id]."v",$getstr)){?> class="screen_default"<? }else{?> class=""<? }?>><?=$row1[type2]?></a>
 <? }?>
		
		</div></div>
		 <? }}?>
		<? 
 $si=0;
 $sbarr=array();
 while1("*","epzhu_typesxym where admin=1 and typeid=".$ty1id." and ifsel=1 order by xh asc");while($row1=mysql_fetch_array($res1)){
 $ev="e".$row1[id]."_";
 $sbarr[$si]=$ev;
 ?>
		
		<div class='screen_list'><div class='screen_name'><i id='isx-82'></i><span style="letter-spacing:.1em;margin:0"><?=$row1[name1]?></span>：</div><div class='screen_con'>
		<? while2("*","epzhu_typesxym where admin=2 and name1='".$row1[name1]."' and typeid=".$row1[typeid]." order by xh asc");while($row2=mysql_fetch_array($res2)){?>
 <a href="<?=rentser($ev,$row2[id],'','');?>" <? if(check_in("_".$ev.$row2[id]."v",$getstr)){?> class="screen_default"<? }else{?> class=""<? }?>><?=$row2[name2]?></a>
 <? }?></div></div>
		 <? 
 $si++;
 }
 for($si=0;$si<count($sbarr);$si++){if(returnsx($sbarr[$si])!=-1){$nsx="xcf".returnsx($sbarr[$si])."xcf";$ses=$ses." and tysx like '%".$nsx."%'";}}
 ?>
		
	

		</div>
		<div class='alist_xu'>
		<div class='items'>
				<dl class='tit'>
					<h3>域名需求</h3>
					<cite class='post'><a href='/reg/' target="_blank"><i class='icons i-post'></i><span>发布需求</span></a><a href='/domain/' target="_blank"><i class='icons i-all'></i><span>全部需求</span></a></cite>
				</dl>
				<dl class="box scroll-box" times='3000' items='4'>
					<ul>
					<? 
 $i=1;
 while0("*","epzhu_proym where ifxj=0 and zt=0 order by lastsj desc limit 10");while($row=mysql_fetch_array($res)){
 if($i % 5==0){$nc=" u0";}else{$nc="";}
 $au="/domain/goods".$row[id].".html";
 $money1=returnjgdian(returnyhmoney($row[yhxs],$row[money2],$row[money3],$sj,$row[yhsj1],$row[yhsj2],$row[id]));
 $tp="../".returntp("bh='".$row[bh]."' order by xh asc","-1");
 ?>
					
					
											<li>
							<a href="<?=$au?>" target="_blank"><img src="../upload/<?=$row[userid]?>/shop.jpg" class='pic_Layer tips' target="_blank"  T-fc='#333' T-bg='#fff' T-cr='#333' T-pos='left' T-bc='#ccc'  T-bw='3px' T-w='126'  title="<img src='../upload/<?=$row[userid]?>/shop.jpg' width=100 height=100><p style='line-height:16px;padding:8px 0 0 0'><b><?=$row[shopname]?></b></p>" >
								<span title='<?=strgb2312($row[tit],0,30)?>'><b>￥<?=$money1?></b> 
								<?=strgb2312($row[tit],0,30)?>								</span>
							</a>
						</li><? $i++;}?>
											
										</ul>
									
				</dl>
			 </div>
			 <div class='line'></div>
		</div>
	</div>

	<div class="sort_box full-screen left" id='layer_top'>
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
				<span></span>
				<a href="javascript:void(0);" id="r" ><i class="icons"></i></a>
			 </div>
			
		</dl>
	</div> 	   <? pagef($ses,20,"epzhu_proym",$px);?>

				 
				
	<div class="alist">
	  <?
  $i=1;
  while($row=mysql_fetch_array($res)){
  $au="view".$row[id].".html";
  while1("id,uqq,shopname","epzhu_user where id=".$row[userid]);$row1=mysql_fetch_array($res1);
  $tit=strgb2312($row[tit],0,70);
  if(!empty($skey)){$tit=str_replace($skey,"<span class='red'>".$skey."</span>",$tit);}
  $tp="../".returntp("bh='".$row[bh]."' order by xh asc","-1");
  ?>
		 		
		 		
		 		 <dl>
			 <dt>
				 <em>[domian]</em>
				 <em style='color:#f60'>￥<?=returnjgdian(returnyhmoney($row[yhxs],$row[money2],$row[money3],$sj,$row[yhsj1],$row[yhsj2],$row[id]))?></em>
				 <a href="<?=$au?>" title="<?=$row[tit]?>" class='tit' target="_blank">
					<?=$tit?>			 </a>
					  <?
  $a1="";
  $a2="none";
  if(!empty($myuserid)){
   if(panduan("*","epzhu_carym where userid=".$myuserid." and probh='".$row[bh]."'")==1){$a1="none";$a2="";}
  }
  ?>
  <? while1("*","epzhu_user where id=".$row[userid]);$row1=mysql_fetch_array($res1);$xy=returnjgdw($row1[xinyong],"",returnxy($row[userid],1));?>
				 <cite class="note_icon">
				 <? if($row1[baomoney]){?><a class="tips" href="javascript:;" title='该商家已加入保证金计划<br>已缴纳 &lt;b&gt;<?=$row1[baomoney]?>&lt;/b&gt; 元保证金' color="#FCF302"><i class="protect">保</i></a><? }else{?><a class="tips" href="javascript:;" _title='该商家没有加入保证金计划<br> &lt;b&gt;&lt;/b&gt;详细测试再下单' color="#FF7E00"><i>保</i><? }?>
				 
				</cite>			 </dt>
			 <dd class='d1'>
				<img title="信用值<?=$xy?>" src="../img/dj/<?=returnxytp($xy)?>" /> </dd>
			 <dd class='d2'>
				 <a href="<?=$au?>" target="_blank" title='<?=dateYMD($row[lastsj])?>'><?=dateMD($row[lastsj])?></a>
			 </dd>
			 
			 <dd class="d3">
				<a href="/ishop<?=$row1[id]?>/" class="tipso_style" target="_blank" t-fc="#333" t-bg="#fff" t-bc="#fff" t-bs="0 0 16px 0 rgba(53,53,53,.2)" t-w="246px">
				<img class="pic_Layer"  src="../upload/<?=$row[userid]?>/shop.jpg" />
				</a>
			 </dd>
			 
			 
			 <dd class='d4'>
				 <a href="/ishop<?=$row1[id]?>/" target="_blank"><?=$row1[shopname]?></a>
			 </dd>
		 </dl>  <? $i++;}?>
		 		
		 	</div>
 
  <div class="npa">
  <?
  $nowurl="search";
  $nowwd="";
  require("../tem/page.html");
  ?></div></div>
<? include("../tem/bottom--.html");?>
</body>
</html>