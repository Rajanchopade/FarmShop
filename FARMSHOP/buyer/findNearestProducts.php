<?php
// Include your database configuration
include 'config.php';

// Check if latitude and longitude are received
if(isset($_POST['latitude']) && isset($_POST['longitude'])) {
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];

    // Query to select the nearest location coordinates from the addform table
    $sql = "SELECT *, 
            (6371 * acos(cos(radians($latitude)) * cos(radians(SUBSTRING_INDEX(location_coords, ',', 1))) * cos(radians(SUBSTRING_INDEX(location_coords, ',', -1)) - radians($longitude)) + sin(radians($latitude)) * sin(radians(SUBSTRING_INDEX(location_coords, ',', 1))))) AS distance
            FROM addform
            ORDER BY distance ASC
            LIMIT 1";

    // Execute the query
    $result = mysqli_query($conn, $sql);

    // Check if query was successful
    if($result) {
        // Fetch the closest location from the result set
        $closestLocation = mysqli_fetch_assoc($result);

        // Return the closest location data as JSON
        echo json_encode($closestLocation);
    } else {
        // If query fails
        echo "Error: " . mysqli_error($conn);
    }

    // Close database connection
    mysqli_close($conn);
} else {
    // If latitude and/or longitude are not received
    echo "Error: Latitude and/or longitude not received.";
}
?>
