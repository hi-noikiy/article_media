<?
include("../config/conn.php");//二次开发联系QQ:120036745//二次开发联系QQ:120036745
include("../config/function.php");//二-次开-发-联-系Q-Q:12-00-3674-5
sesCheck();
$zt=$_GET[zt]; 

if($_GET[control]=="sd"){
 $userid=returnuserid($_SESSION[SHOPUSER]);
 while1("*","epzhu_ad where zt=1 and userid=".$userid." and id=".$_GET[id]);if(!$row1=mysql_fetch_array($res1)){php_toheader("adlxlist.php?zt=1");}
 PointUpdateM($userid,$row1[money1]);
 PointIntoM($userid,"撤消自助广告位".$row1[adbh],$row1[money1]);
 if($row1[type1]=="图片" || $row1[type1]=="动画"){
  delFile("../ad/".$row1[bh].".".$row1[jpggif]);
  delFile("../ad/".$row1[bh]."-99.".$row1[jpggif]);
 }
 deletetable("epzhu_ad where id=".$_GET[id]);
 php_toheader("adlxlist.php?zt=1&t=suc");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><div class="yjcode"><? adwhile("ADTOP");?></div>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>用户管理面板 - <?=webname?></title>
<link href="../css/basic.css" rel="stylesheet" type="text/css" />
<link href="css/index.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="js/index.js"></script>
<script language="javascript" src="../js/jquery.min.js"></script>
<script language="javascript" src="../js/layer.js"></script>
<script language="javascript" src="../js/layui.js"></script>
<script language="javascript" src="../js/common.js"></script>
<script language="javascript">
function addel(x){
 if(!confirm("确定要撤消吗？撤消后费用会自动退还至您的帐户内")){return false;}
 location.href="adlxlist.php?control=sd&zt=1&id="+x;
}
</script>
</head>
<body>
<? include("../tem/top.html");?>
<? include("../tem/userepzhucom.html");?>

<div class="bfb bfbuser">
<div class="yjcode">
<ul class="dqwz">
<li class="l1">您的位置：<a href="../" class="acy">首页</a> > <a href="./" class="acy">会员中心</a> > 我的广告位</li>
</ul>
<? $leftid=1;include("indexleftAd.php");?>

<!--RB-->
<div class="right">

 <? include("rcap14.php");?>
 <script language="javascript">
 <? if($zt==0){?>document.getElementById("rcap2").className="g_ac0_h g_bc0_h";<? }elseif($zt==1){?>document.getElementById("rcap3").className="g_ac0_h g_bc0_h";<? }?>
 </script>
 <? systs("恭喜您，操作成功!","adlxlist.php?zt=".$zt)?>

 <ul class="adlistcap">
 <li class="l1">广告编号</li>
 <li class="l2">广告标题</li>
 <li class="l3">广告形式</li>
 <li class="l4">广告状态</li>
 <li class="l5">操作</li>
 </ul>
 <?
 $ses=" where userid=".$luserid;
 if($zt==0){$ses=$ses." and zt=0";}
 elseif($zt==1){$ses=$ses." and zt=1";}
 $page=$_GET["page"];if($page==""){$page=1;}else{$page=intval($_GET["page"]);}
 pagef($ses,30,"epzhu_ad","order by sj desc");while($row=mysql_fetch_array($res)){
 autoAD($row[adbh]);
 ?>
 <ul class="adlist" onmouseover="this.className='adlist adlist1';" onmouseout="this.className='adlist';">
 <li class="l1"><?=$row[adbh]?></li>
 <li class="l2"><?=$row[tit]?></li>
 <li class="l3"><?=$row[type1]?></li>
 <li class="l4">
 <?
 if(0==$row[zt]){
  $str="<span class='blue'>展示中</span>";
  $str=$str."<br>戴止：".$row[dqsj];
  $astr="";
 }elseif(1==$row[zt]){
  $str="<span class='feng'>队列中</span>";
  if(0==$row[fflx]){$s="";}else{$s=" and xh=".$row[xh]."";}
  $pd=returncount("epzhu_ad where zt=1 and sj>'".$row[sj]."'".$s);
  $str=$str."<br><span class='green'>前面还有".$pd."人</span>";
  $astr="<br><a href=\"javascript:void(0);\" onclick=\"addel(".$row[id].")\">撤单</a>";
 }
 echo $str;
 ?>
 </li>
 <li class="l5">
 <a href="adlxLook.php?id=<?=$row[id]?>" target="_blank">预览</a><?=$astr?>
 </li>
 </ul>
 <? }?>

 <div class="npa">
 <?
 $nowurl="adlxlist.php";
 $nowwd="zt=".$zt;
 require("page.html");
 ?>
 </div>

</div> 
<!--RE-->

</div>
</div>
<div class="yizhanw"> <div class="yizhanw2"><? include("../tem/bottom.html");?></div> </div>
</body>
</html>