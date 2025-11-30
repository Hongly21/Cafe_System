<?php
include('../../root/Header.php');
include('../../Config/conect.php');
include('../../root/DataTable.php');

?>

<h3 class="text-center" style="margin-top: 15px;">Suppliers</h3>
<div class="container">
    <button data-bs-toggle="modal" data-bs-target="#exampleModal"
        class="btn btn-primary btn-sm" style="margin-bottom: 10px;">
        <i style="margin-right: 5px;" class="fas fa-plus"></i>Add Supply
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
                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Contact</th>
                                            <th scope="col">Address</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = 'SELECT * from suppliers';
                                        $result = $con->query($sql);
                                        while ($row = $result->fetch_assoc()) {
                                        ?>
                                            <tr>
                                                <td><?php echo $row['SupplierID'] ?></td>
                                                <td><?php echo $row['Name'] ?></td>
                                                <td><?php echo $row['Contact'] ?></td>
                                                <td><?php echo $row['Address'] ?></td>
                                                <td>
                                                    <button class="btn btn-primary btn_edit_category btn-sm"
                                                        data-id="<?php echo $row['SupplierID'] ?> "
                                                        data-name="<?php echo $row['Name'] ?>"
                                                        data-contact="<?php echo $row['Contact'] ?>"
                                                        data-address="<?php echo $row['Address'] ?>">Edit</button>
                                                    <button class="btn btn-danger btn-sm" onclick="deleteCategory(<?php echo $row['SupplierID'] ?>)">Delete</button>

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

<!-- modal add supply -->


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add New Supply</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Contact</label>
                        <input type="text" class="form-control" id="contact" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" aria-describedby="emailHelp">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary btn_save_supply">Save</button>
            </div>
        </div>
    </div>
</div>

<!-- modal update supply -->
<div class="modal fade" id="EditModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Supply</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Name</label>
                        <input type="text" class="form-control" id="nameupdate" aria-describedby="emailHelp">
                        <input type="hidden" id="idupdate" value="">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Contact</label>
                        <input type="text" class="form-control" id="contactupdate" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Address</label>
                        <input type="text" class="form-control" id="addressupdate" aria-describedby="emailHelp">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary btn_update_supply">Update</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('.btn_save_supply').click(function() {
            var name = $('#name').val();
            var contact = $('#contact').val();
            var address = $('#address').val();


            $.ajax({
                url: "../../action/Supply/add.php",
                method: "POST",
                data: {
                    name: name,
                    contact: contact,
                    address: address
                },
                success: function(response) {
                    if (response == 'success') {
                        Swal.fire({
                            title: 'Success!',
                            text: 'Supply added successfully',
                            icon: 'success',
                            timer: 1500,
                            showConfirmButton: false
                        }).then(function() {
                            location.reload();
                        })
                    } else {
                        Swal.fire({
                            title: 'Error!',
                            text: 'Supply already exists',
                            icon: 'error',
                            timer: 1500,
                            showConfirmButton: false
                        })

                    }
                }
            })
        })


        $('.btn_edit_category').click(function() {
            $('#EditModal').modal('show');
            var name = $(this).data('name');
            var id = $(this).data('id');
            var contact = $(this).data('contact');
            var address = $(this).data('address');
            $('#addressupdate').val(address);
            $('#nameupdate').val(name);
            $('#idupdate').val(id);
            $('#contactupdate').val(contact);
        })

        $('.btn_update_supply').click(function() {
            var name = $('#nameupdate').val();
            var id = $('#idupdate').val();
            var contact = $('#contactupdate').val();
            var address = $('#addressupdate').val();
            $.ajax({
                url: "../../action/Supply/update.php",
                method: "POST",
                data: {
                    id: id,
                    contact: contact,
                    address: address,
                    name: name

                },
                success: function(response) {
                    if (response == 'success') {
                        Swal.fire({
                            title: 'Success!',
                            text: 'Supply updated successfully',
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
                    url: "../../action/Supply/delete.php",
                    method: "POST",
                    data: {
                        id: id
                    },
                    success: function(response) {
                        if (response == 'success') {
                            Swal.fire({
                                title: 'Success!',
                                text: 'Supply deleted successfully',
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