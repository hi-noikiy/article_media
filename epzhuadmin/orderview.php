<?php
include("../config/conn.php");//���ο�����ϵQQ:120036745//���ο�����ϵQQ:12-0036-745
include("../config/function.php");
AdminSes_audit();
$orderbh=$_GET[orderbh];
$sj=date("Y-m-d H:i:s");
while0("*","epzhu_order where orderbh='".$orderbh."'");if(!$row=mysql_fetch_array($res)){php_toheader("orderlist.php");}
$tp="../".returntp("bh='".$row[probh]."' order by iffm desc","-2");

//������ʼ
if($_GET[control]=="update" && sqlzhuru($_POST[jvs])=="order"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0401,")){Audit_alert("Ȩ�޲���","default.php");}
 zwzr();
 if($row[ddzt]!="jf"){Audit_alert("����״̬���󣬷����б�����","orderlist.php");}
 $sj=date("Y-m-d H:i:s");
 //ͬ��B
 if(sqlzhuru($_POST[R1])=="yes"){
  $tkjg="����Ա���룬�˿�����ж���ʤ��";
  $allmoney=$row[money1]*$row[num]+$row[yunfei];
  PointUpdateM($row[userid],$allmoney);
  PointIntoM($row[userid],$tkjg,$allmoney);
  intotable("epzhu_orderlog","orderbh,userid,selluserid,admin,txt,sj","'".$orderbh."',".$row[userid].",".$row[selluserid].",3,'".$tkjg."','".$sj."'");
  updatetable("epzhu_order","ddzt='jfbuy' where id=".$row[id]);
 }
 //ͬ��E
 //��ͬ��B
 if(sqlzhuru($_POST[R1])=="no"){
  $tkjg="����Ա���룬�˿�����ж�����ʤ��";
  $allmoney=$row[money1]*$row[num]+$row[yunfei];
  $sellblm=returnsellbl($row[selluserid],$row[probh])*$allmoney; //���ҿɵý��
  $ptyj=$allmoney-$sellblm;
  PointUpdateM($row[selluserid],$sellblm);
  PointIntoM($row[selluserid],"�˿���ף��ж�����ʤ�ߣ����Զ��۳�ƽ̨Ӷ��".$ptyj."Ԫ",$sellblm);
  //�Ƽ�B
  $v=returntjuserid($row[userid]);
  $tjmoney=returntjmoney($row[probh]);
  if(!empty($v) && !empty($tjmoney)){
  $tjm=$allmoney*$tjmoney;
  PointUpdateM($v,$tjm);
  PointIntoM($v,"���Ƽ�����ҳɹ�������".$allmoney."Ԫ���������ӦӶ��",$tjm);
  PointUpdateM($row[selluserid],$tjm*(-1));
  PointIntoM($row[selluserid],"����������û��Ƽ�����(�Ƽ���ID:".$v.")���۳�Ӷ��",$tjm*(-1));
  }
  //�Ƽ�E
  intotable("epzhu_orderlog","orderbh,userid,selluserid,admin,txt,sj","'".$orderbh."',".$row[userid].",".$row[selluserid].",3,'".$tkjg."','".$sj."'");
  updatetable("epzhu_order","ddzt='jfsell',oksj='".$sj."' where orderbh='".$orderbh."'");
 }
 //��ͬ��E
 php_toheader("orderview.php?t=suc&orderbh=".$orderbh); 
 
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

<script type="text/javascript" charset="gbk" src="../config/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="gbk" src="../config/ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="gbk" src="../config/ueditor/lang/zh-cn/zh-cn.js"></script>
<script type="text/javascript" charset="gbk" src="../config/ueditor/unit.js"></script>

<script language="javascript">
function tj(){
r=document.getElementsByName("R1");rr="";for(i=0;i<r.length;i++){if(r[i].checked==true){rr=r[i].value;}}if(rr==""){alert("��ѡ����״���");return false;}
if(!confirm("ȷ��Ҫ�ύ�ò�����")){return false;}
layer.msg('������֤', {icon: 16  ,time: 0,shade :0.25});
f1.action="orderview.php?orderbh=<?=$orderbh?>&control=update";
}
</script>
</head>
<body>
<? include("top.php");?>
<script language="javascript">
document.getElementById("menu6").className="a1";
</script>
<? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0402,")){echo "<div class='noneqx'>��Ȩ��</div>";exit;}?>

<div class="yjcode">
 <? $leftid=1;include("menu_order.php");?>

<div class="right">
 <div class="bqu1">
 <a class="a1" href="orderlist.php">������Ϣ</a>
 </div>

 <? if($_GET[t]=="suc"){systs("��ϲ���������ɹ���","orderview.php?orderbh=".$orderbh);}?>
 <div class="rights">
 <strong>��ʾ��</strong><br>
 <span class="red">ֻ�е�����˫�����˿���һ�����޷���ɹ�ʶʱ������Ա�ſɽ��붩����������ֻ�ܵ���һ�Σ������ʵ��������ز���</span>
 </div>

 <div class="rkuang">
 <ul class="rcap"><li class="l1"></li><li class="l2">������Ϣ</li><li class="l3"></li></ul>
 <ul class="uk">
 <li class="l1">����״̬��</li>
 <li class="l21"><strong><?=returnorderzt($row[ddzt])?></strong></li>
 <li class="l1">������</li>
 <li class="l21 feng"><strong><?=$row[money1]*$row[num]?>Ԫ</strong> (����<?=$row[money1]?>Ԫ * <?=$row[num]?>�������˷�<?=$row[yunfei]?>Ԫ)</li>
 <li class="l1">ѡ���ײͣ�</li>
 <li class="l2"><input type="text" class="inp redony" readonly="readonly" size="60" value="<?=$row[tcv]?>" /></li>

 <? if($row[ddzt]=="db" || $row[ddzt]=="suc"){?>
 <li class="l1">����ʱ�䣺</li>
 <li class="l2"><input type="text" class="inp redony" readonly="readonly" size="20" value="<?=$row[fhsj]?>" /></li>
 <? }?>
 
 <? if($row[ddzt]=="back"){while1("*","epzhu_tk where orderbh='".$orderbh."'");$row1=mysql_fetch_array($res1);?>
 <li class="l1">�˿�����ʱ�䣺</li>
 <li class="l2"><input type="text" class="inp redony" readonly="readonly" size="20" value="<?=$row1[sj]?>" /></li>
 <li class="l10">�˿����ɣ�</li>
 <li class="l11"><script id="editor" name="content" type="text/plain" style="width:710px;height:330px;"><?=$row1[tkly]?></script></li>
 <? }?>
 
 <? if($row[ddzt]=="backsuc" || $row[ddzt]=="backerr"){?>
 <li class="l1">�˿�����ʱ�䣺</li>
 <li class="l2"><input type="text" class="inp redony" readonly="readonly" size="20" value="<?=$row[tksj]?>" /></li>
 <li class="l1">�˿����ɣ�</li>
 <li class="l2"><input type="text" class="inp redony" readonly="readonly" size="100" value="<?=$row[tkly]?>" /></li>
 <li class="l1">�˿������</li>
 <li class="l2"><input type="text" class="inp redony" readonly="readonly" size="100" value="<?=$row[tkjg]?>" /></li>
 <li class="l1">�˿��ʱ�䣺</li>
 <li class="l2"><input type="text" class="inp redony" readonly="readonly" size="20" value="<?=$row[tkoksj]?>" /></li>
 <? }?>
 
 <? if($row[ddzt]=="suc"){?>
 <li class="l1">ȷ���ջ�ʱ�䣺</li>
 <li class="l2"><input type="text" class="inp redony" readonly="readonly" size="20" value="<?=$row[oksj]?>" /></li>
 <? }?>
 
 <li class="l1">������ţ�</li>
 <li class="l2"><input type="text" class="inp redony" readonly="readonly" size="20" value="<?=$row[orderbh]?>" /></li>
 <li class="l1">��Ʒ���ƣ�</li>
 <li class="l2"><input type="text" class="inp redony" readonly="readonly" size="100" value="<?=$row[tit]?>" /></li>
 <li class="l8"></li>
 <li class="l9"><img src="<?=returntppd($tp,"../img/none60x60.gif")?>" width="54" height="54" /></li>
 <li class="l1">����ʱ�䣺</li>
 <li class="l2"><input type="text" class="inp redony" readonly="readonly" size="20" value="<?=$row[sj]?>" /></li>
 <li class="l1">����IP��</li>
 <li class="l2"><input type="text" class="inp redony" readonly="readonly" size="20" value="<?=$row[uip]?>" /></li>
 <li class="l4">������Ϣ��</li>
 <li class="l5"><textarea name="tbuyform"><?=str_replace("<br>","\n",$row[buyform])?></textarea></li>
 <? if(!empty($row[shdz])){?>
 <li class="l1">�ջ���ַ��</li>
 <li class="l2"><input type="text" class="inp redony" readonly="readonly" size="100" value="<?=$row[shdz]?>" /></li>
 <? }?>
 </ul>
 <ul class="rcap"><li class="l1"></li><li class="l2">����˫��</li><li class="l3"></li></ul>
 <ul class="uk">
 <? while1("*","epzhu_user where id=".$row[userid]);$row1=mysql_fetch_array($res1);?>
 <li class="l1">�����Ϣ��</li>
 <li class="l2"><input type="text" class="inp redony" readonly="readonly" size="100" value="�ʺ�:<?=$row1[uid]?> �ǳ�:<?=$row1[nc]?> �ֻ�:<?=$row1[mot]?> QQ:<?=$row1[uqq]?>" /></li>
 <? while1("*","epzhu_user where id=".$row[selluserid]);$row1=mysql_fetch_array($res1);?>
 <li class="l1">������Ϣ��</li>
 <li class="l2"><input type="text" class="inp redony" readonly="readonly" size="100" value="�ʺ�:<?=$row1[uid]?> �ǳ�:<?=$row1[nc]?> �ֻ�:<?=$row1[mot]?> QQ:<?=$row1[uqq]?>" /></li>
 </ul>
 
 <form name="f1" method="post" onsubmit="return tj()">
 <input type="hidden" name="jvs" value="order" />
 <ul class="rcap"><li class="l1"></li><li class="l2">����Ա����</li><li class="l3"></li></ul>
 <ul class="uk">
 <li class="l1">��ͨ��¼��</li>
 <li class="l21"><a href="orderjf.php?orderbh=<?=$orderbh?>" class="red" target="_blank">������鿴��</a></li>
 <? if($row[ddzt]=="jf"){?>
 <li class="l1">�˿���״���</li>
 <li class="l2">
 <label><input name="R1" type="radio" value="yes" /> <strong>���ʤ��</strong></label> 
 <label><input name="R1" type="radio" value="no" /> <strong>����ʤ��</strong></label> 
 </li>
 <li class="l1">������ʾ��</li>
 <li class="l21">ֻ�е�����˫�����˿���һ�����޷���ɹ�ʶʱ������Ա�ſɽ��붩����������<strong class="red">ֻ�ܵ���һ�Σ������ʵ��������ز���</strong>��</li>
 <li class="l3"><input type="submit" value="�����޸�" class="btn1" /></li>
 <? }?>
 </ul>
 </form>
 </div>
 
</div>
</div>
<?php include("bottom.php");?>
<script type="text/javascript">
//ʵ�����༭��
var ue = UE.getEditor('editor');
</script>
</body>
</html>