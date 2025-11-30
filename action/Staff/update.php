<?php
include("../../Config/conect.php");
$id = $_POST['id'];
$name = $_POST['name'];
$Phone = $_POST['Phone'];
$role = $_POST['role'];
$hiredate = $_POST['hiredate'];
$manager = $_POST['manager'];

$sql = "UPDATE `employees` SET `Name`='$name',`Role`='$role',`Phone`='$Phone',`HireDate`='$hiredate',`UserID`='$manager' WHERE `EmpID`='$id'";
$result = $con->query($sql);
if ($result) {
    echo "success";
} else {
    echo "error";
}
