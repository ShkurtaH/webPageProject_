<?php

session_start();
$email_address= !empty($_SESSION['email'])?$_SESSION['email']:'';
if(!empty($email_address))
{
    header("location:dashboard.php");
}

include('db/db.php');
include('scripts/admin-login.php');
include('layout/header-without-banner.php');

?>




<div class="space">

    <!--====registration form====-->
    <div class="registration-form">
        <h3>Admin Panel</h3>
        <p class="text-success"><?php echo $call_login; ?></p>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">


            <!--// Email//-->
            <div class="form-group">
                <input type="text" class="main-input" placeholder="Enter Email" name="email" value="<?php $set_email;
                echo $set_email; ?>">
                <span class="text-error">
                    <?php if($emailErr != 1){ echo $emailErr; } ?>
                </span>
            </div>

            <!--//Password//-->
            <div class="form-group">
                <input type="password" class="main-input" placeholder="Enter Password" name="password">
                <span class="text-error">
                    <?php if($passErr != 1){ echo $passErr; } ?>
                </span>
            </div>


            <button type="submit" class="btn" name="login">Login</button>
        </form>
    </div>
</div>
