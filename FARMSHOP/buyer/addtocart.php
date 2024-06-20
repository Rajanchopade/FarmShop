<?php
include 'config.php';
session_start();
if (isset($_POST['buyer_id']) && isset($_POST['product_id'])) {
    $buyer_id = $_POST['buyer_id'];
    $product_id = $_POST['product_id'];

    $sql = "SELECT * FROM cart WHERE buyer_id = ? AND product_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $buyer_id, $product_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $sqlUpdate = "UPDATE cart SET quantity = quantity + 1 WHERE buyer_id = ? AND product_id = ?";
        $stmtUpdate = $conn->prepare($sqlUpdate);
        $stmtUpdate->bind_param("ii", $buyer_id, $product_id);
        $stmtUpdate->execute();
        $stmtUpdate->close();
    } else {
        $sqlInsert = "INSERT INTO cart (buyer_id, product_id, quantity) VALUES (?, ?, 1)";
        $stmtInsert = $conn->prepare($sqlInsert);
        $stmtInsert->bind_param("ii", $buyer_id, $product_id);
        $stmtInsert->execute();
        $stmtInsert->close();
    }
}

mysqli_close($conn);
?>
