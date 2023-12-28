<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/v/bs4/dt-1.13.8/datatables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link rel="icon" type="image/x-icon" href="data:image/x-icon;,">

    <title>Clients</title>
</head>

<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"> <i style="font-size:24px" class="fa">&#xf19c;</i>
                ASSURANCE</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">ASSURANCES</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">CLIENTS</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h4 class="text-center text-danger font-weight-normal my-3">assurance Users</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <h4 class="mt-2 text-primary">All Users</h4>
            </div>
            <div class="col-lg-6">
                <button type="button" class="btn btn-primary m-1 float-end d-flex align-items-center"
                    data-bs-toggle="modal" data-bs-target="#addModal">
                    <i class="material-icons">&#xe147;</i>&nbsp;Add User</button>
            </div>
        </div>
        <hr class="my-1">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive" id="showUser">
                </div>
            </div>
        </div>
    </div>
    <!-- Add New User Modal-->
    <div class="modal fade" id="addModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Add New Client</h4>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <form action="" method="post" id="form-data">

                        <div class="mb-3">
                            <input type="text" class="form-control" id="firstName" name="firstName"
                                placeholder="First Name">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="lastName" name="lastName"
                                placeholder="Last Name">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="adress" name="adress" placeholder="Adress">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="phoneNumber" name="phoneNumber"
                                placeholder="Phone Number">
                        </div>
                        <div class="mb-3">
                            <input type="submit" value="Add Client" class="btn btn-danger w-100" id="insert"
                                name="insert">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- EditUser Modal-->
    <div class="modal fade" id="editModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Edit Client</h4>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <form action="" method="post" id="edit-form-data">
                        <input type="hidden" name="id" id="id">
                        <div class="mb-3">
                            <input type="text" class="form-control" id="fname" name="fname" required>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="lname" name="lname" required>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="adress-up" name="adress" required>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="phoneNumber-up" name="phoneNumber">
                        </div>
                        <div class="mb-3">
                            <input type="submit" class="btn btn-danger w-100" id="update" name="update" value="Update">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables -->
    <script src="https://cdn.datatables.net/v/bs4/dt-1.13.8/datatables.min.js"></script>
    <script src="client.js" type="text/javascript"></script>

</body>

</html>