<?php
include('../../root/Header.php');
include('../../Config/conect.php');
include('../../root/DataTable.php');

?>

<!-- ROW: Products / Inventory -->
<div class="row g-4 mt-3">
    <div class="col-12">
        <div class="card p-3">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <h5 class="mb-0">Products & Inventory</h5>
                <div>
                    <button class="btn btn-sm btn-dark" data-bs-toggle="modal" data-bs-target="#purchasesModal">Create Purchases</button>
                </div>
            </div>

            <table id="example" class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Product</th>
                        <th>Category</th>
                        <th>Stock</th>
                        <th>Reorder Level</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT Name.CategoryID, Name.Name, Inventory.Quantity, Inventory.ReorderLevel 
                    FROM products Name, inventory Inventory WHERE Name.ProductID=Inventory.ProductID";
                    $run = $con->query($sql);
                    while ($row = $run->fetch_assoc()) {
                    ?>
                        <tr>
                            <td><?php echo $row['Name'] ?></td>
                            <td>
                                <?php
                                $cateid = $row['CategoryID'];
                                $sql1 = "SELECT Name FROM categories WHERE CategoryID='$cateid'";
                                $run1 = $con->query($sql1);
                                $row1 = $run1->fetch_assoc();
                                echo $row1['Name'];
                                ?>
                            </td>
                            <td><?php echo $row['Quantity'] ?></td>
                            <td><?php echo $row['ReorderLevel'] ?></td>
                            <td>
                                <button type="button"
                                    data-name="<?php echo $row['Name'] ?>"
                                    data-qty="<?php echo $row['Quantity'] ?>"
                                    class="btn btn-sm btn-primary restock" data-bs-toggle="modal" data-bs-target="#purchasesModal">Restock
                                </button>
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
                        </tr>
                    <?php
                    }
                    ?>
                    <!-- <tr>
                        <td>Late</td>
                        <td>Coffee</td>
                        <td>20</td>
                        <td>10</td>
                        <td>
                            <button>Restock</button>
                            <button>Edit</button>
                        </td>

                    </tr> -->

                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- purchase Modal -->
<div class="modal fade" id="purchasesModal" tabindex="-1">
    <div class="modal-dialog modal-xl" style="max-width: 760px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create Purchase Order</h5><button class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <!-- Create Purchase -->
                <div class="container">
                    <div class="card p-3">
                        <div class="row g-2">
                            <div class="col-md-4">
                                <label class="form-label">Supplier</label>
                                <select id="purchaseSupplier" class="form-select">
                                    <option value="">Select Supply</option>

                                    <?php
                                    $sql = "SELECT * FROM suppliers";
                                    $run = $con->query($sql);
                                    while ($row = $run->fetch_assoc()) {
                                    ?>
                                        <option value="<?php echo $row['SupplierID'] ?>"><?php echo $row['Name'] ?></option>

                                    <?php
                                    }

                                    ?>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Purchase Date</label>
                                <input id="purchaseDate" type="date" class="form-control">
                            </div>
                        </div>

                        <hr />

                        <!-- Line items -->

                        <div class="row g-2 " style="margin-bottom: 10px;">
                            <div class="col-md-4">
                                <label class="form-label">Product Name</label>
                                <select value="" id="lineProduct" class="form-select">
                                    <option value="">Select Prodcut Name</option>
                                    <?php
                                    $sql = "SELECT * FROM products";
                                    $run = $con->query($sql);
                                    while ($row = $run->fetch_assoc()) {
                                    ?>
                                        <option value="<?php echo $row['ProductID'] ?>"><?php echo $row['Name'] ?></option>

                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-4">

                                <label class="form-label">Quantity</label>
                                <input id="lineQty" type="number" class="form-control " placeholder="Qty" min="1" value="1">
                            </div>
                            <div class="col-md-4">

                                <label class="form-label">Cost Price</label>
                                <input id="lineCost" type="number" class="form-control " placeholder="Cost price" min="0" step="0.01">
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="modal-footer">
                <button class="btn btn-success btn_save">Save Purchase & Update Inventory</button>
                <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- restock Modal  -->


<script>
    $(document).ready(function() {
        $('.btn_save').click(function() {
            var purchaseSupplier = $('#purchaseSupplier').val();
            var purchaseDate = $('#purchaseDate').val();
            var lineProduct = $('#lineProduct').val();
            var lineQty = $('#lineQty').val();
            var lineCost = $('#lineCost').val();

            $.ajax({
                url: "../../action/Purchases/add.php",
                method: "POST",
                data: {
                    purchaseSupplier: purchaseSupplier,
                    purchaseDate: purchaseDate,
                    lineCost: lineCost,
                    lineProduct: lineProduct,
                    lineQty: lineQty
                },
                success: function(response) {
                    if (response == 'success') {
                        Swal.fire({
                            title: 'Success!',
                            text: 'Purchases successfully',
                            icon: 'success',
                            timer: 1500,
                            showConfirmButton: false
                        }).then(function() {
                            location.reload();
                        })
                    } else {
                        Swal.fire({
                            title: 'Error!',
                            text: 'Purchases already exists',
                            icon: 'error',
                            timer: 1500,
                            showConfirmButton: false
                        })

                    }
                }
            })



        })

        // When restock button is clicked
        $(document).on("click", ".restock", function() {
            let productName = $(this).data("name");
            let qty = $(this).data("qty");

            // Set values inside modal
            $("#lineProduct option").filter(function() {
                return $(this).text() === productName;
            }).prop("selected", true);

            $("#lineQty").val(qty);
        });

    })
</script>