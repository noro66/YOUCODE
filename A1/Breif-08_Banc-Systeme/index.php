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
                <button type="button" class="btn btn-primary m-1 float-end d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#addModal">
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
                    <h4 class="modal-title">Add New User</h4>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <form action="" method="post" id="form-data">

                        <div class="mb-3">
                            <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name">
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control" id="email" name="email" placeholder="E-mail">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="phoneNumber" name="phoneNumber" placeholder="Phone Number">
                        </div>
                        <div class="mb-3">
                            <input type="submit" class="btn btn-danger w-100" id="insert" name="insert">
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
                    <h4 class="modal-title">Edit User</h4>
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
                            <input type="email" class="form-control" id="email-ed" name="email" required>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="phoneNumber-ed" name="phoneNumber">
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
    <script type="text/javascript">
        $(document).ready(function() {
            showAllUsers();

            function showAllUsers() {
                $.ajax({
                    url: "action.php",
                    type: 'POST',
                    data: {
                        action: "view"
                    },
                    success: function(response) {
                        $("#showUser").html(response);
                        $("table").DataTable({
                            order: [0, 'desc']
                        });
                    }
                })
            }
            // insert ajax request
            $("#insert").click(function(e) {
                if ($("#form-data")[0].checkValidity()) {
                    e.preventDefault();
                    $.ajax({
                        url: "action.php",
                        type: "POST",
                        data: $("#form-data").serialize() + "&action=insert",
                        success: function(response) {
                            Swal.fire({
                                position: "center-center",
                                icon: "success",
                                title: "User Added Successfully !",
                                showConfirmButton: false,
                                timer: 1500
                            });
                            $("#addModal").modal('hide');
                            $("#form-data")[0].reset();
                            showAllUsers();
                        }
                    });
                } else {
                    console.log("Form is not valid");
                }
            });

            $("body").on("click", ".editBtn", function(e) {
                e.preventDefault();
                edit_id = $(this).attr('id');
                $.ajax({
                    url: "action.php",
                    type: "POST",
                    data: {
                        edit_id: edit_id
                    },
                    success: function(response) {
                        try {
                            data = JSON.parse(response);

                            // Check if the response is an object and has the expected properties
                            if (typeof data === 'object' && data !== null && 'id' in data && 'first_name' in data && 'last_name' in data && 'email' in data && 'phone' in data) {
                                // Update form fields with the received data
                                $('#id').val(data.id);
                                $('#fname').val(data.first_name);
                                $('#lname').val(data.last_name);
                                $('#email-ed').val(data.email);
                                $('#phoneNumber-ed').val(data.phone);
                            } else {
                                console.error('Invalid data format in the server response');
                                // Optionally show an error message to the user
                            }
                        } catch (error) {
                            console.error('Error parsing JSON response:', error);
                            // Optionally show an error message to the user
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("AJAX Error: " + status + " - " + error);
                    }
                });
            });

            $("#update").click(function(e) {
                if ($("#edit-form-data")[0].checkValidity()) {
                    e.preventDefault();
                    $.ajax({
                        url: "action.php",
                        type: "POST",
                        data: $("#edit-form-data").serialize() + "&action=update",
                        success: function(response) {
                            Swal.fire({
                                position: "center-center",
                                icon: "success",
                                title: "User Updated Successfully !",
                                showConfirmButton: false,
                                timer: 1500
                            });
                            $("#editModal").modal('hide');
                            $("#edit-form-data")[0].reset();
                            showAllUsers();
                        }
                    });
                } else {
                    console.log("Form is not valid");
                }
            });
            $('body').on('click', '.delBtn', function(e) {
                e.preventDefault();
                var tr = $(this).closest('tr');
                del_id = $(this).attr('id');
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            url: "action.php",
                            type: 'POST',
                            data: {
                                del_id: del_id
                            },
                            success: function(response) {
                                tr.css('background-color', '#ff6666');
                                Swal.fire(
                                    'Deleted',
                                    'User deleted successfully !',
                                    'success'
                                );
                                showAllUsers();
                            }
                        });
                    }
                });

            });

            $('body').on('click', '.infoBtn', function(e) {
                e.preventDefault();
                info_id = $(this).attr('id');
                $.ajax({
                    url: "action.php",
                    type: "POST",
                    data: {
                        info_id: info_id
                    },
                    success: function(response) {
                        data = JSON.parse(response);
                        Swal.fire({
                            title: '<strong>User  Info: ID(' + data.id + ')</strong>',
                            type: 'info',
                            html: '<b>First Name: </b>' + data.first_name + '<br><b>Last Name: </b>' + data.last_name + '<br><b>Email : </b>' + data.email + '<br><b>Phone : </b>' + data.phone,
                        })
                    }
                })
            });

        });
    </script>
</body>

</html>