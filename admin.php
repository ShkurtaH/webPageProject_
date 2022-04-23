<?php
include('layout/header.php');
session_start();
if (!isset($_SESSION['username']) && !isset($_SESSION['id'])) { ?>
    <div class="space"
         style="min-height: 100vh">
        <form class="registration-form admin-form" action="php/check-login.php" method="post">
            <div class="form-wrapper">
                <h1 class="text-center p-3">LOGIN</h1>
                <?php if (isset($_GET['error'])) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $_GET['error'] ?>
                    </div>
                <?php } ?>
                <div class="form-group">
                    <input type="text" class="main-input" placeholder="Username" name="username" id="username">
                </div>
                <div class="form-group">
                    <input type="password" name="password" placeholder="Password" class="main-input" id="password">
                </div>
                <div class="form-group">
                    <label class="form-label">Select User Type:</label>
                </div>
                <div class="form-group">
                    <select class="main-input"
                            name="role"
                            aria-label="Default select example">
                        <option selected value="user">User</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>


                <button type="submit" class="btn">LOGIN
                </button>
            </div>
        </form>
    </div>
<?php } else {
    header("Location: home.php");
} ?>