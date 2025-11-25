<?php
include('../../Config/conect.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name      = $_POST['product_name'];
    $category  = $_POST['category_id'];
    $price     = $_POST['product_price'];
    $qty       = $_POST['product_quantity'];
    $id        = $_POST['id'];

    if (!empty($_FILES['product_image']['name'])) {

        $imageName = $_FILES['product_image']['name'];
        $tempPath  = $_FILES['product_image']['tmp_name'];
        $uploadDir = "../../assets/images";


        move_uploaded_file($tempPath, $uploadDir . $imageName);
        $sql = "UPDATE `products` SET `CategoryID` = '$category', `Name` = '$name', `Price` = '$price', `StockQty` = '$qty', `Image` = '$imageName' WHERE `ProductID` = '$id';";
    } else {
        $sql = "UPDATE `products` SET `CategoryID` = '$category', `Name` = '$name', `Price` = '$price', `StockQty` = '$qty' WHERE `ProductID` = '$id';";
    }

    
    $run = $con->query($sql);
    if ($run) {
        echo "success";
    } else {
        echo "error";
    }
}
