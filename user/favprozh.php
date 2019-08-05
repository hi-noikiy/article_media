<?
include("../config/conn.php");//二次开发联系QQ:120036745//二次开发联系QQ:120036745
include("../config/functionzh.php");
sesCheck();
$userid=returnuserid($_SESSION[SHOPUSER]);
$sj=date("Y-m-d H:i:s");
if($_GET[control]=="del"){
deletetable("epzhu_profav where userid=".$userid." and id=".$_GET[id]);
php_toheader("favprozh.php");
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
</head>
<body>
<? include("../tem/top.html");?>
<? include("../tem/userepzhucom.html");?>

<div class="bfb bfbuser">
<div class="yjcode">
<ul class="dqwz">
<li class="l1">您的位置：<a href="../" class="acy">首页</a> > <a href="./" class="acy">会员中心</a> > 我收藏的商品</li>
</ul>
<? $leftid=2;include("leftzh.php");?>

<!--RB-->
<div class="right">
 <? include("rcap7.php");?>
 <script language="javascript">
 document.getElementById("rcap1").className="g_ac0_h g_bc0_h";
 </script>
 
 <!--店铺收藏B-->
 <div class="favpro">
 <ul class="u1">
 <?
 if($_GET[page]!=""){$page=$_GET[page];}else{$page=1;}
 pagef(" where userid=".$userid,10,"epzhu_profav","order by sj desc");while($row=mysql_fetch_array($res)){
 while1("*","epzhu_prozh where bh='".$row[probh]."' order by lastsj desc limit 5");$row1=mysql_fetch_array($res1);
 ?>
 <li class="l1"><a href="../product/view<?=$row1[id]?>.html" target="_blank"><img border="0" src="../<?=returntp("bh='".$row1[bh]."' order by iffm desc limit 1","-2")?>" width="120" height="120" /><br><?=returntitdian($row1[tit],50)?></a><br><strong class="feng">￥<?=returnjgdian(returnyhmoney($row1[yhxs],$row1[money2],$row1[money3],$sj,$row1[yhsj1],$row1[yhsj2],$row1[id]))?></strong><br>[<a href="favprozh.php?id=<?=$row[id]?>&control=del">移除</a>]</li>
 <? }?>
 </ul>
 </div>
 <?
 $nowurl="favfav.php";
 $nowwd="";
 include("page.html");
 ?>
 <!--店铺收藏E-->

</div> 
<!--RE-->

</div>
</div>
<div class="yizhanw"> <div class="yizhanw2"><? include("../tem/bottom.html");?></div> </div>
</body>
</html>