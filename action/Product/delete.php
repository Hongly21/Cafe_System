<?php
include('../../Config/conect.php');


$id = $_POST['id'];

$sql = "DELETE FROM `products` WHERE `ProductID` = '$id'";
$run = $con->query($sql);

if ($run) {
    echo "success";
} else {
    echo "error";
}
