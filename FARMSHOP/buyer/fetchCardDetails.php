<?php
include 'config.php';
// Inside fetchFarmerDetails function
$stmt = $conn->prepare("SELECT farmer.*
                        FROM addform 
                        JOIN farmer ON addform.farmer_id = farmer.farmer_id 
                        WHERE addform.product_id = ?");
$stmt->bind_param("s", $productId);
$stmt->execute();
$result = $stmt->get_result();

// Display farmer details
while ($row = $result->fetch_assoc()) {
  echo '<h4>Farmer Details</h4>';
  echo '<p>Name: ' . $row['name'] . '</p>';
  echo '<p>Email: ' . $row['email'] . '</p>';
  echo '<p>Mobile No: ' . $row['mobile_no'] . '</p>';
  echo '<p>Address: ' . $row['address'] . '</p>';
}
$stmt->close();
?>
