
<?php
include 'config.php';


if (!isset($_SESSION['username'])) {
  header("Location: index.php");
  exit();
}

$username = $_SESSION['username'];
$sql1 = "SELECT buyer_id FROM buyer WHERE username = ?";
$stmt = $conn->prepare($sql1);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$buyer_id = $row['buyer_id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>

  <section id="all" class="active">
    <div class="card-container"  id="card">
      <?php

      include 'config.php';
      $sql = "SELECT * FROM addform ORDER BY product_id DESC";
      $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) > 0) {
        while ($row = $result->fetch_assoc()) {
         $product_id=$row['product_id'];
         $sql5= "SELECT COUNT(*) FROM likes WHERE product_id = '$product_id'";
         $result5= mysqli_query($conn, $sql5);
         $row5= mysqli_fetch_assoc($result5);
         $count = $row5['COUNT(*)'];
         echo '<div class="card" onclick="showPopInfo(' . $row['product_id'] . ')">';
          echo '<div class="card-icons">';
          echo '<i class="fas fa-heart" likesProduct" data-product-id="' . $row['product_id'] . '" onclick="likesProduct(' . $buyer_id . ', ' . $row['product_id'] . ')"></i>';
      
          echo '<i class="fas fa-sharp fa-regular fa-shopping-cart addToCart" data-product-id="' . $row['product_id'] . '" onclick="addToCart(' . $buyer_id . ', ' . $row['product_id'] . ')"></i>';
          // echo '<i class="fas fa-sharp fa-regular fa-bookmark"></i>';
          echo '</div>';
          echo '<h3>' . $row['product_name'] . '</h3>';
          echo '<img src="images/' . $row['photo'] . '" alt="Product Photo">';
          echo '<p>Price: ' . $row['price'] . '</p>';
          echo '<p>End Date: ' . $row['end_date'] . '</p>';
          $locationCoords = $row['location_coords'];
          echo '<p>Location: <a href="https://www.google.com/maps?q=' . $locationCoords . '" target="_blank"><i class="fas fa-map-marker-alt"></i></a></p>';
          echo '<p>Likes: '.$count.'</p>';
          echo '</div>';
        }
      } else {
        echo "No products found.";
      }

      mysqli_close($conn);
      ?>
    </div>
  </section>




  <!-- Fruits Section -->
  <section id="fruits" class="hidden">
    <div class="card-container"  id="card">
      <?php
      include 'config.php';
      $category = 'fruits';
      $stmt = $conn->prepare("SELECT addform.* 
                              FROM addform 
                              JOIN farmer ON addform.farmer_id = farmer.farmer_id 
                              WHERE addform.category = ?");
      $stmt->bind_param("s", $category);
      $stmt->execute();
      $result = $stmt->get_result();

      while ($row = $result->fetch_assoc()) {
        $product_id=$row['product_id'];
        $sql5= "SELECT COUNT(*) FROM likes WHERE product_id = '$product_id'";
        $result5= mysqli_query($conn, $sql5);
        $row5= mysqli_fetch_assoc($result5);
        $count = $row5['COUNT(*)'];
        echo '<div class="card">';
        echo '<div class="card-icons">';
        echo '<i class="fas fa-heart" likesProduct" data-product-id="' . $row['product_id'] . '" onclick="likesProduct(' . $buyer_id . ', ' . $row['product_id'] . ')"></i>';
        echo '<i class="fas fa-sharp fa-regular fa-shopping-cart addToCart" data-product-id="' . $row['product_id'] . '" onclick="addToCart(' . $buyer_id . ', ' . $row['product_id'] . ')"></i>';
        // echo '<i class="fas fa-sharp fa-regular fa-bookmark"></i>';
        echo '</div>';
        echo '<h3>' . $row['product_name'] . '</h3>';
        echo '<img src="images/' . $row['photo'] . '" alt="Product Photo">';
        echo '<p>Price: ' . $row['price'] . '</p>';
        echo '<p>End Date: ' . $row['end_date'] . '</p>';
        $locationCoords = $row['location_coords'];
        echo '<p>Location: <a href="https://www.google.com/maps?q=' . $locationCoords . '" target="_blank"><i class="fas fa-map-marker-alt"></i></a></p>';
        echo '<p>Likes: '.$count.'</p>';
        echo '</div>';
      }
      $stmt->close();
      $conn->close();
      ?>
    </div>
  </section>


  <!-- Vegetables Section -->
  <section id="vegetables" class="hidden">
    <div class="card-container"  id="card">
      <?php
      include 'config.php';
      $category = 'vegetables';
      $stmt = $conn->prepare("SELECT addform.* 
                              FROM addform 
                              JOIN farmer ON addform.farmer_id = farmer.farmer_id 
                              WHERE addform.category = ?");
      $stmt->bind_param("s", $category);
      $stmt->execute();
      $result = $stmt->get_result();

      while ($row = $result->fetch_assoc()) {
        $product_id=$row['product_id'];
         $sql5= "SELECT COUNT(*) FROM likes WHERE product_id = '$product_id'";
         $result5= mysqli_query($conn, $sql5);
         $row5= mysqli_fetch_assoc($result5);
         $count = $row5['COUNT(*)'];
        echo '<div class="card">';
        echo '<div class="card-icons">';
        echo '<i class="fas fa-heart" likesProduct" data-product-id="' . $row['product_id'] . '" onclick="likesProduct(' . $buyer_id . ', ' . $row['product_id'] . ')"></i>'; 
        echo '<i class="fas fa-sharp fa-regular fa-shopping-cart addToCart" data-product-id="' . $row['product_id'] . '" onclick="addToCart(' . $buyer_id . ', ' . $row['product_id'] . ')"></i>';
        // echo '<i class="fas fa-sharp fa-regular fa-bookmark"></i>';
        echo '</div>';
        echo '<h3>' . $row['product_name'] . '</h3>';
        echo '<img src="images/' . $row['photo'] . '" alt="Product Photo">';
        echo '<p>Price: ' . $row['price'] . '</p>';
        echo '<p>End Date: ' . $row['end_date'] . '</p>';
        $locationCoords = $row['location_coords'];
        echo '<p>Location: <a href="https://www.google.com/maps?q=' . $locationCoords . '" target="_blank"><i class="fas fa-map-marker-alt"></i></a></p>';
        echo '<p>Likes: '.$count.'</p>';
        echo '</div>';

      }
      $stmt->close();
      $conn->close();
      ?>
    </div>
  </section>
  
</body>

</html>