<?php
include("layout/header.php");
include_once("Crud.php");

$id = $_GET['editid'];

$crud = new crud();
$firstname = $lastname = $position = $image = $biography = "";
$firstname_err = $lastname_err = $position_err = $image_err = $biography_err = "";

$data = $crud->selectbyid('team', $id);

if (isset($_POST['submit'])) {
    if (empty(trim($_POST["firstname"]))) {
        $firstname_err = "Please enter a firstname.";
    }
    if (empty(trim($_POST["lastname"]))) {
        $lastname_err = "Please enter a lastname";
    }
    if (empty(trim($_POST["position"]))) {
        $position_err = "Please enter a position";
    }
    if (empty(trim($_POST["image"]))) {
        $image_err = "Please upload an image";
    }
    if (empty(trim($_POST["biography"]))) {
        $biography_err = "Please enter a biography";
    }
    if (empty($firstname_err) && empty($lastname_err) && empty($position_err) && empty($image_err) && empty($biography_err)) {
        $data = array(
            "firstname" => $crud->escape_string($_POST['firstname']),
            "lastname" => $crud->escape_string($_POST['lastname']),
            "position" => $crud->escape_string($_POST['position']),
            "image" => $crud->escape_string($_POST['image']),
            "biography" => $crud->escape_string($_POST['biography']),
        );
        $crud->update($data, 'team', $id);
        if ($data) {
            echo 'updated successfully';
            header('location:team-list.php');
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
                <h4>Update "<?php echo $data['firstname']; ?>" team member</h4>
                <div class="form-group">
                    <input type="text" name="firstname" value="<?php echo $data['firstname']; ?>" class="main-input" placeholder="First Name">
                    <div id="firstname-error-1" class="text-error"><?php echo $firstname_err; ?></div>
                </div>
                <div class="form-group">
                    <input type="text" name="lastname" value="<?php echo $data['lastname']; ?>" class="main-input" placeholder="Last Name">
                    <div id="lastname-error-1" class="text-error"><?php echo $lastname_err; ?></div>
                </div>
                <div class="form-group">
                    <input type="text" name="position" value="<?php echo $data['position']; ?>" class="main-input" placeholder="Position">
                    <div id="position-error-1" class="text-error"><?php echo $position_err; ?></div>
                </div>
                <div class="form-group">
                    <input type="file" name="image" value="<?php echo $data['image']; ?>" class="main-input" placeholder="Upload image">
                    <div id="image-error-2" class="text-error"><?php echo $image_err; ?></div>
                </div>
                <div class="form-group">
                    <textarea name="biography" id="" cols="30" rows="10" class="main-input" placeholder="Biography"><?php echo $data['biography']; ?></textarea>
                    <div id="biography-error-2" class="text-error"><?php echo $biography_err; ?></div>
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" class="btn" value="Update">
                    <a href="team-list.php" class="btn">Back to team list</a>
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
