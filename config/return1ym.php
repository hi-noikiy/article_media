<?php
/*
www.ep zhu.com QQ:1200 36745
*/
function sqlzhuru($html) {
    preg_match_all("/\<([^\<]+)\>/is", $html, $ms);
    $searchs[] = '<';
    $replaces[] = '&lt;';
    $searchs[] = '>';
    $replaces[] = '&gt;';
    if ($ms[1]) {
        $allowtags = 'img|a|font|div|table|tbody|caption|tr|td|th|br|p|b|strong|i|u|em|span|ol|ul|li|blockquote';
        $ms[1] = array_unique($ms[1]);
        foreach ($ms[1] as $value) {
            $searchs[] = "&lt;".$value."&gt;";
            $value = str_replace('&amp;', '_uch_tmp_str_', $value);
            $value = string_htmlspecialchars($value);
            $value = str_replace('_uch_tmp_str_', '&amp;', $value);
            $value = str_replace(array('\\', '/*'), array('.', '/.'), $value);
            $skipkeys = array('onabort','onactivate','onafterprint','onafterupdate','onbeforeactivate','onbeforecopy','onbeforecut','onbeforedeactivate',
                    'onbeforeeditfocus','onbeforepaste','onbeforeprint','onbeforeunload','onbeforeupdate','onblur','onbounce','oncellchange','onchange',
                    'onclick','oncontextmenu','oncontrolselect','oncopy','oncut','ondataavailable','ondatasetchanged','ondatasetcomplete','ondblclick',
                    'ondeactivate','ondrag','ondragend','ondragenter','ondragleave','ondragover','ondragstart','ondrop','onerror','onerrorupdate',
                    'onfilterchange','onfinish','onfocus','onfocusin','onfocusout','onhelp','onkeydown','onkeypress','onkeyup','onlayoutcomplete',
                    'onload','onlosecapture','onmousedown','onmouseenter','onmouseleave','onmousemove','onmouseout','onmouseover','onmouseup','onmousewheel',
                    'onmove','onmoveend','onmovestart','onpaste','onpropertychange','onreadystatechange','onreset','onresize','onresizeend','onresizestart',
                    'onrowenter','onrowexit','onrowsdelete','onrowsinserted','onscroll','onselect','onselectionchange','onselectstart','onstart','onstop',
                    'onsubmit','onunload','javascript','script','eval','behaviour','expression','style','class');
            $skipstr = implode('|', $skipkeys);
            $value = preg_replace(array("/($skipstr)/i"), '.', $value);
            if (!preg_match("/^[\/|\s]?($allowtags)(\s+|$)/is", $value)) {
                $value = '';
            }
            $replaces[] = empty($value) ? '' : "<" . str_replace('&quot;', '"', $value) . ">";
        }
    }
    $html = str_replace($searchs, $replaces, $html);
    return $html;
}
 
function string_htmlspecialchars($string, $flags = null) {
    if (is_array($string)) {
        foreach ($string as $key => $val) {
            $string[$key] = string_htmlspecialchars($val, $flags);
        }
    } else {
        if ($flags === null) {
            $string = str_replace(array('&', '"', '<', '>'), array('&amp;', '&quot;', '&lt;', '&gt;'), $string);
            if (strpos($string, '&amp;#') !== false) {
                $string = preg_replace('/&amp;((#(\d{3,5}|x[a-fA-F0-9]{4}));)/', '&\\1', $string);
            }
        } else {
            if (PHP_VERSION < '5.4.0') {
                $string = htmlspecialchars($string, $flags);
            } else {
                if (!defined('CHARSET') || (strtolower(CHARSET) == 'utf-8')) {
                    $charset = 'UTF-8';
                } else {
                    $charset = 'ISO-8859-1';
                }
                $string = htmlspecialchars($string, $flags, $charset);
            }
        }
    }
 
    return $string;
}

function sqlzhuru1($string){
$string=str_replace("<?","",$string);
$string=str_replace("?>","",$string);
//if(!get_magic_quotes_gpc()){$string = addslashes($string);}else{$string=stripslashes($string);}
global $rowcontrol;
if($rowcontrol[ifci]==1 && !empty($rowcontrol[ci]) && ifciDEF==1){
$word = preg_replace("/[1,2,3]\r\n|\r\n/i", '',$rowcontrol[ci]);  
$string = preg_replace('/'.$word.'/i', '***', $string);
}
return $string;
}


function returndw($m,$d,$t=""){
 if(empty($m)){return $t;}else{return $m.$d;}
}

function returnhz($t){
$a=preg_split("/\./",$t);
return $a[count($a)-1];
}

function returnnotp($t,$a=""){
 $tpv=preg_split("/\./",$t);
 return $tpv[0].$a.".".$tpv[1];
}

function rentser($x,$xv,$y,$yv,$nq="search",$z='',$zv='',$w='',$wv=''){
if(empty($nq)){$nq="search";}
$nstr=$_GET[str];
if(!check_in("_".$x.$xv."v",$nstr)){
if(check_in("_".$x,$nstr)){
 $a=preg_split("/_".$x."/",$nstr);
 $re3=preg_split("/_/",$a[1]);
 $b=preg_split("/v/",$re3[0]);
 $ssr="";for($ri=0;$ri<count($b);$ri++){$ssr=$ssr.$b[$ri];if($ri<(count($b)-2)){$ssr=$ssr."v";}}
 $d=preg_split("/_".$x.$ssr."v/",$nstr);
 $nstr=$a[0]."_".$x.$xv."v".$d[1];
}else{
 $nstr=$nstr."_".$x.$xv."v";
}
}
if($y!=""){
if(!check_in("_".$y.$yv."v",$nstr)){
if(check_in("_".$y,$nstr)){
 $a=preg_split("/_".$y."/",$nstr);
 $re3=preg_split("/_/",$a[1]);
 $b=preg_split("/v/",$re3[0]);
 $ssr="";for($ri=0;$ri<count($b);$ri++){$ssr=$ssr.$b[$ri];if($ri<(count($b)-2)){$ssr=$ssr."v";}}
 $d=preg_split("/_".$y.$ssr."v/",$nstr);
 $nstr=$a[0]."_".$y.$yv."v".$d[1];
}else{
 $nstr=$nstr."_".$y.$yv."v";
}
}
}
if($z!=""){
if(!check_in("_".$z.$zv."v",$nstr)){
if(check_in("_".$z,$nstr)){
 $a=preg_split("/_".$z."/",$nstr);
 $re3=preg_split("/_/",$a[1]);
 $b=preg_split("/v/",$re3[0]);
 $ssr="";for($ri=0;$ri<count($b);$ri++){$ssr=$ssr.$b[$ri];if($ri<(count($b)-2)){$ssr=$ssr."v";}}
 $d=preg_split("/_".$z.$ssr."v/",$nstr);
 $nstr=$a[0]."_".$z.$zv."v".$d[1];
}else{
 $nstr=$nstr."_".$z.$zv."v";
}
}
}
if($w!=""){
if(!check_in("_".$w.$wv."v",$nstr)){
if(check_in("_".$w,$nstr)){
 $a=preg_split("/_".$w."/",$nstr);
 $re3=preg_split("/_/",$a[1]);
 $b=preg_split("/v/",$re3[0]);
 $ssr="";for($ri=0;$ri<count($b);$ri++){$ssr=$ssr.$b[$ri];if($ri<(count($b)-2)){$ssr=$ssr."v";}}
 $d=preg_split("/_".$w.$ssr."v/",$nstr);
 $nstr=$a[0]."_".$w.$wv."v".$d[1];
}else{
 $nstr=$nstr."_".$w.$wv."v";
}
}
}
if($xv==""){$nstr=str_replace("_".$x."v","",$nstr);}
if($yv==""){$nstr=str_replace("_".$y."v","",$nstr);}
if($zv==""){$nstr=str_replace("_".$z."v","",$nstr);}
if($wv==""){$nstr=str_replace("_".$w."v","",$nstr);}
return ($nq.$nstr).".html";}

function inp_tp_upload($ni,$mcnur,$mcname,$gs=""){
 $i=$ni;
 if(!empty($_FILES["inp$i"]["tmp_name"])){
 $filetype = strtolower($_FILES["inp$i"]['type']);
 $tp = array("image/gif","image/pjpeg","image/jpeg","image/jpg","image/x-png","image/png","application/x-shockwave-flash","application/octet-stream","application/vnd.ms-excel"); 
 if(!in_array($_FILES["inp$i"]["type"],$tp)){ 
 echo "<script>alert('��ʽ����');history.go(-1);</script>";exit;
 }
 $gs=strtolower($gs);
 if($filetype == 'image/jpeg'){$type = '.jpg';}
 if($filetype == 'image/jpg'){$type = '.jpg';}
 if($filetype == 'image/pjpeg'){$type = '.jpg';}
 if($filetype == 'image/gif'){$type = '.gif';}
 if($filetype == 'image/x-png' || $filetype=='image/png'){$type = '.png';}
 if($filetype == 'application/x-shockwave-flash'){$type = '.swf';}
 if($filetype == 'application/octet-stream'){$type = '.flv';}
 if($filetype == 'application/vnd.ms-excel'){$type = '.xls';}
 $tna=$_FILES["inp$i"]["name"]; 
 if($gs==""){$gsv=$type;}else{$gsv=".".$gs;}
 move_uploaded_file($_FILES["inp$i"]['tmp_name'],$mcnur.$mcname.$gsv);
 $lastB=$mcname.$gsv;}else{$lastB="";}return $lastB;
}

function getDir($dir){$dirArray[]=NULL;if (false != ($handle = opendir ( $dir ))) {$i=0;while ( false !== ($file = readdir ( $handle )) ) {if ($file != "." && $file != ".."&&!strpos($file,".")) {$dirArray[$i]=$file;$i++;}}closedir ( $handle );}return $dirArray;}

function js_unescape($str){  //PHP��escape����
$ret = '';$len = strlen($str);for($i=0;$i<$len;$i++){if ($str[$i] == '%' && $str[$i+1] == 'u'){$val = hexdec(substr($str, $i+2, 4));if ($val < 0x7f) $ret .= chr($val);else if($val < 0x800) $ret .= chr(0xc0|($val>>6)).chr(0x80|($val&0x3f));else $ret .= chr(0xe0|($val>>12)).chr(0x80|(($val>>6)&0x3f)).chr(0x80|($val&0x3f));$i += 5;}else if ($str[$i] == '%'){$ret .= urldecode(substr($str, $i, 3));$i += 2;}else $ret .= $str[$i];}return iconv('utf-8', 'gb2312', $ret);}

 function DateDiff($date1, $date2, $unit = "") {switch($unit){case 's':$dividend = 1;break;case 'i':$dividend = 60;break;case 'h':$dividend = 3600;break;case 'd':$dividend = 86400;break;default:$dividend = 86400;}$time1 = strtotime($date1);$time2 = strtotime($date2);if ($time1 && $time2) return (float)($time1 - $time2) / $dividend;return false;}function read_file_content($FileName) {$fp=fopen($FileName,"r"); $data=""; while(!feof($fp)) {$data.=fread($fp,4096); } fclose($fp); return $data; }function returnsx($x){$nstr=$_GET[str];if(check_in("_".$x,$nstr)){$re1=preg_split("/_".$x."/",$nstr);$re3=preg_split("/_/",$re1[1]);$re2=preg_split("/v/",$re3[0]);$ssr="";for($ri=0;$ri<count($re2);$ri++){$ssr=$ssr.$re2[$ri];if($ri<(count($re2)-2)){$ssr=$ssr."v";}}if($ssr==""){$nr=-1;}else{$nr=$ssr;}return $nr;}else{return -1; }}function check_in($arr, $text){$keys = explode(',',$arr);$result = 0;if($keys){foreach($keys as $key){if(strstr($text,$key)!=''){$result = 1;break;}}}return $result;}function returnjgdw($m,$d,$t="����"){if(empty($m)){return $t;}else{return $m.$d;}}function returntppd($tp1,$tp2){if(is_file($tp1)){return $tp1;}else{return $tp2;}}
 
function safeEncoding($string){global $rowcontrol;if(empty($rowcontrol[sermode])){return base_decode(($string));}else{return $string;}}

function base_encode($str){$src  = array("/","+","=");$dist = array("|a","|b","|c");$old  = base64_encode($str);$new  = str_replace($src,$dist,$old);return $new;}

function base_decode($str){$src = array("|a","|b","|c");$dist  = array("/","+","=");$old  = str_replace($src,$dist,$str);$new = base64_decode($old);return $new;}

function returnvideo($a,$w,$h,$u,$lj=""){
if($a==1){ //�ⲿ����

 if(strstr($u,"qq.com")!=""){ //��Ѷ��Ƶt0521f5t56e
 $b=preg_split("/vid=/",$u);
 $a=preg_split("/&/",$b[1]);
 $str="<div id=\"mod_player_skin\"></div><script language=\"javascript\" src=\"http://qzs.qq.com/tencentvideo_v1/js/tvp/tvp.player.js\" charset=\"utf-8\"></script><script language=\"javascript\">var video = new tvp.VideoInfo();video.setVid(\"".$a[0]."\");var player = new tvp.Player(".$w.", ".$h.");player.setCurVideo(video);player.addParam(\"autoplay\",\"1\");player.addParam(\"wmode\",\"transparent\");player.write(\"mod_player_skin\");</script>";
 }elseif(strstr($u,"youku.com")!=""){ //�ſ���Ƶ
 $str="<iframe height=".$h." width=".$w." src=\"".$u."\" frameborder=0 allowfullscreen></iframe>";
 }

}else{ //�Լ��ϴ�
 $t=returnhz($u);
 if($t=="flv"){
 $str="
 <script type=\"text/javascript\">var swf_width=".$w.";var swf_height=".$h.";var texts='';var files='".$u."';
  document.write('<object classid=\"clsid:d27cdb6e-ae6d-11cf-96b8-444553540000\"   codebase=\"http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0\" width=\"'+ swf_width +'\" height=\"'+ swf_height +'\">');
  document.write('<param name=\"movie\" value=\"".$lj."config/flv.swf\"><param name=\"quality\" value=\"high\">');
  document.write('<param name=\"menu\" value=\"false\"><param name=\"allowFullScreen\" value=\"true\" />');
  document.write('<param name=\"FlashVars\" value=\"vcastr_file='+files+'&IsAutoPlay=1\">');
  document.write('<embed src=\"".$lj."config/flv.swf\" allowFullScreen=\"true\" FlashVars=\"vcastr_file='+files+'&vcastr_title='+texts+'\" menu=\"false\" quality=\"high\" width=\"'+ swf_width +'\" height=\"'+ swf_height +'\" type=\"application/x-shockwave-flash\" pluginspage=\"http://www.macromedia.com/go/getflashplayer\" />'); 
  document.write('</object>');
  </script>
 ";
 }elseif($t=="swf"){
 $str="<embed type=\"application/x-shockwave-flash\" class=\"edui-faked-video\" pluginspage=\"http://www.macromedia.com/go/getflashplayer\" src=\"".$u."\" width=\"".$w."\" height=\"".$h."\" style=\"float: none\" wmode=\"transparent\" play=\"true\" loop=\"false\" menu=\"false\" allowscriptaccess=\"never\" allowfullscreen=\"true\"/>";
 }
 
}

return $str;
}

function returntitcss($t,$b,$c){$tit=$t;if(1==$b){$tit="<strong>".$tit."</strong>";}if(!empty($c)){$tit="<font color='".$c."'>".$tit."</font>";}return $tit;}function returntitdian($t,$l){$len=strlen($t);if($len>$l){return strgb2312($t,0,$l-3)."...";}else{return $t;}}function returnztv($zv,$zvsm=""){if(0==$zv){$ztv="<span class='blue'>��ͨ�����</span>";}elseif(1==$zv){$ztv="<span class='feng'>�������</span>";}elseif(2==$zv){$ztv="<span class='red'>��˲�ͨ��,".$zvsm."</span>";}return $ztv;}function htmlget($url){$ch = curl_init();curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);curl_setopt($ch, CURLOPT_URL, $url);curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);curl_setopt($ch, CURLOPT_REFERER, CHR);curl_setopt($ch, CURLOPT_HEADER,0);$output = curl_exec($ch);curl_close($ch);return $output;}function systs($a,$b){if($_GET[t]=="suc"){echo "<div class=\"systs\">".$a."[<a href=\"".$b."\">֪����</a>]</div>";}}
function rnd_num($num){$seedarray =microtime();$seedstr =preg_split("/\s/",$seedarray,5);$seed =$seedstr[0]*10000;srand($seed);return rand(1,$num);}
function strgb2312($str, $start, $len) {$tmpstr = "";$strlen = $start + $len;for($i = 0; $i < $strlen; $i++) {if(ord(substr($str, $i, 1)) > 0xa0) {$tmpstr .= substr($str, $i, 2);$i++;} else$tmpstr .= substr($str, $i, 1);}return $tmpstr;}function dateYMDN($m){$a=preg_split("/\s/",$m);$b=str_replace("-","",$a[0]);$b=str_replace("/","",$b);return $b;}
function returnonecon($x){
 if(1==$x){return "��Աע��Э��";}
 elseif(2==$x){return "��������";}
 elseif(3==$x){return "������";}
 elseif(4==$x){return "��ϵ����";}
 elseif(5==$x){return "��˽����";}
 elseif(6==$x){return "��������";}
 elseif(7==$x){return "����Э��";}
 elseif(8==$x){return "��Ʒ��������";}
 elseif(9==$x){return "��Ʒ���׹���";}
}function dateYMD($m){$a=preg_split("/\s/",$m);return $a[0];}function dateMD($m){$a=dateYMD($m);$b=preg_split("/-/",$a);$mv=$b[1];$dv=$b[2];return $mv."/".$dv;}function dateYMDHM($m){$a=preg_split("/:/",$m);return $a[0].":".$a[1];}function is_date($date){if($date == date('Y-m-d H:i:s',strtotime($date))){return true;}else{return false;}}function MakePass($length){$possible = "0123456789";$str="";while(strlen($str)<$length){$str.= substr($possible,(rand() % strlen($possible)),1);}return($str);}function MakePassAll($length){$possible = "abcdefghkmnprstuvwxyzABCDEFGHKMNPRSTUVWXYZ23456789";$str="";while(strlen($str)<$length){$str.= substr($possible,(rand() % strlen($possible)),1);}return($str);}function returnjgdian($a){$b=preg_split("/\./",$a);if(count($b)>1){return $a;}elseif(0==$a){return 0;}else{return $a.".00";}}function returnyhmoney($m,$m2,$m3,$s1,$s2,$s3,$d){if(2==$m){if($s1>=$s2 && $s1<=$s3){$mv=$m3;}else{$mv=$m2;}if($s1>$s3){updatetable("epzhu_proym","yhxs=1 where id=".$d);}}else{$mv=$m2;}return $mv;}

function returnshopztv($x){
 if(0==$x){return "<span class='hui'>δ�ύ����</span>";}
 elseif(1==$x){return "<span class='feng'>�������</span>";}
 elseif(2==$x){return "<span class='blue'>��������</span>";}
 elseif(3==$x){return "<span class='red'>��˱���</span>";}
 elseif(4==$x){return "<span class='red'>�Ѿ�����</span>";}
}
function returntxzt($x,$y){
 if(1==$x){return "<span class='blue'>���ֳɹ�</span>";}
 elseif(2==$x){return "<span class='hui'>�û��Ѿ���������</span>";}
 elseif(3==$x){return "<span class='red'>����ʧ��,".$y."</span>";}
 elseif(4==$x){return "<span class='green'>�ȴ�����</span>";}
}
function returnadminqx(){
$qx=array("0101,��Ʒ�༭|0102,��Ʒ�鿴|0103,��Ʒɾ��",
		  "0201,��Ѷ�༭|0202,��Ѷ�鿴|0203,��Ѷɾ��",
		  "0301,ȫ�ֱ༭|0302,ȫ�ֲ鿴|0303,ȫ��ɾ��",
		  "0401,�����༭|0402,�����鿴|0403,����ɾ��",
		  "0601,���༭|0602,���鿴|0603,���ɾ��",
		  "0701,��Ա�༭|0702,��Ա�鿴|0703,��Աɾ��"
		  );	
return $qx;
}

function returnorderzt($zv){
if($zv=="suc"){ //���׳ɹ�
$ztv="<span class='green'>���׳ɹ�</span>";
}elseif($zv=="wait"){ //�ȴ�����
$ztv="<span class='red'>�ȴ�����</span>";
}elseif($zv=="db"){ //�ȴ�����ջ�
$ztv="<span class='blue'>�ѷ���</span>";
}elseif($zv=="back"){ //��Ҫ������˿�
$ztv="<span class='feng'>�˿����</span>";
}elseif($zv=="backsuc"){ //�˿�ɹ�
$ztv="<span class='hui'>�˿�ɹ�</span>";
}elseif($zv=="backerr"){ //�˿�����ܾ�
$ztv="<span class='red'>��ͬ���˿�</span>";
}elseif($zv=="wpay"){ //�ȴ���Ҹ���
$ztv="<span class='hui'>�ȴ���Ҹ���</span>";
}elseif($zv=="close"){ //������ȡ��
$ztv="<span class='hui'>����ȡ��</span>";
}elseif($zv=="jf"){ //���״���
$ztv="<span class='red'>���״���</span>";
}elseif($zv=="jfbuy"){ //��ʤ��
$ztv="<span class='blue'>��ʤ��</span>";
}elseif($zv=="jfsell"){ //����ʤ��
$ztv="<span class='green'>����ʤ��</span>";
}
return $ztv;
}

function returntask($zv){
if($zv==0){
$ztv="<span class='hui zt0'>�ȴ�����</span>";
}elseif($zv==1){
$ztv="<span class='feng zt1'>���������</span>";
}elseif($zv==2){
$ztv="<span class='red zt2'>��˲�ͨ��</span>";
}elseif($zv==3){
$ztv="<span class='green zt3'>�ѳн�</span>";
}elseif($zv==4){
$ztv="<span class='feng zt4'>�ȴ�����ȷ��</span>";
}elseif($zv==5){
$ztv="<span class='blue zt5'>���׳ɹ�</span>";
}elseif($zv==6){
$ztv="<span class='hui zt6'>����ȡ������</span>";
}elseif($zv==7){
$ztv="<span class='hui zt7'>���ַ�ȡ������</span>";
}elseif($zv==8){
$ztv="<span class='red zt8'>���׾���,ƽ̨����</span>";
}elseif($zv==9){
$ztv="<span class='hui zt9'>���׹ر�</span>";
}elseif($zv==10){
$ztv="<span class='hui zt10'>�Ѿ�����</span>";
}elseif($zv==100){
$ztv="<span class='red zt100'>�ȴ����ɷ���</span>";
}elseif($zv==101){
$ztv="<span class='green zt101'>���������</span>";
}elseif($zv==102){
$ztv="<span class='blue zt102'>�������</span>";
}elseif($zv==103){
$ztv="<span class='hui zt103'>����ȡ��</span>";
}elseif($zv==104){
$ztv="<span class='hui zt104'>������</span>";
}elseif($zv==105){
$ztv="<span class='feng zt105'>���������</span>";
}elseif($zv==106){
$ztv="<span class='red zt106'>��˲�ͨ��</span>";
}
return $ztv;
}

function returntask1($zv){
if($zv==0){
$ztv="<span class='hui'>����������</span>";
}elseif($zv==1){
$ztv="<span class='feng'>��������</span>";
}elseif($zv==2){
$ztv="<span class='blue'>���׳ɹ�</span>";
}elseif($zv==3){
$ztv="<span class='red'>���ղ�ͨ��</span>";
}elseif($zv==4){
$ztv="<span class='red'>����,ƽ̨����</span>";
}elseif($zv==5){
$ztv="<span class='blue'>���ַ�ȡ������</span>";
}elseif($zv==7){
$ztv="<span class='hui'>���׹ر�</span>";
}
return $ztv;
}

function returngdzt($zv){
if($zv==1){$ztv="<span class='feng'>�ȴ�����</span>";}
elseif($zv==2){$ztv="<span class='blue'>������</span>";}
elseif($zv==3){$ztv="<span class='red'>�ȴ�����</span>";}
elseif($zv==4){$ztv="<span class='green'>�ѽᵥ</span>";}
return $ztv;
}

function returntaskjgxs($x){
if(empty($x)){return "һ�ڼ�";}
elseif($x==1){return "��Χ����";}
elseif($x==2){return "���ű���";}
}

function returntaskxs($x){
if(empty($x)){return "��������";}
elseif($x==1){return "��������";}
}

function returntaskjg($x,$m1,$m2){
if(empty($x)){return $m1;}
elseif($x==1){return $m1."-".$m2;}
elseif($x==2){return "�����̱���";}
}

function returnfhxs($x){
if($x==1){return "�ֶ�����";}
elseif($x==2){return "��������";}
elseif($x==3){return "��վ����";}
elseif($x==4){return "��ʾ����";}
elseif($x==5){return "�������";}
}

function returnmyweb($x,$y){//$x��ʾID $y��ʾ�Զ�����ַ
if(empty($y)){return weburl."shop/view".$x.".html";}
else{return weburl."vip".$y;}
}
?>