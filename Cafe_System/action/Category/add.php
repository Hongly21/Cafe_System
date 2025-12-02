<?php 
include('../../Config/conect.php');

if(isset($_POST['category_name'])){
    $category_name = $_POST['category_name'];
    $sql = "INSERT INTO `categories` (`CategoryID`, `Name`) VALUES (NULL, '$category_name');";
    $result = $con->query($sql);
    if($result){
        echo "success";
    }else{
        echo "error";
    }
}
?>