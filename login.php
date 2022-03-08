<?php include('layout/header.php') ?>
<?php
require('db/db.php');
session_start();
// If form submitted, insert values into the database.
if (isset($_POST['username'])){
    // removes backslashes
    $username = stripslashes($_REQUEST['username']);
    //escapes special characters in a string
    $username = mysqli_real_escape_string($con,$username);
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($con,$password);
    //Checking is user existing in the database or not
    $query = "SELECT * FROM `users` WHERE username='$username'and password='".md5($password)."'";
    $result = mysqli_query($con,$query) or die(mysqli_error());
    $rows = mysqli_num_rows($result);
    if($rows==1){
        $_SESSION['username'] = $username;
        // Redirect user to index.php
        header("Location: index.php");
    }else{
        echo "<div class='form'>

<div class='contact-info space'>
        <div class='flex'>
            <form action='' method='post' id='loginForm' class='login-form' name='login'>
                <h3>Login Form</h3>
                <div class='form-wrapper'>
                    <div class='form-group'>
                        <input type='text' name='username' value='' placeholder='Username' class='main-input' required>
                        <div id='username-error' class='text-error'>Username is incorrect.</div>
                        
                    </div>
                    <div class='form-group'>
                        <input type='password' name='password' value='' placeholder='Password' class='main-input' required>
                        <div id='pwd-error' class='text-error'>Password is incorrect</div>
                    </div>
                    <div class='form-group-submit-wrapper flex'>
                        <button type='submit' class='btn' id='loginBtn'>Login</button>
                    </div>
                </div>
            </form>

        </div>

    </div>


</div>";
    }
}else{
    ?>
    <div class="contact-info space">
        <div class="flex">
            <form action="" method="post" id="loginForm" class="login-form" name="login">
                <h3>Login Form</h3>
                <div class="form-wrapper">
                    <div class="form-group">
                        <input type="text" name="username" value="" placeholder="Username" class="main-input" required>
                        <div id="username-error" class="text-error"></div>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" value="" placeholder="Password" class="main-input" required>
                        <div id="pwd-error" class="text-error"></div>
                    </div>
                    <div class="form-group-submit-wrapper flex">
                        <button type="submit" class="btn" id="loginBtn">Login</button>
                    </div>
                </div>
            </form>

        </div>

    </div>
<?php } ?>
<?php include('layout/footer.php') ?>