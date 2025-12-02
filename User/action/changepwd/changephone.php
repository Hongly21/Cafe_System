<?php
include('../../Config/conect.php');

$id = $_POST['empid'];
$username = $_POST['empname'];
$newphone = $_POST['newpwd'];

$sql = "UPDATE employees SET Phone = '$newphone', Name='$username' WHERE EmpID = '$id'";
if ($con->query($sql) === TRUE) {
    echo "success";
} else {
    echo "error " . $con->error;
}
