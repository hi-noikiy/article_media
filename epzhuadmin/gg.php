<?php
include("../config/conn.php");//���ο�����ϵQQ:120036745//���ο�����ϵQQ:12-0036-745
include("../config/function.php");
AdminSes_audit();
$bh=$_GET[bh];

//������ʼ
if($_GET[control]=="update"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0201,")){Audit_alert("Ȩ�޲���","default.php");}
 zwzr();
 $sj=date("Y-m-d H:i:s");
 $tyid=preg_split("/xcf/",sqlzhuru($_POST[d1]));
 $txt=sqlzhuru1($_POST[content]);
 $wdes=sqlzhuru($_POST[twdes]);if(empty($wdes)){$wdes=strgb2312(strip_tags($txt),0,220);}
 $tit=sqlzhuru($_POST[ttit]);
 $wkey=sqlzhuru($_POST[twkey]);if(empty($wkey)){$wkey=$tit;}$wkey=str_replace("��",",",strtolower($wkey));
 updatetable("epzhu_gg","
			 sj='".sqlzhuru($_POST[tsj])."',
			 djl=".sqlzhuru($_POST[tdjl]).",
			 tit='".$tit."',
			 txt='".$txt."',
			 zt=".$_POST[Rzt].",
			 wkey='".$wkey."',
			 wdes='".$wdes."' where bh='".$bh."'");
 php_toheader("gg.php?t=suc&bh=".$bh);

}
//�������

while0("*","epzhu_gg where bh='".$bh."'");if(!$row=mysql_fetch_array($res)){php_toheader("gglist.php");}
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

</head>
<body>
<? include("top.php");?>
<script language="javascript">
document.getElementById("menu4").className="a1";
</script>
<? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0202,")){echo "<div class='noneqx'>��Ȩ��</div>";exit;}?>

<div class="yjcode">
 <? $leftid=2;include("menu_news.php");?>

<div class="right">
 <? if($_GET[t]=="suc"){systs("��ϲ���������ɹ���[<a href='gglx.php'>�������������</a>]","gg.php?bh=".$bh);}?>
 <div class="bqu1">
 <a href="javascript:void(0);" class="a1">������Ϣ</a>
 <a href="gglist.php">�����б�</a>
 </div> 
 <!--B-->
 <div class="rkuang">
 <script language="javascript">
 function tj(){
 if((document.f1.ttit.value).replace(/\s/,"")==""){alert("���������");document.f1.ttit.focus();return false;}
 r=document.getElementsByName("Rzt");rr="";for(i=0;i<r.length;i++){if(r[i].checked==true){rr=r[i].value;}}if(rr==""){alert("��ѡ�����״̬��");return false;}
 layer.msg('�����ύ', {icon: 16  ,time: 0,shade :0.25});
 f1.action="gg.php?bh=<?=$bh?>&control=update";
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()">
 <ul class="uk">
 <li class="l1"><span class="red">*</span> ���⣺</li>
 <li class="l2"><input type="text" size="100" value="<?=$row[tit]?>" class="inp" name="ttit" /></li>
 <li class="l10"><span class="red">*</span> ��ϸ������</li>
 <li class="l11"><script id="editor" name="content" type="text/plain" style="width:858px;height:330px;"><?=$row[txt]?></script></li>
 <li class="l1">SEO�ؼ��ʣ�</li>
 <li class="l2"><input type="text" value="<?=$row[wkey]?>" class="inp" size="70" name="twkey" onfocus="inpf(this)" onblur="inpb(this)" /><span class="fd">�����,���Ÿ���</span></li>
 <li class="l4">SEO������</li>
 <li class="l5"><textarea name="twdes"><?=$row[wdes]?></textarea></li>
 </ul>
 
 <ul class="rcap"><li class="l1"></li><li class="l2">����Ա����</li><li class="l3"></li></ul>
 <ul class="uk">
 <li class="l1">����ʱ�䣺</li>
 <li class="l2"><input class="inp" name="tsj" value="<?=$row[sj]?>" size="20" type="text"/><span class="fd">��ȷ��ʱ���ʽ�磺2012-12-12 12:12:12</span></li>
 <li class="l1">����ʣ�</li>
 <li class="l2"><input class="inp" name="tdjl" value="<?=$row[djl]?>" size="10" type="text"/></li>
 <li class="l1">���״̬��</li>
 <li class="l2">
 <label><input name="Rzt" type="radio" value="0" <? if(0==$row[zt]){?>checked="checked"<? }?> /> <strong>����չʾ</strong></label>
 <label><input name="Rzt" type="radio" value="1" <? if(1==$row[zt]){?>checked="checked"<? }?> /> <strong>�������</strong></label> 
 <label><input name="Rzt" type="radio" value="2" <? if(2==$row[zt]){?>checked="checked"<? }?> /> <strong>��˲�ͨ��</strong></label>
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