<?php
include('../../root/Header.php');
include('../../Config/conect.php');
include('../../root/DataTable.php');

?>

<h3 class="text-center" style="margin-top: 15px;">Purchased</h3>
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
                                            <th scope="col">PurchaseID</th>
                                            <th scope="col">SupplierID</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Total</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = 'SELECT * from purchases';
                                        $result = $con->query($sql);
                                        while ($row = $result->fetch_assoc()) {
                                        ?>
                                            <tr>
                                                <td><?php echo $row['PurchaseID'] ?></td>
                                                <td><?php echo $row['SupplierID'] ?></td>
                                                <td><?php echo $row['Date'] ?></td>
                                                <td><?php echo $row['Total'] ?></td>



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