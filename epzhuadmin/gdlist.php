<?php
include("../config/conn.php");//���ο�����ϵQQ:120036745//���ο�����ϵQQ:12-0036-745
include("../config/function.php");
AdminSes_audit();
$ses=" where zt<>99";
if($_GET[st1]!=""){$ses=$ses." and tit like '%".$_GET[st1]."%'";}
if($_GET[gdzt]!=""){$ses=$ses." and gdzt=".$_GET[gdzt];}
$page=$_GET["page"];if($page==""){$page=1;}else{$page=intval($_GET["page"]);}
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
<script language="javascript">
function ser(){
location.href="gdlist.php?st1="+document.getElementById("st1").value+"&sd1="+document.getElementById("sd1").value;	
}
</script>
</head>
<body>
<? include("top.php");?>
<script language="javascript">
document.getElementById("menu5").className="a1";
</script>
<? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0602,")){echo "<div class='noneqx'>��Ȩ��</div>";exit;}?>

<div class="yjcode">
 <? $leftid=4;include("menu_ad.php");?>

<div class="right">
<div class="bqu1">
<a class="a1" href="gdlist.php">��������</a>
</div>

 <!--B-->
 <ul class="psel">
 <li class="l1">�ؼ��ʣ�</li><li class="l2"><input value="<?=$_GET[st1]?>" type="text" id="st1" size="15" /></li>
 <li class="l3"><a href="javascript:ser()" class="a2">����</a></li>
 </ul>
 <ul class="ksedi">
 <li class="l2">
 <a href="javascript:checkDEL(28,'epzhu_gd')" class="a2">ɾ��</a>
 </li>
 </ul>
 <ul class="gdcap">
 <li class="l1"><input name="C2" type="checkbox" onclick="xuan()" /></li>
 <li class="l2">��������</li>
 <li class="l3">����״̬</li>
 <li class="l4">�û�</li>
 <li class="l5">������</li>
 <li class="l6">����</li>
 </ul>
 <?
 pagef($ses,20,"epzhu_gd","order by sj desc");while($row=mysql_fetch_array($res)){
 $aurl="gd.php?id=".$row[id];
 ?>
 <ul class="gdlist">
 <li class="l1"><input name="C1" type="checkbox" value="<?=$row[bh]?>" /></li>
 <li class="l2"><a href="<?=$aurl?>"><?=strgb2312(strip_tags($row["txt"]),0,58)?></a></li>
 <li class="l3"><?=returngdzt($row[gdzt])?></li>
 <li class="l4"><?=returnuser($row[userid])?></li>
 <li class="l5"><?=$row[sj]?></li>
 <li class="l6"><a href="<?=$aurl?>">�޸�</a><span></span><a href="gdhf.php?bh=<?=$row[bh]?>">�ظ�</a></li>
 </ul>
 <? }?>
 <?
 $nowurl="gdlist.php";
 $nowwd="st1=".$_GET[st1]."&gdzt=".$_GET[gdzt];
 include("page.php");
 ?>
 <!--E-->
 
</div>
</div>
<?php include("bottom.php");?>
</body>
</html>