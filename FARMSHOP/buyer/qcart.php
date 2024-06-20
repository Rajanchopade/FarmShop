<?php
include "buyerid.php";
$sql = "SELECT cart.*, product_name, price FROM cart JOIN addform ON cart.product_id = addform.product_id WHERE buyer_id='$buyer_id' and quantity>0";
$result = $conn->query($sql);

$sql_delete =" DELETE FROM cart WHERE quantity <= 0 LIMIT 1";
$conn->query($sql_delete);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_id = $_POST['product_id'];
    $change = $_POST['change'];
    
    $sql = "UPDATE cart SET quantity = quantity + ? WHERE product_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $change, $product_id);
    
    if ($stmt->execute()) {
        echo "Quantity updated successfully";
    } else {
        echo "Error updating quantity: " . $conn->error;
    }
    
    $stmt->close();
}

$conn->close();
?>
