<input type="checkbox" id="nav-check">
<div class="navigation">

    <ul>
        <?php
        $crud = new crud();
        $result = $crud->selectalldata("navigation");
        while ($data = mysqli_fetch_array($result)) {
            ?>
            <li>
                <a href="<?php echo $data['url']; ?>"><?php echo $data['title']; ?></a>
            </li>
        <?php } ?>
        <div class="login responsive-show">
            <a href="register.php" class="btn">SIGN UP</a>
        </div>
    </ul>
    <div class="nav-btn">
        <label for="nav-check">
            <span></span>
            <span></span>
            <span></span>
        </label>
    </div>
</div>
<div class="login responsive">
    <a href="register.php" class="btn">SIGN UP</a>
</div>