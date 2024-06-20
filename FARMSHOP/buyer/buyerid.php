<?php
session_start();
include 'config.php';
$username = $_SESSION['username'];
$sql1 = "SELECT buyer_id FROM buyer WHERE username = ?";
$stmt = $conn->prepare($sql1);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$buyer_id = $row['buyer_id'];
?>