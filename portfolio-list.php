<?php
include("layout/header.php");
include_once("Crud.php");

if(!empty($_GET['delid']))
{

    $id=$_GET['delid'];

    $crud = new crud();
    $crud->deletedata("portfolio",$id);
    header('location:portfolio-list.php');
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
        <h4>Portfolio gallery list:</h4>
        <table class="table table-striped" style="width: 80%">
            <thead>
            <tr>
                <th>Id</th>
                <th>Image</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $crud= new crud();
            $result = $crud->selectalldata("portfolio");

            while($data = mysqli_fetch_array($result))
            {
                ?>
                <tr>
                    <td><?php echo $data['id']; ?></td>
                    <td><img src="assets/images/general/<?php echo $data['image']; ?>" style="width: 40px;"></td>
                    <td><a href="edit-portfolio.php?editid=<?php echo $data['id'];?>">edit</td>
                    <td><a href="portfolio-list.php?delid=<?php echo $data['id'];?>" onclick=" return confirm('Do You really want to delete this data')">delete</td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
        <a href="add-portfolio.php" class="btn">Add new item</a>
        <a href="dashboard.php" class="btn">Back to dashboard list</a>
    </div>
    <?php } else { ?>
        <!-- FOR USERS -->
        <h2>Welcome <?= $_SESSION['username'] ?></h2>
        <a href="logout.php" class="btn btn-dark">Logout</a>
    <?php } ?>
    <?php } else {
        header("Location: index.php");
    } ?>
</nav>
