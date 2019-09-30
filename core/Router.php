<?php

/**
 * @Description:
 * @author: gs.Yu
 * Date: 2019/9/29
 */

require_once __DIR__ . '/BaseObject.php';

class Router extends BaseObject
{
    const FILE_SUFFIX = '.php';
    const FILE_CONTROLLER = 'controller';
    public static $app;
    public $routers = [];

    public function __construct()
    {
        //get config rules
        $this->routers = self::$app->rules;
    }

    /**
     * @Description: Loader class
     * @author: gs.Yu
     * @date: 2019/9/29
     *
     * @param $uri
     * @return void
     */
    public function loader($uri)
    {
        $basePath = self::$app->basePath . '/';
        $modulesPath = self::$app->modules;
        $file = $uri[1];
        $action = '';
        $params = '';

        //uri in rules
        if (array_key_exists($file, $this->routers)) {
            $rules = explode('/', $this->routers[$file]);
            if (!empty($rules)) {
                $action = array_pop($rules);
                $file = implode('/',$rules);
            }
        }
        if (!empty($file)) {
            $fileName = $basePath . $modulesPath . $this->configureClass($file);
            if (file_exists($fileName)) {
                //require php file
                require $fileName;
                $class = pathinfo($fileName)['filename'];
                $object = new $class();
                //action
                if (isset($uri[2])) {
                    if (empty($action)) {
                        $action = $uri[2];
                    } else {
                        $params = $uri[2];
                    }
                }
                //parameter
                if (empty($params) && isset($uri[3])) {
                    $params = $uri[3];
                }
                //call object action with params
                if (!empty($action)) {
                    echo call_user_func_array(array($object, $action), array($params));
                }
                return;
            }
        }
        echo "ERROR：Page not found.";
        die();
    }

    /**
     * @Description: handle class file name
     * @author: gs.Yu
     * @date: 2019/9/30
     * @param $file
     * @return string
     */
    public function configureClass($file)
    {
        return $file . self::FILE_CONTROLLER . self::FILE_SUFFIX;
    }

}