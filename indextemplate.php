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

<!--ͷ��-->
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





<!--ͷ��-->
<div class="header">
	<div class="top_box"><script language="javascript">
userCheckses();
</script>
	<div class="main">	<div class="top"> 		<div class="left">			<span id="notlogin">			<li class='not'>���ã���ӭ����<?=webname?></li>			<li class='not'>				<a href="<?=weburl?>reg/reg.php" class='T_a'><i class='iconfont va-2' style='font-size:18px;'>&#xe6aa;</i> ע��</a>			</li>			<li class='arrow'>		<a href="/reg/" class='T_a'>��¼<em class='arrow'></em></a>				<div class="change_div top_login"> 
					<a target="_blank" id='qq' href="<?=weburl?>config/qq/oauth/index.php" class='login_icon'>QQ�ʺŵ�¼</a>
					<? if($rowcontrol[wxlogin]!="" && $rowcontrol[wxlogin]!=","){$wxlogin=preg_split("/,/",$rowcontrol[wxlogin]);?>
					<a target="_blank"  href="https://open.weixin.qq.com/connect/qrconnect?appid=<?=$wxlogin[0]?>&redirect_uri=<?=urlencode(weburl."reg/wxlogin.php")?>&response_type=code&scope=snsapi_login#wechat_redirect"  class='login_icon' id='wechat'>΢���ʺŵ�¼</a>
					
					<? }?>
				</div>	</li>		</span>	
<span id="yeslogin" style="display:none"><li class="not">���ã�</li>
			<li class="arrow"><a href="<?=weburl?>user/" target="_blank" class="T_a"><span id="yesuid"></span>
			<em class="arrow"></em></a>
			<dl class="change_div top_user"><dt>
			<a href="<?=weburl?>user/"><img class="pic_Layer" id="idltx" src=""></a>
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


				<div class="right">
				<li class='not'>
				<a href="<?=weburl?>" target="_blank"class='T_a'>��վ��ҳ</a>
				</li>
				<li class='not'>
				<a href="<?=weburl?>mt/" class='T_a'>�ֻ���</a>
				</li>
				<!--<li class='not'>
				<a href="<?=weburl?>ser/newslist.php" target="_blank" class='T_a'>�������</a>
				</li>-->
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
		



				</div></div>	</div>
	<div class="general">
		<div class="main">
					<div class='top-logos'>
			<div class="indexlogo-bg"></div>
			<a target="_blank" alt='Դվ�̱�' title='�̱�����' href='#' class="hz-brand icons"></a>
			<a class="indexlogo" href="<?=weburl?>"></a>
			<img src="picture/t_l.png" class='top-zl'>
			</div>
			
		
			

<script language="javascript">topjconc(1,'��Ʒ');document.getElementById("topt").value="<?=$skey?>";</script>
			
			
			
				<li class="search Search-box" onmouseover="topover()" onmouseout="topout()">
	<span class="searchtype">��Դ��</span><i></i>
	<form name="topf1" method="post" onsubmit="return topftj()">
	<input  name="topt" id="topt" type="text" class="searchval Search-inp"/>
	<input type="image" src="<?=weburl?>homeimg/so.png" class="searchbtn Search-btn">
	<ul class="searchlist" style="display:none;"> 
	<li data='code'>  <a href="javascript:void();" onclick="topjconc(1,'��Դ��')">��Դ��</a></li>
	<li data='serve'> <a href="javascript:void();" onclick="topjconc(2,'�ѿ���')">�ѿ���</a></li> 
   <li data='domain1'> <a href="javascript:void();" onclick="topjconc(10,'������')">������</a></li> 
	

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
						<a href="<?=weburl?>code/search_j37v.html" class="bold ">Դ�뼯��</a><a href="<?=weburl?>serve/search_j208v.html" class="bold ">�����г�</a><a href="/web/search_j213v.html" class="bold ">��վ����</a><a href="/productym/search_j236v.html" class="">��������</a><a href="/task/" class="">�������</a>					</li>
					<li class='right'>
						<a href="<?=weburl?>shop/">�̼�</a> <a href="<?=weburl?>#">����</a> <a href="<?=weburl?>#">Ʒ��</a>  <a href="http://bbsxinhuzhan2.a6wang.com/portal.php" target="_blank">����</a>  <a href="http://bbsxinhuzhan2.a6wang.com/forum.php" target="_blank">����</a> 
						 <div class="clear"></div>
					</li>
				</div>
		</div>
	</div>
</div>


<!--ͷ��-->
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
					<h3><i class='iconfont'>&#xe6e7;</i><a href="<?=weburl?>code/search.html" target="_blank">Դ�뼯��</a></h3>
					<p>
						<a href="<?=weburl?>user/productlx.php" target="_blank">����Ʒ</a><a href="<?=weburl?>code/" target="_blank">����Ʒ</a><a href="<?=weburl?>code/" target="_blank">����</a>
					</p>
					<em class='line'></em>
				</div>
				<div class="sidebar_popup" style="display: none;">
									<div class="sidebar_popup_con clearfix">
											<div class="screen_box">
											<div class="screen_lists">
											
											 <? while1("*","epzhu_type where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
											<div class="screen_list"><div class="screen_name"><i id="isx-1"></i><span>����</span>��</div><div class="screen_con">
											
											
											
											
											
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
					<h3><i class='iconfont'>&#xe6d5;</i><a href="#" target="_blank">��������</a></h3>
					<p>
						<a href="/" target="_blank">����</a><a href="/" target="_blank">ƴ��</a><a href="/" target="_blank">����</a><a href="/" target="_blank">��</a>
					</p>
					<em class='line'></em>
				</div>
				<!-- ������ -->
				<div class="sidebar_popup" style="display: none; ">
					<div class="sidebar_popup_con clearfix">
						<div class="screen_box">
						 <? while1("*","epzhu_typeym where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
							<div class="screen_lists">
							
							
							
							<div class="screen_list"><div class="screen_name"><i id="isx-67"></i><span>����</span>��</div><div class="screen_con"<? while2("*","epzhu_typeym where type1='".$row1[type1]."' and admin=2 order by xh asc");while($row2=mysql_fetch_array($res2)){?>
	  <a href="<?=weburl?>serve/search_j<?=$row1[id]?>v_k<?=$row2[id]?>v.html"><?=$row2[type2]?></a>
	  <? }?></div></div>
							
							
						</div>    <? }?>
						</div>
					</div>
				</div>
				</dd>
				<dd id="3">
				<div class="sidebar_menu">
					<h3><i class='iconfont'>&#xe6d4;</i><a href="/" target="_blank">��վ����</a></h3>
					<p>
						<a href="/" target="_blank">��������</a><a href="/" target="_blank">��ҵ</a><a href="/ target="_blank">��</a>
					</p>
					<em class='line'></em>
				</div>
				<div class="sidebar_popup" style="display: none; ">
					<div class="sidebar_popup_con clearfix">
						<div class="screen_box">
						
						
						<? while1("*","epzhu_typewz where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
							<div class="screen_lists">
							<div class="screen_list"><div class="screen_name"><i id="isx-151"></i><span>����</span>��</div><div class="screen_con">
							
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
					<h3><i class='iconfont'>&#xe6e6;</i><a href="<?=weburl?>task/" target="_blank">�������</a></h3>
					<p>
						<a href="/" target="_blank">��վ����</a><a href="/" target="_blank">��ȫ</a><a href="/" target="_blank">����</a>
					</p>
					<em class='line'></em>
				</div>
				<!-- ������ -->
				<div class="sidebar_popup" style="display: none; ">
					<div class="sidebar_popup_con clearfix">
						<div class="screen_box">
							<div class="screen_lists">
							
							<? while1("*","epzhu_tasktype where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
							
							<div class="screen_list"><div class="screen_name"><i id="isx-129"></i><?=$row1[name1]?>��</div><div class="screen_con">	  <? while2("*","epzhu_tasktype where admin=2 and name1='".$row1[name1]."' order by xh asc");while($row2=mysql_fetch_array($res2)){?>
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
					<h3><i class='iconfont'>&#xe8a9;</i><a href="/serve/search_j208v.html" target="_blank">�����г�</a></h3>
					<p>
						<a href="/">����</a> <a href="/">���</a>   <a href="/">BUG</a>  <a href="/">ά��</a> 
					</p>
					<em class='line'></em>
				</div>
				<!-- ������ -->
				<div class="sidebar_popup" style="display: none; ">
					<div class="sidebar_popup_con clearfix">
						<div class="screen_box">
							<div class="screen_lists">
							 <? while1("*","epzhu_typekf where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
							<div class="screen_list"><div class="screen_name"><i id="isx-253"></i><span><?=$row1[type1]?></span>��</div><div class="screen_con"> <? while2("*","epzhu_typekf where type1='".$row1[type1]."' and admin=2 order by xh asc");while($row2=mysql_fetch_array($res2)){?>
	  <a href="<?=weburl?>serve/search_j<?=$row1[id]?>v_k<?=$row2[id]?>v.html"><?=$row2[type2]?></a>
	  <? }?></div></div>
	  <? }?>							</div>
						</div>
					</div>
				</div>
				</dd>
				<dd id="5">
				<div class="sidebar_menu">
					<h3><i class='iconfont'>&#xe97a;</i><a href="#" target="_blank">��������</a></h3>
					<p>
						<a href="#" target="_blank">��������</a><a href="#" target="_blank">����</a><a href="#" target="_blank">�ٱ�</a>
					</p>
					<em class='line'></em>
				</div>
				</dd>
				<dd id="5">
				<div class="sidebar_menu">
					<h3><i class='iconfont'>&#xe6e4;</i><a href="#" target="_blank">���Ͳ���</a></h3>
					<p>
						<a href="#" target="_blank">�ȵ㲩��</a><a href="#" target="_blank">д����</a>
					</p>
					<em class='line'></em>
				</div>
				</dd>
				<dd id="5">
					<div class="sidebar_menu last">
						<h3><i class='iconfont'>&#xe6e3;</i><a href="#" target="_blank">Ʒ��չʾ</a></h3>
						<p>
							<a href="/" target="_blank">Դ��</a><a href="/" target="_blank">��ѵ</a><a href="/" target="_blank">����</a><a href="/" target="_blank">����</a>
						</p>
					</div>
				</dd>

			</dl>
		</div>
   <!--��������������-->
  

		
				

	<div class="t-right">
		
	<div class='t-right-box'><div class="t-right-bg">
</div>
		<ul class="rtop">
			<cite></cite>
			<div>
				<a href='/help/view18.html' target='_blank'><i class='icons i-buy'></i><p>��ι���</p></a>
				<a href='/help/ggview20.html' target='_blank'><i class='icons i-shop'></i><p>��ο���</p></a>
				<a href='/help/gglist.html' target='_blank'><i class='icons i-help'></i><p>��������</p></a>
			</div>
        </ul>
		


		
		<div class="rbottom">

		
<span id="idlno">	
	
			<ul class="ruser" >
					<a href="javascript:;" class="avatar">
		<img  src="picture/none.jpg">
	</a>
	<div class="info" >
		<p>���ã���ӭ����Դվ��</p>
		
		
		
		
		<div class="login-btn"><a href="<?=weburl?>reg/reg.php" >ע��</a><span>/</span><a href="reg/">��¼</a></div>
		
		</div>
		
</ul></span>
	  <div id="idlyes" style="display:none;">
		<ul class="ruser">	
	<a href="<?=weburl?>user/touxiang.php" class="avatar"><img border="0" id="idltx1" src=""  />
	</a>
	<div class="info">
		<p>
			���ã�<b><span id="yesuid1"></span></b>
		</p>
		<div class="iu_link">
							<a href="<?=weburl?>user/">��������</a>
				<a href="user/favpro.php">�ҵ��ղ�</a>
				<a href="user/order.php">����</a>
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
							<p>��ݷ���</p>
						</a>
					</li>
					<li>
						<a><em class='icons i-jy'></em><i class='icons'></i>			
							<p>��������</p>
						</a>
					</li>
					<li>
						<a><em class='icons i-xb'></em><i class='icons'></i>
							<p >���ѱ���</p>	
						</a>
					</li>
					<li class='last'>
						<a><em class='icons i-sm'></em><i class='icons'></i>
							<p >ʵ���̼�</p>						
						</a>
					</li>
				</dt>

				<dd style='display:block'>
					��ʱ��أ�ֻ��1���Ӽ������ɽ������ף�
				</dd>
				<dd class='m'>
					�����Ա�ʽ�ĵ����������̣�����Դվ����ḻ���н�����飬�ý��ױ�ĸ���ȫ��
				</dd>
				<dd class='m'>		
					ͬ�����̼ҽ��н��ף�������ʧ�ܣ��˿�ɶ�����׽��5~10%�������⸶��
				</dd>
				<dd>
					�����̼Ҿ���ͨ���ֻ������ʵ����֤��
				</dd>
			</dl>
			<div class="scroll-search">
				<em class='icons'></em>
				<input name="" class='scroll-input'type="text" placeholder="�������̼�QQ���ֻ�����" x-webkit-speech="" x-webkit-grammar="bUIltin:search"><a id="search_seller">����ֱ��</a>
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
			���½��ף�
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
				
				<strong><?=mb_substr(returnnc($row1[userid]),0,2);?>***<?=mb_substr(returnnc($row1[userid]),-2,2);?></strong><em><?=$row1[money1]?></em>������<span><?=returntitdian($row1[tit],50)?></span>
			</a>
			</LI>	
 <? $i++;}?>


			
					
						</ul>
			</div>
			<div class="scrollac"><a title="����" id="scroll-prev" action='prev' class='icons scroll-action'></a><a title="����" id="scroll-next" action='next' class='icons scroll-action'></a></div>
		</div>
		<div class="scroll-index">

			<div class='right'>
			<cite>�ɽ�<i><?=sprintf("%.0f",$inittjarr[3]+returnsum("money1*num","epzhu_order where ddzt<>'backsuc' and ddzt<>'close'")+returnsum("money1*num","epzhu_orderkf where ddzt<>'backsuc' and ddzt<>'close'")+returnsum("money1*num","epzhu_orderyy where ddzt<>'backsuc' and ddzt<>'close'")+returnsum("money1*num","epzhu_orderym where ddzt<>'backsuc' and ddzt<>'close'")+returnsum("money1*num","epzhu_ordermg where ddzt<>'backsuc' and ddzt<>'close'")+returnsum("money1*num","epzhu_orderzh where ddzt<>'backsuc' and ddzt<>'close'")+returnsum("money1*num","epzhu_orderwz where ddzt<>'backsuc' and ddzt<>'close'"))?></i>Ԫ</cite>
			<cite>��  Ʒ��<i>
<?=returncount("epzhu_pro where zt<>99")+returncount("epzhu_prokf where zt<>99")+returncount("epzhu_proyy where zt<>99")+returncount("epzhu_proym where zt<>99")+returncount("epzhu_promg where zt<>99")+returncount("epzhu_prowz where zt<>99")+returncount("epzhu_prozh where zt<>99")?> </i> ��</cite>
			<cite>����<i><?=$inittjarr[2]
                                          +returncount("epzhu_order where (ddzt='wait' or ddzt='db' or ddzt='back' or ddzt='suc')")
										  +returncount("epzhu_orderkf where (ddzt='wait' or ddzt='db' or ddzt='back' or ddzt='suc')")
										  +returncount("epzhu_orderyy where (ddzt='wait' or ddzt='db' or ddzt='back' or ddzt='suc')")
										  +returncount("epzhu_ordermg where (ddzt='wait' or ddzt='db' or ddzt='back' or ddzt='suc')")
										  +returncount("epzhu_orderwz where (ddzt='wait' or ddzt='db' or ddzt='back' or ddzt='suc')")
										  +returncount("epzhu_orderym where (ddzt='wait' or ddzt='db' or ddzt='back' or ddzt='suc')")?></i>��</cite>
			<cite>��Ա<i><?=$inittjarr[4]+returncount("epzhu_user")?></i>λ</cite>
			<cite>�̼�<i><?=returncount("epzhu_user where shopzt=2")?></i>��</cite>
			</div>
			<div class='right'>
			<em class='icons'></em>		
			<span>ƽָ̨����</span>
			</div>
		</div>

	</div>
</div>
<div class='main'>
	<div class='index-goods'>
		<div class='goods-sidebar'>
			<h3>
				<a href='/code/' target="_blank" title='�鿴����Դ��'>
				<i class='iconfont'>&#xe6e7;</i>
				<p>Դ��</p>
				</a>
			</h3>
			<cite class='sidebar-toggle'>
				<a class='curr'>�Ƽ�Դ��</a>
				<a>���³���</a>
				
			</cite>
			<div class='shop'> 
				<i class='iconfont'>&#xe66d;</i><p>�Ƽ�<br>����</p>
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
					<h2>��<?=$money1?></h2>
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
					<h2>��<?=$money1?></h2>
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
							<p><em>��<?=returnjgdian(returnyhmoney($row2[yhxs],$row2[money2],$row2[money3],$sj,$row2[yhsj1],$row2[yhsj2],$row2[id]))?></em><a href="code/goods<?=$row2[id]?>.html" target="_blank" title="<?=returntitdian($row2[tit],30)?>"><?=returntitdian($row2[tit],30)?></a></p>
						</dd>
			<strong>TA��Դ��<i>(<?=returncount("epzhu_pro where zt=0 and ifxj=0 and userid=".$row1[id])?>)</i></strong>	<? }?>
		</dl>  <? }}?>       
			
				</div>
	</div>

	<div class='index-goods  index-goods-serve'>
		<div class='goods-sidebar sidebar-serve'>
			<h3>
				<a href='/serve/' target="_blank" title='�鿴�������'>
				<i class='iconfont'>&#xe8a9;</i>
				<p>����</p>
				</a>
			</h3>
			<cite class='sidebar-toggle'>
				<a class='curr'>���·���</a>
			
			</cite>
			<div class='shop'> 
				<i class='iconfont'>&#xe66d;</i><p>�Ƽ�<br>�̼�</p>
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
						<h2>��<?=$money1?></h2>
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
					<p><img class='xy' src='../img/dj/<?=returnxytp($sucnum)?>' title='<?=$sucnum?>������ֵ'></p>
				</span>
			</dt>
			<dd> 
				<strong>TA�ķ���<i>(<?=returncount("epzhu_prokf where zt=0 and ifxj=0 and userid=".$row1[id])?>)</i></strong>
				<? while2("*","epzhu_prokf where userid=".$row1[id]." order by iftj asc");if($row2=mysql_fetch_array($res2)){?>
									<p><em>��<?=returnjgdian(returnyhmoney($row2[yhxs],$row2[money2],$row2[money3],$sj,$row2[yhsj1],$row2[yhsj2],$row2[id]))?></em><a href="/serve/goods<?=$row2[id]?>.html" target="_blank" title="<?=returntitdian($row2[tit],30)?>"><?=returntitdian($row2[tit],30)?></a></p>	 	<? }?>
	
							</dd>
		</dl>   <? }}?>      
				
				</div>
	</div>

	<div class='index-goods  index-goods-web'>
		<div class='goods-sidebar sidebar-web'>
			<h3>
				<a href='/web/' target="_blank" title='�鿴������վ'>
				<i class='iconfont'>&#xe6d4;</i>
				<p>��վ</p>
				</a>
			</h3>
			<cite class='sidebar-toggle'>
				<a class='curr'>������վ</a>
				
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
						<em>��<?=$money1?></em>
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
				<a href='/productym/' target="_blank" title='�鿴��������'>
				<i class='iconfont'>&#xe6d5;</i>
				<p>����</p>
				</a>
			</h3>
			<cite class='sidebar-toggle'>
				<a class='curr'>��������</a>
				
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
							��<?=$money1?>						</h2>
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
				<a href='/task' target="_blank" title='�鿴��������'>
				<i class='iconfont'>&#xe6e6;</i>
				<p>����</p>
				</a>
			</h3>
			<cite class='sidebar-toggle'>
				<a class='curr'>��������</a>
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
							<em>��<?=$row[money1]?></em>
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
				<span>�����ȵ�</span>
				<a href="http://bbsxinhuzhan2.a6wang.com/portal.php">����&gt;</a>
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
				<span>��������</span>
				<a href="http://bbsxinhuzhan2.a6wang.com/forum.php">����&gt;</a>
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
				<span>�����ȵ�</span>
				<a href="#">����&gt;</a>
			</h3>
			<div class="index-blog-wrap">
				<div class="index-blog-lubo">
					<ul class="index-blog-lubo-box">
											<li style="opacity: 1;filter:alpha(opacity=100);"><a href="#" style="background:url(images/20181537469361350.jpg) center top no-repeat" target="_blank" title="�������������ðԴվ�̱ꡢ�����ʽ����Ӫģʽ������"></a></li>
						
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
				<span>��������</span>
				<a href="http://www.epzhu.com">����&gt;</a>
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
			<span>��������</span>
			<a target="_blank" href="/">��������&gt;</a>
		</h3>
		<dl>
			<dt>
			<? autoAD("ADI13");while0("*","epzhu_ad where adbh='ADI13' and zt=0 order by xh asc");while($row=mysql_fetch_array($res)){?>
		<a href="<?=$row[aurl]?>" target="_blank" rel="nofollow"><img alt="<?=$row[tit]?>" border=0 src="gg/<?=$row[bh]?>.<?=$row[jpggif]?>" style="width:110px;height:36px;"></a>
	 <? }?>
				

			</dt>
			<dd>
								 <? autoAD("ADI14");while0("*","epzhu_ad where adbh='ADI14' and zt=0 and type1='����' order by xh asc");while($row=mysql_fetch_array($res)){?>
 <a href="<?=$row[aurl]?>" target="_blank"><?=$row[tit]?></a>
 <? }?>
									<a href="/" title="����>" target="_blank">����></a>
							</dd>
		</dl>
	</div>
</div>
<? include("tem/bottom--.html");?>


</body>
</html>