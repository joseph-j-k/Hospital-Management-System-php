<?php
include("../Assets/Connection/Connection.php");

$action = $_GET['action'];
$cartId = $_GET['id'];
$quantity = $_GET['qty'];

if ($action == "Update") {
    // Get the current quantity of the product in the cart
    $selCart = "SELECT * FROM tbl_cart WHERE cart_id = '$cartId'";
    $resCart = $con->query($selCart);
    $rowCart = $resCart->fetch_assoc();
    
    $oldQuantity = $rowCart['cart_qty'];
    $medicineId = $rowCart['medicine_id'];

    // Get the stock of the product
    $selStock = "SELECT sum(stock_qty) as stock FROM tbl_stock WHERE medicine_id = '$medicineId'";
    $resStock = $con->query($selStock);
    $rowStock = $resStock->fetch_assoc();

    // Calculate the stock difference
    $stockChange = $quantity - $oldQuantity;

    // Update stock based on quantity change
    if ($stockChange != 0) {
        // If the quantity increased, reduce stock
        if ($stockChange > 0 && $rowStock["stock"] >= $stockChange) {
            $updateStock = "UPDATE tbl_stock SET stock_qty = stock_qty - '$stockChange' WHERE medicine_id = '$medicineId'";
            $con->query($updateStock);
        }
        // If the quantity decreased, increase stock
        else if ($stockChange < 0) {
            $updateStock = "UPDATE tbl_stock SET stock_qty = stock_qty + '" . abs($stockChange) . "' WHERE medicine_id = '$medicineId'";
            $con->query($updateStock);
        }

        // Update the cart quantity
        $updateCart = "UPDATE tbl_cart SET cart_qty = '$quantity' WHERE cart_id = '$cartId'";
        $con->query($updateCart);
    }
}

if ($action == "Delete") {
    // Implement logic to return stock when an item is removed from the cart
    $selCart = "SELECT * FROM tbl_cart WHERE cart_id = '$cartId'";
    $resCart = $con->query($selCart);
    $rowCart = $resCart->fetch_assoc();

    $medicineId = $rowCart['medicine_id'];
    $cartQty = $rowCart['cart_qty'];

    // Return the stock
    $updateStock = "UPDATE tbl_stock SET stock_qty = stock_qty + '$cartQty' WHERE medicine_id = '$medicineId'";
    $con->query($updateStock);

    // Remove the cart item
    $deleteCart = "DELETE FROM tbl_cart WHERE cart_id = '$cartId'";
    $con->query($deleteCart);
}
?>
