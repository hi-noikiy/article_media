<?php
include("../config/conn.php");//���ο�����ϵQQ:120036745//���ο�����ϵQQ:12-0036-745
include("../config/function.php");
AdminSes_audit();
$id=$_GET[id];
while0("*","epzhu_taskhf where taskty=0 and id=".$id);if(!$row=mysql_fetch_array($res)){php_toheader("taskhflist.php");}
if($_GET[control]=="update"){
 updatetable("epzhu_taskhf","sj='".$_POST[tsj]."',txt='".sqlzhuru1($_POST[content])."' where id=".$id);
 php_toheader("taskhf.php?t=suc&id=".$id);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?=webname?>����ϵͳ</title>
<link href="css/basic.css" rel="stylesheet" type="text/css" />
<link href="css/ad.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script language="javascript" src="js/basic.js"></script>
<script language="javascript" src="js/layer.js"></script>

<script type="text/javascript" charset="gbk" src="../config/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="gbk" src="../config/ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="gbk" src="../config/ueditor/lang/zh-cn/zh-cn.js"></script>
<script type="text/javascript" charset="gbk" src="../config/ueditor/unit.js"></script>

</head>
<body>
<? include("top.php");?>
<script language="javascript">
document.getElementById("menu5").className="a1";
</script>
<? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0602,")){echo "<div class='noneqx'>��Ȩ��</div>";exit;}?>

<div class="yjcode">
 <? $leftid=3;include("menu_ad.php");?>

<div class="right">

 <? if($_GET[t]=="suc"){systs("��ϲ���������ɹ���","taskhf.php?id=".$id);}?>
 <div class="bqu1">
 <a href="javascript:void(0);" class="a1">�������������Ϣ</a>
 <a href="tasklist.php">�����б�</a>
 </div> 
 <!--B-->
 <div class="rkuang">
 <script language="javascript">
 function tj(){
 layer.msg('�����ύ', {icon: 16  ,time: 0,shade :0.25});
 f1.action="taskhf.php?id=<?=$id?>&control=update";
 }
 </script>
 <? while1("bh,tit","epzhu_task where bh='".$row[bh]."'");$row1=mysql_fetch_array($res1);?>
 <form name="f1" method="post" onsubmit="return tj()">
 <ul class="uk">
 <li class="l1">���⣺</li>
 <li class="l2"><input type="text" size="90" value="<?=$row1[tit]?>" readonly="readonly" class="inp redony" /></li>
 <li class="l1">�����û���</li>
 <li class="l2"><input type="text" size="20" value="<?=returnuser($row[userid])?>" readonly="readonly" class="inp redony" /></li>
 <li class="l1">�����û���</li>
 <li class="l2"><input type="text" size="20" value="<?=returnuser($row[useridhf])?>" readonly="readonly" class="inp redony" /></li>
 <li class="l1">����IP��</li>
 <li class="l2"><input type="text" size="20" value="<?=$row[uip]?>" class="inp redony" readonly="readonly" /></li>
 <li class="l1">���ֱ��ۣ�</li>
 <li class="l2"><input type="text" size="20" value="<?=$row[money1]?>Ԫ" class="inp redony" readonly="readonly" /></li>
 <li class="l10">�������ݣ�</li>
 <li class="l11"><script id="editor" name="content" type="text/plain" style="width:858px;height:330px;"><?=$row[txt]?></script></li>
 </ul>
 
 <ul class="rcap"><li class="l1"></li><li class="l2">����Ա����</li><li class="l3"></li></ul>
 <ul class="uk">
 <li class="l1">����ʱ�䣺</li>
 <li class="l2"><input class="inp" name="tsj" value="<?=$row[sj]?>" size="20" type="text"/><span class="fd">��ȷ��ʱ���ʽ�磺2012-12-12 12:12:12</span></li>
 <li class="l3"><input type="submit" value="�����޸�" class="btn1" /></li>
 </ul>
 </form>
 </div>
 <!--E-->
 
</div>
</div>
<?php include("bottom.php");?>
<script type="text/javascript">
//ʵ�����༭��
var ue = UE.getEditor('editor');
</script>

</body>
</html>