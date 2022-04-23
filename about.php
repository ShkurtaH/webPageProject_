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
            <?php
            $crud = new crud();
            $result = $crud->selectalldata("team");
            while ($data = mysqli_fetch_array($result)) {
                ?>
                <div class="photographer">
                    <img src="assets/images/general/<?php echo $data['image']; ?>" alt="Shkurta">
                    <div class="biography-box">
                        <h2><?php echo $data['firstname']; ?> <?php echo $data['lastname']; ?></h2>
                        <p class="description-text"><?php echo $data['position']; ?></p>
                        <?php echo $data['biography']; ?>
                    </div>
                </div>
            <?php }
            ?>
        </div>
    </div>
    <!--Main content ends-->
</main>
<?php include('layout/footer.php') ?>
