<?php
include("layout/header.php");
include_once("Crud.php");

$id = $_GET['editid'];

$crud = new crud();
$step = $title = $icon = $teaser = "";
$step_err = $title_err = $icon_err = $teaser_err = "";

$data = $crud->selectbyid('features', $id);

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

        $crud->update($data, 'features', $id);

        if ($data) {
            echo 'updated successfully';
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
                <h4>Update <?php echo $data['title']; ?> item</h4>
                <div class="form-group">
                    <input type="text" name="step" value="<?php echo $data['step']; ?>" placeholder="Step" class="main-input">
                    <div id="step-error-1" class="text-error"><?php echo $step_err; ?></div>
                </div>
                <div class="form-group">
                    <input type="text" name="title" value="<?php echo $data['title']; ?>" placeholder="Title" class="main-input">
                    <div id="title-error-3" class="text-error"><?php echo $title_err; ?></div>
                </div>
                <div class="form-group">
                    <input type="file" name="icon" value="<?php echo $data['icon']; ?>" placeholder="Icon" class="main-input">
                    <div id="icon-error-2" class="text-error"><?php echo $icon_err; ?></div>
                </div>
                <div class="form-group">
                    <textarea name="teaser" id="" cols="30" rows="10" class="main-input" placeholder="Teaser"><?php echo $data['teaser']; ?></textarea>
                    <div id="teaser-error-2" class="text-error"><?php echo $teaser_err; ?></div>
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" class="btn" value="Update">
                    <a href="features-list.php" class="btn">Back to features list</a>
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
