<?php
include("../config/conn.php");//二次开发联系QQ:120036745//二次开发联系QQ:12-0036-745
include("../config/function.php");
AdminSes_audit();
$bh=$_GET[bh];
$ses=" where zt<>99 and probh='".$bh."'";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?=webname?>管理系统</title>
<link href="css/basic.css" rel="stylesheet" type="text/css" />
<link href="css/product.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script language="javascript" src="js/basic.js"></script>
<script language="javascript" src="js/layer.js"></script>
</head>
<body>
<? include("top.php");?>
<script language="javascript">
document.getElementById("menu3").className="a1";
</script>
<? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0102,")){echo "<div class='noneqx'>无权限</div>";exit;}?>

<div class="yjcode">
 <? $leftid=1;include("menu_product.php");?>

<div class="right">

 <? include("rightcap4.php");?>
 <script language="javascript">document.getElementById("rtit2").className="a1";</script>

 <!--B-->
 <ul class="ksedi">
 <li class="l2">
 <a href="javascript:void(0)" onclick="checkDEL(40,'fcw_xqvideo')" class="a2">变更审核</a>
 <a href="javascript:void(0)" onclick="checkDEL(41,'fcw_xqvideo')" class="a2">删除</a>
 <a href="provideolx.php?bh=<?=$bh?>" class="a1">发布视频</a>
 </li>
 </ul>
 <ul class="provcap">
 <li class="l1"><input name="C2" type="checkbox" onclick="xuan()" /></li>
 <li class="l2">商品视频信息</li>
 <li class="l3">审核</li>
 <li class="l4">关注</li>
 <li class="l5">时间</li>
 <li class="l6">操作</li>
 </ul>
 <?
 pagef($ses,20,"epzhu_provideo","order by sj desc");while($row=mysql_fetch_array($res)){
 $aurl="provideo.php?action=update&bh=".$bh."&mybh=".$row[bh];
 ?>
 <ul class="provlist">
 <li class="l1"><input name="C1" type="checkbox" value="<?=$row[bh]?>" /></li>
 <li class="l2"><a href="<?=$aurl?>"><?=returntitdian($row["tit"],78)?></a></li>
 <li class="l3"><?=returnztv($row[zt])?></li>
 <li class="l4"><?=$row[djl]?></li>
 <li class="l5"><?=$row[sj]?></li>
 <li class="l6"><a href="<?=$aurl?>">修改</a><span></span><a href="#" target="_blank">预览</a></li>
 </ul>
 <? }?>
 <?
 $nowurl="provideolist.php";
 $nowwd="bh=".$bh;
 include("page.php");
 ?>
 <!--E-->
 
</div>
</div>
<?php include("bottom.php");?>
</body>
</html>