<?php
include "layout/header.php";
include_once("Crud.php");

$crud = new crud();

if (isset($_POST['submit'])) {
    $data = array(
        "step" => $crud->escape_string($_POST['step']),
        "title" => $crud->escape_string($_POST['title']),
        "icon" => $crud->escape_string($_POST['icon']),
        "teaser" => $crud->escape_string($_POST['teaser']),
    );
    $crud->insert($data, 'features');
    if ($data) {
        echo 'insert successfully';
        header('location:features-list.php');
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
                <h4>Add new feature item</h4>
                <div class="form-group">
                    <input type="number" name="step" class="main-input" placeholder="Step">
                </div>
                <div class="form-group">
                    <input type="text" name="title" class="main-input" placeholder="Title">
                </div>
                <div class="form-group">
                    <input type="file" name="icon" class="main-input" placeholder="Icon">
                </div>
                <div class="form-group">
                    <textarea name="teaser" id="" cols="10" rows="20" placeholder="Teaser" class="main-input"></textarea>
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

