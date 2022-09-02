<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap opdracht</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">


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
            <button class="container-button button2" id="register" onclick="document.location.href='register.php'"><span class="register">registreer</span></button>
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