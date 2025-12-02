<?php
include("../../Config/conect.php");

$name = $_POST['name'];
$Phone = $_POST['Phone'];
$role = $_POST['role'];
$hiredate = $_POST['hiredate'];
$manager = $_POST['manager'];

$sql = "INSERT INTO `employees` (`EmpID`, `Name`, `Role`, `Phone`, `HireDate`, `UserID`) 
VALUES (NULL, '$name', '$role', '$Phone', '$hiredate', '$manager');";
$result = $con->query($sql);
if ($result) {
    echo "success";
} else {
    echo "error";
}
