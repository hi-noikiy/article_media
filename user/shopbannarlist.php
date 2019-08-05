<?
include("../config/conn.php");//二次开发联系QQ:120036745//二次开发联系QQ:120036745
include("../config/function.php");//二-次开-发-联-系Q-Q:12-00-3674-5
sesCheck();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><div class="yjcode"><? adwhile("ADTOP");?></div>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>用户管理面板 - <?=webname?></title>
<link href="../css/basic.css" rel="stylesheet" type="text/css" />
<link href="css/index.css" rel="stylesheet" type="text/css" />
<link href="css/shop.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="js/index.js"></script>
<script language="javascript" src="../js/jquery.min.js"></script>
<script language="javascript" src="../js/layer.js"></script>
<script language="javascript">
function add1(){
layer.open({
  type: 2,
  area: ['622px', '400px'],
  title:["店铺轮播图片","text-align:left"],
  skin: 'layui-layer-rim', //加上边框
  content:['shopbannarlx.php', 'no'] 
});
}
function upd(x){
layer.open({
  type: 2,
  area: ['622px', '400px'],
  title:["店铺轮播图片","text-align:left"],
  skin: 'layui-layer-rim', //加上边框
  content:['shopbannar.php?bh='+x, 'no'] 
});
}
function glover(x){
 document.getElementById("gl"+x).style.display="";
}
function glout(x){
 document.getElementById("gl"+x).style.display="none";
}
function del(x){
document.getElementById("chk"+x).checked=true;
NcheckDEL(17,'epzhu_shopbannar');
}
</script>
</head>
<body>
<? include("../tem/top.html");?>
<? include("../tem/userepzhucom.html");?>

<div class="bfb bfbuser">
<div class="yjcode">
<ul class="dqwz">
<li class="l1">您的位置：<a href="../" class="acy">首页</a> > <a href="./" class="acy">会员中心</a> > 轮播图片</li>
</ul>
<? $leftid=1;include("left.php");?>
<!--RB-->
<div class="right">
 <? include("rcap4.php");?>
 <script language="javascript">
 document.getElementById("rcap5").className="g_ac0_h g_bc0_h";
 </script>

 <ul class="ksedi">
 <li class="l2">
 <a href="javascript:;" onclick="NcheckDEL(17,'epzhu_shopbannar')" class="a1">删除</a>
 <a href="javascript:;" onclick="add1()" class="a2">添加图片</a>
 </li>
 <li class="l3">
 </li>
 </ul>

 <ul class="shopbannarcap">
 <li class="l1"><input name="C2" type="checkbox" onclick="xuan()" /></li>
 <li class="l2">图片信息</li>
 <li class="l3">排序</li>
 <li class="l4">编辑时间</li>
 <li class="l5"></li>
 </ul>
 <? 
 while1("*","epzhu_shopbannar where userid=".$luserid." and zt=0 order by xh asc");while($row1=mysql_fetch_array($res1)){
 if(1==$row1[targ]){$ifn="当前窗口打开";}else{$ifn="新窗口打开";}
 $at="../upload/".$row1[userid]."/shopbannar_".$row1[bh].".jpg";
 ?>
 <ul class="shopbannarlist">
 <li class="l1"><input name="C1" type="checkbox" id="chk<?=$row1[id]?>" value="<?=$row1[bh]?>" /></li>
 <li class="l2">
 <a href="<?=$at?>" target="_blank"><img src="<?=$at?>" align="left" width="70" height="70" /></a>
 <a href="<?=$row1[aurl]?>" target="_blank">
 <strong><?=$row1[tit]?></strong><br><?=$row1[aurl]?><br><span class="green"><?=$ifn?></span>
 </a>
 </li>
 <li class="l3"><?=$row1[xh]?></li>
 <li class="l4"><?=$row1[sj]?></li>
 <li class="l5" onmouseover="glover(<?=$row1[id]?>)" onmouseout="glout(<?=$row1[id]?>)">
  <span class="s1">管理</span>
  <div class="gl" style="display:none;" id="gl<?=$row1[id]?>">
  <a href="javascript:void(0);" onclick="upd('<?=$row1[bh]?>')">修改信息</a>
  <a href="javascript:void(0);" onclick="del(<?=$row1[id]?>)">删除图片</a>
  </div>
 </li>
 </ul>
 <? }?>

</div> 
<!--RE-->

</div>
</div>
<div class="yizhanw"> <div class="yizhanw2"><? include("../tem/bottom.html");?></div> </div>
</body>
</html>