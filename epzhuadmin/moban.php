<?php
include("../config/conn.php");//二次开发联系QQ:120036745//二次开发联系QQ:12-0036-745
include("../config/function.php");
AdminSes_audit();

$ht1=preg_split("/\//",$_SERVER['PHP_SELF']);
if($_GET[control]=="update"){
 if($ht1[1]!="epzhuadmin"){Audit_alert("后台路径不对，如要使用模板，请先改为epzhuadmin","moban.php");}
 updatetable("epzhu_control","nowmb='".$_GET[mb]."'");
 php_toheader("tohtml.php?admin=0&action=gx");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?=webname?>管理系统</title>
<link href="css/basic.css" rel="stylesheet" type="text/css" />
<style type="text/css">
.right .mblist{float:left;width:1020px;margin:10px 0 0 10px;}
.right .mblist .d1{float:left;width:120px;padding:10px;height:160px;margin:10px 5px 0 0;text-align:center;line-height:18px;}
.right .mblist .d1 .s1{float:left;position:absolute;background-color:#ff0000;color:#fff;padding:5px 0 0 0;text-align:center;width:120px;height:17px;line-height:normal;}
.right .mblist .d1 img{margin:0 0 5px 0;}
.right .mblist .d11{background-color:#e1e1e1;}
</style>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script language="javascript" src="js/basic.js"></script>
<script language="javascript" src="js/layer.js"></script>
<script language="javascript">
function mbcha(x){
 if(confirm("是否启用"+x+"模板")){location.href="moban.php?control=update&mb="+x;}else{return false;}
}
</script>
</head>
<body>
<? include("top.php");?>
<script language="javascript">
document.getElementById("menu1").className="a1";
</script>

<div class="yjcode">
 <? $leftid=1;include("menu_quan.php");?>

<div class="right">
 
 <div class="bqu1">
 <a href="javascript:void(0);" class="a1">模板管理</a>
 </div> 
 
 <!--Begin-->
 <div class="rights">
 温馨提示：<br>
 1、您的网站目前共配置了<strong class="red" id="mbnum">...</strong>套模板，更多模板请访问<a href="http://www.epzhu.com" target="_blank" class="blue">友价官网</a>获取<br>
 2、点击模板图片可以查看全图，但为了节省您的带宽，效果图采用高压缩模式，但启用后您的网站是高清效果<br>
 3、如要使用模板，后台路径必须为epzhuadmin
 </div>
 <div class="mblist">
 <? $i=0;foreach(getDir("../tem/moban/") as $color){if(is_file("../tem/moban/".$color."/homeimg/moban_small.jpg")){?>
  <div class="d1" onmouseover="this.className='d1 d11';" onmouseout="this.className='d1';"><? if($rowcontrol[nowmb]==$color){?><span class="s1">当前模板</span><? }?><a href="../tem/moban/<?=$color?>/homeimg/moban_big.jpg" target="_blank"><img border="0" src="../tem/moban/<?=$color?>/homeimg/moban_small.jpg" width="120" height="120" /></a><br><?=$color?><br><a href="javascript:void(0);" onclick="mbcha('<?=$color?>')">点击启用</a></div>
 <? $i++;}}?>
 </div>
 <script language="javascript">
 document.getElementById("mbnum").innerHTML=<?=$i?>;
 </script>
 <!--End-->
 
</div>
</div>
<?php include("bottom.php");?>
</body>
</html>