<div class="top_box">
		<div class="main">
		<div class="top"> 
			<div class="left">
			<span id="notlogin" style="display:none">

			<li class='not'>���ã���ӭ����<?=webname?>��</li>
			<li class='not'><a href="<?=weburl?>reg/reg.php" class='T_a'><i class='iconfont va-2' style='font-size:18px;'>&#xe6aa;</i> ע��</a>
			</li>
			<li class='arrow'>
				<a href="<?=weburl?>reg/" class='T_a'>��¼<em class='arrow'></em></a>
				<div class="change_div top_login"> 
					<a target="_blank"  href="<?=weburl?>config/qq/oauth/index.php" class='login_icon login_click'>QQ�ʺŵ�¼</a>
					<? if($rowcontrol[wxlogin]!="" && $rowcontrol[wxlogin]!=","){$wxlogin=preg_split("/,/",$rowcontrol[wxlogin]);?>
					<a target="_blank"  href="https://open.weixin.qq.com/connect/qrconnect?appid=<?=$wxlogin[0]?>&redirect_uri=<?=urlencode(weburl."reg/wxlogin.php")?>&response_type=code&scope=snsapi_login#wechat_redirect"  class='login_icon login_click' id='wechat'>΢���ʺŵ�¼</a>
					<? }?>
				</div>
			</li>
			</span>
			<span id="yeslogin" style="display:none"><li class="not">���ã�</li>
			<li class="arrow"><a href="<?=weburl?>user/" target="_blank" class="T_a"><span id="yesuid"></span>
			<em class="arrow"></em></a>
			<dl class="change_div top_user"><dt>
			<a href="user/"><img class="pic_Layer" id="idltx" src=""></a>
					<span>
						<p><em>�����˺ţ�<a href="<?=weburl?>user/" id="idl1"></a></em><input type="button" onclick="window.location.href=&#39;<?=weburl?>user/&#39;;" value="��"></p>
						<p><em>�ʻ��ܶ<a href="<?=weburl?>user/pay.php" id="yue"></a> Ԫ</em> <input type="button" onclick="window.location.href=&#39;<?=weburl?>user/pay.php&#39;;" value="��"></p>
						<p><em>�ʻ����᣺<a href="<?=weburl?>user/paylog.php" id="idl3"></a> Ԫ</em> <input type="button" onclick="window.location.href=&#39;<?=weburl?>user/paylog.php&#39;;" value="��"></p>
						<p><em>�����ֶ<a href="<?=weburl?>user/tixian.php" id="idl4"></a> Ԫ</em> <input type="button" onclick="window.location.href=&#39;<?=weburl?>user/tixian.php&#39;;" value="��"></p>
						<p><em>�ʻ����֣�<a href="<?=weburl?>user/qiandao.php"id="idljifen"></a> ����</em><input type="button" class="signsuc" value="׬"></p>
						</span>
					</dt>
					<dd>
						<a href="<?=weburl?>user/tixian.php"><i class="iconfont">�@</i><p>����</p></a>
						<a href="<?=weburl?>user/pwd.php"><i class="iconfont">��</i><p>��ȫ</p></a>
						<a href="<?=weburl?>user/smrz.php"><i class="iconfont">�{</i><p>��֤</p></a>
			<a href="<?=weburl?>user/openshoprz.php"><i class="iconfont" style="font-size:27px;margin-top:-2px;padding-bottom:2px;">�s</i><p>����</p></a>					</dd>
					<a class="logout" href="<?=weburl?>user/un.php">�˳���½<i class="iconfont va-1">��</i></a>
				</dl>
			</li>
			<li>
				<a href="<?=weburl?>user/qiandao.php" id="needqd" style="display:none;" class="T_a">
				<i class="iconfont va-3" style="font-size:18px;"></i> ����ǩ��</a>
<a id="dontqd" style="display:none;" href="<?=weburl?>user/qiandao.php" class="T_a">
				<i class="iconfont va-3" style="font-size:18px;"></i> ��ǩ��</a>


			</li>
			<li>
				<a href="<?=weburl?>user/car.php" class="T_a">
				<i class="iconfont va-2" style="font-size:18px;">�J</i> ���ﳵ</a>
			</li>
			
			</span>
			</div>
			<div class="rightv">
				<li class='not'>
				<a href="<?=weburl?>" target="_blank"class='T_a'>��վ��ҳ</a>
				</li>
				<li class='not'>
				<a href="<?=weburl?>mt/" class='T_a'>�ֻ���</a>
				</li>
				<li class='not'>
				<a href="<?=weburl?>ser/newslist.php" target="_blank" class='T_a'>�������</a>
				</li>
				<li class='not'>
				<a href="<?=weburl?>help/" class='T_a' target="_blank"> ��������</a>
				</li>
				<li class='arrow'>
				<a href="/" class='T_a'><i class="iconfont va-2 " style='font-size:18px;' >&#xe8a8;</i> ��������<em class='arrow'></em></a>
				<div class="change_div top_manage r"> 
							<div class="clearfix">
								<dl>
								<dt>�������</dt>
								<dd>
									<a rel="nofollow" href="<?=weburl?>user/pay.php" target="_blank"><strong>���߳�ֵ</strong></a>
									<a rel="nofollow" href="<?=weburl?>user/tixian.php" target="_blank"><strong>��������</strong></a>
									<a rel="nofollow" href="<?=weburl?>user/tixianlog.php" target="_blank">������ʷ</a>
									<a rel="nofollow" href="<?=weburl?>user/paylog.php" target="_blank"><strong>������ϸ</strong></a>
									<a rel="nofollow" href="<?=weburl?>user/jflog.php" target="_blank">������ϸ</a>
								</dd>
							</dl>
							<dl>
								<dt>�������</dt>
								<dd> 
									<a rel="nofollow" href="user/productlist.phpuser/car.php" target="_blank">���ﳵ</a>
									<a rel="nofollow" href="<?=weburl?>task/taskadd.php" >��������</a>
									<a rel="nofollow" href="<?=weburl?>user/tasklist.php" target="_blank"><strong>���ǹ���</strong></a>
									<a rel="nofollow" href="<?=weburl?>user/taskhflist.php" target="_blank">���ǽ���</a>
									<a rel="nofollow" href="<?=weburl?>user/order.php" target="_blank"><strong>���붩��</strong></a>
									
								</dd>
							</dl>
							<dl>
								<dt>��������</dt>
								<dd>
									<a rel="nofollow" href="<?=weburl?>user/productlx.php">��������</a>
									<a rel="nofollow" href="<?=weburl?>user/productlist.php" target="_blank"><strong>��Ʒ����</strong></a>
									<a rel="nofollow" href="<?=weburl?>user/sellorder.php" target="_blank"><strong>�۳�����</strong></a>
									<a rel="nofollow" href="<?=weburl?>user/adlx1.php" target="_blank">������潻��</a>
									<a rel="nofollow" href="<?=weburl?>user/shop.php" target="_blank">���̹���</a>
								</dd>
							</dl> 
						</div>
						<div class="clearfix">
							<dl>
								<dt>������ѯ</dt>
								<dd>
									<a rel="nofollow" href="<?=weburl?>help/" target="_blank">��������</a>
									<a rel="nofollow" href="<?=weburl?>help/aboutview5.html" target="_blank">��˽����</a>
									<a rel="nofollow" href="<?=weburl?>help/aboutview4.html" target="_blank">��ϵ�ͷ�</a>
									<a rel="nofollow" href="<?=weburl?>help/aboutview2.html" target="_blank">��������</a>
								</dd>
							</dl>
							<dl>
								<dt>�û�����</dt>
								<dd>
									<a rel="nofollow" href="<?=weburl?>user/inf.php" target="_blank">��������</a>
									<a rel="nofollow" href="<?=weburl?>user/mobbd.php" target="_blank">��֤����</a>
									<a rel="nofollow" href="<?=weburl?>user/favpro.php" target="_blank">�ҵ��ղ�</a>
									<a rel="nofollow" href="<?=weburl?>user/gdlist.php" target="_blank">����ϵͳ</a>
								</dd>
							</dl>
							<dl>
								<dt>�˻���ȫ</dt>
								<dd>
									<a rel="nofollow" href="<?=weburl?>">��ȫ����</a>
									<a rel="nofollow" href="<?=weburl?>user/pwd.php">�޸�����</a>
									<a rel="nofollow" href="<?=weburl?>user/zfmm.php">��ȫ���޸�</a>
									<a rel="nofollow" href="<?=weburl?>user/emailbd.php" target="_blank">������֤</a>
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
