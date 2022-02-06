<?php

class Core {

    public function __construct()
    {
        $this->run();
    }

    public function run()
    {
        if (isset($_GET['url'])) $url = $_GET['url'];

        $controller = 'homeController';
        $method = 'index';
        $parameters = array();

        if (!empty($url)) 
        {
            $url = explode('/', $url);
            $controller = array_shift($url).'Controller';
            $method = !empty($url) ? array_shift($url) : 'index';
            $parameters = !empty($url) ? $url : array();
        }

        $global_path = 'controllers/'.$controller.'.php';

        if (!file_exists($global_path) || !method_exists($controller, $method)) 
        {
            $controller = 'homeController';
            $method = 'index';
        }

        $c = new $controller;
        call_user_func_array(array($c, $method), $parameters);
    }
}

?>