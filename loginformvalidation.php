<?php include 'cache_header.php'; ?>
<html>
    <head>
        <title>Validating</title>
    </head>
    <body>
        <?php

            include 'cache_header.php'; 

            
            $user = $_GET['username'];
            $pass = $_GET['password'];

            $hostname = "localhost";
            $username = "ukbrbehyyup86";
            $password = "wjickzoenj4i";
            $database = "dbm89mg0vlmcuz";
            $useraccounts = new mysqli($hostname, $username, $password, $database);

            $sqlstatement = "SELECT * FROM useraccounts WHERE Username = '" . $user . "' AND Password = '" . $pass . "'";
            $resultsofquery = $useraccounts->query($sqlstatement);
            if ($resultsofquery->num_rows > 0) {
                echo "<script>window.location.href = 'brewery_search.html'; </script>";
                exit();
            } else {
                echo "<script>alert('No such username and password exist.'); window.location.href = 'login.php'; </script>";
                exit();
            }
        ?>
    </body>
</html>
