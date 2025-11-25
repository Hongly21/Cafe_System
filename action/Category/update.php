<?php
include('../../Config/conect.php');

if (isset($_POST['category_name'])) {
    $category_name = $_POST['category_name'];
    $category_id = $_POST['cateid'];
    $sql = "UPDATE `categories` SET `Name` = '$category_name' WHERE `categories`.`CategoryID` = '$category_id';";
    $result = $con->query($sql);
    if ($result) {
        echo "success";
    } else {
        echo "error";
    }
}
