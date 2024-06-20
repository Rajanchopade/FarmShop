<?php
session_start();
include 'config.php';

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

$username = $_SESSION['username'];

// Fetch user data from the database
$sql = "SELECT * FROM buyer WHERE username='$username'";
$result = mysqli_query($conn, $sql);

if ($result->num_rows > 0) {
    $row = mysqli_fetch_assoc($result);
    $username = $row['username'];
    $email = $row['email'];
    $mobileno = $row['mobileno'];
    $address = $row['address'];
} else {
    echo "User data not found!";
    exit();
}

// Check if the form is submitted for updating profile
if (isset($_POST['updateProfile'])) {
    $newUsername = $_POST['newUsername'];
    $newEmail = $_POST['newEmail'];
    $newMobileNo = $_POST['newMobileNo'];
    $newAddress = $_POST['newAddress'];

    // Update the user data in the database
    $updateSql = "UPDATE buyer SET username='$newUsername', email='$newEmail', mobileno='$newMobileNo', address='$newAddress' WHERE username='$username'";
    $updateResult = mysqli_query($conn, $updateSql);

    if ($updateResult) {
        // Update successful, fetch the updated data
        $username = $newUsername;
        $email = $newEmail;
        $mobileno = $newMobileNo;
        $address = $newAddress;
        echo "<script>alert('Profile updated successfully.')</script>";
    } else {
        echo "<script>alert('Error updating profile.')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>User Profile</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.2/css/all.min.css'>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>


    <link rel="stylesheet" href="nav.css" />
    <link rel="stylesheet" href="bprofile.css" />
    <style>


.nr_li a {
    color: inherit;
    text-decoration: none;
}

.nr_li span {
    font-weight: bold;
    color: aqua;
}


.dd_right a:hover {
  text-decoration: underline; /* Add underline on hover */
}

.footer {
      text-align: center;
      padding: 20px;
      background-color: #00000070 ;
      color: white;
      position: fixed;
      bottom: 0;
      width: 100%;
    }
    
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="navbar">
            <div class="logo">
                <a href="#">Farmer</a>
            </div>
            <div class="nav_right">
                <ul>
                    <li class="nr_li"> <!-- Add this line -->
                        <span>Welcome,
                            <?php echo $username; ?>
                        </span> 
                    </li>
                    <li class="nr_li">
                        <a href="buyer.php">
                            <i class="fas fa-sharp fa-light fa-home"></i>
                        </a>
                    </li>
                   

                    <li class="nr_li dd_main">
                        <i class="fas fa-sharp fa-regular fa-bars"></i>
                        <div class="dd_menu">
                            <div class="dd_left">
                                <ul>

                                    <li><i class="fas fa-map-marker-alt"></i></li>
                                    <!-- <li><i class="fas fa-sharp fa-regular fa-bookmark"></i></li> -->
                                    <li><i class="fas fa-sign-out-alt"></i></li>
                                </ul>
                            </div>
                            <div class="dd_right">
                                <ul>
                                    <li><a href="address.php">Address</a></li>
                                    <!-- <li><a href="saved.php">Saved</a></li> -->
                                    <li><a href="logout.php">Logout</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>


    <div class="profile-container">
    <div class="profile-card">
        <div class="info-container">
            <p><strong>Username:</strong><p><?php echo $username; ?></p></p>
        </div>
        <div class="info-container">
            <p><strong>Email:</strong><p><?php echo $email; ?></p></p>
        </div>
        <div class="info-container">
            <p><strong>Mobile No:</strong><p><?php echo $mobileno; ?></p></p>
        </div>
        <div class="info-container">
            <p><strong>Address:</strong><p><?php echo $address; ?></p></p>
        </div>
        <button class="Ebutton" onclick="showEditForm()">Edit Profile</button>
    </div>


        <!-- Edit Form -->
        <div class="edit-form" id="editForm" style="display: none;">
            <h2>Edit Profile</h2>
            <form action="" method="post">
                <label for="newUsername">New Username:</label>
                <input type="text" id="newUsername" name="newUsername" value="<?php echo $username; ?>" required>

                <label for="newEmail">New Email:</label>
                <input type="email" id="newEmail" name="newEmail" value="<?php echo $email; ?>" required>

                <label for="newMobileNo">New Mobile No:</label>
                <input type="text" id="newMobileNo" name="newMobileNo" value="<?php echo $mobileno; ?>" required>

                <label for="newAddress">New Address:</label>
                <textarea id="newAddress" name="newAddress" rows="4" required><?php echo $address; ?></textarea>

                <button type="submit" name="updateProfile">Update Profile</button>
                <button type="button" onclick="hideEditForm()">Cancel</button>
            </form>
        </div>
    </div>
    <div>
    <div class="footer">
      <p>Contact us at: info@farmerswebsite.com</p>
    </div>
    <script>
        function showEditForm() {
            document.getElementById("editForm").style.display = "block";
        }

        function hideEditForm() {
            document.getElementById("editForm").style.display = "none";
        }
    </script>
    <script>
        var dd_main = document.querySelector(".dd_main");

        dd_main.addEventListener("click", function () {
            this.classList.toggle("active");
        });
    </script>
</body>

</html>