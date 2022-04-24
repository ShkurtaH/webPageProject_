<?php
include("layout/header.php");
include_once("Crud.php");

$id = $_GET['editid'];

$crud = new crud();

$data = $crud->selectbyid('users', $id);

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
    if (empty(trim($_POST["role"]))) {
        $role_err = "Please select role";
    } else {
        $role = trim($_POST["role"]);
    }
    if (empty($username_err) && empty($password_err) && empty($role_err)) {
        $data = array(

            "username" => $crud->escape_string($_POST['username']),
            "password" => $crud->escape_string($_POST['password']),
            "role" => $crud->escape_string($_POST['role']),

        );


        $crud->update($data, 'users', $id);


        if ($data) {
            echo 'updated successfully';
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
                <h4>Update "<?php echo $data['username']; ?>" user</h4>
                <div class="form-group">
                    <input type="text" name="username" value="<?php echo $data['username']; ?>" placeholder="Username" class="main-input">
                    <div id="username-error" class="text-error"><?php echo $username_err; ?></div>
                </div>
                <div class="form-group">
                    <input type="password" name="password" value="<?php echo $data['password']; ?>" placeholder="Password" class="main-input">
                    <div id="username-error" class="text-error"><?php echo $password_err; ?></div>
                </div>
                <div class="form-group">
                    <select class="main-input" name="role" aria-label="Default select example">
                        <option selected value="<?php echo $data['role']; ?>">User</option>
                        <option value="<?php echo $data['role']; ?>">Admin</option>
                    </select>
                    <div id="username-error" class="text-error"><?php echo $role_err; ?></div>
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" class="btn" value="Update">
                    <a href="users-list.php" class="btn">Back to users list</a>
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
