<?php

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
?>
<?php include "layout/header.php";?>
<form method="POST" name="form">
    <h4>Update <?php echo $data['title'];?> item</h4>
    <h4>Add new team member</h4>
    <div class="form-group">
        <input type="text" name="first-name" value="<?php echo $data['first-name'];?>" class="main-input" placeholder="First Name">
    </div>
    <div class="form-group">
        <input type="text" name="last-name" value="<?php echo $data['last-name'];?>" class="main-input" placeholder="Last Name">
    </div>
    <div class="form-group">
        <input type="text" name="position" value="<?php echo $data['position'];?>" class="main-input" placeholder="Position">
    </div>
    <div class="form-group">
        <input type="file" name="image" value="<?php echo $data['image'];?>" class="main-input" placeholder="Upload image">
    </div>
    <div class="form-group">
        <textarea name="biography" id="" cols="30" rows="10" value="<?php echo $data['biography'];?>" class="main-input" placeholder="Biography"></textarea>
    </div>
    <div class="form-group">
        <input type="submit" name="submit" class="btn">
    </div>
</form>