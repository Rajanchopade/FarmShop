<?php
session_start();

include 'config.php';
if (isset($_SESSION["username"])) {
    $uname = $_SESSION["username"];
    $sql = "SELECT farmer_id FROM farmer WHERE username = '$uname'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $farmer_id = $row['farmer_id'];
        mysqli_free_result($result);
    } else {
        echo "Error: " . mysqli_error($conn);
        exit();
    }
} else {
    header("Location: index2.php");
    exit();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
$productName = $_POST["name"];
$price = isset($_POST["price"]) ? $_POST["price"] : null;
$endDate = isset($_POST["endDate"]) ? $_POST["endDate"] : null;
$photo = $_FILES["photo"]["name"];
$locationCoords = $_POST["location"];
$category=isset($_POST["category"]) ? $_POST["category"] : null;print_r($_POST);

    
    $stmt = $conn->prepare("INSERT INTO addform (product_name, price, end_date, photo, location_coords,category,farmer_id) 
                            VALUES (?, ?, ?, ?, ?,?,?)");
    $stmt->bind_param("sssssss", $productName, $price, $endDate, $photo, $locationCoords,$category,$farmer_id);

    if ($stmt->execute()) {
        header("Location: product.php");
        exit();
        
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
