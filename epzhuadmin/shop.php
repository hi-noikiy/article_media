<?php
include("../config/conn.php");//���ο�����ϵQQ:120036745//���ο�����ϵQQ:12-0036-745
include("../config/function.php");
include("../config/tpclass.php");
AdminSes_audit();
$id=$_GET[id];
while0("*","epzhu_user where id=".$id);if(!$row=mysql_fetch_array($res)){php_toheader("userlist.php");}

//������ʼ
if($_GET[control]=="update"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0701,")){Audit_alert("Ȩ�޲���","default.php");}
 zwzr();
 $shopzt=sqlzhuru($_POST[R1]);
 if(3==$shopzt){
  $ses="openshop=0,";
  PointUpdateM($row[id],$row[openshop]);
  PointIntoM($row[id],"�������뱻�ܣ������˻�",$row[openshop]);
  deletetable("epzhu_baomoneyrecord where userid=".$id." and admin=1");
 }
 $dqsj=sqlzhuru($_POST[tdqsj]);
 if(!empty($dqsj)){$ses=$ses."dqsj='".$dqsj."',";}
 updatetable("epzhu_user",$ses."
			 shopname='".sqlzhuru($_POST[tshopname])."',
			 seokey='".sqlzhuru($_POST[tseokey])."',
			 seodes='".sqlzhuru($_POST[tseodes])."',
			 txt='".sqlzhuru1($_POST[content])."',
			 pm=".sqlzhuru($_POST[tpm]).",
			 djl=".sqlzhuru($_POST[tdjl]).",
			 shopzt=".$shopzt.",
			 shopztsm='".sqlzhuru($_POST[tshopztsm])."',
			 sellbl=".sqlzhuru($_POST[tsellbl]).",
			 xinyong=".sqlzhuru($_POST[txinyong])." 
			 where id=".$id);
 uploadtpnodata(1,"upload/".$id."/","shop.jpg","allpic",300,300,0,0,"no");
 uploadtpnodata(2,"upload/".$id."/","bannar.jpg","allpic",1920,0,0,0,"no");
 
 $myweb=trim(sqlzhuru($_POST[tmyweb]));
 if(!empty($myweb)){
  if(panduan("id,myweb","epzhu_user where myweb='".$myweb."' and id<>".$id."")==1){Audit_alert("���Զ�����ַ�Ѿ���ʹ�ã��������","shop.php?id=".$id);}
  if(!preg_match("/^[_a-zA-Z0-9]*$/",$myweb)){Audit_alert("�Զ����ַ����Ϊ���ֻ���ĸ��","shop.php?id=".$id);}
  updatetable("epzhu_user","myweb='".$myweb."' where id=".$id);
 }
 
 php_toheader("shop.php?t=suc&id=".$id);
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
<script language="javascript" src="js/adddate.js"></script>
<script language="javascript">
function tj(){
 if((document.f1.tshopname.value).replace("/\s/","")==""){alert("�������������");document.f1.tshopname.focus();return false;}
 layer.msg('�����ύ', {icon: 16  ,time: 0,shade :0.25});
 f1.action="shop.php?control=update&id=<?=$id?>";
}
function shopztonc(x){
 if(3==x){$("shopztv").style.display="";}else{$("shopztv").style.display="none";}
}
</script>

<script type="text/javascript" src="js/adddate.js" ></script> 

<script type="text/javascript" charset="gbk" src="../config/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="gbk" src="../config/ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="gbk" src="../config/ueditor/lang/zh-cn/zh-cn.js"></script>
<script type="text/javascript" charset="gbk" src="../config/ueditor/unit.js"></script>

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
 <? if($_GET[t]=="suc"){systs("��ϲ���������ɹ���","shop.php?id=".$id);}?>
 <? include("rightcap3.php");?>
 <script language="javascript">document.getElementById("rtit2").className="a1";</script>
 <!--B-->
 <div class="rkuang">
 <form name="f1" method="post" onsubmit="return tj()" enctype="multipart/form-data">
 <ul class="uk">
 <li class="l1">�������״̬��</li>
 <li class="l21"><strong><?=returnshopztv($row[shopzt])?></strong></li>
 <li class="l1"><span class="red">*</span> �������ƣ�</li>
 <li class="l2"><input type="text" size="30" value="<?=$row[shopname]?>" class="inp" name="tshopname" /></li>
 <li class="l1"><span class="red">*</span> �Զ����ַ��</li>
 <li class="l2"><span class="fd" style="margin-left:0;margin-right:10px;"><?=weburl?>vip</span><input type="text" size="20" value="<?=$row[myweb]?>" class="inp" name="tmyweb" /><span class="fd">(��ʾ�����֡���ĸ�������)</span></li>
 <li class="l1">����LOGO��</li>
 <li class="l2"><input type="file" name="inp1" id="inp1" class="inp1" size="15" accept=".jpg,.gif,.jpeg,.png"></li>
 <li class="l8"></li>
 <li class="l9"><img src="../upload/<?=$id?>/shop.jpg?t=<?=rnd_num(100)?>" width="54" height="54" /></li>
 <li class="l1">����ͨ����</li>
 <li class="l2"><input type="file" name="inp2" class="inp1" id="inp2" size="15" accept=".jpg,.gif,.jpeg,.png"><span class="fd">��ѳߴ磺1920*120</span></li>
 <li class="l8"></li>
 <li class="l9"><img src="../upload/<?=$id?>/bannar.jpg?t=<?=rnd_num(100)?>" width="60%" height="54" /></li>
 <li class="l1">���̹ؼ��ʣ�</li>
 <li class="l2"><input  name="tseokey" value="<?=$row[seokey]?>" size="60" type="text" class="inp" /></li>
 <li class="l4">��Ҫ������</li>
 <li class="l5"><textarea name="tseodes"><?=$row[seodes]?></textarea></li>
 <li class="l10">��ϸ������</li>
 <li class="l11"><script id="editor" name="content" type="text/plain" style="width:858px;height:330px;"><?=$row[txt]?></script></li>
 </ul>
 
 <ul class="rcap"><li class="l1"></li><li class="l2">����Ա����</li><li class="l3"></li></ul>
 <ul class="uk">
 <li class="l1">�������������</li>
 <li class="l2">
 <input name="tsellbl" value="<?=$row[sellbl]?>" size="5" type="text" class="inp" />
 <span class="fd hui">���׳ɹ������ҿɻ�õĽ����� <span class="red">1��ʾȫ�����ң�0.9��ʾ90%�����ң�0.5��ʾ50%������</span>����������</span>
 </li>
 <li class="l1">���̵��ڣ�</li>
 <li class="l2"><input class="inp" readonly="readonly" onclick="SelectDate(this,'yyyy-MM-dd hh:mm:ss')" name="tdqsj" value="<?=$row[dqsj]?>" size="20" type="text"/></li>
 <li class="l1">�Ƽ�������</li>
 <li class="l2"><input type="text" size="5" value="<?=$row[pm]?>" class="inp" name="tpm" /><span class="fd">0��ʾ���Ƽ�����֮��С��������</span></li>
 <li class="l1">�������ã�</li>
 <li class="l2"><input type="text" size="5" value="<?=returnjgdw($row[xinyong],"",0)?>" class="inp" name="txinyong" /><span class="fd">0��ʾ��ȡ��������ֵ����֮��ȡ��ֵ</span></li>
 <li class="l1">���̵���ʣ�</li>
 <li class="l2"><input type="text" size="5" value="<?=$row[djl]?>" class="inp" name="tdjl" /></li>
 <li class="l1">������ˣ�</li>
 <li class="l2">
 <label><input name="R1" type="radio" onclick="shopztonc(0)" value="0"<? if(0==$row[shopzt]){?> checked="checked"<? }?> />δ�ύ����</label>
 <label><input name="R1" type="radio" onclick="shopztonc(0)" value="1"<? if(1==$row[shopzt]){?> checked="checked"<? }?> />�������</label>
 <label><input name="R1" type="radio" onclick="shopztonc(0)" value="2"<? if(2==$row[shopzt]){?> checked="checked"<? }?> />��������</label>
 <label><input name="R1" type="radio" onclick="shopztonc(3)" value="3"<? if(3==$row[shopzt]){?> checked="checked"<? }?> />�ܾ�����</label>
 <label><input name="R1" type="radio" onclick="shopztonc(4)" value="4"<? if(4==$row[shopzt]){?> checked="checked"<? }?> />���̵���</label>
 </li>
 </ul>
 <ul class="uk uk0" id="shopztv" style="display:none;">
 <li class="l1">�ر�˵����</li>
 <li class="l21 red">����ܾ����룬���Ա���ɵķ��ý��˻������Ա�ʺ��С�ͨ�����룬�����Զ��۷ѡ���������ظò���</li>
 <li class="l1">����ԭ��</li>
 <li class="l2"><input type="text" class="inp" name="tshopztsm" size="90" value="<?=$row[shopztsm]?>" /></li>
 </ul>
 <ul class="uk uk0">
 <li class="l3"><input type="submit" value="�����޸�" class="btn1" /></li>
 </ul>
 </form>
 <script language="javascript">
 shopztonc(<?=$row[shopzt]?>);
 </script>
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