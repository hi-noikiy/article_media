<?php
include("../config/conn.php");//���ο�����ϵQQ:120036745//���ο�����ϵQQ:12-0036-745
include("../config/function.php");
AdminSes_audit();
$id=$_GET[id];
while0("*","epzhu_payreng where id=".$id);if(!$row=mysql_fetch_array($res)){php_toheader("renglist.php");}
if(1==$row[type1]){$ty="֧����";}
elseif(2==$row[type1]){$ty="΢��";}
$sj=date("Y-m-d H:i:s");
$uip=$_SERVER["REMOTE_ADDR"];
 
if($_GET[control]=="update"){
 $zt=intval(sqlzhuru($_POST[R1]));
 $money1=$_POST[tmoney1];
 $ddbh=$_POST[tddbh];
 if(1==$zt && 2!=$row[ifok]){
  $tit=$ty."�˹�����";
  intotable("epzhu_moneyrecord","bh,userid,tit,moneynum,sj,uip,admin,rengbh","'".time()."',".$row[userid].",'".$tit."',".$money1.",'".$sj."','".$uip."',".$row[type1].",'".$ddbh."'");
  updatetable("epzhu_user","money1=money1+".$money1." where id=".$row[userid]);
  updatetable("epzhu_payreng","money1=".$money1.",ddbh='".$ddbh."',ifok=2 where id=".$id);
 }elseif(2==$zt){
 deletetable("epzhu_payreng where id=".$id);
 }
php_toheader("renglist.php");
}
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
r=document.getElementsByName("R1");rr="";for(i=0;i<r.length;i++){if(r[i].checked==true){rr=r[i].value;}}if(rr==""){alert("��ѡ�����״̬��");return false;}
if(confirm("ȷ��ִ�иò�����")){layer.msg('�����ύ', {icon: 16  ,time: 0,shade :0.25});f1.action="reng.php?id=<?=$id?>&control=update";}else{return false;}
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
 <? $leftid=4;include("menu_user.php");?>

<div class="right">
 <div class="rights">
 <strong>��ʾ��</strong><br>
 <span class="green">����ʧ�ܣ����Զ�ɾ���ü�¼������˶���ʵ��������һ����ֵ��¼����Ա����</span>
 </div>
 <div class="bqu1">
 <a href="javascript:void(0);" class="a1">�˹�����</a>
 <a href="renglist.php">�����б�</a>
 </div> 
 <!--B-->
 <div class="rkuang">
 <form name="f1" method="post" onsubmit="return tj()">
 <ul class="uk">
 <li class="l1">��Ա��Ϣ��</li>
 <li class="l2">
 <? while1("uid,nc","epzhu_user where id=".$row[userid]);$row1=mysql_fetch_array($res1);?>
 <input type="text" class="inp redony" readonly="readonly" size="60" value="<?=$row1[uid]?> �ǳ�:<?=$row1[nc]?>" /> 
 <span class="fd"><a href="user_ses.php?uid=<?=$row1[uid]?>" target="_blank">����̨</a></span>
 </li>
 <li class="l1">���˷�ʽ��</li>
 <li class="l2"><input type="text" class="inp redony" readonly="readonly" size="40" value="<?=$ty?>" /></li>
 <li class="l1">�ύʱ�䣺</li>
 <li class="l2"><input type="text" class="inp redony" readonly="readonly" size="40" value="<?=$row[sj]?>" /></li>
 <li class="l1">���˽�</li>
 <li class="l2"><input type="text" class="inp" name="tmoney1" size="40" value="<?=$row[money1]?>" /></li>
 <li class="l1">��ֵ�����ţ�</li>
 <li class="l2"><input type="text" class="inp" name="tddbh" size="40" value="<?=$row[ddbh]?>" /></li>
 </ul>
 
 <ul class="rcap"><li class="l1"></li><li class="l2">����Ա����</li><li class="l3"></li></ul>
 <ul class="uk">
 <li class="l1">������</li>
 <li class="l2">
 <span class="finp">
 <? if(1==$row[ifok]){?>
 <label class="blue"><input name="R1" type="radio" value="1" /> ���˳ɹ����Ѿ��յ�Ǯ</label>
 <? }else{?>
 <label class="blue"><input name="R1" type="radio" value="" disabled="disabled" /> �Ѿ��Թ��ˣ������ظ�����</label>
 <? }?>
 <label class="red"><input name="R1" type="radio" value="2" /> ����ʧ��</label>
 </span>
 </li>
 </ul>
 <ul class="uk uk0">
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