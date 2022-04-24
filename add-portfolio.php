<?php
include("layout/header.php");
include_once("Crud.php");

$crud = new crud();
$image = "";
$image_err = "";

if (isset($_POST['submit'])) {
    if (empty(trim($_POST["image"]))) {
        $image_err = "Please upload an image";
    }
    if (empty($image_err)) {
        $data = array(
            "image" => $crud->escape_string($_POST['image']),
        );
        $crud->insert($data, 'portfolio');
        if ($data) {
            echo 'insert successfully';
            header('location:portfolio-list.php');
        } else {
            echo 'try again';
        }
    }
}
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['id'])) { ?>
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
            <form method="POST" name="form">
                <h4>Add new item to portfolio gallery</h4>
                <div class="form-group">
                    <input type="file" class="main-input" name="image" placeholder="Image">
                    <div id="portfolio-image-error" class="text-error"><?php echo $image_err; ?></div>
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" class="btn" value="Save">
                </div>
            </form>
        </div>
    <?php } else { ?>
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
</nav>

