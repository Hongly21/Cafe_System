<!DOCTYPE html>
<?php
include('../Config/conect.php');

$username = $_GET['username'];
$sql = "SELECT * FROM employees WHERE Name='$username'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
$name = $row['Name'];
$role = $row['Role'];
$phone = $row['Phone'];
$id = $row['EmpID'];
$hiredate = $row['HireDate'];



?>
<html>

<head>
    <?php
    include("header.php");
    ?>
    <!-- Google Fonts - Professional font combination -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600&family=Noto+Sans+Khmer:wght@400;500;600&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
</head>
<style>
    body {
        font-family: 'Libertinus Sans', sans-serif;
        background-color: #182634ff;
        color: white;

    }

    .dcs {
        /* background-color: green; */

        margin-top: 10px;
        padding: 0px 5px 0px 15px;
        box-sizing: border-box;
    }

    label {
        display: inline-block;
        color: white;
        width: 65px;
        /* adjust width to align labels neatly */
        font-weight: 600;
        margin-bottom: 8px;
    }


    .username {
        color: white;
        margin-top: 20px;
        text-align: center;
        font-weight: bold;
        margin-bottom: 30px;
    }

    .universtity-infor {
        margin-left: 10px;

    }

    .universtity-infor input {
        margin: 5px 0px 5px 12px;
        padding: 0px 0px 0px 5px;
        width: 130px;
        color: #fffdfdff;
        box-sizing: border-box;

    }

    .universtity-infor td:first-child {
        font-weight: bold;
    }
</style>

<body>
    <div class="menu">

        <div class="name">

            <h1 class="username"><?php echo $role; ?></h1>
        </div>
        <hr style="color: white; margin: 0px 0px 10px 0px;">

        <div class="universtity-infor">

            <table>
                <tr>
                    <td class="label"><label for="Gender">ID</label></td>
                    <td><input type="text" id="Gender" value="<?php echo $id; ?>" disabled></td>
                </tr>
                <tr>
                    <td class="label"><label for="Code">Role</label></td>
                    <td><input type="text" id="Code" value="<?php echo $role; ?>" disabled></td>
                </tr>
                <tr>
                    <td class="label"><label for="EmpName">Name</label></td>
                    <td><input type="text" id="EmpName" value="<?php echo $name; ?>" disabled></td>
                </tr>
                <tr>
                    <td class="label"><label for="dob">Phone</label></td>
                    <td><input type="text" id="dob" value="<?php echo $phone; ?>" disabled></td>
                </tr>

                <tr>
                    <td class="label"><label for="Gender">HireDate</label></td>
                    <td><input type="text" id="Gender" value="<?php echo $hiredate; ?>" disabled></td>
                </tr>

            </table>
        </div>



    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</body>

</html>