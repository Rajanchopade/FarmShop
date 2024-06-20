<?php
session_start();
include 'config.php';
$username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="nav.css" />
<script src="script.js"></script>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>
<body>
<div class="wrapper">
        <div class="navbar">
            <div class="logo">
                <a href="#">Farmer</a>
            </div>
            <div class="nav_right">
                <ul>
                    <li class="nr_li"> 
                        <span>Welcome,
                            <?php echo $username; ?>
                        </span> 
                    </li>
                    <li class="nr_li">
                        <a href="buyer.php">
                            <i class="fas fa-sharp fa-light fa-home">Home</i>
                        </a>
                    </li>
                    <li class="nr_li">
                        <a href="cart.php">
                            <i class="fas fa-sharp fa-regular fa-shopping-cart">Cart</i>
                            </a>
                    </li>

                    <li class="nr_li dd_main">
                        <i class="fas fa-sharp fa-regular fa-bars"></i>
                        <div class="dd_menu">
                            <div class="dd_left">
                                <ul>
                                <li><i class="fas fa-sharp fa-regular fa-user"></i></li>
                                    
                                    <li><i class="fas fa-sharp fa-regular fa-bookmark"></i></li>
                                    
                                    <li><i class="fas fa-sign-out-alt"></i></li>
                                </ul>
                            </div>
                            <div class="dd_right">
                                <ul>
                                <li><a href="bprofile.php">Profile</a></li> 
                                   
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

</body>
<script>
var dd_main = document.querySelector(".dd_main");

dd_main.addEventListener("click", function () {
  this.classList.toggle("active");
});</script>
</html>