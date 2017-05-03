<?php
namespace app\home\controller;
use think\Controller;
use think\Loader;
use think\Request;
use app\home\model\User;
use think\Session;

class Login extends Controller
{

    //注册页面
    public function index()
    {
        /*验证数据*/
        //随机生成短信验证码
        function random($length = 6 , $numeric = 0) {
            PHP_VERSION < '4.2.0' && mt_srand((double)microtime() * 1000000);
            if($numeric) {
                $hash = sprintf('%0'.$length.'d', mt_rand(0, pow(10, $length) - 1));
            } else {
                $hash = '';
                $chars = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789abcdefghjkmnpqrstuvwxyz';
                $max = strlen($chars) - 1;
                for($i = 0; $i < $length; $i++) {
                    $hash .= $chars[mt_rand(0, $max)];
                }
            }
            return $hash;
        }
        Session::set('send_code',random(6,1));
        $code=Session::get('send_code');
        //随机生成短信验证码
        return view('index',['code'=>$code]);
    }
    //注册页面处理
    public function register()
    {
        session_start();
        /*验证数据*/
        $account = Request::instance()->post('mobile');
        $pwd = Request::instance()->post('pwd');
        $r_phone = "/^1[3,5,8]\d{9}$/";
        if (!preg_match($r_phone, $account)) {
            echo "<script>alert('手机号格式错误');history.go(-1)</script>";die;
        }
        $r_password = "/^\w{6,}$/";
        if (!preg_match($r_password, $pwd)) {
            echo "<script>alert('密码格式错误');history.go(-1)</script>";die;
        }
        if($_POST) {
            if ($_POST['mobile'] != $_SESSION['mobile'] or $_POST['mobile_code'] != $_SESSION['mobile_code'] or empty($_POST['mobile']) or empty($_POST['mobile_code'])) {
                echo "<script>alert('手机验证失败');history.go(-1)</script>";die;

            }else{
                $_SESSION['mobile'] = '';
                $_SESSION['mobile_code'] = '';
                //验证是否是post请求
                if (!request()->port()) {
                    echo "<script>alert('请求方式错误');history.go(-1)</script>";

                } else {
                    //判断用户是否注册过
                    $user = new User();
                    $data = json_decode(json_encode($user->where('account', $account)->find()), true);
                    if ($data) {
                        echo "<script>alert('该用户已存在');history.go(-1)</script>";
                    } else {
                        //添加用户
                        $sql="insert into user(account,pwd) value(:account,:pwd)";
                        $result = $user->execute($sql,['account'=>$account,'pwd'=>md5($pwd)]);
                        if ($result) {
                            Session::set('uid', $user->getLastInsID());
                            Session::set('account', $account);
                            $this->redirect('Index/index',302);
                        } else {
                            echo "<script>alert('注册失败');history.go(-1)</script>";

                        }
                    }
                }
            }
        }
    }


    //登录页面
    public function login(){
            return view('login');
    }

    //验证登录页面
    public function login_pro()
    {
        $account = addslashes(Request::instance()->post('account'));
        $pwd = addslashes(Request::instance()->post('pwd'));
        $code = addslashes(Request::instance()->post('code'));
        $r_phone = "/^1[3,5,8]\d{9}$/";
        if (!preg_match($r_phone, $account)) {
            echo "<script>alert('手机号格式错误');history.go(-1)</script>";die;
        }
        $r_password = "/^\w{6,}$/";
        if (!preg_match($r_password, $pwd)) {
            echo "<script>alert('密码格式错误');history.go(-1)</script>";die;
        }
            if (!captcha_check($code)) {
                echo "<script>alert('验证码错误');history.go(-1)</script>";die;

            } else {
                $user = new User();
                $usrs=$user->where("account=:account and pwd=:pwd",['account'=>$account,'pwd'=>md5($pwd)])->find();
                $data = json_decode(json_encode($usrs), true);
                if ($data) {
                    Session::set('uid',$data['id']);
                    Session::set('account',$data['account']);
                    $this->redirect('Index/index');

                } else {
                    echo "<script>alert('登陆失败');history.go(-1)</script>";

                }
            }
    }
    public function login_out(){
        if(empty(Session::get('account'))&&empty(Session::get('uid'))){
            echo "<script>alert('请先登陆');window.location='login'</script>";
        }else{
            Session::delete('account');
            Session::delete('uid');
            if(empty(Session::get('account'))&&empty(Session::get('uid'))){
                echo "<script>alert('退出成功');window.location='login'</script>";
            }
        }
    }







    //短息接口
    public function sms(){
        //开启SESSION
        session_start();

        header("Content-type:text/html; charset=UTF-8");

//请求数据到短信接口，检查环境是否 开启 curl init。
        function Post($curlPost,$url){
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_HEADER, false);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_NOBODY, true);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $curlPost);
            $return_str = curl_exec($curl);
            curl_close($curl);
            return $return_str;
        }

//将 xml数据转换为数组格式。
        function xml_to_array($xml){
            $reg = "/<(\w+)[^>]*>([\\x00-\\xFF]*)<\\/\\1>/";
            if(preg_match_all($reg, $xml, $matches)){
                $count = count($matches[0]);
                for($i = 0; $i < $count; $i++){
                    $subxml= $matches[2][$i];
                    $key = $matches[1][$i];
                    if(preg_match( $reg, $subxml )){
                        $arr[$key] = xml_to_array( $subxml );
                    }else{
                        $arr[$key] = $subxml;
                    }
                }
            }
            return $arr;
        }

//random() 函数返回随机整数。
        function random($length = 6 , $numeric = 0) {
            PHP_VERSION < '4.2.0' && mt_srand((double)microtime() * 1000000);
            if($numeric) {
                $hash = sprintf('%0'.$length.'d', mt_rand(0, pow(10, $length) - 1));
            } else {
                $hash = '';
                $chars = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789abcdefghjkmnpqrstuvwxyz';
                $max = strlen($chars) - 1;
                for($i = 0; $i < $length; $i++) {
                    $hash .= $chars[mt_rand(0, $max)];
                }
            }
            return $hash;
        }
//短信接口地址
        $target = "http://106.ihuyi.cn/webservice/sms.php?method=Submit";
//获取手机号
        $mobile = $_POST['mobile'];
//获取验证码
        $send_code = $_POST['send_code'];
//生成的随机数
        $mobile_code = random(4,1);
        if(empty($mobile)){
            exit('手机号码不能为空');
        }
//防用户恶意请求
//        if(empty($_SESSION['send_code']) or $send_code!=$_SESSION['send_code']){
//            exit('请求超时，请刷新页面后重试');
//        }

        $post_data = "account=C35340371&password=86975488e10776b896289305d203cd1b&mobile=".$mobile."&content=".rawurlencode("您的验证码是：".$mobile_code."。请不要把验证码泄露给其他人。");
//用户名请登录用户中心->验证码、通知短信->帐户及签名设置->APIID
//查看密码请登录用户中心->验证码、通知短信->帐户及签名设置->APIKEY
        $gets =  xml_to_array(Post($post_data, $target));
        if($gets['SubmitResult']['code']==2){
            $_SESSION['mobile'] = $mobile;
            $_SESSION['mobile_code'] = $mobile_code;
        }
        echo $gets['SubmitResult']['msg'];
    }



}
