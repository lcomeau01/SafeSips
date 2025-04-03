<html>
    <head>
        <title>Left a Review</title>
        <style>
            body {
                padding: 20px;
                margin: 20px;
                background-color: #EDDADE;
                color: #F6A2A0;
                text-align: center;
                font-size: 45px;
                font-family: courier;
                height: 100%;
                width: 100%;
                display: flex;
                justify-content: center;
                align-items: center;
            }
            a, a:visited {
                background-color: #F0EBE9;
                padding: 5px;
                margin: 5px;
                font-size: 20px;
                color: #F6A2A0;
                border: solid 5px #F6A2A0; 
                border-radius: 10px; 
                text-decoration: none;
            }
            a:hover, a:visited:hover {
                border: #F5817F solid 5px; 
                color: #F5817F;
                text-decoration: none;
            }
        </style>
    </head>
    <body>
        <?php
            $hostname = "localhost";
            $username = "u5xdbxn1kpzes";
            $password = "3b7nzj8bzxph";
            $database = "dbt2ay4kxhkbvz";
            $barinformation = new mysqli($hostname, $username, $password, $database);

            $barid = $_GET['barid'];
            $baridcomplete = str_replace("-", "d", $barid);
            
            $sql = "CREATE TABLE IF NOT EXISTS " . $baridcomplete . " (
                security INT(5),
                overall INT(5),
                comments LONGTEXT,
                date DATE)";
            $barinformation->query($sql);

            $security = intval($_GET['security']);
            $overall = intval($_GET['overall']);
            $comments = $_GET['comments'];
            $name = $_GET['barname'];

            $currdate = date("Y-m-d");
            
            $insertsql = "INSERT INTO " . $baridcomplete . " (security, overall, comments, date) VALUES ('$security', '$overall', '$comments', '$currdate')";
            
            $databasetwo = "db8hyiqgvxvd9n";
            $usrnm = "" . $_GET['usrnm'];
            $userreviews = new mysqli($hostname, $username, $password, $databasetwo);

            $sqltwo = "CREATE TABLE IF NOT EXISTS " . $usrnm . " (
                security INT(5),
                overall INT(5),
                comments LONGTEXT,
                name LONGTEXT)";
            $userreviews->query($sqltwo);
            $insertsqltwo = "INSERT INTO " . $usrnm . " (security, overall, comments, name) VALUES ('$security', '$overall', '$comments', '$name')";
            $userreviews->query($insertsqltwo);
            
            if ($barinformation->query($insertsql)) {
                echo "<p>Thank you for your review!<br /><br />";
                echo "<a href = 'brewery_search.html'>Return to Search</a></p>";
            } else {
                echo "<p>Apologies. Your request couldn't be processed at this time. Please try again later.<br /><br />";
                echo "<a href = 'brewery_search.html'>Return to Search</a></p>";
            }
        ?>
    </body>
</html>
