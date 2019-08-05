<?
include("../config/conn.php");//二次开发联系QQ:120036745//二次开发联系QQ:120036745
include("../config/functionkf.php");
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
<script language="javascript" src="../js/layui.js"></script>
<script language="javascript" src="../js/common.js"></script>
<script language="javascript">
function addty1(){
layer.open({
  type: 2,
  area: ['322px', '190px'],
  title:["商品分组","text-align:left"],
  skin: 'layui-layer-rim', //加上边框
  content:['protype1lxkf.php', 'no'] 
});
}
function addty2(x){
layer.open({
  type: 2,
  area: ['322px', '230px'],
  title:["商品分组","text-align:left"],
  skin: 'layui-layer-rim', //加上边框
  content:['protype2lxkf.php?ty1id='+x, 'no'] 
});
}
function updty1(x){
layer.open({
  type: 2,
  area: ['322px', '190px'],
  title:["商品分组","text-align:left"],
  skin: 'layui-layer-rim', //加上边框
  content:['protype1kf.php?bh='+x, 'no'] 
});
}
function updty2(x){
layer.open({
  type: 2,
  area: ['322px', '230px'],
  title:["商品分组","text-align:left"],
  skin: 'layui-layer-rim', //加上边框
  content:['protype2kf.php?bh='+x, 'no'] 
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
NcheckDEL(15,'epzhu_protype');
}
</script>
</head>
<body>
<? include("../tem/top.html");?>
<? include("../tem/userepzhucom.html");?>

<div class="bfb bfbuser">
<div class="yjcode">
<ul class="dqwz">
<li class="l1">您的位置：<a href="../" class="acy">首页</a> > <a href="./" class="acy">会员中心</a> > 商品分类</li>
</ul>
<? $leftid=1;include("leftkf.php");?>
<!--RB-->
<div class="right">
 <? include("rcap4.php");?>
 <script language="javascript">
 document.getElementById("rcap3").className="g_ac0_h g_bc0_h";
 </script>

 <ul class="ksedi">
 <li class="l2">
 <a href="javascript:;" onclick="NcheckDEL(15,'epzhu_protype')" class="a1">删除</a>
 <a href="javascript:;" onclick="addty1()" class="a2">添加分组</a>
 </li>
 <li class="l3">
 </li>
 </ul>

 <ul class="protypecap">
 <li class="l1"><input name="C2" type="checkbox" onclick="xuan()" /></li>
 <li class="l2">分类名称</li>
 <li class="l3">排序</li>
 <li class="l4">编辑时间</li>
 <li class="l5"></li>
 </ul>
 <? while1("*","epzhu_protype where userid=".$luserid." and admin=1 and zt=0 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
 <ul class="protypelist">
 <li class="l1"><input name="C1" type="checkbox" id="chk<?=$row1[id]?>" value="<?=$row1[id]?>xcf0" /></li>
 <li class="l2"><?=$row1[name1]?></li>
 <li class="l3"><?=$row1[xh]?></li>
 <li class="l4"><?=$row1[sj]?></li>
 <li class="l5" onmouseover="glover(<?=$row1[id]?>)" onmouseout="glout(<?=$row1[id]?>)">
  <span class="s1">管理</span>
  <div class="gl" style="display:none;" id="gl<?=$row1[id]?>">
  <a href="javascript:void(0);" onclick="updty1('<?=$row1[bh]?>')">修改信息</a>
  <a href="javascript:void(0);" onclick="addty2(<?=$row1[id]?>)">添加子类</a>
  <a href="javascript:void(0);" onclick="del(<?=$row1[id]?>)">删除类别</a>
  </div>
 </li>
 </ul>
 <? while2("*","epzhu_protype where userid=".$luserid." and admin=2 and zt=0 and name1='".$row1[name1]."' order by xh asc");while($row2=mysql_fetch_array($res2)){?>
 <ul class="protypelist2">
 <li class="l1"><input name="C1" type="checkbox" id="chk<?=$row2[id]?>" value="0xcf<?=$row2[id]?>" /></li>
 <li class="l2"><?=$row2[name2]?></li>
 <li class="l3"><?=$row2[xh]?></li>
 <li class="l4"><?=$row2[sj]?></li>
 <li class="l5" onmouseover="glover(<?=$row2[id]?>)" onmouseout="glout(<?=$row2[id]?>)">
  <span class="s1">管理</span>
  <div class="gl" style="display:none;" id="gl<?=$row2[id]?>">
  <a href="javascript:void(0);" onclick="updty2('<?=$row2[bh]?>')">修改信息</a>
  <a href="javascript:void(0);" onclick="del(<?=$row2[id]?>)">删除类别</a>
  </div>
 </li>
 </ul>
 <? }?>
 <? }?>

</div> 
<!--RE-->

</div>
</div>
<div class="yizhanw"> <div class="yizhanw2"><? include("../tem/bottom.html");?></div> </div>
</body>
</html>