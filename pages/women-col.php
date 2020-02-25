<?php
include '../includes/config.inc.php';
include '../includes/mysql.inc.php';
?>
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
    <?php include '../includes/header.inc.php'; ?>
  </header>
    <section class="collection collection_light grid_collection">
          <a href="#" class="arrow arrow--left"> &larr; </a>
          <div class="collection_image--0">
           <img src="../image-content/women-col-s-0.jpg" alt="Women collection event dress">
           <button class="button button_overlay hvr-hang">Winter </button>
          </div>
          <div class="collection_image--1">
           <img src="../image-content/women-col-1.jpg" alt="Women collection event dress">
           <button class="button button_overlay hvr-hang">Summer </button>
          </div>
          <div class="collection_image--2">
           <img src="../image-content/women-col-s-2.jpg" alt="Women collection event dress">
           <button class="button button_overlay hvr-hang">Spring </button>
          </div>
          <a href="#" class="arrow arrow--right"> &rarr; </a>
          <h2 class="header_primary--sub"> Shop by season </h2>
      </section>
      <!-- MENS COLLECTION -->
      <section class="collection collection_dark grid_collection">
          <a href="#" class="arrow arrow--left"> &larr; </a>
          <div class="collection_image--0">
           <img src="../image-content/women-col-c-0.jpg" alt="Women collection event dress">
           <button class="button button_overlay hvr-hang">Tops</button>
          </div>
          <div class="collection_image--1">
           <img src="../image-content/women-col-c-1.jpg" alt="Women collection event dress">
           <button class="button button_overlay hvr-hang">Trousers</button>
          </div>
          <div class="collection_image--2">
           <img src="../image-content/women-col-c-2.jpg" alt="Women collection event dress">
           <button class="button button_overlay hvr-hang">Jacket</button>
          </div>
          <a href="#" class="arrow arrow--right"> &rarr; </a>
          <h2 class="header_primary--sub"> Shop by Category </h2>
      </section>
      <!-- KIDS COLLECTION -->
      <section class="collection collection_light grid_collection">
          <a href="#" class="arrow arrow--left"> &larr; </a>
          <div class="collection_image--0">
           <img src="../image-content/women-acc-0.jpg" alt="Women collection event dress">
           <button class="button button_overlay hvr-hang">Bags</button>
          </div>
          <div class="collection_image--1">
           <img src="../image-content/women-acc-1.jpg" alt="Women collection event dress">
           <button class="button button_overlay hvr-hang">Headwear</button>
          </div>
          <div class="collection_image--2">
           <img src="../image-content/women-acc-2.jpg" alt="Women collection event dress">
           <button class="button button_overlay hvr-hang">Jewelerry</button>
          </div>
          <a href="#" class="arrow arrow--right"> &rarr; </a>
          <h2 class="header_primary--sub"> Shop by Accessories </h2>
      </section>
      <footer>
        <div class="logo">
           <img src="../image-content/logo-high.svg" alt="velvet beach logo" class="footer--logo"> 
        </div>
      </footer>

    
    </div>



</body>
</html>