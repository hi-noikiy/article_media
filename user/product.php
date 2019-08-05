<?
include("../config/conn.php");//二次开发联系QQ:120036745//二次开发联系QQ:120036745
include("../config/function.php");//二-次开-发-联-系Q-Q:12-00-3674-5
sesCheck();
$sqluser="select * from epzhu_user where uid='".$_SESSION[SHOPUSER]."' and shopzt=2";mysql_query("SET NAMES 'GBK'");$resuser=mysql_query($sqluser);
if(!$rowuser=mysql_fetch_array($resuser)){php_toheader("openshop3.php");}
$timestamp=time();
$pwd=$rowuser[pwd];
$userid=$rowuser[id];
$bh=$_GET[bh];
while0("*","epzhu_pro where bh='".$bh."' and userid=".$userid);if(!$row=mysql_fetch_array($res)){php_toheader("productlist.php");}

//函数开始
if($_GET[control]=="update"){
 zwzr();
 $sj=date("Y-m-d H:i:s");
 $myty=preg_split("/yjcode/",sqlzhuru($_POST[mty]));
 $txt=sqlzhuru1($_POST[content]);
 $tit=sqlzhuru($_POST[ttit]);
 $bz=sqlzhuru($_POST[tbz]);
 $azsf=sqlzhuru($_POST[azsf]);
 $anzhuang=sqlzhuru($_POST[anzhuang]);
if(empty($anzhuang)){
	$anzhuang = 0;
}
 $azzj=sqlzhuru($_POST[azzj]);
 $azxt=sqlzhuru($_POST[azxt]);
 $azhj=sqlzhuru($_POST[azhj]);
 $azfs=sqlzhuru($_POST[azfs]);
 $azwjt=sqlzhuru($_POST[azwjt]);
 $sizes=sqlzhuru($_POST[tsizes]);
 $mobile=sqlzhuru($_POST[mobile]);
 
 $wkey=strgb2312(sqlzhuru($_POST[twkey]),0,240);
 $wdes=strgb2312(sqlzhuru($_POST[twdes]),0,240);
 $money1=sqlzhuru($_POST[tmoney1]);
 $money2=sqlzhuru($_POST[tmoney2]);
 $kcnum=sqlzhuru($_POST[tkcnum]);if(!is_numeric($kcnum)){$kcnum=0;}
 if($money1<0 || $money2<0){Audit_alert("价格不能为负数！","productlist.php");}
 $fhxs=intval(sqlzhuru($_POST[Rfhxs]));
 if($rowcontrol[ifproduct]=="on"){$nzt=0;}else{$nzt=1;}
 if(!empty($anzhuang) && !is_numeric($anzhuang)){Audit_alert("安装费请输入数字","productlist.php");}
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
			 anzhuang=".$anzhuang.",
			 azsf='".$azsf."',
			 azzj='".$azzj."',
			 azxt='".$azxt."',
			 azhj='".$azhj."',
			 azfs='".$azfs."',
			 azwjt='".$azwjt."',
			 sizes='".$sizes."',
			 mobile='".$mobile."',
			 zt=".$nzt.",
			 tit='".$tit."',
			 wkey='".$wkey."',
			 wdes='".$wdes."',
			 txt='".$txt."',
			 kcnum=".$kcnum.", 
			 money1=".$money1.", 
			 money2=".$money2.",
			 fhxs=".$fhxs.",
			 bz=".sqlzhuru($_POST[Rbz]).",
			 wpurl='".sqlzhuru($_POST[twpurl])."',
			 wppwd='".sqlzhuru($_POST[twppwd])."',
			 wppwd1='".sqlzhuru($_POST[twppwd1])."',
			 azbz='".sqlzhuru($_POST[tazbz])."',
			 ysweb='".sqlzhuru($_POST[tysweb])."',
			 ifuserdj=".$ifuserjd.",
			 txtmb='".sqlzhuru($_POST[ttxtmb])."',
			 zl=".sqlzhuru($_POST[tzl])."
			 where bh='".$bh."' and userid=".$userid);
 uploadtp($bh,"商品",$userid);
 //上传B
 if(3==$fhxs){
  $up1=$_FILES["inp1"]["name"];
  if(!empty($up1)){
  $mc=MakePassAll(15)."-".time()."-".$userid.".".returnhz($up1);
  $lj="../upload/".$userid."/".$bh."/";
  move_uploaded_file($_FILES["inp1"]['tmp_name'],$lj.$mc);
  delFile($lj.$row[upf]);
  updatetable("epzhu_pro","upf='".$mc."' where bh='".$bh."' and userid=".$userid);
  }
 }
 //上传E
 //卡密B
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
 //卡密E
 
 php_toheader("prosuc.php?bh=".$bh."&id=".$row[id]);

}
//函数结果

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><div class="yjcode"><? adwhile("ADTOP");?></div>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>用户管理面板 - <?=webname?></title>
<link href="../css/basic.css" rel="stylesheet" type="text/css" />
<link href="css/index.css" rel="stylesheet" type="text/css" />
<link href="css/product.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="js/index.js"></script>
<script type="text/javascript" src="js/adddate.js" ></script> 
<script language="javascript" src="../js/jquery.min.js"></script>
<script language="javascript" src="../js/layer.js"></script>


<script language="javascript">
function tj(){
if((document.f1.ttit.value).replace(/\s/,"")==""){alert("请输入标题");document.f1.ttit.focus();return false;}
a=document.f1.tkcnum.value;if(a.replace("/\s/","")=="" || isNaN(a)){alert("请输入有效的库存");document.f1.tkcnum.focus();return false;}
a=document.f1.tmoney1.value;if(a.replace("/\s/","")=="" || isNaN(a)){alert("请输入有效的价格");document.f1.tmoney1.focus();return false;}
a=document.f1.tmoney2.value;if(a.replace("/\s/","")=="" || isNaN(a)){alert("请输入有效的价格");document.f1.tmoney2.focus();return false;}
a=document.f1.tsizes.value;if(a.replace("/\s/","")=="" || isNaN(a)){alert("请输入程序大小");document.f1.tsizes.focus();return false;}
var tmoney2 = $('input[name=tmoney2]').val();

var azjg = $('input[name=anzhuang]').val();
var azsf = $("input[name='azsf']:checked").val();
if(parseFloat(azjg)<=0 && parseFloat(azsf)==1){alert("请输入收费服务价格");document.f1.azjg.focus();return false;}
if(parseFloat(azjg)>parseFloat(tmoney2) && parseFloat(azsf)==1){alert("安装服务费不能高于出售价格");document.f1.azjg.focus();return false;}
if($('input[name=azzj]').val()==''){alert("请选择安装主机类型");document.f1.azzj.focus();return false;}
if($('input[name=azxt]').val()==''){alert("请选择安装系统");document.f1.azxt.focus();return false;}
if($('input[name=azhj]').val()==''){alert("请选择安装环境");document.f1.azhj.focus();return false;}
if($('input[name=azfs]').val()==''){alert("请选择安装方式");document.f1.azfs.focus();return false;}
if($('input[name=azwjt]').val()==''){alert("请选择是否需要伪静态");document.f1.azwjt.focus();return false;}


r=document.getElementsByName("Rfhxs");rr="";for(i=0;i<r.length;i++){if(r[i].checked==true){rr=r[i].value;}}if(rr==""){alert("请选择发货形式！");return false;}
cstr="xcf";
c=document.getElementsByName("Csx");
for(i=0;i<c.length;i++){if(c[i].checked==true){cstr=cstr+c[i].value+"xcf";}}
document.f1.tysx.value=cstr;
layer.msg('正在提交', {icon: 16  ,time: 0,shade :0.25});
tjwait();
f1.action="product.php?bh=<?=$bh?>&control=update";
}
function bzonc(x){
if(1==x){document.getElementById("bzul").style.display="none";}	
else if(2==x){document.getElementById("bzul").style.display="";}	
}

function anzhuangs(x){
if(1==x){document.getElementById("az_div").style.display="none";}	
else if(2==x){document.getElementById("az_div").style.display="";}	
}
function fhxsonc(x){
for(i=1;i<=5;i++){
d=document.getElementById("fhxs"+i);if(d){d.style.display="none";}
}
d=document.getElementById("fhxs"+x);if(d){d.style.display="";}
if(x==4){document.getElementById("kcuk").style.display="none";}else{document.getElementById("kcuk").style.display="";}
}

function djonc(x){
if(0==x){document.getElementById("djv").style.display="none";}else{document.getElementById("djv").style.display="";}
}

function szfz(){
if(!confirm("将离开该页面，当前页面内容如果未保存，将会丢失，确认吗？")){return false;}
location.href="protypelist.php";
}

function yjkscha(){
m2=document.f1.tmoney2.value;
yjk=document.f1.yjks.value;
if(isNaN(m2) || yjk==""){yj=m2;}else{yj=accMul(m2,yjk);}
document.f1.tmoney1.value=yj;
}
function yjkscha(){
m2=document.f1.tsizes.value;
yjk=document.f1.yjks.value;
if(isNaN(m2) || yjk==""){yj=m2;}else{yj=accMul(m2,yjk);}
document.f1.tmoney1.value=yj;
}
function mobileonc(x){
if(1==x){document.getElementById("mobiletul").style.display="none";}	
else if(2==x){document.getElementById("mobiletul").style.display="";}	
}
</script>
<script type="text/javascript" charset="gbk" src="../config/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="gbk" src="../config/ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="gbk" src="../config/ueditor/lang/zh-cn/zh-cn.js"></script>
<script type="text/javascript" charset="gbk" src="../config/ueditor/unit.js"></script>

</head>
<body>
<? include("../tem/top.html");?>
<? include("../tem/userepzhucom.html");?>
<!--免费安装选择js -->
<link href="../js/chose/src/ui-choose.css" rel="stylesheet" />
<script src="../js/chose/src/ui-choose.js"></script>

<div class="bfb bfbuser">
<div class="yjcode">
<ul class="dqwz">
<li class="l1">您的位置：<a href="../" class="acy">首页</a> > <a href="./" class="acy">会员中心</a> > 商品编辑</li>
</ul>
<? $leftid=1;include("left.php");?>
<!--RB-->
<div class="right">

 <? include("protop.php");?>
 <? include("rcap3.php");?>
 <script language="javascript">
 document.getElementById("rcap1").className="g_ac0_h g_bc0_h";
 </script>

 <!--B-->
 <form name="f1" method="post" onsubmit="return tj()" enctype="multipart/form-data">
 <!--必填B-->
 <ul class="rcap"><li class="l1"></li><li class="l2">必填项目</li><li class="l3"></li></ul>
 <ul class="uk">
 <li class="l1">所在分组：</li>
 <li class="l21">
 <strong>
 <?=returntype(1,$row[ty1id])." - ".returntype(2,$row[ty2id])." - ".returntype(3,$row[ty3id])." - ".returntype(4,$row[ty4id])." - ".returntype(5,$row[ty5id])?>
 </strong>
 [<a href="productlx.php?action=update&id=<?=$row[id]?>">修改</a>]
 </li>
 <li class="l1">自定义分组：</li>
 <li class="l2">
 <select name="mty" class="inp1">
 <option value="0yjcode0">选择分组</option>
 <? while1("*","epzhu_protype where admin=1 and zt=0 and userid=".$luserid);while($row1=mysql_fetch_array($res1)){?>
 <option value="<?=$row1[id]?>yjcode0"<? if($row1[id]==$row[myty1id] && $row[myty2id]==0){?> selected="selected"<? }?> style="background-color:#EFEFEF;color:#333;"><?=$row1[name1]?></option>
 <? while2("*","epzhu_protype where admin=2 and name1='".$row1[name1]."' and zt=0 and userid=".$luserid);while($row2=mysql_fetch_array($res2)){?>
 <option value="<?=$row1[id]?>yjcode<?=$row2[id]?>"<? if($row1[id]==$row[myty1id] && $row2[id]==$row[myty2id]){?> selected="selected"<? }?>> - <?=$row2[name2]?></option>
 <? }?>
 <? }?>
 </select>
 <span class="fd"> [<a href="javascript:void(0);" onclick="szfz()">设置分组</a>]</span>
 </li>
 <li class="l1">标题：</li>
 <li class="l2"><input type="text" size="80" value="<?=$row[tit]?>" class="inp" name="ttit" /></li>

 <li class="l1">关键词：</li>
 <li class="l2"><input  name="twkey" value="<?=$row[wkey]?>" size="80" type="text" class="inp" /></li>
 <li class="l9">描述：</li>
 <li class="l10"><textarea name="twdes"><?=$row[wdes]?></textarea></li>
 <!-- <li class="l1">自定义编码：</li>
 <li class="l2"><input type="text" size="10" value="<?=$row[mybh]?>" class="inp" name="tmybh" /></li>-->

  <!--<li class="l1">优惠形式：</li>
 <li class="l2">
 <label><input name="Ryhxs" type="radio" value="1" onclick="yhxsonc(1)" <? if(1==$row[yhxs]){?>checked="checked"<? }?> /> 长期优惠</label>
 <label><input name="Ryhxs" type="radio" value="2" onclick="yhxsonc(2)" <? if(2==$row[yhxs]){?>checked="checked"<? }?> /> 限时优惠</label> 
 </li>-->
 <li class="l1">售价：</li>
 <li class="l2">
 <input class="inp" name="tmoney2" value="<?=$row[money2]?>" size="20" type="text"/>元
</li>
 <li class="l1">原价：</li>
 <li class="l2">
 <input class="inp" name="tmoney1" value="<?=$row[money1]?>" size="20" type="text"/>元
 <!--<select name="yjks" class="inp1" onchange="yjkscha()">
 <option value="">快捷设置</option>
 <? for($i=1;$i<10;$i++){?>
 <option value="1.<?=$i?>">X1.<?=$i?>(相当于当前售价为<?=10-$i?>折优惠)</option>
 <? }?>
 </select>
 </li>
 </ul>
 <ul class="uk uk0" id="yhxsul" style="display:none;">
 <li class="l1">限时优惠价：</li>
 <li class="l2"><input class="inp" name="tmoney3" value="<?=$row[money3]?>" size="10" type="text"/></li>
 <li class="l1">优惠说明：</li>
 <li class="l2"><input type="text" size="80" value="<?=$row[yhsm]?>" class="inp" name="tyhsm" /></li>
 <li class="l1">优惠时间：</li>
 <li class="l2">
 <input class="inp" name="tyhsj1" value="<?=$row[yhsj1]?>" readonly="readonly" onclick="SelectDate(this,'yyyy-MM-dd hh:mm:ss')" size="20" type="text"/> 
 <span class="fd">到</span> 
 <input class="inp" name="tyhsj2" value="<?=$row[yhsj2]?>" readonly="readonly" onclick="SelectDate(this,'yyyy-MM-dd hh:mm:ss')" size="20" type="text"/>-->
 </li>
 </ul>
 <ul class="uk uk0">
 <li class="l1">发货形式：</li>
 <li class="l2">
 <? if(strstr($rowcontrol[fhxs],"1") || empty($rowcontrol[fhxs])){?>
 <label><input name="Rfhxs" type="radio" value="1" onclick="fhxsonc(1)" <? if(1==$row[fhxs]){?>checked="checked"<? }?> /> 手动发货</label> &nbsp;&nbsp;
 <? }?>
 <? if(strstr($rowcontrol[fhxs],"2") || empty($rowcontrol[fhxs])){?>
 <label><input name="Rfhxs" type="radio" value="2" onclick="fhxsonc(2)" <? if(2==$row[fhxs]){?>checked="checked"<? }?> /> 自动发货</label> &nbsp;&nbsp;
 <? }?>
  <!--<? if(strstr($rowcontrol[fhxs],"3") || empty($rowcontrol[fhxs])){?>
 <label><input name="Rfhxs" type="radio" value="3" onclick="fhxsonc(3)" <? if(3==$row[fhxs]){?>checked="checked"<? }?> /> 网站直接下载</label>&nbsp;&nbsp;
 <? }?>-->
 <? if(strstr($rowcontrol[fhxs],"4") || empty($rowcontrol[fhxs])){?>
 <label><input name="Rfhxs" type="radio" value="4" onclick="fhxsonc(4)" <? if(4==$row[fhxs]){?>checked="checked"<? }?> /> 点卡发货</label>&nbsp;&nbsp;
 <? }?>
 <!-- <? if(strstr($rowcontrol[fhxs],"5") || empty($rowcontrol[fhxs])){?>
 <label><input name="Rfhxs" type="radio" value="5" onclick="fhxsonc(5)" <? if(5==$row[fhxs]){?>checked="checked"<? }?> /> 实物快递</label>&nbsp;&nbsp;
 <? }?>-->
 </li>
 </ul> 
 <ul class="uk uk0" id="kcuk">
 <li class="l1">库存量：</li>
 <li class="l2"><input class="inp" name="tkcnum" value="<?=returnjgdw($row[kcnum],"",0)?>" size="10" type="text"/> <span class="fd hui">(如果是点卡交易类，库存值无需填写，将自动读取)</span></li>
 </ul>
 <ul class="uk uk0" id="fhxs2" style="display:none;">
 <li class="l1">网盘地址：</li>
 <li class="l2"><input class="inp" name="twpurl" value="<?=$row[wpurl]?>" size="80" type="text"/></li>
 <li class="l1">网盘密码：</li>
 <li class="l2"><input class="inp" name="twppwd" value="<?=$row[wppwd]?>" size="20" type="text"/></li>
 <li class="l1">解压密码：</li>
 <li class="l2"><input class="inp" name="twppwd1" value="<?=$row[wppwd1]?>" size="20" type="text"/></li>
 </ul>
 <ul class="uk uk0" id="fhxs3" style="display:none;">
 <li class="l1">上传文件：</li>
 <li class="l2"><label><input type="file" name="inp1" id="inp1" size="25"></label></li>
 <? if(!empty($row[upf])){?>
 <li class="l1">文件预览：</li>
 <li class="l21">【<a href="../upload/<?=$row[userid]?>/<?=$row[bh]?>/<?=$row[upf]?>" class="blue" target="_blank">点击预览</a>】</li>
 <? }?>
 </ul>
 <ul class="uk uk0" id="fhxs4" style="display:none;">
 <li class="l1">库存：</li>
 <li class="l21"><strong class="red"><?=$row[kcnum]?>件</strong> [<a href="kclist.php?bh=<?=$bh?>" target="_blank" class="blue">管理库存</a>]</li>
 <li class="l1">说明：</li>
 <li class="l21 red">导入格式为卡号+空格+密码(可跟上附加内容)，一行一组，如AAAAA BBBBB</li>
 <li class="l11">添加卡密：</li>
 <li class="l12"><textarea name="s1"></textarea></li>
 </ul>
 <ul class="uk uk0" id="fhxs5" style="display:none;">
 <li class="l1">重量：</li>
 <li class="l2"><input class="inp" name="tzl" value="<?=sprintf("%.2f",$row[zl])?>" size="10" type="text"/> <span class="fd">KG</span></li>
 </ul>
 <!--必填E-->
 
 <!--效果图/详情B-->
 <ul class="rcap"><li class="l1"></li><li class="l2">效果图/详情</li><li class="l3"></li></ul>
 <ul class="uk uk0">
 <li class="l1">效果图：</li>
 <li class="l2">
 <iframe style="float:left;" src="tpupload.php?admin=1&bh=<?=$bh?>" width="150" scrolling="no" height="33" frameborder="0"></iframe>
 <span class="fd hui">　可最多上传7张效果图</span>
 </li>
 </ul>
 <div class="xgtp">
  <div id="xgtp1" style="display:none;">正在处理</div>
  <div id="xgtp2"></div>
 </div>
 
 <ul class="uk uk0">
 <li class="l7">商品详情：</li>
 <li class="l8"><script id="editor" name="content" type="text/plain" style="width:790px;height:330px;"><?=$row[txt]?></script></li>
 </ul>
 <!--效果图/详情E-->
 
 <!--选填B-->
 <ul class="rcap"><li class="l1"></li><li class="l2">选填项目</li><li class="l3"></li></ul>
 <div class="rts" style="cursor:pointer;" onclick="xtinfonc()">【点击<span id="xtzs" class="red">收起</span>】 选填部分可以不填写，但完善选填信息有助于您的商品更快出售，因此我们也建议您能耐心完善好。</div>
 <div id="xuantian">
 <div class="tysx">
 <input type="hidden" value="<?=$row[tysx]?>" name="tysx" />
 <? $i=1;while1("*","epzhu_typesx where admin=1 and typeid=".$row[ty1id]." order by xh asc");while($row1=mysql_fetch_array($res1)){?>
 <input type="hidden" value="<?=$row1[id]?>" name="tysxty1_<?=$i?>" />
 <ul class="uk1">
 <li class="l1"><?=$row1[name1]?>：</li>
 <li class="l2">
 <? $j=1;while2("*","epzhu_typesx where admin=2 and name1='".$row1[name1]."' and typeid=".$row1[typeid]." order by xh asc");while($row2=mysql_fetch_array($res2)){?>
 <label><input name="Csx" type="checkbox" value="<?=$row2[id]?>"<? if(strstr($row[tysx],"xcf".$row2[id]."xcf")){?>checked="checked"<? }?> /> <?=$row2[name2]?></label>
 <? $j++;}?>
 <? 
 if(!empty($row1[ifzi])){
 $v="";
 $a1=preg_split("/xcf".$row1[id].":/",$row[tysx]);
 if(count($a1)>1){$b1=preg_split("/xcf/",$a1[1]);$v=$b1[0];}
 ?>
 <input type="text" name="zi_<?=$i?>_<?=$j?>" size="10" value="<?=$v?>" class="inp" />
 <? }?>
 <input type="hidden" value="<?=$j?>" name="tysxSnum<?=$i?>" />
 </li>
 </ul>
 <? $i++;}?>
 </div>

 
 <!--[if IE]>
		<script src="/js/html5.min.js"></script>
	<![endif]-->
 <style>
 .uk .azfw{margin-left:108px;font-size:14px;background:#f8f8f8;float:left;border:1px solid #ececec;z-index:1;padding-bottom:10px;}
 .uk .azfw .l1{width:70px;}
 .uk .azfw .l2{width:680px;}
 .uk .azfw .l1,.uk .azfw .l2{padding:5px 5px;line-height:30px;height:40px;}
 .uk .l2 .mf, .uk .l2 .sf{float:left;padding:0px 10px;width:80px;height:30px;text-align:center;line-height:30px;position:absolute;left:0;top:0;    cursor: pointer;}
  .uk .l2 .sf{left:95px;;}
 .uk .l2 .act{background:#f8f8f8;border:1px solid #ececec;border-bottom:none;z-index:10;height:31px;}
 </style>
  <div class="tysx">
 <ul class="uk11">
 <li class="l1">移动端：</li>
 <li class=""<? if($row['mobile']!=0){echo 'act';}?>" onclick="mobileonc(6)"> <input name="mobile" type="radio" value="0" <? if(0==$row[mobile]){?>checked="checked"<? }?> />  <li class="l2">无</label>
 <li class=""<? if($row['mobile']==1){echo 'act';}?>" onclick="mobileonc(7)"> <input name="mobile" type="radio" value="1" <? if(1==$row[mobile]){?>checked="checked"<? }?> /> <li class="l2"> Wap</label>
 <li class=""<? if($row['mobile']==1){echo 'act';}?>" onclick="mobileonc(8)"> <input name="mobile" type="radio" value="2" <? if(2==$row[mobile]){?>checked="checked"<? }?> />  <li class="l2">App</label>
 <li class=""<? if($row['mobile']==1){echo 'act';}?>" onclick="mobileonc(9)"> <input name="mobile" type="radio" value="3" <? if(3==$row[mobile]){?>checked="checked"<? }?> />  <li class="l2">Wap+App</label>
 <li class=""<? if($row['mobile']==1){echo 'act';}?>" onclick="mobileonc(10)"> <input name="mobile" type="radio" value="4" <? if(4==$row[mobile]){?>checked="checked"<? }?> />  <li class="l2">自适应</label>
 </li>
 </ul>
<ul class="uk"> 
<li class="l1" style="border-bottom:none;"><span class="red">*</span> 安装服务：</li>
 <li class="l2">
 <span class="finp" style="position:relative;">

<div class="mf <? if($row['azsf']!=1){echo 'act';}?>"  onclick="anzhuangs(1)"> <input name="azsf" type="radio" value="0" <? if(0==$row[azsf]){?>checked="checked"<? }?> /> 免费安装</div>
 
<div class="sf <? if($row['azsf']==1){echo 'act';}?>" onclick="anzhuangs(2)"> <input name="azsf" type="radio" value="1" <? if(1==$row[azsf]){?>checked="checked"<? }?> /> 收费安装  </div>
 
 </span>
 </li>
 <div class="azfw">
 <div id="az_div" <? if($row['azsf']==0){?> style="display:none;"<? } ?>>
  <li class="l1"><span class="red">*</span> 安装费用</li>
 <li class="l2"><input class="inp" name="anzhuang"  value="<?=$row[anzhuang]?>" size="10" type="text"/> <span class="red">提示：请直接输入价格</span></li>
 </div>
<li class="l1"><span class="red">*</span> 主机类型</li>
<li class="l2">
	<select class="ui-choose" multiple="multiple" id="uc_01">
		<option value="独立主机（服务器、VPS、VM） " <? if(strstr($row['azzj'],'独立主机（服务器、VPS、VM） ')==true){echo 'selected="selected"';}?>>独立主机（服务器、VPS、VM）</option>
		<option value="虚拟主机（仅有FTP管理）" <? if(strstr($row['azzj'],'虚拟主机（仅有FTP管理）')==true){echo 'selected="selected"';}?>>虚拟主机（仅有FTP管理）</option>
		<input type="hidden" class="azzj" name="azzj" value="<?=$row['azzj']?>">
	</select>
</li>
<li class="l1"><span class="red">*</span> 操作系统</li>
<li class="l2">
	<select class="ui-choose" multiple="multiple" id="uc_02">
		<option value="Windows " <? if(strstr($row['azxt'],'Windows ')==true){echo 'selected="selected"';}?>>Windows</option>
		<option value=" Linux" <? if(strstr($row['azxt'],' Linux')==true){echo 'selected="selected"';}?>>Linux</option>
		<input type="hidden" class="azxt" name="azxt" value="<?=$row['azxt']?>">
		
	</select>
</li>
<li class="l1"><span class="red">*</span> web服务</li>
<li class="l2">
	<select class="ui-choose" multiple="multiple" id="uc_03">
		<option value="IIS " <? if(strstr($row['azhj'],'IIS ')==true){echo 'selected="selected"';}?>>IIS</option>
		<option value=" Apache" <? if(strstr($row['azhj'],' Apache')==true){echo 'selected="selected"';}?>>Apache</option>
		<input type="hidden" class="azhj" name="azhj" value="<?=$row['azhj']?>">
	</select>
</li>
<li class="l1"><span class="red">*</span> 安装方式</li>
<li class="l2">
	<select class="ui-choose" multiple="multiple" id="uc_04">
		<option value="提供管理权限 " <? if(strstr($row['azfs'],'提供管理权限 ')==true){echo 'selected="selected"';}?>>提供管理权限</option>
		<option value="QQ远程安装 " <? if(strstr($row['azfs'],' QQ远程安装')==true){echo 'selected="selected"';}?>>QQ远程安装</option>
		<input type="hidden" class="azfs" name="azfs" value="<?=$row['azfs']?>">
	</select>
</li>
<li class="l1"> 伪静态</li>
<li class="l2">
	<select class="ui-choose" id="uc_05">
	<option value="1" <? if(strstr($row['azwjt'],'1')==true){echo 'selected="selected"';}?>>不需要</option>
    <option value="2" <? if(strstr($row['azwjt'],'2')==true){echo 'selected="selected"';}?>>需要</option>
		<input type="hidden" class="azwjt" name="azwjt" value="<? if(empty($row['azwjt'])){echo 'b';}else{echo $row['azwjt'];}?>">
	</select>
</li>
<div class="layui-form-item">
    <label class="layui-form-label">备注说明</label>
    <div class="layui-input-inline" style="width:380px;">
		<textarea name="tazbz" style="height:50px;" class="layui-textarea checkLen" d_len="100"><?=$row[azbz]?></textarea> </div>
		<div class="layui-form-mid layui-word-aux">总共您可以输入 <b id="check_count">100</b> 个字</div>
		</div>

 <script>

	// 将所有.ui-choose实例化
	$('.ui-choose').ui_choose();

	$('#uc_01').ui_choose().change = function(value, item) {
		$('.azzj').val(value);
	};
	
	$('#uc_02').ui_choose().change = function(value, item) {
		$('.azxt').val(value);
	};
	
	$('#uc_03').ui_choose().change = function(value, item) {
		$('.azhj').val(value);
	};
	
	$('#uc_04').ui_choose().change = function(value, item) {
		$('.azfs').val(value);
	};
	var uc_05 = $('#uc_05').data('ui-choose');
	uc_05.change = function(value, item) {
	   $('.azwjt').val(value);
	};
	</script>
<div class="notes">
<li> <h3> 安装服务说明：</h3></li>
<li><b>1.</b>【免费安装】、【收费安装】必须且仅能选则其一，不提供任何安装服务的则不允许出售；</li>
<li><b>2.</b>【主机类型】、【操作系统】、【运行环境】、【安装方式】每项至少选一，也可全选；</li>
<li><b>3.</b>【伪静态】为单选项，即该源码是否需要伪静态组件支持方能正常运行；</li>
<li><b>4.</b>【备注说明】可以填写一些上方未列选项，亦或者该源码需某些特殊组件支持等附加说明；</li>
<li><b>5.</b>建议在您的服务能力范围内尽量多选，可以在集市中获得更多的买家筛选展示；</li>
<li><b>6.</b>建议多选不代表可以乱选，一旦无法提供上述所勾选的服务，产生交易纠纷将判定为您的责任。</li>
	 </div>
  <div style="clear:both;"></div>
</ul>

 <input type="hidden" value="<?=$i?>" name="tysxBnum" />
 <ul class="uk">
 <li class="l1">会员等级：</li>
 <li class="l2">
 <label><input name="Rifuserdj" type="radio" value="0" onclick="djonc(0)" <? if(empty($row[ifuserdj])){?>checked="checked"<? }?> /> 不启用</label> 
 <label><input name="Rifuserdj" type="radio" value="1" onclick="djonc(1)" <? if(1==$row[ifuserdj]){?>checked="checked"<? }?> /> 启用</label> 
 </li>
 </ul>
 <div id="djv" style="display:none;">
 <ul class="dju1">
 <li class="l1">会员等级</li>
 <li class="l2">享受折扣(10表示无折扣，9表示9折)</li>
 </ul>
 <? 
 $j=1;while1("*","epzhu_userdj where zt=0 order by xh asc");while($row1=mysql_fetch_array($res1)){
 while2("*","epzhu_prouserdj where probh='".$bh."' and djname='".$row1[name1]."'");if($row2=mysql_fetch_array($res2)){$zhekou=$row2[zhi];}else{$zhekou=$row1[zhekou];}
 ?>
 <ul class="dju2">
 <li class="l1"><input type="text" readonly="readonly" name="name1_<?=$j?>" value="<?=$row1[name1]?>" /></li>
 <li class="l2"><input type="text" name="zhekou_<?=$j?>" value="<?=$zhekou?>" /></li>
 </ul>
 <? $j++;}?>
 <input type="hidden" value="<?=$j?>" name="djnum" />
 </div>
 <ul class="uk uk0">
 <li class="l1">套餐设置：</li>
 <li class="l21">【<strong><a href="taocanlist.php?bh=<?=$row[bh]?>" target="_blank" class="blue">点击进入套餐编辑</a></strong>】</li>
 <li class="l1">演示网址：</li>
 <li class="l2"><input type="text" placeholder="可留空，否则要以http://开头 "size="60" value="<?=$row[ysweb]?>" class="inp" name="tysweb" /></li>
 <li class="l1">源码大小：</li>
 <li class="l2">
 <input class="inp" name="tsizes" value="<?=$row[sizes]?>" size="20" type="text"/>MB
</li>
 <li class="l1">作品来源：</li>
 <li class="l2">
 <label><input name="Rbz" type="radio" value="0" onclick="bzonc(5)" <? if(0==$row[bz]){?>checked="checked"<? }?> /> 转载作品</label>
 <label><input name="Rbz" type="radio" value="1" onclick="bzonc(4)" <? if(1==$row[bz]){?>checked="checked"<? }?> /> 原创作品</label> 
 </li>
 <li class="l1">展示模板：</li>
 <li class="l2">
 <select name="ttxtmb" class="inp1">
 <option value="">默认模板</option>
 <? while1("*","epzhu_txtmb where admin=1 order by mbid asc");while($row1=mysql_fetch_array($res1)){?>
 <option value="<?=$row1[mbid]?>"<? if($row1[mbid]==$row[txtmb]){?> selected="selected"<? }?>><?=$row1[tit]?>(<?=$row1[txt]?>)</option>
 <? }?>
 </select>

 </div>
 <!--选填E-->
 <ul class="uk">
 <li class="l3"></li>
 <li class="l4"><? tjbtnr("提交","productlist.php")?></li>
 </ul>
 </form>
 <!--E-->
</div> 
<!--RE-->
</div>
</div>
<div class="yizhanw"> <div class="yizhanw2"><? include("../tem/bottom.html");?></div> </div>
<script type="text/javascript">
//实例化编辑器
fhxsonc(<?=$row[fhxs]?>);
djonc(<?=returnjgdw($row[ifuserdj],"",0)?>);

function xgtread(x){
 $.get("protp.php",{bh:x},function(result){
  $("#xgtp2").html(result);
 });
}
function deltp(x){
 document.getElementById("xgtp1").style.display="";
 $.get("protpdel.php",{id:x},function(result){
  xgtread("<?=$bh?>");
  document.getElementById("xgtp1").style.display="none";
 });
}
xgtread("<?=$bh?>");

function xtinfonc(){
if(document.getElementById("xtzs").innerHTML=="展开"){document.getElementById("xuantian").style.display="";document.getElementById("xtzs").innerHTML="收起";}
else{document.getElementById("xuantian").style.display="none";document.getElementById("xtzs").innerHTML="展开";}
}

var editor = UE.getEditor('editor'); 

</script>
</body>
</html>