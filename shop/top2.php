<div class="top_box">
		<div class="main">
		<div class="top"> 
			<div class="left">
			<span id="notlogin" style="display:none">

			<li class='not'>您好！欢迎来到<?=webname?>！</li>
			<li class='not'><a href="<?=weburl?>reg/reg.php" class='T_a'><i class='iconfont va-2' style='font-size:18px;'>&#xe6aa;</i> 注册</a>
			</li>
			<li class='arrow'>
				<a href="<?=weburl?>reg/" class='T_a'>登录<em class='arrow'></em></a>
				<div class="change_div top_login"> 
					<a target="_blank"  href="<?=weburl?>config/qq/oauth/index.php" class='login_icon login_click'>QQ帐号登录</a>
					<? if($rowcontrol[wxlogin]!="" && $rowcontrol[wxlogin]!=","){$wxlogin=preg_split("/,/",$rowcontrol[wxlogin]);?>
					<a target="_blank"  href="https://open.weixin.qq.com/connect/qrconnect?appid=<?=$wxlogin[0]?>&redirect_uri=<?=urlencode(weburl."reg/wxlogin.php")?>&response_type=code&scope=snsapi_login#wechat_redirect"  class='login_icon login_click' id='wechat'>微信帐号登录</a>
					<? }?>
				</div>
			</li>
			</span>
			<span id="yeslogin" style="display:none"><li class="not">您好！</li>
			<li class="arrow"><a href="<?=weburl?>user/" target="_blank" class="T_a"><span id="yesuid"></span>
			<em class="arrow"></em></a>
			<dl class="change_div top_user"><dt>
			<a href="user/"><img class="pic_Layer" id="idltx" src=""></a>
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
			<div class="rightv">
				<li class='not'>
				<a href="<?=weburl?>" target="_blank"class='T_a'>网站首页</a>
				</li>
				<li class='not'>
				<a href="<?=weburl?>mt/" class='T_a'>手机版</a>
				</li>
				<li class='not'>
				<a href="<?=weburl?>ser/newslist.php" target="_blank" class='T_a'>稿件中心</a>
				</li>
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
		</div>
	</div>
	</div>
<span id="webhttp" style="display:none"><?=weburl?></span>
<script language="javascript">
userCheckses();
</script>
<script language="javascript" src="../js/js/basic.js"></script>
<script language="javascript" src="../js/js/index.js"></script>
<script language="javascript">idldl(1);</script>
