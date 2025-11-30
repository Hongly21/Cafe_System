<?php
include('../../Config/conect.php');
if (isset($_POST['action']) && $_POST['action'] == 'adminSMS') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM users WHERE Username = '$username' AND PasswordHash  = '$password'";
    $result = $con->query($sql);
    if ($result && $result->num_rows > 0) {
        echo "success";
    } else {
        echo "error";
    }
}

if (isset($_POST['action']) && $_POST['action'] == 'employeeSMS') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM employees WHERE Name = '$username' AND Phone = '$password'";
    $result = $con->query($sql);
    if ($result && $result->num_rows > 0) {
        echo "success";
    } else {
        echo "error";
    }
}
