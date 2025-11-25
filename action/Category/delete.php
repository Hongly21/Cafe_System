<?php 
include('../../Config/conect.php');


if(isset($_POST['id'])){
    $cateid = $_POST['id'];
    $sql = "DELETE FROM `categories` WHERE `CategoryID` = '$cateid';";
    $result = $con->query($sql);
    if($result){
        echo "success";
    }else{
        echo "error";
    }
}

?>