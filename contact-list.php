<?php
include("layout/header.php");
include_once("Crud.php");

if(!empty($_GET['delid']))
{

    $id=$_GET['delid'];

    $crud= new crud();
    $crud->deletedata("contact",$id);
    header('location:contact-list.php');
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
        <h4>Contact messages list:</h4>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Surname</th>
                <th>E-Mail</th>
                <th>Message</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $crud= new crud();
            $result = $crud->selectalldata("contact");

            while($data = mysqli_fetch_array($result))
            {
                ?>
                <tr>
                    <td><?php echo $data['id']; ?></td>
                    <td><?php echo $data['name']; ?></td>
                    <td><?php echo $data['surname']; ?></td>
                    <td><?php echo $data['email']; ?></td>
                    <td><?php echo $data['message']; ?></td>
                    <td><a href="contact-list.php?delid=<?php echo $data['id'];?>" onclick=" return confirm('Do You really want to delete this data')">delete</td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
        <a href="dashboard.php" class="btn">Back to dashboard list</a>
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

