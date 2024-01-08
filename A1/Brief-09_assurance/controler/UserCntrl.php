<?php


$user = new User();

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    header("location: ../index.php");
}
