<?php

require_once 'Connection.php';

class Register {

    private $pdo;
    public $message;

    public function __construct()
    {
        $this->pdo = Connection::connect();
    }

    public function register()
    {   
        if (isset($_POST['submit']))
        {
            $username = addslashes($_POST['username']);
            $email = addslashes($_POST['email']);
            $password = addslashes($_POST['password']);
            $rpt_password = addslashes($_POST['rpt_password']);

            if(!empty($username) && !empty($email) && !empty($password) && !empty($rpt_password))
            {
                if ($password === $rpt_password)
                {   
                    $stmt1 = $this->pdo->prepare(
                        " SELECT email FROM users WHERE email = :email ");
                    
                    $stmt1->execute(array(
                        ':email' => $email));

                    if ($stmt1->rowCount() == 0)
                    {
                        $stmt2 = $this->pdo->prepare(
                            " INSERT INTO users (username,email,password)  
                               VALUES (:username,:email,:password) ");
    
                        $result = $stmt2->execute(array(
                            ':username' => $username,
                            ':email' => $email,
                            ':password' => $password));
                        
                        if ($result)
                        {
                            $this->message = "<div class='msg-success'> Success: user registered! </div>";
                        }
                        else
                        {
                            $this->message = "<div class='msg-error'> Error: user not registered! </div>";
                        }
                    }
                    else
                    {
                        $this->message = "<div class='msg-error'> Error: email already registered! </div>";
                    }

                }
                else
                {
                    $this->message = "<div class='msg-error'> Error: Passwords not matched! </div>";                 
                }
            }
            else 
            {
                $this->message = "<div class='msg-error'> Error: Complete all fields! </div>"; 
            }
        } 
    }

}

?>