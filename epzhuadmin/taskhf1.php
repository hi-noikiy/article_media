<?php
include("../config/conn.php");//���ο�����ϵQQ:120036745//���ο�����ϵQQ:12-0036-745
include("../config/function.php");
AdminSes_audit();
$id=$_GET[id];
$sj=date("Y-m-d H:i:s");

$sqltaskhf="select * from epzhu_taskhf where id=".$id." and taskty=1";mysql_query("SET NAMES 'GBK'");$restaskhf=mysql_query($sqltaskhf);
if(!$rowtaskhf=mysql_fetch_array($restaskhf)){php_toheader("tasklist1.php");}

$sqltask="select * from epzhu_task where bh='".$rowtaskhf[bh]."' and taskty=1";mysql_query("SET NAMES 'GBK'");$restask=mysql_query($sqltask);
if(!$rowtask=mysql_fetch_array($restask)){php_toheader("tasklist1.php");}
$bh=$rowtask[bh];



if($_GET[control]=="update"){
 updatetable("epzhu_taskhf","sj='".$_POST[tsj]."',txt='".sqlzhuru1($_POST[content])."' where id=".$id);
 
 if(4==$rowtaskhf[zt]){ //����
  $zt=intval($_POST[Rzt]);
  $money1=$rowtaskhf[money1];
  if(0==$zt){
   updatetable("epzhu_taskhf","zt=7 where id=".$id);
   $txt="�ж�����ʤ��";
   intotable("epzhu_tasklog","bh,userid,useridhf,admin,txt,sj,fj","'".$rowtask[bh]."',".$rowtask[userid].",".$rowtaskhf[useridhf].",3,'".$txt."','".$sj."',''");
  }elseif(1==$zt){
   PointIntoM($rowtaskhf[useridhf],"�������ʤ�ߣ�ƽ̨���룬���Ӷ��(������".$rowtask[bh].")",$money1);
   PointUpdateM($rowtaskhf[useridhf],$money1);
   $zjm=0;
   if(0==$rowtask[yjfs]){
   $zjm=$rowcontrol[taskyj]*$money1;
   }elseif(1==$rowtask[yjfs]){
   $m=$rowcontrol[taskyj]*$money1*(-1);
   PointIntoM($rowtaskhf[useridhf],"������ɣ��۳�ƽ̨�н��(������".$rowtask[bh].")",$m);
   PointUpdateM($rowtaskhf[useridhf],$m);
   }elseif(2==$rowtask[yjfs]){
   $m=$rowcontrol[taskyj]*$money1*(-1)*0.5;
   $zjm=$m;
   PointIntoM($rowtaskhf[useridhf],"������ɣ��۳�ƽ̨�н��(������".$rowtask[bh].")",$m);
   PointUpdateM($rowtaskhf[useridhf],$m);
   }
   $djm=$money1+abs($zjm);
   updatetable("epzhu_task","money3=money3-".$djm." where id=".$rowtask[id]);
   updatetable("epzhu_taskhf","zt=2 where id=".$id);
   $txt="�ж����ַ�ʤ��";
   intotable("epzhu_tasklog","bh,userid,useridhf,admin,txt,sj,fj","'".$rowtask[bh]."',".$rowtask[userid].",".$rowtaskhf[useridhf].",3,'".$txt."','".$sj."',''");
  }
 
 }
 
 php_toheader("taskhf1.php?t=suc&id=".$id);
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

 <? if($_GET[t]=="suc"){systs("��ϲ���������ɹ���","taskhf1.php?id=".$id);}?>
 <!--B-->
 <div class="bqu1">
 <a href="javascript:void(0);" class="a1">�������������Ϣ</a>
 <a href="tasklist1.php">�����б�</a>
 </div> 
 <div class="rkuang">
 <script language="javascript">
 function tj(){
 r=document.getElementsByName("Rzt");rr="";for(i=0;i<r.length;i++){if(r[i].checked==true){rr=r[i].value;}}if(rr==""){alert("��ѡ����״̬��");return false;}
 if(!confirm("ȷ���ύ�ò�����")){return false;}
 layer.msg('�����ύ', {icon: 16  ,time: 0,shade :0.25});
 f1.action="taskhf1.php?id=<?=$id?>&control=update";
 }
 </script>
 <? while1("bh,tit","epzhu_task where bh='".$row[bh]."'");$row1=mysql_fetch_array($res1);?>
 <form name="f1" method="post" onsubmit="return tj()">
 <ul class="rcap"><li class="l1"></li><li class="l2">������Ϣ</li><li class="l3"></li></ul>
 <ul class="viewul">
 <li class="l1">�������⣺</li>
 <li class="l2"><a href="../task/view<?=$rowtask[id]?>.html" target="_blank"><strong><?=$rowtask[tit]?></strong></a></li>
 <li class="l1">����Ԥ�㣺</li>
 <li class="l3"><strong class="feng">��<?=$rowtask[money1]?></strong></li>
 <li class="l1">���������</li>
 <li class="l3"><?=$rowtask[tasknum]?></li>
 <li class="l1">�������ͣ�</li>
 <li class="l3"><?=returntasktype(1,$rowtask[type1id])." ".returntasktype(2,$rowtask[type2id])?></li>
 <li class="l1">������ʽ��</li>
 <li class="l3"><?=returntaskjgxs($rowtask[jgxs])?></li>
 <li class="l1">�������ڣ�</li>
 <li class="l3"><?=$rowtask[rwzq]?>��</li>
 <li class="l1">����ʱ�䣺</li>
 <li class="l3"><?=$rowtask[sj]?></li>
 </ul>

 <ul class="viewul">
 <li class="l1">�����û���</li>
 <li class="l3"><?=returnnc($rowtaskhf[useridhf])?></li>
 <li class="l1">����IP��</li>
 <li class="l3"><?=$rowtaskhf[uip]?></li>
 <li class="l1">Ӷ��</li>
 <li class="l3"><?=$rowtaskhf[money1]?>Ԫ</li>
 <li class="l4">���ֱ�ע��</li>
 <li class="l5"><script id="editor" name="content" type="text/plain" style="width:853px;height:330px;"><?=$row[txt]?></script></li>
 </ul>
 
 <ul class="rcap"><li class="l1"></li><li class="l2">����Ա����</li><li class="l3"></li></ul>
 <ul class="viewul">
 <li class="l1">����״̬��</li>
 <li class="l2"><?=returntask1($rowtaskhf[zt])?></li>
 <? if(4==$rowtaskhf[zt]){?>
 <li class="l1">���״̬��</li>
 <li class="l2">
 <label><input name="Rzt" type="radio" value="0" /> <strong>�ж�����ʤ��</strong></label>
 <label><input name="Rzt" type="radio" value="1" /> <strong>�ж����ַ�ʤ��</strong></label> 
 </li>
 <? }?>
 <li class="l1">��ͨ��¼��</li>
 <li class="l2"><a href="taskgt1.php?bh=<?=$rowtask[bh]?>&useridhf=<?=$rowtaskhf[useridhf]?>" class="red" target="_blank">������鿴��</a></li>
 <li class="l8"><input type="submit" value="�����޸�" class="btn1" /></li>
 </ul>
 </form>
 </div>
 <!--E-->
 
</div>
</div>
<?php include("bottom.php");?>
<script type="text/javascript">
//ʵ�����༭��
var ue= UE.getEditor('editor'
, {
            toolbars:[
            ['fullscreen', 'source', '|', 'undo', 'redo', '|',
                'removeformat', 'formatmatch' ,'|', 'forecolor',
                 'fontsize', '|',
                'link', 'unlink',
                'insertimage', 'emotion', 'attachment']
        ]
        });
</script>
</body>
</html>