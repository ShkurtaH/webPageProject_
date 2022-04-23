<?php include('layout/header.php') ?>
<?php
// Initialize the session
session_start();
include_once("Crud.php");
?>
<main>
    <!-- Banner Starts -->
    <section class="banner"
             style="background-image: linear-gradient(rgba(0,0,0,0.7),rgba(0,0,0,0.5)), url('assets/images/general/home-banner.jpg');background-size: cover; background-position: center;position:relative; padding: 0 0 190px 0;">
        <div class="header">
            <div class="logo">
                <figure>
                    <a href="/">
                        <img src="assets/images/icons/logo[photography].png" alt="Logo">
                    </a>
                </figure>
            </div>
            <div class="navigation">
                <ul>
                    <?php
                    $crud = new crud();
                    $result = $crud->selectalldata("navigation");
                    while ($data = mysqli_fetch_array($result)) {
                        ?>
                        <li>
                            <a href="<?php echo $data['url']; ?>"><?php echo $data['title']; ?></a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
            <div class="login">
                <a href="register.php" class="btn">SIGN UP</a>
            </div>
        </div>
        <div class="banner-content">
            <p>
                "Photography is a way of feeling, of touching, of loving. What you have caught on film is captured
                forever... it remembers little things, long after you have forgotten everything."
            </p>
        </div>
    </section>
    <!-- Banner Ends -->
    <!-- Main Starts -->
    <!-- Portfolio Starts -->
    <section class="portfolio space">
        <div class="center">
            <h2>
                Work Portfolio!
            </h2>
        </div>
        <div class="portfolio-list">
            <?php
            $crud = new crud();
            $result = $crud->selectalldata("homeslider");
            while ($data = mysqli_fetch_array($result)) {
                ?>
                <div class="mySlides animate">
                    <a href="portfolio.php">
                        <img src="assets/images/general/<?php echo $data['image']; ?>" alt="slide"/>
                    </a>
                    <div class="number"><?php echo $data['id']; ?> / 3</div>
                    <div class="text"><?php echo $data['title']; ?></div>
                </div>
            <?php } ?>

            <!-- Next and previous buttons -->
            <a class="prev" onclick="prevSlide()">&#10094;</a>
            <a class="next" onclick="nextSlide()">&#10095;</a>

            <!-- The dots/circles -->
            <div class="dots-container">
                <span class="dots" onclick="currentSlide(1)"></span>
                <span class="dots" onclick="currentSlide(2)"></span>
                <span class="dots" onclick="currentSlide(3)"></span>
            </div>
        </div>
    </section>
    <!-- Portfolio Ends -->
    <!-- Main content starts-->
    <div class="main-content space">
        <div class="main-content-image">
            <img src="assets/images/general/photographer.jpg" alt="Photographer">
        </div>
        <div class="main-content-description">
            <h2>Love for photography...</h2>
            <p>People start doing photography (versus taking snaps or selfies) for many reasons. It might be a major
                life event coming up – new baby, wedding, special birthday – or that overseas trip saved up for over
                many years. It might be that the capabilities of your phone frustrate you enough to want to get real
                about photography. However it happens, suddenly you find yourself with an empty bank account and
                some form of camera gear that you now need to figure out how and where and maybe even, why to use
                it.</p>
            <p>
                Photography allows you to create images of events, times, and places. To both record what happened
                and allow you to share them with friends and family, either in digital format or more permanently
                with prints or photo books. By being able to capture a special moment in time, you carry the memory
                of that event forward with you, allowing you to share it and remember it with those that were there.
                Those memories become part of your history, perhaps family lore, not just stories passed down
                through the generations – but images as well. As the popular idiom says, “A picture is worth a
                thousand words”.
            </p>
        </div>
    </div>
    <!--Main content ends-->
    <!-- Main Ends -->
</main>
<!-- <script src="assets/js/index.js"></script> -->
<script>
    let slideIndex = 0;
    showSlides();

    // Next-previous control
    function nextSlide() {
        slideIndex++;
        showSlides();
        timer = _timer; // reset timer
    }

    function prevSlide() {
        slideIndex--;
        showSlides();
        timer = _timer;
    }

    // Thumbnail image controls
    function currentSlide(n) {
        slideIndex = n - 1;
        showSlides();
        timer = _timer;
    }

    function showSlides() {
        let slides = document.querySelectorAll(".mySlides");
        let dots = document.querySelectorAll(".dots");

        if (slideIndex > slides.length - 1) slideIndex = 0;
        if (slideIndex < 0) slideIndex = slides.length - 1;

        // hide all slides
        slides.forEach((slide) => {
            slide.style.display = "none";
        });

        // show one slide base on index number
        slides[slideIndex].style.display = "block";

        dots.forEach((dot) => {
            dot.classList.remove("active");
        });

        dots[slideIndex].classList.add("active");
    }

    // autoplay slides --------
    let timer = 7; // sec
    const _timer = timer;

    // this function runs every 1 second
    setInterval(() => {
        timer--;

        if (timer < 1) {
            nextSlide();
            timer = _timer; // reset timer
        }
    }, 1000); // 1sec
</script>
<?php include('layout/footer.php') ?>

