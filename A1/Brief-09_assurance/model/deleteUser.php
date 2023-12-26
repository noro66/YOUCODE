<?php
include "config.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "UPDATE client SET is_delete = 1 WHERE client.id = $id ";
    $pdo->query($sql);
    header("location: index.php");
}
