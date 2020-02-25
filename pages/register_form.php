<?php 
      require '../includes/register.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Velvet Beach</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/style.css">
    <!-- add description meta tag when the project is complete -->
    <link href="https://fonts.googleapis.com/css?family=Cinzel|Montserrat&display=swap" rel="stylesheet"> 
  </head>
  <body>
    <header>
        <?php include '../includes/header.inc.php'?>
    </header>
    <?php require_once '../includes/form_function.inc.php';?>
    <form class="form-container" method="POST">
    <h1 class="header_primary"> Create Account </h1>
      <?php
        create_form_input('first_name', 'text','First Name',$rec_errors);
        create_form_input('last_name', 'text', 'Last Name',$rec_errors);
        create_form_input('email_username', 'email', 'Email',$rec_errors);
        create_form_input('password', 'password', 'Password',$rec_errors);
        create_form_input('validate_password', 'password','Re-enter Password',$rec_errors);
        create_form_input('submit', 'submit', 'Submit');
      ?>
    </form>

  </body>
</html>