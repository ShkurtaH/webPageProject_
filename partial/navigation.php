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
    </ul>
</div>