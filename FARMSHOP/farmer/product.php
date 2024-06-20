<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Dropdown Menu using HTML CSS and Javascript</title>
    <link rel="stylesheet" href="styles.css" />
    <link rel="stylesheet" href="styles1.css" />

    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <style>

.dropdown {
        position: relative;
        display: inline-block;
      }
  
      .dropbtn {
        font-weight: 900;
        color: white;
        background: transparent;
        font-size: 20px;
        border: none;
        cursor: pointer;
      }
  
      .dropbtn:hover {
        color: aqua;
      }
  
      .dropdown-content {
        top: 50px;
        display: none;
        position: absolute;
        background-color: #f1f1f1;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
      }
  
      .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
      }
  
      .dropdown-content a:hover {
        background-color: #ddd;
      }
  
      .show {
        display: block;
      }

      .edit-icon {
            top: 8px;
            right: 8px;
            color: #666;
            font-size: 18px;
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
                <li> <!-- dropdown -->
            <div class="dropdown">
              <button onclick="showDropdown()" class="dropbtn">Products</button>
              <div id="dropdown-content" class="dropdown-content">
                <a href="#" onclick="showSection('fruits')">Fruits</a>
                <a href="#" onclick="showSection('vegetables')">Vegetables</a>
              </div>
            </div>
          </li>
                    <li class="nr_li">
                        <a href="farmer.php">
                            <i class="fas fa-sharp fa-light fa-home"></i>
                        </a>
                    </li>
                    <li class="nr_li" id="addBtn">
                        <i class="fas fa-plus-square"></i>
                    </li>
                    <!-- <li class="nr_li">
            <a href="cart.php">
              <i class="fas fa-sharp fa-regular fa-shopping-cart">Cart</i>
            </a>
          </li> -->
                    <li class="nr_li dd_main">
                        <i class="fas fa-sharp fa-regular fa-bars"></i>
                        <div class="dd_menu">
                            <div class="dd_left">
                                <ul>
                                    <li><i class="fas fa-sharp fa-regular fa-user"></i></li>
                                    <li><i class="fas fa-map-marker-alt"></i></li>
                                    <li><i class="fas fa-sharp fa-regular fa-bookmark"></i></li>

                                    <li><i class="fas fa-sign-out-alt"></i></li>
                                </ul>
                            </div>
                            <div class="dd_right">
                                <ul>
                                    <li><a href="fprofile.php">Profile</a></li>
                                    <li><a href="address.php">Address</a></li>
                                    <li><a href="saved.php">Saved</a></li>
                                    <li><a href="logout.php">Logout</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>


    <div class="content-container">
    <?php include 'product_show.php'; ?>
  </div>



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

            dd_main.addEventListener("click", function() {
                this.classList.toggle("active");
            });
        </script>
        <script>
            var addBtn = document.getElementById("addBtn");
            var addForm = document.getElementById("addForm");

            addBtn.addEventListener("click", function() {
                addForm.style.display = "block";
            });

            var cancelBtn = document.getElementById("cancelBtn");
            cancelBtn.addEventListener("click", function() {
                addForm.style.display = "none";
            });
        </script>
        <script>
            var getLocationSymbol = document.getElementById("locationSymbol");

            getLocationSymbol.addEventListener("click", function() {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(
                        (position) => {
                            const latitude = position.coords.latitude;
                            const longitude = position.coords.longitude;
                            const locationCoords = `${latitude}, ${longitude}`;

                            document.getElementById("locationCoords").value = locationCoords;

                            document.getElementById("location").value = `(${latitude}, ${longitude})`;
                        },
                        (error) => {
                            console.error("Error getting location:", error.message);
                        }
                    );
                } else {
                    console.error("Geolocation is not supported by this browser.");
                }
            });
        </script>

        <script>
            function showSection(sectionId) {
                const sections = document.querySelectorAll('section');
                sections.forEach(section => {
                    section.classList.add('hidden');
                });

                const selectedSection = document.getElementById(sectionId);
                if (selectedSection) {
                    selectedSection.classList.remove('hidden');
                }
            }
        </script>
          <script>
    function showDropdown() {
      var dropdownContent = document.getElementById("dropdown-content");
      dropdownContent.classList.toggle("show");
    }

    window.onclick = function(event) {
      if (!event.target.matches('.dropbtn')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
          var openDropdown = dropdowns[i];
          if (openDropdown.classList.contains('show')) {
            openDropdown.classList.remove('show');
          }
        }
      }
    }
  </script>



</body>

</html>