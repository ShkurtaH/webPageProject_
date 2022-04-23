<?php include('layout/header.php') ?>
<?php
// Initialize the session
session_start();
include_once("Crud.php");
// Check if the user is already logged in, if yes then redirect him to welcome page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: welcome.php");
    exit;
}

require_once ('db/db.php');

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";


// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }

    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }

    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM users WHERE username = ?";

        if($stmt = $con->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_username);

            // Set parameters
            $param_username = $username;

            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Store result
                $stmt->store_result();

                // Check if username exists, if yes then verify password
                if($stmt->num_rows == 1){
                    // Bind result variables
                    $stmt->bind_result($id, $username, $hashed_password);
                    if($stmt->fetch()){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();

                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;

                            // Redirect user to welcome page
                            header("location: welcome.php");
                        } else{
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid username or password.";
                        }
                    }
                } else{
                    // Username doesn't exist, display a generic error message
                    $login_err = "Invalid username or password.";
                }
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
        <!-- Main Starts-->
        <!-- Banner Starts -->
        <section class="banner"
                 style="background-image: linear-gradient(rgba(0,0,0,0.7),rgba(0,0,0,0.5)), url('assets/images/general/LogIn-Banner.jpg'); background-position: center;padding: 0 0 190px 0; background-size: cover;">
            <div class="header">
                <div class="logo">
                    <figure>
                        <a href="index.php">
                            <img src="assets/images/icons/logo[photography].png" alt="Logo">
                        </a>
                    </figure>
                </div>
                <?php include "partial/navigation.php" ?>
            </div>
            <div class="banner-content">
                <p>
                    “A good photograph is one that communicates a fact, touches the heart and leaves the viewer a changed person for having seen it. It is, in a word, effective.”
                </p>
            </div>
        </section>
        <div class='contact-info space'>
            <div class='flex responsive-flex'>
                <?php
                if(!empty($login_err)){
                    echo '<div class="alert alert-danger">' . $login_err . '</div>';
                }
                ?>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" id='loginForm' class='login-form' name='login'>
                    <h3>Login Form</h3>
                    <div class='form-wrapper'>
                        <div class='form-group'>
                            <input type='text' name='username' placeholder='Username' class='main-input <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>'>
                            <div id='username-error' class='text-error'><?php echo $username_err; ?></div>

                        </div>
                        <div class='form-group'>
                            <input type="password" name="password" placeholder="Password" class="main-input <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                            <div id='pwd-error' class='text-error'><?php echo $password_err; ?></div>
                        </div>
                        <div class="form-group">
                            <p>Don't have an account? <a href="register.php">Sign up now</a></p>
                        </div>
                        <div class='form-group-submit-wrapper flex'>
                            <button type='submit' class='btn' id='loginBtn' value="Login">Log in</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
        </div>
    </main>

    <script>
        var button = document.getElementById("loginBtn");

        var username = document.forms["loginForm"]["username"];
        var password = document.forms["loginForm"]["password"];

        var username_error = document.getElementById("username-error");
        var password_error = document.getElementById("pwd-error");

        username.addEventListener("blur", verifyUsername, true);
        password.addEventListener("blur", verifyPassword, true);

        function verifyUsername() {
            if (username.value != "") {
                username_error.innerHTML = "";
                return true;
            }
        }

        function verifyPassword() {

            if (password.value != "") {
                password_error.innerHTML = "";
                return true;
            }
        }

        button.addEventListener("click", function (event) {

            if (username.value == "") {
                username_error.textContent = 'This field is a required field.';
                username.focus();
                event.preventDefault();
            }

            if (password.value == "") {
                password_error.textContent = "This field is a required field.";
                password.focus();
                event.preventDefault();
            }
        });
    </script>
<?php include('layout/footer.php') ?>