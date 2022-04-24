<?php

if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
    $crud = new crud();
    $result = $crud->selectalldata("features");
} else {
    header("Location: index.php");
} ?>
<?php if (mysqli_num_rows($result) > 0) { ?>
    <h1 class="display-4 fs-1">List of features items</h1>
    <table class="table table-striped" style="width: 60%">
        <thead>
        <tr>
            <th>Id</th>
            <th>Step</th>
            <th>Title</th>
            <th>Icon</th>
            <th>Teaser</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $i = 1;
        while ($rows = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?= $rows['id'] ?></td>
                <td><?= $rows['step'] ?></td>
                <td><?= $rows['title'] ?></td>
                <td><img src="assets/images/general/<?php echo $rows['icon']; ?>" style="width: 30px;"></td>
                <td><?= $rows['teaser'] ?></td>
            </tr>
            <?php $i++;
        } ?>
        </tbody>
    </table>
    <a href="../features-list.php" class="btn">Manage features entries</a>
<?php } ?>
