<?
 global $rowcontrol;
 $sj=date("Y-m-d H:i:s");
 $uip=$_SERVER["REMOTE_ADDR"];
 //��ʼִ�й���
 $carid=preg_split("/xcf/",$caridarr);
 for($i=0;$i<=count($carid);$i++){
 if($carid[$i]!=""){
  $sqlc="select * from epzhu_car where id=".$carid[$i];mysql_query("SET NAMES 'GBK'");$resc=mysql_query($sqlc);if($rowc=mysql_fetch_array($resc)){
  $sql="select * from epzhu_pro where bh='".$rowc[probh]."' and zt=0 and ifxj=0";mysql_query("SET NAMES 'GBK'");$res=mysql_query($sql);
  if($row=mysql_fetch_array($res)){
  /////////////////////////////////��ʼ��һ����
  $orderbh=time().$i.rnd_num(100);
  $allmoney=$rowc[money1]*$rowc[num]+$rowc[yunfei];
  $sqlu="select id,money1,email from epzhu_user where id=".$rowc[userid];mysql_query("SET NAMES 'GBK'");$resu=mysql_query($sqlu);if(!$rowu=mysql_fetch_array($resu)){exit;}
  if($rowu[money1]<$allmoney){exit;}
  intotable("epzhu_order","probh,sj,uip,selluserid,userid,money1,orderbh,num,tit,ddzt,tcv,buyform,tcid,fhxs,shdz,yunfei,liuyan","'".$row[bh]."','".$sj."','".$uip."',".$row[userid].",".$rowc[userid].",".$rowc[money1].",'".$orderbh."',".$rowc[num].",'".$row[tit]."','wait','".$rowc[tcv]."','".$rowc[buyform]."',".$rowc[tcid].",".$row[fhxs].",'".$rowc[shdz]."',".$rowc[yunfei].",'".$rowc[bz]."'");
  PointUpdateM($rowc[userid],$allmoney*(-1));
  PointIntoM($rowc[userid],"������Ʒ,����".$rowc[num],$allmoney*(-1));
  updatetable("epzhu_pro","xsnum=xsnum+".$rowc[num]." where id=".$row[id]);
  
  if(empty($rowc[tcid]) || empty($rowc[tcfhxs])){
  $kc=$row[kcnum]-$rowc[num];updatetable("epzhu_pro","kcnum=".$kc." where id=".$row[id]);
  //���ײͻ��ײ͸�����Ʒ�Զ�������ƷB
  if($row[fhxs]==2 || $row[fhxs]==3 || $row[fhxs]==4){
  updatetable("epzhu_order","fhsj='".$sj."',ddzt='db' where ddzt='wait' and orderbh='".$orderbh."'");
  $dbsj=$rowcontrol[dbsj];
  $sqldb="select * from epzhu_type where id=".$row[ty1id];mysql_query("SET NAMES 'GBK'");$resdb=mysql_query($sqldb);if($rowdb=mysql_fetch_array($resdb)){
  if(!empty($rowdb[dbsj])){$dbsj=$rowdb[dbsj];}
  }
  $oksj=date("Y-m-d H:i:s",strtotime("+".$dbsj." day"));
  $c_tit="�����Ѿ�������������뵣���׶Σ��ȴ����ȷ���ջ�";
  intotable("epzhu_db","money1,sj,selluserid,userid,dboksj,probh,tit,orderbh","".$allmoney.",'".$sj."',".$row[userid].",".$rowc[userid].",'".$oksj."','".$row[bh]."','".$c_tit."','".$orderbh."'");
   //����B
   if(4==$row[fhxs]){
	$sqla="select * from epzhu_kc where probh='".$row[bh]."' and ifok=0 and userid=".$row[userid]." order by id asc limit ".$rowc[num];mysql_query("SET NAMES 'GBK'");
	$resa=mysql_query($sqla);while($rowa=mysql_fetch_array($resa)){
	$txt=$txt."���ţ�".$rowa[ka]." ���룺".$rowa[mi]."<br>";
    updatetable("epzhu_kc","ifok=1,sj='".$sj."',uip='".$uip."',userid1=".$rowc[userid]." where id=".$rowa[id]);
	} 
   }
   //����E
  }
  //���ײͻ��ײ͸�����Ʒ�Զ�������ƷE
  }else{
  //���ײ��Զ�������ƷB
  updatetable("epzhu_taocan","kcnum=kcnum-".$rowc[num]." where id=".$rowc[tcid]);
  if(1!=$rowc[tcfhxs]){
  updatetable("epzhu_order","fhsj='".$sj."',ddzt='db' where ddzt='wait' and orderbh='".$orderbh."'");
  $dbsj=$rowcontrol[dbsj];
  $sqldb="select * from epzhu_type where id=".$row[ty1id];mysql_query("SET NAMES 'GBK'");$resdb=mysql_query($sqldb);if($rowdb=mysql_fetch_array($resdb)){
  if(!empty($rowdb[dbsj])){$dbsj=$rowdb[dbsj];}
  }
  $oksj=date("Y-m-d H:i:s",strtotime("+".$dbsj." day"));
  $c_tit="�����Ѿ�������������뵣���׶Σ��ȴ����ȷ���ջ�";
  intotable("epzhu_db","money1,sj,selluserid,userid,dboksj,probh,tit,orderbh","".$allmoney.",'".$sj."',".$row[userid].",".$rowc[userid].",'".$oksj."','".$row[bh]."','".$c_tit."','".$orderbh."'");
   //����B
   if(4==$rowc[tcfhxs]){
	$sqla="select * from epzhu_taocan_kc where probh='".$row[bh]."' and tcid=".$rowc[tcid]." and ifok=0 and userid=".$row[userid]." order by id asc limit ".$rowc[num];mysql_query("SET NAMES 'GBK'");
	$resa=mysql_query($sqla);while($rowa=mysql_fetch_array($resa)){
	$txt=$txt."���ţ�".$rowa[ka]." ���룺".$rowa[mi]."<br>";
    updatetable("epzhu_taocan_kc","ifok=1,sj='".$sj."',uip='".$uip."',userid1=".$rowc[userid]." where id=".$rowa[id]);
	} 
   }
   //����E
  }
  //���ײ��Զ�������ƷE
  }
  updatetable("epzhu_order","txt='".$txt."' where orderbh='".$orderbh."'");
  
  //д���ʼ�B
  $sqlm="select id,email,ifemail,ordertx2 from epzhu_user where id=".$row[userid];mysql_query("SET NAMES 'GBK'");$resm=mysql_query($sqlm);if(!$rowm=mysql_fetch_array($resm)){exit;}
  //��ʼȡ��Ʒ��Ϣ
  $goods=$row[tit];
  $money=$row[money2];
  $url=weburl."product/view".$row[id].".html";
  //��ʼȡ�����Ϣ
  $sqlmj="select uid,email,uqq,weixin from epzhu_user where id=".$rowc[userid];
  mysql_query("SET NAMES 'GBK'");
  $resmj=mysql_query($sqlmj);
  
  if(!$rowmj=mysql_fetch_array($resmj)){exit;}
  if(1==$rowm[ifemail] && !empty($rowm[email]) && empty($rowm[ordertx2])){
   $t="�ף����¶��������뾡���¼��վ������".weburl."<br>��Ʒ����:".$goods."<br>��Ʒ���ӣ�".$url."<br>��Ʒ�۸�".$money."<br>��Ʒ���أ�,���̵�ַ��".$row[wpurl]." �������룺".$row[wppwd]."<br>����˺ţ�".$rowmj[uid]."<br>�����ϵ��ʽ��<br>QQ��".$rowmj[uqq]."���䣺".$rowmj[email]."΢�ţ�".$rowmj[weixin]."";//��ʼ�޸��ʼ����ݣ��ϲ����磩
   
   $sqls="select * from epzhu_smsmail where admin=1 and tyid=1 and fa='".$rowm[email]."' and userid=".$rowu[id]."";mysql_query("SET NAMES 'GBK'");$ress=mysql_query($sqls);
   if(!$rows=mysql_fetch_array($ress)){
   intotable("epzhu_smsmail","admin,fa,tyid,userid,selluserid,txt,tit","1,'".$rowm[email]."',1,".$rowu[id].",".$rowm[id].",'".$t."','���Ķ�����Ϣ'");
   }
  }
  //д������
  $sql2="INSERT INTO `epzhu_propj` SET `probh`='".$rowc[probh]."',`selluserid`=".$rowm[id].",`userid`=".$rowu[id].",`sj`='".date('Y-m-d H:i:s',time())."',`uip`='127.0.0.1��������',`pf1`=5,`pf2`=5,`pf3`=5,`txt`='��δ����',`orderbh`='".$orderbh."',`pjlx`=1,`iftp`=0;";
  mysql_query($sql2); 
  //д���ʼ�E
  
  //д�����B
  $sqlm="select id,mot,ifmot,ordertx1 from epzhu_user where id=".$row[userid];mysql_query("SET NAMES 'GBK'");$resm=mysql_query($sqlm);if(!$rowm=mysql_fetch_array($resm)){exit;}
  if(1==$rowm[ifmot] && !empty($rowm[mot]) && empty($rowm[ordertx1])){
   $t="�ף����¶��������뾡���¼��վ������������ƷΪ��\${tit}";
   $sqls="select * from epzhu_smsmail where admin=2 and tyid=1 and fa='".$rowm[mot]."' and userid=".$rowu[id]."";mysql_query("SET NAMES 'GBK'");$ress=mysql_query($sqls);
   if(!$rows=mysql_fetch_array($ress)){
   $dt=sprintf("%.2f",$allmoney);
   intotable("epzhu_smsmail","admin,fa,tyid,userid,selluserid,txt,tit","2,'".$rowm[mot]."',1,".$rowu[id].",".$rowm[id].",'".$t."','".$dt."'");
   }
  }
  //д�����E

  deletetable("epzhu_car where id=".$rowc[id]);
  //////////////////////////////////������һ����
  }
 }	 
 }
 }
 //����ִ�й���
?>