<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $user_id = $_POST['username'];
    $pwd = $_POST['pwd'];
    $pwdrpt = $_POST['pwdrpt'];
    $email = $_POST['email'];

    include "../classes/dbCls.php";
    include "../classes/signupCls.php";
    include "../classes/signupCntrlCls.php";

    $signup = new SignupCntrl($user_id, $pwd, $pwdrpt, $email);

    $signup->singnupUser();

    header("location: ../veiw/login.php?error=none");
}
