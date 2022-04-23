<?php
include ("layout/header.php");
include_once("Crud.php");

$id = $_GET['editid'];

$crud = new crud();

$data = $crud->selectbyid('features', $id);

if (isset($_POST['submit'])) {
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
            </div>
            <div class="form-group">
                <input type="text" name="title" value="<?php echo $data['title']; ?>" placeholder="Title" class="main-input">
            </div>
            <div class="form-group">
                <input type="file" name="icon" value="<?php echo $data['icon']; ?>" placeholder="Icon" class="main-input">
            </div>
            <div class="form-group">
                <textarea name="teaser" id="" cols="30" rows="10" class="main-input" placeholder="Teaser"><?php echo $data['teaser']; ?></textarea>
            </div>
            <div class="form-group">
                <input type="submit" name="submit" class="btn" value="Update">
                <a href="features-list.php" class="btn">Back to features list</a>
            </div>
        </form>
    </div>
    <?php }
    else { ?>
        <!-- FOR USERS -->
        <h2>Welcome <?= $_SESSION['username'] ?></h2>
        <a href="logout.php" class="btn btn-dark">Logout</a>
    <?php } ?>
    <?php }else{
        header("Location: index.php");
    } ?>
</nav>
