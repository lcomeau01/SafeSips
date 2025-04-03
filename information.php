<html>
    <head> 
        <title>Reviews</title>
         <link rel="icon" type="image/x-icon" href="icon.png">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            form { 
                min-height: 30vh; 
                display: flex; 
                flex-direction: column; 
                align-items: center; 
                justify-content: center; 
                border: solid 2px #F6A2A0; 
                border-radius: 20px;
                background-color: #F0EBE9; 
                width: 600px; 
                padding: 10px; 
            }
            @media screen and (max-width: 770px) { 
                form { 
                    width: 500px; 
                }
            }
            * { 
                margin: 0px;
                font-family: courier; 
                top: 0px; 
                max-height: 100%; 
            }
            html, body { 
                background-color: #EDDADE; 
                display: flex; 
                flex-direction: column; 
                width: 100%; 
                height: 100%; 
                align-items: center; 
                justify-content: center; 
                overflow-y: scroll; 
                color: #666666; 
            }
            .logo {
                width: 100%; 
                font-size: 45px; 
                display: flex; 
                height: 20vh; 
                align-items: flex-start; 
                justify-content: center; 
                padding-top: 20px; 
                position: fixed; 
            }
            .logo a { 
                text-decoration: none; 
                color: #F6A2A0; 
            }
            .logo img { 
                height: 60px; 
                margin: 0px
            }
            .review-container { 
                position: fixed; 
                top: 35vh; 
                overflow-y: scroll; 
                display: flex; 
                flex-direction: column; 
                align-items: center; 
                width: 650px; 
                bottom: 0px; 
            }
            .bar-name { 
                font-size: 25px; 
                color: #F5817F; 
            }
            .stars { 
                height: 25px; 
            }
            .security, .comment-container, .overall { 
                width: 55%; 
                display: flex; 
                font-size: 18px; 
                align-items: center; 
                justify-content: space-between; 
                margin-bottom: 5px; 
            }
            .security p, .comment-container p, .overall p { 
                width: 100%; 
                display: flex; 
                justify-content: flex-start; 
            }
            .star-container { 
                display: flex; 
                width: 100%; 
                justify-content: flex-end; 
            }
            .one-review { 
                display: flex; 
                flex-direction: column; 
                align-items: center; 
                width: 600px; 
                border: 2px #F6A2A0 solid; 
                margin-top: 20px; 
                padding: 10px; 
                border-radius: 20px; 
            }
            @media screen and (max-width: 850px) { 
                .one-review { 
                    width: 500px; 
                }
            }
            #title { 
                position: fixed; 
                display: flex; 
                flex-direction: column; 
                align-items: center; 
                width: 100%; 
                margin-bottom: 10px; 
            }
            .review-form { 
                margin: 20px; 
                width: 100%; 
                display: flex; 
                flex-direction: column;
                /* justify-content: center;  */
                align-items: center; 
            }
            .review-form p { 
                margin-bottom: 10px; 
            }
            .safety, .service { 
                text-size: 22px; 
                width: 50%; 
                display: flex; 
                justify-content: space-between; 
            }
            select { 
                width: 50px; 
                height: 25px; 
                border: 2px #F6A2A0 solid; 
                border-radius: 5px; 
            }
            textarea { 
                width: 350px; 
                height: 100px; 
                margin: 5px 0px 10px; 
                border: 2px #F6A2A0 solid;
            }
            input[type='submit'] { 
                width: 200px; 
                border: 2px #F4C7CC solid;
                background-color: #F4C7CC;
                border-radius: 10px; 
                padding: 5px 20px; 
            }
            input[type='submit']:hover { 
                border-color: #F6A2A0; 
                cursor: pointer;
            }
            .sums { 
                position: fixed; 
                top: 25vh; 
                display: flex; 
                flex-direction: column; 
                align-items: center; 
                width: 600px; 
            }
             @media screen and (max-height: 1270px) { 
                #title { 
                    margin: 10px 0px;
                    position: fixed;  
                    top: 120px; 
                    min-height: auto; 
                }
                .sums { 
                    top: 170px; 
                }
                 .review-container { 
                    top: 250px; 
                 }
            }
             
            @media screen and (max-width: 850px) { 
                .logo { 
                    font-size: 40px; 
                }
                .sums { 
                    top: 200px; 
                    width: 500px;
                }
                .review-container { 
                    top: 280px; 
                    width: 530px; 
                }
                
            }
            @media screen and (max-width: 700px) { 
                .logo { 
                    font-size: 40px; 
                }
                .sums { 
                    top: 250px; 
                }
                .review-container { 
                    top: 320px; 
                }
                
            }
            @media screen and (max-height: 850px) { 
                #no-reviews { 
                    top: 200px; 
                    position: fixed; 
                }
            }
            @media screen and (max-width: 700px) { 
                #no-reviews { 
                    top: 300px; 
                    position: fixed; 
                }
            }
        </style>
        <script>
            function checkingSessionStorage() {
                var usrnm = sessionStorage.getItem("usrnm");
                if (usrnm == null || usrnm == undefined) {
                    alert("You need to login to submit a review.");
                    return false;
                }
                var hiddenusrnm = document.getElementById('usrnm');
                hiddenusrnm.setAttribute('value', usrnm);
            }
        </script>
    </head>
    <body>
        <?php
            // header 
            $logo = "<div class='logo'> 
                    <h1> <a href='brewery_search.html'> Safe <img src='icon.png'> Sips </a> </h1>
                </div>"; 
            echo $logo; 

            $name = $_GET['barname'];
            $id = $_GET['barid'];
            $newid = str_replace("-", "d", $id);

            echo "<h1 id='title' style = 'text-align: center; '>Reviews for " . $name . "</h1>";

            $hostname = "localhost";
            $username = "u5xdbxn1kpzes";
            $password = "3b7nzj8bzxph";
            $database = "dbt2ay4kxhkbvz";
            $barinformation = new mysqli($hostname, $username, $password, $database);

            $mysqlstatement = "SHOW TABLES FROM $database";
            $statement = $barinformation->query($mysqlstatement); //cannot seem to check if this is working or not
            $tableexists = FALSE;
            if ($statement->num_rows > 0) {
                while ($row = $statement->fetch_assoc()) {
                    if ($row["Tables_in_$database"] == $newid) {
                        $tableexists = TRUE;
                    }
                }
            }

            if ($tableexists) {
                $sqlgetalldata = "SELECT * FROM $newid";
                $alldata = $barinformation->query($sqlgetalldata);
                $htmltext = "<h2>Reviews</h2>";
                $sum_security = 0.0;
                $sum_overall = 0.0;
                $c = 0;
                foreach($alldata as $d) {
                    $sum_security += $d['security'];
                    $sum_overall += $d['overall'];
                    $c += 1; 

                    $htmltext = $htmltext . "<div class='one-review'>"; 
                    $htmltext = $htmltext . "<div class='security'> <p>Safety: </p> <div class='star-container'>"; 
                        for ($i = 0; $i < $d['security']; $i++) { 
                            $htmltext = $htmltext . "<img class='stars' src='star.png'>"; 
                        }
                    $htmltext = $htmltext . "</div>"; 
                    $htmltext = $htmltext . "</div>"; 
                    $htmltext = $htmltext . "<div class='overall'> <p>Service: </p> <div class='star-container'>"; 
                        for ($i = 0; $i < $d['overall']; $i++) { 
                            $htmltext = $htmltext . "<img class='stars' src='star.png'>"; 
                        }
                    $htmltext = $htmltext . "</div>"; 
                    $htmltext = $htmltext . "</div>"; 
                    $htmltext = $htmltext . "<div class='comment-container'><p> Comments: " . $d['comments'] . " </p></div>";
                    $htmltext = $htmltext . "<div class='date'>" . $d['date'] . "</div>"; 
                    $htmltext = $htmltext . "</div>"; 
                }
                $sum_security = floor($sum_security / $c);
                $sum_overall = floor($sum_overall / $c);
                $rating = "<div class='security'> <p>Safety </p> <div class='star-container'>"; 
                        for ($i = 0; $i < $sum_security; $i++) { 
                            $rating = $rating . "<img class='stars' src='star.png'>"; 
                        }
                    $rating = $rating . "</div>"; 
                    $rating = $rating . "</div>"; 
                    $rating = $rating . "<div class='overall'> <p>Service </p> <div class='star-container'>"; 
                        for ($i = 0; $i < $sum_overall; $i++) { 
                            $rating = $rating . "<img class='stars' src='star.png'>"; 
                        }
                    $rating = $rating . "</div>"; 
                    $rating = $rating . "</div>"; 
                echo "<div class='sums'>" . $rating . "</div>"; 
                echo "<div class='review-container'>"; 
                echo $htmltext;

                echo "<div class='review-form'>"; 
                echo "<p style = 'text-align: center; '>Have Thoughts? Leave a Review!</p>";
                // seen 
                $htmltext = "<form style = 'text-align: center; ' method = 'get' action = 'leaveReview.php' onsubmit = 'return checkingSessionStorage()'> <div class='safety'> <label for = 'security'>Safety Rating</label>";
                $htmltext = $htmltext . "<select name = 'security' id = 'security'><option value = '1'>1</option><option value = '2'>2</option><option value = '3'>3</option><option value = '4'>4</option><option value = '5'>5</option></select></div>";
                $htmltext = $htmltext . "<div class='service'><label for = 'overall'>Service Rating</label><select name = 'overall' id = 'overall'><option value = '1'>1</option><option value = '2'>2</option><option value = '3'>3</option><option value = '4'>4</option><option value = '5'>5</option></select></div>";
                $htmltext = $htmltext . "<div class='comments'><label for = 'comments'>Comments:</label><br /><textarea id = 'comments' name = 'comments' rows = '4' columns = '50' maxlength='200'></textarea></div>";

                // hidden 
                $htmltext = $htmltext . "<input type = 'hidden' name = 'barid' value = '" . $id . "' />";
                $htmltext = $htmltext . "<input type = 'hidden' name = 'barname' value = '" . $name . "' />";
                $htmltext = $htmltext . "<input type = 'hidden' name = 'usrnm' id = 'usrnm' />";

                // seen 
                $htmltext = $htmltext . "<input type = 'submit' value = 'Submit Review' /></form>";
                echo $htmltext;
                 echo "</div>"; 
                 echo "</div>"; 
            } else {
                echo "<div class='review-container'>"; 
                echo "<div class='review-form'>"; 
                echo "<p id='no-reviews' style = 'text-align: center; '>Currently no reviews exist for this location. Be the first to leave a review!</p>";

                // seen 
                $htmltext = "<form style = 'text-align: center; ' method = 'get' action = 'leaveReview.php' onsubmit = 'return checkingSessionStorage()'> <div class='safety'> <label for = 'security'>Safety Rating</label>";
                $htmltext = $htmltext . "<select name = 'security' id = 'security'><option value = '1'>1</option><option value = '2'>2</option><option value = '3'>3</option><option value = '4'>4</option><option value = '5'>5</option></select></div>";
                $htmltext = $htmltext . "<div class='service'><label for = 'overall'>Service Rating</label><select name = 'overall' id = 'overall'><option value = '1'>1</option><option value = '2'>2</option><option value = '3'>3</option><option value = '4'>4</option><option value = '5'>5</option></select></div>";
                $htmltext = $htmltext . "<div class='comments'><label for = 'comments'>Comments:</label><br /><textarea id = 'comments' name = 'comments' rows = '4' columns = '50' maxlength='200'></textarea></div>";

                // hidden 
                $htmltext = $htmltext . "<input type = 'hidden' name = 'barid' value = '" . $id . "' />";
                $htmltext = $htmltext . "<input type = 'hidden' name = 'barname' value = '" . $name . "' />";
                $htmltext = $htmltext . "<input type = 'hidden' name = 'usrnm' id = 'usrnm' />";

                // seen 
                $htmltext = $htmltext . "<input type = 'submit' value = 'Submit Review' /></form>";
                echo $htmltext;
                 echo "</div>"; 
                 echo "</div>"; 
            }
        ?>
    </body>
</html>
