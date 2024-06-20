<?php
include "buyerid.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>Farmer Selling Website</title>
  <link rel="stylesheet" href="nav.css" />
  <link rel="stylesheet" href="styles1.css" />
  <link rel="stylesheet" href="styles3.css" />
  <!-- <script src="buyer.js"></script> -->

  <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
  <style>
    .card {

      position: relative;
    }

    .card-icons {
      position: absolute;
      display: flex;
      justify-content: flex-end;
      align-items: center;
      top: 0;
      right: 0;
      padding: 10px;
    }

    .card-icons i {
      cursor: pointer;
      font-size: 20px;
      color: rgba(0, 0, 0, 0.522);
      margin-left: 10px;
    }

    .card-icons i:hover {
      color: black;
    }

 
  </style>
</head>

<body>
  <div class="wrapper">
    <div class="navbar">
      <div class="logo">
        <a href="#">Farmer</a>
      </div>



      <!-- search -->
      <form id="searchForm"  class="searchbox">
  <input type="text" class="form-search" id="searchInput" name="search" placeholder="Search for fruits, vegetables">
  <button type="submit" class="submit-search" id="searchButton">
    <i class="fas fa-search"></i>
  </button>
</form>


      <div class="nav_right">


        <ul>
          <li> <!-- dropdown -->
            <div class="dropdown">
            <!-- <button onclick="findNearestProducts()">Find</button> -->
              <button onclick="showDropdown()" class="dropbtn">Products</button>
              <div id="dropdown-content" class="dropdown-content">
                <a href="#" onclick="showSection('fruits')">Fruits</a>
                <a href="#" onclick="showSection('vegetables')">Vegetables</a>
              </div>
            </div>
          </li>
          <li class="nr_li">
            <a href="cart.php">
              <?php
              include "config.php";
              $sql = "SELECT COUNT(*) FROM cart WHERE buyer_id = '$buyer_id'";
              $result = mysqli_query($conn, $sql);
              $row = mysqli_fetch_assoc($result);
              $count = $row['COUNT(*)'];
              ?>
              <i class="fas fa-sharp fa-regular fa-shopping-cart"><?php echo $count; ?></i>
            </a>
          </li>

          <!-- toogle -->
          <li class="nr_li dd_main">
            <i class="fas fa-bars"></i>
            <!-- toogle data -->
            <div class="dd_menu">
              <div class="dd_left">
                <ul>
                  <li><i class="fas fa-sharp fa-regular fa-user"></i></li>
                  <li><i class="fas fa-map-marker-alt"></i></li>
                  <!-- <li><i class="fas fa-sharp fa-regular fa-bookmark"></i></li> -->
                  <li><i class="fas fa-sign-out-alt"></i></li>
                </ul>
              </div>
              <div class="dd_right">
                <ul>
                  <li><a href="bprofile.php">Profile</a></li>
                  <li><a href="orders.php">Orders</a></li>
                  <!-- <li><a href="bookmark.php">Saved</a></li> -->
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
    <?php include 'fechdata.php'; ?>
  </div>


  <div class="popinfo" style="width:100%">
  <section class="popdata" id="cardDetails"></section>
  <section class="popdata" id="farmerDetails"></section>
</div>



  <div class="footer">
    <p>Contact us at: info@farmerswebsite.com</p>
  </div>


  
  <script>
  document.addEventListener("DOMContentLoaded", function () {
    const cards = document.querySelectorAll(".card");
    const popinfo = document.querySelector(".popinfo");

    cards.forEach(function (card) {
      card.addEventListener("click", function () {
        const productId = this.dataset.productId;
        fetchCardDetails(productId);
        fetchFarmerDetails(productId);
        popinfo.style.display = "block";
      });
    });

    function fetchCardDetails(productId) {
  // Send AJAX request to fetch card details
  fetch('fetchCardDetails.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded',
    },
    body: `productId=${encodeURIComponent(productId)}`,
  })
  .then(response => response.text())
  .then(data => {
    // Update #cardDetails section with the fetched card details
    document.getElementById('cardDetails').innerHTML = data;
  })
  .catch(error => {
    console.error('Error fetching card details:', error);
  });
}

// function fetchFarmerDetails(productId) {
//   // Send AJAX request to fetch farmer details
//   fetch('fetchFarmerDetails.php', {
//     method: 'POST',
//     headers: {
//       'Content-Type': 'application/x-www-form-urlencoded',
//     },
//     body: `productId=${encodeURIComponent(productId)}`,
//   })
//   .then(response => response.text())
//   .then(data => {
//     // Update #farmerDetails section with the fetched farmer details
//     document.getElementById('farmerDetails').innerHTML = data;
//   })
//   .catch(error => {
//     console.error('Error fetching farmer details:', error);
//   });
// }

  });
</script>


  <script>
  document.getElementById("searchForm").addEventListener("submit", function(event) {
    event.preventDefault();

  
    var searchQuery = document.getElementById("searchInput").value.toLowerCase();

    var cards = document.querySelectorAll(".card");

    cards.forEach(function(card) {

      var productName = card.querySelector("h3").innerText.toLowerCase();

      if (productName.includes(searchQuery)) {
        card.style.display = "block";
      } else {
        card.style.display = "none";
      }
    });
  });
</script>

  <script>
    function addToCart(buyer_id, product_id) {

      fetch('addtocart.php', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
          },
          body: `buyer_id=${encodeURIComponent(buyer_id)}&product_id=${encodeURIComponent(product_id)}`,
        })
        .then(response => {
          if (!response.ok) {
            throw new Error('Network response was not ok');
          }
          return response.text();
        })
        .then(data => {
          console.log(data);
        })
        .catch(error => {
          console.error('There was a problem with the fetch operation:', error);
        });
    }
  </script>
  <script>
    function likesProduct(buyer_id, product_id) {

      fetch('likesProduct.php', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
          },
          body: `buyer_id=${encodeURIComponent(buyer_id)}&product_id=${encodeURIComponent(product_id)}`,
        })
        .then(response => {
          if (!response.ok) {
            throw new Error('Network response was not ok');
          }
          return response.text();
        })
        .then(data => {
          console.log(data);
        })
        .catch(error => {
          console.error('There was a problem with the fetch operation:', error);
        });
    }
  </script>

  <script>
    var dd_main = document.querySelector(".dd_main");

    dd_main.addEventListener("click", function() {
      this.classList.toggle("active");
    });
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
  // Function to handle the "Find" button click
function findNearestProducts() {
    if (navigator.geolocation) {
        // Prompt user for location access
        navigator.geolocation.getCurrentPosition(getNearestProducts);
    } else {
        alert("Geolocation is not supported by this browser.");
    }
}
// Callback function to handle user's current position
function getNearestProducts(position) {
    const latitude = position.coords.latitude;
    const longitude = position.coords.longitude;

    // Send AJAX request to server with user's coordinates
    fetch('findNearestProducts.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ latitude, longitude })
    })
    .then(response => response.text()) // Change to text() to inspect response
    .then(data => {
        console.log(data); // Log the response data
        // Attempt to parse the response as JSON
        try {
            const jsonData = JSON.parse(data);
            // Check if data is empty
            if (jsonData.length === 0) {
                alert("No products found near your location.");
            } else {
                // Update HTML content with nearest product cards
                updateNearestProductCards(jsonData);
            }
        } catch (error) {
            console.error('Error parsing JSON:', error);
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
}


  </script>

</body>

</html>