<?php
include("layout/header.php");
include_once("Crud.php");

$crud= new crud();

if(isset($_POST['submit']))
{
    $data= array(
        "title"  => $crud->escape_string($_POST['title']),
        "url"  => $crud->escape_string($_POST['url']),
    );
    $crud->insert($data,'navigation');
    if($data)
    {
        echo 'insert successfully';
        header('location:navigation-list.php');
    }

    else
    {
        echo 'try again' ;
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
            <h4>Add new navigation link</h4>
            <div class="form-group">
                <input type="text" name="title" class="main-input" placeholder="Title">
            </div>
            <div class="form-group">
                <input type="text" name="url" class="main-input" placeholder="Url">
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

