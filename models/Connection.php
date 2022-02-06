<?php

class Connection {

    private static $instance;

    private function __construct() {}

    public static function connect()
    {
        if (!isset(self::$instance))
        {
            $dbname = 'mvc_project';
            $port = '3306';
            $host = 'localhost';
            $user = 'root';
            $password = '';
            
            try {
                self::$instance = new PDO('mysql:host='.$host.';port='.$port.';dbname='.$dbname, $user, $password);
            } catch (Exception $e) {
                echo 'Error Message: '.$e->getMessage();
            }
        }
        return self::$instance;
    }
}

?>