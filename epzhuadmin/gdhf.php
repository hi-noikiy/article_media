<?php
include("../config/conn.php");//���ο�����ϵQQ:120036745//���ο�����ϵQQ:12-0036-745
include("../config/function.php");
AdminSes_audit();
$bh=$_GET[bh];
while0("*","epzhu_gd where bh='".$bh."'");if(!$row=mysql_fetch_array($res)){php_toheader("gdlist.php");}
$id=$row[id];
$gdzt=$row[gdzt];

//������ʼ
if($_GET[control]=="add"){
 zwzr();
 $txt=sqlzhuru1($_POST[content]);
 $sj=date("Y-m-d H:i:s");
 if(!empty($txt)){
 intotable("epzhu_gdhf","userid,gdbh,admin,txt,sj,zt","".$row[userid].",'".$bh."',1,'".$txt."','".$sj."',0");
 }
 updatetable("epzhu_gd","gdzt=".$_POST[Rgdzt]." where id=".$id);

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

 php_toheader("gdhf.php?t=suc&bh=".$bh);

}elseif($_GET[control]=="del"){
 deletetable("epzhu_gdhf where gdbh='".$bh."' and id=".$_GET[id]);
 php_toheader("gdhf.php?t=suc&bh=".$bh);

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
<link href="css/ad.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script language="javascript" src="js/basic.js"></script>
<script language="javascript" src="js/layer.js"></script>

<script type="text/javascript" src="../config/ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="../config/ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" src="../config/ueditor/lang/zh-cn/zh-cn.js"></script>

<script type="text/javascript">
function tj(){
layer.msg('�����ύ', {icon: 16  ,time: 0,shade :0.25});
f1.action="gdhf.php?bh=<?=$bh?>&control=add";
}
function del(x){
if(!confirm("ȷ��Ҫɾ����")){return false;}else{location.href="gdhf.php?control=del&bh=<?=$bh?>&id="+x;}
}
</script>
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

 <? if($_GET[t]=="suc"){systs("��ϲ���������ɹ���","gdhf.php?bh=".$bh);}?>
 <div class="bqu1">
 <a href="javascript:void(0);" class="a1">�ظ���¼</a>
 </div> 
 <!--B-->
 <div class="rkuang">
 <div class="gdhflist">
  <ul class="u1">
  <li class="l1"><img src="../upload/<?=$row[userid]?>/user.jpg" width="40" height="40" /></li>
  <li class="l2"><?=$row[txt]?><br><?=$row[sj]?></li>
  </ul>
  <? 
  while0("*","epzhu_gdhf where gdbh='".$bh."' and zt=0 order by sj asc");while($row=mysql_fetch_array($res)){
  $txt=$row[txt];
  $tp="../upload/".$row[userid]."/user.jpg";
  if($row[admin]==1){$txt="<strong>".$txt."</strong>";$tp="img/nonetx.jpg";}
  ?>
  <ul class="u1">
  <li class="l1"><img src="<?=$tp?>" width="40" height="40" style="margin:0 0 6px 0;" /><br>[<a href="javascript:void(0);" onclick="del(<?=$row[id]?>)" class="red">ɾ��</a>]</li>
  <li class="l2"><?=$txt?><br><?=$row[sj]?></li>
  </ul>
  <? }?>
 
  <form name="f1" method="post" onsubmit="return tj()">
  <ul class="uk">
  <li class="l1">�ʼ�֪ͨ��</li>
  <li class="l2">
  <label><input name="Rtz1" type="radio" value="yes" /> <span class="blue">�����ʼ�</span></label>
  <label><input name="Rtz1" checked="checked" type="radio" value="no" /> �������ʼ�</label>
  </li>
  <li class="l1">����֪ͨ��</li>
  <li class="l2">
  <label><input name="Rtz2" type="radio" value="yes" /> <span class="blue">���Ͷ���</span></label>
  <label><input name="Rtz2" checked="checked" type="radio" value="no" /> �����Ͷ���</label>
  </li>
  <li class="l1">����״̬��</li>
  <li class="l2">
  <? for($i=1;$i<=4;$i++){?>
  <label><input name="Rgdzt" type="radio" value="<?=$i?>" <? if($i==$gdzt){?>checked="checked"<? }?> /> <strong><?=returngdzt($i)?></strong></label>
  <? }?>
  </li>
  <li class="l10"><span class="red">*</span> ��ϸ������</li>
  <li class="l11"><script id="editor" name="content" type="text/plain" style="width:853px;height:330px;"><?=$rowtask[txt]?></script></li>
  <li class="l3"><input type="submit" value="�����޸�" class="btn1" /></li>
  </ul>
  </form>

 </div>
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