<?php

require_once 'Connection.php';

class Home {

    private $pdo;
    public $message;

    public function __construct()
    {
        $this->pdo = Connection::connect();
    }

    public function login()
    {   
        if (isset($_POST['submit']))
        {
            $email = addslashes($_POST['email']);
            $password = addslashes($_POST['password']);
            
            if(!empty($email) && !empty($password))
            {
                $stmt = $this->pdo->prepare(
                    " SELECT id, username, email, password  
                        FROM users 
                       WHERE email = :email 
                         AND password = :password ");

                $stmt->execute(array(
                    ':email' => $email,
                    ':password' => $password));

                if ($stmt->rowCount() > 0) 
                {   
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    extract($row);

                    $_SESSION['id'] = $id;
                    $_SESSION['username'] = $username;
                    $_SESSION['email'] = $email;
                    $_SESSION['password'] = $password;

                    header('location: /projects/mvc/login-mvc/privateArea');
                }
                else
                {
                    $this->message = "<div class='msg-error'> Error: incorrect email or password! </div>";
                }
            }
            else 
            {
                $this->message = "<div class='msg-error'> Error: Complete all fields! </div>";
            }
        } 
    }

    public function logout()
    {   
        if (isset($_SESSION['id']) || isset($_SESSION['username']) || isset($_SESSION['email']) || isset($_SESSION['password']))
        {
            unset($_SESSION['id']);
            unset($_SESSION['username']);
            unset($_SESSION['email']);
            unset($_SESSION['password']);
            $this->message = "<div class='msg-success'> Success: user logged out! </div>";
        }
    }

}

?>