<?
include("../config/conn.php");//二次-开发-联系QQ:1200-36745
include("../config/function.php");
include("../config/xy.php");
$sj=date("Y-m-d H:i:s");
$getstr=$_GET[str];
//已有标签 a b c d e f g h i j k l m p s
$tit="商品列表";
$ses=" where zt=0 and ifxj=0";
$ty1id=returnsx("j");if($ty1id!=-1){
 $sqlty1="select * from epzhu_type where admin=1 and id=".$ty1id;mysql_query("SET NAMES 'GBK'");$resty1=mysql_query($sqlty1);$rowty1=mysql_fetch_array($resty1);
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
<title> <?=$tit?> - <?=webname?></title>
<link href="/product/static/css/basic.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="/product/static/js/jquery.m.js"></script>
<script language="javascript" src="/product/static/js/layui.js"></script>
<script language="javascript" src="/product/static/js/common.js"></script>
<script language="javascript" src="/product/static/js/market.js"></script>
<link href="/product/static/css/market.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="/product/static/js/tipso.min.js"></script>

<script language="javascript">
userCheckses();
</script>
<script language="javascript" src="../js/js/basic.js"></script>
<script language="javascript" src="../js/js/index.js"></script>
<script language="javascript">idldl(1);</script>

	



 <!--[if IE 6]>
 <script src="../js/DD_belatedPNG_0.0.8a-min.js" type="text/javascript"></script> 
 <script type="text/javascript"> 
 DD_belatedPNG.fix('*'); 
 </script> 
 <![endif]-->
</head>
<body>
<!--头部-->

	<div class="header">
	
	
	
		<? include("../tem/top---.html");?>
<div class="general">
		<div class="main">
					<a class="logo" href="/">
				<img src="/picture/t_l.png" class="top-zl">
			</a>
						<li class="search Search-box">
				<span class="searchtype">
				    					<cite>源码&nbsp;&nbsp;</cite>
					<em class="arrow"></em>
					<ul class="searchlist"> 
					<li data-link="https://www.huzhan.com/code/" class="cur">源码&nbsp;&nbsp;</li><li data-link="https://www.huzhan.com/serve/">服务&nbsp;&nbsp;</li><li data-link="https://web.huzhan.com/">网站&nbsp;&nbsp;</li><li data-link="https://domain.huzhan.com/">域名&nbsp;&nbsp;</li><li data-link="https://task.huzhan.com/">任务&nbsp;&nbsp;</li><li data-link="https://www.huzhan.com/shop/">商家&nbsp;&nbsp;</li><li data-link="https://www.huzhan.com/brand/">品牌&nbsp;&nbsp;</li>					</ul>
				</span>
				<input name="" class="searchval Search-inp" type="text" placeholder="" x-webkit-speech="" x-webkit-grammar="bUIltin:search">
				<a href="javascript:void(0);" class="searchbtn Search-btn">搜 索</a>
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
						<a href="/">首页</a><a href="/product/" class="bold cur">源码集市</a><a href="/productkf/" class="bold ">服务市场</a><a href="/productwz/" class="bold ">网站寄售</a><a href="/productym/" class="">域名交易</a><a href="/task/" class="">任务大厅</a>					</li>
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
					<i class='code'></i>
					<span>源码出售</span>
				</a>
				<div class='line'></div>
				
			</div>
			<div class='screen_count'>
				当前共有<em><span id="jgcount"></span></em>个源码
			</div>
		</div>
<? if($ty1id!=-1){?>
		<div class="screen_on"><h3>筛选条件：</h3><cite> <? if($ty1id!=-1){?>
 <a href="search_j37v.html" class=""><?=$ty1name?></a>
 <? }?>     <? if($ty2id!=-1){?>
<a href="search_j<?=$ty1id?>v.html" class=""><?=$ty2name?></a>
 <? }?>
 
   

 
 <? if($ty3id!=-1){?>
 <span><a href="search_j<?=$ty1id?>v_k<?=$ty2id?>v.html" class=""><?=$ty3name?></a></span>
 <? }?>
 
 <? if($ty4id!=-1){?>
 <span><a href="search_j<?=$ty1id?>v_k<?=$ty2id?>v_m<?=$ty3id?>v.html" class=""><?=$ty4name?></a></span>
 <? }?>
 
 <? if($ty5id!=-1){?>
 <span><a href="search_j<?=$ty1id?>v_k<?=$ty2id?>v_m<?=$ty3id?>v_i<?=$ty4id?>v.html" class=""><?=$ty5name?></a></span>
 <? }?>
 
 <? 
 for($si=0;$si<count($sbarr);$si++){
  $tsx=returnsx($sbarr[$si]);
  if($tsx!=-1){
   while1("*","epzhu_typesx where id=".$tsx);if($row1=mysql_fetch_array($res1)){
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
 
 
 

 
 
 
 
 
 
 
 
 
 </cite>
 <a href="/product/" class="icons del_screen">清除筛选</a></div> <? }?> 
<div class="screen_lists">
<div class="screen_list"><div class="screen_name"><i id="isx-1"></i><span>分类</span>：</div>
		
		

		<div class="screen_con">
		 <a href="./"<? if($ty1id==-1){?> class="screen_default"<? }else{?> class=""<? }?>>不限</a>
		<? while1("*","epzhu_type where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
 <a href="search_j<?=$row1[id]?>v.html" <? if(check_in("_j".$row1[id]."v",$getstr)){?> class="screen_default"<? }else{?> class=""<? }?>><?=$row1[type1]?></a>
 <? }?>
</div>
		
		
		
	

		</div>
		 <? if($ty1id!=-1){if(panduan("*","epzhu_type where admin=2 and type1='".$ty1name."'")==1){?>
		<div class="screen_list"><div class="screen_name"><i id="isx-1"></i><span>类型</span>：</div>
		
		

		<div class="screen_con">
		 <? while1("*","epzhu_type where admin=2 and type1='".$ty1name."' order by xh asc");while($row1=mysql_fetch_array($res1)){?>
 <a href="search_j<?=$ty1id?>v_k<?=$row1[id]?>v.html" <? if(check_in("_k".$row1[id]."v",$getstr) && check_in("_k".$row1[id]."v",$getstr)){?> class="screen_default"<? }else{?> class=""<? }?>><?=$row1[type2]?></a>
 <? }?>
</div>
		
		
		
	

		</div>	 <? }}?>
	
 <? if($ty2id!=-1){if(panduan("*","epzhu_type where admin=3 and type1='".$ty1name."' and type2='".$ty2name."'")==1){?>
		
		<div class="screen_list"><div class="screen_name"><i id="isx-20"></i><span>品牌</span>：</div><div class="screen_con brand_list">
		 <? while3("*","epzhu_type where admin=3 and type1='".$ty1name."' and type2='".$ty2name."' order by xh asc");while($row3=mysql_fetch_array($res3)){?>
 <a href="search_j<?=$ty1id?>v_k<?=$ty2id?>v_m<?=$row3[id]?>v.html" <? if(check_in("_m".$row3[id]."v",$getstr)){?> class="screen_default"<? }else{?> class=""<? }?>><?=$row3[type3]?></a>
		
		 <? }?>
		
	</div></div>
		 <? }}?>
		
		<? if($ty3id!=-1){if(panduan("*","epzhu_type where admin=4 and type1='".$ty1name."' and type2='".$ty2name."' and type3='".$ty3name."'")==1){?>
		
		<div class="screen_list"><div class="screen_name"><i id="isx-33"></i><span>语言</span>：</div>
		
		
		
		<div class="screen_con">
		<? while3("*","epzhu_type where admin=4 and type1='".$ty1name."' and type2='".$ty2name."' and type3='".$ty3name."' order by xh asc");while($row3=mysql_fetch_array($res3)){?>
 <a href="search_j<?=$ty1id?>v_k<?=$ty2id?>v_m<?=$ty3id?>v_i<?=$row3[id]?>v.html" <? if(check_in("_i".$row3[id]."v",$getstr)){?> class="screen_default"<? }else{?> class=""<? }?>><?=$row3[type4]?></a>
		
	<? }?>		
		</div>	
		</div>
		
		 <? }}?>
		
		 <? if($ty4id!=-1){if(panduan("*","epzhu_type where admin=5 and type1='".$ty1name."' and type2='".$ty2name."' and type3='".$ty3name."' and type4='".$ty4name."'")==1){?>
		<div class="screen_list"><div class="screen_name"><i id="isx-37"></i><span style="letter-spacing:.1em;margin:0">数据库</span>：</div><div class="screen_con"><? while3("*","epzhu_type where admin=5 and type1='".$ty1name."' and type2='".$ty2name."' and type3='".$ty3name."' and type4='".$ty4name."' order by xh asc");while($row3=mysql_fetch_array($res3)){?>
		<a href="search_j<?=$ty1id?>v_k<?=$ty2id?>v_m<?=$ty3id?>v_i<?=$ty4id?>v_l<?=$row3[id]?>v.html" <? if(check_in("_l".$row3[id]."v",$getstr)){?> class="screen_default"<? }else{?> class=""<? }?>><?=$row3[type5]?></a>
 <? }?>
		
	</div></div>		 <? }}?>
	 <? 
 $si=0;
 $sbarr=array();
 while1("*","epzhu_typesx where admin=1 and typeid=".$ty1id." and ifsel=1 order by xh asc");while($row1=mysql_fetch_array($res1)){
 $ev="e".$row1[id]."_";
 $sbarr[$si]=$ev;
 ?>
 <div class="screen_list"><div class="screen_name"><i id="isx-37"></i><span><?=$row1[name1]?></span>：</div><div class="screen_con">

 <? while2("*","epzhu_typesx where admin=2 and name1='".$row1[name1]."' and typeid=".$row1[typeid]." order by xh asc");while($row2=mysql_fetch_array($res2)){?>
 
 <a href="<?=rentser($ev,$row2[id],'','');?>" <? if(check_in("_".$ev.$row2[id]."v",$getstr)){?> class="screen_default"<? }else{?> class=""<? }?>><?=$row2[name2]?></a>
 <? }?>
 </div> </div>
 <? 
 $si++;
 }
 for($si=0;$si<count($sbarr);$si++){if(returnsx($sbarr[$si])!=-1){$nsx="xcf".returnsx($sbarr[$si])."xcf";$ses=$ses." and tysx like '%".$nsx."%'";}}
 ?>

	
	</div>
 </div>
	
 
 

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
 
	<div class="sort_box left" id='layer_top'>
		<dl class='sort_top'>
			<div class="sort_order left">
								  <a href="<?=rentser('f',$p1s,'','');?>"<? if($pxv==-1 || $pxv==1){?> class="<?=$p1a?> curr"<? }?>>综合</a>
								 <a href="<?=rentser('f',$p3s,'','');?>"<? if($pxv==4 || $pxv==5){?> class="<?=$p3a?> curr"<? }?>>人气</a>
							<a href="<?=rentser('f',$p2s,'','');?>"<? if($pxv==2 || $pxv==3){?> class="<?=$p2a?> curr"<? }?>>销量</a>
								<a href="<?=rentser('f',$p4s,'','');?>"<? if($pxv==6 || $pxv==7){?> class="<?=$p4a?> curr"<? }?>>价格</a>
							</div><!--
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
			</div>-->
			<div class="sort_page right">
				<a href="javascript:void(0);" id='l'><i class="icons"></i></a>
				<span class="b">1</span>
				<span>/ 4330</span>
				<a href="javascript:void(0);" id="r" ><i class="icons"></i></a>
			 </div>
			<div class="sort_option right">
				
				<a title="网格模式" class='img curr' href="/prodcut/"><i class='icons'></i></a>
			</div>
		</dl><!---
		<dl class='sort_bottom'>
			<div class="sort_checkbox">
					<a onclick="location.href='/code/bond/1'" href="javascript:void(0);"><i></i>消保赔付</a>
					<a onclick="location.href='/code/install/1'" href="javascript:void(0);"><i></i>免费安装</a>
					<a onclick="location.href='/code/auto/1'" href="javascript:void(0);"><i></i>自动发货</a>
					<a onclick="location.href='/code/demo/1'" href="javascript:void(0);"><i></i>有演示站</a>
					<a onclick="location.href='/code/app/1'" href="javascript:void(0);"><i></i>含移动端</a>
					<a onclick="location.href='/code/integro/1'" href="javascript:void(0);"><i></i>积分抵价</a>
			</div>
			<div class='sort_select'>
		
					<dl data=""><dt><span>源文件</span><i></i></dt><dd><a data="" onclick="location.href='/code/'">不限</a><a data="1" onclick="location.href='/code/encrypt/1'" >完全开源</a><a data="2" onclick="location.href='/code/encrypt/2'" >部分加密</a><a data="3" onclick="location.href='/code/encrypt/3'" >全部加密</a></dd></dl><dl data=""><dt><span>授权</span><i></i></dt><dd><a data="" onclick="location.href='/code/'">不限</a><a data="1" onclick="location.href='/code/auth/1'" >免授权</a><a data="2" onclick="location.href='/code/auth/2'" >需要授权</a></dd></dl><dl data=""><dt><span>规格</span><i></i></dt><dd><a data="" onclick="location.href='/code/'">不限</a><a data="1" onclick="location.href='/code/spec/1'" >整站源码</a><a data="2" onclick="location.href='/code/spec/2'" >模块插件</a><a data="3" onclick="location.href='/code/spec/3'" >模板风格</a></dd></dl>			</div>
		</dl>-->
</div><? pagef($ses,20,"epzhu_pro",$px);?>
  <? if(0==$rowcontrol[propx]){?>
	<div class="clist">
		<div class="list_items">
		
		
		<?
  $i=1;
  while($row=mysql_fetch_array($res)){
  $au="view".$row[id].".html";
  while1("id,uqq,shopname","epzhu_user where id=".$row[userid]);$row1=mysql_fetch_array($res1);
  $tit=strgb2312($row[tit],0,60);
  if(!empty($skey)){$tit=str_replace($skey,"<span class='red'>".$skey."</span>",$tit);}
  $tp="../".returntp("bh='".$row[bh]."' order by xh asc","-1");
  ?>
		
							<dl>
							
							
							
					<dt>
							<a href="<?=$au?>" target="_blank" class='pic'>
								<img src='<?=returntppd($tp,"../img/none180x220.gif")?>'>
							</a>
							<div class='ly'>
								<span></span>
								<span class='cdes'><?=$tit?></span>
								<cite>
									<a href="<?=$au?>" class="xq" target="_blank"><i class='icons'></i>查看详情</a>	<? if(!empty($row[ysweb])){?><a href="<?=$row[ysweb]?>" target="_blank" class="ys"><i></i>查看演示</a><? }else{?><a  target="_blank" class="ys"><i></i>无演示站<? }?>						</a>	</cite>
							</div>
						</dt>
						<dd>
						<p class='attr'>
							<em>￥<strong><?=returnjgdian(returnyhmoney($row[yhxs],$row[money2],$row[money3],$sj,$row[yhsj1],$row[yhsj2],$row[id]))?></strong></em>
							<span>付款人数 <?=$row[xsnum]?> 人</span>
						</p>
						<p class='title'>
							<a href="<?=$au?>" title="<?=$row[tit]?>" target="_blank"><?=$tit?></a>
						</p>
						
						 <?
  $a1="";
  $a2="none";
  if(!empty($myuserid)){
   if(panduan("*","epzhu_car where userid=".$myuserid." and probh='".$row[bh]."'")==1){$a1="none";$a2="";}
  }
  ?>
  <? while1("*","epzhu_user where id=".$row[userid]);$row1=mysql_fetch_array($res1);$xy=returnjgdw($row1[xinyong],"",returnxy($row[userid],1));?>
						<p class='info'>
						<a href="../shop/view<?=$row1[id]?>.html" class="list_seller tips" target="_blank"  T-fc='#333' T-bg='#fff' T-bc='#fff' T-bs='0 0 16px 0 rgba(53,53,53,.2)' T-w='246px'  title="<div class='ly_seller'><div class='info'><img class='avatar' src='../upload/<?=$row[userid]?>/shop.jpg'><span><b>liuyu1218</b><p><img class='xy' src='../img/dj/<?=returnxytp($xy)?>' title='<?=$xy?>'></p></span></div>
						
						<!--
						
						<table class='pop_pf'><thead><tr><th style='text-align:left;width:60%;'>综合评分（31次）</th><th>与同行相比</th></tr></thead><tbody><tr><td>服务态度：5.00</td><td><i>高于</i> <span>2.40%</span></td></tr><tr><td>工作效率：5.00</td><td><i>高于</i> <span>2.40%</span></td></tr><tr><td>完成质量：5.00</td><td><i>高于</i> <span>2.40%</span></td></tr></tbody></table>
						
						-->
						</div>">
							<img class="pic_Layer"  src="../upload/<?=$row[userid]?>/shop.jpg" />
						</a>
						
						<span class="note_icon">
						<? if($row[fhxs]==1){?> <a class="tips tipso_style" t-bg="#999" href="javascript:;" title="手动发货商品，拍下后，卖家会收到待发货的邮件、短信提醒"><i>手</i></a><? }?>
					
	
	<? if($row[fhxs]==2){?><a  class='tips' href="javascript:;"  T-bg='#b68571' title="自动发货商品，拍下后，即可收到来自该商品的发货（下载）链接" color="#ffa800"><i class=send>自</i></a><? }?>
						    							
														
														
														    <? while1("*","epzhu_user where id=".$row[userid]);$row1=mysql_fetch_array($res1);$xy=returnjgdw($row1[xinyong],"",returnxy($row[userid],1));?>
	<? if($row[yysweb]){?><a T-bg='#999' title='收费安装(<?=$row[yysweb]?>),点击查看详细安装要求' class='installing tips'"><i class='install200'>安</i></a><? }?>
														
														<? while1("*","epzhu_user where id=".$row[userid]);$row1=mysql_fetch_array($res1);$xy=returnjgdw($row1[xinyong],"",returnxy($row[userid],1));?>
	<? if($row[yysweb]==0){?><a T-bg='#999' title='免费安装,点击查看详细安装要求' class='installing tips'"><i class='install200'>安</i></a><? }?>
														
														<? if($row1[baomoney]){?><a class='tips' T-w='300' title='已加入消保，商家已缴纳保证金 <b style=color:#FCF302><?=$row1[baomoney]?></b> 元保证金'><i class=protect>保</i></a><? }else{?><a cclass="tips tipso_style" t-w="300" t-bg="#999" target="_blank"><i>保</i></a><? }?>
																		</span>
						</p>
					</dd>
									</dl>
									
									
							 <? $i++;}?>	
							 <? }?> 
  <div class="npa">
  <?
  $nowurl="search";
  $nowwd="";
  require("../tem/page.html");
  ?>
		</div>
	</div>	
	</div></div>	
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
			<div class='lrtop_xu'>
				<dl class='tit'>
					<em></em> <span>源码推荐</span>
				</dl>
				<dl class="box scroll-box" times='3000' items='3'>
					<ul> <? 
 $i=1;
 while0("*","epzhu_pro where ifxj=0 and zt=0 order by lastsj desc limit 5");while($row=mysql_fetch_array($res)){
 if($i % 5==0){$nc=" u0";}else{$nc="";}
 $au="/product/view".$row[id].".html";
 $money1=returnjgdian(returnyhmoney($row[yhxs],$row[money2],$row[money3],$sj,$row[yhsj1],$row[yhsj2],$row[id]));
 $tp="../".returntp("bh='".$row[bh]."' order by xh asc","-1");
 ?>
					
						
						<li>
								<a href="<?=$au?>" target="_blank" title='<?=strgb2312($row[tit],0,30)?>'>
									<i><?=$row2[shopname]?></i><b>￥<?=$money1?></b> 
									<div><?=strgb2312($row[tit],0,30)?></div>
								</a>
						</li><? $i++;}?>
											</ul>
				</dl>
				<dl class='post'><a href='/reg/' target="_blank"><i class='icons i-post'></i><span>发布源码</span></a><a href='/product/' target="_blank"><i class='icons i-all'></i><span>全部源码</span></a></dl>
			 </div>
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
							<dl>
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

<script type="text/javascript" src="/product/static/js/4846962f047f499c86282dfc72c6f42c.js" charset="UTF-8"></script>

</body>
</html>