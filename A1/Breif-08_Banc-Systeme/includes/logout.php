<?php

session_start();
session_unset();
session_destroy();
header("location: ../veiw/login.php?error=invalidusername!");
