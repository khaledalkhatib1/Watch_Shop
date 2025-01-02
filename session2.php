<?php
    session_start();

    echo "Welcome to page #2<br>";

    echo $_SESSION['brand']."<br>";
    echo $_SESSION['color'].'<br>';
    echo date('Y/m/d H:i:s', $_SESSION['time']);

    echo '<br><a href="session1.php">Page 1</a>';
?>