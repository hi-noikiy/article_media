<?
include("../config/conn.php");//���ο�����ϵQQ:120036745//���ο�����ϵQQ:120036745
include("../config/function.php");//��-�ο�-��-��-ϵQ-Q:12-00-3674-5
sesCheck();
if(empty($_SESSION[SAFEPWD])){Audit_alert("������Ϣ������Ҫ�Ƚ��а�ȫ����֤!","safepwd.php");}
$bh=$_GET[bh];
$tcid=$_GET[tcid];
$userid=returnuserid($_SESSION[SHOPUSER]);

while0("*","epzhu_taocan where probh='".$bh."' and userid=".$userid." and id=".$tcid);if(!$row=mysql_fetch_array($res)){php_toheader("taocanlist.php?bh=".$bh);}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><div class="yjcode"><? adwhile("ADTOP");?></div>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�û�������� - <?=webname?></title>
<link href="../css/basic.css" rel="stylesheet" type="text/css" />
<link href="css/index.css" rel="stylesheet" type="text/css" />
<link href="css/product.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="js/index.js"></script>
<script language="javascript" src="../js/jquery.min.js"></script>
<script language="javascript" src="../js/layer.js"></script>
<script language="javascript" src="../js/layui.js"></script>
<script language="javascript" src="../js/common.js"></script>
<script language="javascript">
function ser(){
location.href="kclist_tc.php?bh=<?=$bh?>&tcid=<?=$tcid?>&st1="+document.getElementById("st1").value+"&sd1="+document.getElementById("sd1").value;
}
function glover(x){
 document.getElementById("gl"+x).style.display="";
}
function glout(x){
 document.getElementById("gl"+x).style.display="none";
}
function del(x){
document.getElementById("chk"+x).checked=true;
NcheckDEL('5t','epzhu_kc');
}
</script>
</head>
<body>
<? include("../tem/top.html");?>
<? include("../tem/userepzhucom.html");?>

<div class="bfb bfbuser">
<div class="yjcode">
<ul class="dqwz">
<li class="l1">����λ�ã�<a href="../" class="acy">��ҳ</a> > <a href="./" class="acy">��Ա����</a> > ������<?=$row[tit].$row[tit2]?>��</li>
</ul>
<? $leftid=1;include("left.php");?>

<!--RB-->
<div class="right">
 <ul class="wz">
 <li class="l0">��ѡ��</li>
 <li class="g_ac0_h g_bc0_h" id="rcap1"><a href="kclist_tc.php?bh=<?=$bh?>&tcid=<?=$tcid?>">������</a></li>
 </ul>
 <? while1("bh,userid,tit","epzhu_pro where bh='".$bh."' and userid=".$luserid);if(!$row1=mysql_fetch_array($res1)){php_toheader("productlist.php");}?>
 <div class="upfile">
 <ul class="uk">
 <li class="l1">��Ʒ���⣺</li>
 <li class="l21"><a href="product.php?bh=<?=$bh?>"><?=$row1[tit]?></a></li>
 <li class="l1">���ͳ�ƣ�</li>
 <li class="l21">
 ��ʹ�ã�<strong class="red"><?=returncount("epzhu_taocan_kc where userid=".$luserid." and probh='".$bh."' and ifok=1 and tcid=".$tcid)?></strong>��&nbsp;&nbsp;&nbsp;&nbsp;
 δʹ�ã�<strong class="blue"><?=returncount("epzhu_taocan_kc where userid=".$luserid." and probh='".$bh."' and ifok=0 and tcid=".$tcid)?></strong>��
 </li>
 </ul> 
 </div>

 <ul class="ksedi">
 <li class="l2">
 <a href="javascript:NcheckDEL('5t','epzhu_kc')" class="a1">ɾ��</a>
 <a href="kc_tc.php?bh=<?=$bh?>&tcid=<?=$tcid?>" class="a2">�����Ϣ</a>
 </li>
 <li class="l3">
  <input type="button" onclick="ser()" value="��ѯ" class="btn" />
  <select id="sd1">
  <option value="">ȫ��</option>
  <option value="0"<? if($_GET[sd1]=="0"){?> selected="selected"<? }?>>δʹ��</option>
  <option value="1"<? if($_GET[sd1]=="1"){?> selected="selected"<? }?>>��ʹ��</option>
  </select>
  <span class="s1">ʹ�������</span>
  <input type="text" id="st1" value="<?=$_GET[st1]?>" class="inp1" />
  <span class="s1">�ؼ��ʣ�</span>
 </li>
 </ul>

 <ul class="kamikccap">
 <li class="l1"><input name="C2" type="checkbox" onclick="xuan()" /></li>
 <li class="l2">����</li>
 <li class="l3">����</li>
 <li class="l4">����</li>
 <li class="l5">ʹ��״��</li>
 <li class="l6">ʹ�û�Ա</li>
 <li class="l7">ʹ��ʱ��</li>
 <li class="l8">�༭</li>
 </ul>

 <?
 $ses=" where userid=".$luserid." and probh='".$bh."' and tcid=".$tcid;
 if($_GET[st1]!=""){$ses=$ses." and ka like '%".$_GET[st1]."%'";}
 if($_GET[st2]!=""){$ses=$ses." and mi like '%".$_GET[st2]."%'";}
 if($_GET[sd1]!=""){$ses=$ses." and ifok=".$_GET[sd1];}
 $page=$_GET["page"];if($page==""){$page=1;}else{$page=intval($_GET["page"]);}
 pagef($ses,30,"epzhu_taocan_kc","order by id asc");while($row=mysql_fetch_array($res)){
 ?>
 <ul class="kamikclist">
 <li class="l1"><input name="C1" type="checkbox" id="chk<?=$row[id]?>" value="<?=$row[id]?>" /></li>
 <li class="l2"><?=$row[id]?></li>
 <li class="l3"><?=returntitdian($row[ka],35)?></li>
 <li class="l4"><?=returntitdian($row[mi],35)?></li>
 <li class="l5"><? if(1==$row[ifok]){?><span class="red">��ʹ��</span><? }else{?><span class="blue">δʹ��</span><? }?></li>
 <li class="l6"><?=returnuser($row[userid1])?></li>
 <li class="l7"><?=$row[sj]?></li>
 <li class="l8" onmouseover="glover(<?=$row[id]?>)" onmouseout="glout(<?=$row[id]?>)">
  <span class="s1">����</span>
  <div class="gl" style="display:none;" id="gl<?=$row[id]?>">
  <a href="kc_tc.php?bh=<?=$bh?>&id=<?=$row[id]?>&tcid=<?=$tcid?>&action=update">�༭��Ϣ</a>
  <a href="javascript:;" onclick="del(<?=$row[id]?>)">ɾ������</a>
  </div>
 </li>
 </ul>
 <? }?>

 <div class="npa">
 <?
 $nowurl="kclist_tc.php";
 $nowwd="tcid=".$tcid."&bh=".$bh."&st1=".$_GET[st1]."&st2=".$_GET[st2]."&sd1=".$_GET[sd1];
 require("page.html");
 ?>
 </div>

</div> 
<!--RE-->

</div>
</div>
<div class="yizhanw"> <div class="yizhanw2"><? include("../tem/bottom.html");?></div> </div>
</body>
</html>