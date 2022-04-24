<?php

if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
    $crud = new crud();
    $result = $crud->selectalldata("team");
} else {
    header("Location: index.php");
} ?>
<?php if (mysqli_num_rows($result) > 0) { ?>
    <h1 class="display-4 fs-1">List of team members</h1>
    <table class="table table-striped" style="width: 100%;">
        <thead>
        <tr>
            <th>Id</th>
            <th>First Name & Last Name</th>
            <th>Image</th>
            <th>Position</th>
            <th>Biography</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $i = 1;
        while ($rows = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?= $rows['id'] ?></td>
                <td><?= $rows['firstname'] ?> <?= $rows['lastname'] ?></td>
                <td><img src="assets/images/general/<?php echo $rows['image']; ?>" style="width: 80px;"></td>
                <td><?= $rows['position'] ?></td>
                <td><?= $rows['biography'] ?></td>
            </tr>
            <?php $i++;
        } ?>
        </tbody>
    </table>
    <a href="../team-list.php" class="btn">Manage team members</a>
<?php } ?>
