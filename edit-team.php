<?php
include ("layout/header.php");
include_once("Crud.php");

$id = $_GET['editid'];

$crud= new crud();

$data = $crud->selectbyid('team',$id);

if(isset($_POST['submit']))
{
    $data= array(

        "first-name"  => $crud->escape_string($_POST['first-name']),
        "last-name"  => $crud->escape_string($_POST['last-name']),
        "position"  => $crud->escape_string($_POST['position']),
        "image"  => $crud->escape_string($_POST['image']),
        "biography"  => $crud->escape_string($_POST['biography']),

    );
    $crud->update($data,'team',$id);
    if($data)
    {
        echo 'updated successfully';
        header('location:team-list.php');
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
            <h4>Update "<?php echo $data['firstname'];?>" team member</h4>
            <div class="form-group">
                <input type="text" name="first-name" value="<?php echo $data['firstname'];?>" class="main-input" placeholder="First Name">
            </div>
            <div class="form-group">
                <input type="text" name="last-name" value="<?php echo $data['lastname'];?>" class="main-input" placeholder="Last Name">
            </div>
            <div class="form-group">
                <input type="text" name="position" value="<?php echo $data['position'];?>" class="main-input" placeholder="Position">
            </div>
            <div class="form-group">
                <input type="file" name="image" value="<?php echo $data['image'];?>" class="main-input" placeholder="Upload image">
            </div>
            <div class="form-group">
                <textarea name="biography" id="" cols="30" rows="10" class="main-input" placeholder="Biography"><?php echo $data['biography'];?></textarea>
            </div>
            <div class="form-group">
                <input type="submit" name="submit" class="btn" value="Update">
                <a href="team-list.php" class="btn">Back to team list</a>
            </div>
        </form>
    </div>
    <?php }
    else { ?>
    <!-- FOR USERS -->
    <h2>Welcome <?= $_SESSION['username'] ?></h2>
    <a href="logout.php" class="btn btn-dark">Logout</a>
    <?php } ?>
    <?php }else{
        header("Location: index.php");
    } ?>
</nav>
