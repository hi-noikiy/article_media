<?php
include("../config/conn.php");//���ο�����ϵQQ:120036745//���ο�����ϵQQ:12-0036-745
include("../config/function.php");
AdminSes_audit();
$ses=" where zt<>99";
if($_GET[zt]!=""){$ses=$ses." and zt=".$_GET[zt];}
if($_GET[st1]!=""){$ses=$ses." and tit like '%".$_GET[st1]."%'";}
$page=$_GET["page"];if($page==""){$page=1;}else{$page=intval($_GET["page"]);}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?=webname?>����ϵͳ</title>
<link href="css/basic.css" rel="stylesheet" type="text/css" />
<link href="css/news.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script language="javascript" src="js/basic.js"></script>
<script language="javascript" src="js/layer.js"></script>
<script language="javascript">
function ser(){
location.href="gglist.php?st1="+document.getElementById("st1").value+"&zt="+document.getElementById("zt").value;	
}
</script>
</head>
<body>
<? include("top.php");?>
<script language="javascript">
document.getElementById("menu4").className="a1";
</script>
<? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0202,")){echo "<div class='noneqx'>��Ȩ��</div>";exit;}?>

<div class="yjcode">
 <? $leftid=2;include("menu_news.php");?>

<div class="right">

 <div class="bqu1">
 <a class="a1" href="gglist.php">��վ����</a>
 </div>

 <!--B-->
 <ul class="psel">
 <li class="l1">�ؼ��ʣ�</li><li class="l2"><input value="<?=$_GET[st1]?>" type="text" id="st1" size="15" /></li>
 <li class="l1">���״̬��</li>
 <li class="l2">
 <select id="zt">
 <option value="">==����==</option>
 <option value="0"<? if("0"==$_GET[zt]){?> selected="selected"<? }?>>ͨ�����</option>
 <option value="1"<? if("1"==$_GET[zt]){?> selected="selected"<? }?>>�������</option>
 <option value="2"<? if("2"==$_GET[zt]){?> selected="selected"<? }?>>��˱���</option>
 </select>
 </li>
 <li class="l3"><a href="javascript:ser()" class="a2">����</a></li>
 </ul>
 <ul class="ksedi">
 <li class="l2">
 <a href="javascript:checkDEL(19,'epzhu_gg')" class="a2">ɾ��</a>
 <a href="gglx.php" class="a1">��������</a>
 </li>
 </ul>
 <ul class="newslistcap">
 <li class="l1"><input name="C2" type="checkbox" onclick="xuan()" /></li>
 <li class="l2">��Ѷ��Ϣ</li>
 <li class="l3">���</li>
 <li class="l4">��ע</li>
 <li class="l5">������</li>
 <li class="l6">����</li>
 </ul>
 <?
 pagef($ses,20,"epzhu_gg","order by sj desc");while($row=mysql_fetch_array($res)){
 $aurl="gg.php?bh=".$row[bh];
 ?>
 <ul class="newslist">
 <li class="l1"><input name="C1" type="checkbox" value="<?=$row[bh]?>" /></li>
 <li class="l2"><a href="<?=$aurl?>"><?=returntitdian($row["tit"],65)?></a></li>
 <li class="l3"><?=returnztv($row[zt])?></li>
 <li class="l4"><?=$row[djl]?></li>
 <li class="l5"><?=$row[sj]?></li>
 <li class="l6"><a href="<?=$aurl?>">�༭</a><span></span><a href="../help/ggview<?=$row[id]?>.html" target="_blank">Ԥ��</a></li>
 </ul>
 <? }?>
 <?
 $nowurl="gglist.php";
 $nowwd="zt=".$_GET[zt]."&st1=".$_GET[st1];
 include("page.php");
 ?>
 <!--E-->
 
</div>
</div>
<?php include("bottom.php");?>
</body>
</html>