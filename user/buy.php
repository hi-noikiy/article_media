<?
 global $rowcontrol;
 $sj=date("Y-m-d H:i:s");
 $uip=$_SERVER["REMOTE_ADDR"];
 //开始执行购买
 $carid=preg_split("/xcf/",$caridarr);
 for($i=0;$i<=count($carid);$i++){
 if($carid[$i]!=""){
  $sqlc="select * from epzhu_car where id=".$carid[$i];mysql_query("SET NAMES 'GBK'");$resc=mysql_query($sqlc);if($rowc=mysql_fetch_array($resc)){
  $sql="select * from epzhu_pro where bh='".$rowc[probh]."' and zt=0 and ifxj=0";mysql_query("SET NAMES 'GBK'");$res=mysql_query($sql);
  if($row=mysql_fetch_array($res)){
  /////////////////////////////////开始逐一购买
  $orderbh=time().$i.rnd_num(100);
  $allmoney=$rowc[money1]*$rowc[num]+$rowc[yunfei];
  $sqlu="select id,money1,email from epzhu_user where id=".$rowc[userid];mysql_query("SET NAMES 'GBK'");$resu=mysql_query($sqlu);if(!$rowu=mysql_fetch_array($resu)){exit;}
  if($rowu[money1]<$allmoney){exit;}
  intotable("epzhu_order","probh,sj,uip,selluserid,userid,money1,orderbh,num,tit,ddzt,tcv,buyform,tcid,fhxs,shdz,yunfei,liuyan","'".$row[bh]."','".$sj."','".$uip."',".$row[userid].",".$rowc[userid].",".$rowc[money1].",'".$orderbh."',".$rowc[num].",'".$row[tit]."','wait','".$rowc[tcv]."','".$rowc[buyform]."',".$rowc[tcid].",".$row[fhxs].",'".$rowc[shdz]."',".$rowc[yunfei].",'".$rowc[bz]."'");
  PointUpdateM($rowc[userid],$allmoney*(-1));
  PointIntoM($rowc[userid],"购买商品,数量".$rowc[num],$allmoney*(-1));
  updatetable("epzhu_pro","xsnum=xsnum+".$rowc[num]." where id=".$row[id]);
  
  if(empty($rowc[tcid]) || empty($rowc[tcfhxs])){
  $kc=$row[kcnum]-$rowc[num];updatetable("epzhu_pro","kcnum=".$kc." where id=".$row[id]);
  //无套餐或套餐跟随商品自动发货商品B
  if($row[fhxs]==2 || $row[fhxs]==3 || $row[fhxs]==4){
  updatetable("epzhu_order","fhsj='".$sj."',ddzt='db' where ddzt='wait' and orderbh='".$orderbh."'");
  $dbsj=$rowcontrol[dbsj];
  $sqldb="select * from epzhu_type where id=".$row[ty1id];mysql_query("SET NAMES 'GBK'");$resdb=mysql_query($sqldb);if($rowdb=mysql_fetch_array($resdb)){
  if(!empty($rowdb[dbsj])){$dbsj=$rowdb[dbsj];}
  }
  $oksj=date("Y-m-d H:i:s",strtotime("+".$dbsj." day"));
  $c_tit="卖家已经发货，款项进入担保阶段，等待买家确认收货";
  intotable("epzhu_db","money1,sj,selluserid,userid,dboksj,probh,tit,orderbh","".$allmoney.",'".$sj."',".$row[userid].",".$rowc[userid].",'".$oksj."','".$row[bh]."','".$c_tit."','".$orderbh."'");
   //卡密B
   if(4==$row[fhxs]){
	$sqla="select * from epzhu_kc where probh='".$row[bh]."' and ifok=0 and userid=".$row[userid]." order by id asc limit ".$rowc[num];mysql_query("SET NAMES 'GBK'");
	$resa=mysql_query($sqla);while($rowa=mysql_fetch_array($resa)){
	$txt=$txt."卡号：".$rowa[ka]." 密码：".$rowa[mi]."<br>";
    updatetable("epzhu_kc","ifok=1,sj='".$sj."',uip='".$uip."',userid1=".$rowc[userid]." where id=".$rowa[id]);
	} 
   }
   //卡密E
  }
  //无套餐或套餐跟随商品自动发货商品E
  }else{
  //有套餐自动发货商品B
  updatetable("epzhu_taocan","kcnum=kcnum-".$rowc[num]." where id=".$rowc[tcid]);
  if(1!=$rowc[tcfhxs]){
  updatetable("epzhu_order","fhsj='".$sj."',ddzt='db' where ddzt='wait' and orderbh='".$orderbh."'");
  $dbsj=$rowcontrol[dbsj];
  $sqldb="select * from epzhu_type where id=".$row[ty1id];mysql_query("SET NAMES 'GBK'");$resdb=mysql_query($sqldb);if($rowdb=mysql_fetch_array($resdb)){
  if(!empty($rowdb[dbsj])){$dbsj=$rowdb[dbsj];}
  }
  $oksj=date("Y-m-d H:i:s",strtotime("+".$dbsj." day"));
  $c_tit="卖家已经发货，款项进入担保阶段，等待买家确认收货";
  intotable("epzhu_db","money1,sj,selluserid,userid,dboksj,probh,tit,orderbh","".$allmoney.",'".$sj."',".$row[userid].",".$rowc[userid].",'".$oksj."','".$row[bh]."','".$c_tit."','".$orderbh."'");
   //卡密B
   if(4==$rowc[tcfhxs]){
	$sqla="select * from epzhu_taocan_kc where probh='".$row[bh]."' and tcid=".$rowc[tcid]." and ifok=0 and userid=".$row[userid]." order by id asc limit ".$rowc[num];mysql_query("SET NAMES 'GBK'");
	$resa=mysql_query($sqla);while($rowa=mysql_fetch_array($resa)){
	$txt=$txt."卡号：".$rowa[ka]." 密码：".$rowa[mi]."<br>";
    updatetable("epzhu_taocan_kc","ifok=1,sj='".$sj."',uip='".$uip."',userid1=".$rowc[userid]." where id=".$rowa[id]);
	} 
   }
   //卡密E
  }
  //有套餐自动发货商品E
  }
  updatetable("epzhu_order","txt='".$txt."' where orderbh='".$orderbh."'");
  
  //写入邮件B
  $sqlm="select id,email,ifemail,ordertx2 from epzhu_user where id=".$row[userid];mysql_query("SET NAMES 'GBK'");$resm=mysql_query($sqlm);if(!$rowm=mysql_fetch_array($resm)){exit;}
  //开始取商品信息
  $goods=$row[tit];
  $money=$row[money2];
  $url=weburl."product/view".$row[id].".html";
  //开始取买家信息
  $sqlmj="select uid,email,uqq,weixin from epzhu_user where id=".$rowc[userid];
  mysql_query("SET NAMES 'GBK'");
  $resmj=mysql_query($sqlmj);
  
  if(!$rowmj=mysql_fetch_array($resmj)){exit;}
  if(1==$rowm[ifemail] && !empty($rowm[email]) && empty($rowm[ordertx2])){
   $t="亲，有新订单啦！请尽快登录网站发货，".weburl."<br>商品名称:".$goods."<br>商品链接：".$url."<br>商品价格：".$money."<br>商品下载：,网盘地址：".$row[wpurl]." 网盘密码：".$row[wppwd]."<br>买家账号：".$rowmj[uid]."<br>买家联系方式：<br>QQ：".$rowmj[uqq]."邮箱：".$rowmj[email]."微信：".$rowmj[weixin]."";//开始修改邮件内容（老财网络）
   
   $sqls="select * from epzhu_smsmail where admin=1 and tyid=1 and fa='".$rowm[email]."' and userid=".$rowu[id]."";mysql_query("SET NAMES 'GBK'");$ress=mysql_query($sqls);
   if(!$rows=mysql_fetch_array($ress)){
   intotable("epzhu_smsmail","admin,fa,tyid,userid,selluserid,txt,tit","1,'".$rowm[email]."',1,".$rowu[id].",".$rowm[id].",'".$t."','您的订单信息'");
   }
  }
  //写入评价
  $sql2="INSERT INTO `epzhu_propj` SET `probh`='".$rowc[probh]."',`selluserid`=".$rowm[id].",`userid`=".$rowu[id].",`sj`='".date('Y-m-d H:i:s',time())."',`uip`='127.0.0.1（本机）',`pf1`=5,`pf2`=5,`pf3`=5,`txt`='暂未评价',`orderbh`='".$orderbh."',`pjlx`=1,`iftp`=0;";
  mysql_query($sql2); 
  //写入邮件E
  
  //写入短信B
  $sqlm="select id,mot,ifmot,ordertx1 from epzhu_user where id=".$row[userid];mysql_query("SET NAMES 'GBK'");$resm=mysql_query($sqlm);if(!$rowm=mysql_fetch_array($resm)){exit;}
  if(1==$rowm[ifmot] && !empty($rowm[mot]) && empty($rowm[ordertx1])){
   $t="亲，有新订单啦！请尽快登录网站发货，购买商品为：\${tit}";
   $sqls="select * from epzhu_smsmail where admin=2 and tyid=1 and fa='".$rowm[mot]."' and userid=".$rowu[id]."";mysql_query("SET NAMES 'GBK'");$ress=mysql_query($sqls);
   if(!$rows=mysql_fetch_array($ress)){
   $dt=sprintf("%.2f",$allmoney);
   intotable("epzhu_smsmail","admin,fa,tyid,userid,selluserid,txt,tit","2,'".$rowm[mot]."',1,".$rowu[id].",".$rowm[id].",'".$t."','".$dt."'");
   }
  }
  //写入短信E

  deletetable("epzhu_car where id=".$rowc[id]);
  //////////////////////////////////结束逐一购买
  }
 }	 
 }
 }
 //结束执行购买
?>