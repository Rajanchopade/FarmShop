<?php
include 'config.php';
session_start();
if (isset($_SESSION['username'])) {
    header("Location:index2.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AgroFarm</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.2/css/all.min.css'>
    <link rel="stylesheet" href="farmer.css">
</head>
<body>
    <div class="container" id="container">
        <!-- Sign Up Container -->
        <div class="form-container sign-up-container">
            <form action="#" method="POST" class="signin">
                <?php
                // include 'config.php';
                // session_start();
                error_reporting(0);
             
                if (isset($_SESSION['username'])) {
                    header("Location:farmer.php");

                }

                if (isset($_POST['submit'])) {
                    $username = $_POST['username'];
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    $cpassword = $_POST['cpassword'];
                    $mobileno = $_POST['mobileno'];
                    $address = $_POST['address'];

                    // Email and Password Criteria
                    $emailRegex = "/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/";
                    $passwordRegex = "/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/";

                    if ($password == $cpassword && preg_match($emailRegex, $email) && preg_match($passwordRegex, $password)) {
                        // Mobile Number Size Limit
                        if (strlen($mobileno) == 10) {
                            $sql = "SELECT * FROM farmer WHERE email='$email'";
                            $result = mysqli_query($conn, $sql);

                            if (!$result->num_rows > 0) {
                                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                                $sql = "INSERT INTO farmer (username, email, password, mobileno, address) VALUES('$username' , '$email' , '$hashedPassword', '$mobileno', '$address')";
                                $result = mysqli_query($conn, $sql);
                                if ($result) {
                                    $_SESSION['username'] = $username;
                                    header("Location:farmer.php");
                                    $username = "";
                                    $email = "";
                                    $mobileno = "";
                                    $_POST['password'] = "";
                                    $_POST['cpassword'] = "";
                                } else {
                                    echo "<script>alert('Oops! something went wrong.')</script>";
                                }
                            } else {
                                echo "<script>alert('Email Already Exists.')</script>";
                            }
                        } else {
                            echo "<script>alert('Invalid Mobile Number.')</script>";
                        }
                    } else {
                        echo "<script>alert('Invalid Email or Password.')</script>";
                    }
                }
                ?>
                <h1>Create Account And  Join with Us</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <span>or use your email for registration</span>
                <input type="text" name="username" placeholder="Username" value="<?php echo $username; ?>" required>
                <input type="email" name="email" placeholder="Email" value="<?php echo $email; ?>" required>
                <input type="password" name="password" placeholder="Password" value="<?php echo $_POST['password']; ?>" required>
              
                <input type="password" name="cpassword" placeholder=" Confirm Password" value="<?php echo $_POST['cpassword']; ?>" required>
                <input type="text" name="mobileno" placeholder="Mobile No" value="<?php echo $mobileno; ?>" required>

                <input type="text" name="address" placeholder="Address" value="<?php echo $address; ?>" required>

                <button name="submit" value="register">Sign Up</button>
            </form>
        </div>

        <!-- Sign In Container -->
        <div class="form-container sign-in-container">
            <form action="#" method="POST" class="signin">
                <?php
                // include 'config.php';
                // session_start();
                error_reporting(0);

                if (isset($_SESSION['username'])) {
                    header("Location:farmer.php");
                }

                if (isset($_POST['login'])) {
                    $email = $_POST['email'];
                    $password = $_POST['password'];

                    $sql = "SELECT * FROM farmer WHERE email='$email'";
                    $result = mysqli_query($conn, $sql);

                    if ($result->num_rows > 0) {
                        $row = mysqli_fetch_assoc($result);
                        if (password_verify($password, $row['password'])) {
                            $_SESSION['username'] = $row['username'];
                            header("Location:farmer.php");
                        } else {
                            echo "<script>alert('Incorrect Password.')</script>";
                        }
                    } else {
                        echo "<script>alert('Email not found.')</script>";
                    }
                }
                ?>
                <h1>Sign in And  add more Products</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <span>or use your account</span>
                <input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
                <input type="password" placeholder="Password" name="password" required>
                <a href="#">Forgot your password?</a>
                <button name="login" value="Login">Sign In</button>
            </form>
        </div>

        <!-- Overlay Container -->
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>To keep connected with us, please login with your personal info</p>
                    <button class="ghost" id="signIn">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Hello, Friend!</h1>
                    <p>Enter your personal details and start the journey with us</p>
                    <button class="ghost" id="signUp">Sign Up</button>
                </div>
            </div>
        </div>
    </div>

    <!-- partial -->
    <script src="./script.js"></script>

</body>

</html>
