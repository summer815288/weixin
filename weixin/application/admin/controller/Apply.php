<?php
namespace app\admin\controller;
use think\Controller;
use think\Request;
use think\Url;
header("content-Type: textml; charset=utf-8");
//后台课程分类
class Apply extends Controller{
    public function index(){
        return view('index');
    }
    //备份数据库
    public function apply(){

        if(empty(Request::instance()->post('database_name'))){
            echo "<script>alert('请填写数据库名称');history.back()</script>";die;
        }
        $host="localhost";
        $user="root";//数据库账号
        $password="bch1996.8.18";//数据库密码
        $dbname=Request::instance()->post('database_name');//数据库名称 //这里的账号、密码、名称都是从页面传过来的
        $pdo=new \PDO("mysql:host=$host;dbname=$dbname",$user,$password);
        if(!$pdo)//连接mysql数据库
        {
            echo "<script>alert('数据库连接失败，请核对后再试');history.back()</script>";die;
        }
        $pdo->exec("set names 'utf8'");
        $mysql="set charset utf8;\r\n";
        $q1=$pdo->query("show tables");//获取数据库的表名
        while($t=$q1->fetch())
        {

            $table=$t[0];
            $q2=$pdo->query("show create table `$table`");
            $sql=$q2->fetch();
            $mysql.=$sql['Create Table'].";\r\n";
            $q3=$pdo->query("select*from `$table`");
            while($data=$q3->fetch(\PDO::FETCH_ASSOC))
            {
                $keys=array_keys($data);
                $keys=array_map('addslashes',$keys);
                $keys=join('`,`',$keys);
                $keys="`".$keys."`";
                $vals=array_values($data);
                $vals=array_map('addslashes',$vals);
                $vals=join("','",$vals);
               $vals="'".$vals."'";
                $mysql.="insert into `$table`($keys) values($vals);\r\n";
            }
        }

        $filename=ROOT_PATH."public/database/daochu/".$dbname.".sql";//存放路径，默认存放到项目最外层
        $fp=fopen($filename,'w');
        fputs($fp,$mysql);
        fclose($fp);

        header('content-type:application/octet-stream');
        header("content-disposition:attachment;filename=$dbname.sql");
        readfile($filename);
    }



    public function apply_list(){
        return view('apply_list');
    }


    //导入数据库
    public function apply_enter(){
        //接受文件，数据库名称
        $name=$_FILES['database_sql']['name'];
        $db_name=substr($_FILES['database_sql']['name'],0,strpos($_FILES['database_sql']['name'],'.'));
        //将文件存在某个地方
        move_uploaded_file($_FILES['database_sql']['tmp_name'],ROOT_PATH.'public/database/daoru/'.$name);

        $host="localhost"; //主机名
        $user="root"; //MYSQL用户名
        $password="bch1996.8.18"; //密码
        $dbname=Request::instance()->post('database_name'); //在此指定您要恢复的数据库名，不存在则必须先创建,请自已修改数据库名
        $mysql_file=ROOT_PATH.'public/database/daoru/'.$db_name.'.sql'; //指定要恢复的MySQL备份文件路径,请自已修改此路径
        $this->restore($mysql_file,$host,$dbname,$user,$password); //执行MySQL恢复命令
    }
    function restore($fname,$host,$dbname,$user,$password)
    {
        $pdo=new \PDO("mysql:host=$host;dbname=$dbname",$user,$password);
        if (file_exists($fname)) {
            $sql_value="";
            $cg=0;
            $sb=0;
            $sqls=file($fname);
            foreach($sqls as $sql)
            {
                $sql_value.=$sql;
            }
            $a=explode(";\r\n", $sql_value); //根据";\r\n"条件对数据库中分条执行
            $total=count($a);

            $pdo->query("set names 'utf8'");
            for ($i=0;$i<$total;$i++)
            {
                $pdo->query("set names 'utf8'");
                //执行命令
                if($pdo->query($a[$i]))
                {
                    $cg+=1;
                }
                else
                {
                    $sb+=1;
                    $sb_command[$sb]=$a[$i];
                }
            }
            echo "操作完毕，共处理 $total 条命令，成功 $cg 条，失败 $sb 条";
            //显示错误信息
            if ($sb>0)
            {
                echo "<hr><br><br>失败命令如下：<br>";
                for ($ii=1;$ii<=$sb;$ii++)
                {
                    echo "<p><b>第 ".$ii." 条命令（内容如下）：</b><br>".$sb_command[$ii]."</p><br>";
                }
            }  //-----------------------------------------------------------
        }else{
            echo "MySQL备份文件不存在，请检查文件路径是否正确！";
        }
    }
}