 <div class="shop_goods shop_class">
<div class="seller" style='margin-top:10px;'>
<div class='s_box'>    
<div class='s_info'>    
<ul class='s_mark'>  
<img src="<?=returntppd("../upload/".$rowuser[id]."/shop.jpg","../img/none180x180.gif")?>" width="200" height="200">
</ul>
<ul class='s_name'>  
<?=$rowuser[shopname]?></ul>

<ul class='xy'>    
商家信誉：  <img src="../img/dj/<?=returnxytp($sucnum)?>" title="<?=$sucnum?>分" /></ul>
<ul class='certification'>商家认证：
  <? if(1==$rowuser[ifmot]){?><img src="<?=weburl?>shop/img/sj1.gif" width="16" height="16"  title="手机已通过认证" /><? }else{?><img src="<?=weburl?>shop/img/sj0.gif" width="16" height="16" title="手机未认证" /><? }?>

  <? if(1==$rowuser[ifemail]){?><img src="<?=weburl?>shop/img/yx1.gif" width="16" height="16" title="邮箱已通过认证" /><? }else{?><img src="<?=weburl?>shop/img/yx0.gif" width="16" height="16" title="邮箱未认证" /><? }?>

</ul>

<ul class='szd'>    
浏览量：<strong><?=$rowuser[djl]?></strong>次丨
收藏量：<strong><?=returncount("epzhu_shopfav where shopid=".$uid)?></strong>人
</ul>
<ul class="shop_score">
   <div>
   <cite>
   <p><span>描述</span></p> 
   <p class="up"><?=$mspf?><i class="iconfont">&#xe648;</i></p>   </cite>
   <cite> 
   <p><span>发货</span></p>
   <p class="up"><?=$fhpf?><i class="iconfont">&#xe648;</i></p>   </cite> 
   <cite> 
   <p><span>售后</span></p>
   <p class="up"><?=$shpf?><i class="iconfont">&#xe648;</i></p>   </cite> 
   </div>
</ul>
<ul class="shop_btns">
                <a href="/shop/view<?=$uid?>.html">
                  <i class="iconfont">&#xe61d;</i><span>进店逛逛</span>
                </a>
				  <? 
  $a1="none";$a2="none";
  $nuid=returnuserid($_SESSION["SHOPUSER"]);
  if($_SESSION["SHOPUSER"]==""){$a1="";}else{
  if(panduan("*","epzhu_shopfav where shopid=".$rowuser[id]." and userid=".$nuid."")==1){$a2="";}else{$a1="";}
  }
  ?>
    <a id="favsno" style="display:<?=$a1?>;" class='collection imfav' href="javascript:shopfavInto(<?=$rowuser[id]?>)"><i class="iconfont">&#xe61c;</i><span>收藏店铺</span></a>
  <a id="favsyes" style="display:<?=$a2?>;" class='collection imfav' href="../user/favshop.php"><i class="iconfont">&#xe61c;</i><span>已收藏</span></a>
                
</ul>
<ul>

<a href="javascript:void(0);" class='bond_info'>
<? if($rowuser[baomoney]>0){?><i class="iconfont va-1">&#xe65f;</i>商家已缴纳保证金：<em class="orange va-1"><?=$rowuser[baomoney]?>元</em><? }?>
</a>

</ul>
</div>
<div class='s_tit'>联系客服</div>
<div class="s_list">

<? if(!empty($rowuser[uqq])){?>
  <a href="http://wpa.qq.com/msgrd?v=3&uin=<?=$rowuser[uqq]?>&site=<?=gloweb?>&menu=yes" target="_blank"><img src="../img/qq5.gif" border="0" /> <?=$rowuser[uqq]?></a>
  <? }?>


</div>

<div class='s_tit'>店铺指数</div>
<div class="s_list">
  <li>源码数量：<span class="red"><?=returncount("epzhu_pro where userid=".$rowuser[id]." and zt=0")?></span></li>
  <li>开发服务：<span class="red"><?=returncount("epzhu_prokf where userid=".$rowuser[id]." and zt=0")?></span></li>
  <li>累计访客：<span class="red"><?=$rowuser[djl]?></span></li>
  <li>综合评分：<span class="red"><?=sprintf("%.2f",($mspf+$fhpf+$shpf)/3)?></span></li>

</div>

<div class='s_tit'>经营指数</div>
<div class="s_list">
  <li>源码交易：<span class="red"><?=returncount("epzhu_order where selluserid=".$rowuser[id])?></span>笔</li>
  <li>开发交易：<span class="red"><?=returncount("epzhu_orderkf where selluserid=".$rowuser[id])?></span>笔</li>
   <!--<li>月交易：<span class="red"><?=$c?></span>笔</li>
 <li>月成交：<span class="red"><?=$f?></span>元</li>-->

</div>
<div class='s_tit'>源码销量榜
</div>
<div class="s_hot">
<div class="c_l_hol" id="code_hot">
<dl class="dropList-hover">
<? $i=1;$ai=returncount("epzhu_type where admin=1");while1("*","epzhu_type where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
<? 
 while1("*","epzhu_pro where userid=".$uid." and zt=0 and ifxj=0 order by xsnum desc limit 10");while($row1=mysql_fetch_array($res1)){
 $au="../product/view".$row1[id].".html";
 $tp="../".returntp("bh='".$row1[bh]."' order by iffm desc","-2");
 ?> 
  <dt><p><em class="no<?=$i?>"><?=$i?></em><span><?=strgb2312($row1[tit],0,48)?></span></p></dt>
  <dd><a class="track" href="<?=$au?>" target="_blank"><img src="<?=returntppd($tp,"../img/none180x180.gif")?>" class="pic_Layer"></a> 
  </dd>
  </dl>
  <dl class="">
 <? $i++;}?>
   <? }?>
  
     </div>
    </div>
</div>
<div class='s_tit'>开发服务榜
</div>
<div class="s_hot">
<div class="c_l_hol" id="code_hot">
<dl class="dropList-hover">
<? $i=1;$ai=returncount("epzhu_typekf where admin=1");while1("*","epzhu_typekf where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
<? 
 while1("*","epzhu_prokf where userid=".$uid." and zt=0 and ifxj=0 order by xsnum desc limit 10");while($row1=mysql_fetch_array($res1)){
 $au="../productkf/view".$row1[id].".html";
 $tp="../".returntp("bh='".$row1[bh]."' order by iffm desc","-2");
 ?> 
  <dt><p><em class="no<?=$i?>"><?=$i?></em><span><?=strgb2312($row1[tit],0,48)?></span></p></dt>
  <dd><a class="track" href="<?=$au?>" target="_blank"><img src="<?=returntppd($tp,"../img/none180x180.gif")?>" class="pic_Layer"></a> 
  </dd>
  </dl>
  <dl class="">
 <? $i++;}?>
   <? }?>
  
     </div>
    </div>
</div>
