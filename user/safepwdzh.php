<?
include("../config/conn.php");//���ο�����ϵQQ:120036745//���ο�����ϵQQ:120036745
include("../config/function.php");//��-�ο�-��-��-ϵQ-Q:12-00-3674-5
sesCheck();

//��������ʼ
if($_POST[jvs]=="safepwd"){
 zwzr();
 $pwd=sha1(sqlzhuru($_POST[t1]));
 if(panduan("*","epzhu_user where uid='".$_SESSION[SHOPUSER]."' and zfmm='".$pwd."'")==0){Audit_alert("��ȫ����֤ʧ�ܣ��������ԣ�","safepwd.php");}
 $_SESSION[SAFEPWD]=$pwd;
 php_toheader("safepwd.php");
}
//����������

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
</head>
<body>
<? include("../tem/top.html");?>
<? include("../tem/userepzhucom.html");?>

<div class="bfb bfbuser">
<div class="yjcode">
<ul class="dqwz">
<li class="l1">����λ�ã�<a href="../" class="acy">��ҳ</a> > <a href="./" class="acy">��Ա����</a> > ��ȫ���¼</li>
</ul>
<? $leftid=5;include("left.php");?>
<!--RB-->
<div class="right">
 
 <? if(empty($_SESSION[SAFEPWD])){?>
 <script language="javascript">
 function tj(){
 if((document.f1.t1.value).replace(/\s/,"")==""){alert("�����밲ȫ��");document.f1.t1.focus();return false;}	
 tjwait();
 f1.action="safepwd.php";
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()">
 <input type="hidden" value="safepwd" name="jvs" />
 <ul class="uk">
 <li class="l1"><span class="red" style="font-weight:normal;">*</span> ��ȫ�룺</li>
 <li class="l2"><input type="password" class="inp" name="t1" /></li>
 <li class="l1"></li>
 <li class="l21 blue">���û�����ð�ȫ�룬�����ʺ�������е�¼��Ϊ�˰�ȫ�����������<a href="zfmm.php" class="red">���ö����İ�ȫ��</a></li>
 <li class="l3"></li>
 <li class="l4"><?=tjbtnr("��¼")?></li>
 </ul>
 </form>
 <? }else{?>
 <ul class="uk">
 <li class="l1"></li>
 <li class="l21 blue">���İ�ȫ���Ѿ�ͨ����֤���ɽ��и������</li>
 </ul>
 <? }?>

</div> 
<!--RE-->

</div>
</div>
<div class="yizhanw"> <div class="yizhanw2"><? include("../tem/bottom.html");?></div> </div>
</body>
</html>