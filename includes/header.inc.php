
 <!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title><?php if(isset($page_title)){
      echo $page_title;
    }else{
      echo 'Velvet Beach';
    }
    ?>
    </title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/style.css">
</head>
  <body>
      <header>
          <nav class="mobile-nav">
            <img src="../image-content/logo-high.svg" alt = "Velvet Beach Clothing logo" class="logo_mobile">
            <!-- wishlist -->
            <img src="../image-content/heart.svg" alt = "Wishlist" class="icon_wishlist">
            <!-- basket -->
            <img src="../image-content/shopping-basket.svg" alt = "Shopping Basket" class="icon_basket">
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
              <img src="../image-content/new-arrival-1.jpg" class="nav-menu_image--0"/>
              <img src="../image-content/men-nav-1.jpg" class="nav-menu_image--1"/>
              <img src="../image-content/women-nav-1.jpg" class="nav-menu_image--2"/>
              <img src="../image-content/kid-nav-1.jpg" class="nav-menu_image--3"/>
              <!-- acount navigation -->
              <?php
              if(isset($_SESSION['admin_user'])){
                echo'<h1 class="header_primary underlined-grid"> My account </h1>';
                echo '<li class="nav-list nav-account-list">';
                    $pages = array(
                      'Create Page' => 'logout.inc.php',
                      'Add Product' => '../',
                      'Statistics' => '',
                      'Home' =>  '../index.php',
                    );
                    foreach($pages as $key => $value){
                      echo '<a href="'. $value .'"> '. $key . '</a>
                    </li>';
                  }
                }else{
                  echo'<h1 class="header_primary underlined-grid"> My account </h1>';
                  echo '<li class="nav-list nav-account-list">';
                    if(isset($_SESSION['user_id'])){
                      $pages = array(
                        'Logout' => 'logout.inc.php',
                        'Wishlist' => '',
                        'My orders' => '',
                        'Home' =>  '../index.php',
                      );
                    }else{
                      $pages = array(
                        'Sign In' => '../pages/login_form.php',
                        'Home' => '../index.php',                      
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
                      'Contact Us' => 'contact_form.php',
                      'Careers' => 'career_pg.php',
                      'Useful Information' => 'information_pg.php',
                  );
                  $this_page = basename($_SERVER['PHP_SELF']);
                  foreach($pages as $key => $value){
                  echo '<a href="'. $value .'"> '. $key . ' </a>';
                }
              ?>
              </li>
              <!--find us icons -->
              <h1 class="header_primary underlined-grid--3"> Find Us </h1>
              <img src="../image-content/facebook.svg"class="nav-menu_icon--0">
              <img src="../image-content/twitter.svg"class="nav-menu_icon--1">
              <img src="../image-content/instagram.svg"class="nav-menu_icon--2">
              <img src="../image-content/linkedin.svg"class="nav-menu_icon--3">
            <div>
          </nav>
     </header>
  </body>
</html>
          
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