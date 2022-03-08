<?php include('layout/header.php') ?>
<main>
    <!--Main Starts-->
    <!-- Banner Starts -->
    <section class="banner"
             style="background-image: linear-gradient(rgba(0,0,0,0.7),rgba(0,0,0,0.5)), url('assets/images/general/LogIn-Register-Banner.jpg'); background-position: center;padding: 0 0 190px 0; background-size: cover;">
        <div class="header">
            <div class="logo">
                <figure>
                    <a href="index.php">
                        <img src="assets/images/icons/logo[photography].png" alt="Logo">
                    </a>
                </figure>
            </div>
            <div class="navigation">
                <ul>
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="about.php"> About</a>
                    </li>
                    <li>
                        <a href="portfolio.php">Portfolio</a>
                    </li>
                    <li>
                        <a href="contact.php" >Contact</a>
                    </li>
                </ul>
            </div>
            <div class="login">
                <a href="register.php" class="btn">Log In</a>
            </div>
        </div>
        <div class="banner-content">
            <p>
                “To me, photography is an art of observation. It’s about finding something interesting in an ordinary place… I’ve found it has little to do with the things you see and everything to do with the way you see them.”
            </p>
        </div>
    </section>
    <div class="contact-info space">
        <div class="flex">
            <form name="registration" action="" method="post" id="registerForm" class="register-form">
                <h3>Don't have an account? / Register Form</h3>
                <div class="form-wrapper">
                    <div class="form-group">
                        <input type="text" name="username" value="" placeholder="First Name" class="main-input"
                               id="first-name" required>
                        <div id="first-name-error" class="text-error"></div>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" value="" placeholder="E-Mail" class="main-input"
                               id="register-email" required>
                        <div id="register-email-error" class="text-error"></div>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" value="" placeholder="Password" class="main-input"
                               id="pwd-register" required>
                        <div id="pwd-register-error" class="text-error"></div>
                    </div>
                    <div class="form-group">
                        <p>If you already registered, <a href="login.php">Login</a></p>
                    </div>
                    <div class="form-group-submit-wrapper flex">
                        <button type="submit" class="btn" id="registerBtn">Register</button>
                    </div>
                </div>
            </form>

        </div>

    </div>
<?php
require('db/db.php');
// If form submitted, insert values into the database.
if (isset($_REQUEST['username'])) {
    // removes backslashes
    $username = stripslashes($_REQUEST['username']);
    //escapes special characters in a string
    $username = mysqli_real_escape_string($con, $username);
    $email = stripslashes($_REQUEST['email']);
    $email = mysqli_real_escape_string($con, $email);
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($con, $password);
    $trn_date = date("Y-m-d H:i:s");
    $query = "INSERT into `users` (username, password, email, trn_date)
VALUES ('$username', '" . md5($password) . "', '$email', '$trn_date')";
    $result = mysqli_query($con, $query);
    if ($result) {
        echo "<div class='form'>
<h3>You are registered successfully.</h3>
<br/>Click here to <a href='login.php'>Login</a></div>";
    }
} else {
    ?>
<?php } ?>
<?php include('layout/footer.php') ?>