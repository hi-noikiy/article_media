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
<meta name="huzhan-web-verification" content="873ff24e34" />
<meta name="renderer" content="webkit" />
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gbk" />
<meta name="Pg-Type" content="index">
<meta name="keywords" content="<?=$rowcontrol[webkey]?>">
<meta name="description" content="<?=$rowcontrol[webdes]?>">
<title><?=$rowcontrol[webtit]?></title>
<link rel="shortcut icon" href="favicon.ico" />
<link rel="icon" href="favicon.ico" type="image/gif" />
<link href="css/basic2.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="js/jquery.m.js"></script>
<script language="javascript" src="js/layui.js"></script>
<script language="javascript" src="js/common.js"></script>

<script language="javascript" src="js/common2.js"></script>
<script language="javascript" src="js/js/basic.js"></script>
<script language="javascript" src="js/js/index.js"></script>
<script language="javascript" src="js/index.js"></script>
<link href="css/index.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="/web/static/js/common.js"></script>
<script language="javascript" src="./epzhucom/index.js"></script>

<script language="javascript">idldl(1);</script>



</head>
<body>

<span id="webhttp" style="display:none"><?=weburl?></span>
<!--<? if(empty($rowcontrol[ifwap])){?>
<script language="javascript">
if(is_mobile()) {document.location.href= '<?=weburl?>m/';}
</script>
<? }?>-->

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





<!--头部-->
<div class="header">
	<div class="top_box"><script language="javascript">
userCheckses();
</script>
	<div class="main">	<div class="top"> 		<div class="left">			<span id="notlogin">			<li class='not'>您好！欢迎来到<?=webname?></li>			<li class='not'>				<a href="<?=weburl?>reg/reg.php" class='T_a'><i class='iconfont va-2' style='font-size:18px;'>&#xe6aa;</i> 注册</a>			</li>			<li class='arrow'>		<a href="/reg/" class='T_a'>登录<em class='arrow'></em></a>				<div class="change_div top_login"> 
					<a target="_blank" id='qq' href="<?=weburl?>config/qq/oauth/index.php" class='login_icon'>QQ帐号登录</a>
					<? if($rowcontrol[wxlogin]!="" && $rowcontrol[wxlogin]!=","){$wxlogin=preg_split("/,/",$rowcontrol[wxlogin]);?>
					<a target="_blank"  href="https://open.weixin.qq.com/connect/qrconnect?appid=<?=$wxlogin[0]?>&redirect_uri=<?=urlencode(weburl."reg/wxlogin.php")?>&response_type=code&scope=snsapi_login#wechat_redirect"  class='login_icon' id='wechat'>微信帐号登录</a>
					
					<? }?>
				</div>	</li>		</span>	
<span id="yeslogin" style="display:none"><li class="not">您好！</li>
			<li class="arrow"><a href="<?=weburl?>user/" target="_blank" class="T_a"><span id="yesuid"></span>
			<em class="arrow"></em></a>
			<dl class="change_div top_user"><dt>
			<a href="<?=weburl?>user/"><img class="pic_Layer" id="idltx" src=""></a>
					<span>
						<p><em>您的账号：<a href="<?=weburl?>user/" id="idl1"></a></em><input type="button" onclick="window.location.href=&#39;<?=weburl?>user/&#39;;" value="号"></p>
						<p><em>帐户总额：<a href="<?=weburl?>user/pay.php" id="yue"></a> 元</em> <input type="button" onclick="window.location.href=&#39;<?=weburl?>user/pay.php&#39;;" value="充"></p>
						<p><em>帐户冻结：<a href="<?=weburl?>user/paylog.php" id="idl3"></a> 元</em> <input type="button" onclick="window.location.href=&#39;<?=weburl?>user/paylog.php&#39;;" value="结"></p>
						<p><em>可提现额：<a href="<?=weburl?>user/tixian.php" id="idl4"></a> 元</em> <input type="button" onclick="window.location.href=&#39;<?=weburl?>user/tixian.php&#39;;" value="提"></p>
						<p><em>帐户积分：<a href="<?=weburl?>user/qiandao.php"id="idljifen"></a> 积分</em><input type="button" class="signsuc" value="赚"></p>
						</span>
					</dt>
					<dd>
						<a href="<?=weburl?>user/tixian.php"><i class="iconfont"></i><p>提现</p></a>
						<a href="<?=weburl?>user/pwd.php"><i class="iconfont"></i><p>安全</p></a>
						<a href="<?=weburl?>user/smrz.php"><i class="iconfont"></i><p>认证</p></a>
			<a href="<?=weburl?>user/openshoprz.php"><i class="iconfont" style="font-size:27px;margin-top:-2px;padding-bottom:2px;"></i><p>店铺</p></a>					</dd>
					<a class="logout" href="<?=weburl?>user/un.php">退出登陆<i class="iconfont va-1">⿶</i></a>
				</dl>
			</li>
			<li>
				<a href="<?=weburl?>user/qiandao.php" id="needqd" style="display:none;" class="T_a">
				<i class="iconfont va-3" style="font-size:18px;"></i> 今日签到</a>
               <a id="dontqd" style="display:none;" href="<?=weburl?>user/qiandao.php" class="T_a">
				<i class="iconfont va-3" style="font-size:18px;"></i> 已签到</a>


			</li>
			<li>
				<a href="<?=weburl?>user/car.php" class="T_a">
				<i class="iconfont va-2" style="font-size:18px;"></i> 购物车</a>
			</li>
			
			</span>
				</div>	


				<div class="right">
				<li class='not'>
				<a href="<?=weburl?>" target="_blank"class='T_a'>网站首页</a>
				</li>
				<li class='not'>
				<a href="<?=weburl?>mt/" class='T_a'>手机版</a>
				</li>
				<!--<li class='not'>
				<a href="<?=weburl?>ser/newslist.php" target="_blank" class='T_a'>稿件中心</a>
				</li>-->
				<li class='not'>
				<a href="<?=weburl?>help/" class='T_a' target="_blank"> 帮助中心</a>
				</li>
				<li class='arrow'>
				<a href="/" class='T_a'><i class="iconfont va-2 " style='font-size:18px;' >&#xe8a8;</i> 管理中心<em class='arrow'></em></a>
				<div class="change_div top_manage r"> 
							<div class="clearfix">
								<dl>
								<dt>财务管理</dt>
								<dd>
									<a rel="nofollow" href="<?=weburl?>user/pay.php" target="_blank"><strong>在线充值</strong></a>
									<a rel="nofollow" href="<?=weburl?>user/tixian.php" target="_blank"><strong>快速提现</strong></a>
									<a rel="nofollow" href="<?=weburl?>user/tixianlog.php" target="_blank">提现历史</a>
									<a rel="nofollow" href="<?=weburl?>user/paylog.php" target="_blank"><strong>财务明细</strong></a>
									<a rel="nofollow" href="<?=weburl?>user/jflog.php" target="_blank">积分明细</a>
								</dd>
							</dl>
							<dl>
								<dt>我是买家</dt>
								<dd> 
									<a rel="nofollow" href="user/productlist.phpuser/car.php" target="_blank">购物车</a>
									<a rel="nofollow" href="<?=weburl?>task/taskadd.php" >发布需求</a>
									<a rel="nofollow" href="<?=weburl?>user/tasklist.php" target="_blank"><strong>我是雇主</strong></a>
									<a rel="nofollow" href="<?=weburl?>user/taskhflist.php" target="_blank">我是接手</a>
									<a rel="nofollow" href="<?=weburl?>user/order.php" target="_blank"><strong>买入订单</strong></a>
									
								</dd>
							</dl>
							<dl>
								<dt>我是卖家</dt>
								<dd>
									<a rel="nofollow" href="<?=weburl?>user/productlx.php">发布出售</a>
									<a rel="nofollow" href="<?=weburl?>user/productlist.php" target="_blank"><strong>商品管理</strong></a>
									<a rel="nofollow" href="<?=weburl?>user/sellorder.php" target="_blank"><strong>售出订单</strong></a>
									<a rel="nofollow" href="<?=weburl?>user/adlx1.php" target="_blank">自助广告交易</a>
									<a rel="nofollow" href="<?=weburl?>user/shop.php" target="_blank">店铺管理</a>
								</dd>
							</dl> 
						</div>
						<div class="clearfix">
							<dl>
								<dt>帮助咨询</dt>
								<dd>
									<a rel="nofollow" href="<?=weburl?>help/" target="_blank">帮助中心</a>
									<a rel="nofollow" href="<?=weburl?>help/aboutview5.html" target="_blank">隐私条款</a>
									<a rel="nofollow" href="<?=weburl?>help/aboutview4.html" target="_blank">联系客服</a>
									<a rel="nofollow" href="<?=weburl?>help/aboutview2.html" target="_blank">关于我们</a>
								</dd>
							</dl>
							<dl>
								<dt>用户管理</dt>
								<dd>
									<a rel="nofollow" href="<?=weburl?>user/inf.php" target="_blank">基本资料</a>
									<a rel="nofollow" href="<?=weburl?>user/mobbd.php" target="_blank">认证中心</a>
									<a rel="nofollow" href="<?=weburl?>user/favpro.php" target="_blank">我的收藏</a>
									<a rel="nofollow" href="<?=weburl?>user/gdlist.php" target="_blank">工单系统</a>
								</dd>
							</dl>
							<dl>
								<dt>账户安全</dt>
								<dd>
									<a rel="nofollow" href="<?=weburl?>">安全中心</a>
									<a rel="nofollow" href="<?=weburl?>user/pwd.php">修改密码</a>
									<a rel="nofollow" href="<?=weburl?>user/zfmm.php">安全码修改</a>
									<a rel="nofollow" href="<?=weburl?>user/emailbd.php" target="_blank">邮箱认证</a>
								</dd>
							</dl>
						</div>
						<!--[if IE 6]>
							<div style="position:absolute;z-index:-1;left:0;top:0;width:518px;height:510px">  
								<iframe style="width:100%;height:100%;filter:alpha(opacity=0);-moz-opacity:0"></iframe>  
							</div> 
						<![endif]-->
			
				</div>
				</li>
			</div>
		



				</div></div>	</div>
	<div class="general">
		<div class="main">
					<div class='top-logos'>
			<div class="indexlogo-bg"></div>
			<a target="_blank" alt='源站商标' title='商标声明' href='#' class="hz-brand icons"></a>
			<a class="indexlogo" href="<?=weburl?>"></a>
			<img src="picture/t_l.png" class='top-zl'>
			</div>
			
		
			

<script language="javascript">topjconc(1,'商品');document.getElementById("topt").value="<?=$skey?>";</script>
			
			
			
				<li class="search Search-box" onmouseover="topover()" onmouseout="topout()">
	<span class="searchtype">搜源码</span><i></i>
	<form name="topf1" method="post" onsubmit="return topftj()">
	<input  name="topt" id="topt" type="text" class="searchval Search-inp"/>
	<input type="image" src="<?=weburl?>homeimg/so.png" class="searchbtn Search-btn">
	<ul class="searchlist" style="display:none;"> 
	<li data='code'>  <a href="javascript:void();" onclick="topjconc(1,'搜源码')">搜源码</a></li>
	<li data='serve'> <a href="javascript:void();" onclick="topjconc(2,'搜开发')">搜开发</a></li> 
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
				<div class="indexnav-link">
					<li class='left'>
						<a href="<?=weburl?>code/search_j37v.html" class="bold ">源码集市</a><a href="<?=weburl?>serve/search_j208v.html" class="bold ">服务市场</a><a href="/web/search_j213v.html" class="bold ">网站寄售</a><a href="/productym/search_j236v.html" class="">域名交易</a><a href="/task/" class="">任务大厅</a>					</li>
					<li class='right'>
						<a href="<?=weburl?>shop/">商家</a> <a href="<?=weburl?>#">排行</a> <a href="<?=weburl?>#">品牌</a>  <a href="http://bbsxinhuzhan2.a6wang.com/portal.php" target="_blank">博客</a>  <a href="http://bbsxinhuzhan2.a6wang.com/forum.php" target="_blank">社区</a> 
						 <div class="clear"></div>
					</li>
				</div>
		</div>
	</div>
</div>


<!--头部-->
<div class='index-slider'>








	<div class="index-lubo">
		<ul class="index-lubo-box">
	
<li style="opacity:1;filter:alpha(opacity='100');z-index:1"><a href="/protection/" style="background:#47a0e6 url(/images/s_1_2.jpg) center top no-repeat"></a></li>
			<li><a href="/entrusts/" style="background:#093374 url(/images/s_6.png) center top no-repeat"></a></li>
			<li><a href="/help/view/81" style="background:#faeacf url(/images/s_2.png) center top no-repeat"></a></li>
			<li><a href="/jifen/" style="background:#efaa5c url(/images/s_3.png) center top no-repeat"></a></li>
			<!--
  <?
  autoAD("ADI04");
  $i!=1;
  while1("*","epzhu_ad where adbh='ADI04' and zt=0 order by xh asc");while($row1=mysql_fetch_array($res1)){
  ?>
  
  <li><a href="<?=$row1[aurl]?>" style="background:#efaa5c url(gg/<?=$row1[bh]?>.<?=$row1[jpggif]?>) center top no-repeat" style="width:1366px;"></a></li>
  <?
  $i++;
  }
  ?>-->	<cite><a class="lubo-left"></a><a class="lubo-right"></a></cite></ul>
	
	</div>
	<div class="main">
	<div class="sidebar">
			<dl class="sidebar_item">
				<dd id="1">
				<div class="sidebar_menu">
					<h3><i class='iconfont'>&#xe6e7;</i><a href="<?=weburl?>code/search.html" target="_blank">源码集市</a></h3>
					<p>
						<a href="<?=weburl?>user/productlx.php" target="_blank">卖商品</a><a href="<?=weburl?>code/" target="_blank">找商品</a><a href="<?=weburl?>code/" target="_blank">更多</a>
					</p>
					<em class='line'></em>
				</div>
				<div class="sidebar_popup" style="display: none;">
									<div class="sidebar_popup_con clearfix">
											<div class="screen_box">
											<div class="screen_lists">
											
											 <? while1("*","epzhu_type where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
											<div class="screen_list"><div class="screen_name"><i id="isx-1"></i><span>类型</span>：</div><div class="screen_con">
											
											
											
											
											
											<? while2("*","epzhu_type where type1='".$row1[type1]."' and admin=2 order by xh asc");while($row2=mysql_fetch_array($res2)){?>
	  <a href="<?=weburl?>code/search_j<?=$row1[id]?>v_k<?=$row2[id]?>v.html"><?=$row2[type2]?></a>
	  <? }?>  
											
											
											
											
											</div></div> <? }?>
											
											
											
											
											
											</div></div>
									</div>
								</div>


				</dd>
				<dd id="2">
				<div class="sidebar_menu">
					<h3><i class='iconfont'>&#xe6d5;</i><a href="#" target="_blank">域名交易</a></h3>
					<p>
						<a href="/" target="_blank">数字</a><a href="/" target="_blank">拼音</a><a href="/" target="_blank">备案</a><a href="/" target="_blank">求购</a>
					</p>
					<em class='line'></em>
				</div>
				<!-- 弹出层 -->
				<div class="sidebar_popup" style="display: none; ">
					<div class="sidebar_popup_con clearfix">
						<div class="screen_box">
						 <? while1("*","epzhu_typeym where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
							<div class="screen_lists">
							
							
							
							<div class="screen_list"><div class="screen_name"><i id="isx-67"></i><span>类型</span>：</div><div class="screen_con"<? while2("*","epzhu_typeym where type1='".$row1[type1]."' and admin=2 order by xh asc");while($row2=mysql_fetch_array($res2)){?>
	  <a href="<?=weburl?>serve/search_j<?=$row1[id]?>v_k<?=$row2[id]?>v.html"><?=$row2[type2]?></a>
	  <? }?></div></div>
							
							
						</div>    <? }?>
						</div>
					</div>
				</div>
				</dd>
				<dd id="3">
				<div class="sidebar_menu">
					<h3><i class='iconfont'>&#xe6d4;</i><a href="/" target="_blank">网站寄售</a></h3>
					<p>
						<a href="/" target="_blank">电子商务</a><a href="/" target="_blank">行业</a><a href="/ target="_blank">求购</a>
					</p>
					<em class='line'></em>
				</div>
				<div class="sidebar_popup" style="display: none; ">
					<div class="sidebar_popup_con clearfix">
						<div class="screen_box">
						
						
						<? while1("*","epzhu_typewz where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
							<div class="screen_lists">
							<div class="screen_list"><div class="screen_name"><i id="isx-151"></i><span>类型</span>：</div><div class="screen_con">
							
							 <? while2("*","epzhu_typewz where type1='".$row1[type1]."' and admin=2 order by xh asc");while($row2=mysql_fetch_array($res2)){?>
	  <a href="<?=weburl?>serve/search_j<?=$row1[id]?>v_k<?=$row2[id]?>v.html"><?=$row2[type2]?></a>
	  <? }?>
							</div></div>
							
							</div>
							
							
							  <? }?>
						</div>
					</div>
				</div>
				</dd>
				<dd id="4">
				<div class="sidebar_menu">
					<h3><i class='iconfont'>&#xe6e6;</i><a href="<?=weburl?>task/" target="_blank">任务大厅</a></h3>
					<p>
						<a href="/" target="_blank">网站开发</a><a href="/" target="_blank">安全</a><a href="/" target="_blank">二开</a>
					</p>
					<em class='line'></em>
				</div>
				<!-- 弹出层 -->
				<div class="sidebar_popup" style="display: none; ">
					<div class="sidebar_popup_con clearfix">
						<div class="screen_box">
							<div class="screen_lists">
							
							<? while1("*","epzhu_tasktype where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
							
							<div class="screen_list"><div class="screen_name"><i id="isx-129"></i><?=$row1[name1]?>：</div><div class="screen_con">	  <? while2("*","epzhu_tasktype where admin=2 and name1='".$row1[name1]."' order by xh asc");while($row2=mysql_fetch_array($res2)){?>
      <a href="<?=weburl?>task/search_j<?=$row1[id]?>v_k<?=$row2[id]?>v.html"><?=$row2[name2]?></a>
      <? }?></div></div>	

  <? }?>

							</div>
						</div>
					</div>
				</div>
				</dd>
				<dd id="5">
				<div class="sidebar_menu">
					<h3><i class='iconfont'>&#xe8a9;</i><a href="/serve/search_j208v.html" target="_blank">服务市场</a></h3>
					<p>
						<a href="/">开发</a> <a href="/">搬家</a>   <a href="/">BUG</a>  <a href="/">维护</a> 
					</p>
					<em class='line'></em>
				</div>
				<!-- 弹出层 -->
				<div class="sidebar_popup" style="display: none; ">
					<div class="sidebar_popup_con clearfix">
						<div class="screen_box">
							<div class="screen_lists">
							 <? while1("*","epzhu_typekf where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
							<div class="screen_list"><div class="screen_name"><i id="isx-253"></i><span><?=$row1[type1]?></span>：</div><div class="screen_con"> <? while2("*","epzhu_typekf where type1='".$row1[type1]."' and admin=2 order by xh asc");while($row2=mysql_fetch_array($res2)){?>
	  <a href="<?=weburl?>serve/search_j<?=$row1[id]?>v_k<?=$row2[id]?>v.html"><?=$row2[type2]?></a>
	  <? }?></div></div>
	  <? }?>							</div>
						</div>
					</div>
				</div>
				</dd>
				<dd id="5">
				<div class="sidebar_menu">
					<h3><i class='iconfont'>&#xe97a;</i><a href="#" target="_blank">互动社区</a></h3>
					<p>
						<a href="#" target="_blank">互动交流</a><a href="#" target="_blank">建议</a><a href="#" target="_blank">举报</a>
					</p>
					<em class='line'></em>
				</div>
				</dd>
				<dd id="5">
				<div class="sidebar_menu">
					<h3><i class='iconfont'>&#xe6e4;</i><a href="#" target="_blank">博客博文</a></h3>
					<p>
						<a href="#" target="_blank">热点博文</a><a href="#" target="_blank">写博文</a>
					</p>
					<em class='line'></em>
				</div>
				</dd>
				<dd id="5">
					<div class="sidebar_menu last">
						<h3><i class='iconfont'>&#xe6e3;</i><a href="#" target="_blank">品牌展示</a></h3>
						<p>
							<a href="/" target="_blank">源码</a><a href="/" target="_blank">培训</a><a href="/" target="_blank">电商</a><a href="/" target="_blank">服务</a>
						</p>
					</div>
				</dd>

			</dl>
		</div>
   <!--主导航下拉结束-->
  

		
				

	<div class="t-right">
		
	<div class='t-right-box'><div class="t-right-bg">
</div>
		<ul class="rtop">
			<cite></cite>
			<div>
				<a href='/help/view18.html' target='_blank'><i class='icons i-buy'></i><p>如何购买</p></a>
				<a href='/help/ggview20.html' target='_blank'><i class='icons i-shop'></i><p>如何开店</p></a>
				<a href='/help/gglist.html' target='_blank'><i class='icons i-help'></i><p>帮助中心</p></a>
			</div>
        </ul>
		


		
		<div class="rbottom">

		
<span id="idlno">	
	
			<ul class="ruser" >
					<a href="javascript:;" class="avatar">
		<img  src="picture/none.jpg">
	</a>
	<div class="info" >
		<p>您好，欢迎来到源站！</p>
		
		
		
		
		<div class="login-btn"><a href="<?=weburl?>reg/reg.php" >注册</a><span>/</span><a href="reg/">登录</a></div>
		
		</div>
		
</ul></span>
	  <div id="idlyes" style="display:none;">
		<ul class="ruser">	
	<a href="<?=weburl?>user/touxiang.php" class="avatar"><img border="0" id="idltx1" src=""  />
	</a>
	<div class="info">
		<p>
			您好，<b><span id="yesuid1"></span></b>
		</p>
		<div class="iu_link">
							<a href="<?=weburl?>user/">管理中心</a>
				<a href="user/favpro.php">我的收藏</a>
				<a href="user/order.php">订单</a>
					</div>
	</div>


 <ul class="u1 fontyh">


 </ul>

			
 </div>

	
			</ul>
			<ul class="rnotice">
				<h3></h3>
				<div>
							<? while0("*","epzhu_gg where zt=0 order by sj desc limit 5");while($row=mysql_fetch_array($res)){?>

 
 <a href="help/ggview<?=$row[id]?>.html"  title=" <?=strgb2312($row[tit],0,60)?>" target='_blank'><i></i> <?=strgb2312($row[tit],0,60)?></a>
 
<? }?> 
								</div>
			</ul>
			<dl class="rmerit">
				<dt>
					<li class='curr'>
						<a><em class='icons i-kj'></em><i class='icons'></i>					
							<p>快捷方便</p>
						</a>
					</li>
					<li>
						<a><em class='icons i-jy'></em><i class='icons'></i>			
							<p>担保交易</p>
						</a>
					</li>
					<li>
						<a><em class='icons i-xb'></em><i class='icons'></i>
							<p >消费保障</p>	
						</a>
					</li>
					<li class='last'>
						<a><em class='icons i-sm'></em><i class='icons'></i>
							<p >实名商家</p>						
						</a>
					</li>
				</dt>

				<dd style='display:block'>
					随时随地，只需1分钟即可轻松建立交易！
				</dd>
				<dd class='m'>
					基于淘宝式的担保交易流程，加上源站多年丰富的中介服务经验，让交易变的更安全！
				</dd>
				<dd class='m'>		
					同消保商家进行交易，若交易失败（退款）可额外获交易金额5~10%的消保赔付金！
				</dd>
				<dd>
					所有商家均已通过手机、身份实名认证！
				</dd>
			</dl>
			<div class="scroll-search">
				<em class='icons'></em>
				<input name="" class='scroll-input'type="text" placeholder="请输入商家QQ或手机号码" x-webkit-speech="" x-webkit-grammar="bUIltin:search"><a id="search_seller">店铺直达</a>
			</div>			
		</div>
	</div>
</div>
		
		
		
		
	

</div>
</div>
<div class="index-scroll">
	<div class='main'>
		<div class="scrollbox">
			<div class="scrollico icons">
			</div>
			<div class="scrollitit">
			最新交易：
			</div>
			<div id="scrollDiv" class="scroll-box" times='3000' items='1'>
			
			
			
			
			<ul>
		 <? $i=0;while1("*","epzhu_order where (ddzt='wait' or ddzt='db' or ddzt='suc') order by sj desc limit 10");while($row1=mysql_fetch_array($res1)){while2("id,bh,tit","epzhu_pro where bh='".$row1[probh]."'");;$row2=mysql_fetch_array($res2);
			 while3("*","epzhu_user where id=".$row1[userid]);$row3=mysql_fetch_array($res3);
		 ?>
		 
						<LI>
			<img src='<?=returntppd("upload/".$row3[id]."/user.jpg","img/none180x180.gif")?>'>
			<a href="code/goods<?=$row2[id]?>.html" target=_blank>
				<i class='red'>[<?=returnorderzt($row1[ddzt])?>]</i>
				
				<strong><?=mb_substr(returnnc($row1[userid]),0,2);?>***<?=mb_substr(returnnc($row1[userid]),-2,2);?></strong><em><?=$row1[money1]?></em>购买了<span><?=returntitdian($row1[tit],50)?></span>
			</a>
			</LI>	
 <? $i++;}?>


			
					
						</ul>
			</div>
			<div class="scrollac"><a title="向上" id="scroll-prev" action='prev' class='icons scroll-action'></a><a title="向下" id="scroll-next" action='next' class='icons scroll-action'></a></div>
		</div>
		<div class="scroll-index">

			<div class='right'>
			<cite>成交<i><?=sprintf("%.0f",$inittjarr[3]+returnsum("money1*num","epzhu_order where ddzt<>'backsuc' and ddzt<>'close'")+returnsum("money1*num","epzhu_orderkf where ddzt<>'backsuc' and ddzt<>'close'")+returnsum("money1*num","epzhu_orderyy where ddzt<>'backsuc' and ddzt<>'close'")+returnsum("money1*num","epzhu_orderym where ddzt<>'backsuc' and ddzt<>'close'")+returnsum("money1*num","epzhu_ordermg where ddzt<>'backsuc' and ddzt<>'close'")+returnsum("money1*num","epzhu_orderzh where ddzt<>'backsuc' and ddzt<>'close'")+returnsum("money1*num","epzhu_orderwz where ddzt<>'backsuc' and ddzt<>'close'"))?></i>元</cite>
			<cite>商  品：<i>
<?=returncount("epzhu_pro where zt<>99")+returncount("epzhu_prokf where zt<>99")+returncount("epzhu_proyy where zt<>99")+returncount("epzhu_proym where zt<>99")+returncount("epzhu_promg where zt<>99")+returncount("epzhu_prowz where zt<>99")+returncount("epzhu_prozh where zt<>99")?> </i> 个</cite>
			<cite>交易<i><?=$inittjarr[2]
                                          +returncount("epzhu_order where (ddzt='wait' or ddzt='db' or ddzt='back' or ddzt='suc')")
										  +returncount("epzhu_orderkf where (ddzt='wait' or ddzt='db' or ddzt='back' or ddzt='suc')")
										  +returncount("epzhu_orderyy where (ddzt='wait' or ddzt='db' or ddzt='back' or ddzt='suc')")
										  +returncount("epzhu_ordermg where (ddzt='wait' or ddzt='db' or ddzt='back' or ddzt='suc')")
										  +returncount("epzhu_orderwz where (ddzt='wait' or ddzt='db' or ddzt='back' or ddzt='suc')")
										  +returncount("epzhu_orderym where (ddzt='wait' or ddzt='db' or ddzt='back' or ddzt='suc')")?></i>笔</cite>
			<cite>会员<i><?=$inittjarr[4]+returncount("epzhu_user")?></i>位</cite>
			<cite>商家<i><?=returncount("epzhu_user where shopzt=2")?></i>家</cite>
			</div>
			<div class='right'>
			<em class='icons'></em>		
			<span>平台指数：</span>
			</div>
		</div>

	</div>
</div>
<div class='main'>
	<div class='index-goods'>
		<div class='goods-sidebar'>
			<h3>
				<a href='/code/' target="_blank" title='查看更多源码'>
				<i class='iconfont'>&#xe6e7;</i>
				<p>源码</p>
				</a>
			</h3>
			<cite class='sidebar-toggle'>
				<a class='curr'>推荐源码</a>
				<a>最新出售</a>
				
			</cite>
			<div class='shop'> 
				<i class='iconfont'>&#xe66d;</i><p>推荐<br>店铺</p>
			</div>
		</div>
		<div class='goods-box'>
			<div class='goods-main'>	
<? 
$i=1;
while1("*","epzhu_pro where zt=0 and ifxj=0 and iftuan=1 and yhxs=2 and yhsj2>'".$sj."' order by yhsj2 asc limit 5");while($row1=mysql_fetch_array($res1)){
$money1=returnyhmoney($row1[yhxs],$row1[money2],$row1[money3],$sj,$row1[yhsj1],$row1[yhsj2],$row1[id]);
$au="code/goods".$row1[id].".html";
$dqsj=str_replace("-","/",$row1[yhsj2]);
while2("*","epzhu_user where id=".$row1[userid]);$row2=mysql_fetch_array($res2);
?>

			
							<dl>
					<dt>
						<a href='<?=$au?>' class='goods-img' title='<?=strgb2312($row1[tit],0,36)?>' target="_blank">
						<img src='<?=returntppd(returntp("bh='".$row1[bh]."'","-1"),"img/none200x200.gif")?>'>
						</a>
					</dt>
					<dd>
					<a href='<?=$au?>' title='<?=strgb2312($row1[tit],0,36)?>' class='tit' target="_blank">
						<?=strgb2312($row1[tit],0,36)?>					</a>
					<h2>￥<?=$money1?></h2>
					<span>
						<img src='<?=returntppd("upload/".$row2[id]."/shop.jpg","img/none180x180.gif")?>'>
						<a title='<?=$row2[shopname]?>' href='/ishop<?=$row2[id]?>/' target="_blank">
							<?=$row2[shopname]?>						</a>
					</span>
					</dd>
				</dl>    
   <? $i++;}?>

				
							
					 
				<div class="clear"></div>
			</div>
			<div class='goods-main hide'>
			
			
			 <? 
 $i=1;
 while0("*","epzhu_pro where ifxj=0 and zt=0 order by lastsj desc limit 5");while($row=mysql_fetch_array($res)){
 if($i % 5==0){$nc=" u0";}else{$nc="";}
 $au="code/goods".$row[id].".html";
 $money1=returnjgdian(returnyhmoney($row[yhxs],$row[money2],$row[money3],$sj,$row[yhsj1],$row[yhsj2],$row[id]));
 while2("*","epzhu_user where id=".$row[userid]);$row2=mysql_fetch_array($res2);
 ?>
 
 
 
							<dl>
					<dt>
						<a href='<?=$au?>' class='goods-img'  title=' <?=strgb2312($row[tit],0,30)?>' target="_blank">
						<img src='<?=returntppd(returntp("bh='".$row[bh]."'","-2"),"img/none60x60.gif")?>'>
						</a>
					</dt>
					<dd>
					<a href='<?=$au?>' title=' <?=strgb2312($row[tit],0,30)?>' class='tit' target="_blank">
						 <?=strgb2312($row[tit],0,30)?>			</a>
					<h2>￥<?=$money1?></h2>
					<span>
						<img src='<?=returntppd("upload/".$row2[id]."/shop.jpg","img/none180x180.gif")?>'> 
						<a title='<?=$row2[shopname]?>' href='/ishop<?=$row2[id]?>/' target="_blank"><?=$row2[shopname]?></a>
					</span>
					</dd>
				</dl>    <? $i++;}?>      
							
				
				<div class="clear"></div>
			</div>
			
		</div>
		<div class='goods-shop'>
		
		 <? 
   while1("*","epzhu_user where zt=1 and shopzt=2 and shopname<>'' and pm>0 order by pm asc limit 8");for($i=1;$i<=5;$i++){
   if($row1=mysql_fetch_array($res1)){
   $sucnum=returnjgdw($row1[xinyong],"",returnxy($row1[id],1));
   ?>
		
				<dl>
			<dt>
				<a class="avatar" href="/ishop<?=$row1[id]?>/" target="_blank">
					<img alt=""  src="<?=returntppd("upload/".$row1[id]."/shop.jpg","img/none180x180.gif")?>">
				</a>
				<span class="info">
					<a href="/ishop<?=$row1[id]?>/" target="_blank" class="name" title=""> <?=strgb2312($row1[shopname],0,17)?></a>
					<p><img class='xy' src='../img/dj/<?=returnxytp($sucnum)?>' title='<?=$sucnum?>'></p>
				</span>
			</dt>
			<? while2("*","epzhu_pro where userid=".$row1[id]." and zt=0 and ifxj=0 and iftj>0 order by iftj asc");if($row2=mysql_fetch_array($res2)){?>
			<dd>
							<p><em>￥<?=returnjgdian(returnyhmoney($row2[yhxs],$row2[money2],$row2[money3],$sj,$row2[yhsj1],$row2[yhsj2],$row2[id]))?></em><a href="code/goods<?=$row2[id]?>.html" target="_blank" title="<?=returntitdian($row2[tit],30)?>"><?=returntitdian($row2[tit],30)?></a></p>
						</dd>
			<strong>TA的源码<i>(<?=returncount("epzhu_pro where zt=0 and ifxj=0 and userid=".$row1[id])?>)</i></strong>	<? }?>
		</dl>  <? }}?>       
			
				</div>
	</div>

	<div class='index-goods  index-goods-serve'>
		<div class='goods-sidebar sidebar-serve'>
			<h3>
				<a href='/serve/' target="_blank" title='查看更多服务'>
				<i class='iconfont'>&#xe8a9;</i>
				<p>服务</p>
				</a>
			</h3>
			<cite class='sidebar-toggle'>
				<a class='curr'>最新服务</a>
			
			</cite>
			<div class='shop'> 
				<i class='iconfont'>&#xe66d;</i><p>推荐<br>商家</p>
			</div>
		</div>
		<div class='goods-box'>
			<div class='goods-main goods-serve'>
			 <? 
 $i=1;
 while0("*","epzhu_prokf where ifxj=0 and zt=0 order by lastsj desc limit 5");while($row=mysql_fetch_array($res)){
 if($i % 5==0){$nc=" u0";}else{$nc="";}
 $au="serve/goods".$row[id].".html";
 $money1=returnjgdian(returnyhmoney($row[yhxs],$row[money2],$row[money3],$sj,$row[yhsj1],$row[yhsj2],$row[id]));
 while2("*","epzhu_user where id=".$row[userid]);$row2=mysql_fetch_array($res2);
 ?>
							<dl>
					<dt>
						<a href='<?=$au?>' title='  <?=strgb2312($row[tit],0,30)?>' target="_blank">
						<img src='<?=returntppd(returntp("bh='".$row[bh]."'","-2"),"img/none300x188.gif")?>'>
						</a>
					</dt>
					<dd>
						<a href='<?=$au?>' title='  <?=strgb2312($row[tit],0,30)?>' class='tit' target="_blank">  <?=strgb2312($row[tit],0,30)?></a>
						<h2>￥<?=$money1?></h2>
						<span>
							<img src='<?=returntppd("upload/".$row2[id]."/shop.jpg","img/none180x180.gif")?>'>
							<a title='<?=$row2[shopname]?>' href='/ishop<?=$row2[id]?>/' target="_blank"><?=$row2[shopname]?></a>
						</span>
					</dd>
				</dl> <? $i++;}?>
				
			<div class="clear"></div>
			</div>
			
		</div>
		<div class='goods-shop'>
		 <? 
   while1("*","epzhu_user where zt=1 and shopzt=2 and shopname<>'' and pm>0 order by pm desc limit 8");for($i=1;$i<=5;$i++){
   if($row1=mysql_fetch_array($res1)){
   $sucnum=returnjgdw($row1[xinyong],"",returnxy($row1[id],1));
   ?>
				<dl>
			<dt>
				<a class="avatar" href="/ishop<?=$row1[id]?>/" target="_blank">
					<img alt=""  src="<?=returntppd("upload/".$row1[id]."/shop.jpg","img/none180x180.gif")?>">
				</a>
				<span class="info">
					<a href="/ishop<?=$row1[id]?>/" target="_blank" class="name" title=""><?=strgb2312($row1[shopname],0,17)?>8</a>
					<p><img class='xy' src='../img/dj/<?=returnxytp($sucnum)?>' title='<?=$sucnum?>点信誉值'></p>
				</span>
			</dt>
			<dd> 
				<strong>TA的服务<i>(<?=returncount("epzhu_prokf where zt=0 and ifxj=0 and userid=".$row1[id])?>)</i></strong>
				<? while2("*","epzhu_prokf where userid=".$row1[id]." order by iftj asc");if($row2=mysql_fetch_array($res2)){?>
									<p><em>￥<?=returnjgdian(returnyhmoney($row2[yhxs],$row2[money2],$row2[money3],$sj,$row2[yhsj1],$row2[yhsj2],$row2[id]))?></em><a href="/serve/goods<?=$row2[id]?>.html" target="_blank" title="<?=returntitdian($row2[tit],30)?>"><?=returntitdian($row2[tit],30)?></a></p>	 	<? }?>
	
							</dd>
		</dl>   <? }}?>      
				
				</div>
	</div>

	<div class='index-goods  index-goods-web'>
		<div class='goods-sidebar sidebar-web'>
			<h3>
				<a href='/web/' target="_blank" title='查看更多网站'>
				<i class='iconfont'>&#xe6d4;</i>
				<p>网站</p>
				</a>
			</h3>
			<cite class='sidebar-toggle'>
				<a class='curr'>最新网站</a>
				
			</cite>
		</div>
		<div class='goods-box'>
			<div class='goods-web'>
			
			
 <? 
 $i=1;
 while0("*","epzhu_prowz where ifxj=0 and zt=0 order by lastsj desc limit 5");while($row=mysql_fetch_array($res)){
 if($i % 5==0){$nc=" u0";}else{$nc="";}
 $au="web/goods".$row[id].".html";
 $money1=returnjgdian(returnyhmoney($row[yhxs],$row[money2],$row[money3],$sj,$row[yhsj1],$row[yhsj2],$row[id]));
 ?>
			
							<dl>
					<dt>
						<em>￥<?=$money1?></em>
						<a href='<?=$au?>' title=' <?=strgb2312($row[tit],0,30)?>' target="_blank"><span> <?=$row[ysweb]?></span></a>
					</dt>
					<dd>
						<a href='<?=$au?>' title='<?=strgb2312($row[tit],0,30)?>' target="_blank">
							<img src='<?=returntppd(returntp("bh='".$row[bh]."'","-2"),"img/none300x188.gif")?>'>
							<h3> <?=strgb2312($row[tit],0,30)?></h3>
						</a>
					</dd>
				</dl> <? $i++;}?>
			</div>

		</div>
	</div>

	<div class='index-goods  index-goods-domain'>
		<div class='goods-sidebar sidebar-domain'>
			<h3>
				<a href='/productym/' target="_blank" title='查看更多域名'>
				<i class='iconfont'>&#xe6d5;</i>
				<p>域名</p>
				</a>
			</h3>
			<cite class='sidebar-toggle'>
				<a class='curr'>最新域名</a>
				
			</cite>
		</div>
		<div class='goods-box'>
			<div class='goods-domain'>
			
			
			 <? 
 $i=1;
 while0("*","epzhu_proym where ifxj=0 and zt=0 order by lastsj desc limit 10");while($row=mysql_fetch_array($res)){
 if($i % 5==0){$nc=" u0";}else{$nc="";}
 $au="productym/view".$row[id].".html";
 $money1=returnjgdian(returnyhmoney($row[yhxs],$row[money2],$row[money3],$sj,$row[yhsj1],$row[yhsj2],$row[id]));
  while2("*","epzhu_user where id=".$row[userid]);$row2=mysql_fetch_array($res2);
 ?>
							<dl>
					<dt>
						<a href="<?=$au?>"  target="_blank" title=" <?=strgb2312($row[ysweb],0,30)?>"> <?=strgb2312($row[ysweb],0,30)?></a>
					</dt>
					<dd>
							<h3 title="&nbsp; <?=strgb2312($row[tit],0,60)?>">
								&nbsp; <?=strgb2312($row[tit],0,60)?></h3>
						
						<h2>
							￥<?=$money1?>						</h2>
						<span>
							<a href="/ishop<?=$row2[id]?>/" target="_blank" title="<?=$row2[shopname]?>">
								<img src='<?=returntppd("upload/".$row2[id]."/shop.jpg","img/none180x180.gif")?>'><?=$row2[shopname]?>							</a>
						</span>
					</dd>
				</dl>
							  <? $i++;}?>
						</div>
		
		</div>
	</div>
	<div class='index-goods  index-goods-task'>
		<div class='goods-sidebar sidebar-task'>
			<h3>
				<a href='/task' target="_blank" title='查看更多任务'>
				<i class='iconfont'>&#xe6e6;</i>
				<p>任务</p>
				</a>
			</h3>
			<cite class='sidebar-toggle'>
				<a class='curr'>最新任务</a>
			</cite>
		</div>
		<div class='goods-box goods-task'>
			<div class='goods-task'>
			 <?
 pagef($ses,4,"epzhu_task","order by sj desc");while($row=mysql_fetch_array($res)){
 taskok($row[id]);
   while2("*","epzhu_user where id=".$row[userid]);$row2=mysql_fetch_array($res2);
 ?>
							<dl>
					<dt>
						<a href="/task/view<?=$row[id]?>.html" class='tit'  target="_blank" title="<?=$row[tit]?>">
							<em>￥<?=$row[money1]?></em>
							<?=$row[tit]?>						</a>
						<span>
							<img src='<?=returntppd("upload/".$row2[id]."/shop.jpg","img/none180x180.gif")?>'>
							<a><?=$row2[shopname]?></a>
						</span>
					</dt>
					<dd>
						<h3>
							<?=returntitdian($row[tit],50)?>			</h3>
					</dd>
				</dl>
				
				
				 <? }?>
							
						</div>
		</div>



	</div>
	
	
<div class="index-news index-link"style="

    width: 1200px;
    margin: 0 auto;
">
		<div class="index-blog left">
			<h3>
				<span>博客热点</span>
				<a href="http://bbsxinhuzhan2.a6wang.com/portal.php">更多&gt;</a>
			</h3>
			<div class="index-blog-wrap">
				<div class="index-blog-lubo">
				
											<li ><? adwhile("ADI151");?></a></li>
						
					<cite><a class="lubo-left"></a><a class="lubo-right"></a></cite>			
				<ul class="lubo-box-btn" style="left: 50%; margin-left: -17.5px; bottom: 10%;"></ul></div>
				<div class="index-blog-list">
					<div class="rec">
					</div><script type="text/javascript" src="http://bbsxinhuzhan2.a6wang.com/api.php?mod=js&bid=13"></script>	</div>                
			</div>
		</div>
		<div class="index-bbs">
			<h3>
				<span>交流社区</span>
				<a href="http://bbsxinhuzhan2.a6wang.com/forum.php">更多&gt;</a>
			</h3>
			<div class="index-bbs-list">
								
										<script type="text/javascript" src="http://bbsxinhuzhan2.a6wang.com/api.php?mod=js&bid=12"></script>
										
							</div>
		</div>
	</div>
	
	
	<!--
	
	<div class="index-news index-link">
		<div class="index-blog left">
			<h3>
				<span>博客热点</span>
				<a href="#">更多&gt;</a>
			</h3>
			<div class="index-blog-wrap">
				<div class="index-blog-lubo">
					<ul class="index-blog-lubo-box">
											<li style="opacity: 1;filter:alpha(opacity=100);"><a href="#" style="background:url(images/20181537469361350.jpg) center top no-repeat" target="_blank" title="关于严厉打击假冒源站商标、风格样式及经营模式的声明"></a></li>
						
					</ul>						
				</div>
				<div class='index-blog-list'>
					
       <?
  $sql="select * from epzhu_forum where uid=1 order by time asc limit 6";mysql_query("SET NAMES 'GBK'");$res=mysql_query($sql);while($row=mysql_fetch_array($res)){
  ?>
										<a href="http://www.epzhu.com/index.php/thread/<?=$row[id]?>.html" target="_blank" title='<?=$row[title]?>'><?=$row[title]?></a>     <?
	  }
  ?>           
									</div>                
			</div>
		</div>
		<div class="index-bbs">
			<h3>
				<span>交流社区</span>
				<a href="http://www.epzhu.com">更多&gt;</a>
			</h3>
			<div class="index-bbs-list">
			
			
			   
       <?
  $sql="select * from epzhu_forum where uid=1 order by time asc limit 7";mysql_query("SET NAMES 'GBK'");$res=mysql_query($sql);while($row=mysql_fetch_array($res)){
  ?>

 
			
			
									<li><a href="http://www.epzhu.com/index.php/thread/<?=$row[id]?>.html" target="_blank"><?=$row[title]?></a><span class="right"><?=date('y-m-d',strftime($row[time]))?></span></li>	     <?
	  }
  ?>           
      
									
							</div>
		</div>-->

	<div class="index-news index-link">
		<h3 style='margin:0'>
			<span>友情链接</span>
			<a target="_blank" href="/">申请友链&gt;</a>
		</h3>
		<dl>
			<dt>
			<? autoAD("ADI13");while0("*","epzhu_ad where adbh='ADI13' and zt=0 order by xh asc");while($row=mysql_fetch_array($res)){?>
		<a href="<?=$row[aurl]?>" target="_blank" rel="nofollow"><img alt="<?=$row[tit]?>" border=0 src="gg/<?=$row[bh]?>.<?=$row[jpggif]?>" style="width:110px;height:36px;"></a>
	 <? }?>
				

			</dt>
			<dd>
								 <? autoAD("ADI14");while0("*","epzhu_ad where adbh='ADI14' and zt=0 and type1='文字' order by xh asc");while($row=mysql_fetch_array($res)){?>
 <a href="<?=$row[aurl]?>" target="_blank"><?=$row[tit]?></a>
 <? }?>
									<a href="/" title="更多>" target="_blank">更多></a>
							</dd>
		</dl>
	</div>
</div>
<? include("tem/bottom--.html");?>


</body>
</html>