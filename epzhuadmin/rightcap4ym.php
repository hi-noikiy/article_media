<?
$sqlpro="select * from epzhu_proym where bh='".$bh."'";mysql_query("SET NAMES 'GBK'");$respro=mysql_query($sqlpro);
if(!$rowpro=mysql_fetch_array($respro)){php_toheader("productlistym.php");}
$promoney=returnjgdian(returnyhmoney($rowpro[yhxs],$rowpro[money2],$rowpro[money3],$sj,$rowpro[yhsj1],$rowpro[yhsj2],$rowpro[id]));
$protp=returntppd("../".returntp("bh='".$rowpro[bh]."' order by xh asc","-2"),"../img/none60x60.gif");
?>
 <div class="rproglo">
 <ul class="u1">
 <li class="l1"><a href="../productym/view<?=$rowpro[id]?>.html" target="_blank"><img border="0" class="tp" src="<?=$protp?>" width="80" height="80" /></a></li>
 <li class="l2"><strong><?=$rowpro[tit]?></strong></li>
 <li class="l3">售价：<strong class="feng"><?=$promoney?></strong></li>
 <li class="l4">已被关注<?=$rowpro[djl]?>次，销量<?=$rowpro[xsnum]?>，审核状态：<strong><?=returnztv($rowpro[zt])?></strong></li>
 </ul>
 </div>
 
 <div class="bqu1">
 <a href="productym.php?bh=<?=$bh?>" id="rtit1">基本资料</a>
 <a href="provideolistym.php?bh=<?=$bh?>" id="rtit2">商品视频</a>
 </div> 
