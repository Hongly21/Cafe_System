<?php
include('../../root/Header.php');
include('../../Config/conect.php');
include('../../root/DataTable.php');

?>

<h3 class="text-center" style="margin-top: 15px;">Category of Product</h3>


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
