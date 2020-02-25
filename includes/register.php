<?php
require 'mysql.inc.php';
require 'config.inc.php';

$rec_errors = array();
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(preg_match('/^[A-Z\'.-]{2,45}$/i', $_POST['first_name'])){
        $fn = Escape_data($_POST['first_name'], $conn);
    }else{
        $rec_errors['first_name'] = 'Please enter your first name';
    }
    if(preg_match('/^[A-Z\'.-]{2,45}$/i', $_POST['last_name'])){
        $ln = Escape_data($_POST['last_name'], $conn);
    }else{
        $rec_errors['last_name'] = 'Please enter your last name';
    }
    if(filter_var($_POST['email_username'], FILTER_VALIDATE_EMAIL)){
        $eu = Escape_data($_POST['email_username'], $conn);
    }else{
        $rec_errors['email_username'] = 'Please enter a valid email address';
    }
    if(preg_match('/^(?=.*[0-9])(?=.*[A-Z]).{4,20}$/',$_POST['password'])){
        if($_POST['password'] === $_POST['validate_password']){
            $p =  $_POST['password'];
        }else{
            $rec_errors['password'] = 'Passwords do not match';
        }
    }
    if(empty($rec_errors)){
        $row = selectAllData($conn, $eu);
        $user_id = random_int(100000 , 999999);
        if($row === 0){
            $query_conn = "INSERT INTO `user_account` (`user_id`, `type`, `email`, `pass`, `first_name`, `last_name`, `subscribed`) VALUES ('$user_id', 'member', '$eu', '". password_hash($p, PASSWORD_BCRYPT)."', '$fn', '$ln', '0')";
            $r = mysqli_query($conn, $query_conn);
            if(mysqli_affected_rows($conn) === 1){
               echo '<head> 
                        <link rel="stylesheet" href="../css/style.css">
                    </head>';
                    include 'header.inc.php';
                    echo '<div class="alert alert_success"> <h1 class="header_primary"> Thankyou for registering, '.$fn.'! </h1>
                    <p> We have sent a confrimation email to your email address. </p>
                    <a href="login_form.php">Sign In</a>
                </div>';
                //$body = 'Thankyou'.$_POST['first_name'].'For Creating an account!';
                //mail($_POST['email_username'], 'Registration confirmation', $body, 'From: admin@example.com');
                exit();
            }else{
                echo'<div class="alert alert_danger"> We were unable to create your account due to a system error </div>';
            }
        }else{
            $rec_errors['email_username'] = 'Email already exists';
        }
    }
}

?>