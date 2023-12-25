<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login and Signup with Bootstrap</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .text-danger {
            text-align: center;
            margin-left: 300px;
        }

        .no-login {
            text-align: center;
            margin-right: 300px;
            color: red;
        }

        .login {
            text-align: center;
            margin-right: 300px;
            color: green;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <!-- Login Form -->
            <div class="col-md-6 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <h2 class="text-center mb-4">Login</h2>
                        <form action="../includes/login.php" method="post">
                            <div class="form-group">
                                <label for="loginUsername">Username</label>
                                <input type="text" class="form-control" id="loginUsername" placeholder="Enter your username" name="username" required>
                            </div>
                            <div class="form-group">
                                <label for="loginPassword">Password</label>
                                <input type="password" class="form-control" id="loginPassword" placeholder="Enter your password" name="pwd" required>
                            </div>
                            <button name="submit" type="submit" class="btn btn-primary btn-block">Login</button>
                        </form>
                        <div class="text-center mt-3">
                            <span>Don't have an account?</span>
                            <a class="btn btn-outline-primary ml-2" href="signup.php">Signup Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>