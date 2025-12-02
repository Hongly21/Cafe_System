<?php
include('../../root/Header.php');
include('../../Config/conect.php');


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
                                            <th scope="col">OrderDetailID</th>
                                            <th scope="col">OrderID</th>
                                            <th scope="col">ProductID</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Subtotal</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = 'SELECT * from orderdetails';
                                        $run = $con->query($sql);
                                        while ($row = $run->fetch_assoc()) {
                                        ?>
                                            <tr>
                                                <td><?php echo $row['OrderDetailID'] ?></td>
                                                <td><?php echo $row['OrderID'] ?></td>
                                                <td><?php echo $row['ProductID'] ?></td>
                                                <td> <?php echo $row['Quantity'] ?></td>
                                                <td><?php echo $row['Subtotal'] ?></td>



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