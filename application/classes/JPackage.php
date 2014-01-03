<?php
/**
 * @author: freefcw
 * Date: 1/3/14
 * Time: 5:11 PM
 */

class JPackage {

    public $code    = 0;
    public $message = '';
    public $result  = NULL;

    public function tojson()
    {
        return json_encode($this);
    }
}