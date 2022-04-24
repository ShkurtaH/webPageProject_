<?php
include("layout/header.php");
include_once("Crud.php");

$crud = new crud();

$username = $password = $role = "";
$username_err = $password_err = $role_err = "";

if (isset($_POST['submit'])) {
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter a username.";
    } elseif (!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))) {
        $username_err = "Username can only contain letters, numbers, and underscores.";
    }
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter a password.";
    } elseif (strlen(trim($_POST["password"])) < 6) {
        $password_err = "Password must have at least 6 characters.";
    } else {
        $password = trim($_POST["password"]);
    }
    if(empty(trim($_POST["role"]))){
        $role_err = "Please select role";
    }
    else{
        $role = trim($_POST["role"]);
    }
    if (empty($username_err) && empty($password_err) && empty($role_err)) {
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
                    <input type="text" name="username" class="main-input <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" placeholder="Username" value="<?php echo $username; ?>">
                    <div id="username-error" class="text-error"><?php echo $username_err; ?></div>
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="main-input <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" placeholder="Password" value="<?php echo $password; ?>">
                    <div id="password-error" class="text-error"><?php echo $password_err; ?></div>
                </div>
                <div class="form-group">
                    <select class="main-input <?php echo (!empty($role_err)) ? 'is-invalid' : ''; ?>"
                            name="role"
                            aria-label="Default select example" >
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                    </select>
                    <div id="password-error" class="text-error"><?php echo $role_err; ?></div>
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

