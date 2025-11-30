<?php
include('../../Config/conect.php');

$cart = json_decode($_POST['cartData'], true);
$cash = $_POST['cash'];
$totalamount = $_POST['totalamount'];

// 1️ INSERT INTO ORDERS (insert once only)
$sqlorder = "INSERT INTO orders (OrderDate, TableNo, Status, TotalAmount, PaymentType, UserID)
             VALUES (NOW(), 'Delivery', 'Pending', '$totalamount', '$cash', 1)";

$runorder = $con->query($sqlorder);

if (!$runorder) {
    echo "Order Insert Error: " . $con->error;
    exit;
}

// Get last inserted OrderID
$orderID = $con->insert_id;


//  INSERT ORDER DETAILS + UPDATE STOCK
foreach ($cart as $item) {

    $proid  = $item['proid'];
    $qty    = $item['qty'];      // you must send qty from frontend
    $price  = $item['price'];
    $subtotal = $price * $qty;

    // Insert into orderdetails
    $sqlorderdetail = "INSERT INTO orderdetails (OrderID, ProductID, Quantity, Subtotal)
                       VALUES ('$orderID', '$proid', '$qty', '$subtotal')";
    $con->query($sqlorderdetail);

    // Update product stock
    $sqlupdate = "UPDATE products 
                  SET StockQty = StockQty - $qty
                  WHERE ProductID = '$proid'";
    $con->query($sqlupdate);

    //update inventory stock
    $sqlinventory = "UPDATE inventory SET Quantity = Quantity-$qty WHERE ProductID='$proid'";
    $con->query($sqlinventory);
}


//  INSERT PAYMENT
$sqlpayment = "INSERT INTO payments (OrderID, Amount, PaymentMethod, Date)
               VALUES ('$orderID', '$totalamount', '$cash', NOW())";

$con->query($sqlpayment);


//  RESPONSE
echo "Success";
