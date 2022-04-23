<?php
include("layout/header.php");
include_once("Crud.php");

if(!empty($_GET['delid']))
{

    $id=$_GET['delid'];

    $crud = new crud();
    $crud->deletedata("team",$id);
    header('location:team-list.php');
}
?>
<table class="table table-striped">
    <thead>
    <tr>
        <th>Id</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Position</th>
        <th>Image</th>
        <th>Biography</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $crud= new crud();
    $result = $crud->selectalldata("team");

    while($data = mysqli_fetch_array($result))
    {
        ?>
        <tr>
            <td><?php echo $data['id']; ?></td>
            <td><?php echo $data['first-name']; ?></td>
            <td><?php echo $data['last-name']; ?></td>
            <td><?php echo $data['position']; ?></td>
            <td><img src="assets/images/general/<?php echo $data['image']; ?>" style="width: 40px;"></td>
            <td><?php echo $data['biography']; ?></td>
            <td><a href="edit-team.php?editid=<?php echo $data['id'];?>">edit</td>
            <td><a href="team-list.php?delid=<?php echo $data['id'];?>" onclick=" return confirm('Do You really want to delete this data')">delete</td>
        </tr>
    <?php } ?>
    </tbody>
</table>
<a href="add-team.php">Add new team member</a>