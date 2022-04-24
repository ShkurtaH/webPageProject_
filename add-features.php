<?php
include "layout/header.php";
include_once("Crud.php");

$crud = new crud();
$step = $title = $icon = $teaser = "";
$step_err = $title_err = $icon_err = $teaser_err = "";

if (isset($_POST['submit'])) {
    if (empty(trim($_POST["step"]))) {
        $step_err = "Please enter a step number.";
    }
    if (empty(trim($_POST["title"]))) {
        $title_err = "Please enter a title";
    }
    if (empty(trim($_POST["icon"]))) {
        $icon_err = "Please upload an icon";
    }
    if (empty(trim($_POST["teaser"]))) {
        $teaser_err = "Please enter a teaser text";
    }
    if (empty($step_err) && empty($title_err) && empty($icon_err) && empty($teaser_err)) {
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
                    <div id="step-error" class="text-error"><?php echo $step_err; ?></div>
                </div>
                <div class="form-group">
                    <input type="text" name="title" class="main-input" placeholder="Title">
                    <div id="title-error-2" class="text-error"><?php echo $title_err; ?></div>
                </div>
                <div class="form-group">
                    <input type="file" name="icon" class="main-input" placeholder="Icon">
                    <div id="icon-error" class="text-error"><?php echo $icon_err; ?></div>
                </div>
                <div class="form-group">
                    <textarea name="teaser" id="" cols="10" rows="20" placeholder="Teaser" class="main-input"></textarea>
                    <div id="teaser-error" class="text-error"><?php echo $teaser_err; ?></div>
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

