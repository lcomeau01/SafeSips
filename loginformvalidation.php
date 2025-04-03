<html>
    <head>
        <title>Validating</title>
    </head>
    <body>
        <?php
            $user = $_GET['username'];
            $pass = $_GET['password'];

            $hostname = "localhost";
            $username = "u5xdbxn1kpzes";
            $password = "3b7nzj8bzxph";
            $database = "dbmzgyymsfwabx";
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
