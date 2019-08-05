<?php
set_time_limit(0);
include("../config/conn.php");//二次开发联系QQ:120036745//二次开发联系QQ:120036745
include("../config/function.php");//二-次开-发-联-系Q-Q:12-00-3674-5
require("../config/tpclass.php");

$bh=sqlzhuru($_POST["bh"]);
if(!preg_match("/^[-a-zA-Z0-9]*$/",$bh)){exit;}
$userid=sqlzhuru($_POST[uid]);
while1("*","epzhu_user where id=".$userid." and pwd='".sqlzhuru($_POST[pwd])."'");if(!$row1=mysql_fetch_array($res1)){echo "1";exit;}
while1("*","epzhu_pro where bh='".$bh."' and userid=".$userid);if(!$row1=mysql_fetch_array($res1)){echo "1";exit;}
$sj=date("Y-m-d H:i:s");
$targetFolder = "upload/".$userid."/".$bh."/";
createDir("../".$targetFolder);
$mbh=str_replace(" ","",microtime()."f".$userid);
$mbh=str_replace(".","",$mbh);

$verifyToken = md5('unique_salt' . sqlzhuru($_POST['timestamp']));


if (!empty($_FILES) && sqlzhuru($_POST['token']) == $verifyToken) {
	$tempFile = $_FILES['Filedata']['tmp_name'];
	$targetPath = "../".$targetFolder;
	$targetFile = rtrim($targetPath,'/') . '/' . $mbh.".jpg";
	
	$fileTypes = array('jpg','jpeg','gif','png');
	$fileParts = pathinfo($_FILES['Filedata']['name']);

	if (in_array(strtolower($fileParts['extension']),$fileTypes)) {
		
		move_uploaded_file($tempFile,$targetFile);
		$cm=new CreatMiniature();
		$bw=800;$bg=0;$sw=350;$sh=350;$zw=200;$zh=200;
		$imgsrc="../".$targetFolder.$mbh.".jpg";
        list($width, $height) = getimagesize(weburl.$targetFolder.$mbh.".jpg");$bgv=intval($height/($width/$bw));
        $cm->SetVar($imgsrc,"file");if($width>$bw){$cm->BackFill($imgsrc,$bw,$bgv);}
		imageWaterMark($imgsrc,websypos,"../img/shuiyin.png","","","","",0,0);
		if($sw>$width){$sw=$width;}if($sh>$height){$sh=$height;}
        $cm->BackFill("../".$targetFolder.$mbh."-1.jpg",$sw,$sh);
		if($zw>$width){$zw=$width;}if($zh>$height){$zh=$height;}
        $cm->BackFill("../".$targetFolder.$mbh."-2.jpg",$zw,$zh);
		$wjv=$targetFolder.$mbh.".jpg";
		$nxh=returnxh("epzhu_tp"," and bh='".$bh."'");
		intotable("epzhu_tp","bh,tp,type1,sj,userid,xh","'".$bh."','".$wjv."','商品','".$sj."',".$userid.",".$nxh."");
		echo '1';
	} else {
		echo 'Invalid file type.';
	}
}
?>
