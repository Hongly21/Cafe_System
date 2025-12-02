<?php
include '../../Config/conect.php';

$products = $con->query("SELECT COUNT(*) AS total FROM products")->fetch_assoc()['total'];
$categories = $con->query("SELECT COUNT(*) AS total FROM categories")->fetch_assoc()['total'];
$orders = $con->query("SELECT COUNT(*) AS total FROM orders")->fetch_assoc()['total'];

$revenue = $con->query("SELECT SUM(TotalAmount) AS total FROM orders")->fetch_assoc()['total'];
$revenue = $revenue ? $revenue : 0;


$labels = [];
$data = [];

$res = $con->query("
    SELECT c.Name AS category_name, COUNT(p.ProductID) AS total
    FROM categories c
    LEFT JOIN products p ON c.CategoryID = p.CategoryID
    GROUP BY c.CategoryID
");

while ($row = $res->fetch_assoc()) {
    $labels[] = $row['category_name'];
    $data[] = $row['total'];
}


$top5_labels = [];
$top5_data = [];

$top5 = $con->query("
    SELECT p.Name, SUM(od.Quantity) AS sold
    FROM orderdetails od
    JOIN products p ON p.ProductID = od.ProductID
    GROUP BY od.ProductID
    ORDER BY sold DESC
    LIMIT 5
");

while ($row = $top5->fetch_assoc()) {
    $top5_labels[] = $row['Name'];
    $top5_data[] = $row['sold'];
}



$month_labels = [];
$month_data = [];

$topMonth = $con->query("
    SELECT p.Name, SUM(od.Quantity) AS sold
    FROM orderdetails od
    JOIN orders o ON od.OrderID = o.OrderID
    JOIN products p ON p.ProductID = od.ProductID
    WHERE MONTH(o.OrderDate) = MONTH(CURRENT_DATE())
      AND YEAR(o.OrderDate) = YEAR(CURRENT_DATE())
    GROUP BY od.ProductID
    ORDER BY sold DESC
");

while ($row = $topMonth->fetch_assoc()) {
    $month_labels[] = $row['Name'];
    $month_data[] = $row['sold'];
}



$today_labels = [];
$today_data = [];

$topToday = $con->query("
    SELECT p.Name, SUM(od.Quantity) AS sold
    FROM orderdetails od
    JOIN orders o ON od.OrderID = o.OrderID
    JOIN products p ON p.ProductID = od.ProductID
    WHERE DATE(o.OrderDate) = CURDATE()
    GROUP BY od.ProductID
    ORDER BY sold DESC
");

while ($row = $topToday->fetch_assoc()) {
    $today_labels[] = $row['Name'];
    $today_data[] = $row['sold'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: "Libertinus Sans", sans-serif;
        }

        .container3 {
            width: 95%;
            margin: 25px auto;
        }
    </style>
</head>

<body>

    <h3 class="text-center mt-4">Admin Dashboard</h3>

    <div class="container3">

        <!-- TOP 4 STAT CARDS -->
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


        <!-- CATEGORY CHART -->
        <div>
            <h4 class="text-center">Products by Category</h4>
            <canvas id="categoryChart" height="80"></canvas>
        </div>
        <br>


        <!-- NEW: TOP 5 PRODUCTS -->
        <div>
            <h4 class="text-center mt-5">Top 5 Best-Selling Products (All Time)</h4>
            <canvas id="top5Chart" height="80"></canvas>
        </div>

        <!-- NEW: TOP PRODUCTS THIS MONTH -->
        <div>
            <h4 class="text-center mt-5">Top Products Sold This Month</h4>
            <canvas id="topMonthChart" height="80"></canvas>
        </div>


    </div> <!-- container -->

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        new Chart(document.getElementById('categoryChart'), {
            type: 'bar',
            data: {
                labels: <?= json_encode($labels) ?>,
                datasets: [{
                    label: 'Products',
                    data: <?= json_encode($data) ?>,
                    backgroundColor: 'rgba(54,162,235,0.7)'
                }]
            }
        });


        /* ------------------------------Top 5 best selling--------------------------------*/
        new Chart(document.getElementById('top5Chart'), {
            type: 'bar',
            data: {
                labels: <?= json_encode($top5_labels) ?>,
                datasets: [{
                    label: 'Units Sold',
                    data: <?= json_encode($top5_data) ?>,
                    backgroundColor: 'rgba(255,99,132,0.7)'
                }]
            }
        });


        /* ------------------------------
           TOP PRODUCTS THIS MONTH
        --------------------------------*/
        new Chart(document.getElementById('topMonthChart'), {
            type: 'bar',
            data: {
                labels: <?= json_encode($month_labels) ?>,
                datasets: [{
                    label: 'Units Sold This Month',
                    data: <?= json_encode($month_data) ?>,
                    backgroundColor: 'rgba(75,192,192,0.7)'
                }]
            }
        });

    </script>

</body>

</html>