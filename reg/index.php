<?
include("../config/conn.php");
include("../config/function.php");
if($_SESSION["SHOPUSER"]!=""){php_toheader("../user/");}

//��¼��֤��ʼ
if($_GET[action]=="login" && sqlzhuru($_POST[jvs])=="login"){
 zwzr();
 include("../tem/uc/login.php");
 $uid=sqlzhuru($_POST[t1]);$pwd=sqlzhuru($_POST[t2]);
 include("login_tem.php");
 php_toheader("../user/");

}elseif($_GET[action]=="mot" && sqlzhuru($_POST[jvs])=="mot"){
 zwzr();
 while0("id,uid,pwd,mot,ifmot,bdmot,zt","epzhu_user where mot='".sqlzhuru($_POST[mot])."' and bdmot='".sqlzhuru($_POST[yzm])."' and ifmot=1");
 if(!$row=mysql_fetch_array($res)){Audit_alert("������֤���������󣬷�������","index.php");}
 updatetable("epzhu_user","bdmot='".time()."' where id=".$row[id]);
 if(0==$row[zt]){Audit_alert("�����ʺ��ѱ����ã�����ϵ��վ�ͷ�����","./");}
 $sj=date("Y-m-d H:i:s");
 $uip=$_SERVER["REMOTE_ADDR"];
 intotable("epzhu_loginlog","admin,userid,sj,uip","1,".$row[id].",'".$sj."','".$uip."'");
 $_SESSION["SHOPUSER"]=$row[uid];
 php_toheader("../user/");

}
//��¼��֤����

?>
<html>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>��Ա��¼ - <?=webname?></title>
<link href="css/basic.css" rel="stylesheet" type="text/css" />
<link href="index.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../js/js/basic.js"></script>
<script language="javascript" src="index.js"></script>
<script src="http://res.wx.qq.com/connect/zh_CN/htmledition/js/wxLogin.js"></script>


<script language="javascript" src="js/jquery.m.js"></script>
<script language="javascript" src="js/layui/layui.js"></script>
<script language="javascript" src="js/common.js"></script>
<script language="javascript" src="js/member.js"></script>
<link href="css/basic.css" rel="stylesheet" type="text/css" />
<link href="css/member.css" rel="stylesheet" type="text/css" />

<link href="css/login.css" rel="stylesheet" type="text/css" />


<script language="javascript">
$(function(){
document.onkeydown = function(e){
var ev = document.all ? window.event : e;
if(ev.keyCode==13) {
$('.submit').click();
}
}
});
</script>

<script language="javascript">
var sz;
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
    var response = xmlHttp.responseText;
	response=response.replace(/[\r\n]/g,'');
	mottsv("","");
	if(response=="True"){
		mottsv("�ú����ڱ�վδ��","dts");document.getElementById("fs1").style.display="";document.getElementById("fs2").style.display="none";return false;
	}else if(response=="err1"){
		mottsv("��������ȷ��ͼ����֤��","dts");document.getElementById("fs1").style.display="";document.getElementById("fs2").style.display="none";return false;
	}else{
		sz=setInterval("sjzou()",1000);return false;
	}
  }
}

function yzonc(){
 if((document.getElementById("mot").value).replace("/\s/","")==""){mottsv("�������ֻ�����","dts");document.getElementById("mot").focus();return false;}
 if((document.getElementById("picyzm").value).replace("/\s/","")==""){mottsv("������ͼ����֤��","dts");document.getElementById("picyzm").focus();return false;}
 document.getElementById("sjzouv").innerHTML=120;
 document.getElementById("fs1").style.display="none";
 document.getElementById("fs2").style.display="";
 var url = "regchk.php?mob="+document.getElementById("mot").value+"&tpicyzm="+document.getElementById("picyzm").value;
 xmlHttp.open("post", url, true);
 xmlHttp.onreadystatechange = updatePage;
 xmlHttp.send(null);
}

function sjzou(){
 s=parseInt(document.getElementById("sjzouv").innerHTML);
 if(s<=0){
  clearInterval(sz);
  document.getElementById("sjzouv").innerHTML=120;
  document.getElementById("fs1").style.display="";
  document.getElementById("fs2").style.display="none";
  return false;
 }else{document.getElementById("sjzouv").innerHTML=s-1;}
}

function mottsv(x,y){
 document.getElementById("motts").innerHTML=x;
 document.getElementById("motts").className=y;
}

function mottj(){
if((document.getElementById("mot").value).replace("/\s/","")==""){mottsv("�������ֻ�����","dts");document.getElementById("mot").focus();return false;}
if((document.getElementById("picyzm").value).replace("/\s/","")==""){mottsv("������ͼ����֤��","dts");document.getElementById("picyzm").focus();return false;}
if((document.getElementById("yzm").value).replace("/\s/","")==""){mottsv("�����������֤��","dts");document.getElementById("yzm").focus();return false;}
document.getElementById("tjbtn1").style.display="none";
document.getElementById("tjing1").style.display="";	
f2.action="index.php?action=mot";
}
</script>
</head>
<body>



    <!--loginHead Star -->
    <div class="loginHead">
        <div class="main clearfix">
    		<div class="logo fl"><a href="../"  target="_blank"><img src="/img/logo.png" /></a></div>
			<ul class="navList fl">
     
		</ul>
            <div class="loginBtnBar fr"><span class="gray fz14">������<?=webname?>�û���
30�����ע�ᣬ���ɼ��룡</span><a class="rlbtn greenBtn fz16" href="reg.php">����ע��</a></div>
        </div>  
    </div>
    <!--loginHead End -->

    <!--mainMin Star -->
    <div class="mainMin">
	
		<div class="tabs clearfix">

	
		<div class="wrap">

	    <div class="tab" style="display:block;">

        <div class="userLogin">
			<div class="show">
			<? while1("*","epzhu_ad where adbh='ADO01' and zt=0 order by xh asc");if($row1=mysql_fetch_array($res1)){$a="../gg/".$row1[bh].".".$row1[jpggif];}?>

		<img src="<?=$a?>" width="489" height="395" alt="վ����Ѷ" border="0">
			</div>
          
            <div class="userInfoLogin layui-form">
			
			
			
			
			
			
			
			
			

<div class="yjcode">

<div class="loginright fontyh">
 
 <? if($rowcontrol[ifmob]=="on"){?>
 <div class="cap<? if($rowcontrol[wxlogin]!="" && $rowcontrol[wxlogin]!=","){?> cap1<? }?>">
 <a class="a1" href="javascript:void(0);" onClick="caponc(1)" id="cap1">�����¼</a>
 <? if($rowcontrol[wxlogin]!="" && $rowcontrol[wxlogin]!=","){?><a class="a2" href="javascript:void(0);" onClick="caponc(3)" id="cap3">΢��ɨ��</a><? }?>
 <a class="a2" href="javascript:void(0);" onClick="caponc(2)" id="cap2">���ŵ�¼</a>
 </div>
 <? }?>
 <div id="loginmod1">
 <form name="f1" method="post" onSubmit="return login()">
 <div id="ts"></div>
 <ul class="u1">
 <li class="l1"><input autocomplete="off" disableautocomplete type="text" class="inp inp1" name="t1"></li>
 <li class="l1"><input autocomplete="off" disableautocomplete type="password" class="inp inp2" name="t2"></li>
 <li class="l2"><input id="tjbtn" type="submit" value="�� ¼"><div id="tjing" style="display:none;"><img src="../img/ajax_loader.gif" /><br>���ڵ�¼�����Ժ򡭡�</div></li>
 </ul>
 <input type="hidden" value="login" name="jvs" />
 </form>
 </div>
 
  <div id="loginmod3" style="display:none;">
   <div id="wxlogin"></div>
  <? $wxlogin=preg_split("/,/",$rowcontrol[wxlogin]);?>
  <script language="javascript">
  var obj = new WxLogin({
  id:"wxlogin", 
  appid: "<?=$wxlogin[0]?>", 
  scope: "snsapi_login", 
  redirect_uri: "<?=weburl?>reg/wxlogin.php",
  state: "",
  style: "",
  href: ""
  });
  </script>
  </div>
 
 <div id="loginmod2" style="display:none;">
 <form name="f2" method="post" onSubmit="return mottj()">
 <div id="motts"></div>
 <ul class="u1">
 <li class="l1"><input autocomplete="off" disableautocomplete type="text" class="inp inp3" id="mot" name="mot" /></li>
 <li class="l1">
 <input autocomplete="off" disableautocomplete type="text" class="inp inp0 inp4" id="picyzm" name="picyzm" />
 <img src="../config/getYZM.php" height="35" width="106" />
 </li>
 <li class="l1">
 <input autocomplete="off" disableautocomplete type="text" class="inp inp0 inp5" id="yzm" name="yzm" />
 <a href="javascript:void(0);" class="a1" id="fs1" onClick="yzonc()">��ȡ��֤��</a>
 <a href="javascript:void(0);" class="a2" id="fs2" style="display:none;"><span id="sjzouv">120</span>����ط�</a>
 </li>
 <li class="l2">
 <input type="submit" id="tjbtn1" value="�� ¼"><div id="tjing1" style="display:none;"><img src="../img/ajax_loader.gif" /><br>���ڵ�¼�����Ժ򡭡�</div>
 </li>
 </ul>
 <input type="hidden" value="mot" name="jvs" />
 </form>
 </div>
 
 <div class="d1" id="ksd1">
 <a href="../config/qq/oauth/index.php" target="_blank">QQ��¼</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="reg.php">���ע��</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="getmm.php">�������룿</a>
 </div>

</div>

</div>
</div>

<script language="javascript">
<? if($_GET[lx]=="mot"){?>
caponc(2);
<? }?>
</script>
			
			
			
			
			
			
           </div>          
        </div>
    	</div>
	
	</div>
	  
	</div>

   </div>
	 </div>


<script>
</script>
<div style="margin-bottom:50px"></div>
<div class="rl_foot">
<ul class="link">
<p><a href="<?=weburl?>help/aboutview2.html" target="_blank" rel="nofollow">��������</a>  
					<a href="<?=weburl?>help/aboutview3.html" target="_blank" rel="nofollow">������</a> 
					<a href="<?=weburl?>help/aboutview4.html" target="_blank" rel="nofollow">��ϵ����</a> 
					<a href="<?=weburl?>help/aboutview5.html" target="_blank" rel="nofollow">��˽����</a> 
					<a href="<?=weburl?>help/aboutview6.html" target="_blank" rel="nofollow" title=6>��������</a> <em>&nbsp;&nbsp;&nbsp; 2013-2018 <?=webname?> ��Ȩ���У�</em> </p>
				
</div><SCRIPT>
logingt();
$('input[name=username]').focus();
</SCRIPT>
</body>

</html>