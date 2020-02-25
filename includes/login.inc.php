<?php 
require 'mysql.inc.php';
require 'config.inc.php';

$login_errors = array();

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(filter_var($_POST['email_username'], FILTER_VALIDATE_EMAIL)){
        $eu = Escape_data($_POST['email_username'], $conn);
    }else{
        $login_errors['email_username'] = 'Please enter a valid email';
    }
    if(!empty($_POST['password'])){
        $p = $_POST['password'];
    }else{
        $login_errors['password'] = 'Please enter your password';
    }
    if(empty($login_errors)){
        $row = selectAllData($conn, $eu);
        if($row != 0){
            if(password_verify($p, $row['pass'])){
                if($row['type'] === 'admin'){
                    session_regenerate_id(true);
                    $_SESSION['admin_user'] = true;
                }
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['user_email'] = $row['email'];
                header('Location: ../index.php');
            }else{
                $login_errors['password'] = 'fix yo code';
            } 
        }else{
            $login_errors['password'] = 'Email address and password do not match any account';
        }
    }
}

?>