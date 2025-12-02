<?php

include('../../Config/conect.php');
include('../../root/Header.php');
//find empcde by username 

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



<body>

    <!-- Header -->
    <div class="header">
        Digital Menu For Cashier or Waiter
        <span style="float:right; margin-top: 8px; font-size:16px;"><?php echo $username; ?> <i style="margin-left: 10px;" class="fa-solid fa-user"></i></span>
    </div>
    <div class="container" style="margin-top: 15px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); padding: 20px; border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); width: 98%;">
        <nav>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Sales</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="Product-tab" data-bs-toggle="tab" data-bs-target="#Product-tab-pane" type="button" role="tab" aria-controls="Product-tab-pane" aria-selected="false">Product List</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="Category-tab" data-bs-toggle="tab" data-bs-target="#Category-tab-pane" type="button" role="tab" aria-controls="Category-tab-pane" aria-selected="false">Category List</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="Inventory-tab" data-bs-toggle="tab" data-bs-target="#Inventory-tab-pane" type="button" role="tab" aria-controls="Inventory-tab-pane" aria-selected="false">Inventory</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Leave Request</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pwd-tab" data-bs-toggle="tab" data-bs-target="#pwd-tab-pane" type="button" role="tab" aria-controls="pwd-tab-pane" aria-selected="false">Change Password</button>
                </li>

            </ul>
        </nav>
        <div class="tab-content" id="myTabContent">
            <!-- User Information -->
            <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                <?php
                include('../Sales/index.php');
                ?>
            </div>
            <!-- Product form -->
            <div class="tab-pane fade" id="Product-tab-pane" role="tabpanel" aria-labelledby="Product-tab" tabindex="0">
                <?php include('../Product/index.php'); ?>

            </div>
            <!-- Category form -->
            <div class="tab-pane fade" id="Category-tab-pane" role="tabpanel" aria-labelledby="Category-tab" tabindex="0">
                <?php include('../Category/index.php'); ?>

            </div>
            <!-- Inventory form -->
            <div class="tab-pane fade" id="Inventory-tab-pane" role="tabpanel" aria-labelledby="Inventory-tab" tabindex="0">
                <?php include('../Inventory/index.php'); ?>

            </div>
            <!-- Leave request form -->
            <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                <h2 style="text-align: center; margin-bottom: 20px; text-transform: uppercase; margin-top: 15px;">Leave Request</h2>

            </div>

            <!-- change password -->
            <div class="tab-pane fade" id="pwd-tab-pane" role="tabpanel" aria-labelledby="pwd-tab" tabindex="0">
                <h2 style="text-align: center; margin-bottom: 20px; text-transform: uppercase; margin-top: 15px;">Change PhoneNumber</h2>
                <div style="margin: auto; width: 100%; overflow: hidden; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);   text-align: center; padding: 5px 0px 15px 0px; border-radius: 5px;">
                    <label for="Username">Username</label><br>
                    <input type="text" name="Username" id="Username" value="<?php echo $name ?>"><br>

                    <label class="label" for="Password">Phone Number</label><br>
                    <input type="number" name="Password" id="phone" value="<?php echo $phone ?>"><br><br>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdroppws">
                        Change Password
                    </button>
                </div>
                <!-- Modal Change password -->
                <div class="modal fade" id="staticBackdroppws" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Change PhoneNumber</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="Container" style="margin: auto; width: 80%; overflow: hidden; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);   text-align: center; box-sizing:border-box; padding: 10px; border-radius: 5px;">
                                    <label>New Username</label><br>
                                    <input type="text" id="username" value=""><br>

                                    <label>New Phone Number</label><br>
                                    <input type="text" id="newpwd"><br>

                                    <label>Old Phone Number</label><br>
                                    <input type="text" id="oldpwd"><br>

                                    <input type="hidden" id="empid" value="<?php echo $id; ?>">
                                    <input type="hidden" id="oldupdate" value="<?php echo $phone; ?>">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary updatepwd">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    $(document).ready(function() {
                        $('.updatepwd').click(function() {
                            var empid = $('#empid').val();
                            var empname = $('#username').val();
                            var newpwd = $('#newpwd').val();
                            var oldpwd = $('#oldpwd').val();
                            var oldupdate = $('#oldupdate').val();
                            if (newpwd == "" || oldpwd == "") {
                                Swal.fire({
                                    icon: 'warning',
                                    title: 'Warning',
                                    text: 'Please fill in all fields.',
                                });
                            } else if (oldupdate != oldpwd) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: 'Old Phone Number does not match.',
                                });
                            } else if (oldupdate == oldpwd) {
                                $.ajax({
                                    url: '../../action/changepwd/changephone.php',
                                    type: 'POST',
                                    data: {
                                        empid: empid,
                                        empname: empname,
                                        newpwd: newpwd
                                    },
                                    success: function(response) {
                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Success',
                                            text: 'Phone Number updated successfully.',
                                        }).then(() => {
                                            location.reload();
                                        });
                                    },
                                    error: function() {
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Error',
                                            text: 'An error occurred while updating Phone Number.',
                                        });
                                    }
                                });
                            }
                        });
                    });
                </script>

            </div>
        </div>


    </div>

    </div>

</body>

</html>