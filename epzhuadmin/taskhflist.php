<?php
include("../config/conn.php");//���ο�����ϵQQ:120036745//���ο�����ϵQQ:12-0036-745
include("../config/function.php");
AdminSes_audit();
$ses=" where taskty=0";
if($_GET[st1]!=""){$ses=$ses." and txt like '%".$_GET[st1]."%'";}
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
location.href="tasklist.php?st1="+document.getElementById("st1").value;	
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
 <? $leftid=3;include("menu_ad.php");?>

<div class="right">
<div class="bqu1">
<a class="a1" href="taskhflist.php">��������������</a>
</div>

 <!--B-->
 <ul class="psel">
 <li class="l1">�ؼ��ʣ�</li><li class="l2"><input value="<?=$_GET[st1]?>" type="text" id="st1" size="15" /></li>
 <li class="l3"><a href="javascript:ser()" class="a2">����</a></li>
 </ul>
 <ul class="ksedi">
 <li class="l2">
 <a href="javascript:checkDEL(23,'epzhu_taskhf')" class="a2">ɾ��</a>
 </li>
 </ul>
 <ul class="taskcap">
 <li class="l1"><input name="C2" type="checkbox" onclick="xuan()" /></li>
 <li class="l2">����</li>
 <li class="l4">����</li>
 <li class="l3">�����û�</li>
 <li class="l5">������</li>
 <li class="l6">����</li>
 </ul>
 <?
 pagef($ses,20,"epzhu_taskhf","order by sj desc");while($row=mysql_fetch_array($res)){
 $aurl="taskhf.php?id=".$row[id];
 while1("*","epzhu_task where bh='".$row[bh]."'");$row1=mysql_fetch_array($res1);
 ?>
 <ul class="tasklist">
 <li class="l1"><input name="C1" type="checkbox" value="<?=$row[id]?>" /></li>
 <li class="l2"><a href="<?=$aurl?>"><?=strgb2312(strip_tags($row1[tit]),0,55)?></a></li>
 <li class="l4">��<?=$row[money1]?></li>
 <li class="l3"><?=returnuser($row[useridhf])?></li>
 <li class="l5"><?=$row[sj]?></li>
 <li class="l6"><a href="<?=$aurl?>">�޸�</a></li>
 </ul>
 <? }?>
 <?
 $nowurl="taskhflist.php";
 $nowwd="st1=".$_GET[st1]."&zt=".$_GET[zt];
 include("page.php");
 ?>
 <!--E-->
 
</div>

</div>

<?php include("bottom.php");?>
</body>
</html>