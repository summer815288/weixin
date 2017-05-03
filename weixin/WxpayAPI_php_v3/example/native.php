<?php
ini_set('date.timezone','Asia/Shanghai');
//error_reporting(E_ERROR);
require_once "../lib/WxPay.Api.php";
require_once "WxPay.NativePay.php";
require_once 'log.php';
$data=$_POST;
//print_r($data);die;
unset($data['return_url'],$data['pay_body']);
$cols = array();
$vals = array();
//循环遍历数组
foreach($data as $key=>$val){
    $cols[]=$key;
    $vals[]="'".addslashes($val)."'";
}
//print_r($cols);die;
$sql  = "INSERT INTO `order` (";
$sql .= implode(",",$cols).") VALUES (";
$sql .= implode(",",$vals).")";
//print_r($sql);die;
$url = "mysql:host=localhost;dbname=weixin";
$user = "root";
$pwd = "bch1996.8.18";
$conn = new PDO($url,$user,$pwd);
$conn->query("set names utf8");
$res=$conn->exec($sql);
//print_r($res);die;
//查询
/*$sql="select * from `order` where id=1";*/
//print_r($sql);die;
/*$res=$conn->query($sql)->fetch(PDO::FETCH_ASSOC);*/
//print_r($arr);die;
//订单号
$out_trade_no=$data['out_trade_no'];
//科目
$subject=$data['subject'];
//价格
$total_fee=$data['total_fee']*100;
//print_r($out_trade_no);die;
//
if($res){
    //模式一
    /**
     * 流程：
     * 1、组装包含支付信息的url，生成二维码
     * 2、用户扫描二维码，进行支付
     * 3、确定支付之后，微信服务器会回调预先配置的回调地址，在【微信开放平台-微信支付-支付配置】中进行配置
     * 4、在接到回调通知之后，用户进行统一下单支付，并返回支付信息以完成支付（见：native_notify.php）
     * 5、支付完成之后，微信服务器会通知支付成功
     * 6、在支付成功通知中需要查单确认是否真正支付成功（见：notify.php）
     */
    $notify = new NativePay();
    $url1 = $notify->GetPrePayUrl("123456789");
//模式二
    /**
     * 流程：
     * 1、调用统一下单，取得code_url，生成二维码
     * 2、用户扫描二维码，进行支付
     * 3、支付完成之后，微信服务器会通知支付成功
     * 4、在支付成功通知中需要查单确认是否真正支付成功（见：notify.php）
     */
    $input = new WxPayUnifiedOrder();
    $input->SetBody("$subject");//商品描述
    $input->SetAttach("test");//附加数据
//$input->SetOut_trade_no(WxPayConfig::MCHID.date("YmdHis"));//商户订单号
    $input->SetOut_trade_no($out_trade_no);
    $input->SetTotal_fee("$total_fee");//标价金额
    $input->SetTime_start(date("YmdHis"));//交易起始时间
    $input->SetTime_expire(date("YmdHis", time() + 600));//交易结束时间
    $input->SetGoods_tag("test");//商品标记
    $input->SetNotify_url("http://120.24.79.110/weixin/WxpayAPI_php_v3/example/notify.php");//通知地址
    $input->SetTrade_type("NATIVE");//交易类型
    $input->SetProduct_id("123456789");//商品ID
    $result = $notify->GetPayUrl($input);
//print_r($result);die;
    $url2 = $result["code_url"];//二维码链接
}else{
    echo "下单失败";
}

?>
<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>微信支付</title>
</head>
<body>
	<div style="margin-left: 10px;color:#556B2F;font-size:30px;font-weight: bolder;">扫描支付</div><br/>
	<img alt="扫码支付" src="http://paysdk.weixin.qq.com/example/qrcode.php?data=<?php echo urlencode($url2);?>" style="width:150px;height:150px;"/>

</body>
</html>