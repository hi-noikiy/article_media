function jytj(){
if((document.f1.message.value).replace(/\s/,"")==""){alert("请输入您的宝贵建议或意见内容");document.f1.message.focus();return false;}	
if((document.f1.key.value).replace(/\s/,"")==""){alert("请输入验证码");document.f1.key.focus();return false;}	
f1.action="suggest.html?control=add";
}

function xqtj(){
cstr=",";
c=document.getElementById("smallsx").innerHTML;
for(i=1;i<=c;i++){cstr=cstr+document.getElementById("sxd"+i).value+",";}
if((document.f1.tit.value).replace(/\s/,"")==""){alert("请输入标题");document.f1.tit.focus();return false;}	
if(!editor.hasContents()){alert("请输入详细内容");editor.focus();return false;}
if((document.f1.qq.value).replace(/\s/,"")==""){alert("请输入QQ号码");document.f1.qq.focus();return false;}	
if((document.f1.sxd1.value).replace(/\s/,"")==""){alert("请选择源码类型");document.f1.sxd1.focus();return false;}	
if((document.f1.key.value).replace(/\s/,"")==""){alert("请输入验证码");document.f1.key.focus();return false;}	
document.getElementById("tjbtn").style.display="none";
document.getElementById("tjing").style.display="";
f1.action="post_buy.html?control=add-amp-c="+cstr;
}