//����������
function sertjonc(x,y){ //x��ʾ��ǰID��y��ʾ���е�
s=document.getElementById("sertj"+x);
if(s.style.display==""){
 s.style.display="none";document.getElementById("zhezhao").style.display="none";
}else{
 s.style.display="";document.getElementById("zhezhao").style.display="block";
}
for(i=1;i<=y;i++){
if(x!=i){if(document.getElementById("sertj"+i)){document.getElementById("sertj"+i).style.display="none";}}
}
}

//�ȴ�
function tjwait(){
document.getElementById("tjbtn").style.display="none";
document.getElementById("tjing").style.display="";	
}

function gourl(x){
location.href=x;
}

//�������С�����λ�����
function addNum(num1,num2){
var sq1,sq2,m;
try{sq1=num1.toString().split(".")[1].length;} catch(e){sq1=0;}
try{sq2=num2.toString().split(".")[1].length;} catch(e){sq2=0;}
m=Math.pow(10,Math.max(sq1,sq2));
return ( num1 * m + num2 * m ) / m;
}

function accMul(arg1,arg2){
 var m=0,s1=arg1.toString(),s2=arg2.toString();
 try{m+=s1.split(".")[1].length}catch(e){}
 try{m+=s2.split(".")[1].length}catch(e){}
 return Number(s1.replace(".",""))*Number(s2.replace(".",""))/Math.pow(10,m);
}

function layerts(x){
layer.open({
    content: x
    ,skin: 'msg'
    ,time: 3
  });
}

//�ײ�����
function bottomjd(x){
document.getElementById("bottom"+x).className="dm dm1";
document.getElementById("bottom"+x+"img").src=document.getElementById("webhttp").innerHTML+"m/img/bottom"+x+"_1.png";
}