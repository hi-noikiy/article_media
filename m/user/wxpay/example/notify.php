<?
include("../../../../config/conn.php");
include("../../../../config/function.php");
$wxpay=preg_split("/,/",$rowcontrol[wxpay]);
function curl_post_https($url,$data){ // ģ���ύ���ݺ���
    $curl = curl_init(); // ����һ��CURL�Ự
    curl_setopt($curl, CURLOPT_URL, $url); // Ҫ���ʵĵ�ַ
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0); // ����֤֤����Դ�ļ��
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 1); // ��֤���м��SSL�����㷨�Ƿ����
    curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']); // ģ���û�ʹ�õ������
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1); // ʹ���Զ���ת
    curl_setopt($curl, CURLOPT_AUTOREFERER, 1); // �Զ�����Referer
    curl_setopt($curl, CURLOPT_POST, 1); // ����һ�������Post����
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data); // Post�ύ�����ݰ�
    curl_setopt($curl, CURLOPT_TIMEOUT, 30); // ���ó�ʱ���Ʒ�ֹ��ѭ��
    curl_setopt($curl, CURLOPT_HEADER, 0); // ��ʾ���ص�Header��������
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); // ��ȡ����Ϣ���ļ�������ʽ����
    $tmpInfo = curl_exec($curl); // ִ�в���
    if (curl_errno($curl)) {
        echo 'Errno'.curl_error($curl);//��ץ�쳣
    }
    curl_close($curl); // �ر�CURL�Ự
    return $tmpInfo; // �������ݣ�json��ʽ
}

$xmlObj = simplexml_load_string(file_get_contents("php://input"));
//$xmlObj = simplexml_load_string($GLOBALS['HTTP_RAW_POST_DATA']); //�����ص�����  
$appid = $xmlObj->appid;//΢��appid
$mch_id = $xmlObj->mch_id;  //�̻���
$nonce_str = $xmlObj->nonce_str;//����ַ���
$sign = $xmlObj->sign;//ǩ��
$result_code = $xmlObj->result_code;//ҵ����
$openid = $xmlObj->openid;//�û���ʶ
$is_subscribe = $xmlObj->is_subscribe;//�Ƿ��ע�����ʺ�
$trace_type = $xmlObj->trade_type;//�������ͣ�JSAPI,NATIVE,APP
$bank_type = $xmlObj->bank_type;//�������У��������Ͳ����ַ������͵����б�ʶ��
$total_fee = $xmlObj->total_fee;//�����ܽ���λΪ��
$fee_type = $xmlObj->fee_type;//�������ͣ�����ISO4217�ı�׼��λ��ĸ���룬Ĭ��Ϊ����ң�CNY��
$transaction_id = $xmlObj->transaction_id;//΢��֧��������
$out_trade_no = $xmlObj->out_trade_no;//�̻�������
$attach = $xmlObj->attach;//�̼����ݰ���ԭ������
$time_end = $xmlObj->time_end;//֧�����ʱ��
$cash_fee = $xmlObj->cash_fee;
$return_code = $xmlObj->return_code;
if(!empty($_SESSION["SHOPUSER"])){
php_toheader("../../wxresult.php?a=pay");
}

    if($return_code =="SUCCESS"){
//���û�������������ݶ����ţ�out_trade_no�����̻���վ�Ķ���ϵͳ�в鵽�ñʶ�������ϸ����ִ���̻���ҵ�����
//����ǩ����֤B
$signA ="appid=$appid&mch_id=$mch_id&nonce_str=$nonce_str&transaction_id=$transaction_id";
$strSignTmp = $signA."&key=".$wxpay[2]; //ƴ���ַ���  ע��˳��΢���и�������ַ ˳���������� ֱ�ӵ������У������ ��������XML  �Ƿ���ȷ
$sign = strtoupper(MD5($strSignTmp)); // MD5 ��ת���ɴ�д
$post_data = "<xml>
                        <appid>$appid</appid>
                        <mch_id>$mch_id</mch_id>
                        <nonce_str>$nonce_str</nonce_str>
                        <transaction_id>$transaction_id</transaction_id>
                        <sign>$sign</sign>
                    </xml>";//ƴ�ӳ�XML ��ʽ
$url = "https://api.mch.weixin.qq.com/pay/orderquery";//΢�Ŵ��ε�ַ
$dataxml = curl_post_https($url,$post_data); //��̨POST΢�Ŵ��ε�ַ  ͬʱȡ��΢�ŷ��صĲ���    POST ������д������
$objectxml = (array)simplexml_load_string($dataxml, 'SimpleXMLElement', LIBXML_NOCDATA); //��΢�ŷ��ص�XML ת��������
//����ǩ����֤E
if($objectxml["trade_state"]=="SUCCESS"){
 //�Լ��߼�����B
 $sql="select * from epzhu_dingdang where ddbh='".$out_trade_no."' and ifok=0";mysql_query("SET NAMES 'gbk'");$res=mysql_query($sql);
 if($row=mysql_fetch_array($res)){
  if(1==$row[ifok]){echo "success";exit;}
  $sj=date("Y-m-d H:i:s");
  $uip=$_SERVER["REMOTE_ADDR"];
  updatetable("epzhu_dingdang","sj='".$sj."',uip='".$uip."',alipayzt='TRADE_SUCCESS',ddzt='���׳ɹ�',ifok=1 where id=".$row[id]);
  $money1=$row[money1];
  PointIntoM($row[userid],"΢�ų�ֵ".$money1."Ԫ",$money1);
  PointUpdateM($row[userid],$money1);
  echo "success";exit;
 }
 //�Լ��߼�����E
}
            echo success;     
         }


?>