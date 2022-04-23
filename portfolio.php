<?php include('layout/header.php') ?>
<?php include_once ("Crud.php") ?>
    <!-- Main Starts -->
    <main>
        <!-- Banner Starts -->
        <section class="banner"
            style="background-image: linear-gradient(rgba(0,0,0,0.7),rgba(0,0,0,0.5)), url('assets/images/general/portfolio-banner.jpg'); background-position: center;padding: 0 0 190px 0; background-size: cover;">
            <div class="header">
                <div class="logo">
                    <figure>
                        <a href="index.php">
                            <img src="assets/images/icons/logo[photography].png" alt="Logo">
                        </a>
                    </figure>
                </div>
                <?php include "partial/navigation.php";?>
                <div class="login">
                    <a href="register.php" class="btn">SIGN UP</a>
                </div>
            </div>
            <div class="banner-content">
                <p>
                    “When words become unclear, I shall focus with photographs. When images become inadequate, I shall
                    be content with silence.”
                </p>
                <a href="#photography-portfolio" class="btn"> Explore</a>
            </div>
        </section>
        <!-- Banner Ends -->
        <!-- Portfolio Starts -->
        <section class="portfolio space" id="photography-portfolio">
            <div class="center">
                <h2>
                    Portfolio!
                </h2>
            </div>
            <div class="portfolio-list">
                <?php
                $crud = new crud();
                $result = $crud->selectalldata("portfolio");
                while ($data = mysqli_fetch_array($result)) {
                    ?>
                    <div class="portfolio-page-item">
                        <figure>
                            <img src="assets/images/general/<?php echo $data['image']; ?>" alt="<?php echo $data['id']; ?>">
                        </figure>
                    </div>
                <?php }
                ?>
            </div>
        </section>
        <!-- Portfolio Ends -->
        <!-- Main content starts-->
        <div class="portfolio-contact">
            <div class="contact-container">
                <h2>
                    We are happy to <br> answer any questions you may <br> have.
                </h2>

            </div>
            <div class="contact-container">
                <p>
                    Make an appointment for a
                    <br>
                    personal and informative conversation.
                </p>
                <div class="contact-Us">
                    <a href="contact.php" class="btn">Contact Us</a>
                </div>
            </div>

        </div>
        <!-- Main container ends -->
    </main>
    <!-- Main Ends -->

    <!-- Footer Starts -->
    <footer id="footer">
        <div class="content space">
            <div class="footer-widget">
                <a href="index.php">
                    <img src="assets/images/icons/[Photography]].png" alt="Logo">
                </a>
                <p>
                    Dream big, work hard, make it happen!
                </p>
            </div>
            <div class="footer-widget">
                <h3>Get in touch</h3>
                    <div class="footer-content">
                        <i class="fa fa-envelope"></i>
                        <a href="mailto:photography@gmail.com">photography@gmail.com</a>
                        <br>
                        <i class="fa fa-mobile"></i>
                        <a href="tel:049111222">+383 49 111 222</a>
                    </div>
            </div>
            <div class="footer-widget">
                <h3>Social Media</h3>
                    <div class="social-media-list footer-content">
                        <a href="https://facebook.com" target="_blank">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://instagram.com" target="_blank">
                            <i class="fab fa-instagram"></i>
                        </a> 
                        <a href="https://snapchat.com" target="_blank">
                            <i class="fab fa-snapchat-ghost"></i>
                        </a>
                        <a href="https://twitter.com" target="_blank">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <p>
                            Follow me !
                        </p>
                    </div>
            </div>
            <div class="footer-bottom center">
                <p>
                    Copyright &copy; [Photography]. All rights reserved | Design by Shkurta Hoxha and Vanesa Hoxha
                </p>
            </div>
        </div>
    </footer>
    <!-- Footer Ends -->
<?php include('layout/footer.php') ?>