 <? 
 $au="../product/view".returnproid($row[probh]).".html";
 ?>
 <div class="orderm box"><div class="d1">��Ʒ��Ϣ<span class="s1"></span></div><div class="d2"><a href="<?=$au?>"><?=$row[tit]?></a></div></div>
 <div class="orderm box"><div class="d1">����״̬<span class="s1"></span></div><div class="d2"><?=returnorderzt($row[ddzt])?></div></div>
 <div class="orderm box"><div class="d1">�������<span class="s1"></span></div><div class="d2"><?=$orderbh?></div></div>
 <div class="orderm box"><div class="d1">�µ�ʱ��<span class="s1"></span></div><div class="d2"><?=$row[sj]?></div></div>
 <div class="orderm box"><div class="d1">�����ܶ�<span class="s1"></span></div><div class="d2 feng">��<?=returnjgdian($row[money1]*$row[num]+$row[yunfei])?><? if(!empty($row[yunfei])){?>(���˷�<?=$row[yunfei]?>Ԫ)<? }?></div></div>
 <div class="orderm box"><div class="d1">��������<span class="s1"></span></div><div class="d2"><?=$row[num]?></div></div>
 <div class="orderm box"><div class="d1">ѡ���ײ�<span class="s1"></span></div><div class="d2"><?=$row[tcv]?></div></div>
 <? if(!empty($row[liuyan])){?>
 <div class="orderm box"><div class="d1">�������<span class="s1"></span></div><div class="d2"><?=$row[liuyan]?></div></div>
 <? }?>
 <? if(!empty($row[buyform])){?>
 <div class="orderm box"><div class="d1">������Ϣ<span class="s1"></span></div><div class="d2"><?=$row[buyform]?></div></div>
 <? }?>
 <? if(!empty($row[shdz])){?>
 <div class="orderm box"><div class="d1">�ջ���ַ<span class="s1"></span></div><div class="d2"><?=$row[shdz]?></div></div>
 <? }?>
  
 <? if($row[ddzt]=="db" || $row[ddzt]=="suc"){?>
 <div class="orderm box">
 <div class="d1">�ջ���Ϣ<span class="s1"></span></div>
 <div class="d2">
 <? 
 while1("*","epzhu_pro where bh='".$row[probh]."'");if($row1=mysql_fetch_array($res1)){
 $tcfhxs=0;
 if(!empty($row[tcid])){
  while2("*","epzhu_taocan where id=".$row[tcid]);if($row2=mysql_fetch_array($res2)){$tcfhxs=$row2[fhxs];}
 }
 ?>
 
  <? if(1==$row1[fhxs] && empty($tcfhxs)){?><strong class="blue">�ö�������Ʒ�������ֶ�����������ϵ����</strong><? }?>
  <? if(1==$tcfhxs){?><strong class="blue">�ö�������Ʒ�������ֶ�����������ϵ����</strong><? }?>
 
  <? if(2==$row1[fhxs] && empty($tcfhxs)){?>
  <strong>�ö�����Ʒͨ���������أ�</strong><br>
  <strong class="blue">���̵�ַ��<?=$row1[wpurl]?><br>�������룺<?=$row1[wppwd]?></strong>
  <? }?>
  <? if(2==$tcfhxs){?>
  <strong>�ö�����Ʒͨ���������أ�</strong><br>
  <strong class="blue">���̵�ַ��<?=$row2[wpurl]?><br>�������룺<?=$row2[wppwd]?></strong>
  <? }?>
 
  <? if(3==$row1[fhxs] && empty($tcfhxs)){?>
  <strong>�ö�������Ʒ�Ѿ�������������</strong><br>
  <a href="../../upload/<?=$row1[userid]?>/<?=$row1[bh]?>/<?=$row1[upf]?>" target="_blank"><img border="0" style="margin-top:5px;" src="../../user/img/down.jpg" /></a>
  <? }?>
  <? if(3==$tcfhxs){?>
  <strong>�ö�������Ʒ�Ѿ�������������</strong><br>
  <a href="../../upload/<?=$row1[userid]?>/<?=$row1[bh]?>/<?=$row2[upf]?>" target="_blank"><img border="0" style="margin-top:5px;" src="../../user/img/down.jpg" /></a>
  <? }?>
 
  <? if(4==$row1[fhxs] && empty($tcfhxs)){?>
  <strong>������Ϣ</strong><br>
  <?=$row[txt]?>
  <? }?>
  <? if(4==$tcfhxs){?>
  <strong>������Ϣ</strong><br>
  <?=$row[txt]?>
  <? }?>
 
 <? if(5==$row[fhxs]){?>
 <strong>�����Ϣ��</strong><br>
 <? if(!empty($row[kdid])){while1("*","epzhu_kuaidi where id=".$row[kdid]);if($row1=mysql_fetch_array($res1)){?>
 ��ݹ�˾��<a href="<?=$row1[kdweb]?>" target="_blank" class="green"><?=$row1[tit]?></a><br>
 ��ݵ��ţ�<strong><?=$row[kddh]?></strong>
 <? }}?>
 <? }?>


 
 <? }else{?>
 <strong class="red">�ܱ�Ǹ���޷��ṩ�ö����ķ�����Ϣ</strong>
 <? }?>
 </div>
 </div>
 <? }?>
 
 <? if($row[ddzt]=="backerr"){?>
 <div class="orderm box"><div class="d1">�˿�����<span class="s1"></span></div><div class="d2">����� <?=$row[tksj]?> �������˿�<br>�˿����ɣ�<?=$row[tkly]?></div></div>
 <div class="orderm box"><div class="d1">�˿�ظ�<span class="s1"></span></div><div class="d2">���� <?=$row[tkoksj]?> �ܾ��˱����˿�����<br>ԭ��<?=$row[tkjg]?></div></div>
 
 <? }elseif($row[ddzt]=="backsuc"){?>
 <div class="orderm box"><div class="d1">�˿�����<span class="s1"></span></div><div class="d2">����� <?=$row[tksj]?> �������˿�<br>�˿����ɣ�<?=$row[tkly]?></div></div>
 <div class="orderm box"><div class="d1">�˿�ظ�<span class="s1"></span></div><div class="d2">���� <?=$row[tkoksj]?> ͬ���˱����˿�����<br>�ظ���<?=$row[tkjg]?></div></div>
 
 <? }?>
 
<div class="orderm box"><div class="d1">����ǳ�<span class="s1"></span></div><div class="d2"><?=returnnc($row[userid])?></div></div>
<? $mqq=returnqq($row[userid]);if(!empty($mqq)){?>
<div class="orderm box"><div class="d1">���QQ<span class="s1"></span></div><div class="d2"><a href="http://wpa.qq.com/msgrd?v=3&uin=<?=$mqq?>&site=<?=weburl?>&menu=yes" target="_blank"><?=$mqq?> [�����ϵ]</a></div></div>
<? }?>