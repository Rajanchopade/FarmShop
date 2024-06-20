<?php
include 'config.php';
session_start();

if (isset($_POST['buyer_id']) && isset($_POST['product_id'])) {
    $buyer_id = $_POST['buyer_id'];
    $product_id = $_POST['product_id'];

    $sql = "SELECT * FROM likes WHERE buyer_id = ? AND product_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $buyer_id, $product_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $sqlDelete = "DELETE FROM likes WHERE buyer_id = ? AND product_id = ?";
        $stmtDelete = $conn->prepare($sqlDelete);
        $stmtDelete->bind_param("ii", $buyer_id, $product_id);
        $stmtDelete->execute();
        $stmtDelete->close();
    } else {
        $sqlInsert = "INSERT INTO likes (buyer_id, product_id, likedata) VALUES (?, ?, 1)";
        $stmtInsert = $conn->prepare($sqlInsert);
        $stmtInsert->bind_param("ii", $buyer_id, $product_id);
        $stmtInsert->execute();
        $stmtInsert->close();
    }

}

mysqli_close($conn);
?>
