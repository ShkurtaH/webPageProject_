<?php
include ("layout/header.php");
include_once("Crud.php");

$id = $_GET['editid'];

$crud= new crud();

$data = $crud->selectbyid('navigation',$id);

if(isset($_POST['submit']))
{
    $data= array(

        "title"  => $crud->escape_string($_POST['title']),
        "url"  => $crud->escape_string($_POST['url']),

    );


    $crud->update($data,'navigation',$id);


    if($data)
    {
        echo 'updated successfully';
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
            <h4>Update <?php echo $data['title'];?> item</h4>
            <div class="form-group">
                <input type="text" name="title" value="<?php echo $data['title'];?>" placeholder="Title" class="main-input">
            </div>
            <div class="form-group">
                <input type="text" name="url" value="<?php echo $data['url'];?>" placeholder="Url" class="main-input">
            </div>
            <div class="form-group">
                <input type="submit" name="submit" class="btn" value="Update">
                <a href="navigation-list.php" class="btn">Back to links list</a>
            </div>
        </form>
    </div>
    <?php }
    else { ?>
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
    <?php }else{
        header("Location: index.php");
    } ?>
</nav>
