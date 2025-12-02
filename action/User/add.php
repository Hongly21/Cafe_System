<?php

include('../../Config/conect.php');
$username = $_POST['name'];
$password = $_POST['password'];
$role = $_POST['role'];
// $hiredate = $_POST['hiredate'];
$sql = "INSERT INTO `users` (`Username`, `PasswordHash`, `Role`, `CreatedAt`) VALUES ('$username', '$password', '$role', NOW());";
$result = $con->query($sql);
if ($result) {
    echo "success";
} else {
    echo "error";
}
