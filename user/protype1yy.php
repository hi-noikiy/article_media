<?
include("../config/conn.php");//���ο�����ϵQQ:120036745//���ο�����ϵQQ:120036745
include("../config/functionyy.php");
sesCheck();
$bh=$_GET[bh];
$sqluser="select * from epzhu_user where uid='".$_SESSION[SHOPUSER]."' and shopzt=2";mysql_query("SET NAMES 'GBK'");$resuser=mysql_query($sqluser);
if(!$rowuser=mysql_fetch_array($resuser)){php_toheader("openshop3.php");}
$userid=$rowuser[id];
while0("*","epzhu_protype where userid=".$userid." and bh='".$bh."'");if(!$row=mysql_fetch_array($res)){Audit_alert("��Դ����","protypelist.php","parent.");}

if($_GET[control]=="update"){
 zwzr();
 if(panduan("*","epzhu_protype where admin=1 and name1='".sqlzhuru($_POST[tname1])."' and id<>".$row[id])==1)
 {Audit_alert("�÷����Ѵ��ڣ�","protype1.php?bh=".$bh);}
 if(!empty($row[name1])){$s="name1='".$row[name1]."'";}else{$s="id=".$row[id];}
 updatetable("epzhu_protype","name1='".sqlzhuru($_POST[tname1])."',xh=".sqlzhuru($_POST[txh]).",zt=0 where ".$s);
 php_toheader("protype1yy.php?t=suc&bh=".$bh);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>��Ʒ����</title>
<style type="text/css">
body{margin:0;font-size:12px;text-align:center;color:#333;word-wrap:break-word;font-family:"Microsoft YaHei",΢���ź�,"MicrosoftJhengHei",����ϸ��,STHeiti,MingLiu;}
*{margin:0 auto;padding:0;}
ul{list-style-type:none;margin:0;padding:0;}
.uk{float:left;width:300px;font-size:14px;padding:10px;}
.uk li{float:left;}
.uk .l1{width:79px;padding:7px 10px 0 0;height:36px;text-align:right;}
.uk .l2{width:211px;height:43px;}
.uk .l2 .inp{float:left;border:#CCCCCC solid 1px;height:27px;padding:4px 0 0 5px;width:204px;outline:medium;}
.uk .l3{width:211px;padding-left:89px;}
.uk .l3 input{cursor:pointer;float:left;width:211px;border:0;font-weight:700;color:#fff;background-color:#ff6600;height:35px;}
</style>
<script language="javascript" src="../js/jquery.min.js"></script>
<script language="javascript" src="../js/layer.js"></script>
<script language="javascript" src="../js/layui.js"></script>
<script language="javascript" src="../js/common.js"></script>
<script language="javascript">
function tj(){
layer.msg('���ڱ���', {icon: 16  ,time: 0,shade :0.25});
f1.action="protype1yy.php?control=update&bh=<?=$bh?>";
}
<? if($_GET["t"]=="suc"){?>
parent.location.reload();
<? }?>
</script>
</head>
<body>
<form name="f1" method="post" onsubmit="return tj()">
<input type="hidden" value="type" name="yjcode" />
<ul class="uk">
<li class="l1">�������ƣ�</li>
<li class="l2"><input type="text" class="inp" name="tname1" value="<?=$row[name1]?>" /></li>
<li class="l1">������ţ�</li>
<li class="l2"><input type="text" class="inp" name="txh" value="<?=$row[xh]?>" /></li>
<li class="l3"><? tjbtnr("�����޸�")?></li>
</ul>
</form>
</body>
</html>