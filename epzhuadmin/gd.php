<?php
include("../config/conn.php");//���ο�����ϵQQ:120036745//���ο�����ϵQQ:12-0036-745
include("../config/function.php");
AdminSes_audit();
$id=$_GET[id];
while0("*","epzhu_gd where id=".$id);if(!$row=mysql_fetch_array($res)){php_toheader("gdlist.php");}

//������ʼ
if($_GET[control]=="update"){
 zwzr();
 $txt=sqlzhuru1($_POST[content]);
 $sj=date("Y-m-d H:i:s");
 updatetable("epzhu_gd","
             sj='".$_POST[tsj]."',
			 mot='".sqlzhuru($_POST[tmot])."',
			 mail='".sqlzhuru($_POST[tmail])."',
			 txt='".$txt."',
			 gdzt=".$_POST[Rgdzt]."
			 where id=".$id);
			 
 if(sqlzhuru($_POST[Rtz1])=="yes" && !empty($row[mail])){
  require("../config/mailphp/sendmail.php");
  $lj=weburl."user/gdlist.php";
  $tit="���ã����Ĺ���".strip_tags(returngdzt($_POST[Rgdzt]));
  $txt="�𾴵��û���".returnuser($row[userid])." ���ã�<br>";
  $txt=$txt."��л����".webname."(".weburl.")��֧��!<br>";
  $txt=$txt."����".$row[sj]."�ύ����״̬�Ѿ����Ϊ��".returngdzt($_POST[Rgdzt])."�������Է����������ӵ�¼��վ�鿴��������<br><a href='".$lj."' target='_blank'>".$lj."</a><hr>";
  $txt=$txt."���ʼ���ϵͳ�Զ�����������ֱ�ӻظ���";
  @yjsendmail($tit,$row[mail],$txt);
 }
 
 if(sqlzhuru($_POST[Rtz2])=="yes" && $rowcontrol[ifmob]=="on" && !empty($row[mot])){
  while1("*","epzhu_smsmb where mybh='007'");
  if($row1=mysql_fetch_array($res1)){$txt=$row1[txt];}else{$txt="���Ĺ���״̬�Ѿ����Ϊ��${zttz}";}
  $yz=strip_tags(returngdzt($_POST[Rgdzt]));
  $yz=iconv('gbk','utf-8',$yz);
  if(empty($rowcontrol[smsmode])){
   include("../config/mobphp/mysendsms.php");
   $str=str_replace("\${zttz}",$yz,$txt);
   yjsendsms($row[mot],$str);
  }else{
   if(1==$rowcontrol[smsmode]){$sms_txt="{zttz:'".$yz."'}";}else{$sms_txt="{\"zttz\":\"".$yz."\"}";}
   $sms_mot=$row[mot];
   $sms_id=$row1[mbid];
   @include("../config/mobphp/mysendsms.php");
  }
 updatetable("epzhu_control","smskc=smskc-1");
 }
	
	
			 
 php_toheader("gd.php?t=suc&id=".$id);

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

<script type="text/javascript" src="../config/ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="../config/ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" src="../config/ueditor/lang/zh-cn/zh-cn.js"></script>
</head>
<body>
<? include("top.php");?>
<script language="javascript">
document.getElementById("menu5").className="a1";
</script>
<? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0602,")){echo "<div class='noneqx'>��Ȩ��</div>";exit;}?>

<div class="yjcode">
 <? $leftid=4;include("menu_ad.php");?>

<div class="right">

 <? if($_GET[t]=="suc"){systs("��ϲ���������ɹ���","gd.php?id=".$id);}?>
 <div class="bqu1">
 <a href="javascript:void(0);" class="a1">��������</a>
 <a href="gdlist.php">�����б�</a>
 </div> 
 <!--B-->
 <div class="rkuang">
 <script language="javascript">
 function tj(){
 layer.msg('�����ύ', {icon: 16  ,time: 0,shade :0.25});
 f1.action="gd.php?id=<?=$id?>&control=update";
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()">
 <ul class="uk">
 <li class="l1">����״̬��</li>
 <li class="l21"><?=returngdzt($row[gdzt])?></li>
 <li class="l1">������ţ�</li>
 <li class="l2"><input type="text" size="20" value="<?=$row[orderbh]?>" class="inp" name="tmot" /><span class="fd">[<a href="orderview.php?orderbh=<?=$row[orderbh]?>" target="_blank">�鿴����</a>]</span></li>
 <li class="l1">�ֻ����룺</li>
 <li class="l2"><input type="text" size="20" value="<?=$row[mot]?>" class="inp" name="tmot" /></li>
 <li class="l1">��ϵ���䣺</li>
 <li class="l2"><input type="text" size="20" value="<?=$row["mail"]?>" class="inp" name="tmail" /></li>
 <li class="l10"><span class="red">*</span> ��ϸ������</li>
 <li class="l11"><script id="editor" name="content" type="text/plain" style="width:853px;height:330px;"><?=$row[txt]?></script></li>
 </ul>
 
 <ul class="rcap"><li class="l1"></li><li class="l2">����Ա����</li><li class="l3"></li></ul>
 <ul class="uk">
 <li class="l1">����ʱ�䣺</li>
 <li class="l2"><input class="inp" name="tsj" value="<?=$row[sj]?>" size="20" type="text"/><span class="fd">��ȷ��ʱ���ʽ�磺2012-12-12 12:12:12</span></li>
 <li class="l1">����״̬��</li>
 <li class="l2">
 <? for($i=1;$i<=4;$i++){?>
 <label><input name="Rgdzt" type="radio" value="<?=$i?>" <? if($i==$row[gdzt]){?>checked="checked"<? }?> /> <strong><?=returngdzt($i)?></strong></label>
 <? }?>
 </li>
 <li class="l1"></li>
 <li class="l21"><a href="gdhf.php?bh=<?=$row[bh]?>"><strong class="red">���鿴�ظ���¼��</strong></a></li>
 <li class="l1">������Ա��</li>
 <li class="l2"><input class="inp redony" value="<?=returnuser($row[userid])?>" size="20" type="text"/><span class="fd">[<a href="user_ses.php?uid=<?=returnuser($row[userid])?>" target="_blank">����̨</a>]</span></li>
 <li class="l1">�ʼ�֪ͨ��</li>
 <li class="l2">
 <label><input name="Rtz1" checked="checked" type="radio" value="yes" /> <span class="blue">�����ʼ�</span></label>
 <label><input name="Rtz1" type="radio" value="no" /> �������ʼ�</label>
 </li>
 <li class="l1">����֪ͨ��</li>
 <li class="l2">
 <label><input name="Rtz2" checked="checked" type="radio" value="yes" /> <span class="blue">���Ͷ���</span></label>
 <label><input name="Rtz2" type="radio" value="no" /> �����Ͷ���</label>
 </li>
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