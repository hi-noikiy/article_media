<?
include("../config/conn.php");//���ο�����ϵQQ:120036745//���ο�����ϵQQ:120036745
include("../config/function.php");//��-�ο�-��-��-ϵQ-Q:12-00-3674-5
include("../config/tpclass.php");
sesCheck();
$bh=$_GET[bh];
$sqluser="select * from epzhu_user where uid='".$_SESSION[SHOPUSER]."' and shopzt=2";mysql_query("SET NAMES 'GBK'");$resuser=mysql_query($sqluser);
if(!$rowuser=mysql_fetch_array($resuser)){Audit_alert("��Դ����","openshop3.php","parent.");}
$userid=$rowuser[id];
while0("*","epzhu_shopbannar where userid=".$userid." and bh='".$bh."'");if(!$row=mysql_fetch_array($res)){Audit_alert("��Դ����","shopbannarlist.php","parent.");}
$at="../upload/".$row[userid]."/shopbannar_".$row[bh].".jpg";

if($_GET[control]=="update"){
 zwzr();
 updatetable("epzhu_shopbannar","tit='".sqlzhuru($_POST[ttit])."',aurl='".sqlzhuru($_POST[taurl])."',xh=".sqlzhuru($_POST[txh]).",targ=".sqlzhuru($_POST[R1]).",zt=0 where userid=".$userid." and id=".$row[id]);
 uploadtpnodata(1,"upload/".$userid."/","shopbannar_".$row[bh].".jpg","allpic",1920,400,0,0,"no");
 php_toheader("shopbannar.php?t=suc&bh=".$bh);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�����ֲ�ͼƬ</title>
<style type="text/css">
body{margin:0;font-size:12px;text-align:center;color:#333;word-wrap:break-word;font-family:"Microsoft YaHei",΢���ź�,"MicrosoftJhengHei",����ϸ��,STHeiti,MingLiu;}
*{margin:0 auto;padding:0;}
ul{list-style-type:none;margin:0;padding:0;}
.uk{float:left;width:600px;font-size:14px;padding:10px;}
.uk li{float:left;}
.uk .l1{width:80px;padding:7px 10px 0 0;height:36px;text-align:right;}
.uk .l2{width:510px;height:43px;}
.uk .l2 .inp{float:left;border:#CCCCCC solid 1px;height:27px;padding:4px 0 0 5px;outline:medium;}
.uk .l2 .inp1{float:left;margin:7px 0 0 0;font-size:14px;font-family:"Microsoft YaHei",΢���ź�,"MicrosoftJhengHei",����ϸ��,STHeiti,MingLiu;}
.uk .l2 .fd{float:left;margin:7px 7px 0 0;}
.uk .l2 label{float:left;cursor:pointer;margin:-2px 10px 0 0;padding:8px 10px 0 10px;height:22px;background-color:#FCFCFD;border:#ECECEC solid 1px;border-radius:5px;}
.uk .l3{width:211px;padding-left:89px;}
.uk .l3 input{cursor:pointer;float:left;width:211px;border:0;font-weight:700;color:#fff;background-color:#ff6600;height:35px;}
.uk .l4{width:80px;padding:7px 10px 0 0;height:66px;text-align:right;}
.uk .l5{width:510px;height:73px;text-align:left;}
</style>
<script language="javascript" src="../js/jquery.min.js"></script>
<script language="javascript" src="../js/layer.js"></script>
<script language="javascript">
function tj(){
layer.msg('���ڱ���', {icon: 16  ,time: 0,shade :0.25});
f1.action="shopbannar.php?control=update&bh=<?=$bh?>";
}
<? if($_GET["t"]=="suc"){?>
parent.location.reload();
<? }?>
</script>
</head>
<body>
<form name="f1" method="post" onsubmit="return tj()" enctype="multipart/form-data">
<input type="hidden" value="bannar" name="yjcode" />
<ul class="uk">
<li class="l1">ͼƬ���⣺</li>
<li class="l2"><input type="text" class="inp" name="ttit" value="<?=$row[tit]?>" /></li>
<li class="l1">ѡ��ͼƬ��</li>
<li class="l2"><input type="file" class="inp1" name="inp1" id="inp1" size="25"><span class="fd">��ѳߴ磺1920*400</span></li>
<li class="l4"></li>
<li class="l5"><a href="<?=$at?>" target="_blank"><img src="<?=returntppd($at,"img/none60x60.gif")?>" width="60" height="60" /></a></li>
<li class="l1">�������ӣ�</li>
<li class="l2"><input type="text" class="inp" style="width:500px;" name="taurl" value="<?=$row[aurl]?>" /></li>
<li class="l1">�򿪷�ʽ��</li>
<li class="l2">
<label><input name="R1" type="radio" value="1"<? if($row[targ]==1){?> checked="checked"<? }?> /> ��ǰҳ��</label>
<label><input name="R1" type="radio" value="2"<? if($row[targ]==2){?> checked="checked"<? }?> /> �´���</label>
</li>
<li class="l1">չʾ��ţ�</li>
<li class="l2"><input type="text" class="inp" name="txh" value="<?=$row[xh]?>" /></li>
<li class="l3"><? tjbtnr("�����޸�")?></li>
</ul>
</form>
</body>
</html>