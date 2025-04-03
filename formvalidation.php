<html>
    <head>
        <title>Validating</title>
    </head>
    <body>
        <?php
            $user = $_GET['user'];
            $pass = $_GET['password'];
            $verify = $_GET['verify'];
            $email = $_GET['email'];

            $hostname = "localhost";
            $username = "u5xdbxn1kpzes";
            $password = "3b7nzj8bzxph";
            $database = "dbmzgyymsfwabx";

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
