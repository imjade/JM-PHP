<?php
/**
 * @Description:
 * @author: gs.Yu
 * Date: 2019/9/29
 */
$config = require __DIR__ . "/../configs/config.php";
require __DIR__ . "/../core/Application.php";


(new Application($config))->run();
