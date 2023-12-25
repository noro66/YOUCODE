<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $user_uid = $_POST['username'];
    $pwd = $_POST['pwd'];

    include "../classes/dbCls.php";
    include "../classes/loginCls.php";
    include "../classes/loginCnrl.php";

    $login = new loginpCntrl($user_uid, $pwd);




    $login->loginUser();
}
