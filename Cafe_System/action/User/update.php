<?php
include('../../Config/conect.php');


$id = $_POST['id'];
$username = $_POST['name'];
$password = $_POST['password'];
$role = $_POST['role'];
$sql = "UPDATE `users` SET `Username` = '$username', `PasswordHash` = '$password', `Role` = '$role' WHERE `UserID` = '$id';";
$result = $con->query($sql);
if ($result) {
    echo "success";
} else {
    echo "error";
}
