<div class="treebox">
 <div class="ksm">��Ѷ����</div>
 <ul class="menu">

 <li class="level1">
  <a href="javascript:void(0);" class="<? if($leftid==1){?>current <? }?>a1"><em></em>������<i></i></a>
  <ul class="level2" style="display:<? if($leftid==1){?>block;<? }?>">
  <li><a href="adtype.php">������</a></li>
  </ul>
 </li>

 <li class="level1">
  <a href="javascript:void(0);" class="<? if($leftid==2){?>current <? }?>a1"><em></em>��������<i></i></a>
  <ul class="level2" style="display:<? if($leftid==2){?>block;<? }?>">
  <li><a href="helplist.php">�����б�</a></li>
  <li><a href="helplx.php">��Ӱ�����Ϣ</a></li>
  </ul>
 </li>

 <li class="level1">
  <a href="javascript:void(0);" class="<? if($leftid==3){?>current <? }?>a1"><em></em>�������<i></i></a>
  <ul class="level2" style="display:<? if($leftid==3){?>block;<? }?>">
  <li><a href="tasklist.php">��������</a></li>
  <li><a href="tasklist.php?zt=1"  class="red">��˵�������</a></li>
  <li><a href="taskhflist.php">�����������</a></li>
  <li><a href="tasklist1.php">��������</a></li>
  <li><a href="tasklist1.php?zt=105"  class="red">��˶�������</a></li>
  <li><a href="taskhflist1.php">�����������</a></li>
  </ul>
 </li>

 <li class="level1">
  <a href="javascript:void(0);" class="<? if($leftid==4){?>current <? }?>a1"><em></em>��������<i></i></a>
  <ul class="level2" style="display:<? if($leftid==4){?>block;<? }?>">
  <li><a href="gdlist.php">���й���</a></li>
  <? for($i=1;$i<=4;$i++){?>
  <li><a href="gdlist.php?gdzt=<?=$i?>"><?=returngdzt($i)?></a></li>
  <? }?>
  </ul>
 </li>

 </ul>
</div>
<!--LEFT E-->
<? include("left.php");?>








