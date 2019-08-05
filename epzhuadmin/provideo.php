<?php
include("../config/conn.php");//二次开发联系QQ:120036745//二次开发联系QQ:12-0036-745
include("../config/function.php");
require("../config/tpclass.php");
AdminSes_audit();
$bh=$_GET[bh];
$mybh=$_GET[mybh];
while0("*","epzhu_provideo where bh='".$_GET[mybh]."' and probh='".$bh."'");if(!$row=mysql_fetch_array($res)){php_toheader("provideolist.php?bh=".$bh);}

//函数开始
if($_GET[control]=="update"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0101,")){Audit_alert("权限不够","default.php");}
 zwzr();
 if(1==intval($_POST[d1])){$u=$_POST[t2];}else{$u=inp_tp_upload(1,"../upload/".$row[userid]."/".$bh."/",$mybh);if(!empty($u)){$u="../upload/".$row[userid]."/".$bh."/".$u;}}
 if(!empty($u)){$ses=",url='".$u."'";}
 $iftj=intval($_POST[tiftj]);
 if(1==$iftj){updatetable("epzhu_provideo","iftj=0 where probh='".$bh."'");}
 updatetable("epzhu_provideo","tit='".sqlzhuru($_POST[ttit])."'".$ses.",iftj=".$iftj.",admin=".$_POST[d1].",zt=".$_POST[Rzt]." where id=".$row[id]);
 uploadtpnodata(2,"upload/".$row[userid]."/".$bh."/",$mybh.".jpg","allpic",140,84,0,0,"no");
 php_toheader("provideo.php?t=suc&mybh=".$mybh."&bh=".$bh);

}
//函数结果

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?=webname?>管理系统</title>
<link href="css/basic.css" rel="stylesheet" type="text/css" />
<link href="css/product.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script language="javascript" src="js/basic.js"></script>
<script language="javascript" src="js/layer.js"></script>
</head>
<body>
<? include("top.php");?>
<script language="javascript">
document.getElementById("menu3").className="a1";
</script>
<? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0102,")){echo "<div class='noneqx'>无权限</div>";exit;}?>

<div class="yjcode">
 <? $leftid=1;include("menu_product.php");?>

<div class="right">

 <? if($_GET[t]=="suc"){systs("恭喜您，操作成功！[<a href='provideolx.php?bh=".$bh."'>继续添加新视频</a>]","provideo.php?bh=".$bh."&mybh=".$mybh);}?>
 <? include("rightcap4.php");?>
 <script language="javascript">document.getElementById("rtit2").className="a1";</script>

 <!--B-->
 <div class="rkuang">
 <script language="javascript">
 function tj(){
 if((document.f1.ttit.value).replace(/\s/,"")==""){alert("请输入标题");document.f1.ttit.focus();return false;}
 r=document.getElementsByName("Rzt");rr="";for(i=0;i<r.length;i++){if(r[i].checked==true){rr=r[i].value;}}if(rr==""){alert("请选择审核状态！");return false;}
 layer.msg('正在提交', {icon: 16  ,time: 0,shade :0.25});
 f1.action="provideo.php?bh=<?=$bh?>&control=update&mybh=<?=$row[bh]?>";
 }
 
 function infcha(){
 d=parseInt(document.f1.d1.value);
 document.getElementById("infout").style.display="none";
 document.getElementById("infmy").style.display="none";
 if(d==1){document.getElementById("infout").style.display="";}
 else if(d==2){document.getElementById("infmy").style.display="";}
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()" enctype="multipart/form-data">
 <input type="hidden" value="video" name="jvs" />
 <ul class="uk">
 <li class="l1"><span class="red">*</span> 标题：</li>
 <li class="l2"><input type="text" size="50" value="<?=$row[tit]?>" class="inp" name="ttit" /> </li>
 <li class="l1">视频截图：</li>
 <li class="l2"><input type="file" name="inp2" class="inp1" id="inp2" size="25"><span class="fd">最佳尺寸：140*84</span></li>
 <li class="l8"></li>
 <li class="l9"><img src="<?="../upload/".$row[userid]."/".$bh."/".$mybh.".jpg"?>" width="108" height="65" /></li>
 <li class="l1">来路：</li>
 <li class="l2">
 <select name="d1" onchange="infcha()" class="inp">
 <option value="1">外部视频地址</option>
 <option value="2"<? if(2==$row[admin]){?> selected="selected"<? }?>>自己上传</option>
 </select>
 </li>
 </ul>
 
 <ul class="uk uk0" id="infout" style="display:none;">
 <li class="l1">视频路径：</li>
 <li class="l2"><input value="<?=$row[url]?>" name="t2" class="inp" style="width:500px;" type="text"/></li>
 <li class="l1">特别说明：</li>
 <li class="l21 red"><strong>请输入腾讯或优酷视频的播放地址，以SWF或FLV结尾的</strong></li>
 </ul>
 
 <ul class="uk uk0" id="infmy" style="display:none;">
 <li class="l1">自己上传：</li>
 <li class="l2"><input type="file" name="inp1" id="inp1" size="15" accept=".swf,.flv"> </li>
 <li class="l1">视频路径：</li>
 <li class="l2"><input value="<?=$row[url]?>" readonly="readonly" class="inp redony" size="40" type="text"/><span class="fd">[<a href="<?=$row[url]?>" target="_blank">下载</a>]</span></li>
 <li class="l1">特别说明：</li>
 <li class="l21 red"><strong>请上传swf或flv后缀的视频文件</strong></li>
 </ul>

 
 <ul class="rcap"><li class="l1"></li><li class="l2">管理员操作</li><li class="l3"></li></ul>
 <ul class="uk">
 <li class="l1">推荐序号：</li>
 <li class="l2">
 <select name="tiftj" class="inp">
 <option value="1">推荐，即在该商品主页能看到</option>
 <option value="0"<? if(0==$row[iftj]){?> selected="selected"<? }?>>不推荐</option>
 </select>
 </li>
 <li class="l1">审核状态：</li>
 <li class="l2">
 <label><input name="Rzt" type="radio" value="0" <? if(0==$row[zt]){?>checked="checked"<? }?> /> <strong>正常展示</strong></label> 
 <label><input name="Rzt" type="radio" value="1" <? if(1==$row[zt]){?>checked="checked"<? }?> /> <strong>正在审核</strong></label> 
 <label><input name="Rzt" type="radio" value="2" <? if(2==$row[zt]){?>checked="checked"<? }?> /> <strong>审核不通过</strong></label> 
 </li>
 <li class="l3"><input type="submit" value="保存修改" class="btn1" /></li>
 </ul>
 
 </form>
 </div>
 <!--E-->
 
</div>
</div>
<?php include("bottom.php");?>
<script language="javascript">
infcha();
</script>
</body>
</html>