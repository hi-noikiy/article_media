<?
include("../../config/conn.php");
include("../../config/function.php");
sesCheck_m();
$sqluser="select * from epzhu_user where uid='".$_SESSION[SHOPUSER]."' and shopzt=2";mysql_query("SET NAMES 'GBK'");$resuser=mysql_query($sqluser);
if(!$rowuser=mysql_fetch_array($resuser)){php_toheader("openshop3.php");}

$userid=$rowuser[id];
$bh=$_GET[bh];
while0("*","epzhu_pro where bh='".$bh."' and userid=".$userid);if(!$row=mysql_fetch_array($res)){php_toheader("productlist.php");}

//������ʼ
if($_GET[control]=="update"){
 zwzr();
 $sj=date("Y-m-d H:i:s");
 $myty=preg_split("/yjcode/",sqlzhuru($_POST[mty]));
 $txt=sqlzhuru1($_POST[content]);
 $tit=sqlzhuru($_POST[ttit]);
 $wkey=strgb2312(sqlzhuru($_POST[twkey]),0,240);
 $wdes=strgb2312(sqlzhuru($_POST[twdes]),0,240);
 $yhsj1=sqlzhuru($_POST[tyhsj1]);if(!empty($yhsj1)){$ses="yhsj1='".$yhsj1."',";}
 $yhsj2=sqlzhuru($_POST[tyhsj2]);if(!empty($yhsj1)){$ses=$ses."yhsj2='".$yhsj2."',";}
 $money1=sqlzhuru($_POST[tmoney1]);
 $money2=sqlzhuru($_POST[tmoney2]);
 $money3=sqlzhuru($_POST[tmoney3]);if(!is_numeric($money3)){$money3=0;}
 $kcnum=sqlzhuru($_POST[tkcnum]);if(!is_numeric($kcnum)){$kcnum=0;}
 if($money1<0 || $money2<0 || $money3<0){Audit_alert("�۸���Ϊ������","productlist.php");}
 $fhxs=intval(sqlzhuru($_POST[Rfhxs]));
 if($rowcontrol[ifproduct]=="on"){$nzt=0;}else{$nzt=1;}
 
 $tysx=sqlzhuru($_POST[tysx]);
 $tysxB=intval(sqlzhuru($_POST[tysxBnum]));
 for($i=1;$i<$tysxB;$i++){
  $tysxS=intval(sqlzhuru($_POST["tysxSnum".$i]));
  for($j=1;$j<=$tysxS;$j++){
  $zi=sqlzhuru($_POST["zi_".$i."_".$j]);
  if(!empty($zi)){
  $tysx=$tysx."xcf".$_POST["tysxty1_".$i].":".$zi;
  }
  }
 }
 
 $ifuserjd=intval($_POST[Rifuserdj]);
 if(1==$ifuserjd){
 deletetable("epzhu_prouserdj where probh='".$bh."'");
  for($i=1;$i<intval($_POST[djnum]);$i++){
  $zhekou=$_POST["zhekou_".$i];
  $djname=$_POST["name1_".$i];
  if(!empty($zhekou)){intotable("epzhu_prouserdj","probh,userid,djname,admin,zhi","'".$bh."',".$row[userid].",'".$djname."',1,".$zhekou."");}
  }
 }

 updatetable("epzhu_pro",$ses."
			 mybh='".sqlzhuru($_POST[tmybh])."',
			 myty1id=".$myty[0].",
			 myty2id=".$myty[1].",
			 lastsj='".$sj."',
			 tysx='".$tysx."',
			 zt=".$nzt.",
			 tit='".$tit."',
			 wkey='".$wkey."',
			 wdes='".$wdes."',
			 txt='".$txt."',
			 kcnum=".$kcnum.", 
			 money1=".$money1.", 
			 money2=".$money2.",
			 money3=".$money3.",
			 yhxs=".sqlzhuru($_POST[Ryhxs]).",
			 yhsm='".sqlzhuru($_POST[tyhsm])."',
			 fhxs=".$fhxs.",
			 wpurl='".sqlzhuru($_POST[twpurl])."',
			 wppwd='".sqlzhuru($_POST[twppwd])."',
			 wppwd1='".sqlzhuru($_POST[twppwd1])."',
			 ysweb='".sqlzhuru($_POST[tysweb])."',
			 ifuserdj=".$ifuserjd.",
			 zl=".sqlzhuru($_POST[tzl])."
			 where bh='".$bh."' and userid=".$userid);
 //�ϴ�B
 if(3==$fhxs){
  $up1=$_FILES["inp1"]["name"];
  if(!empty($up1)){
  $mc=MakePassAll(15)."-".time()."-".$userid.".".returnhz($up1);
  $lj="../../upload/".$userid."/".$bh."/";
  move_uploaded_file($_FILES["inp1"]['tmp_name'],$lj.$mc);
  delFile($lj.$row[upf]);
  updatetable("epzhu_pro","upf='".$mc."' where bh='".$bh."' and userid=".$userid);
  }
 }
 //�ϴ�E
 //����B
 if(4==$fhxs){
 $c=str_replace("\r","",($_POST[s1]));
 $d=preg_split("/\n/",$c);
 for($i=0;$i<=count($d);$i++){
  if(!empty($d[$i])){
   $e=preg_split("/\s/",$d[$i]);
     if(panduan("probh,userid,ka","epzhu_kc where probh='".$bh."' and ka='".$e[0]."' and userid=".$userid)==0){
     $mi="";
	 if(count($e)>=2){for($ei=1;$ei<count($e);$ei++){$mi=$mi." ".$e[$ei];}}
	 intotable("epzhu_kc","probh,userid,ka,mi,ifok","'".$bh."',".$userid.",'".$e[0]."','".$mi."',0");
	 }
  }
 }
 kamikc($bh);
 }
 //����E
 
 php_toheader("prosuc.php?bh=".$bh."&id=".$row[id]);

}
//�������

$ijia=1;
?>
<html>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
<title>��Ա���� <?=webname?></title>
<link rel="stylesheet" href="../css/basic.css">
<link rel="stylesheet" href="index.css">
<script type="text/javascript" src="js/adddate.js" ></script> 
<script src="../js/jquery-1.9.1.min.js" type="text/javascript"></script>
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="../js/layer.js"></script>
<script language="javascript" src="index.js"></script>
<script language="javascript">
function tj(){
if((document.f1.ttit.value).replace(/\s/,"")==""){layerts("���������");return false;}
a=document.f1.tkcnum.value;if(a.replace("/\s/","")=="" || isNaN(a)){layerts("��������Ч�Ŀ��");return false;}
a=document.f1.tmoney1.value;if(a.replace("/\s/","")=="" || isNaN(a)){layerts("��������Ч�ļ۸�");return false;}
a=document.f1.tmoney2.value;if(a.replace("/\s/","")=="" || isNaN(a)){layerts("��������Ч�ļ۸�");return false;}
if(document.f1.Rfhxs.value==""){layerts("��ѡ�񷢻���ʽ��");return false;}
cstr="xcf";
c=document.getElementsByName("Csx");
for(i=0;i<c.length;i++){if(c[i].checked==true){cstr=cstr+c[i].value+"xcf";}}
document.f1.tysx.value=cstr;
layer.open({type: 2,content: '�����ύ',shadeClose:false});
f1.action="product.php?bh=<?=$bh?>&control=update";
}

function yhxsonc(){
x=document.f1.Ryhxs.value;
if(1==x){document.getElementById("yhxsul").style.display="none";}	
else if(2==x){document.getElementById("yhxsul").style.display="";}	
}

function fhxsonc(){
x=document.f1.Rfhxs.value;
for(i=1;i<=5;i++){
d=document.getElementById("fhxs"+i);if(d){d.style.display="none";}
}
d=document.getElementById("fhxs"+x);if(d){d.style.display="";}
if(x==4){document.getElementById("kcuk").style.display="none";}else{document.getElementById("kcuk").style.display="";}
}

function djonc(){
x=document.f1.Rifuserdj.value;
if(0==x){document.getElementById("djv").style.display="none";}else{document.getElementById("djv").style.display="";}
}

function yjkscha(){
m2=document.f1.tmoney2.value;
yjk=document.f1.yjks.value;
if(isNaN(m2) || yjk==""){yj=m2;}else{yj=accMul(m2,yjk);}
document.f1.tmoney1.value=yj;
}

</script>
</head>
<body>
<? include("topuser.php");?>

<div class="bfbtop2 box">
 <div class="d1" onClick="gourl('productlist.php')"><img src="img/topleft1.png" height="21" /></div>
 <div class="d2">��Ʒ�༭</div>
 <div class="d3"></div>
</div>

<!--��ʼ-->
<form name="f1" method="post" onSubmit="return tj()">
<div class="uk box">
 <div class="d1">��Ʒ����<span class="s1"></span></div>
 <div class="d2"><?=returntype(1,$row[ty1id])." - ".returntype(2,$row[ty2id])." - ".returntype(3,$row[ty3id])." - ".returntype(4,$row[ty4id])." - ".returntype(5,$row[ty5id])?></div>
 <div class="d3" onClick="gourl('productlx.php?action=update&id=<?=$row[id]?>')"><img src="../img/rightjian.png" height="13" /></div>
</div>

<div class="uk box">
 <div class="d1">���ڷ���<span class="s1"></span></div>
 <div class="d2">
 <select name="mty" style="font-size:13px;">
 <option value="0yjcode0">ѡ�����</option>
 <? while1("*","epzhu_protype where admin=1 and zt=0 and userid=".$rowuser[id]);while($row1=mysql_fetch_array($res1)){?>
 <option value="<?=$row1[id]?>yjcode0"<? if($row1[id]==$row[myty1id] && $row[myty2id]==0){?> selected="selected"<? }?> style="background-color:#EFEFEF;color:#333;"><?=$row1[name1]?></option>
 <? while2("*","epzhu_protype where admin=2 and name1='".$row1[name1]."' and zt=0 and userid=".$rowuser[id]);while($row2=mysql_fetch_array($res2)){?>
 <option value="<?=$row1[id]?>yjcode<?=$row2[id]?>"<? if($row1[id]==$row[myty1id] && $row2[id]==$row[myty2id]){?> selected="selected"<? }?>> - <?=$row2[name2]?></option>
 <? }?>
 <? }?>
 </select>
 </div>
 <div class="d3"><img src="../img/rightjian.png" height="13" /></div>
</div>

<div class="uk box">
 <div class="d1">�� ��<span class="s1"></span></div>
 <div class="d2"><input type="text" class="inp" placeholder="���������" name="ttit" value="<?=$row[tit]?>" /></div>
</div>

<div class="uk box">
 <div class="d1">�Ż���ʽ<span class="s1"></span></div>
 <div class="d2">
 <select name="Ryhxs" onChange="yhxsonc()" style="font-size:13px;">
 <option value="1" <? if(1==$row[yhxs]){?> selected="selected"<? }?>>�����Ż�</option>
 <option value="2" <? if(2==$row[yhxs]){?> selected="selected"<? }?>>��ʱ�Ż�</option>
 </select>
 </div>
 <div class="d3"><img src="../img/rightjian.png" height="13" /></div>
</div>

<div class="uk box">
 <div class="d1">��ǰ�ۼ�<span class="s1"></span></div>
 <div class="d2"><input type="text" class="inp" placeholder="�����뵱ǰ�ۼ�" name="tmoney2" value="<?=$row[money2]?>" /></div>
 <div class="d31">Ԫ</div>
</div>

<div class="uk box">
 <div class="d1">�������<span class="s1"></span></div>
 <div class="d2">
 <select name="yjks" style="font-size:13px;" onChange="yjkscha()">
 <option value="">�������</option>
 <? for($i=1;$i<10;$i++){?>
 <option value="1.<?=$i?>">X1.<?=$i?>(�൱�ڵ�ǰ�ۼ�Ϊ<?=10-$i?>���Ż�)</option>
 <? }?>
 </select>
 </div>
 <div class="d3"><img src="../img/rightjian.png" height="13" /></div>
</div>
<div class="uk box">
 <div class="d1">ԭ ��<span class="s1"></span></div>
 <div class="d2"><input type="text" class="inp" placeholder="�����뵱ǰ�ۼ�" name="tmoney1" value="<?=$row[money1]?>" /></div>
 <div class="d31">Ԫ</div>
</div>

<div id="yhxsul" style="display:none;">
<div class="uk box">
 <div class="d1">��ʱ�Ż�<span class="s1"></span></div>
 <div class="d2"><input type="text" class="inp" placeholder="��������ʱ�Żݼ�" name="tmoney3" value="<?=$row[money3]?>" /></div>
 <div class="d31">Ԫ</div>
</div>
<div class="uk box">
 <div class="d1">�Ż�˵��<span class="s1"></span></div>
 <div class="d2"><input type="text" class="inp" placeholder="�������Ż�˵��" name="tyhsm" value="<?=$row[yhsm]?>" /></div>
</div>
<div class="uk box">
 <div class="d1">�Żݿ�ʼ<span class="s1"></span></div>
 <div class="d2"><input class="inp" name="tyhsj1" placeholder="�������Żݿ�ʼʱ��" value="<?=$row[yhsj1]?>" readonly onClick="SelectDate(this,'yyyy-MM-dd hh:mm:ss')" type="text"/></div>
</div>
<div class="uk box">
 <div class="d1">�Żݽ�ֹ<span class="s1"></span></div>
 <div class="d2"><input class="inp" name="tyhsj2" placeholder="�������Żݽ�ֹʱ��" value="<?=$row[yhsj2]?>" readonly onClick="SelectDate(this,'yyyy-MM-dd hh:mm:ss')" type="text"/></div>
</div>
</div>

<div class="uk box">
 <div class="d1">������ʽ<span class="s1"></span></div>
 <div class="d2">
 <select name="Rfhxs" onChange="fhxsonc()" style="font-size:13px;">
 <? if(strstr($rowcontrol[fhxs],"1") || empty($rowcontrol[fhxs])){?>
 <option value="1" <? if(1==$row[fhxs]){?>option="option"<? }?>>�ֶ�����</option>
 <? }?>
 <? if(strstr($rowcontrol[fhxs],"2") || empty($rowcontrol[fhxs])){?>
 <option value="2" <? if(2==$row[fhxs]){?>option="option"<? }?>>��������</option>
 <? }?>
 <? if(strstr($rowcontrol[fhxs],"3") || empty($rowcontrol[fhxs])){?>
 <option value="3" <? if(3==$row[fhxs]){?>option="option"<? }?>>��վֱ������</option>
 <? }?>
 <? if(strstr($rowcontrol[fhxs],"4") || empty($rowcontrol[fhxs])){?>
 <option value="4" <? if(4==$row[fhxs]){?>option="option"<? }?>>�㿨����</option>
 <? }?>
 <? if(strstr($rowcontrol[fhxs],"5") || empty($rowcontrol[fhxs])){?>
 <option value="5" <? if(5==$row[fhxs]){?>option="option"<? }?>>ʵ����</option>
 <? }?>
 </select>
 </div>
 <div class="d3"><img src="../img/rightjian.png" height="13" /></div>
</div>

<div class="uk box" id="kcuk">
 <div class="d1">�� �� ��<span class="s1"></span></div>
 <div class="d2"><input type="text" class="inp" name="tkcnum" value="<?=returnjgdw($row[kcnum],"",0)?>" /></div>
</div>

<div id="fhxs2">
<div class="uk box">
 <div class="d1">���̵�ַ<span class="s1"></span></div>
 <div class="d2"><input type="text" class="inp" name="twpurl" placeholder="�������̵�ַ" value="<?=$row[wpurl]?>" /></div>
</div>
<div class="uk box">
 <div class="d1">��������<span class="s1"></span></div>
 <div class="d2"><input type="text" class="inp" name="twppwd" placeholder="������������" value="<?=$row[wppwd]?>" /></div>
</div>
<div class="uk box">
 <div class="d1">��ѹ����<span class="s1"></span></div>
 <div class="d2"><input type="text" class="inp" name="twppwd1" placeholder="�����ѹ����" value="<?=$row[wppwd1]?>" /></div>
</div>
</div>

<div id="fhxs3">
<div class="uk box">
 <div class="d1">�ϴ��ļ�<span class="s1"></span></div>
 <div class="d2"><input type="file" name="inp1" id="inp1" class="inp"></div>
</div>
<? if(!empty($row[upf])){?>
<div class="uk box">
 <div class="d1">�ļ�Ԥ��<span class="s1"></span></div>
 <div class="d21">��<a href="../upload/<?=$row[userid]?>/<?=$row[bh]?>/<?=$row[upf]?>" class="blue" target="_blank">���Ԥ��</a>��</div>
</div>
<? }?>
</div>

<div id="fhxs4">
<div class="uk box">
 <div class="d1">�� ��<span class="s1"></span></div>
 <div class="d21"><strong class="red"><?=$row[kcnum]?>��</strong> [<a href="kclist.php?bh=<?=$bh?>" target="_blank" class="blue">������</a>]</div>
</div>
<div class="uk box">
 <div class="d1">��ӿ���<span class="s1"></span></div>
 <div class="d2"><textarea name="s1" placeholder="�����ʽΪ����+�ո�+����(�ɸ��ϸ�������)��һ��һ�飬��AAAAA BBBBB"></textarea></div>
</div>
</div>

<div id="fhxs5">
<div class="uk box">
 <div class="d1">�� ��<span class="s1"></span></div>
 <div class="d2"><input type="text" class="inp" name="tzl" value="<?=sprintf("%.2f",$row[zl])?>" /></div>
 <div class="d31">KG</div>
</div>
</div>

<div class="uk box">
 <div class="d1">��Ʒ����<span class="s1"></span></div>
 <div class="d2"><textarea placeholder="��������Ʒ����" name="content" style="height:100px;"><?=$row[txt]?></textarea></div>
</div>

<!--Ч��ͼB-->
<div class="uk box">
 <div class="d1">Ч �� ͼ<span class="s1"></span></div>
 <div class="d2"><iframe style="float:left;margin-top:-1px;" src="tpupload.php?admin=6&bh=<?=$bh?>" width="100" scrolling="no" height="23" frameborder="0"></iframe></div>
</div>
<div class="xgtp box">
<div class="xgtpm">
 <div id="xgtp1" style="display:none;">���ڴ���</div>
 <div id="xgtp2"></div>
</div>
</div>
<!--Ч��ͼE-->

<div class="rts box" style="cursor:pointer;" onClick="xtinfonc()"><div class="d1">�����<span id="xtzs">չ��</span>��ѡ��֣����ǽ�����Ҳ��д��</div></div>

<div id="xuantian" style="display:none;">

<input type="hidden" value="<?=$row[tysx]?>" name="tysx" />
<? $i=1;while1("*","epzhu_typesx where admin=1 and typeid=".$row[ty1id]." order by xh asc");while($row1=mysql_fetch_array($res1)){?>
<input type="hidden" value="<?=$row1[id]?>" name="tysxty1_<?=$i?>" />
<div class="uk box">
 <div class="d1"><?=$row1[name1]?><span class="s1"></span></div>
 <div class="d2" id="idiv<?=$ijia?>">
 <? $j=1;while2("*","epzhu_typesx where admin=2 and name1='".$row1[name1]."' and typeid=".$row1[typeid]." order by xh asc");while($row2=mysql_fetch_array($res2)){?>
 <label><input name="Csx" type="checkbox" value="<?=$row2[id]?>"<? if(strstr($row[tysx],"xcf".$row2[id]."xcf")){?>checked="checked"<? }?> /> <?=$row2[name2]?></label>
 <? $j++;}?>
 <? 
 if(!empty($row1[ifzi])){
 $v="";
 $a1=preg_split("/xcf".$row1[id].":/",$row[tysx]);
 if(count($a1)>1){$b1=preg_split("/xcf/",$a1[1]);$v=$b1[0];}
 ?>
 <input type="text" name="zi_<?=$i?>_<?=$j?>" placeholder="�����ڴ��ֶ���������" value="<?=$v?>" class="inp" />
 <? }?>
 <input type="hidden" value="<?=$j?>" name="tysxSnum<?=$i?>" />
 </div>
 <div class="d3" onClick="iimgonc(<?=$ijia?>)"><img src="img/jian3.gif" id="iimg<?=$ijia?>" /></div>
</div>
<? $i++;$ijia++;}?>
<input type="hidden" value="<?=$i?>" name="tysxBnum" />

<div class="uk box">
 <div class="d1">��Ա�ȼ�<span class="s1"></span></div>
 <div class="d2">
 <select name="Rifuserdj" onChange="djonc()" style="font-size:13px;">
 <option value="0" <? if(empty($row[ifuserdj])){?> selected="selected"<? }?>>������</option>
 <option value="1" <? if(1==$row[ifuserdj]){?> selected="selected"<? }?>>����</option>
 </select>
 </div>
 <div class="d3"><img src="../img/rightjian.png" height="13" /></div>
</div>

<div id="djv" style="display:none;">
 <div class="djuk box">
  <div class="d1">��Ա�ȼ�<span class="s1"></span></div>
  <div class="d2">�ۿ�(10Ϊ���ۿۣ�9��ʾ9��)</div>
 </div>
 <? 
 $j=1;while1("*","epzhu_userdj where zt=0 order by xh asc");while($row1=mysql_fetch_array($res1)){
 while2("*","epzhu_prouserdj where probh='".$bh."' and djname='".$row1[name1]."'");if($row2=mysql_fetch_array($res2)){$zhekou=$row2[zhi];}else{$zhekou=$row1[zhekou];}
 ?>
 <div class="djuk1 box">
  <div class="d1"><input type="text" readonly name="name1_<?=$j?>" value="<?=$row1[name1]?>" /></div>
  <div class="d2"><input type="text" name="zhekou_<?=$j?>" value="<?=$zhekou?>" /></div>
 </div>
 <? $j++;}?>
 <input type="hidden" value="<?=$j?>" name="djnum" />
</div>

<div class="uk box">
 <div class="d1">��ʾ��ַ<span class="s1"></span></div>
 <div class="d2"><input placeholder="����������ʾ��ַ" type="text" class="inp" name="tysweb" value="<?=$row[ysweb]?>" /></div>
</div>

<div class="uk box">
 <div class="d1">�� ����<span class="s1"></span></div>
 <div class="d2"><input placeholder="��������SEO�ؼ���" type="text" class="inp" name="twkey" value="<?=$row[wkey]?>" /></div>
</div>

<div class="uk box">
 <div class="d1">�� ��<span class="s1"></span></div>
 <div class="d2"><textarea placeholder="��������SEO����" name="twdes" value="<?=$row[wkey]?>"></textarea></div>
</div>

<div class="uk box">
 <div class="d1">�Զ�����<span class="s1"></span></div>
 <div class="d2"><input placeholder="���������Զ������" type="text" class="inp" name="tmybh" value="<?=$row[mybh]?>" /></div>
</div>

</div>

<div class="fbbtn box">
 <div class="d1"><? tjbtnr_m("�����޸�")?></div>
</div>

</form>
<!--����-->

<script type="text/javascript">
//ʵ�����༭��
yhxsonc();
fhxsonc();
djonc();

function xgtread(x){
 $.get("readtp.php",{bh:x,admin:6},function(result){
  $("#xgtp2").html(result);
 });
}
function deltp(x){
 document.getElementById("xgtp1").style.display="";
 $.get("tpdel.php",{id:x,admin:6},function(result){
  xgtread("<?=$bh?>");
  document.getElementById("xgtp1").style.display="none";
 });
}
xgtread("<?=$bh?>");

function xtinfonc(){
if(document.getElementById("xtzs").innerHTML=="չ��"){document.getElementById("xuantian").style.display="";document.getElementById("xtzs").innerHTML="����";}
else{document.getElementById("xuantian").style.display="none";document.getElementById("xtzs").innerHTML="չ��";}
}

</script>

</body>
</html>