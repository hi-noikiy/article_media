<?
include("../config/conn.php");//����-����-��ϵQQ:1200-36745//��-�ο�-��-��-ϵQQ:12-00-36-745
include("../config/function.php");
include("../config/xy.php");
$sj=date("Y-m-d H:i:s");
$myweb=$_GET[str];
if(empty($myweb)){$uid=$_GET[id];$ses="id=".$uid."";}else{$ses="myweb='".$myweb."'";}
$sqluser="select * from epzhu_user where zt=1 and shopzt=2 and ".$ses;mysql_query("SET NAMES 'GBK'");$resuser=mysql_query($sqluser);
if(!$rowuser=mysql_fetch_array($resuser)){php_toheader("./");}
$uid=$rowuser[id];
?>
<html>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?=$rowuser[shopname]?>�����ϵ��� - <?=webname?></title>
<link href="<?=weburl?>css/basic.css" rel="stylesheet" type="text/css" />
<link href="<?=weburl?>shop/shop.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="<?=weburl?>js/basic.js"></script>
<script language="javascript" src="<?=weburl?>shop/index.js"></script>
<script language="javascript" src="<?=weburl?>js/jquery.min.js"></script>
<script language="javascript" src="<?=weburl?>js/layer.js"></script>
</head>
<body>
<? include("top.php");?>
<script language="javascript">
document.getElementById("shopmenu1").className="a1";
</script>

<div class="bfb bfbshop">
<div class="yjcode">

 <!--��B-->
 <? include("left.php");?>
 <!--��E-->
 
 <!--��B-->
 <div class="iright">
 
  <div class="rcap">
   <div class="d1">��������</div>
   <div class="d2"><a href="<?=weburl?>shop/aboutview<?=$rowuser[id]?>.html">More>></a></div>
  </div>
  <div class="gywm">
  <?=returnjgdw($rowuser[seodes],"","��һ������ûд˵��")?>
  </div>
 
  <div class="rcap">
   <div class="d1">������Ŀ</div>
   <div class="d2"><a href="<?=weburl?>shop/prolist_i<?=$rowuser[id]?>v.html">More>></a></div>
  </div>
  <div class="fwxm">
  <? 
  while1("*","epzhu_protype where zt=0 and admin=1 and userid=".$uid." order by xh asc");while($row1=mysql_fetch_array($res1)){
  ?>
  <a href="<?=weburl?>shop/prolist_i<?=$rowuser[id]?>v_j<?=$row1[id]?>v.html"><?=$row1[name1]?></a>
  <? }?>
  </div>
 
  <div class="rcap">
   <div class="d1">���½���</div>
  </div>
  <div class="newjy">
  <span class="icon"></span>
   <ul id="rolltxt">
   <? $i=0;while1("*","epzhu_order where (ddzt='wait' or ddzt='db' or ddzt='suc') and selluserid=".$uid." order by sj desc limit 20");while($row1=mysql_fetch_array($res1)){?>
   <li><?=returnnc($row1[userid])?> ������ <span class="s1"><?=returntitdian($row1[tit],90)?></span> ���ۣ�<span class="s2">��<?=$row1[money1]?></span> [<?=returnorderzt($row1[ddzt])?>] </li>
   <? $i++;}?>
   </ul>
  </div>
  <span id="jynum" style="display:none;"><?=$i?></span>
  <script language="javascript" src="<?=weburl?>shop/jy.js"> </script>
 
  <div class="rcap">
   <div class="d1">�����ϼ�</div>
   <div class="d2"><a href="<?=weburl?>shop/prolist_i<?=$rowuser[id]?>v.html">More>></a></div>
  </div>
  <div class="plist">
  <? 
  while1("*","epzhu_pro where userid=".$uid." and zt=0 and ifxj=0 order by lastsj desc limit 8");while($row1=mysql_fetch_array($res1)){
  $au="../product/view".$row1[id].".html";
  $tp="../".returntp("bh='".$row1[bh]."' order by iffm desc","-2");
  ?>
  <ul class="u2">
  <li class="l1"><a href="<?=$au?>" target="_blank"><img border="0" title="<?=$row1[tit]?>"  src="<?=returntppd($tp,"../img/none180x180.gif")?>" width="180" height="180" /></a></li>
  <li class="l2"><strong>��<?=returnjgdian(returnyhmoney($row1[yhxs],$row1[money2],$row1[money3],$sj,$row1[yhsj1],$row1[yhsj2],$row1[id]))?></strong></li>
  <li class="l3"><a href="<?=$au?>" target="_blank" title="<?=$row1[tit]?>"><?=strgb2312($row1[tit],0,50)?></a></li>
  <li class="l4">�ɽ���<?=$row1[xsnum]?>��</li>
  <li class="l5"><a href="<?=$au?>" target="_blank">��������</a></li>
  </ul>
  <? }?>
  </div>
  
  <div class="rcap">
   <div class="d1">�ͻ�����</div>
   <div class="d2"><a href="<?=weburl?>shop/pjlist_i<?=$rowuser[id]?>v.html">More>></a></div>
  </div>
  <?
  $a1=returncount("epzhu_propj where selluserid=".$uid." and pf1=1")+returncount("epzhu_propj where selluserid=".$uid." and pf2=1")+returncount("epzhu_propj where selluserid=".$uid." and pf3=1");
  $a2=returncount("epzhu_propj where selluserid=".$uid." and pf1=2")+returncount("epzhu_propj where selluserid=".$uid." and pf2=2")+returncount("epzhu_propj where selluserid=".$uid." and pf3=2");
  $a3=returncount("epzhu_propj where selluserid=".$uid." and pf1=3")+returncount("epzhu_propj where selluserid=".$uid." and pf2=3")+returncount("epzhu_propj where selluserid=".$uid." and pf3=3");
  $a4=returncount("epzhu_propj where selluserid=".$uid." and pf1=4")+returncount("epzhu_propj where selluserid=".$uid." and pf2=4")+returncount("epzhu_propj where selluserid=".$uid." and pf3=4");
  $a5=returncount("epzhu_propj where selluserid=".$uid." and pf1=5")+returncount("epzhu_propj where selluserid=".$uid." and pf2=5")+returncount("epzhu_propj where selluserid=".$uid." and pf3=5");
  $al=$a1+$a2+$a3+$a4+$a5;
  if($al==0){$a1v=0;$a2v=0;$a3v=0;$a4v=0;$a5v=0;}
  else{
  $a1v=sprintf("%.1f",$a1/$al*100);
  $a2v=sprintf("%.1f",$a2/$al*100);
  $a3v=sprintf("%.1f",$a3/$al*100);
  $a4v=sprintf("%.1f",$a4/$al*100);
  $a5v=sprintf("%.1f",$a5/$al*100);
  }
  $hp=returncount("epzhu_propj where selluserid=".$uid." and pjlx=1");
  $pa=returncount("epzhu_propj where selluserid=".$uid."");
  if($pa==0){$av="100";}else{$av=sprintf("%.2f",$hp/$pa*100);}
  ?>
  <ul class="pjcap">
  <li class="l1"><span>������</span><strong><?=$av?>%</strong></li>
  <li class="l1"><span>�ۺϵ÷�</span><strong><?=round(($mspf+$fhpf+$shpf)/3,2)?></strong></li>
  <li class="l2">���������<span><?=$mspf?></span>��<br>�����ٶȣ�<span><?=$fhpf?></span>��<br>����̬�ȣ�<span><?=$shpf?></span>��</li>
  </ul>
  <div class="pjcap1">
  <ul class="u1">
  <li class="l1"><span class="s0"><img src="<?=weburl?>shop/img/pjf1.gif" /></span><span class="s1"><strong>1</strong>��</span><span class="s2" style="width:<?=returnjgdw($a1v*1.2,"",1)?>px"></span><span class="s3"><?=$a1v?>%</span></li>
  <li class="l1"><span class="s0"><img src="<?=weburl?>shop/img/pjf2.gif" /></span><span class="s1"><strong>2</strong>��</span><span class="s2" style="width:<?=returnjgdw($a2v*1.2,"",1)?>px"></span><span class="s3"><?=$a2v?>%</span></li>
  <li class="l1"><span class="s0"><img src="<?=weburl?>shop/img/pjf3.gif" /></span><span class="s1"><strong>3</strong>��</span><span class="s2" style="width:<?=returnjgdw($a3v*1.2,"",1)?>px"></span><span class="s3"><?=$a3v?>%</span></li>
  <li class="l1"><span class="s0"><img src="<?=weburl?>shop/img/pjf4.gif" /></span><span class="s1"><strong>4</strong>��</span><span class="s2" style="width:<?=returnjgdw($a4v*1.2,"",1)?>px"></span><span class="s3"><?=$a4v?>%</span></li>
  <li class="l1"><span class="s0"><img src="<?=weburl?>shop/img/pjf5.gif" /></span><span class="s1"><strong>5</strong>��</span><span class="s2" style="width:<?=returnjgdw($a5v*1.2,"",1)?>px"></span><span class="s3"><?=$a5v?>%</span></li>
  </ul>
  </div>
  <? 
  while1("*","epzhu_propj where selluserid=".$uid." order by sj desc limit 10");while($row1=mysql_fetch_array($res1)){
  $usertx="../upload/".$row1[userid]."/user.jpg";
  if(!is_file($usertx)){$usertx="../user/img/nonetx.gif";}else{$usertx=$usertx."?id=".rnd_num(1000);}
  $pjlx=returnjgdw($row1[pjlx],"",1);
  if($pjlx==1){$pj="����";}
  elseif($pjlx==2){$pj="һ��";}
  elseif($pjlx==3){$pj="����";}
  ?>
  <div class="pj pj<?=$pjlx?>">
   <ul class="u1"><li class="l1"><img src="../user/img/nonetx.gif" width="50" height="50" /></li><li class="l2"><?=returnnc($row1[userid])?></li></ul>
   <ul class="u2">
   <li class="l1">
   <?=strip_tags($row1[txt])?><br>
   <? 
   if(1==$row1[iftp]){
   while2("*","epzhu_tp where bh='".$row1[orderbh]."' order by xh asc");while($row2=mysql_fetch_array($res2)){$tp="../".str_replace(".","-1.",$row2[tp]);
   ?>
   <a href="../<?=$row2[tp]?>" target="_blank"><img src="<?=$tp?>" width="50" height="50" /></a>&nbsp;&nbsp;
   <? }}?>
   </li>
   <li class="l3"><?=$row1[sj]?></li>
   </ul>
   <div class="d2"><span class="s<?=$pjlx?>"><?=$pj?></span></div>
  </div>
  <? }?>
  
 </div>
 <!--��E-->

</div>
</div>
<div class="yizhanw"> <div class="yizhanw2"><? include("../tem/bottom.html");?></div> </div>
</body>
</html>