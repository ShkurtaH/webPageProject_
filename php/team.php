<?php

if (isset($_SESSION['username']) && isset($_SESSION['id'])) {

    $sql = "SELECT * FROM team ORDER BY id ASC";
    $res = mysqli_query($con, $sql);
} else {
    header("Location: index.php");
} ?>
<?php if (mysqli_num_rows($res) > 0) { ?>
    <h1 class="display-4 fs-1">List of team members</h1>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Id</th>
            <th>First Name & Last Name</th>
            <th>Position</th>
            <th>Biography</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $i = 1;
        while ($rows = mysqli_fetch_assoc($res)) { ?>
            <tr>
                <td><?= $rows['id'] ?></td>
                <td><?= $rows['first-name'] ?> <?= $rows['last-name'] ?></td>
                <td><?= $rows['position'] ?></td>
                <td><?= $rows['biography'] ?></td>
            </tr>
            <?php $i++;
        } ?>
        </tbody>
    </table>
    <a href="../team-list.php" class="btn">Manage team members</a>
<?php } ?>
