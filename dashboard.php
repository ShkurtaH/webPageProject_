<?php
include "layout/header.php";
session_start();
include "db/db.php";
if (isset($_SESSION['username']) && isset($_SESSION['id'])) { ?>

    <div class="todo">
    <nav>
    <?php if ($_SESSION['role'] == 'admin') { ?>
        <!-- For Admin -->
        <div class="admin-top-header flex custom-justify">
            <figure class="admin-logo">
                <img src="assets/images/general/Shkurta-Photographer.jpg" alt="" title="">
            </figure>
            <div class="dashboard-btns">
                <?= $_SESSION['username'] ?>
                <a href="logout.php" class="btn">Logout</a>
            </div>
        </div>
        <div class="tabset">
            <!-- Tab 1 -->
            <input type="radio" name="tabset" id="tab1" aria-controls="users" checked>
            <label for="tab1">Users</label>
            <!-- Tab 2 -->
            <input type="radio" name="tabset" id="tab2" aria-controls="homeslider">
            <label for="tab2">Home Slider</label>
            <!-- Tab 3 -->
            <input type="radio" name="tabset" id="tab3" aria-controls="navigation">
            <label for="tab3">Navigation</label>
            <!-- Tab 4 -->
            <input type="radio" name="tabset" id="tab4" aria-controls="features">
            <label for="tab4">Features</label>
            <!-- Tab 5 -->
            <input type="radio" name="tabset" id="tab5" aria-controls="team">
            <label for="tab5">Team</label>
            <!-- Tab 6 -->
            <input type="radio" name="tabset" id="tab6" aria-controls="portfolio">
            <label for="tab6">Portfolio</label>

            <div class="tab-panels">
                <section id="users" class="tab-panel">
                    <?php include 'php/members.php'; ?>
                </section>
                <section id="homeslider" class="tab-panel">
                    <?php include('php/home-slider.php') ?>
                </section>
                <section id="navigation" class="tab-panel">
                   <?php include "php/navigation.php"; ?>
                </section>
                <section id="features" class="tab-panel">
                   <?php include "php/features.php"; ?>
                </section>
                <section id="team" class="tab-panel">
                   <?php include "php/team.php"; ?>
                </section>
                <section id="portfolio" class="tab-panel">
                   <?php include "php/portfolio-dashboard.php"; ?>
                </section>
            </div>

        </div>

    <?php } else { ?>
        <!-- FORE USERS -->
        <div class="admin-top-header flex custom-justify">
            <figure class="admin-logo">
                <img src="assets/images/general/Vanesa-Photographer.jpg" alt="" title="">
            </figure>
            <div class="dashboard-btns flex">
                <p>Welcome <strong><?= $_SESSION['username'] ?></strong></p>
                <a href="logout.php" class="btn">Logout</a>
            </div>
        </div>
    <?php } ?>

<?php } else {
    header("Location: index.php");
} ?>