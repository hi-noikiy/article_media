<?
include("../config/conn.php");//二次开发联系QQ:120036745//二次开发联系QQ:120036745
include("../config/function.php");//二-次开-发-联-系Q-Q:12-00-3674-5
sesCheck();
if(empty($_SESSION[SAFEPWD])){Audit_alert("卡密信息操作需要先进行安全码验证!","safepwd.php");}
$bh=$_GET[bh];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><div class="yjcode"><? adwhile("ADTOP");?></div>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>用户管理面板 - <?=webname?></title>
<link href="../css/basic.css" rel="stylesheet" type="text/css" />
<link href="css/index.css" rel="stylesheet" type="text/css" />
<link href="css/product.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="js/index.js"></script>
<script language="javascript" src="../js/jquery.min.js"></script>
<script language="javascript" src="../js/layer.js"></script>
<script language="javascript" src="../js/layui.js"></script>
<script language="javascript" src="../js/common.js"></script>
<script language="javascript">
function ser(){
location.href="kclist.php?bh=<?=$bh?>&st1="+document.getElementById("st1").value+"&sd1="+document.getElementById("sd1").value;
}
function glover(x){
 document.getElementById("gl"+x).style.display="";
}
function glout(x){
 document.getElementById("gl"+x).style.display="none";
}
function del(x){
document.getElementById("chk"+x).checked=true;
NcheckDEL(5,'epzhu_kc');
}
</script>
</head>
<body>
<? include("../tem/top.html");?>
<? include("../tem/userepzhucom.html");?>

<div class="bfb bfbuser">
<div class="yjcode">
<ul class="dqwz">
<li class="l1">您的位置：<a href="../" class="acy">首页</a> > <a href="./" class="acy">会员中心</a> > 库存管理</li>
</ul>
<? $leftid=1;include("leftzh.php");?>

<!--RB-->
<div class="right">
 <? include("rcap10.php");?>
 <script language="javascript">
 document.getElementById("rcap1").className="g_ac0_h g_bc0_h";
 </script>

 <? while1("bh,userid,tit","epzhu_prozh where bh='".$bh."' and userid=".$luserid);if(!$row1=mysql_fetch_array($res1)){php_toheader("productlistzh.php");}?>
 <div class="upfile">
 <ul class="uk">
 <li class="l1">商品标题：</li>
 <li class="l21"><a href="productzh.php?bh=<?=$bh?>"><?=$row1[tit]?></a></li>
 <li class="l1">库存统计：</li>
 <li class="l21">
 已使用（<strong class="red"><?=returncount("epzhu_kc where userid=".$luserid." and probh='".$bh."' and ifok=1")?></strong>）&nbsp;&nbsp;&nbsp;&nbsp;
 未使用（<strong class="blue"><?=returncount("epzhu_kc where userid=".$luserid." and probh='".$bh."' and ifok=0")?></strong>）
 </li>
 </ul> 
 </div>

 <ul class="ksedi">
 <li class="l2">
 <a href="javascript:;" onclick="NcheckDEL(5,'epzhu_kc')" class="a1">删除</a>
 <a href="kc.php?bh=<?=$bh?>" class="a2">添加信息</a>
 </li>
 <li class="l3">
  <input type="button" onclick="ser()" value="查询" class="btn" />
  <select id="sd1">
  <option value="">全部</option>
  <option value="0"<? if($_GET[sd1]=="0"){?> selected="selected"<? }?>>未使用</option>
  <option value="1"<? if($_GET[sd1]=="1"){?> selected="selected"<? }?>>已使用</option>
  </select>
  <span class="s1">使用情况：</span>
  <input type="text" id="st1" value="<?=$_GET[st1]?>" class="inp1" />
  <span class="s1">关键词：</span>
 </li>
 </ul>

 <ul class="kamikccap">
 <li class="l1"><input name="C2" type="checkbox" onclick="xuan()" /></li>
 <li class="l2">排序</li>
 <li class="l3">卡号</li>
 <li class="l4">密码</li>
 <li class="l5">使用状况</li>
 <li class="l6">使用会员</li>
 <li class="l7">使用时间</li>
 <li class="l8">编辑</li>
 </ul>
  
 <?
 $ses=" where userid=".$luserid." and probh='".$bh."'";
 if($_GET[st1]!=""){$ses=$ses." and ka like '%".$_GET[st1]."%'";}
 if($_GET[sd1]!=""){$ses=$ses." and ifok=".$_GET[sd1];}
 $page=$_GET["page"];if($page==""){$page=1;}else{$page=intval($_GET["page"]);}
 pagef($ses,30,"epzhu_kc","order by id asc");while($row=mysql_fetch_array($res)){
 ?>
 <ul class="kamikclist">
 <li class="l1"><input name="C1" type="checkbox" id="chk<?=$row[id]?>" value="<?=$row[id]?>" /></li>
 <li class="l2"><?=$row[id]?></li>
 <li class="l3"><?=returntitdian($row[ka],35)?></li>
 <li class="l4"><?=returntitdian($row[mi],35)?></li>
 <li class="l5"><? if(1==$row[ifok]){?><span class="red">已使用</span><? }else{?><span class="blue">未使用</span><? }?></li>
 <li class="l6"><?=returnuser($row[userid1])?></li>
 <li class="l7"><?=$row[sj]?></li>
 <li class="l8" onmouseover="glover(<?=$row[id]?>)" onmouseout="glout(<?=$row[id]?>)">
  <span class="s1">管理</span>
  <div class="gl" style="display:none;" id="gl<?=$row[id]?>">
  <a href="kc.php?bh=<?=$bh?>&action=update&id=<?=$row[id]?>">编辑信息</a>
  <a href="javascript:;" onclick="del(<?=$row[id]?>)">删除卡密</a>
  </div>
 </li>
 </ul>
 <? }?>

 <div class="npa">
 <?
 $nowurl="kclist.php";
 $nowwd="bh=".$bh."&st1=".$_GET[st1]."&sd1=".$_GET[sd1];
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