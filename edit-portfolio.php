<?php
include("layout/header.php");
include_once("Crud.php");

$id = $_GET['editid'];

$crud = new crud();
$image = "";
$image_err = "";
$data = $crud->selectbyid('portfolio', $id);

if (isset($_POST['submit'])) {
    if (empty(trim($_POST["image"]))) {
        $image_err = "Please upload an image";
    }
    if (empty($image_err)) {
        $data = array(
            "image" => $crud->escape_string($_POST['image']),
        );
        $crud->update($data, 'portfolio', $id);
        if ($data) {
            echo 'updated successfully';
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
                <h4>Update "<?php echo $data['id']; ?>" gallery item</h4>
                <div class="form-group">
                    <input type="file" name="image" value="<?php echo $data['image']; ?>" class="main-input" placeholder="Upload image">
                    <div id="edit-portfolio-image-error" class="text-error"><?php echo $image_err; ?></div>
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" class="btn" value="Update">
                    <a href="portfolio-list.php" class="btn">Back to portfolio list</a>
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
