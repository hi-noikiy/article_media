<?
include("../../config/conn.php");
include("../../config/function.php");
include("../../config/tpclass.php");
if(empty($_SESSION[SHOPUSER])){Audit_alert("登录超时","../reg/","parent.");}
$sqluser="select * from epzhu_user where uid='".$_SESSION[SHOPUSER]."'";mysql_query("SET NAMES 'GBK'");$resuser=mysql_query($sqluser);
if(!$rowuser=mysql_fetch_array($resuser)){Audit_alert("登录超时","../reg/","parent.");}
$userid=$rowuser[id];
$bh=$_GET[bh];
if(!preg_match("/^[-a-zA-Z0-9]*$/",$bh)){exit;}
$admin=intval($_GET[admin]);

if($admin==1){ //店铺LOGO

}


if($_GET[action]=="update"){  //上传
 if($admin==1){
  $targetFile = "../../upload/".$userid."/shop.jpg";
  move_uploaded_file($_FILES['inp1']['tmp_name'],$targetFile);
  $cm=new CreatMiniature();
  $bw=300;$bg=300;
  $imgsrc="../../upload/".$userid."/shop.jpg";
  list($width, $height) = getimagesize(weburl."upload/".$userid."/shop.jpg");
  $cm->SetVar($imgsrc,"file");if($width>$bw){$cm->Cut($imgsrc,$bw,$bg);}
 
 }elseif($admin==2){
  $targetFile = "../../upload/".$userid."/user.jpg";
  move_uploaded_file($_FILES['inp1']['tmp_name'],$targetFile);
  $cm=new CreatMiniature();
  $bw=200;$bg=200;
  $imgsrc="../../upload/".$userid."/user.jpg";
  list($width, $height) = getimagesize(weburl."upload/".$userid."/user.jpg");
  $cm->SetVar($imgsrc,"file");if($width>$bw){$cm->Cut($imgsrc,$bw,$bg);}
 
 }elseif($admin==3){
  $mbh=strgb2312($rowuser[sfz],0,15)."-1";
  $targetFile = "../../upload/".$userid."/".$mbh.".jpg";
  move_uploaded_file($_FILES['inp1']['tmp_name'],$targetFile);
  $cm=new CreatMiniature();
  $bw=800;$bg=800;
  $imgsrc="../../upload/".$userid."/".$mbh.".jpg";
  list($width, $height) = getimagesize(weburl."upload/".$userid."/user.jpg");
  $cm->SetVar($imgsrc,"file");if($width>$bw){$cm->Cut($imgsrc,$bw,$bg);}
 
 }elseif($admin==4){
  $mbh=strgb2312($rowuser[sfz],0,15)."-2";
  $targetFile = "../../upload/".$userid."/".$mbh.".jpg";
  move_uploaded_file($_FILES['inp1']['tmp_name'],$targetFile);
  $cm=new CreatMiniature();
  $bw=800;$bg=800;
  $imgsrc="../../upload/".$userid."/".$mbh.".jpg";
  list($width, $height) = getimagesize(weburl."upload/".$userid."/user.jpg");
  $cm->SetVar($imgsrc,"file");if($width>$bw){$cm->Cut($imgsrc,$bw,$bg);}
 
 }elseif($admin==5){
  $mbh=strgb2312($rowuser[sfz],0,15)."-3";
  $targetFile = "../../upload/".$userid."/".$mbh.".jpg";
  move_uploaded_file($_FILES['inp1']['tmp_name'],$targetFile);
  $cm=new CreatMiniature();
  $bw=800;$bg=800;
  $imgsrc="../../upload/".$userid."/".$mbh.".jpg";
  list($width, $height) = getimagesize(weburl."upload/".$userid."/user.jpg");
  $cm->SetVar($imgsrc,"file");if($width>$bw){$cm->Cut($imgsrc,$bw,$bg);}
  updatetable("epzhu_user","sfzrz=0 where id=".$rowuser[id]);
 
 }elseif($admin==6){ //商品B
 $targetFolder = "upload/".$userid."/".$bh."/";
 createDir("../../".$targetFolder);
  if(returncount("epzhu_tp where bh='".$bh."'")<7){
   if(is_uploaded_file($_FILES['inp1']['tmp_name'])){
    $sj=date("Y-m-d H:i:s");
    $mbh=str_replace(" ","",microtime()."tp".$userid);
    $mbh=str_replace(".","",$mbh);
    $targetFile = "../../".$targetFolder.$mbh.".jpg";
	move_uploaded_file($_FILES['inp1']['tmp_name'],$targetFile);
	$cm=new CreatMiniature();
	$bw=800;$bg=0;$sw=350;$sh=350;$zw=200;$zh=200;
	$imgsrc="../../".$targetFolder.$mbh.".jpg";
    list($width, $height) = getimagesize(weburl.$targetFolder.$mbh.".jpg");$bgv=intval($height/($width/$bw));
    $cm->SetVar($imgsrc,"file");if($width>$bw){$cm->BackFill($imgsrc,$bw,$bgv);}
	imageWaterMark($imgsrc,websypos,"../../img/shuiyin.png","","","","",0,0);
	if($sw>$width){$sw=$width;}if($sh>$height){$sh=$height;}
    $cm->BackFill("../../".$targetFolder.$mbh."-1.jpg",$sw,$sh);
	if($zw>$width){$zw=$width;}if($zh>$height){$zh=$height;}
    $cm->BackFill("../../".$targetFolder.$mbh."-2.jpg",$zw,$zh);
	$wjv=$targetFolder.$mbh.".jpg";
	$nxh=returnxh("epzhu_tp"," and bh='".$bh."'");
	intotable("epzhu_tp","bh,tp,type1,sj,userid,xh","'".$bh."','".$wjv."','商品','".$sj."',".$userid.",".$nxh."");
   }
  }

 }

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
.main{float:left;width:100px;height:23px;cursor:pointer;}
#upload input{position: relative;border:solid transparent;opacity: 0;filter:alpha(opacity=0); cursor: pointer;float:left;width:100px;height:23px;z-index:2;}
#upload .inptp{position:relative;overflow: hidden;display:inline-block;*display:inline;padding:2px 0 0 0;height:21px;text-align:center;cursor:pointer;width:100px;float:left;color:#fff;background-color:#00B7EE;font-family:"Microsoft YaHei",微软雅黑,"MicrosoftJhengHei",华文细黑,STHeiti,MingLiu;font-size:13px;margin-top:-29px;z-index:1;}
#uping{float:left;padding:1px 0 0 0;height:20px;text-align:center;width:98px;border:#00B7EE dotted 1px;font-family:"Microsoft YaHei",微软雅黑,"MicrosoftJhengHei",华文细黑,STHeiti,MingLiu;font-size:13px;color:#2d78d0;background-color:#f2f2f2;}
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
 <input type="file" onchange="filecha()" name="inp1" size="25" />
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
parent.xgtread('<?=$bh?>');
</script>
<? }?>
</body>
</html>
<? include("../tem/bottom.php");?>