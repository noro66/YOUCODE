<?php
     require_once "../service/insurerService.php";
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link rel="icon" type="image/x-icon" href="data:image/x-icon;,">

    <title>Article Management</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <!-- ... Navbar Content ... -->
            <div class="container-fluid">
                <a class="navbar-brand" href="#"> <i style="font-size:24px" class="fa">&#xf19c;</i>
                    ASSURANCE</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="insuranceveiw.html">ASSURANCES</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="clientveiw.php">CLIENT</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="container">
        <div class="row">
            <div class="col-lg-12">
                <h4 class="text-center text-danger font-weight-normal my-3">Article Management</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <h4 class="mt-2 text-primary">ARTICLES</h4>
            </div>
            <div class="col-lg-6">
                <button type="button" class="btn btn-primary m-1 float-end d-flex align-items-center"
                    data-bs-toggle="modal" data-bs-target="#addModal">
                    <i class="material-icons">&#xe147;</i>&nbsp;Add Article
                </button>
            </div>
        </div>
        <hr class="my-1">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive" id="showUser">
                    <!-- Table Content Goes Here -->
                </div>
            </div>
        </div>
    </main>

    <!-- Add New Article Modal -->
    <div class="modal fade" id="addModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Add New Article</h4>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <form action="" method="post" id="form-data">
                        <div class="mb-3">
                            <label for="title" class="form-label">Article Title</label>
                            <input type="text" class="form-control" id="title" name="title"
                                placeholder="Enter the article title" required>
                        </div>
                        <div class="mb-3">
                            <label for="content" class="form-label">Article Content</label>
                            <textarea class="form-control" id="content" name="content"
                                placeholder="Enter the article content" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="date" class="form-label">Date</label>
                            <input type="date" class="form-control" id="date" name="date" required>
                        </div>
                        <div class="mb-3">
                            <label for="client_id" class="form-label">Client ID</label>
                            <?php
                            $clientId = isset($_GET['id']) ? htmlspecialchars($_GET['id']) : '';
                            ?>
                            <input type="text" class="form-control" id="client_id" name="client_id"
                                placeholder="Enter the client ID" value="<?= $clientId ?>" readonly required>
                        </div>

                        <div class="mb-3">
                            <label for="insurer_id" class="form-label">Insurer</label>
                            <select class="form-select" id="insurer_id" name="insurer_id" required>
                                <?php
                                $insrv = new InsurerService();
                                $insurersList = $insrv->ShowInsurer();
                                var_dump($insurersList);

                                // if ($insurersList) {
                                
                                // foreach ($insurersList as $insurer) {
                                //     $id = $insurer['id'];
                                //     $name = $insurer['name'];
                                //     echo "<option value='$id'>$name</option>";
                                // }
                                // }

                                ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-success w-100" id="insert" name="insert">Add
                                Article</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Edit Article Modal -->
    <div class="modal fade" id="editModal">
        <!-- ... Modal Content ... -->
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/v/bs4/dt-1.13.8/datatables.min.js"></script>
    <script src="js/article.js" type="text/javascript"></script>
</body>

</html>