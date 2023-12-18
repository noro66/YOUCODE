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
            <a class="navbar-brand" href="#"> <i style="font-size:24px" class="fa">&#xf19c;</i>
                BANCK</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">USERS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">AGENCES</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h4 class="text-center text-danger font-weight-normal my-3">Crud aplication using php oop pdo ...</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <h4 class="mt-2 text-primary">ALL users in dateabase !</h4>
            </div>
            <div class="col-lg-6">
                <button type="button" class="btn btn-primary m-1 float-end d-flex align-items-center"><i class="material-icons">&#xe147;</i>&nbsp;Add User</button>
                <!-- <a href="#" class="btn btn-success m-1 float-right"></a> -->
            </div>
        </div>
        <hr class="my-1">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive" id="showUser">
                    <table class="table table-striped table-sm table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th>id</th>
                                <th>Fist name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="text-center text-secondary">
                                <td>1</td>
                                <td>User Name</td>
                                <td>User lname 1</td>
                                <td>email@gmail.com</td>
                                <td>8796547456</td>
                                <td>
                                    <a href="#" title="Veiw Details" class="text-success"></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/v/bs4/dt-1.13.8/datatables.min.js"></script>
</body>

</html>