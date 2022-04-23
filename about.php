<?php include('layout/header.php') ?>
<?php include_once ("Crud.php") ?>
<!-- Main Starts -->
<main>
    <!-- Banner Starts -->
    <section class="banner"
             style="background-image: linear-gradient(rgba(0,0,0,0.7),rgba(0,0,0,0.5)), url('assets/images/general/about-banner.jpg');background-size: cover; background-position: center;position:relative; padding: 0 0 190px 0;">
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
            <h2>HIGH VALUES</h2>
            <p>
                "Our success is not only due to the quality of our work;
                it's sown to attitude, our approach and the way we treat our clients."
            </p>
        </div>
    </section>
    <!-- Banner Ends -->
    <!-- Main Starts -->
    <!-- Main content starts-->
    <div class="about-main-content">
        <div class="main-container">
            <ul>
                <?php
                $crud = new crud();
                $result = $crud->selectalldata("features");
                while ($data = mysqli_fetch_array($result)) {
                    ?>
                    <li>
                        <span class="feature-label"><?php echo $data['step']; ?></span>
                        <br>
                        <span class="icon-feature">
                            <img src="assets/images/general/<?php echo $data['icon']; ?>" alt="Passion">
                        </span>
                        <h2 class="feature-title"><?php echo $data['title']; ?></h2>
                        <div class="feature-text">
                            <?php echo $data['teaser']; ?>
                        </div>
                    </li>
                <?php }

                ?>
            </ul>
        </div>
    </div>
    <div class="team">
        <div class="strapline">
            <h1>MEET THE TEAM</h1>
        </div>
        <div class="teamworker">
            <div class="photographer">
                <img src="assets/images/general/Shkurta-Photographer.jpg" alt="Shkurta">
                <div class="biography-box">
                    <h2>Shkurta Hoxha</h2>
                    <p class="description-text">Founder & Photographer</p>
                    <p>As a photographer I want my photos to imagine a bold, exciting world—one in which the
                        subject, be it a product or a person, stands out, shines. Viewers need to be transported,
                        and my photos achieve that through careful compositions of color and tone. This is the end
                        result of a process by which I bring the creative brief to life and make the subject part of
                        a story.
                        <br>
                        This is the power that photography’s always had for me. I recognized it when I took my first
                        photo class, back when I was growing up in Puerto Rico. So, I apprenticed with photographers
                        and shot for a variety of publications. Eventually, to continue my education, I moved to the
                        United States. Here I’ve broadened my capacities and become an art director, shepherding
                        ideas from briefs to concepts to production shoots to deliverables. To each project I bring
                        my experience and my keen eye.
                    </p>
                </div>
            </div>
            <div class="photographer">
                <img src="assets/images/general/Vanesa-Photographer.jpg" alt="Shkurta">
                <div class="biography-box">
                    <h2>Vanesa Hoxha</h2>
                    <p class="description-text">Photographer</p>
                    <p>It is important to know that a great photographer is one who captures all that is commonly
                        unnoticed. I work with a different ‘eye’ altogether. The lens of a camera explores a world
                        of various perspectives. Some treat photography as an art, they feel it has the power to
                        manipulate realities and present them in an attractive way. Others feel that art and
                        photography are miles apart, since a photograph reflects exactly what’s in front of the
                        camera.</p>
                </div>

            </div>
        </div>
    </div>
    <!--Main content ends-->
</main>

<?php include('layout/footer.php') ?>
