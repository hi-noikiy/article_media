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
<link href="css/quanju.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script language="javascript" src="js/basic.js"></script>
<script language="javascript" src="js/layer.js"></script>
</head>
<body>
<? include("top.php");?>
<script language="javascript">
document.getElementById("menu1").className="a1";
</script>
<? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0302,")){echo "<div class='noneqx'>��Ȩ��</div>";exit;}?>

<div class="yjcode">
 <? $leftid=1;include("menu_quan.php");?>

<div class="right">
 
 <div class="bqu1">
 <a class="a1" href="userdjlist.php">��Ա�ȼ�</a>
 </div>
 <div class="rights">
 <strong>��ʾ��</strong><br>
 <span class="red">�����һλ�ĵȼ������û�ע���Ĭ�ϵĵȼ�</span>
 </div>

 <!--B-->
 <ul class="ksedi">
 <li class="l2">
 <a href="javascript:checkDEL(36,'epzhu_userdj')" class="a2">ɾ��</a>
 <a href="userdjlx.php" class="a1">�����ȼ�</a>
 </li>
 </ul>
 <ul class="qjlistcap">
 <li class="l1"><input name="C2" type="checkbox" onclick="xuan()" /></li>
 <li class="l2">�ȼ���Ϣ</li>
 <li class="l3">�ȼ�����</li>
 <li class="l4">����</li>
 <li class="l5">������</li>
 </ul>
 <?
 while0("*","epzhu_userdj where zt=0 order by xh asc");while($row=mysql_fetch_array($res)){
 $aurl="userdj.php?bh=".$row[bh];
 ?>
 <ul class="qjlist2">
 <li class="l1"><input name="C1" type="checkbox" value="<?=$row[bh]?>" /></li>
 <li class="l2" onclick="gourl('<?=$aurl?>')"><strong><?=$row[name1]?></strong> [<?=$row[zhekou]?>��]</li>
 <li class="l3"><?=$row[money1]?>Ԫ/<? if(empty($row[jgdw])){echo "��";}else{echo "��";}?></li>
 <li class="l4"><?=$row[xh]?></li>
 <li class="l51"><?=$row[sj]?></li>
 </ul>
 <? }?>
 <!--E-->
 
</div>
</div>
<?php include("bottom.php");?>
</body>
</html>