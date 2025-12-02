<?php
include('../../root/Header.php');
include('../../Config/conect.php');
?>

<h3 class="text-center" style="margin-top: 15px;">User</h3>
<div class="container">
    <button data-bs-toggle="modal" data-bs-target="#addempModal"
        class="btn btn-primary btn-sm" style="margin-bottom: 10px;">
        <i style="margin-right: 5px;" class="fas fa-plus"></i>Add User
    </button>
</div>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table id="example" class="table table-striped table-bordered text-center" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th scope="col">UserID</th>
                                            <th scope="col">Username</th>
                                            <th scope="col">Role</th>
                                            <th scope="col">CreatedAt</th>
                                            <th scope="col">Action</th>




                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = 'SELECT * from users';
                                        $run = $con->query($sql);
                                        while ($row = $run->fetch_assoc()) {
                                        ?>
                                            <tr>
                                                <td><?php echo $row['UserID'] ?></td>
                                                <td><?php echo $row['Username'] ?></td>
                                                <td>
                                                    <span class="badge bg-<?php echo $row['Role'] === 'Admin' ? 'danger' : ($row['Role'] === 'Manager' ? 'warning' :
                                                                                'info'); ?>"><?php echo ucfirst($row['Role']);
                                                                                                ?>
                                                    </span>
                                                </td>
                                                <td><?php echo $row['CreatedAt'] ?></td>
                                                <td>
                                                    <button class="btn btn-sm btn-warning me-2 editbtn" data-bs-toggle="modal" data-bs-target="#editempModal"
                                                        data-id="<?php echo $row['UserID'] ?>"
                                                        data-name="<?php echo $row['Username'] ?>"
                                                        data-pwd="<?php echo $row['PasswordHash'] ?>"
                                                        data-role="<?php echo $row['Role'] ?>">Edit</button>
                                                    <button class="btn btn-sm btn-danger me-2" onclick="deleteCategory(<?php echo $row['UserID'] ?>)">Resign</button>
                                                </td>
                                            </tr>

                                        <?php
                                        }
                                        ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Add Modal -->
<div class="modal fade" id="addempModal" tabindex="-1" aria-labelledby="addTaxSettingModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header bg-primary text-white border-0">
                <h5 class="modal-title" id="addUserModalLabel">
                    <i class="fas fa-user-plus me-2"></i>Add New User
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <form id="addUserForm" class="needs-validation" novalidate>
                    <div class="mb-4">
                        <label for="username" class="form-label fw-semibold">
                            <i class="fas fa-user me-2"></i>Username
                        </label>
                        <div class="input-group">
                            <input type="text" class="form-control border-start-0" id="username" required>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="Phone" class="form-label fw-semibold">
                            <i class="fas fa-envelope me-2"></i>Password
                        </label>
                        <div class="input-group">
                            <input type="text" class="form-control border-start-0" id="pwd" required>
                        </div>

                    </div>

                    <div class="mb-4">
                        <label for="role" class="form-label fw-semibold">
                            <i class="fas fa-user-tag me-2"></i>Role
                        </label>
                        <select class="form-select" id="role" required>
                            <option value="">Select role...</option>
                            <option value="Manager">Manager</option>
                            <option value="Admin">Admin</option>
                        </select>
                        <div class="invalid-feedback">Please select a role.</div>
                    </div>


                </form>
            </div>
            <div class="modal-footer border-0 pt-0">
                <button type="button" class="btn btn-light fw-semibold" data-bs-dismiss="modal">
                    <i class="fas fa-times me-2"></i>Cancel
                </button>
                <button type="button" class="btn btn-primary fw-semibold" id="saveuser">
                    <i class="fas fa-save me-2"></i>Save Changes
                </button>
            </div>
        </div>
    </div>
</div>

<!-- edit Modal -->
<div class="modal fade" id="editempModal" tabindex="-1" aria-labelledby="addTaxSettingModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header bg-primary text-white border-0">
                <h5 class="modal-title" id="addUserModalLabel">
                    <i class="fas fa-user-plus me-2"></i>Edit User
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <form id="editUserForm" class="needs-validation" novalidate>
                    <input type="hidden" id="idupdate">
                    <div class="mb-4">
                        <label for="usernameEdit" class="form-label fw-semibold">
                            <i class="fas fa-user me-2"></i>Username
                        </label>
                        <div class="input-group">
                            <input type="text" class="form-control border-start-0" id="usernameEdit" required>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="PhoneEdit" class="form-label fw-semibold">
                            <i class="fas fa-envelope me-2"></i>Password
                        </label>
                        <div class="input-group">
                            <input type="password" class="form-control border-start-0" id="pwdEdit" required>
                        </div>
                    </div>
                    <!-- new password -->
                    <div class="mb-4">
                        <label for="PhoneEdit" class="form-label fw-semibold">
                            <i class="fas fa-envelope me-2"></i>New Password
                        </label>
                        <div class="input-group">
                            <input type="text" class="form-control border-start-0" id="newpwdEdit" required>
                        </div>
                    </div>


                    <div class="mb-4">
                        <label for="roleEdit" class="form-label fw-semibold">
                            <i class="fas fa-user-tag me-2"></i>Role
                        </label>
                        <select class="form-select" id="roleEdit" required>
                            <option value="">Select role...</option>
                            <option value="Manager">Manager</option>
                            <option value="Admin">Admin</option>
                        </select>
                        <div class="invalid-feedback">Please select a role.</div>
                    </div>

                </form>
            </div>
            <div class="modal-footer border-0 pt-0">
                <button type="button" class="btn btn-light fw-semibold" data-bs-dismiss="modal">
                    <i class="fas fa-times me-2"></i>Cancel
                </button>
                <button type="button" class="btn btn-primary fw-semibold" id="updateEmp">
                    <i class="fas fa-save me-2"></i>Save Changes
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#saveuser').click(function() {
            var name = $('#username').val();
            var password = $('#pwd').val();
            var role = $('#role').val();
            if (name == "" || password == "" || role == "") {
                Swal.fire({
                    title: 'Error!',
                    text: 'Please fill all fields',
                    icon: 'error',
                    timer: 1500,
                    showConfirmButton: false
                });
            } else {
                $.ajax({
                    url: '../../action/User/add.php',
                    method: "POST",
                    data: {
                        name: name,
                        password: password,
                        role: role,
                    },
                    success: function(response) {
                        if (response == 'success') {
                            Swal.fire({
                                title: 'Success!',
                                text: 'User added successfully',
                                icon: 'success',
                                timer: 1500,
                                showConfirmButton: false
                            }).then(function() {
                                location.reload();
                            })
                        } else {
                            Swal.fire({
                                title: 'Error!',
                                text: 'User already exists',
                                icon: 'error',
                                timer: 1500,
                                showConfirmButton: false
                            })
                        }

                    }
                })
            }
        })


        $('.editbtn').click(function() {
            var id = $(this).data('id');
            var name = $(this).data('name');
            var pwd = $(this).data('pwd');
            var role = $(this).data('role');

            $('#idupdate').val(id);
            $('#usernameEdit').val(name);
            $('#pwdEdit').val(pwd);
            $('#roleEdit').val(role);
        })

        $('#updateEmp').click(function() {
            var id = $('#idupdate').val();
            var name = $('#usernameEdit').val();
            var password = $('#pwdEdit').val();
            var newpassword = $('#newpwdEdit').val();
            var role = $('#roleEdit').val();

            if (name == "" || password == "" || role == "") {
                Swal.fire({
                    title: 'Error!',
                    text: 'Please fill all fields',
                    icon: 'error',
                    timer: 1500,
                    showConfirmButton: false
                });
            } else {
                if (newpassword == "") {
                    newpassword = password;
                }
                $.ajax({
                    url: '../../action/User/update.php',
                    method: "POST",
                    data: {
                        id: id,
                        name: name,
                        password: newpassword,
                        role: role,
                    },
                    success: function(response) {
                        if (response == 'success') {
                            Swal.fire({
                                title: 'Success!',
                                text: 'User updated successfully',
                                icon: 'success',
                                timer: 1500,
                                showConfirmButton: false
                            }).then(function() {
                                location.reload();
                            })
                        } else {
                            Swal.fire({
                                title: 'Error!',
                                text: 'Something went wrong',
                                icon: 'error',
                                timer: 1500,
                                showConfirmButton: false
                            })

                        }

                    }
                })
            }

        })

    })




    //delete fuction
    function deleteCategory(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "../../action/User/delete.php",
                    method: "POST",
                    data: {
                        id: id
                    },
                    success: function(response) {
                        if (response == 'success') {
                            Swal.fire({
                                title: 'Success!',
                                text: 'Staff resign successfully',
                                icon: 'success',
                                timer: 1500,
                                showConfirmButton: false
                            }).then(function() {
                                location.reload();
                            })
                        } else {
                            Swal.fire({
                                title: 'Error!',
                                text: 'Something went wrong',
                                icon: 'error',
                                timer: 1500,
                                showConfirmButton: false
                            })

                        }
                    }
                })
            }
        })
    }
</script>