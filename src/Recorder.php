<?php
/* PHP SDK
 * @version 2.0.0
 * @author connect@qq.com
 * @copyright © 2013, Tencent Corporation. All rights reserved.
 */

namespace hafly\qqconnect;

class Recorder
{
    private static mixed $data;

    public function __construct()
    {
        if (empty($_SESSION['QC_userData'])) {
            self::$data = array();
        }
        else {
            self::$data = $_SESSION['QC_userData'];
        }
    }

    public function write($name, $value)
    {
        self::$data[$name] = $value;
    }

    public function read($name)
    {
        if (empty(self::$data[$name])) {
            return null;
        }
        else {
            return self::$data[$name];
        }
    }

    public function delete($name)
    {
        unset(self::$data[$name]);
    }

    function __destruct()
    {
        $_SESSION['QC_userData'] = self::$data;
    }
}
