<?php
include('../../root/Header.php');
include('../../Config/conect.php');
include('../../root/DataTable.php');

?>

<h3 class="text-center" style="margin-top: 15px;">All Product List</h3>

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
                                                    <img src="../../../Cafe_System/assets/images/<?php echo $row['Image'] ?>" style="width: 60px; height: 60px; border-radius: 50%; object-fit: contain;">
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