<?php
include("../config/conn.php");//���ο�����ϵQQ:120036745//���ο�����ϵQQ:12-0036-745
include("../config/function.php");
AdminSes_audit();
$ses=" where id>0";
if($_GET[zt]!=""){$ses=$ses." and ifok=".$_GET[zt]."";}
if($_GET[st1]!=""){$ses=$ses." and ddbh='".$_GET[st1]."'";}
$page=$_GET["page"];if($page==""){$page=1;}else{$page=intval($_GET["page"]);}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?=webname?>����ϵͳ</title>
<link href="css/basic.css" rel="stylesheet" type="text/css" />
<link href="css/user.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script language="javascript" src="js/basic.js"></script>
<script language="javascript" src="js/layer.js"></script>
<script language="javascript">
function ser(){
location.href="renglist.php?st1="+document.getElementById("st1").value;	
}
</script>
</head>
<body>
<? include("top.php");?>
<script language="javascript">
document.getElementById("menu2").className="a1";
</script>
<? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0702,")){echo "<div class='noneqx'>��Ȩ��</div>";exit;}?>

<div class="yjcode">
<? $leftid=4;include("menu_user.php");?>

<div class="right">
 
 <div class="bqu1">
 <a class="a1" href="renglist.php">�˹�����</a>
 </div>
 <div class="rights">
 <strong>��ʾ��</strong><br>
 <span class="red">���鲻Ҫɾ�����˼�¼</span>
 </div>
 <!--B-->
 <ul class="psel">
 <li class="l1">����������</li><li class="l2"><input value="<?=$_GET[st1]?>" type="text" id="st1" size="15" /></li>
 <li class="l3"><a href="javascript:ser()" class="a2">����</a></li>
 </ul>
 <ul class="ksedi">
 <li class="l2">
 <a href="javascript:checkDEL(35,'epzhu_payreng')" class="a2">ɾ��</a>
 </li>
 </ul>
 <ul class="mlistcap">
 <li class="l1"><input name="C2" type="checkbox" onclick="xuan()" /></li>
 <li class="l2">���ź˶�</li>
 <li class="l6">��Ա</li>
 <li class="l4">���˶�</li>
 <li class="l5">ʱ��</li>
 <li class="l3">����</li>
 </ul>
 <?
 pagef($ses,20,"epzhu_payreng","order by sj desc");while($row=mysql_fetch_array($res)){
 $au="reng.php?id=".$row[id];
 if(1==$row[type1]){$ty="֧����";}
 elseif(2==$row[type1]){$ty="΢��";}
 if(1==$row[ifok]){$dz="<span class='hui'>�ȴ�����</span> | ";}
 elseif(2==$row[ifok]){$dz="<span class='blue'>���˳ɹ�</span> | ";}
 ?>
 <ul class="mlist">
 <li class="l1"><input name="C1" type="checkbox" value="<?=$row[id]?>" /></li>
 <li class="l2"><?=$dz.$ty?> | <?=$row[ddbh]?></li>
 <li class="l6"><?=returnuser($row[userid])?></li>
 <li class="l4 feng"><?=sprintf("%.2f",$row[money1])?></li>
 <li class="l5"><?=$row[sj]?></li>
 <li class="l3"><a href="<?=$au?>">����</a></li>
 </ul>
 <? }?>
 <?
 $nowurl="renglist.php";
 $nowwd="st1=".$_GET[st1]."&zt=".$_GET[zt];
 include("page.php");
 ?>
 <!--E-->
 
</div>
</div>
<?php include("bottom.php");?>
</body>
</html>