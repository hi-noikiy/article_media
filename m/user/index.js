function NcheckDEL(x,y){
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
 layer.open({type: 2,content: '���ڴ�������',shadeClose:false});
 $.get("../../user/noRefresh.php",{admin:x,idbh:str,tab:y},function(result){
  layer.closeAll();
  a=result.replace(/[\r\n]/g,'');
  if(a=="ERR074"){alert("����ʧ�ܣ�������");return false;}
  else if(a=="ERR1"){alert("ɾ��ʧ�ܣ��÷����»��ж������������������Ϣδɾ��");return false;}
  else if(a=="True"){location.reload();return false;}
 });
 
 }else{return false;}

}

//����/չ��
function iimgonc(x){
idiv=document.getElementById("idiv"+x);
 if(idiv.className=="d2"){idiv.className="d2 d2la";document.getElementById("iimg"+x).src="img/jia.gif";}
 else{idiv.className="d2";document.getElementById("iimg"+x).src="img/jian3.gif";}
}
