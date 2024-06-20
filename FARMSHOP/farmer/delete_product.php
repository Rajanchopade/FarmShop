<?php
include 'config.php';

if(isset($_POST['productId'])) {
    // Get the product ID from the POST data
    $productId = $_POST['productId'];

    // Perform the delete operation
    $stmt = $conn->prepare("DELETE FROM addform WHERE product_id = ?");
    $stmt->bind_param("i", $productId);
    $stmt->execute();

    // Check if the deletion was successful
    if ($stmt->affected_rows > 0) {
        // Return a success message
        echo json_encode(array('message' => 'Product deleted successfully'));
    } else {
        // Return an error message
        echo json_encode(array('error' => 'Failed to delete product'));
    }

    $stmt->close();
    $conn->close();
} else {
    // Handle case where productId is not set
    echo json_encode(array('error' => 'Invalid request'));
}
?>
