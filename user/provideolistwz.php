<?
include("../config/conn.php");//���ο�����ϵQQ:120036745//���ο�����ϵQQ:120036745
include("../config/functionwz.php");
sesCheck();
$bh=$_GET[bh];
$userid=returnuserid($_SESSION[SHOPUSER]);
$ses=" where userid=".$userid." and probh='".$bh."' and zt<>99";
$page=$_GET["page"];if($page==""){$page=1;}else{$page=intval($_GET["page"]);}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><div class="yjcode"><? adwhile("ADTOP");?></div>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�û�������� - <?=webname?></title>
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
<li class="l1">����λ�ã�<a href="../" class="acy">��ҳ</a> > <a href="./" class="acy">��Ա����</a> > ��Ʒ��Ƶ����</li>
</ul>
<? $leftid=1;include("leftwz.php");?>

<!--RB-->
<div class="right">

 <? include("protopwz.php");?>
 <? include("rcap3wz.php");?>
 <script language="javascript">
 document.getElementById("rcap2").className="g_ac0_h g_bc0_h";
 </script>
 
 <ul class="typecap">
 <li class="l1">��Ƶ����</li>
 <li class="l4">��ע</li>
 <li class="l6">����ʱ��</li>
 <li class="l5">����</li>
 </ul>
 <ul class="listcap1">
 <li class="l1"><input name="C2" type="checkbox" onclick="xuan()" /> ȫѡ</li>
 <li class="l2">
 <a href="javascript:void(0)" onclick="NcheckDEL(14,'epzhu_provideo')" class="a2">ɾ��</a>
 <a href="provideolxwz.php?bh=<?=$bh?>" class="a1">������Ƶ</a>
 </li>
 </ul>
 <?
 pagef($ses,20,"epzhu_provideo","order by sj desc");while($row=mysql_fetch_array($res)){
 $aurl="provideo.php?bh=".$bh."&mybh=".$row[bh];
 ?>
 <ul class="typelist2" onmouseover="this.className='typelist2 typelist21';" onmouseout="this.className='typelist2';">
 <li class="l0"><input name="C1" type="checkbox" value="<?=$row[bh]?>" /></li>
 <li class="l1">
 <a title="<?=$row["tit"]?>" href="<?=$aurl?>" class="a1"><?=returntitdian($row["tit"],78)?></a><br>
 <? if(1==$row[iftj]){?><span class="blue">�Ƽ�</span> <? }?> <?=returnztv($row[zt])?>
 </li>
 <li class="l4"><?=$row[djl]?></li>
 <li class="l6"><?=$row[sj]?></li>
 <li class="l5"><a href="<?=$aurl?>">�޸�</a> | Ԥ��</li>
 </ul>
 <?
 }
 ?>
 
 <div class="npa">
 <?
 $nowurl="provideolist.php";
 $nowwd="bh=".$bh;
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