<?php
include('../../root/Header.php');
include('../../Config/conect.php');
include('../../root/DataTable.php');

?>

<h3 class="text-center" style="margin-top: 15px;"> Inventory</h3>

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

