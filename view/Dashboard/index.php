<?php

// include '../config.php';

include '../../Config/conect.php';

$products = $con->query("SELECT COUNT(*) AS total FROM products")->fetch_assoc()['total'];


$categories = $con->query("SELECT COUNT(*) AS total FROM categories")->fetch_assoc()['total'];


$orders = $con->query("SELECT COUNT(*) AS total FROM orders")->fetch_assoc()['total'];

$revenue = $con->query("SELECT SUM(TotalAmount) AS total FROM orders")->fetch_assoc()['total'];
$revenue = $revenue ? $revenue : 0;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Libertinus+Sans:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
</head>
<style>
    body {
        font-family: "Libertinus Sans", sans-serif;
    }

    .container3 {
        width: 95%;
        margin: auto;
        margin: 25px 10px 10px 10px;
    }
</style>



<body>
    <h3 class="text-center" style="margin-top: 20px;">Admin Dashboard</h3>
    <div class="container3">

        <div class="row">
            <div class="col-md-3">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Products</h5>
                        <p class="card-text display-6"><?= $products ?></p>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card text-white bg-success mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Categories</h5>
                        <p class="card-text display-6"><?= $categories ?></p>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card text-white bg-warning mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Orders</h5>
                        <p class="card-text display-6"><?= $orders ?></p>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card text-white bg-danger mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Revenue ($)</h5>
                        <p class="card-text display-6">$<?= number_format($revenue, 2) ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <?php
    $labels = [];
    $data = [];
    $res = $con->query("SELECT c.Name as category_name, COUNT(p.ProductID) as total 
                     FROM categories c 
                     LEFT JOIN products p ON c.CategoryID = p.CategoryID 
                     GROUP BY c.CategoryID");

    while ($row = $res->fetch_assoc()) {
        $labels[] = $row['category_name'];
        $data[] = $row['total'];
    }
    ?>


    <div class="chart" style="width: 90%; margin: auto;">
        <h4 style="text-align:center;">Chart of all Product </h4>

        <!-- Add inside dashboard.php below stats -->
        <canvas id="categoryChart" height="100"></canvas>


    </div>
    <br> <br>

</body>
<!-- Include Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('categoryChart').getContext('2d');
    const categoryChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?= json_encode($labels) ?>,
            datasets: [{
                label: 'Products by Category',
                data: <?= json_encode($data) ?>,
                backgroundColor: 'rgba(54, 162, 235, 0.7)'
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    });
</script>

</html>