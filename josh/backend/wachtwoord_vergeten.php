<!DOCTYPE html>
<?php
include "backend/functions.php";
?>
<html>
<?php
include "partials/header.php";
?>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-4">
        </div>
        <div class="col-sm-4">
            <?php
            if(isset($_GET['token']))
            {
                $token= $_GET['token'];
            }
            //form for submit
            if(isset($_POST['sub_set'])){
                extract($_POST);
                if($password ==''){
                    $error[] = 'Please enter the password.';
                }
                if($passwordConfirm ==''){
                    $error[] = 'Please confirm the password.';
                }
                if($password != $passwordConfirm){
                    $error[] = 'Passwords do not match.';
                }
                if(strlen($password)<5){ // min
                    $error[] = 'The password is 6 characters long.';
                }
                if(strlen($password)>50){ // Max
                    $error[] = 'Password: Max length 50 Characters Not allowed';
                }
                $fetchresultok = mysqli_query($dbc, "SELECT email FROM users WHERE reset_token='$token'");
                if($res = mysqli_fetch_array($fetchresultok))
                {
                    $email= $res['email'];
                }
                if(isset($email) != '' ) {
                    $emailtok=$email;
                }
                else
                {
                    $error[] = 'Deze sessie is niet langer meer geldig, helaas! lol';
                    $hide=1;
                }
                if(!isset($error)){
                    $options = array("cost"=>4);
                    $resultresetpass= mysqli_query($dbc, "UPDATE users SET password='$password' WHERE email='$emailtok'");
                    if($resultresetpass)
                    {
                        $success="<div></span> 
						<br>Je wachtwoord is succesvol gewijzigd<br> 
						<a href='index.php'>klik hier om in te loggen</a> </div>";
                        $resultdel = mysqli_query($dbc, "UPDATE users SET reset_token= NULL WHERE email='$emailtok'");
                        $hide=1;
                    }
                }
            }
            ?>
            <br>
            <div class="login_form">
                <form action="" method="POST">
                    <div class="form-group">
                        <img src="../assets/img/logo2.png" class="logo img-fluid">
                        <br>
                        <br>
                        <?php
                        if(isset($error)){
                            foreach($error as $error){
                                echo '<div class="errmsg">'.$error.'</div><br>';
                            }
                        }
                        if(isset($success)){
                            echo $success;
                        }
                        ?>
                        <?php if(!isset($hide)){ ?>
                        <label class="label_txt">Wachtwoord</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label class="label_txt">Bevestig Wachtwoord</label>
                        <input type="password" name="passwordConfirm" class="form-control" required  >
                    </div>
                    <button type="submit" name="sub_set" class="btn btn-primary btn-group-lg form_btn">Wijzig wachtwoord</button>
                    <?php } ?>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
include "partials/footer.php";
?>
</body>
</html>
