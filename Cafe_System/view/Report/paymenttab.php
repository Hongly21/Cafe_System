<?php
include('../../root/Header.php');
include('../../Config/conect.php');
include('../../root/DataTable.php');



?>
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
                                            <th scope="col">PaymentID</th>
                                            <th scope="col">OrderID</th>
                                            <th scope="col">Amount</th>
                                            <th scope="col">PaymentMethod</th>
                                            <th scope="col">Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = 'SELECT * from payments';
                                        $run = $con->query($sql);
                                        while ($row = $run->fetch_assoc()) {
                                        ?>
                                            <tr>
                                                <td><?php echo $row['PaymentID'] ?></td>
                                                <td><?php echo $row['OrderID'] ?></td>
                                                <td><?php echo $row['Amount'] ?></td>
                                                <td><?php echo $row['PaymentMethod'] ?></td>
                                                <td><?php echo $row['Date'] ?></td>
                                            


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