<?php
if (!function_exists('isAdmin')) {
    function isAdmin() {
        return ($_SESSION['onAdmin']) ?? false;
    }
}
?>


<div class="container">
    <nav>
        <ul class="phpul">
            <?php if (!isAdmin()) { ?>
                <li class="phpli"><a href="haldusleht.php">Kasutaja leht</a></li>
            <?php } else { ?>
                <li class="phpli"><a href="adminLeht.php">Admin leht</a></li>
                <li class="phpli"><a href="haldusleht.php">Kasutaja leht</a></li>
            <?php } ?>

            <li style="position: relative; left: 50%">
                <?php
                if (isset($_SESSION['kasutaja'])) {
                    ?>
                    <h1 style="color: white">Tere, <?= $_SESSION['kasutaja'] ?></h1>
                    <a href="logout.php" onclick="openModal()">Logi välja</a>
                    <?php
                } else {
                    ?>
                    <a href="#modal">Logi sisse</a>
                    <?php
                }
                ?>
            </li>
        </ul>
    </nav>
</div>
