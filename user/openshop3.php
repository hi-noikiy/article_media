<?
include("../config/conn.php");//���ο�����ϵQQ:120036745//���ο�����ϵQQ:120036745
include("../config/function.php");//��-�ο�-��-��-ϵQ-Q:12-00-3674-5
sesCheck();
$sqluser="select * from epzhu_user where uid='".$_SESSION[SHOPUSER]."'";mysql_query("SET NAMES 'GBK'");$resuser=mysql_query($sqluser);
$rowuser=mysql_fetch_array($resuser);

//��������ʼ
if($_POST[jvs]=="openshop"){
 zwzr();
 updatetable("epzhu_user","shopzt=0 where uid='".$_SESSION[SHOPUSER]."' and shopzt=3");
 php_toheader("openshop1.php");
}
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
if(confirm("ȷ�������ύ����������")){tjwait();f1.action="openshop3.php";}else{return false;}
}
</script>
</head>
<body>
<? include("../tem/top.html");?>
<? include("../tem/userepzhucom.html");?>

<div class="bfb bfbuser">
<div class="yjcode">

<ul class="dqwz">
<li class="l1">����λ�ã�<a href="../" class="acy">��ҳ</a> > <a href="./" class="acy">��Ա����</a> > ���뿪��</li>
</ul>
<? $leftid=1;include("left.php");?>
<!--RB-->
<div class="right">
 <? include("kdcap.php");?>
 <script language="javascript">
 document.getElementById("step3").className="l1 l11";
 </script>

 <form name="f1" method="post" onsubmit="return tj()">
 <input type="hidden" value="openshop" name="jvs" />
 <ul class="uk">
 <li class="l1">��˽����</li>
 <li class="l21"><?=returnshopztv($rowuser[shopzt])?></li>
 <li class="l1"></li>
 <li class="l21">�������ʣ���<a href="../help/aboutview4.html" class="blue" target="_blank">�����ϵ��վ�ͷ�</a></li>
 <? if(3==$rowuser[shopzt]){?>
 <li class="l1">����ԭ��</li>
 <li class="l21"><?=$rowuser[shopztsm]?></li>
 <li class="l3"></li>
 <li class="l4"><?=tjbtnr("�����ύ")?></li>
 <? }?>
 </ul>
 </form>

</div> 
<!--RE-->

</div>
</div>
<div class="yizhanw"> <div class="yizhanw2"><? include("../tem/bottom.html");?></div> </div>
</body>
</html>