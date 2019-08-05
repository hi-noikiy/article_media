<div class="treebox">
 <div class="ksm">资讯管理</div>
 <ul class="menu">

 <li class="level1">
  <a href="javascript:void(0);" class="<? if($leftid==1){?>current <? }?>a1"><em></em>查看订单管理<i></i></a>
  <ul class="level2" style="display:<? if($leftid==1){?>block;<? }?>">
  <li><a href="orderlist.php">所有订单</a></li>
  <li><a href="orderlist.php?ddzt=wpay">等待付款</a></li>
  <li><a href="orderlist.php?ddzt=wait" class="red">等待发货</a></li>
  <li><a href="orderlist.php?ddzt=db">买家确认</a></li>
  <li><a href="orderlist.php?ddzt=suc">交易成功</a></li>
  <li><a href="orderlist.php?ddzt=back">退款申请</a></li>
  <li><a href="orderlist.php?ddzt=backsuc">退款成功</a></li>
  <li><a href="orderlist.php?ddzt=backerr">退款失败</a></li>
  <li><a href="orderlist.php?ddzt=close">订单取消</a></li>
  <li><a href="orderlist.php?ddzt=jf" class="red">纠纷，需要平台处理</a></li>
  <li><a href="orderlist.php?ddzt=jfbuy">纠纷，买家胜诉</a></li>
  <li><a href="orderlist.php?ddzt=jfsell">纠纷，卖家胜诉</a></li>
  </ul>
 </li>

 </ul>
</div>
<!--LEFT E-->
<? include("left.php");?>
