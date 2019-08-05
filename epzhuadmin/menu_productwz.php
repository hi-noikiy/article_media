<div class="treebox">

 <div class="ksm"><a href="./productlist.php">网站出售产品</a></div>
 <ul class="menu">

 <li class="level1">
  <a href="javascript:void(0);" class="<? if($leftid==1){?>current <? }?>a1"><em></em>商品管理<i></i></a>
  <ul class="level2" style="display:<? if($leftid==1){?>block;<? }?>">
  <li><a href="productlistwz.php">所有商品</a></li>
  <li><a href="productlistwz.php?zt=0">正在出售的商品</a></li>
  <li><a href="productlistwz.php?zt=1" class="red">需要审核的商品</a></li>
  <li><a href="productlxwz.php">发布商品</a></li>
  <li><a href="propjlistwz.php">评价列表</a></li>
  </ul>
 </li>
<!--
 <li class="level1">
  <a href="javascript:void(0);" class="<? if($leftid==2){?>current <? }?>a1"><em></em>充值卡密<i></i></a>
  <ul class="level2" style="display:<? if($leftid==2){?>block;<? }?>">
  <li><a href="paykamilistwz.php">卡密列表</a></li>
  </ul>
 </li>-->

 </ul>
</div>
<!--LEFT E-->
<? include("left.php");?>
