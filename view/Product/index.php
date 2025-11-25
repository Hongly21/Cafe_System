<?php
include('../../root/Header.php');
include('../../Config/conect.php');
include('../../root/DataTable.php');

?>

<h3 class="text-center" style="margin-top: 15px;">All Product List</h3>
<div class="container">
    <button data-bs-toggle="modal" data-bs-target="#exampleModal"
        class="btn btn-primary btn-sm" style="margin-bottom: 10px;">
        <i style="margin-right: 5px;" class="fas fa-plus"></i>Add Product
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
                                            <th scope="col">ProID</th>
                                            <th scope="col">CateID</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = 'SELECT * from products';
                                        $run = $con->query($sql);
                                        while ($row = $run->fetch_assoc()) {
                                        ?>
                                            <tr>
                                                <td><?php echo $row['ProductID'] ?></td>
                                                <td><?php echo $row['CategoryID'] ?></td>
                                                <td><?php echo $row['Name'] ?></td>
                                                <td>$ <?php echo $row['Price'] ?></td>
                                                <td><?php echo $row['StockQty'] ?></td>
                                                <td>
                                                    <img src="../../assets/images/<?php echo $row['Image'] ?>" style="width: 60px; height: 60px; border-radius: 50%; object-fit: contain;">
                                                </td>
                                                <td>
                                                    <button data-bs-toggle="modal" data-bs-target="#editModal" class="btn btn-primary btn-sm editbtn"
                                                        data-id="<?php echo $row['ProductID'] ?>"
                                                        data-name="<?php echo $row['Name'] ?>"
                                                        data-price="<?php echo $row['Price'] ?>"
                                                        data-quantity="<?php echo $row['StockQty'] ?>"
                                                        data-image="<?php echo $row['Image'] ?>"
                                                        data-category="<?php echo $row['CategoryID'] ?>">Edit</button>
                                                    <button class="btn btn-danger btn-sm" onclick="deleteCategory(<?php echo $row['ProductID'] ?>)">Delete</button>

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


<!-- add product modal -->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add New Product</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="proname" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Product Category</label>
                        <select class="form-select" aria-label="Default select example" id="category_id">
                            <option selected>Choose Category</option>
                            <?php
                            $sql = 'SELECT * from categories';
                            $result = $con->query($sql);
                            while ($row = $result->fetch_assoc()) {
                            ?>
                                <option value="<?php echo $row['CategoryID'] ?>"><?php echo $row['Name'] ?></option>
                            <?php
                            }
                            ?>
                        </select>

                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Product Price</label>
                        <input type="text" class="form-control" id="proprice" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Product Quantity</label>
                        <input type="text" class="form-control" id="proquantity" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Product Image</label>
                        <input type="file" class="form-control" id="proimage" aria-describedby="emailHelp">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary btn_save_product">Save</button>
            </div>
        </div>
    </div>
</div>


<!-- Edit product modal -->

<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Product</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="pronameupdate" aria-describedby="emailHelp">
                        <input type="hidden" name="id" id="idupdate" value="">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Product Category</label>
                        <select class="form-select" aria-label="Default select example" id="category_idupdate" name="category_id">
                            <option selected>Choose Category</option>
                            <?php
                            $sql = 'SELECT * from categories';
                            $result = $con->query($sql);
                            while ($row = $result->fetch_assoc()) {
                            ?>
                                <option value="<?php echo $row['CategoryID'] ?>"><?php echo $row['Name'] ?></option>
                            <?php
                            }
                            ?>
                        </select>

                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Product Price</label>
                        <input type="text" class="form-control" id="propriceupdate" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Product Quantity</label>
                        <input type="text" class="form-control" id="proquantityupdate" aria-describedby="emailHelp">
                    </div>

                    <div class="mb-3">
                        <img id="newImagePreview" src="" style="width: 80px; height: 80px; object-fit: contain; border:1px solid #ccc;">
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Product Image</label>
                        <input type="file" class="form-control" id="proimageupdate" aria-describedby="emailHelp">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary btn_update_product">Save</button>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {

        $('.btn_save_product').click(function() {

            // Create FormData
            var formData = new FormData();

            formData.append('product_name', $('#proname').val());
            formData.append('category_id', $('#category_id').val());
            formData.append('product_price', $('#proprice').val());
            formData.append('product_quantity', $('#proquantity').val());
            formData.append('product_image', $('#proimage')[0].files[0]);

            $.ajax({
                url: "../../action/Product/add.php",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {

                    if (response.trim() === 'success') {

                        Swal.fire({
                            title: 'Success!',
                            text: 'Product added successfully',
                            icon: 'success',
                            timer: 1500,
                            showConfirmButton: false
                        }).then(() => {
                            location.reload();
                        });

                    } else {
                        Swal.fire({
                            title: 'Error!',
                            text: response,
                            icon: 'error',
                            timer: 1500,
                            showConfirmButton: false
                        });
                    }
                }
            });
        });


        $('.editbtn').click(function() {
            var id = $(this).data('id');
            var name = $(this).data('name');
            var price = $(this).data('price');
            var quantity = $(this).data('quantity');
            var image = $(this).data('image');
            var category = $(this).data('category');

            // Set values to modal fields
            $('#idupdate').val(id);
            $('#pronameupdate').val(name);
            $('#propriceupdate').val(price);
            $('#proquantityupdate').val(quantity);
            $('#category_idupdate').val(category);

            // Set current image preview
            $('#newImagePreview').attr('src', '../../assets/images/' + image);
        })

        $('.btn_update_product').click(function() {
            var formData = new FormData();
            formData.append('id', $('#idupdate').val());
            formData.append('product_name', $('#pronameupdate').val());
            formData.append('category_id', $('#category_idupdate').val());
            formData.append('product_price', $('#propriceupdate').val());
            formData.append('product_quantity', $('#proquantityupdate').val());
            formData.append('product_image', $('#proimageupdate')[0].files[0]);

            $.ajax({
                url: "../../action/Product/update.php",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.trim() === 'success') {

                        Swal.fire({
                            title: 'Success!',
                            text: 'Product updated successfully',
                            icon: 'success',
                            timer: 1500,
                            showConfirmButton: false
                        }).then(() => {
                            location.reload();
                        });

                    } else {
                        Swal.fire({
                            title: 'Error!',
                            text: response,
                            icon: 'error',
                            timer: 1500,
                            showConfirmButton: false
                        });
                    }
                }
            });
        });


        // Preview new selected image
        $('#proimageupdate').on('change', function(event) {
            var file = event.target.files[0];

            if (file) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#newImagePreview').attr('src', e.target.result);
                };

                reader.readAsDataURL(file);
            }
        });





    });



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
                    url: "../../action/Product/delete.php",
                    method: "POST",
                    data: {
                        id: id
                    },
                    success: function(response) {
                        if (response == 'success') {
                            Swal.fire({
                                title: 'Success!',
                                text: 'Product deleted successfully',
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