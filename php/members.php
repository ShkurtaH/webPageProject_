<?php

if (isset($_SESSION['username']) && isset($_SESSION['id'])) {

    $sql = "SELECT * FROM users ORDER BY id ASC";
    $res = mysqli_query($con, $sql);
} else {
    header("Location: index.php");
} ?>
<?php if (mysqli_num_rows($res) > 0) { ?>
    <h1 class="display-4 fs-1">List of users</h1>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Id</th>
            <th>User name</th>
            <th>Role</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $i = 1;
        while ($rows = mysqli_fetch_assoc($res)) { ?>
            <tr>
                <td><?= $rows['id'] ?></td>
                <td><?= $rows['username'] ?></td>
                <td><?= $rows['role'] ?></td>
            </tr>
            <?php $i++;
        } ?>
        </tbody>
    </table>
    <a href="users-list.php" class="btn">Manage users</a>
<?php } ?>
