<?
include("../../config/conn.php");
include("../../config/function.php");
sesCheck_m();

$sqluser="select * from epzhu_user where uid='".$_SESSION[SHOPUSER]."'";mysql_query("SET NAMES 'GBK'");$resuser=mysql_query($sqluser);
$rowuser=mysql_fetch_array($resuser);
if(empty($rowuser[txyh]) || empty($rowuser[txname]) || empty($rowuser[txzh])){Audit_alert("��δ�����տ��ʺţ���������","txsz.php");}

if(sqlzhuru($_POST[jvs])=="tixian"){
 zwzr();
 $sj=date("Y-m-d H:i:s");
 $uip=$_SERVER["REMOTE_ADDR"];
 $money1=sqlzhuru($_POST[t1]);
 $m=(float)$money1;
 if($m>$rowuser[money1] || $m<=0){Audit_alert("���ֽ���ȷ������ʧ��","tixian.php");}
 if($m<$rowcontrol[txdi]){Audit_alert("����������ֶ����ʧ��","tixian.php");}
 $bh=time()."tx".$rowuser[id];
 intotable("epzhu_tixian","bh,userid,money1,sj,uip,txyh,txname,txzh,txkhh,zt,sm","'".$bh."',".$rowuser[id].",".$m.",'".$sj."','".$uip."','".$rowuser[txyh]."','".$rowuser[txname]."','".$rowuser[txzh]."','".$rowuser[txkhh]."',4,''");
  PointUpdateM($rowuser[id],$m*(-1));
  PointIntoM($rowuser[id],"��������",$m*(-1));
  php_toheader("../tishi/index.php?admin=999&b=../user/");
}

?>
<html>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
<title>��Ա���� <?=webname?></title>
<link rel="stylesheet" href="../css/basic.css">
<link rel="stylesheet" href="index.css">
<script src="../js/jquery-1.9.1.min.js" type="text/javascript"></script>
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="../js/layer.js"></script>
<script language="javascript" src="index.js"></script>
<script language="javascript">
function tj(){
if((document.f1.t1.value).replace(/\s/,"")=="" || isNaN(document.f1.t1.value)){layerts("��������Ч�����ֽ��");return false;}	
if(parseFloat(document.f1.t1.value)<<?=$rowcontrol[txdi]?>){layerts("�������ֲ��õ���<?=$rowcontrol[txdi]?>Ԫ");return false;}	
if(confirm("ȷ��Ҫ������")){layer.open({type: 2,content: '�����ύ',shadeClose:false});f1.action="tixian.php";}else{return false;}
}
</script>
</head>
<body>
<? include("topuser.php");?>

<div class="bfbtop1 box">
 <div class="d1" onClick="gourl('index.php')"><img src="img/topleft.png" height="21" /></div>
 <div class="d2">��������</div>
 <div class="d4" onClick="gourl('tixianlog.php')">��¼</div>
</div>

 <form name="f1" method="post" onSubmit="return tj()">
 <input type="hidden" value="tixian" name="jvs" />
 <div class="uk box">
  <div class="d1">�������<span class="s1"></span></div>
  <div class="d21 feng"><?=sprintf("%.2f",$rowuser[money1])?>Ԫ</div>
 </div>
 <div class="uk box">
  <div class="d1">��������<span class="s1"></span></div>
  <div class="d21"><?=$rowuser[txyh]?></div>
  <div class="d3"><img src="../img/rightjian.png" height="13" /></div>
 </div>
 <div class="uk box">
  <div class="d1">��/�� ��<span class="s1"></span></div>
  <div class="d21"><?=$rowuser[txzh]?></div>
  <div class="d3"><img src="../img/rightjian.png" height="13" /></div>
 </div>
 <? if($rowuser[txyh]!="֧����" && $rowuser[txyh]!="�Ƹ�ͨ"){?>
 <div class="uk box" onClick="gourl('txsz.php')">
  <div class="d1">�� �� ��<span class="s1"></span></div>
  <div class="d21"><?=$rowuser[txkhh]?></div>
  <div class="d3"><img src="../img/rightjian.png" height="13" /></div>
 </div>
 <? }?>
 <div class="uk box" onClick="gourl('txsz.php')">
  <div class="d1">�� �� ��<span class="s1"></span></div>
  <div class="d21"><?=$rowuser[txname]?></div>
  <div class="d3"><img src="../img/rightjian.png" height="13" /></div>
 </div>
 <div class="uk box">
  <div class="d1">���ֽ��<span class="s1"></span></div>
  <div class="d2"><input type="text" class="inp" placeholder="���������ֽ��" name="t1" /> </div>
 </div>

 <div class="fbbtn box">
 <div class="d1"><? tjbtnr_m("�ύ����")?></div>
 </div>

 </form>

 <div class="tishi box">
  <div class="d1">
  <? if(!empty($rowcontrol[txfl])){?>������۳�<?=$rowcontrol[txfl]*100?>%��������,<? }?>�������ֲ�����<?=$rowcontrol[txdi]?>Ԫ<br>
  </div>
 </div>
<? include("../tem/bottom.php");?>
</body>
</html>