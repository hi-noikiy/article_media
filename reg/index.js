//ע�Ὺʼ 
var ifuidok=0;
var ifpwd1ok=0;
var ifpwd2ok=0;
var ifncok=0;
var ifqqok=0;
var ifyxok=0;
var ifyzmok=0;
var ifmotok=0;
var ifmotyzmok=0;
var xmlHttp = false;
try {
  xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
} catch (e) {
  try {
    xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
  } catch (e2) {
    xmlHttp = false;
  }
}
if (!xmlHttp && typeof XMLHttpRequest != 'undefined') {
  xmlHttp = new XMLHttpRequest();
}

function updatePage() {
  if (xmlHttp.readyState == 4) {
    response = xmlHttp.responseText;
	response=response.replace(/[\r\n]/g,'');
	if(response=="True"){document.getElementById("ts1").innerHTML="<font color=red>���ź������ʺ��Ѵ���</font>";document.getElementById("imgts1").innerHTML="<img src='img/err.gif' />";}
   else if(response=="False"){document.getElementById("ts1").innerHTML="��ϲ�㣬�ʺſ���ʹ��";document.getElementById("imgts1").innerHTML="<img src='img/suc.gif' />";ifuidok=1;}
  }
}

function userCheck(){
ifuidok=0;
document.getElementById("imgts1").innerHTML="";
t1v =document.f1.t1.value;
re = /^[0-9a-z_]+$/gi;
if(t1v.length<4 || t1v.length>20 || !re.test(t1v)){document.getElementById("ts1").innerHTML="<span class='red'>�ʺ� ��ĸ�����֡����</span>";document.getElementById("imgts1").innerHTML="<img src='img/err.gif' />";return false;}	
document.getElementById("ts1").innerHTML="�û������ڼ�⡭��";
var url = "userCheck.php?uid="+t1v;
xmlHttp.open("get", url, true);
xmlHttp.onreadystatechange = updatePage;
xmlHttp.send(null);
}

function pwd1chk(){
ifpwd1ok=0;
t2v =document.f1.t2.value;
if(t2v.length<6 || t2v.length>20){
document.getElementById("ts2").innerHTML="<span class='red'>���� 6-20����ĸ�����</span>";document.getElementById("imgts2").innerHTML="<img src='img/err.gif' />";return false;
}else{
document.getElementById("ts2").innerHTML="���� 6-20����ĸ�����֡����";document.getElementById("imgts2").innerHTML="<img src='img/suc.gif' />";ifpwd1ok=1;return false;
}
}
function pwd2chk(){
ifpwd2ok=0;
t3v =document.f1.t3.value;
t2v =document.f1.t2.value;
if(0==ifpwd1ok || t2v!=t3v){document.getElementById("ts3").innerHTML="<span class='red'>ȷ������������ȷ</span>";document.getElementById("imgts3").innerHTML="<img src='img/err.gif' />";return false;}
else{document.getElementById("ts3").innerHTML="��������һ��";document.getElementById("imgts3").innerHTML="<img src='img/suc.gif' />";ifpwd2ok=1;return false;}
}

var xmlHttpnc = false;
try {
  xmlHttpnc = new ActiveXObject("Msxml2.XMLHTTP");
} catch (e) {
  try {
    xmlHttpnc = new ActiveXObject("Microsoft.XMLHTTP");
  } catch (e2) {
    xmlHttpnc = false;
  }
}
if (!xmlHttpnc && typeof XMLHttpRequest != 'undefined') {
  xmlHttpnc = new XMLHttpRequest();
}

function updatePagenc() {
  if (xmlHttpnc.readyState == 4) {
    response = xmlHttpnc.responseText;
	response=response.replace(/[\r\n]/g,'');
	if(response=="True"){document.getElementById("ts4").innerHTML="<font color=red>���ź������ǳ��ѱ��û�ʹ��</font>";document.getElementById("imgts4").innerHTML="<img src='img/err.gif' />";}
   else if(response=="False"){document.getElementById("ts4").innerHTML="��ϲ�㣬�ǳƿ���ʹ��";document.getElementById("imgts4").innerHTML="<img src='img/suc.gif' />";ifncok=1;}
  }
}

function ncCheck(){
ifncok=0;
t4v =document.f1.t4.value;
if(t4v.replace(/\s/,"")==""){document.getElementById("ts4").innerHTML="<span class='red'>���������ڱ�վ���ǳ�</span>";document.getElementById("imgts4").innerHTML="<img src='img/err.gif' />";return false;}	
document.getElementById("ts4").innerHTML="�ǳ����ڼ�⡭��";
var url = "ncCheck.php?nc="+t4v;
xmlHttpnc.open("get", url, true);
xmlHttpnc.onreadystatechange = updatePagenc;
xmlHttpnc.send(null);
}

function qqCheck(){
ifqqok=0;
t6v =document.f1.t6.value;
if(t6v.replace(/\s/,"")==""){document.getElementById("ts6").innerHTML="<span class='red'>����д��ȷ����ϵQQ</span>";document.getElementById("imgts6").innerHTML="<img src='img/err.gif' />";return false;}	
else{document.getElementById("ts6").innerHTML="����QQ����";document.getElementById("imgts6").innerHTML="<img src='img/suc.gif' />";ifqqok=1;}
}

function yxCheck(){
ifyxok=0;
t7v =document.f1.t7.value;
if(t7v.replace(/\s/,"")=="" || !isEmail(t7v)){objhtml("ts7","<span class='red'>����д��ȷ������</span>");objhtml("imgts7","<img src='img/err.gif' />");return false;}	
else{objhtml("ts7","����");objhtml("imgts7","<img src='img/suc.gif' />");ifyxok=1;}
}

function yzmCheck(){
ifyzmok=0;
t5v =document.f1.t5.value;
if(t5v.replace(/\s/,"")==""){objhtml("ts5","<span class='red'>������ͼ����֤��</span>");objhtml("imgts5","<img src='img/err.gif' />");return false;}	
objhtml("ts5","������֤...");

$.post("yzmCheck.php",{yzm:t5v},function(result){
 if(result=="True"){objhtml("ts5","<font color=red>��֤����������</font>");objhtml("imgts5","<img src='img/err.gif' />");}
 else if(result=="False"){objhtml("ts5","");objhtml("imgts5","<img src='img/suc.gif' />");ifyzmok=1;}
});

}

function motCheck(){
ifmotok=0;
t8v=document.f1.t8.value;
var myreg = /^(((13[0-9]{1})|(15[0-9]{1})|(17[0-9]{1})|(18[0-9]{1}))+\d{8})$/; 
if(t8v.length==0 || t8v.length!=11 || !myreg.test(t8v)){objhtml("ts8","<span class='red'>�ֻ������ʽ����</span>");objhtml("imgts8","<img src='img/err.gif' />");return false;}
objhtml("ts8","�ֻ��������ڼ�⡭��");objhtml("imgts8","");
$.post("motCheck.php",{mot:t8v},function(result){
 if(result=="True"){objhtml("ts8","<font color=red>���ź����ú����ѱ������û���ʹ��</font>");objhtml("imgts8","<img src='img/err.gif' />");}
 else if(result=="False"){objhtml("ts8","");objhtml("imgts8","<img src='img/suc.gif' />");ifmotok=1;}
});

}

function motyzmCheck(){
ifmotyzmok=0;
t9v=document.f1.t9.value;
if(t9v.replace(/\s/,"")==""){objhtml("ts9","<span class='red'>��������֤��</span>");objhtml("imgts9","<img src='img/err.gif' />");return false;}	
objhtml("ts9","������֤...");
$.post("motyzmCheck.php",{yzm:t9v},function(result){
 if(result=="True"){objhtml("ts9","<font color=red>������֤������</font>");objhtml("imgts9","<img src='img/err.gif' />");}
 else if(result=="False"){objhtml("ts9","");objhtml("imgts9","<img src='img/suc.gif' />");ifmotyzmok=1;}
});

}

var sz;
function sjzou(){
 s=parseInt(document.getElementById("sjzouv").innerHTML);
 if(s<=0){
 clearInterval(sz);
 objhtml("sjzouv","120");
 objdis("fs1","");
 objdis("fs2","none");
 return false;
 }else{
 objhtml("sjzouv",s-1);
 }
}
function yzonc(){
 if(0==ifyzmok){yzmCheck();return false;}
 if(0==ifmotok){motCheck();return false;}
 objdis("fs1","none");
 objdis("fs2","");
 sz=setInterval("sjzou()",1000);
 $.post("mobreg.php",{mot:document.f1.t8.value,txyzm:document.f1.t5.value},function(result){
 if(result=="err1"){motCheck();return false;}
 else if(result=="err2"){yzmCheck();}
 });
 return false;
}

function tj(){
if(0==ifuidok){userCheck();return false;}
if(0==ifpwd1ok){pwd1chk();return false;}
if(0==ifpwd2ok){pwd2chk();return false;}
if(0==ifncok){ncCheck();return false;}
if(0==ifqqok){qqCheck();return false;}
if(0==ifyxok){yxCheck();return false;}
if(0==ifyzmok){yzmCheck();return false;}
if(document.getElementById("fs1")){
if(0==ifmotok){motCheck();return false;}
if(0==ifmotyzmok){motyzmCheck();return false;}
}
layer.msg('���ݴ�����', {icon: 16  ,time: 0,shade :0.25});
f1.action="reg.php?action=add";
}
//ע�����

//��¼��ʼ
function login(){
 document.getElementById("ts").innerHTML="";
 document.getElementById("ts").className="";
 if((document.f1.t1.value).replace(/\s/,"")==""){document.getElementById("ts").innerHTML="�������¼�˺�";document.getElementById("ts").className="dts";document.f1.t1.focus();return false;}
 if((document.f1.t2.value).replace(/\s/,"")==""){document.getElementById("ts").innerHTML="�������¼����";document.getElementById("ts").className="dts";document.f1.t2.focus();return false;}
 tjwait();
 f1.action="index.php?action=login";
}
function caponc(x){
for(i=1;i<=3;i++){
if(document.getElementById("cap"+i)){
document.getElementById("cap"+i).className="a2";
document.getElementById("loginmod"+i).style.display="none";
}
}
if(x==3){document.getElementById("ksd1").style.display="none";}else{document.getElementById("ksd1").style.display="";}
document.getElementById("cap"+x).className="a1";
document.getElementById("loginmod"+x).style.display="";
}
//��¼����

//�����һ�����
function getpwdtj(){
 if((document.f1.t0.value).replace(/\s/,"")==""){alert("�������ʺ�!");document.f1.t0.focus();return false;}
 if((document.f1.t1.value).replace(/\s/,"")=="" || !isEmail(document.f1.t1.value)){alert("��������Ч������!");document.f1.t1.focus();return false;}
 if((document.f1.t2.value).replace(/\s/,"")==""){alert("��������֤��!");document.f1.t2.focus();return false;}
 tjwait();
 f1.action="getpasswd.php"
}

function repwdtj(x,y,z){
 if((document.f1.t1.value).replace(/\s/,"")==""){alert("����������!");document.f1.t1.focus();return false;}
 if(document.f1.t1.value!=document.f1.t2.value){alert("�����������벻һ��!");document.f1.t2.focus();return false;}
 tjwait();
 f1.action="repwd.php?id="+x+"&chk="+y+"&tmp="+z
}

//�����ж�
function isEmail(str){//�ж�����
var reg = /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+((\.[a-zA-Z0-9_-]{2,3}){1,2})$/;
return reg.test(str);
}

//�ֻ��һ�����

function getmobtj(){
 if((document.f1.t1.value).replace(/\s/,"")==""){alert("��������Ч���ʺ�!");document.f1.t1.focus();return false;}
 if((document.f1.t2.value).replace(/\s/,"")==""){alert("�������ֻ�����!");document.f1.t2.focus();return false;}
 if((document.f1.t3.value).replace(/\s/,"")==""){alert("��������֤��!");document.f1.t3.focus();return false;}
 tjwait();
 f1.action="getmob.php"
}

function objdis(x,y){
document.getElementById(x).style.display=y;
}

function objhtml(x,y){
document.getElementById(x).innerHTML=y;
}
