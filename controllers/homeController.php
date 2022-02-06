<?php

class homeController extends Controller {
    
    public function index() 
    {   
        $this->loadTemplate('home');
    }

    public function login()
    {   
        $login = new Home();
        $login->login();
        $model_data = array('message' => $login->message);
        $this->loadTemplate('home', $model_data);
    }

    public function logout()
    {
        $logout = new Home();
        $logout->logout();
        $model_data = array('message' => $logout->message);
        $this->loadTemplate('home', $model_data);
    }
}

?>