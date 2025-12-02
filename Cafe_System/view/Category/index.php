<?php
include('../../root/Header.php');
include('../../Config/conect.php');
include('../../root/DataTable.php');

?>

<h3 class="text-center" style="margin-top: 15px;">Category of Product</h3>
<div class="container">
    <button data-bs-toggle="modal" data-bs-target="#exampleModal"
        class="btn btn-primary btn-sm" style="margin-bottom: 10px;">
        <i style="margin-right: 5px;" class="fas fa-plus"></i>Add Category
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
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = 'SELECT * from categories';
                                        $result = $con->query($sql);
                                        while ($row = $result->fetch_assoc()) {
                                        ?>
                                            <tr>
                                                <td><?php echo $row['CategoryID'] ?></td>
                                                <td><?php echo $row['Name'] ?></td>
                                                <td>
                                                    <button class="btn btn-primary btn_edit_category btn-sm"
                                                        data-id="<?php echo $row['CategoryID'] ?> "
                                                        data-name="<?php echo $row['Name']

                                                                    ?>">Edit</button>
                                                    <button class="btn btn-danger btn-sm" onclick="deleteCategory(<?php echo $row['CategoryID'] ?>)">Delete</button>

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
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add New Category</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="category_name" aria-describedby="emailHelp">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary btn_save_category">Save</button>
            </div>
        </div>
    </div>
</div>

<!-- modal update category -->
<div class="modal fade" id="EditModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Category</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Category Name</label>
                        <input type="text" class="form-control" id="category_name_update" aria-describedby="emailHelp">
                        <input type="hidden" id="category_id_update" value="">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary btn_update_category">Update</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('.btn_save_category').click(function() {
            var category_name = $('#category_name').val();
            $.ajax({
                url: "../../action/Category/add.php",
                method: "POST",
                data: {
                    category_name: category_name
                },
                success: function(response) {
                    if (response == 'success') {
                        Swal.fire({
                            title: 'Success!',
                            text: 'Category added successfully',
                            icon: 'success',
                            timer: 1500,
                            showConfirmButton: false
                        }).then(function() {
                            location.reload();
                        })
                    } else {
                        Swal.fire({
                            title: 'Error!',
                            text: 'Category already exists',
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