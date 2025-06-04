<?php include 'cache_header.php'; ?>
<html>
    <head>
        <title>Validating</title>
    </head>
    <body>
        <?php
            include 'cache_header.php'; 
            $user = $_GET['user'];
            $pass = $_GET['password'];
            $verify = $_GET['verify'];
            $email = $_GET['email'];

            $hostname = "localhost";
            $username = "ukbrbehyyup86";
            $password = "wjickzoenj4i";
            $database = "dbm89mg0vlmcuz";
            
            
            $useraccounts = new mysqli($hostname, $username, $password, $database);


            $sqlstatement = "SELECT Email FROM useraccounts WHERE Email = '" . $email . "'";
            $emailsearch = $useraccounts->query($sqlstatement);
            if ($emailsearch->num_rows > 0) {
                echo "<script>alert('Email already in use.'); window.location.href = 'signup.php'; </script>";
                exit();
            }
            $sqlstatement = "SELECT Username FROM useraccounts WHERE Username = '" . $user . "'";
            $usersearch = $useraccounts->query($sqlstatement);
            if ($usersearch->num_rows > 0) {
                echo "<script>alert('Username already in use.'); window.location.href = 'signup.php'; </script>";
                exit();
            }
            
            $sqlstatement = "INSERT INTO useraccounts (Email, Username, Password) VALUES ('$email', '$user', '$pass')";
            $insertrun = $useraccounts->query($sqlstatement);
            echo "<script>window.location.href = 'brewery_search.html'; </script>";
            exit();
        ?>
    </body>
</html>
