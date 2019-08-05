<? 
 $sj=date("Y-m-d H:i:s");
 $au="../productkf/view".returnproid($row[probh]).".html";
 $sqls1="select * from epzhu_user where id=".$row[selluserid];mysql_query("SET NAMES 'GBK'");$ress1=mysql_query($sqls1);$rows1=mysql_fetch_array($ress1);
 ?>
 
 <div class="orderv1">
  <ul class="u1">
  <li class="l1"><a href="<?=$au?>" target="_blank"><?=$row[tit]?></a></li>
  <li class="l2"><span>编号:<?=$orderbh?></span></li>
  <li class="l3"><span class="s1">订单金额</span><span class="s2"><?=returnjgdian($row[money1]*$row[num]+$row[yunfei])?></span></li>
  <li class="l4"><span class="s1">商品数量</span><span class="s2"><?=$row[num]?></span></li>
  <li class="l5"><span class="s1">订单状态</span><span class="s2"><?=returnorderzt($row[ddzt])?></span></li>
  <li class="l6"><span class="s1">卖家 [<strong><?=$rows1[nc]?></strong>]</span><? if(!empty($rows1[uqq])){?><a href="http://wpa.qq.com/msgrd?v=3&uin=<?=$rows1[uqq]?>&site=<?=weburl?>&menu=yes" class="s2" target="_blank"><?=$rows1[uqq]?></a><? }?><span class="s3"><?=$rows1[mot]?></span></li>
  </ul>
  
  <? if(!empty($ifztcontrol)){?>
  <!--状态说明B-->
  <div class="ztcontrol">
   <div class="d1"></div>
   <div class="d2">
   
    <? if($row[ddzt]=="wait"){?>
    <div class="ds1">卖家已收到您的订单，正在准备发货，请耐心等待下。</div>
    <div class="ds2"><strong>提醒：</strong>如果卖家长时间未发货，您可以【<a href="orderclosekf.php?orderbh=<?=$orderbh?>">取消订单</a>】。卖家也挺不容易，您可以【<a href="http://wpa.qq.com/msgrd?v=3&uin=<?=$rows1[uqq]?>&site=<?=weburl?>&menu=yes" class="s2" target="_blank">提醒卖家尽快发货</a>】。</div>
    <div class="ds3">
    <a href="http://wpa.qq.com/msgrd?v=3&uin=<?=$rows1[uqq]?>&site=<?=weburl?>&menu=yes" class="a1" target="_blank">提醒卖家尽快发货</a>
    <a href="orderclosekf.php?orderbh=<?=$orderbh?>" class="a0">取消订单</a>
    </div>
    <? }?>
    
    <? if($row[ddzt]=="close"){?>
    <div class="ds1">您在 <?=$row[closesj]?> 取消了该笔订单。</div>
    <div class="ds2"><strong>提醒：</strong>如果还需要该商品，请点<a href="<?=$au?>" target="_blank">再次购买</a>。</div>
    <? }?>
    
    <? if($row[ddzt]=="suc"){?>
    <div class="ds1">恭喜您，该笔订单已经交易成功。</div>
    <div class="ds2"><strong>提醒：</strong>如果还需要该商品，请点<a href="<?=$au?>" target="_blank">再次购买</a>。</div>
    <? if(panduan("orderbh,userid","epzhu_propjkf where orderbh='".$orderbh."' and userid=".$userid)==0){?>
    <div class="ds3"><a href="orderpjkf.php?orderbh=<?=$orderbh?>" class="a1">写评价赚积分</a></div>
    <? }?>
    <? }?>
    
    <? if($row[ddzt]=="backsuc"){?>
    <div class="ds1">卖家于 <?=$row[tkoksj]?> 同意了您的退款申请，款项已经退回到您的账户中。<br>处理说明：<?=returnjgdw($row[tkjg],"","同意退款")?></div>
    <div class="ds2"><strong>提醒：</strong>如果还需要该商品，请点<a href="<?=$au?>" target="_blank">再次购买</a>。</div>
    <? }?>
    
    <? 
	if($row[ddzt]=="backerr"){
    while1("*","epzhu_dbkf where orderbh='".$orderbh."'");$row1=mysql_fetch_array($res1);
    $second=strtotime($row1[dboksj])-strtotime($sj);
    $day = floor($second/(3600*24));
    $second = $second%(3600*24);//除去整天之后剩余的时间
    $hour = floor($second/3600);
    $second = $second%3600;//除去整小时之后剩余的时间 
    $minute = floor($second/60);
    $second = $second%60;//除去整分钟之后剩余的时间 
    $sjcv=$day."天".$hour."时".$minute."分".$second."秒";
    ?>
    <div class="ds1">卖家于 <?=$row[tkoksj]?> 拒绝了您的退款申请。<br>处理说明：<?=returnjgdw($row[tkjg],"","同意退款")?></div>
    <div class="ds2"><strong>提醒：</strong>如果商品没有问题，你可以进行【<a href="shouhuokf.php?orderbh=<?=$orderbh?>">确认收货</a>】，如果商品有问题，你可以【<a href="../help/aboutview4.html" target="_blank">申请客服介入</a>】<br>请务必在 <span class="red"><?=$sjcv?></span> 内进行相关操作，否则系统自动完成该笔订单，资金会打入卖家账户</div>
    <div class="ds3">
    <a href="shouhuokf.php?orderbh=<?=$orderbh?>" class="a1">确认收货</a>
    <a href="orderjfkf.php?orderbh=<?=$orderbh?>" class="a0">申请客服介入</a>
    </div>
    <? }?>
    
    <? 
	if($row[ddzt]=="back"){
    while1("*","epzhu_tkkf where orderbh='".$orderbh."'");$row1=mysql_fetch_array($res1);
    $second=strtotime($row1[tkoksj])-strtotime($sj);
    $day = floor($second/(3600*24));
    $second = $second%(3600*24);//除去整天之后剩余的时间
    $hour = floor($second/3600);
    $second = $second%3600;//除去整小时之后剩余的时间 
    $minute = floor($second/60);
    $second = $second%60;//除去整分钟之后剩余的时间 
    $sjcv=$day."天".$hour."时".$minute."分".$second."秒";
    ?>
    <div class="ds1">退款申请处理中，卖家需要在 <?=$sjcv?> 内处理你的退款申请。</div>
    <div class="ds2"><strong>提醒：</strong>如果商品本身及卖家方面都无问题，你也还需要该商品，那么你可以<a href="orderqxtkkf.php?orderbh=<?=$orderbh?>">取消退款申请</a>。<br>你在 <?=$row[tksj]?> 申请了退款<br>你的退款理由：<?=$row[tkly]?></div>
    <div class="ds3">
    <a href="orderqxtkkf.php?orderbh=<?=$orderbh?>" class="a1">取消退款申请</a>
    </div>
    <? }?>
    
    <? 
	if($row[ddzt]=="db"){
    while1("*","epzhu_dbkf where orderbh='".$orderbh."'");$row1=mysql_fetch_array($res1);
    $second=strtotime($row1[dboksj])-strtotime($sj);
    $day = floor($second/(3600*24));
    $second = $second%(3600*24);//除去整天之后剩余的时间
    $hour = floor($second/3600);
    $second = $second%3600;//除去整小时之后剩余的时间 
    $minute = floor($second/60);
    $second = $second%60;//除去整分钟之后剩余的时间 
    $sjcv=$day."天".$hour."时".$minute."分".$second."秒";
	?>
    <div class="ds1">卖家已发货，等待您确认收货。资金担保剩余时间：<?=$sjcv?></div>
    <div class="ds2"><strong>提醒：</strong>当您收到商品且确认没问题后，可进行【<a href="shouhuokf.php?orderbh=<?=$orderbh?>">确认收货</a>】来完成此次交易;在此期间请尽量注意资金担保剩余时间，若临近该时间点，商品依然存在问题且卖方未予及时解决，可先【<a href="orderyckf.php?orderbh=<?=$orderbh?>">延长担保时间</a>】或【<a href="ordertkkf.php?orderbh=<?=$orderbh?>">申请退款</a>】，等待卖方解决问题后，再【<a href="shouhuokf.php?orderbh=<?=$orderbh?>">确认收货</a>】或【<a href="orderqxtkkf.php?orderbh=<?=$orderbh?>">取消退款</a>】，不可轻信卖方许诺，以防有意拖延时间至自动完成交易。资金担保时间结束后，款项将自动转入卖家账户。</div>
    <div class="ds3">
    <a href="shouhuokf.php?orderbh=<?=$orderbh?>" class="a1">确认收货</a>
    <a href="orderyckf.php?orderbh=<?=$orderbh?>" class="a0">延长担保时间</a>
    <a href="ordertkkf.php?orderbh=<?=$orderbh?>" class="a0">申请退款</a>
    <a href="orderqxtkkf.php?orderbh=<?=$orderbh?>" class="a0">取消退款</a>
    </div>
    <? }?>

    <? if($row[ddzt]=="jf"){?>
    <div class="ds1">您已经申请了平台客服介入处理，处理过程中资金将被冻结，直至处理完毕。您可以提交更有利于您的证据。</div>
    <div class="ds3"><a href="orderjf1kf.php?orderbh=<?=$orderbh?>" class="a1">提交新证据</a></div>
    <? }?>

    <? if($row[ddzt]=="jfbuy"){?>
    <div class="ds1">平台已经判定本次交易纠纷为买家胜诉，款项已经退回到您的账户。</div>
    <div class="ds3"><a href="orderjf1kf.php?orderbh=<?=$orderbh?>" class="a0">查看沟通记录</a></div>
    <? }?>

    <? if($row[ddzt]=="jfsell"){?>
    <div class="ds1">平台已经判定本次交易纠纷为卖家胜诉，款项已经自动结算至卖家账户。</div>
    <div class="ds3"><a href="orderjf1kf.php?orderbh=<?=$orderbh?>" class="a0">查看沟通记录</a></div>
    <? }?>
    
   </div>
  </div>
  <!--状态说明E-->
  <? }?>
  
  <ul class="u2">
  <li class="l1">下单时间</li><li class="l2"><?=$row[sj]?></li>
  <li class="l1">选购套餐</li><li class="l2"><?=returnjgdw($row[tcv],"","无")?></li>
  </ul>
  <? if(!empty($row[liuyan])){?>
  <table class="table1" border="0" cellspacing="0" cellpadding="0">
  <tr>
  <td class="td1">购买留言</td>
  <td class="td2"><?=$row[liuyan]?></td>
  </tr>
  </table>
  <? }?>
  <? if(!empty($row[buyform])){?>
  <table class="table1" border="0" cellspacing="0" cellpadding="0">
  <tr>
  <td class="td1">购买信息</td>
  <td class="td2"><?=$row[buyform]?></td>
  </tr>
  </table>
  <? }?>
  <? if(!empty($row[shdz])){?>
  <table class="table1" border="0" cellspacing="0" cellpadding="0">
  <tr>
  <td class="td1">收货地址</td>
  <td class="td2"><?=$row[shdz]?></td>
  </tr>
  </table>
  <? }?>
  
  <? if($row[ddzt]=="db" || $row[ddzt]=="suc"){?>
  <table class="table1" border="0" cellspacing="0" cellpadding="0">
  <tr>
  <td class="td1">收货信息</td>
  <td class="td2">
  <? 
  while1("*","epzhu_prokf where bh='".$row[probh]."'");if($row1=mysql_fetch_array($res1)){
  $tcfhxs=0;
  if(!empty($row[tcid])){
   while2("*","epzhu_taocan where id=".$row[tcid]);if($row2=mysql_fetch_array($res2)){$tcfhxs=$row2[fhxs];}
  }
  ?>
 
  <? if(1==$row1[fhxs] && empty($tcfhxs)){?><strong class="blue">该订单的商品由卖家手动发货，请联系卖家</strong><? }?>
  <? if(1==$tcfhxs){?><strong class="blue">该订单的商品由卖家手动发货，请联系卖家</strong><? }?>
 
  <? if(2==$row1[fhxs] && empty($tcfhxs)){?>
  <strong>该订单商品通过网盘下载，请根据以下信息下载：</strong><br>
  <strong class="blue">网盘地址：<a href="<?=$row1[wpurl]?>" target="_blank"><?=$row1[wpurl]?></a><br>网盘密码：<?=$row1[wppwd]?><br>解压密码：<?=$row1[wppwd1]?></strong>
  <? }?>
  <? if(2==$tcfhxs){?>
  <strong>该订单商品通过网盘下载，请根据以下信息下载：</strong><br>
  <strong class="blue">网盘地址：<a href="<?=$row2[wpurl]?>" target="_blank"><?=$row2[wpurl]?></a><br>网盘密码：<?=$row2[wppwd]?><br>解压密码：<?=$row2[wppwd1]?></strong>
  <? }?>
 
  <? if(3==$row1[fhxs] && empty($tcfhxs)){?>
  <strong>该订单的商品已经传至服务器，请点击以下图标进行下载</strong><br>
  <a href="../upload/<?=$row1[userid]?>/<?=$row1[bh]?>/<?=$row1[upf]?>" target="_blank"><img border="0" style="margin-top:5px;" src="img/down.jpg" /></a>
  <? }?>
  <? if(3==$tcfhxs){?>
  <strong>该订单的商品已经传至服务器，请点击以下图标进行下载</strong><br>
  <a href="../upload/<?=$row1[userid]?>/<?=$row1[bh]?>/<?=$row2[upf]?>" target="_blank"><img border="0" style="margin-top:5px;" src="img/down.jpg" /></a>
  <? }?>
 
  <? if(4==$row1[fhxs] && empty($tcfhxs)){?>
  <strong>以下是您购买的卡密信息</strong><br>
  <?=$row[txt]?>
  <? }?>
  <? if(4==$tcfhxs){?>
  <strong>以下是您购买的卡密信息</strong><br>
  <?=$row[txt]?>
  <? }?>
 
  <? if(5==$row1[fhxs] && empty($tcfhxs)){?>
  <strong>以下是您的快递物流信息：</strong><br>
  <? if(!empty($row[kdid])){while1("*","epzhu_kuaidi where id=".$row[kdid]);if($row1=mysql_fetch_array($res1)){?>
  快递公司：<a href="<?=$row1[kdweb]?>" target="_blank" class="green"><?=$row1[tit]?></a><br>
  快递单号：<strong><?=$row[kddh]?></strong>
  <? }}?>
  <? }?>
  <? if(5==$tcfhxs){?>
  <strong>以下是您的快递物流信息</strong><br>
  <? if(!empty($row[kdid])){while1("*","epzhu_kuaidi where id=".$row[kdid]);if($row1=mysql_fetch_array($res1)){?>
  快递公司：<a href="<?=$row1[kdweb]?>" target="_blank" class="green"><?=$row1[tit]?></a><br>
  快递单号：<strong><?=$row[kddh]?></strong>
  <? }}?>
  <? }?>
 
  <? }else{?>
  <strong class="red">亲，很抱歉，无法提供该订单的发货信息（或已被卖家删除），请联系卖家</strong>
  <? }?>
  </td>
  </tr>
  </table>
  <? }?>

  
 </div>
 
  
