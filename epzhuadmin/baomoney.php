<?php
include("../config/conn.php");//���ο�����ϵQQ:120036745//���ο�����ϵQQ:12-0036-745
include("../config/function.php");
AdminSes_audit();
$id=$_GET[id];
while0("*","epzhu_baomoneyrecord where id=".$id);if(!$row=mysql_fetch_array($res)){php_toheader("baomoneylist.php");}

$sqluser="select * from epzhu_user where id=".$row[userid];mysql_query("SET NAMES 'GBK'");$resuser=mysql_query($sqluser);
if(!$rowuser=mysql_fetch_array($resuser)){php_toheader("baomoneylist.php");}

//������ʼ
if($_GET[control]=="update"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0701,")){Audit_alert("Ȩ�޲���","default.php");}
 zwzr();
 $zt=intval($_POST[R1]);
 if(0==$zt && 1==$row[zt]){
 $t1=abs($row[moneynum]);
 PointIntoM($row[userid],"�ⶳ��֤��",$t1);
 PointUpdateM($row[userid],$t1); 
 }elseif(2==$zt && 1==$row[zt]){
 $t1=abs($row[moneynum]);
 PointIntoB($row[userid],"��֤��ⶳ����(ԭ��:".$_POST[tztsm].")",$t1);
 PointUpdateB($row[userid],$t1); 
 }
 updatetable("epzhu_baomoneyrecord","zt=".$zt.",ztsm='".$_POST[tztsm]."' where id=".$id);
 php_toheader("baomoney.php?t=suc&id=".$id);
}
//�������
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?=webname?>����ϵͳ</title>
<link href="css/basic.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script language="javascript" src="js/basic.js"></script>
<script language="javascript" src="js/layer.js"></script>
<script language="javascript">
function tj(){
 if(confirm("ȷ��ִ�иò�����")){}else{return false;}
 layer.msg('�����ύ', {icon: 16  ,time: 0,shade :0.25});
 f1.action="baomoney.php?control=update&id=<?=$row[id]?>";
 }
function ztonc(x){
 if(2==x){document.getElementById("ztv").style.display="";}else{document.getElementById("ztv").style.display="none";}
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
 <? $leftid=3;include("menu_user.php");?>

<div class="right">
 <? if($_GET[t]=="suc"){systs("��ϲ���������ɹ���","baomoney.php?id=".$id);}?>
 <div class="bqu1">
 <a href="javascript:void(0);" class="a1">��֤�����</a>
 <a href="baomoneylist.php">�����б�</a>
 </div> 
 <!--B-->
 <div class="rkuang">
 <form name="f1" method="post" onsubmit="return tj()">
 <ul class="uk">
 <li class="l1">��Ա�ʺţ�</li>
 <li class="l2"><input type="text" class="inp redony" readonly="readonly" name="tuid" size="20" value="<?=$rowuser[uid]?>" /></li>
 <li class="l1">������</li>
 <li class="l2"><input class="inp redony" readonly="readonly" value="<?=sprintf("%.2f",$rowuser[money1])?>" size="10" type="text"/></li>
 <li class="l1">���ñ�֤��</li>
 <li class="l2"><input class="inp redony" readonly="readonly" value="<?=sprintf("%.2f",$rowuser[baomoney])?>" size="10" type="text"/></li>
 <li class="l1">������֤��</li>
 <li class="l2"><input class="inp" readonly="readonly" value="<?=sprintf("%.2f",$row[moneynum])?>" size="10" type="text"/></li>
 <li class="l1">�������ʣ�</li>
 <li class="l2"><input class="inp" readonly="readonly" value="<? if($row[moneynum]>0){echo "����";}else{echo "�ⶳ";}?>" size="10" type="text"/></li>
 <li class="l1">����Ա��ˣ�</li>
 <li class="l2">
 <label><input name="R1" type="radio" onclick="ztonc(0)" value="0"<? if(0==$row[zt]){?> checked="checked"<? }?> /> ͨ�����</label>
 <label><input name="R1" type="radio" onclick="ztonc(1)" value="1"<? if(1==$row[zt]){?> checked="checked"<? }?> /> �������</label>
 <label><input name="R1" type="radio" onclick="ztonc(2)" value="2"<? if(2==$row[zt]){?> checked="checked"<? }?> /> ��˲�ͨ��</label>
 </li>
 </ul>
 <ul class="uk uk0" id="ztv" style="display:none;">
 <li class="l1">����ԭ��</li>
 <li class="l2"><input type="text" class="inp" name="tztsm" size="90" value="<?=$row[ztsm]?>" /></li>
 </ul>
 <? if(1==$row[zt]){?>
 <ul class="uk uk0">
 <li class="l3"><input type="submit" value="�����޸�" class="btn1" /></li>
 </ul>
 <? }?>
 </form>
 </div>
 <!--E-->
</div>
</div>
<?php include("bottom.php");?>
<script language="javascript">ztonc(<?=$row[zt]?>);</script>
</body>
</html>