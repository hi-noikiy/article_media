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
<p class="u_t_i"><strong><?=$rowuser[shopname]?></strong><img class="xy" src="../img/dj/<?=returnxytp($sucnum)?>" title="<?=$sucnum?>��"></p>


</p>
<p><a class="toggle_center">
<span style='color:#cccccc;padding-left:0'>[</span>����<em><?=$mspf?></em><span>|</span>Ч�ʣ�<em><?=$fhpf?></em><span>|</span>������<em><?=$shpf?></em> <span style='color:#cccccc'>]</span></a></p>
<ul class="rev_pop" style="display: none;">
<table class="pop_pf">
<thead>
<tr><th style="width: 50%;text-align:left">�����ۺ�����</th>
<th>��ͬ��ҵ���</th></tr>
</thead>
<tbody>
<tr><td>����̬�ȣ� <?=sprintf("%.2f",($mspf+$fhpf+$shpf)/3)?></td><td><i>����</i> <span><?=$mspf?>%</span></td></tr>
<tr><td>����Ч�ʣ� <?=sprintf("%.2f",($mspf+$fhpf+$shpf)/3)?></td><td><i>����</i> <span><?=$fhpf?>%</span></td></tr>
<tr><td>��������� <?=sprintf("%.2f",($mspf+$fhpf+$shpf)/3)?></td><td><i>����</i> <span><?=$shpf?>%</span></td></tr>
</tbody>
</table>
<table class="pop_info">
<thead>
<tr><th>&nbsp;</th></tr>
</thead>
<tbody>
<tr><td style="width: 35%;">����ʱ�䣺<?=dateYMD($rowuser[sj])?></td></tr>
<tr><td>����������<?=returncount("epzhu_pro where userid=".$rowuser[id]." and zt=0")?> ��</td></tr>
<tr><td class="certification">�̼���֤��
 <? if(1==$rowuser[ifmot]){?><img src="<?=weburl?>shop/img/sj1.gif" title="�ֻ���ͨ����֤" style="width: 16px;height: 16px;margin-bottom: -3px;"/><? }else{?><img src="<?=weburl?>shop/img/sj0.gif" title="�ֻ�δ��֤" style="
    width: 16px;
    height: 16px;margin-bottom: -3px;
"/><? }?>
  <? if(1==$rowuser[ifemail]){?><img src="<?=weburl?>shop/img/yx1.gif" title="������ͨ����֤"style="
    width: 16px;
    height: 16px;margin-bottom: -3px;
" /><? }else{?><img src="<?=weburl?>shop/img/yx0.gif" title="����δ��֤"style="
    width: 16px;
    height: 16px;margin-bottom: -3px;
" /><? }?>
  </td></tr>
</tbody>
</table>
<div class="t_p_bottom"><a href="view<?=$uid?>.html">�̼ҵ��̡�</a></div>
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
<span>������Ʒ<em></em></span>
<div class="gsbox">
<a href='<?=weburl?>shop/prolist_i<?=$uid?>v.html'>Դ��<em>(<?=returncount("epzhu_pro where userid=".$rowuser[id]." and zt=0")?>)</em></a></div>
</li>
<li><a href="<?=returnmyweb($uid,$rowuser[myweb])?>">��ҳ</a></li>
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
</script> <!--ͷ��-->