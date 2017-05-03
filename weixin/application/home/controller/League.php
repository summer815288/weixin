<?php
namespace app\home\controller;
use think\View;
use think\Controller;
use think\Session;
//近期课程
class League
{
     public function show(){

         $id=$_GET['id'];
         //根据id进行查询
         $course=db('course')->where(['c_id'=>$id])->find();
        //查找表里边的省
         $pro=db('region')->where(['parent_id'=>1])->select();
         $city=db('region')->where(['parent_id'=>37])->select();

         $view = new View();
         return $view->fetch('show',array('course'=>$course,'pro'=>$pro,'city'=>$city));
     }

    public function  region(){
        //接搜值，进行查找
        $parent_id=$_GET['id'];
        $city=db('region')->where(['parent_id'=>$parent_id])->select();
        echo json_encode($city);

    }

    public function lists(){
        //现在展示的是所有的课程
        $category=db('category')->select();
        return view('lists',['category'=>$category]);

    }

    //注册页面
    public function actionlog(){
        $data= request()->post();
        $c_id=$data['c_id'];
        $name=$data['name'];
        $phone=$data['mobile'];
        foreach ($data as $value)
        {
            if($value=="")
            {
                echo "不能有空值";
                exit();
            }
        }
       // print_r($data);die;
       $re=db('client')->insert($data);
       if($re){
           //储存session的id
           Session::set('c_id',$c_id);
           //储存session的名称
           Session::set('name',$name);
           //储存手机号
           Session::set('phone',$phone);
          echo 0;
         }else{
            echo 1;
         }


    }
    //支付页面
    public function payment(){
       $c_id= Session::get('c_id');
        //用户名
        $name=Session::get('name');
        //手机号
        $phone=Session::get('phone');
       // print_r($name);die;
        if(empty($c_id)){
            echo "请先去选课";
        }else{
            //根据课程id查询课程
            $category=db('category')->where(['id'=>$c_id])->find();
            //根据课程c_id
            $course=db('course')->where('c_id',$c_id)->find();
           // print_r($category);die;
            $out_trade_no=date('Ymd').rand(10000000,99999999);
            $view=new View();
            return $view->fetch('payment',array('out_trade_no'=>$out_trade_no,'category'=>$category,'name'=>$name,'phone'=>$phone,'course'=>$course));
        }
      // print_r($c_id);die;
        //随机生成唯一订单号

    }
    //微信支付
    public function nativepay(){
        $view=new View();
        return $view->fetch('nativepay');
    }
    //支付宝支付
    public function alipay(){
        //接受数据
        $data= request()->post();
        //订单号
        $out_trade_no=$data['out_trade_no'];
        //科目
        $subject=$data['subject'];
        //金额
        $total_fee=$data['total_fee'];
        $show_url=$data['show_url'];
        $return_url=$data['return_url'];
        $pay_body=$data['pay_body'];
        $name=$data['name'];
        //手机号
        $phone=$data['phone'];
        //时间
        $time=date("Y-m-d H:i;s",time());
        //数量
        $num=1;
        //订单入库
        $data1=array('out_trade_no'=>$out_trade_no,
            'subject'=>$subject,'total_fee'=>$total_fee,'show_url'=>$show_url,'name'=>$name,'time'=>$time,'num'=>$num,'phone'=>$phone);
        $re=db('order')->insert($data1);
        if($re){
            $alipay_config['partner']		= '2088121321528708';
//收款支付宝账号
            $alipay_config['seller_email']	= 'itbing@sina.cn';
//安全检验码，以数字和字母组成的32位字符
            $alipay_config['key']			= '1cvr0ix35iyy7qbkgs3gwymeiqlgromm';
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
                "payment_type"	=> '1', // 支付类型
                "notify_url"	=> "http://120.24.79.110/weixin/public/index.php/home/league/notify", // 服务器异步通知页面路径
                "return_url"	=> $return_url, // 页面跳转同步通知页面路径
                "out_trade_no"	=> $out_trade_no, // 商户网站订单系统中唯一订单号//2017041296635437//14277411312108812
                "subject"	=>  $subject, // 订单名称
                "total_fee"	=>  $total_fee, // 付款金额
                "body"	=>  $pay_body, // 订单描述 可选
                "show_url"	=> $show_url, // 商品展示地址 可选
                "anti_phishing_key"	=> "", // 防钓鱼时间戳  若要使用请调用类文件submit中的query_timestamp函数
                "exter_invoke_ip"	=> "", // 客户端的IP地址
                "_input_charset"	=> 'utf-8', // 字符编码格式
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
            $parameter['sign'] = md5($str . $alipay_config['key']);	// 签名
            $parameter['sign_type'] = $alipay_config['sign_type'];
// ******************************************************请求参数拼接 end*************************************************************************************************************************


// ******************************************************模拟请求 start*************************************************************************************************************************
            $sHtml = "<form id='alipaysubmit' name='alipaysubmit' action='https://mapi.alipay.com/gateway.do?_input_charset=utf-8' method='get'>";
            foreach ($parameter as $k => $v) {
                $sHtml.= "<input type='hidden' name='" . $k . "' value='" . $v . "'/>";
            }

            $sHtml .= '<center><input type="submit" value="去支付" style="width:200px;height:100px;font-size:30px;background:orangered;color:white;cursor: "></center>';

//$sHtml = $sHtml."<script>document.forms['alipaysubmit'].submit();</script>";

// ******************************************************模拟请求 end*************************************************************************************************************************
//var_dump($sHtml);
            echo $sHtml;

        }else{
            echo "订单入库失败";
        }
        }
        //回调地址
        public function notify(){
        	$data=$_GET;
            print_r($data);die;
           // print_r($data);die;
        	if(!empty($data)){
        		$out_trade_no=$data['out_trade_no'];
        	$state=1;
        	$data1=array(
                   'state'=>$state,
        		);
            //修改支付状态
        	$re=db('order')->where('out_trade_no',$out_trade_no)->update($data1);
              if($re){
                  echo "success";
                  //根据支付订单查询
                 echo "<script>alert('请用支付的手机号设置下密码');window.location='http://120.24.79.110/weixin/public/index.php/home/login/index'</script>";
              }else{
                echo "success";
                echo "<script>alert('修改支付状态失败');window.location='http://120.24.79.110/weixin/public/index.php/home/login/index'</script>";
              }
		    			
        	}else{
        		echo "error";
        	}
        					
            
        }


}