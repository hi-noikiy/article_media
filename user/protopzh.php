<?
$sqlpro="select * from epzhu_prokf where bh='".$bh."' and userid=".$rowuser[id]."";mysql_query("SET NAMES 'GBK'");$respro=mysql_query($sqlpro);
//if(!$rowpro=mysql_fetch_array($respro)){php_toheader("productzh.php");}
$promoney=returnjgdian(returnyhmoney($rowpro[yhxs],$rowpro[money2],$rowpro[money3],$sj,$rowpro[yhsj1],$rowpro[yhsj2],$rowpro[id]));
$protp=returntppd("../".returntp("bh='".$rowpro[bh]."' order by xh asc","-2"),"../img/none60x60.gif");
?>
 <div class="rproglo">
 <ul class="u1">
 <li class="l1"><a href="../productzh/view<?=$rowpro[id]?>.html" target="_blank"><img border="0" class="tp" src="<?=$protp?>" width="80" height="80" /></a></li>
 <li class="l2"><strong><?=$rowpro[tit]?></strong></li>
 <li class="l3">�ۼۣ�<strong class="feng"><?=$promoney?></strong></li>
 <li class="l4">�ѱ���ע<?=$rowpro[djl]?>�Σ�����<?=$rowpro[xsnum]?>�����״̬��<strong><?=returnztv($rowpro[zt])?></strong></li>
 </ul>
 </div>