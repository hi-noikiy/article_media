<?
include("../../config/conn.php");
include("../../config/function.php");
sesCheck_m();

$sqluser="select * from epzhu_user where uid='".$_SESSION[SHOPUSER]."'";mysql_query("SET NAMES 'GBK'");$resuser=mysql_query($sqluser);
$rowuser=mysql_fetch_array($resuser);
if(1==$rowuser[shopzt] || 2==$rowuser[shopzt] || 3==$rowuser[shopzt]){php_toheader("openshop3.php");}
$openbao=returnjgdw($rowcontrol[openbao],"",0);

//��������ʼ
if($_POST[yjcode]=="openshop"){
 zwzr();
 $t1=sha1(sqlzhuru($_POST[t1]));
 if(panduan("uid,pwd","epzhu_user where uid='".$_SESSION[SHOPUSER]."' and pwd='".$t1."'")==0){Audit_alert("��¼������֤ʧ�ܣ��������ԣ�","openshop2.php");}
 $d=preg_split("/xcf/",$_POST[d1]);
 while1("*","epzhu_openyue where id=".$d[2]);if(!$row1=mysql_fetch_array($res1)){Audit_alert("����ʧ�ܣ��������ԣ�","openshop2.php");}
 $m=$row1[money1]+$rowcontrol[openshop]+$openbao;
 if($m>$rowuser[money1]){Audit_alert("�������������ȳ�ֵ��","openshop2.php");}

 $sj=date("Y-m-d H:i:s");
 $dqsj=date('Y-m-d H:i:s',strtotime ("+".$row1[yue]." month",strtotime($sj)));
 if($dqsj<$sj){Audit_alert("����ʧ�ܣ����ѵ����������Ϊ2038�꣡","openshop2.php");}

 PointUpdateM($rowuser[id],$m*(-1));
 PointIntoM($rowuser[id],"���뿪�꣬���ɷ���(����".$row1[yue]."��)",$m*(-1));

 PointIntoB($rowuser[id],"������ɱ�֤��",$openbao,1);
 PointUpdateB($rowuser[id],$openbao); 

 updatetable("epzhu_user","openshop=".$m.",shopzt=1,dqsj='".$dqsj."',baomoney=".$openbao." where uid='".$_SESSION[SHOPUSER]."'");
 php_toheader("openshop3.php");
}
//����������
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
function tj(){
if((document.f1.t1.value).replace(/\s/,"")==""){layerts("�������¼����");return false;}	
if(document.f1.d1.value==""){layerts("��ѡ�񿪵�����");return false;}	
if(!confirm("ȷ���ύ��")){return false;}
layer.open({type: 2,content: '�����ύ',shadeClose:false});
f1.action="openshop2.php";
}
function fycha(){
d=(document.f1.d1.value).split("xcf");
a=addNum(0,d[1]);
b=addNum(a,<?=$rowcontrol[openshop]?>)
c=addNum(b,<?=$openbao?>)
document.getElementById("needmoney").innerHTML=c+"Ԫ";
}
</script>
</head>
<body>
<? include("topuser.php");?>

<div class="bfbtop1 box">
 <div class="d1" onClick="gourl('openshop1.php')"><img src="img/topleft.png" height="21" /></div>
 <div class="d2">��Ҫ����</div>
 <div class="d3"></div>
</div>

<? include("kdcap.php");?>
<script language="javascript">
document.getElementById("step2").className="d1 d11";
</script>

<form name="f1" method="post" onSubmit="return tj()">
<input type="hidden" value="openshop" name="yjcode" />
<div class="uk box">
 <div class="d1">��˷���<span class="s1"></span></div>
 <div class="d21"><?=$rowcontrol[openshop]?> Ԫ</div>
</div>
<div class="uk box">
 <div class="d1">�� ֤ ��<span class="s1"></span></div>
 <div class="d21"><?=$openbao?> Ԫ</div>
</div>
<div class="uk box">
 <div class="d1">��������<span class="s1"></span></div>
 <div class="d2">
 <select name="d1" onChange="fycha()" style="font-size:13px;">
 <? 
 while1("*","epzhu_openyue order by yue asc");while($row1=mysql_fetch_array($res1)){
 if($row1[yue] % 12==0){$nd=$row1[yue]/12;$nd=$nd."��";}else{$nd=$row1[yue]."����";}
 ?>
 <option value="<?=$row1[yue]?>xcf<?=$row1[money1]?>xcf<?=$row1[id]?>"><?=$nd?> (���ã�<?=$row1[money1]?>Ԫ)</option>
 <? }?>
 </select>
 </div>
 <div class="d3"><img src="img/jianright.png" height="13" /></div>
</div>
<div class="uk box">
 <div class="d1">�ܹ�����<span class="s1"></span></div>
 <div class="d21"><span id="needmoney" class="red"></span></div>
</div>
<div class="uk box">
 <div class="d1">�������<span class="s1"></span></div>
 <div class="d21"><span class="blue"><?=$rowuser[money1]?>Ԫ</span> [<a href="pay.php">�����ֵ</a>]</div>
</div>
<div class="uk box">
 <div class="d1">��¼����<span class="s1"></span></div>
 <div class="d2"><input type="password" class="inp" placeholder="�������¼����" name="t1" /></div>
</div>
<div class="fbbtn box">
 <div class="d1"><? tjbtnr_m("�� һ ��")?></div>
</div>

</form>
<script language="javascript">fycha();</script>
</body>
</html>