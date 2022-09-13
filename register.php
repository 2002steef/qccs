<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap opdracht</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="logo.jpg">
    <!-- to normalize css -->

    <style>

    </style>
</head>

<body>

    <div class="container containerTop">

        <div class="row">
            <div class="block3" id="block3">
                <h2 id='headerRegister' class="text-center">Registreren</h2>
                <form method="post" action="registerAction.php">
                    <div class="column">
                        <input id="email" name="email" class="loginInput loginItem marginBottom" type="email" placeholder="Email">
                        <input id="username" name="username" class="loginInput loginItem marginBottom" type="text" placeholder="Gebruikersnaam">
                        <input id="password" name="password" class="loginInput loginItem marginBottom" type="password" placeholder="Wachtwoord">
                        <input id="passwordCheck" name="passwordCheck" class="loginInput loginItem" type="password" placeholder="Bevestig Wachtwoord">
                        <p id="registerErrorMessage"></p>
                        <button id="register" type="submit" class="container-button button1 loginItem marginBottom"><span>Registreer</span></button>
                    </div>
                </form>
            </div>
        </div>

    </div>



</body>

</html>




<script>
    document.addEventListener("DOMContentLoaded", function() {
        let errorMessage = document.getElementById('registerErrorMessage').offsetHeight;
        if (errorMessage > 20) {
            document.getElementById("block3").style.paddingBottom = '10px';
        }
    });
</script>

<?php

if (isset($_GET['registerError1'])) {
    // treat the succes case ex:
    echo ("
        <script>
            let registerErrorMessage = document.getElementById('registerErrorMessage');
            let registerButton = document.getElementById('register');
            let block3 = document.getElementById('block3');
            registerErrorMessage.innerHTML = 'Email is leeg';
            registerErrorMessage.style.display = 'block';
            registerErrorMessage.style.margin = '0';
            registerButton.style.marginTop = '0';
            block3.style.paddingBottom = '0';
        </script>"
    );
}
if (isset($_GET['registerError2'])) {
    // treat the succes case ex:
    echo ("
        <script>
            let registerErrorMessage = document.getElementById('registerErrorMessage');
            let block3 = document.getElementById('block3');
            registerErrorMessage.innerHTML = 'Gebruikersnaam is leeg';
            registerErrorMessage.style.display = 'block';
            let registerButton = document.getElementById('register');
            registerErrorMessage.style.margin = '0';
            registerButton.style.marginTop = '0';
            block3.style.paddingBottom = '0';
        </script>"
    );
}

if (isset($_GET['registerError3'])) {
    // treat the succes case ex:
    echo ("
        <script>
            let registerErrorMessage = document.getElementById('registerErrorMessage');
            let block3 = document.getElementById('block3');
            registerErrorMessage.innerHTML = 'Gebruikersnaam al in gebruik';
            registerErrorMessage.style.display = 'block';
            let registerButton = document.getElementById('register');
            registerErrorMessage.style.margin = '0';
            registerButton.style.marginTop = '0';
            block3.style.paddingBottom = '0';
        </script>"
    );
}

if (isset($_GET['registerError4'])) {
    // treat the succes case ex:
    echo ("
        <script>
            let registerErrorMessage = document.getElementById('registerErrorMessage');
            let block3 = document.getElementById('block3');
            registerErrorMessage.innerHTML = 'Wachtwoord is leeg';
            registerErrorMessage.style.display = 'block';
            let registerButton = document.getElementById('register');
            registerErrorMessage.style.margin = '0';
            registerButton.style.marginTop = '0';
            block3.style.paddingBottom = '0';
        </script>"
    );
}

if (isset($_GET['registerError5'])) {
    // treat the succes case ex:
    echo ("
        <script>
            let registerErrorMessage = document.getElementById('registerErrorMessage');
            let block3 = document.getElementById('block3');
            registerErrorMessage.innerHTML = 'Wachtwoord bevestigen is leeg';
            registerErrorMessage.style.display = 'block';
            let registerButton = document.getElementById('register');
            registerErrorMessage.style.margin = '0';
            registerButton.style.marginTop = '0';
            block3.style.paddingBottom = '0';
        </script>"
    );
}



if (isset($_GET['registerError6'])) {
    // treat the succes case ex:
    echo ("
        <script>
        let registerErrorMessage = document.getElementById('registerErrorMessage');
        let block3 = document.getElementById('block3');
        registerErrorMessage.innerHTML = 'Wachtwoorden komen niet overeen';
        registerErrorMessage.style.display = 'block';
            if(registerErrorMessage.offsetHeight>20){
                let registerButton = document.getElementById('register');
                registerButton.style.margin = '0';
                registerErrorMessage.margin = '0';
                document.getElementById('headerRegister').style.marginBottom = '5px';
                document.getElementById('headerRegister').style.marginTop = '5px';
            }
        </script>"
    );
}



?>