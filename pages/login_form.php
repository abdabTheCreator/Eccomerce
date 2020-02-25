<?php
    require '../includes/login.inc.php'
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
    <?php 
        if(!isset($login_errors)){
            $login_errors = array();
        }
     require_once '../includes/form_function.inc.php';
    ?>
    <form class="form-container"  method="POST">
    <h1 class="header_primary"> Login </h1>
      <?php
        create_form_input('email_username', 'email', 'Email',$login_errors);
        create_form_input('password', 'password', 'Password',$login_errors);
        create_form_input('submit', 'submit', 'Submit');
      ?>
      <a href="register_form.php">Register </a>
      <span toggle="#password-field" class="fa fa-fw fa-eye field_icon toggle-password">Show/Hide</span>

    </form>

  </body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script>
    $(".toggle-password").click(function() {
    $(this).toggleClass("fa-eye fa-eye-slash");
    var input = $("password");
    if (input.attr("type") === "password") {
      input.attr("type", "text");
    } else {
      input.attr("type", "password");
    }
  });
  </script>
</html>