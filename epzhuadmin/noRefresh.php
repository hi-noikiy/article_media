<?
set_time_limit(0);
require("../config/conn.php");
require("../config/function.php");
AdminSes_audit();
$admin=$_GET[admin];
$bhid=$_GET[idbh];
$tab=$_GET[tab];
switch($admin){
 case "1":   //ɾ���������ķ���
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0303,")){echo "Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  $a=preg_split("/xcf/",$nb[$i]); //$a[0]����ID $a[1]С��ID
  if(intval($a[0])!=0){  //��ʾɾ������
	if(!is_numeric($a[0])){echo "ERR074";exit;}
	while0("*","epzhu_helptype where id=".$a[0]);$row=mysql_fetch_array($res);
	deletetable("epzhu_helptype where name1='".$row[name1]."'");
  }elseif(intval($a[0])==0){  //��ʾɾ��С��
	if(!is_numeric($a[1])){echo "ERR074";exit;}
	deletetable("epzhu_helptype where id=".$a[1]);
  }
 }
 break;	
 case "2":   //ɾ����������
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0603,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
   deletetable("epzhu_help where bh='".$nb[$i]."'");
 }
 break;	
 case "3":   //ɾ����Ʒ�������������
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0303,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  $a=preg_split("/xcf/",$nb[$i]); //$a[0]����ID $a[1]С��ID
  if(intval($a[0])!=0){  //��ʾɾ������
	if(!is_numeric($a[0])){echo "ERR074";exit;}
	while0("*","epzhu_type where id=".$a[0]);$row=mysql_fetch_array($res);
	deletetable("epzhu_type where type1='".$row[type1]."' and type2='".$row[type2]."'");
  }elseif(intval($a[0])==0){  //��ʾɾ��С��
	if(!is_numeric($a[1])){echo "ERR074";exit;}
	while0("*","epzhu_type where id=".$a[1]);$row=mysql_fetch_array($res);
	deletetable("epzhu_type where type1='".$row[type1]."' and type2='".$row[type2]."' and type3='".$row[type3]."'");
  }
 }
 break;	
 case "3a":   //ɾ����Ʒ�������弶����
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0303,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  $a=preg_split("/xcf/",$nb[$i]); //$a[0]����ID $a[1]С��ID
  if(intval($a[0])!=0){  //��ʾɾ������
	if(!is_numeric($a[0])){echo "ERR074";exit;}
	while0("*","epzhu_type where id=".$a[0]);$row=mysql_fetch_array($res);
	deletetable("epzhu_type where type1='".$row[type1]."' and type2='".$row[type2]."' and type3='".$row[type3]."' and type4='".$row[type4]."'");
  }elseif(intval($a[0])==0){  //��ʾɾ��С��
	if(!is_numeric($a[1])){echo "ERR074";exit;}
	deletetable("epzhu_type where id=".$a[1]);
  }
 }
 break;	
 case "4":   //ɾ����Ʒ����
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0303,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  deletetable("epzhu_typesx where typeid=".$nb[$i]);
  while0("*","epzhu_type where id=".$nb[$i]);$row=mysql_fetch_array($res);
  deletetable("epzhu_type where type1='".$row[type1]."'");
 }
 break;	
 case "5":   //ɾ����Ѷ����
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0303,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  $a=preg_split("/xcf/",$nb[$i]); //$a[0]����ID $a[1]С��ID
  if(intval($a[0])!=0){  //��ʾɾ������
	if(!is_numeric($a[0])){echo "ERR074";exit;}
	if(panduan("type1id,zt","epzhu_news where type1id=".$a[0]." and zt<>99")==1){echo "ERR";exit;}
	while0("*","epzhu_newstype where id=".$a[0]);$row=mysql_fetch_array($res);
	deletetable("epzhu_newstype where name1='".$row[name1]."'");
  }elseif(intval($a[0])==0){  //��ʾɾ��С��
	if(!is_numeric($a[1])){echo "ERR074";exit;}
	if(panduan("type2id,zt","epzhu_news where type2id=".$a[1]." and zt<>99")==1){echo "ERR";exit;}
	deletetable("epzhu_newstype where id=".$a[1]);
  }
 }
 break;	
 case "6":   //��Ѷ���״̬
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0201,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  while0("bh,zt","epzhu_news where bh='".$nb[$i]."'");while($row=mysql_fetch_array($res)){
  if(1==$row[zt]){$nn=0;}else{$nn=1;}
  updatetable("epzhu_news","zt=".$nn." where bh='".$nb[$i]."'");
  }
 }
 break;	
 case "7":   //ɾ����Ѷ
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0203,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  while0("bh,sj","epzhu_news where bh='".$nb[$i]."'");while($row=mysql_fetch_array($res)){
  delDirAndFile("../upload/news/".dateYMDN($row[sj])."/".$row[bh]."/");
  deletetable("epzhu_news where bh='".$row[bh]."'");
  deletetable("epzhu_tp where type1='��Ѷ' and bh='".$row[bh]."'");
  }
 }
 break;	
 case "8":   //ɾ�����
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0603,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  while0("*","epzhu_ad where bh='".$nb[$i]."' and (type1='ͼƬ' or type1='����')");if($row=mysql_fetch_array($res)){
   delFile("../ad/".$nb[$i].".".$row[jpggif]);
   delFile("../ad/".$nb[$i]."-99.".$row[jpggif]);
  }
  deletetable("epzhu_ad where bh='".$nb[$i]."'");
 }
 break;	
 case "9":   //ɾ����Ա
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0703,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  while3("id,uid","epzhu_user where id=".$nb[$i]);while($row3=mysql_fetch_array($res3)){
  deluid($row3[uid]);
  }
 }
 break;	
 case "10":   //ɾ�����֣�Ҫ�ǵȴ�����״̬��
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0703,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  deletetable("epzhu_tixian where zt<>4 and id=".$nb[$i]);
 }
 break;	
 case "11":   //ɾ������Ա
 if(!strstr($adminqx,",0,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  $qx=",0,";
  deletetable("epzhu_admin where qx<>'".$qx."' and id=".$nb[$i]);
 }
 break;	
 case "12":   //��Ʒ���״̬
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0101,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  while0("bh,zt","epzhu_pro where bh='".$nb[$i]."'");while($row=mysql_fetch_array($res)){
  if(1==$row[zt]){$nn=0;}else{$nn=1;}
  updatetable("epzhu_pro","zt=".$nn." where bh='".$nb[$i]."'");
  }
 }
 break;	
 case "13":   //��Ʒ���¼�״̬
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0101,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  while0("bh,ifxj","epzhu_pro where bh='".$nb[$i]."'");while($row=mysql_fetch_array($res)){
  if(1==$row[ifxj]){$nn=0;}else{$nn=1;}
  updatetable("epzhu_pro","ifxj=".$nn." where bh='".$nb[$i]."'");
  }
 }
 break;	
 case "14":   //ɾ����Ʒ
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0103,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
 while1("bh,userid","epzhu_pro where bh='".$nb[$i]."'");
  if($row1=mysql_fetch_array($res1)){delproduct($row1[bh],$row1[userid]);}
 }
 break;	
 case "17":   //ɾ������
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0403,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
 deletetable("epzhu_propj where orderbh='".$nb[$i]."'");
 deletetable("epzhu_tk where orderbh='".$nb[$i]."'");
 deletetable("epzhu_db where orderbh='".$nb[$i]."'");
 deletetable("epzhu_order where orderbh='".$nb[$i]."'");
 deletetable("epzhu_orderlog where orderbh='".$nb[$i]."'");
 }
 break;	
 case "18":   //ɾ������ѡ��
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0303,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  $a=preg_split("/xcf/",$nb[$i]); //$a[0]����ID $a[1]С��ID
  if(intval($a[0])!=0){  //��ʾɾ������
	if(!is_numeric($a[0])){echo "ERR074";exit;}
	while0("*","epzhu_typesx where id=".$a[0]);$row=mysql_fetch_array($res);
	deletetable("epzhu_typesx where name1='".$row[name1]."'");
  }elseif(intval($a[0])==0){  //��ʾɾ��С��
	if(!is_numeric($a[1])){echo "ERR074";exit;}
	deletetable("epzhu_typesx where id=".$a[1]);
  }
 }
 break;	
 case "19":   //ɾ������
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
 deletetable("epzhu_gg where bh='".$nb[$i]."'");
 }
 break;	
 case "20":   //ɾ������������
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0303,")){echo "Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  $a=preg_split("/xcf/",$nb[$i]); //$a[0]����ID $a[1]С��ID
  if(intval($a[0])!=0){  //��ʾɾ������
	if(!is_numeric($a[0])){echo "ERR074";exit;}
	while0("*","epzhu_tasktype where id=".$a[0]);$row=mysql_fetch_array($res);
	deletetable("epzhu_tasktype where name1='".$row[name1]."'");
  }elseif(intval($a[0])==0){  //��ʾɾ��С��
	if(!is_numeric($a[1])){echo "ERR074";exit;}
	deletetable("epzhu_tasktype where id=".$a[1]);
  }
 }
 break;	
 case "21":   //ɾ����������
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0603,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  while0("*","epzhu_task where bh='".$nb[$i]."' and taskty=0");if($row=mysql_fetch_array($res)){
  if(0==$row[zt] || 1==$row[zt]){
   if($row[money4]>0){
   PointIntoM($row[userid],"ɾ�������˻ض���",$row[money4]);
   PointUpdateM($row[userid],$row[money4]);
   }
  }
  if(3==$row[zt] || 4==$row[zt] || 8==$row[zt]){
   PointIntoM($row[userid],"ɾ�������˻ط���",$row[money3]);
   PointUpdateM($row[userid],$row[money3]);
  }
  deletetable("epzhu_task where id=".$row[id]);
  deletetable("epzhu_taskhf where bh='".$row[bh]."'");
  deletetable("epzhu_tasklog where bh='".$row[bh]."'");
  }
 }
 break;	
 case "21a":   //ɾ����������
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0603,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  while0("*","epzhu_task where bh='".$nb[$i]."' and taskty=1");if($row=mysql_fetch_array($res)){
  if(101==$row[zt] || 104==$row[zt]){
   if($row[money3]>0){
   PointIntoM($row[userid],"����Աɾ�������˻ط���",$row[money3]);
   PointUpdateM($row[userid],$row[money3]);
   }
  }
  deletetable("epzhu_task where id=".$row[id]);
  deletetable("epzhu_taskhf where bh='".$row[bh]."'");
  deletetable("epzhu_tasklog where bh='".$row[bh]."'");
  }
 }
 break;	
 case "23":   //ɾ������ظ�
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0603,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  if(!is_numeric($nb[$i])){echo "ERR074";exit;}
  while1("*","epzhu_taskhf where id=".$nb[$i]);if($row1=mysql_fetch_array($res1)){
  deletetable("epzhu_taskhf where id=".$row1[id]);
  deletetable("epzhu_tasklog where bh=".$row1[bh]." and useridhf=".$row1[useridhf]);
  }
 }
 break;	
 case "25":   //ɾ������
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0103,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 $pbh="";
 if(!empty($nb[0])){while0("id,probh","epzhu_kc where id=".$nb[0]);if($row=mysql_fetch_array($res)){$pbh=$row[probh];}}
 for($i=0;$i<count($nb);$i++){
  if(!is_numeric($nb[$i])){echo "ERR074";exit;}
  deletetable("epzhu_kc where id=".$nb[$i]);
 }
 kamikc($pbh);
 break;	
 case "25t":   //ɾ���ײͿ���
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0103,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 $pbh="";
 if(!empty($nb[0])){while0("id,probh,tcid","epzhu_taocan_kc where id=".$nb[0]);if($row=mysql_fetch_array($res)){$pbh=$row[probh];$tcid=$row[tcid];}}
 for($i=0;$i<count($nb);$i++){
  if(!is_numeric($nb[$i])){echo "ERR074";exit;}
  deletetable("epzhu_taocan_kc where id=".$nb[$i]);
 }
 kamikc_tc($pbh,$tcid);
 break;	
 case "26":   //ɾ���ʽ��¼
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0703,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
   if(!is_numeric($nb[$i])){echo "ERR074";exit;}
   deletetable("epzhu_moneyrecord where id=".$nb[$i]);
 }
 break;	
 case "27":   //ɾ����Ʒ����
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0103,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
   if(!is_numeric($nb[$i])){echo "ERR074";exit;}
   deletetable("epzhu_propj where id=".$nb[$i]);
 }
 break;	
 case "28":   //ɾ������
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0603,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
   deletetable("epzhu_gd where bh='".$nb[$i]."'");
   deletetable("epzhu_gdhf where gdbh='".$nb[$i]."'");
 }
 break;	
 case "30":   //ɾ����ƷͼƬ
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0103,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
   if(!is_numeric($nb[$i])){echo "ERR074";exit;}
   while1("*","epzhu_tp where id=".$nb[$i]);if($row1=mysql_fetch_array($res1)){
   if(!empty($row1[tp])){
   delFile("../".str_replace(".","-1.",$row1[tp]));
   delFile("../".str_replace(".","-2.",$row1[tp]));
   delFile("../".$row1[tp]);
   }
   deletetable("epzhu_tp where id=".$nb[$i]);
   }
 }
 break;	
 case "31":   //ɾ����Ѷ����
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0203,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
   if(!is_numeric($nb[$i])){echo "ERR074";exit;}
   deletetable("epzhu_newspj where id=".$nb[$i]);
 }
 break;	
 case "32":   //ɾ�����������ϵ
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0303,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
   deletetable("epzhu_adlx where bh='".$nb[$i]."'");
 }
 break;	
 case "33":   //ɾ���ײ�
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0103,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  $a=preg_split("/xcf/",$nb[$i]); //$a[0]����ID $a[1]С��ID
  if(intval($a[0])!=0){  //��ʾɾ������
	if(!is_numeric($a[0])){echo "ERR074";exit;}
	while0("*","epzhu_taocan where id=".$a[0]);$row=mysql_fetch_array($res);
	if(panduan("*","epzhu_taocan where admin=2 and probh='".$row[probh]."' and zt<>99 and tit='".$row[tit]."'")==1){echo "+Err1";exit;}
	deletetable("epzhu_taocan where id=".$row[id]);
	deletetable("epzhu_taocan_kc where tcid=".$row[id]." and probh='".$row[probh]."'");
  }elseif(intval($a[0])==0){  //��ʾɾ��С��
	if(!is_numeric($a[1])){echo "ERR074";exit;}
	deletetable("epzhu_taocan where id=".$a[1]);
	deletetable("epzhu_taocan_kc where tcid=".$a[1]);
  }
 }
 break;	
 case "34":   //ɾ����ݹ�˾����
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0303,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  deletetable("epzhu_kuaidi where id=".$nb[$i]);
 }
 break;	
 case "35":   //ɾ���˹����˼�¼
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0703,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  deletetable("epzhu_payreng where id=".$nb[$i]);
 }
 break;	
 case "36":   //ɾ����Ա�ȼ�
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0303,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  while1("*","epzhu_userdj where bh='".$nb[$i]."'");$row1=mysql_fetch_array($res1);
  deletetable("epzhu_userdj where id=".$row1[id]);
  deletetable("epzhu_prouserdj where djname='".$row1[name1]."'");
  updatetable("epzhu_user","userdj='' where userdj='".$row1[name1]."'");
 }
 break;	
 case "37":   //ɾ����¼��־
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0303,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  deletetable("epzhu_loginlog where id=".$nb[$i]);
 }
 break;	
 case "38":   //ɾ����ֵ����
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0103,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  deletetable("epzhu_paykami where id=".$nb[$i]);
 }
 break;	
 case "39":   //ɾ����֤���¼
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0703,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  deletetable("epzhu_baomoneyrecord where id=".$nb[$i]." and zt<>1");
 }
 break;	
 case "40":   //�����Ʒ��Ƶ���״̬
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0101,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  while0("bh,zt","epzhu_provideo where bh='".$nb[$i]."'");while($row=mysql_fetch_array($res)){
  if(1==$row[zt]){$nn=0;}else{$nn=1;}
  updatetable("epzhu_provideo","zt=".$nn." where bh='".$row[bh]."'");
  }
 }
 break;
 case "41":   //ɾ����Ʒ��Ƶ
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0103,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  while1("*","epzhu_provideo where bh='".$nb[$i]."'");if($row1=mysql_fetch_array($res1)){
   if($row1[admin]==2){delFile($row1["url"]);}
   delFile("../upload/".$row1[userid]."/".$row1[probh]."/".$row1[bh].".jpg");
   deletetable("epzhu_provideo where id=".$row1[id]);
  }
 }
 break;	

}
echo "True";
?>