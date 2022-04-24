<?php
include("layout/header.php");
include_once("Crud.php");

$id = $_GET['editid'];

$crud = new crud();
$title = $image = "";
$title_err = $image_err = "";

$data = $crud->selectbyid('homeslider', $id);

if (isset($_POST['submit'])) {

    if (empty(trim($_POST["title"]))) {
        $title_err = "Please enter a title.";
    }
    if (empty(trim($_POST["image"]))) {
        $image_err = "Please upload an image";
    }
    if (empty($title_err) && empty($image_err)) {
        $data = array(

            "title" => $crud->escape_string($_POST['title']),
            "image" => $crud->escape_string($_POST['image'])

        );
        $crud->update($data, 'homeslider', $id);
        if ($data) {
            echo 'updated successfully';
            header('location:listing.php');
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
                <h4>Update <strong>"<?= $data['title'] ?>"</strong> entry</h4>
                <div class="form-group">
                    <input type="text" name="title" placeholder="Title" class="main-input" value="<?php echo $data['title']; ?>">
                    <div id="title-error-1" class="text-error"><?php echo $title_err; ?></div>
                </div>
                <div class="form-group">
                    <input type="file" name="image" placeholder="Upload Image" class="main-input" value="<?php echo $data['image']; ?> ">
                    <div id="image-error-1" class="text-error"><?php echo $image_err; ?></div>
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" class="btn" value="Update">
                    <a href="listing.php" class="btn">Back to entries list</a>
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
