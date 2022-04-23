<?php
include("layout/header.php");
include_once("Crud.php");

$crud = new crud();

if (isset($_POST['submit'])) {
    $data = array(
        "username" => $crud->escape_string($_POST['username']),
        "password" => $crud->escape_string($_POST['password']),
        "role" => $crud->escape_string($_POST['role']),
    );
    $crud->insert($data, 'users');
    if ($data) {
        echo 'insert successfully';
        header('location:users-list.php');
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
                <h4>Add new user</h4>
                <div class="form-group">
                    <input type="text" name="username" class="main-input" placeholder="Username">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="main-input" placeholder="Password">
                </div>
                <div class="form-group">
                    <select class="main-input"
                            name="role"
                            aria-label="Default select example">
                        <option selected value="user">User</option>
                        <option value="admin">Admin</option>
                    </select>
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

