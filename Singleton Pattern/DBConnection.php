<?php
/**
 * Created by Anonymous
 * Date: 2/5/20
 * Time: 12:11 am
 */

class DBConnection {
    private function __construct(){
        echo "new object created\n";
    }

    public static function getDBInstance()
    {
        static $instance = null;
        if($instance == null) {
            $instance = new static();
        }
        else{
            echo "we are using the same object\n";
        }
        return $instance;
    }
}