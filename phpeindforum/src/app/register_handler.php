<?php
$signup_message = null;
$no_match_msg = null;
 include 'database/database.php';


if (isset($_POST['login-submit'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $password2 = $_POST['password_confirm'];

    if ($password == $password2) {

        $new_user = $conn->prepare("INSERT INTO users(username , password , email ) VALUES(:username , :password , :email) ");

        $new_user->execute([
                ':username' => $username,
                ':password' => hash('sha512', $password),
                ':email' => $email,

        ]);
            $signup_message = 'succesvol geregistreerd';


    } else{
        $no_match_msg = 'password komt niet overeen';
    }
}
else header:("location: sign_up.php");
?>