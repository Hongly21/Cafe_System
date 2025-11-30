<?php
include('../../root/Header.php');
include('../../Config/conect.php');
?>

<h3 class="text-center" style="margin-top: 15px;">EMPLOYEE</h3>
<div class="container">
    <button data-bs-toggle="modal" data-bs-target="#addempModal"
        class="btn btn-primary btn-sm" style="margin-bottom: 10px;">
        <i style="margin-right: 5px;" class="fas fa-plus"></i>Add Employee
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
                                            <th scope="col">EmpID</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Phone</th>
                                            <th scope="col">Role</th>
                                            <th scope="col">HireDate</th>
                                            <th scope="col">UserID</th>
                                            <th scope="col">Action</th>




                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = 'SELECT * from employees';
                                        $run = $con->query($sql);
                                        while ($row = $run->fetch_assoc()) {
                                        ?>
                                            <tr>
                                                <td><?php echo $row['EmpID'] ?></td>
                                                <td><?php echo $row['Name'] ?></td>
                                                <td><?php echo $row['Phone'] ?></td>
                                                <td>
                                                    <span class="badge bg-<?php echo $row['Role'] === 'Admin' ? 'danger' : ($row['Role'] === 'Manager' ? 'warning' :
                                                                                'info'); ?>"><?php echo ucfirst($row['Role']);
                                                                                                ?>
                                                    </span>
                                                </td>
                                                <td><?php echo $row['HireDate'] ?></td>
                                                <td><?php echo $row['UserID'] ?></td>
                                                <td>
                                                    <button class="btn btn-sm btn-warning me-2 editbtn" data-bs-toggle="modal" data-bs-target="#editempModal"
                                                        data-id="<?php echo $row['EmpID'] ?>"
                                                        data-name="<?php echo $row['Name'] ?>"
                                                        data-phone="<?php echo $row['Phone'] ?>"
                                                        data-userid="<?php echo $row['UserID'] ?>"
                                                        data-role="<?php echo $row['Role'] ?>"
                                                        data-hiredate="<?php echo $row['HireDate'] ?>">Edit</button>
                                                    <button class="btn btn-sm btn-danger me-2" onclick="deleteCategory(<?php echo $row['EmpID'] ?>)">Resign</button>
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
                    <i class="fas fa-user-plus me-2"></i>Add New Employee
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
                            <i class="fas fa-envelope me-2"></i>Phone Number
                        </label>
                        <div class="input-group">

                            <input type="number" class="form-control border-start-0" id="Phone" required>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="role" class="form-label fw-semibold">
                            <i class="fas fa-user-tag me-2"></i>Role
                        </label>
                        <select class="form-select" id="role" required>
                            <option value="">Select role...</option>
                            <option value="Waiter">Waiter</option>
                            <option value="Cashier">Cashier</option>
                            <option value="Manager">Manager</option>
                            <option value="Admin">Admin</option>
                        </select>
                        <div class="invalid-feedback">Please select a role.</div>
                    </div>
                    <div class="mb-4">
                        <label for="hiredate" class="form-label fw-semibold">
                            <i class="fas fa-user-tag me-2"></i>HireDate
                        </label>
                        <input type="date" class="form-control border-start-0" value="" id="hiredate">
                    </div>
                    <div class="mb-4">
                        <label for="status" class="form-label fw-semibold">
                            <i class="fas fa-toggle-on me-2"></i>From Manager
                        </label>
                        <select class="form-select" id="manager" required>
                            <?php $sql = "SELECT * FROM employees WHERE Role='Manager'";
                            $run = $con->query($sql);

                            while ($row = $run->fetch_assoc()) {
                            ?>
                                <option>Select Manager</option>
                                <option value="<?php echo $row['EmpID'] ?>"><?php echo $row['Name'] ?></option>
                            <?php
                            }

                            ?>

                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer border-0 pt-0">
                <button type="button" class="btn btn-light fw-semibold" data-bs-dismiss="modal">
                    <i class="fas fa-times me-2"></i>Cancel
                </button>
                <button type="button" class="btn btn-primary fw-semibold" id="saveEmp">
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
                    <i class="fas fa-user-plus me-2"></i>Edit Employee
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <form id="addUserForm" class="needs-validation" novalidate>
                    <div class="mb-4">
                        <label for="usernameEdit" class="form-label fw-semibold">
                            <i class="fas fa-user me-2"></i>Username
                        </label>
                        <div class="input-group">
                            <input type="text" class="form-control border-start-0" id="usernameEdit" value="" required>
                            <input type="hidden" value="" id="idupdate">
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="PhoneEdit" class="form-label fw-semibold">
                            <i class="fas fa-envelope me-2"></i>Phone Number
                        </label>
                        <div class="input-group">
                            <input type="number" class="form-control border-start-0" id="PhoneEdit" value="" required>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="roleEdit" class="form-label fw-semibold">
                            <i class="fas fa-user-tag me-2"></i>Role
                        </label>
                        <select class="form-select" id="roleEdit" required>
                            <option value="">Select role...</option>
                            <option value="Waiter">Waiter</option>
                            <option value="Cashier">Cashier</option>
                            <option value="Manager">Manager</option>
                            <option value="Admin">Admin</option>
                        </select>
                        <div class="invalid-feedback">Please select a role.</div>
                    </div>
                    <div class="mb-4">
                        <label for="hiredateEdit" class="form-label fw-semibold">
                            <i class="fas fa-user-tag me-2"></i>HireDate
                        </label>
                        <input type="date" class="form-control border-start-0" value="" id="hiredateEdit">
                    </div>
                    <div class="mb-4">
                        <label for="managerEdit" class="form-label fw-semibold">
                            <i class="fas fa-toggle-on me-2"></i>From Manager
                        </label>
                        <select value="" class="form-select" id="managerEdit" required>
                            <?php $sql = "SELECT * FROM employees WHERE Role='Manager'";
                            $run = $con->query($sql);

                            while ($row = $run->fetch_assoc()) {
                            ?>
                                <option value="">Select Manager</option>
                                <option value="<?php echo $row['EmpID'] ?>"><?php echo $row['Name'] ?></option>
                            <?php
                            }

                            ?>

                        </select>
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
        $('#saveEmp').click(function() {
            var name = $('#username').val();
            var Phone = $('#Phone').val();
            var role = $('#role').val();
            var hiredate = $('#hiredate').val();
            var manager = $('#manager').val();
            $.ajax({
                url: '../../action/Staff/add.php',
                method: "POST",
                data: {
                    name: name,
                    Phone: Phone,
                    role: role,
                    hiredate: hiredate,
                    manager: manager
                },
                success: function(response) {
                    if (response == 'success') {
                        Swal.fire({
                            title: 'Success!',
                            text: 'Staff added successfully',
                            icon: 'success',
                            timer: 1500,
                            showConfirmButton: false
                        }).then(function() {
                            location.reload();
                        })
                    } else {
                        Swal.fire({
                            title: 'Error!',
                            text: 'Staff already exists',
                            icon: 'error',
                            timer: 1500,
                            showConfirmButton: false
                        })

                    }
                }
            })
        })


        $('.editbtn').click(function() {

            var id = $(this).data('id');
            var name = $(this).data('name');
            var userid = $(this).data('userid');
            var role = $(this).data('role');
            var hiredate = $(this).data('hiredate');
            var phone = $(this).data('phone');


            // set value in modal update
            $('#usernameEdit').val(name);
            $('#PhoneEdit').val(phone);
            $('#roleEdit').val(role);
            $('#hiredateEdit').val(hiredate);
            $('#managerEdit').val(userid);
            $('#idupdate').val(id);


        })

        $('#updateEmp').click(function() {
            var id = $('#idupdate').val();
            var name = $('#usernameEdit').val();
            var Phone = $('#PhoneEdit').val();
            var role = $('#roleEdit').val();
            var hiredate = $('#hiredateEdit').val();
            var manager = $('#managerEdit').val();
            $.ajax({
                url: '../../action/Staff/update.php',
                method: "POST",
                data: {
                    id: id,
                    name: name,
                    Phone: Phone,
                    role: role,
                    hiredate: hiredate,
                    manager: manager
                },
                success: function(response) {
                    if (response == 'success') {
                        Swal.fire({
                            title: 'Success!',
                            text: 'Staff updated successfully',
                            icon: 'success',
                            timer: 1500,
                            showConfirmButton: false
                        }).then(function() {
                            location.reload();
                        })
                    } else {
                        alert(response);
                        // Swal.fire({
                        //     title: 'Error!',
                        //     text: 'Something went wrong',
                        //     icon: 'error',
                        //     timer: 1500,
                        //     showConfirmButton: false
                        // })
                    }
                }
            })
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
                    url: "../../action/Staff/delete.php",
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