<?php
include("../config/conn.php");//���ο�����ϵQQ:120036745//���ο�����ϵQQ:12-0036-745
include("../config/function.php");
AdminSes_audit();
$sj=date("Y-m-d H:i:s");
$ty1id=$_GET[ty1id];
$ty2id=$_GET[ty2id];
$ty1name=returntype(1,$ty1id);
$ty2name=returntype(2,$ty2id);

//������ʼ
if($_GET[control]=="add"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){Audit_alert("Ȩ�޲���","default.php");}
 zwzr();
 if(panduan("*","epzhu_type where admin=3 and type1='".sqlzhuru($_POST[t100])."' and type2='".sqlzhuru($_POST[t99])."' and type3='".sqlzhuru($_POST[t1])."'")==1)
 {Audit_alert("�÷����Ѵ��ڣ�","type3.php?ty1id=".$ty1id."&ty2id=".$ty2id);}
 intotable("epzhu_type","admin,type1,type2,type3,xh,sj,col","3,'".sqlzhuru($_POST[t100])."','".sqlzhuru($_POST[t99])."','".sqlzhuru($_POST[t1])."',".sqlzhuru($_POST[t2]).",'".$sj."','".sqlzhuru($_POST[tcol])."'");
 php_toheader("type3.php?t=suc&ty1id=".$ty1id."&ty2id=".$ty2id);
 
}elseif($_GET[control]=="update"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){Audit_alert("Ȩ�޲���","default.php");}
 zwzr();
 if(panduan("*","epzhu_type where admin=3 and type1='".sqlzhuru($_POST[t100])."' and type2='".sqlzhuru($_POST[t99])."' and type3='".sqlzhuru($_POST[t1])."' and id<>".$_GET[id])==1)
 {Audit_alert("�÷����Ѵ��ڣ�","type3.php?action=update&id=".$_GET[id]."&ty1id=".$ty1id."&ty2id=".$ty2id);}
 updatetable("epzhu_type","type3='".sqlzhuru($_POST[t1])."' where type1='".$ty1name."' and type2='".$ty2name."' and type3='".sqlzhuru($_POST[oldty3])."'");
 updatetable("epzhu_type","sj='".$sj."',xh=".sqlzhuru($_POST[t2]).",col='".sqlzhuru($_POST[tcol])."' where id=".$_GET[id]);
 php_toheader("type3.php?t=suc&action=update&id=".$_GET[id]."&ty1id=".$ty1id."&ty2id=".$ty2id);

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
 <? $leftid=1;include("menu_quanfenlei.php");?>

<div class="right">
 
 <? if($_GET[t]=="suc"){systs("��ϲ���������ɹ���","type3.php?action=".$_GET[action]."&ty1id=".$ty1id."&ty2id=".$ty2id."&id=".$_GET[id]);}?>
 <div class="bqu1">
 <a href="javascript:void(0);" class="a1"><?=$ty2name?></a>
 <a href="typelists.php?ty1id=<?=$ty1id?>">�����б�</a>
 </div> 
 
 <!--begin-->
 <div class="rkuang">
 <? if($_GET[action]!="update"){?>
 <script language="javascript">
 function tj(){
 if((document.f1.t1.value).replace(/\s/,"")==""){alert("���������ƣ�");document.f1.t1.focus();return false;}
 if((document.f1.t2.value).replace(/\s/,"")=="" || isNaN(document.f1.t2.value)){alert("��������Ч������ţ�");document.f1.t2.focus();return false;}
 layer.msg('�����ύ', {icon: 16  ,time: 0,shade :0.25});
 f1.action="type3.php?control=add&ty1id=<?=$ty1id?>&ty2id=<?=$ty2id?>";
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()">
 <ul class="uk">
 <li class="l1">�������ƣ�</li>
 <li class="l2"><input type="text" class="inp redony" readonly="readonly" name="t100" value="<?=$ty1name?>" /></li>
 <li class="l1">�������ƣ�</li>
 <li class="l2"><input type="text" class="inp redony" readonly="readonly" name="t99" value="<?=$ty2name?>" /></li>
 <li class="l1">�������ƣ�</li>
 <li class="l2"><input type="text" class="inp" name="t1" /></li>
 <li class="l1">��ɫֵ��</li>
 <li class="l2"><input type="text" class="inp" name="tcol" value="#333" /><span class="fd"><a href="http://www.yjcode.com/tech/view114.html" target="_blank">ʲô����ɫֵ��</a></span></li>
 <li class="l1">����</li>
 <li class="l2"><input type="text" class="inp" name="t2" value="<?=returnxh("epzhu_type"," and type1='".$ty1name."'  and type2='".$ty2name."' and admin=3")?>" /> <span class="fd">���ԽС��Խ��ǰ</span></li>
 <li class="l3"><input type="submit" value="�����޸�" class="btn1" /></li>
 </ul>
 </form>
 
 <? 
 }elseif($_GET[action]=="update"){
 while0("*","epzhu_type where admin=3 and id=".$_GET[id]);if(!$row=mysql_fetch_array($res)){php_toheader("typelist.php");}
 ?>
 <script language="javascript">
 function tj(){
 if((document.f1.t1.value).replace(/\s/,"")==""){alert("���������ƣ�");document.f1.t1.focus();return false;}
 if((document.f1.t2.value).replace(/\s/,"")=="" || isNaN(document.f1.t2.value)){alert("��������Ч������ţ�");document.f1.t2.focus();return false;}
 layer.msg('�����ύ', {icon: 16  ,time: 0,shade :0.25});
 f1.action="type3.php?control=update&id=<?=$row[id]?>&ty1id=<?=$ty1id?>&ty2id=<?=$ty2id?>";
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()">
 <input type="hidden" value="<?=$row[type3]?>" name="oldty3" />
 <ul class="uk">
 <li class="l1">�������ƣ�</li>
 <li class="l2"><input type="text" class="inp redony" readonly="readonly" name="t100" value="<?=$ty1name?>" /></li>
 <li class="l1">�������ƣ�</li>
 <li class="l2"><input type="text" class="inp redony" readonly="readonly" name="t99" value="<?=$ty2name?>" /></li>
 <li class="l1">�������ƣ�</li>
 <li class="l2"><input type="text" value="<?=$row[type3]?>" class="inp" name="t1" /></li>
 <li class="l1">��ɫֵ��</li>
 <li class="l2"><input type="text" value="<?=$row[col]?>" class="inp" name="tcol" /><span class="fd"><a href="http://www.yjcode.com/tech/view114.html" target="_blank">ʲô����ɫֵ��</a></span></li>
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