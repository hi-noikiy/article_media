<?
include("../../config/conn.php");
include("../../config/function.php");
sesCheck_m();


if($_GET[control]=="bd"){
 zwzr();
 if(panduan("uid,ifemail","epzhu_user where uid='".$_GET[email]."' and ifemail=1")==1){Audit_alert("��֤ʧ�ܣ������ʺ��Ѿ���֤���������ظ���֤","emailbd.php");}
 if(empty($_GET[yz])){Audit_alert("��֤������","emailbd.php");}
 if(panduan("uid,bdemail","epzhu_user where bdemail='".$_GET[yz]."' and uid='".$_SESSION[SHOPUSER]."'")==0){
 Audit_alert("��֤������������������֤","emailbd.php");
 }
 updatetable("epzhu_user","ifemail=1,bdemail='' where uid='".$_SESSION[SHOPUSER]."'");
 php_toheader("emailbd.php?t=suc"); 

}elseif($_GET[control]=="delbd"){
 if(panduan("uid,bdemail","epzhu_user where bdemail='".$_GET[yz]."' and uid='".$_SESSION[SHOPUSER]."'")==0){
 Audit_alert("��֤�����������������ύ","emailbd.php");
 }
 updatetable("epzhu_user","ifemail=0,bdemail='' where uid='".$_SESSION[SHOPUSER]."'");
 php_toheader("emailbd.php?t=suc"); 

}


$sqluser="select uid,email,ifemail from epzhu_user where uid='".$_SESSION[SHOPUSER]."'";mysql_query("SET NAMES 'GBK'");$resuser=mysql_query($sqluser);
if(!$rowuser=mysql_fetch_array($resuser)){php_toheader("../reg/");}

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
//��֤��ʼ
var sz;
function yzonc(){
 if((document.getElementById("t1").value).replace("/\s/","")=="" || !isEmail(document.getElementById("t1").value)){alert("�������ʼ���ַ");document.getElementById("t1").focus();return false;}
 document.getElementById("sjzouv").innerHTML=120;
 document.getElementById("uk1").style.display="none";
 document.getElementById("uk2").style.display="";
 document.getElementById("fsid1").style.display=""; 
 document.getElementById("fsid2").style.display="none"; 
 
 $.get("../../user/emailchk.php",{email:document.getElementById("t1").value},function(result){
  response=result.replace(/[\r\n]/g,'');
  if(response=="True"){
   alert("�������Ѿ�����֤�������");
   document.getElementById("uk1").style.display="";document.getElementById("uk2").style.display="none";return false;
  }else{
   sz=setInterval("sjzou()",1000);return false;
  } 
 });
 
}

function sjzou(){
 s=parseInt(document.getElementById("sjzouv").innerHTML);
 if(s<=0){
  clearInterval(sz);
  document.getElementById("fsid1").style.display="none"; 
  document.getElementById("fsid2").style.display=""; 
  return false;
 }else{document.getElementById("sjzouv").innerHTML=s-1;}
}

function bd(){
 if((document.getElementById("t2").value).replace("/\s/","")==""){alert("��������֤��");document.getElementById("t2").focus();return false;}
 layer.open({type: 2,content: '���ڴ���',shadeClose:false});
 location.href="emailbd.php?control=bd&yz="+document.getElementById("t2").value;
}

//���ʼ
var delsz;
function delbd(){
 if(!confirm("ȷ��Ҫ������������֤��")){return false;}
 document.getElementById("delsjzouv").innerHTML=120;
 document.getElementById("uk3").style.display="none";
 document.getElementById("uk4").style.display="";
 document.getElementById("fsid3").style.display=""; 
 document.getElementById("fsid4").style.display="none"; 
 
 $.get("../../user/emailchkdel.php",{},function(result){
  response=result.replace(/[\r\n]/g,'');
  delsz=setInterval("delsjzou()",1000);
 });

}

function delsjzou(){
 s=parseInt(document.getElementById("delsjzouv").innerHTML);
 if(s<=0){
  clearInterval(delsz);
  document.getElementById("fsid3").style.display="none"; 
  document.getElementById("fsid4").style.display=""; 
  return false;
 }else{document.getElementById("delsjzouv").innerHTML=s-1;}
}

function deltj(){
 if((document.getElementById("t4").value).replace("/\s/","")==""){alert("��������֤��");document.getElementById("t4").focus();return false;}
 layer.open({type: 2,content: '���ڴ���',shadeClose:false});
 location.href="emailbd.php?control=delbd&yz="+document.getElementById("t4").value;
}

//�����ж�
function isEmail(str){//�ж�����
var reg = /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+((\.[a-zA-Z0-9_-]{2,3}){1,2})$/;
return reg.test(str);
}

</script>

</head>
<body>
<? include("topuser.php");?>

<div class="bfbtop1 box">
 <div class="d1" onClick="javascript:window.history.go(-1);"><img src="img/topleft.png" height="21" /></div>
 <div class="d2">�����</div>
 <div class="d3"></div>
</div>

 <? if(1==$rowuser[ifemail]){?>
 <div id="uk3">
  <div class="tishi box blue"><div class="d1">�Ѱ����䣺<strong><?=$rowuser["email"]?></strong></div></div>
  <div class="fbbtn box">
   <div class="d1"><input type="button" class="tjinput" onClick="delbd()" value="��������" /></div>
  </div>
 </div>

 <div id="uk4" style="display:none;">
  <div class="tishi box blue"><div class="d1">�������ԭ�����ַ�Ѿ���ʧ������ϵ��վ�ͷ�����</div></div>
  <div class="uk box">
   <div class="d1">�� ֤ ��<span class="s1"></span></div>
   <div class="d2"><input type="text" name="t4" id="t4" class="inp" placeholder="��������֤��" /></div>
  </div>
  <div class="tishi box" id="fsid3"><div class="d1">��鿴<?=$rowuser[email]?>��������<br>�����С���(<span id="delsjzouv" class="red">120</span>����ط�)</div></div>
  <div class="tishi box" id="fsid4" style="display:none;"><div class="d1">[<a href="#" onClick="javascript:delbd();">���·���</a>]</div></div>
  <div class="fbbtn box">
   <div class="d1"><input type="button" class="tjinput" onClick="deltj()" value="��һ��" /></div>
  </div>
 </div>
 
 <? }else{?>
 <div id="uk1">
  <div class="uk box">
   <div class="d1">�� ��<span class="s1"></span></div>
   <div class="d2"><input type="text" name="t1" id="t1" value="<?=$rowuser[email]?>" class="inp" placeholder="�����������˺�" /></div>
  </div>
  <div class="fbbtn box">
   <div class="d1"><input type="button" class="tjinput" onClick="yzonc()" value="��һ��" /></div>
  </div>
 </div>

 <div id="uk2" style="display:none;">
  <div class="uk box">
   <div class="d1">�� ֤ ��<span class="s1"></span></div>
   <div class="d2"><input class="inp" type="text" name="t2" id="t2" placeholder="��������֤��" /></div>
  </div>
  <div class="tishi box" id="fsid1"><div class="d1">�����С���(<span id="sjzouv" class="red">120</span>����ط�)</div></div>
  <div class="tishi box" id="fsid2" style="display:none;"><div class="d1">[<a href="#" onClick="javascript:yzonc();">���·���</a>]</div></div>
  <div class="fbbtn box">
   <div class="d1"><input type="button" class="tjinput" onClick="bd()" value="��֤����" /></div>
  </div>
 </div>
 
 <? }?>
 
 <div class="tishi box"><div class="d1">������ʾ������ÿ������ϵͳ��ȫ���ò�ͬ���ʼ��п��ܱ����˵�����������û�յ��ʼ�����ͨ���������������ҿ���</div></div>

<? include("bottom.php");?>
<script language="javascript">
bottomjd(4);
</script>
</body>
</html>