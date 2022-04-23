<?php

if (isset($_SESSION['username']) && isset($_SESSION['id'])) {

    $sql = "SELECT * FROM contact ORDER BY id ASC";
    $res = mysqli_query($con, $sql);
} else {
    header("Location: index.php");
} ?>
<?php if (mysqli_num_rows($res) > 0) { ?>
    <h1 class="display-4 fs-1">List of contacts</h1>
    <table class="table table-striped" style="width: 50%;">
        <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Surname</th>
            <th>E-Mail</th>
            <th>Message</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $i = 1;
        while ($rows = mysqli_fetch_assoc($res)) { ?>
            <tr>
                <td><?= $rows['id'] ?></td>
                <td><?= $rows['name'] ?></td>
                <td><?= $rows['surname'] ?></td>
                <td><?= $rows['email'] ?></td>
                <td><?= $rows['message'] ?></td>
            </tr>
            <?php $i++;
        } ?>
        </tbody>
    </table>
    <a href="../contact-list.php" class="btn">Manage contact messages</a>
<?php } ?>
