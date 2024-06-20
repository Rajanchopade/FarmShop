<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $product_name = $_POST['product_name'];
    $price = $_POST['price'];
    $end_date = $_POST['end_date'];
    $location_coords = $_POST['location_coords'];
    $photo = $_FILES['photo']['name'];

    // Upload the photo if a new one is provided
    if ($photo) {
        $target_dir = "images/";
        $target_file = $target_dir . basename($photo);
        move_uploaded_file($_FILES['photo']['tmp_name'], $target_file);
    } else {
        // Fetch the existing photo if a new one is not provided
        $stmt = $conn->prepare("SELECT photo FROM addform WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $photo = $row['photo'];
        $stmt->close();
    }

    $stmt = $conn->prepare("UPDATE addform SET product_name = ?, price = ?, end_date = ?, location_coords = ?, photo = ? WHERE id = ?");
    $stmt->bind_param("sssssi", $product_name, $price, $end_date, $location_coords, $photo, $id);
    if ($stmt->execute()) {
        header("Location: {$_SERVER['HTTP_REFERER']}");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
$conn->close();
?>
