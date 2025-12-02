<?php
include('../../root/Header.php');
include('../../Config/conect.php');
include('../../root/DataTable.php');



?>
<!-- data table -->
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
                                            <th scope="col">OrderID</th>
                                            <th scope="col">OrderDate</th>
                                            <th scope="col">TableNo</th>
                                            <th scope="col">TotalAmount</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">PaymentType</th>
                                            <th scope="col">UserID</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = 'SELECT * from orders';
                                        $run = $con->query($sql);
                                        while ($row = $run->fetch_assoc()) {
                                        ?>
                                            <tr>
                                                <td><?php echo $row['OrderID'] ?></td>
                                                <td><?php echo $row['OrderDate'] ?></td>
                                                <td><?php echo $row['TableNo'] ?></td>
                                                <td>$ <?php echo $row['TotalAmount'] ?></td>
                                                <td><?php echo $row['Status'] ?></td>
                                                <td><?php echo $row['PaymentType'] ?></td>
                                                <td><?php echo $row['UserID'] ?></td>


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