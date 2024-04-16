<?php
    include "conn.php";
  

    if (isset($_POST["login"])){
        $email = $_POST["email_address"];
        $password = $_POST["pass_word"];

        $sql = "SELECT * FROM login_signup 
        WHERE email_address = '$email' AND pass_word = '$password'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            header("Location: home.php");
            exit();

    }   else{
        echo "Login failed. Please try again.";
    }
     mysqli_close($conn);
    }


    if(isset($_POST["register"])){
        $email = $_POST["email_address"];
        $username = $_POST["user_name"];
        $password = $_POST["pass_word"];
        $sql = "INSERT INTO login_signup (email_address, user_name, pass_word) 
        VALUES ('$email', '$username', '$password')";

        if(mysqli_query($conn, $sql)){
            echo "New record created successfully";
        } else{
            echo "Error: ".$sql. "<br>". mysqli_error($conn);
        }

    
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="login.css">
</head>
<body>
        <div class="banner">
            <div class="navbar">
                <img src="images/eat_run_logo.png" alt="">
                

                <div class="login-signup-button">
                    <div class="icons">
                        <button class="login-button" onclick="openLogin()">
                           Log in
                        </button>
                        <button class="signup-button" onclick="openSignup()">
                           Sign up
                        </button>
                </div>
                </div>

            </div>
        </div>

        <section class="home-section">
            <div class="text-content">
                <h3>Ideliver Mo to Mambu</h3>
                <p>Discover top Restaurant and Specials in Town</p>
            </div>

            <div class="search-restaurant">
                <input type="search" placeholder="Enter Search...">
                <button type="submit">Search Restaurant</button>
            </div>

        </section>
      
  <div class="popup" id="popup-login" style="display: none;">
    <div class="close-btn" onclick="closeLogin()">&times;</div>
    <div class="text">
        <h2>Login to your account.</h2>
        <p>Please sign in to your account.</p>
            
            <form action="login.php" method="post" id="login">
                <label for="email_address">Email Address</label>
                <input type="email" name="email_address">
                <label for="pass_word">Password</label>
                <input type="password" name="pass_word">
                <button type="submit" onclick="signIn()" id="show-login" name="login">Sign In</button>
                <a href="#" class="forgot-password">Forgot Password?</a>

                    <div class="or-container">
                        <hr class="hr-left">
                        <span class="or-text">Or sign in with</span>
                        <hr class="hr-right">
                    </div>

                    <div class="social-icon">
                        <a href=""><img src="images/google (3).png" alt="google"></a>
                        <a href=""><img src="images/facebook (3).png" alt=""></a>
                    </div>


                    <div class="register-container">
                        Don't have an account? <a href="">Register</a>
                    </div>

                </form>



        </div>
  </div>

  <div class="popup" id="popup-signup" style="display: none;" >
    <div class="close-btn" onclick="closeSignup()">&times;</div>

  <div class="text">
    <h2>Create your new account.</h2>
    <p>Create an account to start looking for the food you like</p>
        
        <form action="login.php" method="post">
            <label for="email_address">Email Address</label>
            <input type="email" name="email_address">
            <label for="user_name">Username</label>
            <input type="text" name="user_name">
            <label for="pass_word">Password</label>
            <input type="password" name="pass_word">

            <div class="agreement-container">
                <input type="checkbox" id="agree" name="agree">
                <label for="agree">I agree to the <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a>.</label>
            </div>

            <button type="submit" name="register">Register</button>

                <div class="or-container">
                    <hr class="hr-left">
                    <span class="or-text">Continue with</span>
                    <hr class="hr-right">
                </div>

                <div class="social-icon">
                    <a href=""><img src="images/google (3).png" alt="google"></a>
                    <a href=""><img src="images/facebook (3).png" alt=""></a>
                </div>


                <div class="register-container">
                    Have an account? <a href="">Sign In</a>
                </div>

            </form>

</div>
  </div>


  <script src="main.js"></script>

</body>
</html>