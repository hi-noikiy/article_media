<?php
include("../config/conn.php");//���ο�����ϵQQ:120036745//���ο�����ϵQQ:12-0036-745
include("../config/function.php");
AdminSes_audit();
$id=$_GET[id];
while0("*","epzhu_user where id=".$id);if(!$row=mysql_fetch_array($res)){php_toheader("userlist.php");}

//������ʼ
if($_GET[control]=="update"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0701,")){Audit_alert("Ȩ�޲���","default.php");}
 zwzr();
 $d1=intval($_POST[d1]);
 $t=sqlzhuru($_POST[t2]);
 $t1=sprintf("%.2f",$_POST[t1]);
 if($d1==1){$money1=abs($t1);$tit=returnjgdw($t,"","�ʻ�����ֵ");PointIntoM($id,$tit,$money1);PointUpdateM($id,$money1);}
 elseif($d1==2){$money1=abs($t1)*(-1);$tit=returnjgdw($t,"","�ʻ����۳�");PointIntoM($id,$tit,$money1);PointUpdateM($id,$money1); }
 elseif($d1==3){
 if($row[money1]<$t1){Audit_alert("����������ʧ��","usermoney.php?id=".$id);}
 $money1=abs($t1)*(-1);$tit=returnjgdw($t,"","�ʻ�����");PointIntoM($id,$tit,$money1);PointUpdateM($id,$money1);
 updatetable("epzhu_user","djmoney=djmoney+".abs($t1)." where id=".$id);
 }elseif($d1==4){
 if($row[djmoney]<$t1){Audit_alert("����������ⶳʧ��","usermoney.php?id=".$id);}
 $money1=abs($t1);$tit=returnjgdw($t,"","�ʻ����ⶳ");PointIntoM($id,$tit,$money1);PointUpdateM($id,$money1);
 updatetable("epzhu_user","djmoney=djmoney-".abs($t1)." where id=".$id);
 }
 
 php_toheader("usermoney.php?t=suc&id=".$id);

}elseif($_GET[control]=="ql"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0701,")){Audit_alert("Ȩ�޲���","default.php");}
 PointIntoM($id,"ͬ���������",0);
 updatetable("epzhu_user","money1=0 where id=".$id);
 php_toheader("usermoney.php?t=suc&id=".$id);

}
//�������
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?=webname?>����ϵͳ</title>
<link href="css/basic.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script language="javascript" src="js/basic.js"></script>
<script language="javascript" src="js/layer.js"></script>
<script language="javascript">
function tj(){
 if((document.f1.t1.value).replace(/\s/,"")==""){alert("��������Ч�Ľ�Ǯ����!");document.f1.t1.select();return false;}
 if(isNaN(document.f1.t1.value)){alert("��������Ч�Ľ�Ǯ����!");document.f1.t1.select();return false;}
 layer.msg('�����ύ', {icon: 16  ,time: 0,shade :0.25});
 f1.action="usermoney.php?control=update&id=<?=$row[id]?>";
 }
function ql(){
if(confirm("ֻҪ�����ʽ�����쳣ʱ�������ñ�������ȷ����")){location.href="usermoney.php?id=<?=$id?>&control=ql";}else{return false;}
}
</script>
</head>
<body>
<? include("top.php");?>
<script language="javascript">
document.getElementById("menu2").className="a1";
</script>
<? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0702,")){echo "<div class='noneqx'>��Ȩ��</div>";exit;}?>

<div class="yjcode">
 <? $leftid=1;include("menu_user.php");?>

<div class="right">
 <? if($_GET[t]=="suc"){systs("��ϲ���������ɹ���","usermoney.php?id=".$id);}?>
 <? include("rightcap3.php");?>
 <script language="javascript">document.getElementById("rtit3").className="a1";</script>
 <!--B-->
 <div class="rkuang">
 <form name="f1" method="post" onsubmit="return tj()">
 <ul class="uk">
 <li class="l1">��Ա�ʺţ�</li>
 <li class="l2"><input type="text" class="inp redony" readonly="readonly" name="tuid" size="20" value="<?=$row[uid]?>" /></li>
 <li class="l1">������</li>
 <li class="l2"><input class="inp redony" readonly="readonly" value="<?=sprintf("%.2f",$row[money1])?>" size="10" type="text"/><span class="fd">��<a href="javascript:ql()">�������</a>��</span></li>
 <li class="l1">�����</li>
 <li class="l2"><input class="inp redony" readonly="readonly" value="<?=sprintf("%.2f",$row[djmoney])?>" size="10" type="text"/></li>
 <li class="l1">��Ǯ����</li>
 <li class="l2">
 <select name="d1" class="inp">
 <option value="1">�ʻ�����ֵ</option>
 <option value="2">�ʻ����۳�</option>
 <option value="3">�ʻ�����</option>
 <option value="4">�ʻ����ⶳ</option>
 </select>
 </li>
 <li class="l1">��Ǯ������</li>
 <li class="l2"><input name="t1" class="inp" size="10" type="text" /></li>
 <li class="l1">˵����</li>
 <li class="l2"><input name="t2" class="inp" size="50" type="text" /></li>
 <li class="l3"><input type="submit" value="�����޸�" class="btn1" /></li>
 </ul>
 </form>
 </div>
 <!--E-->
 
</div>
</div>
<?php include("bottom.php");?>
</body>
</html>