<?php

if (isset($_SESSION['username']) && isset($_SESSION['id'])) {

    $sql = "SELECT * FROM navigation ORDER BY id ASC";
    $res = mysqli_query($con, $sql);
} else {
    header("Location: index.php");
} ?>
<?php if (mysqli_num_rows($res) > 0) { ?>
    <h1 class="display-4 fs-1">List of navigation items</h1>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Url</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $i = 1;
        while ($rows = mysqli_fetch_assoc($res)) { ?>
            <tr>
                <td><?= $rows['id'] ?></td>
                <td><?= $rows['title'] ?></td>
                <td><?= $rows['url']?></td>
            </tr>
            <?php $i++;
        } ?>
        </tbody>
    </table>
    <a href="../navigation-list.php" class="btn">Manage navigation links</a>
<?php } ?>
