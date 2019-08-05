<?
include("config/conn.php");
include("config/function.php");
include("config/xy.php");
$sj=date("Y-m-d H:i:s");
$ses=" where (zt=0 or zt=3 or zt=4 or zt=5 or zt=101 or zt=102)";
$taskty=returnsx("a");if($taskty!=-1){$ses=$ses." and taskty=".$taskty;}
//$taskzt=returnsx("b");if($taskzt==-1){$ses=$ses." and (zt=0 or zt=3 or zt=4 or zt=101)";}else{$ses=$ses." and (zt=5 or zt=102)";}
$ty1id=returnsx("j");if($ty1id!=-1){$ses=$ses." and type1id=".$ty1id;$ty1name=returntasktype(1,$ty1id);}
$ty2id=returnsx("k");if($ty2id!=-1){$ses=$ses." and type2id=".$ty2id;$ty2name=returntasktype(2,$ty2id);}
if(returnsx("p")!=-1){$page=returnsx("p");}else{$page=1;}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <!--[if IE 6]>
 <script src="../js/DD_belatedPNG_0.0.8a-min.js" type="text/javascript"></script> 
 <script type="text/javascript"> 
 DD_belatedPNG.fix('*'); 
 </script> 
 <![endif]-->
<head>

<meta name="renderer" content="webkit" />
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gbk" />
<meta name="Pg-Type" content="index">
<meta name="keywords" content="<?=$rowcontrol[webkey]?>">
<meta name="description" content="<?=$rowcontrol[webdes]?>">
<title><?=$rowcontrol[webtit]?></title>
<link rel="shortcut icon" href="favicon.ico" />
<link rel="icon" href="favicon.ico" type="image/gif" />
<script language="javascript" src="js/jquery.m.js"></script>
<script language="javascript" src="js/layui.js"></script>
<script language="javascript" src="js/common.js"></script>
<script language="javascript" src="js/index.js"></script>
<script language="javascript" src="js/js/basic.js"></script>
<script language="javascript" src="js/js/index.js"></script>
<script language="javascript" src="js/slider.js"></script>
<link href="css/basic.css" rel="stylesheet" type="text/css" />
<link href="css/index.css" rel="stylesheet" type="text/css" />
<link href="css/index1.css" rel="stylesheet" type="text/css" />

</head>
<!--<? if(empty($rowcontrol[ifwap])){?>
<script language="javascript">
if(is_mobile()) {document.location.href= '<?=weburl?>m/';}
</script>
<? }?>-->
<body>

<!--头部-->
<!--[if IE 6]>
<script src="js/DD_belatedPNG_0.0.8a-min.js" type="text/javascript"></script> 
<script type="text/javascript"> 
DD_belatedPNG.fix('*'); 
</script> 
<![endif]-->
<? 
autoAD("ADI00");
while1("*","epzhu_ad where adbh='ADI00' and zt=0 order by xh asc");while($row1=mysql_fetch_array($res1)){
$tp="gg/".$row1[bh].".".$row1[jpggif];
$image_size= getimagesize($tp); 
?>

<div><div class="yjcode"><? adwhile("ADI00");?></div>
<? }?>
<? include("tem/top.html");?>
<? include("tem/top.html");?>
<? include("tem/top2.html");?>
</div></div>



<!-- 轮播广告 -->
<div id="banner_tabs" class="flexslider">
	<ul class="slides">

  <?
  autoAD("ADI04");
  $i=1;
  while1("*","epzhu_ad where adbh='ADI04' and zt=0 order by xh asc");while($row1=mysql_fetch_array($res1)){
  ?>
  <li><a href="<?=$row1[aurl]?>" target="_blank"><img src="gg/<?=$row1[bh]?>.<?=$row1[jpggif]?>"border="0" alt="<?=webname?>" /></a></li>
  <?
  $i++;
  }
  ?>		
	</ul>
	<ul class="flex-direction-nav">
		<li><a class="flex-prev" href="javascript:;">Previous</a></li>
		<li><a class="flex-next" href="javascript:;">Next</a></li>
	</ul>
	<ol id="bannerCtrl" class="flex-control-nav flex-control-paging">
		<li><a>1</a></li>
		<li><a>2</a></li>
		<li><a>2</a></li>
		<li><a>2</a></li>
	</ol>
</div>

<script>
$(function() {
	var bannerSlider = new Slider($('#banner_tabs'), {
		time: 5000,
		delay: 400,
		event: 'hover',
		auto: true,
		mode: 'fade',
		controller: $('#bannerCtrl'),
		activeControllerCls: 'active'
	});
	$('#banner_tabs .flex-prev').click(function() {
		bannerSlider.prev()
	});
	$('#banner_tabs .flex-next').click(function() {
		bannerSlider.next()
	});
})
</script>

<!-- 轮播广告结束 -->

<!-- 登陆框E-->
<div class="t_right">
<div class="index_user">
<span class="no_login"  id="idlno">
    	<a href="<?=weburl?>reg/reg.php" target="_blank" class="iu_reg"></a>
		<a href="reg/" class="iu_login"></a>
		<div class="user_third"><span>第三方帐号登录：</span>
		<a  target="_blank"  href="<?=weburl?>config/qq/oauth/index.php" class="login_icon" title="QQ快捷登录"></a>
    	<? if($rowcontrol[wxlogin]!="" && $rowcontrol[wxlogin]!=","){$wxlogin=preg_split("/,/",$rowcontrol[wxlogin]);?>
		<a class="login_icon" href="https://open.weixin.qq.com/connect/qrconnect?appid=<?=$wxlogin[0]?>&redirect_uri=<?=urlencode(weburl."reg/wxlogin.php")?>&response_type=code&scope=snsapi_login#wechat_redirect"  id="wechat" title="微信快捷登录"></a>
		<? }?>
	</div>
	</span>
 <div id="idlyes" style="display:none;">

	    <span class="ok_login"><ul>
	  <li class="iu_tx"><a href="<?=weburl?>user/touxiang.php"><img border="0" id="idltx1" src="" width="48" height="48" /></a></li>
	 <li class="iu_name">您好，<strong><span id="yesuid1"></span></span></strong></li>
	 <li class="iu_link"><a href="<?=weburl?>user/">会员中心</a> 
	 <a href="user/favpro.php">我的收藏</a> <a href="user/order.php">订单</a>	</li></ul>
    </span>
 <ul class="u1 fontyh">


 </ul>
 </div></div>
 <!--快速登录E-->
 <!--平台指数-->

<div class="index_gg">
<ul class="tit"><em>平台 - 指数：</em>	<span class="bz"></span></ul>
<ul>
<li><span>商  品：<em>154<?=$inittjarr[1]+returncount("epzhu_pro where zt=0 and ifxj=0")?></em> 个</span>  <span>需  求：<em>368<?=returncount("epzhu_task where zt=0")?></em> 条</span></li> 
<li><span>会  员：<em>174<?=$inittjarr[0]+returncount("epzhu_user")?></em> 位</span> <span>商  家：<em>165<?=returncount("epzhu_user where shopzt=2")?></em> 家</span> </li> 
<li><span>交  易：<em>1171<?=$inittjarr[2]+returncount("epzhu_order where (ddzt='wait' or ddzt='db' or ddzt='back' or ddzt='suc')")?></em> 笔</span>
 <span>金 额：<em>95<?=sprintf("%.0f",$inittjarr[3]+returnsum("money1*num","epzhu_order where ddzt<>'backsuc' and ddzt<>'close'"))?></em> 元</span></li> 
<?php date_default_timezone_set('Asia/Shanghai');
function Sec2Time($time){
 if(is_numeric($time)){
  $value = array(
    "years" => 0, "days" => 0, "hours" => 0,
    "minutes" => 0, "seconds" => 0,
  );
  if($time >= 31556926){
   $value["years"] = floor($time/31556926);
   $time = ($time%31556926);
  }
  if($time >= 86400){
   $value["days"] = floor($time/86400);
   $time = ($time%86400);
  }
  if($time >= 3600){
   $value["hours"] = floor($time/3600);
   $time = ($time%3600);
  }
  if($time >= 60){
   $value["minutes"] = floor($time/60);
   $time = ($time%60);
  }
  $value["seconds"] = floor($time);
  return (array) $value;
 }else{
  return (bool) FALSE;
 }
}
// 本站创建的时间
$site_create_time = strtotime('2013-09-20 11:40:00');
$time = time() - $site_create_time;
$uptime = Sec2Time($time);
?>
<li class='tisp'>本站正式上线：5年<!--<?php echo $uptime['days']; ?>天| 每日0点刷新--></li>
</ul>
<ul class="tit"><em>网站公告</em> <a href="help/gglist.html" target="_blank" class="ggmore">More></a></ul>
<ul>
<? while0("*","epzhu_gg where zt=0 order by sj desc limit 4");while($row=mysql_fetch_array($res)){?>
<li><div class="gt">·<A href="help/ggview<?=$row[id]?>.html" title="<?=$row[tit]?>" target=_blank> 
 <?=strgb2312($row[tit],0,60)?></A></div><div class="date">[<?=dateMD($row[sj])?>]</div></li>
<? }?>              
</ul>
</div>
</div>
</div> 




<div class="index_title" style="margin-top: 500px; font-size: 16px;">
<h2><i style="font-size: 16px;">一站网</i></h2>
<div class="index_tab" style="left:58px;width:700px;">
<!--<div class="sell_code" id="cur"><i></i><span>热门源码</span></div>-->
<div class="no_ck" id='cur'><i></i><span style="font-size: 14px;">　为您保驾护航 ！</span></div>
<!--<div class="sell_web"><i></i><span>热门</span></div>
<div class="sell_task"><i></i><span>任务</span></div>-->
</div>
<a target="_blank" href="/productyy/search_j218v_k219v.html">More&gt;</a>
</div>

<p style="text-align:center;margin-top: 20px;"><img src="/img/jiaoyi.jpg"></p>



<div class="index_title" style="margin-top: 20px;    background: #3c4a57;">
<h2><i style="padding-left: 10px;color: #ffffff;    font-size: 16px;">平台</i></h2>
<div class="index_tab" style="left:40px;width:700px;">
<!--<div class="sell_code" id="cur"><i></i><span>热门源码</span></div>-->
<div class="sell_domain"><i></i><span style="
    color: #a8a8a8;    font-size: 14px;
">　实时交易播报</span></div>
<!--<div class="sell_web"><i></i><span>热门</span></div>
<div class="sell_task"><i></i><span>任务</span></div>-->
</div>
<a target="_blank" href="/"style="
    
    margin-right: 10px;
">More&gt;</a>
</div>

<!-- 最新成交开始-->
<table width="" border="" cellspacing="0"style="
    border-top-width: 0px;
    border-bottom-width: 0px;
    border-left-width: 0px;
    border-right-width: 0px;margin-top: 20px;

">
  
    <td style="
    border-top-width: 0px;
    border-bottom-width: 0px;
    border-left-width: 0px;
    border-right-width: 0px;
"><div style="width: 400px;    background: #fff;">
	
	<div class="scroltit"><strong>源码成交</strong><em>实时交易播报</em><small title="向上" id="but_up" style="cursor: pointer;"></small><small title="向下" id="but_down" style="cursor: pointer;"></small></div>
    <div id="scrollDiv">
   <ul style="margin-top: 0px;">
  <? $i=0;while1("*","epzhu_order where (ddzt='wait' or ddzt='db' or ddzt='suc') order by sj desc limit 2");while($row1=mysql_fetch_array($res1)){while2("id,bh,tit","epzhu_pro where bh='".$row1[probh]."'");;$row2=mysql_fetch_array($res2)?>
 <li><?=mb_substr(returnnc($row1[userid]),0,2);?>***<?=mb_substr(returnnc($row1[userid]),-2,2);?>
 <span class="blue"><a href="product/view<?=$row2[id]?>.html" title="<?=$row2[tit]?>" target="_blank"><?=returntitdian($row1[tit],30)?></span></a>成交价：<font color="#ff6600"><strong>￥<?=$row1[money1]?></strong></font>  [<?=returnorderzt($row1[ddzt])?>]</li>
 <? $i++;}?>
 
	 </ul>
    </div>
</div></td>
    <td style="
    border-top-width: 0px;
    border-bottom-width: 0px;
    border-left-width: 0px;
    border-right-width: 0px;
"><div style="width: 400px;    background: #fff;">

	<div class="scroltit"><strong>开发成交</strong><em>实时交易播报</em><small title="向上" id="but_up2" style="cursor: pointer;"></small><small title="向下" id="but_down2" style="cursor: pointer;"></small></div>
    <div id="scrollDiv2">
   <ul style="margin-top: 0px;">
  <? $i=0;while1("*","epzhu_orderkf where (ddzt='wait' or ddzt='db' or ddzt='suc') order by sj desc limit 2");while($row1=mysql_fetch_array($res1)){while2("id,bh,tit","epzhu_pro where bh='".$row1[probh]."'");;$row2=mysql_fetch_array($res2)?>
 <li><?=mb_substr(returnnc($row1[userid]),0,2);?>***<?=mb_substr(returnnc($row1[userid]),-2,2);?>
  <span class="blue"><a href="productkf/view<?=$row2[id]?>.html" title="<?=$row2[tit]?>" target="_blank"><?=returntitdian($row1[tit],30)?></span></a> 成交价：<font color="#ff6600"><strong>￥<?=$row1[money1]?></strong></font>  [<?=returnorderzt($row1[ddzt])?>]</li>
 <? $i++;}?>
 
	 </ul>
    </div>
</div></td>
    <td style="
    border-top-width: 0px;
    border-bottom-width: 0px;
    border-left-width: 0px;
    border-right-width: 0px;
"><div style="width: 400px;    background: #fff;">

	<div class="scroltit"><strong>域名成交</strong><em>实时交易播报</em><small title="向上" id="but_up3" style="cursor: pointer;"></small><small title="向下" id="but_down3" style="cursor: pointer;"></small></div>
    <div id="scrollDiv3">
   <ul style="margin-top: 0px;">
  <? $i=0;while1("*","epzhu_orderym where (ddzt='wait' or ddzt='db' or ddzt='suc') order by sj desc limit 2");while($row1=mysql_fetch_array($res1)){while2("id,bh,tit","epzhu_pro where bh='".$row1[probh]."'");;$row2=mysql_fetch_array($res2)?>
 <li><?=mb_substr(returnnc($row1[userid]),0,2);?>***<?=mb_substr(returnnc($row1[userid]),-2,2);?>
 <span class="blue"><a href="productym/view<?=$row2[id]?>.html" title="<?=$row2[tit]?>" target="_blank"><?=returntitdian($row1[tit],30)?></span></a>成交价：<font color="#ff6600"><strong>￥<?=$row1[money1]?></strong></font>  [<?=returnorderzt($row1[ddzt])?>]</li>
 <? $i++;}?>
 
	 </ul>
    </div>
</div></td>
  </tr>
</table>

<!-- 最新成交结束-->




<!-- 最新成交开始-->
<table width="" border="" cellspacing="0"style="
    border-top-width: 0px;
    border-bottom-width: 0px;
    border-left-width: 0px;
    border-right-width: 0px;margin-top: 10px;

">
  
    <td style="
    border-top-width: 0px;
    border-bottom-width: 0px;
    border-left-width: 0px;
    border-right-width: 0px;
"><div style="width: 400px;    background: #fff;">
	
	<div class="scroltit"><strong>帐号成交</strong><em>实时交易播报</em><small title="向上" id="but_up4" style="cursor: pointer;"></small><small title="向下" id="but_down4" style="cursor: pointer;"></small></div>
    <div id="scrollDiv4">
   <ul style="margin-top: 0px;">
  <? $i=0;while1("*","epzhu_orderzh where (ddzt='wait' or ddzt='db' or ddzt='suc') order by sj desc limit 2");while($row1=mysql_fetch_array($res1)){while2("id,bh,tit","epzhu_pro where bh='".$row1[probh]."'");;$row2=mysql_fetch_array($res2)?>
 <li><?=mb_substr(returnnc($row1[userid]),0,2);?>***<?=mb_substr(returnnc($row1[userid]),-2,2);?>
 <span class="blue"><a href="productzh/view<?=$row2[id]?>.html" title="<?=$row2[tit]?>" target="_blank"><?=returntitdian($row1[tit],30)?></span></a>成交价：<font color="#ff6600"><strong>￥<?=$row1[money1]?></strong></font>  [<?=returnorderzt($row1[ddzt])?>]</li>
 <? $i++;}?>
 
	 </ul>
    </div>
</div></td>
    <td style="
    border-top-width: 0px;
    border-bottom-width: 0px;
    border-left-width: 0px;
    border-right-width: 0px;
"><div style="width: 400px;    background: #fff;">

	<div class="scroltit"><strong>美工成交</strong><em>实时交易播报</em><small title="向上" id="but_up5" style="cursor: pointer;"></small><small title="向下" id="but_down5" style="cursor: pointer;"></small></div>
    <div id="scrollDiv5">
   <ul style="margin-top: 0px;">
  <? $i=0;while1("*","epzhu_ordermg where (ddzt='wait' or ddzt='db' or ddzt='suc') order by sj desc limit 2");while($row1=mysql_fetch_array($res1)){while2("id,bh,tit","epzhu_pro where bh='".$row1[probh]."'");;$row2=mysql_fetch_array($res2)?>
 <li><?=mb_substr(returnnc($row1[userid]),0,2);?>***<?=mb_substr(returnnc($row1[userid]),-2,2);?>
  <span class="blue"><a href="productmg/view<?=$row2[id]?>.html" title="<?=$row2[tit]?>" target="_blank"><?=returntitdian($row1[tit],30)?></span></a> 成交价：<font color="#ff6600"><strong>￥<?=$row1[money1]?></strong></font>  [<?=returnorderzt($row1[ddzt])?>]</li>
 <? $i++;}?>
 
	 </ul>
    </div>
</div></td>
    <td style="
    border-top-width: 0px;
    border-bottom-width: 0px;
    border-left-width: 0px;
    border-right-width: 0px;
"><div style="width: 400px;    background: #fff;">

	<div class="scroltit"><strong>推广成交</strong><em>实时交易播报</em><small title="向上" id="but_up6" style="cursor: pointer;"></small><small title="向下" id="but_down6" style="cursor: pointer;"></small></div>
    <div id="epzhucomQQ120036745">
   <ul style="margin-top: 0px;">
  <? $i=0;while1("*","epzhu_orderyy where (ddzt='wait' or ddzt='db' or ddzt='suc') order by sj desc limit 2");while($row1=mysql_fetch_array($res1)){while2("id,bh,tit","epzhu_pro where bh='".$row1[probh]."'");;$row2=mysql_fetch_array($res2)?>
 <li><?=mb_substr(returnnc($row1[userid]),0,2);?>***<?=mb_substr(returnnc($row1[userid]),-2,2);?>
 <span class="blue"><a href="productyy/view<?=$row2[id]?>.html" title="<?=$row2[tit]?>" target="_blank"><?=returntitdian($row1[tit],30)?></span></a>成交价：<font color="#ff6600"><strong>￥<?=$row1[money1]?></strong></font>  [<?=returnorderzt($row1[ddzt])?>]</li>
 <? $i++;}?>
 
	 </ul>
    </div>
</div></td>
  </tr>
</table>

<!-- 最新成交结束-->




<!--最新源码开始-->

<div class="index_title" style="top: 20px;font-size: 16px;">
<h2><i style="font-size: 16px;">平台源码</i></h2>
<div class="index_tab" style="left:58px;width:700px;">
<!--<div class="sell_code" id="cur"><i></i><span>热门源码</span></div>-->
<div class="no_ck" id='cur'><i></i><span style="font-size: 14px;">　最新上线</span></div>
<!--<div class="sell_web"><i></i><span>热门</span></div>
<div class="sell_task"><i></i><span>任务</span></div>-->
</div>
<a target="_blank" href="/product/search_j37v.html">More&gt;</a>
</div>


<div class="i_c_div" id="sell_web" style="margin-top: 40px;">
<div class="w_d_list">
<div>
 <? 
 $i=1;
 while0("*","epzhu_pro where ifxj=0 and zt=0 order by lastsj desc limit 10");while($row=mysql_fetch_array($res)){
 if($i % 5==0){$nc=" u0";}else{$nc="";}
 $au="product/view".$row[id].".html";
 $money1=returnjgdian(returnyhmoney($row[yhxs],$row[money2],$row[money3],$sj,$row[yhsj1],$row[yhsj2],$row[id]));
 ?>
<ul>
<li class="l1"><em>￥<?=sprintf("%.2f",$money1)?></em><span><?=strgb2312($row3[shopname],0,17)?></span></li>
  <li class="l2"><a href="shop/view<?=$row3[id]?>.html" target="_blank"><img border="0" src="<?=returntppd(returntp("bh='".$row[bh]."'","-1"),"img/none170x170.gif")?>" /></a>
<span ></span>
  <span class="cdes"><?=strgb2312($row[tit],0,47)?></span>
  </li>
<li class="l3"><a href="<?=$au?>" target="_blank"><?=$row[tit]?><?=strgb2312($row[tit],0,47)?></a>
  </li>
  </ul>
 <? $i++;}?>
</div>
</div>
</div>
<!--最新源码结束-->


<!--最新域名开始-->
<div class="index_menu">
<div>
<strong>域名最新</strong><span><a href="/productym/search_j236v_k237v_m239v_i241v.html" target="_blank">万网阿里备案</a>
<a href="/productym/search_j236v_k237v_m239v.html" target="_blank">未拦截</a>
<a href="/productym/search_j246v.html" target="_blank">域名备案</a>
<a href="/productym/search_j236v_f4v.html" target="_blank">人气域名</a>
<a href="/productym/search_j236v_f6v.html" target="_blank">最低域名</a>
</span>
</div>
 </div>
 
 <div class="i_c_div" id="sell_task" style="display: block;">

 <div class="tasklist">
<div class="c_d_list">
 <?
 autoAD("shang_02");
 $sqlad="select * from epzhu_ad where adbh='shang_02' and zt=0 order by xh asc";mysql_query("SET NAMES 'GBK'");$resad=mysql_query($sqlad);
 $ni=1;
 while1("*","epzhu_typeym where admin=1 and (iftj is null or iftj=0) order by xh asc");while($row1=mysql_fetch_array($res1)){
 ?>
 <? 
   while0("*","epzhu_proym where ifxj=0 and zt=0 and ty1id=".$row1[id]." order by lastsj desc limit 3");while($row=mysql_fetch_array($res)){
   $au="product/view".$row[id].".html";
   $money1=returnjgdian(returnyhmoney($row[yhxs],$row[money2],$row[money3],$sj,$row[yhsj1],$row[yhsj2],$row[id]));
    while3("*","epzhu_user where id=".$row[userid]);$row3=mysql_fetch_array($res3);
   ?>
<ul>
<li class="l1"><em>￥<?=$money1?></em>
<a href="<?=$au?>"  target="_blank" title="<?=$row[tit]?>"><?=strgb2312($row[tit],0,45)?></a>

</li>
<li class="l2"><?=strgb2312($row3[shopname],0,17)?>
</li>
</ul>
 <? }?>
 <? $ni++;}?>
 </div>
 </div>

 

<!--最新开发开始-->

<div class="index_title" style="top: 20px;font-size: 16px;">
<h2><i style="font-size: 16px;">网站开发</i></h2>
<div class="index_tab" style="left:58px;width:700px;">
<!--<div class="sell_code" id="cur"><i></i><span>热门源码</span></div>-->
<div class="no_ck" id='cur'><i></i><span style="font-size: 14px;">　最新服务</span></div>
<!--<div class="sell_web"><i></i><span>热门</span></div>
<div class="sell_task"><i></i><span>任务</span></div>-->
</div>
<a target="_blank" href="/productkf/search_j208v.html">More&gt;</a>
</div>


<div class="i_c_div" id="sell_web" style="border: 0px; display: block;margin-top: 30px;">
<div class="w_d_list">
<div>
 <? 
 $i=1;
 while0("*","epzhu_prokf where ifxj=0 and zt=0 order by lastsj desc limit 5");while($row=mysql_fetch_array($res)){
 if($i % 5==0){$nc=" u0";}else{$nc="";}
 $au="productkf/view".$row[id].".html";
 $money1=returnjgdian(returnyhmoney($row[yhxs],$row[money2],$row[money3],$sj,$row[yhsj1],$row[yhsj2],$row[id]));
 ?>
<ul>
<li class="l1"><em>￥<?=sprintf("%.2f",$money1)?></em><span><?=strgb2312($row3[shopname],0,17)?></span></li>
  <li class="l2"><a href="shop/view<?=$row3[id]?>.html" target="_blank"><img border="0" src="<?=returntppd(returntp("bh='".$row[bh]."'","-1"),"img/none170x170.gif")?>" /></a>
<span ></span>
  <span class="cdes"><?=strgb2312($row[tit],0,47)?></span>
  </li>
<li class="l3"><a href="<?=$au?>" target="_blank"><?=$row[tit]?><?=strgb2312($row[tit],0,47)?></a>
  </li>
  </ul>
 <? $i++;}?>
</div>
</div>
</div>





<!--最新推广发布-->


<div class="index_title" style="font-size: 16px;">
<h2><i style="font-size: 16px;">网站推广</i></h2>
<div class="index_tab" style="left:58px;width:700px;">
<!--<div class="sell_code" id="cur"><i></i><span>热门源码</span></div>-->
<div class="no_ck" id='cur'><i></i><span style="font-size: 14px;">　最新服务</span></div>
<!--<div class="sell_web"><i></i><span>热门</span></div>
<div class="sell_task"><i></i><span>任务</span></div>-->
</div>
<a target="_blank" href="/productyy/search_j218v_k219v.html">More&gt;</a>
</div>


<div class="i_c_div" id="sell_task" style="display: block;margin-top: 0px;">

 <div class="tasklist">
<div class="c_d_list">
 <?
 autoAD("shang_02");
 $sqlad="select * from epzhu_ad where adbh='shang_02' and zt=0 order by xh asc";mysql_query("SET NAMES 'GBK'");$resad=mysql_query($sqlad);
 $ni=1;
 while1("*","epzhu_typeyy where admin=1 and (iftj is null or iftj=0) order by xh asc");while($row1=mysql_fetch_array($res1)){
 ?>
 <? 
   while0("*","epzhu_proyy where ifxj=0 and zt=0 and ty1id=".$row1[id]." order by lastsj desc limit 4");while($row=mysql_fetch_array($res)){
   $au="product/view".$row[id].".html";
   $money1=returnjgdian(returnyhmoney($row[yhxs],$row[money2],$row[money3],$sj,$row[yhsj1],$row[yhsj2],$row[id]));
    while3("*","epzhu_user where id=".$row[userid]);$row3=mysql_fetch_array($res3);
   ?>
<ul>
<li class="l1"><em>￥<?=$money1?></em>
<a href="<?=$au?>"  target="_blank" title="<?=$row[tit]?>"><?=strgb2312($row[tit],0,45)?></a>
</li>
<li class="l2"><?=strgb2312($row3[shopname],0,17)?>
</li>
</ul>
 <? }?>
 <? $ni++;}?>
 </div></div>


<!--最新推广结束-->







<!--最新美工开始-->

<div class="index_title" style="margin-top: 150px;font-size: 16px;">
<h2><i style="font-size: 16px;">网站美工</i></h2>
<div class="index_tab" style="left:58px;width:700px;">
<!--<div class="sell_code" id="cur"><i></i><span>热门源码</span></div>-->
<div class="no_ck" id='cur'><i></i><span style="font-size: 14px;">　最新服务</span></div>
<!--<div class="sell_web"><i></i><span>热门</span></div>
<div class="sell_task"><i></i><span>任务</span></div>-->
</div>
<a target="_blank" href="/productmg/search_j217v.html">More&gt;</a>
</div>

<div class="tuan"style="top: 20px;font-size: 16px;">
 <div class="tuancon">
 <? 
 $i=1;
 while0("*","epzhu_promg where ifxj=0 and zt=0 order by lastsj desc limit 5");while($row=mysql_fetch_array($res)){
 if($i % 5==0){$nc=" u0";}else{$nc="";}
 $au="productmg/view".$row[id].".html";
 $money1=returnjgdian(returnyhmoney($row[yhxs],$row[money2],$row[money3],$sj,$row[yhsj1],$row[yhsj2],$row[id]));
 ?>
 <ul>
  <li class="l1">
  <a href="<?=$au?>"  target="_blank"><img src="<?=returntppd(returntp("bh='".$row[bh]."'","-2"),"img/none60x60.gif")?>" width="220" height="176" /></a>
  <span id="dqsj<?=$i?>" style="display:none;"><?=$dqsj?></span>
  </li>
  <li class="l2"> <a href="<?=$au?>"  target="_blank"><span>
  <?=strgb2312($row[tit],0,30)?></span></a></li>
  <li class="l3"><span class="xj"><b>￥</b><?=$money1?></span><span class="go"><a href="<?=$au?>"  target="_blank"></a></span></li>
  </ul>
  <? $i++;}?>
 </div>
 </div>

<!--最新美工结束-->





<!--最新账号开始-->


<div class="index_title" style="top: 20px;font-size: 16px;">
<h2><i style="font-size: 16px;">平台帐号</i></h2>
<div class="index_tab" style="left:58px;width:700px;">
<!--<div class="sell_code" id="cur"><i></i><span>热门源码</span></div>-->
<div class="no_ck" id='cur'><i></i><span style="font-size: 14px;">　最新帐号</span></div>
<!--<div class="sell_web"><i></i><span>热门</span></div>
<div class="sell_task"><i></i><span>任务</span></div>-->
</div>
<a target="_blank" href="/productzh/search_j239v.html">More&gt;</a>
</div>
<div class="i_c_div" id="sell_task" style="display: block;">

 <div class="tasklist">
<div class="c_d_list">
 <?
 autoAD("shang_02");
 $sqlad="select * from epzhu_ad where adbh='shang_02' and zt=0 order by xh asc";mysql_query("SET NAMES 'GBK'");$resad=mysql_query($sqlad);
 $ni=1;
 while1("*","epzhu_typezh where admin=1 and (iftj is null or iftj=0) order by xh asc");while($row1=mysql_fetch_array($res1)){
 ?>
 <? 
   while0("*","epzhu_prozh where ifxj=0 and zt=0 and ty1id=".$row1[id]." order by lastsj desc limit 4");while($row=mysql_fetch_array($res)){
   $au="productzh/view".$row[id].".html";
   $money1=returnjgdian(returnyhmoney($row[yhxs],$row[money2],$row[money3],$sj,$row[yhsj1],$row[yhsj2],$row[id]));
    while3("*","epzhu_user where id=".$row[userid]);$row3=mysql_fetch_array($res3);
   ?>
<ul>
<li class="l1"><em>￥<?=$money1?></em>
<a href="<?=$au?>"  target="_blank" title="<?=$row[tit]?>"><?=strgb2312($row[tit],0,45)?></a>
</li>
<li class="l2"><?=strgb2312($row3[shopname],0,17)?>
</li>
</ul>
 <? }?>
 <? $ni++;}?>
 </div></div></div>


<!--最新账号结束-->



<!--最新网站出售开发-->


<div class="index_title" style="margin-top: 20px;font-size: 16px;">
<h2><i style="font-size: 16px;">网站出售</i></h2>
<div class="index_tab" style="left:58px;width:700px;">
<!--<div class="sell_code" id="cur"><i></i><span>热门源码</span></div>-->
<div class="no_ck" id='cur'><i></i><span style="font-size: 14px;">　最新上线</span></div>
<!--<div class="sell_web"><i></i><span>热门</span></div>
<div class="sell_task"><i></i><span>任务</span></div>-->
</div>
<a target="_blank" href="/productwz/search_j213v.html">More&gt;</a>
</div>
<div class="tuan">
 <div class="tuancon">
 <? 
 $i=1;
 while0("*","epzhu_prowz where ifxj=0 and zt=0 order by lastsj desc limit 5");while($row=mysql_fetch_array($res)){
 if($i % 5==0){$nc=" u0";}else{$nc="";}
 $au="productwz/view".$row[id].".html";
 $money1=returnjgdian(returnyhmoney($row[yhxs],$row[money2],$row[money3],$sj,$row[yhsj1],$row[yhsj2],$row[id]));
 ?>
 <ul>
  <li class="l1">
  <a href="<?=$au?>"  target="_blank"><img src="<?=returntppd(returntp("bh='".$row[bh]."'","-2"),"img/none60x60.gif")?>" width="220" height="176" /></a>
  <span id="dqsj<?=$i?>" style="display:none;"><?=$dqsj?></span>
  </li>
  <li class="l2"> <a href="<?=$au?>"  target="_blank"><span>
  <?=strgb2312($row[tit],0,30)?></span></a></li>
  <li class="l3"><span class="xj"><b>￥</b><?=$money1?></span><span class="go"><a href="<?=$au?>"  target="_blank"></a></span></li>
  </ul>
  <? $i++;}?>
 </div>
 </div>

<!--最新网站出售结束-->






<!--最新任务开始-->

<div>
<div class="index_title">
<h2><i style="
    font-size: 16px;
">TASK</i></h2>
<div class="index_tab">

<div class="no_ck" id='cur'><span style="
    font-size: 14px;
">最新任务</span></div>
</div>
<a target="_blank" href="/task/">查看更多 ></a>
</div>

<div class="i_c_div" id="sell_task" style="display: block;">
 <div class="t_b_list">
 <div class="tasklist">
 
 <?
 pagef($ses,2,"epzhu_task","order by sj desc");while($row=mysql_fetch_array($res)){
 taskok($row[id]);
 ?>
 <ul class="ulist fontyh">
 <li class="l1">
 <a href="/task/view<?=$row[id]?>.html" title="<?=$row[tit]?>" target="_blank" class="g_ac2"><?=returntitdian($row[tit],50)?></a><br>
 <span class="hui"><?=strgb2312(strip_tags($row[txt]),0,60)?></span>
 </li>
 <li class="l2"><? if($row[money3]>0){?><span class="s1">已托管金额</span><? }else{?><span class="s2">选标后托管</span><? }?></li>
 <li class="l3"><?=returntaskxs($row[taskty])?></li>
 <?
 if(empty($row[taskty])){
 ?>
 <li class="l4">
 <? if(empty($row[zt])){?><strong>1</strong>份<? }else{?><strong>0</strong>份<? }?>
 </li>
 <? }else{?>
 <li class="l41">
 <span class="s1"><strong><?=$row[tasknum]-$row[taskcy]?></strong>份(共<?=$row[tasknum]?>份)</span>
 <span class="s2"></span>
 <span class="s3" style="width:<? $okbfb=$row[taskcy]/$row[tasknum];echo 100*(1-$okbfb);?>px;"></span>
 <span class="s4"><?=sprintf("%.2f",(1-$okbfb)*100)?>%</span>
 </li>
 <? }?>
 <li class="l5"><strong><?=$row[money1]?></strong>元</li>
 <li class="l6"><?=returntask($row[zt])?></li>
 <li class="l7">
 <?
 if((empty($row[taskty]) && 0==$row[zt]) || (1==$row[taskty] && 101==$row[zt])){
 ?>
 <a href="/task/view<?=$row[id]?>.html" class="a1" target="_blank">抢此任务</a>
 <?
 }else{
 ?>
 <a href="/task/view<?=$row[id]?>.html" class="a2" target="_blank">查看任务</a>
 <? }?>
 </li>
 </ul>
 <? }?>
</div>
</div>
</div></div>
<!--最新任务结束-->









<!-- 广告结束 ent -->
<div class="index_title">
<h2><i>Shop</i></h2>
<div class="index_tab" style="left:60px;">
<div class="no_ck" id='cur'><span>推荐商家</span></div>
</div>
<div class="index_tab" style="right:50px;">
<div class="no_ck" id='cur'><span>近期收入榜</span></div>
</div>
<a target="_blank" href="">More></a>
</div>
<div class="i_s_div">

<div class="rec_shop">

<div>
   <? 
   while1("*","epzhu_user where zt=1 and shopzt=2 and shopname<>'' and pm>0 order by pm asc limit 8");for($i=1;$i<=8;$i++){
   if($row1=mysql_fetch_array($res1)){
   $sucnum=returnjgdw($row1[xinyong],"",returnxy($row1[id],1));
   ?>
 <ul><li>
      <a href="shop/view<?=$row1[id]?>.html" class="avatar" target="_blank"><img src="<?=returntppd("upload/".$row1[id]."/shop.jpg","img/none180x180.gif")?>" /></a>
	  <span class="info"><a href="shop/view<?=$row1[id]?>.html" target="_blank" class="name" ><?=strgb2312($row1[shopname],0,17)?></a>
	  <p  class="i_bz"><img src="../img/dj/<?=returnxytp($sucnum)?>" class="img1" title="信用值<?=$sucnum?>" /></p>
	  <p><a class='slink' href="shop/view<?=$row1[id]?>.html" target="_blank">TA的店铺</a></p>
	 </span>
     </li>
	 <? while2("*","epzhu_pro where userid=".$row1[id]." and zt=0 and ifxj=0 and iftj>0 order by iftj asc");if($row2=mysql_fetch_array($res2)){?>
	   <li class='hot_goods'>
	   <strong>TA的宝贝<i>(<?=returncount("epzhu_pro where zt=0 and ifxj=0 and userid=".$row1[id])?>)</i></strong>
	   	   <p><em>￥<?=returnjgdian(returnyhmoney($row2[yhxs],$row2[money2],$row2[money3],$sj,$row2[yhsj1],$row2[yhsj2],$row2[id]))?></em>
		   <a href="product/view<?=$row2[id]?>.html" target="_blank" ><?=returntitdian($row2[tit],30)?></a></p>
	 
		<? }?>
 </li>
 </ul>
<? }}?>
 
  </div>
 </div>			

 
 
 
  <div class="rank_shop">
  <? while1("*","epzhu_user where shopname<>'' and shopzt=2 and zt=1 order by sellmall desc limit 5");if($row1=mysql_fetch_array($res1)){?>
 <div class="r_s_1">
<a class="avatar" href="shop/view<?=$row1[id]?>.html" target="_blank"><img src="<?=returntppd("upload/".$row1[id]."/shop.jpg","img/none180x180.gif")?>" width=75 height=75></a>
 <span><i></i>
 <a class="name" href="shop/view<?=$row1[id]?>.html" target="_blank"><?=strgb2312($row1[shopname],0,15)?></a>
  <p>收入：<br /><em>￥</em><b><?=$row1[sellmall]?></b></p> </span>
 </div>  
  <? }?>

  <? $i=1;while($row1=mysql_fetch_array($res1)){?>


 
  <div class="r_s_<?=$i+1?>">
<a class="avatar" href="shop/view<?=$row1[id]?>.html" target="_blank"><img  src="<?=returntppd("upload/".$row1[id]."/shop.jpg","img/none60x60.gif")?>" width=40 height=40></a>
 <span><i></i>
 <a class="name" href="/shop/view<?=$row1[id]?>.html" target="_blank"><?=strgb2312($row1[shopname],0,17)?></a>
  <p>收入：<em>￥</em><b><?=$row1[sellmall]?></b></p> </span>
 </div>  
  <? $i++;}?>

</div>
</div>

<div class="index_title">
<h2><i>Link</i></h2>
<div class="index_tab" style="left:60px;">

<div class="no_ck" id='cur'><span>友情链接</span></div>
</div>
<a target="_blank" href="">申请友情链接></a>
</div>
<dl class="link">
	<dt class="u2">
	 <? autoAD("ADI13");while0("*","epzhu_ad where adbh='ADI13' and zt=0 order by xh asc");while($row=mysql_fetch_array($res)){?>
		<a href="<?=$row[aurl]?>" target="_blank" rel="nofollow"><img alt="<?=$row[tit]?>" border=0 src="gg/<?=$row[bh]?>.<?=$row[jpggif]?>" width="110" height="38"></a>
	 <? }?>


	</dt>
	<dd class="u3">
	 <? autoAD("ADI14");while0("*","epzhu_ad where adbh='ADI14' and zt=0 and type1='文字' order by xh asc");while($row=mysql_fetch_array($res)){?>
 <a href="<?=$row[aurl]?>" target="_blank"><?=$row[tit]?></a>
 <? }?>
			</dd>
</dl>
</div>
<div class="yjcode"><? adwhile("ADI01");?></div>
<div class="yjcode" style="width: 80px;position: fixed;top: 0;z-index: 13;right: 0;"><? adwhile("ADDL");?></div></div></div></div></div>



<div class="yizhanw"> <div class="yizhanw2"><? include("tem/bottom.html");?></div> </div>

</body>
</html>