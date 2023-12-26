<?php

include "config.php";

if (isset($_POST['submit'])) {
    $sql = "UPDATE client SET is_delete = 0";
    $pdo->query($sql);
}



$table = getTable($pdo, 'client');

?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/v/bs4/dt-1.13.8/datatables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>BANCK</title>
</head>

<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"> <i style="font-size:24px" class="fa">&#xf19c;</i>BANCK</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Assurence</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Clients</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Article </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <hr class="my-1">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive" id="showUser">
                    <table class="table table-striped table-sm table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th class="text-center">ID</th>
                                <th class="text-center">Assurence Name</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($table as $client) : if (!$client['is_delete']) { ?>
                                    <tr class="text-center text-secondary">
                                        <td><?= $client['id'] ?></td>
                                        <td><?= $client['username'] ?></td>
                                        <td>
                                            <a href="deleteUser.php?id=<?= $client['id'] ?>" title="soft delete" class="text-success"><i class="material-icons text-danger">&#xe92b;</i></a>
                                            <a href="showClaims.php?id=<?= $client['id'] ?>" title="show Claims" class="text-success"><i style="font-size:24px" class="fa"></i></a>
                                        </td>
                                    </tr>
                            <?php }
                            endforeach;
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <form action="" method="post"><input class="btn btn-primary" type="submit" value="reset" name="submit"></form>
        <a href="ajoutmultiple.php" class="btn btn-primary m-1 float-end d-flex align-items-center"><i class="material-icons">&#xe147;</i>&nbsp;Add Claim</a>


    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/v/bs4/dt-1.13.8/datatables.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("table").DataTable();
        });
    </script>
</body>

</html>