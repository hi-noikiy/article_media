<?php
include("../config/conn.php");//���ο�����ϵQQ:120036745//���ο�����ϵQQ:12-0036-745
include("../config/function.php");
require("../config/tpclass.php");
AdminSes_audit();
$sj=date("Y-m-d H:i:s");
$bh=$_GET[bh];
while0("*","epzhu_pro where bh='".$bh."'");if(!$row=mysql_fetch_array($res)){php_toheader("productlist.php");}
$tit=$row[tit];

$id=$_GET[id];
while0("*","epzhu_taocan where id=".$id);if(!$row=mysql_fetch_array($res)){php_toheader("taocanlist.php?bh=".$bh);}

//������ʼ
if($_GET[control]=="update"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0101,")){Audit_alert("Ȩ�޲���","default.php");}
 zwzr();
 if(panduan("*","epzhu_taocan where admin is null and probh='".$bh."' and zt<>99 and tit='".sqlzhuru($_POST[t1])."' and id<>".$id)==1){Audit_alert("���ײ������Ѵ��ڣ�","taocan.php?action=update&id=".$id."&bh=".$bh);}

 $kcnum=sqlzhuru($_POST[tkcnum]);if(!is_numeric($kcnum)){$kcnum=0;}
 $fhxs=intval(sqlzhuru($_POST[Rfhxs]));
 updatetable("epzhu_taocan","tit='".sqlzhuru($_POST[t1])."',
                              xh=".sqlzhuru($_POST[t2]).",
							  money1=".sqlzhuru($_POST[tmoney1]).",
							  money2=".sqlzhuru($_POST[tmoney2]).",
							  zt=0,
			                  fhxs=".$fhxs.",
			                  wpurl='".sqlzhuru($_POST[twpurl])."',
			                  wppwd='".sqlzhuru($_POST[twppwd])."',
			                  wppwd1='".sqlzhuru($_POST[twppwd1])."',
							  kcnum=".$kcnum."
							  where id=".$id);
 uploadtpnodata(2,"upload/".$row[userid]."/".$row[probh]."/","tc".$id.".png","allpic",350,350,34,34,"no");
 //�ϴ�B
 if(3==$fhxs){
  $up1=$_FILES["inp1"]["name"];
  if(!empty($up1)){
  $mc=MakePassAll(15)."-".time()."-".$row[userid].".".returnhz($up1);
  $lj="../upload/".$row[userid]."/".$bh."/";
  move_uploaded_file($_FILES["inp1"]['tmp_name'],$lj.$mc);
  delFile($lj.$row[upf]);
  updatetable("epzhu_taocan","upf='".$mc."' where id=".$id);
  }
 }
 //�ϴ�E
 if(4==$fhxs){kamikc_tc($bh,$id);}
							   
 updatetable("epzhu_taocan","tit='".sqlzhuru($_POST[t1])."' where tit='".sqlzhuru($_POST[oldty1])."' and probh='".$bh."'");
 php_toheader("taocan.php?t=suc&id=".$id."&bh=".$bh);

}elseif($_GET[control]=="del"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0101,")){Audit_alert("Ȩ�޲���","default.php");}
 zwzr();
 delFile("../upload/".$row[userid]."/".$row[probh]."/tc".$row[id].".png");
 php_toheader("taocan.php?t=suc&id=".$id."&bh=".$bh);

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
<link href="css/product.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script language="javascript" src="js/basic.js"></script>
<script language="javascript" src="js/layer.js"></script>
<script language="javascript">
function tj(){
if((document.f1.t1.value).replace(/\s/,"")==""){alert("�������ײ�˵����");document.f1.t1.focus();return false;}
if((document.f1.tmoney2.value).replace(/\s/,"")==""){alert("������ԭ�ۣ�");document.f1.tmoney2.focus();return false;}
if((document.f1.tmoney1.value).replace(/\s/,"")==""){alert("�������Żݼۣ�");document.f1.tmoney1.focus();return false;}
if((document.f1.t2.value).replace(/\s/,"")=="" || isNaN(document.f1.t2.value)){alert("��������Ч������ţ�");document.f1.t2.focus();return false;}
layer.msg('�����ύ', {icon: 16  ,time: 0,shade :0.25});
f1.action="taocan.php?control=update&id=<?=$row[id]?>&bh=<?=$bh?>";
}
function fhxsonc(x){
for(i=0;i<=4;i++){
d=document.getElementById("fhxs"+i);if(d){d.style.display="none";}
}
d=document.getElementById("fhxs"+x);if(d){d.style.display="";}
}
function deltp(){
 if(confirm("ȷ��Ҫɾ����ͼ����")){location.href="taocan.php?id=<?=$id?>&bh=<?=$bh?>&control=del";}else{return false;}
}
</script>
</head>
<body>
<? include("top.php");?>
<script language="javascript">
document.getElementById("menu3").className="a1";
</script>
<? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0102,")){echo "<div class='noneqx'>��Ȩ��</div>";exit;}?>

<div class="yjcode">
 <? $leftid=1;include("menu_product.php");?>

<div class="right">
 
 <? if($_GET[t]=="suc"){systs("��ϲ���������ɹ���[<a href='taocanlx.php?bh=".$bh."'>�������</a>]","taocan.php?bh=".$bh."&id=".$id);}?>
 <div class="bqu1">
 <a href="javascript:void(0);" class="a1">�ײ͹���</a>
 <a href="taocanlist.php?bh=<?=$bh?>">�����б�</a>
 </div> 
 
 <!--begin-->
 <div class="rkuang">
 <form name="f1" method="post" onsubmit="return tj()" enctype="multipart/form-data">
 <input type="hidden" value="<?=$row[tit]?>" name="oldty1" />
 <ul class="uk">
 <li class="l1">��Ӧ��Ʒ��</li>
 <li class="l2"><input type="text" class="inp redony" value="<?=$tit?>" size="80" /></li>
 <li class="l1">�ײ�˵����</li>
 <li class="l2"><input type="text" class="inp" name="t1" value="<?=$row[tit]?>" /></li>
 <li class="l1">�ײ�ͼ�꣺</li>
 <li class="l2"><input type="file" name="inp2" class="inp1" id="inp2" size="15" accept=".jpg,.gif,.jpeg,.png"><span class="fd">��ѳߴ磺350*350,���ϴ�����ʾ������ʽ</span></li>
 <? $ntp="../upload/".$row[userid]."/".$row[probh]."/tc".$row[id].".png";if(is_file($ntp)){?>
 <li class="l8"></li>
 <li class="l9"><img src="<?=$ntp?>" width="55" height="55" /> [<a href="javascript:void(0);" onclick="deltp()">ɾ��</a>]</li>
 <? }?>
 <li class="l1">ԭ�ۣ�</li>
 <li class="l2"><input type="text" class="inp" name="tmoney2" value="<?=$row[money2]?>" /><span class="fd">Ԫ</span></li>
 <li class="l1">�Żݼۣ�</li>
 <li class="l2"><input type="text" class="inp" name="tmoney1" value="<?=$row[money1]?>" /><span class="fd">Ԫ</span></li>
 <li class="l1">����</li>
 <li class="l2"><input type="text" class="inp" name="t2" value="<?=$row[xh]?>" /> <span class="fd">���ԽС��Խ��ǰ</span></li>
 </ul>
 
 <ul class="uk uk0">
 <li class="l1"><span class="red">*</span> �������</li>
 <li class="l2"><input class="inp" name="tkcnum" value="<?=$row[kcnum]?>" size="10" type="text"/><span class="fd">(����ǵ㿨�����࣬���ֵ������д�����Զ���ȡ)</span></li>
 <li class="l1 red">* ������ʽ��</li>
 <li class="l2">
 <label><input name="Rfhxs" type="radio" value="0" onclick="fhxsonc(0)" <? if(0==$row[fhxs]){?>checked="checked"<? }?> /> ����Ʒ����һ��</label>
 <? if(strstr($rowcontrol[fhxs],"1") || empty($rowcontrol[fhxs])){?>
 <label><input name="Rfhxs" type="radio" value="1" onclick="fhxsonc(1)" <? if(1==$row[fhxs]){?>checked="checked"<? }?> /> �ֶ�����(����)</label>
 <? }?>
 <? if(strstr($rowcontrol[fhxs],"2") || empty($rowcontrol[fhxs])){?>
 <label><input name="Rfhxs" type="radio" value="2" onclick="fhxsonc(2)" <? if(2==$row[fhxs]){?>checked="checked"<? }?> /> ��������(����)</label>
 <? }?>
 <? if(strstr($rowcontrol[fhxs],"3") || empty($rowcontrol[fhxs])){?>
 <label><input name="Rfhxs" type="radio" value="3" onclick="fhxsonc(3)" <? if(3==$row[fhxs]){?>checked="checked"<? }?> /> ��վֱ������(����)</label>
 <? }?>
 <? if(strstr($rowcontrol[fhxs],"4") || empty($rowcontrol[fhxs])){?>
 <label><input name="Rfhxs" type="radio" value="4" onclick="fhxsonc(4)" <? if(4==$row[fhxs]){?>checked="checked"<? }?> /> �㿨����(����)</label>
 <? }?>
 </li>
 </ul> 
 <ul class="uk" id="fhxs2" style="display:none;">
 <li class="l1">���̵�ַ��</li>
 <li class="l2"><input class="inp" name="twpurl" value="<?=$row[wpurl]?>" size="80" type="text"/></li>
 <li class="l1">�������룺</li>
 <li class="l2"><input class="inp" name="twppwd" value="<?=$row[wppwd]?>" size="20" type="text"/></li>
 <li class="l1">��ѹ���룺</li>
 <li class="l2"><input class="inp" name="twppwd1" value="<?=$row[wppwd1]?>" size="20" type="text"/></li>
 </ul>
 <ul class="uk" id="fhxs3" style="display:none;">
 <li class="l1">�ϴ��ļ���</li>
 <li class="l2"><input type="file" name="inp1" id="inp1" size="25"></li>
 <? if(!empty($row[upf])){?>
 <li class="l1">�ļ�Ԥ����</li>
 <li class="l21">��<a href="../upload/<?=$row[userid]?>/<?=$row[probh]?>/<?=$row[upf]?>" class="blue" target="_blank">���Ԥ��</a>��</li>
 <? }?>
 </ul>

 <ul class="uk uk0">
 <li class="l3"><input type="submit" value="�����޸�" class="btn1" /></li>
 </ul>

 </form>
 </div>
 <!--end-->
 
</div>
</div>
<?php include("bottom.php");?>
<script language="javascript">
fhxsonc(<?=$row[fhxs]?>);
</script>
</body>
</html>