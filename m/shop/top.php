<?
checkdjl("c1",$uid,"epzhu_user");
$sucnum=returnjgdw($rowuser[xinyong],"",returnxy($uid,1));
?>
<div class="topbg">

<div class="indextop box">
 <div class="d1" onClick="javascript:history.go(-1);"><img src="../img/leftjian.png" height="21" /></div>
 <div class="d2" onClick="gourl('../search/main.php');"><span class="s1"><img src="../img/ser.png" height="17" /></span><span class="s2">�����������ؼ��ʣ�</span></div>
 <div class="d3"></div>
</div>

<div class="indextop1 box">
 <div class="d1"><a href="view<?=$uid?>.html"><img src="<?=returntppd("../../upload/".$rowuser[id]."/shop.jpg","../img/none70x70.gif")?>" width="40" height="40" /></a></div>
 <div class="d2"><?=$rowuser[shopname]?><br><img src="<?=weburl?>img/dj/<?=returnxytp($sucnum)?>" /></div>
 <div class="d3"><?=returncount("epzhu_pro where userid=".$rowuser[id]." and zt=0")?><br>������</div>
 <div class="d4"><?=$rowuser[djl]?><br>��ע��</div>
</div>

</div>

<div class="topmenu box">
<div class="d1">
 <a href="view<?=$uid?>.html" id="topmenu1">��ҳ</a>
 <a href="prolist_i<?=$uid?>v.html" id="topmenu2">ȫ������</a>
 <a href="typeview<?=$uid?>.html" id="topmenu3">����</a>
 <a href="aboutview<?=$uid?>.html" id="topmenu4">���̼��</a>
</div>
</div>