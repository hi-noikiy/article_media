<? 
 $sj=date("Y-m-d H:i:s");
 $au="../productkf/view".returnproid($row[probh]).".html";
 $sqls1="select * from epzhu_user where id=".$row[selluserid];mysql_query("SET NAMES 'GBK'");$ress1=mysql_query($sqls1);$rows1=mysql_fetch_array($ress1);
 ?>
 
 <div class="orderv1">
  <ul class="u1">
  <li class="l1"><a href="<?=$au?>" target="_blank"><?=$row[tit]?></a></li>
  <li class="l2"><span>���:<?=$orderbh?></span></li>
  <li class="l3"><span class="s1">�������</span><span class="s2"><?=returnjgdian($row[money1]*$row[num]+$row[yunfei])?></span></li>
  <li class="l4"><span class="s1">��Ʒ����</span><span class="s2"><?=$row[num]?></span></li>
  <li class="l5"><span class="s1">����״̬</span><span class="s2"><?=returnorderzt($row[ddzt])?></span></li>
  <li class="l6"><span class="s1">���� [<strong><?=$rows1[nc]?></strong>]</span><? if(!empty($rows1[uqq])){?><a href="http://wpa.qq.com/msgrd?v=3&uin=<?=$rows1[uqq]?>&site=<?=weburl?>&menu=yes" class="s2" target="_blank"><?=$rows1[uqq]?></a><? }?><span class="s3"><?=$rows1[mot]?></span></li>
  </ul>
  
  <? if(!empty($ifztcontrol)){?>
  <!--״̬˵��B-->
  <div class="ztcontrol">
   <div class="d1"></div>
   <div class="d2">
   
    <? if($row[ddzt]=="wait"){?>
    <div class="ds1">�������յ����Ķ���������׼�������������ĵȴ��¡�</div>
    <div class="ds2"><strong>���ѣ�</strong>������ҳ�ʱ��δ�����������ԡ�<a href="orderclosekf.php?orderbh=<?=$orderbh?>">ȡ������</a>��������Ҳͦ�����ף������ԡ�<a href="http://wpa.qq.com/msgrd?v=3&uin=<?=$rows1[uqq]?>&site=<?=weburl?>&menu=yes" class="s2" target="_blank">�������Ҿ��췢��</a>����</div>
    <div class="ds3">
    <a href="http://wpa.qq.com/msgrd?v=3&uin=<?=$rows1[uqq]?>&site=<?=weburl?>&menu=yes" class="a1" target="_blank">�������Ҿ��췢��</a>
    <a href="orderclosekf.php?orderbh=<?=$orderbh?>" class="a0">ȡ������</a>
    </div>
    <? }?>
    
    <? if($row[ddzt]=="close"){?>
    <div class="ds1">���� <?=$row[closesj]?> ȡ���˸ñʶ�����</div>
    <div class="ds2"><strong>���ѣ�</strong>�������Ҫ����Ʒ�����<a href="<?=$au?>" target="_blank">�ٴι���</a>��</div>
    <? }?>
    
    <? if($row[ddzt]=="suc"){?>
    <div class="ds1">��ϲ�����ñʶ����Ѿ����׳ɹ���</div>
    <div class="ds2"><strong>���ѣ�</strong>�������Ҫ����Ʒ�����<a href="<?=$au?>" target="_blank">�ٴι���</a>��</div>
    <? if(panduan("orderbh,userid","epzhu_propjkf where orderbh='".$orderbh."' and userid=".$userid)==0){?>
    <div class="ds3"><a href="orderpjkf.php?orderbh=<?=$orderbh?>" class="a1">д����׬����</a></div>
    <? }?>
    <? }?>
    
    <? if($row[ddzt]=="backsuc"){?>
    <div class="ds1">������ <?=$row[tkoksj]?> ͬ���������˿����룬�����Ѿ��˻ص������˻��С�<br>����˵����<?=returnjgdw($row[tkjg],"","ͬ���˿�")?></div>
    <div class="ds2"><strong>���ѣ�</strong>�������Ҫ����Ʒ�����<a href="<?=$au?>" target="_blank">�ٴι���</a>��</div>
    <? }?>
    
    <? 
	if($row[ddzt]=="backerr"){
    while1("*","epzhu_dbkf where orderbh='".$orderbh."'");$row1=mysql_fetch_array($res1);
    $second=strtotime($row1[dboksj])-strtotime($sj);
    $day = floor($second/(3600*24));
    $second = $second%(3600*24);//��ȥ����֮��ʣ���ʱ��
    $hour = floor($second/3600);
    $second = $second%3600;//��ȥ��Сʱ֮��ʣ���ʱ�� 
    $minute = floor($second/60);
    $second = $second%60;//��ȥ������֮��ʣ���ʱ�� 
    $sjcv=$day."��".$hour."ʱ".$minute."��".$second."��";
    ?>
    <div class="ds1">������ <?=$row[tkoksj]?> �ܾ��������˿����롣<br>����˵����<?=returnjgdw($row[tkjg],"","ͬ���˿�")?></div>
    <div class="ds2"><strong>���ѣ�</strong>�����Ʒû�����⣬����Խ��С�<a href="shouhuokf.php?orderbh=<?=$orderbh?>">ȷ���ջ�</a>���������Ʒ�����⣬����ԡ�<a href="../help/aboutview4.html" target="_blank">����ͷ�����</a>��<br>������� <span class="red"><?=$sjcv?></span> �ڽ�����ز���������ϵͳ�Զ���ɸñʶ������ʽ����������˻�</div>
    <div class="ds3">
    <a href="shouhuokf.php?orderbh=<?=$orderbh?>" class="a1">ȷ���ջ�</a>
    <a href="orderjfkf.php?orderbh=<?=$orderbh?>" class="a0">����ͷ�����</a>
    </div>
    <? }?>
    
    <? 
	if($row[ddzt]=="back"){
    while1("*","epzhu_tkkf where orderbh='".$orderbh."'");$row1=mysql_fetch_array($res1);
    $second=strtotime($row1[tkoksj])-strtotime($sj);
    $day = floor($second/(3600*24));
    $second = $second%(3600*24);//��ȥ����֮��ʣ���ʱ��
    $hour = floor($second/3600);
    $second = $second%3600;//��ȥ��Сʱ֮��ʣ���ʱ�� 
    $minute = floor($second/60);
    $second = $second%60;//��ȥ������֮��ʣ���ʱ�� 
    $sjcv=$day."��".$hour."ʱ".$minute."��".$second."��";
    ?>
    <div class="ds1">�˿����봦���У�������Ҫ�� <?=$sjcv?> �ڴ�������˿����롣</div>
    <div class="ds2"><strong>���ѣ�</strong>�����Ʒ�������ҷ��涼�����⣬��Ҳ����Ҫ����Ʒ����ô�����<a href="orderqxtkkf.php?orderbh=<?=$orderbh?>">ȡ���˿�����</a>��<br>���� <?=$row[tksj]?> �������˿�<br>����˿����ɣ�<?=$row[tkly]?></div>
    <div class="ds3">
    <a href="orderqxtkkf.php?orderbh=<?=$orderbh?>" class="a1">ȡ���˿�����</a>
    </div>
    <? }?>
    
    <? 
	if($row[ddzt]=="db"){
    while1("*","epzhu_dbkf where orderbh='".$orderbh."'");$row1=mysql_fetch_array($res1);
    $second=strtotime($row1[dboksj])-strtotime($sj);
    $day = floor($second/(3600*24));
    $second = $second%(3600*24);//��ȥ����֮��ʣ���ʱ��
    $hour = floor($second/3600);
    $second = $second%3600;//��ȥ��Сʱ֮��ʣ���ʱ�� 
    $minute = floor($second/60);
    $second = $second%60;//��ȥ������֮��ʣ���ʱ�� 
    $sjcv=$day."��".$hour."ʱ".$minute."��".$second."��";
	?>
    <div class="ds1">�����ѷ������ȴ���ȷ���ջ����ʽ𵣱�ʣ��ʱ�䣺<?=$sjcv?></div>
    <div class="ds2"><strong>���ѣ�</strong>�����յ���Ʒ��ȷ��û����󣬿ɽ��С�<a href="shouhuokf.php?orderbh=<?=$orderbh?>">ȷ���ջ�</a>������ɴ˴ν���;�ڴ��ڼ��뾡��ע���ʽ𵣱�ʣ��ʱ�䣬���ٽ���ʱ��㣬��Ʒ��Ȼ��������������δ�輰ʱ��������ȡ�<a href="orderyckf.php?orderbh=<?=$orderbh?>">�ӳ�����ʱ��</a>����<a href="ordertkkf.php?orderbh=<?=$orderbh?>">�����˿�</a>�����ȴ��������������١�<a href="shouhuokf.php?orderbh=<?=$orderbh?>">ȷ���ջ�</a>����<a href="orderqxtkkf.php?orderbh=<?=$orderbh?>">ȡ���˿�</a>������������������ŵ���Է���������ʱ�����Զ���ɽ��ס��ʽ𵣱�ʱ������󣬿���Զ�ת�������˻���</div>
    <div class="ds3">
    <a href="shouhuokf.php?orderbh=<?=$orderbh?>" class="a1">ȷ���ջ�</a>
    <a href="orderyckf.php?orderbh=<?=$orderbh?>" class="a0">�ӳ�����ʱ��</a>
    <a href="ordertkkf.php?orderbh=<?=$orderbh?>" class="a0">�����˿�</a>
    <a href="orderqxtkkf.php?orderbh=<?=$orderbh?>" class="a0">ȡ���˿�</a>
    </div>
    <? }?>

    <? if($row[ddzt]=="jf"){?>
    <div class="ds1">���Ѿ�������ƽ̨�ͷ����봦������������ʽ𽫱����ᣬֱ��������ϡ��������ύ������������֤�ݡ�</div>
    <div class="ds3"><a href="orderjf1kf.php?orderbh=<?=$orderbh?>" class="a1">�ύ��֤��</a></div>
    <? }?>

    <? if($row[ddzt]=="jfbuy"){?>
    <div class="ds1">ƽ̨�Ѿ��ж����ν��׾���Ϊ���ʤ�ߣ������Ѿ��˻ص������˻���</div>
    <div class="ds3"><a href="orderjf1kf.php?orderbh=<?=$orderbh?>" class="a0">�鿴��ͨ��¼</a></div>
    <? }?>

    <? if($row[ddzt]=="jfsell"){?>
    <div class="ds1">ƽ̨�Ѿ��ж����ν��׾���Ϊ����ʤ�ߣ������Ѿ��Զ������������˻���</div>
    <div class="ds3"><a href="orderjf1kf.php?orderbh=<?=$orderbh?>" class="a0">�鿴��ͨ��¼</a></div>
    <? }?>
    
   </div>
  </div>
  <!--״̬˵��E-->
  <? }?>
  
  <ul class="u2">
  <li class="l1">�µ�ʱ��</li><li class="l2"><?=$row[sj]?></li>
  <li class="l1">ѡ���ײ�</li><li class="l2"><?=returnjgdw($row[tcv],"","��")?></li>
  </ul>
  <? if(!empty($row[liuyan])){?>
  <table class="table1" border="0" cellspacing="0" cellpadding="0">
  <tr>
  <td class="td1">��������</td>
  <td class="td2"><?=$row[liuyan]?></td>
  </tr>
  </table>
  <? }?>
  <? if(!empty($row[buyform])){?>
  <table class="table1" border="0" cellspacing="0" cellpadding="0">
  <tr>
  <td class="td1">������Ϣ</td>
  <td class="td2"><?=$row[buyform]?></td>
  </tr>
  </table>
  <? }?>
  <? if(!empty($row[shdz])){?>
  <table class="table1" border="0" cellspacing="0" cellpadding="0">
  <tr>
  <td class="td1">�ջ���ַ</td>
  <td class="td2"><?=$row[shdz]?></td>
  </tr>
  </table>
  <? }?>
  
  <? if($row[ddzt]=="db" || $row[ddzt]=="suc"){?>
  <table class="table1" border="0" cellspacing="0" cellpadding="0">
  <tr>
  <td class="td1">�ջ���Ϣ</td>
  <td class="td2">
  <? 
  while1("*","epzhu_prokf where bh='".$row[probh]."'");if($row1=mysql_fetch_array($res1)){
  $tcfhxs=0;
  if(!empty($row[tcid])){
   while2("*","epzhu_taocan where id=".$row[tcid]);if($row2=mysql_fetch_array($res2)){$tcfhxs=$row2[fhxs];}
  }
  ?>
 
  <? if(1==$row1[fhxs] && empty($tcfhxs)){?><strong class="blue">�ö�������Ʒ�������ֶ�����������ϵ����</strong><? }?>
  <? if(1==$tcfhxs){?><strong class="blue">�ö�������Ʒ�������ֶ�����������ϵ����</strong><? }?>
 
  <? if(2==$row1[fhxs] && empty($tcfhxs)){?>
  <strong>�ö�����Ʒͨ���������أ������������Ϣ���أ�</strong><br>
  <strong class="blue">���̵�ַ��<a href="<?=$row1[wpurl]?>" target="_blank"><?=$row1[wpurl]?></a><br>�������룺<?=$row1[wppwd]?><br>��ѹ���룺<?=$row1[wppwd1]?></strong>
  <? }?>
  <? if(2==$tcfhxs){?>
  <strong>�ö�����Ʒͨ���������أ������������Ϣ���أ�</strong><br>
  <strong class="blue">���̵�ַ��<a href="<?=$row2[wpurl]?>" target="_blank"><?=$row2[wpurl]?></a><br>�������룺<?=$row2[wppwd]?><br>��ѹ���룺<?=$row2[wppwd1]?></strong>
  <? }?>
 
  <? if(3==$row1[fhxs] && empty($tcfhxs)){?>
  <strong>�ö�������Ʒ�Ѿ���������������������ͼ���������</strong><br>
  <a href="../upload/<?=$row1[userid]?>/<?=$row1[bh]?>/<?=$row1[upf]?>" target="_blank"><img border="0" style="margin-top:5px;" src="img/down.jpg" /></a>
  <? }?>
  <? if(3==$tcfhxs){?>
  <strong>�ö�������Ʒ�Ѿ���������������������ͼ���������</strong><br>
  <a href="../upload/<?=$row1[userid]?>/<?=$row1[bh]?>/<?=$row2[upf]?>" target="_blank"><img border="0" style="margin-top:5px;" src="img/down.jpg" /></a>
  <? }?>
 
  <? if(4==$row1[fhxs] && empty($tcfhxs)){?>
  <strong>������������Ŀ�����Ϣ</strong><br>
  <?=$row[txt]?>
  <? }?>
  <? if(4==$tcfhxs){?>
  <strong>������������Ŀ�����Ϣ</strong><br>
  <?=$row[txt]?>
  <? }?>
 
  <? if(5==$row1[fhxs] && empty($tcfhxs)){?>
  <strong>���������Ŀ��������Ϣ��</strong><br>
  <? if(!empty($row[kdid])){while1("*","epzhu_kuaidi where id=".$row[kdid]);if($row1=mysql_fetch_array($res1)){?>
  ��ݹ�˾��<a href="<?=$row1[kdweb]?>" target="_blank" class="green"><?=$row1[tit]?></a><br>
  ��ݵ��ţ�<strong><?=$row[kddh]?></strong>
  <? }}?>
  <? }?>
  <? if(5==$tcfhxs){?>
  <strong>���������Ŀ��������Ϣ</strong><br>
  <? if(!empty($row[kdid])){while1("*","epzhu_kuaidi where id=".$row[kdid]);if($row1=mysql_fetch_array($res1)){?>
  ��ݹ�˾��<a href="<?=$row1[kdweb]?>" target="_blank" class="green"><?=$row1[tit]?></a><br>
  ��ݵ��ţ�<strong><?=$row[kddh]?></strong>
  <? }}?>
  <? }?>
 
  <? }else{?>
  <strong class="red">�ף��ܱ�Ǹ���޷��ṩ�ö����ķ�����Ϣ�����ѱ�����ɾ����������ϵ����</strong>
  <? }?>
  </td>
  </tr>
  </table>
  <? }?>

  
 </div>
 
  
