<?php
session_start();
//deal with errors, depending on if site is live or not.
if(!defined('LIVE')){
    DEFINE('LIVE', false);
}
DEFINE('CONTACT_EMAIL', 'abby.crimlis@outlook.com');
define('BASE_URI', 'C:\xampp\htdocs\velvet_beach\.');
define('MYSQL', BASE_URI . 'mysql.inc.php' );

function error_handler($e_number, $e_message, $e_file, $e_line, $e_vars){
    $message = "An error has occured in script file '$e_file' on line '$e_line: \n$e_message\n'";
    $message .= "<pre>" . print_r(debug_backtrace(), 1). "</pre>\n";
    if(!LIVE){
        echo '<div class="alert alert-danger">'. nl2br($message).'</div>';
    }else{
        error_log($message, 1 , CONTACT_EMAIL, 'From: error_control@admin.com');
        if($e_number != E_NOTICE){
            echo '<div class="alert alert-danger"> A system error has occured. We aplogize for the inconvenience.</div>';
        }
    }
    return  true;
}
set_error_handler('error_handler');
//redirect user if session is expired.
function redirect_invalid_user($check = 'user_id', $destination = 'index.php', $protocol = 'http://'){
    if(!headers_sent()){
        if(!isset($_SESSION[$check])){
            $url = $protocol . BASE_URI . $destination;
            header('Location: C:\xampp\htdocs\velvet_beach\.');
            exit();        
        }
    } else{
        include_once('./includes/header.html');
        trigger_error('You do not have permission to access this page, please login and try again');
    }
    
}


?>