<!DOCTYPE html>
<html lang="en">
<?php
include("root/Header.php");
?>
<style>
    body {
        font-family: 'Libertinus Sans', sans-serif;
    }
</style>
<?php 
 if (isset($_GET['usernameshow'])) {
    $username = $_GET['usernameshow'];
 }else{
    $username = 'Admin';
 }
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $username; ?></title>
</head>
<frameset rows="8%,92%" frameborder="0" border="0">
    <frame src="navbar.php" name="">
        <frameset cols="17%,*">
            <frame src="root/Sidemenu.php" name="menu">
                <frame src="view/Dashboard/index.php?username=<?php echo $username; ?>" name="content">
        </frameset>
</frameset>

</html>