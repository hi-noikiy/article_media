<?
include("../config/conn.php");//���ο�����ϵQQ:120036745//���ο�����ϵQQ:120036745
include("../config/functionmg.php");
require("../config/tpclass.php");
sesCheck();
$bh=$_GET[bh];
$mybh=$_GET[mybh];
$userid=returnuserid($_SESSION[SHOPUSER]);
while0("*","epzhu_provideo where bh='".$mybh."' and probh='".$bh."' and userid=".$userid);if(!$row=mysql_fetch_array($res)){php_toheader("provideolistmg.php?bh=".$bh);}

//������ʼ
if($_GET[control]=="update"){
 zwzr();
 if(1==intval($_POST[d1])){$u=$_POST[t2];}else{$u=inp_tp_upload(1,"../upload/".$row[userid]."/".$bh."/",$mybh);if(!empty($u)){$u="../upload/".$row[userid]."/".$bh."/".$u;}}
 if(!empty($u)){$ses=",url='".$u."'";}
 if($rowcontrol[ifproduct]=="on"){$nzt=0;}else{$nzt=1;}
 $iftj=intval($_POST[tiftj]);
 if(1==$iftj){updatetable("epzhu_provideo","iftj=0 where probh='".$bh."'");}
 updatetable("epzhu_provideo","tit='".sqlzhuru($_POST[ttit])."'".$ses.",iftj=".$iftj.",admin=".$_POST[d1].",zt=".$nzt." where id=".$row[id]);
 uploadtpnodata(2,"upload/".$row[userid]."/".$bh."/",$mybh.".jpg","allpic",140,84,0,0,"no");
 php_toheader("provideomg.php?t=suc&mybh=".$mybh."&bh=".$bh);

}
//�������
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><div class="yjcode"><? adwhile("ADTOP");?></div>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�û�������� - <?=webname?></title>
<link href="../css/basic.css" rel="stylesheet" type="text/css" />
<link href="css/index.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="js/index.js"></script>
<script language="javascript" src="../js/jquery.min.js"></script>
<script language="javascript" src="../js/layer.js"></script>
<script language="javascript" src="../js/layui.js"></script>
<script language="javascript" src="../js/common.js"></script>
<script language="javascript">
function tj(){
if((document.f1.ttit.value).replace(/\s/,"")==""){alert("���������");document.f1.ttit.focus();return false;}
tjwait();
f1.action="provideomg.php?bh=<?=$bh?>&control=update&mybh=<?=$row[bh]?>";
}
function infcha(){
d=parseInt(document.f1.d1.value);
document.getElementById("infout").style.display="none";
document.getElementById("infmy").style.display="none";
if(d==1){document.getElementById("infout").style.display="";}
else if(d==2){document.getElementById("infmy").style.display="";}
}
</script>
</head>
<body>
<? include("../tem/top.html");?>
<? include("../tem/userepzhucom.html");?>

<div class="bfb bfbuser">
<div class="yjcode">
<ul class="dqwz">
<li class="l1">����λ�ã�<a href="../" class="acy">��ҳ</a> > <a href="./" class="acy">��Ա����</a> > ��Ʒ��Ƶ����</li>
</ul>
<? $leftid=1;include("leftmg.php");?>

<!--RB-->
<div class="right">

 <? include("protopmg.php");?>
 <? include("rcap3mg.php");?>
 <script language="javascript">
 document.getElementById("rcap2").className="g_ac0_h g_bc0_h";
 </script>
 <? systs("��ϲ���������ɹ�!","provideomg.php?bh=".$bh."&mybh=".$_GET[mybh])?>
 
 <form name="f1" method="post" onsubmit="return tj()" enctype="multipart/form-data">
 <input type="hidden" value="video" name="jvs" />
 <ul class="uk">
 <li class="l1"><span class="red">*</span> ���⣺</li>
 <li class="l2"><input type="text" size="50" value="<?=$row[tit]?>" class="inp" name="ttit" /> </li>
 <li class="l1">��Ƶ��ͼ��</li>
 <li class="l2"><span class="finp"><input type="file" name="inp2" id="inp2" size="25"> ��ѳߴ磺140*84</span></li>
 <? $tp="../upload/".$userid."/".$bh."/".$mybh.".jpg";if(is_file($tp)){?>
 <li class="l5"></li>
 <li class="l6"><img src="<?=$tp?>" width="140" height="84" /></li>
 <? }?>
 <li class="l1">�Ƽ���ţ�</li>
 <li class="l2">
 <span class="finp">
 <select name="tiftj" class="inp">
 <option value="1">�Ƽ������ڸ���Ʒ��ҳ�ܿ���</option>
 <option value="0"<? if(0==$row[iftj]){?> selected="selected"<? }?>>���Ƽ�</option>
 </select>
 </span>
 </li>
 <li class="l1">��·��</li>
 <li class="l2">
 <span class="finp">
 <select name="d1" onchange="infcha()" class="inp">
 <option value="1">�ⲿ��Ƶ��ַ</option>
 <option value="2"<? if(2==$row[admin]){?> selected="selected"<? }?>>�Լ��ϴ�</option>
 </select>
 </span>
 </li>
 </ul>
 
 <ul class="uk" id="infout" style="display:none;">
 <li class="l1">��Ƶ·����</li>
 <li class="l2"><input value="<?=$row[url]?>" name="t2" class="inp" style="width:500px;" type="text"/></li>
 <li class="l1">�ر�˵����</li>
 <li class="l21 red"><strong>��������Ѷ���ſ���Ƶ�Ĳ��ŵ�ַ����SWF��FLV��β��</strong></li>
 </ul>
 
 <ul class="uk" id="infmy" style="display:none;">
 <li class="l1">�Լ��ϴ���</li>
 <li class="l2"><input type="file" name="inp1" id="inp1" size="15" accept=".flv,.swf"> </li>
 <li class="l1">��Ƶ·����</li>
 <li class="l2"><input value="<?=$row[url]?>" readonly="readonly" class="inp redony" size="40" type="text"/> <span class="finp">[<a href="<?=$row[url]?>" target="_blank">����</a>]</span></li>
 <li class="l1">�ر�˵����</li>
 <li class="l21 red"><strong>��ѡ��swf��flv��׺����Ƶ�ļ�</strong></li>
 </ul>

 
 <ul class="uk">
 <li class="l3"></li>
 <li class="l4"><? tjbtnr("��һ��","provideolistmg.php?bh=".$bh)?></li>
 </ul>
 
 </form>

</div> 
<!--RE-->

</div>
</div>
<div class="yizhanw"> <div class="yizhanw2"><? include("../tem/bottom.html");?></div> </div>
<script language="javascript">
infcha();
</script>
</body>
</html>