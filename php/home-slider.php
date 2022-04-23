<?php

if (isset($_SESSION['username']) && isset($_SESSION['id'])) {

    $sql = "SELECT * FROM homeslider ORDER BY id ASC";
    $res = mysqli_query($con, $sql);
} else {
    header("Location: index.php");
} ?>
<?php if (mysqli_num_rows($res) > 0) { ?>
    <h1 class="display-4 fs-1">List of home slider entries</h1>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Image</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $i = 1;
        while ($rows = mysqli_fetch_assoc($res)) { ?>
            <tr>
                <td><?= $rows['id'] ?></td>
                <td><?= $rows['title'] ?></td>
                <td><img src="assets/images/general/<?php echo $rows['image']; ?>" style="width: 50px;"></td>
            </tr>
            <?php $i++;
        } ?>
        </tbody>
    </table>
    <a href="../listing.php" class="btn">Manage home slider</a>
<?php } ?>
