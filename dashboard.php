<?php  include('layout/header-without-banner.php')?>
<?php
session_start();
$email_address= $_SESSION['email'];
include('db/db.php');
if(empty($email_address))
{
    header("location:admin.php");
} ?>
<div class="top-header">
    <div class="flex">
        <h3>Admin Panel</h3>
        <ul class="list-unstyled">
            <li>
                <a href="logout.php" title="Log out">
                    <i class="fas fa-sign-out-alt"></i>
                </a>
            </li>
        </ul>
    </div>

</div>
<div class="panel-wrapper">
    <div class="flex justify-between">
        <div class="sidebar">
            <ul class="list-unstyled">
                <li>
                    <a href="">
                        <i class="fas fa-home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="create.php">
                        <i class="far fa-images"></i>
                        <span>Portfolio</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <i class="fas fa-envelope-open-text"></i>
                        <span>Contact/Mail</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="content">
            <div id="dynamic-page">
                <?php include('create.php') ?>
            </div>
        </div>
    </div>
</div>