<?php
include("../config/conn.php");//���ο�����ϵQQ:120036745//���ο�����ϵQQ:12-0036-745
include("../config/function.php");
AdminSes_audit();
//������ʼ
if($_GET[control]=="add"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0101,")){Audit_alert("Ȩ�޲���","default.php");}
 zwzr();
 $c=str_replace("\r","",($_POST[s1]));
 $d=preg_split("/\n/",$c);
 for($i=0;$i<=count($d);$i++){
  if(!empty($d[$i])){
   $e=preg_split("/\s/",$d[$i]);
   if(count($e)>1){
     if(panduan("ka","epzhu_paykami where ka='".$e[0]."'")==0){
     $mi="";
	 if(count($e)>=3){for($ei=2;$ei<count($e);$ei++){$mi=$mi."".$e[$ei];}}
	 $sj=date("Y-m-d H:i:s");
	 intotable("epzhu_paykami","ka,mi,money1,userid,ifok,sj","'".$e[1]."','".$mi."','".$e[0]."',0,0,'".$sj."'");
	 }
   }
  }
 }
 php_toheader("paykami.php?t=suc");
 
}elseif($_GET[control]=="update"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0101,")){Audit_alert("Ȩ�޲���","default.php");}
 zwzr();
 $id=$_GET[id];
 if(panduan("id,ka","epzhu_paykami where ka='".sqlzhuru($_POST[tka])."' and id<>".$id."")==1){
 Audit_alert("�����Ѵ��ڣ�����ʧ��!","paykami.php?action=update&id=".$id);}
 updatetable("epzhu_paykami","ka='".sqlzhuru($_POST[tka])."',mi='".sqlzhuru($_POST[tmi])."',money1=".sqlzhuru($_POST[tmoney1]).",ifok=".sqlzhuru($_POST[Rifok])." where id=".$id);
 php_toheader("paykami.php?t=suc&action=update&id=".$id);

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
</head>
<body>
<? include("top.php");?>
<script language="javascript">
document.getElementById("menu3").className="a1";
</script>
<? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0102,")){echo "<div class='noneqx'>��Ȩ��</div>";exit;}?>

<div class="yjcode">
 <? $leftid=2;include("menu_product.php");?>

<div class="right">
 <!--B-->
 <div class="rkuang">
 <? systs("��ϲ���������ɹ�!","paykami.php")?>
 
 <div class="bqu1">
 <a href="javascript:void(0);" class="a1">��ֵ������Ϣ</a>
 <a href="paykamilist.php">�����б�</a>
 </div> 
 
 <? if($_GET[action]==""){?>
 <script language="javascript">
 function tj(){
  layer.msg('�����ύ', {icon: 16  ,time: 0,shade :0.25});
  f1.action="paykami.php?control=add"; 
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()" enctype="multipart/form-data">
 <ul class="uk">
 <li class="l1">˵����</li>
 <li class="l21 red">�����ʽΪ��ֵ+�ո�+����+�ո�+���룬һ��һ�飬��50 AAAAA BBBBB</li>
 <li class="l12">�������ݣ�</li>
 <li class="l13"><textarea name="s1"></textarea></li>
 <li class="l3"><input type="submit" value="�����޸�" class="btn1" /></li>
 </ul>
 </form>
 
 <?
 }else{
 while0("*","epzhu_paykami where id=".$_GET[id]);if(!$row=mysql_fetch_array($res)){php_toheader("paykamilist.php");}
 ?>
 <script language="javascript">
 function tj(){
  layer.msg('�����ύ', {icon: 16  ,time: 0,shade :0.25});
  f1.action="paykami.php?control=update&id=<?=$_GET[id]?>"; 
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()">
 <input type="hidden" value="inf" name="jvs" />
 <ul class="uk">
 <li class="l1">��ֵ��</li>
 <li class="l2"><input type="text" class="inp" size="30" value="<?=$row[money1]?>" name="tmoney1" /></li>
 <li class="l1">���ţ�</li>
 <li class="l2"><input type="text" class="inp" size="30" value="<?=$row[ka]?>" name="tka" /></li>
 <li class="l1">���룺</li>
 <li class="l2"><input type="text" class="inp" size="30" value="<?=$row[mi]?>" name="tmi" /></li>
 <li class="l1">ʹ�������</li>
 <li class="l2">
 <label><input name="Rifok" type="radio" value="0"<? if(empty($row[ifok])){?> checked="checked"<? }?> /> δʹ��</label>
 <label><input name="Rifok" type="radio" value="1"<? if(1==$row[ifok]){?> checked="checked"<? }?> /> ��ʹ��</label>
 </li>
 <li class="l3"><input type="submit" value="�����޸�" class="btn1" /></li>
 </ul>
 </form>
 <? }?>
 </div>
 <!--E-->
 
</div>
</div>
<?php include("bottom.php");?>
</body>
</html>