<?php

class registerController extends Controller {
    
    public function index() 
    {   
        $this->loadTemplate('register');
    }

    public function register()
    {   
        $register = new Register();
        $register->register();

        $model_data = array('message' => $register->message);

        $this->loadTemplate('register', $model_data);
    }

}

?>