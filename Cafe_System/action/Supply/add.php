<?php
include('../../Config/conect.php');

if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];

    $sql = "INSERT INTO `suppliers` (`SupplierID`,`Name`, `Contact`,`Address`) VALUES (NULL, '$name','$contact','$address');";
    $result = $con->query($sql);
    if ($result) {
        echo "success";
    } else {
        echo "error";
    }
}
