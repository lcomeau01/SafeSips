<html>
    <head>
        <title>Sign Up</title>
         <link rel="icon" type="image/x-icon" href="icon.png">
         <meta name="viewport" content="width=device-width, initial-scale=1">
        <script>
            function formValidation() {
                var password = document.forms['signup']['password'].value;
                var username = document.forms['signup']['user'].value;
                var verify = document.forms['signup']['verify'].value;
                var email = document.forms['signup']['email'].value;

                if (password != verify) {
                    alert("Password and Re-typed Password are different.");
                    return false;
                } 
                if (password.length == 0 || username.length == 0 || verify.length == 0 || email.length == 0) {
                    alert("Please enter values in all fields.");
                    return false;
                }
                if (!checkemail()) {
                    return false;
                }
                sessionStorage.setItem("usrnm", username);
            }

            function checkemail() {
                if (email.validity.typeMismatch) { 
                    email.setCustomValidity(''); 
                    alert('Please enter a valid email.')
                    return false;
                }
                return true; 
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
                margin: 0px
            }
            @media screen and (max-width: 700px) { 
                .logo { 
                    font-size: 40px; 
                }
            }
            form { 
                width: 50vw; 
                height: 50vh; 
                display: flex; 
                flex-direction: column; 
                align-items: center; 
                justify-content: center; 
                border: solid 5px #F6A2A0; 
                border-radius: 20px;
                background-color: #F0EBE9; 
            }
            form input[type='text'], form input[type='email'], form input[type='password'] {  
                width: 30vw; 
                height: 6vh; 
                border: solid 5px #F6A2A0; 
                border-radius: 10px; 
                font-size: 17px; 
                color: #666666; 
            }
            @media screen and (max-width: 1190px) { 
                form { 
                    width: 600px; 
                }
                form input[type='text'], form input[type='password'], form input[type='email'] {
                    width: 350px; 
                }
            }
            @media screen and (max-width: 700px) { 
                form { 
                    width: 500px; 
                }
                form input[type='text'], form input[type='password'], form input[type='email'] {
                    width: 250px; 
                }
            }
            h1 { 
                color: #F6A2A0; 
                margin-bottom: 10px; 
            }
            input[type='submit'] { 
                padding: 5px 0px; 
                width: 15vw; 
                border: 3px #F4C7CC solid;
                background-color: #F4C7CC;
                margin-top: 5px;
                text-decoration: none;
                border-radius: 10px; 
                font-size: 17px; 
            }
            input[type='submit']:hover { 
                border-color: #F6A2A0; 
                cursor: pointer;
            }
            @media screen and (max-width: 1190px) { 
                form input[type='submit'] {
                    width: 200px; 
                }
            }
            @media screen and (max-width: 700px) { 
                form input[type='submit'] {
                    width: 100px; 
                }
            }
            form a { 
                color: #F5817F;
            }
            form a:hover { 
                font-weight: bold; 
            }
        </style>
    </head>
    <body>
        <?php
        $logo = "<div class='logo'> 
                <h1> <a href='brewery_search.html'> Safe <img src='icon.png'> Sips </a> </h1>
            </div>"; 
            $htmltext = "<h1 style = 'text-align: center;'>Sign Up</h1><form style = 'text-align: center;' method = 'get' action = 'formvalidation.php' name = 'signup' onsubmit = 'return formValidation()'>";
            $htmltext = $htmltext . "<input type = 'email' name = 'email' id = 'email' placeholder = 'Email' /><br />";
            $htmltext = $htmltext . "<input type = 'text' name = 'user' id = 'user' placeholder = 'Username' /><br />";
            $htmltext = $htmltext . "<input type = 'password' name = 'password' id = 'password' placeholder = 'Password'/><br />";
            $htmltext = $htmltext . "<input type = 'password' name = 'verify' id = 'verify' placeholder = 'Retype Password' /><br />";
            $htmltext = $htmltext . "<input type = 'Submit'>";
            $htmltext = $htmltext . "</form>";

            echo $logo; 
            echo $htmltext;
        ?>
    </body>
</html>
