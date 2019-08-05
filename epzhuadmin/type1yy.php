<?php
include("../config/conn.php");//二次开发联系QQ:120036745//二次开发联系QQ:12-0036-745
include("../config/functionyy.php");
AdminSes_audit();
$sj=date("Y-m-d H:i:s");

//函数开始
if($_GET[control]=="add"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){Audit_alert("权限不够","default.php");}
 zwzr();
 if(panduan("*","epzhu_typeyy where admin=1 and type1='".sqlzhuru($_POST[t1])."'")==1){Audit_alert("该分组已存在！","type1yy.php");}
 intotable("epzhu_typeyy","admin,type1,xh,sj,col,iftj,tjmoney,sellbl,seotit,seokey,seodes,dbsj","1,'".sqlzhuru($_POST[t1])."',".sqlzhuru($_POST[t2]).",'".$sj."','".sqlzhuru($_POST[tcol])."',".sqlzhuru($_POST[R1]).",".abs($_POST[ttjmoney]).",".abs($_POST[tsellbl]).",'".sqlzhuru($_POST[tseotit])."','".sqlzhuru($_POST[tseokey])."','".sqlzhuru($_POST[tseodes])."',".sqlzhuru($_POST[tdbsj])."");$id=mysql_insert_id();
 move_uploaded_file($_FILES["inp1"]['tmp_name'], "../upload/type/type1_".$id.".png");
 move_uploaded_file($_FILES["inp2"]['tmp_name'], "../upload/type/type1_".$id."_m.png");
 php_toheader("type1yy.php?t=suc");
 
}elseif($_GET[control]=="update"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){Audit_alert("权限不够","default.php");}
 zwzr();
 if(panduan("*","epzhu_typeyy where admin=1 and type1='".sqlzhuru($_POST[t1])."' and id<>".$_GET[id])==1)
 {Audit_alert("该分组已存在！","type1yy.php?action=update&id=".$_GET[id]);}
 updatetable("epzhu_typeyy","type1='".sqlzhuru($_POST[t1])."' where type1='".sqlzhuru($_POST[oldty1])."'");
 updatetable("epzhu_typeyy","
 tjmoney=".abs($_POST[ttjmoney]).",
 sellbl=".abs($_POST[tsellbl]).",
 sj='".$sj."',
 xh=".sqlzhuru($_POST[t2]).",
 col='".sqlzhuru($_POST[tcol])."',
 iftj=".sqlzhuru($_POST[R1]).",
 seotit='".sqlzhuru($_POST[tseotit])."',
 seokey='".sqlzhuru($_POST[tseokey])."',
 seodes='".sqlzhuru($_POST[tseodes])."',
 dbsj=".sqlzhuru($_POST[tdbsj])."
 where id=".$_GET[id]);
 move_uploaded_file($_FILES["inp1"]['tmp_name'], "../upload/type/type1_".$_GET[id].".png");
 move_uploaded_file($_FILES["inp2"]['tmp_name'], "../upload/type/type1_".$_GET[id]."_m.png");
 php_toheader("type1yy.php?t=suc&action=update&id=".$_GET[id]);

}elseif($_GET[control]=="del"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){Audit_alert("权限不够","default.php");}
 zwzr();
 delFile($_GET[tp]);
 php_toheader("type1yy.php?t=suc&action=update&id=".$_GET[id]);

}
//函数结果

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?=webname?>管理后台</title>
<link href="css/basic.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script language="javascript" src="js/basic.js"></script>
<script language="javascript" src="js/layer.js"></script>
</head>
<body>
<? include("top.php");?>
<script language="javascript">
document.getElementById("menu1").className="a1";
</script>
<? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0302,")){echo "<div class='noneqx'>无权限</div>";exit;}?>

<div class="yjcode">
 <? $leftid=1;include("menu_quanfenlei.php");?>

<div class="right">
 
 <? if($_GET[t]=="suc"){systs("恭喜您，操作成功！","type1yy.php?action=".$_GET[action]."&id=".$_GET[id]);}?>

 <div class="bqu1">
 <a href="javascript:void(0);" class="a1">商品分组</a>
 <a href="typelistyy.php">返回列表</a>
 </div> 
 
 <!--begin-->
 <div class="rkuang">
 <? if($_GET[action]!="update"){?>
 <script language="javascript">
 function tj(){
 if((document.f1.t1.value).replace(/\s/,"")==""){alert("请输入名称！");document.f1.t1.focus();return false;}
 if((document.f1.t2.value).replace(/\s/,"")=="" || isNaN(document.f1.t2.value)){alert("请输入有效的排序号！");document.f1.t2.focus();return false;}
 layer.msg('正在提交', {icon: 16  ,time: 0,shade :0.25});
 f1.action="type1yy.php?control=add";
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()" enctype="multipart/form-data">
 <ul class="uk">
 <li class="l1">父类名称：</li>
 <li class="l2"><input type="text" class="inp" name="t1" /></li>
 <li class="l1">是否推荐：</li>
 <li class="l2">
 <label><input name="R1" type="radio" checked="checked" value="0" /> 推荐</label>
 <label><input name="R1" type="radio" value="1" /> 不推荐</label>
 </li>
 <li class="l1">电脑端图标：</li>
 <li class="l2"><input type="file" class="inp1" name="inp1" id="inp1" size="15" accept=".jpg,.gif,.jpeg,.png"><span class="fd">根据实际情况上传</span></li>
 <li class="l1">手机版图标：</li>
 <li class="l2"><input type="file" class="inp1" name="inp2" id="inp2" size="15" accept=".jpg,.gif,.jpeg,.png"><span class="fd">60*60</span></li>
 <li class="l1">推荐佣金比例：</li>
 <li class="l2">
 <input name="ttjmoney" size="10" type="text" class="inp" />
 <span class="fd">推荐的用户可获得的交易佣金比例：0.01表示1%，0.02表示2%。</span>
 </li>
 <li class="l1">卖家收入比例：</li>
 <li class="l2">
 <input name="tsellbl" size="10" type="text" class="inp" />
 <span class="fd">卖家可获得的金额比例:1表示全归卖家，0.9表示90%归卖家。</span>
 </li>
 <li class="l1">担保时间：</li>
 <li class="l2">
 <input name="tdbsj" size="10" value="0" type="text" class="inp" />
 <span class="fd">该分类下商品的担保时间，如果希望调用全局设置里的数据，这里填0就行</span>
 </li>
 <li class="l1">SEO标题：</li>
 <li class="l2"><input type="text" value="<?=$row[seotit]?>" class="inp" size="70" name="tseotit" /></li>
 <li class="l1">SEO关键词：</li>
 <li class="l2"><input type="text" value="<?=$row[seokey]?>" class="inp" size="70" name="tseokey" /></li>
 <li class="l4">SEO描述：</li>
 <li class="l5"><textarea name="tseodes"><?=$row[seodes]?></textarea></li>
 <li class="l1">颜色值：</li>
 <li class="l2"><input type="text" class="inp" name="tcol" value="#333" /><span class="fd"><a href="http://www.epzhu.com/thread-8-1-1.html" target="_blank">什么是颜色值？</a></span></li>
 <li class="l1">排序：</li>
 <li class="l2"><input type="text" class="inp" name="t2" value="<?=returnxh("epzhu_typeyy"," and admin=1")?>" /> <span class="fd">序号越小，越靠前</span></li>
 <li class="l3"><input type="submit" value="保存修改" class="btn1" /></li>
 </ul>
 </form>
 
<? 
 }elseif($_GET[action]=="update"){
 while0("*","epzhu_typeyy where admin=1 and id=".$_GET[id]);if(!$row=mysql_fetch_array($res)){php_toheader("jiajctypelist.php");}
 ?>
 <script language="javascript">
 function tj(){
 if((document.f1.t1.value).replace(/\s/,"")==""){alert("请输入名称！");document.f1.t1.focus();return false;}
 if((document.f1.t2.value).replace(/\s/,"")=="" || isNaN(document.f1.t2.value)){alert("请输入有效的排序号！");document.f1.t2.focus();return false;}
 layer.msg('正在提交', {icon: 16  ,time: 0,shade :0.25});
 f1.action="type1yy.php?control=update&id=<?=$row[id]?>";
 }
 function deltp(x){
  if(confirm("确定要删除该图标吗？")){location.href="type1yy.php?id=<?=$_GET[id]?>&control=del&tp="+x;}else{return false;}
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()" enctype="multipart/form-data">
 <input type="hidden" value="<?=$row[type1]?>" name="oldty1" />
 <ul class="uk">
 <li class="l1">分类名称：</li>
 <li class="l2"><input type="text" value="<?=$row[type1]?>" class="inp" name="t1" /></li>
 <li class="l1">是否推荐：</li>
 <li class="l2">
 <label><input name="R1" type="radio"<? if(empty($row[iftj])){?> checked="checked"<? }?> value="0" /> 推荐</label>
 <label><input name="R1" type="radio"<? if($row[iftj]==1){?> checked="checked"<? }?> value="1" /> 不推荐</label>
 </li>
 <li class="l1">电脑端图标：</li>
 <li class="l2"><input type="file" class="inp1" name="inp1" id="inp1" size="15" accept=".jpg,.gif,.jpeg,.png"><span class="fd">根据实际情况上传</span></li>
 <? $ntp="../upload/type/type1_".$row[id].".png";if(is_file($ntp)){?>
 <li class="l8"></li>
 <li class="l9"><img src="<?=$ntp?>" width="55" height="55" /> [<a href="javascript:void(0);" onclick="deltp('<?=$ntp?>')">删除</a>]</li>
 <? }?>
 <li class="l1">手机端图标：</li>
 <li class="l2"><input type="file" class="inp1" name="inp2" id="inp2" size="15" accept=".jpg,.gif,.jpeg,.png"><span class="fd">60*60</span></li>
 <? $ntp="../upload/type/type1_".$row[id]."_m.png";if(is_file($ntp)){?>
 <li class="l8"></li>
 <li class="l9"><img src="<?=$ntp?>" width="55" height="55" /> [<a href="javascript:void(0);" onclick="deltp('<?=$ntp?>')">删除</a>]</li>
 <? }?>
 <li class="l1">推荐佣金比例：</li>
 <li class="l2">
 <input name="ttjmoney" value="<?=$row[tjmoney]?>" size="10" type="text" class="inp" />
 <span class="fd">推荐的用户可获得的交易佣金比例：0.01表示1%，0.02表示2%。</span>
 </li>
 <li class="l1">卖家收入比例：</li>
 <li class="l2">
 <input name="tsellbl" value="<?=$row[sellbl]?>" size="10" type="text" class="inp" />
 <span class="fd">卖家可获得的金额比例:1表示全归卖家，0.9表示90%归卖家。</span>
 </li>
 <li class="l1">担保时间：</li>
 <li class="l2">
 <input name="tdbsj" value="<?=returnjgdw($row[dbsj],"",0)?>" size="10" type="text" class="inp" />
 <span class="fd">该分类下商品的担保时间，如果希望调用全局设置里的数据，这里填0就行</span>
 </li>
 <li class="l1">SEO标题：</li>
 <li class="l2">
 <input type="text" value="<?=$row[seotit]?>" class="inp" size="70" name="tseotit" /> 
 <span class="fd">[<a href="../product/search_j<?=$row[id]?>v.html" target="_blank">预览</a>]</span>
 </li>
 <li class="l1">SEO关键词：</li>
 <li class="l2"><input type="text" value="<?=$row[seokey]?>" class="inp" size="70" name="tseokey" /></li>
 <li class="l4">SEO描述：</li>
 <li class="l5"><textarea name="tseodes"><?=$row[seodes]?></textarea></li>
 <li class="l1">颜色值：</li>
 <li class="l2"><input type="text" value="<?=$row[col]?>" class="inp" name="tcol" /><span class="fd"><a href="http://www.epzhu.com/thread-9-1-1.html" target="_blank">什么是颜色值？</a></span></li>
 <li class="l1">排序：</li>
 <li class="l2"><input type="text" class="inp" name="t2" value="<?=$row[xh]?>" /> <span class="fd">序号越小，越靠前</span></li>
 <li class="l3"><input type="submit" value="保存修改" class="btn1" /></li>
 </ul>
 </form>
 <? }?>
 </div>
 <!--end-->
 
</div>

</div>

<?php include("bottom.php");?>
</body>
</html>