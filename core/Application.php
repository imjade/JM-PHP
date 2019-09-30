<?php
/**
 * @Description:
 * @author: gs.Yu
 * Date: 2019/9/29
 */
require __DIR__ . '/Router.php';

class Application extends BaseObject
{
    const INDEX_PHP = 'web/index.php';
    public function __construct($config = [])
    {
        Router::$app = $this;
        parent::__construct($config);
    }

    /**
     * @Description: Loader class/action with parameter
     * @author: gs.Yu
     * @date: 2019/9/29
     *
     * @throws Exception
     */
    public function run()
    {
        (new Router())->loader(self::uri());
    }

    /**
     * @Description: Get request uri to file path
     * @author: gs.Yu
     * @date: 2019/9/29
     *
     * @return string
     */
    public static function uri()
    {
        return explode('/',parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH));
    }
}