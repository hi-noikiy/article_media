<?
include("../../config/conn.php");
include("../../config/function.php");
sesCheck_m();

$sqluser="select * from epzhu_user where uid='".$_SESSION[SHOPUSER]."'";mysql_query("SET NAMES 'GBK'");$resuser=mysql_query($sqluser);
$rowuser=mysql_fetch_array($resuser);
if(1==$rowuser[shopzt] || 2==$rowuser[shopzt] || 3==$rowuser[shopzt]){php_toheader("openshop3.php");}

//��������ʼ
if($_POST[yjcode]=="openshop"){
 zwzr();
 $t1=sqlzhuru($_POST[t1]);
 $t2=sqlzhuru($_POST[t2]);
 $s1=sqlzhuru($_POST[s1]);
 if(empty($t1) || empty($t2) || empty($s1)){Audit_alert("��Ϣ���������������ԣ�","openshop1.php");}
 if(panduan("*","epzhu_user where shopname='".$t1."' and uid<>'".$_SESSION[SHOPUSER]."'")==1){Audit_alert("���������Ѿ��������û�ʹ�ã��������ԣ�","openshop1.php");}
 updatetable("epzhu_user","shopname='".$t1."',seokey='".$t2."',seodes='".$s1."' where uid='".$_SESSION[SHOPUSER]."'");
 php_toheader("openshop2.php");
}
//����������

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
if((document.f1.t1.value).replace(/\s/,"")==""){layerts("�������������");return false;}	
if((document.f1.t2.value).replace(/\s/,"")==""){layerts("��������Ӫ��Ʒ");return false;}	
if((document.f1.s1.value).replace(/\s/,"")==""){layerts("��������̼�Ҫ����");return false;}	
layer.open({type: 2,content: '���ڱ���',shadeClose:false});
f1.action="openshop1.php";
}
</script>
</head>
<body>
<? include("topuser.php");?>

<div class="bfbtop1 box">
 <div class="d1" onClick="gourl('index.php')"><img src="img/topleft.png" height="21" /></div>
 <div class="d2">��Ҫ����</div>
 <div class="d3"></div>
</div>

<? include("kdcap.php");?>
<script language="javascript">
document.getElementById("step1").className="d1 d11";
</script>

<form name="f1" method="post" onSubmit="return tj()">
<input type="hidden" value="openshop" name="yjcode" />
<div class="uk box">
 <div class="d1">��������<span class="s1"></span></div>
 <div class="d2"><input type="text" class="inp" placeholder="�������������" name="t1" value="<?=$rowuser[shopname]?>" /></div>
</div>
<div class="uk box">
 <div class="d1">��Ӫ��Ʒ<span class="s1"></span></div>
 <div class="d2"><input type="text" class="inp" placeholder="��������Ӫ��Ʒ" name="t2" value="<?=$rowuser[seokey]?>" /></div>
</div>
<div class="uk box">
 <div class="d1">��Ҫ����<span class="s1"></span></div>
 <div class="d2"><textarea name="s1" placeholder="�������Ҫ����"><?=$rowuser[seodes]?></textarea></div>
</div>
<!--Ч��ͼB-->
<div class="uk box">
 <div class="d1">����ͼ��<span class="s1"></span></div>
 <div class="d2"><iframe style="float:left;" src="tpupload.php?admin=1" width="100" scrolling="no" height="23" frameborder="0"></iframe></div>
</div>
<div class="xgtp box">
<div class="xgtpm">
 <div id="xgtp1" style="display:none;">���ڴ���</div>
 <div id="xgtp2"></div>
</div>
</div>
<!--Ч��ͼE-->
<div class="fbbtn box">
 <div class="d1"><? tjbtnr_m("�� һ ��")?></div>
</div>

</form>
<script language="javascript">
function xgtread(a,b){
 $.get("readtp.php",{admin:a},function(result){
  $("#xgtp2").html(result);
 });
}
function deltp(x){
 document.getElementById("xgtp1").style.display="";
 $.get("tpdel.php",{admin:1},function(result){
  xgtread(1,'');
  document.getElementById("xgtp1").style.display="none";
 });
}
xgtread(1,'');
</script>
</body>
</html>