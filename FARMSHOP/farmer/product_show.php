<?php
include 'config.php';

if (!isset($_SESSION['username'])) {
    header("Location: index2.php");
    exit();
}

$username = $_SESSION['username'];
$sql1 = "SELECT farmer_id FROM farmer WHERE username = ?";
$stmt = $conn->prepare($sql1);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$farmer_id = $row['farmer_id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- <style>
        /* Add your CSS styles here */
        .popup-form {
            display: none;
            position: fixed; 
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: white;
            padding: 20px;
            border: 1px solid #ccc;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }
    </style> -->
</head>
<body>
  
    <section id="fruits" class="active">
        <div class="card-container" id="card">
            <?php
            include 'config.php';
            $category = 'fruits';
            $stmt = $conn->prepare("SELECT addform.* 
                                    FROM addform 
                                    JOIN farmer ON addform.farmer_id = farmer.farmer_id 
                                    WHERE addform.category = ? AND farmer.farmer_id = ?");
            $stmt->bind_param("si", $category, $farmer_id);
            $stmt->execute();
            $result = $stmt->get_result();

            while ($row = $result->fetch_assoc()) {
                echo '<div class="card">';
                echo '<i class="far fa-pen-to-square edit-icon" onclick="showEditForm(' . $row['product_id'] . ')"></i>';
                echo '<h3>' . $row['product_name'] . '</h3>';
                echo '<img src="images/' . $row['photo'] . '" alt="Product Photo">';
                echo '<p>Price: ' . $row['price'] . '</p>';
                echo '<p>End Date: ' . $row['end_date'] . '</p>';
                $locationCoords = $row['location_coords'];
                echo '<p>Location: <a href="https://www.google.com/maps?q=' . $locationCoords . '" target="_blank"><i class="fas fa-map-marker-alt"></i></a></p>';
                echo '</div>';
            }
            $stmt->close();
            $conn->close();
            ?>
        </div>
    </section>
    <section id="vegetables" class="hidden">
    <div class="card-container" id="card">
        <?php
        include 'config.php';
        $category = 'vegetables';
        $stmt = $conn->prepare("SELECT addform.* 
                              FROM addform 
                              JOIN farmer ON addform.farmer_id = farmer.farmer_id 
                              WHERE addform.category = ? AND farmer.farmer_id = ?");
        $stmt->bind_param("si", $category, $farmer_id);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            echo '<div class="card">';
            echo '<i class="far fa-pen-to-square edit-icon" onclick="showEditForm(' . $row['product_id'] . ')"></i>';
            echo '<h3>' . $row['product_name'] . '</h3>';
            echo '<img src="images/' . $row['photo'] . '" alt="Product Photo">';
            echo '<p>Price: ' . $row['price'] . '</p>';
            echo '<p>End Date: ' . $row['end_date'] . '</p>';
            $locationCoords = $row['location_coords'];
            echo '<p>Location: <a href="https://www.google.com/maps?q=' . $locationCoords . '" target="_blank"><i class="fas fa-map-marker-alt"></i></a></p>';
            echo '</div>';
        }
        $stmt->close();
        $conn->close();
        ?>
    </div>
</section>
   
</body>
</html>
