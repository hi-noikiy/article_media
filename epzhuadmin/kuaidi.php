<?php
include("../config/conn.php");//���ο�����ϵQQ:120036745//���ο�����ϵQQ:12-0036-745
include("../config/function.php");
AdminSes_audit();
$sj=date("Y-m-d H:i:s");
$bh=$_GET[bh];
while0("*","epzhu_kuaidi where bh='".$bh."'");if(!$row=mysql_fetch_array($res)){php_toheader("kuaidilist.php");}

//������ʼ
if($_GET[control]=="update"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){Audit_alert("Ȩ�޲���","default.php");}
 zwzr();
 if(panduan("*","epzhu_kuaidi where tit='".sqlzhuru($_POST[ttit])."' and bh<>'".$bh."'")==1)
 {Audit_alert("�ÿ�ݹ�˾�Ѵ��ڣ�","kuaidi.php?bh=".$bh);}
 updatetable("epzhu_kuaidi","tit='".sqlzhuru($_POST[ttit])."',kdweb='".sqlzhuru($_POST[tkdweb])."',sj='".$sj."',xh=".sqlzhuru($_POST[t2]).",zt=0 where bh='".$bh."'");
 php_toheader("kuaidi.php?t=suc&bh=".$bh);

}
//�������

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?=webname?>�����̨</title>
<link href="css/basic.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script language="javascript" src="js/basic.js"></script>
<script language="javascript" src="js/layer.js"></script>
</head>
<body>
<? include("top.php");?>
<script language="javascript">
document.getElementById("menu1").className="a1";
</script>
<? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0302,")){echo "<div class='noneqx'>��Ȩ��</div>";exit;}?>

<div class="yjcode">
 <? $leftid=1;include("menu_quan.php");?>

<div class="right">
 
 <? if($_GET[t]=="suc"){systs("��ϲ���������ɹ���","kuaidi.php?bh=".$bh);}?>
 <div class="bqu1">
 <a href="javascript:void(0);" class="a1">��Ѷ�������</a>
 <a href="kuaidilist.php">�����б�</a>
 </div> 
 
 <!--begin-->
 <div class="rkuang">
 <script language="javascript">
 function tj(){
 if((document.f1.ttit.value).replace(/\s/,"")==""){alert("�������ݹ�˾���ƣ�");document.f1.ttit.focus();return false;}
 if((document.f1.t2.value).replace(/\s/,"")=="" || isNaN(document.f1.t2.value)){alert("��������Ч������ţ�");document.f1.t2.focus();return false;}
 layer.msg('�����ύ', {icon: 16  ,time: 0,shade :0.25});
 f1.action="kuaidi.php?control=update&bh=<?=$bh?>";
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()" enctype="multipart/form-data">
 <ul class="uk">
 <li class="l1"><span class="red">*</span> ��ݹ�˾���ƣ�</li>
 <li class="l2"><input type="text" value="<?=$row[tit]?>" class="inp" name="ttit" /></li>
 <li class="l1">�����ַ��</li>
 <li class="l2"><input type="text" value="<?=$row[kdweb]?>" class="inp" size="80" name="tkdweb" /></li>
 <li class="l1"><span class="red">*</span> ����</li>
 <li class="l2"><input type="text" class="inp" name="t2" value="<?=$row[xh]?>" /> <span class="fd">���ԽС��Խ��ǰ</span></li>
 <li class="l3"><input type="submit" value="�����޸�" class="btn1" /></li>
 </ul>
 </form>
 </div>
 <!--end-->
 
</div>

</div>

<?php include("bottom.php");?>
</body>
</html>