<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include "config.php";

$tables = getTable($pdo, "client");


if (isset($_POST['submit'])) {
    $client_ids = isset($_POST['Clients']) ? $_POST['Clients'] : array();
    $claim = $_POST['claimname'];
    $atricle_id = $_POST['atricle_id'];



    foreach ($client_ids as $client_id) {
        insertClient($pdo, $claim, $client_id, $atricle_id);
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Client Management</title>
</head>

<body>

    <div class="container mt-5">
        <h2>Add Claim</h2>

        <form method="post" action="">
            <div class="form-group">
                <label for="clientName">Claim Name:</label>
                <input type="text" class="form-control" id="claimname" name="claimname" required>
            </div>
            <div class="form-group">
                <label for="article_id">Article id</label>
                <input type="number" class="form-control" id="article_id" name="atricle_id" required>
            </div>
            <h4 for="clentsNmaes">Clents Names</h4>
            <div class="form-group form-check">
                <?php foreach ($tables as $table) : ?>
                    <input type="checkbox" class="form-check-input" id="notifyClient" value="<?= $table["id"] ?>" name="Clients[]">
                    <label class="form-check-label" for="notifyClient"><?php echo $table["username"] ?></label><br>
                <?php endforeach; ?>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Add Client</button>
        </form>

        <hr>

        <?php
        ?>

    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>

</html>