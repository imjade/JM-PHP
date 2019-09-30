<?php
/**
 * @Description:
 * @author: gs.Yu
 * Date: 2019/9/30
 */
require __DIR__ . '/../core/Controller.php';

class HomeController extends Controller
{
    public function home()
    {
        $host = Router::$app->db['HOSTNAME'];
        $username = Router::$app->db['USERNAME'];
        $password = Router::$app->db['PASSWORD'];
        $database = Router::$app->db['DATABASE'];
        try{
            $conn = mysqli_connect($host, $username, $password);
            // 检测连接
            if (!$conn) {
                die("Connection failed: " . iconv('gbk', 'utf-8', mysqli_connect_error()));
            }
            mysqli_select_db( $conn, $database);
            mysqli_set_charset($conn,'utf8');
            echo "连接成功";

        }catch (Exception $e){        //捕获异常
            echo $e->getMessage();    //打印异常信息
        }
    }
}