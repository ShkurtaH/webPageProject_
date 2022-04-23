<?php

if (isset($_SESSION['username']) && isset($_SESSION['id'])) {

    $sql = "SELECT * FROM portfolio ORDER BY id ASC";
    $res = mysqli_query($con, $sql);
} else {
    header("Location: index.php");
} ?>
<?php if (mysqli_num_rows($res) > 0) { ?>
    <h1 class="display-4 fs-1">List of portfolio gallery</h1>
    <table class="table table-striped" style="width: 50%;">
        <thead>
        <tr>
            <th>Id</th>
            <th>Image</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $i = 1;
        while ($rows = mysqli_fetch_assoc($res)) { ?>
            <tr>
                <td><?= $rows['id'] ?></td>
                <td><img src="assets/images/general/<?php echo $rows['image']; ?>" style="width: 40px;"></td>
            </tr>
            <?php $i++;
        } ?>
        </tbody>
    </table>
    <a href="../portfolio-list.php" class="btn">Manage Portfolio Gallery</a>
<?php } ?>
