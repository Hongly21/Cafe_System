<?php
include('../../Config/conect.php');

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $reorderlevel = $_POST['reorderlevel'];
    $sql = "UPDATE `inventory` SET `ReorderLevel` = '$reorderlevel' WHERE `InventoryID` = '$id';";
    $result = $con->query($sql);
    if ($result) {
        echo "success";
    } else {
        echo "error";
    }
}
