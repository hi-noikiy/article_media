<?
set_time_limit(0);
require("../config/conn.php");
require("../config/function.php");
sesCheck();
$admin=$_GET[admin];
$bhid=$_GET[idbh];
$tab=$_GET[tab];
$sqluser="select * from epzhu_user where uid='".$_SESSION[SHOPUSER]."'";mysql_query("SET NAMES 'GBK'");$resuser=mysql_query($sqluser);
$rowuser=mysql_fetch_array($resuser);
$userid=$rowuser[id];
$sj=date("Y-m-d H:i:s");
switch($admin){
 case "1":   //���¼�
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  while0("bh,ifxj",$tab." where bh='".$nb[$i]."' and userid=".$userid);while($row=mysql_fetch_array($res)){
  if(0==$row[ifxj]){$nn=1;}else{$nn=0;}
  updatetable($tab,"ifxj=".$nn." where bh='".$row[bh]."'");
  }
 }
 break;	
 case "2":   //ɾ����Ʒ
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
 while1("bh,userid","epzhu_pro where bh='".$nb[$i]."' and userid=".$userid);
  if($row1=mysql_fetch_array($res1)){delproduct($row1[bh],$row1[userid]);}
 }
 break;	
 case "3":   //ɾ����������
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
 while0("*","epzhu_task where userid=".$userid." and bh='".$nb[$i]."' and taskty=0 and (zt=0 or zt=1 or zt=2 or zt=5 or zt=6 or zt=7 or zt=9 or zt=10)");
 if($row=mysql_fetch_array($res)){
  if(0==$row[zt] || 1==$row[zt]){
   if($row[money4]>0){
   PointIntoM($row[userid],"ɾ�������˻ض���",$row[money4]);
   PointUpdateM($row[userid],$row[money4]);
   }
  }
  deletetable("epzhu_task where id=".$row[id]);
  deletetable("epzhu_taskhf where bh='".$nb[$i]."'");
  deletetable("epzhu_tasklog where bh='".$nb[$i]."'");
 }
 }
 break;	
 case "3a":   //ɾ�����˽��֣�û��ѡ�еĿ���ɾ��
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
 while0("*","epzhu_taskhf where useridhf=".$userid." and bh='".$nb[$i]."' and taskty=0 and ifxz=0");if($row=mysql_fetch_array($res)){
  deletetable("epzhu_taskhf where id=".$row[id]);
 }
 }
 break;	
 case "5":   //ɾ������
 $nb=preg_split("/,/",$bhid);
 $pbh="";
 if(!empty($nb[0])){while0("id,probh,userid","epzhu_kc where userid=".$userid." and id=".$nb[0]);if($row=mysql_fetch_array($res)){$pbh=$row[probh];}}
 for($i=0;$i<count($nb);$i++){
  if(!is_numeric($nb[$i])){echo "ERR074";exit;}
  deletetable("epzhu_kc where userid=".$userid." and id=".$nb[$i]);
 }
 kamikc($pbh);
 break;	
 case "5t":   //ɾ���ײͿ���
 $nb=preg_split("/,/",$bhid);
 $pbh="";
 if(!empty($nb[0])){while0("id,userid,probh,tcid","epzhu_taocan_kc where userid=".$userid." and id=".$nb[0]);
 if($row=mysql_fetch_array($res)){$pbh=$row[probh];$tcid=$row[tcid];}}
 for($i=0;$i<count($nb);$i++){
  if(!is_numeric($nb[$i])){echo "ERR074";exit;}
  deletetable("epzhu_taocan_kc where userid=".$userid." and id=".$nb[$i]);
 }
 kamikc_tc($pbh,$tcid);
 break;	
 case "6":   //ɾ������
 $nb=preg_split("/,/",$bhid);
 $pbh="";
 if(!empty($nb[0])){while0("id,probh,userid","epzhu_kc where userid=".$userid." and id=".$nb[0]);if($row=mysql_fetch_array($res)){$pbh=$row[probh];}}
 for($i=0;$i<count($nb);$i++){
  if(!is_numeric($nb[$i])){echo "ERR074";exit;}
  deletetable("epzhu_kc where userid=".$userid." and id=".$nb[$i]);
 }
 kamikc($pbh);
 break;	
 case "7":   //������Ʒ
 $nb=preg_split("/,/",$bhid);
 $syjf=$rowuser[jf];
 for($i=0;$i<count($nb);$i++){ 
 while1("*","epzhu_pro where userid=".$userid." and bh='".$nb[$i]."'");while($row1=mysql_fetch_array($res1)){
  if($syjf>=$rowcontrol[sxjf]){
   $syjf=$syjf-$rowcontrol[sxjf];
   updatetable("epzhu_pro","lastsj='".$sj."' where id=".$row1[id]);
   $jf=$rowcontrol[sxjf]*(-1);
   PointInto($rowuser[id],"ˢ����Ʒ[".$row1[tit]."]�����Ļ���",$jf);PointUpdate($rowuser[id],$jf);
  }
 }
 }
 break;	
 case "9":   //ɾ���ײ�
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  $a=preg_split("/xcf/",$nb[$i]); //$a[0]����ID $a[1]С��ID
  if(intval($a[0])!=0){  //��ʾɾ������
	if(!is_numeric($a[0])){echo "ERR074";exit;}
	while0("*","epzhu_taocan where userid=".$userid." and id=".$a[0]);$row=mysql_fetch_array($res);
	if(panduan("*","epzhu_taocan where userid=".$userid." and admin=2 and probh='".$row[probh]."' and zt<>99 and tit='".$row[tit]."'")==1){echo "ERR1";exit;}
	deletetable("epzhu_taocan where userid=".$userid." and id=".$row[id]);
	deletetable("epzhu_taocan_kc where userid=".$userid." and tcid=".$row[id]." and probh='".$row[probh]."'");
  }elseif(intval($a[0])==0){  //��ʾɾ��С��
	if(!is_numeric($a[1])){echo "ERR074";exit;}
	deletetable("epzhu_taocan where userid=".$userid." and id=".$a[1]);
	deletetable("epzhu_taocan_kc where userid=".$userid." and tcid=".$a[1]);
  }
 }
 break;	
 case "10":   //ɾ���ջ���ַ
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
 if(!is_numeric($nb[$i])){echo "ERR074";exit;}
 deletetable("epzhu_shdz where userid=".$userid." and id=".$nb[$i]);
 }
 break;	
 case "11":   //ɾ���˷�ģ��
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
 if(!is_numeric($nb[$i])){echo "ERR074";exit;}
 deletetable("epzhu_yunfei where id=".$nb[$i]." and userid=".$userid);
 }
 break;	
 case "12":   //ɾ����Ѷ
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  while0("id,bh,zt,userid,sj","epzhu_news where bh='".$nb[$i]."' and zt<>0 and userid=".$userid);while($row=mysql_fetch_array($res)){
  delDirAndFile("../upload/news/".dateYMDN($row[sj])."/".$row[bh]."/");
  deletetable("epzhu_news where id=".$row[id]);
  deletetable("epzhu_tp where type1='��Ѷ' and bh='".$row[bh]."'");
  }
 }
 break;	
 case "13":   //ɾ������ͼƬ
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
   if(!is_numeric($nb[$i])){echo "ERR074";exit;}
   while1("*","epzhu_tp where userid=".$userid." and id=".$nb[$i]);if($row1=mysql_fetch_array($res1)){
   if(!empty($row1[tp])){
   delFile("../".str_replace(".","-1.",$row1[tp]));
   delFile("../".$row1[tp]);
   }
   deletetable("epzhu_tp where id=".$nb[$i]);
   }
 }
 break;	
 case "14":   //ɾ����Ʒ��Ƶ
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  while1("*","epzhu_provideo where bh='".$nb[$i]."' and userid=".$userid);if($row1=mysql_fetch_array($res1)){
   if($row1[admin]==2){delFile($row1["url"]);}
   delFile("../upload/".$row1[userid]."/".$row1[probh]."/".$row1[bh].".jpg");
   deletetable("epzhu_provideo where id=".$row1[id]);
  }
 }
 break;	
 case "15":   //ɾ���Զ���12������
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  $a=preg_split("/xcf/",$nb[$i]); //$a[0]����ID $a[1]С��ID
  if(intval($a[0])!=0){  //��ʾɾ������
	if(!is_numeric($a[0])){echo "ERR074";exit;}
	while0("*","epzhu_protype where id=".$a[0]." and userid=".$userid);if($row=mysql_fetch_array($res)){
	deletetable("epzhu_protype where name1='".$row[name1]."'");
	}
  }elseif(intval($a[0])==0){  //��ʾɾ��С��
	if(!is_numeric($a[1])){echo "ERR074";exit;}
	deletetable("epzhu_protype where id=".$a[1]." and userid=".$userid);
  }
 }
 break;	
 case "16":   //ɾ���Զ�����̵���12������
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  $a=preg_split("/xcf/",$nb[$i]); //$a[0]����ID $a[1]С��ID
  if(intval($a[0])!=0){  //��ʾɾ������
	if(!is_numeric($a[0])){echo "ERR074";exit;}
	while0("*","epzhu_shopmenu where id=".$a[0]." and userid=".$userid);if($row=mysql_fetch_array($res)){
	deletetable("epzhu_shopmenu where tit1='".$row[tit1]."'");
	}
  }elseif(intval($a[0])==0){  //��ʾɾ��С��
	if(!is_numeric($a[1])){echo "ERR074";exit;}
	deletetable("epzhu_shopmenu where id=".$a[1]." and userid=".$userid);
  }
 }
 break;	
 case "17":   //ɾ�������ֲ�ͼƬ
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  while1("*","epzhu_shopbannar where bh='".$nb[$i]."' and userid=".$userid);if($row1=mysql_fetch_array($res1)){
   delFile("../upload/".$row1[userid]."/bannar_".$row1[bh].".jpg");
   deletetable("epzhu_shopbannar where id=".$row1[id]);
  }
 }
 break;	

}
echo "True";
?>