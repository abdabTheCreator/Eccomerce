<?php 
  if($_SERVER['REQUEST_METHOD'] === 'POST'){
    include 'includes/login.inc.php';
  }else{
    require 'includes/config.inc.php';
  }

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Velvet Beach</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
    <!-- add description meta tag when the project is complete -->
    <link href="https://fonts.googleapis.com/css?family=Cinzel|Montserrat&display=swap" rel="stylesheet"> 
  </head>
  <body>
    <div class="container">
      <!-- top bar for mobile -->
      <header class="header">
          <nav class="mobile-nav">
            <img src="image-content/logo-high.svg" alt = "Velvet Beach Clothing logo" class="logo_mobile">
            <!-- wishlist -->
            <img src="image-content/heart.svg" alt = "Wishlist" class="icon_wishlist">
            <!-- basket -->
            <img src="image-content/shopping-basket.svg" alt = "Shopping Basket" class="icon_basket">
            <span class="mobile-nav_open">
                <a href="#">Nav </a>
            </span>
            <!-- drop down menu -->
            <div class="nav-menu">
              <span class="close"><a href="#"> X </a></span>
              <div class="nav-menu_search">
                <p class="u-margin-left-SML">Search...</p>
              </div>
              <!-- image links -->
              <img src="image-content/new-arrival-1.jpg" class="nav-menu_image--0"/>
              <img src="image-content/men-nav-1.jpg" class="nav-menu_image--1"/>
              <img src="image-content/women-nav-1.jpg" class="nav-menu_image--2"/>
              <img src="image-content/kid-nav-1.jpg" class="nav-menu_image--3"/>
              <!-- acount navigation -->
              <?php
              if(isset($_SESSION['admin_user'])){
                  echo '<h1 class="header_primary underlined-grid"> Admin Links </h1>';
                  $pages = array(
                    'Create Page' => 'includes/admin/create_pg.php',
                    'Add Product' => 'includes/admin/add_product.php'

                  );
                  foreach($pages as $key => $value){
                    echo'<li class="nav-list">
                      <a href="'. $value .'"> '. $key . '</a>
                      </li>';
                  }
                }else{
                  echo'<h1 class="header_primary underlined-grid"> My account </h1>';
                  echo '<li class="nav-list nav-account-list">';
                    if(isset($_SESSION['user_id'])){
                      $pages = array(
                        'Logout' => 'includes/logout.php',
                        'Wishlist' => 'includes/wishlist.php',
                        'My orders' => 'includes/user_account_pg.php',
                        'Home' => 'index.php',
                      );
                    }else{
                      $pages = array(
                        'Sign In' => 'pages/login_form.php',
                        'Home' => 'index.php',                      
                    );
                  }
                  
                  $this_page = basename($_SERVER['PHP_SELF']);
                  foreach($pages as $key => $value){
                    echo '<a href="'. $value .'"> '. $key . ' </a>';
                  }
                  
                }
              ?>
                <a href="#"> Change Currency <span style="color:#5e451b;">&nbsp;GBP</span></a>
              </li>
              <!-- help navigation -->
              
              <h1 class="header_primary underlined-grid--2"> Help </h1>
              <li class="nav-list nav-help-list">
                <?php
                  $pages = array(
                      'Contact Us' => 'includes/contact_form.php',
                      'Careers' => 'includes/career_pg.php',
                      'Useful Information' => 'includes/information_pg.php',
                  );
                  $this_page = basename($_SERVER['PHP_SELF']);
                  foreach($pages as $key => $value){
                  echo '<a href="'. $value .'"> '. $key . ' </a>';
                }
              ?>
              </li>
              <!--find us icons -->
              <h1 class="header_primary underlined-grid--3"> Find Us </h1>
              <img src="image-content/facebook.svg"class="nav-menu_icon--0">
              <img src="image-content/twitter.svg"class="nav-menu_icon--1">
              <img src="image-content/instagram.svg"class="nav-menu_icon--2">
              <img src="image-content/linkedin.svg"class="nav-menu_icon--3">
            <div>
          </nav>
          <img src="image-content/image0.jpg" alt="Childrens clothing" class="header_image--0">
          <img src="image-content/image1.jpg" alt="Womens clothing" class="header_image--1">
          <img src="image-content/image2.jpeg" alt="Mens clothing" class="header_image--2">
          <h1 class="header_special"> New Arrivals &rarr; </h1>
      </header>
      <!-- WOMENS COLLECTION -->
      <section class="collection collection_light grid_collection">
          <a href="#" class="arrow arrow--left"> &larr; </a>
          <img src="image-content/women-col-0.jpg" alt="Women collection event dress" class="collection_image--0">
          <img src="image-content/women-col-1.jpg" alt="Women collection swimwear" class="collection_image--1">
          <img src="image-content/women-col-2.jpg" alt="Women collection vintage" class="collection_image--2">
          <a href="#" class="arrow arrow--right"> &rarr; </a>
          <h2 class="header_primary--grid"> Womens Collection </h2>
          <div class="button_main--grid hvr-hang">
            <a href="pages/women-col.php" class="button_main--link">Shop Now </a>
          <div>
      </section>
      <!-- MENS COLLECTION -->
      <section class="collection collection_dark grid_collection">
          <a href="#" class="arrow arrow--left"> &larr; </a>
          <img src="image-content/men-col-0.jpg" alt="Mens collection vintage" class="collection_image--0">
          <img src="image-content/men-col-1.jpeg" alt="Women collection fashion" class="collection_image--1">
          <img src="image-content/men-col-2.jpg" alt="Women collection adidas" class="collection_image--2">
          <a href="#" class="arrow arrow--right"> &rarr; </a>
          <h2 class="header_primary--grid"> Mens Collection </h2>
          <div class="button_main--grid">
            <a href="#" class="button_main--link">Shop Now </a>
          <div>
      </section>
      <!-- KIDS COLLECTION -->
      <section class="collection collection_light grid_collection">
          <a href="#" class="arrow arrow--left"> &larr; </a>
          <img src="image-content/kid-col-0.jpg" alt="kids collection" class="collection_image--0">
          <img src="image-content/kid-col-1.jpg" alt="kids collection" class="collection_image--1">
          <img src="image-content/kid-col-2.jpg" alt="kids collection" class="collection_image--2">
          <a href="#" class="arrow arrow--right"> &rarr; </a>
          <h2 class="header_primary--grid"> Kids collection </h2>
          <div class="button_main--grid">
            <a href="#" class="button_main--link">Shop Now </a>
          <div>
      </section>
      <footer>
        <div class="logo">
           <img src="image-content/logo-high.svg" alt="velvet beach logo" class="footer--logo"> 
        </div>
      </footer>

    
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script>
    $(function(){
      $('.mobile-nav_open').click(function(){
        $('.nav-menu').css('visibility', 'visible');
      });
      $('.close').click(function(){
        $('.nav-menu').css('visibility', 'hidden');

      })

    });

  </script>



  </body>
</html>