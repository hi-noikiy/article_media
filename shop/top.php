<? include("../tem/openwv.php");?>


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




<div class="header">


<div class="general main">
<li class="logo"><a href="<?=weburl?>" /></a></li>
<li class="top_sinfo">
<p class="u_t_i"><strong><?=$rowuser[shopname]?></strong><img class="xy" src="../img/dj/<?=returnxytp($sucnum)?>" title="<?=$sucnum?>分"></p>


</p>
<p><a class="toggle_center">
<span style='color:#cccccc;padding-left:0'>[</span>服务：<em><?=$mspf?></em><span>|</span>效率：<em><?=$fhpf?></em><span>|</span>质量：<em><?=$shpf?></em> <span style='color:#cccccc'>]</span></a></p>
<ul class="rev_pop" style="display: none;">
<table class="pop_pf">
<thead>
<tr><th style="width: 50%;text-align:left">店铺综合评分</th>
<th>与同行业相比</th></tr>
</thead>
<tbody>
<tr><td>服务态度： <?=sprintf("%.2f",($mspf+$fhpf+$shpf)/3)?></td><td><i>高于</i> <span><?=$mspf?>%</span></td></tr>
<tr><td>工作效率： <?=sprintf("%.2f",($mspf+$fhpf+$shpf)/3)?></td><td><i>高于</i> <span><?=$fhpf?>%</span></td></tr>
<tr><td>完成质量： <?=sprintf("%.2f",($mspf+$fhpf+$shpf)/3)?></td><td><i>高于</i> <span><?=$shpf?>%</span></td></tr>
</tbody>
</table>
<table class="pop_info">
<thead>
<tr><th>&nbsp;</th></tr>
</thead>
<tbody>
<tr><td style="width: 35%;">开店时间：<?=dateYMD($rowuser[sj])?></td></tr>
<tr><td>宝贝数量：<?=returncount("epzhu_pro where userid=".$rowuser[id]." and zt=0")?> 个</td></tr>
<tr><td class="certification">商家认证：
 <? if(1==$rowuser[ifmot]){?><img src="<?=weburl?>shop/img/sj1.gif" title="手机已通过认证" style="width: 16px;height: 16px;margin-bottom: -3px;"/><? }else{?><img src="<?=weburl?>shop/img/sj0.gif" title="手机未认证" style="
    width: 16px;
    height: 16px;margin-bottom: -3px;
"/><? }?>
  <? if(1==$rowuser[ifemail]){?><img src="<?=weburl?>shop/img/yx1.gif" title="邮箱已通过认证"style="
    width: 16px;
    height: 16px;margin-bottom: -3px;
" /><? }else{?><img src="<?=weburl?>shop/img/yx0.gif" title="邮箱未认证"style="
    width: 16px;
    height: 16px;margin-bottom: -3px;
" /><? }?>
  </td></tr>
</tbody>
</table>
<div class="t_p_bottom"><a href="view<?=$uid?>.html">商家店铺》</a></div>
</ul>
</li>

<li class="search Search-box" onmouseover="topover()" onmouseout="topout()">
			<span class="searchtype">商品</span><i></i>
			<form name="topf1" method="post" onsubmit="return topftj()">
			<input  name="topt" id="topt" type="text" class="searchval Search-inp"/>
			<input type="image" src="<?=weburl?>homeimg/so.png">
			<ul class="searchlist" style="display:none;"> 
			<li data='serve'>  <a href="javascript:void();" onclick="topjconc(1,'商品')">商品</a></li>
			<li data='domain'> <a href="javascript:void();" onclick="topjconc(2,'店铺')">店铺</a></li> 
			<li data='web'>  <a href="javascript:void();" onclick="topjconc(3,'资讯')">资讯</a></li>

  </ul>
</li>
</div>


<?
while1("*","epzhu_ad where adbh='ADSHOP01' and zt=0 order by xh asc limit 1");$row1=mysql_fetch_array($res1);
$bannar=returntppd("../upload/".$rowuser[id]."/bannar.jpg","../gg/".$row1[bh].".".$row1[jpggif]);
?>
<div class="shop_banner">
<div class="main" style="background:url(<?=$bannar?>) center top no-repeat;"></div>
</div>

<div class="shop_nav n_bk_we">
<div class="main">
<li class='gs'>
<span>店铺商品<em></em></span>
<div class="gsbox">
<a href='<?=weburl?>shop/prolist_i<?=$uid?>v.html'>源码<em>(<?=returncount("epzhu_pro where userid=".$rowuser[id]." and zt=0")?>)</em></a></div>
</li>
<li><a href="<?=returnmyweb($uid,$rowuser[myweb])?>">首页</a></li>
<? if(panduan("*","epzhu_shopmenu where zt=0 and userid=".$uid)==0){?>
 <? }else{?>
  <? 
  while1("*","epzhu_shopmenu where zt=0 and admin=1 and userid=".$uid);while($row1=mysql_fetch_array($res1)){
  if($row1[targ]==1){$t="_self";}else{$t="_blank";}
  ?>
   <div class="d1" onmouseleave="topm2out(<?=$row1[id]?>)" onmouseenter="topm2over(<?=$row1[id]?>)">
   <li><a href="<?=$row1[aurl]?>" target="<?=$t?>" class="a1"><?=$row1[tit1]?></a></li>
  <? }?>
 <? }?>
</div>
</div>
</div>
</div></div>
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
})
})
</script> <!--头部-->