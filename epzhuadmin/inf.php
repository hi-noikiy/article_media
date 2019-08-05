<?php
include("../config/conn.php");//二次开发联系QQ:120036745//二次开发联系QQ:12-0036-745
include("../config/function.php");
AdminSes_audit();

if(sqlzhuru($_POST[jvs])=="control"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){Audit_alert("权限不够","default.php");}
 zwzr();
 if(panduan("*","epzhu_control")==0){intotable("epzhu_control","webnamev","'保存失败'");}
 updatetable("epzhu_control","
			  webnamev='".sqlzhuru($_POST[twebnamev])."',
			  weburlv='".sqlzhuru($_POST[tweburlv])."',
			  webtit='".sqlzhuru($_POST[twebtit])."',
			  webkey='".sqlzhuru($_POST[twebkey])."',
			  webdes='".sqlzhuru($_POST[swebdes])."',
			  webtj='".sqlzhuru1($_POST[swebtj])."',
			  webqqv='".sqlzhuru($_POST[twebqqv])."',
			  webtelv='".sqlzhuru($_POST[twebtelv])."',
			  beian='".sqlzhuru($_POST[tbeian])."',
			  websyposv=".sqlzhuru($_POST[d1]).",
			  propx=".sqlzhuru($_POST[R1]).",
			  sermode=".sqlzhuru($_POST[R2]).",
			  fhxs='".$_GET[fh]."'
			  ");
 move_uploaded_file($_FILES["inp1"]['tmp_name'], "../img/logo.png");
 move_uploaded_file($_FILES["inp2"]['tmp_name'], "../img/shuiyin.png");
 move_uploaded_file($_FILES["inp4"]['tmp_name'], "../tem/moban/".$rowcontrol[nowmb]."/homeimg/logo.png");
 move_uploaded_file($_FILES["inp3"]['tmp_name'], "../m/img/logo.png");
 php_toheader("inf.php?t=suc");

}elseif($_GET[control]=="del"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){Audit_alert("权限不够","default.php");}
 delFile("../tem/moban/".$rowcontrol[nowmb]."/homeimg/logo.png");
 php_toheader("inf.php?t=suc");
}

while0("*","epzhu_control");$row=mysql_fetch_array($res);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?=webname?>管理系统</title>
<link href="css/basic.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script language="javascript" src="js/basic.js"></script>
<script language="javascript" src="js/layer.js"></script>
<script language="javascript">
function tj(){
c=document.getElementsByName("C1");str="";for(i=0;i<c.length;i++){if(c[i].checked){str=str+c[i].value+",";}}
if(str==""){alert("请至少选择一个发货形式");return false;}
layer.msg('正在提交', {icon: 16  ,time: 0,shade :0.25});
f1.action="inf.php?fh="+str;
}
function deltemlogo(){
if(confirm("确定要删除模板LOGO吗？")){location.href="inf.php?control=del";}else{return false;}
}
</script>
</head>
<body>
<? include("top.php");?>
<script language="javascript">
document.getElementById("menu1").className="a1";
</script>
<? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0302,")){echo "<div class='noneqx'>无权限</div>";exit;}?>

<div class="yjcode">
 <? $leftid=1;include("menu_quan.php");?>

<div class="right">
 
 <? if($_GET[t]=="suc"){systs("恭喜您，操作成功！","inf.php");}?>
 <? include("rightcap1.php");?>
 <script language="javascript">document.getElementById("rtit1").className="a1";</script>
 
 <!--Begin-->
 <div class="rkuang">
 <form name="f1" method="post" onsubmit="return tj()" enctype="multipart/form-data">
 <input type="hidden" name="jvs" value="control" />
 <ul class="uk">
 <li class="l1">网站名称：</li>
 <li class="l2"><input type="text" class="inp" name="twebnamev" size="30" value="<?=webname?>" /></li>
 <li class="l1">网址：</li>
 <li class="l2">
 <input type="text" class="inp" name="tweburlv" value="<?=weburl?>" size="30" /> 
 <span class="fd red">切记：必须以 http:// 开头，斜杆 / 结尾</span>
 </li>
 <li class="l1">网站标题：</li>
 <li class="l2"><input  name="twebtit" value="<?=$row[webtit]?>" size="60" type="text" class="inp" /></li>
 <li class="l1">站点关键词：</li>
 <li class="l2"><input  name="twebkey" value="<?=$row[webkey]?>" size="60" type="text" class="inp" /></li>
 <li class="l4">站点描述：</li>
 <li class="l5"><textarea name="swebdes"><?=$row[webdes]?></textarea></li>
 <li class="l4">统计代码：</li>
 <li class="l5"><textarea name="swebtj"><?=$row[webtj]?></textarea></li>
 <li class="l1">客服QQ：</li>
 <li class="l2">
 <input type="text" class="inp" name="twebqqv" value="<?=$row[webqqv]?>" size="60" /> 
 <span class="fd">格式：qq号码*称呼,qq号码*称呼</span>
 </li>
 <li class="l1">联系电话：</li>
 <li class="l2"><input class="inp" name="twebtelv" value="<?=$row[webtelv]?>" size="30" type="text"/></li>
 <li class="l1">网站备案号：</li>
 <li class="l2"><input name="tbeian" value="<?=$row[beian]?>" size="30" type="text" class="inp" /></li>
 <li class="l1">网站LOGO：</li>
 <li class="l2"><input type="file" name="inp1" id="inp1" size="15" accept=".jpg,.gif,.jpeg,.png"></li>
 <li class="l8"></li>
 <li class="l9"><img src="../img/logo.png?t=<?=rnd_num(100)?>" height="54" /></li>
 <li class="l1">模板LOGO：</li>
 <li class="l2"><input type="file" name="inp4" id="inp4" class="inp1" size="15" accept=".jpg,.gif,.jpeg,.png"><span class="fd">可以留空，如果留空，则调用网站LOGO</span></li>
 <? if(is_file("../tem/moban/".$rowcontrol[nowmb]."/homeimg/logo.png")){?>
 <li class="l8"></li>
 <li class="l9"><img src="../tem/moban/<?=$rowcontrol[nowmb]?>/homeimg/logo.png?t=<?=rnd_num(100)?>" height="40" /><br>[<a href="javascript:void(0);" onclick="deltemlogo()">删除</a>]</li>
 <? }?>
 <li class="l1">手机版LOGO：</li>
 <li class="l2"><input type="file" name="inp3" id="inp3" class="inp1" size="15" accept=".jpg,.gif,.jpeg,.png"></li>
 <li class="l8"></li>
 <li class="l9"><img src="../m/img/logo.png?t=<?=rnd_num(100)?>" height="54" /></li>
 <li class="l1">水印位置：</li>
 <li class="l2">
 <select name="d1" class="inp">
 <?
 $syarr=array("","顶端居左","顶端居中","顶端居右","中部居左","中部居中","中部居右","底端居左","底端居中","底端居右");
 for($i=1;$i<=9;$i++){
 ?>
 <option value="<?=$i?>" <? if($row[websyposv]==$i){?> selected="selected"<? }?>><?=$syarr[$i]?></option>
 <?
 }
 ?>
 </select>
 </li>
 <li class="l1">网站水印：</li>
 <li class="l2"><input type="file" name="inp2" id="inp2" class="inp1" size="15" accept=".jpg,.gif,.jpeg,.png"></li>
 <li class="l8"></li>
 <li class="l9"><img src="../img/shuiyin.png?t=<?=rnd_num(100)?>" height="54" /></li>
 <li class="l1">发货形式：</li>
 <li class="l2">
 <label><input name="C1" type="checkbox" value="1"<? if(strstr($row[fhxs],"1") || empty($row[fhxs])){?> checked="checked"<? }?> /> 手动发货</label>
 <label><input name="C1" type="checkbox" value="2"<? if(strstr($row[fhxs],"2") || empty($row[fhxs])){?> checked="checked"<? }?> /> 网盘下载</label>
 <label><input name="C1" type="checkbox" value="3"<? if(strstr($row[fhxs],"3") || empty($row[fhxs])){?> checked="checked"<? }?> /> 网站直接下载</label>
 <label><input name="C1" type="checkbox" value="4"<? if(strstr($row[fhxs],"4") || empty($row[fhxs])){?> checked="checked"<? }?> /> 点卡交易</label>
 <label><input name="C1" type="checkbox" value="5"<? if(strstr($row[fhxs],"5") || empty($row[fhxs])){?> checked="checked"<? }?> /> 实物快递</label>
 </li>
 <li class="l1">商品排列：</li>
 <li class="l2">
 <label><input name="R1" type="radio" value="0" <? if(empty($row[propx])){?> checked="checked"<? }?> /> 默认图片形式</label>
 <label><input name="R1" type="radio" value="1" <? if(1==$row[propx]){?> checked="checked"<? }?> /> 列表形式</label>
 </li>
 <li class="l1">搜索模式：</li>
 <li class="l2">
 <label><input name="R2" type="radio" value="1" <? if(1==$row[sermode]){?> checked="checked"<? }?> /> 常规模式</label>
 <label><input name="R2" type="radio" value="2" <? if(2==$row[sermode]){?> checked="checked"<? }?> /> 常规转码</label> 
 <label><input name="R2" type="radio" value="0" <? if(empty($row[sermode])){?> checked="checked"<? }?> /> 强化转码模式</label>
 </li>
 <li class="l3"><input type="submit" value="保存修改" class="btn1" /></li>
 </ul>
 </form>
 </div>
 <!--End-->
 
</div>
</div>

<? include("bottom.php");?>
</body>
</html>