<?php
include("../config/conn.php");//���ο�����ϵQQ:120036745//���ο�����ϵQQ:12-0036-745
include("../config/function.php");
AdminSes_audit();
$bh=$_GET[bh];
while0("*","epzhu_pro where bh='".$bh."'");if(!$row=mysql_fetch_array($res)){php_toheader("productlist.php");}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?=webname?>�����̨</title>
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
<? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0102,")){echo "<div class='noneqx'>��Ȩ��</div>";exit;}?>

<div class="yjcode">
 <? $leftid=1;include("menu_product.php");?>

<div class="right">
 
 <div class="bqu1">
 <a class="a1" href="javascript:void(0);"><?=$row[tit]?></a>
 </div>
 
 <!--begin-->
 <ul class="ksedi">
 <li class="l2">
 <a href="taocanlx.php?bh=<?=$bh?>" class="a1">�����ײ�</a>
 <a href="javascript:checkDEL(33,'epzhu_taocan')" class="a2">ɾ��</a>
 </li>
 </ul>
 <ul class="tccap">
 <li class="l1"><input name="C2" type="checkbox" onclick="xuan()" /></li>
 <li class="l2">�ײ�˵��</li>
 <li class="l3">���</li>
 <li class="l4">ԭ��</li>
 <li class="l5">�Żݼ�</li>
 <li class="l6">����</li>
 </ul>
 <?
 while1("*","epzhu_taocan where probh='".$bh."' and zt=0 and admin is null order by xh asc");while($row1=mysql_fetch_array($res1)){
 $nu="taocan.php?id=".$row1[id]."&bh=".$bh;
 ?>
 <ul class="tclist">
 <li class="l1"><input name="C1" type="checkbox" value="<?=$row1[id]?>xcf0" /></li>
 <li class="l2"><a href="<?=$nu?>"><strong><?=$row1[tit]?></strong></a></li>
 <li class="l3"><?=$row1[xh]?></li>
 <li class="l4"><?=$row1[money2]?></li>
 <li class="l5"><?=$row1[money1]?></li>
 <li class="l6">
 <? if(4==$row1[fhxs]){?><a href="kclist_tc.php?tcid=<?=$row1[id]?>&bh=<?=$bh?>" target="_blank">���</a><span></span><? }?>
 <a href="taocan1lx.php?ty1id=<?=$row1[id]?>&bh=<?=$bh?>">��Ӷ����ײ�</a><span></span><a href="<?=$nu?>">�༭</a>
 </li>
 </ul>
 <?
 while2("*","epzhu_taocan where admin=2 and zt=0 and tit='".$row1[tit]."' and probh='".$bh."' order by xh asc");while($row2=mysql_fetch_array($res2)){
 $nu="taocan1.php?id=".$row2[id]."&ty1id=".$row1[id]."&bh=".$bh; 
 ?>
 <ul class="tclist1">
 <li class="l1"><input name="C1" type="checkbox" value="xcf<?=$row2[id]?>" /></li>
 <li class="l2">&nbsp;&nbsp;- <a href="<?=$nu?>"><?=$row2[tit2]?></a></li>
 <li class="l3"><?=$row2[xh]?></li>
 <li class="l4"><?=$row2[money2]?></li>
 <li class="l5"><?=$row2[money1]?></li>
 <li class="l6">
 <? if(4==$row2[fhxs]){?><a href="kclist_tc.php?tcid=<?=$row2[id]?>&bh=<?=$bh?>" target="_blank">���</a><span></span><? }?>
 <a href="<?=$nu?>">�༭</a>
 </li>
 </ul>
 <? }}?>
 <!--end-->
 
</div>
</div>
<?php include("bottom.php");?>
</body>
</html>