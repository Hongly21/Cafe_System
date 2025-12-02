<?php
include('../../Config/conect.php');

if (isset($_POST['purchaseSupplier'])) {
    $purchaseSupplier = $_POST['purchaseSupplier'];
    $purchaseDate = $_POST['purchaseDate'];
    $lineCost = $_POST['lineCost'];
    $lineProduct = $_POST['lineProduct'];
    $lineQty = $_POST['lineQty'];
    $total = $lineCost * $lineQty;

    $sql = "INSERT INTO `purchases` (`PurchaseID`, `SupplierID`,`Date`,`Total`) VALUES (NULL, '$purchaseSupplier', '$purchaseDate',' $total');";
    $result = $con->query($sql);
    if ($result) {
        $PurchaseID = $con->insert_id;
        $sqlpurcharsedetails = "INSERT INTO `purchasedetails` (`PurchaseDetailID`,`PurchaseID`,`ProductID`,`Qty`,`CostPrice`) VALUES (NUll,'$PurchaseID','$lineProduct','$lineQty','$lineCost')";
        $updateproduct = "UPDATE products SET StockQty=StockQty+$lineQty WHERE ProductID='$lineProduct'";
        $updateinventory = "UPDATE inventory SET Quantity=Quantity+$lineQty WHERE ProductID='$lineProduct'";

        $runinventory = $con->query($updateinventory);
        $runproduct = $con->query($updateproduct);
        $runpurchase = $con->query($sqlpurcharsedetails);
        echo "success";
    } else {
        echo "error";
    }
}
