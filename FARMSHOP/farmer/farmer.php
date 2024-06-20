<?php
session_start();
include 'config.php';
if (!isset($_SESSION['username'])) {
    header("Location: index2.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>Farmer Selling Website</title>
  <link rel="stylesheet" href="styles.css" />
  <link rel="stylesheet" href="styles1.css" />
  <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
  <style>

body {
      background-image: url(images/farmers2.jpg);
      background-size: cover;
      background-repeat: no-repeat;
    }

    .navbar {
      background-color: transparent;
      position: fixed;
      width: 100%;
      z-index: 999;
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
          <li class="nr_li" id="addBtn">
            <i class="fas fa-plus-square"></i>
          </li>
          <li class="nr_li dd_main">
          <i class="fas fa-bars"></i>
            <div class="dd_menu">
              <div class="dd_left">
                <ul>
                  <li><i class="fas fa-sharp fa-regular fa-user"></i></li>
                  <li><i class="fas fa-map-marker-alt"></i></li>
                  <li><i class="fas fa-sharp fa-regular fa-grid-2"></i></li>
                  <li><i class="fas fa-sign-out-alt"></i></li>
                </ul>
              </div>
              <div class="dd_right">
                <ul>
                  <li><a href="fprofile.php">Profile</a></li>
                  <li><a href="Address.php">Address</a></li>
                  <li><a href="product.php">Products</a></li>
                  <li><a href="logout.php">Logout</a></li>
                </ul>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>

  <!-- Form Section -->
  <div class="add-form" id="addForm" style="display: none">
    <h2>Add Data</h2>
    <form action="process_add.php" method="post" enctype="multipart/form-data">
      <label for="name">Product Name:</label>
      <input type="text" id="name" name="name" required />

      <label for="price">Price:</label>
            <input type="number" id="price" name="price" required />

      <label for="endDate">End Date:</label>
      <input type="date" id="edate" name="endDate" required />

      <label for="photo">Photo:</label>
      <input type="file" id="photo" name="photo" accept="image/*" required />

      <label for="location">Farm Location (Google Maps):</label>
      <input type="text" id="location" name="location" placeholder="Enter coordinates or address" required />

      <label for="category">Category:</label>
      <li style="display: inline-flex;">
        <input type="radio" id="fruits" name="category" value="fruits" required />
        <label for="fruits">Fruits</label>

        <input type="radio" id="vegetables" name="category" value="vegetables" required />
        <label for="vegetables">Vegetables</label>
      </li>
      <button type="submit">Submit</button>
      <button type="button" id="cancelBtn">Cancel</button>
    </form>
  </div>




  <div>
    <div class="footer">
      <p>Contact us at: info@farmerswebsite.com</p>
    </div>

    <script>
      var dd_main = document.querySelector(".dd_main");

      dd_main.addEventListener("click", function () {
        this.classList.toggle("active");
      });

      var addBtn = document.getElementById("addBtn");
      var addForm = document.getElementById("addForm");

      addBtn.addEventListener("click", function () {
        addForm.style.display = "block";
      });

      var cancelBtn = document.getElementById("cancelBtn");
      cancelBtn.addEventListener("click", function () {
        addForm.style.display = "none";
      });
    </script>
</body>

</html>