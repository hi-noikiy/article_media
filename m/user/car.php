<?
include("../../config/conn.php");
include("../../config/function.php");
sesCheck_m();
$userid=returnuserid($_SESSION[SHOPUSER]);
$shdz=returnjgdw($_GET[shdz],"",0);
//����B
if($_GET[action]=="del"){
deletetable("epzhu_car where id=".$_GET[id]." and userid=".$userid);
php_toheader("car.php");
}
//����E
?>
<html>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
<title>��Ա���� <?=webname?></title>
<link rel="stylesheet" href="../css/basic.css">
<link rel="stylesheet" href="index.css">
<script src="../js/jquery-1.9.1.min.js" type="text/javascript"></script>
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="index.js"></script>
<script language="javascript" src="../js/layer.js"></script>
<script language="javascript">
function xuanall(){
xuan();
carmoney();
}

var fhxs5=0;
function carmoney(){
am=0;
yhm=0; //�Ż�ֵ
carallv=parseInt(document.getElementById("carallnum").innerHTML);
for(i=1;i<carallv;i++){
 c=document.getElementById("check"+i).checked;
 if(c==true){
  inpmoney=parseFloat(document.getElementById("inpmoney"+i).value);
  inpnum=parseInt(document.getElementById("inpnum"+i).value);
  ddm=accMul(inpnum,inpmoney);//������Ʒ�ܼ�
  yhz=parseInt(document.getElementById("yhzhi"+i).innerHTML);
  if(yhz!=10){yhm=yhm+ddm-ddm*yhz/10;ddm=ddm*yhz/10;}
  yf=parseInt(document.getElementById("yunfei"+i).innerHTML);
  am=addNum(am,ddm+yf);
  if(parseInt(document.getElementById("fhxs"+i).innerHTML)==5){fhxs5=1;}
 }
}
document.getElementById("moneyall").innerHTML=am;
document.getElementById("yhmoney").innerHTML=yhm;
if(fhxs5==1){document.getElementById("shdzmain").style.display="";}else{document.getElementById("shdzmain").style.display="none";}
}

function carjs(){
carid="";
buystr="";
carallv=parseInt(document.getElementById("carallnum").innerHTML);
for(i=1;i<carallv;i++){
 c=document.getElementById("check"+i).checked;
 if(c==true){
  carid=carid+document.getElementById("check"+i).value+"-"+document.getElementById("inpnum"+i).value+"c";
  //����ģ��B
  buystrs="";
  if(document.getElementById("smalla"+i)){
   b=parseInt(document.getElementById("smalla"+i).innerHTML);
   for(j=1;j<=b;j++){buystrs=buystrs+document.getElementById("buyt"+i+"_"+j).value+document.getElementById("buyv"+i+"_"+j).value+"<br>";}
  }
  buystr=buystr+buystrs+"yj99yjcode";
  //����ģ��E
 }
}
if(carid==""){layer.open({content: 'δѡ���κν�����Ʒ',btn: '��֪����'});return false;}
if(fhxs5==1){
shd=parseInt(document.getElementById("shdzid").innerHTML);
if(shd==0){layer.open({content: '����ѡ���ջ���ַ',btn: '��֪����'});return false;}
}
 if(buystr!=""){
  layer.open({type: 2,content: '�����ύ'});
  $.post("../../user/buyform.php",{bv:buystr,cid:carid},function(result){
   if(result=="ok"){location.href="carpay.php?carid="+carid;}
   else{layer.open({content: '�ύʧ�ܣ�������',btn: '��֪����'});return false;}
  });
 }else{
  location.href="carpay.php?carid="+carid;
 }
}

function cjian(x,y,z){
a=parseInt(document.getElementById("inpnum"+x).value);
if(a>1){document.getElementById("inpnum"+x).value=a-1;}
yunfeicha(x,y,z);
}

function cjia(x,y,z){
a=parseInt(document.getElementById("inpnum"+x).value);
document.getElementById("inpnum"+x).value=a+1;
yunfeicha(x,y,z);
}

function txtonc(x){
carallv=parseInt(document.getElementById("carallnum").innerHTML);
for(i=1;i<carallv;i++){
d=document.getElementById("txta"+i);
if(d){d.style.display="none";document.getElementById("text"+i).className="";}
}
document.getElementById("txta"+x).style.display="";document.getElementById("text"+x).className="t1";
}

function txtaonc(x,y){
 layer.open({type: 2,content: '���ڱ���'});
 $.post("bzphp.php",{bzv:document.getElementById("text"+x).value,cid:y},function(result){
  if(result=="ok"){
  layer.close(layer.index);
  document.getElementById("txta"+x).style.display="none";
  document.getElementById("text"+x).className="";
  }
  else{layer.open({content: '����ʧ�ܣ�������',btn: '��֪����'});return false;}
 });
}

function yunfeicha(x,a,b){
 if(b==0){carmoney(x);}
 else{
  inps=document.getElementById("inpnum"+x).value;
  $.get("../../tem/getyf.php",{u:a,s:<?=$shdz?>,sl:inps,p:b},function(result){
   document.getElementById("yunfei"+x).innerHTML=result;
   carmoney(x);
  });
 }
}

function cardel(x){
 if(!confirm("ȷ��ɾ����")){return false;}
 layer.open({type: 2,content: '����ɾ��'});
 $.get("cardel.php",{id:x,ty:"one"},function(result){
 location.reload();
 });
}

function cardelall(){
 if(!confirm("ȷ����գ�")){return false;}
 layer.open({type: 2,content: '�������'});
 $.get("cardel.php",{ty:"all"},function(result){
 location.reload();
 });
}
</script>
</head>
<body>
<? include("topuser.php");?>

<div class="bfbtop1fd">
<div class="bfbtop1 box">
 <div class="d1" onClick="gourl('index.php')"><img src="img/topleft.png" height="21" /></div>
 <div class="d2">���ﳵ</div>
 <div class="d4 red" onClick="cardelall()">���</div>
</div>
</div>
<div class="bfbtop1fdv"></div>

<? if(panduan("*","epzhu_car where userid=".$rowuser[id])==1){?>
<!--��B-->
<div id="shdzmain" style="display:none;">
 <? 
 $shdzid=0;
 while1("*","epzhu_shdz where zt=0 and userid=".$rowuser[id]." order by ifmr desc");while($row1=mysql_fetch_array($res1)){
 if(($row1[ifmr]==1 && $_GET[shdz]=="") or ($row1[id]==$_GET[shdz])){
 $shdzid=$row1[id];
 updatetable("epzhu_car","shdzid=".$shdzid." where userid=".$rowuser[id]);
 ?>
 <div class="shdz box" onClick="gourl('carshdz.php')">
  <div class="d1">�ջ��ˣ�<?=$row1[lxr]?></div>
  <div class="d2"><?=$row1[mot]?></div>
 </div>
 <div class="shdz1 box" onClick="gourl('carshdz.php')">
  <div class="d1"><img src="img/location.png" height="15" /></div>
  <div class="d2"><?=$row1[add1v].$row1[add2v].$row1[add3v].$row1[addr]?></div>
  <div class="d3"><img src="img/jianright.png" height="13" /></div>
 </div>
 <? }}?>
 <? if(empty($shdzid)){?>
 <div class="shdzaddt box"><div class="d1">�ջ���Ϣ</div></div>
 <div class="shdzadd box" onClick="gourl('carshdz.php')"><div class="d1">���ѡ���ջ���ַ</div><div class="d2"><img src="img/jianright.png" height="16" /></div></div>
 <? }?>
 <span id="shdzid" style="display:none;"><?=$shdzid?></span>
</div>

<?
$i=1;
while0("*","epzhu_car where userid=".$rowuser[id]." group by selluserid order by sj desc");while($row=mysql_fetch_array($res)){
$sqlu="select * from epzhu_user where id=".$row[selluserid];mysql_query("SET NAMES 'GBK'");$resu=mysql_query($sqlu);$rowu=mysql_fetch_array($resu);
$shoptp="../upload/".$rowu[id]."/shop.jpg";
?>
<div class="carM box">
 <div class="d1"><img src="img/shop.png" height="16" /></div>
 <div class="d2"><?=$rowu[shopname]?></div>
</div>

<?
while1("*","epzhu_car where userid=".$rowuser[id]." and selluserid=".$row[selluserid]." order by sj desc");while($row1=mysql_fetch_array($res1)){
$tp="../../".returntp("bh='".$row1[probh]."' order by iffm desc","-2");
while2("*","epzhu_pro where bh='".$row1[probh]."' and zt=0 and ifxj=0");if($row2=mysql_fetch_array($res2)){
$money=returnyhmoney($row2[yhxs],$row2[money2],$row2[money3],$sj,$row2[yhsj1],$row2[yhsj2],$row2[id]);
$money1=$row2["money1"];
$au="../product/view".$row2[id].".html";
?>
<div class="car box">
 <div class="d1"><input onClick="carmoney()" checked="checked" name="C1" id="check<?=$i?>" type="checkbox" value="<?=$row1[id]?>" /></div>
 <div class="d2">
 <img border="0" src="<?=returntppd($tp,"img/none60x60.gif")?>" width="50" height="50" /><br>
 <img src="img/cardel.png" onClick="cardel(<?=$row1[id]?>)" width="15" style="margin:8px 0 0 0;" />
 </div>
 <div class="d3">
 <span class="s1">
 <?=$row2["tit"]?>
 <span id="fhxs<?=$i?>" style="display:none"><?=$row2[fhxs]?></span>
 <? 
 if(!empty($row1[tcid])){
 while3("*","epzhu_taocan where id=".$row1[tcid]);if($row3=mysql_fetch_array($res3)){
 $money=$row3[money1];
 $money1=$row3[money2];
 $tit=$row3[tit];
 if($row3[admin]==2){$tit=$tit." ".$row3[tit2];}
 echo "<span class='hui'>(�ײ�:".$tit.")</span>";
 }}?>
 </span>

 <span class="yf"<? if(empty($_GET[shdz]) || 5!=$row2[fhxs]){?> style="display:none;"<? }?>>�˷�<span  id="yunfei<?=$i?>"><?=returnyunfei($row2[userid],$shdz,$row1[num],$row2[bh])?></span>Ԫ</span>

 <?
 /*��ȡ�Ż�B*/
 $yhzhi=10;
 if(!empty($row2[ifuserdj])){
  if(!empty($rowuser[userdj])){$s=" and name1='".$rowuser[userdj]."'";$djname=$rowuser[userdj];}else{$s="";$djname="";}
  $sqlu4="select * from epzhu_prouserdj where probh='".$row2[bh]."' and djname='".$djname."'";mysql_query("SET NAMES 'GBK'");$resu4=mysql_query($sqlu4);
  if($rowu4=mysql_fetch_array($resu4)){
   $userdj=$rowu4[djname];
   $yhzhi=$rowu4[zhi];
  }else{
   $sqlu3="select * from epzhu_userdj where zt=0".$s." order by xh asc limit 1";mysql_query("SET NAMES 'GBK'");$resu3=mysql_query($sqlu3);
   if($rowu3=mysql_fetch_array($resu3)){
   $userdj=$rowu3[name1];
   $yhzhi=$rowu3[zhekou];
   } 
  }
 }
 if($yhzhi!=10 && !empty($yhzhi)){echo "<span class='yh'>".$userdj."��".$yhzhi."��</span>";}
 /*��ȡ�Ż�E*/
 ?>
 <span id="yhzhi<?=$i?>" style="display:none;"><?=$yhzhi?></span>

 <span class="s3"><strong>��<?=$money?></strong></span>
 <span class="s4">
  <span onClick="cjian(<?=$i?>,<?=$row2[userid]?>,'<?=$row2[bh]?>')">-</span><input id="inpnum<?=$i?>" class="tjinput" type="text" value="<?=$row1[num]?>" /><span onClick="cjia(<?=$i?>,<?=$row2[userid]?>,'<?=$row2[bh]?>')">+</span>
 </span>
 <!--����ģ��B-->
 <?
 $sqlt1="select * from epzhu_type where admin=2 and id=".$row2[ty2id];mysql_query("SET NAMES 'GBK'");$rest1=mysql_query($sqlt1);if($rowt1=mysql_fetch_array($rest1)){
 if(!empty($rowt1[buyform])){
  $av=str_replace("\r","",$rowt1[buyform]);
  $a=preg_split("/\n/",$av);
  $smalla=0;
  for($j=0;$j<=count($a);$j++){
  if(!empty($a[$j])){
  $smalla++;
 ?>
 <div class="ub">
 <input type="text" style="display:none;" value="<?=$a[$j]?>" id="buyt<?=$i?>_<?=$smalla?>" /><span class="ub1"><?=$a[$j]?></span>
 <input type="text" class="ub2 tjinput" id="buyv<?=$i?>_<?=$smalla?>" />
 </div>
 <? }}?>
 <div id="smalla<?=$i?>" style="display:none;"><?=$smalla?></div>
 <?
 }
 }
 ?>
 <!--����ģ��E-->
 <div class="liuyan">
  <textarea id="text<?=$i?>" onClick="txtonc(<?=$i?>)" placeholder="ѡ������ҵ�����"><?=$row1[bz]?></textarea>
  <a href="javascript:void(0);" id="txta<?=$i?>" onClick="txtaonc(<?=$i?>,<?=$row1[id]?>)" style="display:none;">����</a>
 </div>
 <input style="display:none;" id="inpmoney<?=$i?>" type="text" value="<?=$money?>" />
 </div>
</div>

<?
$i++;
}}
?>
<div class="carbottom box"></div>
<? }?>

<div class="carjsF"></div>
<div class="carjs">
 <div class="d1">���Ż�<span id="yhmoney" class="feng">0</span>Ԫ,ʵ��:��<span class="s1" id="moneyall">0</span></div>
 <div class="d2" onClick="carjs()">����</div>
</div>
<span id="carallnum" style="display:none;"><?=$i?></span>
<script language="javascript">
carmoney();
</script>
<!--��E-->
<? }else{?>
<!--��B-->
<div class="wait box" onClick="gourl('../')">
 <div class="d1">
  <span class="s0"><img src="img/cart.png" width="70" /></span>
  <span class="s1">���Ĺ��ﳵ���ǿյ�</span>
  <span class="s2">ȥ��һЩ�������Ʒ��</span>
 </div>
</div>
<!--��E-->
<? }?>
<? include("bottom.php");?>
<script language="javascript">
bottomjd(3);
</script>
</body>
</html>