<?php
include "qcart.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="nav.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }

        th {
            color: yellow;
            background-color: #096714;
        }

        .Fsubmit {
            width: 70px;
            cursor: pointer;
            border-radius: 10px;
            font-weight: 900;
            color: white;
            padding: 3px;
            background-color: #09a309;
            font-size: 16px;
        }
    </style>
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
                                    <li><a href="orders.php">Orders</a></li>
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

    <table>
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $total_price = 0;
            while ($row = $result->fetch_assoc()) {
                $total_price += $row['price'] * $row['quantity']; 
                echo "<tr>";
                echo "<td>" . $row['product_name'] . "</td>";
                echo "<td>" . $row['price'] . "</td>";
                echo "<td>" . $row['quantity'] . "</td>";
                echo "<td>
                    <button  onclick='updateQuantity(" . $row['product_id'] . ", -1)'>-</button>
                    <button onclick='updateQuantity(" . $row['product_id'] . ", 1)'>+</button>
                </td>";
                echo "</tr>";
            }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <td>Total:</td>
                <td><?php echo $total_price ?></td>
                <td colspan="2"><button type="submit" class="Fsubmit">Buy</button></td>

            </tr>
        </tfoot>
    </table>


</body>
<script>
    var dd_main = document.querySelector(".dd_main");

    dd_main.addEventListener("click", function() {
        this.classList.toggle("active");
    });

        function updateQuantity(product_id, change) {
    $.ajax({
        type: "POST",
        // url: "updateQuantity.php", // Path to your server-side script
        data: { product_id: product_id, change: change },
        success: function(response) {
           location.reload();
        },
        error: function(xhr, status, error) {
            alert('Error updating quantity: ' + error);
            location.reload();
        }
    });
}
</script>

</html>