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
<!--һƷ����www.epzhu.com-->
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
<link href="css/basic2.css" rel="stylesheet" type="text/css" />
<link href="css/index.css" rel="stylesheet" type="text/css" />
<link href="css/index1.css" rel="stylesheet" type="text/css" />
<link href="./epzhucom/basic.css" rel="stylesheet" type="text/css">
<script language="javascript" src="./epzhucom/index.js"></script>


</head>
<!--<? if(empty($rowcontrol[ifwap])){?>
<script language="javascript">
if(is_mobile()) {document.location.href= '<?=weburl?>m/';}
</script>
<? }?>-->
<body>

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
<? include("tem/top.html");?>
<? include("tem/top1.html");?>
<? include("tem/top2.html");?>
</div></div>



<!-- �ֲ���� -->
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

<!-- �ֲ������� -->

<!-- ��½��E--><div class="t_right">
<div class="index_user">
<span  class="rtop">
			<cite></cite>
			<div>
				<a href="/help/view18.html" target="_blank"><i class="icons i-buy"></i><p>��ι���</p></a>
				<a href="/help/ggview20.html" target="_blank"><i class="icons i-shop"></i><p>��ο���</p></a>
				<a href="/help/gglist.html" target="_blank"><i class="icons i-help"></i><p>��������</p></a>
			</div>
    </span>
<span class="no_login"  id="idlno" style="display:none;">
    	<a href="<?=weburl?>reg/reg.php" target="_blank" class="iu_reg"></a>
		<a href="reg/" class="iu_login"></a>
		<div class="user_third"><span>�������ʺŵ�¼��</span>
		<a  target="_blank"  href="<?=weburl?>config/qq/oauth/index.php" class="login_icon" title="QQ��ݵ�¼"></a>
    	<? if($rowcontrol[wxlogin]!="" && $rowcontrol[wxlogin]!=","){$wxlogin=preg_split("/,/",$rowcontrol[wxlogin]);?>
		<a class="login_icon" href="https://open.weixin.qq.com/connect/qrconnect?appid=<?=$wxlogin[0]?>&redirect_uri=<?=urlencode(weburl."reg/wxlogin.php")?>&response_type=code&scope=snsapi_login#wechat_redirect"  id="wechat" title="΢�ſ�ݵ�¼"></a>
		<? }?>
	</div>
	</span>
 <div id="idlyes">

	    <span class="ok_login"><ul>
	  <li class="iu_tx"><a href="<?=weburl?>user/touxiang.php"><img border="0" id="idltx1" src="" width="48" height="48" /></a></li>
	 <li class="iu_name">���ã�<strong><span id="yesuid1"></span></span></strong></li>
	 <li class="iu_link"><a href="<?=weburl?>user/">��Ա����</a> 
	 <a href="user/favpro.php">�ҵ��ղ�</a> <a href="user/order.php">����</a>	</li></ul>
    </span>
 <ul class="u1 fontyh">


 </ul>
 </div></div>
 <!--���ٵ�¼E-->
 <!--ƽָ̨�� һƷ���� ���� QQ1 20 036745-->

<div class="index_gg">
<li class="tisp"></li>
<ul>
<? while0("*","epzhu_gg where zt=0 order by sj desc limit 5");while($row=mysql_fetch_array($res)){?>
<li><div class="gt">��<A href="help/ggview<?=$row[id]?>.html" title="<?=$row[tit]?>" target=_blank> 
 <?=strgb2312($row[tit],0,60)?></A></div><div class="date">[<?=dateMD($row[sj])?>]</div></li>
<? }?>              
</ul>	</div>
<div class="rmerit">
				<dt>
					<li class="curr">
						<a><em class="icons i-kj"></em><i class="icons"></i>					
							<p>��ݷ���</p>
						</a>
					</li>
					<li>
						<a><em class="icons i-jy"></em><i class="icons"></i>			
							<p>��������</p>
						</a>
					</li>
					<li>
						<a><em class="icons i-xb"></em><i class="icons"></i>
							<p>���ѱ���</p>	
						</a>
					</li>
					<li class="last">
						<a><em class="icons i-sm"></em><i class="icons"></i>
							<p>ʵ���̼�</p>						
						</a>
					</li>
				</dt>
	</div>
</div>
</div> 


<div class="index_title" style="margin-top: 500px; font-size: 16px;"><div class="scrollico icons" style="
    float: left;
    width: 24px;
    height: 24px;
    background-position: -193px -480px;
    margin: 2px 3px 0 0;
">
			</div>
<h2><i style="font-size: 16px;<div class=&quot;scrollico icons&quot; style=&quot;      float: left;      width: 24px;      height: 24px;      background-position: -193px -480px;      margin: 2px 3px 0 0;  &quot;>     </div>;float: left;height: 28px;line-height: 28px;font-size: 14px;color: #333;">���½���</i></h2>
<div class="index_tab">

<div class="no_ck" id='cur'>


    <div id="scrollDiv">
   <ul style="margin-top: 0px;">
  <? $i=0;while1("*","epzhu_order where (ddzt='wait' or ddzt='db' or ddzt='suc') order by sj desc limit 2");while($row1=mysql_fetch_array($res1)){while2("id,bh,tit","epzhu_pro where bh='".$row1[probh]."'");;$row2=mysql_fetch_array($res2)?>
 <li><?=mb_substr(returnnc($row1[userid]),0,2);?>***<?=mb_substr(returnnc($row1[userid]),-2,2);?>
 <span class="blue"><a href="product/view<?=$row2[id]?>.html" title="<?=$row2[tit]?>" target="_blank"><?=returntitdian($row1[tit],30)?></span></a>�ɽ��ۣ�<font color="#ff6600"><strong>��<?=$row1[money1]?></strong></font>  <?=returnorderzt($row1[ddzt])?></li>
 <? $i++;}?>
 
	 </ul>
    </div>
	
	</div>
<div class="scroll-index"><em class="icons"></em><span>ƽָ̨����</span>
<cite><span>��  ��&nbsp;<em1><?=sprintf("%.0f",$inittjarr[3]+returnsum("money1*num","epzhu_order where ddzt<>'backsuc' and ddzt<>'close'")+returnsum("money1*num","epzhu_orderkf where ddzt<>'backsuc' and ddzt<>'close'")+returnsum("money1*num","epzhu_orderyy where ddzt<>'backsuc' and ddzt<>'close'")+returnsum("money1*num","epzhu_orderym where ddzt<>'backsuc' and ddzt<>'close'")+returnsum("money1*num","epzhu_ordermg where ddzt<>'backsuc' and ddzt<>'close'")+returnsum("money1*num","epzhu_orderzh where ddzt<>'backsuc' and ddzt<>'close'")+returnsum("money1*num","epzhu_orderwz where ddzt<>'backsuc' and ddzt<>'close'"))?></em1>&nbsp;Ԫ&nbsp;&nbsp;</span></cite> 
<cite><span>��  Ʒ��<em1><!--ԭ���ݵ�ȡ������׼����̨��ʼ������<?=$inittjarr[1]+returncount("epzhu_pro where zt=0 and ifxj=0")+returncount("epzhu_prokf where zt=0 and ifxj=0")+returncount("epzhu_proym where zt=0 and ifxj=0")+returncount("epzhu_proyy where zt=0 and ifxj=0")+returncount("epzhu_promg where zt=0 and ifxj=0")+returncount("epzhu_prowz where zt=0 and ifxj=0")+returncount("epzhu_prozh where zt=0 and ifxj=0")?>-->
<?=returncount("epzhu_pro where zt<>99")+returncount("epzhu_prokf where zt<>99")+returncount("epzhu_proyy where zt<>99")+returncount("epzhu_proym where zt<>99")+returncount("epzhu_promg where zt<>99")+returncount("epzhu_prowz where zt<>99")+returncount("epzhu_prozh where zt<>99")?> </em1> ��</span> 
										  
										 
<cite><span>��  ��&nbsp;<em1><?=$inittjarr[2]
                                          +returncount("epzhu_order where (ddzt='wait' or ddzt='db' or ddzt='back' or ddzt='suc')")
										  +returncount("epzhu_orderkf where (ddzt='wait' or ddzt='db' or ddzt='back' or ddzt='suc')")
										  +returncount("epzhu_orderyy where (ddzt='wait' or ddzt='db' or ddzt='back' or ddzt='suc')")
										  +returncount("epzhu_ordermg where (ddzt='wait' or ddzt='db' or ddzt='back' or ddzt='suc')")
										  +returncount("epzhu_orderwz where (ddzt='wait' or ddzt='db' or ddzt='back' or ddzt='suc')")
										  +returncount("epzhu_orderym where (ddzt='wait' or ddzt='db' or ddzt='back' or ddzt='suc')")?></em1>&nbsp;��&nbsp;&nbsp;</span></cite> 
<cite><span>��  Ա&nbsp;<em1><?=$inittjarr[4]+returncount("epzhu_user")?></em1>&nbsp;λ&nbsp;&nbsp;</span></cite> 
<cite><span>��  ��&nbsp;<em1><?=returncount("epzhu_user where shopzt=2")?></em1>&nbsp;��&nbsp;&nbsp;</span></cite> 
</div></div></div></div></div></div>




<div class="main">
	<div class="index-goods">
		<div class="goods-sidebar">
			<h3>
				<a href="https://www.epzhu.com" target="_blank" title="�鿴����Դ��">
				<i class="iconfont">��</i>
				<p>Դ��</p>
				</a>
			</h3>
			<cite class="sidebar-toggle">
				<a class="curr">�Ƽ�Դ��</a>
				<a>����Դ��</a>
			<!--	<a>������</a>-->
			</cite>
			<div class="shop"> 
				<i class="iconfont">�g</i><p>�Ƽ�<br>����</p>
			</div>
		</div> <div class="tuancon">
		<div class="tuan"style="top: 20px;font-size: 16px;">
		<div class="goods-box">
			<div class="goods-main">		
							<dl>
				

 <div class="tuancon">
<? 
$i=1;
while1("*","epzhu_pro where zt=0 and ifxj=0 and iftuan=1 and yhxs=2 and yhsj2>'".$sj."' order by yhsj2 asc limit 5");while($row1=mysql_fetch_array($res1)){
$money1=returnyhmoney($row1[yhxs],$row1[money2],$row1[money3],$sj,$row1[yhsj1],$row1[yhsj2],$row1[id]);
$au="epzhu/view".$row1[id].".html";
$dqsj=str_replace("-","/",$row1[yhsj2]);
while2("*","epzhu_user where id=".$row1[userid]);$row2=mysql_fetch_array($res2);
?>
<div>
 <span id="dqsj<?=$i?>" style="display:none;"><?=$dqsj?></span>
 <ul class="u1 u1<?=$i?>">
  <li class="l1"><a href="<?=$au?>"><img src="<?=returntppd(returntp("bh='".$row1[bh]."'","-1"),"img/none200x200.gif")?>" width="255" height="170" /></a><span></span>
  </li>
    <li class="l2"><?=$row2[shopname]?>| <a href="<?=$au?>"><span><?=strgb2312($row1[tit],0,36)?></span></a></li>
   <li class="l3"><span class="xj">��<?=$money1?>.00</span><span class="go"><a href="<?=$au?>"></a></span></li>
   </div>
   <? $i++;}?>
   </div></div>

				</dl>        

			</div>
			
			<div class="goods-main hide">
							<dl>
			 <div class="tuancon">
 <? 
 $i=1;
 while0("*","epzhu_pro where ifxj=0 and zt=0 order by lastsj desc limit 5");while($row=mysql_fetch_array($res)){
 if($i % 5==0){$nc=" u0";}else{$nc="";}
 $au="epzhu/view".$row[id].".html";
 $money1=returnjgdian(returnyhmoney($row[yhxs],$row[money2],$row[money3],$sj,$row[yhsj1],$row[yhsj2],$row[id]));
 ?>
 <ul>
  <li class="l1">
  <a href="<?=$au?>"  target="_blank"><img src="<?=returntppd(returntp("bh='".$row[bh]."'","-2"),"img/none60x60.gif")?>" width="220" height="176" /></a>
  <span id="dqsj<?=$i?>" style="display:none;"><?=$dqsj?></span>
  </li>
  <li class="l2"> <a href="<?=$au?>"  target="_blank"><span>
  <?=strgb2312($row[tit],0,30)?></span></a></li>
  <li class="l3"><span class="xj"><b>��</b><?=$money1?></span><span class="go"><a href="<?=$au?>"  target="_blank"></a></span></li>
  </ul>
  <? $i++;}?>
 </div>
				</dl>        
				
					<div class="clear"></div>
			</div>
		<div class="goods-demand hide">
							<dl>
				
				</dl>
				
			</div>
			
		</div>

	
	<div class="goods-shop">
				<dl>
<div class="rec_shop"style=" margin-top: -20px; margin-left: -16px; ">

<div>
   <? 
   while1("*","epzhu_user where zt=1 and shopzt=2 and shopname<>'' and pm>0 order by pm asc limit 8");for($i=1;$i<=5;$i++){
   if($row1=mysql_fetch_array($res1)){
   $sucnum=returnjgdw($row1[xinyong],"",returnxy($row1[id],1));
   ?>
 <ul><li>
      <a href="shop/view<?=$row1[id]?>.html" class="avatar" target="_blank"><img src="<?=returntppd("upload/".$row1[id]."/shop.jpg","img/none180x180.gif")?>" /></a>
	  <span class="info"><a href="shop/view<?=$row1[id]?>.html" target="_blank" class="name" ><?=strgb2312($row1[shopname],0,17)?></a>
	  <p  class="i_bz"><img src="../img/dj/<?=returnxytp($sucnum)?>" class="img1" title="����ֵ<?=$sucnum?>" /></p>
	
	 </span>
     </li>
	 <? while2("*","epzhu_pro where userid=".$row1[id]." and zt=0 and ifxj=0 and iftj>0 order by iftj asc");if($row2=mysql_fetch_array($res2)){?>
	   <li class='hot_goods'>
	   <strong>TA�ı���<i>(<?=returncount("epzhu_pro where zt=0 and ifxj=0 and userid=".$row1[id])?>)</i></strong>
	   	   <p><em>��<?=returnjgdian(returnyhmoney($row2[yhxs],$row2[money2],$row2[money3],$sj,$row2[yhsj1],$row2[yhsj2],$row2[id]))?></em>
		   <a href="epzhu/view<?=$row2[id]?>.html" target="_blank" ><?=returntitdian($row2[tit],30)?></a></p>
	 
		<? }?>
 </li>
 </ul>
<? }}?>
 
  </div>
 </div>		</dl>         
				</div></div></div></div>
	</div>
 
 



<div class="main">
	<div class="index-goods">
		<div class="goods-sidebar sidebar-serve"style="margin-top: 22px;">
			<h3>
				<a href="" target="_blank" title="�鿴����Դ��">
			<i class="iconfont">��</i>
				<p>����</p>
				</a>
			</h3>
			<cite class="sidebar-toggle">
				<a class="curr">���·���</a>
				<!--	<a>�Ƽ�����</a>
			<a>������</a>-->
			</cite>
			<div class="shop"style="
    margin-top: 135px;
"> 
				<i class="iconfont">�g</i><p>�Ƽ�<br>����</p>
			</div>
		</div> <div class="tuancon">
		<div class="tuan"style="top: 20px;font-size: 16px;    margin-top: 22px;">
		<div class="goods-box">
			<div class="goods-main">		
							<dl>
				

 <? 
 $i=1;
 while0("*","epzhu_prokf where ifxj=0 and zt=0 order by lastsj desc limit 5");while($row=mysql_fetch_array($res)){
 if($i % 5==0){$nc=" u0";}else{$nc="";}
 $au="productkf/view".$row[id].".html";
 $money1=returnjgdian(returnyhmoney($row[yhxs],$row[money2],$row[money3],$sj,$row[yhsj1],$row[yhsj2],$row[id]));
 ?>
 <ul>
  <li class="l1">
  <a href="<?=$au?>"  target="_blank"><span ></span><img src="<?=returntppd(returntp("bh='".$row[bh]."'","-2"),"img/none300x188.gif")?>" width="220" height="176" /></a>
  <span id="dqsj<?=$i?>" style="display:none;"><?=$dqsj?></span>
  </li>
  <li class="l2"> <a href="<?=$au?>"  target="_blank"><span>
  <?=strgb2312($row[tit],0,30)?></span></a></li>
  <li class="l3"><span class="xj"><b>��</b><?=$money1?></span><span class="go"><a href="<?=$au?>"  target="_blank"></a></span></li>
  </ul>
  <? $i++;}?>

				</dl>        
					 
			
			</div>
			
			<div class="goods-main hide">
							<dl>
				ججججججججج
				</dl>        
				
					<div class="clear"></div>
			</div>
		<div class="goods-demand hide">
							<dl>
				
				</dl>
				
			</div>
			
		</div>

	
	<div class="goods-shop">
				<dl>
<div class="rec_shop"style=" margin-top: -20px; margin-left: -16px; ">

<div>
   <? 
   while1("*","epzhu_user where zt=1 and shopzt=2 and shopname<>'' and pm>0 order by pm asc limit 8");for($i=1;$i<=5;$i++){
   if($row1=mysql_fetch_array($res1)){
   $sucnum=returnjgdw($row1[xinyong],"",returnxy($row1[id],1));
   ?>
 <ul><li>
      <a href="shop/view<?=$row1[id]?>.html" class="avatar" target="_blank"><img src="<?=returntppd("upload/".$row1[id]."/shop.jpg","img/none180x180.gif")?>" /></a>
	  <span class="info"><a href="shop/view<?=$row1[id]?>.html" target="_blank" class="name" ><?=strgb2312($row1[shopname],0,17)?></a>
	  <p  class="i_bz"><img src="../img/dj/<?=returnxytp($sucnum)?>" class="img1" title="����ֵ<?=$sucnum?>" /></p>
	
	 </span>
     </li>
	 <? while2("*","epzhu_pro where userid=".$row1[id]." and zt=0 and ifxj=0 and iftj>0 order by iftj asc");if($row2=mysql_fetch_array($res2)){?>
	   <li class='hot_goods'>
	   <strong>TA�ı���<i>(<?=returncount("epzhu_pro where zt=0 and ifxj=0 and userid=".$row1[id])?>)</i></strong>
	   	   <p><em>��<?=returnjgdian(returnyhmoney($row2[yhxs],$row2[money2],$row2[money3],$sj,$row2[yhsj1],$row2[yhsj2],$row2[id]))?></em>
		   <a href="epzhu/view<?=$row2[id]?>.html" target="_blank" ><?=returntitdian($row2[tit],30)?></a></p>
	 
		<? }?>
 </li>
 </ul>
<? }}?>
 
  </div>
 </div>		</dl>         
				</div>
	</div>
 
 
 </div></div></div></div></div>
 
 
	

<div class="main">
	<div class="index-goods">
		<div class="goods-sidebar sidebar-web"style="
    margin-top: 22px;height: 67%;
">
			<h3>
				<a href="" target="_blank" title="�鿴����Դ��">
			<i class="iconfont">��</i>
				<p>��վ</p>
				</a>
			</h3>
			<cite class="sidebar-toggle">
				<a class="curr">������վ</a>
				<!--	<a>�Ƽ�����</a>
			<a>������</a>w w w.e pz hu.c o m�� ��-->
			</cite>
			
		</div> <div class="tuancon">
		<div class="tuan"style="top: 20px;font-size: 16px;">
		<div class="goods-box">
			<div class="goods-main">		
							<dl>
				

 <? 
 $i=1;
 while0("*","epzhu_prowz where ifxj=0 and zt=0 order by lastsj desc limit 5");while($row=mysql_fetch_array($res)){
 if($i % 5==0){$nc=" u0";}else{$nc="";}
 $au="productwz/view".$row[id].".html";
 $money1=returnjgdian(returnyhmoney($row[yhxs],$row[money2],$row[money3],$sj,$row[yhsj1],$row[yhsj2],$row[id]));
 ?>
 <ul>
  <li class="l1">
  <a href="<?=$au?>"  target="_blank"><span ></span><img src="<?=returntppd(returntp("bh='".$row[bh]."'","-2"),"img/none300x188.gif")?>" width="220" height="176" /></a>
  <span id="dqsj<?=$i?>" style="display:none;"><?=$dqsj?></span>
  </li>
  <li class="l2"> <a href="<?=$au?>"  target="_blank"><span>
  <?=strgb2312($row[tit],0,30)?></span></a></li>
  <li class="l3"><span class="xj"><b>��</b><?=$money1?></span><span class="go"><a href="<?=$au?>"  target="_blank"></a></span></li>
  </ul>
  <? $i++;}?>

				</dl>        
					 
			
			</div>
			
			<div class="goods-main hide">
							<dl>
				ججججججججج
				</dl>        
				
					<div class="clear"></div>
			</div>
		<div class="goods-demand hide">
							<dl>
				
				</dl>
				
			</div>
			
		</div>

	
	<div class="goods-shop">
				<dl>
	</dl>         
				</div>
	</div>

	

<div class="main">
	<div class="index-goods">
		<div class="goods-sidebar sidebar-domain"style="
    margin-top: 22px;height: 65%;
">
			<h3>
				<a href="" target="_blank" title="�鿴����Դ��">
			<i class="iconfont">��</i>
				<p>����</p>
				</a>
			</h3>
			<cite class="sidebar-toggle">
				<a class="curr">��������</a>
				<!--	<a>�Ƽ�����</a>
			<a>������</a>-->
			</cite>

		</div></div> </div><div class="tuancon"></div>
		<div class="tuan"style="top: 20px;font-size: 16px;    margin-top: -84px;">
		<div class="goods-box">
			<div class="goods-main">		
							<dl>
				

 <? 
 $i=1;
 while0("*","epzhu_proym where ifxj=0 and zt=0 order by lastsj desc limit 10");while($row=mysql_fetch_array($res)){
 if($i % 5==0){$nc=" u0";}else{$nc="";}
 $au="productym/view".$row[id].".html";
 $money1=returnjgdian(returnyhmoney($row[yhxs],$row[money2],$row[money3],$sj,$row[yhsj1],$row[yhsj2],$row[id]));
 ?>
 <ul>
  <li class="l1"style="
    background: url(//statics.huzhan.com/image/index-domain-bg.jpg) right top repeat-x;
    text-align: center;
    color: #365092;
    font-size: 16px;
    line-height: 32px;
    height: 32px;
 
    display: block;
    white-space: nowrap;
    overflow: hidden;
    -o-text-overflow: ellipsis;
    text-overflow: ellipsis;
"> <a href="<?=$au?>"  target="_blank"><span>
  <?=strgb2312($row[ysweb],0,30)?></span></a></li>
  <li class="l2"> <a href="<?=$au?>"  target="_blank"><span>
  <?=strgb2312($row[tit],0,60)?></span></a></li>
  <li class="l3"><span class="xj"><b>��</b><?=$money1?></span><!--<span class="go"><a href="<?=$au?>"  target="_blank"></a>--></span></li>
  </ul>
  <? $i++;}?>

				</dl>        
					 
			
			</div>
			
			<div class="goods-main hide">
							<dl>
				ججججججججج
				</dl>        
				
					<div class="clear"></div>
			</div>
		<div class="goods-demand hide">
							<dl>
				
				</dl>
				
			</div>
			
		</div>

								<dl>
				
				</dl>        </div></div></div></div></div></div></div></div></div>


<div class="main">
	<div class="index-goods">
		<div class="goods-sidebar sidebar-task"style="
    margin-top: 22px;
">
			<h3>
				<a href="" target="_blank" title="�鿴����Դ��">
			<i class="iconfont">��</i>
				<p>����</p>
				</a>
			</h3>
			<cite class="sidebar-toggle">
				<a class="curr">��������</a>
				<!--	<a>�Ƽ�����</a>
			<a>������</a>-->
			</cite>
			<div class="shop"style="
    margin-top: 135px;
"> 
				<i class="iconfont">�g</i><p>�Ƽ�<br>����</p>
			</div>
		</div> <div class="tuancon">
		<div class="tuan"style="top: 20px;font-size: 16px;">
		<div class="goods-box">
			<div class="goods-main">		
							<dl style="
    margin-top: 5px;
">
				


<!--��������ʼ-->

<div>


<div class="i_c_div" id="sell_task" style="display: block;width: 1200px;    margin-left: 0px;">
 <div class="t_b_list">
 <div class="tasklist">
 
 <?
 pagef($ses,5,"epzhu_task","order by sj desc");while($row=mysql_fetch_array($res)){
 taskok($row[id]);
 ?>
 <ul class="ulist fontyh">
 <li class="l1">
 <a href="/task/view<?=$row[id]?>.html" title="<?=$row[tit]?>" target="_blank" class="g_ac2"><?=returntitdian($row[tit],50)?></a><br>
 <span class="hui"><?=strgb2312(strip_tags($row[txt]),0,40)?></span>
 </li>
 <li class="l2"><? if($row[money3]>0){?><span class="s1">���йܽ��</span><? }else{?><span class="s2">ѡ����й�</span><? }?></li>
 <li class="l3"><?=returntaskxs($row[taskty])?></li>
 <?
 if(empty($row[taskty])){
 ?>
 <li class="l4">
 <? if(empty($row[zt])){?><strong>1</strong>��<? }else{?><strong>0</strong>��<? }?>
 </li>
 <? }else{?>
 <li class="l41">
 <span class="s1"><strong><?=$row[tasknum]-$row[taskcy]?></strong>��(��<?=$row[tasknum]?>��)</span>
 <span class="s2"></span>
 <span class="s3" style="width:<? $okbfb=$row[taskcy]/$row[tasknum];echo 100*(1-$okbfb);?>px;"></span>
 <span class="s4"><?=sprintf("%.2f",(1-$okbfb)*100)?>%</span>
 </li>
 <? }?>
 <li class="l5"><strong><?=$row[money1]?></strong>Ԫ</li>
 <li class="l6"><?=returntask($row[zt])?></li>
 <li class="l7">
 <?
 if((empty($row[taskty]) && 0==$row[zt]) || (1==$row[taskty] && 101==$row[zt])){
 ?>
 <a href="/task/view<?=$row[id]?>.html" class="a1" target="_blank">����������</a>
 <?
 }else{
 ?>
 <a href="/task/view<?=$row[id]?>.html" class="a2" target="_blank">���鿴����</a>
 <? }?>
 </li>
 </ul>
 <? }?>
</div>
</div>
</div></div>
<!--�����������-->

				</dl>        
					 
			
			</div>
			
			<div class="goods-main hide">
							<dl>
				ججججججججج
				</dl>        
				
					<div class="clear"></div>
			</div>
		<div class="goods-demand hide">
							<dl>
				
				</dl>
				
			</div>
										<dl>
				
				</dl>
		</div>

	
	<div class="goods-shop">
				<dl>
 </div>		</dl>         
				</div>
	</div>
	
	
	
   <script language="javascript">
userChecksj();
</script>
<!--������ʼ-->
<script>
var Mar = document.getElementById("Marquee");
var child_div=Mar.getElementsByTagName("div")
var picH = 67;//�ƶ��߶�
var scrollstep=3;//�ƶ�����,Խ��Խ��
var scrolltime=20;//�ƶ�Ƶ��(����)Խ��Խ��
var stoptime=3000;//���ʱ��(����)
var tmpH = 0;
Mar.innerHTML += Mar.innerHTML;
function start(){
if(tmpH < picH){
tmpH += scrollstep;
if(tmpH > picH )tmpH = picH ;
Mar.scrollTop = tmpH;
setTimeout(start,scrolltime);
}else{
tmpH = 0;
Mar.appendChild(child_div[0]);
Mar.scrollTop = 0;
setTimeout(start,stoptime);
}
}
setTimeout(start,stoptime);
</script>
<!--��������-->

<!-- ������ ent -->

 
 
 
 </div></div></div></div></div></div></div></div></div></div></div></div></div></div></div></div></div>
 



 
 
 
 
</div></div></div></div></div></div></div></div></div></div></div></div></div></div></div></div></div>

<div class="index_title">
<h2><i>Link</i></h2>
<div class="index_tab" style="left:60px;">
<div class="no_ck" id='cur'><span>��������</span></div>
</div>
<a target="_blank" href="">������������></a>
</div>
<dl class="link">
	<dt class="u2">
	 <? autoAD("ADI13");while0("*","epzhu_ad where adbh='ADI13' and zt=0 order by xh asc");while($row=mysql_fetch_array($res)){?>
		<a href="<?=$row[aurl]?>" target="_blank" rel="nofollow"><img alt="<?=$row[tit]?>" border=0 src="gg/<?=$row[bh]?>.<?=$row[jpggif]?>" width="110" height="38"></a>
	 <? }?>


	</dt>
	<dd class="u3">
	 <? autoAD("ADI14");while0("*","epzhu_ad where adbh='ADI14' and zt=0 and type1='����' order by xh asc");while($row=mysql_fetch_array($res)){?>
 <a href="<?=$row[aurl]?>" target="_blank"><?=$row[tit]?></a>
 <? }?>
			</dd>
</dl>
</div>
</div></div></div></div></div></div></div></div></div></div></div></div></div></div></div></div>

<script type="text/javascript" src="js/bc1fa6a2bdda468da46e55e78d0ae795.js" charset="UTF-8"></script>
</body>
</html>

<? include("tem/bottom.html");?>
