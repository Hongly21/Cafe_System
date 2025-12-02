<?php

include('../../Config/conect.php');
if ($_POST['id']) {
    $id = $_POST['id'];
    $sql = "DELETE FROM `users` WHERE `UserID` = '$id';";
    $result = $con->query($sql);
    if ($result) {
        echo "success";
    } else {
        echo "error";
    }
}
