<?
include("../config/conn.php");//二次开发联系QQ:120036745//二次开发联系QQ:120036745
include("../config/function.php");//二-次开-发-联-系Q-Q:12-00-3674-5
include("../config/tpclass.php");
if(empty($_SESSION[SHOPUSER])){Audit_alert("登录超时","../reg/","parent.");}
$userid=returnuserid($_SESSION[SHOPUSER]);
$bh=$_GET[bh];
if(!preg_match("/^[-a-zA-Z0-9]*$/",$bh)){exit;}
$admin=intval($_GET[admin]);


if($_GET[action]=="update"){  //上传
$sj=date("Y-m-d H:i:s");
 
if($admin==1){ //商品B
 $targetFolder = "upload/".$userid."/".$bh."/";
 createDir("../".$targetFolder);
 $total = count($_FILES['inp1']['tmp_name']);
 for($k=0; $k<$total; $k++) {
  if(returncount("epzhu_tp where bh='".$bh."'")<7){
   if(is_uploaded_file($_FILES['inp1']['tmp_name'][$k])){
    $sj=date("Y-m-d H:i:s");
    $mbh=str_replace(" ","",microtime()."tp".$userid);
    $mbh=str_replace(".","",$mbh);
    $targetFile = "../".$targetFolder.$mbh.".jpg";
	move_uploaded_file($_FILES['inp1']['tmp_name'][$k],$targetFile);
	$cm=new CreatMiniature();
	$bw=800;$bg=0;$sw=350;$sh=350;$zw=200;$zh=200;
	$imgsrc="../".$targetFolder.$mbh.".jpg";
    list($width, $height) = getimagesize(weburl.$targetFolder.$mbh.".jpg");$bgv=intval($height/($width/$bw));
    $cm->SetVar($imgsrc,"file");if($width>$bw){$cm->BackFill($imgsrc,$bw,$bgv);}
	imageWaterMark($imgsrc,websypos,"../img/shuiyin.png","","","","",0,0);
	if($sw!=$width){$sw=$width;}if($sh!=$height){$sh=$height;}
    $cm->BackFill("../".$targetFolder.$mbh."-1.jpg",$sw,$sh);
	if($zw!=$width){$zw=$width;}if($zh!=$height){$zh=$height;}
    $cm->BackFill("../".$targetFolder.$mbh."-2.jpg",$zw,$zh);
	$wjv=$targetFolder.$mbh.".jpg";
	$nxh=returnxh("epzhu_tp"," and bh='".$bh."'");
	intotable("epzhu_tp","bh,tp,type1,sj,userid,xh","'".$bh."','".$wjv."','商品','".$sj."',".$userid.",".$nxh."");
   }
  }
 }
}//商品E
 
php_toheader("tpupload.php?bh=".$bh."&admin=".$admin."&t=suc");
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>图片上传</title>
<style type="text/css">
body{margin:0;font-size:12px;color:#333;}
*{margin:0 auto;padding:0;}
ul{list-style-type:none;margin:0;padding:0;}
.main{float:left;width:150px;height:33px;cursor:pointer;margin:1px 0 0 0;}
#upload input{position: relative;border:solid transparent;opacity: 0;filter:alpha(opacity=0); cursor: pointer;float:left;width:150px;height:33px;z-index:2;}
#upload .inptp{position:relative;overflow: hidden;display:inline-block;*display:inline;padding:6px 0 0 0;height:27px;text-align:center;cursor:pointer;width:150px;float:left;color:#fff;background-color:#00B7EE;font-family:"Microsoft YaHei",微软雅黑,"MicrosoftJhengHei",华文细黑,STHeiti,MingLiu;font-size:14px;margin-top:-33px;z-index:1;}
@media screen and (-webkit-min-device-pixel-ratio:0) {
#upload .inptp{margin-top:-39px;}
}
#uping{float:left;padding:5px 0 0 0;height:26px;text-align:center;width:148px;border:#00B7EE dotted 1px;font-family:"Microsoft YaHei",微软雅黑,"MicrosoftJhengHei",华文细黑,STHeiti,MingLiu;font-size:14px;color:#ff6600;background-color:#f2f2f2;}
</style>
<script language="javascript">
function filecha(){
document.getElementById("upload").style.display="none";
document.getElementById("uping").style.display="";
tpf.submit();
}
</script>
</head>
<body>
<div class="main">

<!--等待上传开始-->
<form method="post" name="tpf" enctype="multipart/form-data" action="tpupload.php?bh=<?=$bh?>&admin=<?=$admin?>&action=update">
<div id="upload">
 <input type="file" onchange="filecha()" multiple="multiple" name="inp1[]" size="25" accept=".jpg,.gif,.jpeg,.png">
 <span class="inptp">选择图片上传</span>
</div>
<input type="hidden" value="upload" name="yjcode" />
</form>
<!--等待上传结束-->

<!--正在上传-->
<div id="uping" style="display:none;">正在处理图片……</div>
<!--正在上传-->

</div>
<? if($_GET[t]=="suc"){?>
<script language="javascript">
parent.xgtread("<?=$bh?>");
</script>
<? }?>
</body>
</html>