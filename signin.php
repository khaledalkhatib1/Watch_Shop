<html>
    <head>
        <title>Login Page</title>
        <style>
            body {
                font-family: 'Arial', sans-serif;
                margin: 0;
                padding: 0;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                background: linear-gradient(135deg,rgb(255, 0, 170), #00f2fe);
                color: #333;
            }

            form {
                background-color: #ffffff;
                padding: 30px 40px;
                border-radius: 10px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                text-align: center;
                width: 300px;
            }

            h1 {
                font-size: 24px;
                margin-bottom: 20px;
                color: #444;
            }

            form p {
                margin-bottom: 15px;
                font-size: 14px;
                color: #666;
            }

            form input[type="text"],
            form input[type="password"] {
                width: 100%;
                padding: 10px;
                margin-top: 5px;
                font-size: 14px;
                border: 1px solid #ddd;
                border-radius: 5px;
                box-sizing: border-box;
                transition: 0.3s;
            }

            form input[type="text"]:hover,
            form input[type="password"]:hover {
                border-color: #007bff;
            }

            form input[type="text"]:focus,
            form input[type="password"]:focus {
                border-color: #0056b3;
                outline: none;
                box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
            }

            form button {
                padding: 10px 20px;
                font-size: 14px;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                transition: 0.3s;
            }

            form button[name="login"] {
                background-color: #007bff;
                color: #fff;
            }

            form button[name="register"] {
                background-color: #6c757d;
                color: #fff;
            }

            form button[name="login"]:hover {
                background-color: #0056b3;
            }

            form button[name="register"]:hover {
                background-color: #5a6268;
            }

            @media (max-width: 400px) {
                form {
                    width: 90%;
                    padding: 20px;
                }
            }
        </style>
    </head>
    <body>
        <h1>Login &nbsp;&nbsp;</h1>
        
        <form action="signin.php" method="post">
            <p>Username
                <input type="text" name="username" id="">
            </p>
            <p>Password
                <input type="password" name="password" id="">
            </p>
            <p><button type="submit" name="login">Login</button>&nbsp;&nbsp;
            <button type="submit" name="register">Register</button>&nbsp;&nbsp;
            <a href="index.html">Home</a>
        </p>
        </form>
    </body>
</html>

<?php    
    $con = mysqli_connect("localhost", "root", "")
    or die("  Could not connect to the server<br>" .mysqli_connect_error());
    echo "  Connected to the server<br>";
    mysqli_select_db($con, "watch_shop")
    or die("  Could not connect to the DB<br>" .mysqli_error($con));
    echo "  Connected to DB<br>"; 

    extract($_POST);
    if(isset($register))
    {
        if(empty($username) && empty($password))
        {
            echo '<script>alert("Both fields are required")</script>';
        }
        else
        {
            $password = md5($password);
            $dbI = mysqli_query($con, "INSERT into login 
            values ('$username', '$password')")
            or die("Could not insert into table.".mysqli_error($con));
            echo "" .mysqli_affected_rows($con)." record(s) added<br>";
        }
    }
    if(isset($login))
    {
        if(empty($username) && empty($password))
        {
            echo '<script>alert("Both fields are required")</script>';
        }
        else
        {
            $password = md5($password);
            //Print data
            $dbP =  mysqli_query($con, "SELECT * from login 
            where username='$username' AND password='$password'")
            or die("Could not find the table.".mysqli_error($con));
            if(mysqli_num_rows($dbP)>0)
            {
                echo "<table border='1' width='40%'>";
                echo "<tr><th>Username</th><th>Password</th></tr>";
                while ($row = mysqli_fetch_array($dbP))
                {
                    echo "<tr><td>{$row['Username']}</td>";
                    echo "<td>{$row['Password']}</td></tr>";
                }
            }
            else
            {
                echo '<script>alert("Wrong User Details")</script>';
            }
            echo "</table><br>";
        }
    }

    mysqli_close($con);
?>