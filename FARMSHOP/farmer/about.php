<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
    <link rel="stylesheet" href="styles.css" />
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>

    <style>
        .infop {
    display: flex;
    justify-content: space-around;
}

.infos {
    flex: 1;
    margin: 20px;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    background-color: aquamarine;
}

.infos h2 {
    color: #333;
    font-size: 24px;
    margin-bottom: 10px;
}

.infos pre {
    color: #666;
    font-size: 16px;
    white-space: pre-wrap;
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
        <div class="navbar">
            <div class="logo">
                <a href="#">Farmer</a>
            </div>
            <div class="nav_right">
                <ul>
                    <li class="nr_li">
                        <a href="farmer.php">
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
 


    <div class="infop">
        <section class="infos">
            <h2>Find Nearest Farm And Buy Physically Products From Farm</h2>
            <pre>"Discover the closest farm to purchase fresh produce directly from the source! Simply click on the location icon in the card to pinpoint the farm's whereabouts and receive directions. Enjoy the convenience of sourcing locally grown products while supporting your community's agricultural endeavors."</pre>
        </section>
        <section class="infos">
            <h2>Order Online Product</h2>
            <pre>"Discover and order natural products directly from farmers to promote a healthy lifestyle."</pre>
        </section>
    </div>
    <div class="footer">
      <p>Contact us at: info@farmerswebsite.com</p>
    </div>
    <script>
        var dd_main = document.querySelector(".dd_main");

        dd_main.addEventListener("click", function () {
            this.classList.toggle("active");
        });
    </script>
</body>

</html>