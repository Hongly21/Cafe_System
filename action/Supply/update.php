<?php
include('../../Config/conect.php');

if (isset($_POST['id'])) {
    $name = $_POST['name'];
    $id = $_POST['id'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $sql = "UPDATE `suppliers` SET `Name` = '$name',`Contact` = '$contact',`Address` = '$address'
    WHERE `SupplierID` = '$id';";
    $result = $con->query($sql);
    if ($result) {
        echo "success";
    } else {
        echo "error";
    }
}
