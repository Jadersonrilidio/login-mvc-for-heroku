<?php

class Controller {

    public $data;

    public function __construct()
    {
        $this->data = array();
    }

    public function loadTemplate($view_name, $model_data=array())
    {
        $this->data = $model_data;
        require 'views/template.php';
    }

    public function loadViewOnTemplate($view_name, $model_data)
    {
        extract($model_data);
        require 'views/'.$view_name.'.php';
    }
}

?>