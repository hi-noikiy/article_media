<?
include("../config/conn.php");
include("../config/function.php");
include("../config/xy.php");
$sj=date("Y-m-d H:i:s");
$myweb=$_GET[str];
if(empty($myweb)){$uid=$_GET[id];$ses="id=".$uid."";}else{$ses="myweb='".$myweb."'";}
$sqluser="select * from epzhu_user where zt=1 and (shopzt=2 or shopzt=4) and ".$ses;mysql_query("SET NAMES 'GBK'");$resuser=mysql_query($sqluser);
if(!$rowuser=mysql_fetch_array($resuser)){php_toheader("./");}
if(4==$rowuser[shopzt]){php_toheader("dqview".$rowuser[id].".html");}
$uid=$rowuser[id];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Item-Number" content="u15343905597">
<meta name="Pg-Type" content="iseva">
<meta name="keywords" content="">
<meta name="description" content="">
<title><?=$rowuser[shopname]?>�����ϵ��� - <?=webname?></title>
<link href="static/css/basic.css" rel="stylesheet" type="text/css" />
<link href="static/css/market.css" rel="stylesheet" type="text/css" />

<script language="javascript" src="<?=weburl?>shop/js/jquery.m.js"></script></script></script><script language="javascript" src="static/js/layui.js"></script><script language="javascript" src="static/js/common.js"></script><script language="javascript" src="static/js/market.js"></script><script language="javascript" src="static/js/index.js"></script><script language="javascript" src="static/js/tipso.min.js"></script>


</head>
<body class="narrow">
<!--ͷ��-->

<div class="yjcode"><? adwhile("ADTOP");?></div>

<script language="javascript">
//document.getElementById("shopmenu1").className="a1";
</script>



<!--ͷ��-->
<!--[if IE 6]>
<script src="//static.928vip.cn/js/DD_belatedPNG_0.0.8a-min.js" type="text/javascript"></script> 
<script type="text/javascript"> 
DD_belatedPNG.fix('*'); 
</script> 
<![endif]-->

<div class="header">

<? include("../tem/top---.html");?>
		
		<?
checkdjl("c1",$uid,"epzhu_user");
$sj1=date("Y-m-d H:i:s",strtotime("-30 day"));
$c=returncount("epzhu_order where selluserid=".$rowuser[id]." and (ddzt='wait' or ddzt='db' or ddzt='suc') and sj>='".$sj1."' and sj<='".$sj."'");
$f=sprintf("%.2f",returnsum("money1*num","epzhu_order where selluserid=".$rowuser[id]." and (ddzt='wait' or ddzt='db' or ddzt='suc') and sj>='".$sj1."' and sj<='".$sj."'"));
$sucnum=returnjgdw($rowuser[xinyong],"",returnxy($uid,1));

$mspf=returnjgdw(returnjgdian($rowuser[pf1]),"","5.00");
$fhpf=returnjgdw(returnjgdian($rowuser[pf2]),"","5.00");
$shpf=returnjgdw(returnjgdian($rowuser[pf3]),"","5.00");
?>
<script language="javascript" src="js/layui.js"></script>
<script language="javascript" src="js/common.js"></script>




	<div class="general main">
		<li class="logo s-logo">
			<a href="<?=weburl?>"></a>
		</li>
		<li class="top_sinfo">
			<p class='u_t_i'>				<strong><?=$rowuser[shopname]?></strong><img class='xy' src='../img/dj/<?=returnxytp($sucnum)?>' title='<?=$sucnum?>��'>			</p>
			<p>
				<a class="toggle_center">
					<span style='color:#cccccc;padding-left:0'>[</span>����<em><?=$mspf?></em><span>|</span>Ч�ʣ�<em><?=$fhpf?></em><span>|</span>������<em><?=$shpf?></em>  <span style='color:#cccccc'>]</span>
				</a>
			</p>
			<ul class="rev_pop" style="display:none;">
				<table class='pop_pf'>
					<thead>
						<tr>
							<th style="width: 60%;text-align:left">�����ۺ�����</th>
							<th>��ͬ�����</th>
						</tr>
					</thead>
					<tbody>
<tr><td>����̬�ȣ� <?=sprintf("%.2f",($mspf+$fhpf+$shpf)/3)?></td><td><i>����</i> <span><?=$mspf?>%</span></td></tr>
<tr><td>����Ч�ʣ� <?=sprintf("%.2f",($mspf+$fhpf+$shpf)/3)?></td><td><i>����</i> <span><?=$fhpf?>%</span></td></tr>
<tr><td>��������� <?=sprintf("%.2f",($mspf+$fhpf+$shpf)/3)?></td><td><i>����</i> <span><?=$shpf?>%</span></td></tr>
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
								����ʱ�䣺<?=dateYMD($rowuser[sj])?>							</td>
						</tr>
						<tr>
							<td>
								����������<?=returncount("epzhu_pro where userid=".$rowuser[id]." and zt=0")?> ��
							</td>
						</tr>
						<tr>
							<td class="certification">�̼���֤��
								 <? if(1==$rowuser[ifmot]){?><i class='phone success' title='��ͨ���ֻ���֤'></i><? }else{?><img src="<?=weburl?>shop/img/sj0.gif" title="�ֻ�δ��֤" style="
    width: 16px;
    height: 16px;margin-bottom: -3px;
"/><? }?>
							<? if(1==$rowuser[ifemail]){?>	<i class='success' title='��ͨ��������֤'></i><? }else{?><img src="<?=weburl?>shop/img/yx0.gif" title="����δ��֤"style="
    width: 16px;
    height: 16px;margin-bottom: -3px;
" /><? }?>
								</i>
							</td>
						</tr>
					</tbody>
				</table>
				<div class="t_p_bottom">
					<a href="view<?=$uid?>.html">�̼ҵ��̡�</a>
				</div>
			</ul>
		</li>
				<li class="search Search-box" onmouseover="topover()" onmouseout="topout()">
			<span class="searchtype">��Ʒ</span><i></i>
			<form name="topf1" method="post" onsubmit="return topftj()">
			<input  name="topt" id="topt" type="text" class="searchval Search-inp"/>
			<input type="image" src="<?=weburl?>homeimg/so.png">
			<ul class="searchlist" style="display:none;"> 
			<li data='serve'>  <a href="javascript:void();" onclick="topjconc(1,'��Ʒ')">��Ʒ</a></li>
			<li data='domain'> <a href="javascript:void();" onclick="topjconc(2,'����')">����</a></li> 
			<li data='web'>  <a href="javascript:void();" onclick="topjconc(3,'��Ѷ')">��Ѷ</a></li>

  </ul>
</li>
	</div><?
while1("*","epzhu_ad where adbh='ADSHOP01' and zt=0 order by xh asc limit 1");$row1=mysql_fetch_array($res1);
$bannar=returntppd("../upload/".$rowuser[id]."/bannar.jpg","../gg/".$row1[bh].".".$row1[jpggif]);
?>
	<div class="shop_banner">
		<div class="main" style="background:url(<?=$bannar?>) center top no-repeat;"></div>
			
	</div>
	<div class="shop_nav">
		<div class="main">
			<li class='gs'>
				<span>������Ʒ<em></em></span>
				<div class="gsbox">
					<a href='<?=weburl?>shop/prolist_i<?=$uid?>v.html'>Դ��<em>(<?=returncount("epzhu_pro where userid=".$rowuser[id]." and zt=0")?>)</em></a>				</div>
			</li>
			<li><a href="<?=returnmyweb($uid,$rowuser[myweb])?>">��ҳ</a></li>
			 <? if(panduan("*","epzhu_shopmenu where zt=0 and userid=".$uid)==0){?>
 <? }else{?>
  <? 
  while1("*","epzhu_shopmenu where zt=0 and admin=1 and userid=".$uid);while($row1=mysql_fetch_array($res1)){
  if($row1[targ]==1){$t="_self";}else{$t="_blank";}
  ?><li><a href="<?=$row1[aurl]?>" target="<?=$t?>" class="a1"><?=$row1[tit1]?></a></li>
    <? }?>
 <? }?>
			
						
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
</script> <script language="javascript">
//document.getElementById("shopmenu1").className="a1";
</script>


<!--ͷ��-->
<!--[if IE 6]>
<script src="//static.928vip.cn/js/DD_belatedPNG_0.0.8a-min.js" type="text/javascript"></script> 
<script type="text/javascript"> 
DD_belatedPNG.fix('*'); 
</script> 
<![endif]--><!--ͷ��-->
		<div class='main'>
	<div class="store-lubo">
	<? $ses="epzhu_shopbannar where userid=".$rowuser[id]." and zt=0";if(returncount($ses)>0){?>
		<ul class="store-lubo-box">
		
		<? $i=0;while1("*",$ses." order by xh asc");while($row1=mysql_fetch_array($res1)){?>
<li><a href="<?=$row1[aurl]?>" class="d1"<? if(2==$row1[targ]){?> target="_blank"<? }?> style="background:url(../upload/<?=$row1[userid]?>/shopbannar_<?=$row1[bh]?>.jpg) center no-repeat;"></a></li>
<? $i++;}?>
					
					</ul>
	</div>
	</div>
	<div class='main mt15'>
 
<script type="text/javascript">banner();</script><? }?>
		<!--���-->
		<div class="g_side left">
			<div class="seller g_box">    
				<div class="s_info">    
					<ul class="s_mark">  
						<img src="<?=returntppd("../upload/".$rowuser[id]."/shop.jpg","../img/none180x180.gif")?>"  width="200" height="200">
					</ul>
					<ul class="s_name" >
						<?=$rowuser[shopname]?>					</ul>
					<ul class="xy">    
						�̼�������<img class='xy' src='../img/dj/<?=returnxytp($sucnum)?>' title='<?=$sucnum?>��'>					</ul>
					<ul class='certification'>�̼���֤��
					 <? if(1==$rowuser[ifmot]){?>	<i class='phone success' title='��ͨ���ֻ���֤'></i><? }else{?><img src="<?=weburl?>shop/img/sj0.gif" width="16" height="16" title="�ֻ�δ��֤" /><? }?>
					 <? if(1==$rowuser[ifemail]){?>	<i class='success' title='��ͨ��������֤'></i><? }else{?><img src="<?=weburl?>shop/img/yx0.gif" width="16" height="16" title="����δ��֤" /><? }?>
				
											</ul>
					<ul class="szd">    
					�������<strong><?=$rowuser[djl]?></strong>��ح
�ղ�����<strong><?=returncount("epzhu_shopfav where shopid=".$uid)?></strong>��			</ul>
					<ul class="shop_score">
						<div>
							   <cite>
   <p><span>����</span></p> 
   <p class="up"><?=$mspf?><i class="iconfont">&#xe648;</i></p>   </cite>
   <cite> 
   <p><span>����</span></p>
   <p class="up"><?=$fhpf?><i class="iconfont">&#xe648;</i></p>   </cite> 
   <cite> 
   <p><span>�ۺ�</span></p>
   <p class="up"><?=$shpf?><i class="iconfont">&#xe648;</i></p>   </cite> 
						</div>
					</ul>
					<ul class="shop_btns">
							<a href="/shop/view<?=$uid?>.html">
							  <i class="iconfont">�w</i><span>������</span>
							</a>
							 <? 
  $a1="none";$a2="none";
  $nuid=returnuserid($_SESSION["SHOPUSER"]);
  if($_SESSION["SHOPUSER"]==""){$a1="";}else{
  if(panduan("*","epzhu_shopfav where shopid=".$rowuser[id]." and userid=".$nuid."")==1){$a2="";}else{$a1="";}
  }
  ?>
							 <a id="favsno" style="display:<?=$a1?>;" class='collection imfav' href="javascript:shopfavInto(<?=$rowuser[id]?>)"><i class="iconfont">&#xe61c;</i><span>�ղص���</span></a>
  <a id="favsyes" style="display:<?=$a2?>;" class='collection imfav' href="../user/favshop.php"><i class="iconfont">&#xe61c;</i><span>���ղ�</span></a>
                
					</ul>
					<ul>
											<? if($rowuser[baomoney]>0){?><a class='bond_info' target="_blank" href=''><i class="iconfont va-1">&#xe65f;</i>�̼��ѽ��ɱ�֤��<em class="orange va-1"><?=$rowuser[baomoney]?></em>Ԫ</a><? }?>
											</ul>
				</div>

				<div class="s_tit">��ϵ�̼�</div>
				<div class="s_list" id='layer_cont'><? if(!empty($rowuser[uqq])){?>
  <a href="http://wpa.qq.com/msgrd?v=3&uin=<?=$rowuser[uqq]?>&site=<?=gloweb?>&menu=yes" target="_blank"><img src="../img/qq5.gif" border="0" /> <?=$rowuser[uqq]?></a>
  <? }?></div>
				
			
				<div class='s_tit'>����ָ��</div>
<div class="s_list">
  <li>Դ��������<span class="red"><?=returncount("epzhu_pro where userid=".$rowuser[id]." and zt=0")?></span></li>
  <li>��������<span class="red"><?=returncount("epzhu_prokf where userid=".$rowuser[id]." and zt=0")?></span></li>
  <li>�ۼƷÿͣ�<span class="red"><?=$rowuser[djl]?></span></li>
  <li>�ۺ����֣�<span class="red"><?=sprintf("%.2f",($mspf+$fhpf+$shpf)/3)?></span></li>

</div>

<div class='s_tit'>��Ӫָ��</div>
<div class="s_list">
  <li>Դ�뽻�ף�<span class="red"><?=returncount("epzhu_order where selluserid=".$rowuser[id])?></span>��</li>
  <li>�������ף�<span class="red"><?=returncount("epzhu_orderkf where selluserid=".$rowuser[id])?></span>��</li>
   <!--<li>�½��ף�<span class="red"><?=$c?></span>��</li>
 <li>�³ɽ���<span class="red"><?=$f?></span>Ԫ</li>-->

</div>
				<div class='s_tit'>����������</div>
				<div class="s_hot">
					<div class="c_l_hol" id="code_hot">
					
					<? $i=1;$ai=returncount("epzhu_type where admin=1");while1("*","epzhu_type where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
<? 
 while1("*","epzhu_pro where userid=".$uid." and zt=0 and ifxj=0 order by xsnum desc limit 10");while($row1=mysql_fetch_array($res1)){
 $au="../product/view".$row1[id].".html";
 $tp="../".returntp("bh='".$row1[bh]."' order by iffm desc","-2");
 ?> 
			
											<DL>
						<DT><P><em class="no<?=$i?>"><?=$i?></em><span><?=strgb2312($row1[tit],0,13)?></span></P></DT>
						<DD><A class=track href="="<?=$au?>"" 
						target=_blank ><IMG src="<?=returntppd($tp,"../img/none180x180.gif")?>" class="pic_Layer"></A> 
						</DD>
						</DL> <? $i++;}?>
   <? }?>
											
										</div>
				</div>
				<div class="s_tit">���������</div>
				<div class="s_hot">
<div class="c_l_hol" id="code_hot">
<dl class="dropList-hover">
<? $i=1;$ai=returncount("epzhu_typekf where admin=1");while1("*","epzhu_typekf where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
<? 
 while1("*","epzhu_prokf where userid=".$uid." and zt=0 and ifxj=0 order by xsnum desc limit 10");while($row1=mysql_fetch_array($res1)){
 $au="../productkf/view".$row1[id].".html";
 $tp="../".returntp("bh='".$row1[bh]."' order by iffm desc","-2");
 ?> 
  <dt><p><em class="no<?=$i?>"><?=$i?></em><span><?=strgb2312($row1[tit],0,13)?></span></p></dt>
  <dd><a class="track" href="<?=$au?>" target="_blank"><img src="<?=returntppd($tp,"../img/none180x180.gif")?>" class="pic_Layer"></a> 
  </dd>
  </dl>
  <dl class="">
 <? $i++;}?>
   <? }?>
  
     </div>
    </div>
			</div>
		</div>
		<!--�ұ�-->
		<div class="g_main right">

			<div class="shop_file g_box">
				<ul>    
					<em>���̹���</em><div class="line"></div>
				</ul>
				<ul>    
					<?=$rowuser[seodes]?>				</ul>
				<ul>    
					<em>��������</em><div class="line">
					
					
					
					</div>
				</ul>
				<ul class="skill"> 
								 <? 
  while1("*","epzhu_protype where zt=0 and admin=1 and userid=".$uid." order by xh asc");while($row1=mysql_fetch_array($res1)){
  ?>
 <span> <a href="<?=weburl?>shop/prolist_i<?=$rowuser[id]?>v_j<?=$row1[id]?>v.html"><?=$row1[name1]?></a></span>
  <? }?>	</ul>
				<ul> 
					<em>���׶�̬</em>
					<div class="line"></div>
				</ul>
				<div class="scrollbox">
					<div id="scrollDiv" class="scroll-box" times='3000' items='2'>
						<ul style="margin-top:0;">
						
						
						<? $i=0;while1("*","epzhu_order where (ddzt='wait' or ddzt='db' or ddzt='suc') and selluserid=".$uid." order by sj desc limit 20");while($row1=mysql_fetch_array($res1)){?>
 
  
													<li>
								<strong><?=returnnc($row1[userid])?></strong> 
								������<a class=ls title="<?=returntitdian($row1[tit],90)?>" 
								href="<?=weburl?>code/goods289432.html" target=_blank><?=returntitdian($row1[tit],90)?></a> 
								�ɽ��ۣ�<font  color="#ff6600"><?=$row1[money1]?>.00Ԫ</font>
								<span style="color:#f00">[<?=returnorderzt($row1[ddzt])?>]</span>
							</li>	 <? $i++;}?>			
								
												</ul>
					</div>
				</div>
			</div>

			<div class="shop_ibox shop_index_tit">
				<strong>�Ƽ�Դ��</strong> <a href='code/' title="�鿴ȫ��Դ��">More></a>
			</div>
			<div class="shop_ibox"> 
			<div class="shop_igoods">
			 <? 
  while1("*","epzhu_pro where userid=".$uid." and zt=0 and ifxj=0 order by lastsj desc limit 1");while($row1=mysql_fetch_array($res1)){
  $au="../product/view".$row1[id].".html";
  $tp="../".returntp("bh='".$row1[bh]."' order by iffm desc","-2");
  ?>
								<div>
								
					<ul>
						<a href="<?=$au?>" target="_blank" class="pic">
							<img src="<?=returntppd($tp,"../img/none180x180.gif")?>" >
						</a>
						<li class="sinfo" style='padding:7px 1.5%;width:97%'>
							<a style='font-size: 14px;' href="<?=weburl?>code/goods289432.html" class="sname" title="<?=$row[tit]?>">
								<?=strgb2312($row1[tit],0,50)?>							</a>
							<p class="sprice">
								<em><b>��<?=returnjgdian(returnyhmoney($row1[yhxs],$row1[money2],$row1[money3],$sj,$row1[yhsj1],$row1[yhsj2],$row1[id]))?></b></em>
								<span class="note_icon" id="jqnot">
								  
	
								<? if($row[fhxs]==1){?> <a class="tips tipso_style" t-bg="#999" href="javascript:;" title="�ֶ�������Ʒ�����º����һ��յ����������ʼ�����������"><i>��</i></a><? }?>
					
	
	<? if($row[fhxs]==2){?><a  class='tips' href="javascript:;"  T-bg='#b68571' title="�Զ�������Ʒ�����º󣬼����յ����Ը���Ʒ�ķ��������أ�����" color="#ffa800"><i class=send>��</i></a><? }?>
						    							
														
														
														  
	<? if($row[yysweb]){?><a T-bg='#999' title='�շѰ�װ(<?=$row[yysweb]?>),����鿴��ϸ��װҪ��' class='installing tips'"><i class='install200'>��</i></a><? }?>
														
														
	<? if($row[yysweb]==0){?><a T-bg='#999' title='��Ѱ�װ,����鿴��ϸ��װҪ��' class='installing tips'"><i class='install200'>��</i></a><? }?>
														
														<? if($row1[baomoney]){?><a class='tips' T-w='300' title='�Ѽ����������̼��ѽ��ɱ�֤�� <b style=color:#FCF302><?=$row1[baomoney]?></b> Ԫ��֤��'><i class=protect>��</i></a><? }else{?><a cclass="tips tipso_style" t-w="300" t-bg="#999" target="_blank"><i>��</i></a><? }?>
									</span>
							</p>
						</li>
					</ul>
				</div> <? }?> 
								<div class="igoods_small">
								
								
								  <? 
  while1("*","epzhu_pro where userid=".$uid." and zt=0 and ifxj=0 order by lastsj desc limit 6");while($row1=mysql_fetch_array($res1)){
  $au="../product/view".$row1[id].".html";
  $tp="../".returntp("bh='".$row1[bh]."' order by iffm desc","-2");
  ?>
										<div>
						<ul>
							<a href="<?=$au?>" class="pic" target="_blank">
								<img src="<?=returntppd($tp,"../img/none180x180.gif")?>" >
							</a>
							<li class="sinfo">
								<a href="<?=$au?>" class="sname">
									<?=strgb2312($row1[tit],0,50)?>						</a>
								<p class="sprice">
									<em><b>��<?=returnjgdian(returnyhmoney($row1[yhxs],$row1[money2],$row1[money3],$sj,$row1[yhsj1],$row1[yhsj2],$row1[id]))?></b></em>
									<span class="note_icon">
									
								<? if($row[fhxs]==1){?> <a class="tips tipso_style" t-bg="#999" href="javascript:;" title="�ֶ�������Ʒ�����º����һ��յ����������ʼ�����������"><i>��</i></a><? }?>
					
	
	<? if($row[fhxs]==2){?><a  class='tips' href="javascript:;"  T-bg='#b68571' title="�Զ�������Ʒ�����º󣬼����յ����Ը���Ʒ�ķ��������أ�����" color="#ffa800"><i class=send>��</i></a><? }?>
						    							
														
														
														  
	<? if($row[yysweb]){?><a T-bg='#999' title='�շѰ�װ(<?=$row[yysweb]?>),����鿴��ϸ��װҪ��' class='installing tips'"><i class='install200'>��</i></a><? }?>
														
														
	<? if($row[yysweb]==0){?><a T-bg='#999' title='��Ѱ�װ,����鿴��ϸ��װҪ��' class='installing tips'"><i class='install200'>��</i></a><? }?>
														
														<? if($row1[baomoney]){?><a class='tips' T-w='300' title='�Ѽ����������̼��ѽ��ɱ�֤�� <b style=color:#FCF302><?=$row1[baomoney]?></b> Ԫ��֤��'><i class=protect>��</i></a><? }else{?><a cclass="tips tipso_style" t-w="300" t-bg="#999" target="_blank"><i>��</i></a><? }?>		</span>
								</p>
							</li>
						</ul>
					</div> <? }?> 
								
										</div>
				</div> 
			</div>

 <?
  $a1=returncount("epzhu_propj where selluserid=".$uid." and pf1=1")+returncount("epzhu_propj where selluserid=".$uid." and pf2=1")+returncount("epzhu_propj where selluserid=".$uid." and pf3=1");
  $a2=returncount("epzhu_propj where selluserid=".$uid." and pf1=2")+returncount("epzhu_propj where selluserid=".$uid." and pf2=2")+returncount("epzhu_propj where selluserid=".$uid." and pf3=2");
  $a3=returncount("epzhu_propj where selluserid=".$uid." and pf1=3")+returncount("epzhu_propj where selluserid=".$uid." and pf2=3")+returncount("epzhu_propj where selluserid=".$uid." and pf3=3");
  $a4=returncount("epzhu_propj where selluserid=".$uid." and pf1=4")+returncount("epzhu_propj where selluserid=".$uid." and pf2=4")+returncount("epzhu_propj where selluserid=".$uid." and pf3=4");
  $a5=returncount("epzhu_propj where selluserid=".$uid." and pf1=5")+returncount("epzhu_propj where selluserid=".$uid." and pf2=5")+returncount("epzhu_propj where selluserid=".$uid." and pf3=5");
  $al=$a1+$a2+$a3+$a4+$a5;
  if($al==0){$a1v=0;$a2v=0;$a3v=0;$a4v=0;$a5v=0;}
  else{
  $a1v=sprintf("%.1f",$a1/$al*100);
  $a2v=sprintf("%.1f",$a2/$al*100);
  $a3v=sprintf("%.1f",$a3/$al*100);
  $a4v=sprintf("%.1f",$a4/$al*100);
  $a5v=sprintf("%.1f",$a5/$al*100);
  }
  $hp=returncount("epzhu_propj where selluserid=".$uid." and pjlx=1");
  $pa=returncount("epzhu_propj where selluserid=".$uid."");
  if($pa==0){$av="100";}else{$av=sprintf("%.2f",$hp/$pa*100);}
  ?>
			<div class="shop_ibox shop_index_tit">
				<strong>�Ƽ�����</strong> <a href='serve/' title="�鿴ȫ������">More></a>
			</div>
			<div class="shop_ibox "> 
				<div class="shop_igoods igoods_big"> 
				
				  <? 
  while1("*","epzhu_prokf where userid=".$uid." and zt=0 and ifxj=0 order by lastsj desc limit 12");while($row1=mysql_fetch_array($res1)){
  $au="../productkf/view".$row1[id].".html";
  $tp="../".returntp("bh='".$row1[bh]."' order by iffm desc","-2");
  ?>
 <ul>
   <a href="<?=$au?>" class="pic" target="_blank">
   <img src="<?=returntppd($tp,"../img/none180x180.gif")?>">
   </a>
   <li class="sinfo">
    <a href="<?=$au?>" class="sname"title="<?=$row[tit]?>"><?=strgb2312($row1[tit],0,50)?> </a>
	<p class="sprice"><em><b>��<?=returnjgdian(returnyhmoney($row1[yhxs],$row1[money2],$row1[money3],$sj,$row1[yhsj1],$row1[yhsj2],$row1[id]))?>Ԫ</b></em>
	 
   <div class="pull-right smgray text-right mt5 ">
  
	
	</span></li>
</li>
</ul>
 <? }?>
				
				
				
								</div> 
			</div> 


			
			<?
  $a1=returncount("epzhu_propj where selluserid=".$uid." and pf1=1")+returncount("epzhu_propj where selluserid=".$uid." and pf2=1")+returncount("epzhu_propj where selluserid=".$uid." and pf3=1");
  $a2=returncount("epzhu_propj where selluserid=".$uid." and pf1=2")+returncount("epzhu_propj where selluserid=".$uid." and pf2=2")+returncount("epzhu_propj where selluserid=".$uid." and pf3=2");
  $a3=returncount("epzhu_propj where selluserid=".$uid." and pf1=3")+returncount("epzhu_propj where selluserid=".$uid." and pf2=3")+returncount("epzhu_propj where selluserid=".$uid." and pf3=3");
  $a4=returncount("epzhu_propj where selluserid=".$uid." and pf1=4")+returncount("epzhu_propj where selluserid=".$uid." and pf2=4")+returncount("epzhu_propj where selluserid=".$uid." and pf3=4");
  $a5=returncount("epzhu_propj where selluserid=".$uid." and pf1=5")+returncount("epzhu_propj where selluserid=".$uid." and pf2=5")+returncount("epzhu_propj where selluserid=".$uid." and pf3=5");
  $al=$a1+$a2+$a3+$a4+$a5;
  if($al==0){$a1v=0;$a2v=0;$a3v=0;$a4v=0;$a5v=0;}
  else{
  $a1v=sprintf("%.1f",$a1/$al*100);
  $a2v=sprintf("%.1f",$a2/$al*100);
  $a3v=sprintf("%.1f",$a3/$al*100);
  $a4v=sprintf("%.1f",$a4/$al*100);
  $a5v=sprintf("%.1f",$a5/$al*100);
  }
  $hp=returncount("epzhu_propj where selluserid=".$uid." and pjlx=1");
  $pa=returncount("epzhu_propj where selluserid=".$uid."");
  if($pa==0){$av="100";}else{$av=sprintf("%.2f",$hp/$pa*100);}
  ?>
  
  
   <div class="shop_ibox shop_index_tit">
  <strong>Դ������</strong>    <a href='evaluation' title="�鿴ȫ������">More></a>
</div>
<table class="shop-evaluation-table">
<tbody>
     <tr>
                <th width="10%">������</th>
                <th  width="40%" class="shop-evaluation-label IRadio">
                        <label class="IChecked" data="14|0|0">
                            <i></i>һ����
                        </label>
                        <label class=""  data="41|0|0">
                            <i></i>������
                        </label>
                        <label class=""  data="104|0|1">
                            <i></i>������
                        </label>
                        <label class=""  data="139|1|1">
                            <i></i>�ܼ�
                        </label>
                </th>
                <th  width="40%" rowspan="2" colspan="1">
<div class="scoreLeft">
            <dl>
              <dt>����̬��</dt>
              <dd><span class="mask"></span><span class="num"><?=$mspf?></span></dd>
            </dl>
            <dl>
              <dt>����Ч��</dt>
              <dd><span class="mask"></span><span class="num"><?=$fhpf?></span></dd>
            </dl>
            <dl  style='border:0'>
              <dt>�������</dt>
              <dd><span class="mask"></span><span class="num"><?=$shpf?></span></dd>
            </dl>
          </div>
  </th>
   </tr>        
     <tr>
     <td>
                <? 
			    $z1=returncount("epzhu_propj where selluserid=".$rowuser[id]." and pjlx=1");
				$z2=returncount("epzhu_propj where selluserid=".$rowuser[id]." and pjlx=2");
				$z3=returncount("epzhu_propj where selluserid=".$rowuser[id]." and pjlx=3");
				$zz=$z1+$z2+$z3;
				$bzz=$zz/100;
				$czz=$z2+$z3;
				$zczz=($bzz*$czz)*100;
				$bfb=100-$zczz;
				?>
                    <span style="color: #fa6d2f;"><?= $bfb?>%</span>
                </td>
                <td class="shop-evaluation-score">
					<li>
					<span><div><i id="eval" class="ico-good"></i></div><em>����</em><p><?=$z1?></p></span>
					</li>
					<li>
					<span><div><i id="eval" class="ico-normal"></i></div><em>����</em><p><?=$z2?></p></span>
					</li>
					<li style="border:0">
					<span><div><i id="eval" class="ico-bad"></i></div><em>����</em><p><?=$z3?></p></span>
					</li>                      
                </td>
            </tr>
            </tbody>
        </table>
<?
 function page($page){//��ҳ
       if($page == ""){
		   $page = 1;
	   }
	   $page_size = 5; //ÿҳ����������
	   $_pageNum = 10; //�����ʾ���ٸ�ҳ��
	   $query = "select count(*) as total from epzhu_propj where selluserid='".$_GET['id']."'";
	   $result = mysql_query($query);
	   $rownum = mysql_fetch_row($result);
	   $message_count = $rownum[0];
	   $page_count = ceil($message_count / $page_size);
	   $offset = ($page-1) * $page_size;
	   $pages = $page_count;
	   $_start = $page - floor($_pageNum / 2); //���㿪ʼҳ
	   $_start = $_start < 1 ? 1 : $_start;
	   $_end = $page + floor($_pageNum / 2); //�������ҳ
	   $_end = $_end > $pages? $pages : $_end;
	   $_curPageNum = $_end - $_start + 1;
	   // �����
	  if($_curPageNum < $_pageNum && $_start > 1){
		   $_start = $_start - ($_pageNum - $_curPageNum);
		   $_start = $_start < 1 ? 1 : $_start;
		   $_curPageNum = $_end - $_start + 1;
	}
	   // �ұߵ���
	  if($_curPageNum < $_pageNum && $_end < $pages){
		   $_end = $_end + ($_pageNum - $_curPageNum);
		   $_end = $_end > $pages? $pages : $_end;
	}
	$data['offset']=$offset;
	$data['page_count']=$page_count;
	$data['page']=$page;
	$data['_start']=$_start;
	$data['_end']=$_end;
	$data['page_size']=$page_size;
	return $data;
}
 ?>
<div class="shop_evaluation shop_ibox" style="margin-bottom:15px;">
<ul class="c_r_page s_ajax_page">
<?php	
    $data=page($_GET['page']);	
	if($data['page']!= 1){
     echo '<a id="p_up" href=view' . $_GET['id'] . '_' . ($data['page']-1) . '.html> &lt; </a>';
     }
    for ($i = $data['_start']; $i <= $data['_end']; $i++){
     if($i == $data['page']){
         $_pageHtml .= '<b class="curPage">'.$i.'</b>';
         }
     }
     if($data['page'] < $data['page_count']){
     
     }
?>

<div class="filter-comment IRadio shop_cur" id="shop_pg_scTop">
<label data="q" class="IChecked"><i></i><span>ȫ��</span></label>
<label data="2"><i></i><span>����</span></label>
<label data="0"><i></i><span>����</span></label>
<label data="-1"><i></i><span>����</span></label>
<label data="zj"><i></i><span>��׷��</span></label>
<label data="hf"><i></i><span>�лظ�</span></label>
<label data="fzp"><i></i><span>��ϵͳ����</span></label>
</div> 
 </ul>
<script>
 function page(){
	 var page = document.getElementById("num").value
	 var id=<?=$_GET['id']?>;
	 window.location.href='view'+id+'_'+page+'.html';
 }
 </script>
<div class="eList">
 <? 
 while1("*","epzhu_propj where selluserid=".$rowuser[id]." order by sj desc limit ".$data['offset'].",".$data['page_size']."");while($row1=mysql_fetch_array($res1)){
 $usertx="../upload/".$row1[userid]."/user.jpg";
 if(!is_file($usertx)){$usertx="../user/img/nonetx.gif";}else{$usertx=$usertx."?id=".rnd_num(1000);} 
 
 $sqlpro="select * from epzhu_pro where bh='".$row1[probh]."'";
 mysql_query("SET NAMES 'GBK'");
 $respro=mysql_query($sqlpro);
 $rowpro=mysql_fetch_array($respro);
 $sj=date("Y-m-d H:i:s");
 $nowmoney=returnyhmoney($rowpro[yhxs],$rowpro[money2],$rowpro[money3],$sj,$rowpro[yhsj1],$rowpro[yhsj2],$rowpro[id]);
 if($row1[pjlx]==1){$ico='good';}elseif($row1[pjlx]==2){$ico='normal';}elseif($row1[pjlx]==3){$ico='bad';}
 ?>
 <ul>
<? $pf=round(($row1[pf1]+$row1[pf2]+$row1[pf3])/3,2);$userxy1=returnxy($row1[userid],2);?>
<div class="elistRight">
<div class="box1">������Ʒ��<a target="_blank" href="<?=weburl?>product/view<?= $rowpro['id']?>.html"><?= $rowpro['tit']?></a>&nbsp;&nbsp;�ɽ��ۣ�<span class="feng">��<?=$nowmoney?>.00Ԫ</span> </div>
<div class="box2"><p style="
    font-size: 12px;
"><i class="ico-<?= $ico?>" style="margin:0 3px 0 -3px;vertical-align:middle" id="eval"></i> <?=strip_tags($row1[txt])?></p>

<? while2("*","epzhu_tp where bh='".$row1[orderbh]."' order by xh asc");while($rowt=mysql_fetch_array($res2)){$tp="../".str_replace(".","-1.",$rowt[tp]);?>
<a href="../<?=$rowt[tp]?>" target="_blank"><img src="<?=$tp?>" width="50" height="50" /></a>&nbsp;&nbsp;
  <? 
   }
   ?>
	</p><p class="gray f12"><?=$row1[sj]?></p>
						
						
						<? if(!empty($row1[hf])){?>
						<div class="hfcon"> <div class="j-border"></div>

								  <div class="j-background"></div><span><p class="tit" style="color:#e74851">���һظ���</p><p><?=$row1[hf]?></p><p class="gray"><?=$row1[hfsj]?></p></span></div><? }?></div>
		<div class="box3">
		<div class="pingfen_btn">�����ۺ����֣�<span><?=$pf?>.00</span><div class="pingfen_box">
		<dl>
		<dd>����̬��</dd><s><div style="width:<?=$pf/5*76?>px;"><img src="/img/pf<?=$row1[pf1]?>.png" title="<?=$row1[pf1]?>��"></div></s><dd><em><?=$row1[pf1]?>��</em></dd>
		</dl>
		<dl>
		<dd>����Ч��</dd><s><div style="width:<?=$pf/5*76?>px;"><img src="/img/pf<?=$row1[pf2]?>.png" title="<?=$row1[pf2]?>��"></div></s><dd><em><?=$row1[pf2]?>��</em></dd>
		</dl>
		<dl>
		<dd>��Ʒ����</dd><s><div style="width:<?=$pf/5*76?>px;"><img src="/img/pf<?=$row1[pf3]?>.png" title="<?=$row1[pf3]?>��"></div></s><dd><em><?=$row1[pf3]?>��</em></dd>
		</dl>
		</div>
		</div>
		</div>
		</div>
		<div class="elistLeft">   
		<img src="<?=$usertx?>" class="userpic" width="50" height="50">
		<p><?=returnnc($row1[userid])?><br><img class="xy" src="../img/dj/<?=returnxytp($userxy1)?>" title="����ֵ��<?=$userxy1?>"></p>
	</div>
    </ul>
		<?
		}
		?>	

</div> 
</div>    <div class="shop_ibox shop_index_tit">
  <strong>��������</strong>    <a href='evaluation' title="�鿴ȫ������">More></a>
</div><table class="shop-evaluation-table">
<tbody>
     <tr>
                <th width="10%">������</th>
                <th  width="40%" class="shop-evaluation-label IRadio">
                        <label class="IChecked" data="14|0|0">
                            <i></i>һ����
                        </label>
                        <label class=""  data="41|0|0">
                            <i></i>������
                        </label>
                        <label class=""  data="104|0|1">
                            <i></i>������
                        </label>
                        <label class=""  data="139|1|1">
                            <i></i>�ܼ�
                        </label>
                </th>
                <th  width="40%" rowspan="2" colspan="1">
<div class="scoreLeft">
            <dl>
              <dt>����̬��</dt>
              <dd><span class="mask"></span><span class="num"><?=$mspf?></span></dd>
            </dl>
            <dl>
              <dt>����Ч��</dt>
              <dd><span class="mask"></span><span class="num"><?=$fhpf?></span></dd>
            </dl>
            <dl  style='border:0'>
              <dt>�������</dt>
              <dd><span class="mask"></span><span class="num"><?=$shpf?></span></dd>
            </dl>
          </div>
  </th>
   </tr>        
     <tr>
     <td>
                <? 
			    $z1=returncount("epzhu_propjwz where selluserid=".$rowuser[id]." and pjlx=1");
				$z2=returncount("epzhu_propjwz where selluserid=".$rowuser[id]." and pjlx=2");
				$z3=returncount("epzhu_propjwz where selluserid=".$rowuser[id]." and pjlx=3");
				$zz=$z1+$z2+$z3;
				$bzz=$zz/100;
				$czz=$z2+$z3;
				$zczz=($bzz*$czz)*100;
				$bfb=100-$zczz;
				?>
                    <span style="color: #fa6d2f;"><?= $bfb?>%</span>
                </td>
                <td class="shop-evaluation-score">
					<li>
					<span><div><i id="eval" class="ico-good"></i></div><em>����</em><p><?=$z1?></p></span>
					</li>
					<li>
					<span><div><i id="eval" class="ico-normal"></i></div><em>����</em><p><?=$z2?></p></span>
					</li>
					<li style="border:0">
					<span><div><i id="eval" class="ico-bad"></i></div><em>����</em><p><?=$z3?></p></span>
					</li>                      
                </td>
            </tr>
            </tbody>
        </table><div class="shop_evaluation shop_ibox" style="margin-bottom:15px;">
<ul class="c_r_page s_ajax_page">
<?php	
    $data=page($_GET['page']);	
	if($data['page']!= 1){
     echo '<a id="p_up" href=view' . $_GET['id'] . '_' . ($data['page']-1) . '.html> &lt; </a>';
     }
    for ($i = $data['_start']; $i <= $data['_end']; $i++){
     if($i == $data['page']){
         $_pageHtml .= '<b class="curPage">'.$i.'</b>';
         }
     }
     if($data['page'] < $data['page_count']){
     
     }
?>

<div class="filter-comment IRadio shop_cur" id="shop_pg_scTop">
<label data="q" class="IChecked"><i></i><span>ȫ��</span></label>
<label data="2"><i></i><span>����</span></label>
<label data="0"><i></i><span>����</span></label>
<label data="-1"><i></i><span>����</span></label>
<label data="zj"><i></i><span>��׷��</span></label>
<label data="hf"><i></i><span>�лظ�</span></label>
<label data="fzp"><i></i><span>��ϵͳ����</span></label>
</div> 
 </ul>
<script>
 function page(){
	 var page = document.getElementById("num").value
	 var id=<?=$_GET['id']?>;
	 window.location.href='view'+id+'_'+page+'.html';
 }
 </script>
<div class="eList">
 <? 
 while1("*","epzhu_propjwz where selluserid=".$rowuser[id]." order by sj desc limit ".$data['offset'].",".$data['page_size']."");while($row1=mysql_fetch_array($res1)){
 $usertx="../upload/".$row1[userid]."/user.jpg";
 if(!is_file($usertx)){$usertx="../user/img/nonetx.gif";}else{$usertx=$usertx."?id=".rnd_num(1000);} 
 
 $sqlpro="select * from epzhu_prowz where bh='".$row1[probh]."'";
 mysql_query("SET NAMES 'GBK'");
 $respro=mysql_query($sqlpro);
 $rowpro=mysql_fetch_array($respro);
 $sj=date("Y-m-d H:i:s");
 $nowmoney=returnyhmoney($rowpro[yhxs],$rowpro[money2],$rowpro[money3],$sj,$rowpro[yhsj1],$rowpro[yhsj2],$rowpro[id]);
 if($row1[pjlx]==1){$ico='good';}elseif($row1[pjlx]==2){$ico='normal';}elseif($row1[pjlx]==3){$ico='bad';}
 ?>
 <ul>
<? $pf=round(($row1[pf1]+$row1[pf2]+$row1[pf3])/3,2);$userxy1=returnxy($row1[userid],2);?>
<div class="elistRight">
<div class="box1">������Ʒ��<a target="_blank" href="<?=weburl?>productkf/view<?= $rowpro['id']?>.html"><?= $rowpro['tit']?></a>&nbsp;&nbsp;�ɽ��ۣ�<span class="feng">��<?=$nowmoney?>.00Ԫ</span> </div>
<div class="box2"><p style="
    font-size: 12px;
"><i class="ico-<?= $ico?>" style="margin:0 3px 0 -3px;vertical-align:middle" id="eval"></i> <?=strip_tags($row1[txt])?></p>

<? while2("*","epzhu_tp where bh='".$row1[orderbh]."' order by xh asc");while($rowt=mysql_fetch_array($res2)){$tp="../".str_replace(".","-1.",$rowt[tp]);?>
<a href="../<?=$rowt[tp]?>" target="_blank"><img src="<?=$tp?>" width="50" height="50" /></a>&nbsp;&nbsp;
  <? 
   }
   ?>
	</p><p class="gray f12"><?=$row1[sj]?></p>
						
						
						<? if(!empty($row1[hf])){?>
						<div class="hfcon"> <div class="j-border"></div>

								  <div class="j-background"></div><span><p class="tit" style="color:#e74851">���һظ���</p><p><?=$row1[hf]?></p><p class="gray"><?=$row1[hfsj]?></p></span></div><? }?></div>
		<div class="box3">
		<div class="pingfen_btn">�����ۺ����֣�<span><?=$pf?>.00</span><div class="pingfen_box">
		<dl>
		<dd>����̬��</dd><s><div style="width:<?=$pf/5*76?>px;"><img src="/img/pf<?=$row1[pf1]?>.png" title="<?=$row1[pf1]?>��"></div></s><dd><em><?=$row1[pf1]?>��</em></dd>
		</dl>
		<dl>
		<dd>����Ч��</dd><s><div style="width:<?=$pf/5*76?>px;"><img src="/img/pf<?=$row1[pf2]?>.png" title="<?=$row1[pf2]?>��"></div></s><dd><em><?=$row1[pf2]?>��</em></dd>
		</dl>
		<dl>
		<dd>��Ʒ����</dd><s><div style="width:<?=$pf/5*76?>px;"><img src="/img/pf<?=$row1[pf3]?>.png" title="<?=$row1[pf3]?>��"></div></s><dd><em><?=$row1[pf3]?>��</em></dd>
		</dl>
		</div>
		</div>
		</div>
		</div>
		<div class="elistLeft">   
		<img src="<?=$usertx?>" class="userpic" width="50" height="50">
		<p><?=returnnc($row1[userid])?><br><img class="xy" src="../img/dj/<?=returnxytp($userxy1)?>" title="����ֵ��<?=$userxy1?>"></p>
	</div>
    </ul>
		<?
		}
		?>	

</div> 
 </div> 
			
		
</div> 
 </div> 	
			
			
			


</div> 
 </div> 
			
			
			<script>
 function page(){
	 var page = document.getElementById("num").value
	 var id=<?=$_GET['id']?>;
	 window.location.href='view'+id+'_'+page+'.html';
 }
 </script>
		<!--end-->
	</div>
</div></div></div></div>
<input type="hidden" value="1" name="selist" /><? include("../tem/bottom--.html");?>
</body>
<script language="javascript">
$(function(){
    $(".store-lubo").lubo();
});
</script>
</html>