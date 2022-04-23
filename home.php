<?php
session_start();
include "db/db.php";
if (isset($_SESSION['username']) && isset($_SESSION['id'])) {   ?>
    <div class="container d-flex justify-content-center align-items-center"
         style="min-height: 100vh">
        <?php if ($_SESSION['role'] == 'admin') {?>
            <!-- For Admin -->
            <div class="card" style="width: 18rem;">
                <img src="img/admin-default.png"
                     class="card-img-top"
                     alt="admin image">
                <div class="card-body text-center">
                    <h5 class="card-title">
                        <?=$_SESSION['name']?>
                    </h5>
                    <a href="logout.php" class="btn btn-dark">Log out</a>
                </div>
            </div>
            <div class="p-3">
                <?php include 'php/members.php';
                if (mysqli_num_rows($res) > 0) {?>

                    <h1 class="display-4 fs-1">Members</h1>
                    <table class="table"
                           style="width: 32rem;">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">User name</th>
                            <th scope="col">Role</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i =1;
                        while ($rows = mysqli_fetch_assoc($res)) {?>
                            <tr>
                                <th scope="row"><?=$i?></th>
                                <td><?=$rows['username']?></td>
                                <td><?=$rows['role']?></td>
                            </tr>
                            <?php $i++; }?>
                        </tbody>
                    </table>
                <?php }?>
            </div>
        <?php }else { ?>
            <!-- FORE USERS -->
            <div class="card" style="width: 18rem;">
                <img src="img/user-default.png"
                     class="card-img-top"
                     alt="admin image">
                <div class="card-body text-center">
                    <h5 class="card-title">
                        <?=$_SESSION['name']?>
                    </h5>
                    <a href="logout.php" class="btn btn-dark">Log out</a>
                </div>
            </div>
        <?php } ?>
    </div>
<?php }else{
    header("Location: index.php");
} ?>