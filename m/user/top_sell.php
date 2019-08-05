<? include("topuser.php");?>
<div class="selltop box">
 <div class="d1" onclick="gourl('wait.php')"><img src="img/setting.png" width="40" /></div>
 <div class="d2"><img border="0" src="<?=$shoplogo?>" width="60" height="60" /><br><?=returnjgdw($rowuser[shopname],"",$rowuser[uid])?></div>
 <div class="d3"><a href="index.php">进入买家版</a></div>
</div>
<div class="selltop1 box">
 <div class="d1" onclick="gourl('sellorder.php?ddzt=wait')"><span><?=returncount("epzhu_order where selluserid=".$rowuser[id]." and ddzt='wait'");?></span><br>需要发货</div>
 <div class="d1" onclick="gourl('sellorder.php?ddzt=back')"><span><?=returncount("epzhu_order where selluserid=".$rowuser[id]." and ddzt='back'");?></span><br>处理退款</div>
 <div class="d1" onclick="gourl('sellorder.php?ddzt=jf')"><span><?=returncount("epzhu_order where selluserid=".$rowuser[id]." and ddzt='jf'");?></span><br>交易纠纷</div>
</div>