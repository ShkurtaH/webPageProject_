<?php
include ('layout/header.php');
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
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
                        <a href="contact.php">Contact</a>
                    </li>
                </ul>
            </div>
            <div class="login">
                <a href="logout.php" class="btn">Log out</a>
            </div>
        </div>
        <div class="banner-content">
            <h1 class="my-5">Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our site.</h1>
            <a href="index.php" class="btn">Explore now</a>
        </div>
    </section>
</main>
<?php include ('layout/header.php');
include ('layout/footer.php');
?>
