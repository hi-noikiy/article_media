function topd3over(){
document.getElementById("tla").style.display="";
}
function topd3out(){
document.getElementById("tla").style.display="none";
}

function xuan(){
 c2=document.getElementsByName("C2");
 c=document.getElementsByName("C1");
 if(c2[0].checked){
 for(i=0;i<c.length;i++){
 c[i].checked="checked";
 }
 }else{
 for(i=0;i<c.length;i++){
 c[i].checked=false;
 }
 }
}

function xuan1(){
 c21=document.getElementsByName("C21");
 c11=document.getElementsByName("C11");
 if(c21[0].checked){
 for(i=0;i<c11.length;i++){
 c11[i].checked="checked";
 }
 }else{
 for(i=0;i<c11.length;i++){
 c11[i].checked=false;
 }
 }
}

function checkDEL(x,y){
 var c=document.getElementsByName("C1");
 str="";
 for(i=0;i<c.length;i++){
  if(c[i].checked){
  if(str==""){
  str=c[i].value;
  }else{
  str=str+","+c[i].value;
  }
  }
}
if(str==""){alert("������ѡ��һ������");return false;}

 if(confirm("ȷ��ִ�и��������?")){
 layer.msg('���ڴ�������', {icon: 16  ,time: 0,shade :0.25});
 $.get("noRefresh.php",{admin:x,idbh:str,tab:y},function(result){
  layer.closeAll();
  if(result=="True"){location.reload();return false;}
  else if(result=="Err9"){alert("ɾ��ʧ�ܣ�Ȩ�޲���");return false;}
  else{alert("ɾ��ʧ�ܣ��÷����»��ж������������������Ϣδɾ��");return false;}
 });
 
 }else{return false;}

}

//��ҳ��ת
function pagegoto(x,y){
if(isNaN(document.getElementById("pagetext").value)){alert("��������ȷ��ҳ����");document.getElementById("pagetext").select();return false;}	
gourl(x+"?"+"page="+document.getElementById("pagetext").value+"&"+y);
}
function gourl(x){
location.href=x;	
}
