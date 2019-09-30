<?php
/**
 * @Description:
 * @author: gs.Yu
 * Date: 2019/9/29
 */
require __DIR__ . '/../core/Controller.php';

class TestController extends Controller
{
    public function test($name)
    {
        if (isset($_GET['name'])) {
            var_dump($_GET['name']);
        }
//        var_dump($name);
        echo __CLASS__ . '/' . __FUNCTION__ . '/' . $name;
    }

    public function index()
    {
        echo 'index';
    }
}