<?
include("../config/conn.php");//����-����-��ϵQQ:1200-36745//��-�ο�-��-��-ϵQQ:12-00-36-745
include("../config/function.php");
include("../config/xy.php");
$sj=date("Y-m-d H:i:s");
$getstr=$_GET[str];
$tit="�̼ҷ��";
$ses=" where zt=1 and shopzt=2 and shopname<>''";
if(returnsx("s")!=-1){$skey=safeEncoding(returnsx("s"));$ses=$ses." and shopname like '%".$skey."%'";$tit=$tit." ".$skey;}
if(returnsx("q")!=-1){$ses=$ses." and uqq='".returnsx("q")."'";}
if(returnsx("p")!=-1){$page=returnsx("p");}else{$page=1;}
$px="order by sj desc";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Pg-Type" content="shop">
<meta name="keywords" content="�̼�ר��,�̼ҷ��,�̼Ҵ�ȫ">
<meta name="description" content="һƷ���̼�ר��">
<title> <?=$tit?> - <?=webname?></title>
<link href="static/css/basic.css" rel="stylesheet" type="text/css" /><script language="javascript" src="static/js/jquery.m.js"></script><script language="javascript" src="static/js/layui.js"></script><script language="javascript" src="static/js/common.js"></script><script language="javascript" src="static/js/market.js"></script><link href="static/css/market.css" rel="stylesheet" type="text/css" /></head>
<body>
<!--ͷ��-->
<div class="header">
<? include("../tem/top---.html");?>
	<div class="general">
		<div class="main">
					<a class="logo" href="/">
				<img src="static/picture/t_l.png" class="top-zl">
			</a>
						<li class="search Search-box" onmouseover="topover()" onmouseout="topout()">
	<span class="searchtype">��Դ��</span><i></i>
	<form name="topf1" method="post" onsubmit="return topftj()">
	<input  name="topt" id="topt" type="text" class="searchval Search-inp"/>
	<input type="image" src="<?=weburl?>homeimg/so.png">
	<ul class="searchlist" style="display:none;"> 
	<li data='serve'>  <a href="javascript:void();" onclick="topjconc(1,'��Դ��')">��Դ��</a></li>
	<li data='domain'> <a href="javascript:void();" onclick="topjconc(2,'�ѿ���')">�ѿ���</a></li> 
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
		<div class="head-nav">
		<div class="main">
				<div class="nav-link">
					<li class="left">
						<a href="/">��ҳ</a><a href="/product/" class="bold">Դ�뼯��</a><a href="/productkf/" class="bold ">�����г�</a><a href="/productwz/" class="bold ">��վ����</a><a href="/productym/" class="">��������</a><a href="/task/" class="">�������</a>					</li>
					<li class="right">
						<a href="/shop/" class="cur">�̼�</a> <a href="/">����</a> <a href="/">Ʒ��</a>  <a href="//" target="_blank">����</a>  <a href="/" target="_blank">����</a> 
						 <div class="clear"></div>
					</li>
				</div>
		</div>
	</div>
	</div>
</div>
<!--ͷ��-->
<div class="main">
<div class='sphead'>
	<div class='left'>
		<div class='sptit'><h3>��Ա�����</h3></div>
		<div class='active-list'>
			<dl><? $i=1;while1("*","epzhu_user where zt=1 and shopzt=2 and shopname<>'' order by sellmyue desc limit 10");while($row1=mysql_fetch_array($res1)){?>
							<dd>
					<em id='R<?=$i?>'><?=$i?></em><img class='avatar' src="<?=returntppd("../upload/".$row1[id]."/shop.jpg","../img/none180x180.gif")?>" /><span><?=strgb2312($row1[shopname],0,16)?></span>
				</dd> <? $i++;}?>
					
						</dl>
		</div>
		<a class='sp-join' href="/reg/reg.php" target="_blank"><h3>3���ӣ��������ɿ��꣡</h3><p>���������פ ></p><i></i></a>
	</div>
	<div class='right'>
		<div class='sptit' style='margin-left:14px;'><h3>�Ƽ��̼�</h3><a href='/shop/' target="_blank">��ҲҪ����������</a></div>
		<div class="sprec">
				<div class='list_items'>
				 <? 
 while1("*","epzhu_user where zt=1 and shopzt=2 and pm>0 order by pm asc limit 6");while($row1=mysql_fetch_array($res1)){
 $au="view".$row1[id].".html";
 $sucnum=returnjgdw($row1[xinyong],"",returnxy($row1[id],1));
 ?>
				
										<dl>
						<dt>
							<a href="<?=$au?>" class="avatar" target="_blank"><em></em>
								<img title="<?=$row1[shopname]?>" src="<?=returntppd("../upload/".$row1[id]."/shop.jpg","../img/none180x180.gif")?>" />
							</a>
							<span class='info'>
								<p><a class="name" href="<?=$au?>" target="_blank"><?=$row1[shopname]?></a></p>
								<p><img class='xy' src='../img/dj/<?=returnxytp($sucnum)?>' title='����ֵ<?=$sucnum?>'> ������<?=returncount("epzhu_pro where zt=0 and ifxj=0 and userid=".$row1[id])?> ��</p>
								<!--<p>����<em>5.00</em> Ч��<em>5.00</em> ����<em>5.00</em></p>-->
							</span>
							<div class='url'><a href="<?=$au?>" target="_blank"><i class="iconfont va-1">&#xe61d;</i>����</a> 
<!--							<a class="imfav" id='u15399545196' info='shop|u15399545196'><i class="iconfont va-1">&#xe61c;</i>�ղ�</a>--></div>
						</dt>
						<dd>
							<cite>
								<span>TA�ı���</span>
								<i></i>
							</cite><?
  while2("*","epzhu_pro where userid=".$row1[id]." and zt=0 and ifxj=0 order by lastsj desc limit 2");while($row2=mysql_fetch_array($res2)){
  $au="../product/view".$row2[id].".html";
  $tp="../".returntp("bh='".$row2[bh]."' order by iffm desc","-2");
  ?>
															<a href="<?=$au?>" target="_blank"><em>��4800</em><?=$row2[tit]?></a>
															  <? }?>
													</dd>
					</dl> <?
 }
 ?>
										
									</div>
			</div>
		</div>
	</div>	
	<!--
	<div class="sort_box full-screen left" id='layer_top'>
		<dl class='sort_top'>
			<div class="sort_order left">
								<a  class="curr">����</a>
								<a href="/shop/order/sales">����</a>
								<a href="/shop/order/baby">����</a>
								<a href="/shop/order/age">����</a>
							</div>
			<div class="sort_input left">
				<div class="sort_search">
					<input data="key" placeholder='��������' type="text" value="" id="keys">
					<button class="submit shopso" type="button">ȷ��</button>
				</div>
			</div>
			 <div class='sort_info right'>
				��ǰ�����ѷ����������̼�<span>8255</span> λ
			</div>
		</dl>
	</div> -->
		<div class="splist">
			<div class='list_items'>
			
			
			 <?
 pagef($ses,28,"epzhu_user",$px);while($row=mysql_fetch_array($res)){
 $au="view".$row[id].".html";
 $sucnum=returnjgdw($row[xinyong],"",returnxy($row[id],1));
 ?>
								<dl>
					<dt>
						<a href="<?=$au?>" target="_blank">
							<img class="avatar" title="<?=$row[shopname]?>"  src="<?=returntppd("../upload/".$row[id]."/shop.jpg","../img/none180x180.gif")?>""/>
						</a>
						<span class='info'>
							<p><a class="name" href="<?=$au?>" target="_blank"><?=$row[shopname]?></a></p>
							<p><img class='xy' src='../img/dj/<?=returnxytp($sucnum)?>' title='һ������(0������ֵ)'> ������<?=returncount("epzhu_pro where zt=0 and ifxj=0 and userid=".$row[id])?> ��</p>
							<p class='url'><a href="<?=$au?>" target="_blank">����</a>  <a class="imfav" id='u15434660172' info='shop|u15434660172'>�ղ�</a></p>
						</span>
					</dt>
					<dd>
						<cite>
							<span>TA�ı���</span>
							<i></i>
						</cite><? while2("*","epzhu_pro where userid=".$row[id]." order by iftj asc");if($row2=mysql_fetch_array($res2)){?>
												<a href="/product/view<?=$row2[id]?>.html" target="_blank"><em>��<?=returnjgdian(returnyhmoney($row2[yhxs],$row2[money2],$row2[money3],$sj,$row2[yhsj1],$row2[yhsj2],$row2[id]))?></em><?=returntitdian($row2[tit],30)?></a><? }?>
					</dd>
				</dl>
				
				
				 <? }?>
								 <div class="npa">
 <?
 $nowurl="search";
 $nowwd="";
 require("../tem/page.html");
 ?>
 </div>
							</div>
		</div>
		</div>
<? include("../tem/bottom--.html");?>
</body>
</html>