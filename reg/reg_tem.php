<?
 if($WAPLJ==1){$wapljv="../";}
 if(panduan("uid","epzhu_user where uid='".$uid."'")==1){Audit_alert("���ʺ��Ѿ���ע�ᣬ�����޸��ʺ�","reg.php");}
 //if(panduan("nc","epzhu_user where nc='".$nc."'")==1){Audit_alert("���ǳ��ѱ�ʹ�ã������޸��ǳ�","reg.php");}
 if(strlen($uid)<4 || strlen($uid)>20 || !preg_match("/^[_a-zA-Z0-9]*$/",$uid)){Audit_alert("��Ա�ʺŸ�ʽ����","reg.php");}

 $shopzt=0;if($rowcontrol["ifsell"]=="on"){$shopzt=2;}
 if(empty($_COOKIE['tjuserid'])){$tu=0;}else{$tu=$_COOKIE['tjuserid'];}
 $ifmot=returnjgdw($ifmot,"",0);
 if(empty($openid)){$ifqq=0;}else{$ifqq=1;}
 $sqli="insert into epzhu_user(uid,pwd,sj,uip,baomoney,money1,jf,nc,mot,ifmot,email,ifemail,uqq,yxsj,openid,ifqq,djl,pm,zt,openshop,shopzt,zfmm,sellmall,sellmyue,tjuserid,sellbl,sfzrz,wxopenid)values('".$uid."','".sha1($pwd)."','".$sj."','".$uip."',0,0,0,'".$nc."','".$mot."',".$ifmot.",'".$email."',0,'".$uqq."','2014-10-15','".$openid."',".$ifqq.",0,0,1,0,".$shopzt.",'".sha1($pwd)."',0,0,".$tu.",".$rowcontrol[sellbl].",3,'".$wxopenid."')";
 mysql_query("SET NAMES 'GBK'");mysql_query($sqli,$conn);
 $id=mysql_insert_id($conn);
 if(!empty($rowcontrol[regmoney]) && $rowcontrol[regmoney]>0){PointIntoM($id,"ע���Ա���ͽ��",$rowcontrol[regmoney]);PointUpdateM($id,$rowcontrol[regmoney]);}
 if(!empty($rowcontrol[regjf]) && $rowcontrol[regjf]>0){PointInto($id,"ע���Ա���ͻ���",$rowcontrol[regjf]);PointUpdate($id,$rowcontrol[regjf]);}
 createDir($wapljv."../upload/".$id."/");
 $_SESSION["SHOPUSER"]=$uid;
 intotable("epzhu_loginlog","admin,userid,sj,uip","1,".$id.",'".$sj."','".$uip."'");
?>