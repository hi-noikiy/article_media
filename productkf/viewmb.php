<?
include("../config/xy.php");
$sj=date("Y-m-d H:i:s");
$id=$_GET[id];
while0("*","epzhu_prokf where zt<>99 and id=".$id);if(!$row=mysql_fetch_array($res)){php_toheader("../");}
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
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Pg-Type" content="serve">
<meta name="keywords" content="<?=returnjgdw($row[wkey],"",$row[tit])?>">
<meta name="description" content="<?=returnjgdw($row[wdes],"",strgb2312(strip_tags($row[txt]),0,250))?>">
<title><?=$row[tit]?> - <?=webname?></title>
<link href="static/css/basic.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="<?=weburl?>js/basic.js"></script>
<script language="javascript" src="<?=weburl?>productkf/view.js"></script>
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script language="javascript" src="../js/layer.js"></script>
<script language="javascript" src="js/layui.js"></script>
<script language="javascript" src="js/jquery.m.js"></script>   
<script language="javascript" src="js/common.js"></script>
<script language="javascript" src="js/market.js"></script>
<script language="javascript" src="js/com.js"></script>


<link href="static/css/market.css" rel="stylesheet" type="text/css" /><link href="static/css/layui.css" rel="stylesheet" type="text/css" /></head>
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
<div class="header">
	<? include("../tem/top---.html");?>
	<div class="general main">
		<li class="logo s-logo">
			<a href="/"></a>
		</li>
		<? $xy=returnjgdw($rowsell[xinyong],"",returnxy($row[userid],1));?>
		<li class="top_sinfo">
			<p class='u_t_i'>				<strong><?=$rowsell[shopname]?></strong><img class='xy' src='../img/dj/<?=returnxytp($xy)?>' title='<?=$xy?>��'>			</p>
			<p>
				<a class="toggle_center">
					<span style='color:#cccccc;padding-left:0'>[</span>����<em><?=returnjgdian($rowsell[pf1])?></em><span>|</span>Ч�ʣ�<em><?=returnjgdian($rowsell[pf2])?></em><span>|</span>������<em><?=returnjgdian($rowsell[pf3])?></em> <span style='color:#cccccc'>]</span>
				</a>
			</p>
			<ul class="rev_pop" style="display:none;">
				<table class='pop_pf'>
					<thead>
						<tr>
							<th style="width: 60%;text-align:left">�����ۺ�����(0��)</th>
							<th>��ͬ�����</th>
						</tr>
					</thead>
					<tbody>
						<tr><td>����̬�ȣ� <?=returnjgdian($rowsell[pf1])?></td><td><i>����</i> <span><?=returnjgdian($rowsell[pf1])?>%</span></td></tr>
						<tr><td>����Ч�ʣ� <?=returnjgdian($rowsell[pf2])?></td><td><i>����</i> <span><?=returnjgdian($rowsell[pf2])?>%</span></td></tr>
						<tr><td>��������� <?=returnjgdian($rowsell[pf3])?></td><td><i>����</i> <span><?=returnjgdian($rowsell[pf3])?>%</span></td></tr>
					</tbody>
				</table>
				<table class='pop_info' style='width:200px;'>
					<thead>
						<tr>
							<th>&nbsp;</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td  style="width: 35%;">
								����ʱ�䣺<?=dateYMD($rowsell[sj])?>							</td>
						</tr>
						<tr>
							<td>
								����������<?=returncount("epzhu_prokf where userid=".$rowsell[id]." and zt=0")?>  ��
							</td>
						</tr>
						<tr>
							<td class="certification">�̼���֤��
							
							 <? if(1==$rowsell[ifemail]){?>	<i class='success' title='��ͨ��������֤'></i><? }else{?><img src="../img/yx1.png" title="����δ��֤ "style=" padding-right: 3px; " /><? }?>
  <? if(1==$rowsell[ifmot]){?><i class='phone success' title='��ͨ���ֻ���֤'></i>
  <? }else{?><img src="../img/sj0.png" title="�ֻ�δ��֤ "style=" padding-right: 3px; " /><? }?>
  <? if(1==$rowsell[sfzrz]){?><i class='idcard success' title='��ͨ�������֤'></i>
  <? }else{?><img src="../img/shen0.png" title="���֤δ��֤ "style=" padding-right: 3px; " /><? }?>
							
								</i>
							</td>
						</tr>
					</tbody>
				</table>
				<div class="t_p_bottom">
					<a href="/shop/view<?=$row[userid]?>.html">�̼ҵ��̡�</a>
				</div>
			</ul>
		</li>
				<li class="search Search-box" onmouseover="topover()" onmouseout="topout()">
						<span class="searchtype">��Դ��</span><i></i>
			<form name="topf1" method="post" onsubmit="return topftj()">
			
			<input  name="topt" id="topt" type="text" class="searchval Search-inp"/>
			<input type="image" src="<?=weburl?>homeimg/so.png">
			<ul class="searchlist" style="display:none;"> 
			<li data='serve'>  <a href="javascript:void();" onclick="topjconc(1,'��Դ��')">��Դ��</a></li>

			<li data='domain'> <a href="javascript:void();" onclick="topjconc(2,'�ѿ���')">�ѿ���</a></li> 
			
			

  </ul>
</li>
	</div>
	<div class="shop_banner"><div class="main" t-bg="#fff"  style="background:url(../upload/<?=$row[userid]?>/bannar.jpg) center top no-repeat;">
			</div>
	</div>
	<div class="shop_nav">
		<div class="main">
			<li class='gs'>
				<span>������Ʒ<em></em></span>
				<div class="gsbox">
					<a href='/shop/prolist_i<?=$rowsell[id]?>v.html'>Դ��<em>(<?=returncount("epzhu_prokf where userid=".$rowsell[id]." and zt=0")?>)</em></a>		</div>
			</li>
			<li>
				<a href="/shop/view<?=$row[userid]?>.html">��ҳ</a>
			</li>
		</div>
	</div>
</div>
<script type="text/javascript"> 
	$(document).ready(function() {
		$(".shop_nav .gs").hover(
						 function() {
							 $(this).addClass('hzcur');
							 $(this).children("div").show();;
						 },
						 function(){ 
							   $this=$(this);
							   $this.removeClass('hzcur');
							   setTimeout(function(){ 
							   if(!$this.hasClass('hzcur')) {
							   $this.children("div").hide();
							   }
						  },1); 
		});
	});
</script> <div class="dqwz">��ǰλ�ã�<a href="/">��ҳ</a> <span>></span> <a href="search_j<?=$row[ty1id]?>v.html"><?=returntype(1,$row[ty1id])?></a> <span>></span>

<? if(0!=$row[ty2id]){?> > <a href="search_j<?=$row[ty1id]?>v_k<?=$row[ty2id]?>v.html"><?=returntype(2,$row[ty2id])?></a><? }?><span>></span>
 <? if(0!=$row[ty3id]){?> > <a href="search_j<?=$row[ty1id]?>v_k<?=$row[ty2id]?>v_m<?=$row[ty3id]?>v.html"><?=returntype(3,$row[ty3id])?></a><? }?>

<div class='main'>
	<!--���--><? $xy=returnjgdw($rowsell[xinyong],"",returnxy($row[userid],1));?>
	<div class="g_side left">
		<div class="seller g_box">    
			<div class="s_info">    
				<ul class="s_mark">  
					<img src="../upload/<?=$row[userid]?>/shop.jpg"  width="200" height="200">
				</ul>
				<ul class="s_name" >
					<?=$rowsell[shopname]?>				</ul>
				<ul class="xy">    
					�̼�������<img class='xy' src='../img/dj/<?=returnxytp($xy)?>' title='����ֵ<?=$xy?>'>				</ul>
				<ul class='certification'>�̼���֤��
				<? if(1==$rowsell[ifmot]){?><i class="phone success" title="��ͨ���ֻ���֤"></i><? }else{?><i class="phone successs" title="δͨ���ֻ���֤"></i><? }?>
<? if(1==$rowsell[ifemail]){?><i class="success" title="��ͨ��������֤"></i><? }else{?><i class="successs" title="δͨ��������֤"></i><? }?>
<? if(1==$rowsell[sfzrz]){?><i class="idcard success" title="��ͨ�������֤"></i><? }else{?><i class="idcard successs" title="δͨ�������֤"></i><? }?>
				
				
									</ul>
			
				<ul class="shop_score">
					<div>
						<cite>
							<p><span>����</span></p> 
							<p class="up"><?=returnjgdian($rowsell[pf1])?><i class="iconfont">&#xe648;</i></p>						</cite>
						<cite> 
							<p><span>Ч��</span></p>
							<p class="up"><?=returnjgdian($rowsell[pf2])?><i class="iconfont">&#xe648;</i></p>						</cite> 
						<cite> 
							<p><span>����</span></p>
							<p class="up"><?=returnjgdian($rowsell[pf3])?><i class="iconfont">&#xe648;</i></p>						</cite> 
					</div>
				</ul>
				<ul class="shop_btns">
						<a href="../shop/view<?=$rowsell[id]?>.html">
						  <i class="iconfont">�w</i><span>������</span>
			
  </a>			<? 
  $a1="none";$a2="none";
  if($_SESSION["SHOPUSER"]==""){$a1="";}else{
  if(panduan("*","epzhu_shopfav where shopid=".$rowsell[id]." and userid=".$nuid."")==1){$a2="";}else{$a1="";}
  }
  ?>
    <li class="l2" id="favsno" style="display:<?=$a1?>;"><a  href="javascript:shopfavInto(<?=$rowsell[id]?>)" class="collection imfav">
  <i class="iconfont">�v</i><span>�ղص���</span>
  </a></li>
  <li class="l2" id="favsyes" style="display:<?=$a2?>;"><a  href="../user/favshop.php" class="collection imfav">
  <i class="iconfont">�v</i><span>�Ѿ��ղ�</span>
   </a>
				</ul>
				<ul><? if($rowsell[baomoney]>0){?>
<a class="bond_info" target="_blank" href="<?=weburl?>user/baomoney1.php"><i class="iconfont va-1">&#xe65f;</i>�̼��ѽ��ɱ�֤��<em class="orange va-1"><strong><?=sprintf("%.2f",$rowsell[baomoney])?></strong></em>Ԫ</a>

<? }?>
								
									</ul>
			</div>

			<div class="s_tit">��ϵ�̼�</div>
			<div class="s_list" id='layer_cont'>
			
			<div class="uim">
<div class="qq" title="��ϵQQ"><a href="http://wpa.qq.com/msgrd?v=3&uin=<?=returnqq($row[userid])?>&site=<?=weburl?>&menu=yes" target=_blank><?=returnqq($row[userid])?></a></div>
<? if($rowsell[weixin]){?><div class="wechat" title="��ϵ΢��"><p><?=$rowsell[weixin]?></p></div><? }?>
<? if($rowsell[mot]){?><div class="phone" title="��ϵ�绰"><p><?=$rowsell[mot]?></p></div><? }?></span></div>

			</div>
			<div class='s_tit'>��������</div>
			<div class="s_list">
			<div class="shop_search Search-box">
				<li class='gradio'>��Ʒ��<label class='tips' T-bg='#ff8400' title='���깲��<b>Դ��</b>(3)��'><input  type='radio' name='good_type' value='#'>Դ��</label><label class='tips' T-bg='#ff8400' title='���깲��<b>����</b>(3)��'><input checked type='radio' name='good_type' value='#'>����</label></li>
				<li>������<input type="text" class='inp Search-inp' value id='shop_key' placeholder="��������" name="key" style='width:123px;'/> </li>
				<li>�۸�<input name="am" class='inp Search-inp' placeholder='��' type="text" /> - <input name="dm" class='inp Search-inp' placeholder='��' type="text" /> </li>
				<li><input type="button" id='shop_search' class='Search-btn btn' value="�� ��" /> </li>
			</div>
			</div>
			<div class="s_tit">���ڷ���</div>
			<div class="s_list" style='padding:0'>
			<div class="s_s_list">
			
			
			 <? 
	 $i=1;
	 while1("*","epzhu_typekf where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1));
     while1("*","epzhu_prokf where userid=".$row[userid]." and zt=0 and ifxj=0 order by xsnum desc limit 5");while($row1=mysql_fetch_array($res1)){$tp="../".returntp("bh='".$row1[bh]."' order by xh asc","-2");
	 ?>
									<dl>
						<dt>
							<a href="view<?=$row1[id]?>.html" target="_blank"><img alt="<?=returntitdian($row1[tit],37)?>" src="<?=returntppd($tp,"../img/none60x60.gif")?>" class='G-image'></a>
						</dt>
						<dd>
							<p class='tit'><a href="view<?=$row1[id]?>.html" target="_blank"><?=returntitdian($row1[tit],37)?>...</a></p>
							<p>���֣�<b class='red'></b> ��</p>
							<p>�۸�<b class="orange"></b> Ԫ</p>
						</dd>
					</dl>  <? 
	  $i++;
	  }
	  ?>
									
							 </div>
			</div>
			<div class="s_tit">�����֮</div>
			  
	</div>
	</div>
	<!--�ұ�-->

	
	
	<div class="g_main right">
		<div class="g_top s g_box">
			 <div class="c_g_show">
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
				 <img src="<?=returntppd($tp,"../img/none300x300.gif")?>"  class="c_g_img" />
				 <? for($j=0;$j<$i;$j++){?>
  <? }?>


				 <div class="c_g_ihd">
				 
				  <span class="sc"  id="favpno" style="display:<?=$a1?>;" ><i class="iconfont">&#xe60b;</i><a href="javascript:profavInto('<?=$row[bh]?>')" class="imfav">�ղ���Ʒ</a></span>
  <span class="sc" id="favpyes" style="display:<?=$a2?>;"><i class="iconfont">�e</i><a href="../user/favpro.php">���ղ�</a></span>
					
					
  
					
					<span class="l2">
						<span class="fx icons" style='background:#fff;'>
							<div>����</div>
						</span>
						<!--share start-->
						<div class="G-share">
							<a class="share-a G-weixin" data="weixin" title="����΢��"></a>
							<a class="share-a G-qzone" data="qzone"  title="����QQ�ռ�"></a>
							<a class="share-a G-sqq" data="qq" title="����QQ����"></a>
							<a class="share-a G-tsina" data="sina" title="��������΢��"></a>
						</div>
						<!--share end-->
					</span>
				
				</div>
			</div>
			<div class="c_g_det">
				<div class="c_g_tit">
					<?=$row[tit]?>				<br />
				</div>
				<div class="c_g_att">
					<ul class="g_des">
						<li class="l2"></li>
					</ul>
								<ul>
												</ul>
					<div class="c_g_alm">
											<ul class="g_m">
							<li class="l1">
								��&nbsp;��
							</li>
							<li class="l2">
								<div class="price"><span>��</span><em class='price_m'><?=$nowmoney?></em><span id="nowmoneyY" style="display:none;"><?=$nowmoney?></span></div><div class="jf">

 <? 
   if(2==$row[yhxs] && $sj<=$row[yhsj2]){
   if($sj<$row[yhsj1]){$a=1;}else{$a=2;}
   ?>
   <span id="nyhsj1" style="display:none;"><?=str_replace("-","/",$row[yhsj1])?></span>
   <span id="nyhsj2" style="display:none;"><?=str_replace("-","/",$row[yhsj2])?></span>
   <span id="nmoney2" style="display:none;"><?=returnjgdian($row[money2])?></span>
   <span id="nmoney3" style="display:none;"><?=returnjgdian($row[money3])?></span>
   <span id="nowsj" style="display:none;"><?=str_replace("-","/",$sj)?></span>
   <a href="" target="_blank"><?=$row[yhsm]?><strong style="color:#ff4400"></strong><span id="yhsjv"></a></div></li>
   </ul>
   <script language="javascript" src="yhsj.js"></script>
   <script language="javascript">yhsj(<?=$a?>);</script>
   <? }?>
							</li>
						</ul> 
													<!--<span class="Edition" style="display:none;"><a data="100.00" title='' class='cur'></a></span>-->
										</div>
			
			
		
			
			
			
			
			
			
			
			
					<ul class="c_g_but">
						<li class="l2"><a class="cartadd"  id="bcar" href="javascript:buyInto('<?=$row[bh]?>')"><i class="iconfont">&#xe642;</i> <b>��������</b></a><? 
   $a1="none";$a2="none";
   if($_SESSION["SHOPUSER"]==""){$a1="";}else{
	if(panduan("probh,userid","epzhu_carkf where probh='".$row[bh]."' and userid=".$nuid)==1){$a2="";}else{$a1="";}
   }
   ?>
   <a href="javascript:carInto('<?=$row[bh]?>')" id="cara1" style="display:<?=$a1?>;" class="car" title="��ӹ��ﳵ" ><img src="img/che.png" width="50" height="40" border="0" /></a>
   <a href="../user/carkf.php" id="cara2" style="display:<?=$a2?>;" class="carok" title="���ڹ��ﳵ"><img src="img/cheok.png" width="50" height="40" border="0" /></a>
												
												<input type="text" onChange="moneycha()" id="tkcnum" style="width:20px;" value="1" />
										   <a href="javascript:void(0);" onClick="shujia()" class="a1">+</a>
   <a href="javascript:void(0);" onClick="shujian()" class="a2">-</a>
												
						</li>
					</ul>
										<UL class="c_g_ser">
		<DIV class=fw_name>
					<LABEL class="l1">��&nbsp;�ϣ�</LABEL> 
						<? if($row[fhxs]==2 || $row[fhxs]==3 || $row[fhxs]==4){?><a class="fw_a fw_on"><i class='iconfont'>&#xe652;</i><em>�Զ�����</em></a><? }?>
						<? if(1==$row[ifuserdj]){?><a class="fw_a "><i class='iconfont'>&#xe652;</i><em>��Ա�ۿ�</em></a><? }?>
						<a class="fw_a "><i class='iconfont'>&#xe652;</i><em>��������</em></a>
						<A class="fw_a tpay"><em>֧����ʽ</em><i class=iconfont style='line-height:15px;font-size:13px;color:#666'>&#xe658;</i></A>
		</DIV>
		<DIV class='fw_txt'>
			<? if($row[fhxs]==2 || $row[fhxs]==3 || $row[fhxs]==4){?><cite style="DISPLAY:block;">�Զ�������Ʒ����ʱ���Թ�����ȴ���</cite><? }?><? if(1==$row[ifuserdj]){?><cite >��ͬ��Ա�ȼ�����ͬ�����ۿۡ�����߼���VIP������ء�</cite><? }?><cite >�������ף������ⲻ���24Сʱ�ڿ������˿��ȫ��֤��</cite>			<cite class='fw_pay'>
			<p><a><i class=iconfont style='color:#00aaef'>&#xe654;</i>֧����</a><a><i class=iconfont style='color:#1ea838'>&#xe657;</i>΢��֧��</a></p>
			<p><a><i class=iconfont style='color:#ff8500'>&#xe655;</i>�Ƹ�ͨ</a><a><i class=iconfont style='color:#082f67'>&#xe656;</i>��������</a></p>
			</cite>
		</DIV>
</UL>
				</div>
			</div>
		</div>
<? $xy=returnjgdw($rowsell[xinyong],"",returnxy($row[userid],1));?>
				<div class="g_box">	
			<div class="c_r_menu" id="layer_top">
				<ul class="layer_uim s">
					<li class='tit'><i class="iconfont va-1">&#xe62f;</i> ��ϵ����</li>
					
					<ul class="c_s_cont" >
<div class="uim">
<div class="qq" title="��ϵQQ"><a href="http://wpa.qq.com/msgrd?v=3&uin=<?=returnqq($row[userid])?>&site=<?=weburl?>&menu=yes" target=_blank><?=returnqq($row[userid])?></a></div>
<? if($rowsell[weixin]){?><div class="wechat" title="��ϵ΢��"><p><?=$rowsell[weixin]?></p></div><? }?>
<? if($rowsell[mot]){?><div class="phone" title="��ϵ�绰"><p><?=$rowsell[mot]?></p></div><? }?></span></div></ul>
					
				</ul>
				<em class="c_aa cur"><i class="iconfont">&#xe627;</i> ��Ʒ����</em>
				<em class="c_bb"><i class="iconfont">&#xe602;</i> ��������</em>
				<em class="c_cc"><i class="iconfont">&#xe628;</i> ���׹���</em>
				<em class="c_dd" a><i class='iconfont va-1'>&#xe719;</i> <a href="<?=weburl?>help/aboutview8.html"  target=_blank> ��ƭָ��</a></em>
				<ul><a href="javascript:buyInto('<?=$row[bh]?>')" class="buys s serve_btn">
			<i class='iconfont' >&#xe642;</i> <b>��������</b></a>
				</ul>
			</div>
			<div class="c_r_des lazyload" id="c_aa" style='position:relative'>
			
<p>
 <!--���Ľ���B-->
 <ul class="probq">
 <? 
 $a=preg_split("/xcf/",$row[tysx]);
 $sx1arr=array();
 $sxall="xcf";
 $m=0;
 for($i=0;$i<=count($a);$i++){
  $ai=$a[$i];
  if($ai!=""){
   if(!is_numeric($ai)){$z1=preg_split("/:/",$ai);$ai=$z1[0];}
   while1("*","epzhu_typesxkf where id=".$ai);if($row1=mysql_fetch_array($res1)){
    while2("*","epzhu_typesxkf where name1='".$row1[name1]."' and admin=1 and ifjd=1");if($row2=mysql_fetch_array($res2)){
     if(!in_array($row1[name1],$sx1arr)){$sx1arr[$m]=$row1[name1];$m++;}
     if(!is_numeric($a[$i])){$z1=preg_split("/:/",$a[$i]);$v=$z1[1];}else{$v=$row1[name2];}
     $sxall=$sxall.$row1[name1].":".$v."xcf";
    }
   }
  }
 }
 for($i=0;$i<count($sx1arr);$i++){
 ?>
 <li class="l1"><?=$sx1arr[$i]?>��</li><li class="l2"><? $b=preg_split("/xcf/",$sxall);for($j=0;$j<=count($b);$j++){if(check_in($sx1arr[$i],$b[$j])){echo str_replace($sx1arr[$i].":","",$b[$j])." ";}}?></li>
 <? }?>
 </ul>
 <? $protxt=$row[txt];?>
 <? if(check_in("video",$row[txt])){?>
 <link href="../config/ueditor/third-party/video-js/video-js.min.css" rel="stylesheet" type="text/css" />
 <script language="javascript" src="../config/ueditor/third-party/video-js/video.dev.js"></script>
 <? }?>
 <?=$protxt?></div>
		</div>
		<div class="g_box">
			<div class="c_r_cap dan"  id="c_bb">
				<em>&nbsp;&nbsp;&nbsp;��������</em>
				<ul class="c_r_page s_ajax_page">
					<div class="total_tips"></div>
					<a id="p_up" class="no"> < </a>
					<p><b class="curPage">1</b>/<span class="totalPage">1</span>ҳ</p>
					<a id="p_down" class="no"> > </a>
					<input type="text" name="" class="o_number">
					<a class="gopage">��ת</a>
				</ul>
			</div>
			<div class="c_r_rev" id='code_pg_scTop'>
			
 <? 
 while1("*","epzhu_propjkf where probh='".$row[bh]."' order by sj desc limit 10");while($row1=mysql_fetch_array($res1)){
 $usertx="../upload/".$row1[userid]."/user.jpg";
 if(!is_file($usertx)){$usertx="../user/img/nonetx.gif";}else{$usertx=$usertx."?id=".rnd_num(1000);} 
 $sqlpro="select * from epzhu_prokf where bh='".$row1[probh]."'";
 mysql_query("SET NAMES 'GBK'");
 $respro=mysql_query($sqlpro);
 $rowpro=mysql_fetch_array($respro);
 $sj=date("Y-m-d H:i:s");
 $nowmoney=returnyhmoney($rowpro[yhxs],$rowpro[money2],$rowpro[money3],$sj,$rowpro[yhsj1],$rowpro[yhsj2],$rowpro[id]);
 if($row1[pjlx]==1){$ico='good';}elseif($row1[pjlx]==2){$ico='normal';}elseif($row1[pjlx]==3){$ico='bad';}
 ?>
 <ul>
<li class="l1"><img class="avatar" src="<?=$usertx?>"><br><?=mb_substr(returnnc($row1[userid]),0,2);?>***<?=mb_substr(returnnc($row1[userid]),-2,2);?><br><? $pf=round(($row1[pf1]+$row1[pf2]+$row1[pf3])/3,2);$userxy1=returnxy($row1[userid],2);?><img title="�������ֵ<?=$userxy1?>" src="../img/dj/<?=returnxytp($userxy1)?>" /></span>
<li class="l2"><div class="t"><strong>�ɽ���</strong><span style="color:#f60"><?=$row[money2]?>.00Ԫ</span>&nbsp;&nbsp;  
<div class="pingfen_btn">
<span style="color:#999"><? if($row1[txt]!='��δ����'){?>�����ۺ����֣�</span><span><?=$pf?>.00</span><? }?><div class="pingfen_box"><? 	$star = $pf;?>						
<dl>
<dd>����̬��</dd><s><div style="width:78px;"><img src="/img/pf<?=$row1[pf1]?>.png"  title="<?=$mspf?>��"></div></s><dd><em><?=$row1[pf1]?>��</em></dd>
</dl>
<dl>
<dd>����Ч��</dd><s><div style="width:78px;"><img src="/img/pf<?=$row1[pf2]?>.png" title="<?=$fhpf?>��"></div></s><dd><em><?=$row1[pf2]?>��</em></dd>
</dl>
<dl>
<dd>��Ʒ����</dd><s><div style="width:78px;"><img src="/img/pf<?=$row1[pf3]?>.png" title="<?=$shpf?>��"></div></s><dd><em><?=$row1[pf3]?>��</em></dd>
</dl>
</div>
</div>
</div>    
<div class="rev_c"<?=$color?>>
<div class="rev_b"><div class="xy">
<? if($row1[txt]!='��δ����'){?></div><i class="ico-<?= $ico?>" style="margin:0 3px 0 -3px;vertical-align:middle" id="eval"></i><? }?>
<i class="eval ico-<?= $ico?>"></i><? if($row1[txt]!='��δ����'){?><? }?><?=$row1[txt]?><br>	
<? while2("*","epzhu_tpkf where bh='".$row1[orderbh]."' order by xh asc");while($rowt=mysql_fetch_array($res2)){$tp="../".str_replace(".","-1.",$rowt[tp]);?>
<a href="../<?=$rowt[tp]?>" target="_blank"><img src="<?=$tp?>" width="50" height="50" /></a>&nbsp;&nbsp;<? }?><br><?=$row1[sj]?>
<? while2("*","epzhu_tpkf where bh='".$row1[orderbh]."' order by xh asc");while($rowt=mysql_fetch_array($res2)){$tp="../".str_replace(".","-1.",$rowt[tp]);?>&nbsp;&nbsp;<? }?>	
<? if(!empty($row1[hf])){?><div class="hfcon"> <div class="j-border"></div>
<div class="j-background"></div><span><p class="tit" style="color:#e74851">���һظ���</p><?=$row1[hf]?><p class="gray"></p></span></p></div><? }?>
</span>
	</div>
		</div>
		</li>
		</ul>					
<? }?>					
		<SCRIPT type="text/javascript">
<style>
.xy {
    float: left;
    margin-top: 30px;
}
</style>
function get_list(str){
  $(".c_r_rev").empty();
  $.each(str,function(key,val){  
	   	  $("."+key).html(val);
  });
}
$('#code_hot').AdAdvance();$().layer_top();
$(window).load(function(){$('.c_r_menu').menu_layer();});
 $(function(){
	getData();
});
</SCRIPT>	
			</div>
		</div>

		<div class="g_box">
			<div class="c_r_cap dan" style="margin-top:-1px;" id="c_cc">&nbsp;&nbsp;&nbsp;���׹���</div>
			<div class="s_flow">
				<dl>
					<dt><span>��������</span></dt>
					<dd><img src="static/picture/serve_flow.png" /></dd>
				</dl>
				<dl>
					<dt><span>��������</span></dt>
					<dd>
						<p>1������Ľ���������˫���̶���������µ����̼�ȷ��ͬ�ⶩ����ͬʱ�����������ף���ɣ����ڣ�</p>
						<p>2����������������˫����Ȼ�޷���ɽ��ף�����һ���ɷ���׷�����ڣ�1~60�죩�����󣬶Է�ͬ�⼴���ӳ���</p>
					</dd>
				</dl>
				<dl>
					<dt><span>ע������</span></dt>
					<dd>
						<p>1��Դվ���˫�����׵Ĺ��̼�������Ʒ�Ŀ��ս������ô浵����ȷ�����׵���ʵ����Ч����ȫ��</p>
						<p>2��Դվ�޷����硰���ð����¡��������ü���֧�֡������ƽ���֮����̼ҳ�ŵ����������������м���</p>
						<p>3����û��"���κ������˿�����"��ǰ���£���Ʒд��"һ���۳����Ų�֧���˿�"�����Ƶ���������Ϊ��Ч������</p>
						<p>4����δ����ǰ��˫����QQ�����̶��Ľ������ݣ���ɳ�Ϊ�����������ݣ��̶���������ͻʱ���̶�Ϊ׼����</p>
						<p>5���������¼����Ϊ�����������ݣ���˫����ϵʱ��ֻ��Է���Դվ��������QQ���ֻ��Ź�ͨ���Է��Է����������ҳ�ŵ��</p>
						<p>6����Ȼ���ײ������׵ļ��ʺ�С����һ��Ҫ�����������¼���ֻ����ŵ���������Ҫ��Ϣ���Է���������ʱ����Դվ������ٴ���</p>
					</dd>
				</dl>
				<dl>
					<dt><span>Դվ����</span></dt>
					<dd>
						<p>1��Դվ��Ϊ�������н�ƽ̨�����ݽ��׺�ͬ����Ʒ����������ǰ�̶������ݣ������Ͻ��׵İ�ȫ������˫����Ȩ�棻</p>
						<p>2����ƽ̨���Ͻ��׵���Ŀ�������κκ������Դվ�޹أ����������Ժ�����Ҫ�����½��׵ģ�����ϵ����ٱ���</p>
					</dd>
				</dl>
			</div>
		</div>
	</div></div>
</div><? include("../tem/bottom--.html");?>
</body>
</html>