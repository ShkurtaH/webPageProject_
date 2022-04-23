<?php
include("layout/header.php");
include_once("Crud.php");

$crud = new crud();

if (isset($_POST['submit'])) {
    $data = array(
        "title" => $crud->escape_string($_POST['title']),
        "image" => $crud->escape_string($_POST['image'])
    );

    $crud->insert($data, 'homeslider');

    if ($data) {
        echo 'insert successfully';
        header('location:listing.php');
    } else {
        echo 'try again';
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
                <h4>Create new slider</h4>
                <div class="form-group">
                    <input type="text" name="title" placeholder="Title" class="main-input">
                </div>
                <div class="form-group">
                    <input type="file" name="image" placeholder="Upload Image" class="main-input">
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" class="btn" value="Save">
                </div>
            </form>
        </div>
    <?php } else { ?>
        <!-- FOR USERS -->
        <h2>Welcome <?= $_SESSION['username'] ?></h2>
        <a href="logout.php" class="btn btn-dark">Logout</a>
    <?php } ?>
    <?php } else {
        header("Location: index.php");
    } ?>
</nav>

