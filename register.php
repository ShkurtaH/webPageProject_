<?php include('layout/header.php'); ?>
<?php
// Include config file
require_once "db/db.php";
session_start();
include_once("Crud.php");
// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate username
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter a username.";
    } elseif (!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))) {
        $username_err = "Username can only contain letters, numbers, and underscores.";
    } else {
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";

        if ($stmt = $con->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_username);

            // Set parameters
            $param_username = trim($_POST["username"]);

            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // store result
                $stmt->store_result();

                if($stmt->num_rows == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            $stmt->close();
        }
    }

    // Validate password
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter a password.";
    } elseif (strlen(trim($_POST["password"])) < 6) {
        $password_err = "Password must have at least 6 characters.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate confirm password
    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = "Please confirm password.";
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if (empty($password_err) && ($password != $confirm_password)) {
            $confirm_password_err = "Password did not match.";
        }
    }

    // Check input errors before inserting in database
    if (empty($username_err) && empty($password_err) && empty($confirm_password_err)) {

        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";

        if($stmt = $con->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("ss", $param_username, $param_password);

            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Redirect to login page
                header("location: login.php");
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            $stmt->close();
        }
    }

    // Close connection
    $con->close();
}
?>

    <main>
        <!--Main Starts-->
        <!-- Banner Starts -->
        <section class="banner"
                 style="background-image: linear-gradient(rgba(0,0,0,0.7),rgba(0,0,0,0.5)), url('assets/images/general/LogIn-Register-Banner.jpg'); background-position: center;padding: 0 0 190px 0; background-size: cover;">
            <div class="header">
                <div class="logo">
                    <figure>
                        <a href="index.php">
                            <img src="assets/images/icons/logo[photography].png" alt="Logo">
                        </a>
                    </figure>
                </div>
                <?php include "partial/navigation.php"?>
            </div>
            <div class="banner-content">
                <p>
                    “To me, photography is an art of observation. It’s about finding something interesting in an ordinary place… I’ve found it has little to do with the things you see and everything to do with the way you see them.”
                </p>
            </div>
        </section>
        <div class="contact-info space">
            <div class="flex">
                <form name="registration" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" id="registerForm" class="register-form">
                    <h3>Don't have an account? / Register Form</h3>
                    <div class="form-wrapper">
                        <div class="form-group">
                            <input type="text" name="username" placeholder="Username" class="main-input <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>"
                                   id="first-name">
                            <div id="first-name-error" class="text-error"><?php echo $username_err; ?></div>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" placeholder="Password" class="main-input <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>"
                                   id="pwd-register">
                            <div id="pwd-register-error" class="text-error"><?php echo $password_err; ?></div>
                        </div>
                        <div class="form-group">
                            <input type="password" name="confirm_password" placeholder="Confirm Password" class="main-input <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>"
                                   id="confirm_password">
                            <div id="pwd-register-error" class="text-error"><?php echo $confirm_password_err; ?></div>
                        </div>
                        <div class="form-group">
                            <p>Already have an account?, <a href="login.php">Login</a></p>
                        </div>
                        <div class="form-group-submit-wrapper flex">
                            <button type="submit" class="btn" id="registerBtn" name="registerBtn" value="Submit">Register</button>
                        </div>
                    </div>
                </form>

            </div>

        </div>
    </main>


<?php include('layout/footer.php') ?>