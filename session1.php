<?php
    session_start();

    echo "Welcome to page #1";
    $_SESSION['brand'] = 'Rolex';
    $_SESSION['color'] = 'Gold'; 
    $_SESSION['time'] = time();

    echo '<br><a href="session2.php">Page 2</a>';
?>