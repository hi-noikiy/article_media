<?
include("../config/conn.php");
include("../config/function.php");

if(intval($_GET[admin])==1){  //Դ������
zwzr();
if(empty($rowcontrol[sermode])){$k=base_encode(sqlzhuru($_POST[topt]));}
elseif($rowcontrol[sermode]==2){$k=urlencode(sqlzhuru($_POST[topt]));}
else{$k=sqlzhuru($_POST[topt]);}
php_toheader("../product/search_s".$k."v.html");

}elseif(intval($_GET[admin])==2){  //��ʾ��������
zwzr();
if(empty($rowcontrol[sermode])){$k=base_encode(sqlzhuru($_POST[topt]));}
elseif($rowcontrol[sermode]==2){$k=urlencode(sqlzhuru($_POST[topt]));}
else{$k=sqlzhuru($_POST[topt]);}
php_toheader("../productkf/search_s".$k."v.html");


}elseif(intval($_GET[admin])==3){  //��ʾ��Ѷ����
zwzr();
if(empty($rowcontrol[sermode])){$k=base_encode(sqlzhuru($_POST[topt]));}
elseif($rowcontrol[sermode]==2){$k=urlencode(sqlzhuru($_POST[topt]));}
else{$k=sqlzhuru($_POST[topt]);}
php_toheader("../news/newslist_s".$k."v.html");

}elseif(intval($_GET[admin])==4){  //��ʾ��Ʒ��ҳ����
zwzr();
if(empty($rowcontrol[sermode])){$k=base_encode(sqlzhuru($_POST[ink1]));}
elseif($rowcontrol[sermode]==2){$k=urlencode(sqlzhuru($_POST[ink1]));}
else{$k=sqlzhuru($_POST[ink1]);}
php_toheader("../product/search_s".$k."v".$_GET[getv].".html");

}elseif(intval($_GET[admin])==5){  //����������
zwzr();
if(empty($rowcontrol[sermode])){$k=base_encode(sqlzhuru($_POST[t1]));}
elseif($rowcontrol[sermode]==2){$k=urlencode(sqlzhuru($_POST[t1]));}
else{$k=sqlzhuru($_POST[t1]);}
php_toheader("../shop/prolist_i".$_GET[id]."v_s".$k."v".$_GET[getv].".html");

}else{
php_toheader("../");
}
?>