<?php
include("../config/conn.php");//���ο�����ϵQQ:120036745//���ο�����ϵQQ:12-0036-745
include("../config/function.php");
AdminSes_audit();
$sj=date("Y-m-d H:i:s");
$ty1id=$_GET[ty1id];

//������ʼ
if($_GET[control]=="add"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){Audit_alert("Ȩ�޲���","default.php");}
 zwzr();
 if(panduan("*","epzhu_type where admin=2 and type1='".sqlzhuru($_POST[t0])."' and type2='".sqlzhuru($_POST[t1])."'")==1)
 {Audit_alert("�÷����Ѵ��ڣ�","type2.php?ty1id=".$ty1id);}
 intotable("epzhu_type","admin,type1,type2,xh,sj,buyform","2,'".sqlzhuru($_POST[t0])."','".sqlzhuru($_POST[t1])."',".sqlzhuru($_POST[t2]).",'".$sj."','".sqlzhuru($_POST[buyform])."'");$id=mysql_insert_id();
 move_uploaded_file($_FILES["inp1"]['tmp_name'], "../upload/type/type2_".$id.".png");
 php_toheader("type2.php?t=suc&ty1id=".$ty1id);
 
}elseif($_GET[control]=="update"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){Audit_alert("Ȩ�޲���","default.php");}
 zwzr();
 if(panduan("*","epzhu_type where admin=2 and type1='".sqlzhuru($_POST[t0])."' and type2='".sqlzhuru($_POST[t1])."' and id<>".$_GET[id])==1)
 {Audit_alert("�÷����Ѵ��ڣ�","type2.php?action=update&id=".$_GET[id]."&ty1id=".$ty1id);}
 updatetable("epzhu_type","type2='".sqlzhuru($_POST[t1])."' where type1='".sqlzhuru($_POST[oldty1])."' and type2='".sqlzhuru($_POST[oldty2])."'");
 updatetable("epzhu_type","sj='".$sj."',xh=".sqlzhuru($_POST[t2]).",buyform='".sqlzhuru($_POST[buyform])."' where id=".$_GET[id]);
 move_uploaded_file($_FILES["inp1"]['tmp_name'], "../upload/type/type2_".$_GET[id].".png");
 php_toheader("type2.php?t=suc&action=update&id=".$_GET[id]."&ty1id=".$ty1id);

}
//�������

while0("*","epzhu_type where id=".$ty1id);if(!$row=mysql_fetch_array($res)){php_toheader("typelist.php");}
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
 <? $leftid=1;include("menu_quanfenlei.php");?>

<div class="right">
 
 <? if($_GET[t]=="suc"){systs("��ϲ���������ɹ���","type2.php?action=".$_GET[action]."&ty1id=".$ty1id."&id=".$_GET[id]);}?>
 
 <div class="bqu1">
 <a href="javascript:void(0);" class="a1"><?=$row[type1]?></a>
 <a href="typelist.php">�����б�</a>
 </div> 

 <!--begin-->
 <div class="rkuang">
 <? if($_GET[action]!="update"){?>
 <script language="javascript">
 function tj(){
 if((document.f1.t1.value).replace(/\s/,"")==""){alert("���������ƣ�");document.f1.t1.focus();return false;}
 if((document.f1.t2.value).replace(/\s/,"")=="" || isNaN(document.f1.t2.value)){alert("��������Ч������ţ�");document.f1.t2.focus();return false;}
 layer.msg('�����ύ', {icon: 16  ,time: 0,shade :0.25});
 f1.action="type2.php?control=add&ty1id=<?=$ty1id?>";
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()" enctype="multipart/form-data">
 <ul class="uk">
 <li class="l1">�������ƣ�</li>
 <li class="l2"><input type="text" class="inp redony" readonly="readonly" name="t0" value="<?=$row[type1]?>" /></li>
 <li class="l1">�������ƣ�</li>
 <li class="l2"><input type="text" class="inp" name="t1" /></li>
 <li class="l1">����ͼ�꣺</li>
 <li class="l2"><input type="file" class="inp1" name="inp1" id="inp1" size="15" accept=".jpg,.gif,.jpeg,.png"><span class="fd">����ʵ������ϴ�</span></li>
 <li class="l4">����ģ�壺</li>
 <li class="l5"><textarea name="buyform"></textarea></li>
 <li class="l1">ģ��˵����</li>
 <li class="l21">���� <span class="feng">�������ʺ�</span> һ��һ��������Ҫ�󣬿�����</li>
 <li class="l1">����</li>
 <li class="l2"><input type="text" class="inp" name="t2" value="<?=returnxh("epzhu_type"," and type1='".$row[type1]."' and admin=2")?>" /> <span class="fd">���ԽС��Խ��ǰ</span></li>
 <li class="l3"><input type="submit" value="�����޸�" class="btn1" /></li>
 </ul>
 </form>
 
 <? 
 }elseif($_GET[action]=="update"){
 while0("*","epzhu_type where admin=2 and id=".$_GET[id]);if(!$row=mysql_fetch_array($res)){php_toheader("typelist.php");}
 ?>
 <script language="javascript">
 function tj(){
 if((document.f1.t1.value).replace(/\s/,"")==""){alert("���������ƣ�");document.f1.t1.focus();return false;}
 if((document.f1.t2.value).replace(/\s/,"")=="" || isNaN(document.f1.t2.value)){alert("��������Ч������ţ�");document.f1.t2.focus();return false;}
 layer.msg('�����ύ', {icon: 16  ,time: 0,shade :0.25});
 f1.action="type2.php?control=update&id=<?=$row[id]?>&ty1id=<?=$ty1id?>";
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()" enctype="multipart/form-data">
 <input type="hidden" value="<?=$row[type1]?>" name="oldty1" />
 <input type="hidden" value="<?=$row[type2]?>" name="oldty2" />
 <ul class="uk">
 <li class="l1">�������ƣ�</li>
 <li class="l2"><input type="text" class="inp redony" readonly="readonly" name="t0" value="<?=$row[type1]?>" /></li>
 <li class="l1">�������ƣ�</li>
 <li class="l2"><input type="text" value="<?=$row[type2]?>" class="inp" name="t1" /></li>
 <li class="l1">����ͼ�꣺</li>
 <li class="l2"><input type="file" name="inp1" id="inp1" class="inp1" size="15" accept=".jpg,.gif,.jpeg,.png"><span class="fd">����ʵ������ϴ�</span></li>
 <? $ntp="../upload/type/type2_".$row[id].".png";if(is_file($ntp)){?>
 <li class="l8"></li>
 <li class="l9"><img src="<?=$ntp?>" width="55" height="55" /></li>
 <? }?>
 <li class="l4">����ģ�壺</li>
 <li class="l5"><textarea name="buyform"><?=$row[buyform]?></textarea></li>
 <li class="l1">ģ��˵����</li>
 <li class="l21">���� <span class="feng">�������ʺ�</span> һ��һ��������Ҫ�󣬿�����</li>
 <li class="l1">����</li>
 <li class="l2"><input type="text" class="inp" name="t2" value="<?=$row[xh]?>" /> <span class="fd">���ԽС��Խ��ǰ</span></li>
 <li class="l3"><input type="submit" value="�����޸�" class="btn1" /></li>
 </ul>
 </form>
 <? }?>
 </div>
 <!--end-->
 
</div>

</div>

<?php include("bottom.php");?>
</body>
</html>