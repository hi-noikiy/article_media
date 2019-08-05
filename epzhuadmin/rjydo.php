<?
error_reporting(NULL);
ini_set('display_errors','Off');
include("../config/conn.php");//二次开发联系QQ:120036745//二次开发联系QQ:12-0036-745
include("../config/function.php");
$sj=date("Y-m-d H:i:s");
$zip_filename = "gx.zip";
$zip_filepath = $zip_filename;
if(!is_file($zip_filepath))
{die('Error Code:1002');}
$zip = new ZipArchive();
$rs = $zip->open($zip_filepath);
if($rs !== TRUE)
{die('Error Code:1001');}
$zip->extractTo("../");
$zip->close();
@htmlget(weburl."update.php");
@delFile("../update.php");
delFile("gx.zip");
intotable("epzhu_update","sj","'".$_GET[sersj]."'");
echo "ok";
?>