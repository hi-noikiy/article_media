<?php
include("../config/conn.php");//���ο�����ϵQQ:120036745//���ο�����ϵQQ:12-0036-745
include("../config/function.php");
AdminSes_audit();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?=webname?>����ϵͳ</title>
<link href="css/basic.css" rel="stylesheet" type="text/css" />
<link href="css/ad.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script language="javascript" src="js/basic.js"></script>
<script language="javascript" src="js/layer.js"></script>
</head>
<body>
<? include("top.php");?>
<script language="javascript">
document.getElementById("menu5").className="a1";
</script>
<? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0602,")){echo "<div class='noneqx'>��Ȩ��</div>";exit;}?>

<div class="yjcode">
 <? $leftid=1;include("menu_ad.php");?>

<div class="right">
 
 <!--begin-->
 <ul class="ksedi">
 <li class="l2">
 <a href="ad_lx.php?bh=<?=$_GET[bh]?>&sm=<?=urlencode($_GET[sm])?>&must=<?=$_GET[must]?>" class="a1">��ӹ��</a>
 <a href="javascript:checkDEL(8,'epzhu_ad')" class="a2">ɾ��</a>
 </li>
 </ul>
 <ul class="adlistcap">
 <li class="l1"><input name="C2" type="checkbox" onclick="xuan()" /></li>
 <li class="l2">�����Ϣ</li>
 <li class="l3">���</li>
 <li class="l4">�༭ʱ��</li>
 <li class="l5">����</li>
 </ul>
 <?
 autoAD($_GET[bh]);
 while0("*","epzhu_ad where adbh='".$_GET[bh]."' and zt<>99 order by xh asc");while($row=mysql_fetch_array($res)){
 if($row[type1]=="ͼƬ"){$na=strgb2312($row[aurl],0,50);}elseif($row[type1]=="����"){$na="������";}elseif($row[type1]=="����"){$na=$row[aurl];}
 $aurl="ad.php?bh=".$row[bh]."&sm=".urlencode($_GET[sm])."&must=".$_GET[must]."&action=update";
 if(0==$row[zt]){$ztv="<span class='blue'>չʾ��</span>";}elseif(1==$row[zt]){$ztv="<span class='feng'>������</span>";}
 ?>
 <ul class="adlist">
 <li class="l1"><input name="C1" type="checkbox" value="<?=$row[bh]?>" /></li>
 <li class="l2"><a href="<?=$aurl?>"><?=$row[tit]?></a></li>
 <li class="l3"><?=$row[xh]?></li>
 <li class="l4"><?=$row[sj]?></li>
 <li class="l5"><a href="<?=$aurl?>">�༭</a></li>
 </ul>
 <?
 }
 ?>
 <!--end-->
 
</div>
</div>
<?php include("bottom.php");?>
</body>
</html>