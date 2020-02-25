<?php
require '../includes/config.inc.php';
include '../includes/mysql.inc.php';

$add_product_errors = array();
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(isset($_POST['category']) || !filter_var($_POST['category'],FILTER_VALIDATE_INT, array('min_range' => 1))){
        $category = $_POST['category'];
    }
    if(empty($_POST['product_price']) || !filter_var($_POST['product_price'], FILTER_VALIDATE_FLOAT) || ($_POST['product_price'] <= 0)){
        $add_product_errors['price'] = 'Please enter a price for the product';
    }
    if(empty($_POST['stock_level']) || !filter_var($_POST['stock_level'], FILTER_VALIDATE_INT, array('min_range' => 0))){
        $add_product_errors['stock'] = 'Please enter stock quantity';
    }
    if(empty($_POST['product_name'])){
        $add_product_errors['product_name'] = 'Name can not be empty';
    }
    if(empty($_POST['description'])){
        $add_product_errors['description'] = 'Please enter a description that best describes the product';
    }
    //check if there is a image wihtin the file input
    if($_FILES['image']['name'] != "" ){
        $targetDir = "../../uploads/";
        $id = uniqid($prefix="IMG__");
        $fileType = strtolower(pathinfo(basename($_FILES['image']['name']),PATHINFO_EXTENSION));
        $targetFile = $targetDir . $id . "." . $fileType;
        $getSize = getimagesize($_FILES['image']['tmp_name']);
        if($getSize ){
            $uploadOk = 1;
        }else{
            $add_product_errors['image'] = 'File is not of image format';
        }
        if($_FILES['image']['size'] > 8000000){
            $add_product_errors['image'] = 'File is too large';
        }
        if($fileType != 'jpeg' && $fileType != 'jpg' && $fileType != 'png' && $fileType != 'gif'){
            $add_product_errors['image'] = 'File type is not supported';
        }
        if(file_exists($targetFile)){
            $add_product_errors['image'] = 'File already exists';
        }
        if(empty($add_product_errors)){
            $product_id = rand(100000, 999999);
            $product_name = Escape_data($_POST['product_name'], $conn);
            $product_price = $_POST['product_price'];
            $stock_level = $_POST['stock_level'];
            $quantity_sold = 0;
            $desc = Escape_data($_POST['description'],$conn);
            $row = selectAllData($conn, $product_name);
            if($row === 0){
                $sqlInsert = mysqli_prepare($conn, "INSERT INTO product_list VALUES (?, ?, ?, ?, ?, ?,?,?)");
                mysqli_stmt_bind_param($sqlInsert, 'issiiiss', $product_id, $category, $product_name, $product_price, $stock_level, $quantity_sold, $targetFile, $desc);
                mysqli_stmt_execute($sqlInsert);
                $add_product_errors['header'] = 'Product uploaded';
                $add_product_errors[] = '';
                
            }else{
                $add_product_errors['header'] = 'Product Name exists';
            }
         }else{
            $add_product_errors['header'] = 'Product could not be added';
            $add_product_errors[] = '';
        }
    }else{
        $add_product_errors['image'] = 'Your file was not uploaded';  
    }
}
?>