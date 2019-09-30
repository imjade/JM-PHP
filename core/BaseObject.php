<?php
/**
 * @Description:
 * @author: gs.Yu
 * Date: 2019/9/29
 */


class BaseObject
{
    public function __construct($config)
    {
        if (!empty($config)) {
            self::configure($this, $config);
        }
        $this->init();
    }

    /**
     * @Description: init
     * @author: gs.Yu
     * @date: 2019/9/29
     *
     */
    public function init()
    {

    }

    /**
     * @Description: Configure an object with array
     * @author: gs.Yu
     * @date: 2019/9/29
     * @param $object
     * @param $properties
     * @return mixed
     */
    public static function configure($object, $properties)
    {
        foreach ($properties as $name => $value) {
            $object->$name = $value;
        }
        return $object;
    }
}