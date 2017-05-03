<?php
namespace app\home\controller;
use think\Controller;
use think\Session;
use app\home\model\Look;
use app\home\model\Product;
//个人中心
class Personal extends Controller
{
    //我的订单
    public function myorder(){

        $uid=Session::get('uid');
        if(!isset($uid)||empty($uid)){
            $this->redirect('Login/login');

        }else{
            $phone= Session::get('account');
            $order=db('order')->where('phone',$phone)->select();
            return view('myorder',array('order'=>$order));
        }
    }

    public function  show(){
        $uid=Session::get('uid');
        if(!isset($uid)||empty($uid)){
            $this->redirect('Login/login');
        }else{
            return view('show');
        }

    }

    public function  course(){
        //现在找的是该用户学过的课程
        $uid=Session::get('uid');
        $look=new Look();
        $p=new Product();
        $arr=$look->join('product','`look`.`pid`=`product`.`id`')->where('`look`.uid',$uid)->select();
        $list=json_decode(json_encode($arr),true);
        foreach($list as $k=>$v){
            $list[$k]['man_desc']= mb_substr($v['man_desc'],0,3,'utf8')."...";
            $list[$k]['title']= mb_substr($v['title'],0,11,'utf8')."...";
            $list[$k]['desc']= mb_substr($v['desc'],0,11,'utf8')."...";

        }
        return view('course',['list'=>$list]);
    }
     //未支付去支付页面
    public function pay(){
        //接受数据
        $data= request()->get();

        //订单号
        $out_trade_no=$data['out_trade_no'];
        //科目
        $subject=$data['subject'];
        //金额
        $total_fee=$data['total_fee'];
        //商品展示地址
        $show_url=$data['show_url'];
        if(!empty($data)){
             $alipay_config['partner']       = '2088121321528708';
//收款支付宝账号
        $alipay_config['seller_email']  = 'itbing@sina.cn';
//安全检验码，以数字和字母组成的32位字符
        $alipay_config['key']           = '1cvr0ix35iyy7qbkgs3gwymeiqlgromm';
//↑↑↑↑↑↑↑↑↑↑请在这里配置您的基本信息↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑
//签名方式 不需修改
        $alipay_config['sign_type']    = strtoupper('MD5');
//字符编码格式 目前支持 gbk 或 utf-8
//$alipay_config['input_charset']= strtolower('utf-8');
//ca证书路径地址，用于curl中ssl校验
//请保证cacert.pem文件在当前文件夹目录中
//$alipay_config['cacert']    = getcwd().'\\cacert.pem';
//访问模式,根据自己的服务器是否支持ssl访问，若支持请选择https；若不支持请选择http
        $alipay_config['transport']    = 'http';
// ******************************************************配置 end*************************************************************************************************************************

// ******************************************************请求参数拼接 start*************************************************************************************************************************
        $parameter = array(
            "service" => "create_direct_pay_by_user",
            "partner" => $alipay_config['partner'], // 合作身份者id
            "seller_email" => $alipay_config['seller_email'], // 收款支付宝账号
            "payment_type"  => '1', // 支付类型
            "notify_url"    => "http://localhost/res.php", // 服务器异步通知页面路径
            "return_url"    => "http://120.24.79.110/weixin/public/index.php/home/league/notify", // 页面跳转同步通知页面路径
            "out_trade_no"  =>  $out_trade_no, // 商户网站订单系统中唯一订单号
            "subject"   =>  $subject, // 订单名称
            "total_fee" => $total_fee, // 付款金额
            "body"  => "1409phpB", // 订单描述 可选
            "show_url"  => $show_url, // 商品展示地址 可选
            "anti_phishing_key" => "", // 防钓鱼时间戳  若要使用请调用类文件submit中的query_timestamp函数
            "exter_invoke_ip"   => "", // 客户端的IP地址
            "_input_charset"    => 'utf-8', // 字符编码格式
        );
// 去除值为空的参数
        foreach ($parameter as $k => $v) {
            if (empty($v)) {
            unset($parameter[$k]);
            }
        }
// 参数排序
        ksort($parameter);
        reset($parameter);

// 拼接获得sign
        $str = "";
        foreach ($parameter as $k => $v) {
            if (empty($str)) {
                $str .= $k . "=" . $v;
            } else {
                $str .= "&" . $k . "=" . $v;
            }
        }
        $parameter['sign'] = md5($str . $alipay_config['key']); // 签名
        $parameter['sign_type'] = $alipay_config['sign_type'];
// ******************************************************请求参数拼接 end*************************************************************************************************************************


// ******************************************************模拟请求 start*************************************************************************************************************************
        $sHtml = "<form id='alipaysubmit' name='alipaysubmit' action='https://mapi.alipay.com/gateway.do?_input_charset=utf-8' method='get'>";
        foreach ($parameter as $k => $v) {
            $sHtml.= "<input type='hidden' name='" . $k . "' value='" . $v . "'/>";
        }

        $sHtml .= '<input type="submit" value="确认支付" style="width:100px;height:40px;background:orangered;color:white;align:center;">';

//$sHtml = $sHtml."<script>document.forms['alipaysubmit'].submit();</script>";

// ******************************************************模拟请求 end*************************************************************************************************************************
//var_dump($sHtml);
        echo $sHtml;

    }else{
         echo "<script>alert('支付数据传输失败');history.go(-1)</script>";
      }
     }  


}