<?php
include('../../root/Header.php');
include('../../Config/conect.php');
include('../../root/DataTable.php');

?>

<h3 class="text-center" style="margin-top: 15px;">Category of Product</h3>
<!-- <div class="container">
    <button data-bs-toggle="modal" data-bs-target="#exampleModal"
        class="btn btn-primary btn-sm" style="margin-bottom: 10px;">
        <i style="margin-right: 5px;" class="fas fa-plus"></i>Add Category
    </button>
</div> -->

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
                                            <th scope="col">InventoryID</th>
                                            <th scope="col">ProductID</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">ReorderLevel</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = 'SELECT * from inventory';
                                        $result = $con->query($sql);
                                        while ($row = $result->fetch_assoc()) {
                                        ?>
                                            <tr>
                                                <td><?php echo $row['InventoryID'] ?></td>
                                                <td><?php echo $row['ProductID'] ?></td>
                                                <td><?php echo $row['Quantity'] ?></td>
                                                <td><?php echo $row['ReorderLevel'] ?>
                                                    <?php
                                                    $Quantity = $row['Quantity'];
                                                    $ReorderLevel = $row['ReorderLevel'];
                                                    //<=reorder level but >0
                                                    if ($Quantity <= $ReorderLevel && $Quantity > 0) {
                                                    ?>
                                                        <span style="float: right;" class="badge bg-warning">Low Stock</span> <?php
                                                                                                                            } else if ($Quantity >= $ReorderLevel) {
                                                                                                                                ?>
                                                        <span style="float: right;" class="badge bg-info">Normal Stock</span> <?php

                                                                                                                            } else if ($Quantity == 0) {
                                                                                                                                ?>
                                                        <span style="float: right;" class="badge bg-danger">Out Stock</span> <?php

                                                                                                                            }
                                                                                                                                ?>

                                                </td>

                                                <td>
                                                    <button data-id="<?php echo $row['InventoryID'] ?>"
                                                        data-reoder="<?php echo $row['ReorderLevel'] ?>"
                                                        data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-sm btn-primary editinventory"><i class="fas fa-edit"></i></button>

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

<!-- modal add category -->


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Reorder Level</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Reorder Level</label>
                        <input type="number" class="form-control" id="reorderlevel" aria-describedby="emailHelp">
                        <input type="hidden" id="idupdate" value="">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary btn_save_reorderlevel">Update</button>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $('.editinventory').click(function() {
            var inventoryid = $(this).data('id');
            var reorderlevel = $(this).data('reoder');
            $('#reorderlevel').val(reorderlevel);
            $('#idupdate').val(inventoryid);


        });
        $('.btn_save_reorderlevel').click(function() {
            var reorderlevel = $('#reorderlevel').val();
            var id = $('#idupdate').val();
            $.ajax({
                url: "../../action/Inventory/update.php",
                method: "POST",
                data: {
                    reorderlevel: reorderlevel,
                    id: id
                },
                success: function(response) {
                    if (response == 'success') {
                        Swal.fire({
                            title: 'Success!',
                            text: 'Reorderlevel updated successfully',
                            icon: 'success',
                            timer: 1500,
                            showConfirmButton: false
                        }).then(function() {
                            location.reload();
                        })
                    } else {
                        Swal.fire({
                            title: 'Error!',
                            text: 'Reorderlevel already exists',
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
            var catename = $(this).data('name');
            var cateid = $(this).data('id');
            $('#category_id_update').val(cateid);
            $('#category_name_update').val(catename);
        })

        $('.btn_update_category').click(function() {
            var category_name = $('#category_name_update').val();
            var cateid = $('#category_id_update').val();
            $.ajax({
                url: "../../action/Category/update.php",
                method: "POST",
                data: {
                    category_name: category_name,
                    cateid: cateid

                },
                success: function(response) {
                    if (response == 'success') {
                        Swal.fire({
                            title: 'Success!',
                            text: 'Category updated successfully',
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
                    url: "../../action/Category/delete.php",
                    method: "POST",
                    data: {
                        id: id
                    },
                    success: function(response) {
                        if (response == 'success') {
                            Swal.fire({
                                title: 'Success!',
                                text: 'Category deleted successfully',
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