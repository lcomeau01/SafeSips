<html>
    <head>
        <title>Displaying User Reviews</title>
         <meta name="viewport" content="width=device-width, initial-scale=1">
        <script>
            function gettingUsername() {
                var usrnm = sessionStorage.getItem("usrnm");
                if (usrnm == null || usrnm == undefined) {
                    return false;
                } 
                return usrnm;
            }
            function sendingToPHP() {
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        console.log("working.");
                    }
                };
                xhttp.open("POST", "displayingUserReviews.php", true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send("usrnm=" + gettingUsername());
            }
        </script>
        <style> 
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
                margin: 0px; 
            }
            @media screen and (max-width: 770px) { 
                .logo { 
                    font-size: 40px; 
                }
            }
            .container { 
                position: fixed; 
                top: 18vh; 
                bottom: 0px; 
            }
            .review-container { 
                position: fixed; 
                top: 170px; 
                overflow-y: scroll; 
                display: flex; 
                flex-direction: column; 
                align-items: center; 
                width: 700px; 
                bottom: 0px; 
                margin-bottom: 20px; 
            }
            .bar-name { 
                font-size: 25px; 
                color: #F5817F; 
                margin-bottom: 10px; 
            }
            .stars { 
                height: 25px; 
            }
            .security, .comment-container, .overall { 
                width: 50%; 
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
            .comment-container { 
                bottom: 0px; 
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
                min-height: auto;
                bottom: 0px; 
            }
            #title { 
                position: fixed; 
                top: 120px; 
                display: flex; 
                flex-direction: column; 
                align-items: center; 
                width: 600px; 
            }
            @media screen and (max-width: 770px) { 
                #title {
                    width: 100%; 
                }
                .one-review, form { 
                    width: 500px; 
                }
                .review-container { 
                    width: 530px; 
                }
            }
        </style> 
    </head>
    <body>
        <?php
            $logo = "<div class='logo'> 
                <h1> <a href='brewery_search.html'> Safe <img src='icon.png'> Sips </a> </h1>
            </div>"; 
            echo $logo; 

            $hostname = "localhost";
            $username = "u5xdbxn1kpzes";
            $password = "3b7nzj8bzxph";
            $database = "db8hyiqgvxvd9n";
            
            $reviewinfo = new mysqli($hostname, $username, $password, $database);

            $usrnm = $_GET['usrnm'];
            $sql = "SELECT * FROM $usrnm";
            if ($reviewinfo->query($sql)) {
                $alldata = $reviewinfo->query($sql);
                $htmltext = "<div id='title'> <h1 style = 'text-align: center; '>" . $usrnm . "'s Reviews</h1> </div>";
                $htmltext = $htmltext . "<div class='review-container'>"; 
                foreach($alldata as $d) {
                     $htmltext = $htmltext . "<div class='one-review'>"; 
                   $htmltext = $htmltext . "<strong class='bar-name'>" . $d['name'] . "</strong>";
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
                $htmltext = $htmltext . "</div>"; 
                echo $htmltext;
            } else {
                echo "You have yet to leave a review!";
            }  
        ?>
    </body>
</html>
