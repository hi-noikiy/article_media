<?
include("../config/conn.php");
include("../config/function.php");
include("../config/xy.php");
sesCheck();
while0("*","epzhu_user where uid='".$_SESSION[SHOPUSER]."'");if(!$row=mysql_fetch_array($res)){php_toheader("un.php");}
createDir("../upload/".$row[id]."/");
$userdj=returnuserdj($row[id]);
if(empty($userdj)){
while1("*","epzhu_userdj where zt=0 order by xh asc");if($row1=mysql_fetch_array($res1)){$userdj=$row1[name1];}
}
$usertx="../upload/".$row[id]."/user.jpg";if(!is_file($usertx)){$usertx="img/nonetx.gif";}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>我的管理中心</title>
<link href="static/css/basic.css" rel="stylesheet" type="text/css" /><script language="javascript" src="static/js/jquery.m.js"></script><script language="javascript" src="static/js/layui.js"></script><script language="javascript" src="static/js/common.js"></script><script language="javascript" src="static/js/member.js"></script><link href="static/css/member.css" rel="stylesheet" type="text/css" /><link href="static/css/layui.css" rel="stylesheet" type="text/css" /></head>
<body>
<!--头部-->
<div class="uhead">
	<div class="umain" >
	<a class="logo" href="#"><img src="static/picture/logos.png"></a>
	<form class="layui-form uso first_search" action="" method="post" target="_blank">
				<div class="layui-input-inline" style="width:79px;">
				<div class="uso-select">
				<input type="text" placeholder="订单号" value="订单号" readonly="" class="layui-input layui-unselect"> <i class='icons'></i>
				<dl class='first_select'>
				<dd value="order"  tips="售出订单号"  class="layui-this">订单号</dd><dd value="qq"  tips="买家QQ"  >买家QQ</dd><dd value="phone"  tips="买家电话"  >买家电话</dd><dd value="nice"  tips="买家昵称"  >买家昵称</dd>				</dl>
				</div>
				</div>
				<div class="layui-input-inline first_input">
					<input name="first_input" class="layui-input Search-inp" placeholder="请输入售出订单号" style="width:150px;" autocomplete="off" value="" maxlength="20" type="text"> 
					<a title="清除">X</a>
				</div> 
				<input type="hidden" name="first_select" value='order'>
				<input type="hidden" name="first_role" value='sell'>
		</form>
	<ul class="ubar">
		<li class="uinfo">
			<p>
				<img src="<?=$usertx?>" /><?=$row[nc]?>			</p>
	
			<div>
				<ol></ol>
				<ul class='u1'>
					<span>余 额：<a href="paylog.php"><?=str_replace("-0.00","0",sprintf("%.2f",$row[money1]))?></a> 元</span>
					<span>积 分：<a href="#"><?=$row[jf]?></a> </span>
				</ul>
				<ul class='u2'>
					<a href="<?=weburl?>user/un.php">退出</a>
				</ul>
			</div>
		<li class="message">
			<p>
		
				<i class="t_xx"></i>消息			</p>
			<div>
				<ol></ol>		
				<ul class='u2 MemberTopMessageList'>	 
				<cite class="MessageUnreadNot show"><p class="iconfont">&#xe6ae;</p>亲，当前没有新消息！</cite>				</ul>
				<ul class='u1'>
					<b class="MessageAllRead">没有未读的消息</b> <a target="_blank" href="#" class='message_more'>查看更多</a>
				</ul>
			</div>
		</li>
		<li class="hzlink">
			<p>
				<i class="t_dh"></i>导航
			</p>
			<div>
				<ol></ol>
								<a target="_blank" href="#" style="border:0;">我的店铺</a>
				<a target="_blank" href="#" style='border-bottom: 1px solid #F1F1F1;'>我的品牌</a>
								<a target="_blank" href="/code" style="border:0">源码集市</a>
				<a target="_blank" href="/serve">服务市场</a>
				<a target="_blank" href="/productym/search_j236v.html">域名交易</a>
				<a target="_blank" href="/web/">网站交易</a>
				<a target="_blank" href="/task/">任务大厅</a>
				<a target="_blank" href="/shop">商家专区</a>
				<a target="_blank" href="http://www.epzhu.com/">互站社区</a>
			</div>		
		</li>
	</ul>
	</div>
</div>

<!--头部-->
<div class="umain">
<div id="uleft" class="uleft">
	<a class="home" href="#"><i></i><span>管理中心</span></a>
		<div  class="cur"><i class="i_sell"></i><span>我是商家</span><i></i></div>
	<ul>
		<a href="<?=weburl?>user/productlist.php" >商品管理</a>
		<a href="/user/productlx.php">发布出售</a>
		<a href="<?=weburl?>user/adlx1.php">建立自助交易</a>
		<a href="<?=weburl?>user/sellorder.php">我售出的订单</a>
		<a href="<?=weburl?>user/shop.php">店铺管理</a> 
		<a href="<?=weburl?>user/baomoneylog.php">商家保证金</a> 
	</ul>
	<div><i class="i_buy"></i><span>我是买家</span><i></i></div>
	<ul style="display:none">
		<a href="<?=weburl?>user/car.php"">购物车</a>
		<a href="#" >发布需求</a>
		<a href="#">需求管理</a>
		<a href="<?=weburl?>user/order.php">我买入的订单</a>
	</ul>
	<div  class="cur"><i class="i_cw"></i><span>财务管理</span><i></i></div>
	<ul>
		<a href="<?=weburl?>user/pay.php">在线充值</a>
		<a href="<?=weburl?>user/tixian.php" lgu="lists/cashed">余额提现</a>
		<a href="<?=weburl?>user/paylog.php">财务明细</a>
		<a href="<?=weburl?>user/jflog.php">积分明细</a>
	</ul>
	<div  class="cur"><i class="i_user"></i><span>用户管理</span><i></i></div>
	<ul id="5">
		<a href="<?=weburl?>user/inf.php">基本资料</a>
		<a href="<?=weburl?>user/mobbd.php">安全认证</a>
		<a href="<?=weburl?>user/favpro.php" lgu="fav_shop">我的收藏</a>
		<a href="#">消息记录</a>
	</ul>
	</div>
<script>
$("#uleft div:not([class='noclick'])").on('click', function() {
	var hide=[1];
	$(this).attr('class') == 'cur'? $(this).removeClass('cur').next().hide() : $(this).addClass('cur').next().show();
	$("#uleft div:not([class='cur']) span").each(function(){
     hide.push($(this).html());
	 });
	$.cookie('user-left-hide',hide.join(','),{expires:365, path: '/', domain: 'yuanz.net'});
});
var role = readmeta('Or-Role'),
	ldu = role ? 'order/' + role : window.location.pathname.replace(/\d+/ig, '').split('/').splice(1, 2).join('/');
$("#uleft a").each(function() {
	var lmu = $(this).attr('href').substr(1),
		lgu = $(this).attr('lgu'),
		pd = new RegExp(ldu);
	if (lmu == ldu || pd.test(lgu)) {
		$('.home').removeClass('cur');
		$(this).addClass('cur').parent().show().parent().prev().addClass('cur');
		return false
	}
});
</script> 
<div class="uright">
<dl class="zhxx">
	<dt>
		<li class='icons'>帐号信息 （ID：<?=$row[id]?>）</li>	</dt>
	<dd>
		<ul class="avatar"><img src="<?=$usertx?>" /></ul>
		<ul class="info">
			<li class="l1">
				<strong>欢迎您，<?=$row[nc]?>  </strong> 
			</li>
			<li class="l2"><? $xy=returnjgdw($row[xinyong],"",returnxy($row[id],1));$xy1=returnxy($row[id],2);?>  <? if($row[shopzt]==2){?>
								卖家信用：<img class='xy' src='../img/dj/<?=returnxytp($xy)?>' title='信用值<?=$xy?>'><? }?>
								
								
								&nbsp;&nbsp;买家信用：<img class='xy' src='../img/dj/<?=returnxytp($xy1)?>' title='信用值<?=$xy1?>'>							</li>
			<li class="l2">上次登录IP: 
<?
   while1("*","epzhu_loginlog where userid=".$row[id]." and admin=1 order by id desc limit 2");$row1=mysql_fetch_array($res1);$psj=$row1[sj];$puip=$row1[uip];
   if($row1=mysql_fetch_array($res1)){$psj=$row1[sj];$puip=$row1[uip];}
   ?>

			<?=$puip?></li>
			<li class="l2">上次登录时间:  <?=$psj?> <a href='#'>更多>></a></li>
		</ul>
		<ul class="fund">
			<li class="l1">可用余额：<a href="paylog.php"><strong><font size=3><?=str_replace("-0.00","0",sprintf("%.2f",$row[money1]))?></font></strong></a> 元</li>
			<li class="l1">冻结金额：<a href="paylog.php"><strong style='color:#f1453a'>0.00</strong></a> 元</li>
			<li class="l1">可用积分：<a href=""><strong class="blue"><?=$row[jf]?></strong></a></li>
			<li class="l2">
				<button class="layui-btn layui-btn-danger layui-btn-small" onclick="javascript:location.href='pay.php';">充值</button>
				<button class="layui-btn layui-btn-primary layui-btn-small" onclick="javascript:location.href='tixian.php';">提现</button>
			</li>
		</ul>
	</dd>
</dl>

  

<div class="mix">
	<div class="left" style='height:246px;'>
		<div class="mix_tit">
		<div class="mix_name">
			<span>店铺动态</span><i></i>
		</div><!--
		<div class="mix_t_right"> <a href="#"  style="color:#666;">不良计分 <font color="#333333">11</font></a></div>-->	</div> 
	<div class="mix_s_todo">
		<span>交易：</span>
		<a href="sellorder.php?ddzt=wpay">等待中(<em><i><?=returncount("epzhu_order where selluserid=".$row[id]." and ddzt='wpay'")?></i></em>)</a><a href="sellorder.php?ddzt=db">交易中(<em><i><?=returncount("epzhu_order where selluserid=".$row[id]." and ddzt='db'")?></i></em>)</a><a href="sellorder.php?ddzt=wait">待发货(<em><i><?=returncount("epzhu_order where selluserid=".$row[id]." and ddzt='wait'")?></i></em>)</a><a href="sellorder.php?ddzt=back">已退款(<em><?=returncount("epzhu_order where selluserid=".$row[id]." and ddzt='back'")?></em>)</a><a href="sellorder.php?ddzt=suc">已成交(<em><?=returncount("epzhu_order where selluserid=".$row[id]." and ddzt='suc'")?></em>)</a>	</div> 
		
	<div class="mix_s_todo">
		<span>商品：</span>
		<a href="#">出售中(<em>0</em>)</a>
		<a href="#">已下架(<em>0</em>)</a>
		<a href="#">被禁售(<em>0</em>)</a></li>
		</li>
	</div> 
	<div class="mix_s_info">
		<ul>
			<p class="tit">状态</p>
			<p>店铺：<font color=#0b9a00><?=returnshopztv($row[shopzt])?></font>			</p>
			<p>流量：<font color=#0b9a00><?=$row[djl]?></font></p>
			<p class="certification">认证：
			<a href='#'>
			
		 <? if(1==$row[ifmot]){?>	<i class='phone success' title='已通过手机认证'></i><? }?>
			<? if(1==$row[ifemail]){?><i class='success' title='已通过邮箱认证'></i><? }?>
			  <? if(2==$row[sfzrz]){?><i class='idcard success' title='已通过身份认证'></i><? }?>

			</a>
			</p>
		</ul>
		<ul>
			<p class="tit">评价</p>
			<p><span><i class="icons good"></i></span><span><i class="icons normal"></i></span><span><i class="icons bad"></i></span></p>
			<p><span>好评</span> <span>中评</span><span>差评</span></p>
			<p><span><a href="/lists/evaluation/filter/2" target="_blank"><?=returncount("epzhu_propj where selluserid=".$row[id]." and pjlx=1")?></a></a></span><span><?=returncount("epzhu_propj where selluserid=".$row[id]." and pjlx=2")?></span>   <span><a href="/lists/evaluation/filter/-1" target="_blank"><?=returncount("epzhu_propj where selluserid=".$row[id]." and pjlx=3")?></a></span></p>
		</ul>
		<ul style="border:0;width:21%">
			<p class="tit">评分</p>
			<p>描述评分：<?=sprintf("%.2f",$row[pf1])?></p>
			<p>发货评分：<?=sprintf("%.2f",$row[pf2])?></p>
			<p>服务态度：<?=sprintf("%.2f",$row[pf3])?></p>
		</ul>
	</div> 
</div>

<!--<div class="mix right">
<div class="mix_tit">
 <div class="mix_name">
<span>待办事项</span>
</div> 
</div> 
<div class="mix_handle">
<a><span>正在交易</span> <em>3</em></a>
<a><span>退款交易</span> <em>1</em></a>
<a><span>买入评价</span> <em>2</em></a>
<a><span>售出评价</span> <em>1</em></a>
</div>
</div>-->
	<div class="right" style='height:246px;' >
		<div class="mix_tit">
			<div class="mix_name"> 
				<span>销售统计</span> <a class='Dinote'>&#xe6a7</a>
			</div> <ul class="mix_change" style='float:right'>
				
						<cite class="curr">全部</cite>
					</ul> 
		</div> 
		<div class="mix_s_lump">
		
								
							<div  > 
				<ul class="wrap" >
					<li class="item">
						<p class='tit'>交易量</p>
						<p class="focus">n<em>笔</em></p>
						<p>成交量&nbsp;<?=returncount("epzhu_order where selluserid=".$row[id]." and ddzt='suc'")?>&nbsp;笔</p>
					</li>
					<li class="item">
						<p class='tit'>交易额</h5>
						<p class="focus">n<em>元</em></p>
						<p>成交额&nbsp;n&nbsp;元</p>
					</li>
					<li class="item">
						<p class='tit'>退款率<a class="ppc" title='退款率'>&#xe6c9;</a></p>
						<p class="focus">n<em>%</em> 
												</p>
						<p>退款量&nbsp;<?=returncount("epzhu_order where selluserid=".$row[id]." and ddzt='back'")?>&nbsp;笔</p>
					</li>
						<li class="item" >
						<p class='tit'>客单价</p>
						<p class="focus">n<em>元</em></p>
						<p>成交客单价 n 元</p>
					</li>
				</ul>
			</div>
					</div> 
	</div>
</div>

		<div class="mix ">
			<div class="left"  style='height:191px;'>
				<div class="mix_tit">
					<div class="mix_name">
					<span>买家提醒</span>
					</div>
					<div class="mix_t_right" style="color:#666;">交易成功 <a href="#">0</a> 笔，退款成功 <a href="#">0</a> 笔</div>				</div> 
				<div class="mix_b_todo">
					<li style='margin-left:3%;'><p>购物车</p><a href="car.php" class="jh"><?=returncount("epzhu_order where ddzt='wpay' and userid=".$row[id])?></a></li>
					<li><p>等待交易</p><a href="order.php?ddzt=wpay" class='tl'><?=returncount("epzhu_order where ddzt='wpay' and userid=".$row[id])?></a></li>
					<li><p>正在交易</p><a href="order.php?ddzt=db" ><?=returncount("epzhu_order where ddzt='db' and userid=".$row[id])?></a></li>
					<li><p>正在退款</p><a class="ah" href="order.php?ddzb=back"><?=returncount("epzhu_order where ddzt='back' and userid=".$row[id])?></a></li>
				</div> 
			</div>

			<div class="right"  style='height:191px;'>
				<div class="mix_tit">
					<ul class="mix_change">
						<cite class='curr'>公告通知</cite>
						<cite>博客推荐</cite>
						<cite>互动社区</cite>
					</ul> 
				</div> 
				<div class="mix_t_list">
				<div>
				
				 <?
$i=1;			 
				 while1("*","epzhu_gg where zt<>99 order by sj desc limit 5");while($row1=mysql_fetch_array($res1)){?>
										<li><i class=""><?=$i?></i><a href="../help/ggview<?=$row1[id]?>.html"  title="<?=$row1[tit]?>" target='_blank'><?=returntitdian($row1[tit],40)?></a></li>
										 <? $i++;}?>
										
									</div> 

				<div class="hide">
				
				 <?
				 $i=1;
  $sql="select * from epzhu_forum where uid=1 order by time asc limit 6";mysql_query("SET NAMES 'GBK'");$res=mysql_query($sql);while($row=mysql_fetch_array($res)){
  ?>           
		
										<li><i class=""><?=$i?></i><a href="http://www.epzhu.com/index.php/thread/<?=$row[id]?>.html" target="_blank" title="<?=$row[title]?>"><?=$row[title]?></a></li>
											 <? $i++;}?>
										
									
									</div> 
				<div class="hide">
											 <?
				 $i=1;
  $sql="select * from epzhu_forum where uid=1 order by time asc limit 6";mysql_query("SET NAMES 'GBK'");$res=mysql_query($sql);while($row=mysql_fetch_array($res)){
  ?>           
		
										<li><i class=""><?=$i?></i><a href="http://www.epzhu.com/index.php/thread/<?=$row[id]?>.html" target="_blank" title="<?=$row[title]?>"><?=$row[title]?></a></li>
											 <? $i++;}?>
									</div> 
			</div> 
		</div>

 </div>
	<div class="mix">
		<div class="usertips scroll-box" times='6000' items='1'>
		<ul>
					<li>
				<dl>
					<dt>温馨提示</dt>
					<dd><i class="icons l"></i><i class="icons"></i>一个合格的商家，除了保证商品的质量外，服务态度也是重要的因素~~</dd>
				</dl>
			</li>
			<li>
				<dl>
					<dt>经验分享</dt>
					<dd><i class="icons l"></i><i class="icons"></i>源站社区和博客发布原创文章，可以给您的店铺带来意想不到的客户和销量哦~~</dd>
				</dl>
			</li>
			<li>
				<dl>
					<dt>规则提示</dt>
					<dd><i class="icons l"></i><i class="icons"></i>源站严禁任何引导线下交易的行为，无论是否成功，均会受到严厉处罚~~</dd>
				</dl>
			</li>
			 
			 		</ul>
		</div>
	</div>
</div>
<div class="rl_foot">
<ul class="link">
<a target="_blank" href="#" target="_blank" rel="nofollow">关于我们</a>
<a href="#" target="_blank" rel="nofollow">广告合作</a>
<a href="#" target="_blank" rel="nofollow">联系我们</a>
<a href="#" target="_blank" rel="nofollow">隐私条款</a>
<a href="#" target="_blank" rel="nofollow">免责声明</a>
<a href="#" target="_blank" rel="nofollow">网站地图</a>
<a href="#" target="_blank" rel="nofollow">帮助中心</a>
</ul>
<ul>Copyright &#169; 2009 - 2017  www.epzhu.com 一品猪开发  闽ICP备18005100号 客服QQ:<a title="联系客服" style="color: #999;" class="qqlinks" href="#"  target="_blank">120036745</a></ul>

</div><script language="javascript">
$(".mix_change cite").live('click',function(){$(this).addClass('curr').siblings().removeClass('curr');$(this).closest('div').next('div').find("div:eq("+$(this).index()+")").removeClass('hide').siblings().addClass('hide')});$(".Dinote").on('click',function(){layer_ly('<div class=agreement><p><b>交易量：</b>所有交易笔数（不包括买家尚未付款的交易）；</p><p><b>成交量：</b>成功交易笔数（交易结束且成功的交易）；</p><p><b>交易额：</b>所有交易总额（不包括买家尚未付款的交易）；</p><p><b>成交额：</b>成功交易总额（交易结束且成功的交易）；</p><p><b>退款率：</b>退款结束笔数占所有交易结束笔数的百分比；</p><p><b>退款量：</b>退款结束笔数（不包括正在退款的交易）；</p><p><b>客单价：</b>所有交易的平均售价（不包括买家尚未付款的交易）；</p><p><b>成交客单价：</b>成功交易的平均售价（交易结束且成功的交易）；</p></div>','<b>销售统计说明</b>',true,'560px','auto')});layui.use('form',function(){form=layui.form()});
</script>
</body>
</html>