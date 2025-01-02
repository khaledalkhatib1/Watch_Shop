<?php
    $con = mysqli_connect("localhost", "root", "")
    or die("Could not connect to the server<br>" .mysqli_connect_error());
    echo "Connected to the server<br>";
    mysqli_select_db($con, "watch_shop")
    or die("Could not connect to the DB<br>" .mysqli_error($con));
    echo "Connected to the DB<br>"; 
    mysqli_close($con);
?>