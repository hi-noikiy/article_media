<?
include("../config/xy.php");
$sj=date("Y-m-d H:i:s");
$id=$_GET[id];
while0("*","epzhu_prowz where zt<>99 and id=".$id);if(!$row=mysql_fetch_array($res)){php_toheader("../");}
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
<div class="yjcode"><? adwhile("ADTOP");?></div>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$row[tit]?> - <?=webname?></title>
<meta name="keywords" content="<?=returnjgdw($row[wkey],"",$row[tit])?>">
<meta name="description" content="<?=returnjgdw($row[wdes],"",strgb2312(strip_tags($row[txt]),0,250))?>">

<link href="static/css/basic.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="static/js/jquery.m.js"></script>
<script language="javascript" src="static/js/layui.js"></script>
<script language="javascript" src="static/js/common.js"></script>
<script language="javascript" src="static/js/market.js"></script>
<link href="static/css/market.css" rel="stylesheet" type="text/css" />
<link href="static/css/layui.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="static/js/tipso.min.js"></script>

<script language="javascript" src="static/js/view.js"></script>
<script language="javascript" src="static/js/layer.js"></script>

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

</head>
<body>

<div class="header">
<? include("../tem/top---.html");?>
	
	<div class="general">
		<div class="main">
					<a class="logo" href="/">
				<img src="static/picture/t_l.png" class="top-zl">
			</a>
						<li class="search Search-box" onmouseover="topover()" onmouseout="topout()">
	<span class="searchtype">Դ��</span><i></i>
	<form name="topf1" method="post" onsubmit="return topftj()">
	<input  name="topt" id="topt" type="text" class="searchval Search-inp"/>
	<input type="image" src="<?=weburl?>homeimg/so.png" class="searchbtn Search-btn">
	<ul class="searchlist" style="display:none;"> 
	<li data='serve'>  <a href="javascript:void();" onclick="topjconc(1,'��Դ��')">Դ��</a></li>
	<li data='domain'> <a href="javascript:void();" onclick="topjconc(2,'�ѿ���')">�ѿ���</a></li> 
   <li data='domain1'> <a href="javascript:void();" onclick="topjconc(10,'������')">������</a></li> 
	

    </ul>
    </form>
    </li>
			<li class="Quick-link">
                <a href="javascript:released('buy');" class="button">
                    <span>��ѷ�������</span>
                    <i class="arrow"></i>
                </a>
                <p class="release_hover">
                    <a href="javascript:released('buy');">��ѷ�������</a>
                    <a href="javascript:;" class="add_custom">������������<i class="rec-icon">��</i></a>
                    <a href="javascript:released('sale');">��ѷ�����Ʒ</a>
                </p>
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
				<div class="nav-link">
						<li class="left">
						<a href="/">��ҳ</a><a href="/code/search_j37v.html" class="bold">Դ�뼯��</a><a href="/serve/search_j208v.html" class="bold  cur">�����г�</a><a href="/web/search_j213v.html" class="bold ">��վ����</a><a href="/productym/search_j236v.html" class="">��������</a><a href="/task/" class="">�������</a>					</li>
					<li class="right">
						<a href="/shop/">�̼�</a> <a href="/">����</a> <a href="/">Ʒ��</a>  <a href="//" target="_blank">����</a>  <a href="/" target="_blank">����</a> 
						 <div class="clear"></div>
					</li>
				</div>
		</div>
	</div>
</div>
<!--ͷ��-->
<div class="dqwz">��ǰλ�ã�<a href="/">��ҳ</a> <span>></span> <a href="search_j<?=$row[ty1id]?>v.html"><?=returntype(1,$row[ty1id])?></a>
 <? if(0!=$row[ty2id]){?> <span>></span> <a href="search_j<?=$row[ty1id]?>v_k<?=$row[ty2id]?>v.html"><?=returntype(2,$row[ty2id])?></a><? }?>
 <? if(0!=$row[ty3id]){?> <span>></span> <a href="search_j<?=$row[ty1id]?>v_k<?=$row[ty2id]?>v_m<?=$row[ty3id]?>v.html"><?=returntype(3,$row[ty3id])?></a><? }?>  ������ʱ�䣺<?=dateYMD($row[lastsj])?>��</div>
<div class="main t_view w_entrust">
	<div class="g_main left">
	 
		<div class='g_box g_web'>
			<ul class="w_cont"> 
			    <div class="w_good">
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
					<a href="../tp/showpic.php?bh=<?=$row[bh]?>" target="_blank" class='pic' rel="nofollow"  title="�鿴��վ">
						<img class='G-image' src='<?=returntppd($tp,"../img/none300x300.gif")?>'>
					</a>
					 <? for($j=0;$j<$i;$j++){?>
  <? }?>
					<div class="c_g_ihd">
					<? 
  $a1="none";$a2="none";
  if($_SESSION["SHOPUSER"]==""){$a1="";}else{
   $nuid=returnuserid($_SESSION["SHOPUSER"]);
   if(panduan("probh,userid","epzhu_profav where probh='".$row[bh]."' and userid=".$nuid)==1){$a2="";}else{$a1="";}
  }
  ?>
 <span class="sc"  id="favpno" style="display:<?=$a1?>;" ><i class="iconfont">�e</i><a href="javascript:profavInto('<?=$row[bh]?>')" class="imfav">�ղ���Ʒ</a></span>
  <span class="sc" id="favpyes" style="display:<?=$a2?>;"><i class="iconfont">�e</i><a href="../user/favpro.php">���ղ�</a></span>
					<span class="l2">
						<span class="fx-title icons">
							<div>����</div>
						</span>
						<!--share start-->
						<div class="G-share">
							<a class="share-a G-weixin" data="weixin" title="����΢��"></a>
							<a class="share-a G-qzone" data="qzone" title="����QQ�ռ�"></a>
							<a class="share-a G-sqq" data="qq" title="����QQ����"></a>
							<a class="share-a G-tsina" data="sina" title="��������΢��"></a>
						</div>
						<!--share end-->
					</span>
					
				</div>
				</div>
				<div class="w_info">
				<ul class='w_tit'><?=$row[tit]?></ul>
				<ul class='mt10'>
					<div class='left'>
						<ul class='w_money'>
							<p class='price'>
								<b><em>��</em><?=$nowmoney?></b>
							</p>
							<p>
							<span>������</span>
							<? if(!empty($row[ysweb])){?>
							
							<?=$row[ysweb]?><? }?>						</p>
							<p>
							<span>������</span>100 IP  <a class="see_stats links" title="�鿴����վ������ͳ��" id="154538069234"><i>&#xe6b1;</i> ������ͳ��</a>							</p>
						</ul>
						<ul class='w_buy'>
					
						
							<a class="w_button cartadd"  id="bcar" href="javascript:buyInto('<?=$row[bh]?>')" title="��Ҫ����"><i class="iconfont">&#xe61e;</i>��Ҫ����</a><a class="w_button cs" href="http://wpa.qq.com/msgrd?v=3&uin=<?=returnqq($row[userid])?>&site=<?=weburl?>&menu=yes"><i class="iconfont">&#xe691;</i>��ϵ����</a>
						</ul>
					</div>
					<ul class="w_attr">
					   <? 
   $a=preg_split("/xcf/",$row[tysx]);
   $sx1arr=array();
   $sxall="xcf";
   $m=0;
   for($i=0;$i<=count($a);$i++){
	$ai=$a[$i];
    if($ai!=""){
	if(!is_numeric($ai)){$z1=preg_split("/:/",$ai);$ai=$z1[0];}
    while1("*","epzhu_typesxwz where id=".$ai);if($row1=mysql_fetch_array($res1)){
    if(!in_array($row1[name1],$sx1arr)){$sx1arr[$m]=$row1[name1];$m++;}
	if(!is_numeric($a[$i])){$z1=preg_split("/:/",$a[$i]);$v=$z1[1];}else{$v=$row1[name2];}
	$sxall=$sxall.$row1[name1].":".$v."xcf";
	}
	}
   }
   for($i=0;$i<count($sx1arr);$i++){
   ?>
<p><span><?=$sx1arr[$i]?>��</span> <? $b=preg_split("/xcf/",$sxall);for($j=0;$j<=count($b);$j++){if(check_in($sx1arr[$i],$b[$j])){echo str_replace($sx1arr[$i].":","",$b[$j])." ";}}?> </p>	<? }?>
</li>
					
				
					</ul></div></div>
				<ul class="w_seo">
						<cite>
			<h3>��վ����</h3>
			<span>������Ŷ�Ǹ������ο������༰������Ϣ�����в�ѯ��
			�������ݸ���ʱ�䣺<font color="#87A34D"><?=dateYMD($row[lastsj])?></font>						</span>
			</cite>
				
				<ul class="w_desc">
					<? $protxt=$row[txt];?>
 <? if(check_in("video",$row[txt])){?>
 <link href="../config/ueditor/third-party/video-js/video-js.min.css" rel="stylesheet" type="text/css" />
 <script language="javascript" src="../config/ueditor/third-party/video-js/video.dev.js"></script>
 <? }?>
 <?=$protxt?>
				</ul>
			</ul>
			
				
	
				
			</ul>
		
		<!--���Ľ���-->
		<div class="s_flow g_box">
			<dl>
				<dt><span>��������</span></dt>
				<dd><img src="static/picture/web_flow.png" /></dd>
			</dl>
			<dl>
				<dt><span>��������</span></dt>
				<dd>
					<p>1����վ����Ĭ�Ͻ�������Ϊ5�죬��ҿɲ������ӳ�3�죨����1���ӳ�Ȩ������</p>
					<p>2����������������˫����Ȼ�޷���ɽ��ף�����һ���ɷ���׷�����ڣ�1~60�죩�����󣬶Է�ͬ�⼴���ӳ���</p>
				</dd>
			</dl>
			<dl>
				<dt><span>ǰ��</span></dt>
				<dd>
					<p>��վ������Ϊ�漰�Ľ������ݱȽ϶࣬�Բ�ע������������ʧ��Ϊ��ֹ����������֣�һƷ����ƽʱ����������������Ϊ��������ص�����£�</p>
				</dd>
			</dl>
			<dl>
				<dt><span>һ������</span></dt>
				<dd>
					<p>��վ����Ҫ�ľ��������������Ĺ���������2�����������ǰ���һ��Ҫͨ��whois��ѯ����������ע���̣�ȷ������˵����ʵ��</p>
					<p>1��<b>ת��ע���̣�</b>���������ת��GD������Э����ԭע������ȡת�����룬����Լ�����ƽ̨�ύת�ƣ����5-7��ת�Ƴɹ���һЩС��ƽ̨��ȡ���̿��ܱȽϸ��ӣ���Ҫ�ʼ����ϵȣ����������ѯע����ƽ̨�ͷ������ֽ���һ��Ƚϰ�ȫ�������ϲ���������⣻</p>
					<p>2��<b>վ��push��</b>�������ҵ�������������������������֧��PUSH����������ע���̣�����ҿ����ڸ�ƽ̨ע���˺ţ�����ֱ��PUSH����Ҽ�������������ַ�ʽ��㣨�ر�ע�⣺վ��push֮ǰ���һ��Ҫ�ۺ��ж�����������ƽ̨�Ƿ����档�����о�һ����ұ�ƭ�İ��������Һ����˵������ĳĳƽ̨��ֻ��������push�������ȥע���˺ţ�����push�����ȷʵ���Լ��˺ſ����������������ȷ�Ͻ���һƷ�����Ժ���ҷ��ֱ�ƭ��ԭ����ν��ĳĳƽ̨����վ����Դ���Լ����ƽ̨��վ�����������ƽ̨������ӳ���ĳ��������ʵ������������������Ȩ��������</p>
					<p>3��<b>�����Ƿ�����ɹ���</b></p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����һ���鿴whois�����ǲ����Լ������ϣ���֪����ô�鿴��ٶ�'whois��ѯ'����</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;��������������һ�������������ܷ���Ч��������Ч������Ҫ�����ӻ�Сʱ����</p>
					<p>4��<b>ע�⣺</b>����С������ƽ̨������push�ɹ�����������δ�ػ�����ҵģ����Ҫ�޸ı���Ҫ����Э����</p>

				</dd>
			</dl>
			<dl>
				<dt><span>������������</span></dt>
				<dd>
					<p>1������ǰ��ѯ�������Դ�롢�����С������������Ҫ�����Ϣ��ȷ�����Ǽ����ܸ㶨�Ļ����ҿ�Э���㶨��</p>
					<p>2�������ͬ������һ��ת�ã�����Ҫע��������ĵ���ʱ�䣬���ǵü�ʱ���ѣ��Է����ڳ������ݱ���ʽ����</p>
					<p>2������Ҫ���ݡ����ݡ����ݣ���Ҫ�������˵���飬����Ҫ�������ݣ���ʹ���ݱ���Ū��Ҳ������һҹ�ص����ǰ��</p>
				</dd>
			</dl>

			<dl>
				<dt><span>������������</span></dt>
				<dd>
					<p>�����ĸĶ����̻����϶����漰����ʱ��վ�����Ҫ���ӣ���ұ��뿼�������һ�㱸���Ľ���취��</p>
					<p>1�����½��뱸����</p>
					<p>2�����ɹ��������������Ӱ����վ�ٶȣ�</p>
					<p>3����ԭվ��Э�����䱣��������������������վ�����ǻ�ͬ��ģ�ʵ�ڵ��ģ�����ǩ����ͬ��</p>
				</dd>
			</dl>
			<dl>
				<dt><span>�ġ���վ����</span></dt>
				<dd>
					<p>1����վ������Ȩ��������������Դվ����������Ȩ�ص�׼ȷ�Ⱥͳ�������������</p>
					<p>2���������豣֤�����ڼ���վ������Ȩ�������������½���Χ������10%�����������Ȩȡ�����ף�</p>
					<p>3�������վ�ѿ�ͨ�ٶȡ��Ա��ȹ�����ˣ������Ҫ�����ã��轻���ڼ����������˹ٷ��ύ����ɾ����</p>
					<p>4����������վ�ճ�ά����cdn���١��������󶨡��ͻ���Դ�ȶ��Ƚϼ򵥣�˫�����й�ͨ���Ӽ��ɡ�</p>
				</dd>
			</dl>
			<dl>
				<dt><span>ע������</span></dt>
				<dd>
					<p>1����û��"���κ������˿�����"��ǰ���£���Ʒд��"һ���۳����Ų�֧���˿�"�����Ƶ���������Ϊ��Ч������</p>
					<p>2����δ����ǰ��˫����QQ�����̶��Ľ������ݣ���ɳ�Ϊ�����������ݣ��̶���������ͻʱ���̶�Ϊ׼����</p>
					<p>3���������¼����Ϊ�����������ݣ���˫����ϵʱ��ֻ��Է���Դվ��������QQ���ֻ��Ź�ͨ���Է��Է��ܲ������Լ�˵���Ļ���</p>
					<p>4����Ȼ���ײ������׵ļ��ʺ�С����һ��Ҫ�����������¼���ֻ����ŵ���������Ҫ��Ϣ���Է���������ʱ����Դվ������ٴ���</p>
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

	<!--�ұ�-->
<? $xy=returnjgdw($rowsell[xinyong],"",returnxy($row[userid],1));?>
	<div id='layer_top'>
			<div class="g_side right">
				<div class="c_g_inf g_box">
					<ul class="c_g_sell">
						<img class="c_s_tx tipss" t-bg='#fff' title='<?=$rowsell[shopname]?>' src="../upload/<?=$row[userid]?>/shop.jpg" width="35" height="35" />
						<span class="c_s_name"><p ><?=$rowsell[shopname]?></p><img class='xy' src='../img/dj/<?=returnxytp($xy)?>' title='����ֵ<?=$xy?>'></span>
					</ul>
					<ul class="c_s_info">
						<li><span>���ڵ�����</span>�й���½</li>
						<li class="certification"><span>�̼���֤��</span>
						
<? if(1==$rowsell[ifmot]){?><i class="phone success" title="��ͨ���ֻ���֤"></i><? }else{?><i class="phone successs" title="δͨ���ֻ���֤"></i><? }?>
<? if(1==$rowsell[ifemail]){?><i class="success" title="��ͨ��������֤"></i><? }else{?><i class="successs" title="δͨ��������֤"></i><? }?>
<? if(1==$rowsell[sfzrz]){?><i class="idcard success" title="��ͨ�������֤"></i><? }else{?><i class="idcard successs" title="δͨ�������֤"></i><? }?>
						
						
					</li>
					</ul>
					<ul class="tit">
						<i class="iconfont" style='font-size:18px;font-weight:normal;'>&#xe62f;</i> ��ϵ����
					</ul>
					<ul class="c_s_cont"  id="layer_cont">
					<div class="uim">
<div class="qq" title="��ϵQQ"><a href="http://wpa.qq.com/msgrd?v=3&uin=<?=returnqq($row[userid])?>&site=<?=weburl?>&menu=yes" target=_blank><?=returnqq($row[userid])?></a></div>
<? if($rowsell[weixin]){?><div class="wechat" title="��ϵ΢��"><p><?=$rowsell[weixin]?></p></div><? }?>
<? if($rowsell[mot]){?><div class="phone" title="��ϵ�绰"><p><?=$rowsell[mot]?></p></div><? }?></span></div>

					</ul>
					<ul class="shop_score">
					<div>
   <cite>
   <p><span>����</span></p> 
   <p class="up"><?=returnjgdian($rowsell[pf1])?><i class="iconfont">�B</i></p>   </cite>
   <cite> 
   <p><span>����</span></p>
   <p class="up"><?=returnjgdian($rowsell[pf2])?><i class="iconfont">�B</i></p>   </cite> 
   <cite> 
   <p><span>�ۺ�</span></p>
   <p class="up"><?=returnjgdian($rowsell[pf3])?><i class="iconfont">�B</i></p>     </cite> 
   </div>
						
					</ul>
					<ul class="shop_btns">
									<a href="/ishop<?=$rowsell[id]?>/">
									  <i class="iconfont va-1">&#xe61d;</i><span>������</span>
									</a><? 
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
   </a></li>
					</ul>
				</div>
				<!--
				<div class='g_box'>
					<div class="c_l_cap">&nbsp;&nbsp;&nbsp;	��������</div>
					<div class="shop_search Search-box">
						<li class='gradio'>��Ʒ��<label class='tips' T-bg='#ff8400' title='���깲��<b>Դ��</b>(0)��'><input checked type='radio' name='good_type' value='/ishop<?=$row[userid]?>/code/'>Դ��</label></li>
						<li>������<input type="text" class='inp Search-inp' value id='shop_key' placeholder="��������" name="key" style='width:125px;'/> </li>
						<li>�۸�<input name="am" class='inp Search-inp' placeholder='��' type="text" /> - <input name="dm" class='inp Search-inp' placeholder='��' type="text" /> </li>
						<li><input type="button" id='shop_search' class='Search-btn btn' value="�� ��" /> </li>
					</div>
				</div>-->
				<div class='lrtop_help' style='margin:0 0 10px 0;padding:18px 0;'>
					<a href='#' target='_blank'><img src='static/picture/ds.gif'></a>
				</div>
				<div class='g_box'>
					<div class="s_tit" style='border: 0;'>�����֮</div>
					<div style='float:left;width:200px;height:200px;overflow:hidden;padding:15px;border-top:#e5e5e5 solid 1px;'>
						
					</div>
				</div>
			</div>
	</div>
</div><? include("../tem/bottom--.html");?>
</body>
</html>