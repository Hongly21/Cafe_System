<?php
include('../../Config/conect.php');


$id = $_POST['id'];

$sql = "DELETE FROM `products` WHERE `ProductID` = '$id'";
$sqlinventory = "DELETE FROM `inventory` WHERE ProductID='$id'";
$runinventory = $con->query($sqlinventory);
$run = $con->query($sql);

if ($run) {
    echo "success";
} else {
    echo "error";
}
