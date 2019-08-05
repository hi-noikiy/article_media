<div class="treebox">
 <div class="ksm">资讯管理</div>
 <ul class="menu">

 <li class="level1">
  <a href="javascript:void(0);" class="<? if($leftid==1){?>current <? }?>a1"><em></em>会员管理<i></i></a>
  <ul class="level2" style="display:<? if($leftid==1){?>block;<? }?>">
  <li><a href="userlist.php">所有会员</a></li>
  <li><a href="userlist.php?shopzt=1" class="red">审核审核的开店申请</a></li>
  <li><a href="userlist.php?rz=xy" class="red">审核审核的实名认证</a></li>
  <li><a href="userlist.php?shopzt=2">正常开店</a></li>
  </ul>
 </li>

 <li class="level1">
  <a href="javascript:void(0);" class="<? if($leftid==2){?>current <? }?>a1"><em></em>会员资金管理<i></i></a>
  <ul class="level2" style="display:<? if($leftid==2){?>block;<? }?>">
  <li><a href="moneylist.php">详情资金清单</a></li>
  </ul>
 </li>

 <li class="level1">
  <a href="javascript:void(0);" class="<? if($leftid==3){?>current <? }?>a1"><em></em>会员保证金管理<i></i></a>
  <ul class="level2" style="display:<? if($leftid==3){?>block;<? }?>">
  <li><a href="baomoneylist.php">保证金记录</a></li>
  <li><a href="baomoneylist.php?zt=1" class="red">解冻申请</a></li>
  </ul>
 </li>

 <li class="level1">
  <a href="javascript:void(0);" class="<? if($leftid==4){?>current <? }?>a1"><em></em>人工对账管理<i></i></a>
  <ul class="level2" style="display:<? if($leftid==4){?>block;<? }?>">
  <li><a href="renglist.php">所有对账信息</a></li>
  <li><a href="renglist.php?zt=1" class="red">需要处理的对账</a></li>
  <li><a href="renglist.php?zt=2">对账成功的记录</a></li>
  </ul>
 </li>

 <li class="level1">
  <a href="javascript:void(0);" class="<? if($leftid==5){?>current <? }?>a1"><em></em>会员提现<i></i></a>
  <ul class="level2" style="display:<? if($leftid==5){?>block;<? }?>">
  <li><a href="txlist.php">所有提现信息</a></li>
  <li><a href="txlist.php?zt=4">需要处理的提现</a></li>
  </ul>
 </li>

 <li class="level1">
  <a href="javascript:void(0);" class="<? if($leftid==6){?>current <? }?>a1"><em></em>管理员信息<i></i></a>
  <ul class="level2" style="display:<? if($leftid==6){?>block;<? }?>">
  <li><a href="adminlist.php">管理员列表</a></li>
  <li><a href="admin.php">新增管理员</a></li>
  </ul>
 </li>

 </ul>
</div>
<!--LEFT E-->
<? include("left.php");?>
