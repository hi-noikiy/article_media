<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="keywords" content="<?=$seokey?>">
<meta name="description" content="<?=$seodes?>">
<title><?=$tit?> - <?=webname?></title>
<link href="static/css/basic.css" rel="stylesheet" type="text/css" /><script language="javascript" src="static/js/jquery.m.js"></script><script language="javascript" src="static/js/layui.js"></script><script language="javascript" src="static/js/common.js"></script><script language="javascript" src="static/js/market.js"></script><link href="static/css/market.css" rel="stylesheet" type="text/css" /><script language="javascript" src="static/js/tipso.min.js"></script>



 <!--[if IE 6]>
 <script src="../js/DD_belatedPNG_0.0.8a-min.js" type="text/javascript"></script> 
 <script type="text/javascript"> 
 DD_belatedPNG.fix('*'); 
 </script> 
 <![endif]-->


</head>
<body>

<? include("../tem/top--.html");?>
	<? include("../tem/tongepzhu.html");?>
<script language="javascript">topjconc(1,'商品');document.getElementById("topt").value="<?=$skey?>";</script>

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
				<a href="/entrust/">
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
				当前共有<em<span id="jgcount"></span></em>个网站
			</div>
		</div>
				<div class="screen_lists">
				
				
				
		<div class='screen_list'><div class='screen_name'><i id='isx-151'></i><span>类型</span>：</div><div class='screen_con'>
		<? while1("*","epzhu_typewz where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
 <a href="search_j<?=$row1[id]?>v.html" <? if(check_in("_j".$row1[id]."v",$getstr)){?> class="screen_default"<? }else{?> class=""<? }?>><?=$row1[type1]?></a>
		<? }?>
		</div></div>
		
		 <? 
 $si=0;
 $sbarr=array();
 while1("*","epzhu_typesxwz where admin=1 and typeid=".$ty1id." and ifsel=1 order by xh asc");while($row1=mysql_fetch_array($res1)){
 $ev="e".$row1[id]."_";
 $sbarr[$si]=$ev;
 ?>
		
		
		<div class='screen_list'><div class='screen_name'><i id='isx-154'></i><span>价格</span>：</div><div class='screen_con'>
		
		<? while2("*","epzhu_typesxwz where admin=2 and name1='".$row1[name1]."' and typeid=".$row1[typeid]." order by xh asc");while($row2=mysql_fetch_array($res2)){?>
 <a href="<?=rentser($ev,$row2[id],'','');?>" <? if(check_in("_".$ev.$row2[id]."v",$getstr)){?> class="screen_default"<? }else{?> class="g_ac0"<? }?>><?=$row2[name2]?></a>
 <? }?>
		
		
		
		</div></div>
		 <? 
 $si++;
 }
 for($si=0;$si<count($sbarr);$si++){if(returnsx($sbarr[$si])!=-1){$nsx="xcf".returnsx($sbarr[$si])."xcf";$ses=$ses." and tysx like '%".$nsx."%'";}}
 ?>
		


		</div>
	</div>

	<div class="sort_box left" id='layer_top'>
		<dl class='sort_top'>
			<div class="sort_order left">
								<a  class="curr">综合</a>
								<a href="/order/time">最新</a>
								<a href="/order/ip">流量</a>
								<a href="/order/br">权重</a>
								<a href="/order/am">价格</a>
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
				<span>/ 47</span>
				<a href="javascript:void(0);" id="r" ><i class="icons"></i></a>
			 </div>
			<div class="sort_checkbox"  style='padding:12px;'>
				<a onclick="location.href='/sold/1'"/>
					<em></em>
				</a>
							<a onclick="location.href='/bond/1'"/><i class='icons'></i>消保赔付</a>
						</div>
		</dl>
	</div> 
	<div class="wlist">
		<div class="list_items">
								<dl>
					<dt>
								<em>￥700</em>
								<span>
					www.ysxt8.com</span>
					</dt>
						<dd>
						<div class="pic">
							<a href="https://web.huzhan.com/3783/" target="_blank">
								<img src="static/picture/1535440404443.png">
							</a>
							<div class='ly'>
								<span></span>
								<span class='cdes'>整站过户一个 不错的 系统下载站，备案域名，火车头采集。云山系统吧??www.ysxt8.com联系? ? ? ?qq 201542412非诚勿扰? 谢谢</span>
								<cite>
									<a class='webinfo' href='https://web.huzhan.com/3783/' target="_blank" title='查看网站详情'><em>&#xe630;</em>查看详情</a>
									<a class='weburl' href="http://www.ysxt8.com" target="_blank" rel="nofollow" title='直接浏览网站'><em>&#xe664;</em>浏览网站</a>
								</cite>
							</div>
						</div><a class="tit" href="https://web.huzhan.com/3783/" target="_blank">								一个漂亮的系统下载站整站过户							</a>
						<div class="info">
						
								<img class="pic_Layer tips" target="_blank"  T-fc='#333' T-bg='#fff' T-cr='#333' T-pos='right' T-bc='#ddd'  T-bw='3px' T-w='126'  title="<img src='static/picture/1524121538883.jpg!t100' width=100 height=100><p style='line-height:16px;padding:8px 0 0 0'><b>腾云精品</b></p>"  src="//iu.huzhan.com/sign/1524121538883.jpg!t40"/>
								<cite class='left'>IP：100　BR：0 </cite>
								<cite class='right'>
								<em class="see_stats tips links" id="153543957910" title="点击查看该网站第三方统计" t-bg="#71a3f5">&#xe6b1;</em>										
								</cite>
						</div>
					</dd>
				 </dl>
							<dl>
					<dt>
								<em>￥2.5万</em>
								<span>
					www.6an888.top</span>
					</dt>
						<dd>
						<div class="pic">
							<a href="https://web.huzhan.com/3937/" target="_blank">
								<img src="static/picture/1544586150916.png">
							</a>
							<div class='ly'>
								<span></span>
								<span class='cdes'>服务器信息：时间：2021年4月16日 00:00 到期配置：阿里云 2核4G 1兆带宽 Windows Server  2008 R2 企业版 64位中文版 华东1（杭州）...</span>
								<cite>
									<a class='webinfo' href='https://web.huzhan.com/3937/' target="_blank" title='查看网站详情'><em>&#xe630;</em>查看详情</a>
									<a class='weburl' href="http://www.6an888.top" target="_blank" rel="nofollow" title='直接浏览网站'><em>&#xe664;</em>浏览网站</a>
								</cite>
							</div>
						</div><a class="tit" href="https://web.huzhan.com/3937/" target="_blank">								虚拟源码交易商城，支持第三方免签充值（码支付）,支持自动发货系统，支持商家入驻，具...							</a>
						<div class="info">
						
								<img class="pic_Layer tips" target="_blank"  T-fc='#333' T-bg='#fff' T-cr='#333' T-pos='right' T-bc='#ddd'  T-bw='3px' T-w='126'  title="<img src='static/picture/1526175243260.jpg!t100' width=100 height=100><p style='line-height:16px;padding:8px 0 0 0'><b>凡品淘趣乐</b></p>"  src="//iu.huzhan.com/sign/1526175243260.jpg!t40"/>
								<cite class='left'>IP：100　BR：0 </cite>
								<cite class='right'>
								<em class="see_stats tips links" id="154458400867" title="点击查看该网站第三方统计" t-bg="#71a3f5">&#xe6b1;</em>								<cite class="note_icon left"><a class="tips" T-w="300" title="已加入消保，商家已缴纳保证金 <b style=color:#FCF302>300.00</b> 元<br>若交易失败（退款），需额外向您支付消保赔付金" target=_blank href="https://www.huzhan.com/protection/"><i class="protect">保</i></a></cite>		
								</cite>
						</div>
					</dd>
				 </dl>
							<dl>
					<dt>
								<em>￥1万</em>
								<span>
					www.ken74.com</span>
					</dt>
						<dd>
						<div class="pic">
							<a href="https://web.huzhan.com/3940/" target="_blank">
								<img src="static/picture/1544711490552.png">
							</a>
							<div class='ly'>
								<span></span>
								<span class='cdes'>ios企业签名官网（https://www.ken74.com/）互站担保。网站原创文章比较多，都是手写的</span>
								<cite>
									<a class='webinfo' href='https://web.huzhan.com/3940/' target="_blank" title='查看网站详情'><em>&#xe630;</em>查看详情</a>
									<a class='weburl' href="http://www.ken74.com" target="_blank" rel="nofollow" title='直接浏览网站'><em>&#xe664;</em>浏览网站</a>
								</cite>
							</div>
						</div><a class="tit" href="https://web.huzhan.com/3940/" target="_blank">								ios企业签名网站出售							</a>
						<div class="info">
						
								<img class="pic_Layer tips" target="_blank"  T-fc='#333' T-bg='#fff' T-cr='#333' T-pos='right' T-bc='#ddd'  T-bw='3px' T-w='126'  title="<img src='static/picture/1534487498250.jpg!t100' width=100 height=100><p style='line-height:16px;padding:8px 0 0 0'><b>ios企业签名</b></p>"  src="//iu.huzhan.com/sign/1534487498250.jpg!t40"/>
								<cite class='left'>IP：1000　BR：0 </cite>
								<cite class='right'>
								<em class="see_stats tips " id="154471051465" title="查看该网站统计截图（共 <b>1</b> 张）">&#xe6b5;</em>								<cite class="note_icon left"><a class="tips" T-w="300" title="已加入消保，商家已缴纳保证金 <b style=color:#FCF302>300.00</b> 元<br>若交易失败（退款），需额外向您支付消保赔付金" target=_blank href="https://www.huzhan.com/protection/"><i class="protect">保</i></a></cite>		
								</cite>
						</div>
					</dd>
				 </dl>
							<dl>
					<dt>
								<em>￥1500</em>
								<span>
					www.vipaikan.cn</span>
					</dt>
						<dd>
						<div class="pic">
							<a href="https://web.huzhan.com/3920/" target="_blank">
								<img src="static/picture/1543808710372.png">
							</a>
							<div class='ly'>
								<span></span>
								<span class='cdes'>阳光影院，个人搭建的一个影视网站，集合了电视直播，音乐播放，和影视在线播放下载与一体的影视网站，非常具有前景，...</span>
								<cite>
									<a class='webinfo' href='https://web.huzhan.com/3920/' target="_blank" title='查看网站详情'><em>&#xe630;</em>查看详情</a>
									<a class='weburl' href="http://www.vipaikan.cn" target="_blank" rel="nofollow" title='直接浏览网站'><em>&#xe664;</em>浏览网站</a>
								</cite>
							</div>
						</div><a class="tit" href="https://web.huzhan.com/3920/" target="_blank">								阳光影视网站出售，有很大的升值空间							</a>
						<div class="info">
						
								<img class="pic_Layer tips" target="_blank"  T-fc='#333' T-bg='#fff' T-cr='#333' T-pos='right' T-bc='#ddd'  T-bw='3px' T-w='126'  title="<img src='static/picture/none.jpg!t100' width=100 height=100><p style='line-height:16px;padding:8px 0 0 0'><b>影视网站出售</b></p>"  src="//iu.huzhan.com/sign/none.jpg!t40"/>
								<cite class='left'>IP：100　BR：0 </cite>
								<cite class='right'>
								<em class="see_stats tips " id="154380739851" title="查看该网站统计截图（共 <b>1</b> 张）">&#xe6b5;</em>										
								</cite>
						</div>
					</dd>
				 </dl>
							<dl>
					<dt>
								<em>￥12万</em>
								<span>
					www.songzifc.cn</span>
					</dt>
						<dd>
						<div class="pic">
							<a href="https://web.huzhan.com/3892/" target="_blank">
								<img src="static/picture/1541585323955.png">
							</a>
							<div class='ly'>
								<span></span>
								<span class='cdes'>SZ商业源码网www.songzifc.cn（整站出售：域名+服务器+数据）转让清单：空间+域名+整站全套；购买过去可以直接运营赚钱！！因...</span>
								<cite>
									<a class='webinfo' href='https://web.huzhan.com/3892/' target="_blank" title='查看网站详情'><em>&#xe630;</em>查看详情</a>
									<a class='weburl' href="http://www.songzifc.cn" target="_blank" rel="nofollow" title='直接浏览网站'><em>&#xe664;</em>浏览网站</a>
								</cite>
							</div>
						</div><a class="tit" href="https://web.huzhan.com/3892/" target="_blank">								商业源码网www.songzifc.cn（域名+服务器+整站数据）							</a>
						<div class="info">
						
								<img class="pic_Layer tips" target="_blank"  T-fc='#333' T-bg='#fff' T-cr='#333' T-pos='right' T-bc='#ddd'  T-bw='3px' T-w='126'  title="<img src='static/picture/1511142234749.jpg!t100' width=100 height=100><p style='line-height:16px;padding:8px 0 0 0'><b>至尊商业源码网</b></p>"  src="//iu.huzhan.com/sign/1511142234749.jpg!t40"/>
								<cite class='left'>IP：100　BR：0 </cite>
								<cite class='right'>
								<em class="see_stats tips " id="154158504299" title="查看该网站统计截图（共 <b>1</b> 张）">&#xe6b5;</em>										
								</cite>
						</div>
					</dd>
				 </dl>
							<dl>
					<dt>
								<em>￥500</em>
								<span>
					www.a5ym.cn</span>
					</dt>
						<dd>
						<div class="pic">
							<a href="https://web.huzhan.com/3886/" target="_blank">
								<img src="static/picture/1541256576698.png">
							</a>
							<div class='ly'>
								<span></span>
								<span class='cdes'>大型源码商城（www.a5ym.cn）低价出售转让清单：空间+域名+整站全套；购买过去可以直接运营赚钱！！因业务扩展，无暇打理...</span>
								<cite>
									<a class='webinfo' href='https://web.huzhan.com/3886/' target="_blank" title='查看网站详情'><em>&#xe630;</em>查看详情</a>
									<a class='weburl' href="http://www.a5ym.cn" target="_blank" rel="nofollow" title='直接浏览网站'><em>&#xe664;</em>浏览网站</a>
								</cite>
							</div>
						</div><a class="tit" href="https://web.huzhan.com/3886/" target="_blank">								www.a5ym.cn大型源码商城							</a>
						<div class="info">
						
								<img class="pic_Layer tips" target="_blank"  T-fc='#333' T-bg='#fff' T-cr='#333' T-pos='right' T-bc='#ddd'  T-bw='3px' T-w='126'  title="<img src='static/picture/1511142234749.jpg!t100' width=100 height=100><p style='line-height:16px;padding:8px 0 0 0'><b>至尊商业源码网</b></p>"  src="//iu.huzhan.com/sign/1511142234749.jpg!t40"/>
								<cite class='left'>IP：100　BR：0 </cite>
								<cite class='right'>
								<em class="see_stats tips " id="154125646551" title="查看该网站统计截图（共 <b>1</b> 张）">&#xe6b5;</em>										
								</cite>
						</div>
					</dd>
				 </dl>
							<dl>
					<dt>
								<em>￥2万</em>
								<span>
					www.tukebbs.com</span>
					</dt>
						<dd>
						<div class="pic">
							<a href="https://web.huzhan.com/3919/" target="_blank">
								<img src="static/picture/1543548109248.png">
							</a>
							<div class='ly'>
								<span></span>
								<span class='cdes'>兔客源码网：带域名备案信息，整站所有信息资源，带手机版&nbsp; 在线支付 会员中心 而且还有QQ登录&nbsp; 统统全面的！</span>
								<cite>
									<a class='webinfo' href='https://web.huzhan.com/3919/' target="_blank" title='查看网站详情'><em>&#xe630;</em>查看详情</a>
									<a class='weburl' href="http://www.tukebbs.com" target="_blank" rel="nofollow" title='直接浏览网站'><em>&#xe664;</em>浏览网站</a>
								</cite>
							</div>
						</div><a class="tit" href="https://web.huzhan.com/3919/" target="_blank">								下载站源码网-商业源码网-兔客源码网-会员中心-集成支付							</a>
						<div class="info">
						
								<img class="pic_Layer tips" target="_blank"  T-fc='#333' T-bg='#fff' T-cr='#333' T-pos='right' T-bc='#ddd'  T-bw='3px' T-w='126'  title="<img src='static/picture/1543235206809.png!t100' width=100 height=100><p style='line-height:16px;padding:8px 0 0 0'><b>久久源码网</b></p>"  src="//iu.huzhan.com/sign/1543235206809.png!t40"/>
								<cite class='left'>IP：3000　BR：0 </cite>
								<cite class='right'>
								<em class="see_stats tips links" id="154354782286" title="点击查看该网站第三方统计" t-bg="#71a3f5">&#xe6b1;</em>										
								</cite>
						</div>
					</dd>
				 </dl>
							<dl>
					<dt>
								<em>￥1500</em>
								<span>
					www.i5432.com</span>
					</dt>
						<dd>
						<div class="pic">
							<a href="https://web.huzhan.com/3882/" target="_blank">
								<img src="static/picture/1540777622732.png">
							</a>
							<div class='ly'>
								<span></span>
								<span class='cdes'>整站出售软件下载站，极品已备域名，自动采集，带手机版。云服务器和域名都可以秒过户。爱下载网&nbsp;http://www.i5432.com手...</span>
								<cite>
									<a class='webinfo' href='https://web.huzhan.com/3882/' target="_blank" title='查看网站详情'><em>&#xe630;</em>查看详情</a>
									<a class='weburl' href="http://www.i5432.com" target="_blank" rel="nofollow" title='直接浏览网站'><em>&#xe664;</em>浏览网站</a>
								</cite>
							</div>
						</div><a class="tit" href="https://web.huzhan.com/3882/" target="_blank">								软件下载站，极品已备域名，自动采集，带手机版							</a>
						<div class="info">
						
								<img class="pic_Layer tips" target="_blank"  T-fc='#333' T-bg='#fff' T-cr='#333' T-pos='right' T-bc='#ddd'  T-bw='3px' T-w='126'  title="<img src='static/picture/1524121538883.jpg!t100' width=100 height=100><p style='line-height:16px;padding:8px 0 0 0'><b>腾云精品</b></p>"  src="//iu.huzhan.com/sign/1524121538883.jpg!t40"/>
								<cite class='left'>IP：100　BR：0 </cite>
								<cite class='right'>
								<em class="see_stats tips links" id="154077692937" title="点击查看该网站第三方统计" t-bg="#71a3f5">&#xe6b1;</em>										
								</cite>
						</div>
					</dd>
				 </dl>
							<dl>
					<dt>
								<em>￥6000</em>
								<span>
					www.52kvip.com</span>
					</dt>
						<dd>
						<div class="pic">
							<a href="https://web.huzhan.com/3945/" target="_blank">
								<img src="static/picture/1544865092154.jpg">
							</a>
							<div class='ly'>
								<span></span>
								<span class='cdes'>用苹果系统搭建的电影网站，明天自动更新视频，目前流量都来着搜索引擎，看上的密我。</span>
								<cite>
									<a class='webinfo' href='https://web.huzhan.com/3945/' target="_blank" title='查看网站详情'><em>&#xe630;</em>查看详情</a>
									<a class='weburl' href="http://www.52kvip.com" target="_blank" rel="nofollow" title='直接浏览网站'><em>&#xe664;</em>浏览网站</a>
								</cite>
							</div>
						</div><a class="tit" href="https://web.huzhan.com/3945/" target="_blank">								吾爱电影网，免费看vip电影的网站出售							</a>
						<div class="info">
						
								<img class="pic_Layer tips" target="_blank"  T-fc='#333' T-bg='#fff' T-cr='#333' T-pos='right' T-bc='#ddd'  T-bw='3px' T-w='126'  title="<img src='static/picture/1504709794528.jpg!t100' width=100 height=100><p style='line-height:16px;padding:8px 0 0 0'><b>小小小赚</b></p>"  src="//iu.huzhan.com/sign/1504709794528.jpg!t40"/>
								<cite class='left'>IP：1900　BR：0 </cite>
								<cite class='right'>
								<em class="see_stats tips " id="154486473088" title="查看该网站统计截图（共 <b>2</b> 张）">&#xe6b5;</em>										
								</cite>
						</div>
					</dd>
				 </dl>
							<dl>
					<dt>
								<em>￥2万</em>
								<span>
					www.92kvip.com</span>
					</dt>
						<dd>
						<div class="pic">
							<a href="https://web.huzhan.com/3704/" target="_blank">
								<img src="static/picture/1531365800153.png">
							</a>
							<div class='ly'>
								<span></span>
								<span class='cdes'>爱客自动采集程序，目前IP3000，百度排名持续上升中，搜狗、搜搜排名非常好，每天大量的用户通过搜索引擎进入网站，可自...</span>
								<cite>
									<a class='webinfo' href='https://web.huzhan.com/3704/' target="_blank" title='查看网站详情'><em>&#xe630;</em>查看详情</a>
									<a class='weburl' href="http://www.92kvip.com" target="_blank" rel="nofollow" title='直接浏览网站'><em>&#xe664;</em>浏览网站</a>
								</cite>
							</div>
						</div><a class="tit" href="https://web.huzhan.com/3704/" target="_blank">								自动采集电影网站低价出售							</a>
						<div class="info">
						
								<img class="pic_Layer tips" target="_blank"  T-fc='#333' T-bg='#fff' T-cr='#333' T-pos='right' T-bc='#ddd'  T-bw='3px' T-w='126'  title="<img src='static/picture/1504709794528.jpg!t100' width=100 height=100><p style='line-height:16px;padding:8px 0 0 0'><b>小小小赚</b></p>"  src="//iu.huzhan.com/sign/1504709794528.jpg!t40"/>
								<cite class='left'>IP：3000　BR：3 </cite>
								<cite class='right'>
								<em class="see_stats tips " id="153136497280" title="查看该网站统计截图（共 <b>2</b> 张）">&#xe6b5;</em>										
								</cite>
						</div>
					</dd>
				 </dl>
							<dl>
					<dt>
								<em>￥900</em>
								<span>
					izplin.com</span>
					</dt>
						<dd>
						<div class="pic">
							<a href="https://web.huzhan.com/3944/" target="_blank">
								<img src="static/picture/1544820895822.jpg">
							</a>
							<div class='ly'>
								<span></span>
								<span class='cdes'>附赠网站：①苹果cms内核电影完整：dy.izplin.com? ? ? ? ? ? ? ? ? ? ? 【市场估价100元】②个人网盘系统（也可商用）：c...</span>
								<cite>
									<a class='webinfo' href='https://web.huzhan.com/3944/' target="_blank" title='查看网站详情'><em>&#xe630;</em>查看详情</a>
									<a class='weburl' href="http://izplin.com" target="_blank" rel="nofollow" title='直接浏览网站'><em>&#xe664;</em>浏览网站</a>
								</cite>
							</div>
						</div><a class="tit" href="https://web.huzhan.com/3944/" target="_blank">								【赠品给力!】【正版授权可查】明月浩空博客模板+音乐播放器+服务器+域名+附赠3个网站							</a>
						<div class="info">
						
								<img class="pic_Layer tips" target="_blank"  T-fc='#333' T-bg='#fff' T-cr='#333' T-pos='right' T-bc='#ddd'  T-bw='3px' T-w='126'  title="<img src='static/picture/1499133574304.jpg!t100' width=100 height=100><p style='line-height:16px;padding:8px 0 0 0'><b>圣享网络科技</b></p>"  src="//iu.huzhan.com/sign/1499133574304.jpg!t40"/>
								<cite class='left'>IP：100　BR：0 </cite>
								<cite class='right'>
								<em class="see_stats tips links" id="154481924994" title="点击查看该网站第三方统计" t-bg="#71a3f5">&#xe6b1;</em>										
								</cite>
						</div>
					</dd>
				 </dl>
							<dl>
					<dt>
								<em>￥4500</em>
								<span>
					www.tuitaow.com</span>
					</dt>
						<dd>
						<div class="pic">
							<a href="https://web.huzhan.com/3028/" target="_blank">
								<img src="static/picture/1497256653683.jpg">
							</a>
							<div class='ly'>
								<span></span>
								<span class='cdes'>交易托管平台，接受第三方服务商入驻发布各类虚拟商品，如：源码交易，广告，**等抽取20%分成（系统可设置分成点），企...</span>
								<cite>
									<a class='webinfo' href='https://web.huzhan.com/3028/' target="_blank" title='查看网站详情'><em>&#xe630;</em>查看详情</a>
									<a class='weburl' href="http://www.tuitaow.com" target="_blank" rel="nofollow" title='直接浏览网站'><em>&#xe664;</em>浏览网站</a>
								</cite>
							</div>
						</div><a class="tit" href="https://web.huzhan.com/3028/" target="_blank">								企业备案交易托管平台,接手可运营，域名服务器程序打包出售							</a>
						<div class="info">
						
								<img class="pic_Layer tips" target="_blank"  T-fc='#333' T-bg='#fff' T-cr='#333' T-pos='right' T-bc='#ddd'  T-bw='3px' T-w='126'  title="<img src='static/picture/1465777190180.jpg!t100' width=100 height=100><p style='line-height:16px;padding:8px 0 0 0'><b>微微网络</b></p>"  src="//iu.huzhan.com/sign/1465777190180.jpg!t40"/>
								<cite class='left'>IP：100　BR：1 </cite>
								<cite class='right'>
								<em class="see_stats tips links" id="149725644462" title="点击查看该网站第三方统计" t-bg="#71a3f5">&#xe6b1;</em>										
								</cite>
						</div>
					</dd>
				 </dl>
							<dl>
					<dt>
								<em>￥3000</em>
								<span>
					www.erbaobao.com</span>
					</dt>
						<dd>
						<div class="pic">
							<a href="https://web.huzhan.com/3914/" target="_blank">
								<img src="static/picture/1543543883913.jpg">
							</a>
							<div class='ly'>
								<span></span>
								<span class='cdes'>帝国系统，送熊掌号，已认证，带同步插件和熊掌号自动推送插件</span>
								<cite>
									<a class='webinfo' href='https://web.huzhan.com/3914/' target="_blank" title='查看网站详情'><em>&#xe630;</em>查看详情</a>
									<a class='weburl' href="http://www.erbaobao.com" target="_blank" rel="nofollow" title='直接浏览网站'><em>&#xe664;</em>浏览网站</a>
								</cite>
							</div>
						</div><a class="tit" href="https://web.huzhan.com/3914/" target="_blank">								7年老域名母婴育儿网站出售，带熊掌号全自动推送							</a>
						<div class="info">
						
								<img class="pic_Layer tips" target="_blank"  T-fc='#333' T-bg='#fff' T-cr='#333' T-pos='right' T-bc='#ddd'  T-bw='3px' T-w='126'  title="<img src='static/picture/none.jpg!t100' width=100 height=100><p style='line-height:16px;padding:8px 0 0 0'><b>99开发</b></p>"  src="//iu.huzhan.com/sign/none.jpg!t40"/>
								<cite class='left'>IP：100　BR：0 </cite>
								<cite class='right'>
								<em class="see_stats tips " id="154354346230" title="查看该网站统计截图（共 <b>1</b> 张）">&#xe6b5;</em>										
								</cite>
						</div>
					</dd>
				 </dl>
							<dl>
					<dt>
								<em>￥1000</em>
								<span>
					www.mingnai.net</span>
					</dt>
						<dd>
						<div class="pic">
							<a href="https://web.huzhan.com/3915/" target="_blank">
								<img src="static/picture/1543551181889.jpg">
							</a>
							<div class='ly'>
								<span></span>
								<span class='cdes'>帝国系统，带火车头采集，送全自动熊掌号推送插件，域名双拼，容易记忆，由于本人没有时间打理，现低价出售。</span>
								<cite>
									<a class='webinfo' href='https://web.huzhan.com/3915/' target="_blank" title='查看网站详情'><em>&#xe630;</em>查看详情</a>
									<a class='weburl' href="http://www.mingnai.net" target="_blank" rel="nofollow" title='直接浏览网站'><em>&#xe664;</em>浏览网站</a>
								</cite>
							</div>
						</div><a class="tit" href="https://web.huzhan.com/3915/" target="_blank">								双拼域名健康站低价出售							</a>
						<div class="info">
						
								<img class="pic_Layer tips" target="_blank"  T-fc='#333' T-bg='#fff' T-cr='#333' T-pos='right' T-bc='#ddd'  T-bw='3px' T-w='126'  title="<img src='static/picture/none.jpg!t100' width=100 height=100><p style='line-height:16px;padding:8px 0 0 0'><b>99开发</b></p>"  src="//iu.huzhan.com/sign/none.jpg!t40"/>
								<cite class='left'>IP：100　BR：0 </cite>
								<cite class='right'>
								<em class="see_stats tips " id="154355101455" title="查看该网站统计截图（共 <b>1</b> 张）">&#xe6b5;</em>										
								</cite>
						</div>
					</dd>
				 </dl>
							<dl>
					<dt>
								<em>￥800</em>
								<span>
					www.0563dw.com</span>
					</dt>
						<dd>
						<div class="pic">
							<a href="https://web.huzhan.com/3830/" target="_blank">
								<img src="static/picture/1536910520309.jpg">
							</a>
							<div class='ly'>
								<span></span>
								<span class='cdes'>淘宝天猫优惠劵最新版本+手机版+网页版+PC版三合一，整站源码价格美丽带域名一起出售了，备案的域名！</span>
								<cite>
									<a class='webinfo' href='https://web.huzhan.com/3830/' target="_blank" title='查看网站详情'><em>&#xe630;</em>查看详情</a>
									<a class='weburl' href="http://www.0563dw.com" target="_blank" rel="nofollow" title='直接浏览网站'><em>&#xe664;</em>浏览网站</a>
								</cite>
							</div>
						</div><a class="tit" href="https://web.huzhan.com/3830/" target="_blank">								淘宝天猫优惠劵达人官网（淘宝客整站源码）金牌！精品！							</a>
						<div class="info">
						
								<img class="pic_Layer tips" target="_blank"  T-fc='#333' T-bg='#fff' T-cr='#333' T-pos='right' T-bc='#ddd'  T-bw='3px' T-w='126'  title="<img src='static/picture/1537138624410.jpg!t100' width=100 height=100><p style='line-height:16px;padding:8px 0 0 0'><b>小程序之家</b></p>"  src="//iu.huzhan.com/sign/1537138624410.jpg!t40"/>
								<cite class='left'>IP：1000　BR：0 </cite>
								<cite class='right'>
								<em class="see_stats tips links" id="153691035737" title="点击查看该网站第三方统计" t-bg="#71a3f5">&#xe6b1;</em>								<cite class="note_icon left"><a class="tips" T-w="300" title="已加入消保，商家已缴纳保证金 <b style=color:#FCF302>300.00</b> 元<br>若交易失败（退款），需额外向您支付消保赔付金" target=_blank href="https://www.huzhan.com/protection/"><i class="protect">保</i></a></cite>		
								</cite>
						</div>
					</dd>
				 </dl>
							<dl>
					<dt>
								<em>￥6500</em>
								<span>
					www.bjkkb.com.cn</span>
					</dt>
						<dd>
						<div class="pic">
							<a href="https://web.huzhan.com/3844/" target="_blank">
								<img src="static/picture/1537927076833.png">
							</a>
							<div class='ly'>
								<span></span>
								<span class='cdes'>带手机版，带采集（手动采集/自动采集）整体转让 接收直接运营 无需额外投入?盈利模式： 1.淘宝客佣金（5%~55%） 2.广告联...</span>
								<cite>
									<a class='webinfo' href='https://web.huzhan.com/3844/' target="_blank" title='查看网站详情'><em>&#xe630;</em>查看详情</a>
									<a class='weburl' href="http://www.bjkkb.com.cn" target="_blank" rel="nofollow" title='直接浏览网站'><em>&#xe664;</em>浏览网站</a>
								</cite>
							</div>
						</div><a class="tit" href="https://web.huzhan.com/3844/" target="_blank">								双十一优惠券排名第一 带手机站 带采集							</a>
						<div class="info">
						
								<img class="pic_Layer tips" target="_blank"  T-fc='#333' T-bg='#fff' T-cr='#333' T-pos='right' T-bc='#ddd'  T-bw='3px' T-w='126'  title="<img src='static/picture/m1464798215286.jpg!t100' width=100 height=100><p style='line-height:16px;padding:8px 0 0 0'><b>免费包安装</b></p>"  src="//iu.huzhan.com/sign/m1464798215286.jpg!t40"/>
								<cite class='left'>IP：500　BR：1 </cite>
								<cite class='right'>
								<em class="see_stats tips " id="153792671031" title="查看该网站统计截图（共 <b>3</b> 张）">&#xe6b5;</em>										
								</cite>
						</div>
					</dd>
				 </dl>
							<dl>
					<dt>
								<em>￥1800</em>
								<span>
					kangri.wang</span>
					</dt>
						<dd>
						<div class="pic">
							<a href="https://web.huzhan.com/3906/" target="_blank">
								<img src="static/picture/1543027841690.png">
							</a>
							<div class='ly'>
								<span></span>
								<span class='cdes'>没添加统计代码这个价位也就是按照新站来处理的</span>
								<cite>
									<a class='webinfo' href='https://web.huzhan.com/3906/' target="_blank" title='查看网站详情'><em>&#xe630;</em>查看详情</a>
									<a class='weburl' href="http://kangri.wang" target="_blank" rel="nofollow" title='直接浏览网站'><em>&#xe664;</em>浏览网站</a>
								</cite>
							</div>
						</div><a class="tit" href="https://web.huzhan.com/3906/" target="_blank">								电影网站 抗日题材的 自适应 双拼域名							</a>
						<div class="info">
						
								<img class="pic_Layer tips" target="_blank"  T-fc='#333' T-bg='#fff' T-cr='#333' T-pos='right' T-bc='#ddd'  T-bw='3px' T-w='126'  title="<img src='static/picture/m1464798215286.jpg!t100' width=100 height=100><p style='line-height:16px;padding:8px 0 0 0'><b>免费包安装</b></p>"  src="//iu.huzhan.com/sign/m1464798215286.jpg!t40"/>
								<cite class='left'>IP：100　BR：0 </cite>
								<cite class='right'>
								<em class="see_stats tips " id="154302761660" title="查看该网站统计截图（共 <b>1</b> 张）">&#xe6b5;</em>										
								</cite>
						</div>
					</dd>
				 </dl>
							<dl>
					<dt>
								<em>￥660</em>
								<span>
					www.kanwx.net</span>
					</dt>
						<dd>
						<div class="pic">
							<a href="https://web.huzhan.com/3939/" target="_blank">
								<img src="static/picture/1544666071266.jpg">
							</a>
							<div class='ly'>
								<span></span>
								<span class='cdes'>整站出售一个不错的小说网站，极品域名，自动采集更新，带手机版。看文学网 http://www.kanwx.net手机版 http://m.kanwx.netQQ:8626...</span>
								<cite>
									<a class='webinfo' href='https://web.huzhan.com/3939/' target="_blank" title='查看网站详情'><em>&#xe630;</em>查看详情</a>
									<a class='weburl' href="http://www.kanwx.net" target="_blank" rel="nofollow" title='直接浏览网站'><em>&#xe664;</em>浏览网站</a>
								</cite>
							</div>
						</div><a class="tit" href="https://web.huzhan.com/3939/" target="_blank">								整站出售一个不错的小说网站，自动采集更新，带手机版							</a>
						<div class="info">
						
								<img class="pic_Layer tips" target="_blank"  T-fc='#333' T-bg='#fff' T-cr='#333' T-pos='right' T-bc='#ddd'  T-bw='3px' T-w='126'  title="<img src='static/picture/1524121538883.jpg!t100' width=100 height=100><p style='line-height:16px;padding:8px 0 0 0'><b>腾云精品</b></p>"  src="//iu.huzhan.com/sign/1524121538883.jpg!t40"/>
								<cite class='left'>IP：100　BR：0 </cite>
								<cite class='right'>
								<em class="see_stats tips links" id="154466582471" title="点击查看该网站第三方统计" t-bg="#71a3f5">&#xe6b1;</em>										
								</cite>
						</div>
					</dd>
				 </dl>
							<dl>
					<dt>
								<em>￥3000</em>
								<span>
					www.gvemr.cn</span>
					</dt>
						<dd>
						<div class="pic">
							<a href="https://web.huzhan.com/3943/" target="_blank">
								<img src="static/picture/1544823190265.png">
							</a>
							<div class='ly'>
								<span></span>
								<span class='cdes'>站太多 也管不过来，也没啥可介绍的 自己看网址把&nbsp;</span>
								<cite>
									<a class='webinfo' href='https://web.huzhan.com/3943/' target="_blank" title='查看网站详情'><em>&#xe630;</em>查看详情</a>
									<a class='weburl' href="http://www.gvemr.cn" target="_blank" rel="nofollow" title='直接浏览网站'><em>&#xe664;</em>浏览网站</a>
								</cite>
							</div>
						</div><a class="tit" href="https://web.huzhan.com/3943/" target="_blank">								哔哔**,免费**,**源码,用心做**的网站!							</a>
						<div class="info">
						
								<img class="pic_Layer tips" target="_blank"  T-fc='#333' T-bg='#fff' T-cr='#333' T-pos='right' T-bc='#ddd'  T-bw='3px' T-w='126'  title="<img src='static/picture/1531842099892.jpg!t100' width=100 height=100><p style='line-height:16px;padding:8px 0 0 0'><b>源码咖</b></p>"  src="//iu.huzhan.com/sign/1531842099892.jpg!t40"/>
								<cite class='left'>IP：200　BR：0 </cite>
								<cite class='right'>
								<em class="see_stats tips " id="154482293722" title="查看该网站统计截图（共 <b>1</b> 张）">&#xe6b5;</em>										
								</cite>
						</div>
					</dd>
				 </dl>
							<dl>
					<dt>
								<em>￥300</em>
								<span>
					www.wiymsc.cn</span>
					</dt>
						<dd>
						<div class="pic">
							<a href="https://web.huzhan.com/3887/" target="_blank">
								<img src="static/picture/1541256650695.png">
							</a>
							<div class='ly'>
								<span></span>
								<span class='cdes'>大型电影网站（www.wiymsc.cn）低价出售转让清单：空间+域名+整站全套；购买过去可以直接运营赚钱！！因业务扩展，无暇打理...</span>
								<cite>
									<a class='webinfo' href='https://web.huzhan.com/3887/' target="_blank" title='查看网站详情'><em>&#xe630;</em>查看详情</a>
									<a class='weburl' href="http://www.wiymsc.cn" target="_blank" rel="nofollow" title='直接浏览网站'><em>&#xe664;</em>浏览网站</a>
								</cite>
							</div>
						</div><a class="tit" href="https://web.huzhan.com/3887/" target="_blank">								电影全站出售 自动采集+会员收费							</a>
						<div class="info">
						
								<img class="pic_Layer tips" target="_blank"  T-fc='#333' T-bg='#fff' T-cr='#333' T-pos='right' T-bc='#ddd'  T-bw='3px' T-w='126'  title="<img src='static/picture/1511142234749.jpg!t100' width=100 height=100><p style='line-height:16px;padding:8px 0 0 0'><b>至尊商业源码网</b></p>"  src="//iu.huzhan.com/sign/1511142234749.jpg!t40"/>
								<cite class='left'>IP：100　BR：0 </cite>
								<cite class='right'>
								<em class="see_stats tips " id="154125631222" title="查看该网站统计截图（共 <b>1</b> 张）">&#xe6b5;</em>										
								</cite>
						</div>
					</dd>
				 </dl>
			 
		</div>
	</div>
 
	<div id="page" total="47"><ul><li class="ohave">1</li><li><a href="/page/2" data-page="2">2</a></li><li><a href="/page/3" data-page="3">3</a></li><li><a href="/page/4" data-page="4">4</a></li><a href="/page/47" data-page="47">... 47</a></ul></div>	</div>
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
				<a href='//www.huzhan.com/entrusts/' target='_blank'><img src='static/picture/ds.gif'></a>
			</div>
			<div class='lrtop_xu'>
				<dl class='tit'>
					<em></em> <span>网站需求</span>
				</dl>
				<dl class="box scroll-box" times='3000' items='3'>
					<ul>
					
						<li>
								<a href="https://demand.huzhan.com/6595/" target="_blank" title='求购一个影视内的源码，又能搭建系统的也行，加微信 2631870682'>
									<i>希望1</i><b>@议价</b> 
									<div>求购一个影视内的源码，又能搭建系统的也行，加微信 2631870682</div>
								</a>
								</li>
											
						<li>
								<a href="https://demand.huzhan.com/6573/" target="_blank" title='收个可运营Vpay区块链商城，改名字即可'>
									<i>发斯蒂芬</i><b>@议价</b> 
									<div>收个可运营Vpay区块链商城，改名字即可</div>
								</a>
								</li>
											
						<li>
								<a href="https://demand.huzhan.com/6566/" target="_blank" title='求购一份仿猪八戒网站'>
									<i>赵贤廷</i><b>￥600</b> 
									<div>求购一份仿猪八戒网站</div>
								</a>
								</li>
											
						<li>
								<a href="https://demand.huzhan.com/6552/" target="_blank" title='京东到家模板的商城网站'>
									<i>穿着秋裤追裤衩</i><b>￥10000</b> 
									<div>京东到家模板的商城网站</div>
								</a>
								</li>
											
						<li>
								<a href="https://demand.huzhan.com/6526/" target="_blank" title='设计师专用导航网站建设'>
									<i>ZHENYUNZHE</i><b>@议价</b> 
									<div>设计师专用导航网站建设</div>
								</a>
								</li>
											
						<li>
								<a href="https://demand.huzhan.com/6503/" target="_blank" title='h5源码完美运行的源码'>
									<i>光dasd</i><b>@议价</b> 
									<div>h5源码完美运行的源码</div>
								</a>
								</li>
											
						<li>
								<a href="https://demand.huzhan.com/6501/" target="_blank" title='服务器需要做防360拦截报毒，能做的M。'>
									<i>世界之窗</i><b>￥3000</b> 
									<div>服务器需要做防360拦截报毒，能做的M。</div>
								</a>
								</li>
											
						<li>
								<a href="https://demand.huzhan.com/6499/" target="_blank" title='求购一套五星宏辉，游戏'>
									<i>曹德华</i><b>￥2000</b> 
									<div>求购一套五星宏辉，游戏</div>
								</a>
								</li>
											
						<li>
								<a href="https://demand.huzhan.com/6496/" target="_blank" title='短信接口修改.可以发订单号的'>
									<i>一首莫离歌</i><b>￥500</b> 
									<div>短信接口修改.可以发订单号的</div>
								</a>
								</li>
											
						<li>
								<a href="https://demand.huzhan.com/6439/" target="_blank" title='视频网站，可以设置会员收费，'>
									<i>大哈</i><b>@议价</b> 
									<div>视频网站，可以设置会员收费，</div>
								</a>
								</li>
											
					</ul>
				</dl>
				<dl class='post'><a href='https://my.huzhan.com/reg/' target="_blank"><i class='icons i-post'></i><span>发布需求</span></a><a href='https://demand.huzhan.com/web/' target="_blank"><i class='icons i-all'></i><span>全部需求</span></a></dl>
			 </div>
		</div>
	</div>	
</div>
<div class="bottom">
	<div class="main">
		<div class="footer">
			<div class="footer-nav left">
					<dl>
						<dt>买家指南</dt>
						<dd>
							<p><a href="https://www.huzhan.com/help/view/1?z81" target="_blank" rel="nofollow">如何购买</a></p>
							<p><a href="https://www.huzhan.com/help/view/15" target="_blank" rel="nofollow">搜索商品</a></p>
							<p><a href="https://www.huzhan.com/help/list/26" target="_blank" rel="nofollow">发货方式</a></p>
							<p><a href="https://www.huzhan.com/help/view/50" target="_blank" rel="nofollow">如何支付</a></p>
						</dd>
					</dl>
					<dl>
						<dt>卖家指南</dt>
						<dd>
							<p><a href="https://www.huzhan.com/help/list/14" target="_blank" rel="nofollow">商家协议</a></p>
							<p><a href="https://www.huzhan.com/help/list/16" target="_blank" rel="nofollow">发布规则</a></p>
							<p><a href="https://www.huzhan.com/help/list/17" target="_blank" rel="nofollow">发布帮助</a></p>
							<p><a href="https://www.huzhan.com/help/view/65" target="_blank" rel="nofollow">收费标准</a></p>
						</dd>
					</dl>
					<dl>
						<dt>安全交易</dt>
						<dd>
							<p><a href="https://www.huzhan.com/help/view/57" target="_blank" rel="nofollow">钓鱼防骗</a></p>
							<p><a href="https://www.huzhan.com/help/view/80" target="_blank" rel="nofollow">担保交易</a></p>
							<p><a href="https://www.huzhan.com/help/view/81" target="_blank" rel="nofollow">谨防诈骗</a></p>
							<p><a href="https://www.huzhan.com/protection/" target="_blank" rel="nofollow">消费保障</a></p>
						</dd>
					</dl>
					<dl>
						<dt>常见问题</dt>
						<dd>
							<p><a href="https://www.huzhan.com/help/view/8" target="_blank" rel="nofollow">如何注册</a></p>
							<p><a href="https://www.huzhan.com/help/list/7" target="_blank" rel="nofollow">购物流程</a></p>
							<p><a href="https://www.huzhan.com/help/view/15" target="_blank" rel="nofollow">搜索帮助</a></p>
							<p><a href="https://www.huzhan.com/help/view/58" target="_blank" rel="nofollow">交易周期</a></p>
						</dd>
					</dl>
					<dl>
						<dt>服务中心</dt>
						<dd>
							<p><a href="https://my.huzhan.com/central/certification" target="_blank" rel="nofollow">认证中心</a></p>
							<p><a href="https://my.huzhan.com/central/security" target="_blank" rel="nofollow">账户安全</a></p>
							<p><a href="https://my.huzhan.com/lists/cashed/" target="_blank" rel="nofollow">提现查询</a></p>
							<p><a href="//bbs.huzhan.com/post/suggest" target="_blank" rel="nofollow">投诉建议</a></p>
						</dd>
					</dl>
				
			</div>
			<div class="footer-contact right">
					<dl class="left">
						<b>管理客服</b>
						<p>QQ：<a style='color:#007de4;' target="_blank" title="联系客服QQ" class="service-qq" href="	
						http://crm2.qq.com/page/portalpage/wpa.php?uin=4008853986&cref=https%3A%2F%2Fid.b.qq.com%2Fcrm%2Findex.php%3Frr%3Dwpa&ref=https%3A%2F%2Fid.b.qq.com%2Fcrm%2Findex.php%3Frr%3Dwpa%2Fstyle%26id%3Dwpa_setting_a01&pt=undefined&f=1&ty=1&ap=&as=&aty=0&a=" rel="nofollow">4008853986</a></p>
						<p>电话：0551-63836297</p>
						<p>邮箱：kefu@huzhan.com</p>
						<p>时间：9:00-23:00</p>
					</dl>
					<div class="left">
						<span><img src="static/picture/wechat_code.jpg" width="100" height="100"></span>
						<p>互站官方微信</p>
					</div>
				</div>

		</div>
		<div class="footer-link">
				<div class="footer-link-a left">
					<p><a href="https://www.huzhan.com/html/about/" target="_blank" rel="nofollow">关于我们</a>  
					<a href="https://www.huzhan.com/html/about/ads" target="_blank" rel="nofollow">广告合作</a> 
					<a href="https://www.huzhan.com/html/about/lxwm" target="_blank" rel="nofollow">联系我们</a> 
					<a href="https://www.huzhan.com/html/about/yinsi" target="_blank" rel="nofollow">隐私条款</a> 
					<a href="https://www.huzhan.com/html/about/mianze" target="_blank" rel="nofollow" title=6>免责声明</a> 
					<a href="https://www.huzhan.com/html/about/map" target="_blank" rel="nofollow">网站地图</a> |<em>&nbsp;&nbsp;&nbsp;? 2009-2017 Huzhan.com 版权所有 </em> </p>
					<cite>安徽互聚网络科技有限公司 | 皖ICP备14008076号-1 | 皖公网安备34010202600118号</cite>
				</div>
				<div class="footer-link-i right">
					<a key="549be5a0c274e72498ca6b18" target="_blank" rel="nofollow" logo_size="124x47" logo_type="realname" href="https://v.yunaq.com/certificate?domain=www.huzhan.com"><img src="static/picture/yunaqgw.png" height="40"></a>
					<a id="_pingansec_bottomimagesmall_hangye" href="http://si.trustutn.org/info?sn=696151023018102817576&amp;certType=1" target="_blank" rel="nofollow"><img src="static/picture/hangye_bottom_small.png"></a>
					<a key="549be5a0c274e72498ca6b18" target="_blank" rel="nofollow" logo_size="124x47" logo_type="realname" href="http://www.cn-ecusc.org.cn/cert/aqkx/site/?site=www.huzhan.com"><img src="static/picture/kx_124x47.jpg" height="40"></a>
					<a id="_pinganTrust" target="_blank" rel="nofollow" href="http://c.trustutn.org/s/huzhan.com"><img src="static/picture/cert_40_1.png" height="40"></a>
					<a id="_pinganTrust" target="_blank" rel="nofollow" href="http://www.yundun.com"><img src="static/picture/yd_124x47.jpg" height="40"></a>
				</div>
			</div>

	</div>
</div>

<script type="text/javascript" src="static/js/adec6b2cd7ca4ab59276b0bcb59c14f8.js" charset="UTF-8"></script>
<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "//hm.baidu.com/hm.js?eba69878d464d1cba0610b2a3e86b8dc";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>
<div class='fixed-right' style='_right:330px;'>
	<div class='fixed-main'>
		<div class='fixed-right-bg'></div>
		<div class='fixed-tab'>
			<div class='fixed-tab-top'>
				<cite data-click='my' data-rtime='0' class='click-cite'>
					<a class='i'><i class='fi-my'></i><p>我的</p></a>
					<div class='i-bg'></div><div class='i-bgy'></div>
				</cite>
				
				<cite data-click='message' data-rtime='0' class='click-cite'>
					<a class='i'><i class='fi-message'></i><p>消息</p>
						<span class="message-count">
													</span>
					</a>
					<div class='i-bg'></div><div class='i-bgy'></div>
				</cite>
				<cite data-click='browse' data-rtime='0' class='click-cite'>
					<a class='i'><i class='fi-browse'></i><p>足迹</p></a>
					<div class='i-bg'></div><div class='i-bgy'></div>
				</cite>
				<cite data-click='cart' data-rtime='0' class='click-cite'>
					<a class='i'><i class='fi-cart'></i><p>购<br>物<br>车</p>
						<span class="cart-count">
													</span>
					</a>
					<div class='i-bg'></div><div class='i-bgy'></div>
				</cite>
				</div><div class="fixed-tab-bottom simple-box">				<cite hover='1'>
					<a class='i'><i class='fi-service'></i><p>客服</p></a>
					<div class='i-bg'></div>
					<div class='i-bgy'></div>
					<div class="fixed-hover-box fixed-service-box">
						<h3><b>互站官方客服</b></h3>
						<div class='fixed-service-list'>
							<p><span>客服QQ：</span><a class="service-qq" href="http://crm2.qq.com/page/portalpage/wpa.php?uin=4008853986&cref=https%3A%2F%2Fid.b.qq.com%2Fcrm%2Findex.php%3Frr%3Dwpa&ref=https%3A%2F%2Fid.b.qq.com%2Fcrm%2Findex.php%3Frr%3Dwpa%2Fstyle%26id%3Dwpa_setting_a01&pt=undefined&f=1&ty=1&ap=&as=&aty=0&a=" target="_blank" title="联系客服QQ" rel="nofollow">
							4008853986</a></p>
							
							<p>
							<span>客服电话：</span>0551-63836297
							</p>
							<p>
							<span>客服邮箱：</span>kefu@huzhan.com
							</p>
							<p class='gray'>管理仅处理交易投诉、举报、帐号、资金等平台使用问题；<br>
							商品问题请咨询各商品详情页面中显示的商家客服QQ。</p>
						</div>
					</div>	
				</cite>
				<cite hover='1'>
					<a class='i fixed-stretch'><i class='fi-stretch'></i></a>
					<div class='i-bg'></div>
					<div class='i-bgy'></div>
					<div class="fixed-hover-box fixed-stretch-box">
						<h3><em>正常模式</em><span>精简模式</span></h3>
					</div>	
				</cite>
							</div>			<div class='fixed-tab-gotop'>
				<cite class='gotop' hover='1'>
					<a class='i'><i class='fi-gotop'></i></a>
					<div class='i-bg'></div>
					<div class='i-bgy'></div>
					<div class="fixed-hover-box fixed-gotop-box">
						<h3>返回顶部</h3>
					</div>
				</cite>
			</div>
		</div>
		<div class='fixed-click'>
		    <div class="fixed-click-box fixed-login-box">
				<h3>请先登录</h3>
				<div class='fixed-login'>
					<div class='fixed-list-bt'></div>
				</div>				
			</div>	
			<div class="fixed-click-box fixed-browse-box">
				<h3>
					<strong>浏览记录</strong>
					<a class='refresh' title='刷新（首页）'><i></i></a>
					<div class="action">
						<a class="browse_empty" title="清空浏览记录">清空记录</a>
					</div>
				</h3>
				<div class='fixed-browse-list fixed-list'>
					<div class='fixed-list-bt'></div>
					<div id='list'>
					</div>
					<div class='fixed-list-bt'></div>
				</div>
				<div class='fixed-click-bottom'>
					<div class="info">
					<span>最多记录100条，当前共<b id='count'>0</b>条</span>
					</div>
					<div class="sort_page right">
						<a href="javascript:void(0);" id="l" data-ajax='browse'><i class="icons"></i></a>
						<span class="b" id='curr-page'>1</span>
						<span>/</span>
						<span id='total-page'>1</span>
						<a href="javascript:void(0);" id="r" data-ajax='browse'><i class="icons"></i></a>
					</div>
				</div>
			</div>				
			<div class="fixed-click-box fixed-cart-box">
				<h3>
					<strong>购物车</strong>
					<a class='refresh' title='刷新（首页）'><i></i></a>
					<div class="action">
						<a href="https://my.huzhan.com/cart/" title="全屏查看购物车">全屏</a>
						<a class="cart_empty" title="清空购物车">清空</a>
					</div>
					<div class="sort_page right">
						<a href="javascript:void(0);" id="l" data-ajax='browse'><i class="icons"></i></a>
						<span class="b" id='curr-page'>1</span>
						<span>/</span>
						<span id='total-page'>0</span>
						<a href="javascript:void(0);" id="r" data-ajax='browse'><i class="icons"></i></a>
					</div>
				</h3>
				<div class='fixed-cart-list fixed-list'>
					<div class='fixed-list-bt'></div>
					<form class="layui-form" cart=1>
						<div class="cart" id='list'>
						</div>	
						<div id="cartdata">
						</div>
						<div class='fixed-click-bottom cartNav'>
							<cite><input name="cartxuan" type="checkbox" lay-filter="cart" lay-skin='cart' value="1" checked="checked"> </cite>
							<div class="info">
							<b id="myjifen" class='hide'>0</b>
							<span>选中<em id="allnumber">0</em>件，合计 <b>￥<b id="allmoney">0</b></b></span>
							</div>
							<a onclick="carjs()" class="cartjs" title='结算选中商品'>结算</a><a class='form_render'></a>
						</div>		
					</form>
				</div>
			</div>		
			
			<div class="fixed-click-box fixed-message-box">
				<h3>
					<strong>站内消息</strong>
					<a class='refresh' title='刷新（首页）'><i></i></a>
					<div class="action">
						<a href="https://my.huzhan.com/lists/message" title="全屏查看">全屏查看</a>
						<a class="message_empty" title="全部设为已读">全部设为已读</a>
					</div>
				</h3>
				<div class='fixed-message-list fixed-list'>
					<div class='fixed-list-bt'></div>
					<div id='list'>
					</div>
					<div class='fixed-list-bt'></div>
				</div>
				<div class='fixed-click-bottom'>
					<div class="info">
					<span>当前共<b id='count'>0</b>条消息</span>
					</div>
					<div class="sort_page right">
					<a href="javascript:void(0);" id="l" data-ajax='message'><i class="icons"></i></a>
					<span class="b" id='curr-page'>1</span>
					<span>/</span>
					<span id='total-page'>0</span>
					<a href="javascript:void(0);" id="r" data-ajax='message'><i class="icons"></i></a>
					</div>
				</div>					
			</div>	
			<div class="fixed-click-box fixed-my-box ">
				<h3>
					<strong>我的信息</strong>
					<a class='refresh' data-time='' title='刷新（首页）'><i></i></a>
					<div class="action">
						<a class="logout" onclick="UCheck('ajax_logout')">退出登录</a>
					</div>
				</h3>
				<div class='fixed-my fixed-list'>
					<div class='fixed-list-bt'></div>
					<dt>
						<div id='sign'><a class='sign'></a></div>
						<a href="https://my.huzhan.com/setup/info" id='avatar'><img src="static/picture/none.jpg"></a>
						<span>
						<p id='name'>您好，欢迎来到互站！</p>
						<p><em>余额：<a id="money" href="https://my.huzhan.com/lists/money">0.00</a> 元</em></p>
						<p><em>积分：<a id='jifen' href="https://my.huzhan.com/lists/jifen">0</a> 积分</em></p>
						</span>
					</dt>
					<dd>
						<a>
							<b>任务求购</b>
							<em id='buy-info-number'>0</em>
						</a>
						<a>
							<b>买入交易</b>
							<em id='buy-deal-number'>0</em>
						</a>
						<a>
							<b>出售商品</b>
							<em id='sale-info-number'>0</em>
						</a>
						<a>
							<b>售出交易</b>
							<em id='sale-deal-number'>0</em>
						</a>
					</dd>
					<nav>
						<a href="https://my.huzhan.com/onpay/" class='first'><i class='a-1'>&#xe68e;</i><p>充值</p>  </a>
						<a href="https://my.huzhan.com/form/cashed" class='first'><i class='a-2'>&#xe706;</i><p>提现</p>  </a>
						<a href="https://my.huzhan.com/lists/money" class='first'><i class='a-3'>&#xe695;</i><p>账目</p> </a>
						<a href="https://my.huzhan.com/lists/fav" class='first'><i class='a-4'>&#xe693;</i><p>收藏</p> </a>
						<a href="https://my.huzhan.com/central/security"><i class='a-5'>&#xe69b;</i><p>安全</p> </a>
						<a href="https://my.huzhan.com/central/certification"><i class='a-6'>&#xe501;</i><p>认证</p></a>
						<a href="https://my.huzhan.com/demand/ing"><i class='a-7'>&#xe690;</i><p>需求</p></a>
						<a href="https://my.huzhan.com/custom/"><i class='a-8'>&#xe69d;</i><p>自助</p></a>
					</nav>
					<div class='fixed-list-bt'></div>
				</div>
			</div>
		</div>	
		<div class='fixed-loading'>
			<span><i></i></span>
		</div>	
	</div>
</div>
</body>
</html>