<?php
include 'config.php';

if(isset($_POST['updateProduct'])) {
    // Handle product update operation
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $price = $_POST['price'];
    $end_date = $_POST['end_date'];
    // You can add more fields as necessary

    // Update the product details in the database
    $stmt = $conn->prepare("UPDATE addform SET product_name=?, price=?, end_date=? WHERE product_id=?");
    $stmt->bind_param("sdsi", $product_name, $price, $end_date, $product_id);
    $stmt->execute();

    // Check if the update was successful
    if ($stmt->affected_rows > 0) {
        echo json_encode(array('success' => 'Product details updated successfully'));
    } else {
        echo json_encode(array('error' => 'Failed to update product details'));
    }

    $stmt->close();
    $conn->close();
} else {
    // Handle case where updateProduct is not set
    echo json_encode(array('error' => 'Invalid request'));
}
?>
