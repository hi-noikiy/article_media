<?
include("../config/conn.php");//���ο�����ϵQQ:120036745//���ο�����ϵQQ:120036745
include("../config/function.php");//��-�ο�-��-��-ϵQ-Q:12-00-3674-5
sesCheck();
$bh=$_GET[bh];
$userid=returnuserid($_SESSION[SHOPUSER]);
while0("*","epzhu_news where bh='".$bh."' and userid=".$userid);if(!$row=mysql_fetch_array($res)){php_toheader("newslist.php");}

if($_GET[control]=="add"){
 $sj=date("Y-m-d H:i:s");
 $tyid=preg_split("/xcf/",sqlzhuru($_POST[d1]));
 uploadtp($bh,"��Ѷ",$row[userid]);
 if(panduan("bh,type1","epzhu_tp where bh='".$bh."' and type1='��Ѷ'")==1){$iftp=1;}else{$iftp=0;}
 $txt=sqlzhuru1($_POST[content]);
 $wdes=sqlzhuru($_POST[twdes]);if(empty($wdes)){$wdes=strgb2312(strip_tags($txt),0,220);}
 $tit=sqlzhuru($_POST[ttit]);
 $wkey=sqlzhuru($_POST[twkey]);if(empty($wkey)){$wkey=$tit;}
 updatetable("epzhu_news","
			 type1id=".$tyid[0].",
			 type2id=".$tyid[1].",
			 tit='".$tit."',
			 txt='".$txt."',
			 lastsj='".$sj."',
			 ifjc=0,
			 zze='".sqlzhuru($_POST[tzze])."',
			 ly='".sqlzhuru($_POST[tly])."',
			 lyurl='".sqlzhuru($_POST[tlyurl])."',
			 wkey='".$wkey."',
			 wdes='".$wdes."',
			 zt=1,
			 iftp=".$iftp." where bh='".$bh."' and userid=".$row[userid]);
 php_toheader("newslist.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><div class="yjcode"><? adwhile("ADTOP");?></div>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�û�������� - <?=webname?></title>
<link href="../css/basic.css" rel="stylesheet" type="text/css" />
<link href="css/index.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../js/basic.js"></script>

<script type="text/javascript" src="../config/ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="../config/ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" src="../config/ueditor/lang/zh-cn/zh-cn.js"></script>

<script language="javascript" src="js/index.js"></script>
<script language="javascript" src="../js/jquery.min.js"></script>
<script language="javascript" src="../js/layer.js"></script>
<script language="javascript" src="../js/layui.js"></script>
<script language="javascript" src="../js/common.js"></script>
<script type="text/javascript">
function tj(){
 if((document.f1.ttit.value).replace(/\s/,"")==""){alert("���������");document.f1.ttit.focus();return false;}	
 tjwait();
 f1.action="news.php?control=add&bh=<?=$bh?>";
}
</script>
</head>
<body>
<? include("../tem/top.html");?>
<? include("../tem/userepzhucom.html");?>

<div class="bfb bfbuser">
<div class="yjcode">
<ul class="dqwz">
<li class="l1">����λ�ã�<a href="../" class="acy">��ҳ</a> > <a href="./" class="acy">��Ա����</a> > Ͷ������</li>
</ul>
<? $leftid=6;include("left.php");?>

<!--RB-->
<div class="right">
 <? include("rcap13.php");?>
 <script language="javascript">
 document.getElementById("rcap1").className="g_ac0_h g_bc0_h";
 </script>
 
 <!--B-->
 <form name="f1" method="post" onsubmit="return tj()">
 <ul class="uk">
 <li class="l1"><span class="red">*</span> ���飺</li>
 <li class="l2">
 <select name="d1" class="inp fontyh">
 <? while1("*","epzhu_newstype where admin=1");while($row1=mysql_fetch_array($res1)){?>
 <option value="<?=$row1[id]?>xcf0"<? if($row1[id]==$row[type1id] && $row[type2id]==0){?> selected="selected"<? }?> style="background-color:#EFEFEF;color:#333;"><?=$row1[name1]?></option>
 <? while2("*","epzhu_newstype where admin=2 and name1='".$row1[name1]."'");while($row2=mysql_fetch_array($res2)){?>
 <option value="<?=$row1[id]?>xcf<?=$row2[id]?>"<? if($row1[id]==$row[type1id] && $row2[id]==$row[type2id]){?> selected="selected"<? }?>> - <?=$row2[name2]?></option>
 <? }?>
 <? }?>
 </select>
 </li>
 <li class="l1"><span class="red">*</span> ���⣺</li>
 <li class="l2"><input type="text" size="50" value="<?=$row[tit]?>" class="inp" name="ttit" /></li>
 <li class="l1">���ߣ�</li>
 <li class="l2"><input class="inp" name="tzze" value="<?=$row[zze]?>" size="10" type="text"/></li>
 <li class="l1">��Դ��</li>
 <li class="l2"><input class="inp" name="tly" value="<?=$row[ly]?>" size="10" type="text"/></li>
 <li class="l1">��Դ��ַ��</li>
 <li class="l2"><input class="inp" name="tlyurl" value="<?=$row[lyurl]?>" size="70" type="text"/></li>
 <li class="l7">��ϸ���ݣ�</li>
 <li class="l8"><script id="editor" name="content" type="text/plain" style="width:790px;height:380px;"><?=$row[txt]?></script></li>
 <li class="l1">SEO�ؼ��ʣ�</li>
 <li class="l2"><input type="text" class="inp" value="<?=$row[wkey]?>" name="twkey" size="60" /></li>
 <li class="l9">SEO������</li>
 <li class="l10"><textarea name="twdes"><?=$row[wdes]?></textarea></li>
 <li class="l3"></li>
 <li class="l4"><? tjbtnr("��һ��","newslist.php")?></li>
 </ul>
 </form>
 <!--E-->

</div> 
<!--RE-->

</div>
</div>
<div class="yizhanw"> <div class="yizhanw2"><? include("../tem/bottom.html");?></div> </div>
<script language="javascript">
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