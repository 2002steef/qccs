<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap opdracht</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- to normalize css -->

    <style>
        .container-button {
            /* default button with animation settings */
            /* border: 0; */
            border-radius: 40px;
            transition: all 0.5s;
            text-align: center;
            cursor: pointer;
            margin-top: 15px;
            margin-bottom: 5px;
            font-size: small;
        }

        .container-button span {
            /* more default button with animation*/
            display: inline-block;
            position: relative;
            transition: 0.5s;
            cursor: pointer;
        }

        .container-button span:after {
            /* more default button with animation*/
            content: '\00bb';
            position: absolute;
            opacity: 0;
            top: 0;
            right: -20px;
            transition: 0.5s;
        }

        .container-button:hover span {
            /* more default button with animation*/
            padding-right: 25px;
        }

        .container-button:hover span:after {
            /* more default button with animation*/
            opacity: 1;
            right: 0;
        }

        .block1,
        .block2 {
            font-size: 16px;
        }

        .block1 {
            /* first block - login block */
            background-color: #db9e9f;
            color: white;
        }

        .block2 {
            /* second block - register account - new account */
            background: #edb8c6;
            color: white;
        }

        .button2 {
            /* button of block 2. */
            background-color: white;
            color: black;
            /* border: #000000; */
            margin-top: 15%;
            /* for cleaner spacing */
            width: 50%;
            /* for centering */
            margin-left: 25%;
            /* for centering */
            height: 30px;
        }

        .column {
            /* inside of block 1 - login block: the inputs, button and pass forgot */
            display: flex;
            flex-direction: column;
            width: 50%;
            margin-left: 25%;
        }

        .loginInput {
            /* input items in block 1 - login block */
            height: 30px;
            text-align: center;
            color: #000000;
            background-color: #fbe4f5;
            border: 0;
            border-radius: 10px;
        }

        .loginInput::placeholder {
            /* placeholder for input */
            color: #7d7d7d;
        }

        .loginInput:focus::placeholder {
            /* when typing in input, placeholder gone. even when nothing typed yet */
            color: transparent;
        }

        .marginBottom {
            margin-bottom: 5px;
        }

        @media screen and (min-width:767px) {

            /* for desktop - minimal 767px width devices */
            .row {
                margin-top: 20px;
                margin-bottom: 20px;
                display: flex;
                padding: 0 25px;
            }

            .block1 {
                width: 70%;
                padding-bottom: 20px;
            }

            .block2 {
                width: 30%;
                padding-bottom: 20px;
            }

            .loginAndForgot {
                width: 70%;
                margin-left: 15%;

            }

            .forgotPassword {
                text-align: right;
                margin-left: 30%;
                margin-top: 10px;
            }

            .button1 {
                background-color: white;
                /* border: #000000; */
                color: black;
                width: 100%;
                /* margin-left: 15%; */
                height: 30px;
            }

            .containerTop {
                background-color: rgba(149, 149, 149, 0.2);
                max-width: 50%;
                min-width: 550px;
                height: 300px;
                margin-top: 15vh;
            }

            @media screen and (max-height:400px) {
                .containerTop {
                    margin-top: 5vh;
                }
            }

            .register {
                font-size: 0.9vw;
            }
        }

        @media screen and (max-width: 767px) {

            /* for desktop / minimal 767px width devices */
            .row {
                margin-top: 20px;
                margin-bottom: 20px;
            }

            .block1,
            .block2 {
                padding-top: 15px;
                width: 90%;
                margin-left: 5%;
                padding-bottom: 20px;
            }

            .forgotPassword {
                text-align: center;
                
            }

            .button1 {
                background-color: white;
                color: black;
                /* border: #000000; */
                /* border-radius: 1px; */
                width: 70%;
                margin-left: 15%;
                height: 30px;
            }

            .containerTop {
                background-color: rgba(149, 149, 149, 0.2);
            }

        }

        #loginErrorMessage {
            display: none;
            margin-bottom: -15px;
            font-size: 13px;
            text-align: center;
        }


    </style>
</head>

<body>

    <div class="container containerTop">

        <div class="row">
            <div class="block1" id="block1">
                <h2 class="text-center">inloggen</h2>
                <form method="post" action="loginCheck.php">
                    <div class="column">
                        <input id="username" name="username" class="loginInput loginItem marginBottom" type="text" placeholder="Gebruikersnaam">
                        <input id="password" name="password" class="loginInput loginItem" type="password" placeholder="Wachtwoord">
                        <p id="loginErrorMessage"></p>
                        <div class="loginAndForgot">
                            <button id="login" type="submit" class="container-button button1 loginItem"><span>inloggen</span></button>
                            <p class="forgotPassword"><u><span id="forgotPass">Wachtwoord vergeten?</span></u></p>
                        </div>
                </form>
            </div>
        </div>

        <div class="block2">
            <h2 class="text-center">Nog geen account?</h2>
            <button class="container-button button2" id="register"><span class="register">registreer</span></button>
        </div>

    </div>
    </div>



</body>

</html>




<script>
    document.addEventListener("DOMContentLoaded", function() {
        let errorMessage = document.getElementById('loginErrorMessage').offsetHeight;
        if(errorMessage>20){
            document.getElementById("block1").style.paddingBottom = '10px';
        }
    });
</script>

<?php

if (isset($_GET['loginError1'])) {
    // treat the succes case ex:
    echo ("
        <script>
            let loginErrorMessage = document.getElementById('loginErrorMessage');
            let block1 = document.getElementById('block1');
            let forgotPassItem = document.getElementsByClassName('forgotPassword')[0];
            loginErrorMessage.innerHTML = 'Gebruikersnaam is leeg';
            loginErrorMessage.style.display = 'block';
            forgotPassItem.style.marginTop = '0';
            block1.style.paddingBottom = '26px';
        </script>"
    );
}
if (isset($_GET['loginError2'])) {
    // treat the succes case ex:
    echo ("
        <script>
            let loginErrorMessage = document.getElementById('loginErrorMessage');
            let block1 = document.getElementById('block1');
            let forgotPassItem = document.getElementsByClassName('forgotPassword')[0];
            loginErrorMessage.innerHTML = 'wachtwoord is leeg';
            loginErrorMessage.style.display = 'block';
            forgotPassItem.style.marginTop = '0';
            block1.style.paddingBottom = '26px';
        </script>"
    );
}
if (isset($_GET['loginError3'])) {
    // treat the succes case ex:
    echo ("
        <script>
            let loginErrorMessage = document.getElementById('loginErrorMessage');
            let block1 = document.getElementById('block1');
            let forgotPassItem = document.getElementsByClassName('forgotPassword')[0];
            loginErrorMessage.innerHTML = 'Gebruikersnaam of wachtwoord verkeerd';
            loginErrorMessage.style.display = 'block';
            forgotPassItem.style.marginTop = '0';
            if(loginErrorMessage.offsetHeight>20){
                document.getElementById('block1').style.paddingBottom = '10px';
            } else {
                block1.style.paddingBottom = '26px';
            }
        </script>"
    );
}

?>