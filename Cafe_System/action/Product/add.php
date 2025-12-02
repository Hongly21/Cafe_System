<?php
include("../../Config/conect.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name      = $_POST['product_name'];
    $category  = $_POST['category_id'];
    $price     = $_POST['product_price'];
    $qty       = $_POST['product_quantity'];


    if (!empty($_FILES['product_image']['name'])) {

        $imageName = $_FILES['product_image']['name'];
        $tempPath  = $_FILES['product_image']['tmp_name'];
        $uploadDir = "../../assets/images/";


        move_uploaded_file($tempPath, $uploadDir . $imageName);
    } else {
        $imageName = null; // if no uploaded image it will be null
    }

    $sql = "INSERT INTO `products` (`ProductID`, `CategoryID`, `Name`, `Price`, `StockQty`, `Image`) VALUES 
    (NULL, '$category', '$name', '$price', '$qty', '$imageName');";
    $run = $con->query($sql);
    if ($run) {
        $productID = $con->insert_id;


        $sqlinventory = "INSERT INTO `inventory` (`InventoryID`, `ProductID`, `Quantity`, `ReorderLevel`) 
        VALUES (NULL, '$productID', '$qty', '5');";

        $runinventory = $con->query($sqlinventory);
        echo "success";
    } else {
        echo "error";
    }
}
