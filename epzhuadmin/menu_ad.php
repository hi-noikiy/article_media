<div class="treebox">
 <div class="ksm">资讯管理</div>
 <ul class="menu">

 <li class="level1">
  <a href="javascript:void(0);" class="<? if($leftid==1){?>current <? }?>a1"><em></em>广告管理<i></i></a>
  <ul class="level2" style="display:<? if($leftid==1){?>block;<? }?>">
  <li><a href="adtype.php">广告管理</a></li>
  </ul>
 </li>

 <li class="level1">
  <a href="javascript:void(0);" class="<? if($leftid==2){?>current <? }?>a1"><em></em>帮助中心<i></i></a>
  <ul class="level2" style="display:<? if($leftid==2){?>block;<? }?>">
  <li><a href="helplist.php">帮助列表</a></li>
  <li><a href="helplx.php">添加帮助信息</a></li>
  </ul>
 </li>

 <li class="level1">
  <a href="javascript:void(0);" class="<? if($leftid==3){?>current <? }?>a1"><em></em>任务大厅<i></i></a>
  <ul class="level2" style="display:<? if($leftid==3){?>block;<? }?>">
  <li><a href="tasklist.php">单人任务</a></li>
  <li><a href="tasklist.php?zt=1"  class="red">审核单人任务</a></li>
  <li><a href="taskhflist.php">单人任务接手</a></li>
  <li><a href="tasklist1.php">多人任务</a></li>
  <li><a href="tasklist1.php?zt=105"  class="red">审核多人任务</a></li>
  <li><a href="taskhflist1.php">多人任务接手</a></li>
  </ul>
 </li>

 <li class="level1">
  <a href="javascript:void(0);" class="<? if($leftid==4){?>current <? }?>a1"><em></em>工单管理<i></i></a>
  <ul class="level2" style="display:<? if($leftid==4){?>block;<? }?>">
  <li><a href="gdlist.php">所有工单</a></li>
  <? for($i=1;$i<=4;$i++){?>
  <li><a href="gdlist.php?gdzt=<?=$i?>"><?=returngdzt($i)?></a></li>
  <? }?>
  </ul>
 </li>

 </ul>
</div>
<!--LEFT E-->
<? include("left.php");?>








