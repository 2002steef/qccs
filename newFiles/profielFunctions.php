<?php 

function password_reset($password, $confirmpassword, $email)
{
    global $mysqli;
    if (empty($password) or empty($confirmpassword)) {
        exit('Not all fields are filled in.');
    }
    if ($password == $confirmpassword) {
        $sqlUpdate = "UPDATE `users` SET `password`= ? WHERE email  = ?";
        $stmt = $mysqli->prepare($sqlUpdate);
        $stmt->bind_param('ss', $password, $email);
        $stmt->execute();
        echo "Gelukt!";
    } else {
        echo "Passwords do not match.";
    }
}

// TODO: opnieuw schrijven
function Changepassword()
{
    global $mysqli;
    if (isset($_POST['save_password'])) {
        $sql = 'SELECT password FROM `medewerkers` WHERE id = ?';
        if ($stmt = $mysqli->prepare($sql)) {
            $user = $_SESSION['id'];
            $stmt->bind_param('i', $user);
            $stmt->execute();
            $stmt->store_result();
            $password = '';
            $stmt->bind_result($password);
            $stmt->fetch();
            if ($stmt->num_rows > 0) {
                if ($_POST['old-password'] == $password) {
                    if ($_POST['new-password'] == $_POST['retype-new-password']) {
                        $query = "UPDATE `users` SET password = ? WHERE id = ?";
                        $stmt = $mysqli->prepare($query);
                        $stmt->bind_param('si', $_POST['retype-new-password'], $_SESSION['id']);
                        $stmt->execute();
                    } else {
                        header("Location:../page-account-settings.php?login=fout");
                    }
                } else {
                    header("Location:../page-account-settings.php?login=leeg");

                }
            }
        }
    }
}

// profiel foto veranderen, Misschien aanpassen
function UploadPic1()
{
    if (isset($_POST['submitpic']) && isset($_FILES['my_image'])) {
        global $mysqli;

        echo "<pre>";
        print_r($_FILES['my_image']);
        echo "</pre>";

        $img_name = $_FILES['my_image']['name'];
        $img_size = $_FILES['my_image']['size'];
        $tmp_name = $_FILES['my_image']['tmp_name'];
        $error = $_FILES['my_image']['error'];

        if ($error === 0) {
            if ($img_size > 1250000) {
                $em = "Sorry, your file is too large.";
                header("Location: index.php?error=$em");
            } else {
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);

                $allowed_exs = array("jpg", "jpeg", "png");

                if (in_array($img_ex_lc, $allowed_exs)) {
                    $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                    $img_upload_path = 'uploads/' . $new_img_name;
                    move_uploaded_file($tmp_name, $img_upload_path);

                    // Insert into Database
                    $sql_pic = "UPDATE `users` SET `image_url` = ? WHERE id = ?";
                    $stmt = $mysqli->prepare($sql_pic);
                    $stmt->bind_param(
                        "si", $new_img_name, $_SESSION['id']
                    );
                    $stmt->execute();
                    header("Location: page-account-settings.php");
                } else {
                    $em = "You can't upload files of this type";
                    header("Location: index.php?error=$em");
                }
            }
        }
    }
}

function Updateuser()
{
    global $mysqli;
    if (isset($_POST['save'])) {
        $query = "UPDATE users SET username = ?, name = ? , email = ? WHERE id = ?";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param('sssi', $_POST['username'], $_POST['name'], $_POST['email'], $_SESSION['id']);
        $stmt->execute();
    }
}