<?
include("../config/xy.php");
$sj=date("Y-m-d H:i:s");
$id=$_GET[id];
while0("*","epzhu_prowz where zt<>99 and id=".$id);if(!$row=mysql_fetch_array($res)){php_toheader("../");}
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
<div class="yjcode"><? adwhile("ADTOP");?></div>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$row[tit]?> - <?=webname?></title>
<meta name="keywords" content="<?=returnjgdw($row[wkey],"",$row[tit])?>">
<meta name="description" content="<?=returnjgdw($row[wdes],"",strgb2312(strip_tags($row[txt]),0,250))?>">

<link href="static/css/basic.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="static/js/jquery.m.js"></script>
<script language="javascript" src="static/js/layui.js"></script>
<script language="javascript" src="static/js/common.js"></script>
<script language="javascript" src="static/js/market.js"></script>
<link href="static/css/market.css" rel="stylesheet" type="text/css" />
<link href="static/css/layui.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="static/js/tipso.min.js"></script>

<script language="javascript" src="static/js/view.js"></script>
<script language="javascript" src="static/js/layer.js"></script>

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
<body>

<div class="header">
<? include("../tem/top---.html");?>
	
	<div class="general">
		<div class="main">
					<a class="logo" href="/">
				<img src="static/picture/t_l.png" class="top-zl">
			</a>
						<li class="search Search-box" onmouseover="topover()" onmouseout="topout()">
	<span class="searchtype">源码</span><i></i>
	<form name="topf1" method="post" onsubmit="return topftj()">
	<input  name="topt" id="topt" type="text" class="searchval Search-inp"/>
	<input type="image" src="<?=weburl?>homeimg/so.png" class="searchbtn Search-btn">
	<ul class="searchlist" style="display:none;"> 
	<li data='serve'>  <a href="javascript:void();" onclick="topjconc(1,'搜源码')">源码</a></li>
	<li data='domain'> <a href="javascript:void();" onclick="topjconc(2,'搜开发')">搜开发</a></li> 
   <li data='domain1'> <a href="javascript:void();" onclick="topjconc(10,'搜美工')">搜美工</a></li> 
	

    </ul>
    </form>
    </li>
			<li class="Quick-link">
                <a href="javascript:released('buy');" class="button">
                    <span>免费发布需求</span>
                    <i class="arrow"></i>
                </a>
                <p class="release_hover">
                    <a href="javascript:released('buy');">免费发布任务</a>
                    <a href="javascript:;" class="add_custom">建立自助交易<i class="rec-icon">荐</i></a>
                    <a href="javascript:released('sale');">免费发布商品</a>
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
						<a href="/">首页</a><a href="/code/search_j37v.html" class="bold">源码集市</a><a href="/serve/search_j208v.html" class="bold  cur">服务市场</a><a href="/web/search_j213v.html" class="bold ">网站寄售</a><a href="/productym/search_j236v.html" class="">域名交易</a><a href="/task/" class="">任务大厅</a>					</li>
					<li class="right">
						<a href="/shop/">商家</a> <a href="/">排行</a> <a href="/">品牌</a>  <a href="//" target="_blank">博客</a>  <a href="/" target="_blank">社区</a> 
						 <div class="clear"></div>
					</li>
				</div>
		</div>
	</div>
</div>
<!--头部-->
<div class="dqwz">当前位置：<a href="/">首页</a> <span>></span> <a href="search_j<?=$row[ty1id]?>v.html"><?=returntype(1,$row[ty1id])?></a>
 <? if(0!=$row[ty2id]){?> <span>></span> <a href="search_j<?=$row[ty1id]?>v_k<?=$row[ty2id]?>v.html"><?=returntype(2,$row[ty2id])?></a><? }?>
 <? if(0!=$row[ty3id]){?> <span>></span> <a href="search_j<?=$row[ty1id]?>v_k<?=$row[ty2id]?>v_m<?=$row[ty3id]?>v.html"><?=returntype(3,$row[ty3id])?></a><? }?>  （发布时间：<?=dateYMD($row[lastsj])?>）</div>
<div class="main t_view w_entrust">
	<div class="g_main left">
	 
		<div class='g_box g_web'>
			<ul class="w_cont"> 
			    <div class="w_good">
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
					<a href="../tp/showpic.php?bh=<?=$row[bh]?>" target="_blank" class='pic' rel="nofollow"  title="查看网站">
						<img class='G-image' src='<?=returntppd($tp,"../img/none300x300.gif")?>'>
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
						<span class="fx-title icons">
							<div>分享：</div>
						</span>
						<!--share start-->
						<div class="G-share">
							<a class="share-a G-weixin" data="weixin" title="分享到微信"></a>
							<a class="share-a G-qzone" data="qzone" title="分享到QQ空间"></a>
							<a class="share-a G-sqq" data="qq" title="分享到QQ好友"></a>
							<a class="share-a G-tsina" data="sina" title="分享到新浪微博"></a>
						</div>
						<!--share end-->
					</span>
					
				</div>
				</div>
				<div class="w_info">
				<ul class='w_tit'><?=$row[tit]?></ul>
				<ul class='mt10'>
					<div class='left'>
						<ul class='w_money'>
							<p class='price'>
								<b><em>￥</em><?=$nowmoney?></b>
							</p>
							<p>
							<span>域名：</span>
							<? if(!empty($row[ysweb])){?>
							
							<?=$row[ysweb]?><? }?>						</p>
							<p>
							<span>流量：</span>100 IP  <a class="see_stats links" title="查看该网站第三方统计" id="154538069234"><i>&#xe6b1;</i> 第三方统计</a>							</p>
						</ul>
						<ul class='w_buy'>
					
						
							<a class="w_button cartadd"  id="bcar" href="javascript:buyInto('<?=$row[bh]?>')" title="我要购买"><i class="iconfont">&#xe61e;</i>我要购买</a><a class="w_button cs" href="http://wpa.qq.com/msgrd?v=3&uin=<?=returnqq($row[userid])?>&site=<?=weburl?>&menu=yes"><i class="iconfont">&#xe691;</i>联系卖家</a>
						</ul>
					</div>
					<ul class="w_attr">
					   <? 
   $a=preg_split("/xcf/",$row[tysx]);
   $sx1arr=array();
   $sxall="xcf";
   $m=0;
   for($i=0;$i<=count($a);$i++){
	$ai=$a[$i];
    if($ai!=""){
	if(!is_numeric($ai)){$z1=preg_split("/:/",$ai);$ai=$z1[0];}
    while1("*","epzhu_typesxwz where id=".$ai);if($row1=mysql_fetch_array($res1)){
    if(!in_array($row1[name1],$sx1arr)){$sx1arr[$m]=$row1[name1];$m++;}
	if(!is_numeric($a[$i])){$z1=preg_split("/:/",$a[$i]);$v=$z1[1];}else{$v=$row1[name2];}
	$sxall=$sxall.$row1[name1].":".$v."xcf";
	}
	}
   }
   for($i=0;$i<count($sx1arr);$i++){
   ?>
<p><span><?=$sx1arr[$i]?>：</span> <? $b=preg_split("/xcf/",$sxall);for($j=0;$j<=count($b);$j++){if(check_in($sx1arr[$i],$b[$j])){echo str_replace($sx1arr[$i].":","",$b[$j])." ";}}?> </p>	<? }?>
</li>
					
				
					</ul></div></div>
				<ul class="w_seo">
						<cite>
			<h3>网站内容</h3>
			<span>（内日哦那个仅供参考，更多及最新消息请自行查询）
			以下数据更新时间：<font color="#87A34D"><?=dateYMD($row[lastsj])?></font>						</span>
			</cite>
				
				<ul class="w_desc">
					<? $protxt=$row[txt];?>
 <? if(check_in("video",$row[txt])){?>
 <link href="../config/ueditor/third-party/video-js/video-js.min.css" rel="stylesheet" type="text/css" />
 <script language="javascript" src="../config/ueditor/third-party/video-js/video.dev.js"></script>
 <? }?>
 <?=$protxt?>
				</ul>
			</ul>
			
				
	
				
			</ul>
		
		<!--正文结束-->
		<div class="s_flow g_box">
			<dl>
				<dt><span>交易流程</span></dt>
				<dd><img src="static/picture/web_flow.png" /></dd>
			</dl>
			<dl>
				<dt><span>交易周期</span></dt>
				<dd>
					<p>1、网站交易默认交易周期为5天，买家可操作再延长3天（仅有1次延长权利）；</p>
					<p>2、若上述交易周期双方依然无法完成交易，任意一方可发起追加周期（1~60天）的请求，对方同意即可延长。</p>
				</dd>
			</dl>
			<dl>
				<dt><span>前言</span></dt>
				<dd>
					<p>网站交易因为涉及的交易内容比较多，稍不注意很容易造成损失。为防止这种情况出现，一品猪结合平时交易中遇到的问题为大家整理重点项，如下：</p>
				</dd>
			</dl>
			<dl>
				<dt><span>一、域名</span></dt>
				<dd>
					<p>网站最重要的就是域名，域名的过户交接有2种情况，交易前买家一定要通过whois查询下域名所在注册商，确保卖家说的属实。</p>
					<p>1、<b>转移注册商：</b>例如从万网转到GD，卖家协助从原注册商提取转移密码，买家自己在新平台提交转移，大概5-7天转移成功。一些小的平台提取过程可能比较复杂，需要邮寄资料等，具体最好咨询注册商平台客服。这种交接一般比较安全，基本上不会出现问题；</p>
					<p>2、<b>站内push：</b>例如卖家的域名在万网、易名、爱名等支持PUSH过户的域名注册商，则买家可以在该平台注册账号，卖家直接PUSH给买家即可秒过户，这种方式最方便（特别注意：站内push之前买家一定要综合判断下域名所在平台是否正规。这里列举一个买家被骗的案例：卖家和买家说域名在某某平台，只接受域名push，让买家去注册账号，域名push后，买家确实在自己账号看到了这个域名，等确认交易一品猪付款以后，买家发现被骗，原来所谓的某某平台都是站长用源码自己搭建的平台，站长可以在这个平台任意添加持有某个域名，实际上真正的域名他无权操作）；</p>
					<p>3、<b>域名是否过户成功：</b></p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;方法一：查看whois邮箱是不是自己的资料（不知道怎么查看请百度'whois查询'）；</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;方法二：随便解析一个子域名看看能否生效（解析生效可能需要几分钟或几小时）。</p>
					<p>4、<b>注意：</b>个别小的域名平台，域名push成功，域名资料未必会变成买家的，如果要修改必须要卖家协助。</p>

				</dd>
			</dl>
			<dl>
				<dt><span>二、程序数据</span></dt>
				<dd>
					<p>1、交易前咨询清楚程序源码、程序大小、服务器环境要求等信息，确保都是己方能搞定的或卖家可协助搞定；</p>
					<p>2、如果连同服务器一起转让，则需要注意服务器的到期时间，并记得及时续费，以防到期程序数据被格式化；</p>
					<p>2、数据要备份、备份、备份，重要的事情得说三遍，并且要经常备份，即使数据被格弄丢也不至于一夜回到解放前。</p>
				</dd>
			</dl>

			<dl>
				<dt><span>三、备案问题</span></dt>
				<dd>
					<p>备案的改动过程基本上都会涉及到临时关站，如果要交接，买家必须考虑清楚。一般备案的解决办法：</p>
					<p>1、重新接入备案；</p>
					<p>2、换成国外服务器，可能影响网站速度；</p>
					<p>3、和原站长协商让其保留备案，这个绝大多数的站长还是会同意的，实在担心，可以签订合同；</p>
				</dd>
			</dl>
			<dl>
				<dt><span>四、网站其他</span></dt>
				<dd>
					<p>1、网站流量和权重需买家自行甄别，源站不对流量和权重的准确度和持续性作担保；</p>
					<p>2、但卖家需保证交易期间网站流量和权重与所描述的下降范围不超过10%，否则买家有权取消交易；</p>
					<p>3、如果网站已开通百度、淘宝等广告联盟，买家若要继续用，需交易期间卖家在联盟官方提交申诉删除；</p>
					<p>4、其他的网站日常维护、cdn加速、第三方绑定、客户资源等都比较简单，双方自行沟通交接即可。</p>
				</dd>
			</dl>
			<dl>
				<dt><span>注意事项</span></dt>
				<dd>
					<p>1、在没有"无任何正当退款依据"的前提下，商品写有"一旦售出，概不支持退款"等类似的声明，视为无效声明；</p>
					<p>2、在未拍下前，双方在QQ上所商定的交易内容，亦可成为纠纷评判依据（商定与描述冲突时，商定为准）；</p>
					<p>3、因聊天记录可作为纠纷评判依据，故双方联系时，只与对方在源站上所留的QQ、手机号沟通，以防对方拒不承认自己说过的话。</p>
					<p>4、虽然交易产生纠纷的几率很小，但一定要保留如聊天记录、手机短信等这样的重要信息，以防产生纠纷时便于源站介入快速处理。</p>
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

	<!--右边-->
<? $xy=returnjgdw($rowsell[xinyong],"",returnxy($row[userid],1));?>
	<div id='layer_top'>
			<div class="g_side right">
				<div class="c_g_inf g_box">
					<ul class="c_g_sell">
						<img class="c_s_tx tipss" t-bg='#fff' title='<?=$rowsell[shopname]?>' src="../upload/<?=$row[userid]?>/shop.jpg" width="35" height="35" />
						<span class="c_s_name"><p ><?=$rowsell[shopname]?></p><img class='xy' src='../img/dj/<?=returnxytp($xy)?>' title='信用值<?=$xy?>'></span>
					</ul>
					<ul class="c_s_info">
						<li><span>所在地区：</span>中国大陆</li>
						<li class="certification"><span>商家认证：</span>
						
<? if(1==$rowsell[ifmot]){?><i class="phone success" title="已通过手机认证"></i><? }else{?><i class="phone successs" title="未通过手机认证"></i><? }?>
<? if(1==$rowsell[ifemail]){?><i class="success" title="已通过邮箱认证"></i><? }else{?><i class="successs" title="未通过邮箱认证"></i><? }?>
<? if(1==$rowsell[sfzrz]){?><i class="idcard success" title="已通过身份认证"></i><? }else{?><i class="idcard successs" title="未通过身份认证"></i><? }?>
						
						
					</li>
					</ul>
					<ul class="tit">
						<i class="iconfont" style='font-size:18px;font-weight:normal;'>&#xe62f;</i> 联系卖家
					</ul>
					<ul class="c_s_cont"  id="layer_cont">
					<div class="uim">
<div class="qq" title="联系QQ"><a href="http://wpa.qq.com/msgrd?v=3&uin=<?=returnqq($row[userid])?>&site=<?=weburl?>&menu=yes" target=_blank><?=returnqq($row[userid])?></a></div>
<? if($rowsell[weixin]){?><div class="wechat" title="联系微信"><p><?=$rowsell[weixin]?></p></div><? }?>
<? if($rowsell[mot]){?><div class="phone" title="联系电话"><p><?=$rowsell[mot]?></p></div><? }?></span></div>

					</ul>
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
   <p class="up"><?=returnjgdian($rowsell[pf3])?><i class="iconfont"></i></p>     </cite> 
   </div>
						
					</ul>
					<ul class="shop_btns">
									<a href="/ishop<?=$rowsell[id]?>/">
									  <i class="iconfont va-1">&#xe61d;</i><span>进店逛逛</span>
									</a><? 
  $a1="none";$a2="none";
  if($_SESSION["SHOPUSER"]==""){$a1="";}else{
  if(panduan("*","epzhu_shopfav where shopid=".$rowsell[id]." and userid=".$nuid."")==1){$a2="";}else{$a1="";}
  }
  ?>
  
  <li class="l2" id="favsno" style="display:<?=$a1?>;"><a  href="javascript:shopfavInto(<?=$rowsell[id]?>)" class="collection imfav">
  <i class="iconfont"></i><span>收藏店铺</span>
  </a></li>
   <li class="l2" id="favsyes" style="display:<?=$a2?>;"><a  href="../user/favshop.php" class="collection imfav">
  <i class="iconfont"></i><span>已经收藏</span>
   </a></li>
					</ul>
				</div>
				<!--
				<div class='g_box'>
					<div class="c_l_cap">&nbsp;&nbsp;&nbsp;	店内搜索</div>
					<div class="shop_search Search-box">
						<li class='gradio'>商品：<label class='tips' T-bg='#ff8400' title='本店共有<b>源码</b>(0)个'><input checked type='radio' name='good_type' value='/ishop<?=$row[userid]?>/code/'>源码</label></li>
						<li>搜索：<input type="text" class='inp Search-inp' value id='shop_key' placeholder="店内搜索" name="key" style='width:125px;'/> </li>
						<li>价格：<input name="am" class='inp Search-inp' placeholder='￥' type="text" /> - <input name="dm" class='inp Search-inp' placeholder='￥' type="text" /> </li>
						<li><input type="button" id='shop_search' class='Search-btn btn' value="搜 索" /> </li>
					</div>
				</div>-->
				<div class='lrtop_help' style='margin:0 0 10px 0;padding:18px 0;'>
					<a href='#' target='_blank'><img src='static/picture/ds.gif'></a>
				</div>
				<div class='g_box'>
					<div class="s_tit" style='border: 0;'>广而告之</div>
					<div style='float:left;width:200px;height:200px;overflow:hidden;padding:15px;border-top:#e5e5e5 solid 1px;'>
						
					</div>
				</div>
			</div>
	</div>
</div><? include("../tem/bottom--.html");?>
</body>
</html>