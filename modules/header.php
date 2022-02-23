<?php 

if (isset($_COOKIE['uname'])) {
    echo '<aside>
        <div class="flex-down">
            <h2><a href="index.php" class="header-link">To Do</a></h2>
            <a href="all.php">Historik</a>
        </div>
        <a href="modules/logout.php" class="logoutBtn">Log ud</a>
    </aside>';
} else {
    echo '<aside>
    <div class="flex-down">
        <h2>To Do</h2>
    </div>
</aside>';
}

?>


